@extends('admin.layouts.app')
@section('title','Categories Dashboard')
@section('content')

 <div class="row col-lg-12 col-12 layout-spacing">
      <div id="flFormsGrid" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Category Form</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                     @csrf
                        <div class="form-group">
                             <label for="input1">Category</label>
                             <input type="text" class="form-control" id="input1" placeholder="Enter Name" name="name">
                         </div>
                         <div class="form-group">
                            <label for="input2">Category Parent</label>
                            <select class="selectpicker form-control"  name="parent_id">
                                <option value="">select...</option>
                            @foreach ($categories as $category )
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            </select>
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
