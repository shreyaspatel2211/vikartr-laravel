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
    public function index(WorklogDataTable $dataTable){
        return $dataTable->render('admin.worklog.index');
    }
    public function create(){
        
         /** @var User $user */

        $user = auth()->user();
        if ($user->hasRole('super-admin')) {
            $projects = Project::all();
        } else {
            $projects = $user->project;
        }   
        
        return view('admin.worklog.create', compact('projects'));
    }

    public function storeWorklog(Request $request)
    {
    // Validate the form input
    $validatedData = $request->validate([
        'project_id' => 'required',
        'description' => 'required|string',
        'date' => 'required'
        // Add validation rules for other form fields as needed
    ]);

    $sanitizedDescription = strip_tags($validatedData['description']);
    // Create a new service
    $worklog = new Worklog;
    $worklog->project()->associate(Project::find($request->input('project_id')));
    $worklog->date = now()->toDateString();
    $worklog->user_id = auth()->id(); // Assuming you are storing the current user's ID
    $worklog->description = $sanitizedDescription;
    $worklog->save();

    // Retrieve worklogs for a user
    $userWorklogs = Worklog::where('user_id', auth()->id())->get();
    // Redirect back to the services page with a success message
    return redirect()->route('admin_worklogs')->with('success', 'Worklog added successfully.');
}
/**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $worklog = Worklog::findOrFail($id);
        $projects = Project::all();
        return view('admin.worklog.edit',['worklog' => $worklog, 'projects' => $projects]);
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
