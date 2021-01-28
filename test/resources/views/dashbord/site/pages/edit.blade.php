@extends('dashbord.layouts') @section('title')
<title>Edit page</title>
@endsection 
@section('content')
<div class="content-wrapper">
    <h2 class="pb-2">Edit page ({{$data->first()->titleEn}}):</h2>
    <div class="card">
        <form method="POST" action="{{route('pages.update',$data->first()->id)}}" class="ml-1 mt-1 mr-1">
            @csrf
            @method('PUT')
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title En</label>
                <input required  type="text" class="form-control" value="{{$data->first()->titleEn}}" name="titleEn" id="textbox2" placeholder="Title En ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title Ar</label>
                <input required  type="text" class="form-control" value="{{$data->first()->titleAr}}" name="titleAr" id="textbox2" placeholder="Title Ar ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Slug Ar</label>
                <input required  type="text" class="form-control" value="{{$data->first()->slugAr}}" name="slugAr" id="textbox2" placeholder="Slug Ar" />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Slug En</label>
                <input required  type="text" class="form-control" value="{{$data->first()->slugEn}}" name="slugEn" id="textbox2" placeholder="Slug En" />
            </fieldset>

           

            <fieldset class="form-group">
                <div class="custom-file">
                    <input  type="file" value="{{$data->first()->image}}"  name="image" class="custom-file-input" id="inputGroupFile02">
                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFile02">Choose page image</label>
                </div>
            </fieldset>

            <fieldset class="mb-1 form-group-style">
                <label>Content En :</label>
            </fieldset>

            <section id="classic">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="form-group">
                                        <textarea class="tinymce-classic" name="contentEn">{{$data->first()->contentEn}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

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
                                        <textarea class="tinymce-classic" name="contentAr">{{$data->first()->contentAr}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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