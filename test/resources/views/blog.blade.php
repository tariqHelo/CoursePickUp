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
                                    <li class="breadcrumb-item active px-2" aria-current="page">{{ __('messages.articles') }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container pt-30">
                <div class="row gap-20 gap-lg-40">
                    <div class="col-12 col-lg-12">
                        <div class="section-title border-bottom w-100">
                            <div class="d-flex flex-column flex-sm-row align-items-lg-end">
                                <div>
                                    @if(get_default_lang() == 'ar')
                                        <h2><span><span>المقالات</span> الدراسية</span></h2>
                                    @else
                                        <h2><span><span>Study</span> Articles</span></h2>
                                    @endif
                                </div>
                            </div>

                            <div class="row equal-height cols-1 cols-sm-2 cols-lg-3 gap-20 mt-50">
                                @foreach($articles as $article)
                                    <div class="col">
                                        <article class="post-grid-01">
                                            <div class="image">
                                                <a href="{{ url(get_default_lang() . '/articles/' . (get_default_lang() == 'ar' ? $article->slugAr : $article->slugEn)) }}"><img
                                                        src="{{asset('Articles/'.$article->image)}}"
                                                        alt="images" style="width: 370px;"/></a>
                                            </div>
                                            <div class="content">
                                                <span class="post-date text-muted" style="letter-spacing: 1px">
                                                    @php $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->date) @endphp
                                                    {{ __('months.' . $date->format("M")) .  ' ' . $date->format('d') . ', ' . $date->format('Y') }}
                                                </span>
                                                <h4><a href="{{ url(get_default_lang() . '/articles/' . (get_default_lang() == 'ar' ? $article->slugAr : $article->slugEn)) }}">

                                                        @if( get_default_lang()=="ar")
                                                            {{$article->titleAr}}
                                                        @else
                                                            {{$article->titleEn}}
                                                        @endif
                                                    </a>
                                                </h4>
                                                <a href="{{ url(get_default_lang() . '/articles/' . (get_default_lang() == 'ar' ? $article->slugAr : $article->slugEn)) }}"
                                                   class="h6">{{__("messages.read more")}} <i
                                                        @if(get_default_lang()=="ar")
                                                        class="elegent-icon-arrow_left"
                                                        @else
                                                        class="elegent-icon-arrow_right"
                                                        @endif
                                                    ></i></a>
                                            </div>

                                        </article>

                                    </div>
                                @endforeach
                            </div>

                            <nav class="pager-wrappper mt-50">
                                <ul class="pagination justify-content-center mb-0 pb-0">
                                    <li>
                                        {{ $articles->links() }}
                                    </li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- end Main Wrapper -->
@endsection
