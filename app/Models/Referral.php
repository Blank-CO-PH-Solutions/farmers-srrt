<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'service_request_id',
    'from_office_id',
    'to_office_id',
    'referred_by',
    'reason',
    'status',
    'accepted_at',
    'completed_at',
])]
class Referral extends Model
{
    public function serviceRequest()
    {
        return $this->belongsTo(ServiceRequest::class);
    }

    public function fromOffice()
    {
        return $this->belongsTo(Office::class, 'from_office_id');
    }

    public function toOffice()
    {
        return $this->belongsTo(Office::class, 'to_office_id');
    }

    public function referredBy()
    {
        return $this->belongsTo(User::class, 'referred_by');
    }
}
