<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EmailLogsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailLogsController extends Controller
{
    public function index(EmailLogsDataTable $dataTable)
    {
        return $dataTable->render('admin.emailLogs.index');
    }
}
