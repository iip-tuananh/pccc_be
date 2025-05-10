@extends('site.layouts.master')
@section('title')
    {{ $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path ?? '') }}
@endsection

@section('css')

@endsection

<style>
    /* Card chính flex-column để full chiều cao */
    .blog-card {
        display: flex;
        flex-direction: column;
        height: 100%;
        background-color: #fdfcf8;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        overflow: hidden;
    }

    /* Khung ảnh cố định cao 180px, cover */
    .blog-card__image {
        height: 180px;
        overflow: hidden;
    }
    .blog-card__image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Nội dung flex-grow để kéo dài */
    .blog-card__content {
        display: flex;
        flex-direction: column;
        flex: 1;
        padding: 16px;
    }

    /* Meta và khoảng cách */
    .blog-card__meta {
        margin-bottom: 8px;
    }

    /* Tiêu đề khóa 2 dòng */
    .blog-card__title {
        line-height: 1.3em;
        height: 2.6em;      /* 2 dòng */
        overflow: hidden;
        margin-bottom: 16px;
    }
    .blog-card__title a {
        color: inherit;
        text-decoration: none;
    }

    /* Nút “Đọc thêm” luôn đáy */
    .blog-card__link {
        font-weight: 500;
        text-decoration: none;
        align-self: flex-start;
    }

</style>

<style>

    /* ========== Wrapper card ========== */
    .testimonials-one__item {
        background-color: #fdfcf8;            /* nền trắng sữa */
        border-radius: 12px;                  /* bo tròn */
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        display: flex;
        flex-direction: column;
        padding: 20px;
        height: 100%;                         /* chiếm toàn chiều cao owl-slide */
        max-height: 360px;                    /* giới hạn chiều cao tối đa */
        overflow: hidden;
        position: relative;
    }

    /* ========== Phần trên: avatar + tên ========= */
    .testimonials-one__top {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
    }

    .testimonials-one__top__thumb img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #e0dcd6;
    }

    .testimonials-one__top__content {
        margin-left: 12px;
    }

    .testimonials-one__top__title {
        font-size: 1rem;
        margin: 0;
        font-weight: 600;
    }

    .testimonials-one__top__dec {
        font-size: 0.85rem;
        color: #777;
    }

    /* ========== Phần nội dung ========== */
    .testimonials-one__text {
        flex: 1;                              /* giãn đều theo chiều dọc */
        margin-bottom: 12px;
        font-style: italic;
        color: #555;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 4;                /* tối đa 4 dòng */
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* ========== Sao đánh giá ========== */
    .testimonials-one__star {
        margin-bottom: 8px;
    }
    .testimonials-one__star i {
        color: #f8b25c;
        margin-right: 4px;
        font-size: 0.9rem;
    }

    /* ========== Icon quote nền nhạt ========= */
    .testimonials-one__quite {
        position: absolute;
        bottom: 12px;
        right: 12px;
        opacity: 0.07;
        width: 36px;
        height: 36px;
    }
    .testimonials-one__quite__bg {
        background-image: url(/site/images/backgrounds/testi-bg-1-1.png);
        background-size: cover;
        width: 100%;
        height: 100%;
    }

    /* ========== Owl Dots ========= */
    .firdip-owl__carousel .owl-dots {
        text-align: center;
        margin-top: 16px;
    }
    .firdip-owl__carousel .owl-dot span {
        width: 8px;
        height: 8px;
        background: #ccc;
        border-radius: 50%;
        display: inline-block;
    }
    .firdip-owl__carousel .owl-dot.active span {
        background: #e67e22;
    }

    /* ========== Responsive ========= */
    @media (max-width: 767px) {
        .testimonials-one__item {
            max-height: none;  /* bỏ giới hạn trên mobile để text không bị cắt quá sớm */
            height: auto;
        }
    }





    /* Flex container cho avatar + text */
    .testimonials-one__top {
        display: flex;
        align-items: center;      /* căn đứng ngang tâm */
    }

    /* Avatar 80×80 */
    .testimonials-one__top__thumb img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 50%;
    }

    /* Khung cho text bằng đúng chiều cao avatar */
    .testimonials-one__top__content {
        display: flex;
        flex-direction: column;
        justify-content: center;  /* căn giữa theo chiều dọc */
        height: 80px;             /* = đúng chiều cao avatar */
        margin-left: 16px;
    }

    /* Kiểu chữ cho đẹp hơn */
    .testimonials-one__top__title {
        font-size: 1.1rem;
        line-height: 1.2;
        margin: 0;
        font-weight: 600;
    }

    .testimonials-one__top__dec {
        font-size: 0.85rem;
        color: #777;
        margin-top: 4px;
    }


    .main-slider-one__item {
        position: relative;
        width: 100%;
        height: 70vh;               /* cao 70% chiều cao viewport */
        overflow: hidden;
    }

    /* ========== Phần background-image ========= */
    .main-slider-one__bg {
        position: absolute;
        top: 0; left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;     /* cover để fill đầy khung và crop trung tâm */
        background-position: center center;
        background-repeat: no-repeat;
    }

    /* ========== Tối ưu trên Mobile ========= */
    @media (max-width: 767px) {
        /*.main-slider-one__item {*/
        /*    height: 50vh;             !* giảm chiều cao để vừa màn hình điện thoại *!*/
        /*}*/
        .main-slider-one__bg {
            /* nếu vẫn muốn toàn bộ ảnh nhìn thấy, đổi sang contain */
             background-size: contain;
             background-position: center top;
        }
    }

    @media (max-width: 767px) {
        .about-one {
            padding-top: 0 !important;
        }
    }

    @media (max-width: 767px) {
        /* Kéo slide ra full chiều rộng viewport */
        .main-slider-one__item {
            position: relative;
            width: 100vw;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
        }

        /* Bỏ giới hạn container padding để background và nội dung tràn sát mép */
        .main-slider-one__item .container {
            max-width: 100%;
            padding-left: 0;
            padding-right: 0;
        }
    }
</style>
@section('content')
    <!-- Hero Section Start -->
    <section class="main-slider-one">
        <div class="main-slider-one__carousel firdip-owl__carousel owl-carousel" data-owl-options='{
		"loop": true,
		"animateOut": "fadeOut",
		"animateIn": "fadeIn",
		"items": 1,
		"autoplay": true,
		"autoplayTimeout": 7000,
		"smartSpeed": 1000,
		"nav": false,
		"dots": true,
		"margin": 0
	    }'>
            @foreach($banners as $banner)
                <div class="item">
                    <div class="main-slider-one__item">
                        <div class="main-slider-one__bg" style="background-image: url('{{@$banner->image->path ?? ""}}');"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    </section>
    <!-- Hero Section Start -->

    <!-- About Section Start -->
    <section class="about-one" style="padding-top: 120px">
        <div class="container">
            <div class="row gutter-y-30">
                <div class="col-lg-6">
                    <div class="about-one__left">
                        <div class="about-one__thumb wow fadeInLeft" data-wow-duration='1500ms' data-wow-delay='300ms'>
                            <div class="about-one__thumb__item about-one__thumb__item--one">
                                <img src="{{ @$about->image->path ?? '/site/images/about/about-1-1.png' }}" alt="firdip image">
                                <div class="about-one__thumb__item__two">
                                    <img src="{{ @$about->image_back->path ?? '/site/images/about/about-s-1-1.png' }}" alt="firdip image">
                                </div>
                                <div class="about-one__thumb__item__three">
                                    <img src="/site/images/shapes/gas.png" alt="firdip">
                                </div>
                            </div>
                            <div class="about-one__thumb__funfact count-box">
                                <h2 class="about-one__thumb__funfact__coun">
                                    <span class="count-text" data-stop="{{$about->experience_number ?? '30'}}" data-speed="1500"></span>
                                    <span>+</span>
                                </h2>
                                <p class="about-one__thumb__funfact__text">{{ $about->experience_text }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-one__right">
                        <div class="about-one__top">
                            <div class="sec-title  wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                                <h6 class="sec-title__tagline">
                                    <img src="/site/images/shapes/sec-title-s-1.png" alt="About Us" class="sec-title__img">
                                    Về chúng tôi
                                </h6>
                                <h3 class="sec-title__title">
                                    {{ $about->title }}
                                </h3>
                            </div>
                            <p class="about-one__top__text wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='300ms'>
                                {!! $about->intro !!}
                             </p>
                        </div>

                        <div class="about-two__box wow fadeInUp animated" data-wow-duration="1500ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
                            <div class="about-two__box__bg" style="background-image: url(assets/images/backgrounds/about-bg-2-1.png);"></div>
                            <div class="about-two__box__icon">
                                <i class="icon-fast-1-1"></i>
                            </div>
                            <div class="about-two__box__content">
                                <h4 class="about-two__box__content__title">{{ $about->service_title }}</h4>
                                <p class="about-two__box__content__text">{{ $about->service_description }}</p>
                            </div>
                        </div>


                        @if($about->results && count($about->results))
                            <div class="about-two__list wow fadeInUp animated" data-wow-duration="1500ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
                                <div class="row gutter-y-30">

                                    @php
                                        $count = count($about->results);
                                        $perColumn = (int) ceil($count / 2);
                                        $chunks = array_chunk($about->results, $perColumn);
                                    @endphp

                                    <div class="row">
                                        @foreach ($chunks as $group)
                                            <div class="col-lg-12 col-md-6 col-xl-6">
                                                <ul class="about-two__list__item list-unstyled">
                                                    @foreach ($group as $item)
                                                        <li class="about-two__list__item__content">
                                                            <i class="icon-check-1"></i> {{ $item['title'] }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        @endif
                        <div class="about-one__list__btn">
                            <a href="{{ route('front.abouts') }}" class="firdip-btn">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Service Section Start -->
    <section class="service-page service-page--home">
        <div class="service-page__bg" style="background-image: url(/site/images/shapes/service-1-1.png);"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="sec-title  wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                        <h6 class="sec-title__tagline"><img src="/site/images/shapes/sec-title-s-1.png" alt="Service" class="sec-title__img"> Dịch vụ</h6>
                        <h3 class="sec-title__title">Sản phẩm và dịch vụ tại {{ $config->short_name_company ?: $config->web_title}} </h3>
                    </div>
                </div>
            </div>

            <div class="service-page__carousel firdip-owl__carousel firdip-owl__carousel--basic-nav owl-theme owl-carousel" data-owl-options='{
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
				"items":2,
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
				"items": 4,
				"margin": 30
			    }
			}
			}'>
              @foreach($services as $service)
                    <div class="service-page__item">
                        <div class="service-card service-card--two wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='300ms'>
                            <div class="service-card__inner">
                                <div class="service-card__icon">
                                    <img style="height: auto" decoding="async"
                                         src="{{ @$service->image_label->path ?? '' }}" alt="icon" width="80" height="80">
                                </div>
                                <div class="service-card__content">
                                    <h4 class="service-card__content__title"><a href="{{ route('front.getServiceDetail', $service->slug) }}">{{ $service->name }}</a></h4>
                                    <p class="service-card__content__text">
                                        {{ $service->description }}
                                    </p>
                                </div>
                                <div class="service-card__thumb">
                                    <div class="service-card__thumb__item">
                                        <img src="{{ @$service->image->path ?? '' }}" alt="voldor image">
                                    </div>
                                    <a href="{{ route('front.getServiceDetail', $service->slug) }}" class="voldor-btn voldor-btn--base"><i class="icon-right-arrow-angle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>

    @if($categoriesProject->count())
        <!-- Service Section Start -->
        <section class="service-three">
            <div class="service-three__bg" style="background-image: url(/site/images/shapes/service-bg-3-1.png);"></div>
            <div class="container">
                @foreach($categoriesProject as $keyCateP => $categoryProject)
                    <div class="row" style="margin-top: {{ $keyCateP != 0 ? '30px' : '' }}">
                        <div class="col-xl-7 col-lg-8 col-md-8">
                            <div class="sec-title  wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                                @if($keyCateP == 0)
                                    <h6 class="sec-title__tagline"><img src="/site/images/shapes/sec-title-s-1.png" alt="Service" class="sec-title__img"> Dự án</h6>
                                @endif

                                <h3 class="sec-title__title">{{ $categoryProject->name }}</h3>
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
                        @foreach($categoryProject->projects as $project)
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
                @endforeach



            </div>
        </section>
        <!-- Service Section End -->
    @endif

    <!-- Testimonials Section Start -->
{{--    <section class="testimonials-one testimonials-one--home">--}}
{{--        <div class="container">--}}
{{--            <div class="sec-title text-center wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>--}}
{{--                <h6 class="sec-title__tagline"><img src="/site/images/shapes/sec-title-s-1.png" alt="Testimonial" class="sec-title__img"> Cảm nhận</h6>--}}
{{--                <h3 class="sec-title__title">Khách hàng nói gì về chúng tôi</h3>--}}
{{--            </div>--}}
{{--            <div class="testimonials-one__carouse firdip-owl__carousel owl-theme owl-carousel" data-owl-options='{--}}
{{--			"items": 5,--}}
{{--			"margin": 30,--}}
{{--			"smartSpeed": 700,--}}
{{--			"loop":true,--}}
{{--			"autoplay": 6000,--}}
{{--			"nav":false,--}}
{{--			"dots":false,--}}
{{--			"responsive":{--}}
{{--				"0":{--}}
{{--				    "items":1--}}
{{--				},--}}
{{--				"575":{--}}
{{--				    "items":1--}}
{{--				},--}}
{{--				"992":{--}}
{{--				    "items": 1--}}
{{--				},--}}
{{--				"1200":{--}}
{{--				    "items": 2--}}
{{--				}--}}
{{--			    }--}}
{{--		    }'>--}}

{{--                @foreach($reviews as $review)--}}
{{--                    <div class="testimonials-one__item">--}}
{{--                        <div class="testimonials-one__top">--}}
{{--                            <div class="testimonials-one__top__thumb">--}}
{{--                                <img src="{{ @$review->image->path ?? '' }}" alt="firdip image">--}}
{{--                            </div>--}}
{{--                            <div class="testimonials-one__top__content">--}}
{{--                                <h4 class="testimonials-one__top__title">{{ $review->name }}</h4>--}}
{{--                                <span class="testimonials-one__top__dec">{{ $review->position }}</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="testimonials-one__content">--}}
{{--                            <p class="testimonials-one__text">{{ $review->message }}</p>--}}
{{--                            <div class="testimonials-one__star">--}}
{{--                                <i class="icon-star"></i>--}}
{{--                                <i class="icon-star"></i>--}}
{{--                                <i class="icon-star"></i>--}}
{{--                                <i class="icon-star"></i>--}}
{{--                                <i class="icon-star"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="testimonials-one__quite">--}}
{{--                            <div class="testimonials-one__quite__bg" style="background-image: url(assets/images/backgrounds/testi-bg-1-1.png);"></div>--}}
{{--                            <i class="icon-quite"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                @endforeach--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- Testimonials Section End -->

    <section class="testimonials-one testimonials-one--home">
        <div class="container">
            <div class="sec-title text-center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="000ms">
                <h6 class="sec-title__tagline">
                    <img src="/site/images/shapes/sec-title-s-1.png" alt="Testimonial" class="sec-title__img">
                    Cảm nhận
                </h6>
                <h3 class="sec-title__title">Khách hàng nói gì về chúng tôi</h3>
            </div>

            <div class="testimonials-one__carouse firdip-owl__carousel owl-theme owl-carousel"
                 data-owl-options='{
           "items": 3,
           "margin": 20,
           "smartSpeed": 600,
           "loop": true,
           "autoplay": 5000,
           "nav": false,
           "dots": true,
           "responsive": {
             "0":    { "items": 1 },
             "576":  { "items": 1 },
             "768":  { "items": 2 },
             "992":  { "items": 3 }
           }
         }'>

                @foreach($reviews as $review)
                    <div class="testimonials-one__item">
                        <div class="testimonials-one__top">
                            <div class="testimonials-one__top__thumb">
                                <img src="{{ @$review->image->path }}" alt="{{ $review->name }}">
                            </div>
                            <div class="testimonials-one__top__content">
                                <h4 class="testimonials-one__top__title">{{ $review->name }}</h4>
                                <span class="testimonials-one__top__dec">{{ $review->position }}</span>
                            </div>
                        </div>
                        <div class="testimonials-one__content">
                            <p class="testimonials-one__text">{{ Str::limit($review->message, 120, '...') }}</p>
                            <div class="testimonials-one__star">
                                @for($i=0; $i<5; $i++)
                                    <i class="icon-star"></i>
                                @endfor
                            </div>
                        </div>
                        <div class="">
                            <div class=""></div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Blog Section Start -->
    <section class="blog-one blog-one--home">
        <div class="container">
            <div class="sec-title  text-center wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                <h6 class="sec-title__tagline"><img src="/site/images/shapes/sec-title-s-1.png" alt="Blog" class="sec-title__img"> Blog</h6>
                <h3 class="sec-title__title">Tin tức và blog mới nhất</h3>
            </div>
            <div class="row gutter-y-30">
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

                @endphp

                @foreach($blogs as $blog)
                    <?php
                        $d = $blog->created_at;
                    ?>
{{--                    <div class="col-md-6 col-lg-4">--}}
{{--                        <div class="blog-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>--}}
{{--                            <a href="{{ route('front.blogDetail', $blog->slug) }}" class="blog-card__image">--}}
{{--                                <img src="{{ @$blog->image->path ?? '' }}" alt="{{ $blog->name }}">--}}
{{--                            </a>--}}

{{--                            <div class="blog-card__content">--}}
{{--                                <ul class="list-unstyled blog-card__meta">--}}
{{--                                    <li class="blog-card__meta__item">--}}

{{--                                    </li>--}}
{{--                                    <li class="blog-card__meta__item">--}}
{{--                                        <p class="blog-card__date">{{ $d->format('d') }} {{ $days[$d->dayOfWeek] }}, {{ $d->format('Y') }}--}}
{{--                                        </p>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                                <h3 class="blog-card__title"><a href="{{ route('front.blogDetail', $blog->slug) }}">{{ $blog->name }}</a></h3>--}}
{{--                                <a href="{{ route('front.blogDetail', $blog->slug) }}" class="blog-card__link">Đọc thêm<i class="icon-arrow-left"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


                    <div class="col-md-6 col-lg-4">
                        <div class="blog-card wow fadeInUp h-100 d-flex flex-column" data-wow-duration="1500ms" data-wow-delay="000ms">

                            {{-- Ảnh cố định chiều cao --}}
                            <a href="{{ route('front.blogDetail', $blog->slug) }}" class="blog-card__image">
                                <img src="{{ @$blog->image->path ?? '' }}" alt="{{ $blog->name }}">
                            </a>

                            {{-- Nội dung --}}
                            <div class="blog-card__content d-flex flex-column flex-grow-1">
                                <ul class="list-unstyled blog-card__meta mb-2">
                                    <li class="blog-card__meta__item">
                                        <p class="blog-card__date">
                                            {{ $d->format('d') }} {{ $days[$d->dayOfWeek] }}, {{ $d->format('Y') }}
                                        </p>
                                    </li>
                                </ul>

                                {{-- Tiêu đề giới hạn 2 dòng và cắt server-side --}}
                                <h3 class="blog-card__title mb-3">
                                    <a href="{{ route('front.blogDetail', $blog->slug) }}"
                                       title="{{ $blog->name }}">
                                        {{ Str::limit($blog->name, 60, '...') }}
                                    </a>
                                </h3>

                                {{-- Link đáy --}}
                                <a href="{{ route('front.blogDetail', $blog->slug) }}" class="blog-card__link mt-auto">
                                    Đọc thêm
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- Blog Section End -->

    <div class="client-carousel ">
        <div class="container">
            <div class="client-carousel__top text-center">
                <h3 class="client-carousel__title">Đối tác của chúng tôi</h3>
            </div>

            <div class="client-carousel__two firdip-owl__carousel owl-theme owl-carousel" data-owl-options='{
            "items": 5,
            "margin": 55,
            "smartSpeed": 700,
            "loop":true,
            "autoplay": 6000,
            "nav":false,
            "dots":false,
            "responsive":{
                "0":{
                    "items":1,
                    "margin": 0
                },
                "360":{
                    "items":2,
                    "margin": 0
                },
                "575":{
                    "items":3,
                    "margin": 30
                },
                "768":{
                    "items":3,
                    "margin": 40
                },
                "992":{
                    "items": 4,
                    "margin": 40
                },
                "1200":{
                    "items": 5,
                    "margin": 108
                }
            }
            }'>

                @foreach($partners as $partner)
                    <div class="client-carousel__one__item">
                        <img src="{{ @$partner->image->path ?? '' }}" alt="{{$partner->name}}">
                    </div><!-- /.owl-slide-item-->
                @endforeach

            </div><!-- /.thm-owl__slider -->
        </div><!-- /.container -->
    </div><!-- /.client-carousel -->

@endsection

@push('scripts')

@endpush
