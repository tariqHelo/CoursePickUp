@extends('dashbord.layouts')
@section('title')
<title>Add Accommodation Option </title>
@endsection
@section('content')

<div class="content-wrapper">
    <h2 class="pb-2">Add Accommodation Option
        ({{$accommodation->titleEn}}):</h2>
    <div class="card">
        <form method="POST" action="{{route('storeAccommodationOptions',$accommodation->id)}}" enctype="multipart/form-data"
            class="ml-1 mt-1 mr-1">
            @csrf
            <fieldset class="form-group form-group-style">
                <label class="mb-1" for="roomType">Room Type :</label>
                <select required class="form-control" name="roomType" id="roomType">
                    @foreach ($roomTypes as $roomType)
                    @if($roomType->status == 1)
                        <option value="{{$roomType->id}}">{{$roomType->titleEn}}</option>
                    @endif
                    @endforeach
                </select>
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label class="mb-1" for="mealType">Meal Type :</label>
                <select required class="form-control" name="mealType" id="mealType">
                    @foreach ($mealTypes as $mealType)
                    @if($mealType->status == 1)
                    <option value="{{$mealType->id}}">{{$mealType->titleEn}}</option>
                    @endif
                    @endforeach
                </select>
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label class="mb-1" for="facilitie">Facilitie :</label>
                <select required class="form-control" name="facilitie" id="facilitie">
                    @foreach ($facilities as $facilitie)
                    @if($facilitie->status == 1)
                    <option value="{{$facilitie->id}}">{{$facilitie->titleEn}}</option>
                    @endif
                    @endforeach
                </select>
            </fieldset>
            <div class="row form-group mr-1 ml-1 ">
                <fieldset class="form-group form-group-style  col-4">
                    <label for="supplement">supplement :</label>
                    <input required  type="text" name="supplement" class="form-control" id="supplement"
                        placeholder="Supplement ...." />
                </fieldset>
                
                <fieldset class="form-group form-group-style  col-4">
                    <label for="supplementAr">supplement Ar :</label>
                    <input required  type="text" name="supplementAr" class="form-control" id="supplementAr"
                        placeholder="supplement Ar ...." />
                </fieldset>

                <fieldset class="form-group form-group-style col-4">
                    <label for="minimumNumberOfWeeksToBook">Minimum Number Of Weeks To Book :</label>
                    <input required  type="text" name="minimumNumberOfWeeksToBook" class="form-control"
                        id="minimumNumberOfWeeksToBook" placeholder="Minimum Number Of Weeks To Book" />
                </fieldset>
                <fieldset class="form-group form-group-style  col-4">
                    <label for="accommodationAge">Accommodation Age :</label>
                    <select class="form-control" name="accommodationAge" id="accommodationAge" >
                        <option value="16">16 Years old</option>
                        <option value="17">17 Years old</option>
                        <option value="18">18 Years old</option>
                        <option value="19">Over 19 Years</option>
                    </select>
                </fieldset>
            </div>


            <fieldset class="form-group form-group-style">
                <label class="col-md-3 label-control">status :</label>
                <div class="col-md-9 mx-auto">
                    <div class="input-group">
                        <div class="d-inline-block custom-control custom-radio mr-1">
                            <input required  type="radio" name="status" value="1" class="custom-control-input" checked=""
                                id="yes" />
                            <label class="custom-control-label" for="yes">Published</label>
                        </div>
                        <div class="d-inline-block custom-control custom-radio">
                            <input required  type="radio" name="status" value="0" class="custom-control-input" id="no" />
                            <label class="custom-control-label" for="no">Draft</label>
                        </div>
                    </div>
                </div>
            </fieldset>


            <div class="form-actions text-center">
                <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;"><i class="ft-x"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
            </div>
        </form>
    </div>

    @endsection