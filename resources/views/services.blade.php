@extends('layouts.layouts')
@section('content')

    <!-- start Main Wrapper -->
    <div class="main-wrapper scrollspy-container">

        <section class="page-wrapper page-result pb-0">

            <div class="page-title bg-light mb-0">

                <div class="container">

                    <div class="row gap-15 align-items-center">

                        <div class="col-12 col-md-7">

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active px-2" aria-current="page">{{__("messages.الخدمات")}}</li>
                                </ol>
                            </nav>

                            <h4 class="mt-0 line-125">{{__("messages.الخدمات")}}</h4>

                        </div>

                    </div>

                </div>

            </div>

            <div class="container pt-30 pb-70 mb-50">

                <div class="section-title w-100 text-center">
                    @if(app()->getLocale() == 'ar')
                    <h2><span> <span>جميع </span>الخدمات</span></h2>
                    @else
                    <h2><span> <span>Our </span>Services</span></h2>
                    @endif
                    <p>
                        {{__("messages.Our students will benefit from a variety of services to ensure the best language learning experience.")}}</p>
                </div>

                <div class="row equal-height cols-1 cols-sm-2 cols-xl-4 gap-30 mb-40">

                    @foreach($services as $service)
                        <div class="col">
                            <div class="featured-image-item-08">
                                <div class="image">
                                    <div class="image-inner">
                                        <a href="{{ url(get_default_lang() . '/services/' . (get_default_lang() == 'ar' ? $service->slugAr : $service->slugEn)) }}"><img
                                                src=" {{asset('services/image/'.$service->image)}}"
                                                alt="Images"/></a>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="icon-font text-primary">
                                        <img class="text-primary d-inline mw-75"
                                            src=" {{asset('services/icon/'.$service->icon)}}"
                                            alt="Images"/>
                                    </div>
                                    <h5>@if( get_default_lang() =="ar") {{$service->titleAr}} @else {{$service->titleEn}} @endif</h5>
                                    <p>@if( get_default_lang() =="ar"){{$service->shortDescriptionAr}} @else {{$service->shortDescriptionEn}} @endif</p>
                                    <a href={{ url(get_default_lang() . '"services/' . $service->id) }}" class="h6 text-primary">{{__("messages.learn more")}}
                                        <i
                                            @if( get_default_lang() =="ar")class="oi oi-arrow-thick-left"
                                            @else class="oi oi-arrow-thick-right" @endif></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <nav class="pager-wrappper mt-50">
                    <ul class="pagination justify-content-center mb-0 pb-0">
                        <li>
                            {{ $services->links() }}

                        </li>

                    </ul>
                </nav>
            </div>

        </section>

    </div>
    <!-- end Main Wrapper -->
@endsection
