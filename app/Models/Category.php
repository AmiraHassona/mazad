<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function parent()
    {
        if($this->parent_id != null){
           return Category::where('id',$this->parent_id)->first()->name;
        }else{
           return "";
        }
        //return $this->belongsTo(Category::class, 'parent_id');
    }

    public function sons()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
