<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kantor_cabang extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'address',
        'location',
        'staff_id',
    ];

    public function staff()
    {
        return $this->belongsTo(staff::class);
    }

    public function category_bus()
    {
        return $this->hasMany(category_bus::class);
    }

    public function bus()
    {
        return $this->hasMany(bus::class);
    }

    public function destination()
    {
        return $this->hasMany(destination::class);
    }

    public function transaction()
    {
        return $this->hasMany(transaction::class);
    }
}
