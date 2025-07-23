<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'motor_id',
        'customer_id',
        'user_id',
        'sale_price',
        'discount',
        'final_price',
        'payment_method',
        'status',
        'notes',
        'sale_date',
    ];

    protected $casts = [
        'sale_price' => 'decimal:2',
        'discount' => 'decimal:2',
        'final_price' => 'decimal:2',
        'sale_date' => 'date',
    ];

    public function motor()
    {
        return $this->belongsTo(Motor::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedFinalPriceAttribute()
    {
        return 'Rp ' . number_format($this->final_price, 0, ',', '.');
    }
}