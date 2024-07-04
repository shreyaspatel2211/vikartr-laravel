<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\EmailTemplateDataTable;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view email template', ['only' => ['index']]);
        $this->middleware('permission:create email template', ['only' => ['create','store']]);
        $this->middleware('permission:update email template', ['only' => ['update','edit']]);
        $this->middleware('permission:delete email template', ['only' => ['destroy']]);
    }
    public function index(EmailTemplateDataTable $dataTable)
    {
        return $dataTable->render('admin.emailTemplate.index');
    }

    public function create()
    {
        return view('admin.emailTemplate.create');
    }

    public function store(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'title' => 'required',
            'subject' => 'required',
            'json' => 'nullable',
            'status' => 'required',
        ]);
        

        // Create a new message template
        $emailTemplate = new EmailTemplate();
        $emailTemplate->title = $validatedData['title'];
        $emailTemplate->subject = $validatedData['subject'];
        $emailTemplate->json = $validatedData['json'];
        $emailTemplate->status = $validatedData['status'];

        $emailTemplate->save();

        return redirect('/email_templates')->with('success', 'Email template added successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $emailTemplate = EmailTemplate::findOrFail($id);
        return view('admin.emailTemplate.edit', ['emailTemplate' => $emailTemplate]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $updateData = $request->validate([
            'title' => 'required',
            'subject' => 'required',
            'json' => 'nullable',
            'status' => 'required',
        ]);

        $emailTemplate = EmailTemplate::findOrFail($id);
                
        $emailTemplate->update($updateData);

        return redirect('/email_templates')->with('completed', 'Email Template has been updated');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emailTemplate = EmailTemplate::findOrFail($id);
        $emailTemplate->delete();
        return redirect('/email_templates')->with('completed', 'Email Template has been deleted');
    }
}
