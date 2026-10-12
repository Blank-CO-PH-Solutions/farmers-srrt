<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Models\RequestStatusHistory;
use App\Models\ServiceRequest;
use App\Models\ServiceType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceRequestController extends Controller
{
    public function show(int $id): \Illuminate\Contracts\View\View | null
    {
        $request = ServiceRequest::query()->findOrFail($id);

        $user = Auth::user();

        // TODO: Add support for allowing officers to view farmer's request.
        abort_if($user->id !== $request->farmer_id, 403);

        return view("farmer.request.show", ["request" => $request]);
    }

    public function create(): \Illuminate\Contracts\View\View | null
    {
        $serviceTypes = ServiceType::all();

        return view("farmer.request.create", ["serviceTypes" => $serviceTypes]);
    }

    public function store(StoreServiceRequest $request): \Illuminate\Http\RedirectResponse
    {

        $result = DB::transaction(function () use ($request) {
            $userRequested = $request->user();

            // Build the reference_number
            $prefix = "REQ";
            $date = date("Ymd");
            $random = random_int(100000, 999999);
            $ref_num = "{$prefix}-{$date}-{$random}";

            $is_calamity = $request->boolean('is_calamity');

            $office_id = ServiceType::findOrFail($request->integer('service_type_id'))->default_office_id;

            $newRequest = ServiceRequest::create(array_merge($request->validated(), [
                "reference_number" => $ref_num,
                "farmer_id" => $userRequested->id,
                "current_office_id" => $office_id,
                "is_calamity" => $is_calamity,
                "priority" => $is_calamity ? 'high' : 'normal',
                "status" => "submitted",
                "submitted_at" => now(),
            ]));

            RequestStatusHistory::create([
                'service_request_id' => $newRequest->id,
                'status' => 'submitted',
                'office_id' => $office_id,
                'changed_by' => $userRequested->id,
                'remarks' => 'Request submitted by farmer.'
            ]);

            return $newRequest;
        });

        return redirect("/requests/{$result->id}");
    }
}
