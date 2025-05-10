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

<style>
    .service-card {
        display: flex;
        flex-direction: column;
        height: 100%;
        background: #fdfcf8;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        overflow: hidden;
    }

    .service-card__inner {
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .service-card__icon img {
        object-fit: contain;
    }

    /* Tiêu đề cố định 2 dòng */
    .service-card__content__title {
        line-height: 1.3em;
        height: 2.6em;
        overflow: hidden;
    }

    /* Mô tả cố định 3 dòng */
    .service-card__content__text {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Khung ảnh cố định cao */
    .service-card__thumb__item {
        height: 140px;
        overflow: hidden;
        border-radius: 8px;
    }
    .service-card__thumb__item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

</style>
@section('content')
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(/site/images/backgrounds/page-header-bg-1-1.jpg);"></div>
        <div class="container">
            <h2 class="page-header__title">Dịch vụ</h2>
            <ul class="firdip-breadcrumb list-unstyled">
                <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>

                @if(@$category)
                    @if(@$category->parent)
                        <li><span>{{ @$category->parent->name ?? '' }}</span></li>
                    @endif
                    <li><span>{{ $category->name }}</span></li>
                @else
                    <li><span>Dịch vụ</span></li>
                @endif

            </ul>
        </div>
    </section>

    <section class="service-page">
        <div class="container">
            <div class="row gutter-y-30">
                @foreach($services as $service)
{{--                    <div class="col-md-6 col-lg-4">--}}
{{--                        <div class="service-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='100ms'>--}}
{{--                            <div class="service-card__inner">--}}
{{--                                <div class="service-card__icon">--}}
{{--                                    <img style="height: auto" decoding="async"--}}
{{--                                         src="{{ @$service->image_label->path ?? '' }}" alt="icon" width="80" height="80">--}}
{{--                                </div>--}}
{{--                                <div class="service-card__content">--}}
{{--                                    <h4 class="service-card__content__title"><a href="{{ route('front.getServiceDetail', $service->slug) }}">{{ $service->name }}</a></h4>--}}
{{--                                    <p class="service-card__content__text"> {{ $service->description }} </p>--}}
{{--                                </div>--}}
{{--                                <div class="service-card__thumb">--}}
{{--                                    <div class="service-card__thumb__item">--}}
{{--                                        <img src="{{ @$service->image->path ?? '' }}" alt="{{ $service->name }}">--}}
{{--                                    </div>--}}
{{--                                    <a href="{{ route('front.getServiceDetail', $service->slug) }}" class="voldor-btn voldor-btn--base"><i class="icon-right-arrow-angle"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="col-md-6 col-lg-4">
                        <div class="service-card h-100 wow fadeInUp d-flex flex-column"
                             data-wow-duration="1500ms" data-wow-delay="100ms">

                            <div class="service-card__inner d-flex flex-column flex-grow-1 p-4">
                                {{-- Icon --}}
                                <div class="service-card__icon mb-3 text-center">
                                    <img src="{{ @$service->image_label->path ?? '' }}"
                                         alt="icon" width="80" height="80">
                                </div>

                                {{-- Nội dung chính --}}
                                <div class="service-card__content flex-grow-1">
                                    <h4 class="service-card__content__title mb-2">
                                        <a href="{{ route('front.getServiceDetail', $service->slug) }}"
                                           title="{{ $service->name }}">
                                            {{ Str::limit($service->name, 60, '...') }}
                                        </a>
                                    </h4>
                                    <p class="service-card__content__text">
                                        {{ Str::limit(strip_tags($service->description), 120, '...') }}
                                    </p>
                                </div>

                                {{-- Ảnh minh họa + nút --}}
                                <div class="service-card__thumb mt-3">
                                    <div class="service-card__thumb__item">
                                        <img src="{{ @$service->image->path ?? '' }}"
                                             alt="{{ $service->name }}">
                                    </div>
                                    <a href="{{ route('front.getServiceDetail', $service->slug) }}"
                                       class="voldor-btn voldor-btn--base mt-2">
                                        <i class="icon-right-arrow-angle"></i>
                                    </a>
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
