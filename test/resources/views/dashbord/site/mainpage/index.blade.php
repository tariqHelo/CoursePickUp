@extends('dashbord.layouts') @section('title')
<title>Main Page</title>
@endsection
@section('content')
<div class="row">


    <div class="content-wrapper col-6">

        <h3 class="pb-2">Partner Logos :</h3>
        
        <div class="card">

            <form class="ml-1 mt-1 mr-1" action="{{route('partner.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <fieldset class="form-group form-group-style ">
                    <label for="logo">Partner Logo</label>
                    <input type="File" class="form-control" id="logo" name="logo" >
                </fieldset>

                <div class="form-actions text-center">
                    <button type="button" class="btn btn-warning mr-1">
                <i class="ft-x"></i> Cancel
            </button>
                    <button type="submit" class="btn btn-primary mr-1">
                <i class="la la-check-square-o"></i> Save
            </button>
                    <a href="{{route('partner.index')}}">

                        <button type="button" class="btn btn-success mr-1">
                <i class="la la-check-square-o"></i> Show
            </button>
                    </a>
                </div>
            </form>
        </div>
    </div>



    <div class="content-wrapper col-6">
        <h3 class="pb-2">Main image :</h3>
        <div class="card">
            <form class="ml-1 mt-1 mr-1" method="POST" action="{{route('mainpageUpdate')}}"
                enctype="multipart/form-data">

                @csrf
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Main image</label>
                    <input required type="File" class="form-control" id="textbox2" placeholder="" name="mainImage">
                </fieldset>


                <div class="form-actions text-center">
                    <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;">
                        <i class="ft-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                    </button>
                </div>
            </form>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mainpageUpdate">
                preview <i class="la la-eye"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="mainpageUpdate" tabindex="-1" role="dialog" aria-labelledby="mainpageUpdate1"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mainpageUpdate1">Main image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ url('/pages/mainpage/'. getValueOfOptionMainPage('mainImage') )}}" alt="" height="300" width="100%">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="content-wrapper col-6">
        <h3 class="pb-2">Small title :</h3>
        <div class="card">

            <form class="ml-1 mt-1 mr-1" method="POST" action="{{route('mainpageUpdate')}}"
                enctype="multipart/form-data">

                @csrf
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">English</label>
                    <input required type="text" name="smallTitleEn" value="{{getValueOfOptionMainPage('smallTitleEn')}}"
                        class="form-control" id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Arabic</label>
                    <input required name="smallTitleAr" value="{{getValueOfOptionMainPage('smallTitleAr')}}" type="text"
                        class="form-control" id="textbox2" placeholder="">
                </fieldset>


                <div class="form-actions text-center">
                    <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;">
                        <i class="ft-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="content-wrapper col-6">

        <h3 class="pb-2">Big title :</h3>
        <div class="card">

            <form class="ml-1 mt-1 mr-1" method="POST" action="{{route('mainpageUpdate')}}"
                enctype="multipart/form-data">

                @csrf
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">English</label>
                    <input required name="bigTitleEn" value="{{getValueOfOptionMainPage('bigTitleEn')}}" type="text"
                        class="form-control" id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Arabic</label>
                    <input required name="bigTitleAr" value="{{getValueOfOptionMainPage('bigTitleAr')}}" type="text"
                        class="form-control" id="textbox2" placeholder="">
                </fieldset>


                <div class="form-actions text-center">
                    <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;">
                        <i class="ft-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="content-wrapper col-6">

        <h3 class="pb-2">Feature 1 :</h3>
        <div class="card">

            <form class="ml-1 mt-1 mr-1" method="POST" action="{{route('mainpageUpdate')}}"
                enctype="multipart/form-data">

                @csrf
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Title english</label>
                    <input required name="featureOneTitleEn" value="{{getValueOfOptionMainPage('featureOneTitleEn')}}"
                        type="text" class="form-control" id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Title arabic</label>
                    <input required name="featureOneTitleAr" value="{{getValueOfOptionMainPage('featureOneTitleAr')}}"
                        type="text" class="form-control" id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Description english</label>
                    <input required name="featureOneDescEn" value="{{getValueOfOptionMainPage('featureOneDescEn')}}"
                        type="text" class="form-control" id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Description arabic</label>
                    <input required name="featureOneDescAr" value="{{getValueOfOptionMainPage('featureOneDescAr')}}"
                        type="text" class="form-control" id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Icon</label>
                    <input name="featureOneIcon" value="{{getValueOfOptionMainPage('featureOneIcon')}}"
                        type="File" class="form-control" id="textbox2" placeholder="">
                </fieldset>

                <div class="form-actions text-center">
                    <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;">
                        <i class="ft-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="content-wrapper col-6">

        <h3 class="pb-2">Feature 2 :</h3>
        <div class="card">

            <form class="ml-1 mt-1 mr-1" method="POST" action="{{route('mainpageUpdate')}}"
                enctype="multipart/form-data">

                @csrf
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Title english</label>
                    <input required name="featureTwoTitleEn" value="{{getValueOfOptionMainPage('featureTwoTitleEn')}}"
                        type="text" class="form-control" id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Title arabic</label>
                    <input required name="featureTwoTitleAr" value="{{getValueOfOptionMainPage('featureTwoTitleAr')}}"
                        type="text" class="form-control" id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Description english</label>
                    <input required name="featureTwoDescEn" value="{{getValueOfOptionMainPage('featureTwoDescEn')}}"
                        type="text" class="form-control" id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Description arabic</label>
                    <input required name="featureTwoDescAr" value="{{getValueOfOptionMainPage('featureTwoDescAr')}}"
                        type="text" class="form-control" id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Icon</label>
                    <input name="featureTwoIcon" value="{{getValueOfOptionMainPage('featureTwoIcon')}}"
                        type="File" class="form-control" id="textbox2" placeholder="">
                </fieldset>

                <div class="form-actions text-center">
                    <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;">
                        <i class="ft-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="content-wrapper col-6">

        <h3 class="pb-2">Feature 3 :</h3>
        <div class="card">

            <form class="ml-1 mt-1 mr-1" method="POST" action="{{route('mainpageUpdate')}}"
                enctype="multipart/form-data">

                @csrf
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Title english</label>
                    <input required name="featureThreeTitleEn"
                        value="{{getValueOfOptionMainPage('featureThreeTitleEn')}}" type="text" class="form-control"
                        id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Title arabic</label>
                    <input required name="featureThreeTitleAr"
                        value="{{getValueOfOptionMainPage('featureThreeTitleAr')}}" type="text" class="form-control"
                        id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Description english</label>
                    <input required name="featureThreeDescEn" value="{{getValueOfOptionMainPage('featureThreeDescEn')}}"
                        type="text" class="form-control" id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Description arabic</label>
                    <input required name="featureThreeDescAr" value="{{getValueOfOptionMainPage('featureThreeDescAr')}}"
                        type="text" class="form-control" id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Icon</label>
                    <input name="featureThreeIcon" value="{{getValueOfOptionMainPage('featureThreeIcon')}}"
                        type="File" class="form-control" id="textbox2" placeholder="">
                </fieldset>

                <div class="form-actions text-center">
                    <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;">
                        <i class="ft-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection