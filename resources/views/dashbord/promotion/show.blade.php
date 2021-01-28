@extends('dashbord.layouts')
@section('title')
<title>Promotions</title>
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h2>All Promotions ({{$school->titleEn}})</h2>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <a href="{{route('promotion.createById',$school->id)}}">
                            <button class="btn btn-md round btn-outline-success pull-right">
                                Add Promotion</button>
                        </a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Valid to Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($school->multiPromotions as $multiPromotion)
                                <tr>
                                    <td>{{$multiPromotion->titleEn}}</td>
                                    <td>{{$multiPromotion->promotion->validDateTo}}</td>
                                    <td class="pr-0">
                                        <a href="{{route('promotion.edit',$multiPromotion->promotion)}}">
                                            <button class="btn btn-sm round btn-outline-success">
                                                Edit
                                            </button>
                                        </a>

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