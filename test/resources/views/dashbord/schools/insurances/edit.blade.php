@extends('dashbord.layouts')
@section('title')
<title>Edit Transportation </title>
@endsection
@section('content')

<div class="content-wrapper">
    <h2 class="pb-2">Edit Transportation ({{$insurance->school->titleEn}}):</h2>
    <div class="card">
        <form method="POST" action="{{route('updateInsurances',$insurance->id)}}" class="ml-1 mt-1 mr-1">
            @csrf


            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title En :</label>
                <input required  type="text" name="titleEn" value="{{$insurance->titleEn}}" class="form-control" id="textbox2"
                    placeholder="Title En ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title Ar :</label>
                <input required  type="text" name="titleAr" value="{{$insurance->titleAr}}" class="form-control" id="textbox2"
                    placeholder="Title Ar ...." />
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label for="textbox2">Fee :</label>
                <input required  type="text" name="fee" value="{{$insurance->fee}}" class="form-control" id="textbox2"
                    placeholder="Fee ...." />
            </fieldset>

            <div class="row form-group-style">
                <label class="col-md-3 label-control">status :</label>
                <div class="col-md-9 mx-auto">
                    <div class="input-group">
                        <div class="d-inline-block custom-control custom-radio mr-1">
                            <input required  type="radio" name="status" value="1" class="custom-control-input" @if($insurance->status
                            == 1) checked @endif
                            id="yes" />
                            <label class="custom-control-label" for="yes">Published</label>
                        </div>
                        <div class="d-inline-block custom-control custom-radio">
                            <input required  type="radio" name="status" @if($insurance->status == 0) checked @endif value="0"
                            class="custom-control-input" id="no" />
                            <label class="custom-control-label" for="no">Draft</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-actions text-center">
                <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;"><i class="ft-x"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
            </div>
        </form>
    </div>

    @endsection