@extends('dashbord.layouts')
@section('title')
<title>Photos :: {{App\schools::find($id)->titleEn}}</title>
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h2>Photos ({{App\schools::find($id)->titleEn}})</h2>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <a href="###" data-toggle="modal" data-target="#AddPhoto">
                            <button class="btn btn-md round btn-outline-success pull-right">
                                Add Pohot
                            </button>
                        </a>
                    </div>
                    <div class="modal fade" id="AddPhoto" tabindex="-1" role="dialog" aria-labelledby="AddPhoto"
                        style="display: none;" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <section class="contact-form">
                                    <form method="POST" action="{{route('storePhotoSchool',$id)}}"
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
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table id="users-contacts"
                            class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle text-center">

                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $row)

                                <tr>
                                    <td>
                                        <img src="{{asset('',)}}{{$row->file}}" alt="" height="180px" width="200">
                                    </td>

                                    <td class="pr-0">
                                        <button type="button"
                                            onclick="document.getElementById('deletePackages_{{$row->id}}').submit()"
                                            class="btn btn-sm round btn-outline-danger">Delete</button>
                                        <form hidden id="deletePackages_{{$row->id}}"
                                            action="{{route('deleteFileSchool',$row->id)}}" method="POST">
                                            @method('Delete')
                                            @csrf
                                        </form>
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



@endsection