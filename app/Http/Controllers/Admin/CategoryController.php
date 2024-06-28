<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view category', ['only' => ['index']]);
        $this->middleware('permission:create category', ['only' => ['create','store']]);
        $this->middleware('permission:update category', ['only' => ['update','edit']]);
        $this->middleware('permission:delete category', ['only' => ['destroy']]);
    }
    public function index(CategoryDataTable $dataTable){
        return $dataTable->render('admin.category.index');
    }
    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
    // Validate the form input
    $validatedData = $request->validate([
        'name' => 'required',
    ]);

    
    // Create a new service
    $category = new Category();
    $category->name = $request->input('name');
    $category->save();

    return redirect('/categories')->with('success', 'Category added successfully.');
}
/**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {    
        $updateData = $request->validate([
            'name' => 'required',
        ]);
        Category::whereId($id)->update($updateData);
        return redirect('/categories')->with('completed', 'Category has been updated');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $worklog = Category::findOrFail($id);
        $worklog->delete();
        return redirect('/categories')->with('completed', 'Category has been deleted');    
    }

}
