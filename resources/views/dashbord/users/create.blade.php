@extends('dashbord.layouts')
@section('title')
<title>Add Users</title>
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
                                    @if($errors->has('image'))
                                        <div class="error text-danger">{{ $errors->first('image') }}</div>
                                    @endif
                                    <a href="javascript: void(0);">
                                        <img src="#" class="rounded mr-75" alt="profile image" height="64" width="64">
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
                                <form novalidate method="POST" action="{{action('UsersController@store')}}">
                                    @csrf

                                  
                                    <input required  type="file" name="image" id="account-upload" hidden="">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                @if($errors->has('username'))
                                                    <div class="error text-danger">{{ $errors->first('username') }}</div>
                                                @endif
                                                <div class="controls">
                                                    <label>Username</label>
                                                    <input required   type="text" class="form-control" placeholder="Username"
                                                        value="{{old('username')}}" required name="username"
                                                        data-validation-required-message="This username field is required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('name'))
                                                    <div class="error text-danger">{{ $errors->first('name') }}</div>
                                                @endif
                                                <div class="controls">
                                                    <label>Name</label>
                                                    <input required  type="text" class="form-control" placeholder="Name" value="{{old('name')}}"
                                                        required name="name"
                                                        data-validation-required-message="This name field is required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('email'))
                                                    <div class="error text-danger">{{ $errors->first('email') }}</div>
                                                @endif
                                                <div class="controls">
                                                    <label>E-mail</label>
                                                    <input required  type="email" class="form-control" placeholder="Email"
                                                        value="{{old('email')}}" required name="email"
                                                        data-validation-required-message="This email field is required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                @if($errors->has('password'))
                                                    <div class="error text-danger">{{ $errors->first('password') }}</div>
                                                @endif
                                                <label for="password">Password</label>
                                                <input required  type="password" name="password" id="password" class="form-control"
                                                    placeholder="Password" value="{{old('password')}}">
                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('role'))
                                                    <div class="error text-danger">{{ $errors->first('role') }}</div>
                                                @endif
                                                <label for="role">Role</label>
                                                <select required class="form-control" id="role"
                                                    class="chosen-the-basic form-control form-control-sm" name="role">
                                                    @if(Auth::user()->role == 1)
                                                    <option @if(old('role') == 1 ) selected @endif value="1">Admin</option>
                                                    @endif
                                                    <option @if(old('role') == 2 ) selected @endif  value="2">Manager</option>
                                                    <option  @if(old('role') == 3 ) selected @endif value="3">Staff</option>
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
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="lead" name="lead[1]"
                                                                        class="custom-control-input"><label
                                                                        class="custom-control-label" for="lead"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="lead1" name="lead[2]"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="lead1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="lead2" name="lead[3]"
                                                                        class="custom-control-input"><label
                                                                        class="custom-control-label"
                                                                        for="lead2"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Articles</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="articles" name="article[1]"
                                                                        class="custom-control-input"><label
                                                                        class="custom-control-label"
                                                                        for="articles"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="articles1" name="article[2]"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="articles1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="articles2" name="article[3]"
                                                                        class="custom-control-input"><label
                                                                        class="custom-control-label"
                                                                        for="articles2"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Packages</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="package" name="package[1]"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="package"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="package1" name="package[2]"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="package1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="package2" name="package[3]"
                                                                        class="custom-control-input"><label
                                                                        class="custom-control-label"
                                                                        for="package2"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Schools</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="school" name="school[1]"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="school"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="school1" name="school[2]"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="school1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="school2" name="school[3]"
                                                                        class="custom-control-input"><label
                                                                        class="custom-control-label"
                                                                        for="school2"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Promotion</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="promotion"
                                                                        name="promotion[1]"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="promotion"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="promotion1"
                                                                        name="promotion[2]"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="promotion1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="promotion2"
                                                                        name="promotion[3]"
                                                                        class="custom-control-input"><label
                                                                        class="custom-control-label"
                                                                        for="promotion2"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Site Settings</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="site" name="site[1]"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="site"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="site1" name="site[2]"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="site1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="site2" name="site[3]"
                                                                        class="custom-control-input"><label
                                                                        class="custom-control-label"
                                                                        for="site2"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Core Settings</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="core" name="core[1]"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="core"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="core1" name="core[2]"
                                                                        class="custom-control-input">
                                                                    <label class="custom-control-label"
                                                                        for="core1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="core2" name="core[3]"
                                                                        class="custom-control-input"><label
                                                                        class="custom-control-label"
                                                                        for="core2"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Users</td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="Users"
                                                                        class="custom-control-input" name="user[1]">
                                                                    <label class="custom-control-label"
                                                                        for="Users"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="Users1" name="user[2]"
                                                                        class="custom-control-input"><label
                                                                        class="custom-control-label"
                                                                        for="Users1"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="custom-control custom-checkbox"><input
                                                                        type="checkbox" id="Users2" name="user[3]"
                                                                        class="custom-control-input"><label
                                                                        class="custom-control-label"
                                                                        for="Users2"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit"
                                                class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                changes</button>
                                           <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;">Cancel</button>
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

<script src="{{asset('js/jquery.min.js')}}"></script>

<script>
    $(document).ready(function () {
        
    $('#role').change(function (e) { 
        e.preventDefault();
            var thisValue =    $('#role').val();
            console.log(thisValue);

        if(thisValue == 2){

            $('input[type="checkbox"]').attr('checked',false);


            $('input[name="lead[1]"]').attr('checked',true);
            $('input[name="article[1]"]').attr('checked',true);
            $('input[name="package[1]"]').attr('checked',true);
            $('input[name="school[1]"]').attr('checked',true);
            $('input[name="promotion[1]"]').attr('checked',true);
            $('input[name="site[1]"]').attr('checked',true);
            $('input[name="core[1]"]').attr('checked',true);
            $('input[name="articles1[1]"]').attr('checked',true);
            $('input[name="school1[1]"]').attr('checked',true);
            $('input[name="promotion1[1]"]').attr('checked',true);

            $('input[name="lead[2]"]').attr('checked',true);
            $('input[name="article[2]"]').attr('checked',true);
            $('input[name="school[2]"]').attr('checked',true);
            $('input[name="package[2]"]').attr('checked',true);
            $('input[name="promotion[2]"]').attr('checked',true);
            $('input[name="site[2]"]').attr('checked',true);
            $('input[name="core[2]"]').attr('checked',true);
           
            $('input[name="article[3]"]').attr('checked',true);
            $('input[name="package[3]"]').attr('checked',true);
            $('input[name="school[3]"]').attr('checked',true);
            $('input[name="promotion[3]"]').attr('checked',true);
        }if(thisValue == 3){
            $('input[type="checkbox"]').attr('checked',false);

            $('input[name="article[1]"]').attr('checked',true);
            $('input[name="package[1]"]').attr('checked',true);
            $('input[name="school[1]"]').attr('checked',true);
            $('input[name="promotion[1]"]').attr('checked',true);

            $('input[name="lead[2]"]').attr('checked',true);
            $('input[name="article[2]"]').attr('checked',true);
            $('input[name="school[2]"]').attr('checked',true);
            $('input[name="package[2]"]').attr('checked',true);
            $('input[name="promotion[2]"]').attr('checked',true);
        }if(thisValue == 1){
            $('input[type="checkbox"]').attr('checked',false).fadeIn("slow");

        }
    });
});

</script>
@endsection