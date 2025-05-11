<!-- ========== Meta Tags ========== -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="bracket-web">
<meta name="description" content="Firdip is beautifully designed Figma template especially for the fire department, fireman, fire prevention, fire fighting, fire station, protection, firefighter and all other fire & safety business and websites.">

<!-- ======== Page title ============ -->
<title>{{ $config->web_title }}</title>

<!-- ========== Favicon Icon ========== -->
<link rel="shortcut icon" href="/site/images/favicons/apple-touch-icon.png" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="/site/images/favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/site/images/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/site/images/favicons/favicon-16x16.png">
<link rel="manifest" href="/site/images/favicons/site.webmanifest">


<!-- fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">

<!-- ===========  All Stylesheet ================= -->
<!--  Bootstrap css plugins -->
<link rel="stylesheet" href="/site/vendors/bootstrap/css/bootstrap.min.css">
<!--  bootstrap-select css plugins -->
<link rel="stylesheet" href="/site/vendors/bootstrap-select/bootstrap-select.min.css">
<!--  animate css plugins -->
<link rel="stylesheet" href="/site/vendors/animate/animate.min.css">
<!--  fontawesome css plugins -->
<link rel="stylesheet" href="/site/vendors/fontawesome/css/all.min.css">
<!--  jquery-ui css plugins -->
<link rel="stylesheet" href="/site/vendors/jquery-ui/jquery-ui.css">
<!--  jarallax css plugins -->
<link rel="stylesheet" href="/site/vendors/jarallax/jarallax.css">
<!--  magnific-popup css plugins -->
<link rel="stylesheet" href="/site/vendors/jquery-magnific-popup/jquery.magnific-popup.css">
<!--  nouislider css plugins -->
<link rel="stylesheet" href="/site/vendors/nouislider/nouislider.min.css">
<!--  nouislider css plugins -->
<link rel="stylesheet" href="/site/vendors/nouislider/nouislider.pips.css">
<!--  nouislider css plugins -->
<link rel="stylesheet" href="/site/vendors/firdip-icons/style.css">
<!--  slider css plugins -->
<link rel="stylesheet" href="/site/vendors/owl-carousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="/site/vendors/owl-carousel/css/owl.theme.default.min.css">

<link rel="stylesheet" href="/site/vendors/slick-carousel/slick.css">
<link rel="stylesheet" href="/site/vendors/slick-carousel/slick-theme.css">
<!-- template styles -->
<link rel="stylesheet" href="/site/css/firdip.css">

<style>
    /* Style chung cho dropdown */
    .main-menu .main-menu__list li ul {
        position: absolute;
        top: 100%;
        left: -25px;
        min-width: 235px;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        opacity: 0;
        visibility: hidden;
        transform-origin: top center;
        transform: scaleY(0) translateZ(100px);
        transition: opacity 500ms ease, visibility 500ms ease, transform 700ms ease;
        z-index: 99;
        background-color: #fff !important;
        padding: 15px 0;               /* bỏ padding ngang, cho từng li tự nhận padding */
        border-radius: 4px;            /* bo góc khung dropdown */
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    /* Mỗi mục trong dropdown */
    .main-menu .main-menu__list li ul li {
        width: 100%;
        padding: 10px 20px;            /* khoảng cách trong từng item */
        border-bottom: 1px solid rgba(0,0,0,0.1); /* đường kẻ dưới mỗi item */
    }

    /* Bỏ kẻ dưới mục cuối cùng */
    .main-menu .main-menu__list li ul li:last-child {
        border-bottom: none;
    }

    /* Link trong mỗi mục */
    .main-menu .main-menu__list li ul li a {
        display: block;
        color: #333;
        font-size: 14px;
        text-decoration: none;
        transition: color .3s;
    }

    /* Hover state */
    .main-menu .main-menu__list li ul li:hover,
    .main-menu .main-menu__list li ul li a:hover {
        /*background-color: rgba(0,0,0,0.03);*/
        color: var(--primary-color, #e74c3c);
    }

    /* Khi dropdown mở */
    .main-menu .main-menu__list li:hover > ul {
        opacity: 1;
        visibility: visible;
        transform: scaleY(1) translateZ(0);
    }
</style>
