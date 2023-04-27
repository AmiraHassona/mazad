<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Upload;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Stmt\TryCatch;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate('10');
        $categories = Category::select('id','name','parent_id')->get();
        $uploads= Upload::get();
        return view('admin.products.index' ,compact('products','categories','uploads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id','name','parent_id')->get();
        $brands = Brand::select('id','name')->get();
        $uploads= Upload::get();
        return view('admin.products.create',compact('categories','brands','uploads'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //dd($request->input('gallery'));
        $request->validate([
            'name' =>'required|string|min:3|max:250',
            'category_id'=>'required',
            'brand_id'=>'nullable',
            'thumbnail' =>'required',
            'gallery' =>'required',
            'price'=>'required',
            'discount'=>'nullable',
            'discount_type'=>'nullable',
            'description'=>'required',
            'featured'=>'required',
            'published'=>'required',
            'meta_title'=>'nullable',
            'meta_description'=>'nullable',
            'meta_keywords'=>'nullable',
            'meta_image' =>'nullable',
        ]);

        $gallery = $request->has('gallery') ? implode(',',$request->input('gallery')):null;
        $meta_image = $request->has('meta_image') ? implode(',',$request->input('meta_image')):null;
        $slug = str_contains($request->name,' ') ? str_replace(' ' ,'-',$request->name).'-'.rand(1000000,9999999):$request->name ;

        try{
            Product::create([
                'name' =>$request->name,
                'category_id'=>$request->category_id,
                'brand_id'=>$request->brand_id,
                'thumbnail' =>$request->thumbnail,
                'gallery' =>$gallery,
                'price'=>$request->price,
                'discount'=>$request->discount,
                'discount_type'=>$request->discount_type,
                'description'=>$request->description,
                'featured'=>$request->featured,
                'published'=>$request->published,
                'slug'=>$slug,
                'meta_title'=>$request->meta_title,
                'meta_description'=>$request->meta_description,
                'meta_keywords'=>$request->meta_keywords,
                'meta_image' =>$meta_image,
            ]);
        }catch(Exception $exception){
            //dd($exception->getMessage());
           return redirect()->route('admin.products.index')->with('error',$exception->getMessage());
        }

        return redirect()->route('admin.products.index')->with('success','product added sucessfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $uploads= Upload::get();
        return view('admin.products.show',compact('product','uploads'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::select('id','name','parent_id')->get();
        $brands = Brand::select('id','name')->get();
        $uploads= Upload::get();
        return view('admin.products.edit',compact('product','categories','brands','uploads'));
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
        $product = Product::findOrFail($id);
        $request->validate([
            'name' =>'required|string|min:3|max:250',
            'category_id'=>'required',
            'brand_id'=>'nullable',
            'thumbnail' =>'required',
            'gallery' =>'required',
            'price'=>'required',
            'discount'=>'nullable',
            'discount_type'=>'nullable',
            'description'=>'required',
            'featured'=>'required',
            'published'=>'required',
            'meta_title'=>'nullable',
            'meta_description'=>'nullable',
            'meta_keywords'=>'nullable',
            'meta_image' =>'nullable',
        ]);

        $gallery = $request->has('gallery') ? implode(',',$request->input('gallery')):null;
        $meta_image = $request->has('meta_image') ? implode(',',$request->input('meta_image')):null;
        $slug = str_contains($request->name,' ') ? str_replace(' ' ,'-',$request->name).'-'.rand(1000000,9999999):$request->name ;

        $product->name = $request->name;
        $product->category_id = $request->category_id ;
        $product->brand_id =$request->brand_id;
        $product->thumbnail = $request->thumbnail;
        $product->gallery = $gallery;
        $product->price = $request->price ;
        $product->discount = $request->discount ;
        $product->discount_type = $request->discount_type;
        $product->description = $request->description ;
        $product->featured = $request->featured;
        $product->published =$request->published;
        $product->slug = $slug;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $product->meta_image = $meta_image ;
        $product->save();

        return redirect()->route('admin.products.index')->with('success','product is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $product = Product::findOrFail($id);
       $product->delete();
       return redirect()->route('admin.products.index')->with('success','product is deleted');
    }
}
