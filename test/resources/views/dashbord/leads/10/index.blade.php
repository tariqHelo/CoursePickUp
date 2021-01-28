@extends('dashbord.layouts')
@section('title')
<title>Newsletter Emails</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Newsletter Emails</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{url('dashbord')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Newsletter Emails</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="media width-250 float-right">
                <media-left class="media-middle">
                    <div id="sp-bar-total-sales"></div>
                </media-left>
                <div class="media-body media-right text-right">
                    <h3 class="m-0">{{$total}}</h3>
                    <span class="text-muted">Total Emails</span>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="pagination">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Subscriber Emails</h4>
                            <div class="heading-elements">
                              
                            </div>
                        </div>
                        <section class="row all-contacts">
                            <div class="col-12">
                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- Task List table -->
                                        <button class="btn btn-outline-info" id="xx">Export To Excel</button>
                                        <br>
                                        <div class="table-responsive">
                                            <table id="users-contacts"
                                                class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle text-cente dataTabler">
                                                <thead>
                                                    <tr>
                                                        <th>Email</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $row)

                                                    <tr>
                                                        <td>
                                                            <a class="media-heading name">{{$row->email}}</a>
                                                        </td>
                                                       
                                                        <td class="text-center">
                                                            {{\Carbon\Carbon::parse($row->created_at)->diffForHumans() }}
                                                        </td>
                                                       
                                                    </tr>

                                                    @endforeach

                                                </tbody>
                                            </table>
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
</div>

<script>
function download_csv(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV FILE
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // We have to create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Make sure that the link is not displayed
    downloadLink.style.display = "none";

    // Add the link to your DOM
    document.body.appendChild(downloadLink);

    // Lanzamos
    downloadLink.click();
}

function export_table_to_csv(html, filename) {
	var csv = [];
	var rows = document.querySelectorAll("table tr");
	
    for (var i = 0; i < rows.length; i++) {
		var row = [], cols = rows[i].querySelectorAll("td, th");
		
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
		csv.push(row.join(","));		
	}

    // Download CSV
    download_csv(csv.join("\n"), filename);
}
document.querySelector("button").addEventListener("click", function () {
    var html = document.querySelector("table").outerHTML;
	export_table_to_csv(html, "Newsletter.csv");
});

</script>
  
@endsection