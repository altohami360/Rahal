<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = ['net_balance', 'balance', 'tax', 'tax_rate', 'tax_rate_id', 'user_id', 'driver_id'];

    protected $casts = ['created_at' => 'datetime:Y-m-d'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function taxRate()
    {
        return $this->belongsTo(TaxRate::class);
    }
}
