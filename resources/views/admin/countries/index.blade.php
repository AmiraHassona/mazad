@extends('admin.layouts.app')
@section('title','Countries Dashboard')
@section('content')

<div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row p-3">
                @include('admin.includes.messages')
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 row justify-content-between ">
                    <h4>Countries</h4>
                    <a href="{{route('admin.countries.create')}}" class="btn btn-info btn-lg" >Add Countries</a>
                </div>
            </div>
          </div>
        <div class="widget-content widget-content-area">
            <div class="">
                <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                    <thead>
                        <tr>
                            <th class="">#</th>
                            <th class="">Country</th>
                            <th class="">Country Flag</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @forelse ($countries as $country)
                     <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$country->name}}</td>
                        <td>
                            @if (!$country->flag == null)
                               <a href="{{asset($country->flag)}}" target="_blank">
                                <img src="{{asset($country->flag)}}" alt="{{$country->name}}" width="100" height="100" title="{{$country->name}}">
                                </a>
                            @endif
                        </td>
                        <td class="text-center">
                            <ul class="table-controls row justify-content-center list-unstyled ">
                                <div class="mr-2">
                                <li class=""><a class="btn btn-outline-success" href="{{route('admin.countries.edit',$country->id)}}" data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                </div>
                                <div>
                                <li>
                                <form action="{{route('admin.countries.destroy',$country->id)}}" method="post">
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
                        <td colspan="4">No Data Yet </td>
                    </tr>
                     @endforelse
                    </tbody>
                </table>
{{$countries->links()}}
        </div>
@endsection


