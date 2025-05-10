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
    /* Khung ngoài flex-column full height */
    .service-card {
        display: flex;
        flex-direction: column;
        height: 100%;
        background-color: #fdfcf8;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        overflow: hidden;
    }

    /* Inner wrapper flex-column, padding mặc định */
    .service-card__inner {
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    /* Nội dung kéo giãn, đảm bảo thumb luôn đáy */
    .service-card__content {
        flex: 1;
    }

    /* Tiêu đề cố định 2 dòng */
    .service-card__content__title {
        line-height: 1.3em;
        height: 2.6em;      /* 2 dòng */
        overflow: hidden;
        margin-bottom: 0.75rem;
    }
    .service-card__content__title a {
        color: inherit;
        text-decoration: none;
    }

    /* Miêu tả khóa 3 dòng */
    .service-card__content__text {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Khung ảnh cố định cao 140px */
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

    /* Nút luôn dưới ảnh */
    .service-card__thumb {
        display: flex;
        flex-direction: column;
        align-items: start;
    }

    /* Khoảng cách nút */
    .service-card__thumb .voldor-btn {
        width: auto;
    }

</style>
@section('content')
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(/site/images/backgrounds/page-header-bg-1-1.jpg);"></div>
        <div class="container">
            <h2 class="page-header__title">Dự án</h2>
            <ul class="firdip-breadcrumb list-unstyled">
                <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                <li><span>{{ $category ? $category->name : 'Dự án' }}</span></li>
            </ul>
        </div>
    </section>

    <section class="service-page">
        <div class="container">
            <div class="row gutter-y-30">
                @foreach($projects as $project)
{{--                    <div class="col-md-6 col-lg-4">--}}
{{--                        <div class="service-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='100ms'>--}}
{{--                            <div class="service-card__inner" style="padding: 40px;">--}}
{{--                                <div class="service-card__content">--}}
{{--                                    <h4 class="service-card__content__title"><a href="{{ route('front.getProjectDetail', $project->slug) }}">{{ $project->name }}</a></h4>--}}
{{--                                    <p class="service-card__content__text"> {{ $project->description }} </p>--}}
{{--                                </div>--}}
{{--                                <div class="service-card__thumb">--}}
{{--                                    <div class="service-card__thumb__item">--}}
{{--                                        <img src="{{ @$project->image->path ?? '' }}" alt="{{ $project->name }}">--}}
{{--                                    </div>--}}
{{--                                    <a href="{{ route('front.getProjectDetail', $project->slug) }}" class="voldor-btn voldor-btn--base"><i class="icon-right-arrow-angle"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


                    <div class="col-md-6 col-lg-4">
                        <div class="service-card wow fadeInUp h-100 d-flex flex-column" data-wow-duration="1500ms" data-wow-delay="100ms">
                            <div class="service-card__inner d-flex flex-column flex-grow-1 p-4">

                                {{-- Nội dung --}}
                                <div class="service-card__content flex-grow-1">
                                    <h4 class="service-card__content__title">
                                        <a href="{{ route('front.getProjectDetail', $project->slug) }}"
                                           title="{{ $project->name }}">
                                            {{ \Illuminate\Support\Str::limit($project->name, 60, '...') }}
                                        </a>
                                    </h4>
                                    <p class="service-card__content__text">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($project->description), 120, '...') }}
                                    </p>
                                </div>

                                {{-- Ảnh + nút --}}
                                <div class="service-card__thumb mt-3">
                                    <div class="service-card__thumb__item">
                                        <img src="{{ @$project->image->path ?? '' }}" alt="{{ $project->name }}">
                                    </div>
                                    <a href="{{ route('front.getProjectDetail', $project->slug) }}"
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
