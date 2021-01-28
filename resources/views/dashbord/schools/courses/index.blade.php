@extends('dashbord.layouts')
@section('title')
<title>Short Courses</title>
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
                            <h2>Short Courses ({{ $school->titleEn }})</h2>
                            <div class="heading-elements">
                                <a href="{{route('viewCoursesCreate',$school->id)}}">
                                    <button class="btn btn-md round btn-outline-success pull-right">
                                        Add Courses
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
                                                        <th>HOURS PER WEEK</th>
                                                        <th>Lessons Per Week</th>
                                                        <th>Fee Type</th>
                                                        <th>Status</th>
    
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($courses as $course)
                                                    <tr>
                                                        <td>{{ $course->titleEn }}</td>
                                                        <td>{{ $course->lessonsPerWeek }}</td>
                                                        <td>{{$course->hoursPerWeek }}</td>
                                                        <td>{{ $course->materialFeeType->titleEn }}</td>
                                                        <td>
                                                            @if($course->status == 1)
                                                            <span class="badge badge-success">Published</span>
                                                            @elseif($course->status == 0)
                                                            <span class="badge badge-danger">Draft</span>
                                                            @endif
                                                        </td>
                                                       

                                                        <td>
                                                            <a href="{{route('viewCourseFee',$course->id)}}">
                                                                <button class="btn btn-sm round btn-outline-info">
                                                                    Fee
                                                                </button>
                                                            </a>
                                                            <a href="{{route('viewCoursesEdit',$course->id)}}">
                                                                <button class="btn btn-sm round btn-outline-success">
                                                                    Edit
                                                                </button>
                                                            </a>

                                                            @if(Auth::user()->role == 1)
                                                            
                                                            @if($course->materialFeeType_id == 3)
                                                            <a href="{{route('viewCoursesMaterialFee',$course->id)}}">
                                                                <button class="btn btn-sm round btn-outline-info">
                                                                    Material Fee
                                                                </button>
                                                            </a>
                                                            @endif
                                                            <button type="button"
                                                                onclick="document.getElementById('deletePackages_{{$course->id}}').submit()"
                                                                class="btn btn-sm round btn-outline-danger">Delete</button>
                                                            <form hidden id="deletePackages_{{$course->id}}"
                                                                action="{{route('deleteCourseSchool',$course->id)}}"
                                                                method="POST">
                                                                {{-- @method('Delete') --}}
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
                                                        <th>Title</th>
                                                        <th>HOURS PER WEEK</th>
                                                        <th>Lessons Per Week</th>
                                                        <th>Fee Type</th>
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