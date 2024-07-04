<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\MessageTemplateDataTable;
use App\Models\MessageTemplate;
use Illuminate\Http\Request;

class WhatsappMessageTemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view message template', ['only' => ['index']]);
        $this->middleware('permission:create message template', ['only' => ['create','store']]);
        $this->middleware('permission:update message template', ['only' => ['update','edit']]);
        $this->middleware('permission:delete message template', ['only' => ['destroy']]);
    }

    public function index(MessageTemplateDataTable $dataTable)
    {
        return $dataTable->render('admin.messageTemplate.index');
    }

    public function create()
    {
        return view('admin.messageTemplate.create');
    }

    public function store(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'title' => 'required',
            'json' => 'nullable|string',
            'status' => 'required',
        ]);
                   
        // Create a new message template
        $messageTemplate = new MessageTemplate();
        $messageTemplate->title = $validatedData['title'];
        $messageTemplate->json = str_replace('&nbsp;', '', strip_tags($validatedData['json']));
        $messageTemplate->status = $validatedData['status'];

        $messageTemplate->save();

        return redirect('/mesaage_templates')->with('success', 'Message template added successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $messageTemplate = MessageTemplate::findOrFail($id);
        return view('admin.messageTemplate.edit', ['messageTemplate' => $messageTemplate]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $updateData = $request->validate([
            'title' => 'required',
            'json' => 'nullable|string',
            'status' => 'required',
        ]);

        $messageTemplate = MessageTemplate::findOrFail($id);

        $updateData['json'] = str_replace('&nbsp;', '', strip_tags($updateData['json']));
        $messageTemplate->update($updateData);

        return redirect('/mesaage_templates')->with('completed', 'Message Template has been updated');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $messageTemplate = MessageTemplate::findOrFail($id);
        $messageTemplate->delete();
        return redirect('/mesaage_templates')->with('completed', 'Message Template has been deleted');
    }
}
