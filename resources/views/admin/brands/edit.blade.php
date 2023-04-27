@extends('admin.layouts.app')
@section('title','Brands Dashboard')
@section('content')

 <div class="row col-lg-12 col-12 layout-spacing">
      <div id="flFormsGrid" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Brand Form</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="{{route('admin.brands.update',$brand->id)}}" method="post" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                        <div class="form-group">
                             <label for="input1">Brand</label>
                             <input type="text" class="form-control" id="input1" placeholder="Enter Name" name="name" value="{{$brand->name}}">
                         </div>
                        <div class="form-group ">
                        @if (!$brand->image == null)
                        <a href="{{asset($brand->image)}}" target="_blank">
                        <img src="{{asset($brand->image)}}" alt="{{$brand->name}}" width="100" height="100" title="{{$brand->name}}">
                        </a>
                        @endif
                        </div>
                        <div class="form-group ">
                            <label for="customFile">Image</label>
                            <div class="custom-file mb-4">
                                <input type="file" class="custom-file-input" id="customFile" placeholder="Enter Image" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
               </div>
            </div>
      </div>
 </div>

@endsection
