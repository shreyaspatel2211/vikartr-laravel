<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\LeaveDataTable;
use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function index(LeaveDataTable $dataTable)
    {
        return $dataTable->render('admin.leave.index');
    }
    public function create()
    {
        return view('admin.leave.create');
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'leave_type' => 'required',
            'duration' => 'required',
            'from' => 'nullable|date',
            'to' => 'nullable|date',
            'note' => 'required'
        ]);
    
        $sanitizedNote = strip_tags($validatedData['note']);
    
        // Create a new service
        $leave = new Leave();
        $leave->leave_type = $validatedData['leave_type'];
        $leave->duration = $validatedData['duration'];
        $leave->from = $validatedData['from']?$validatedData['from']:null;
        $leave->to = $validatedData['to']?$validatedData['to']:null;
        $leave->status = "Pending";
        $leave->note = $sanitizedNote;
        $leave->user_id = Auth::user()->id;
       
        $leave->save();

        return redirect('/leaves')->with('success', 'Leave added successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $leave = Leave::findOrFail($id);
        return view('admin.leave.edit', ['leave' => $leave]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $updateData = $request->validate([
            'leave_type' => 'required',
            'duration' => 'required',
            'from' => 'nullable|date',
            'to' => 'nullable|date',
            'note' => 'required'
        ]);

        // Find the blog by ID
        $leave = Leave::findOrFail($id);

        $updateData['note'] = strip_tags($updateData['note']);

        // Update the blog's data
        $leave->update($updateData);

        return redirect('/leaves')->with('completed', 'Leave has been updated');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $leave = Leave::findOrFail($id);
        $leave->delete();
        return redirect('/leaves')->with('completed', 'Leave has been deleted');
    }

    public function approve(string $id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status="Approve";
        $leave->save();
        return redirect('/leaves')->with('completed', 'Leave approve successfully');
    }
}
