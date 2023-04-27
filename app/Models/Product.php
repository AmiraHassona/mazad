<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function orderdetails(){
        return $this->hasMany(OrderDetail::class);
    }

    public function gallery() {
        if ($this->gallery != null) {
            $images = [];
            foreach(explode(',', $this->gallery) as $gallery) {
                $images[] = Upload::find($gallery);
            }
            return $images;
        } else {
            return [];
        }
    }

    // to gget last 3 categories : Category::latest()->take(3)->get()
    // to ge
}
