<?php

namespace App\Traits;

use Illuminate\Support\Str;


trait ImageUploadTrait{

   public function uploadImage($image , $directory){

     $image_extension = $image->getClientOriginalExtension();

     $image_name = time().'_'.Str::random(20).'.'.$image_extension;

     if(!is_dir($directory)){
        mkdir($directory,0777,true);
     }

     $image->move($directory , $image_name);

     return $directory.'/'.$image_name;


   }

}
