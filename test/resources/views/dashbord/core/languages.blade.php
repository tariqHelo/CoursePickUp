@extends('dashbord.layouts')
@section('title')
<title>Languages</title>
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h2>Site Languages</h2>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <button class="btn btn-md round btn-outline-success pull-right">
                            <a href="{{action('CoresettingsController@addLanguage')}}">Add
                                Language</a></button>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th>Actions</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                <tr>
                                    <td>{{$row->name}}</td>

                                    <td>
                                        <img src="{{ asset('') }}{{$row->icon}}" alt="" style="width: 18px;">
                                    </td>

                                    <td>
                                        <a href="{{route('editLanguage',$row->id)}}" class="primary edit mr-3">
                                            <i class="la la-pencil"></i>
                                        </a>

                                        <a onclick="document.getElementById('deleteLanguage_{{$row->id}}').submit()"
                                            class="danger  mr-1"><i class="la la-trash-o"></i>
                                        </a>
                                        <form hidden id="deleteLanguage_{{$row->id}}"
                                            action="{{route('deleteLanguage',$row->id)}}" method="POST">
                                            @method('Delete')
                                            @csrf
                                        </form>

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