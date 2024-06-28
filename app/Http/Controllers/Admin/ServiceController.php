<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServiceDataTable;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view service', ['only' => ['index']]);
        $this->middleware('permission:create service', ['only' => ['create','store']]);
        $this->middleware('permission:update service', ['only' => ['update','edit']]);
        $this->middleware('permission:delete service', ['only' => ['destroy']]);
    }
    public function index(ServiceDataTable $dataTable){
        return $dataTable->render('admin.service.index');
    }
    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'long_description' => 'nullable',
            'slug' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'streams' => 'required'
        ]);
        $sanitizedDescription = strip_tags($validatedData['description']);

        $streams = implode(',', $request->input('streams'));

        // Create a new service
        $service = new Service();
        $service->name = $validatedData['name'];
        $service->slug = $validatedData['slug'];
        $service->description = $sanitizedDescription;
        $service->long_description = $validatedData['long_description'];
        $service->streams = $streams;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the image using Storage::put
            $path = 'public/storage/images/service/' . $imageName;
            Storage::put($path, file_get_contents($image));

            // Save the image name to the team instance
            $service->image = $path;
        }
        $service->save();

        return redirect('/admin_services')->with('success', 'Service added successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        $streams = explode(',', $service->streams); 
        return view('admin.service.edit', ['service' => $service, 'streams' => $streams]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the form input
        $updateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'long_description' => 'required',
            'slug' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'streams' => 'required|array',
        ]);

    
        $updateData['description'] = strip_tags($updateData['description']);
        $updateData['streams'] = implode(',', $request->streams); // Convert array to comma-separated string

        // Find the team instance
        $service = Service::findOrFail($id);

        // Check if a new image file is provided
        if ($request->hasFile('image')) {
            // Get the new image file
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the new image using Storage::put
            $path = 'public/storage/images/service/' . $imageName;
            Storage::put($path, file_get_contents($image));

            // Delete the old image if exists
            if ($service->image) {
                Storage::delete($service->image);
            }

            // Save the new image path to the update data
            $updateData['image'] = $path;
        }

        // Update the team's data
        $service->update($updateData);

        return redirect('/admin_services')->with('completed', 'Service has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect('/admin_services')->with('completed', 'Service has been deleted');
    }
}
