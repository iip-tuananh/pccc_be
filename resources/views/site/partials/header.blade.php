<div class="topbar-one">
    <div class="container-fluid">
        <div class="topbar-one__inner">
            <ul class="list-unstyled topbar-one__info">
                <li class="topbar-one__info__item">
                    <i class="icon-pin topbar-one__info__icon"></i>
                    <span class="topbar-one__info__item__location">{{ $config->address_company }}</span>
                </li>
                <li class="topbar-one__info__item">
                    <i class="icon-message topbar-one__info__icon"></i>
                    <a href="mailto:{{ $config->email }}">{{ $config->email }}</a>
                </li>
            </ul>
            <div class="topbar-one__right">
                <div class="topbar-one__social">
                    <a href="{{$config->facebook}}"><i class="icon-facebook-f" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>
                    <a href="{{ $config->twitter }}"><i class="icon-x-twitter" aria-hidden="true"></i> <span class="sr-only">Twitter</span></a>
                    <a href="{{ $config->youtube }}"><i class="icon-youtube" aria-hidden="true"></i><span class="sr-only">youtube</span></a>
                </div>
            </div>
        </div>
    </div>
</div>

<header class="main-header sticky-header sticky-header--normal">
    <div class="container-fluid">
        <div class="main-header__inner">
            <div class="main-header__logo logo-firdip">
                <a href="{{ route('front.home-page') }}">
                    <img src="{{@$config->image->path ?? ''}}" alt="firdip HTML" width="130">
                </a>
            </div>
            <nav class="main-header__nav main-menu">
                <ul class="main-menu__list">

                    <li>
                        <a href="{{ route('front.home-page') }}">Trang chủ</a>
                    </li>

                    <li>
                        <a href="{{route('front.abouts')}}">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="{{route('front.services')}}">Dịch vụ</a>
                    </li>
                    <li>
                        <a href="{{route('front.projects')}}">Dự án</a>
                    </li>
                    <li>
                        <a href="{{route('front.blogs')}}">Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('front.contact') }}">Liên hệ</a>
                    </li>
                </ul>
            </nav>
            <div class="main-header__right">

                <a href="tel:+92-3800-8060" class="main-header__right__call">
                    <div class="main-header__right__icon">
                        <i class="icon-call"></i>
                    </div>
                    <div class="main-header__right__content">
                        <div class="main-header__right__text">Hotline</div>
                        <div class="main-header__right__number">{{ $config->hotline }}</div>
                    </div>
                </a>
                <div class="mobile-nav__btn mobile-nav__toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</header>
