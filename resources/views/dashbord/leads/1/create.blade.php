@extends('dashbord.layouts')
@section('title')
<title>Add Lead</title>
@endsection
@section('content')

<div class="content-wrapper">
    <h2 class="pb-2">Add Lead:</h2>
    <div class="card ">

        <form method="POST" action="{{route('leadsStore',$id)}}" class="ml-1 mt-1 mr-1">
            @csrf
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Name</label>
                <input required  type="text" value="{{old('fName')}}" name="fName" class="form-control" id="textbox2"
                    placeholder="Name ....">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Email</label>
                <input required  type="email" value="{{old('email')}}" name="email" class="form-control" id="textbox2"
                    placeholder="Email ....">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Phone Number</label>
                <input required  type="text" value="{{old('phone')}}" name="phone" class="form-control" id="textbox2"
                    placeholder="Phone Number">
            </fieldset>


            <fieldset class="form-group form-group-style">
                <label class="mb-1">Nationality :</label>
                <select required class="form-control" name="nationality" id="countrySelect">
                    @foreach (App\nationalities::all() as $row)
                            @if($row->status == 1)
                                <option @if(old('nationality')==$row->id) selected @endif value="{{$row->id}}">{{$row->titleEn}}
                                </option>
                            @endif
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Place Of Residence</label>
                <select required class="form-control" name="placeOfResidence" id="countrySelect">
                    @foreach (App\residences::all() as $row)
                        @if($row->status == 1)
                            <option @if(old('placeOfResidence')==$row->id) selected @endif
                                value="{{$row->id}}">{{$row->titleEn}}</option>
                        @endif
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style ">
                <label for="Destination">Destination</label>
                <select required class="form-control" name="destination" id="Destination">
                    @foreach (App\destination::where('status', 1)->get() as $destination)
                        <option value="{{$destination->id}}">{{$destination->titleEn}}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Notes</label>
                <textarea class="form-control" name="notes" id="textbox2" rows="3"
                    placeholder="Notes">{{old('notes')}}</textarea>
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