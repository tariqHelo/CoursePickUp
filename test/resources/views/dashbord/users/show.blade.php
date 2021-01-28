@extends('dashbord.layouts') 
@section('title')
<title>Users View</title>
@endsection 
@section('content')
<div class="content-wrapper">
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <!-- users view start -->
            <section class="users-view">
                <!-- users view media object start -->
                <div class="row">
                    <div class="col-12 col-sm-7">
                        <div class="media mb-2">
                            <a class="mr-1" href="#">
                                <img src="{{ asset('' . $data->image )}}" alt="users view avatar"
                                    class="users-avatar-shadow rounded-circle" height="64" width="64" />
                            </a>
                            <div class="media-body pt-25">
                                <h4 class="media-heading"><span class="users-view-name">{{$data->name}}</span></h4>
                                <span>ID:</span>
                                <span class="users-view-id">{{$data->id}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">
                        <!-- <a href="#" class="btn btn-sm mr-25 border"><i class="ft-message-square font-small-3"></i></a> -->

                        <button type="button" onclick="document.getElementById('deleteUsers_{{$data->id}}').submit()"
                            class="btn btn-sm mr-25 border">Delete</button>
                        <form hidden id="deleteUsers_{{$data->id}}" action="{{route('users.destroy',$data->id)}}"
                            method="POST">
                            @method('Delete')
                            @csrf
                        </form>
                        <a href="{{action('UsersController@edit',$data->id)}}" class="btn btn-sm btn-primary">Edit</a>
                    </div>
                </div>
                <!-- users view media object ends -->
                <!-- users view card data start -->
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>User Name:</td>
                                                <td>{{$data->username}}</td>
                                            </tr>
                                            <tr>
                                                <td>Name:</td>
                                                <td class="users-view-latest-activity">{{$data->name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Email:</td>
                                                <td class="">{{$data->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Password:</td>
                                                <td>{{$data->passToAdmin}}</td>
                                            </tr>
                                            <tr>
                                                <td>Role:</td>
                                                <td class="users-view-role">
                                                    @if($data->role == 1) Admin @elseif ($data->role == 2) Manager @else
                                                    Staff @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @if($data->role !== "1")
                                <div class="col-12 col-md-8">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Module Permission</th>
                                                    <th>Read</th>
                                                    <th>Write</th>
                                                    <th>Create</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Users</td>
                                                    <td>Yes</td>
                                                    <td>No</td>
                                                    <td>No</td>
                                                    <td>Yes</td>
                                                </tr>
                                                <tr>
                                                    <td>Articles</td>
                                                    <td>No</td>
                                                    <td>Yes</td>
                                                    <td>No</td>
                                                    <td>Yes</td>
                                                </tr>
                                                <tr>
                                                    <td>Staff</td>
                                                    <td>Yes</td>
                                                    <td>Yes</td>
                                                    <td>No</td>
                                                    <td>No</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @else
                                <div class="col-12 col-md-8">
                                    <b class="text-center">This is Admin</b>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- users view card data ends -->
                <!-- users view card details start -->

                <!-- users view card details ends -->
            </section>
            <!-- users view ends -->
        </div>
    </div>
</div>
@endsection