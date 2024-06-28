<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CareerDataTable;
use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view career', ['only' => ['index']]);
        $this->middleware('permission:create career', ['only' => ['create','store']]);
        $this->middleware('permission:update career', ['only' => ['update','edit']]);
        $this->middleware('permission:delete career', ['only' => ['destroy']]);
    }
    public function index(CareerDataTable $dataTable)
    {
        return $dataTable->render('admin.career.index');
    }
    public function create()
    {
        $cities =City::all();
        return view('admin.career.create', ['cities' =>$cities]);
    }

    public function store(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
           
            'designation' => 'required',
            'city_id' => 'nullable',
            'experience' => 'required',
            'slug' =>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'streams' => 'required'
        ]);
    
        // Create a new service
        $career = new Career();
        $career->designation = $validatedData['designation'];
        $career->experience = $validatedData['experience'];
        $career->city_id =$validatedData['city_id'];
        $career->slug =$validatedData['slug'];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the image using Storage::put
            $path = 'public/storage/images/careers/' . $imageName;
            Storage::put($path, file_get_contents($image));

            // Save the image name to the team instance
            $career->image = $path;
        }
        $career->save();

        return redirect('/admin_careers')->with('success', 'Career added successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $career = Career::findOrFail($id);
        $cities =City::all();
        return view('admin.career.edit', ['career' => $career, 'cities' =>$cities]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the form input
        $updateData = $request->validate([
            'designation' => 'required',
            'city_id' => 'nullable',
            'experience' => 'required',
            'slug' =>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $career = Career::findOrFail($id);

        // Check if a new image file is provided
        if ($request->hasFile('image')) {
            // Get the new image file
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the new image using Storage::put
            $path = 'public/storage/images/careers/' . $imageName;
            Storage::put($path, file_get_contents($image));

            // Delete the old image if exists
            if ($career->image) {
                Storage::delete($career->image);
            }

            // Save the new image path to the update data
            $updateData['image'] = $path;
        }

        // Update the team's data
        $career->update($updateData);

        return redirect('/admin_careers')->with('completed', 'Career has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $career = Career::findOrFail($id);
        $career->delete();
        return redirect('/admin_careers')->with('completed', 'Career has been deleted');
    }
}
