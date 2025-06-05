<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserGeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email_notifications',
        'sms_notifications',
        'push_notifications',
        'dark_mode',
        'language',
        'two_factor_authentication',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
