<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/brands/' . $this->getKey());
    }

    /* ************************ RELATION ************************* */

    public function featured()
    {
        return $this->hasMany(Product::class, 'brand_id')
            ->where('products.type', 'featured');
    }

    public function upcoming()
    {
        return $this->hasMany(Product::class, 'brand_id')
        ->where('products.type', 'upcoming');
    }

    public function newModels()
    {
        return $this->hasMany(Product::class, 'brand_id')
        ->where('products.type', 'newModel');
    }

    public function other()
    {
        return $this->hasMany(Product::class, 'brand_id')
        ->where('products.type', 'other');
    }
}
