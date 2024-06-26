<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CallBooking;
use Illuminate\Validation\Rule;


class ContactUsController extends Controller
{
    public function Index(){
        return view('contactus.contactus');
    }

    public function BookCallWithUS(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('call_booking'), // Unique rule for the 'email' column in the 'employee' table
            ],
            'phone' => 'required|max:255',
        ]);

        $callBooking = new CallBooking();
        $callBooking->name = $request->input('name');
        
        $callBooking->email = $request->input('email');
        $callBooking->phone = $request->input('phone');
        
        // Save the user
        $callBooking->save();
        return redirect('/contactus')->with('completed', 'call us with has been saved!');
    }
}
