@extends('dashbord.layouts')
@section('title')
<title>Edit Course </title>
@endsection
@section('content')

<div class="content-wrapper">
    <h2 class="pb-2">Edit Course ({{$course->titleEn}}):</h2>
    <div class="card">
        <form method="POST" action="{{route('coursesUpdate',$course->id)}}" enctype="multipart/form-data"
            class="ml-1 mt-1 mr-1">
            @csrf
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title En</label>
                <input required  type="text" name="titleEn" class="form-control" id="textbox2" placeholder="Title En ...." value="{{$course->titleEn}}" />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title Ar</label>
                <input required  type="text" name="titleAr" class="form-control" id="textbox2" placeholder="Title Ar ...."  value="{{$course->titleAr}}"/>
            </fieldset>

            <div class="row form-group-style">
                <fieldset class="form-group form-group-style mt-1 col-4">
                    <label for="shortCourseType">short Course Type</label>
                    <select required class="form-control" name="shortCourseType" id="shortCourseType">
                        @foreach($courseTypes as $courseType)
                        <option value="{{$courseType->id}}" {{ $course->courseType_id == $courseType->id ? 'selected' : '' }}> {{ $courseType->titleEn }} </option>
                        @endforeach
                    </select>
                </fieldset>

                <fieldset class="form-group form-group-style mt-1 col-4">
                    <label for="textbox2">Courier Fee</label>
                    <input  type="text" name="courierFees"  value="{{$course->courierFees}}" class="form-control" id="textbox2"
                        placeholder="Courier Fee ...." />
                </fieldset>

                <fieldset class="form-group form-group-style mt-1 col-4">
                    <label for="materialFeeType">Material Fee Type :</label>
                    <select required class="form-control" name="materialFeeType" id="materialFeeType">
                        @foreach($materialfeeTypes as $materialfeeType)
                        <option value="{{$materialfeeType->id}}" {{ $course->materialFeeType_id == $materialfeeType->id ? 'selected' : '' }}> {{$materialfeeType->titleEn}} </option>
                        @endforeach
                    </select>
                </fieldset>

            </div>
            <div class="row form-group-style">
                <fieldset class="form-group form-group-style mt-1 col-6">
                    <label for="minBookingWeeks">Minimum Booking Weeks</label>
                    <input required  type="number" name="minBookingWeeks" class="form-control" value="{{$course->minBookingWeeks}}"  id="minBookingWeeks" placeholder="Minimum Booking Weeks" />
              </fieldset>
              <fieldset class="form-group form-group-style mt-1 col-6">
                    <label for="minBookingWeeks">Required Level</label>
                    <select required class="form-control" name="requiredLevel" id="requiredLevel">
                        @foreach(\App\Level::where('status', 1)->get() as $level)
                        <option value="{{$level->id}}" {{ $level->id == $course->requiredLevel ? 'selected' : ''}}>{{$level->titleEn}}</option>
                        @endforeach
                    </select>
              </fieldset>
            </div>


            <div class="row form-group-style">
                <fieldset class="form-group form-group-style mt-1 col-6">
                    <label class="col-md-3 label-control">status :</label>
                    <div class="col-md-9 mx-auto">
                        <div class="input-group">
                            <div class="d-inline-block custom-control custom-radio mr-1">
                                <input required  type="radio" name="status" value="1" class="custom-control-input" id="yes"
                                    {{ $course->status == 1 ? 'checked' : ''}} />
                                <label class="custom-control-label" for="yes">Published</label>
                            </div>
                            <div class="d-inline-block custom-control custom-radio">
                                <input required  type="radio" name="status" value="0" id="no" 
                                    {{ $course->status == 0 ? 'checked' : ''}} />
                                <label class="custom-control-label" for="no">Draft</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-6">
                    <label class="col-md-3 label-control">Featured for School:</label>
                    <div class="col-md-9 mx-auto">
                        <div class="input-group">
                            <div class="d-inline-block custom-control custom-radio mr-1">
                                <input required  type="radio" name="featuredSchoolPage" value="1" class="custom-control-input" id="yes2"
                                    {{ $course->featuredSchoolPage == 1 ? 'checked' : ''}} />
                                <label class="custom-control-label" for="yes2">Featured</label>
                            </div>
                            <div class="d-inline-block custom-control custom-radio">
                                <input required  type="radio" name="featuredSchoolPage" value="0" id="no2" 
                                    {{ $course->featuredSchoolPage == 0 ? 'checked' : ''}} />
                                <label class="custom-control-label" for="no2">Not Featured</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-6">
                    <label class="col-md-3 label-control" id="materialFeeAmount">Material Fee Amount :</label>
                <input type="number" class="form-control" value="{{$course->materialFeeAmount}}" name="materialFeeAmount" id="materialFeeAmount"
                        placeholder="Amount">
                </fieldset>

            </div>
            <div class="row form-group-style">
                <fieldset class="form-group form-group-style mt-1 col-3">
                    <label for="maxStudents">Max Students</label>
                    <input required  type="text" name="maxStudents" class="form-control" id="maxStudents" placeholder="Max Students" value="{{$course->maxStudents}}" />
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-3">
                    <label for="minAge">Min Age</label>
                    <input required  type="text" name="minAge" class="form-control" id="minAge" placeholder="Min Age"  value="{{$course->minAge}}"/>
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-3">
                    <label for="hoursPerWeek">hours Per Week</label>
                    <input required  type="text" name="hoursPerWeek" class="form-control" id="hoursPerWeek" placeholder="hours Per Week" value="{{$course->hoursPerWeek}}" />
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-3">
                    <label for="lessonsPerWeek">Lessons Per Week</label>
                    <input required  type="text" name="lessonsPerWeek" class="form-control" id="lessonsPerWeek" placeholder="Lessons Per Week"  value="{{$course->lessonsPerWeek}}"/>
                </fieldset>
            </div>

            <div class="form-actions text-center">
                 <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;"><i class="ft-x"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
            </div>
        </form>
    </div>

    @endsection