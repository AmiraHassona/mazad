<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;

trait ImagePackageUploadTrait{

   public function uploadImagePackege($image, $directory){
    
    $input['file'] = rand().time().'.'.$image->getClientOriginalExtension();
    $imgFile = Image::make($image->getRealPath());
    $imgFile->resize(150, 150, function ($constraint) {
        $constraint->aspectRatio();
    })->save($directory.'/'.$input['file']);

     return $directory.'/'.$input['file'] ;

   }

}
?>
