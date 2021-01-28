@extends('dashbord.layouts') @section('title')
<title>Pages</title>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h2>All Pages</h2>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table table-de mb-0">
                            <thead>
                                <tr>
                                    <th>Page</th>
                                    <th>Last update date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    
                                <tr>
                                    <td>{{$row->titleEn}}</td>
                                    <td >{{$row->updated_at->format('Y-m-d')}}</td>
                                    <td class="pr-0"><button class="btn btn-sm round btn-outline-primary"><a
                                                href="{{url('page',$row->slugEn)}}">Show</a>
                                        </button>
                                        <button class="btn btn-sm round btn-outline-success"> <a
                                                href="{{route('pages.edit',$row->id)}}">Edit</a></button>
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