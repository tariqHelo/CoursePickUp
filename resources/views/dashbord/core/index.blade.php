@extends('dashbord.layouts')
@section('title')
<title>General Setting</title>
@endsection
@section('content')
<div class="row">
    <div class="content-wrapper col-6">

        <h2 class="pb-2">Site Name :</h2>
        <div class="card">

            <form method="POST" action="{{route('updateGeneralSettings')}}" class="ml-1 mt-1 mr-1">
                @csrf
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Site Name</label>
                    <input required type="text" name="siteName" class="form-control" id="textbox2" placeholder=""
                        value="{{App\generalSetting::where('option','siteName')->first()->value}}">
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

    <div class="content-wrapper col-6">
        <h2 class="pb-2">Logo :</h2>
        <div class="card">

            <form method="POST" action="{{route('updateGeneralSettings')}}" enctype="multipart/form-data"
                class="ml-1 mt-1 mr-1">
                @csrf
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Logo</label>
                    <input required type="File" class="form-control" name="logo" id="textbox2"
                        value="{{App\generalSetting::where('option','logo')->first()->value}}">
                </fieldset>


                <div class="form-actions text-center">
                    <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;">
                        <i class="ft-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                    </button>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary col-12" data-toggle="modal" data-target="#Logo">
                    preview <i class="la la-eye"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="Logo" tabindex="-1" role="dialog" aria-labelledby="Logo1"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Logo1">Logo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('site/' . \App\generalSetting::where('option', 'logo')->first()->value ) }}"
                                    alt="" height="300" width="100%">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="content-wrapper col-6">
        @if($errors->has('favicon'))
            <div class="error text-danger">{{ $errors->first('favicon') }}</div>
        @endif
        <h2 class="pb-2">Favicon :</h2>
        <div class="card">

            <form method="POST" action="{{route('updateGeneralSettings')}}" enctype="multipart/form-data"
                class="ml-1 mt-1 mr-1">
                @csrf
                <fieldset class="form-group form-group-style ">
                    <label for="textbox2">Favicon</label>
                    <input required type="File" class="form-control" name="favicon" id="textbox2" placeholder=""
                        value="{{App\generalSetting::where('option','favicon')->first()->value}}">
                </fieldset>


                <div class="form-actions text-center">
                    <button type="button" class="btn btn-warning mr-1" onclick="window.history.go(-1); return false;">
                        <i class="ft-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                    </button>
                </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary col-12" data-toggle="modal" data-target="#favicon">
            preview <i class="la la-eye"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="favicon" tabindex="-1" role="dialog" aria-labelledby="favicon1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="favicon1">Logo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('site/' . setting('favicon')) }}" alt=""
                            height="300" width="100%">
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="content-wrapper col-6">

    <h2 class="pb-2">Phone Number :</h2>
    <div class="card">

        <form method="POST" action="{{route('updateGeneralSettings')}}" enctype="multipart/form-data"
            class="ml-1 mt-1 mr-1">
            @csrf
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Phone Number</label>
                <input required type="text" class="form-control" id="textbox2" name="phoneNumber"
                    placeholder="phone Number"
                    value="{{App\generalSetting::where('option','phoneNumber')->first()->value}}">
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

<div class="content-wrapper col-6">

    <h2 class="pb-2">WhatsApp API :</h2>
    <div class="card">

        <form method="POST" action="{{route('updateGeneralSettings')}}" enctype="multipart/form-data"
            class="ml-1 mt-1 mr-1">
            @csrf
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">WhatsApp Phone</label>
                <input required type="text" class="form-control" id="textbox2" name="whatsappPhone"
                    placeholder="WhatsApp Phone"
                    value="{{App\generalSetting::where('option','whatsappPhone')->first()->value}}">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                <label for="whatsappMessageEn">WhatsApp Message English</label>
                <textarea required type="text" class="form-control" id="whatsappMessageEn" name="whatsappMessageEn"
                    placeholder="WhatsApp Message">{{App\generalSetting::where('option','whatsappMessageEn')->first()->value}}</textarea>
            </fieldset>
            <fieldset class="form-group form-group-style ">
                <label for="whatsappMessageAr">WhatsApp Message Arabic</label>
                <textarea required type="text" class="form-control" id="whatsappMessageAr" name="whatsappMessageAr"
                    placeholder="WhatsApp Message">{{App\generalSetting::where('option','whatsappMessageAr')->first()->value}}</textarea>
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

<div class="content-wrapper col-6">

    <h2 class="pb-2">Email :</h2>
    <div class="card">

        <form method="POST" action="{{route('updateGeneralSettings')}}" enctype="multipart/form-data"
            class="ml-1 mt-1 mr-1">
            @csrf
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Email</label>
                <input required type="text" class="form-control" id="textbox2" name="email" placeholder="Email"
                    value="{{App\generalSetting::where('option','email')->first()->value}}">
            </fieldset>


            <div class=" form-actions text-center ">
                <button type="button " class="btn btn-warning mr-1 ">
                    <i class="ft-x "></i> Cancel
                </button>
                <button type="submit " class="btn btn-primary ">
                    <i class="la la-check-square-o "></i> Save
                </button>
            </div>
        </form>
    </div>
</div>

<div class="content-wrapper col-6">

    <h2 class="pb-2">Social Media API :</h2>
    <div class="card">

        <form method="POST" action="{{route('updateGeneralSettings')}}" enctype="multipart/form-data"
            class="ml-1 mt-1 mr-1">
            @csrf
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Facebook</label>
                <input required type="text" class="form-control" name="facebook" id="textbox2" placeholder=""
                    value="{{App\generalSetting::where('option','facebook')->first()->value}}">
            </fieldset>

            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Instagram</label>
                <input required type="text" class="form-control" name="instagram" id="textbox2" placeholder=""
                    value="{{App\generalSetting::where('option','instagram')->first()->value}}">
            </fieldset>

            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Twitter</label>
                <input required type="text" class="form-control" name="twitter" id="textbox2" placeholder=""
                    value="{{App\generalSetting::where('option','twitter')->first()->value}}">
            </fieldset>

            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Youtube</label>
                <input required type="text" class="form-control" name="youtube" id="textbox2" placeholder=""
                    value="{{App\generalSetting::where('option','youtube')->first()->value}}">
            </fieldset>

            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Linkedin</label>
                <input required type="text" class="form-control" name="linkedin" id="textbox2" placeholder=""
                    value="{{App\generalSetting::where('option','linkedin')->first()->value}}">
            </fieldset>


            <div class=" form-actions text-center ">
                <button type="button " class="btn btn-warning mr-1 ">
                    <i class="ft-x "></i> Cancel
                </button>
                <button type="submit " class="btn btn-primary ">
                    <i class="la la-check-square-o "></i> Save
                </button>
            </div>
        </form>
    </div>
</div>

@endsection