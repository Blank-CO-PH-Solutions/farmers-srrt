<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;
    use Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    #[\Override]
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    /**
     * @return HasMany<ServiceRequest,User>
     */
    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'farmer_id');
    }
    /**
     * @return HasMany<RequestStatusHistory,User>
     */
    public function statusChanges()
    {
        return $this->hasMany(RequestStatusHistory::class, 'changed_by');
    }
    /**
     * @return HasMany<Referral,User>
     */
    public function referrals()
    {
        return $this->hasMany(Referral::class, 'referred_by');
    }
}
