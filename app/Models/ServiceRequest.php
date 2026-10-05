<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'reference_number',
    'farmer_id',
    'service_type_id',
    'current_office_id',
    'description',
    'is_calamity',
    'priority',
    'status',
    'latitude',
    'longitude',
    'submitted_at',
    'resolved_at',
    'closed_at',
])]
class ServiceRequest extends Model
{
    public function farmer()
    {
        return $this->belongsTo(User::class, 'farmer_id');
    }

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id');
    }

    public function currentOffice()
    {
        return $this->belongsTo(Office::class, 'current_office_id');
    }

    public function statusHistories()
    {
        return $this->hasMany(RequestStatusHistory::class);
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class);
    }

    public function rating()
    {
        return $this->hasOne(Rating::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    protected function casts(): array {
        return [
            'is_calamity' => 'boolean',
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'submitted_at' => 'datetime',
            'resolved_at' => 'datetime',
            'closed_at' => 'datetime',
        ];
    }
}
