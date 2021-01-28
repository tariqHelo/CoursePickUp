@extends('dashbord.layouts')
@section('title')
<title>Add Transportation </title>
@endsection
@section('content')

<div class="content-wrapper">
    <h2 class="pb-2">Add Transportation ({{$school->titleEn}}):</h2>
    <div class="card">
        <form method="POST" action="{{route('storeAirportPickUp',$school->id)}}" class="ml-1 mt-1 mr-1">
            @csrf


            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title En :</label>
                <input required  type="text" name="titleEn" class="form-control" id="textbox2" placeholder="Title En ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title Ar :</label>
                <input required  type="text" name="titleAr" class="form-control" id="textbox2" placeholder="Title Ar ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">One Way:</label>
                <input required  type="number" name="oneWay" class="form-control" id="textbox2" placeholder="One Way...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Round Way:</label>
                <input required  type="number" name="roundWay" class="form-control" id="textbox2" placeholder="Round Way ...." />
            </fieldset>




            <div class="form-actions text-center">
                <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;"><i class="ft-x"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
            </div>
        </form>
    </div>

    @endsection