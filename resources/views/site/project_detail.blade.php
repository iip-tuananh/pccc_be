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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"  />

    <style>

        .gallery-top .swiper-slide img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        /* Thumbnail container */
        .gallery-thumbs {
            margin-top: 10px;
        }
        .gallery-thumbs .swiper-slide {
            width: 100px;       /* chỉnh theo ý bạn */
            height: 80px;
            opacity: 0.6;
            cursor: pointer;
        }
        .gallery-thumbs .swiper-slide-thumb-active {
            opacity: 1;
        }
        .gallery-thumbs .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .service-three__item {
            background-color: #FFF; /* trắng sữa dịu mắt */
            border: 1px solid #e0ddd8; /* viền nhạt để phân tách */
            border-radius: 12px;       /* bo tròn góc */
            padding: 20px;             /* khoảng cách bên trong */
            margin-bottom: 20px;       /* khoảng cách giữa các khối */
            box-shadow: 0 2px 6px rgba(0,0,0,0.05); /* bóng nhẹ nổi khối */
            transition: transform .2s;  /* hiệu ứng khi hover */
        }

        .service-three__item:hover {
            transform: translateY(-4px);
        }
    </style>
@endsection


@section('content')
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(/site/images/backgrounds/page-header-bg-1-1.jpg);"></div>
        <div class="container">
            <h2 class="page-header__title">Dự án</h2>
            <ul class="firdip-breadcrumb list-unstyled">
                <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                <li><span>{{ $project->name }}</span></li>
            </ul>
        </div>
    </section>

    <section class="blog-one blog-one--page">
        <div class="container">
            <div class="row gutter-y-60">
                <div class="col-lg-8">
                    <div class="blog-details">
                        <div class="blog-card__two">
                            @php
                                use Carbon\Carbon;
                                Carbon::setLocale('vi');
                                $days = [
                                    Carbon::SUNDAY    => 'Chủ nhật',
                                    Carbon::MONDAY    => 'Thứ 2',
                                    Carbon::TUESDAY   => 'Thứ 3',
                                    Carbon::WEDNESDAY => 'Thứ 4',
                                    Carbon::THURSDAY  => 'Thứ 5',
                                    Carbon::FRIDAY    => 'Thứ 6',
                                    Carbon::SATURDAY  => 'Thứ 7',
                                ];
                                    $d = $project->created_at;
                            @endphp
                            <?php

                            ?>
{{--                            <div class="blog-card__two__image">--}}
{{--                                <img src="{{ @$project->image->path ?? '' }}" alt="{{$project->name}}">--}}
{{--                                <p class="blog-card-two__date">{{ $d->format('d') }} {{ $days[$d->dayOfWeek] }}, {{ $d->format('Y') }}</p>--}}
{{--                            </div>--}}


                            <div class="blog-card__two__image">
                                <!-- Slider chính (ảnh lớn) -->
                                <div class="swiper-container gallery-top">
                                    <div class="swiper-wrapper">
                                        @foreach($project->galleries as $img)
                                            <div class="swiper-slide">
                                                <img src="{{ $img->image->path }}" alt="{{ $project->name }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Thumbnails phía dưới -->
                                <div class="swiper-container gallery-thumbs mt-3">
                                    <div class="swiper-wrapper">
                                        @foreach($project->galleries as $img)
                                            <div class="swiper-slide">
                                                <img src="{{ $img->image->path }}" alt="thumbnail">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Ngày tháng -->

                            </div>


                            <div class="blog-card-two__content">
                                <ul class="list-unstyled blog-card-two__meta">
                                    <li><a href="#"><i class="fas fa-user-circle"></i> by {{ $project->user_create->name }} | {{ $project->created_at->format('d/m/Y H:i') }}</a></li>
                                </ul>
                                <h3 class="blog-card-two__title">
                                    {{$project->name}}
                                </h3>

                                <style>
                                    .single-duan-content {
                                        display: inline-block;
                                        width: 100%;
                                        margin: 0 0 20px;
                                        padding: 12px 30px;
                                        border-radius: 9px;
                                        background: #F4F4F4;
                                    }

                                    .single-duan-content .single-duan-intro {
                                        display: flex;
                                        width: 100%;
                                        flex-direction: row;
                                        flex-wrap: wrap;
                                        gap: 2%;
                                        padding-right: 15%;
                                    }

                                    .single-duan-intro p {
                                        width: 49%;
                                        font-size: 15px;
                                        line-height: 25px;
                                        margin: 0 0 15px;
                                        color: #CA4445;
                                        font-weight: 700;
                                    }

                                    .single-duan-intro label {
                                        font-weight: 600;
                                        color: #000;
                                        margin: 0;
                                        margin-right: 10px;
                                    }

                                    @media (max-width: 767px) {
                                        .single-duan-content {
                                            margin: 0 0 10px;
                                        }
                                    }

                                    @media (max-width: 1199px) {
                                        .single-duan-content .single-duan-intro {
                                            padding-right: 0;
                                        }
                                    }

                                    @media (max-width: 767px) {
                                        .single-duan-intro p {
                                            margin: 5px 0;
                                        }
                                    }

                                </style>
                                <div class="single-duan-content">


                                    <div class="single-duan-intro">

                                        <p><label>Dịch vụ: </label> {{ $project->service }} </p>

                                        <p><label>Thời gian hoàn thiện:</label> {{ $project->completion_time }} </p>

                                        <p><label>Diện tích :</label> {{ $project->area }}</p>

                                        <p><label>Địa chỉ:</label> {{ $project->location }}</p>

                                    </div>

                                </div>


                                {!! $project->content !!}
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-lg-8 -->

                <div class="col-lg-4">
                    <div class="sidebar">
                        <aside class="widget-area">

                            <div class="sidebar__single wow fadeInUp" data-wow-delay='300ms'>
                                <h4 class="sidebar__title">Dự án nổi bật</h4>
                                <ul class="sidebar__posts list-unstyled">
                                    @foreach($projectHighlight as $pH)
                                            <?php
                                            $d = $pH->created_at;
                                            ?>
                                        <li class="sidebar__posts__item">
                                            <div class="sidebar__posts__image">
                                                <img src="{{ @$pH->image->path ?? '' }}" alt="firdip">
                                            </div>
                                            <div class="sidebar__posts__content">
                                                <p class="sidebar__posts__meta"><a href="{{ route('front.getProjectDetail', $pH->slug) }}"><i class="icon-clock"></i>{{ $d->format('d') }} {{ $days[$d->dayOfWeek] }}, {{ $d->format('Y') }}</a></p>
                                                <h4 class="sidebar__posts__title"><a href="{{ route('front.getProjectDetail', $pH->slug) }}">{{ $pH->name }}</a></h4>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="sidebar__single wow fadeInUp" data-wow-delay='300ms'>
                                <h4 class="sidebar__title">Danh mục</h4>
                                <ul class="sidebar__categories list-unstyled">
                                    @foreach($categoriesProject as $cate)
                                        <li class="sidebar__categories__item"><a href="{{ route('front.projects', $cate->slug) }}"> <i class="icon-arrow-left"></i>{{ $cate->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>


                        </aside>
                    </div>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->


        <div class="container">
                <div class="row" >
                    <div class="col-xl-7 col-lg-8 col-md-8">
                        <div class="sec-title  wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                            <h3 class="sec-title__title">Dự án liên quan</h3>
                        </div>
                    </div>
                </div>

                <div class="service-three__carousel firdip-owl__carousel firdip-owl__carousel--basic-nav owl-theme owl-carousel" data-owl-options='{
			"items": 4,
			"margin": 30,
			"smartSpeed": 700,
			"loop":true,
			"autoplay": 6000,
			"nav":true,
			"navText": ["<span class=\"icon-arrow-right\"></span>","<span class=\"icon-arrow-left\"></span>"],
			"dots":false,
			"responsive":{
			    "0":{
				"items":1,
				"margin": 10
			    },
			    "575":{
				"items":1,
				"margin": 30
			    },
			    "768":{
				"items":2,
				"margin": 30
			    },
			    "992":{
				"items": 3,
				"margin": 30
			    },
			    "1200":{
				"items": 3,
				"margin": 30
			    }
			}
			}'>
                    @foreach($projectsRe as $project)
                        <div class="service-three__item wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='300ms'>
                            <div class="service-three__item__top">
                                <h4 class="service-three__item__title">{{ $project->name }}</h4>
                            </div>
                            <div class="service-three__item__thumb">
                                <img src="{{ @$project->image->path ?? '' }}" alt="firdip image">
                            </div>
                            <p class="service-three__item__text">{{ $project->description }}</p>
                            <div class="service-three__item__btn">
                                <a href="{{ route('front.getProjectDetail', $project->slug) }}" class="firdip-btn service-three__item__btn__link">Chi tiết <i class="icon-arrow-left"></i></a>
                            </div>
                        </div>
                    @endforeach

                </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        var thumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 5,
            freeMode: true,
            watchSlidesProgress: true,
        });

        // Main slider tự động, lặp vô hạn, không nav
        var gallery = new Swiper('.gallery-top', {
            spaceBetween: 10,
            loop: true,               // lặp ảnh
            autoplay: {               // tự trượt
                delay: 3000,            // mỗi 3s chuyển
                disableOnInteraction: false,
            },
            // Không khai báo phần navigation nữa
            thumbs: {
                swiper: thumbs
            }
        });
    </script>
@endpush
