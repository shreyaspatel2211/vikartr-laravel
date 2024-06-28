<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CompanyDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view company', ['only' => ['index']]);
        $this->middleware('permission:create company', ['only' => ['create','store']]);
        $this->middleware('permission:update company', ['only' => ['update','edit']]);
        $this->middleware('permission:delete company', ['only' => ['destroy']]);
    }

    public function index(CompanyDataTable $dataTable){
        return $dataTable->render('admin.company.index');
    }
    
    public function create(){
        $categories = Category::all();
        return view('admin.company.create', compact('categories'));
    }

    public function store(Request $request)
    {
    // Validate the form input
    $validatedData = $request->validate([
        'name' => 'required',
        'category_id' => 'required',
    ]);


    // Create a new service
    $company = new Company();
    $company->name = $validatedData['name'];
    $company->code = $validatedData['name'];
    $company->category_id = $validatedData['category_id'];
    $company->save();

    return redirect('/companies')->with('success', 'Company added successfully.');
}
/**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        $categories = Category::all();
        return view('admin.company.edit',['company' => $company, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {    
        $updateData = $request->validate([
            'name' => 'required',
            'category_id' => 'required'
        ]);
        Company::whereId($id)->update($updateData);
        return redirect('/companies')->with('completed', 'Company has been updated');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect('/companies')->with('completed', 'Company has been deleted');    
    }

}
