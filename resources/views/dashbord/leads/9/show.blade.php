@extends('dashbord.layouts')
@section('title')
<title>FAQ Details </title>
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
            <!-- users view media object ends -->
            <!-- users view card data start -->

            <!-- users view card data ends -->
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
                                        <td>Phone Number:</td>
                                        <td>{{$data->phone}}</td>
                                    </tr>
                                   
                                    <tr>
                                        <td>Message:</td>
                                        <td>{{$data->notes}}</td>
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
