<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Color extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name'];

    public $timestamps = false;

    public $translatable = ['name'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
