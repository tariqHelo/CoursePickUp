@extends('dashbord.layouts')
@section('title')
<title>Edit Article</title>
@endsection
@section('content')


<div class="content-wrapper">
    <h2 class="pb-2">Edit Article :</h2>
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

        <form method="POST" action="{{route('articles.update',$data->id)}}" class="ml-1 mt-1 mr-1"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title En</label>
                <input required  type="text" name="titleEn" value="{{ old('titleEn') ? old('titleEn') : $data->titleEn}}" class="form-control" id="textbox2"
                    placeholder="Title En ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title Ar</label>
                <input required  type="text" name="titleAr" value="{{ old('titleAr') ? old('titleAr') : $data->titleAr}}" class="form-control" id="textbox2"
                    placeholder="Title Ar ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Slug En</label>
                <input required  type="text" name="slugEn" value="{{ old('slugEn') ? old('slugEn') : $data->slugEn}}" class="form-control" id="textbox2"
                    placeholder="Slug ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Slug Ar</label>
                <input required  type="text" name="slugAr" value="{{ old('slugAr') ? old('slugAr') : $data->slugAr}}" class="form-control" id="textbox2"
                    placeholder="Slug ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Meta description En</label>
                <input required  type="text" name="metaDescriptionEn" value="{{ old('metaDescriptionEn') ? old('metaDescriptionEn') : $data->metaDescriptionEn}}"
                    class="form-control" id="textbox2" placeholder="Meta description En" />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Meta description Ar</label>
                <input required  type="text" name="metaDescriptionAr" value="{{ old('metaDescriptionAr') ? old('metaDescriptionAr') : $data->metaDescriptionAr}}"
                    class="form-control" id="textbox2" placeholder="Page Title Ar" />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Page Title En</label>
                <input required  type="text" name="pageTitleEn" value="{{ old('pageTitleEn') ? old('pageTitleEn') : $data->pageTitleEn}}" class="form-control"
                    id="textbox2" placeholder="Page Title En" />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Page Title Ar</label>
                <input required  type="text" name="pageTitleAr" value="{{ old('pageTitleAr') ? old('pageTitleAr') : $data->pageTitleAr}}" class="form-control"
                    id="textbox2" placeholder="Meta description Ar" />
            </fieldset>
            <fieldset class="form-group form-group-style">
                @error('image')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
                <label for="image">Choose Main image</label>
                <input type="File" name="image" value="{{ old('image') ? old('image') : $data->image}}" class="form-control" id="image" />
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
                                        <textarea name="contentEn" id="contentEn"
                                            class="tinymce-classic">{{ old('contentEn') ? old('contentEn') : $data->contentEn}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Classic Editor end -->

            <fieldset class="mb-1 form-group-style">
                <label>Content Ar :</label>
            </fieldset>

            <section id="classic">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="form-group">
                                        <textarea name="contentAr"
                                            class="tinymce-classic">{{ old('contentAr') ? old('contentAr') : $data->contentAr}}</textarea>
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
                            <input required  type="radio" name="featured" @if($data->featured == 1) checked @endif
                            value="1" class="custom-control-input" id="yes" />
                            <label class="custom-control-label" for="yes">Yes</label>
                        </div>
                        <div class="d-inline-block custom-control custom-radio">
                            <input required  type="radio" name="featured" @if($data->featured == 0) checked @endif
                            value="0" class="custom-control-input" id="no" />
                            <label class="custom-control-label" for="no">No</label>
                        </div>
                    </div>
                </div>
                <label class="col-md-3 label-control mt-2">Status :</label>
                <div class="col-md-9 mx-auto mt-2">
                    <div class="input-group">
                        <div class="d-inline-block custom-control custom-radio mr-1">
                            <input required  type="radio" name="status" @if($data->status == 1) checked @endif value="1"
                            class="custom-control-input" id="yess" />
                            <label class="custom-control-label" for="yess">Published</label>
                        </div>
                        <div class="d-inline-block custom-control custom-radio">
                            <input required  type="radio" name="status" @if($data->status == 0) checked @endif value="0"
                            class="custom-control-input" id="nos" />
                            <label class="custom-control-label" for="nos">Draft</label>
                        </div>
                    </div>
                </div>
                <label class="col-md-3 label-control mt-2">Languages :</label>
                <div class="col-md-9 mx-auto mt-2">
                    <div class="input-group">
                        <div class="d-inline-block custom-control mr-1">
                              <input type="checkbox" name="lang[]" value="en" class="custom-control-input" {{ !old('lang') ? ($data->en ? 'checked' : '' ) : ( collect(old('lang'))->contains('en') ? 'checked' : '')  }} id="en" />
                            <label class="custom-control-label" for="en">English</label>
                        </div>
                        <div class="d-inline-block custom-control mr-1">
                              <input type="checkbox" name="lang[]" value="ar" class="custom-control-input" {{ !old('lang') ? ($data->ar ? 'checked' : '' ) : ( collect(old('lang'))->contains('ar') ? 'checked' : '')  }} id="ar" />
                            <label class="custom-control-label" for="ar">Arabic</label>
                        </div>
                        <small class="text-danger">* Choose at least one language</small>
                    </div>
                </div>
            </div>

            <fieldset class="mb-1"></fieldset>
            <fieldset class="form-group form-group-style mb-1">
                <label>Published Date [ {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->date)->format('Y-m-d') }} ]:</label>
                <input  type="date" name="date" value="{{ old('date') ? old('date') : (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->date)->format('Y-m-d'))}}" class="form-control" id="dateTime" />
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