<footer class="main-footer">
    <div class="main-footer__bg" style="background-image: url(/site/images/shapes/footer-bg.png);"></div>
    <div class="main-footer__top">
        <div class="container">
            <div class="main-footer__top__inner">
                <div class="main-footer__top__left">
                    <a href="index.html" class="main-footer__top__logo logo-firdip">
                        <img src="{{$config->image->path}}" width="110" alt="firdip image">
                    </a>
                </div>
                <div class="main-footer__top__right">
                    <div class="main-footer__top__social">
                        <a href="{{$config->facebook}}"><i class="icon-facebook-f" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>
                        <a href="{{$config->twitter}}"><i class="icon-x-twitter" aria-hidden="true"></i> <span class="sr-only">Twitter</span></a>
                        <a href="{{$config->youtube}}"><i class="icon-youtube" aria-hidden="true"></i><span class="sr-only">youtube</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-footer__middle">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="footer-widget footer-widget--about" style="color: #7D8081">
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
                                    <a href="tel:{{ $config->hotline }}" class="footer-widget__contact__text">{{ $config->hotline }}</a>
                                    <a href="tel:{{ $config->zalo }}" class="footer-widget__contact__text">{{ $config->zalo }}</a>
                                </div>
                            </li>
                            <li class="footer-widget__contact__item">
                                <div class="footer-widget__contact__icon">
                                    <i class="icon-glove"></i>
                                </div>
                                <div class="footer-widget__contact__inner">
                                    <a href="https:{{ request()->getHost() }}" class="footer-widget__contact__text">{{ request()->getHost() }}</a>
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
                            <li class="footer-widget__links__item"><a href="{{ route('front.abouts') }}">Về chúng tôi</a></li>
                            <li class="footer-widget__links__item"><a href="{{ route('front.blogs') }}">Tin tức</a></li>
                            <li class="footer-widget__links__item"><a href="{{ route('front.services') }}">Dịch vụ</a></li>
                            <li class="footer-widget__links__item"><a href="{{ route('front.projects') }}">Dự án</a></li>
                            <li class="footer-widget__links__item"><a href="{{ route('front.contact') }}">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>

{{--                <div class="col-md-6 col-lg-3">--}}
{{--                    <div class="footer-widget footer-widget--image">--}}
{{--                        <div class="footer-widget__image">--}}
{{--                            <a href="tel:{{ $config->hotline }}" class="footer-widget__image__item">--}}
{{--                                <img src="{{ @$config->image->path ?? '' }}" alt="firdip">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
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
