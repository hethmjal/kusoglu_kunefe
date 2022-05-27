<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','price','image','category_id'
    ];

    public function getImageProductAttribute(){
        return asset('uploads/'.$this->image);
    }

    public function category(){
      return  $this->belongsTo(Category::class);
    }
    
    public function order()
    {
        return $this->hasOne(Order::class);
    }
}