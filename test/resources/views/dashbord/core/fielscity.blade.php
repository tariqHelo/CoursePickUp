@extends('dashbord.layouts')
@section('title')
@if($type == 1)
<title>Image City</title>
@elseif($type == 2)
<title>Video City</title>
@endif
@endsection
@section('content')


<div class="content-wrapper">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h2>All {{ $type == 1 ? 'Images' : 'videos' }} {{ $city->titleEn }} City</h2>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <button class="btn btn-success btn-sm " data-toggle="modal" data-target="#AddContactModal"><i
                                class="d-md-none d-block ft-plus white"></i>
                            <span class="d-md-block d-none">Add New {{ $type == 1 ? 'Image' : 'video' }}</span>
                        </button>
                        <div class="modal fade" id="AddContactModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <section class="contact-form">
                                        <form method="POST" action="{{route('storeFile',[$city->id,$type])}}"
                                            enctype="multipart/form-data" id="form-add-contact" class="contact-input">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel1">Add New {{ $type == 1 ? 'Image' : 'video' }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <fieldset class="form-group col-12">

                                                    @if($type == 1)
                                                    <input required  type="file" required name="file" class="form-control-file"
                                                        id="user-image">
                                                    @elseif($type == 2)
                                                    <input required  type="text" id="video" name="file"
                                                        class="contact-email form-control" placeholder="Link Video">
                                                    @endif
                                                </fieldset>
                                            </div>
                                            <div class="modal-footer">
                                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                                    <button type="submit" 
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
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach ($city->files->where('type', $type) as $file)
                                    <tr>
                                        <td>
                                            @if($file->type == 1)
                                            <img class="img-fluid" src="{{ asset('imageCities/' . $file->file) }}"
                                                alt="{{ $city->slug }}"
                                                style="width: 100px;">
                                            @elseif($file->type == 2)

                                            <iframe width="170" height="100" src="https://www.youtube.com/embed/{{$file->file}}"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                            @endif
                                        </td>

                                        <td>
                                            <button class="btn btn-sm round btn-outline-success" data-toggle="modal"
                                                data-target="#AddContactModal1  "><i
                                                    class="d-md-none d-block ft-plus white"></i> <span
                                                    class="d-md-block d-none">Edit</span></button>

                                            <div class="modal fade" id="AddContactModal1" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <section class="contact-form">
                                                        <form method="POST" action="{{route('updateImageCity',[$file->id,$type])}}" id="form-edit-contact-{{$file->id}}" class="contact-input">
                                                                @csrf    
                                                            {{-- @method('PUT') --}}
                                                           <input required  type="hidden" name="id" value="{{$file->id}}">   

                                                            <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel1">Edit
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <fieldset class="form-group col-12">
                                                                        @if($type == 1)
                                                                        <input required  type="file" required name="file"
                                                                            class="form-control-file" id="user-image">
                                                                        @elseif($type == 2)
                                                                        <input required  type="text" id="contact-email" name="file"
                                                                            class="contact-email form-control"
                                                                            placeholder="Link Video">
                                                                        @endif
                                                                    </fieldset>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left mb-0">
                                                                        <button type="submit" id="add-contact-item"
                                                                            class="btn btn-info add-contact-item"
                                                                            data-dismiss="modal"
                                                                            onclick="document.getElementById('form-edit-contact-{{$file->id}}').submit()"
                                                                            ><i
                                                                                class="la la-paper-plane-o d-block d-lg-none"></i>
                                                                            <span
                                                                                class="d-none d-lg-block">Save</span></button>
                                                                    </fieldset>
                                                                </div>
                                                            </form>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                            <form id="delete_{{$file->id}}" hidden method="POST" action="{{route('destroy.image',$file->id)}}">
                                                @csrf

                                            </form>
                                            <button onclick="document.getElementById('delete_{{$file->id}}').submit()" class="btn btn-sm round btn-outline-danger"> Delete</button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

 @endsection