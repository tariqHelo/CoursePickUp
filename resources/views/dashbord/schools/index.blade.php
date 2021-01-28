@extends('dashbord.layouts')
@section('title')
<title>Schools</title>
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
                            <h2>All Schools</h2>
                            <div class="heading-elements">
                                @if(Auth::user()->role == 1 || getPermissionUser('Schools','create', Auth::user()->id) == 1)

                                    <a href="{{route('schools.create')}}">
                                        <button class="btn btn-md round btn-outline-success pull-right">
                                            Add School
                                        </button>
                                    </a>

                                @endif
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
                                                        <th>Country</th>
                                                        <th>City</th>
                                                        <th>Currency Code</th>
                                                        <th>Rating</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($schools as $school)
                                                        @if(Auth::user()->role != 1)
                                                            @if($school->userId == Auth::user()->id)
                                                            <tr>
                                                                <td>{{ $school->titleEn }}</td>
                                                                <td>{{ $school->country->titleEn }}</td>
                                                                <td>{{ $school->city->titleEn }}</td>
                                                                <td>{{ $school->currency->code }}</td>
                                                                <td>{{ $school->rating }}</td>
                                                                <td>
                                                                    @if($school->status == 1)
                                                                    <span class="badge badge-success">Published</span>
                                                                    @elseif($school->status == 0)
                                                                    <span class="badge badge-danger">Draft</span>
                                                                    @endif
                                                                </td>
                                                                <td class="pr-0">
                                                                    <a href="{{route('viewContent',$school->id)}}">
                                                                        <button class="btn btn-sm round btn-outline-success">
                                                                            Content
                                                                        </button>
                                                                    </a>
                                                                    <a href="{{route('viewCourses',$school->id)}}">
                                                                        <button class="btn btn-sm round btn-outline-warning">
                                                                            Courses
                                                                        </button>
                                                                    </a>
                                                                    <a href="{{route('viewAccommodations',$school->id)}}">
                                                                        <button class="btn btn-sm round btn-outline-info">
                                                                            Accommodations
                                                                        </button>
                                                                    </a>
                                                                    <a href="{{route('viewAirportPickUp',$school->id)}}">
                                                                        <button class="btn btn-sm round btn-outline-warning">
                                                                            Airport Pick-Up
                                                                        </button>
                                                                    </a>
                                                                    <a href="{{route('viewInsurances',$school->id)}}">
                                                                        <button class="btn btn-sm round btn-outline-info">
                                                                            Insurances
                                                                        </button>
                                                                    </a>
                                                                    <a href="{{route('promotion.show',$school->id)}}">
                                                                        <button class="btn btn-sm round btn-outline-warning">
                                                                            Promotions
                                                                        </button>
                                                                    </a>
                                                                    @if(Auth::user()->role == 1 || getPermissionUser('Schools','edit', Auth::user()->id) == 1)

                                                                    <a href="{{route('schools.edit',$school->id)}}">
                                                                        <button class="btn btn-sm round btn-outline-success">
                                                                            Edit
                                                                        </button>
                                                                    </a>
                                                                    
                                                                    @endif

                                                                    @if(Auth::user()->role == 1 || getPermissionUser('Schools','delete', Auth::user()->id) == 1)
                                                                    <button type="button" onclick="document.getElementById('deleteSchools_{{$school->id}}').submit()"
                                                                    class="btn btn-sm round btn-outline-danger">Delete</button>
                                                                    <form hidden id="deleteSchools_{{$school->id}}"
                                                                        action="{{route('schools.destroy',$school->id)}}"
                                                                        method="POST">
                                                                        @method('Delete')
                                                                        @csrf
                                                                    </form>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @endif
                                                        @endif
                                                        @if(Auth::user()->role == 1)
                                                        <tr>
                                                            <td>{{ $school->titleEn }}</td>
                                                            <td>{{ $school->country->titleEn }}</td>
                                                            <td>{{ $school->city->titleEn }}</td>
                                                            <td>{{ $school->currency->code }}</td>
                                                            <td>{{ $school->rating }}</td>
                                                            <td>
                                                                @if($school->status == 1)
                                                                <span class="badge badge-success">Published</span>
                                                                @elseif($school->status == 0)
                                                                <span class="badge badge-danger">Draft</span>
                                                                @endif

                                                            </td>
                                                            <td class="pr-0">
                                                                <a href="{{route('viewContent',$school->id)}}">
                                                                    <button class="btn btn-sm round btn-outline-success">
                                                                        Content
                                                                    </button>
                                                                </a>
                                                                <a href="{{route('addAccreditations',$school->id)}}">
                                                                    <button class="btn btn-sm round btn-outline-info">
                                                                        Accreditations
                                                                    </button>
                                                                </a>
                                                                <a href="{{route('viewCourses',$school->id)}}">
                                                                    <button class="btn btn-sm round btn-outline-warning">
                                                                        Courses
                                                                    </button>
                                                                </a>
                                                                <a href="{{route('viewAccommodations',$school->id)}}">
                                                                    <button class="btn btn-sm round btn-outline-info">
                                                                        Accommodations
                                                                    </button>
                                                                </a>
                                                                <a href="{{route('viewAirportPickUp',$school->id)}}">
                                                                    <button class="btn btn-sm round btn-outline-warning">
                                                                        Airport Pick-Up
                                                                    </button>
                                                                </a>
                                                                <a href="{{route('viewInsurances',$school->id)}}">
                                                                    <button class="btn btn-sm round btn-outline-info">
                                                                        Insurances
                                                                    </button>
                                                                </a>
                                                                <a href="{{route('promotion.show',$school->id)}}">
                                                                    <button class="btn btn-sm round btn-outline-warning">
                                                                        Promotions
                                                                    </button>
                                                                </a>
                                                                @if(Auth::user()->role == 1 || getPermissionUser('Schools','edit', Auth::user()->id) == 1)

                                                                <a href="{{route('schools.edit',$school->id)}}">
                                                                    <button class="btn btn-sm round btn-outline-success">
                                                                        Edit
                                                                    </button>
                                                                </a>
                                                                
                                                                @endif

                                                                @if(Auth::user()->role == 1 || getPermissionUser('Schools','delete', Auth::user()->id) == 1)
                                                                <button type="button" onclick="document.getElementById('deleteSchools_{{$school->id}}').submit()"
                                                                class="btn btn-sm round btn-outline-danger">Delete</button>
                                                                <form hidden id="deleteSchools_{{$school->id}}"
                                                                    action="{{route('schools.destroy',$school->id)}}"
                                                                    method="POST">
                                                                    @method('Delete')
                                                                    @csrf
                                                                </form>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Country</th>
                                                        <th>City</th>
                                                        <th>Currency Code</th>
                                                        <th>Rating</th>
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