<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate('10');
        return view('admin.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
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
            'name'      =>'required|string|min:3|max:250',
            'image'     => 'nullable|file',
          ]);

          Brand::create([
            'name'     =>$request->name,
            'image'    => $request->hasFile('image') ? $this->uploadImage($request->file('image'),'images/brands'): null
          ]);
          return redirect()->route('admin.brands.index')->with('success','brand added sucessfuly');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $request->validate([
            'name'  =>'required|string|min:3|max:250',
            'image' =>'nullable|file',
        ]);

        if($request->has('image')){
          File::delete($brand->image);
          $brand->image  = $this->uploadImage($request->file('image'),'images/brands');
        }

        $brand->name = $request->name;
        $brand->save();

        return redirect()->route('admin.brands.index')->with('success','brand is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        File::delete($brand->image);
        $brand->delete();
        return redirect()->route('admin.brands.index')->with('success','brand is deleted');
    }
}
