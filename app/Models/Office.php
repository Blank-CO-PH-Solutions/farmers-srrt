<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name','office_type','municipality','province','contact_number'])]
class Office extends Model
{
    /**
     * @return HasMany<ServiceRequest,Office>
     */
    public function serviceRequests(): HasMany
    {
        return $this->hasMany(ServiceRequest::class, 'current_office_id');
    }
    /**
     * @return HasMany<RequestStatusHistory,Office>
     */
    public function statusHistories(): HasMany
    {
        return $this->hasMany(RequestStatusHistory::class);
    }
    /**
     * @return HasMany<Referral,Office>
     */
    public function outgoingReferrals(): HasMany
    {
        return $this->hasMany(Referral::class, 'from_office_id');
    }
    /**
     * @return HasMany<Referral,Office>
     */
    public function incomingReferrals(): HasMany
    {
        return $this->hasMany(Referral::class, 'to_office_id');
    }
}
