<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">

	<style type="text/css">
		/*@import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap');*/
		@font-face {
		    font-family: 'Tajawal';
		    src: url({{ storage_path('fonts/Tajawal-Regular.ttf') }}) format("truetype");
		    font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
		    font-style: normal; // use the matching font-style here
		}
		*{
			/*font-family: 'Tajawal', sans-serif;*/
			box-sizing: border-box;
		}
		body{
			font-size:8.5pt;
			font-family: 'Tajawal', sans-serif;
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

		table.table tbody td:nth-child(1), table.table tbody td:nth-child(3), table.table tbody td:nth-child(4), table.table thead td:nth-child(1), table.table thead td:nth-child(3), table.table thead td:nth-child(4)
		{
			text-align: center;
		}

		table.table tbody tr:nth-child(2n+1){
			background-color: #eee
		}
		.mb-2{
			margin-bottom: .5rem
		}
		.mb-3{
			margin-bottom: 1rem
		}
		.mb-5{
			margin-bottom: 1.5rem
		}
		.mb-0{
			margin-bottom: 0
		}
		.mt-5{
			margin-top: 1.5rem
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
			font-size: 11px
		}
		.col-6{
			width: 50%;
			/*display: inline-block;*/
		}
		.col-3{
			width: 25%;
		}
		.col-4{
			width: 33%
		}
		.text-center{
			text-align: center;
		}
		.text-primary{
			color: #FF1944
		}
		.text-blue{
			color: #3271a5
		}
		.font-weight-bold{
			font-weight: bold;
		}
		.mb-1{
			margin-bottom: .25rem;
			/*line-height: 2*/
		}
		.pt-3{
			padding-top: 1rem
		}
		.pb-3{
			padding-bottom: 1rem
		}
		.px-3{
			padding-right: 1rem;
			padding-left: 1rem;
		}
		.float-left{
			float: left;
		}
		.float-right{
			float: right;
		}
		.bg-primary{
			background-color: #FF1944;
		}
		.text-white{
			color: #ffffff
		}
		.text-left{
			text-align: left;
		}

		tr.text-white td{
			color: #ffffff
		}

		tr.font-weight-bold td{
			font-weight: bold;
		}

		.header{
			text-transform: uppercase;
			font-weight: bold;
			font-size: 20px;
		}
		.border-primary{
			border: 2px solid #FF1944
		}
		.underline{
			text-decoration: underline;
		}

		.border-dark{
			border: 2px solid #000000
		}
		.rtl{
			direction: rtl !important
		}
		@page {
			header: page-header;
			footer: page-footer;
		}
		.page-break {
		 page-break-after: always;
		}
		.last { position: absolute; bottom: 150px; left: 0px; right: 0px; }

	</style>
</head>
<body>
	<htmlpageheader name="page-header">
		<p class="header {{ $lang == 'ar' ? 'text-right' : '' }}">{{ __('messages.invoice.student copy') }}</p>
	</htmlpageheader>

	<htmlpagefooter name="page-footer">
		<div class="mb-5 {{ $lang == 'ar' ? 'rtl text-right' : '' }}">
			<div class="col-6 {{ $lang == 'ar' ? 'float-right' : 'float-left' }} pt-3 pb-3">
				<div class="mb-3">
					<span>{{ __('messages.invoice.for more information or any assistance') }},</span><br>
					<span>{{ __('messages.invoice.email us at') }}: </span><a href="mailto:ask@pickupcourse.com" class="text-blue">ask@pickupcourse.com</a>
				</div>
			</div>

			<div class="col-4 {{ $lang == 'ar' ? 'float-left text-left' : 'float-right text-right' }} pt-3 pb-3 px-3 text-center">
				<img src="{{ asset('/site/' . setting('logo')) }}" style="height: 40px">
			</div>
		</div>

		<p class="text-center small {{ $lang == 'ar' ? 'rtl' : '' }}">
			<strong>{{ __('messages.invoice.address') }}:</strong> 
				@if($lang == 'ar')
				مكتب رقم 53, شارع الأمير محمد, الخبر, المملكة العربية السعودية
				@else
				Office No.53, Prince Muhammed Street, Khobar, Saudi Arabia 
				@endif
			<span class="text-primary">||</span> 
			<strong>{{ __('messages.invoice.phone') }}:</strong> 
				<span dir="ltr">+966 50 467 9668 </span>
			<span class="text-primary">||</span> 
			<strong>{{ __('messages.invoice.cr number') }}:</strong> 
				234871657468 
			<span class="text-primary">||</span> 
			<strong>{{ __('messages.invoice.website') }}: </strong>
			<a class="text-primary" target="_blank" href="https://pickupcourse.com">www.pickupcourse.com</a></p>
	</htmlpagefooter>

	<!-- Head -->
	<div class="head pt-3 mb-5">
		<div class="col-6 {{ $lang == 'ar' ? 'float-right text-right rtl' : 'float-left' }}">
			<div class="text-primary font-weight-bold mb-1">{{ __('messages.invoice.student details') }}: </div>
			<div class="mb-1">{{ __('messages.invoice.name') }}: {{ $booking->first_name . ' ' . $booking->last_name }}</div>
			<div class="mb-1">{{ __('messages.invoice.phone no') }}: {{ $booking->phone }}</div>
			<div class="mb-1">{{ __('messages.invoice.email') }}: {{ $booking->email }}</div>
		</div>

		<div class="col-3 {{ $lang == 'ar' ? 'float-left' : 'float-right' }} text-center">
			<img src="{{ asset('/Schools/Logo/' . $school->logo) }}" style="height: 30pt; margin-bottom: 1rem" />
			<div>{{ $lang == 'ar' ? $school->titleAr : $school->titleEn }}</div> 
			<div>{{ $lang == 'ar' ? $school->country->titleAr : $school->country->titleEn }}, {{ $lang == 'ar' ? $school->city->titleAr : $school->city->titleEn }}</div> 
		</div>
	</div>

	<!-- Post head -->
	<div  class="{{ $lang == 'ar' ? 'rtl text-right' : '' }}">
		<p class="text-center font14 mb-5 text-blue">
			@if( $lang == 'ar')
			<strong> حجز {{ $booking->status == 2 ? 'مؤكد' : 'غير مؤكد' }} </strong>
			@else
			<strong>{{ $booking->status == 2 ? 'Confirmed' : 'Unconfirmed' }} Booking </strong>
			@endif
		</p>

		<div class="border-primary pt-3 pb-3 font-weight-bold mb-5">
			<div class="col-4 {{ $lang == 'ar' ? 'float-right' : 'float-left' }} text-center">
				<div class="text-primary mb-3">{{ __('messages.invoice.invoice number') }}:</div>
				<div>#{{ $booking->booking_id }}</div>
			</div>
			<div class="col-4 {{ $lang == 'ar' ? 'float-right' : 'float-left' }} text-center">
				<div class="text-primary mb-3">{{ __('messages.invoice.invoice date') }}:</div>
				<div>{{ \Carbon\Carbon::parse($booking->created_at)->format('d/m/Y') }}</div>
			</div>
			<div class="col-4 {{ $lang == 'ar' ? 'float-right' : 'float-left' }} text-center">
				<div class="text-primary mb-3">{{ __('messages.invoice.total amount') }}:</div>
				<div>{{ number_format($booking->total, 2) }} USD</div>
			</div>
		</div>

		<p>{{ __('messages.invoice.thank you') }}</p>
	</div>
	
	<table class="table mb-5 {{ $lang == 'ar' ? 'rtl text-right' : '' }}">
		<thead>
			<tr class="bg-primary text-white font-weight-bold">
				<td class="text-center">#</td>
				<td class="text-center">{{ __('messages.invoice.reservation details') }}</td>
				<td class="text-center">USD</td>
				<td class="text-center">SAR</td>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			<tr>
				<td>{{$i++}}</td>
				<td>{{ $lang == 'ar' ? $course->titleAr : $course->titleEn }} ({{ $course->hoursPerWeek }} {{ __('messages.hour') }} {{ __('messages.per week') }}/ {{ $course->lessonsPerWeek }} {{ __('messages.lesson') }} {{ __('messages.per week') }})<br>
					{{ $start_date->format('d/m/Y') }} - {{ $end_date->format('d/m/Y') }} ({{ $booking->weeks }} {{ __('messages.weeks') }})
					@if($extra_weeks)
					+ ({{ $extra_weeks[2] }} {{ __('messages.weeks') }})
					@endif
				</td>
				<td>{{ number_format($courseFee*$booking->weeks, 2) }}</td>
				<td></td>
			</tr>

			@if($accommodationOption)
			<tr>
				<td>{{$i++}}</td>
				<td>{{ $lang == 'ar' ? $accommodationOption->accommodation->titleAr : $accommodationOption->accommodation->titleEn }} - {{ $lang == 'ar' ? $accommodationOption->roomType->titleAr : $accommodationOption->roomType->titleEn }} – {{ $lang == 'ar' ? $accommodationOption->mealType->titleAr : $accommodationOption->mealType->titleEn }} – {{ $lang == 'ar' ? $accommodationOption->facilitie->titleAr : $accommodationOption->facilitie->titleEn }} – {{ $lang == 'ar' ? $accommodationOption->supplementAr : $accommodationOption->supplement }} - {{ $accommodationOption->accommodationAge }} {{ __('messages.years') }} <br>
					{{ $start_date->format('d/m/Y') }} - {{ (clone $start_date)->addWeeks($booking->accommodation_weeks)->subDays(2)->format('d/m/Y') }} ({{ $booking->accommodation_weeks }} {{ __('messages.weeks') }})
				</td>
				<td>{{ number_format($booking->feeweeksoption->fee*$booking->accommodation_weeks, 2) }}</td>
				<td></td>
			</tr>
			@endif

			<tr>
				<td>{{$i++}}</td>
				<td>{{ __('messages.registration fee') }} </td>
				<td>{{ number_format($school->registrationFee, 2) }}</td>
				<td></td>
			</tr>

			@if($accommodationOption)
			<tr>
				<td>{{$i++}}</td>
				<td>{{ __('messages.accommodation booking fee') }} </td>
				<td>{{ number_format($accommodationOption->accommodation->bookingFee, 2) }}</td>
				<td></td>
			</tr>
			@endif

			@if($materialFee)
			<tr>
				<td>{{$i++}}</td>
				<td>{{ __('messages.material fee') }} </td>
				<td>{{ number_format($materialFee['materialFee'], 2) }}</td>
				<td></td>
			</tr>
			@endif

			@if($course->courierFees)
			<tr>
				<td>{{$i++}}</td>
				<td>{{ __('messages.courier fee') }} </td>
				<td>{{ number_format($course->courierFees, 2) }}</td>
				<td></td>
			</tr>
			@endif
			@if($booking->airportPickUp_id)
			<tr>
				<td>{{$i++}}</td>
				<td>{{ $lang == 'ar' ? $booking->airportPickUp->titleAr : $booking->airportPickUp->titleEn }}  ({{ $booking->airportPickUp_type == 2 ? __('messages.round ways') : __('messages.one way') }})</td>
				<td>{{  number_format($booking->airportPickUp_type == 2 ? $booking->airportPickUp->roundWay : $booking->airportPickUp->oneWay, 2) }}</td>
				<td></td>
			</tr>
			@endif

			@if($booking->insurance_id)
			<tr>
				<td>{{$i++}}</td>
				<td>{{ $lang == 'ar' ? $booking->insurance->titleAr : $booking->insurance->titleEn }}</td>
				<td>{{  number_format($booking->insurance->fee*$booking->weeks, 2) }}</td>
				<td></td>
			</tr>
			@endif


			@if($booking->visa_id)
			<tr>
				<td>{{$i++}}</td>
				<td>{{  $lang == 'ar' ? $booking->visa->titleAr : $booking->visa->titleEn }} </td>
				<td>{{ number_format($booking->visa->fee, 2) }}</td>
				<td></td>
			</tr>
			@endif



            @if($promotions && count($promotions))
            @foreach($promotions as $promotion)
            @if($promotion[0])
			<tr>
				<td>{{$i++}}</td>
				<td>{{ $promotion[1] }} </td>
				<td>{{ number_format($promotion[2], 2) }}</td>
				<td></td>
			</tr>
            @endif
            @endforeach
            @endif

            @if($extra_weeks)
            <tr>
				<td>{{$i++}}</td>
				<td>{{ $lang == 'ar' ? $extra_weeks[1] : $extra_weeks[0] }} </td>
				<td>{{ number_format(0, 2) }}</td>
				<td></td>
			</tr>
			@endif

		</tbody>

		<tfoot>
			<tr>
				<td colspan="2" class="{{ $lang == 'ar' ? 'text-left' : 'text-right' }} text-primary font-weight-bold">{{ __('messages.invoice.total amount') }}</td>
				<td class="text-center">USD {{ number_format($booking->total, 2) }}</td>
				<td></td>
			</tr>
		</tfoot>
	</table>

	<!-- Bank information -->
	<div class="mb-5 {{ $lang == 'ar' ? 'rtl text-right' : '' }}">
		<div class="col-6 {{ $lang == 'ar' ? 'float-right' : 'float-left' }} border-dark pt-3 pb-3 px-3">
			<div class="mb-3">
				<strong>{{ __('messages.invoice.bank information') }}:-</strong>
			</div>
			<div class="mb-3">
				<strong class="text-blue">{{ __('messages.invoice.bank name') }}:</strong>
				<span></span>
			</div>
			<div class="mb-3">
				<strong class="text-blue">{{ __('messages.invoice.account name') }}:</strong>
				<span></span>
			</div>
			<div class="mb-3">
				<strong class="text-blue">{{ __('messages.invoice.account number') }}:</strong>
				<span></span>
			</div>
			<div class="mb-3">
				<strong class="text-blue">{{ __('messages.invoice.iban') }}:</strong>
				<span></span>
			</div>
			<div class="mb-3">
				<strong class="text-blue">{{ __('messages.invoice.swift code') }}:</strong>
				<span></span>
			</div>
		</div>

		<div class="col-4 {{ $lang == 'ar' ? 'float-left' : 'float-right' }} pt-3 pb-3 px-3 text-center">
			<img src="{{ url('/site/best.png') }}" style="height: 170px; padding: 5rem;box-sizing: border-box;">
		</div>
	</div>

	<div class="page-break"></div>

	<div class="{{ $lang == 'ar' ? 'rtl text-right' : '' }}" style="padding-top: 2.5rem">
		<label class="pt-3 "><strong class="underline">{{ __('messages.invoice.terms & conditions') }}</strong><strong>:-</strong></label>
		<ol class="" style="line-height: 1.75">
			@if( $lang == 'ar')
			<li>هذا العرض صالح لمدة <span class="text-primary"> أسبوع واحد</span> فقط من تاريخ إصدار الفاتورة.</li>
			@if($booking->status != 2 )
			<li>هذا الحجز لا يعني أن الحجز مؤكد. ومع ذلك، إذا اكتملت عملية الحجز، فسيتم تأكيد الطلب بفاتورة رسمية نهائية يوافق عليها الطرفان.</li>
			<li>قيمة الخصم في الفاتورة قابلة للتغيير ما لم يكمل الطالب الحجز وحصوله على فاتورة مؤكدة من قبل الموقع او المعهد.</li>
			<li>الخصومات مستحقة إذا تم الحجز في وقت الخصومات، ولا يمكن المطالبة بالخصومات التي انتهت صلاحيتها بينما لم يكن لدى الطالب حجز مؤكد.</li>
			@endif
			<li>يستطيع الطالب أن يطلب من الموقع تعديل أو إضافة خدمات على الفاتورة.</li>
			<li>سيتم تعديل السعر (بالريال السعودي) وفقًا لسعر الصرف عند حجز دورتك.</li>
			<li>الأسعار مطابقة 100٪ لأسعار المعاهد أو اقل. في بعض الحالات، وبعد التأكيد النهائي، قد تظهر بعض الاختلافات الطفيفة في الأسعار بسبب بعض التغييرات في سعر صرف العملة أو تكاليف الإقامة أو التأمين الصحي في أيام العطلات أو خلال مواسم الذروة.</li>
			<li>تتراوح المسافة عند الإقامة مع عائلة ما بين المنزل والمعهد بالمواصلات العامة مدة زمنية تقدر ما بين 15 – 35 دقيقة أو أكثر حسب المتوفر من قبل المعهد.</li>
			<li>الإقامة مع عائلة متاحة للطلاب الذين تزيد أعمارهم عن 15 عامًا وتتكون من وجبتين إلزامية لمن هم دون سن 18 عامًا.</li>
			<li>الإقامة في سكن الطلاب أو الشقق أو الفنادق متاحة فقط للطلاب الذين تزيد أعمارهم عن 18 عامًا.</li>
			<li>يتم توفير السكن من قبل المعهد ويتم حجزه حسب التوافر.</li>
			<li>يجوز للطالب أن يطلب أن يقيم مع أسرة بخصائص محددة مثل عدد أفراد الأسرة أو عدد الغرف، ولا يحق له طلب على أساس العرق أو الجنس أو اللون.</li>
			<li>الموقع غير مسؤول عن قرار القبول أو عدمه أو فترة معالجة الطلب من قبل المعهد وقد تستغرق بعض الطلبات أكثر من الفترة المتوقعة لأسباب من جانب المعهد أو من أي طرف ثالث.</li>
			@if($booking->status == 2)
			<li>يتم دفع الرسوم مقدمًا وتخضع لسياسة استرداد ادناه.</li>
			@endif

			@else
			<li>This Quotation is only valid for <span class="text-primary">one week</span> from the issue date.</li>
			@if($booking->status != 2 )
			<li>This Quotation does not mean that the booking is confirmed. However, if the reservation process is completed, the application will be confirmed with a final official invoice that is approved by both parties.</li>
			<li>The discount value in the quotation is subject to change unless the student completes the reservation, and the official invoice is released by the institution.</li>
			<li>Discounts are due if the reservation is made at the time of discounts, and discounts that have expired cannot be claimed while the student did not have a confirmed reservation.</li>
			@endif
			<li>The student able to request from the representative to modify or add to the quotation.</li>
			<li>The price in (SAR) will be adjusted according to the exchange rate when you booked your course.</li>
			<li>Prices are 100% identical to the school prices. In some cases, and after the final confirmation, there might arise some minor differences in the prices due to some changes in currency rate or costs of accommodation or health insurance on holidays or during a peak season.</li>
			<li>Staying with the hosting family, the distance between the house and the institute by public transportation is estimated between 15-35 minutes or more, depending on what is available from the institute.</li>
			<li>Staying with the hosting family is available for students over 15 years old and it consists of two compulsory meals for those under 18 years old.</li>
			<li>Student accommodation and Apartments are only available to students over the age of 18.</li>
			<li>Accommodation is provided by the institute and is reserved according to availability.</li>
			<li>The student may request the provision of a family with specific characteristics such as the number of family members or the number of rooms, and he is not entitled to a request based on race, gender, or color.</li>
			<li>The fee is to be paid in advance and subject to the school refund policy.</li>
			@if($booking->status == 2)
			<li>The website is not responsible for the decision of acceptance or lack thereof or the period of processing the application by the institute and some applications may take longer than the default period for reasons on the part of the institute or any third party.</li>
			@endif
			@endif
		</ol>
	</div>

	<div class="{{ $lang == 'ar' ? 'rtl text-right' : '' }}" style="padding-top: 2.5rem">
		<label class=""><strong class="underline">{{ __('messages.invoice.cancellation policy') }}</strong><strong>:-</strong></label>
		<ol class="" style="line-height: 1.75">
			@if( $lang == 'ar')
			<li>الرسوم المدفوعة للمعهد تخضع لسياسة استرداد المعهد.</li>
			@if($booking->status == 2)
			<li>في حالة إلغاء الطلب قبل الحصول على القبول من المعهد، يتم استرجاع جميع الرسوم المدفوعة للموقع وبعد خصم مبلغ 250 ريال سعودي أو ما يعادله.</li>
			<li>إذا تم إلغاء الطلب بعد الحصول على القبول، يحق للموقع خصم رسوم إدارية قدرها 500 ريال سعودي (أو ما يعادله) وتخضع الرسوم الدراسية المدفوعة لسياسة الاسترداد الخاصة بالمعهد.</li>
			<li>في حالة رفض المعهد للطلب يتم استرداد جميع الرسوم.</li>
			<li>في حالة إصدار شهادة التأمين لا يتم استرداد رسوم التأمين المدفوعة.</li>
			<li>إذ لم يلتزم الطالب بموعد الاستقبال/العودة من المطار، فإن رسوم الاستقبال/العودة من المطار  غير قابلة للاسترداد.</li>
			@endif

			@else
			<li>Fees paid to the Institute are subject to the Institute's refund policy.</li>
			@if($booking->status == 2)
			<li>If the application is canceled before obtaining admission from the institute, all fees paid to the website will be refunded and after deducting the amount of 250 Saudi Riyals or its equivalent.</li>
			<li>If the application is canceled after obtaining an acceptance, the website is entitled to an administrative fee of 500 Saudi Riyals (or its equivalent) and tuition fees are subject to the institute's refund policy.</li>
			<li>In the event that the institute rejected the application, all fees will be refunded.</li>
			<li>If the insurance certificate is issued, the fees paid for insurance are not refundable.</li>
			<li>If the student does not comply with the airport pick-up time, then airport pick up fees are not refundable.</li>
			@endif
			@endif
		</ol>
	</div>

	<div class="mb-5 mt-5 text-center {{ $lang == 'ar' ? 'rtl' : '' }}">
		<p class="font-weight-bold ">{{ __('messages.invoice.please send the payment receipt to the following email') }}:</p>
		<a target="_blank" class="text-blue font-weight-bold" href="mailto:booking@pickupcourse.com">Booking@pickupcourse.com</a>
		<p class="font-weight-bold ">{{ __('messages.invoice.this invoice was issued by pickupcourse') }}</p>
		<p>{{ __('messages.invoice.visit us at')}} <a target="_blank" class="text-primary" href="www.pickupourse.com">www.pickupcourse.com</a></p>
	</div>

</body>
</html>
