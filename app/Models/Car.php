<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_type_id', 
        'model', 
        'plate_number', 
        'color_id', 
        'car_image_front', 
        'car_image_back', 
        'car_image_left', 
        'car_image_right', 
        'car_insurance_image'
    ];

    // protected $casts = ['car_image' => 'json'];

    public function carType()
    {
        return $this->belongsTo(CarType::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
