<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'user_id',
        // 'destination_id',
        'category_bus_id',
        'code',
        'destination',
        'departure_date',
        'arrival_date',
        'pickup-time',
        'longitude',
        'latitude',
    ];

    public function admin()
    {
        return $this->belongsTo(admin::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category_bus()
    {
        return $this->belongsTo(category_bus::class);
    }
}
