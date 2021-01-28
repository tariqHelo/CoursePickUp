@extends('dashbord.layouts')
@section('title')
<title>Currency</title>
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h2>Currency</h2>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <button class="btn btn-md round btn-outline-success pull-right">
                            <a href="{{route('currency.create')}}">Add
                                Currency</a></button>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <thead>
                                <tr>
                                    <th class="pl-0 pr-0"></th>
                                    <th class="pl-0 pr-0">USD</th>
                                    <th class="pl-0 pr-0">GBP</th>
                                    <th class="pl-0 pr-0">EUR</th>
                                    <th class="pl-0 pr-0">CAD</th>
                                    <th class="pl-0 pr-0">AUD</th>
                                    <th class="pl-0 pr-0">NZD</th>
                                    <th class="pl-0 pr-0">SAR</th>
                                    <th class="pl-0 pr-0">AED</th>
                                    <th class="pl-0 pr-0">KWD</th>
                                    <th class="pl-0 pr-0">OMR</th>
                                    <th class="pl-0 pr-0">BHD</th>
                                    <th class="pl-0 pr-0">JOD</th>
                                    <th class="pl-0 pr-0">QAR</th>
                                    <th class="pl-0 pr-0">MYR</th>
                                    <th class="pl-0 pr-0">TRY</th>
                                    <th class="pl-0 pr-0">EGP</th>


                                    <th class="pl-0 pr-0">Actions</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)

                                <tr>
                                    <td class="pl-1 pr-0">{{$row->name}}</td>
                                    <td class="pl-0 pr-0">{{$row->usd}}</td>
                                    <td class="pl-0 pr-0">{{$row->gbp}}</td>
                                    <td class="pl-0 pr-0">{{$row->eur}}</td>
                                    <td class="pl-0 pr-0">{{$row->cad}}</td>
                                    <td class="pl-0 pr-0">{{$row->aud}}</td>
                                    <td class="pl-0 pr-0">{{$row->nzd}}</td>
                                    <td class="pl-0 pr-0">{{$row->sar}}</td>
                                    <td class="pl-0 pr-0">{{$row->aed}}</td>
                                    <td class="pl-0 pr-0">{{$row->kwd}}</td>
                                    <td class="pl-0 pr-0">{{$row->omr}}</td>
                                    <td class="pl-0 pr-0">{{$row->bhd}}</td>
                                    <td class="pl-0 pr-0">{{$row->jod}}</td>
                                    <td class="pl-0 pr-0">{{$row->qar}}</td>
                                    <td class="pl-0 pr-0">{{$row->myr}}</td>
                                    <td class="pl-0 pr-0">{{$row->try}}</td>
                                    <td class="pl-0 pr-0">{{$row->egp}}</td>
                                    <td class="pl-0 pr-0">
                                        <button class="btn btn-sm round btn-outline-primary">
                                            <a href="{{route('currency.edit',$row->id)}}">Edit</a>
                                        </button>
                                        @if(Auth::user()->role == 1)
                                        <button type="button"
                                            onclick="document.getElementById('deleteCurrency_{{$row->id}}').submit()"
                                            class="btn btn-sm round btn-outline-danger">Delete</button>
                                        <form hidden id="deleteCurrency_{{$row->id}}"
                                            action="{{route('currency.destroy',$row->id)}}" method="POST">
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