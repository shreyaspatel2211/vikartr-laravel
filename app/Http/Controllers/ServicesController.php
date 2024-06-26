<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServicesController extends Controller
{
    public function Index(){
        $services = Service::all();

        return view('services.services', compact('services'));
    }

    public function ServicesBySlug($slug){
        $service = Service::where('slug', $slug)->firstOrFail();
        $allServices = Service::all();
        return view('services.details', ['service' => $service, 'allServices'=> $allServices]);
    }
}
