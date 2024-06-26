<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function Index() {
        $services = Service::all();
        return view('home.index', ['services' => $services]);
    }

    public function About(){
        return view('home.about');
    }

    
}
