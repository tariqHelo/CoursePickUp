@extends('dashbord.layouts') @section('title')
<title>city Add</title>
@endsection
@section('content')
<div class="content-wrapper">
    <h2 class="pb-2">Add City:</h2>
    <div class="card">
        <form method="POST" action="{{route('cities.store')}}" class="ml-1 mt-1 mr-1">
            @csrf
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title En</label>
                <input required  type="text" class="form-control" name="titleEn" id="textbox2" placeholder="Title En ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title Ar</label>
                <input required  type="text" class="form-control" name="titleAr" id="textbox2" placeholder="Title Ar ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Slug</label>
                <input required  type="text" class="form-control" name="slug" id="textbox2" placeholder="Slug ...." />
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label class="mb-1">Country :</label>

                <select required class="form-control" name="country" id="countrySelect">

                    @foreach ($countries as $country)
                        @if($country->status == 1)
                            <option value="{{$country->id}}">{{$country->titleEn}}</option>
                        @endif
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label for="textbox2">Population</label>
                <input required  type="Number" class="form-control" name="population" id="textbox2" placeholder="Population" />
            </fieldset>

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
                                        <textarea required class="tinymce-classic" name="contentAr"> </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

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
                                        <textarea required class="tinymce-classic" name="contentEn"> </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <fieldset class="form-group form-group-style">
                <label for="textbox2">Status</label>
                <select required class="form-control" name="status" id="users-list-verified">
                    <option value="1">Published </option>
                    <option value="2">Draft</option>
                </select>
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