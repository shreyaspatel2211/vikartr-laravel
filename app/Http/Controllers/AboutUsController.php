<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function Index(){
        $teams = Team::all();
        return view('aboutus.aboutus',compact('teams'));
    }

    
}
