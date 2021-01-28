@extends('dashbord.layouts')
@section('title')
<title>Countries</title>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h2>All Countries</h2>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        @if(Auth::user()->role == 1 || getPermissionUser('Core','create', Auth::user()->id) == 1)

                        <button class="btn btn-md round btn-outline-success pull-right">
                            <a href="{{route('countries.create')}}">Add Country</a></button>

                        @endif
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{$row->titleEn}}</td>
                                    <td>
                                        <img class="img-fluid" src="{{asset('')}}{{$row->image}}" alt="{{$row->slug}}"
                                            style="width: 100px;">
                                    </td>
                                    <td>
                                        @if(Auth::user()->role == 1 || getPermissionUser('Core','edit', Auth::user()->id) == 1)

                                        <button class="btn btn-sm round btn-outline-primary">
                                            <a href="{{route('countries.edit',$row->id)}}">Edit</a>
                                        </button>
                                        @endif

                                        @if(Auth::user()->role == 1 || getPermissionUser('Core','delete', Auth::user()->id) == 1)

                                        <a type="submit" class="btn btn-sm round btn-outline-danger"
                                            onclick="document.getElementById('formDelete_{{$row->id}}').submit()">
                                            Delete
                                        </a>
                                        <form hidden id="formDelete_{{$row->id}}" method="POST"
                                            action="{{route('countries.destroy',$row->id)}}">
                                            @csrf
                                            @method('Delete')

                                        </form>
                                        @endif

                                    </td>
                                    <td>
                                        @if($row->status == 1)
                                        <span class="badge badge-success">Published</span>
                                        @else
                                        <span class="badge badge-danger">Draft</span>
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