<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TeamDataTable;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view team', ['only' => ['index']]);
        $this->middleware('permission:create team', ['only' => ['create','store']]);
        $this->middleware('permission:update team', ['only' => ['update','edit']]);
        $this->middleware('permission:delete team', ['only' => ['destroy']]);
    }
    
    public function index(TeamDataTable $dataTable){
        return $dataTable->render('admin.team.index');
    }
    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        // Create a new service
        $team = new Team();
        $team->name = $validatedData['name'];
        $team->designation = $validatedData['designation'];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the image using Storage::put
            $path = 'public/storage/images/team/' . $imageName;
            Storage::put($path, file_get_contents($image));

            // Save the image name to the team instance
            $team->image = $path;
        }
        $team->save();

        return redirect('/teams')->with('success', 'Team added successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $team = Team::findOrFail($id);
        return view('admin.team.edit', ['team' => $team]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the form input
        $updateData = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the team instance
        $team = Team::findOrFail($id);

        // Check if a new image file is provided
        if ($request->hasFile('image')) {
            // Get the new image file
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the new image using Storage::put
            $path = 'public/storage/images/team/' . $imageName;
            Storage::put($path, file_get_contents($image));

            // Delete the old image if exists
            if ($team->image) {
                Storage::delete($team->image);
            }

            // Save the new image path to the update data
            $updateData['image'] = $path;
        }

        // Update the team's data
        $team->update($updateData);

        return redirect('/teams')->with('completed', 'Team has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect('/teams')->with('completed', 'Team has been deleted');
    }
}
