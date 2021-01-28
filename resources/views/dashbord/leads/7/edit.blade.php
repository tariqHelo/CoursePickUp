@extends('dashbord.layouts')
@section('title')
<title>Edit Add Lead</title>
@endsection
@section('content')


<div class="content-wrapper">
    <h2 class="pb-2">Edit Contact Us Leads:</h2>
    <div class="card ">

        <form method="POST" action="{{route('leadsUpdate',[$id,$data->id])}}" class="ml-1 mt-1 mr-1">
            @csrf
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Name</label>
               <input required  type="text" value="{{$data->fName}}" name="fName" class="form-control" id="textbox2"
                    placeholder="Name ....">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">Email</label>
               <input required  type="email" value="{{$data->email}}" name="email" class="form-control" id="textbox2"
                    placeholder="Email ....">
            </fieldset>
            <fieldset class="form-group form-group-style ">
                <label for="textbox2">subject</label>
               <input required  type="text" value="{{$data->subject}}" name="subject" class="form-control" id="textbox2"
                    placeholder="subject">
            </fieldset>


            <fieldset class="form-group form-group-style ">
                <label for="textbox2">MESSAGE</label>
                <textarea required class="form-control" name="notes" id="textbox2" rows="3"
                    placeholder="Message">{{$data->notes}}</textarea>
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