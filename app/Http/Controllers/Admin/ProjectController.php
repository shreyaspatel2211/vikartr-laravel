<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProjectDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view project', ['only' => ['index']]);
        $this->middleware('permission:create project', ['only' => ['create','store']]);
        $this->middleware('permission:update project', ['only' => ['update','edit']]);
        $this->middleware('permission:delete project', ['only' => ['destroy']]);
    }
    public function index(ProjectDataTable $dataTable){
        return $dataTable->render('admin.project.index');
    }

    public function create(){
        $users = User::all();
        return view('admin.project.create', compact('users'));
    }
    
    public function storeProject(Request $request)
    {
    // Validate the form input
    $validatedData = $request->validate([
        'name' => 'required',
        // Add validation rules for other form fields as needed
    ]);

    
    // Create a new service
    $project = new Project;
    $project->name = $validatedData['name'];
    $project->code =$validatedData['name'];

    $project->save();

    if ($request->has('users')) {
        $users = User::find($request->input('users')); // Retrieve users based on selected IDs
        $project->users()->attach($users); // Attach the selected users to the project
    }

    return redirect()->route('admin_project')->with('success', 'Project added successfully.');
}
/**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        $users = User::all();
        return view('admin.project.edit',['project' => $project, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);
    
        $updateData = $request->validate([
            'name' => 'required'
        ]);
        
        Project::whereId($id)->update($updateData);
        if ($request->has('users')) {
            $selectedUsers = $request->input('users');
            $currentUsers = $project->users->pluck('id')->toArray();
    
            // Detach users not selected in the request
            $usersToDetach = array_diff($currentUsers, $selectedUsers);
            $project->users()->detach($usersToDetach);
    
            // Attach newly selected users
            $usersToAttach = array_diff($selectedUsers, $currentUsers);
            $project->users()->attach($usersToAttach);
        } else {
            // If no users are selected, detach all users from the project
            $project->users()->detach();
        }
        return redirect('/admin/project')->with('completed', 'Project has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        
            $project->delete();
            return redirect('/admin/project')->with('completed', 'Project has been deleted');
       
    }

}
