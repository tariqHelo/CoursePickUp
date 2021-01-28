@extends('dashbord.layouts')
@section('title')
<title>Footer</title>
@endsection
@section('content')
<div class="row">
    <div class="content-wrapper col-6">

        <h3 class="pb-2">Working days (from-to) - Time (from-to) :</h3>
        <div class="card">

            <form method="POST" action="{{route('footerUpdate')}}" class="ml-1 mt-1 mr-1">
                @csrf
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">English</label>
                    <input required  name="workDaysFrom" value="{{getValueOfOptionFooter('workDaysFrom')}}" type="text" class="form-control" id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Arabic</label>
                    <input required  name="workDaysTo" value="{{getValueOfOptionFooter('workDaysTo')}}" type="text" class="form-control" id="textbox2" placeholder="">
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
        <h3 class="pb-2">About the company title :</h3>
        <div class="card">

            <form method="POST" action="{{route('footerUpdate')}}" class="ml-1 mt-1 mr-1">
                @csrf
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">English</label>
                    <input required  name="aboutCompanyTitleEn" value="{{getValueOfOptionFooter('aboutCompanyTitleEn')}}" type="text" class="form-control" id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Arabic</label>
                    <input required  name="aboutCompanyTitleAr" value="{{getValueOfOptionFooter('aboutCompanyTitleAr')}}" type="text" class="form-control" id="textbox2" placeholder="">
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
        <h3 class="pb-2">General Information :</h3>
        <div class="card">

            <form method="POST" action="{{route('footerUpdate')}}" class="ml-1 mt-1 mr-1">
                @csrf
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">English</label>
                    <input required  name="generalInformationEn" value="{{getValueOfOptionFooter('generalInformationEn')}}" type="text" class="form-control" id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Arabic</label>
                    <input required  name="generalInformationAr" value="{{getValueOfOptionFooter('generalInformationAr')}}" type="text" class="form-control" id="textbox2" placeholder="">
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

        <h2 class="pb-2">Customer Service title :</h2>
        <div class="card">

            <form method="POST" action="{{route('footerUpdate')}}" class="ml-1 mt-1 mr-1">
                @csrf
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">English</label>
                    <input required  name="customerServiceTitleEn" value="{{getValueOfOptionFooter('customerServiceTitleEn')}}" type="text" class="form-control" id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Arabic</label>
                    <input required  name="customerServiceTitleAr" value="{{getValueOfOptionFooter('customerServiceTitleAr')}}" type="text" class="form-control" id="textbox2" placeholder="">
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

        <h2 class="pb-2">Newsletter & Social description :</h2>
        <div class="card">

            <form method="POST" action="{{route('footerUpdate')}}" class="ml-1 mt-1 mr-1">
                @csrf
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">English</label>
                    <input required  name="newsletterSocialDesEn" value="{{getValueOfOptionFooter('newsletterSocialDesEn')}}" type="text" class="form-control" id="textbox2" placeholder="">
                </fieldset>
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Arabic</label>
                    <input required  name="newsletterSocialDesAr" value="{{getValueOfOptionFooter('newsletterSocialDesAr')}}" type="text" class="form-control" id="textbox2" placeholder="">
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