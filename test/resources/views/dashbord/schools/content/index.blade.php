@extends('dashbord.layouts')
@section('title')
<title>Add/Edit Content</title>
@endsection
@section('content')
<div class="content-wrapper">
    <h2 class="pb-2">Add/Edit Content ({{$school->titleEn}}) :</h2>
    <div class="card ">

        <form method="POST" action="{{route('schoolContent',$school->id)}}" enctype="multipart/form-data"
            class="ml-1 mt-1 mr-1">
            @csrf
            <!-- <fieldset class="form-group form-group-style ">
                <label for="textbox2">slug En</label>
                <input required  type="text" name="slugEn" value="{{ $content ? $content->slugEn : '' }}" class="form-control"
                    id="textbox2" placeholder="slug En ....">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">slug Ar</label>
                <input required  type="text" name="slugAr" value="{{ $content ? $content->slugAr : '' }}" class="form-control"
                    id="textbox2" placeholder="slug Ar ....">
            </fieldset> -->


            <fieldset class="form-group form-group-style">
                <label for="textbox2">Meta description En</label>
                <input required  type="text" value="{{ $content ? $content->metaDescriptionEn : '' }}"
                    name="metaDescriptionEn" value="" class="form-control" id="textbox2"
                    placeholder="Meta description En" />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Meta description Ar</label>
                <input required  type="text" value="{{ $content ? $content->metaDescriptionAr : '' }}"
                    name="metaDescriptionAr" value="" class="form-control" id="textbox2" placeholder="Page Title Ar" />
            </fieldset>
            
            <!-- <fieldset class="form-group form-group-style">
                <label for="textbox2">Page Title En</label>
                <input required  type="text" value="{{ $content ? $content->pageTitleEn : '' }}" name="pageTitleEn"
                    value="" class="form-control" id="textbox2" placeholder="Page Title En" />
            </fieldset>
            
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Page Title Ar</label>
                <input required  type="text" value="{{ $content ? $content->pageTitleAr : '' }}" name="pageTitleAr"
                    value="" class="form-control" id="textbox2" placeholder="Meta description Ar" />
            </fieldset> -->

            <fieldset class="form-group form-group-style">
                <label for="textbox2" class="mb-2">Short brief En</label>
                <textarea name="shortDescriptionEn" 
                    class="form-control border-light p-2" rows="12">{!! $content ? $content->shortDescriptionEn : '' !!}</textarea>
            </fieldset>
            
            <fieldset class="form-group form-group-style">
                <label for="textbox2" class="mb-2">Short brief Ar</label>
                <textarea name="shortDescriptionAr" 
                    class="form-control border-light p-2" rows="12">{!! $content ? $content->shortDescriptionAr : '' !!}</textarea>
            </fieldset>


            <fieldset class="mb-1 form-group-style">
                <label>Content En :</label>

                <!-- Classic Editor start -->
                <section id="classic">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <small class="text-danger"> * Leave heading field empty to hide content from school page</small><br>
                                        <div class="form-group form-group-style">
                                            <input type="text" value="{{ $content ? $content->headingEn : '' }}" name="headingEn"
                                                class="form-control" id="headingEn" placeholder="Heading" />
                                        </div>
                                        <div class="form-group">
                                            <!-- tinymce-classic -->
                                            <!-- form-control border -->
                                            <textarea name="descriptionEn"
                                                class="tinymce-classic" rows="12">{!! $content ? $content->descriptionEn : '' !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </fieldset>

            <!-- Classic Editor end -->

            <fieldset class="mb-1 form-group-style">
                <label>Content Ar :</label>

                <section id="classic">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <small class="text-danger"> * Leave heading field empty to hide content from school page</small><br>
                                        <div class="form-group form-group-style">
                                            <input type="text" value="{{ $content ? $content->headingAr : '' }}" name="headingAr"
                                                class="form-control" id="headingAr" placeholder="Heading" />
                                        </div>
                                        <div class="form-group">
                                            <!-- tinymce-classic -->
                                            <!-- form-control border -->
                                            <textarea name="descriptionAr"
                                                class="tinymce-classic" rows="12">{!! $content ? $content->descriptionAr : '' !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </fieldset>


            <div class="form-actions text-center">
                <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;">
                    <i class="ft-x"></i> Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> Save
                </button>
                <br>
                <br>

        </form>
        <div class="row form-group-style">
            <fieldset class="form-group form-group-style mt-1 col-6">
                <a href="###" data-toggle="modal" data-target="#AddPhoto">
                    <button class="btn btn-md round btn-outline-success pull-right">
                        Add Photo
                    </button>
                </a>
                <div class="modal fade" id="AddPhoto" tabindex="-1" role="dialog" aria-labelledby="AddPhoto"
                    style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <section class="contact-form">
                                <form method="POST" action="{{route('storePhotoSchool',$school->id)}}"
                                    enctype="multipart/form-data" id="form-add-contact" class="contact-input">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="AddPhoto">Add New Image</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <fieldset class="form-group col-12">

                                            <input required  type="file" required="" name="file" class="form-control-file"
                                                id="user-image">
                                        </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <button type="submit" id="add-contact-item"
                                                onclick="document.getElementById('form-add-contact').submit()"
                                                class="btn btn-info add-contact-item" data-dismiss="modal">
                                                <i class="la la-paper-plane-o d-block d-lg-none"></i>
                                                <span class="d-none d-lg-block">Add New</span>
                                            </button>
                                        </fieldset>
                                    </div>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table
                        class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle text-center">

                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($content)
                            @foreach ($school->files()->where('type', 1)->get() as $file)
                            <tr>
                                <td>
                                <img src="{{ asset('Schools/photos/' . $file->file) }}" alt="" height="100px" width="170px">
                                </td>

                                <td class="pr-0">
                                    <button type="button"
                                        onclick="document.getElementById('deletePackages_{{$file->id}}').submit()"
                                        class="btn btn-sm round btn-outline-danger">Delete</button>
                                    <form hidden id="deletePackages_{{$file->id}}"
                                        action="{{route('deleteFileSchool',$file->id)}}" method="POST">
                                        @method('Delete')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </fieldset>
            <fieldset class="form-group form-group-style mt-1 col-6">
                <div class="heading-elements">
                    <a href="###" data-toggle="modal" data-target="#AddVideo">
                        <button class="btn btn-md round btn-outline-success pull-right">
                            Add Video
                        </button>
                    </a>
                </div>
                <div class="modal fade" id="AddVideo" tabindex="-1" role="dialog" aria-labelledby="AddVideo"
                    style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <section class="contact-form">
                                <form method="POST" action="{{route('addVideoStore',$school->id)}}" id="form-add-video"
                                    class="contact-input">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="AddVideo">Add New Video</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <fieldset class="form-group col-12">
                                            <input required  type="text" required="" name="file" class="form-control-file"
                                                id="user-image">
                                        </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <button type="submit" id="add-contact-item"
                                                onclick="document.getElementById('form-add-video').submit()"
                                                class="btn btn-info add-contact-item" data-dismiss="modal">
                                                <i class="la la-paper-plane-o d-block d-lg-none"></i>
                                                <span class="d-none d-lg-block">Add New</span>
                                            </button>
                                        </fieldset>
                                    </div>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table
                        class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle text-center">

                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if($content)
                            @foreach ($school->files()->where('type', 2)->get() as $file)
                            <tr>
                                <td>
                                    <iframe width="170" height="100" src="https://www.youtube.com/embed/{{$file->file}}"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen=""></iframe>
                                </td>

                                <td class="pr-0">
                                    <button type="button"
                                        onclick="document.getElementById('deletePackages_{{$file->id}}').submit()"
                                        class="btn btn-sm round btn-outline-danger">Delete</button>
                                    <form hidden id="deletePackages_{{$file->id}}"
                                        action="{{route('deleteFileSchool',$file->id)}}" method="POST">
                                        @method('Delete')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </fieldset>
        </div>
    </div>

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