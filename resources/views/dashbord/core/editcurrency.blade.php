@extends('dashbord.layouts')
@section('title')
<title>Currency</title>
@endsection
@section('content')
<div class="content-wrapper ">

    <h2 class="pb-2">Edit  Currency ({{$data->code}}) :</h2>
    <div class="card">

        <form method="POST" action="{{action('CurrencyController@update',$data->id)}}" class="ml-1 mt-1 mr-1">
            @csrf
            @method('PUT')

            <div class="row">
                <fieldset class="form-group form-group-style col-6">
                    <label for="textbox2">Name </label>
                    <input required  type="text" class="form-control" name="name" id="textbox2" placeholder="Name"
                        value="{{$data->name}}">
                </fieldset>

                <fieldset class="form-group form-group-style col-6">
                    <label for="textbox2">Currency Code</label>
                    <input required  type="text" class="form-control" id="textbox2" name="code" placeholder="Currency Code"
                        value="{{$data->code}}">
                </fieldset>
            </div>
            <div class="row">
                <fieldset class="form-group form-group-style mt-1 col-2">
                    <label for="textbox2">USD</label>
                    <input required  type="text" class="form-control" name="usd" id="textbox2" placeholder=""
                        value="{{$data->usd}}">
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-2">
                    <label for="textbox2">GBP</label>
                    <input required  type="text" class="form-control" name="gbp" id="textbox2" placeholder=""
                        value="{{$data->gbp}}">
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-2">
                    <label for="textbox2">EUR</label>
                    <input required  type="text" class="form-control" name="eur" id="textbox2" placeholder=""
                        value="{{$data->eur}}">
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-2">
                    <label for="textbox2">CAD</label>
                    <input required  type="text" class="form-control" name="cad" id="textbox2" placeholder=""
                        value="{{$data->cad}}">
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-2">
                    <label for="textbox2">AUD</label>
                    <input required  type="text" class="form-control" name="aud" id="textbox2" placeholder=""
                        value="{{$data->aud}}">
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-2">
                    <label for="textbox2">NZD</label>
                    <input required  type="text" class="form-control" name="nzd" id="textbox2" placeholder=""
                        value="{{$data->nzd}}">
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-2">
                    <label for="textbox2">SAR</label>
                    <input required  type="text" class="form-control" name="sar" id="textbox2" placeholder=""
                        value="{{$data->sar}}">
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-2">
                    <label for="textbox2">AED</label>
                    <input required  type="text" class="form-control" name="aed" id="textbox2" placeholder=""
                        value="{{$data->aed}}">
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-2">
                    <label for="textbox2">KWD</label>
                    <input required  type="text" class="form-control" name="kwd" id="textbox2" placeholder=""
                        value="{{$data->kwd}}">
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-2">
                    <label for="textbox2">OMR</label>
                    <input required  type="text" class="form-control" name="omr" id="textbox2" placeholder=""
                        value="{{$data->omr}}">
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-2">
                    <label for="textbox2">BHD</label>
                    <input required  type="text" class="form-control" name="bhd" id="textbox2" placeholder=""
                        value="{{$data->bhd}}">
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-2">
                    <label for="textbox2">JOD</label>
                    <input required  type="text" class="form-control" name="jod" id="textbox2" placeholder=""
                        value="{{$data->jod}}">
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-2">
                    <label for="textbox2">QAR</label>
                    <input required  type="text" class="form-control" name="qar" id="textbox2" placeholder=""
                        value="{{$data->qar}}">
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-2">
                    <label for="textbox2">MYR</label>
                    <input required  type="text" class="form-control" name="myr" id="textbox2" placeholder=""
                        value="{{$data->myr}}">
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-2">
                    <label for="textbox2">TRY</label>
                    <input required  type="text" class="form-control" name="try" id="textbox2" placeholder=""
                        value="{{$data->try}}">
                </fieldset>
                <fieldset class="form-group form-group-style mt-1 col-2">
                    <label for="textbox2">EGP</label>
                    <input required  type="text" class="form-control" name="egp" id="textbox2" placeholder=""
                        value="{{$data->egp}}">
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
</div>
@endsection