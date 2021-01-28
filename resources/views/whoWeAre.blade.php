@extends('layouts.layouts')
@section('content')
    <!-- start Main Wrapper -->
    <div class="main-wrapper scrollspy-container">

        <section class="page-wrapper page-detail">

            <div class="page-title bg-light border-bottom pt-25 mb-0 border-bottom-0">

                <div class="container">

                    <div class="row gap-15 align-items-center">

                        <div class="col-12 col-md-7">

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <a href="/"><i class="fas fa-home"></i></a>  <li style="margin: 5px 5px;" @if( get_default_lang() =="ar")class="oi oi-arrow-thick-left"@else class="oi oi-arrow-thick-right" @endif></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__("messages.من نحن")}}</li>
                                </ol>
                            </nav>
                            <h4 class="mt-0 line-125">{{__("messages.من نحن")}}</h4>

                            <!-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Blogs</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog single - full width</li>
                                </ol>
                            </nav> -->

                        </div>

                    </div>

                </div>

            </div>

            <div class="container pt-30">

                <div class="row gap-20 gap-lg-40">

                    <div class="col-12 col-lg-12">

                        <div class="content-wrapper">

                            <article class="blog-single-wrapper full-width">

                                <div class="row justify-content-center ">

                                    <div class="col-12 col-lg-10 col-xl-9">

                                        <div class="blog-single-heading text-center">
                                            <h1> @if( get_default_lang() =="ar"){{$data->titleAr}} @else {{$data->titleEn}} @endif</h1>
                                            <!-- <ul class="meta-list text-muted">
                                                <li>by <a href="#">Admin</a></li>
                                                <li>on January 09, 2019</li>
                                                <li>in <a href="#">Adventure</a>, <a href="#">Backpack</a></li>
                                                <li>32 comments</li>
                                            </ul> -->
                                        </div>

                                    </div>

                                </div>

                                <div class="image">
                                    <img src="{{asset("$data->image")}}" alt="images"/>
                                </div>

                                <div class="row justify-content-center ">

                                    <div class="col-12 col-lg-10 col-xl-9">

                                        <div class="blog-entry">

                                            <p>{!! $data->contentAr !!} </p>


                                            <div class="row gap-30 mt-40">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- end Main Wrapper -->



@endsection
