<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use App\Models\Category;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\CartDetail;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cartdetail()
    {
        return $this->belongsTo(CartDetail::class);
    }

    // public function scopeFilter($query1, $query2, $query3)
    // {
    //     if (request('search')) {
    //         return $query1->where('title', 'like', '%' . request('search') . '%');
    //     }
    //     if (request('search')) {
    //         return $query2->where('title', 'like', '%' . request('search') . '%');
    //     }
    //     if (request('search')) {
    //         return $query3->where('title', 'like', '%' . request('search') . '%');
    //     }
    // }
    static function detail_product($id)
    {
        $data = Product::where('id', $id)->first();
        return $data;
    }
}
