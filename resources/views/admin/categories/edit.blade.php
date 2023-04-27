@extends('admin.layouts.app')
@section('title','Categories Dashboard')
@section('content')

 <div class="row col-lg-12 col-12 layout-spacing">
      <div id="flFormsGrid" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Forms Grid</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="{{route('admin.categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                        <div class="form-group">
                             <label for="input1">Category</label>
                             <input type="text" class="form-control" id="input1" placeholder="Enter Name" name="name" value="{{$category->name}}">
                         </div>
                         <div class="form-group">
                            <label for="input2">Category Parent</label>
                            <select class="selectpicker form-control" placeholder="Enter Name" name="parent_id">
                             @if ($category->parent_id != null)
                                @foreach ($categories as $categoryp )
                                <option @if( $categoryp->id == $category->parent_id) selected @endif value="{{$categoryp->id}}">{{$categoryp ->name}}</option>
                                @endforeach
                                <option value="">No parent</option>
                             @else
                                <option value="">select...</option>
                                @foreach ($categories as $categoryp )
                                <option  value="{{$categoryp->id}}">{{$categoryp ->name}}</option>
                               @endforeach
                             @endif
                            </select>
                        </div>
                        <div class="form-group ">
                        @if (!$category->image == null)
                        <a href="{{asset($category->image)}}" target="_blank">
                        <img src="{{asset($category->image)}}" alt="{{$category->name}}" width="100" height="100" title="{{$category->name}}">
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
