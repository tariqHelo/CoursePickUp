@extends('dashbord.layouts')
@section('title')
<title>Booking Requests</title>
@endsection
@section('content')
<div class="content-wrapper">

<div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Booking Requests List</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('HomeDashbord')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Booking Requests</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="media width-250 float-right">
                <media-left class="media-middle">
                    <div id="sp-bar-total-sales"></div>
                </media-left>
                <div class="media-body media-right text-right">
                    <h3 class="m-0">{{ $requests->count() }}</h3>
                    <span class="text-muted">Total Booking Requests</span>
                </div>
            </div>
        </div>
    </div>




    <div class="content-body">
        <section id="pagination">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Booking Requests</h4>
                        </div>
                        <section class="row all-contacts">
                            <div class="col-12">
                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- Task List table -->
                                        <div class="table-responsive">
                                            <table id="users-contacts"
                                                class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle text-center" >
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Nationality</th>
                                                        <th>Date</th>
                                                        
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($requests as $request)

                                                    <tr>
                                                        <td>{{$request->first_name}} {{$request->last_name}}</td>
                                                        <td>{{$request->phone}}</td>
                                                        <td>{{$request->nationality ? $request->nationality->titleEn : ''}}</td>
                                                        
                                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $request->created_at)->format('Y-m-d h:i a') }} UTC</td>
                                                        <td class="pr-0">
                                                            
                                                            <a target="_blank" href="{{ url('/invoices/'.$request->invoice) }}" class="info mr-1">
                                                                <i class="la la-file-pdf-o"></i>
                                                            </a>

                                                            <a href="{{ route('booking.requests.edit', [$request->id, 'confirmed']) }}" class="primary mr-1">
                                                                <i class="la la-pencil"></i>
                                                            </a>
                                                            @if(Auth::user()->role == 1 || getPermissionUser('Articles','delete', Auth::user()->id) == 1)

                                                            <a class="danger mr-1"
                                                                onclick="document.getElementById('deleteRequests_{{$request->id}}').submit()">
                                                                <i class="la la-trash-o"></i>
                                                                <form hidden id="deleteRequests_{{$request->id}}"
                                                                    action="{{route('booking.destroy',$request->id)}}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('Delete')

                                                                </form>
                                                            </a>
                                                            @endif

                                                            <a href="{{route('booking.show',$request->id)}}" class="success mr-1">
                                                                <i class="la la-eye"></i>
                                                            </a>

                                                            <!-- <button type="button" onclick="document.getElementById('deleteRequests_{{$request->id}}').submit()" class="btn btn-sm round btn-outline-danger">Delete</button>
                                                            <form hidden id="deleteRequests_{{$request->id}}" action="{{route('booking.destroy',$request->id)}}" method="POST">
                                                                @method('Delete')
                                                                @csrf
                                                            </form> -->
                                                        </td>
                                                    </tr>

                                                    @endforeach

                                                </tbody>
                                            </table>
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


</div>



@endsection