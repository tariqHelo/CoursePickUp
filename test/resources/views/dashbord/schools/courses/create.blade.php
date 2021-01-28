@extends('dashbord.layouts')
@section('title')
<title>Add Course </title>
@endsection
@section('content')

<div class="content-wrapper">
    <h2 class="pb-2">Add Course :</h2>
    <div class="card">
        <form method="POST" action="{{route('storeCourses',$id)}}" enctype="multipart/form-data" class="ml-1 mt-1 mr-1">
            @csrf
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title En</label>
                <input required  type="text" name="titleEn" class="form-control" id="textbox2" placeholder="Title En ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title Ar</label>
                <input required  type="text" name="titleAr" class="form-control" id="textbox2" placeholder="Title Ar ...." />
            </fieldset>


            <div class="row form-group-style">
                <fieldset class="form-group form-group-style mt-1 col-4">
                    <label for="shortCourseType">short Course Type</label>
                    <select required class="form-control" name="shortCourseType" id="shortCourseType">
                        @foreach (App\courseType::all() as $row)
                            @if($row->status == 1)
                                <option value="{{$row->id}}"> {{$row->titleEn}} </option>
                            @endif
                        @endforeach
                    </select>
                </fieldset>

                <fieldset class="form-group form-group-style mt-1 col-4">
                    <label for="textbox2">Courier Fee</label>
                    <input type="text" name="courierFees" class="form-control" id="textbox2"
                        placeholder="Courier Fee ...." />
                </fieldset>

                <fieldset class="form-group form-group-style mt-1 col-4">
                    <label for="materialFeeType">Material Fee Type :</label>
                    <select required class="form-control" name="materialFeeType" id="materialFeeType">
                        <option value="1"> One Time Fee </option>
                        <option value="2"> Weekly Fee </option>
                        <option value="3"> One Time Fee Based On Range Of Weeks </option>
                    </select>
                </fieldset>

            </div>
            <div class="row form-group-style">
                <fieldset class="form-group form-group-style mt-1 col-6">
                    <label for="minBookingWeeks">Minimum Booking Weeks</label>
                    <input required  type="number" name="minBookingWeeks" class="form-control" id="minBookingWeeks" placeholder="Minimum Booking Weeks" />
              </fieldset>
              <fieldset class="form-group form-group-style mt-1 col-6">
                    <label for="minBookingWeeks">Required Level</label>
                    <select required class="form-control" name="requiredLevel" id="requiredLevel">
                        @foreach(\App\Level::where('status', 1)->get() as $level)
                        <option value="{{$level->id}}">{{$level->titleEn}}</option>
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
                <fieldset class="form-group form-group-style mt-1 col-6">
                    <label class="col-md-3 label-control">Featured for School:</label>
                    <div class="col-md-9 mx-auto">
                        <div class="input-group">
                            <div class="d-inline-block custom-control custom-radio mr-1">
                                <input required  type="radio" name="featuredSchoolPage" value="1" class="custom-control-input" id="yes2" />
                                <label class="custom-control-label" for="yes2">Featured</label>
                            </div>
                            <div class="d-inline-block custom-control custom-radio">
                                <input required  type="radio" name="featuredSchoolPage" value="0" id="no2" checked />
                                <label class="custom-control-label" for="no2">Not Featured</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-6">
                    <label class="col-md-3 label-control" id="materialFeeAmount">Material Fee Amount :</label>
                        <input required  type="number" class="form-control" name="materialFeeAmount" id="materialFeeAmount" placeholder="Material Fee Amount">
                </fieldset>

            </div>
            <div class="row form-group-style">
                <fieldset class="form-group form-group-style mt-1 col-3">
                    <label for="maxStudents">Max Students</label>
                    <input required  type="text" name="maxStudents" class="form-control" id="maxStudents" placeholder="Max Students" />
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-3">
                    <label for="minAge">Min Age</label>
                    <input required  type="text" name="minAge" class="form-control" id="minAge" placeholder="Min Age" />
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-3">
                    <label for="hoursPerWeek">hours Per Week</label>
                    <input required  type="text" name="hoursPerWeek" class="form-control" id="hoursPerWeek" placeholder="hours Per Week" />
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-3">
                    <label for="lessonsPerWeek">Lessons Per Week</label>
                    <input required  type="text" name="lessonsPerWeek" class="form-control" id="lessonsPerWeek" placeholder="lessons Per Week" />
                </fieldset>
            </div>
           
            <div class="form-actions text-center">
                 <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;"><i class="ft-x"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
            </div>
        </form>
    </div>

    @endsection