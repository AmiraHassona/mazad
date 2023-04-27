@extends('admin.layouts.app')
@section('title','Uploads Dashboard')
@section('content')

<div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row p-3">
                @include('admin.includes.messages')
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 row justify-content-between ">
                    <h4>Images</h4>
                    <a href="{{route('admin.uploads.create')}}" class="btn btn-info btn-lg" >Add Countries</a>
                </div>
            </div>
          </div>
        <div class="widget-content widget-content-area">
            <div class="row">

                     @forelse ($uploads as $upload)
                     <div class="col-3">
                     <div class="card component-card_2">
                        <img src="{{asset($upload->file_name)}}" class="card-img-top" alt="{{$upload->file_origan_name}}" height="150rem">
                        <div class="card-body">
                            <h5 class="card-title">{{$upload->file_origan_name}}</h5>
                            <form action="{{route('admin.uploads.destroy',$upload->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                     <button class="btn btn-danger btn-flat show_confirm" type="submit" data-toggle="tooltip" data-placement="top" title="Delete">Delete</button>
                            </form>
                        </div>
                    </div>
                    </div>
                     @empty
                    <div class="col-12">
                        <h4 class=""> No Images Yet !</h4>
                    </div>
                     @endforelse

            </div>
{{$uploads->links()}}

@endsection

