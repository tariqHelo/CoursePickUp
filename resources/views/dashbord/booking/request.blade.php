@extends('dashbord.layouts')
@section('title')
<title>Lead Details </title>
@endsection
@section('content')

<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <!-- users view start -->
        <section class="users-view">
            <!-- users view media object start -->
            <div class="row">
                <div class="col-12 col-sm-7">
                    <div class="media mb-2">

                        <div class="media-body pt-25">
                            <h4 class="media-heading"><span class="users-view-name">{{$booking->first_name}} {{$booking->last_name}} </span></h4>
                            <span>ID:</span>
                            <span class="users-view-id">{{$booking->id}}</span>
                        </div>
                    </div>
                </div>

            </div>
            <!-- users view media object ends -->
            <!-- users view card data start -->

            <!-- users view card data ends -->
            <!-- users view card details start -->
            <div class="card">
                <div class="card-content">
                    <div class="card-body">

                        <div class="col-12">
                            <table class="table table-borderless">

                                <tbody>
                                    <tr>
                                        <td>First Name:</td>
                                        <td class="users-view-username">{{$booking->first_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Last Name:</td>
                                        <td class="users-view-name">{{$booking->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail:</td>
                                        <td class="users-view-email">{{$booking->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td>{{$booking->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nationality:</td>
                                        <td>{{ $booking->nationality ? $booking->nationality->titleEn : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Place of Residence:</td>
                                        <td>{{ $booking->residence ? $booking->residence->titleEn : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Notes:</td>
                                        <td>{{$booking->notes}}</td>
                                    </tr>
                                    <tr>
                                        <td>Invoice Link:</td>
                                        <td>
                                            <a target="_blank" href="{{url('/invoices/'.$booking->invoice)}}">Invoice</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Date & Time:</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking->created_at)->format('Y-m-d h:i a') }} UTC</td>
                                    </tr>
                                    <tr>
                                        <td>Device Type:</td>
                                        <td>
                                            @php
                                            if($booking->device == 1){
                                                echo 'Desktop';
                                            }else if($booking->device == 2){
                                                echo 'Mobile';
                                            }else if($booking->device == 3){
                                                echo 'Tablet';
                                            }else{
                                                echo 'Unknown';
                                            }
                                            @endphp
                                        </td>
                                    </tr>
                                </tbody>


                                <!-- <tbody>
                                    <tr>
                                        <td>Booking ID:</td>
                                        <td class="users-view-username">{{$booking->booking_id}}</td>
                                    </tr>

                                    <tr>
                                        <td>First Name:</td>
                                        <td class="users-view-username">{{$booking->first_name}}</td>
                                    </tr>

                                    <tr>
                                        <td>Last Name:</td>
                                        <td class="users-view-username">{{$booking->last_name}}</td>
                                    </tr>

                                    <tr>
                                        <td>E-mail:</td>
                                        <td class="users-view-email">{{$booking->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td>{{$booking->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nationality:</td>
                                        <td>{{ $booking->nationality ? $booking->nationality->titleEn : '' }}</td>
                                    </tr>

                                    <tr>
                                        <td>Place of Residence:</td>
                                        <td>{{ $booking->residence ? $booking->residence->titleEn : '' }}</td>
                                    </tr>

                                    <tr>
                                        <td>Notes:</td>
                                        <td>{{$booking->notes}}</td>
                                    </tr>

                                    <tr>
                                        <td>Date:</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking->created_at)->format('Y-m-d') }}</td>
                                    </tr>
                                </tbody> -->
                            </table>

                        </div>
                    </div>
                </div>
            </div>


            <!-- <div class="card">
                <div class="card-content">
                    <div class="card-body">

                        <div class="col-12">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Start Date:</td>
                                        <td class="users-view-username">
                                            {{ $start_date->format('d M, Y') }} - 
                                            {{ $end_date->format('d M, Y') }} 
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Study Weeks:</td>
                                        <td class="users-view-username">{{ $booking->weeks }} Weeks</td>
                                    </tr>



                                    <tr>
                                        <td>Course Fee</td>
                                        <td>
                                            $<span class="courseFee">{{$courseFee*$booking->weeks}}</span>
                                        </td>
                                    <tr>
                                        <td>Registration Fee</td>
                                        <td>
                                            $<span class="registrationFee">{{$school->registrationFee}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Material Fee</td>
                                        <td>
                                            $<span class="materialFee">{{ $materialFee }}</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>courier</td>
                                        <td>
                                            $<span class="courierFees">{{ $course->courierFees }}</span>
                                        </td>
                                    </tr>

                                    @if(count($promotions))
                                    @foreach($promotions as $promotion)
                                    @if($promotion[0] == 'course' || $promotion[0] == 'school')
                                    <tr>{{ $promotion[1] }}<span class="{{ get_default_lang() == 'ar' ? 'float-left' : 'float-right' }}">
                                        <span class="materialFee text-primary">{{ $promotion[2] }}</span>
                                        </span>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif


                                    @if($accommodationOption)
                                    <tr>
                                        <td class="mt-1">
                                            <span> {{ $accommodationOption->accommodation->titleEn }} </span>
                                        </td>
                                        <td>
                                            <span> {{ get_default_lang() == 'ar' ? $accommodationOption->accommodation->accommodationType->titleAr :$accommodationOption->accommodation->accommodationType->titleEn }} </span>
                                            <span> - </span>
                                            <span> {{  get_default_lang() == 'ar' ? $accommodationOption->roomType->titleAr :$accommodationOption->roomType->titleEn }} </span>
                                            <span> - </span>
                                            <span> {{ get_default_lang() == 'ar' ? $accommodationOption->mealType->titleAr :$accommodationOption->mealType->titleEn }} </span>
                                            <span> - </span>
                                            <span> {{ get_default_lang() == 'ar' ? $accommodationOption->facilitie->titleAr :$accommodationOption->facilitie->titleEn }} </span>
                                            <br>
                                            <span>{{ (clone $start_date)->format('d M, Y') }}</span>
                                            <span> - </span>
                                            <span>{{ (clone $start_date)->addWeeks($booking->accommodationWeeks)->subDays(2)->format('d M, Y') }}</span><br>
                                            <span>$<span >{{ $accommodationFee->fee*$booking->accommodation_weeks }}</span></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="accommodationName">Accommodation Booking Fee </td>
                                        <td>$<span class="accommodationBookingFee">{{ $accommodationBookingFee }}</span></td>
                                    </tr>

                                    @if(count($promotions))
                                    @foreach($promotions as $promotion)
                                    @if($promotion[0] == 'accommodation')
                                    <tr>
                                        <td>
                                            <span>
                                                {{ $promotion[1] }}
                                            </span>
                                        </td>
                                        <td>
                                            <span>{{ $promotion[2] }}</span>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif

                                    @endif


                                    @if($booking->airportPickUp_id)
                                    <tr>
                                        <td > {{ $booking->airportPickUp->titleEn }}</td>
                                        <td >
                                            $<span class="airportPickUp">{{ $booking->airportPickUp_type == 2 ? $booking->airportPickUp->roundWay : $booking->airportPickUp->oneWay }}</span>
                                        </td>
                                    </tr>
                                    @endif

                                    @if($booking->insurance_id || $booking->visa_id)
                                    @if($booking->insurance_id)
                                    <tr>
                                        <td class="insuranceTitle"> {{ $booking->insurance->titleEn }}</td>
                                        <td >
                                            $<span class="insurance">{{ $booking->insurance->fee*$booking->weeks }}</span>
                                        </td>
                                    </tr>
                                    @endif
                                    @if($booking->visa_id)
                                    <tr>
                                        <td>{{ $booking->visa->titleEn }}</td>
                                        <td>
                                            $<span class="visa">{{ $booking->visa->fee }}</span>
                                        </td>
                                    </tr>
                                    @endif
                                    @endif

                                    <tr>
                                        <td>Total</tdzzzz><td>${{ $booking->total }}</td>
                                    </tr>


                                </tbody>
                            </table>

                        </div>


                        <div class="col-12 px-3">
                            <a class="btn btn-outline-success round" download href="{{ asset('invoices/' . $booking->invoice) }}">Download Invoice</a>
                        </div>

                    </div>
                </div>
            </div> -->

            <!-- users view card details ends -->

        </section>
        <!-- users view ends -->
    </div>
</div>

@endsection
