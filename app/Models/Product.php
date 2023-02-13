<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;

class Product extends Model
{
    use HasTranslations;
    protected $fillable = [
        'assets',
        'brand_id',
        'color',
        'description',
        'name',
        'price',
        'shortName',
        'sizes',
        'type',

    ];


    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // these attributes are translatable
    public $translatable = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'sizes' => 'array',
        'assets' => 'array',
    ];

    protected $appends = ['resource_url', 'brand_name'];

    protected static $colors = [
        '#fff8e1' => "amber-50",
        '#ffecb3' => "amber-100",
        '#ffe082' => "amber-200",
        '#ffd54f' => "amber-300",
        '#ffca28' => "amber-400",
        '#ffc107' => "amber-500",
        '#ffb300' => "amber-600",
        '#ffa000' => "amber-700",
        '#ff8f00' => "amber-800",
        '#ff6f00' => "amber-900",
        '#ECEFF1' => "bluegrey-50",
        '#CFD8DC' => "bluegrey-100",
        '#B0BEC5' => "bluegrey-200",
        '#90A4AE' => "bluegrey-300",
        '#78909C' => "bluegrey-400",
        '#607D8B' => "bluegrey-500",
        '#546E7A' => "bluegrey-600",
        '#455A64' => "bluegrey-700",
        '#37474F' => "bluegrey-800",
        '#263238' => "bluegrey-900",
        '#E3F2FD' => "blue-50",
        '#BBDEFB' => "blue-100",
        '#90CAF9' => "blue-200",
        '#64B5F6' => "blue-300",
        '#42A5F5' => "blue-400",
        '#2196F3' => "blue-500",
        '#1E88E5' => "blue-600",
        '#1976D2' => "blue-700",
        '#1565C0' => "blue-800",
        '#0D47A1' => "blue-900",
    ];

    protected static $types = [
        'upcoming',
        'featured',
        'newModel',
        'other'
    ];

    public static function getTypes()
    {
        return self::$types;
    }

    public static function getColors($selectedColor = false)
    {
        $colors = collect(self::$colors);

        if ($selectedColor) {
            return [
                'id' => $selectedColor,
                'name' => self::$colors[$selectedColor]
            ];
        }

        return $colors->map(function ($val, $key) {
            $color['id'] = $key;
            $color['name'] = $val;
            return $color;
        })->values();
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/products/' . $this->getKey());
    }

    public function getBrandNameAttribute()
    {
        return $this->brand->name ?? null;
    }

    /* ************************ RELATION ************************* */

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
