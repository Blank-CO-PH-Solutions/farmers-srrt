<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use App\Models\ServiceType;

class ServiceRequestController extends Controller
{
    public function show($id)
    {
        $request = ServiceRequest::findOrFail($id);


        return view("farmer.request.show", ["request"=> $request]);
    }

    public function create() {
        $serviceTypes = ServiceType::all();

        return view("farmer.request.create", ["serviceTypes" => $serviceTypes]);
    }
}
