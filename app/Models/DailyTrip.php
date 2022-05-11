<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyTrip extends Model
{
    use HasFactory;

    protected $fillable = [
        'pickup_address',
        'pickup_latitude',
        'pickup_longitude',
        'dropoff_address',
        'dropoff_latitude',
        'dropoff_longitude',
        'note',
        'distance',
        'cost',
        'total_cost',
        'round_trip',
        'time_go',
        'time_back',
        'week_days',
        'driver_id',
        'customer_id',
    ];

    protected $casts = [
        'week_days' => 'array',
        'created_at' => 'datetime:Y-m-d'
    ];

    
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
