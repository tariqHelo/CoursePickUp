@extends('dashbord.layouts')
@section('title')
<title>Insurances</title>
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
                            <h2>Insurances ({{$school->titleEn}})</h2>
                            <div class="heading-elements">
                                <a href="{{route('viewInsurancesCreate',$school->id)}}">
                                    <button class="btn btn-md round btn-outline-success pull-right">
                                        Add Insurance
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
                                                        <!-- <th>School</th> -->
                                                        <th>Fee</th>
                                                        <th>status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($insurances as $insurance)

                                                    <tr>
                                                        <td>{{$insurance->titleEn}}</td>
                                                        <!-- <td>{{$school->titleEn}}</td> -->
                                                        <td>{{$insurance->fee}}</td>
                                                        <td>
                                                            @if($insurance->status == 1)
                                                            <span class="badge badge-success">Published</span>
                                                            @elseif($insurance->status == 0)
                                                            <span class="badge badge-danger">Draft</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                          
                                                            <a href="{{route('viewInsurancesEdit',$insurance->id)}}">
                                                                <button class="btn btn-sm round btn-outline-success">
                                                                    Edit
                                                                </button>
                                                            </a>
                                                            
                                                            @if(Auth::user()->role == 1)

                                                            <button type="button"
                                                                onclick="document.getElementById('deleteInsurances_{{$insurance->id}}').submit()"
                                                                class="btn btn-sm round btn-outline-danger">Delete</button>
                                                            <form hidden id="deleteInsurances_{{$insurance->id}}"
                                                                action="{{route('deleteInsurances',$insurance->id)}}"
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
                                                        <!-- <th>School</th> -->
                                                        <th>Fee</th>
                                                        <th>status</th>
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