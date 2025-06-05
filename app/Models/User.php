<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'username',
        'email_verified_at',
        'alternate_email',
        'alternate_email_verified_at',
        'account_number',
        'password',
        'number',
        'number_verified_at',
        'alternate_number',
        'alternate_number_verified_at',
        'logo',
        'image',
        'status',
        'heading',
        'bio',
        'full_address'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'alternate_email_verified_at' => 'datetime',
        'number_verified_at' => 'datetime',
        'alternate_number_verified_at' => 'datetime',
        'status' => 'boolean',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getLogoAttribute($value)
    {
        return $value ? asset('storage/' . $value) : asset('assets/images/image.png');
    }

    public function getImageAttribute($value)
    {
        return $value ? asset('storage/' . $value) : asset('assets/images/image.png');
    }
}
