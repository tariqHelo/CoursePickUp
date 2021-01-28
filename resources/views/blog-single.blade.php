@extends('layouts.layouts')
@section('content')

<!-- start Main Wrapper -->
<div class="main-wrapper scrollspy-container">

    <section class="page-wrapper page-detail">

        <div class="page-title border-bottom pt-25 mb-0 border-bottom-0">
            <div class="container">
                <div class="row gap-15 align-items-center">
                    <div class="col-12 col-md-7">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item px-2" aria-current="page"><a href="{{ url($lang . '/articles') }}">{{ __('messages.articles') }}</a></li>
                                <li class="breadcrumb-item active px-2" aria-current="page">{{ __('messages.article details') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pt-30">
            <div class="row gap-20 gap-lg-40">
                <div class="col-12 col-lg-12">
                    <div class="content-wrapper">
                        <article class="blog-single-wrapper full-width">
                            <div class="row justify-content-center ">
                                <div class="col-12 col-lg-10 col-xl-9">
                                    <div class="blog-single-heading text-center">
                                        <h1 class="hrsize">{{ $lang =="ar" ? $article->titleAr : $article->titleEn }}</h1>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="image">
                                <img src="{{asset('Articles/'.$article->image)}}" alt="images"/>
                            </div> -->

                            <div class="row justify-content-center ">

                                <div class="col-12 col-lg-10 col-xl-9">

                                    <div class="blog-entry">
                                        {!! $lang == 'ar' ? $article->contentAr : $article->contentEn !!}

                                        <div class="row gap-30 mt-40">
                                            <div class="col-12 col-sm-6 text-sm-right">
                                                <div class="col-inner {{  $lang == 'ar' ? 'text-right' : 'text-left'}}">
                                                    <h6>{{ __('messages.share') }} :</h6>
                                                    <div class="box-socials clearfix">
                                                        <a target="_blank" href="#" class="text-muted" id="copyBtn"><i class="fas fa-copy"></i></a>
                                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urldecode(URL::current()) }}" class="text-muted"><i class="fab fa-facebook-square"></i></a>
                                                        <a target="_blank" href="https://twitter.com/intent/tweet?text={{ urldecode(URL::current()) }}" class="text-muted"><i class="fab fa-twitter-square"></i></a>
                                                        <a target="_blank" href="https://wa.me/?text={{ urldecode(URL::current()) }}" class="text-muted"><i class="fab fa-whatsapp-square"></i></a>
                                                        <input type="text" style="display: none" id="ulrvalue" value="{{ urldecode(URL::current()) }}">
                                                    </div>
                                                    <span id="copiedText" class="text-primary font-bold small"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                        </div>
                                    </div>

                                    <hr class="mt-40"/>
                                    <div class="blog-pager-wrapper">
                                        <div class="row gap-30 gap-lg-60 mb-30 align-items-center">
                                            @if($prev = $article->prev())
                                            <div class="col-6">
                                                <h5 class="blog-pager-prev">
                                                    <a href="{{ url($lang . '/articles/' . ($lang == 'ar' ? $prev->slugAr : $prev->slugEn)) }}">
                                                        <span class="text-muted labeling font12 font400 letter-spacing-2 pre">
                                                            <i class=" {{ $lang == 'ar' ? 'ri-arrow-right' : 'ri-arrow-left' }} font14 mr-10"></i>
                                                                {{ __('messages.pagination.previous post') }}
                                                         </span>
                                                        <div class="image">
                                                            <img src="{{ asset('Articles/' . $prev->image ) }}" class="img-circle w-100 h-100" alt="blog">
                                                        </div>
                                                        <span class="snone">
                                                            @if ( $lang == 'ar' )
                                                                {{ $prev->titleAr }}
                                                            @else
                                                                {{ $prev->titleEn }}
                                                            @endif
                                                        </span>
                                                    </a>
                                                </h5>
                                            </div>
                                            @else
                                            <div class="col-6"></div>
                                            @endif

                                            @if($next = $article->next())
                                            <div class="col-6">
                                                <h5 class="blog-pager-next">
                                                    <a href="{{ url($lang . '/articles/' . ($lang == 'ar' ? $next->slugAr : $next->slugEn)) }}">
                                                        <span class="text-muted labeling font12 font400 letter-spacing-2">
                                                            {{ __('messages.pagination.next post') }} 
                                                            <i class=" {{ $lang == 'ar' ? 'ri-arrow-left' : 'ri-arrow-right' }} font14 ml-10"></i>
                                                        </span>
                                                        <div class="image">
                                                            <img src="{{ asset('Articles/' . $next->image ) }}" class="img-circle w-100 h-100" alt="blog">
                                                        </div>
                                                        <span class="snone">
                                                            @if ( $lang == 'ar' )
                                                                {{ $next->titleAr }}
                                                            @else
                                                                {{ $next->titleEn }}
                                                            @endif
                                                        </span>
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-6"></div>
                                        @endif
                                    </div>


                                    <!-- End Content -->
                                    <div class="mb-50"></div>

                                    <h4 class="heading-title"><span>{{__('messages.get free consultation')}} </span></h4>
                                    <div class="container">
                                        <div class="col-12">
                                            <form action="{{route('sendLeads')}}"
                                                  method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf

                                                <div class="contact-successful-messages"></div>
                                                <div class="contact-inner row">
                                                    <div class="form-group col-sm-6 inner-addon {{ $lang == 'ar' ? 'right-addon' : 'left-addon' }}">
                                                        <i class="fa fa-user text-danger"></i>

                                                        <input type="text" name="fName" class="form-control icon" required="required"
                                                               placeholder="{{__('messages.full name')}}"
                                                               data-error="Your name is required.">
                                                        <div class="help-block with-errors text-danger">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-sm-6 inner-addon {{ $lang == 'ar' ? 'right-addon' : 'left-addon' }}">
                                                        <i class="fa fa-envelope text-danger"></i>
                                                        <input type="email" name="email" class="form-control icon " required="required"
                                                               placeholder="{{__('messages.email address')}}"
                                                               data-error="Valid email is required.">
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>

                                                    <div class="form-group col-sm-6 inner-addon {{ $lang == 'ar' ? 'right-addon' : 'left-addon' }}">
                                                        <i class="fa fa-phone text-danger" aria-hidden="true"></i>
                                                        <input type="text" name="phone" class="form-control icon " required="required"
                                                               placeholder="{{__('messages.mobile number')}}" >
                                                    </div>

                                                    <div class="form-group col-sm-6 inner-addon {{ $lang == 'ar' ? 'right-addon' : 'left-addon' }}">
                                                        <i class="fa fa-map text-danger" aria-hidden="true"></i>
                                                        <select name="nationality" class="form-control icon  paddingIcon" required="required">
                                                            <option disabled selected value="">{{__('messages.nationality')}}</option>
                                                            @foreach($nationalities as $nationality)
                                                                @if( $lang =="ar")
                                                                    <option value="{{$nationality->id}}">{{$nationality->titleAr}}</option>
                                                                @else
                                                                    <option value="{{$nationality->id}}">{{$nationality->titleEn}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>

                                                    <div class="form-group col-sm-6 inner-addon {{ $lang == 'ar' ? 'right-addon' : 'left-addon' }}">
                                                        <i class="fa fa-map-marker text-danger"></i>
                                                        <select name="placeOfResidence" class="form-control icon  paddingIcon" required="required">
                                                            <option disabled selected value="">{{__('messages.place of residence')}}</option>
                                                            @foreach($residences as $residence)
                                                                @if( $lang =="ar")
                                                                    <option value="{{$residence->id}}">{{$residence->titleAr}}</option>
                                                                @else
                                                                    <option value="{{$residence->id}}">{{$residence->titleEn}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>

                                                    <div class="form-group col-sm-6 inner-addon {{ $lang == 'ar' ? 'right-addon' : 'left-addon' }}">
                                                        <i class="fa fa-plane-departure text-danger"
                                                           aria-hidden="true"></i>
                                                        <select name="destination" class="form-control icon  paddingIcon">
                                                            <option disabled selected value="">{{__('messages.destination')}}</option>
                                                            @foreach($destinations as $destination)
                                                                @if( $lang =="ar")
                                                                    <option value="{{$destination->id}}">{{$destination->titleAr}}</option>
                                                                @else
                                                                    <option value="{{$destination->id}}">{{$destination->titleEn}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <textarea name="notes" class="form-control"
                                                                  placeholder="{{__('messages.any notes')}}"
                                                                  rows="7s"></textarea>
                                                    </div>

                                                    <input type="submit" class="btn btn-primary btn-send btn-wide mt-15 m-auto" value="{{__('messages.send message')}}">
                                                </div>

                                            </form>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </article>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>
<!-- end Main Wrapper -->






@endsection


@section('script')
<script type="text/javascript">
var temp = $("<input>");
var url = decodeURI($(location).attr('href'));

window.history.replaceState({state:'new'}, null, url);

$('#copyBtn').click(function (e) {
    e.preventDefault();
    $("body").append(temp);
    temp.val(url).select();
    document.execCommand("copy");
    temp.remove();
    $('#copiedText').text("{{ __('messages.link copied!') }}");
})
</script>
@endsection