@extends('admin.layouts.app')
@section('title','Products Dashboard')
@section('content')

<div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row p-3">
                @include('admin.includes.messages')
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 row justify-content-between ">
                    <h4>Product</h4>
                    <a href="{{route('admin.products.create')}}" class="btn btn-info btn-lg" >Add Products</a>
                </div>
            </div>
          </div>
        <div class="widget-content widget-content-area">
            <div class="">
                <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                    <thead>
                        <tr>
                            <th class="">#</th>
                            <th class="">product</th>
                            <th class="">product Image</th>
                            <th class="">Category</th>
                            <th class="">Brand</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @forelse ($products as $product)
                     <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$product->name}}</td>
                        <td>
                            @foreach ( $uploads as  $upload)
                            @if ( $upload->id == $product->thumbnail)
                                <a href="{{asset($upload->file_name)}}" target="_blank">
                                <img src="{{asset($upload->file_name)}}" alt="{{$upload->file_origan_name}}" width="100" height="100" title="{{$upload->file_origan_name}}">
                                </a>
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($categories as $category )
                              @if ($category->id == $product->category_id  )
                                 {{$category->name}} @if ($category->parent() != null)
                                 {{" / "}}
                                  @else
                                 {{'*'}}
                                  @endif
                                 {{$category->parent()}}
                              @endif
                            @endforeach
                        </td>
                        <td>{{$product->brand->name}}</td>
                        <td class="text-center">
                            <ul class="table-controls row justify-content-center list-unstyled ">
                                <div class="mr-2">
                                    <li class=""><a class="btn btn-outline-warning" href="{{route('admin.products.show',$product->id)}}" data-toggle="tooltip" data-placement="top" title="show"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-show-2 text-warning"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z"></path></svg></a></li>
                                </div>
                                <div class="mr-2">
                                <li class=""><a class="btn btn-outline-success" href="{{route('admin.products.edit',$product->id)}}" data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                </div>
                                <div>
                                <li>
                                <form action="{{route('admin.products.destroy',$product->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                     <button class="btn btn-outline-danger btn-flat show_confirm" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                                 </form>
                                </li>
                                </div>
                            </ul>
                        </td>
                    </tr>
                     @empty
                    <tr>
                        <td colspan="6">No Data Yet </td>
                    </tr>
                     @endforelse
                    </tbody>
                </table>
{{$products->links()}}
        </div>
@endsection
