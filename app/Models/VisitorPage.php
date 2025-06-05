<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorPage extends Model
{
    use HasFactory;

    protected $fillable = ['visitor_id', 'page_url', 'referrer'];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
}
