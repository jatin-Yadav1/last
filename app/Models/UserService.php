<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserService extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'service_name',
        'price',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
