@extends('dashbord.layouts')
@section('title')
<title>Add Country</title>
@endsection
@section('content')
<div class="content-wrapper">
    <h2 class="pb-2">Add Country :</h2>
    <div class="card ">
        <form method="post" action="{{route('countries.store')}}" class="ml-1 mt-1 mr-1" method="POST"
            enctype="multipart/form-data">
            @csrf
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Title En</label>
                <input required  type="text" class="form-control" name="titleEn" id="textbox2" placeholder="Title En ....">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Title Ar</label>
                <input required  type="text" class="form-control" name="titleAr" id="textbox2" placeholder="Title Ar ....">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Slug</label>
                <input required  type="text" class="form-control" name="slug" id="textbox2" placeholder="Slug ....">
            </fieldset>
            <fieldset class="form-group">
                <div class="custom-file">
                    <input required  type="file" class="custom-file-input" name="image" id="inputGroupFile02">
                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFile02">Choose
                        Main image</label>
                </div>
            </fieldset>
            <div class="row form-group-style">
                <label class="col-md-3 label-control">Featured main page :</label>
                <div class="col-md-9 mx-auto">
                    <div class="input-group">

                        <div class="d-inline-block custom-control custom-radio mr-1">
                            <input required  type="radio" name="featured" value="1" class="custom-control-input" checked=""
                                id="yes">
                            <label class="custom-control-label" for="yes">Yes</label>
                        </div>
                        <div class="d-inline-block custom-control custom-radio">
                            <input required  type="radio" name="featured" value="2" class="custom-control-input" id="no">
                            <label class="custom-control-label" for="no">No</label>
                        </div>
                    </div>
                </div>
            </div>


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
</div>
@endsection