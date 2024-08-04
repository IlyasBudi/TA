<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule_bus extends Model
{
    use HasFactory;
    protected $fillable = [
        'bus_id',
        'departure_date',
        'arrival_date',
    ];

    public function bus()
    {
        return $this->belongsTo(bus::class);
    }
}
