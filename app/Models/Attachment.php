<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'service_request_id',
    'uploaded_by',
    'file_name',
    'file_path',
    'file_type',
])]
class Attachment extends Model
{
    /**
     * @return BelongsTo<ServiceRequest,Attachment>
     */
    public function serviceRequest(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ServiceRequest::class);
    }
    /**
     * @return BelongsTo<User,Attachment>
     */
    public function uploadedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
