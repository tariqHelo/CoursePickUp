{{--@extends('dashbord.layouts')--}}
{{--@section('title')--}}
{{--    <title>{{ setting('siteName') }} || Dashbord</title>--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--<div class="content-wrapper">--}}
{{--    <div class="content-header row">--}}
{{--    </div>--}}
{{--    <h1>Total Leads</h1>--}}
{{--    <div class="content-body">--}}
{{--        <div id="crypto-stats-3" class="row">--}}
{{--            <div class="col-xl-4 col-12">--}}
{{--                <div class="card crypto-card-3 pull-up">--}}
{{--                    <div class="card-content">--}}
{{--                        <div class="card-body pb-0">--}}
{{--                            <div class="row">--}}

{{--                                <div class="col-7 pl-2">--}}
{{--                                    <h4>Today</h4>--}}
{{--                                </div>--}}
{{--                                <div class="col-5 text-right">--}}
{{--                                    <h4>$9,980</h4>--}}
{{--                                    <h6 class="success darken-4">{{$restoDayLeads}}<i class="la la-arrow-up"></i></h6>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="chartjs-size-monitor">--}}
{{--                                    <div class="chartjs-size-monitor-expand">--}}
{{--                                        <div class=""></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="chartjs-size-monitor-shrink">--}}
{{--                                        <div class=""></div>--}}
{{--                                    </div>--}}
{{--                                </div><canvas id="btc-chartjs" class="height-75 chartjs-render-monitor"--}}
{{--                                    style="display: block; height: 75px; width: 296px;" width="444"--}}
{{--                                    height="112"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-4 col-12">--}}
{{--                <div class="card crypto-card-3 pull-up">--}}
{{--                    <div class="card-content">--}}
{{--                        <div class="card-body pb-0">--}}
{{--                            <div class="row">--}}

{{--                                <div class="col-7 pl-2">--}}
{{--                                    <h4>This Week</h4>--}}
{{--                                </div>--}}
{{--                                <div class="col-5 text-right">--}}
{{--                                    <h4>$944</h4>--}}
{{--                                    <h6 class="success darken-4">{{$resToWeekLeads}} <i class="la la-arrow-up"></i></h6>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="chartjs-size-monitor">--}}
{{--                                    <div class="chartjs-size-monitor-expand">--}}
{{--                                        <div class=""></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="chartjs-size-monitor-shrink">--}}
{{--                                        <div class=""></div>--}}
{{--                                    </div>--}}
{{--                                </div><canvas id="eth-chartjs" class="height-75 chartjs-render-monitor" width="444"--}}
{{--                                    height="112" style="display: block; height: 75px; width: 296px;"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-4 col-12">--}}
{{--                <div class="card crypto-card-3 pull-up">--}}
{{--                    <div class="card-content">--}}
{{--                        <div class="card-body pb-0">--}}
{{--                            <div class="row">--}}

{{--                                <div class="col-7 pl-2">--}}
{{--                                    <h4>Total</h4>--}}
{{--                                </div>--}}
{{--                                <div class="col-5 text-right">--}}
{{--                                    <h4>$944</h4>--}}
{{--                                    <h6 class="success darken-4">{{$resTotaLeads}}<i class="la la-arrow-up"></i></h6>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="chartjs-size-monitor">--}}
{{--                                    <div class="chartjs-size-monitor-expand">--}}
{{--                                        <div class=""></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="chartjs-size-monitor-shrink">--}}
{{--                                        <div class=""></div>--}}
{{--                                    </div>--}}
{{--                                </div><canvas id="xrp-chartjs" class="height-75 chartjs-render-monitor" width="444"--}}
{{--                                    height="112" style="display: block; height: 75px; width: 296px;"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}


{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h4 class="card-title">Newest Lead List</h4>--}}
{{--                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>--}}
{{--                    <div class="heading-elements">--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-content">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table table-de mb-0">--}}
{{--                            <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>Date</th>--}}
{{--                                    <th>Type</th>--}}
{{--                                    <th>Phone Number</th>--}}
{{--                                    <th>Show</th>--}}
{{--                                </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}

{{--                                @foreach ($leads as $row)--}}

{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        @if($row->date == null)--}}
{{--                                            {{$row->created_at}}--}}
{{--                                        @else--}}
{{--                                            {{$row->date}}--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td>--}}

{{--                                        @if($row->type == 1)--}}
{{--                                            {{"Add Lead Form"}}--}}
{{--                                        @elseif($row->type == 2 )--}}
{{--                                            {{"Booking Form"}}--}}
{{--                                        @elseif($row->type == 3 )--}}
{{--                                            {{"Help Button"}}--}}
{{--                                        @elseif($row->type == 4 )--}}
{{--                                            {{"Articles Form"}}--}}
{{--                                        @elseif($row->type == 5 )--}}
{{--                                            {{"Work With Us"}}--}}
{{--                                        @elseif($row->type == 6 )--}}
{{--                                            {{"Our Partner"}}--}}
{{--                                        @elseif($row->type == 7 )--}}
{{--                                            {{"Contact Us"}}--}}
{{--                                        @elseif($row->type == 8 )--}}
{{--                                            {{"Feedback Form"}}--}}
{{--                                        @elseif($row->type == 9 )--}}
{{--                                            {{"FAQ Form"}}--}}
{{--                                        @elseif($row->type == 10 )--}}
{{--                                            {{"Newsletter Emails"}}--}}
{{--                                        @endif--}}

{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        @if($row->phone == null)--}}
{{--                                            No data--}}
{{--                                        @else--}}
{{--                                            {{$row->phone}}--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        @if($row->type == 10)--}}
{{--                                            this not have Show--}}
{{--                                        @else--}}
{{--                                            <a href="{{route('leadsShow',[$row->type,$row->id])}}">--}}
{{--                                                <button class="btn btn-sm round btn-outline-danger">--}}
{{--                                                    Show--}}
{{--                                                </button>--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                </tr>--}}

{{--                                @endforeach--}}

{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--@section('script')--}}
{{--    <script>--}}
{{--        var  restoDayLeads = {--}}
{{--                int: {!! json_encode($restoDayLeads) !!},--}}
{{--            };--}}
{{--    </script>--}}
{{--@endsection--}}

{{--@endsection--}}


@extends('dashbord.layouts')
@section('title')
    <title>{{ setting('siteName') }} Administration</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <h1>Total Leads</h1>
        <div class="content-body">
            <div id="crypto-stats-3" class="row">
                <div class="col-xl-4 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">

                                    <div class="col-7 pl-2">
                                        <h4>Today</h4>
                                    </div>
                                    <div class="col-5 text-right">
                                        <h4>$9,980</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="btc-chartjs" class="height-75 chartjs-render-monitor"
                                            style="display: block; height: 75px; width: 296px;" width="444"
                                            height="112"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">

                                    <div class="col-7 pl-2">
                                        <h4>This Week</h4>
                                    </div>
                                    <div class="col-5 text-right">
                                        <h4>$944</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="eth-chartjs" class="height-75 chartjs-render-monitor" width="444"
                                            height="112" style="display: block; height: 75px; width: 296px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="card crypto-card-3 pull-up">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">

                                    <div class="col-7 pl-2">
                                        <h4>Total</h4>
                                    </div>
                                    <div class="col-5 text-right">
                                        <h4>$944</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="xrp-chartjs" class="height-75 chartjs-render-monitor" width="444"
                                            height="112" style="display: block; height: 75px; width: 296px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Newest Lead List</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">

                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-de mb-0">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Phone Number</th>
                                    <th>Show</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($leads as $row)

                                    <tr>
                                        <td>
                                            @if($row->date == null)
                                                {{$row->created_at}}
                                            @else
                                                {{$row->date}}
                                            @endif
                                        </td>
                                        <td>

                                            @if($row->type == 1)
                                                {{"Add Lead Form"}}
                                            @elseif($row->type == 2 )
                                                {{"Booking Form"}}
                                            @elseif($row->type == 3 )
                                                {{"Help Button"}}
                                            @elseif($row->type == 4 )
                                                {{"Articles Form"}}
                                            @elseif($row->type == 5 )
                                                {{"Work With Us"}}
                                            @elseif($row->type == 6 )
                                                {{"Our Partner"}}
                                            @elseif($row->type == 7 )
                                                {{"Contact Us"}}
                                            @elseif($row->type == 8 )
                                                {{"Feedback Form"}}
                                            @elseif($row->type == 9 )
                                                {{"FAQ Form"}}
                                            @elseif($row->type == 10 )
                                                {{"Newsletter Emails"}}
                                            @endif

                                        </td>
                                        <td>
                                            @if($row->phone == null)
                                                No data
                                            @else
                                                {{$row->phone}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->type == 10)
                                                this not have Show
                                            @else
                                                <a href="{{route('leadsShow',[$row->type,$row->id])}}">
                                                    <button class="btn btn-sm round btn-outline-danger">
                                                        Show
                                                    </button>
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

@section('script')

@endsection

@endsection

