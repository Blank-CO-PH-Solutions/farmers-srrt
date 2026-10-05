<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name','office_type','municipality','province','contact_number'])]
class Office extends Model
{

    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'current_office_id');
    }

    public function statusHistories()
    {
        return $this->hasMany(RequestStatusHistory::class);
    }

    public function outgoingReferrals()
    {
        return $this->hasMany(Referral::class, 'from_office_id');
    }

    public function incomingReferrals()
    {
        return $this->hasMany(Referral::class, 'to_office_id');
    }
}
