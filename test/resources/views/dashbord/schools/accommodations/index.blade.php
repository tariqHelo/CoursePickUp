@extends('dashbord.layouts')
@section('title')
<title>Accommodations</title>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <section id="pagination">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Accommodations ({{$school->titleEn}})</h2>
                            <div class="heading-elements">
                                <a href="{{route('viewAccommodationCreate',$school->id)}}">
                                    <button class="btn btn-md round btn-outline-success pull-right">
                                        Add Accommodation
                                    </button>
                                </a>
                            </div>
                        </div>

                        <section class="row all-contacts">
                            <div class="col-12">

                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- Task List table -->

                                        <div class="table-responsive">
                                            <table id="users-contacts"
                                                class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Accommodation Type</th>
                                                        <th>Booking fee</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($accommodations as $accommodation)

                                                    <tr>
                                                        <td>{{$accommodation->titleEn}}</td>
                                                        <td>{{$accommodation->accommodationType->titleEn}}</td>
                                                        <td>{{$accommodation->bookingFee}}</td>
                                                        <td>
                                                            @if($accommodation->status == 1)
                                                            <span class="badge badge-success">Published</span>
                                                            @elseif($accommodation->status == 0)
                                                            <span class="badge badge-danger">Draft</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{route('allAccommodationOptions',$accommodation->id)}}">
                                                                <button class="btn btn-sm round btn-outline-success">
                                                                    Option
                                                                </button>
                                                            </a>
                                                            <a href="{{route('viewAccommodationEdit',$accommodation->id)}}">
                                                                <button class="btn btn-sm round btn-outline-success">
                                                                    Edit
                                                                </button>
                                                            </a>
                                                            @if(Auth::user()->role == 1)
                                                            <button type="button"
                                                                onclick="document.getElementById('deleteAccommodation_{{$accommodation->id}}').submit()"
                                                                class="btn btn-sm round btn-outline-danger">Delete</button>
                                                            <form hidden id="deleteAccommodation_{{$accommodation->id}}"
                                                                action="{{route('deleteAccommodation',$accommodation->id)}}"
                                                                method="POST">
                                                                {{-- @method('Delete') --}}
                                                                @csrf
                                                            </form>
                                                            @endif
                                                        </td>
                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Accommodation Type</th>
                                                        <th>Booking fee</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
        </section>

    </div>
</div>
</div>
</section>
</div>
@endsection