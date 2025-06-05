<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'device',
        'device_type',
        'browser',
        'os',
        'user_agent',
        'visit_count',
        'page_url',
        'referrer',
        'country',
        'country_code',
        'region',
        'region_name',
        'city',
        'zip',
        'latitude',
        'longitude',
        'timezone',
        'isp',
        'organization',
        'extra_data',
        'visit_time'
    ];

    protected $casts = [
        'extra_data' => 'array',
        'latitude' => 'decimal:6',
        'longitude' => 'decimal:6',
        'visit_time' => 'datetime',
    ];
    public function pages()
    {
        return $this->hasMany(VisitorPage::class);
    }
}
