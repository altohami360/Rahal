<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Nat extends Model
{
    use HasFactory, HasTranslations;
    
    protected $fillable = ['country_code', 'country', 'nationality'];

    public $translatable = ['country', 'nationality'];

}
