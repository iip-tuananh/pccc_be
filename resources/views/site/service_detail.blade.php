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
            <h2 class="page-header__title">{{ $service->name }}</h2>
            <ul class="firdip-breadcrumb list-unstyled">
                <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                <li><span>{{ $service->name }}</span></li>
            </ul>
        </div>
    </section>

    <section class="service-details">
        <div class="container">
            <div class="row gutter-y-30">
                <div class="col-md-12 col-lg-4">
                    <div class="service-sidebar">

                        <div class="service-sidebar__single  wow fadeInUp" data-wow-delay='500ms'>
                            <h3 class="service-sidebar__title">DỊCH VỤ</h3>
                            <ul class="list-unstyled service-sidebar__nav">
                                @foreach($services as $item)
                                    <li><a href="{{ route('front.getServiceDetail', $item->slug) }}">{{ $item->name }}<i class="icon-arrow-left"></i></a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="service-details__content">
                        <div class="service-details__single">
                            <div class="service-details__thumbnail wow fadeInUp" data-wow-delay='300ms'>
                                <img src="{{ @$service->image->path ?? '' }}" alt="Fire Fighting">
                            </div>

                            <h3 class="service-details__title wow fadeInUp" data-wow-delay='300ms'>{{ $service->name }}</h3>

                        </div>

                        <div class="service-details__single">
                            <div class="service-details__single-inner">
                                {!! $service->content !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection

@push('scripts')
    <script>
    </script>
@endpush
