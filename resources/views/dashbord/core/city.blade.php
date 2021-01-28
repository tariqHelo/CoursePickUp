@extends('dashbord.layouts')
@section('title')
<title>City List</title>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h2>All City</h2>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        @if(Auth::user()->role == 1 || getPermissionUser('Core','create', Auth::user()->id) == 1)

                        <button class="btn btn-md round btn-outline-success pull-right">
                            <a href="{{route('cities.create')}}">Add City</a></button>
                        @endif
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <thead>
                                <tr>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Image</th>
                                    <th>Video</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cities as $city)
                                @if(Auth::user()->role != 1)
                                <tr>
                                    <td>{{$city->titleEn}}</td>
                                    <td>
                                        {{ $city->country->titleEn }}

                                    </td>

                                    <td>
                                    
                                        @if(Auth::user()->role == 1 || getPermissionUser('Core','edit', Auth::user()->id) == 1 || $city->userId  == Auth::user()->id)
                                    
                                        <a href="{{route('addFileCity',[$city->id, 1])}}">View all Image</a>

                                        @endif

                                    </td>

                                    <td>
                                        @if(Auth::user()->role == 1 || getPermissionUser('Core','edit', Auth::user()->id) == 1 || $city->userId  == Auth::user()->id)
                                                <a href="{{route('addFileCity',[$city->id, 2])}}"">View all Video</a>
                                        @else

                                        

                                        @endif
                                    </td>
                                    <td>
                                        @if(Auth::user()->role == 1 || getPermissionUser('Core','edit', Auth::user()->id) == 1)
                                        

                                        <button class=" btn btn-sm round btn-outline-primary"><a
                                                href="{{route('cities.edit',$city->id)}}">Edit</a> </button>
                                        
                                        @endif
                                            @if(Auth::user()->role == 1 || getPermissionUser('Core','delete', Auth::user()->id) == 1 )

                                            <a type="submit" class="btn btn-sm round btn-outline-danger"
                                                onclick="document.getElementById('formDelete_{{$city->id}}').submit()">
                                                Delete
                                            </a>
                                            <form hidden id="formDelete_{{$city->id}}" method="POST"
                                                action="{{route('cities.destroy',$city->id)}}">
                                                @csrf
                                                @method('Delete')

                                            </form>
                                            @endif

                                    </td>

                                    <td>
                                        @if($city->status == 1)
                                        <span class="badge badge-success">Published</span>
                                        @else
                                        <span class="badge badge-danger">Draft</span>
                                        @endif
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    <td>{{$city->titleEn}}</td>
                                    <td>
                                        {{ $city->country->titleEn }}

                                    </td>

                                    <td> <a href="{{route('addFileCity',[$city->id, 1])}}">View all Image</a></td>

                                    <td><a href="{{route('addFileCity',[$city->id, 2])}}"">View all Video</a></td>
                                    <td>

                                        <button class=" btn btn-sm round btn-outline-primary"><a
                                                href="{{route('cities.edit',$city->id)}}">Edit</a> </button>
                                            <a type="submit" class="btn btn-sm round btn-outline-danger"
                                                onclick="document.getElementById('formDelete_{{$city->id}}').submit()">
                                                Delete
                                            </a>
                                            <form hidden id="formDelete_{{$city->id}}" method="POST"
                                                action="{{route('cities.destroy',$city->id)}}">
                                                @csrf
                                                @method('Delete')

                                            </form>
                                    </td>

                                    <td>
                                        @if($city->status == 1)
                                        <span class="badge badge-success">Published</span>
                                        @else
                                        <span class="badge badge-danger">Draft</span>
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


@endsection