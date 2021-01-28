@extends('dashbord.layouts')
@section('title')
<title>Edit Nationality </title>
@endsection
@section('content')

<div class="content-wrapper">
    <h2 class="pb-2">Edit Nationality :</h2>
    <div class="card ">

        <form method="POST" action="{{route('nationality.update',$data->id)}}" class="ml-1 mt-1 mr-1">
            @method('PUT')
            @csrf

            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title En</label>
                <input required  type="text" name="titleEn" value="{{$data->titleEn}}" class="form-control" id="textbox2"
                    placeholder="Title En ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title Ar</label>
                <input required  type="text" name="titleAr" value="{{$data->titleAr}}" class="form-control" id="textbox2"
                    placeholder="Title Ar ...." />
            </fieldset>
        
            <fieldset class="form-group form-group-style">
                <label class="col-md-3 label-control mt-2">Status :</label>
                <div class="input-group">
                    <div class="d-inline-block custom-control custom-radio mr-1">
                        <input required  type="radio" name="status" value="1" class="custom-control-input"
                            @if($data->status == 1) checked @endif
                        id="yess" />
                        <label class="custom-control-label" for="yess">Published</label>
                    </div>
                    <div class="d-inline-block custom-control custom-radio">
                        <input required  type="radio" name="status" value="0" @if($data->status == 0) checked @endif
                        class="custom-control-input" id="nos" />
                        <label class="custom-control-label" for="nos">Draft</label>
                    </div>
                </div>
            </fieldset>

            <div class="form-actions text-center">
                <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;"><i class="ft-x"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
            </div>

        </form>
    </div>
</div>



@endsection