<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = ['seller_id', 'item', 'quantity', 'price','date'];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
