@extends('layouts.layouts')
@section('content')


    <!-- start Main Wrapper -->
    <div class="main-wrapper scrollspy-container">

        <div class="error-404-wrapper">

            <div class="container">

                <!-- <h1 id="hthank2" class="text-primary">{{__("messages.thanks.thank you !")}}</h1> -->
                <!-- <h3>Sorry, the page could not be found</h3> -->

                <p class="lead">
                    {!!__("messages.thanks.newsletter")!!}
                </p>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="/" id="btn_thank" class="btn btn-primary btn-block">{{__("messages.home")}}</a>
                </div>
            </div>

        </div>

    </div>
    <!-- end Main Wrapper -->

@endsection
