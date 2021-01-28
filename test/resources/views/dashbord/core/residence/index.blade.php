@extends('dashbord.layouts')
@section('title')
<title>Places of Residence</title>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <section id="pagination">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>All Places of Residence</h2>
                            <div class="heading-elements">
                                @if(Auth::user()->role == 1 || getPermissionUser('Core','create', Auth::user()->id) ==
                                1)

                                <a href="{{route('residence.create')}}">
                                    <button class="btn btn-md round btn-outline-success pull-right">
                                        Add Place of Residence
                                    </button>
                                </a>
                                @endif
                            </div>
                        </div>

                        <section class="row all-contacts">
                            <div class="col-12">

                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- Task List table -->

                                        <div class="table-responsive">
                                            <table id="users-contacts"
                                                class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $row)

                                                    <tr>
                                                        <td>{{$row->titleEn}}</td>
                                                        <td>
                                                            @if($row->status == 1)
                                                            <span class="badge badge-success">Published</span>
                                                            @elseif($row->status == 0)
                                                            <span class="badge badge-danger">Draft</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if(Auth::user()->role == 1 ||
                                                            getPermissionUser('Core','edit', Auth::user()->id) == 1)

                                                            <a href="{{route('residence.edit',$row->id)}}">
                                                                <button class="btn btn-sm round btn-outline-success">
                                                                    Edit
                                                                </button>
                                                            </a>
                                                            @endif

                                                            @if(Auth::user()->role == 1 ||
                                                            getPermissionUser('Core','delete', Auth::user()->id) == 1)

                                                            <button type="button"
                                                                onclick="document.getElementById('deleteResidence_{{$row->id}}').submit()"
                                                                class="btn btn-sm round btn-outline-danger">Delete</button>
                                                            <form hidden id="deleteResidence_{{$row->id}}"
                                                                action="{{route('residence.destroy',$row->id)}}"
                                                                method="POST">
                                                                @method('Delete')
                                                                @csrf
                                                            </form>
                                                            @endif

                                                        </td>

                                                        </td>
                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
        </section>

    </div>
</div>
</div>
</section>
</div>
@endsection