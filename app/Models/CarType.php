<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CarType extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['type'];

    public $translatable = ['type'];

    public $timestamps = false;

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
