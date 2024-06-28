<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view blog', ['only' => ['index']]);
        $this->middleware('permission:create blog', ['only' => ['create','store']]);
        $this->middleware('permission:update blog', ['only' => ['update','edit']]);
        $this->middleware('permission:delete blog', ['only' => ['destroy']]);
    }

    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');
    }
    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'name' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'quote' => 'required',
            'icon_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required',
            'question' => 'required'
        ]);
        $sanitizedShortDescription = strip_tags($validatedData['short_description']);
        

        // Create a new service
        $blog = new Blog();
        $blog->name = $validatedData['name'];
        $blog->short_description = $sanitizedShortDescription;
        $blog->long_description = $validatedData['long_description'];;
        $blog->author = $validatedData['author'];
        $blog->quote = $validatedData['quote'];
        $blog->question = $validatedData['question'];
        $blog->user_id = Auth::user()->id;
        if ($request->hasFile('icon_image')) {
            $iconImage = $request->file('icon_image');
            $iconImageName = time() . '_icon.' . $iconImage->getClientOriginalExtension();

            // Store the icon image using Storage::put
            $iconImagePath = 'public/storage/images/blog/' . $iconImageName;
            Storage::put($iconImagePath, file_get_contents($iconImage));

            // Save the icon image path to the blog instance
            $blog->icon_image = $iconImagePath;
        }

        if ($request->hasFile('banner_image')) {
            $bannerImage = $request->file('banner_image');
            $bannerImageName = time() . '_banner.' . $bannerImage->getClientOriginalExtension();

            // Store the banner image using Storage::put
            $bannerImagePath = 'public/storage/images/blog/' . $bannerImageName;
            Storage::put($bannerImagePath, file_get_contents($bannerImage));

            // Save the banner image path to the blog instance
            $blog->banner_image = $bannerImagePath;
        }
        $blog->save();

        return redirect('/blogs')->with('success', 'Blog added successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $updateData = $request->validate([
            'name' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'quote' => 'required',
            'icon_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required',
            'question' => 'required'
        ]);

        // Find the blog by ID
        $blog = Blog::findOrFail($id);

        $updateData['short_description'] = strip_tags($updateData['short_description']);
    
        if ($request->hasFile('icon_image')) {
            $iconImage = $request->file('icon_image');
            $iconImageName = time() . '_icon.' . $iconImage->getClientOriginalExtension();
            $iconImagePath = $iconImage->storeAs('public/storage/images/blog', $iconImageName);

            if ($blog->icon_image) {
                Storage::delete($blog->icon_image);
            }

            $updateData['icon_image'] = $iconImagePath;
        }

        if ($request->hasFile('banner_image')) {
            $bannerImage = $request->file('banner_image');
            $bannerImageName = time() . '_banner.' . $bannerImage->getClientOriginalExtension();
            $bannerImagePath = $bannerImage->storeAs('public/storage/images/blog', $bannerImageName);

            if ($blog->banner_image) {
                Storage::delete($blog->banner_image);
            }

            $updateData['banner_image'] = $bannerImagePath;
        }

        // Update the blog's data
        $blog->update($updateData);

        return redirect('/blogs')->with('completed', 'Blog has been updated');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect('/blogs')->with('completed', 'Blog has been deleted');
    }
}
