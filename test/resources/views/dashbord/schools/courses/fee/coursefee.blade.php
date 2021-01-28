@extends('dashbord.layouts')
@section('title')
<title>Course Fees</title>
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
                            <h2>Course Fees ({{$course->titleEn}})</h2>
                            <div class="heading-elements">
                               
                            </div>
                        </div>

                        <section class="row all-contacts">
                            <div class="col-12">

                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- Task List table -->
                                        <form method="POST" action="{{route('storeCourseFee',$course->id)}}" class="ml-1 mt-1 mr-1">
                                            @csrf
                                            <div class="form-group form-group-style mb-2 ml-1 mr-1 contact-repeater">

                                                <div class="form-group form-group-style mb-2 mt-1 " data-repeater-list="repeater-group">
                                                    <div class="input-group mb-1 row ThisRow" data-repeater-item>
                                
                                
                                                        <input type="hidden" name="coursesFeesId" >
                                
                                                        <fieldset class="form-group col-6">
                                                            <label class="mb-1" for="fromWeek">From number of weeks :</label>
                                                            <select required class="custom-select fromWeek" id="fromWeek" name="fromWeek">
                                                                <option selected disabled>Select From number of weeks</option>
                                
                                                                @for ($i = 1; $i < 49; $i++)
                                                                   <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                
                                                            </select>
                                                        </fieldset>
                                                        <fieldset class="form-group col-12" hidden>
                                                            <label for="this_id">this_id</label>
                                                            <input  type="text" class="form-control" id="this_id" name="this_id"
                                                                placeholder="Title Ar ....">
                                                        </fieldset>
                                
                                                        <fieldset class="form-group col-6">
                                                            <label class="mb-1" for="toWeek">To number of weeks:</label>
                                                            <select required class="custom-select toWeek" id="toWeek" name="toWeek">
                                                                <option selected disabled>Select To number of weeks</option>
                                
                                                                @for ($i = 1; $i < 49; $i++)
                                                                  <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                
                                                            </select>
                                                        </fieldset>
                                                        
                                                        <fieldset class="form-group col-6">
                                                            <label class="mb-1" for="fee">Amount :</label>
                                                            <input required  type="text" class="form-control" id="fee" name="fee"
                                                                placeholder="Amount">
                                                        </fieldset>
                                
                                                        <span class="input-group-append col-12" id="button-addon2">
                                                            <button class="btn btn-danger" type="button" data-repeater-delete><i
                                                                    class="ft-x"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                
                                                <button type="button" data-repeater-create class="btn btn-primary  r-btnAdd">
                                                    <i class="ft-plus"></i> Add
                                                </button>
                                            </div>
                                
                                            <div class="form-actions text-center mb-2 ml-1 mr-1">
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
                            </div>
                    </div>
        </section>

    </div>
</div>
</div>
</section>
</div>


@section('script')

<!-- END: Page JS-->
<script src="{{ asset('dash/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
<!-- END: Page Vendor JS-->


<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
{{-- <script src="{{ asset('Dash/app-assets/js/scripts/forms/form-repeater.js')}}"></script> --}}
<script>
    (function(window, document, $) {
	'use strict';

	// Default
	$('.repeater-default').repeater();

	// Custom Show / Hide Configurations
	$('.file-repeater, .contact-repeater').repeater({
		show: function () {
                    //toWeek
                    var toWeek = $('.toWeek');
            var countToWeek = toWeek.length;
            console.log(countToWeek + " countToWeek");
            var findLastsTo = parseInt(countToWeek) - 2;

            console.log(findLastsTo + " findLastsTo");

            var thisElemntName = $(toWeek[findLastsTo]).attr('name');
            var thisElementValue  = $('[name="'+thisElemntName+'"]').val();
            console.log(thisElementValue);
            
            var ThisPlusTow = parseInt(thisElementValue)  +  2;
            console.log(ThisPlusTow + " ThisPlusTow");

            $(this).find('.toWeek').val(ThisPlusTow).attr('selected', 'selected');
            
            var toPlusOne = parseInt(thisElementValue)  +  1;
            $(this).find('.fromWeek').val(toPlusOne).attr('selected', 'selected');
            //End toWeek
            if(parseInt(thisElementValue) == 48){
                alert("AAAA")
            }else{
                $(this).slideDown();
            }
		},
		hide: function(remove) {
			var thisId = $(this).find('#this_id').val();
            
            // console.log(thisId);
			if (confirm('Are you sure you want to remove this item?')) {
				$.ajax({
                    url : '{{route('deleteCoursesFee')}}'+'/'+ thisId,
                    type:'DELETE',
                    data: { "_token": "{{ csrf_token() }}" },
                    success : function(data) {              
                       if(data.status == 200){
                           $(this).slideUp(remove);
                       }else{
                           alert('WTF');
                       }

                    },
                });
                
			}
		}
	});


})(window, document, jQuery);
@if($course->weeksrange_fees->count())


$(document).ready(function () {
    $('.r-btnAdd').click(function (e) { 
        e.preventDefault();
        var ThisData = document.querySelectorAll(".ThisRow");
        var countThisData = ThisData.length - 1;
        // console.log();
        ThisData[countThisData].remove();
    });
});



var $repeater = $('.contact-repeater').repeater();
$repeater.setList([
    @foreach($course->weeksrange_fees as $multi)
    {
        'this_id' : '{{$multi->id}}',
        'fromWeek': '{{$multi->fromWeek}}',
        'toWeek': '{{$multi->toWeek}}',
        'fee': '{{$multi->fee}}',
    },
    @endforeach
    
]);
@endif

</script>

@endsection

@endsection