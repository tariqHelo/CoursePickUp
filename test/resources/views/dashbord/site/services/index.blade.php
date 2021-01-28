@extends('dashbord.layouts') @section('title')
<title>Services</title>
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h2>All Services</h2>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        @if(Auth::user()->role == 1 || getPermissionUser('Site','create', Auth::user()->id) == 1)
                            <a href="{{route('services.create')}}">
                                <button class="btn btn-md round btn-outline-success pull-right">
                                    Add service</button>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Publish date</th>
                                    <th>Latest update</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)

                                <tr>
                                    <td>{{$row->titleEn}}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('Y-m-d') }}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->updated_at)->format('Y-m-d') }}</td>
                                    <td class="pr-0">
                                        <button class="btn btn-sm round btn-outline-primary">
                                            <a target="_blank" href="{{ url(get_default_lang() . '/services/' . (get_default_lang() == 'ar' ? $row->slugAr : $row->slugEn)) }}">Show</a>
                                        </button>
                                        @if(Auth::user()->role == 1 || getPermissionUser('Site','edit', Auth::user()->id) == 1)
                                        
                                        <a href="{{route('services.edit',$row->id)}}">
                                                <button class="btn btn-sm round btn-outline-success">Edit</button>
                                        </a>

                                        @endif
                                        
                                        @if(Auth::user()->role == 1 || getPermissionUser('Site','delete', Auth::user()->id) == 1)
                                            <button  class="btn btn-sm round btn-outline-danger mr-1" onclick="document.getElementById('formDelete_{{$row->id}}').submit()">
                                                Delete
                                            </button>
                                            <form hidden id="formDelete_{{$row->id}}" style="height: 10px;width: 10px"
                                                onclick="submit()" action="{{route('services.destroy',$row->id)}}"
                                                method="POST">
                                                @csrf
                                                @method('Delete')
                                            </form>
                                        </a>
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