<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'type'];

    // Automatically generate unique slug
    public static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            $category->slug = self::generateUniqueSlug($category->name);
        });
    }

    // Function to generate a unique slug
    private static function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . rand(1000, 9999);
        }

        return $slug;
    }
}
