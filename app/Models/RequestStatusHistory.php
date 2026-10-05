<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['service_request_id', 'status', 'office_id', 'changed_by', 'remarks'])]
class RequestStatusHistory extends Model
{
    public function serviceRequest()
    {
        return $this->belongsTo(ServiceRequest::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function changedBy()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
