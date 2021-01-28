@extends('dashbord.layouts')
@section('title')
<title>Add Langue</title>
@endsection
@section('content')

<div class="content-wrapper ">

    <h2 class="pb-2">Add Langue :</h2>
    <div class="card">

        <form method="POST" action="{{action('CoreSettingsController@postLanguage')}}" enctype="multipart/form-data" class="ml-1 mt-1 mr-1">
            @csrf
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Languages Name</label>
                <input required  type="text" class="form-control" id="textbox2" name="name" placeholder="Name" value="">
            </fieldset>

            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Languages Icon</label>
                <input required  type="file" class="form-control" id="textbox2" name="icon" placeholder="Name" value="">
            </fieldset>


            <fieldset class="form-group form-group-style">
                <label for="textbox2">Status</label>
                <select required class="form-control" name="status" id="users-list-verified">

                    <option value="1">Published </option>
                    <option value="2">Draft</option>
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