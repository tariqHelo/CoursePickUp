@extends('dashbord.layouts')
@section('title')
<title>Users List</title>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <!-- users list start -->
        <section class="users-list-wrapper">
            <div class="users-list-filter px-1">


                @if(Auth::user()->role == 1)
                <div class="row border border-light rounded py-2 mb-2">

                    <div class="heading-elements">
                        <button class="btn btn-md round btn-outline-success pull-right">
                            <a href="{{action('UsersController@create')}}">Add Users</a>
                        </button>
                    </div>
                </div>
                @endif



            </div>

    </div>
    <div class="users-list-table">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                      <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills mt-md-0 mt-1">
                            <li class="nav-item">
                                <a class="nav-link d-flex active" data-toggle="tab" href="#home">Users Active</a>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link d-flex" data-toggle="tab" href="#menu1">Users UnActive</a>
                            </li>
                        </ul>
                    </div>
                    <br>
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade active show">
                                    <!-- datatable start -->
                                        <table id="users-list-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    @if(Auth::user()->role ==1)
                                                    <th>Password</th>
                                                    @endif
                                                    <th>Role</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $row)
                                                @if($row->status == "Active")
                                                <tr>
                                                    <td><a
                                                            href="@if($row->role != 1) {{action('UsersController@edit',$row->id)}} @else # @endif">{{$row->username}}</a>
                                                    </td>
                                                    <td>{{$row->name}}</td>
                                                    <td>{{$row->email}}</td>
                                                    @if(Auth::user()->role == 1)
                                                    <td>
                                                        @if($row->role == 1)
                                                        This Is Admin
                                                        @else
                                                        {{$row->passToAdmin}}
                                                        @endif
                                                    </td>
                                                    @endif


                                                    <td>
                                                        @if ($row->role == 1)
                                                        Admin
                                                        @endif
                                                        @if ($row->role == 2)
                                                        Manager
                                                        @endif
                                                        @if ($row->role == 3)
                                                        Staff
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($row->role !=  1 || Auth::user()->role == 1)
                                                        @if(Auth::user()->role == 1)
                                                        <a href="{{action('UsersController@edit',$row->id)}}" class="primary edit mr-1">
                                                            <i class="la la-pencil"></i>
                                                        </a>

                                                        @if($row->role !=  1)
                                                        <a class="danger  mr-1"
                                                            onclick="document.getElementById('deleteUsers_{{$row->id}}').submit()">
                                                            <i class="la la-trash-o"></i>
                                                        </a>
                                                        <form hidden id="deleteUsers_{{$row->id}}"
                                                            action="{{route('users.destroy',$row->id)}}" method="POST">
                                                            @method('Delete')
                                                            @csrf
                                                        </form>
                                                        @endif


                                                        @endif
                                                        <a class="success  mr-1" href="{{action('UsersController@show',$row->id)}}">
                                                            <i class="la la-eye"></i>
                                                        </a>
                                                        @else
                                                        This is Admin
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    <!-- datatable ends -->
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <table id="users-list-datatable" class="table">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            @if(Auth::user()->role ==1)
                                            <th>Password</th>
                                            @endif
                                            <th>Role</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                        @if($row->status == "UnActive")
                                        <tr>
                                            <td><a
                                                    href="@if($row->role != 1) {{action('UsersController@edit',$row->id)}} @else # @endif">{{$row->username}}</a>
                                            </td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->email}}</td>
                                            @if(Auth::user()->role == 1)
                                            <td>
                                                @if($row->role == 1)
                                                This Is Admin
                                                @else
                                                {{$row->passToAdmin}}
                                                @endif
                                            </td>
                                            @endif


                                            <td>
                                                @if ($row->role == 1)
                                                Admin
                                                @endif
                                                @if ($row->role == 2)
                                                Manager
                                                @endif
                                                @if ($row->role == 3)
                                                Staff
                                                @endif
                                            </td>
                                            <td>
                                                @if($row->role !=  1 || Auth::user()->role == 1)
                                                @if(Auth::user()->role == 1)
                                                <a href="{{action('UsersController@edit',$row->id)}}" class="primary edit mr-1">
                                                    <i class="la la-pencil"></i>
                                                </a>

                                                <a class="info  mr-1"
                                                    onclick="document.getElementById('deleteUsers_{{$row->id}}').submit()">
                                                    <i class="ft-unlock"></i>
                                                </a>
                                                <form hidden id="deleteUsers_{{$row->id}}"
                                                    action="{{route('users.destroy',$row->id)}}" method="POST">
                                                    @method('Delete')
                                                    @csrf
                                                </form>
                                                @endif
                                                <a class="success  mr-1" href="{{action('UsersController@show',$row->id)}}">
                                                    <i class="la la-eye"></i>
                                                </a>
                                                @else
                                                This is Admin
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- users list ends -->
</div>
@endsection