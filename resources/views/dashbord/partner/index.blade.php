@extends('dashbord.layouts')
@section('title')
<title>Logo Partner</title>
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h2>All Articles</h2>
                    @if (Auth::user()->role == 1 || getPermissionUser('Site', 'create', Auth::user()->id) == 1) 

                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <button class="btn btn-success btn-sm " data-toggle="modal" data-target="#AddContactModal"><i class="d-md-none d-block ft-plus white"></i>
                            <span class="d-md-block d-none">Add New Logo</span></button>
                        <div class="modal fade" id="AddContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <section class="contact-form">
                                        <form id="addLogo" class="contact-input" action="{{route('partner.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel1">Add New Logo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <fieldset class="form-group col-12">
                                                    <input type="file" class="form-control-file" id="user-image" name="logo">
                                                </fieldset>
                                            </div>
                                            <div class="modal-footer">
                                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                                    <button type="button" id="add-contact-item" onclick="document.getElementById('addLogo').submit()" class="btn btn-info add-contact-item" data-dismiss="modal">
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
                    @endif
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $row)

                                <tr>
                                    <td>
                                        <img src="{{asset('partner/logos/' . $row->logo)}}" alt="" height="48px" >
                                    </td>
                                    <td> 
                                        @if(Auth::user()->role == 1 || getPermissionUser('Site','edit', Auth::user()->id) == 1)

                                        <button class="btn btn-sm round btn-outline-success" data-toggle="modal" data-target="#AddContactModal{{$row->id}}">
                                            <i class="d-md-none d-block ft-plus white"></i>
                                            <span class="d-md-block d-none">Edit</span></button>
                                            <div class="modal fade" id="AddContactModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$row->id}}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <section class="contact-form">
                                                        <form method="POST" id="updateLogo_{{$row->id}}" action="{{route('partner.update',$row->id)}}" class="contact-input" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel1">Edit</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <fieldset class="form-group col-12">
                                                                        <input type="file" class="form-control-file" id="user-image" name="logo">
                                                                    </fieldset>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                                                        <button type="button" onclick="document.getElementById('updateLogo_{{$row->id}}').submit()"  id="add-contact-item" class="btn btn-info add-contact-item" 
                                                                        data-dismiss="modal"><i class="la la-paper-plane-o d-block d-lg-none">
                                                                            </i> <span class="d-none d-lg-block">Save</span></button>
                                                                    </fieldset>
                                                                </div>
                                                            </form>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                        @if(Auth::user()->role == 1 || getPermissionUser('Site','delete', Auth::user()->id) == 1)

                                        <button type="button" onclick="document.getElementById('deletePartner_{{$row->id}}').submit()" class="btn btn-sm round btn-outline-danger">Delete</button>
                                        <form hidden id="deletePartner_{{$row->id}}" action="{{route('partner.destroy',$row->id)}}" method="POST">
                                            @method('Delete')
                                            @csrf
                                        </form>
                                        @endif                   
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