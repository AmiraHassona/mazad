<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Traits\ImagePackageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CountryController extends Controller
{
    use ImagePackageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::paginate('10');
        return view ('admin.countries.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');
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
            'name' =>'required|string|min:3|max:250',
            'flag' =>'required|file|mimes:jpg,jpeg,png,gif,svg|max:2048',
          ]);

        Country::create([
            'name'  => $request->name,
            'flag'  => $request->hasFile('flag') ? $this->uploadImagePackege($request->file('flag'),  'uploads/thumbnail'): null
        ]);

        return redirect()->route('admin.countries.index')->with('success','country added sucessfuly');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.countries.edit',compact('country'));
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
        $country = Country::findOrFail($id);

        $request->validate([
            'name'  =>'required|string|min:3|max:250',
            'flag' =>'required|file|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        if($request->has('flag')){
          File::delete($country->flag);
          $country->flag  = $this->uploadImagePackege($request->file('flag'), 'uploads/thumbnail');
        }

        $country->name = $request->name;
        $country->save();

        return redirect()->route('admin.countries.index')->with('success','country is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        File::delete($country->flag);
        $country->delete();
        return redirect()->route('admin.countries.index')->with('success','country is deleted');
    }
}
