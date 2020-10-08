<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arbutus+Slab&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.js"></script>

    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
</head>
<style>
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
            @yield('content')
        </main>
    </div>
    <footer>
      @include('inc.footer')
</footer>
</body>
</html>
