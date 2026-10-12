<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'description', 'default_office_id'])]
class ServiceType extends Model
{
    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'service_type_id');
    }

    public function defaultOffice()
    {
        return $this->belongsTo(Office::class, 'default_office_id');
    }
}
