@extends('dashbord.layouts')
@section('title')
<title>Articles</title>
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h2>All Articles</h2>
                    @if (Auth::user()->role == 1 || getPermissionUser('Articles', 'create', Auth::user()->id) == 1) 

                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <button class="btn btn-md round btn-outline-success pull-right"> 
                            <a href="{{route('articles.create')}}">Add Article</a></button>
                    </div>
                    @endif
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <!-- <th>Title Ar</th> -->
                                    <th>Status</th>
                                    <th>Featured</th>
                                    <th>Publish date</th>
                                    <th>Latest update</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $row)

                                <tr>
                                    <td>{{$row->titleEn}}</td>
                                    <!-- <td>{{$row->titleAr}}</td> -->
                                    <td>
                                        @if($row->status)
                                            <span class="badge badge-success">Published</span>
                                        @else
                                            <span class="badge badge-secondary">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($row->featured)
                                            <span class="">
                                                <svg fill="#ff4961cf" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                  <circle cx="8" cy="8" r="8"/>
                                                </svg>
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('Y-m-d') }}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->updated_at)->format('Y-m-d') }}</td>
                                    <td class="pr-0">
                                        <button class="btn btn-sm round btn-outline-primary">
                                            <a target="_blank" href="{{ url( 'en/articles/' . $row->slugEn) }}">Show En</a>
                                        </button>
                                        <button class="btn btn-sm round btn-outline-primary">
                                            <a target="_blank" href="{{ url( 'ar/articles/' . $row->slugAr) }}">Show Ar</a>
                                        </button>

                                        @if(Auth::user()->role == 1 || getPermissionUser('Articles','edit', Auth::user()->id) == 1)

                                        <button class="btn btn-sm round btn-outline-success">
                                            <a href="{{route('articles.edit',$row->id)}}">Edit</a>
                                        </button>

                                        @endif
                                        @if(Auth::user()->role == 1 || getPermissionUser('Articles','delete', Auth::user()->id) == 1)

                                        <button type="button" onclick="document.getElementById('deleteArticles_{{$row->id}}').submit()" class="btn btn-sm round btn-outline-danger">Delete</button>
                                        <form hidden id="deleteArticles_{{$row->id}}" action="{{route('articles.destroy',$row->id)}}" method="POST">
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