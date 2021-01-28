@extends('dashbord.layouts')
@section('title')
<title>Edit School </title>
@endsection
@section('content')

<div class="content-wrapper">
    <h2 class="pb-2">Edit School ({{$school->titleEn}}):</h2>
    <div class="card">

        @if($errors->any())
        <div class="col-12 mt-2">
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>
                        {{$error}}
                    </div>
                @endforeach
            </div>
        </div>
        @endif


        <form method="POST" action="{{route('schools.update',$school->id)}}" enctype="multipart/form-data"
            class="ml-1 mt-1 mr-1">
            @method('PUT')
            @csrf
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title En</label>
                <input required  type="text" name="titleEn" value="{{ old('titleEn') ?? $school->titleEn }}" class="form-control" id="textbox2"
                    placeholder="Title En ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title Ar</label>
                <input required  type="text" name="titleAr" value="{{ old('titleAr') ?? $school->titleAr }}" class="form-control" id="textbox2"
                    placeholder="Title Ar ...." />
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label for="slugEn">Slug En</label>
                <input required type="text" name="slugEn" value="{{ old('slugEn') ?? $school->slugEn }}" class="form-control" id="slugEn"
                    placeholder="slug En ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="slugAr">Slug Ar</label>
                <input required type="text" name="slugAr" value="{{ old('slugAr') ?? $school->slugAr }}" class="form-control" id="slugAr"
                    placeholder="slug Ar ...." />
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label class="mb-1">Currency :</label>
                <select required class="form-control currency" name="currency" id="currency">
                    @foreach ($currencies as $currency)
                        <option {{ $school->currency_id == $currency->id ? 'selected' : '' }}
                            value="{{$currency->id}}">{{$currency->code}}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label class="mb-1">Country :</label>
                <select required class="form-control country" name="country" id="basicSelect">
                    @foreach ($countries as $country)
                        <option {{ $school->country_id == $country->id ? 'selected' : '' }}
                            value="{{$country->id}}">{{$country->titleEn}}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label class="mb-1">City :</label>

                <select required class="form-control city" id="city" name="city">
                    @foreach ($school->country->cities as $city)
                    <option {{ $school->city_id == $city->id ? 'selected' : '' }} value="{{$city->id}}">{{$city->titleEn}}</option>
                    @endforeach
                </select>
            </fieldset>
            <fieldset class="form-group form-group-style mt-1">
                <label class="mb-1">Position:</label>
                <br>
                <label for="textbox2">Latitude</label>
                <input required  type="text" value="{{ old('latitude') ?? $school->latitude }}" class="form-control" name="latitude" id="textbox2"
                    placeholder="31.634227199999998">
                <label for="textbox2">Longitude</label>
                <input required  type="text" class="form-control" value="{{ old('longitude') ?? $school->longitude }}" name="longitude" id="textbox2"
                    placeholder="-4.0347136">
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label for="textbox2">Choose Logo</label>
                <input type="File" name="logo" class="form-control" id="textbox2" placeholder=""/>
            </fieldset>


            <div class="row form-group-style" @if (!$school->content || !$school->images->count())  style="opacity: .5" @endif >
                <label class="col-md-3 label-control">status :</label>
                <div class="col-md-9 mx-auto">
                    <div class="input-group">
                        <div class="d-inline-block custom-control custom-radio mr-1">
                            <input required  type="radio" name="status" value="1" class="custom-control-input" id="yes"
                            @if (!$school->content || !$school->images->count())  disabled @endif
                                {{ $school->status == 1 ? 'checked' : '' }}  />
                            <label class="custom-control-label" for="yes">Published</label>
                        </div>
                        <div class="d-inline-block custom-control custom-radio">
                            <input required  type="radio" name="status" value="0" class="custom-control-input" id="no"
                            @if (!$school->content || !$school->images->count())  disabled @endif
                                {{ $school->status == 0 ? 'checked' : '' }} />
                            <label class="custom-control-label" for="no">Draft</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group-style">
                <fieldset class="form-group form-group-style mt-1 col-4">
                    <label class="mb-1">featured (Main Page) :</label>
                    <div class="col-md-9 mx-auto">
                        <div class="input-group">
                            <div class="d-inline-block custom-control custom-radio mr-1">
                                <input required  type="radio" name="featuredMainPage" value="1" class="custom-control-input" id="featured1" 
                                    {{ $school->featuredMainPage == 1 ? 'checked' : '' }}
                                />
                                <label class="custom-control-label" for="featured1">Yes</label>
                            </div>
                            <div class="d-inline-block custom-control custom-radio">
                                <input required  type="radio" name="featuredMainPage" value="0" class="custom-control-input" id="featured2" 
                                    {{ $school->featuredMainPage == 0 ? 'checked' : '' }}
                                />
                                <label class="custom-control-label" for="featured2">No</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-4">
                    <label class="mb-1">featured (Country Page) :</label>
                    <div class="col-md-9 mx-auto">
                        <div class="input-group">
                            <div class="d-inline-block custom-control custom-radio mr-1">
                                <input required  type="radio" name="featuredCountryPage" value="1" class="custom-control-input" id="featured5" 
                                    {{ $school->featuredCountryPage == 1 ? 'checked' : '' }}
                                />
                                <label class="custom-control-label" for="featured5">Yes</label>
                            </div>
                            <div class="d-inline-block custom-control custom-radio">
                                <input required  type="radio" name="featuredCountryPage" value="0" class="custom-control-input" id="featured6" 
                                    {{ $school->featuredCountryPage == 0 ? 'checked' : '' }}
                                />
                                <label class="custom-control-label" for="featured6">No</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-4">
                    <label class="mb-1">featured (City Page) :</label>
                    <div class="col-md-9 mx-auto">
                        <div class="input-group">
                            <div class="d-inline-block custom-control custom-radio mr-1">
                                <input required  type="radio" name="featuredCityPage" value="1" class="custom-control-input" id="featured3" 
                                    {{ $school->featuredCityPage == 1 ? 'checked' : '' }}
                                />
                                <label class="custom-control-label" for="featured3">Yes</label>
                            </div>
                            <div class="d-inline-block custom-control custom-radio">
                                <input required  type="radio" name="featuredCityPage" value="0" class="custom-control-input" id="featured4" 
                                    {{ $school->featuredCityPage == 0 ? 'checked' : '' }}
                                />
                                <label class="custom-control-label" for="featured4">No</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="row form-group-style">
                <fieldset class="form-group form-group-style mt-1 col-4">
                    <label for="textbox2">Registration Fee</label>
                    <input required  type="text" name="registrationFee" value="{{ old('registrationFee') ?? $school->registrationFee }}" class="form-control"
                        id="textbox2" placeholder="" />
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-4">
                    <label class="mb-1" for="rating">Rating :</label>

                    <select required name="rating" class="form-control" id="rating">
                        @for ($i = 1; $i < 6; $i++)
                            <option value="{{$i}}" {{ $school->rating == $i ? 'selected' : '' }}>{{$i}}</option>
                        @endfor
                    </select>
                </fieldset>
            </div>
            <div class="form-actions text-center">
                <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;"><i class="ft-x"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
            </div>
        </form>
    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script>
        $('.country#basicSelect').change(function (e) { 
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
                    // console.log($('#city').val());
                }
            });
        });
    </script>

    @endsection