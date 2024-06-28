<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\WorklogDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worklog;
use App\Models\Project;
use App\Models\User;

class WorklogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view worklog', ['only' => ['index']]);
        $this->middleware('permission:create worklog', ['only' => ['create','storeWorklog']]);
        $this->middleware('permission:update worklog', ['only' => ['update','edit']]);
        $this->middleware('permission:delete worklog', ['only' => ['destroy']]);
    }

    public function index(WorklogDataTable $dataTable)
    {
        return $dataTable->render('admin.worklog.index');
    }
    public function create()
    {

        /** @var User $user */

        $user = auth()->user();
        if ($user->role_id == 1) {
            $projects = Project::all();
        } else {
            $projects = $user->project;
        }
        $users = User::all();
        return view('admin.worklog.create', compact('projects', 'users'));
    }

    public function storeWorklog(Request $request)
    {
        // Validate the form input
        $rules = [
            'project_id' => 'required',
            'description' => 'required|string',
            // Add validation rules for other form fields as needed
        ];

        if (auth()->user()->role_id == 1) {
            $rules['user_id'] = 'required|exists:users,id'; // Ensure the selected user ID exists
        }

        $validatedData = $request->validate($rules);

        $sanitizedDescription = strip_tags($validatedData['description']);

        // Create a new worklog
        $worklog = new Worklog;
        $worklog->project()->associate(Project::find($request->input('project_id')));
        $worklog->date = now()->toDateString();

        if (auth()->user()->role_id == 1) {
            $worklog->user_id = $request->input('user_id'); // Use selected user ID from dropdown
        } else {
            $worklog->user_id = auth()->id(); // Use authenticated user ID
        }

        $worklog->description = $sanitizedDescription;
        $worklog->save();

        // Redirect back to the worklogs page with a success message
        return redirect()->route('admin_worklogs')->with('completed', 'Worklog added successfully.');
    }

    public function edit(string $id)
    {
        $worklog = Worklog::findOrFail($id);
        /** @var User $user */

        $user = auth()->user();
        if ($user->role_id == 1) {
            $projects = Project::all();
        } else {
            $projects = $user->project;
        }
        return view('admin.worklog.edit', compact('worklog','projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $worklog = Worklog::findOrFail($id);

        $updateData = $request->validate([
            'project_id' => 'required',
            'description' => 'required|max:255',
        ]);
        $updateData['description'] = strip_tags($updateData['description']);

        if ($worklog->date != now()->toDateString()) {
            return redirect('/admin/worklogs')->with('error', 'You can only update today\'s worklog.');
        }

        Worklog::whereId($id)->update($updateData);
        return redirect('/admin/worklogs')->with('completed', 'Worklog has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $worklog = Worklog::findOrFail($id);

        if ($worklog->date != now()->toDateString()) {
            return redirect('/admin/worklogs')->with('error', 'You can only delete today\'s worklog.');
        }
        $worklog->delete();
        return redirect('/admin/worklogs')->with('completed', 'Worklog has been deleted');
    }
}
