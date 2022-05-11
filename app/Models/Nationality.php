<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Nationality extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['country_code', 'country', 'nationality'];

    public $translatable = ['country', 'nationality'];

    public $timestamps = false;

    public function driver()
    {
        return $this->hasMany(Driver::class);
    }

}
