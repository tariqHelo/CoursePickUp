@extends('dashbord.layouts')
@section('title')
<title>Edit Package </title>
@endsection
@section('content')
<div class="content-wrapper">
    <h2 class="pb-2">Edit Package ({{$package->titleEn}}):</h2>
    <div class="card">
        <form method="POST" action="{{route('packages.update',$package->id)}}" enctype="multipart/form-data" class="ml-1 mt-1 mr-1">
            @method('PUT ') @csrf

            <fieldset class="form-group form-group-style">
                <label class="mb-1">Country :</label>
                <select required class="form-control country" name="country" id="basicSelect">
                    @foreach ($countries as $country)
                        <option value="{{$country->id}}" {{ $package->country->id == $country->id ? 'selected' : '' }}>
                            {{$country->titleEn}}
                        </option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label class="mb-1">City :</label>
                <select required class="form-control city" id="city" name="city">
                    @foreach ($countries[0]->cities as $city)
                            <option {{ $package->city->id == $city->id ? 'selected' : '' }} value="{{$city->id}}">{{$city->titleEn}}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label class="mb-1" for="school">School :</label>
                <select required name="school" class="form-control" id="school">
                    @foreach ($countries[0]->cities[0]->schools as $school)
                            <option {{ $package->school_id == $school->id ? 'selected' : ''}} value="{{$school->id}}">{{$school->titleEn}}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label class="mb-2">Course details :</label>
                <div class="row">
                    <div class="col-4">
                        <label for="textbox2">Course Type</label>
                        <select required name="courseType" class="form-control" id="courseType">
                            @foreach ($courseTypes as $courseType)
                                <option {{ $package->courseType->id == $courseType->id ? 'selected' : '' }} value="{{$courseType->id}}">{{$courseType->titleEn}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="textbox2">Lesson/week</label>
                        <input required value="{{ $package->lessonWeek }}"  type="text" name="lessonWeek" class="form-control" id="lessonWeek" placeholder="25/20">
                    </div>
                    <div class="col-4">
                        <label for="textbox2">Duration</label>
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
                        <label for="textbox2">Accommodation Type</label>
                        <select required name="accommodationType" class="form-control" id="accommodationType">
                            @foreach ($accommodations as $accommodation)
                                <option {{ $package->accommodation_id == $accommodation->id ? 'selected' : '' }} value="{{$accommodation->id}}">{{$accommodation->titleEn}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="textbox2">Room Type</label>
                        <select required name="roomType" class="form-control" id="accommodationType">
                            @foreach ($roomTypes as $roomType)
                                <option {{ $package->roomType_id == $roomType->id ? 'selected' : '' }} value="{{$roomType->id}}">{{$roomType->titleEn}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="textbox2">Type of Meals</label>
                        <select required name="mealsType" class="form-control" id="accommodationType">
                            @foreach ($mealsTypes as $mealsType)
                                <option {{ $package->mealsType_id == $mealsType->id ? 'selected' : '' }} value="{{$mealsType->id}}">{{$mealsType->titleEn}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label class="mb-2">Other Features :</label>
                <div class="row">
                    <div class="col-4">
                        <label for="textbox2">Airport Pick-Up</label>
                        <input required  type="text" value="{{$package->airportPickUp}}" name="airportPickUp" class="form-control" id="textbox2" placeholder="One Way" />
                    </div>
                    <div class="col-4">
                        <label for="textbox2">Health Insurance</label>
                        <input required  type="text" value="{{$package->healthInsurance}}" name="healthInsurance" class="form-control" id="textbox2" placeholder="Yes" />
                    </div>
                    <div class="col-4">
                        <label for="textbox2">Student Visa</label>
                        <input required  type="text" value="{{$package->studentVisa}}" name="studentVisa" class="form-control" id="textbox2" placeholder="Not Required" />
                    </div>
                </div>
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label class="mb-2">Type Package :</label>
                @if ($package->otherType != "") @php $i = 1; @endphp
                <div class="row">
                    @foreach(explode('|', $package->otherType) as $info) @if($info !== '')
                    <div class="col-4">
                        <div class="custom-control custom-checkbox">
                            <label for="otherType">Other Type {{$i}}</label>
                            <input required  type="text" name="otherType[{{$i++}}]" class="form-control" id="textbox2" value="{{$info}}" placeholder="Other Type" />
                        </div>
                    </div>
                    @endif @endforeach
                </div>
                @endif
            </fieldset>

            <fieldset class="form-group form-group-style">
                <div class="row">
                    <div class="col-4">
                        <fieldset class="form-group form-group-style col-12">
                            <label class="col-md-12 label-control">Featured main page :</label>
                            <div class="col-md-12 mx-auto">
                                <div class="input-group">
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input required  @if($package->featured == 1) checked @endif type="radio" name="featured" value="1" class="custom-control-input" id="yes">
                                        <label class="custom-control-label" for="yes">Yes</label>
                                    </div>
                                    <div class="d-inline-block custom-control custom-radio">
                                        <input required  @if($package->featured == 0 ) checked @endif type="radio" name="featured" value="0" class="custom-control-input" id="no">
                                        <label class="custom-control-label" for="no">No</label>
                                    </div>
                                </div>
                            </div>
                            <br>

                        </fieldset>
                    </div>
                    <div class="col-4">
                        <fieldset class="form-group form-group-style col-12">
                            <label for="textbox2">Fee</label>
                            <input required  value="{{$package->fee}}" type="text" name="fee" class="form-control" id="textbox2" placeholder="" />
                        </fieldset>
                    </div>
                    <div class="col-4">
                        <fieldset class="form-group form-group-style col-12">
                            <label for="textbox2">Fee discount</label>
                            <input required  value="{{$package->feeDiscount}}" type="text" name="feeDiscount" class="form-control" id="textbox2" placeholder="" />
                        </fieldset>
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
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
    $('.country').change(function (e) { 
        e.preventDefault();
        var idCountry = $(this).val();
        console.log(idCountry); 
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
    {{-- 
    <!-- Include the Quill library -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script src="{{ asset('dash/app-assets/vendors/js/editors/tinymce/tinymce.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('dash/app-assets/js/scripts/editors/editor-tinymce.js')}}"></script>

    <!-- Initialize Quill editor -->
    <script>
        var quill = new Quill('#editor-english', {
        theme: 'snow'
    });
    var quills = new Quill('#editor-arab', {
        theme: 'snow'
    });
    </script> --}}
 


    @endsection