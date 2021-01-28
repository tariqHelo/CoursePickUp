@extends('dashbord.layouts')
@section('title')
<title>Transportations</title>
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
                            <h2>Transportation ({{$school->titleEn}})</h2>
                            <div class="heading-elements">
                                <a href="{{route('viewAirportPickUpCreate',$school->id)}}">
                                    <button class="btn btn-md round btn-outline-success pull-right">
                                        Add Transportation
                                    </button>
                                </a>
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
                                                        <!-- <th>School</th> -->
                                                        <th>One Way</th>
                                                        <th>Round Way</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($school->airportPickUp as $airportPickUp)

                                                    <tr>
                                                        <td>{{$airportPickUp->titleEn}}</td>
                                                        <!-- <td>{{$school->titleEn}}</td> -->
                                                        <td>{{$airportPickUp->oneWay}}</td>
                                                        <td>{{$airportPickUp->roundWay}}</td>
                                                        <td>
                                                          
                                                            <a href="{{route('viewAirportPickUpEdit',$airportPickUp->id)}}">
                                                                <button class="btn btn-sm round btn-outline-success">
                                                                    Edit
                                                                </button>
                                                            </a>
                                                            @if(Auth::user()->role == 1)

                                                            <button type="button"
                                                                onclick="document.getElementById('deleteAirportPickUpCreate_{{$airportPickUp->id}}').submit()"
                                                                class="btn btn-sm round btn-outline-danger">Delete</button>
                                                            <form hidden id="deleteAirportPickUpCreate_{{$airportPickUp->id}}"
                                                                action="{{route('deleteAirportPickUp',$airportPickUp->id)}}"
                                                                method="POST">
                                                                {{-- @method('Delete') --}}
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
                                                        <!-- <th>School</th> -->
                                                        <th>One Way</th>
                                                        <th>Round Way</th>
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