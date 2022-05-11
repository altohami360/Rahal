<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['rating', 'comment', 'customer_id', 'trip_id'];

    protected $casts = ['created_at' => 'datetime:Y-m-d'];


    public function customer()
    {
        return $this->BelongsTo(Customer::class);
    }
}
