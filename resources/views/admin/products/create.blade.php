@extends('admin.layouts.app')
@section('title','Products Dashboard')
@section('content')

 <div class="row col-lg-12 col-12 layout-spacing">
      <div id="flFormsGrid" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Product Form</h4>
                        </div>
                    </div>
                </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="widget-content widget-content-area">
                   <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
                     @csrf
                        <div class="form-group">
                             <label for="input1">Product</label>
                             <input class="form-control" id="input1" placeholder="Enter Name" name="name">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                            <label for="input2">Category</label>
                            <select class="selectpicker form-control"  name="category_id">
                                 <option value="">select...</option>
                             @foreach ($categories as $category )
                                 <option value="{{$category->id}}">
                                  {{$category->name}} @if ($category->parent() != null)
                                    {{" / "}}
                                  @else
                                     {{'*'}}
                                  @endif
                                  {{$category->parent()}}
                                 </option>
                             @endforeach
                            </select>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="input3">Brand</label>
                            <select class="selectpicker form-control"  name="brand_id">
                                <option value="">select...</option>
                            @foreach ($brands as $brand )
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                            <label for="inputslug">Featured</label>
                            <div >
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="featured" class="custom-control-input" value="1">
                                <label class="custom-control-label" for="customRadioInline1">Product is featured</label>
                                </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="featured" class="custom-control-input" value="0">
                                <label class="custom-control-label" for="customRadioInline2">Product isn't featured</label>
                            </div>
                            </div>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputslug">Published</label>
                            <div >
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline" name="published" class="custom-control-input" value="1">
                                <label class="custom-control-label" for="customRadioInline">Product is published</label>
                                </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline3" name="published" class="custom-control-input" value="0">
                                <label class="custom-control-label" for="customRadioInline3">Product isn't published</label>
                            </div>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputdescription">Description</label>
                            <textarea type="text" class="form-control" id="inputdescription" placeholder="Enter description" name="description"></textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="inputprice">Price</label>
                                <input type="number" class="form-control" id="inputprice" placeholder="Product Price" name="price">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputdiscount">Discount</label>
                                <input type="number" class="form-control" id="inputdiscount" placeholder="Product Discount" name="discount">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="input3">Discount Type</label>
                                <select class="selectpicker form-control"  name="discount_type">
                                    <option value="">select...</option>
                                    <option value="fixed">Fixed</option>
                                    <option value="preccent">Percent</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4 ">
                            <div class="form-group col-md-6">
                                <label for="customFile" class="mr-3">Thumbnail</label>

                                <!-- Button trigger modal -->
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#thumbnailModal">
                                   Browse
                               </button>

                                 <!-- Modal -->
                                 <div class="modal fade" id="thumbnailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                       <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                         </button>
                                       </div>
                                       <div class="modal-body">
                                        <div class="row">
                                            @foreach ($uploads as $upload)
                                               <div class="col-4">
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="thumbnail" id="thumbnail_{{$upload->id}}" value="{{$upload->id}}">
                                                    <label class="form-check-label" for="thumbnail_{{$upload->id}}"><img src="{{asset($upload->file_name)}}" class="card-img-top m-2" alt="{{$upload->file_origan_name}}" height="100 rem" width="100 rem"></label>
                                                  </div>
                                               </div>
                                            @endforeach
                                            </div>
                                       </div>
                                       <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="customFile" class="mr-3">Gallery</label>

                                <!-- Button trigger modal -->
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#galleryModal">
                                   Browse
                               </button>

                                 <!-- Modal -->
                                 <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                       <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                         </button>
                                       </div>
                                       <div class="modal-body">
                                          <div class="row">
                                            @foreach ($uploads as $upload)
                                               <div class="col-4">
                                                 <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="gallery_{{$upload->id}}" value="{{$upload->id}}" name="gallery[]">
                                                    <label class="form-check-label" for="gallery_{{$upload->id}}"><img src="{{asset($upload->file_name)}}" class="card-img-top m-2" alt="{{$upload->file_origan_name}}" height="100 rem" width="100 rem"></label>
                                                  </div>
                                               </div>
                                            @endforeach
                                            </div>
                                        </div>
                                       <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       </div>
                                     </div>
                                   </div>
                                 </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputmete_title">Meta Title</label>
                            <input type="text" class="form-control" id="inputmete_title" placeholder="Enter Mete Title" name="meta_title">
                        </div>
                        <div class="form-group">
                            <label for="inputmeta_description">Meta Description</label>
                            <textarea type="text" class="form-control" id="inputmeta_description" placeholder="Enter Meta Description" name="meta_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputmeta_keywords">Meta Keywords</label>
                            <textarea type="text" class="form-control" id="inputmeta_keywords" placeholder="Enter Meta Keywords" name="meta_keywords"></textarea>
                        </div>
                        <div class="form-group ">
                            <label for="customFile"  class="mr-3">Meta Image</label>

                            <!-- Button trigger modal -->
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#meteImageModal">
                                Browse
                            </button>

                              <!-- Modal -->
                              <div class="modal fade" id="meteImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                       <div class="row">
                                         @foreach ($uploads as $upload)
                                            <div class="col-4">
                                              <div class="form-check form-check-inline">
                                                 <input class="form-check-input" type="checkbox" id="gallery_{{$upload->id}}" value="{{$upload->id}}" name="meta_image[]">
                                                 <label class="form-check-label" for="gallery_{{$upload->id}}"><img src="{{asset($upload->file_name)}}" class="card-img-top m-2" alt="{{$upload->file_origan_name}}" height="100 rem" width="100 rem"></label>
                                               </div>
                                            </div>
                                         @endforeach
                                         </div>
                                     </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
               </div>
            </div>
      </div>
 </div>

@endsection
