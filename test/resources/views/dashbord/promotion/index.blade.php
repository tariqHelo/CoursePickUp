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
                    <h2>All Promotions</h2>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        @if(Auth::user()->role == 1 || getPermissionUser('Promotions','create', Auth::user()->id) == 1)

                        <a href="{{route('promotion.create')}}">
                            <button class="btn btn-md round btn-outline-success pull-right">
                                Add Promotion</button>
                        </a>

                        @endif
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

                                @foreach ($promotions as $promotion)
                                @if(Auth::user()->role != 1 && $promotion->userId == Auth::user()->id)
                                <tr>
                                    <td>{{$promotion->multiPromotions->count() ? $promotion->multiPromotions->first()->titleEn : 'multipronotion is empty'}}</td>
                                    <td>{{$promotion->validDateTo}}</td>
                                    <td class="pr-0">
                                        @if(Auth::user()->role == 1 || getPermissionUser('Promotions','edit', Auth::user()->id) == 1)

                                        <a href="{{route('promotion.edit',$promotion->id)}}">
                                            <button class="btn btn-sm round btn-outline-success">
                                                Edit
                                            </button>
                                        </a>

                                        @endif
                                        @if(Auth::user()->role == 1 || getPermissionUser('Promotions','delete', Auth::user()->id) == 1)

                                        <button type="button"
                                            onclick="document.getElementById('deletePromotion_{{$promotion->id}}').submit()"
                                            class="btn btn-sm round btn-outline-danger">Delete</button>
                                        <form hidden id="deletePromotion_{{$promotion->id}}"
                                            action="{{route('promotion.destroy',$promotion->id)}}" method="POST">
                                            @method('Delete')
                                            @csrf
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                
                                @if(Auth::user()->role == 1)
                                <tr>
                                    <td>{{$promotion->multiPromotions->count() ? $promotion->multiPromotions->first()->titleEn : 'multipronotion is empty'}}</td>
                                    <td>{{$promotion->validDateTo}}</td>
                                    <td class="pr-0">
                                        @if(Auth::user()->role == 1 || getPermissionUser('Promotions','edit', Auth::user()->id) == 1)

                                        <a href="{{route('promotion.edit',$promotion->id)}}">
                                            <button class="btn btn-sm round btn-outline-success">
                                                Edit
                                            </button>
                                        </a>

                                        @endif
                                        @if(Auth::user()->role == 1 || getPermissionUser('Promotions','delete', Auth::user()->id) == 1)

                                        <button type="button"
                                            onclick="document.getElementById('deletePromotion_{{$promotion->id}}').submit()"
                                            class="btn btn-sm round btn-outline-danger">Delete</button>
                                        <form hidden id="deletePromotion_{{$promotion->id}}"
                                            action="{{route('promotion.destroy',$promotion->id)}}" method="POST">
                                            @method('Delete')
                                            @csrf
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                
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