<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareersController extends Controller
{
    public function Index(){
        $careers = Career::all();
        return view('careers.career', compact('careers'));
    }
        
}
