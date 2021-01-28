@extends('dashbord.layouts')
@section('title')
<title>Add Langue</title>
@endsection
@section('content')

<div class="content-wrapper ">

    <h2 class="pb-2">Add Langue :</h2>
    <div class="card">

        <form method="POST" action="{{route('updateLanguage',$id)}}" enctype="multipart/form-data" class="ml-1 mt-1 mr-1">
            @csrf
            @method('PUT')
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Languages Name</label>
            <input required  type="text" class="form-control" value="{{$data->name}}" id="textbox2" name="name" placeholder="Name" value="">
            </fieldset>

            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Languages Icon</label>
                <input required  type="file" class="form-control" id="textbox2" value="{{$data->icon}}" name="icon" placeholder="Name" value="">
            </fieldset>


            <fieldset class="form-group form-group-style">
                <label for="textbox2">Status</label>
                <select required class="form-control" name="status" id="users-list-verified">

                    <option value="1" @if($data->status == 1) selected @endif >Published </option>
                    <option value="2" @if($data->status == 2) selected @endif>Draft</option>
                </select>
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

    @endsection