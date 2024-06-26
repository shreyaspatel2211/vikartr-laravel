<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Admin\WorklogsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\EmailLogsController;
use App\Http\Controllers\Admin\LeaveController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\WhatsAppLogsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PortfolioController;
use Spatie\Permission\Middleware\RoleMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class,'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/about', [AboutUsController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/service/{slug}', [ServicesController::class, 'servicesBySlug'])->name('service');
Route::get('/careers', [CareersController::class, 'index'])->name('careers');
Route::get('/contactus', [ContactUsController::class, 'index'])->name('contactus');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog_details/{id}', [BlogController::class, 'details'])->name('blog_details');
Route::get('/admin/worklog_create', [WorkLogsController::class, 'create'])->name('admin_worklog_create');
Route::post('/book_call_with_us', [ContactUsController::class, 'bookCallWithUS'])->name('book_call_with_us');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/admin/store_worklog', [WorkLogsController::class, 'storeWorklog'])->name('admin_store_worklog');
Route::get('/admin/worklogs', [WorklogsController::class, 'index'])->name('admin_worklogs');
Route::get('/admin/worklog_edit/{id}', [WorkLogsController::class, 'edit'])->name('admin_worklog_edit');
Route::patch('/admin/worklog_update/{id}', [WorkLogsController::class, 'update'])->name('admin_worklog_update');
Route::delete('/admin/worklog_delete/{id}', [WorkLogsController::class, 'destroy'])->name('admin_worklog_delete');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/project', [ProjectController::class, 'index'])->name('admin_project');
Route::get('/admin/project/create', [ProjectController::class, 'create'])->name('admin_project_create');
Route::post('/admin/store_project', [ProjectController::class, 'storeProject'])->name('admin_store_project');
Route::get('/admin/project_edit/{id}', [ProjectController::class, 'edit'])->name('admin_project_edit');
Route::patch('/admin/project_update/{id}', [ProjectController::class, 'update'])->name('admin_project_update');
Route::delete('/admin/project_delete/{id}', [ProjectController::class, 'destroy'])->name('admin_project_delete');
Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin_contact');
Route::get('/admin/contact/create', [ContactController::class, 'create'])->name('admin_contact_create');
Route::post('/admin/store_contact', [ContactController::class, 'store'])->name('admin_store_contact');
Route::get('/admin/contact_edit/{id}', [ContactController::class, 'edit'])->name('admin_contact_edit');
Route::patch('/admin/contact_update/{id}', [ContactController::class, 'update'])->name('admin_contact_update');
Route::delete('/admin/contact_delete/{id}', [ContactController::class, 'destroy'])->name('admin_contact_delete');
Route::get('/admin/contact/import', [ContactController::class, 'import'])->name('admin_contact_import');
Route::post('/admin/contacts/import', [ContactController::class, 'importContacts'])->name('admin_contacts_import');
Route::post('/send/contact/message', [ContactController::class, 'sendMessage'])->name('send_contact_message');
Route::get('/send/messages', [ContactController::class, 'sendMessages'])->name('send_messages');
Route::post('/send/contact/mail', [ContactController::class, 'sendMail'])->name('send_contact_mail');
Route::get('/send/emails', [ContactController::class, 'sendEmails'])->name('send_emails');
Route::resource('categories', CategoryController::class);
Route::resource('companies', CompanyController::class);
Route::resource('teams', TeamController::class);
Route::resource('blogs', AdminBlogController::class);
Route::resource('admin_services', ServiceController::class);
Route::resource('portfolios', AdminPortfolioController::class);
Route::resource('admin_careers', CareerController::class);
Route::resource('email_logs', EmailLogsController::class);
Route::resource('whatsapp_logs', WhatsAppLogsController::class);
Route::resource('leaves', LeaveController::class);
Route::post('/leave/approve/{id}', [LeaveController::class, 'approve'])->name('leave_approve');


// Auth::routes();

Route::get('/home', [App\Http\Controllers\IndexController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:super-admin|admin']], function() {

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::delete('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::delete('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::delete('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);

});
