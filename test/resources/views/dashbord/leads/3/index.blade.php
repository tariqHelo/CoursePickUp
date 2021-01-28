@extends('dashbord.layouts')
@section('title')
<title>Help Button List</title>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Help Button List</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{url('dashbord')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Help Button</li>
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
                    <h3 class="m-0">{{$total}}</h3>
                    <span class="text-muted">Total Inquiry Leads</span>
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
                            <h4 class="card-title">Inquiry Leads</h4>
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
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Nationality</th>
                                                        <th>Date</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $row)

                                                    <tr>
                                                        <td>
                                                            <a class="media-heading name">{{$row->fName}}</a>
                                                        </td>
                                                        <td class="text-center">
                                                            <a class="email"
                                                                href="{{route('leadsShow',[$id,$row->id])}}">{{$row->phone}}</a>
                                                        </td>
                                                        <td class="phone">
                                                            @foreach (App\nationalities::all() as $nationality)
                                                                @if($nationality->id == $row->nationality)
                                                                   {{$nationality->titleEn}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="text-center">
                                                            {{$row->created_at->format('Y-m-d')}}
                                                        </td>

                                                        <td>
                                                            @if(Auth::user()->role == 1 || getPermissionUser('Leads','edit', Auth::user()->id) == 1)

                                                            <a href="{{route('leadsEdit',[$id,$row->id])}}"
                                                                class="primary edit mr-1">
                                                                <i class="la la-pencil"></i>
                                                            </a>
                                                            @endif
                                                            @if(Auth::user()->role == 1 || getPermissionUser('Leads','delete', Auth::user()->id) == 1)

                                                            <a class="danger mr-1"
                                                                onclick="document.getElementById('formDeleteLeads_{{$row->id}}').submit()">
                                                                <i class="la la-trash-o"></i>
                                                                <form hidden id="formDeleteLeads_{{$row->id}}"
                                                                    action="{{route('leadsDestroy',[$id,$row->id])}}"
                                                                    method="POST">
                                                                    @csrf

                                                                </form>
                                                            </a>
                                                            @endif
                                                            <a href="{{route('leadsShow',[$id,$row->id])}}"
                                                                class="success mr-1"><i class="la la-eye"></i></a>
                                                        </td>
                                                    </tr>

                                                    @endforeach

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Nationality</th>
                                                        <th>Date</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </tfoot>
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