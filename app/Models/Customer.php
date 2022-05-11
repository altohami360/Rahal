<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'gender_id', 'avatar', 'is_active'];
    
    protected $casts = ['created_at' => 'datetime:Y-m-d'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
    
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    
    public function dailyTrips()
    {
        return $this->hasMany(dailyTrip::class);
    }
}
