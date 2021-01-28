@extends('dashbord.layouts')
@section('title')
<title>Accommodations Options</title>
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
                            <h2>Accommodations Options ({{ $accommodation->school->titleEn . ' - ' . $accommodation->titleEn }})</h2>
                            <div class="heading-elements">
                                <a href="{{route('addAccommodationOptions',$accommodation->id)}}">
                                    <button class="btn btn-md round btn-outline-success pull-right">
                                        Add Accommodation Options
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
                                                        <!-- <th>Accommodation</th> -->
                                                        <th>Room</th>
                                                        <th>Meal</th>
                                                        <th>Supplement</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($accommodation->accommodationOptions as $accommodationOption)

                                                    <tr>
                                                        <!-- <td>{{ $accommodationOption->accommodation->titleEn }}</td> -->
                                                        <td>{{ $accommodationOption->roomType->titleEn }}</td>
                                                        <td>{{ $accommodationOption->mealType->titleEn }}</td>
                                                        <td>{{ $accommodationOption->supplement }}</td>
                                                        <td>
                                                            @if($accommodationOption->status == 1)
                                                            <span class="badge badge-success">Published</span>
                                                            @elseif($accommodationOption->status == 0)
                                                            <span class="badge badge-danger">Draft</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{route('viewFeesWeeksOptions',$accommodationOption->id)}}">
                                                                <button class="btn btn-sm round btn-outline-info">
                                                                    Fee
                                                                </button>
                                                            </a>
                                                            <a href="{{route('viewAccommodationOptionsEdit',$accommodationOption->id)}}">
                                                                <button class="btn btn-sm round btn-outline-success">
                                                                    Edit
                                                                </button>
                                                            </a>
                                                            @if(Auth::user()->role == 1)

                                                            <button type="button"
                                                                onclick="document.getElementById('deleteAccommodationOption_{{$accommodationOption->id}}').submit()"
                                                                class="btn btn-sm round btn-outline-danger">Delete</button>
                                                            <form hidden id="deleteAccommodationOption_{{$accommodationOption->id}}"
                                                                action="{{route('deleteFeesWeeksOptions',$accommodationOption->id)}}"
                                                                method="POST">
                                                                @method('Delete')
                                                                @csrf
                                                            </form>
                                                            @endif
                                                        </td>

                                                        </td>
                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <!-- <th>Accommodation</th> -->
                                                        <th>Meal</th>
                                                        <th>Room</th>
                                                        <th>Supplement</th>
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