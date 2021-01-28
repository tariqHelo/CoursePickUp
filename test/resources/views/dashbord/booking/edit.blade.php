@extends('dashbord.layouts')
@section('title')
<title>Edit Booking Request</title>
@endsection
@section('content')


<div class="content-wrapper">
    <h2 class="pb-2">Edit Booking Request :</h2>
    <div class="card ">

        @if($errors -> any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <div> {{ $error }} </div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('booking.requests.update',[$booking->id, $stage]) }}" class="ml-1 mt-1 mr-1">
            @csrf
            <fieldset class="form-group form-group-style ">
                <label>First name</label>
                <input required  type="text" value="{{$booking->first_name}}" name="first_name" class="form-control"
                    placeholder="First name">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                <label>Last name</label>
                <input required  type="text" value="{{$booking->last_name}}" name="last_name" class="form-control"
                    placeholder="Last name">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                <label>Email</label>
                <input required  type="email" value="{{$booking->email}}" name="email" class="form-control"
                    placeholder="Email">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                <label>Phone Number</label>
                <input required  type="text" value="{{$booking->phone}}" name="phone" class="form-control"
                    placeholder="Phone Number">
            </fieldset>


            <fieldset class="form-group form-group-style">
                <label class="mb-1">Nationality :</label>
                <select required class="form-control" name="nationality" id="countrySelect">
                    @foreach ($nationalities as $nationality)
                      <option value="{{$nationality->id}}" {{ $booking->nationality_id == $nationality->id ? 'selected' : '' }} >
                         {{$nationality->titleEn}}
                     </option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style ">
                <label>Place Of Residence</label>
                <select required class="form-control" name="residence" id="countrySelect">
                    @foreach ($residences as $residence)
                    <option value="{{$residence->id}}" {{ $booking->residence_id == $residence->id ? 'selected' : '' }} >
                        {{$residence->titleEn}}
                    </option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style ">
                <label>Notes</label>
                <textarea class="form-control" name="notes" rows="3"
                    placeholder="Notes">{{$booking->notes}}</textarea>
            </fieldset>

            <!-- <fieldset class="form-group form-group-style ">
                <label>INVOICE LINK:</label>
                <input required  type="text" value="{{$booking->invoice }}" name="invoice" class="form-control"
                    placeholder="INVOICE LINK:">
            </fieldset> -->

            <fieldset class="form-group form-group-style row">

                <label class="col-md-3 label-control">Status :</label>
                <div class="col-md-9 mx-auto">
                    <div class="input-group">
                        <div class="d-inline-block custom-control custom-radio mr-1">
                            <input required  type="radio" name="status" {{ $booking->status == 0 ? 'checked' : '' }}
                            value="0" class="custom-control-input" id="draft" />
                            <label class="custom-control-label" for="draft">Draft</label>
                        </div>
                        <div class="d-inline-block custom-control custom-radio mr-1">
                            <input required  type="radio" name="status" {{ $booking->status == 1 ? 'checked' : '' }}
                            value="1" class="custom-control-input" id="unconfirmed" />
                            <label class="custom-control-label" for="unconfirmed">Unconfirmed</label>
                        </div>
                        <div class="d-inline-block custom-control custom-radio">
                            <input required  type="radio" name="status" {{ $booking->status == 2 ? 'checked' : '' }}
                            value="2" class="custom-control-input" id="confirmed" />
                            <label class="custom-control-label" for="confirmed">Confirmed</label>
                        </div>
                    </div>
                </div>

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



@endsection