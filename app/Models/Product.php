<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'price', 'quantity', 'image', 'description','brand_id',
    'unit_id',];

public function category()
{
    return $this->belongsTo(Category::class);
}
public function brand()
{
    return $this->belongsTo(Brand::class);
}
public function unit()
{
    return $this->belongsTo(Unit::class);
}
public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}
public function checkStockAlert($min = 10)
    {
        return $this->quantity <= $min;
    }
public function stockLogs()
{
    return $this->hasMany(StockLog::class);
}

}
