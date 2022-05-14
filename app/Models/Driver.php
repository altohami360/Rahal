<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'personal_ID',
        'name',
        'email',
        'phone',
        'password',
        'gender_id',
        'birthday',
        'image',
        'identification_card_image', 
        'current_balance',
        'nationality_id', 
        'car_id', 
        // 'service_id', 
        'is_active'
    ];

    protected $appends = ['age'];

    protected $casts = ['created_at' => 'datetime:Y-m-d'];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->birthday)->age;
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function cars()
    {
        return $this->hasOne(Car::class);
    }

    // public function service()
    // {
    //     return $this->belongsTo(Service::class);
    // }

    
    public function balances()
    {
        return $this->hasMany(Balance::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function dailyTrips()
    {
        return $this->hasMany(dailyTrip::class);
    }
    
}
