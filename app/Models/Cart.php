<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    // public function detail()
    // {
    //     return $this->hasMany('App\CartDetail', 'cart_id');
    // }

    // public function updatetotal($itemcart, $subtotal)
    // {
    //     $this->attributes['subtotal'] = $itemcart->subtotal + $subtotal;
    //     $this->attributes['total'] = $itemcart->total + $subtotal;
    //     self::save();
    // }
}
