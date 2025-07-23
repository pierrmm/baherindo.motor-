<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'birth_date',
        'gender',
        'id_number',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function getAgeAttribute()
    {
        return $this->birth_date ? Carbon::parse($this->birth_date)->age : null;
    }
}