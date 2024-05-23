<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_completed',
        'user_id',
        'completion_date',
        'coupon_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_orders')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}
