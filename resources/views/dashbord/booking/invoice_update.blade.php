<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">

	<style type="text/css">
		/*@import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap');*/
		*{
			font-family: 'Tajawal', sans-serif;
		}
		body{
			font-size:8.5pt;
			/*font-family: 'Tajawal', sans-serif;*/
		}
		a{
			color: #666ee8 ;
			text-decoration: none;
		}
		table{
			width: 100%;

		}
		table td{
			vertical-align: top;
		}
		table.table{
			border: 1pd solid #eee;
			    border-collapse: collapse;
		}
		table.table td{
			border: 1pt solid #eee;
			padding: 5pt;
		}

		table.table td:nth-of-type(3), table.table td:nth-of-type(4), .text-center{
			text-align: center;
		}
		.mb-2{
			margin-bottom: .5rem
		}
		.mb-5{
			margin-bottom: 1.5rem
		}
		.mb-0{
			margin-bottom: 0
		}
		.text-right{
			text-align: right;
		}
		.font18{
			font-size: 18pt;
			font-weight: 100;
			text-transform: uppercase;
		}
		.font14{
			font-size: 10.5pt;
			font-weight: 100;
			/*text-transform: uppercase;*/
		}
		.small{
			font-size: 9pt
		}
		/*.col-12{
			width: 50%; 
			display: inline-block;
		}
		.d-flex{
			display: -ms-flexbox !important;
		    display: flex !important;
		}*/
	</style>
</head>
<body>

	<table class="mb-5">
		<tbody>
			<tr>
				<td>
					<div class="mb-5">
						<img src="{{ asset('/Schools/Logo/' . $school->logo) }}" style="height: 30pt; margin-bottom: 1rem" /><br>
						<span>{{ $school->titleEn }}</span> <br>
						<span>{{ $school->country->titleEn }}, {{ $school->city->titleEn }}</span> <br>
					</div>
				</td>
				<td class="text-right">
					<div class="mb-5">
						<img src="{{ asset('/site/' . setting('logo')) }}" style="height: 30pt; margin-bottom: 1rem" /><br>
						<span><a target="_blank" href="https://pickupcourse.com">PickUpCourse.com</a></span><br>
						<span>{{ setting('email') }}</span><br>
						<span>{{ setting('phoneNumber') }}</span>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<span>Student Details: </span> <br>
						<span>{{ $booking->first_name . ' ' . $booking->last_name }}</span> <br>
						<span>{{ $booking->email }}</span> <br>
						<span>{{ $booking->phone }}</span> <br>
					</div>
				</td>
				<td class="text-right">
					<div class="mb-5">
						<span>Invoice Details: </span><br>
						<span>Invoice Date: {{ \Carbon\Carbon::parse($booking->created_at)->format('d/m/Y') }}</span> <br>
						<span>Invoice Number: #{{ $booking->booking_id }}</span> <br>
					</div>
				</td>
			</tr>
		</tbody>
	</table>

	<div>
		<p class="text-center font14 mb-0">
			<strong>{{ $booking->status == 2 ? 'Confirmed' : 'Unconfirmed' }} booking </strong>
		</p>
		<p>
			Thank you for completing the reservation. Please review reservation details in the invoice as follows.
		</p>
	</div>
	<table class="table">
		<thead>
			<tr>
				<td>#</td>
				<td>Reservation Details</td>
				<td>School Currency</td>
				<td>User Currency</td>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			<tr>
				<td>{{$i++}}</td>
				<td>{{ $course->titleEn }} ({{ $course->hoursPerWeek }} Hours Per Week/ {{ $course->lessonsPerWeek }} Lessons Per Week)<br>
					{{ $start_date->format('d/m/Y') }} - {{ $end_date->format('d/m/Y') }} ({{ $booking->weeks }} Weeks)
				</td>
				<td>${{ $courseFee*$booking->weeks }}</td>
				<td></td>
			</tr>

			@if($accommodationOption)
			<tr>
				<td>{{$i++}}</td>
				<td>{{ $accommodationOption->accommodation->titleEn }} - {{ $accommodationOption->roomType->titleEn }} – {{ $accommodationOption->mealType->titleEn }} – {{ $accommodationOption->facilitie->titleEn }} – {{ $accommodationOption->supplement }} - {{ $accommodationOption->accommodationAge }} Years old <br>
					{{ $start_date->format('d/m/Y') }} - {{ (clone $start_date)->addWeeks($booking->accommodation_weeks)->subDays(2)->format('d/m/Y') }} ({{ $booking->accommodation_weeks }} Weeks)
				</td>
				<td>${{ $booking->feeweeksoption->fee*$booking->accommodation_weeks }}</td>
				<td></td>
			</tr>
			@endif

			<tr>
				<td>{{$i++}}</td>
				<td>Registration </td>
				<td>${{$school->registrationFee}}</td>
				<td></td>
			</tr>

			@if($accommodationOption)
			<tr>
				<td>{{$i++}}</td>
				<td>Accommodation Booking </td>
				<td>${{ $accommodationOption->accommodation->bookingFee }}</td>
				<td></td>
			</tr>
			@endif
			@if($materialFee)
			<tr>
				<td>{{$i++}}</td>
				<td>Material </td>
				<td>${{ $materialFee['materialFee'] }}</td>
				<td></td>
			</tr>
			@endif

			@if($course->courierFees)
			<tr>
				<td>{{$i++}}</td>
				<td>Courier </td>
				<td>${{ $course->courierFees }}</td>
				<td></td>
			</tr>
			@endif
			@if($booking->airportPickUp_id)
			<tr>
				<td>{{$i++}}</td>
				<td>{{ $booking->airportPickUp->titleEn }}  ({{ $booking->airportPickUp_type == 2 ? 'Round Way' : 'One Way' }})</td>
				<td>${{ $booking->airportPickUp_type == 2 ? $booking->airportPickUp->roundWay : $booking->airportPickUp->oneWay }}</td>
				<td></td>
			</tr>
			@endif

			@if($booking->insurance_id)
			<tr>
				<td>{{$i++}}</td>
				<td>{{ $booking->insurance->titleEn }}</td>
				<td>${{  $booking->insurance->fee*$booking->weeks }}</td>
				<td></td>
			</tr>
			@endif


			@if($booking->visa_id)
			<tr>
				<td>{{$i++}}</td>
				<td>{{ $booking->visa->titleEn }} </td>
				<td>${{ $booking->visa->fee }}</td>
				<td></td>
			</tr>
			@endif


			@if($promotions && count($promotions))
            @foreach($promotions as $promotion)
            @if($promotion[0])
			<tr>
				<td>{{$i++}}</td>
				<td>{{ $promotion[1] }} </td>
				<td>${{ $promotion[2] }}</td>
				<td></td>
			</tr>
            @endif
            @endforeach
            @endif

		</tbody>

		<tfoot>
			<tr>
				<td colspan="2" class="text-right">Total</td>
				<td class="text-center">${{ $booking->total }}</td>
				<td></td>
			</tr>
		</tfoot>
	</table>

</body>
</html>




 -->
