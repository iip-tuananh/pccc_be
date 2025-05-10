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
    /* chung cho cả hai khối trái và phải */
    .contact-block {
        background-color: #fdfcf8;       /* trắng sữa */
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        overflow: hidden;
    }

    /* đảm bảo map chiếm full chiều rộng */
    .google-map iframe,
    .google-map > * {
        width: 100%;
        height: 300px;
        border: 0;
    }

    /* tiêu đề inside card */
    .contact-block .card-title {
        font-size: 1.25rem;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }

    /* icon list trái */
    .contact-block ul li {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
    }
    .contact-block ul li i {
        font-size: 1.1rem;
        color: #e67e22;
    }

    /* Responsive: trên mobile xếp dọc, map lên trước */
    @media (max-width: 767px) {
        .contact-layout .row {
            flex-direction: column;
        }
        .contact-layout .col-lg-6 {
            max-width: 100%;
            flex: 0 0 100%;
        }
        .google-map {
            margin-bottom: 20px;
        }
    }

    /* chung cho cả hai khối */
    .info-map-block,
    .contact-card {
        background-color: #fdfcf8;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        width: 100%;
    }

    /* cho row kéo full height */
    .row.align-items-stretch {
        align-items: stretch;
    }

    /* cho mỗi cột hỗ trợ flex container */
    .col-lg-6.d-flex {
        display: flex;
    }

    /* bản đồ full chiều cao phần dành riêng */
    .google-map iframe,
    .google-map > * {
        width: 100%;
        height: 100%;
        min-height: 200px; /* hoặc bạn chỉnh cao hơn */
        border: 0;
    }

    /* form-flex: đẩy button xuống đáy, textarea co giãn */
    .contact-card form {
        display: flex;
        flex-direction: column;
    }
    .contact-card form .flex-grow-1 {
        flex: 1;
    }

</style>
@endsection

@section('content')
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(/site/images/backgrounds/page-header-bg-1-1.jpg);"></div>
        <div class="container">
            <h2 class="page-header__title">Liên hệ</h2>
            <ul class="firdip-breadcrumb list-unstyled">
                <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                <li><span>Liên hệ</span></li>
            </ul>
        </div>
    </section>
    <section class="contact-layout py-5" ng-controller="AboutPage">
        <div class="container">
            <div class="row align-items-stretch">
                <!-- LEFT: thông tin + map -->
                <div class="col-lg-6 mb-4 mb-lg-0 d-flex">
                    <div class="info-map-block h-100 p-4">
                        <!-- Thông tin công ty -->
                        <h5 class="mb-3">THÔNG TIN CÔNG TY</h5>
                        <ul class="list-unstyled mb-4">
                            <li><i class="fas fa-building me-2"></i>{{ $config->web_title }}</li>
                            <li><i class="fas fa-map-marker-alt me-2"></i>{{ $config->address_company }}</li>
                            <li><i class="fas fa-phone-alt me-2"></i>Hotline: <a href="tel:{{ $config->hotline }}">{{ $config->hotline }}</a></li>
                            <li><i class="fas fa-envelope me-2"></i>Email: <a href="mailto:VNPTech.info@gmail.com">{{ $config->email }}</a></li>
                        </ul>
                        <!-- Bản đồ -->
                        <div class="google-map">
                            {!! $config->location !!}
                        </div>
                    </div>
                </div>

                <!-- RIGHT: form liên hệ -->
                <div class="col-lg-6 d-flex">
                    <div class="contact-card h-100 p-4">
                        <h5 class="mb-3">LIÊN HỆ VỚI CHÚNG TÔI</h5>
                        <form id="form-contact" class="h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Họ và tên" required>
                                    <div class="invalid-feedback d-block" ng-if="errors['name']"><% errors['name'][0] %></div>
                                </div>
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" required>
                                    <div class="invalid-feedback d-block" ng-if="errors['phone']"><% errors['phone'][0] %></div>
                                </div>
                                <div class="mb-3 flex-grow-1">
                                    <textarea name="message" rows="5" class="form-control" placeholder="Để lại lời nhắn" required></textarea>
                                    <div class="invalid-feedback d-block" ng-if="errors['message']"><% errors['message'][0] %></div>
                                </div>
                            </div>
                            <button type="button" class="firdip-btn firdip-btn--base w-100 mt-3" ng-click="submitContact()">Gửi liên hệ</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
{{--    <!-- Contact Section Start -->--}}
{{--    <section class="contact-one" ng-controller="AboutPage">--}}
{{--        <div class="container">--}}
{{--            <div class="col-12">--}}
{{--                <div class="contact-one__top">--}}
{{--                    <div class="sec-title text-center wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>--}}
{{--                        <h6 class="sec-title__tagline"><img src="/site/images/shapes/sec-title-s-1.png" alt="Contact with us" class="sec-title__img">--}}
{{--                           Liên hệ với chúng tôi--}}
{{--                        </h6>--}}
{{--                        <h3 class="sec-title__title">{{ $config->web_title }}</h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <form id="form-contact" class="contact-one__form contact-form-validated form-one wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='300ms'>--}}
{{--                    <div class="form-one__group">--}}
{{--                        <div class="form-one__control">--}}
{{--                            <input type="text" name="name" placeholder="Họ và tên">--}}
{{--                            <div class="invalid-feedback d-block error" role="alert">--}}
{{--                                <span ng-if="errors && errors['name']">--}}
{{--                                    <% errors['name'][0] %>--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-one__control">--}}
{{--                            <input type="email" name="email" placeholder="Email">--}}
{{--                        </div>--}}
{{--                        <div class="form-one__control form-one__control--full">--}}
{{--                            <input type="text" name="phone" placeholder="Số điện thoại">--}}
{{--                            <div class="invalid-feedback d-block error" role="alert">--}}
{{--                                <span ng-if="errors && errors['phone']">--}}
{{--                                    <% errors['phone'][0] %>--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-one__control form-one__control--full">--}}
{{--                            <textarea name="message" placeholder="Để lại lời nhắn"></textarea>--}}
{{--                            <div class="invalid-feedback d-block error" role="alert">--}}
{{--                                <span ng-if="errors && errors['message']">--}}
{{--                                    <% errors['message'][0] %>--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-one__control text-center form-one__control--full">--}}
{{--                            <button type="button" class="firdip-btn firdip-btn--base" ng-click="submitContact()">Gửi liên hệ</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div><!-- /.container -->--}}
{{--    </section>--}}
{{--    <!-- Contact Section End-->--}}

{{--    <!-- Contact Section Start-->--}}
{{--    <section class="contact-bottom">--}}
{{--        <div class="container">--}}
{{--            <div class="contact-bottom__inner wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='300ms'>--}}
{{--                <div class="contact-bottom__inner__right">--}}
{{--                    <div class="contact-bottom__inner__top">--}}
{{--                        <div class="contact-bottom__inner__top__item contact-bottom__inner__top__item--two">--}}
{{--                            <div class="contact-bottom__inner__bg" style="background-image: url(/site/images/backgrounds/contact-bg-1-1.png);"></div>--}}
{{--                            <h4 class="contact-bottom__inner__top__item__content">Thông tin liên hệ</h4>--}}
{{--                        </div>--}}
{{--                        <div class="contact-bottom__inner__top__item">--}}
{{--                            <div class="contact-bottom__inner__top__item__list">--}}
{{--                                <div class="contact-bottom__inner__top__item__list__icon">--}}
{{--                                    <i class="icon-telephone-2"></i>--}}
{{--                                </div>--}}
{{--                                <div class="contact-bottom__inner__top__item__list__content">--}}
{{--                                    <p class="contact-bottom__inner__top__item__list__subtitle">Gọi ngay cho chuúng tôi?</p>--}}
{{--                                    <h6 class="contact-bottom__inner__top__item__list__text">Miễn phí <a href="tel:{{ $config->hotline }}"> {{ $config->hotline }}</a></h6>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="contact-bottom__inner__right__bottom">--}}
{{--                        <ul class="contact-bottom__list list-unstyled">--}}
{{--                            <li class="contact-bottom__list__item">--}}
{{--                                <div class="contact-bottom__list__item__icon" style="width: 50px !important;">--}}
{{--                                    <i class="icon-email-1"></i>--}}
{{--                                </div>--}}
{{--                                <div class="contact-bottom__list__item__content">--}}
{{--                                    <p class="contact-bottom__list__item__subtitle">Email</p>--}}
{{--                                    <h6 class="contact-bottom__list__item__text"><a href="{{ $config->email }}">{{ $config->email }}</a></h6>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="contact-bottom__list__item">--}}
{{--                                <div class="contact-bottom__list__item__icon">--}}
{{--                                    <i class="icon-pin2"></i>--}}
{{--                                </div>--}}
{{--                                <div class="contact-bottom__list__item__content">--}}
{{--                                    <p class="contact-bottom__list__item__subtitle">Địa chỉ</p>--}}
{{--                                    <span class="contact-bottom__list__item__text">{{ $config->address_company }}</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="contact-bottom__list__item contact-bottom__list__item--two">--}}
{{--                                <div class=" contact-bottom__list__item__social">--}}
{{--                                    <a href="{{ $config->facebook }}"><i class="icon-facebook-f" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>--}}
{{--                                    <a href="{{ $config->twitter }}"><i class="icon-x-twitter" aria-hidden="true"></i> <span class="sr-only">Twitter</span></a>--}}
{{--                                    <a href="{{ $config->youtube }}"><i class="icon-youtube" aria-hidden="true"></i><span class="sr-only">Youtube</span></a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="google-map google-map__contact">--}}
{{--               {!! $config->location !!}--}}
{{--            </div>--}}
{{--            <!-- /.google-map -->--}}
{{--        </div>--}}

{{--    </section>--}}
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
