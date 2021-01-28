@extends('dashbord.layouts')
@section('title')
<title>Edit Booking Form</title>
@endsection
@section('content')


<div class="content-wrapper">
    <h2 class="pb-2">Edit Booking Leads :</h2>
    <div class="card ">

        <form method="POST" action="{{route('leadsUpdate',[$id,$data->id])}}" class="ml-1 mt-1 mr-1">
            @csrf
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">FIRST NAME</label>
                <input required  type="text" value="{{$data->fName}}" name="fName" class="form-control" id="textbox2"
                    placeholder="First Name ....">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">FIRST NAME</label>
                <input required  type="text" value="{{$data->lName}}" name="lName" class="form-control" id="textbox2"
                    placeholder="Last Name ....">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Email</label>
                <input required  type="email" value="{{$data->email}}" name="email" class="form-control" id="textbox2"
                    placeholder="Email ....">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Phone Number</label>
                <input required  type="text" value="{{$data->phone}}" name="phone" class="form-control" id="textbox2"
                    placeholder="Phone Number">
            </fieldset>


            <fieldset class="form-group form-group-style">
                <label class="mb-1">Nationality :</label>
                <select required class="form-control" name="nationality" id="countrySelect">
                    @foreach (App\nationalities::all() as $row)
                      <option @if($data->nationality == $row->id ) selected @endif value="{{$row->id}}">
                         {{$row->titleEn}}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Place Of Residence</label>
                <select required class="form-control" name="placeOfResidence" id="countrySelect">
                    @foreach (App\residences::all() as $row)
                    <option @if($data->placeOfResidence == $row->id) selected @endif
                        value="{{$row->id}}">{{$row->titleEn}}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Notes</label>
                <textarea class="form-control" name="notes" id="textbox2" rows="3"
                    placeholder="Notes">{{$data->notes}}</textarea>
            </fieldset>

            <fieldset class="form-group form-group-style ">
                <label for="textbox2">INVOICE LINK:</label>
                <input required  type="text" value="{{$data->invoice }}" name="invoice" class="form-control" id="textbox2"
                    placeholder="INVOICE LINK:">
            </fieldset>


            <fieldset class="form-group form-group-style ">
                <label for="Destination">Destination</label>
                <select required class="form-control" name="destination" id="Destination">
                    @foreach (App\destination::where('status', 1)->get() as $destination)
                        <option @if($data->destination == $destination->id) selected @endif value="{{$destination->id}}">{{$destination->titleEn}}</option>
                    @endforeach
                </select>
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