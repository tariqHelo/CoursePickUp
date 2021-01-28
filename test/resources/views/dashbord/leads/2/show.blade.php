@extends('dashbord.layouts')
@section('title')
<title>Booking Details</title>
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
                            <h4 class="media-heading"><span class="users-view-name">{{$data->fName}} {{$data->lName}}
                                </span></h4>
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
                            <table class="table table-borderless" id="exportTable">
                                <thead hidden>
                                    <tr>
                                        <th>Name</th>
                                        <th>Content</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>First Name:</td>
                                        <td class="users-view-username">{{$data->fName}}</td>
                                    </tr>
                                    <tr>
                                        <td>Last Name:</td>
                                        <td class="users-view-name">{{$data->lName}}</td>
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
                                        <td>Notes:</td>
                                        <td>{{$data->notes}}</td>
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
                                        <td>Invoice Link:</td>
                                        <td>{{$data->invoice}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date & Time:</td>
                                        <td>{{$data->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>Device Type:</td>
                                        <td>{{$data->device}}</td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- <div class="text-center">

                        <button type="button" id="exportButton" class="btn round btn-success mb-1   btn-glow">
                            Download </button>
                    </div> -->
                </div>
            </div>
            <!-- users view card details ends -->
        </section>

        <!-- users view ends -->
    </div>
</div>


<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- you need to include the shieldui css and js assets in order for the components to work -->
<script type="text/javascript" src="https://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript" src="https://www.shieldui.com/shared/components/latest/js/jszip.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $("#exportButton").click(function () {
            // parse the HTML table element having an id=exportTable
            var dataSource = shield.DataSource.create({
                data: "#exportTable",
                schema: {
                    type: "table",
                    fields: {
                        Name: { type: String },
                        Content: { type: String },
                    }
                }
            });

            // when parsing is done, export the data to PDF
            dataSource.read().then(function (data) {
                var pdf = new shield.exp.PDFDocument({
                    author: "PrepBootstrap",
                    created: new Date()
                });

                pdf.addPage("a4", "portrait");

                pdf.table(
                    50,
                    50,
                    data,
                    [
                        { field: "Name", title: "Option Name", width: 200 },
                        { field: "Content", title: "Content", width: 200 },
                    ],
                    // {
                    //     margins: {
                    //         top: 50,
                    //         left: 
                    //     }
                    // }
                );

                pdf.saveAs({
                    fileName: "{{$data->fName}}{{$data->lName}}"
                });
            });
        });
    });
</script>


@endsection