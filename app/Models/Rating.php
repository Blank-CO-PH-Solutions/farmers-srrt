<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'service_request_id',
    'farmer_id',
    'rating',
    'comment',
])]
class Rating extends Model
{
    public function serviceRequest()
    {
        return $this->belongsTo(ServiceRequest::class);
    }

    public function farmer()
    {
        return $this->belongsTo(User::class, 'farmer_id');
    }
}
