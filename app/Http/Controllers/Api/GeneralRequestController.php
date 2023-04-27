<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class GeneralRequestController extends Controller
{
    use ResponseTrait;

    public function categories(){
       return $this->returnData('categories',Category::select('id','name','image')->get());
    }

    public function brands(){
       return $this->returnData('brands',Brand::select('id','name','image')->get());
    }

    public function searchCategory($name){

       return $this->returnData('serch-categories',Category::where('name','like','%'.$name.'%')->get());

    }

    public function searchBrand($name){
        return $this->returnData('search-brand',Brand::where('name','like','%'.$name.'%')->get());
    }
}
