<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Status extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['status'];

    public $timestamps = false;

    public $translatable = ['status'];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
