<footer class="main-footer">
    <div class="main-footer__bg" style="background-image: url(/site/images/shapes/h-prl-two_bg.jpg);"></div>
    <div class="main-footer__top">
        <style>
            .main-footer__top {
                display: none;
            }
            .main-footer__top__inner {
                /* background đỏ, padding rộng hơn */
                background: var(--firdip-base, #CA4445);
                padding: 40px 60px;

                /* flex layout với gap */
                display: flex;
                align-items: center;
                gap: 24px;

                /* bo góc đáy + đổ bóng */
                border-radius: 0 0 8px 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            }

            /* Logo container */
            .footer-logo {
                background: #fff;
                padding: 8px 12px;
                border-radius: 4px;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            }

            /* Đường kẻ chia cách flex (thay hr) */
            .main-footer__divider {
                flex-grow: 1;
                height: 1px;
                background-color: rgba(255, 255, 255, 0.4);
            }

            /* Khối chứa icon */
            .footer-social {
                display: flex;
                gap: 12px;
            }

            /* Style cho từng icon */
            .footer-social a {
                width: 36px;
                height: 36px;
                display: grid;
                place-items: center;
                border: 1px solid rgba(255, 255, 255, 0.5);
                border-radius: 50%;
                background-color: rgba(255, 255, 255, 0.1);
                color: #fff;
                transition: background-color 0.3s, border-color 0.3s;
            }
            .footer-social a:hover {
                background-color: rgba(255, 255, 255, 0.2);
                border-color: rgba(255, 255, 255, 0.8);
            }
        </style>
        <div class="container">
{{--            <div class="main-footer__top__inner">--}}
{{--                <div class="main-footer__top__left">--}}
{{--                    <a href="index.html" class="main-footer__top__logo logo-firdip">--}}
{{--                        <img src="{{$config->image->path}}" width="110" alt="firdip image">--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="main-footer__top__right">--}}
{{--                    <div class="main-footer__top__social">--}}
{{--                        <a href="{{$config->facebook}}"><i class="icon-facebook-f" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>--}}
{{--                        <a href="{{$config->twitter}}"><i class="icon-x-twitter" aria-hidden="true"></i> <span class="sr-only">Twitter</span></a>--}}
{{--                        <a href="{{$config->youtube}}"><i class="icon-youtube" aria-hidden="true"></i><span class="sr-only">youtube</span></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}



            <div class="main-footer__top__inner">
                <!-- Logo -->
                <div class="footer-logo">
                    <img src="{{$config->image->path}}" width="110" alt="firdip image">
                </div>

                <!-- Đường kẻ chia -->
                <div class="main-footer__divider"></div>

                <!-- Icon mạng xã hội -->
                <div class="footer-social">
                    <a href="{{$config->facebook}}"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{$config->twitter}}"><i class="icon-x-twitter"></i></a>
                    <a href="{{$config->youtube}}"><i class="fab fa-youtube"></i></a>
                </div>
            </div>


        </div>
    </div>
    <div class="main-footer__middle">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="footer-widget footer-widget--about" style="color: #ffffff">
                        <h2 class="footer-widget__title">Về chúng tôi</h2>
                        <p class="footer-widget__text">
                           {!! $about->intro !!}
                        </p>
                        <form action="#" data-url="MAILCHIMP_FORM_URL" class="footer-widget__newsletter mc-form">
                            <input type="email" name="EMAIL" placeholder="Email">
                            <button type="submit" class="icon-right-arrow-angle"></button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="footer-widget footer-widget--contact">
                        <h2 class="footer-widget__title">Liên hệ</h2>
                        <ul class="list-unstyled footer-widget__contact">
                            <li class="footer-widget__contact__item">
                                <div class="footer-widget__contact__icon">
                                    <i class="icon-telephone-call-1"></i>
                                </div>
                                <div class="footer-widget__contact__inner">
                                    <a href="tel:{{ $config->hotline }}" class="footer-widget__contact__text" style="color: #ffffff">{{ $config->hotline }}</a>
                                    {{-- <a href="tel:{{ $config->zalo }}" class="footer-widget__contact__text">{{ $config->zalo }}</a> --}}
                                </div>
                            </li>
                            <li class="footer-widget__contact__item">
                                <div class="footer-widget__contact__icon">
                                    <i class="icon-glove"></i>
                                </div>
                                <div class="footer-widget__contact__inner">
                                    <a href="https:{{ request()->getHost() }}" class="footer-widget__contact__text" style="color: #ffffff">{{ request()->getHost() }}</a>
                                </div>
                            </li>
                            <li class="footer-widget__contact__item">
                                <div class="footer-widget__contact__icon">
                                    <i class="icon-pin2"></i>
                                </div>
                                <div class="footer-widget__contact__inner">
                                    <p class="footer-widget__contact__text">
                                        {{ $config->address_company }}
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="footer-widget footer-widget--link">
                        <h2 class="footer-widget__title">Liên kết</h2>
                        <ul class="list-unstyled footer-widget__links">
                            <li class="footer-widget__links__item" style="color: #ffffff"><a href="{{ route('front.abouts') }}">Về chúng tôi</a></li>
                            <li class="footer-widget__links__item" style="color: #ffffff"><a href="{{ route('front.blogs') }}">Tin tức</a></li>
                            <li class="footer-widget__links__item" style="color: #ffffff"><a href="{{ route('front.services') }}">Dịch vụ</a></li>
                            <li class="footer-widget__links__item" style="color: #ffffff"><a href="{{ route('front.projects') }}">Dự án</a></li>
                            <li class="footer-widget__links__item" style="color: #ffffff"><a href="{{ route('front.contact') }}">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>

                <style>
                    .footer-widget--map {
                    }
                    .footer-widget--map .footer-widget__title {
                        margin-bottom: .75rem;
                        font-size: 1.125rem;
                    }
                    .footer-widget--map .embed-responsive {
                        border-radius: 8px;
                        overflow: hidden;
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                    }
                </style>
                <div class="col-md-6 col-lg-3">
                    <div class="footer-widget footer-widget--map">
                        <div class="embed-responsive embed-responsive-4by3">
                            {!! $config->location !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-footer__bottom">
        <div class="container">
            <div class="main-footer__bottom__inner">
                <p class="main-footer__copyright"> &copy; Copyright <span class="dynamic-year"></span> LTA Team 2025</p>
            </div>
        </div>
    </div>
</footer>
