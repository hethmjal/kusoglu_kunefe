<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'price',
        'quantity',
        'table',
        'is_parent'
        , 'parent_id'

    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function children()
    {
        return $this->hasMany(Order::class,'parent_id','id');
    }

    public function parent()
    {
        return $this->belongsTo(Order::class,'parent_id','id');
    }
}