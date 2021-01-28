@extends('dashbord.layouts')
@section('title')
<title>Add School </title>
@endsection
@section('content')

<div class="content-wrapper">
    <h2 class="pb-2">Add School :</h2>
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

        <form method="POST" action="{{route('schools.store')}}" enctype="multipart/form-data" class="ml-1 mt-1 mr-1">
            @csrf
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title En</label>
                <input required type="text" name="titleEn" class="form-control" id="textbox2" value="{{ old('titleEn') }}" 
                    placeholder="Title En ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="textbox2">Title Ar</label>
                <input required type="text" name="titleAr" class="form-control" id="textbox2" value="{{ old('titleAr') }}" 
                    placeholder="Title Ar ...." />
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label for="slugEn">Slug En</label>
                <input required type="text" name="slugEn" class="form-control" id="slugEn" value="{{ old('slugEn') }}" 
                    placeholder="slug En ...." />
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label for="slugAr">Slug Ar</label>
                <input required type="text" name="slugAr" class="form-control" id="slugAr" value="{{ old('slugAr') }}" 
                    placeholder="slug Ar ...." />
            </fieldset>


            <fieldset class="form-group form-group-style">
                <label class="mb-1">Currency :</label>
                <select required class="form-control" name="currency" id="basicSelect">
                    @foreach ($currencies as $currency)
                    <option value="{{$currency->id}}" {{ old('currency') == $currency->id ? 'selected' : '' }}>{{$currency->code}}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label class="mb-1">Country :</label>
                <select required class="form-control   country" name="country" id="basicSelect">
                    @foreach ($countries as $country)
                        <option value="{{$country->id}}" {{ old('country') == $country->id ? 'selected' : '' }}>{{$country->titleEn}}</option>
                    @endforeach
                </select>
            </fieldset>
            <fieldset class="form-group form-group-style">
                <label class="mb-1" for="city">City :</label>
                <select required class="form-control   city" id="city" name="city">
                    @foreach ($countries[0]->cities as $city)
                    <option value="{{$city->id}}" {{ old('city') == $city->id ? 'selected' : '' }}>{{$city->titleEn}}</option>
                    @endforeach
                </select>
            </fieldset>
            <fieldset class="form-group form-group-style mt-1">
                <label class="mb-1">Position:</label>
                <br>
                <label for="textbox2">Latitude</label>
                <input required type="text" class="form-control" name="latitude" id="textbox2" value="{{ old('latitude') }}"
                    placeholder="31.634227199999998">
                <label for="textbox2">Longitude</label>
                <input required type="text" class="form-control" name="longitude" id="textbox2" value="{{ old('longitude') }}"
                    placeholder="-4.0347136">
            </fieldset>

            <fieldset class="form-group form-group-style">
                <label for="textbox2">Choose Logo</label>
                <input required type="File" name="logo" class="form-control" id="textbox2" placeholder="" multiple />
            </fieldset>

            <div class="row form-group-style" style="opacity: .5">
                <label class="col-md-3 label-control">status :</label>
                <div class="col-md-9 mx-auto">
                    <div class="input-group">
                        <div class="d-inline-block custom-control custom-radio mr-1">
                            <input type="radio" name="status" value="1" disabled class="custom-control-input"
                                id="yes" />
                            <label class="custom-control-label" for="yes">Published</label>
                        </div>
                        <div class="d-inline-block custom-control custom-radio">
                            <input type="radio" checked="" name="status" value="0" disabled class="custom-control-input" id="no" />
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
                                <input type="radio" name="featuredMainPage" value="1"
                                    class="custom-control-input" id="featured1" />
                                <label class="custom-control-label" for="featured1">Yes</label>
                            </div>
                            <div class="d-inline-block custom-control custom-radio">
                                <input type="radio" name="featuredMainPage" value="0"
                                    class="custom-control-input" id="featured2" checked="" />
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
                                <input type="radio" name="featuredCountryPage" value="1"
                                    class="custom-control-input" id="featured5" />
                                <label class="custom-control-label" for="featured5">Yes</label>
                            </div>
                            <div class="d-inline-block custom-control custom-radio">
                                <input type="radio" name="featuredCountryPage" value="0"
                                    class="custom-control-input" id="featured6" checked="" />
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
                                <input type="radio" name="featuredCityPage" value="1"
                                    class="custom-control-input" id="featured3" />
                                <label class="custom-control-label" for="featured3">Yes</label>
                            </div>
                            <div class="d-inline-block custom-control custom-radio">
                                <input type="radio" name="featuredCityPage" value="0"
                                    class="custom-control-input" id="featured4" checked="" />
                                <label class="custom-control-label" for="featured4">No</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="row form-group-style">
                <fieldset class="form-group form-group-style mt-1 col-4">
                    <label for="textbox2">Registration Fee</label>
                    <input required type="text" name="registrationFee" class="form-control" id="textbox2" value="{{ old('registrationFee') }}"
                        placeholder="" />
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-4">
                    <label class="mb-1" for="Rating">Rating :</label>

                    <select required name="rating" class="form-control" id="Rating" >
                        @for ($i = 1; $i < 6; $i++) <option value="{{$i}}" {{ old('rating') == $i ? 'selected' : '' }}>{{$i}}</option>
                            @endfor
                    </select>
                </fieldset>
            </div>
            <div class="form-actions text-center">
                <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;"><i
                        class="ft-x"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
            </div>
        </form>
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
                    console.log(response);
                    $('#city').prop('disabled', false);

                }
            });
        });
    </script>
    {{-- <script src="{{asset('dash/app-assets/js/Chosen/chosen.jquery.js')}}"></script>
    <script src="{{asset('dash/app-assets/js/Chosen/prism.js')}}"></script>
    <script src="{{asset('dash/app-assets/js/Chosen/init.js')}}"></script> --}}
@endsection