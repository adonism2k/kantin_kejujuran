<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'item_id',
        'quantity',
        'price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->price;
    }

    public function getTotalPriceFormattedAttribute()
    {
        return number_format($this->total_price, 2, ',', '.');
    }

    public function getPriceFormattedAttribute()
    {
        return number_format($this->price, 2, ',', '.');
    }
}
