<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\RedirectResponse;

class ServiceRequestController extends Controller
{
    public function show($id)
    {
        $request = ServiceRequest::findOrFail($id);
        return view("farmer.request.show", ["request"=> $request]);
    }
}
