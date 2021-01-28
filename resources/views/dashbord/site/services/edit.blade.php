@extends('dashbord.layouts') @section('title')
<title>Add Service</title>
@endsection
@section('content')
<div class="content-wrapper">
    <h2 class="pb-2">Add Service :</h2>
    <div class="card ">

        <form id="formAdd" action="{{route('services.update',$data->id)}}" method="POST" enctype="multipart/form-data"
            class="ml-1 mt-1 mr-1">
            @method('PUT')
            @csrf
            <fieldset class="form-group form-group-style ">
                @if($errors->has('titleEn'))
                    <div class="error text-danger">{{ $errors->first('titleEn') }}</div>
                @endif
                <label for="textbox2">Title En</label>
                <input required  type="text" class="form-control" value="{{$data->titleEn}}" name="titleEn" id="textbox2"
                    placeholder="Title En ....">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                @if($errors->has('titleAr'))
                    <div class="error text-danger">{{ $errors->first('titleAr') }}</div>
                @endif
                <label for="textbox2">Title Ar</label>
                <input required  type="text" class="form-control" value="{{$data->titleAr}}" name="titleAr" id="textbox2"
                    placeholder="Title Ar ....">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                @if($errors->has('pageTitleEn'))
                    <div class="error text-danger">{{ $errors->first('pageTitleEn') }}</div>
                @endif
                <label for="textbox2">Page Title En</label>
                <input required  type="text" class="form-control" value="{{$data->pageTitleEn}}" name="pageTitleEn" id="textbox2"
                    placeholder="Title Ar ....">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                @if($errors->has('pageTitleAr'))
                    <div class="error text-danger">{{ $errors->first('pageTitleAr') }}</div>
                @endif
                <label for="textbox2">Page Title Ar</label>
                <input required  type="text" class="form-control" value="{{$data->pageTitleAr}}" name="pageTitleAr" id="textbox2"
                    placeholder="Title Ar ....">
            </fieldset>
            <fieldset class="form-group">
                @if($errors->has('icon'))
                    <div class="error text-danger">{{ $errors->first('icon') }}</div>
                @endif
                <div class="custom-file">
                    <input  type="file" name="icon" value="{{$data->icon}}" class="custom-file-input"
                        id="inputGroupFile1">
                    <label class="custom-file-label" for="inputGroupFile1" aria-describedby="inputGroupFile1">Choose
                        icon</label>
                </div>
            </fieldset>
            <fieldset class="form-group form-group-style ">
                @if($errors->has('shortDescriptionEn'))
                    <div class="error text-danger">{{ $errors->first('shortDescriptionEn') }}</div>
                @endif
                <label for="textbox2">Short description En</label>
                <input required  type="text" class="form-control" value="{{$data->shortDescriptionEn}}" name="shortDescriptionEn"
                    id="textbox2" placeholder="">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                @if($errors->has('shortDescriptionAr'))
                    <div class="error text-danger">{{ $errors->first('shortDescriptionAr') }}</div>
                @endif
                <label for="textbox2">Short description Ar</label>
                <input required  type="text" class="form-control" value="{{$data->shortDescriptionAr}}" name="shortDescriptionAr"
                    id="textbox2" placeholder="">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                @if($errors->has('slugEn'))
                    <div class="error text-danger">{{ $errors->first('slugEn') }}</div>
                @endif
                <label for="textbox2">Slug En</label>
                <input required  type="text" class="form-control" value="{{$data->slugEn}}" name="slugEn" id="textbox2"
                    placeholder="Slug ....">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                @if($errors->has('slugAr'))
                    <div class="error text-danger">{{ $errors->first('slugAr') }}</div>
                @endif
                <label for="textbox2">Slug Ar</label>
                <input required  type="text" class="form-control" value="{{$data->slugAr}}" name="slugAr" id="textbox2"
                    placeholder="Slug ....">
            </fieldset>

            <fieldset class="form-group">
                @if($errors->has('image'))
                    <div class="error text-danger">{{ $errors->first('image') }}</div>
                @endif
                <div class="custom-file">
                    <input  type="file" name="image" value="{{$data->image}}" class="custom-file-input"
                        id="inputGroupFile02">
                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFile02">Choose
                        image</label>
                </div>
            </fieldset>

            <fieldset class="mb-1 form-group-style ">
                @if($errors->has('contentEn'))
                    <div class="error text-danger">{{ $errors->first('contentEn') }}</div>
                @endif
                <label>Content En :</label>
            </fieldset>

            <section id="classic">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="form-group">
                                        <textarea name="contentEn"
                                            class="tinymce-classic">{{$data->contentEn}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <fieldset class="mb-1 form-group-style ">
                @if($errors->has('contentAr'))
                    <div class="error text-danger">{{ $errors->first('contentAr') }}</div>
                @endif
                <label for="contentAr">Content Ar :</label>
            </fieldset>

            <section id="classic">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="form-group">
                                        <textarea id="contentAr" name="contentAr"
                                            class="tinymce-classic">{{$data->contentAr}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="row form-group-style">
            </div>

            <fieldset class="form-group">
                <div class="custom-file">
                    <input   type="file" name="brochure" value="{{$data->brochure}}" class="custom-file-input"
                        id="inputGroupFile3">
                    <label class="custom-file-label" for="inputGroupFile3" aria-describedby="inputGroupFile3">Choose
                        Brochure</label>
                </div>
            </fieldset>
            <fieldset class="mb-1  ">
            </fieldset>


            <div class="form-actions text-center">
                 <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;">
                    <i class="ft-x"></i> Cancel
                </button>
                <button onclick="document.getElementById('formAdd').submit()" type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> Save
                </button>
            </div>

        </form>
    </div>
</div>


<!-- Include the Quill library -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script src="{{ asset('dash/app-assets/vendors/js/editors/tinymce/tinymce.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('dash/app-assets/js/scripts/editors/editor-tinymce.js')}}"></script>

<!-- Initialize Quill editor -->
<script>
    var quill = new Quill('#editor-english', {
        theme: 'snow'
    });
    var quills = new Quill('#editor-arab', {
        theme: 'snow'
    });
</script>
@endsection