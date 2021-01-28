@extends('dashbord.layouts')
@section('title')
<title>Add Package </title>
@endsection
@section('content')


<div class="content-wrapper">
    <h2 class="pb-2">Add Package :</h2>
    <div class="card ">

        <form method="POST" action="{{route('packages.store')}}" enctype="multipart/form-data" class="ml-1 mt-1 mr-1">
            @csrf

            <fieldset class="form-group form-group-style">
                <label class="mb-1" for="country">Country :</label>
                <select required class="form-control   country" name="country" id="country">
                    @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{$country->titleEn}}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label class="mb-1" for="city">City :</label>
                <select required class="form-control   city" id="city" name="city">
                    @foreach ($countries[0]->cities as $city)
                        <option value="{{$city->id}}">{{$city->titleEn}}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label class="mb-1" for="school">School :</label>
                <select required name="school" class="form-control" id="school">
                    @foreach ($countries[0]->cities[0]->schools as $school)
                            <option value="{{$school->id}}">{{$school->titleEn}}</option>
                    @endforeach
                </select>
            </fieldset>



            <fieldset class="form-group form-group-style">
                <label class="mb-2">Course details :</label>
                <div class="row">
                    <div class="col-4">
                        <label for="courseType">Course Type</label>
                        <select required name="courseType" class="form-control" id="courseType">
                            @foreach ($courseTypes as $courseType)
                                <option value="{{$courseType->id}}">{{$courseType->titleEn}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="lessonWeek">Lesson/week</label>
                        <input required  type="text" name="lessonWeek" class="form-control" id="lessonWeek" placeholder="25/20">
                    </div>
                    <div class="col-4">
                        <label for="duration">Duration</label>
                        <select required name="duration" class="form-control" id="duration">
                            @for($i=1; $i<=48;$i++)
                                <option value="{{$i}}">{{$i}} Weeks</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label class="mb-2">Accommodation :</label>
                <div class="row">
                    <div class="col-4">
                        <label for="accommodationType">Accommodation Type</label>
                        <select required name="accommodationType" class="form-control" id="accommodationType">
                            @foreach ($accommodations as $accommodation)
                                <option value="{{$accommodation->id}}">{{$accommodation->titleEn}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="roomType">Room Type</label>
                        <select required name="roomType" class="form-control" id="accommodationType">
                            @foreach ($roomTypes as $roomType)
                                <option value="{{$roomType->id}}">{{$roomType->titleEn}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="mealsType">Type of Meals</label>
                        <select required name="mealsType" class="form-control" id="accommodationType">
                            @foreach ($mealsTypes as $mealsType)
                                <option value="{{$mealsType->id}}">{{$mealsType->titleEn}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label class="mb-2">Other Features :</label>
                <div class="row">
                    <div class="col-4">
                        <label for="airportPickUp">Airport Pick-Up</label>
                        <input required  type="text" name="airportPickUp" class="form-control" id="airportPickUp"
                            placeholder="One Way">
                    </div>
                    <div class="col-4">
                        <label for="healthInsurance">Health Insurance</label>
                        <input required  type="text" name="healthInsurance" class="form-control" id="healthInsurance" placeholder="Yes">
                    </div>
                    <div class="col-4">
                        <label for="studentVisa">Student Visa</label>
                        <input required  type="text" name="studentVisa" class="form-control" id="studentVisa"
                            placeholder="Not Required">
                    </div>
                </div>
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label class="mb-2">Type Package :</label>
                @php
                    $i = 1;
                    $data = 'otherType|otherType|otherType|';
                @endphp
                
                <div class="row">
                    @foreach(explode('|', $data) as $info) 
                        @if($info !== '')
                            <div class="col-4">
                                <div class="custom-control custom-checkbox">
                                    <label for="otherType{{$i}}">Other Type {{$i}}</label>
                                    <input required  type="text"  id="otherType{{$i}}" name="otherType[{{$i++}}]" class="form-control" placeholder="Other Type" />
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </fieldset>
            <fieldset class="form-group form-group-style">
                <div class="row mt-1">
                    <div class="col-4">
                        <fieldset class="form-group form-group-style col-12">
                            <label class="col-md-12 label-control">Featured main page :</label>
                            <div class="col-md-12 mx-auto">
                                <div class="input-group">
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input required  checked="" type="radio" name="featured" value="1" class="custom-control-input" id="yes">
                                        <label class="custom-control-label" for="yes">Yes</label>
                                    </div>
                                    <div class="d-inline-block custom-control custom-radio">
                                        <input required  type="radio" name="featured" value="0" class="custom-control-input" id="no">
                                        <label class="custom-control-label" for="no">No</label>
                                    </div>
                                </div>
                            </div>
                            <br>

                        </fieldset>
                    </div>
                    <div class="col-4">
                        <fieldset class="form-group form-group-style col-12">
                            <label for="fee">Fee</label>
                            <input required  type="text" name="fee" class="form-control" id="fee" placeholder="Fee">
                        </fieldset>
                    </div>
                    <div class="col-4">
                        <fieldset class="form-group form-group-style col-12">
                            <label for="feeDis">Fee discount</label>
                            <input required  type="text" name="feeDiscount" class="form-control" id="feeDis" placeholder="Fee discount">
                        </fieldset>
                    </div>
                </div>
            </fieldset>

            </div>
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



<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
    $('.country').change(function (e) { 
        e.preventDefault();
        var idCountry = $(this).val();
        // console.log(idCountry); 
        $.ajax({
            type: 'GET',
            url: "{{url('ajaxGetCitesByIdCountry')}}" + '/' + idCountry,
            data: "data",
            dataType: 'json',
            beforeSend: function (){
                $('#city').prop('disabled', true);
            },
            success: function (response) {
                // console.log();
                $('#city')
                .empty()
                .append(response);
                $('#city').prop('disabled', false);
                // console.log($('#city').val());
            }
        });
        $.ajax({
            type: 'GET',
            url: "{{url('ajaxGetSchoolsByCountry')}}" + '/' + idCountry,
            data: "data",
            dataType: 'json',
            beforeSend: function (){
                $('#school').prop('disabled', true);
            },
            success: function (response) {
                // console.log();
                $('#school')
                .empty()
                .append(response);
                $('#school').prop('disabled', false);
                // console.log($('#city').val());
            }
        });
    });
    $('#city').change(function (e) { 
        e.preventDefault();
        var idCity = $(this).val();
        // console.log(idCity); 
        $.ajax({
            type: 'GET',
            url: "{{route('findSchoolByCity')}}" + '/' + idCity,
            data: "data",
            dataType: 'json',
            beforeSend: function (){
                $('#school').prop('disabled', true);
            },
            success: function (response) {
                // console.log();
                $('#school')
                .empty()
                .append(response);
                $('#school').prop('disabled', false);
                // console.log($('#city').val());
            }
        });
    });
</script>
@endsection