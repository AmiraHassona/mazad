<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate('10');
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id','name')->get();
        return view('admin.categories.create',compact('categories'));
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
            'parent_id' => 'nullable',
            'image'     => 'nullable|file',
          ]);

          if(empty($request->parent_id)){
            $parent_id = null;
          }else{
            $parent_id = $request->parent_id;
          }

          Category::create([
            'name'     =>$request->name,
            'parent_id'=>$parent_id,
            'image'    => $request->hasFile('image') ? $this->uploadImage($request->file('image'),'images/categories') : null
          ]);
          return redirect()->route('admin.categories.index')->with('success','category added sucessfuly');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::select('id','name')->where('id','!=',$id)->get();
        return view('admin.categories.edit',compact('category','categories'));
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

        $category = Category::findOrFail($id);

        $request->validate([
            'name'=>'required|string|min:3|max:250',
            'parent_id' => 'nullable',
            'image'     => 'nullable|file',
        ]);

        if(empty($request->parent_id)){
            $category->parent_id = null;
        }

        if($request->has('image')){
          File::delete($category->image);
          $category->image  = $this->uploadImage($request->file('image'),'images/categories');
        }

        $category->name      = $request->name;
        $category->parent_id = $request->parent_id;
        $category->save();

        return redirect()->route('admin.categories.index')->with('success','category is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $category = Category::findOrFail($id);
       File::delete($category->image);
       $category->delete();
       return redirect()->route('admin.categories.index')->with('success','category is deleted');
    }
}
