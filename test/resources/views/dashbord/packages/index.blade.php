@extends('dashbord.layouts')
@section('title')
<title>Packages</title>
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h2>All Packages</h2>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    @if(Auth::user()->role == 1 || getPermissionUser('Packages','create', Auth::user()->id) == 1)

                    <div class="heading-elements">
                        <button class="btn btn-md round btn-outline-success pull-right">
                            <a href="{{route('packages.create')}}">Add Package</a></button>
                    </div>
                    @endif
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <thead>
                                <tr>
                                    <th>School name</th>
                                    <th>Country name</th>
                                    <th>City name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($packages as $package)

                                <tr>
                                    <td>{{ $package->school->titleEn }}</td>
                                    <td>{{ $package->country->titleEn }}</td>
                                    <td>{{ $package->city->titleEn }}</td>
                                    <td class="pr-0">
                                        <button class="btn btn-sm round btn-outline-primary">
                                            <a href="###">Show</a>
                                        </button>
                                        @if(Auth::user()->role == 1 || getPermissionUser('Packages','edit', Auth::user()->id) == 1)
                                        <a href="{{route('packages.edit',$package->id)}}">
                                            <button class="btn btn-sm round btn-outline-success">
                                                Edit
                                            </button>
                                        </a>
                                        @endif
                                        @if(Auth::user()->role == 1 || getPermissionUser('Packages','delete', Auth::user()->id) == 1)

                                        <button type="button"
                                            onclick="document.getElementById('deletePackages_{{$package->id}}').submit()"
                                            class="btn btn-sm round btn-outline-danger">Delete</button>
                                        <form hidden id="deletePackages_{{$package->id}}"
                                            action="{{route('packages.destroy',$package->id)}}" method="POST">
                                            @method('Delete')
                                            @csrf
                                        </form>
                                        @endif

                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection