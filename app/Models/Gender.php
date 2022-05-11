<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Gender extends Model
{
    use HasFactory, HasTranslations;
    
    protected $fillable = ['gender'];

    public $timestamps = false;
    
    public $translatable = ['gender'];

    public function driver()
    {
        return $this->hasOne(Driver::class);
    }

    
    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
