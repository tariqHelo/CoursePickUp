@extends('dashbord.layouts') @section('title')
<title>Visa Add</title>
@endsection @section('content')
<div class="content-wrapper">
    <h2 class="pb-2">Add Visa :</h2>
    <div class="card">
        <form method="POST" action="{{route('visa.store')}}" class="ml-1 mt-1 mr-1">
            @csrf
            <fieldset class="form-group form-group-style">
                <label for="titleEn">Title En</label>
                <input required  type="text" class="form-control" name="titleEn" id="titleEn" placeholder="Title En ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="titleAr">Title Ar</label>
                <input required  type="text" class="form-control" name="titleAr" id="titleAr" placeholder="Title Ar ...." />
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label class="mb-1">Country :</label>

                <select required class="form-control" name="country" id="countrySelect">
                    @foreach ($countries as $country)
                         <option value="{{$country->id}}">{{$country->titleEn}}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style mb-1">
                <label for="weekForm">Weeks From :</label>

                <input required  type="number" class="form-control" name="weekForm" id="weekForm" placeholder="Weeks From" />
            </fieldset>

            <fieldset class="form-group form-group-style mb-1">
                <label for="weekTo">Weeks To :</label>

                <input required  type="number" class="form-control" name="weekTo" id="weekTo" placeholder="Weeks To" />
            </fieldset>

            <fieldset class="form-group form-group-style mb-1">
                <label for="visaFee">Visa Fee :</label>
                <input required  type="number"  class="form-control" name="fee" id="visaFee"
                    placeholder="Weeks To" />
            </fieldset>

            <div class="row">
                <fieldset class="form-group form-group-style mb-1 col-5 ml-1">
                    <label for="minHours">Minimum Hours Per Week </label>
                    <input required  type="number" class="form-control" name="minHours" id="minHours"
                        placeholder="Minimum Hours Per Week" />
                </fieldset>

                <fieldset class="form-group form-group-style mb-1 col-5 ml-1">
                    <label for="maxHours">Maximum Hours Per Week</label>
                    <input required  type="number" class="form-control" name="maxHours" id="maxHours"
                        placeholder="Maximum Hours Per Week" />
                </fieldset>
            </div>

            <div class="form-actions text-center">
                <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;"><i class="ft-x"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
            </div>
        </form>
    </div>
</div>
@endsection