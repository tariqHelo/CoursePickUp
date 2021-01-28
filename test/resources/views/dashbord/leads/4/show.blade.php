@extends('dashbord.layouts')
@section('title')
<title>Articles Details </title>
@endsection
@section('content')

<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <!-- users view start -->
        <section class="users-view">
            <!-- users view media object start -->
            <div class="row">
                <div class="col-12 col-sm-7">
                    <div class="media mb-2">

                        <div class="media-body pt-25">
                            <h4 class="media-heading"><span class="users-view-name">{{$data->fName}} </span></h4>
                            <span>ID:</span>
                            <span class="users-view-id">{{$data->id}}</span>
                        </div>
                    </div>
                </div>

            </div>
            <!-- users view card details start -->
            <div class="card">
                <div class="card-content">
                    <div class="card-body">

                        <div class="col-12">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Name:</td>
                                        <td class="users-view-username">{{$data->fName}}</td>
                                    </tr>

                                    <tr>
                                        <td>E-mail:</td>
                                        <td class="users-view-email">{{$data->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td>{{$data->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nationality:</td>
                                        @foreach (App\nationalities::all() as $row)
                                        @if($row->id == $data->nationality)
                                           <td>{{$row->titleEn}}</td>
                                        @endif
                                    @endforeach
                                    </tr>
                                    <tr>
                                        <td>Place of Residence:</td>
                                        @foreach (App\residences::all() as $row)
                                            @if($row->id == $data->placeOfResidence)
                                               <td>{{$row->titleEn}}</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>Destination:</td>
                                        @foreach (App\destination::all() as $row)
                                            @if($row->id == $data->destination)
                                                <td>{{$row->titleEn}}</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>Notes:</td>
                                        <td>{{$data->notes}}</td>
                                    </tr>

                                    <tr>
                                        <td>Date & Time:</td>
                                        <td>
                                            {{ Carbon\Carbon::parse($data->created_at)->format('Y-m-d') }}
                                            & 
                                            {{ Carbon\Carbon::parse($data->created_at)->format('  h:i ') }}    
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- users view card details ends -->

        </section>
        <!-- users view ends -->
    </div>
</div>

@endsection
