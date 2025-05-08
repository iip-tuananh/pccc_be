<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('site.partials.head')
    @yield('css')
</head>

<body ng-app="App" class="custom-cursor" ng-cloak>
    <!-- Custom Cursor -->
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <!-- Preloader Start-->
    <div class="preloader">
        <div class="preloader__image" style="background-image: url(/site/images/loader.png);"></div>
    </div>
    <!-- Preloader End-->
    <div class="page-wrapper">
        @include('site.partials.header')
        @yield('content')
        @include('site.partials.footer')
    </div>


    @include('site.partials.angular_mix')

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="{{route('front.home-page')}}" aria-label="logo image"><img src="{{@$config->image->path ?? ''}}" width="155" alt="firdip logo"></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:{{ $config->email }}">{{ $config->email }}</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:{{ $config->hotline }}">{{ $config->hotline }}</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__social">
                <a href="{{$config->facebook}}"><i class="icon-facebook-f" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>
                <a href="{{ $config->twitter }}"><i class="icon-x-twitter" aria-hidden="true"></i> <span class="sr-only">Twitter</span></a>
                <a href="{{ $config->youtube }}"><i class="icon-youtube" aria-hidden="true"></i><span class="sr-only">youtube</span></a>
            </div><!-- /.mobile-nav__social -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->
    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="#">
                <input type="text" id="search" placeholder="Search Here...">
                <button type="submit" aria-label="search submit" class="firdip-btn firdip-btn--base">
                    <span><i class="icon-search1"></i></span>
                </button>
            </form>
        </div>
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__text">back top</span>
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
    </a>


    <!--  ALl JS Plugins =====================
        ====================================== -->
    <!--  jquery-3.7.0 js plugins -->
    <script src="/site/vendors/jquery/jquery-3.7.0.min.js"></script>
    <!--  Bootstrap js plugins -->
    <script src="/site/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/site/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <!--  jarallax js plugins -->
    <script src="/site/vendors/jarallax/jarallax.min.js"></script>
    <!--  jquery-ui js plugins -->
    <script src="/site/vendors/jquery-ui/jquery-ui.js"></script>
    <!--  jquery-ajaxchimp js plugins -->
    <script src="/site/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <!--  jquery-appear js plugins -->
    <script src="/site/vendors/jquery-appear/jquery.appear.min.js"></script>
    <!-- jquery-circle-progress js plugins -->
    <script src="/site/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <!--  magnific-popup js plugins -->
    <script src="/site/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <!--  validate js plugins -->
    <script src="/site/vendors/jquery-validate/jquery.validate.min.js"></script>
    <!--  nouislider js plugins -->
    <script src="/site/vendors/nouislider/nouislider.min.js"></script>
    <!--  wnumb js plugins -->
    <script src="/site/vendors/wnumb/wNumb.min.js"></script>
    <!--  owl-carousel js plugins -->
    <script src="/site/vendors/owl-carousel/js/owl.carousel.min.js"></script>
    <!--  Bootstrap js plugins -->
    <script src="/site/vendors/wow/wow.js"></script>
    <!--  wow js plugins -->
    <script src="/site/vendors/imagesloaded/imagesloaded.min.js"></script>
    <!--  isotope js plugins -->
    <script src="/site/vendors/isotope/isotope.js"></script>
    <!--  countdown js plugins -->
    <script src="/site/vendors/countdown/countdown.min.js"></script>
    <!--  Chart.js js plugins -->
    <script src="../../cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
    <!--  jquery-circleType js plugins -->
    <script src="/site/vendors/jquery-circleType/jquery.circleType.js"></script>
    <script src="/site/vendors/jquery-lettering/jquery.lettering.min.js"></script>
    <script src="/site/vendors/slick-carousel/slick.min.js"></script>
    <!-- template js -->
    <script src="/site/js/firdip.js"></script>

    <script>
        var CSRF_TOKEN = "{{ csrf_token() }}";
    </script>

    @stack('scripts')

</body>

</html>
