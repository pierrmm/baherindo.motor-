<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'year',
        'color',
        'mileage',
        'price',
        'condition',
        'status',
        'description',
        'engine_capacity',
        'transmission',
        'fuel_type',
        'images',
        'license_plate',
        'purchase_date',
        'purchase_price',
    ];

    protected $casts = [
        'images' => 'array',
        'price' => 'decimal:2',
        'purchase_price' => 'decimal:2',
        'purchase_date' => 'date',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getFullNameAttribute()
    {
        return "{$this->brand} {$this->model} {$this->year}";
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function scopeByBrand($query, $brand)
    {
        return $query->where('brand', $brand);
    }

    public function getMainImageAttribute()
    {
        if ($this->images && count($this->images) > 0) {
            return asset('storage/' . $this->images[0]);
        }
        return asset('images/no-image.jpg');
    }
}