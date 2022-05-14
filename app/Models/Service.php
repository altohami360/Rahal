<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['service', 'description', 'starting_value', 'per_kilometer', 'per_minute', 'is_active'];

    public $translatable = ['service', 'description'];

    protected $casts = ['created_at' => 'datetime:Y-m-d'];

    // public function drivers()
    // {
    //     return $this->hasMany(Driver::class);
    // }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
