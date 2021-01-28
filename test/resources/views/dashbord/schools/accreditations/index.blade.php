@extends('dashbord.layouts')
@section('title')
<title>Accreditations Logos :: {{$school->titleEn}}</title>
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h2>Accreditations Logos ({{$school->titleEn}})</h2>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <a href="###" data-toggle="modal" data-target="#AddPhoto">
                            <button class="btn btn-md round btn-outline-success pull-right">
                                Add Logo
                            </button>
                        </a>
                    </div>
                    <div class="modal fade" id="AddPhoto" tabindex="-1" role="dialog" aria-labelledby="AddPhoto"
                        style="display: none;" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <section class="contact-form">
                                    <form method="POST" action="{{route('storeAccreditations',$school->id)}}"
                                        enctype="multipart/form-data" id="storeAccreditations">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="AddPhoto">Add New Logo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <fieldset class="form-group">
                                                <div class="custom-file">
                                                    <input required="" type="file" name="logo"
                                                        class="custom-file-input"
                                                        id="addLogo">
                                                    <label class="custom-file-label"
                                                        for="addLogo"
                                                        aria-describedby="addLogo">Choose
                                                        Logo</label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                                <button type="submit" class="btn btn-info">
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

                <div class="row mr-1 ml-2">

                    <div class="table-responsive">
                        <table id="users-contacts"
                            class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($school->accreditations as $accreditation)

                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td>
                                        <img src="{{ asset('/Schools/accreditations/' . $accreditation->logo)}}" alt="" height="70" width="120">
                                    </td>
                                    <td>
                                        <button class="btn btn-sm round btn-outline-info" data-toggle="modal"
                                            data-target="#editLogo_{{$accreditation->id}}">
                                            Edit
                                        </button>
                                        <div class="modal fade" id="editLogo_{{$accreditation->id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="editLogo_{{$accreditation->id}}" style="display: none;"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <section class="contact-form">
                                                        <form method="POST"
                                                            action="{{route('updateAccreditations',$accreditation->id)}}"
                                                            enctype="multipart/form-data"
                                                            id="FormEditLogo_{{$accreditation->id}}">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Logo : {{$loop->iteration}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <fieldset class="form-group">
                                                                    <div class="custom-file">
                                                                        <input required="" type="file" name="logo"
                                                                            class="custom-file-input"
                                                                            id="inputGroupFile_{{$accreditation->id}}">
                                                                        <label class="custom-file-label"
                                                                            for="inputGroupFile_{{$accreditation->id}}"
                                                                            aria-describedby="inputGroupFile_{{$accreditation->id}}">Choose
                                                                            Logo</label>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <fieldset
                                                                    class="form-group position-relative has-icon-left mb-0">
                                                                    <button type="submit" class="btn btn-info">
                                                                        <i class="la la-paper-plane-o d-block d-lg-none"></i>
                                                                        <span class="d-none d-lg-block">Edit Logo</span>
                                                                    </button>
                                                                </fieldset>
                                                            </div>
                                                        </form>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button"
                                            onclick="document.getElementById('deleteAccreditations_{{$accreditation->id}}').submit()"
                                            class="btn btn-sm round btn-outline-danger">Delete</button>
                                        <form hidden id="deleteAccreditations_{{$accreditation->id}}"
                                            action="{{route('deleteAccreditations',$accreditation->id)}}" method="POST">

                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection