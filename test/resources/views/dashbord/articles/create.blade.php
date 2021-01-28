@extends('dashbord.layouts')
@section('title')
<title>Add Article </title>
@endsection
@section('content')

<div class="content-wrapper">
    <h2 class="pb-2">Add Article :</h2>
    <div class="card ">

        @if($errors->any())
        <div class="col-12 mt-2">
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <div> {{ $error }} </div>
                @endforeach
            </div>
        </div>
        @endif

        <form method="POST" action="{{route('articles.store')}}" class="ml-1 mt-1 mr-1" enctype="multipart/form-data">
            @csrf

            <fieldset class="form-group form-group-style">
                <label for="titleEn">Title En</label>
                  <input required    type="text" name="titleEn" class="form-control" value="{{old('titleEn')}}" id="titleEn" placeholder="Title En ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="titleAr">Title Ar</label>
                  <input required    type="text"  name="titleAr"  class="form-control" value="{{old('titleAr')}}" id="titleAr" placeholder="Title Ar ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="slugEn">Slug En</label>
                  <input required    type="text"  name="slugEn"  class="form-control" value="{{old('slugEn')}}" id="slugEn" placeholder="Slug ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="slugAr">Slug Ar</label>
                  <input required    type="text"  name="slugAr"  class="form-control" value="{{old('slugAr')}}" id="slugAr" placeholder="Slug ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="metaDescriptionEn">Meta description En</label>
                  <input required    type="text"  name="metaDescriptionEn"  class="form-control" value="{{old('metaDescriptionEn')}}" id="metaDescriptionEn" placeholder="Meta description En" />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="metaDescriptionAr">Meta description Ar</label>
                  <input required    type="text"  name="metaDescriptionAr"  class="form-control" value="{{old('metaDescriptionAr')}}" id="metaDescriptionAr" placeholder="Page Title Ar" />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="pageTitleEn">Page Title En</label>
                  <input required    type="text"  name="pageTitleEn"  class="form-control" value="{{old('pageTitleEn')}}" id="pageTitleEn" placeholder="Page Title En" />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="pageTitleAr">Page Title Ar</label>
                  <input required    type="text"  name="pageTitleAr"  class="form-control" value="{{old('pageTitleAr')}}" id="pageTitleAr" placeholder="Meta description Ar" />
            </fieldset>
            <fieldset class="form-group form-group-style">
                @error('image')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <label for="image">Choose Main image</label>
                  <input required   type="File"  name="image"  class="form-control" id="image" value="{{old('image')}}" />
            </fieldset>
            
            <fieldset class="mb-1 form-group-style">
                <label for="contentEn">Content En :</label>
            </fieldset>
            
            <!-- Classic Editor start -->
            <section id="classic">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="form-group">
                                        <textarea  name="contentEn" id="contentEn"  class="tinymce-classic">{{old('contentEn')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Classic Editor end -->
            
            <fieldset class="mb-1 form-group-style">
                <label for="contentAr">Content Ar :</label>
            </fieldset>
            
            <section id="classic">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="form-group">
                                        <textarea  name="contentAr" id="contentAr"  class="tinymce-classic">{{old('contentAr')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <div class="row form-group-style">
                <label class="col-md-3 label-control">Featured main page :</label>
                <div class="col-md-9 mx-auto">
                    <div class="input-group">
                        <div class="d-inline-block custom-control custom-radio mr-1">
                              <input required    type="radio" name="featured" value="1" class="custom-control-input" checked="" id="yes" />
                            <label class="custom-control-label" for="yes">Yes</label>
                        </div>
                        <div class="d-inline-block custom-control custom-radio">
                              <input required    type="radio" name="featured" value="0" class="custom-control-input" id="no" />
                            <label class="custom-control-label" for="no">No</label>
                        </div>
                    </div>
                </div>
                <label class="col-md-3 label-control mt-2">Status :</label>
                <div class="col-md-9 mx-auto mt-2">
                    <div class="input-group">
                        <div class="d-inline-block custom-control custom-radio mr-1">
                              <input required    type="radio" name="status" value="1" class="custom-control-input" checked="" id="yess" />
                            <label class="custom-control-label" for="yess">Published</label>
                        </div>
                        <div class="d-inline-block custom-control custom-radio">
                              <input required    type="radio" name="status" value="0" class="custom-control-input" id="nos" />
                            <label class="custom-control-label" for="nos">Draft</label>
                        </div>
                    </div>
                </div>
                <label class="col-md-3 label-control mt-2">Languages :</label>
                <div class="col-md-9 mx-auto mt-2">
                    <div class="input-group">
                        <div class="d-inline-block custom-control mr-1">
                              <input type="checkbox" name="lang[]" value="en" class="custom-control-input" {{ !old('lang') ? 'checked' : ( collect(old('lang'))->contains('en') ? 'checked' : '')  }} id="en" />
                            <label class="custom-control-label" for="en">English</label>
                        </div>
                        <div class="d-inline-block custom-control mr-1">
                              <input type="checkbox" name="lang[]" value="ar" class="custom-control-input" {{ !old('lang') ? 'checked' : ( collect(old('lang'))->contains('ar') ? 'checked' : '')  }} id="ar" />
                            <label class="custom-control-label" for="ar">Arabic</label>
                        </div>
                        <small class="text-danger">* Choose at least one language</small>
                    </div>
                </div>
            </div>
            
            <fieldset class="mb-1"></fieldset>
            <fieldset class="form-group form-group-style mb-1">
                <label>Published Date :</label>
                  <input required    type="date" name="date" class="form-control" id="dateTime" value="{{old('date')}}"/>
            </fieldset>
            
            <div class="form-actions text-center">
                <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;"><i class="ft-x"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
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