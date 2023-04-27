@extends('admin.layouts.app')
@section('title','Uploads Dashboard')
@section('css')
<link href="{{asset('assets/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

 <div class="row col-lg-12 col-12 layout-spacing">
      <div id="flFormsGrid" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Uploads Form</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="{{route('admin.uploads.store')}}" method="post" enctype="multipart/form-data">
                     @csrf
                        <div class="custom-file-container form-group " data-upload-id="mySecondImage">
                            <label>Images <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" name="images[]"  class="custom-file-container__custom-file__custom-file-input" multiple>
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
               </div>
            </div>
      </div>
 </div>

@endsection
@section('js')
<script src="{{asset('assets/assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('assets/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
<script>
var secondUpload = new FileUploadWithPreview('mySecondImage')
</script>
@endsection
