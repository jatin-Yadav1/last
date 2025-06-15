<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPlan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'features', // Allow mass assignment for the 'features' field
    ];

    protected $casts = [
        'features' => 'array', // Automatically cast the 'features' field to an array if it's stored as JSON
    ];
}
