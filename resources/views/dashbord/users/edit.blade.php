@extends('dashbord.layouts')
@section('title')
<title>Edit Users</title>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <!-- users edit start -->
        <section class="users-edit">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab"
                                    href="#account" aria-controls="account" role="tab" aria-selected="true">
                                    <i class="ft-user mr-25"></i><span class="d-none d-sm-block">Account</span>
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                <!-- users edit media object start -->
                                <div class="media">
                                    <a href="javascript: void(0);">

                                        <img src="{{asset('')}}{{$data->image}}" class="rounded mr-75"
                                            alt="profile image" height="64" width="64">
                                    </a>
                                    <div class="media-body mt-75">
                                        <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                            <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                                                for="account-upload">Upload new photo</label>
                                            <button class="btn btn-sm btn-secondary ml-50">Reset</button>
                                        </div>
                                        <p class="text-muted ml-75 mt-50">
                                            <small>Allowed JPG, GIF or PNG. Max size of 800kB</small>
                                        </p>
                                    </div>
                                </div>
                                <!-- users edit media object ends -->
                                <!-- users edit account form start -->
                                <form novalidate method="POST" action="{{action('UsersController@update',$data->id)}}"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input required  type="file" name="image" id="account-upload" hidden="">

                                    @foreach ($permission as $row)
                                    <input required  type="text" name="permission{{$row->type}}" value="{{$row->id}}" hidden="">
                                    @endforeach

                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    @error('username')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <label>Username</label>
                                                    <input required  type="text" class="form-control"
                                                        placeholder="Username" value="{{$data->username}}" required
                                                        name="username"
                                                        data-validation-required-message="This username field is required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Name</label>
                                                    <input required  type="text" class="form-control" placeholder="Name"
                                                        value="{{$data->name}}" required name="name"
                                                        data-validation-required-message="This name field is required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <label>E-mail</label>
                                                    <input required  type="email" class="form-control"
                                                        placeholder="Email" value="{{$data->email}}" required
                                                        name="email"
                                                        data-validation-required-message="This email field is required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Password @if(Auth::user()->role == 1) || {{$data->passToAdmin}}
                                                    @endif </label>
                                                <input required  type="password" name="password"
                                                    value="{{$data->passToAdmin}}" class="form-control"
                                                    placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select required class="form-control" id="role" name="role">
                                                    @if(Auth::user()->role == 1)
                                                    <option @if($data->role == 1) selected @endif value="1">Admin
                                                    </option>
                                                    @endif
                                                    <option @if($data->role == 2) selected @endif value="2">Manager
                                                    </option>
                                                    <option @if($data->role == 3) selected @endif value="3">Staff
                                                    </option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table mt-1">
                                                    <thead>
                                                        <tr>
                                                            <th>Module Permission</th>
                                                            <th>Edit</th>
                                                            <th>Create</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Leads</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" id="lead"
                                                                        @if(getPermissionUser('Leads','edit',$data->id)
                                                                    == 1) checked @endif
                                                                    class="custom-control-input" name="lead[1]">
                                                                    <label class="custom-control-label"
                                                                        for="lead"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input
                                                                        @if(getPermissionUser('Leads','create',$data->id)
                                                                    == 1) checked @endif
                                                                    type="checkbox" id="lead1" name="lead[2]"
                                                                    class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="lead1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input
                                                                        @if(getPermissionUser('Leads','delete',$data->id)
                                                                    == 1) checked @endif
                                                                    type="checkbox" id="lead2" name="lead[3]"
                                                                    class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="lead2"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Articles</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" id="article"
                                                                        @if(getPermissionUser('Articles','edit',$data->id)
                                                                    == 1) checked @endif
                                                                    class="custom-control-input" name="article[1]">
                                                                    <label class="custom-control-label"
                                                                        for="article"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input
                                                                        @if(getPermissionUser('Articles','create',$data->id)
                                                                    == 1) checked @endif
                                                                    type="checkbox" id="article1" name="article[2]"
                                                                    class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="article1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input
                                                                        @if(getPermissionUser('Articles','delete',$data->id)
                                                                    == 1) checked @endif
                                                                    type="checkbox" id="article2" name="article[3]"
                                                                    class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="article2"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Packages</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" id="package"
                                                                        @if(getPermissionUser('Packages','edit',$data->id)
                                                                    == 1) checked @endif
                                                                    class="custom-control-input" name="package[1]">
                                                                    <label class="custom-control-label"
                                                                        for="package"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input
                                                                        @if(getPermissionUser('Packages','create',$data->id)
                                                                    == 1) checked @endif
                                                                    type="checkbox" id="package1" name="package[2]"
                                                                    class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="package1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input
                                                                        @if(getPermissionUser('Packages','delete',$data->id)
                                                                    == 1) checked @endif
                                                                    type="checkbox" id="package2" name="package[3]"
                                                                    class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="package2"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Schools</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" id="school"
                                                                        @if(getPermissionUser('Schools','edit',$data->id)
                                                                    == 1) checked @endif
                                                                    class="custom-control-input" name="school[1]">
                                                                    <label class="custom-control-label"
                                                                        for="school"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input
                                                                        @if(getPermissionUser('Schools','create',$data->id)
                                                                    == 1) checked @endif
                                                                    type="checkbox" id="school1" name="school[2]"
                                                                    class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="school1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input
                                                                        @if(getPermissionUser('Schools','delete',$data->id)
                                                                    == 1) checked @endif
                                                                    type="checkbox" id="school2" name="school[3]"
                                                                    class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="school2"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Promotions</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" id="promotion"
                                                                        @if(getPermissionUser('Promotions','edit',$data->id)
                                                                    == 1) checked @endif
                                                                    class="custom-control-input" name="promotion[1]">
                                                                    <label class="custom-control-label"
                                                                        for="promotion"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input
                                                                        @if(getPermissionUser('Promotions','create',$data->id)
                                                                    == 1) checked @endif
                                                                    type="checkbox" id="promotion1" name="promotion[2]"
                                                                    class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="promotion1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input
                                                                        @if(getPermissionUser('Promotions','delete',$data->id)
                                                                    == 1) checked @endif
                                                                    type="checkbox" id="promotion2" name="promotion[3]"
                                                                    class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="promotion2"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Site Settings</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" id="site"
                                                                        @if(getPermissionUser('Site','edit',$data->id)
                                                                    == 1) checked @endif
                                                                    class="custom-control-input" name="site[1]">
                                                                    <label class="custom-control-label"
                                                                        for="site"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input
                                                                        @if(getPermissionUser('Site','create',$data->id)
                                                                    == 1) checked @endif
                                                                    type="checkbox" id="site1" name="site[2]"
                                                                    class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="site1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input
                                                                        @if(getPermissionUser('Site','delete',$data->id)
                                                                    == 1) checked @endif
                                                                    type="checkbox" id="site2" name="site[3]"
                                                                    class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="site2"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Core Settings</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" id="core"
                                                                        @if(getPermissionUser('Core','edit',$data->id)
                                                                    == 1) checked @endif
                                                                    class="custom-control-input" name="core[1]">
                                                                    <label class="custom-control-label"
                                                                        for="core"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input
                                                                        @if(getPermissionUser('Core','create',$data->id)
                                                                    == 1) checked @endif
                                                                    type="checkbox" id="core1" name="core[2]"
                                                                    class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="core1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input
                                                                        @if(getPermissionUser('Core','delete',$data->id)
                                                                    == 1) checked @endif
                                                                    type="checkbox" id="core2" name="core[3]"
                                                                    class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="core2"></label>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Users</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" id="user"
                                                                        @if(getPermissionUser('Users','edit',$data->id)
                                                                    == 1) checked @endif
                                                                    class="custom-control-input" name="user[1]">
                                                                    <label class="custom-control-label"
                                                                        for="user"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input
                                                                        @if(getPermissionUser('Users','create',$data->id)
                                                                    == 1) checked @endif
                                                                    type="checkbox" id="user1" name="user[2]"
                                                                    class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="user1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input
                                                                        @if(getPermissionUser('Users','delete',$data->id)
                                                                    == 1) checked @endif
                                                                    type="checkbox" id="user2" name="user[3]"
                                                                    class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="user2"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit"
                                                class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                changes</button>
                                            <button type="reset" class="btn btn-light" onclick="window.history.go(-1); return false;">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- users edit account form ends -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- users edit ends -->
    </div>
</div>
</div>

@endsection