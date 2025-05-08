@extends('site.layouts.master')
@section('title')
    {{ $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
@endsection

@section('css')

@endsection

@section('content')
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(/site/images/backgrounds/page-header-bg-1-1.jpg);"></div>
        <div class="container">
            <h2 class="page-header__title">Dự án</h2>
            <ul class="firdip-breadcrumb list-unstyled">
                <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                <li><span>Dự án</span></li>
            </ul>
        </div>
    </section>

    <section class="service-page">
        <div class="container">
            <div class="row gutter-y-30">
                @foreach($projects as $project)
                    <div class="col-md-6 col-lg-4">
                        <div class="service-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='100ms'>
                            <div class="service-card__inner" style="padding: 40px;">
                                <div class="service-card__content">
                                    <h4 class="service-card__content__title"><a href="{{ route('front.getProjectDetail', $project->slug) }}">{{ $project->name }}</a></h4>
                                    <p class="service-card__content__text"> {{ $project->description }} </p>
                                </div>
                                <div class="service-card__thumb">
                                    <div class="service-card__thumb__item">
                                        <img src="{{ @$project->image->path ?? '' }}" alt="{{ $project->name }}">
                                    </div>
                                    <a href="{{ route('front.getProjectDetail', $project->slug) }}" class="voldor-btn voldor-btn--base"><i class="icon-right-arrow-angle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>



@endsection

@push('scripts')
    <script>
    </script>
@endpush
