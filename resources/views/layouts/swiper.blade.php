<html __fvdsurfcanyoninserted="1" class=" clickberry-extension clickberry-extension-standalone clickberry-extension clickberry-extension-standalone clickberry-extension clickberry-extension-standalone">
  <head>
    <meta charset="UTF-8">
    <meta content="clickberry-extension-here">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">

    <link rel="stylesheet" type="text/css" href="showDetails.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <script src="https://unpkg.com/swiper/js/swiper.js"></script>
    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
    <script type="text/javascript" src="chrome-extension://bfbmjmiodbnnpllbbbfblcplfjjepjdn/js/injected.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arbutus+Slab&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

    <title>Vehicle Details</title>
</head>
<style>
@import url("https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700,800");
* {
  -webkit-box-sizing: border-box;
  box-sizing: border-box; }

body{
  background-color: #CBCBCB;
  font-family: 'Fira Sans', sans-serif;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex; }

.blog-slider {
  width: 100%;
  position: relative;
  max-width: 800px;
  margin: auto;
  background: #fff;
  -webkit-box-shadow: 0px 14px 80px rgba(129, 133, 223, 0.2);
  box-shadow: 0px 14px 80px rgba(129, 133, 223, 0.2);
  padding: 25px;
  border-radius: 25px;
  height: 300px;
  -webkit-transition: all .3s;
  -o-transition: all .3s;
  transition: all .3s; }
  @media screen and (max-width: 992px) {
    .blog-slider {
      max-width: 680px;
      height: 400px; } }
  @media screen and (max-width: 768px) {
    .blog-slider {
      min-height: 500px;
      height: auto;
      margin: 180px auto; } }
  @media screen and (max-height: 500px) and (min-width: 992px) {
    .blog-slider {
      height: 350px; } }
  .blog-slider__item {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center; }
    @media screen and (max-width: 768px) {
      .blog-slider__item {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column; } }
    .blog-slider__item.swiper-slide-active .blog-slider__img img {
      opacity: 1;
      -webkit-transition-delay: .3s;
      -o-transition-delay: .3s;
      transition-delay: .3s; }
    .blog-slider__item.swiper-slide-active .blog-slider__content > * {
      opacity: 1;
      -webkit-transform: none;
      -ms-transform: none;
      transform: none; }
      .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(1) {
        -webkit-transition-delay: 0.3s;
        -o-transition-delay: 0.3s;
        transition-delay: 0.3s; }
      .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(2) {
        -webkit-transition-delay: 0.4s;
        -o-transition-delay: 0.4s;
        transition-delay: 0.4s; }
      .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(3) {
        -webkit-transition-delay: 0.5s;
        -o-transition-delay: 0.5s;
        transition-delay: 0.5s; }
      .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(4) {
        -webkit-transition-delay: 0.6s;
        -o-transition-delay: 0.6s;
        transition-delay: 0.6s; }
      .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(5) {
        -webkit-transition-delay: 0.7s;
        -o-transition-delay: 0.7s;
        transition-delay: 0.7s; }
      .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(6) {
        -webkit-transition-delay: 0.8s;
        -o-transition-delay: 0.8s;
        transition-delay: 0.8s; }
      .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(7) {
        -webkit-transition-delay: 0.9s;
        -o-transition-delay: 0.9s;
        transition-delay: 0.9s; }
      .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(8) {
        -webkit-transition-delay: 1s;
        -o-transition-delay: 1s;
        transition-delay: 1s; }
      .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(9) {
        -webkit-transition-delay: 1.1s;
        -o-transition-delay: 1.1s;
        transition-delay: 1.1s; }
      .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(10) {
        -webkit-transition-delay: 1.2s;
        -o-transition-delay: 1.2s;
        transition-delay: 1.2s; }
      .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(11) {
        -webkit-transition-delay: 1.3s;
        -o-transition-delay: 1.3s;
        transition-delay: 1.3s; }
      .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(12) {
        -webkit-transition-delay: 1.4s;
        -o-transition-delay: 1.4s;
        transition-delay: 1.4s; }
      .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(13) {
        -webkit-transition-delay: 1.5s;
        -o-transition-delay: 1.5s;
        transition-delay: 1.5s; }
      .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(14) {
        -webkit-transition-delay: 1.6s;
        -o-transition-delay: 1.6s;
        transition-delay: 1.6s; }
      .blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(15) {
        -webkit-transition-delay: 1.7s;
        -o-transition-delay: 1.7s;
        transition-delay: 1.7s; }
  .blog-slider__img {
    width: 480px;
    -ms-flex-negative: 0;
    flex-shrink: 0;
    height: 340px;
    box-shadow: 4px 14px 14px 4px grey;
    border-radius: 20px;
    -webkit-transform: translateX(-80px);
    -ms-transform: translateX(-80px);
    transform: translateX(-80px);
    overflow: hidden; }
    .blog-slider__img:after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0.8; }
    .blog-slider__img img {
      width: 100%;
      height: 100%;
      -o-object-fit: cover;
      object-fit: cover;
      display: block;
      opacity: 0;
      border-radius: 20px;
      -webkit-transition: all .3s;
      -o-transition: all .3s;
      transition: all .3s; }
    @media screen and (max-width: 768px) {
      .blog-slider__img {
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        width: 90%; } }
    @media screen and (max-width: 576px) {
      .blog-slider__img {
        width: 95%; } }
    @media screen and (max-height: 500px) and (min-width: 992px) {
      .blog-slider__img {
        height: 270px; } }
  .blog-slider__content {
    padding-right: 25px; }
    @media screen and (max-width: 768px) {
      .blog-slider__content {
        margin-top: -80px;
        text-align: center;
        padding: 0 30px; } }
    @media screen and (max-width: 576px) {
      .blog-slider__content {
        padding: 0; } }
    .blog-slider__content > * {
      opacity: 0;
      -webkit-transform: translateY(25px);
      -ms-transform: translateY(25px);
      transform: translateY(25px);
      -webkit-transition: all .4s;
      -o-transition: all .4s;
      transition: all .4s; }
  .blog-slider__code {
    color: #000000;
    margin-bottom: 15px;
    display: block;
    font-weight: 500; }
  .blog-slider__title {
    font-size: 24px;
    font-weight: 700;
    color: #000000;
    margin-bottom: 20px; }
  .blog-slider__text {
    color: #000000;
    margin-bottom: 30px;
    line-height: 1.5em; }
  .blog-slider__button {
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    background-image: -webkit-linear-gradient(303deg, #CBCBCBCB 0%, #000000 74%);
    background-image: -o-linear-gradient(303deg, #CBCBCBCB 0%, #000000 74%);
    background-image: linear-gradient(147deg, #CBCBCBCB 0%, #000000 74%);
    padding: 15px 35px;
    border-radius: 50px;
    color: #fff;
    -webkit-box-shadow: 0px 14px 80px rgba(129, 133, 223, 0.2);
    box-shadow: 0px 14px 80px rgba(129, 133, 223, 0.2);
    text-decoration: none;
    font-weight: 500;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    text-align: center;
    letter-spacing: 1px; }
    @media screen and (max-width: 576px) {
      .blog-slider__button {
        width: 80%; } }
  .blog-slider .swiper-container-horizontal > .swiper-pagination-bullets, .blog-slider .swiper-pagination-custom, .blog-slider .swiper-pagination-fraction {
    bottom: 10px;
    left: 0;
    width: 100%; }
  .blog-slider__pagination {
    position: absolute;
    z-index: 21;
    right: 20px;
    width: 11px !important;
    text-align: center;
    left: auto !important;
    top: 50%;
    bottom: auto !important;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%); }
    @media screen and (max-width: 768px) {
      .blog-slider__pagination {
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        left: 50% !important;
        top: 205px;
        width: 100% !important;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center; } }
    .blog-slider__pagination.swiper-pagination-bullets .swiper-pagination-bullet {
      margin: 8px 0; }
      @media screen and (max-width: 768px) {
        .blog-slider__pagination.swiper-pagination-bullets .swiper-pagination-bullet {
          margin: 0 5px; } }
    .blog-slider__pagination .swiper-pagination-bullet {
      width: 11px;
      height: 11px;
      display: block;
      border-radius: 10px;
      background: #000;
      opacity: 0.2;
      -webkit-transition: all .3s;
      -o-transition: all .3s;
      transition: all .3s; }
      .blog-slider__pagination .swiper-pagination-bullet-active {
        opacity: 1;
        background: #000;
        height: 30px;
        -webkit-box-shadow: 0px 0px 20px rgba(129, 133, 223, 0.2);
        box-shadow: 0px 0px 20px rgba(129, 133, 223, 0.2); }
        @media screen and (max-width: 768px) {
          .blog-slider__pagination .swiper-pagination-bullet-active {
            height: 11px;
            width: 30px; } }

/* A bit of demo styles */
.demo-swiper .swiper-slide {
  font-size: 25px;
  font-weight: 300;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #fff;
  color: #000;
}
.demo-swiper .swiper-slide {
  box-sizing: border-box;
  border: 1px solid #ddd;
  background: #fff;
}
.demo-swiper {
  margin: 0px 0 35px;
  font-size: 18px;
  height: 120px;
}
.demo-swiper.demo-swiper-auto .swiper-slide {
  width: 85%;
}
.demo-swiper.demo-swiper-auto .swiper-slide:nth-child(2n) {
  width: 70%;
}
.demo-swiper.demo-swiper-auto .swiper-slide:nth-child(3n) {
  width: 30%;
}
@media (min-width: 768px) {
    .h-md-100 { height: 100vh; }
}
.btn-round {
  border-radius: 30px;
  }
.text-cyan {
  color: #35bdff;
  }
.centered img {
  width: 50vw;
}
body {
  background-color:#CBCBCB;
  color: #000;
  font-family: 'El Messiri', sans-serif;
  min-height: 100%;
  display: grid;
  grid-template-rows: 1fr auto;
}
html {
  height: 100%;
}
.footer {
  grid-row-start: 2;
  grid-row-end: 3;
}
.bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

@media (min-width: 768px) {
  .bd-placeholder-img-lg {
      font-size: 3.5rem;
      }
}
html{
  scroll-behavior: smooth;
}

.site-header {
  background-color: rgba(0, 0, 0, .85);
  -webkit-backdrop-filter: saturate(180%) blur(20px);
  backdrop-filter: saturate(180%) blur(20px);
}
.site-header a {
  color: #999;
  transition: ease-in-out color .15s;
}
.site-header a:hover {
  color: #fff;
  text-decoration: none;
}
.flex-equal > * {
  -ms-flex: 1;
  flex: 1;
}
@media (min-width: 768px) {
  .flex-md-equal > * {
    -ms-flex: 1;
    flex: 1;
  }
}

#rcorners {
  border-radius: 15px 50px;
  background: #343a40;
  padding: 20px;
  width:70vw;
  min-width: 60%;
  height: auto;
  min-height: 5%;
  font-family: 'Righteous', cursive;
  font-size: 4vw;
  color: #ffffff;
}

#cars{
  border-radius: 15px 50px;
}

#sumtitle{
  border-bottom: 50px solid #555;
	border-left: 25px solid transparent;
	border-right: 25px solid transparent;
  text-align: center;
	height: 0;
	width: 125px;
}

h1, h2, h3, h4, h5, h6 {
  font-family: 'El Messiri', sans-serif;
}

.pagination {
  justify-content: center;
}

.mainp {
  font-size: 20px;
  font-family: 'El Messiri', sans-serif;
}

.btn-home{
  font-family: 'El Messiri', sans-serif;
}

.overflow-hidden { overflow: hidden; }
</style>
  <body>
      <div id="app">
            @include('inc.navbar')
            @include('inc.messages')
        <main>
            <br><br>
            @yield('content')
        </main>
    </div>
    <footer>
      @include('inc.footer')
</footer>
  <script>
  var swiper = new Swiper('.blog-slider', {
      spaceBetween: 30,
      effect: 'fade',
      loop: true,
      mousewheel: {
        invert: false,
      },
      // autoHeight: true,
      pagination: {
        el: '.blog-slider__pagination',
        clickable: true,
      }
    });
  </script>
  </body>
</html>
