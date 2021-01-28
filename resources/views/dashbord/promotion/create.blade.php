@extends('dashbord.layouts')
@section('title')
<title>Add Promotion</title>
@endsection
@section('content')

<div class="content-wrapper">
    <h2 class="pb-2">Add Promotion:</h2>
    <div class="card ">

        <form method="POST" action="{{route('promotion.store')}}" class="ml-1 mt-1 mr-1">
            @csrf

            <fieldset class="form-group form-group-style mb-2 ml-1 mr-1">
                <label class="mb-1" for="type">Promotion type :</label>
                <select required class="custom-select" id="type" name="type">
                    <option selected="">select promotion type</option>
                    <option value="1">Fixed percentage discount</option>
                    <option value="2">Fixed percentage surcharge</option>
                    <option value="3">Fixed monetary discount </option>
                    <option value="4">Fixed monetary surcharge </option>
                    <option value="5">Extra free week </option>
                    <option value="6">Discount Free Week </option>
                </select>
            </fieldset>

            <fieldset class="form-group form-group-style mb-2 ml-1 mr-1">
                <label class="mb-1" for="for">Promotion for :</label>
                <select required class="custom-select" id="for" name="for">
                    <option selected="" value="0">select promotion for</option>
                    <option value="1">Course</option>
                    <option value="2">Accommodation</option>
                    <option value="3">Registration fee </option>

                </select>
            </fieldset>
            <fieldset class="form-group form-group-style mb-2 ml-1 mr-1" id="subForContainer" style="display: none;">
                <label class="mb-1" for="subFor">Type :</label>
                <select required class="custom-select" id="subFor" name="subFor">
                    <option selected="">All Types</option>
                    @foreach(\App\accommodationType::where('status', 1)->get() as $type)
                    <option value="{{$type->id}}">{{$type->titleEn}}</option>
                    @endforeach
                </select>
            </fieldset>
            <div class="row form-group-style mb-2 ml-1 mr-1">
                <fieldset class="form-group form-group-style mb-1 col-6">
                    <label for="validDateFrom">Valid from Date :</label>

                    <input required type="date" class="form-control" name="validDateFrom" id="validDateFrom">
                </fieldset>

                <fieldset class="form-group form-group-style mb-1 col-6">
                    <label for="validDateTo">Valid to Date :</label>

                    <input required type="date" class="form-control" name="validDateTo" id="validDateTo">
                </fieldset>
            </div>
            <div class="row form-group-style mb-2 ml-1 mr-1">
                <fieldset class="form-group form-group-style mb-1 col-6">
                    <label for="courseBookingFrom">Course booking from date :</label>

                    <input required type="date" class="form-control" name="courseBookingFrom" id="courseBookingFrom">
                </fieldset>

                <fieldset class="form-group form-group-style mb-1 col-6">
                    <label for="courseBookingTo">Course booking to date :</label>

                    <input required type="date" class="form-control" name="courseBookingTo" id="courseBookingTo">
                </fieldset>
            </div>



            <div class="form-group form-group-style mb-2 ml-1 mr-1 contact-repeater">

                <div class="form-group form-group-style mb-2 mt-1 " data-repeater-list="repeater-group">
                    <div class="input-group mb-1 row" data-repeater-item>

                        <fieldset class="form-group col-12">
                            <label for="titleEn">Title En</label>
                            <input required type="text" class="form-control" id="titleEn" name="titleEn"
                                placeholder="Title En ....">
                        </fieldset>
                        <fieldset class="form-group col-12">
                            <label for="titleAr">Title Ar</label>
                            <input required type="text" class="form-control" id="titleAr" name="titleAr"
                                placeholder="Title Ar ....">
                        </fieldset>



                        <fieldset class="form-group col-12">
                            <label class="mb-1" for="Amount">Amount :</label>
                            <input required type="text" class="form-control" id="Amount" name="amount"
                                placeholder="Amount">
                        </fieldset>
                        <fieldset class="form-group col-6">
                            <label class="mb-1" for="school">School :</label>
                            <select required name="school" id="school" class="custom-select school">
                                <option disabled selected> Select School </option>
                                @foreach ($schools as $school)
                                <option value="{{$school->id}}">{{$school->titleEn}} - {{$school->city->titleEn}}</option>
                                @endforeach
                            </select>
                        </fieldset>
                        <!-- <fieldset class="form-group col-6">
                            <input type="hidden" name="school" value="">
                        </fieldset> -->

                        <fieldset class="form-group col-6">
                        </fieldset>

                        <fieldset class="form-group col-6">
                            <label class="mb-1" for="bookingDurationFrom">Booking duration from :</label>
                            <select required class="custom-select bookingDurationFrom" id="bookingDurationFrom" name="bookingDurationFrom">
                                <option  disabled selected>select Booking duration from</option>
                                @for ($i = 1; $i < 49; $i++)
                                     <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </fieldset>


                        <fieldset class="form-group col-6">
                            <label class="mb-1" for="bookingDurationTo">Booking duration to :</label>
                            <select required class="custom-select bookingDurationTo" id="bookingDurationTo" name="bookingDurationTo">
                                <option  disabled selected>select Booking duration to</option>

                                @for ($i = 1; $i < 49; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor

                            </select>
                        </fieldset>


                        <fieldset class="form-group col-12">
                            <label class="mb-1" for="status">Statu :</label>
                            <select required class="custom-select" name="status" id="status">
                                <option  disabled selected>select Statu</option>
                                <option value="1">ON</option>
                                <option value="0">OFF</option>
                            </select>
                        </fieldset>


                        <span class="input-group-append col-12" id="button-addon2">
                            <button class="btn btn-danger" type="button" data-repeater-delete><i
                                    class="ft-x"></i></button>
                        </span>
                    </div>
                </div>

                <button type="button" data-repeater-create class="btn btn-primary">
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
            //School .
            var inputs = $('.school');
            console.log(inputs.length);
            var mm = inputs.length;
            var mmn = mm - 2;
            console.log( $(inputs[mmn]).val() + "school");
            // $(inputs[mmn]).css('background-color','red');
            $(this).find('.school').val($(inputs[mmn]).val()).attr('selected', 'selected');

            var bookingDurationTo = $('.bookingDurationTo');
            var countbookingDurationTo = bookingDurationTo.length;
            console.log(countbookingDurationTo + " countbookingDurationTo");
            var findLastsTo = parseInt(countbookingDurationTo) - 2;

            console.log(findLastsTo + " findLastsTo");

            var thisElemntName = $(bookingDurationTo[findLastsTo]).attr('name');
            var thisElementValue  = $('[name="'+thisElemntName+'"]').val();
            console.log(thisElementValue);

            var ThisPlusTow = parseInt(thisElementValue)  +  2;
            console.log(ThisPlusTow + " ThisPlusTow");

            $(this).find('.bookingDurationTo').val(ThisPlusTow).attr('selected', 'selected');

            var toPlusOne = parseInt(thisElementValue)  +  1;
            $(this).find('.bookingDurationFrom').val(toPlusOne).attr('selected', 'selected');
            //End bookingDurationTo



            //Status
            var status = $('#status');
            var countStatus = status.length;
            var findLastStatus = countStatus - 1;
            $(this).find('#status').val($(status[findLastStatus]).val()).attr('selected', 'selected');


			$(this).slideDown();

		},
		hide: function(remove) {
			if (confirm('Are you sure you want to remove this item?')) {
				$(this).slideUp(remove);
			}
		}
	});


    $(document).on('change', '#for', function () {
        if ($(this).val() == 2) {
            $('#subForContainer').show(200);
        }else{
            $('#subForContainer').hide(200);
            // $('#subFor').find('option[value=0]').attr('selected', 'selected');
        }
    })


})(window, document, jQuery);
</script>

@endsection
@endsection
