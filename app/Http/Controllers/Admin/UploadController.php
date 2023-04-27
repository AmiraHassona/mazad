<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Traits\ImagePackageUploadTrait;
use PHPUnit\TextUI\XmlConfiguration\UpdateSchemaLocationTo93;

class UploadController extends Controller
{
    use ImagePackageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uploads = Upload::paginate('12');
        return view('admin.uploads.index',compact('uploads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.uploads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required',
            'images.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048',
        ]);

        if($request->hasFile('images')){
        foreach($request->file('images') as $image){
          Upload::create([
           'file_origan_name'=>$image->getClientOriginalName(),
           'file_name'=>$this->uploadImagePackege($image,'uploads'),
          ]);
        }
         return redirect()->route('admin.uploads.index')->with('success','images added sucessfuly');
        }else{
         return redirect()->route('admin.uploads.index')->with('error','no images send');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upload =Upload::findOrFail($id);
        File::delete($upload->file_name);
        $upload->delete();
        return redirect()->route('admin.uploads.index')->with('success','image is deleted');
    }
}
