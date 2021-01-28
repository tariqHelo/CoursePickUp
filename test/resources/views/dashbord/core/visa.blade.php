@extends('dashbord.layouts')
@section('title')
<title>visa List</title>
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
                            <h4 class="card-title">All Visa</h4>
                            @if(Auth::user()->role == 1 || getPermissionUser('Core','create', Auth::user()->id) == 1)

                            <div class="heading-elements">
                                <button class="btn btn-md round btn-outline-success pull-right"> <a
                                        href="{{route('visa.create')}}">Add New Visa</a></button>
                            </div>
                            
                            @endif
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
                                                        <th>Country</th>
                                                        <th>Weeks From</th>
                                                        <th>Weeks To</th>
                                                        <th>Hours Per Week</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($visas as $visa)
                                                    <tr>
                                                        <td>
                                                        <a class="media-heading name">{{$visa->titleEn}}</a>
                                                        </td>
                                                        <td class="text-center">
                                                            <a class="media-heading name">{{$visa->country->titleEn}}</a>
                                                        </td>
                                                        <td class="phone">{{$visa->weekForm}}</td>
                                                        <td class="text-center">
                                                            {{$visa->weekTo}}
                                                        </td>

                                                        <td class="text-center">
                                                            <a class="media-heading name">{{$visa->minHours}} Hours</a>
                                                        </td>
                                                        <td style="text-align: center !important">
                                                            @if(Auth::user()->role == 1 || getPermissionUser('Core','edit', Auth::user()->id) == 1)

                                                            <a href="{{route('visa.edit',$visa->id)}}">
                                                                <i class="la la-pencil"></i>
                                                                    
                                                            </a>
                                                            @endif
                                                            @if(Auth::user()->role == 1 || getPermissionUser('Core','delete', Auth::user()->id) == 1)

                                                             <a class="danger  mr-1" onclick="document.getElementById('formDelete_{{$visa->id}}').submit()">
                                                                
                                                                <i class="la la-trash-o"></i>
                                                             <form hidden id="formDelete_{{$visa->id}}" style="height: 10px;width: 10px" onclick="submit()" action="{{route('visa.destroy',$visa->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('Delete')
                                                                </form>
                                                            </a>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Country</th>
                                                        <th>Weeks From</th>
                                                        <th>Weeks To</th>
                                                        <th>Hours Per Week</th>
                                                        <th>Actions</th>
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