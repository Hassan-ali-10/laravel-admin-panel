<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
     protected $fillable = ['buyer_id', 'item', 'quantity', 'price','date'];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }
}
