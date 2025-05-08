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
<style>
    /* CSS */
    .contact-one {
        padding: 80px 0;
    }


    .contact-card {
        background: #fff;
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    /* Các input và textarea */
    .contact-card__form input,
    .contact-card__form textarea {
        width: 100%;
        padding: 0.75rem 1rem;
        margin-bottom: 0.25rem;
        border: 1px solid #ddd;
        border-radius: 0.5rem;
        font-size: 1rem;
        transition: border-color .2s;
    }

    .contact-card__form input:focus,
    .contact-card__form textarea:focus {
        outline: none;
        border-color: #5c7cfa; /* màu primary */
    }

    /* Nút submit */
    .contact-card__form button {
        display: inline-block;
        width: 100%;
        padding: 0.75rem;
        background-color: var(--firdip-base, #CA4445);
        color: #fff;
        font-size: 1rem;
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: background-color .2s;
    }



    /* Thông báo lỗi */
    .invalid-feedback.error {
        color: #e03131;
        font-size: 0.875rem;
        margin-bottom: 1rem;
    }

    /* Đưa khoảng cách giữa từng nhóm field + lỗi */
    .contact-card__form > *:not(:last-child) {
        margin-bottom: 1rem;
    }

    /* Responsive nhỏ hơn 768px */
    @media (max-width: 767px) {
        .contact-card {
            padding: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(/site/images/backgrounds/page-header-bg-1-1.jpg);"></div>
        <div class="container">
            <h2 class="page-header__title">Giới thiệu</h2>
            <ul class="firdip-breadcrumb list-unstyled">
                <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                <li><span>Giới thiệu</span></li>
            </ul>
        </div>
    </section>

    <!-- About Section Start -->
    <section class="about-one" style="padding-top: 120px; padding-bottom: 60px">
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

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <section class="faq-one" style="padding: 40px 0px">
        <div class="container">
            <div class="sec-title text-center wow fadeInUp animated" data-wow-duration="1500ms" data-wow-delay="000ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                <h6 class="sec-title__tagline"><img src="/site/images/shapes/sec-title-s-1.png" alt="FAQS" class="sec-title__img"> Quy trình</h6>
                <h3 class="sec-title__title">Quy trình làm việc của {{ $config->short_name_company ?: $config->web_title}}</h3>
            </div>
            <div class="row gutter-y-30">
                <div class="col-lg-7">
                    <div class="faq-page__accordion firdip-accrodion wow fadeInUp animated" data-wow-duration="1500ms" data-wow-delay="300ms" data-grp-name="firdip-accrodion" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">

                        @foreach($workflow->content as $k => $wk)
                            <div class="accrodion {{ $k == 0 ? 'active' : '' }}">
                                <div class="accrodion-title">
                                    <h4 class="accrodion-title__text">{{ $wk['title'] }}<span class="accrodion-title__icon"></span></h4>
                                </div><!-- /.accordian-title -->
                                <div class="accrodion-content" style="">
                                    <div class="inner">
                                        <p class="inner__text">
                                            {!! $wk['intro'] !!}
                                        </p>
                                    </div><!-- /.accordian-content -->
                                </div>
                            </div><!-- /.accordian-item -->

                        @endforeach

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="faq-page__right">
                        <div class="faqs-two__thumb wow fadeInUp animated" data-wow-duration="1500ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 500ms; animation-name: fadeInUp;">
                            <div class="faqs-two__thumb__item">
                                <img src="{{ @$workflow->image->path ?? '' }}" alt="firdip image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="team-one team-one--page" style="padding:80px 0px">
        <div class="container">
            <div class="sec-title text-center wow fadeInUp animated" data-wow-duration="1500ms" data-wow-delay="000ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                <h6 class="sec-title__tagline"><img src="/site/images/shapes/sec-title-s-1.png" alt="FAQS" class="sec-title__img">Đội ngũ</h6>
                <h3 class="sec-title__title">Đội ngũ của chúng tôi</h3>
            </div>


            <div class="team-one__carousel firdip-owl__carousel firdip-owl__carousel--with-shadow firdip-owl__carousel--basic-nav owl-carousel owl-theme" data-owl-options='{
			"items": 1,
			"margin": 0,
			"loop": false,
			"smartSpeed": 700,
			"nav": false,
			"navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
			"dots": true,
			"autoplay": false,
			"responsive": {
				"0": {
					"items": 1
				},
				"768": {
					"items": 2,
					"margin": 30
				},
				"992": {
					"items": 3,
					"margin": 30
				}
			}
		}'>
                @foreach($teams as $team)
                    <div class="item">
                        <div class="team-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                            <div class="team-card__inner">
                                <div class="team-card__image">
                                    <img src="{{ @$team->image->path ?? '' }}" alt="Annette Black">
                                </div>
                                <div class="team-card__content">
                                    <div class="team-card__content__inner">
                                        <div class="team-card__content__inner__item">
                                            <h3 class="team-card__content__title"><a href="#">{{ $team->name }}</a></h3>
                                            <h6 class="team-card__content__designation">{{ $team->position }}</h6>
                                        </div>
                                        <div class="team-card__content__hover">
                                            <div class="team-card__content__hover__icon">
                                                <i class="icon-share-1"></i>
                                            </div>
                                            <div class="team-card__content__hover__social">
                                                <a href="{{ $team->tw }}"><i class="icon-x-twitter" aria-hidden="true"></i> <span class="sr-only">Twitter</span></a>
                                                <a href="{{ $team->facebook }}"><i class="icon-facebook-f" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>
                                                <a href="{{ $team->pri }}"><i class="icon-pinterest-p" aria-hidden="true"></i><span class="sr-only">Pinterest</span></a>
                                                <a href="{{ $team->ins }}"><i class="fab fa-instagram" aria-hidden="true"></i><span class="sr-only">Instagram</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.team-one -->

    <section class="service-two" ng-controller="AboutPage">
        <div class="service-two__bg" style="background-image: url(/site/images/shapes/service-bg-1-1.png);"></div>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <!-- Form bên trái -->
                <div class="col-lg-6">
                    <div class="contact-card">
                        <!-- Tiêu đề (nếu có) -->
                        <p class="contact-card__intro">
                            {{ $config->web_title }}
                        </p>
                        <!-- Form -->
                        <form class="contact-card__form" action="#" id="form-contact" >
                            <input type="text" name="name" placeholder="Họ và tên" required>
                            <div class="invalid-feedback d-block error" role="alert">
                                <span ng-if="errors && errors['name']">
                                    <% errors['name'][0] %>
                                </span>
                            </div>
                            <input type="text" name="phone" placeholder="Số điện thoại" required>
                            <div class="invalid-feedback d-block error" role="alert">
                                <span ng-if="errors && errors['phone']">
                                    <% errors['phone'][0] %>
                                </span>
                            </div>
                            <textarea name="message" placeholder="Để lại lời nhắn" rows="5" required></textarea>
                            <div class="invalid-feedback d-block error" role="alert">
                                <span ng-if="errors && errors['message']">
                                    <% errors['message'][0] %>
                                </span>
                            </div>
                            <button type="button" ng-click="submitContact()">Gửi liên hệ</button>
                        </form>
                    </div>
                </div>

                <!-- Bên phải có thể là hình ảnh hoặc thông tin khác -->
                <div class="col-lg-6 text-center">
                    <h3>Liên hệ ngay</h3>
                    <p>{!! $about->intro !!}</p>
                    <img src="/site/images/blog/blog-1-1.png" alt="Contact Image" class="img-fluid rounded">
                </div>
            </div>
        </div>

    </section>



@endsection

@push('scripts')
    <script>
        app.controller('AboutPage', function ($rootScope, $scope, $sce, $interval) {
            $scope.errors = [];
            $scope.submitContact = function () {
                var url = "{{route('front.submitContact')}}";
                var data = jQuery('#form-contact').serialize();
                $scope.loading = true;
                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            jQuery('#form-contact')[0].reset();
                            $scope.errors = [];
                            $scope.$apply();
                        } else {
                            $scope.errors = response.errors;
                            toastr.warning(response.message);
                        }
                    },
                    error: function () {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading = false;
                        $scope.$apply();
                    }
                });
            }
        })

    </script>
@endpush
