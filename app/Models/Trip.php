<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable =[
        'pickup_address', 
        'pickup_latitude', 
        'pickup_longitude', 
        'dropoff_address', 
        'dropoff_latitude', 
        'dropoff_longitude', 
        'note', 
        'distance', 
        'cost', 
        'service_id', 
        'driver_id', 
        'customer_id',
        'status_id'
    ];

    protected $casts = ['created_at' => 'datetime:Y-m-d h:m'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
