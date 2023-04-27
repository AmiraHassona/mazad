@extends('admin.layouts.app')
@section('title','Products Dashboard')
@section('content')

<div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row p-3">
                @include('admin.includes.messages')
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 row justify-content-between ">
                    <h4>Products</h4>
                    <a href="{{route('admin.products.index')}}" class="btn btn-info btn-lg" >Back to Products</a>
                </div>
            </div>
          </div>
        <div class="widget-content widget-content-area">
            <div class="">
                <div class="card mb-3 ">
                    <div class="row ">
                        <div class="col-6 details">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
 @php
     $gallery = explode(',',$product->gallery);
     $gallery_count = count($gallery);
 @endphp
                                <ol class="carousel-indicators">
@for ($i = 0 ; $i < $gallery_count ; $i++)
<li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"  class="@if ($i == 0){{"active m"}}@endif" ></li>
@endfor
                                </ol>

                                <div class="carousel-inner">
                                @foreach ($product->gallery() as $key =>  $upload)
                                    <div class="carousel-item @if ($key == 0){{"active m"}}@endif">



                                            <img class="d-block w-50 " src="{{asset($upload->file_name)}}" alt="{{$upload->file_origan_name}}"  title="{{$upload->file_origan_name}}">



                                    </div>
                                @endforeach

                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div class="card component-card_2">

                                <div class="card-body">

                                    <h5 class="card-title"><span class="text-danger"> Name :</span> {{$product->name}}</h5>
                                    <h5 class="card-title"><span class="text-danger"> Featured :</span>@if ($product->featured==1) {{'Product is featured'}}@else {{"Product isn't featured"}} @endif </h5>
                                    <h5 class="card-title"><span class="text-danger"> Published </span>:@if ($product->published==1) {{'Product is published'}}@else {{"Product isn't published"}} @endif </h5>
                                    <h5 class="card-title"><span class="text-danger"> Price :</span> {{$product->price}} $</h5>
                                    <h5 class="card-title"><span class="text-danger"> Discount :</span> {{$product->discount}} $</h5>
                                    <h5 class="card-title"><span class="text-danger"> Discount Type :</span> {{$product->discount_type}}</h5>
                                    <h5 class="card-title"><span class="text-danger"> Slug :</span> {{$product->slug}}</h5>
                                    <h5><span class="text-danger">Product  Description :</span></h5>
                                    <p class="card-text">{{$product->description}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 meta_details  ">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active m"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="assets/img/600x300.jpg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="assets/img/600x300.jpg" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="assets/img/600x300.jpg" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div class="card component-card_2">
                                <div class="card-body">
                                    <h5 class="card-title"><span class="text-danger"> Meta title :</span> {{$product->meta_title}}</h5>
                                    <h5><span class="text-danger">Meta Description :</span></h5>
                                    <p class="card-text">{{$product->meta_description}}</p>
                                    <h5><span class="text-danger">Meta Keywords :</span></h5>
                                    <p class="card-text">{{$product->meta_keywords}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



@endsection
