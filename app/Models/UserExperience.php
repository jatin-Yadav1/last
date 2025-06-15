<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserExperience extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'job_title',
        'company',
        'start_date',
        'end_date',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
