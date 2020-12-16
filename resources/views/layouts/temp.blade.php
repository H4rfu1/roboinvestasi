<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="dicoding:email" content="takun917@gmail.com">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="/{{asset('android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
  <!-- end favicon -->

  <title>@yield('title')</title>

  <link rel="stylesheet" href="{{asset('assets/css/maicons.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

  <link rel="stylesheet" href="{{asset('assets/vendor/animate/animate.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
@if(Route::current()->getName() == 'profsiko')
  <link rel="stylesheet" href="{{asset('css/profsiko.css')}}">
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
 @endif
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
      <div class="container">
        <a href="{{url('')}}" class="mr-4"><img src="{{asset('assets/img/logo60.png')}}" alt="logo" ></a>
        <a href="{{url('')}}" class="navbar-brand">Robo<span class="text-primary">Investasi.</span></a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
              <a class="nav-link" href="{{url('')}}">Home</a>
            </li>
            <li class="nav-item {{ (request()->is('alat*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{url('alat')}}">Alat</a>
            </li>
            <li class="nav-item {{ (request()->is('blog*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{url('blog')}}">Blog</a>
            </li>
            <li class="nav-item {{ (request()->is('diskusi*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{url('diskusi')}}">Diskusi</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-2" href="{{url('login')}}">Masuk</a>
            </li>
          </ul>
        </div>

      </div>
    </nav>
  @if(Route::current()->getName() == 'homepage')
    <div class="container">
      <div class="page-banner home-banner">
        <div class="row align-items-center flex-wrap-reverse h-100">
          <div class="col-md-6 py-5 wow fadeInLeft">
            <h1 class="mb-4">Mari Melek Finansial!</h1>
            <p class="text-lg text-grey mb-5">RoboInvestasi siap membantu anda <i>"Finansial Freedom"</i> dengan berinvestasi.</p>
            <!-- <a href="#about" class="btn btn-primary btn-split" >Mulai<div class="fab"><span class="mai-play"></span></div></a> -->
          </div>
          <div class="col-md-6 py-5 wow zoomIn">
            <div class="img-fluid text-center">
              <img src="{{asset('assets/img/banner_image_1.svg')}}" alt="">
            </div>
          </div>
        </div>
        <a href="#about" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a>
      </div>
    </div>
  </header>
  @else
  <div class="container">
      <div class="page-banner">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                @if(Route::current()->getName() == 'pilreksa')
                 <li class="breadcrumb-item"><a href="{{url('alat')}}">Alat</a></li>
                @else
                  <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                @endif
                <li class="breadcrumb-item active">@yield('breadcrumb')</li>
              </ul>
            </nav>
            <h1 class="text-center">@yield('title2')</h1>
          </div>
        </div>
      </div>
    </div>
  </header>
  @endif

    @yield('page')

    <footer class="page-footer bg-image" style="background-image: url({{asset('assets/img/world_pattern.svg')}});">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-3 py-3">
          <h3>RoboInvestasi</h3>
          <p>Bantu kami meningkatkan manfaat dari website ini dengan kunjungi sosial media dan silakan mail, DM atau berkomentar di post yang telah kami buat.</p>

          <div class="social-media-button">
            <a href="mailto:kulitekno@gmail.com"><span class="mai-logo-google-plus-g"></span></a>
            <a href="https://instagram.com/roboinvestasi"><span class="mai-logo-instagram"></span></a>
          </div>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Organisasi</h5>
          <ul class="footer-menu">
            <li><a href="{{url('about')}}">Tentang kami</a></li>
            <li><a href="https://api.whatsapp.com/send?phone=6283111712794&text=Saya%20mau%20beriklan%20dalam%20laman%20ini.">Periklanan</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Help & Support</a></li>
          </ul>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Hubungi Kami</h5>
          <p>Jln. Raya Sabang Merauke 17, Banyuwangi, Jawa Timur, Indonesia</p>
          <a href="#" class="footer-link">+62 8311 1712 794</a>
          <a href="#" class="footer-link">kulitekno@gmail.com</a>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Newsletter</h5>
          <p>Dapatkan update, berita atau event yang dikirim di emailmu.</p>
          <form action="#">
            <input type="text" class="form-control" placeholder="Masukan email..">
            <button type="submit" class="btn btn-success btn-block mt-2">Subscribe</button>
          </form>
        </div>
      </div>

      <p class="text-center" id="copyright">Copyright &copy; 2020. This template design and develop by <a href="https://macodeid.com/" target="_blank">MACode ID</a></p>
    </div>
  </footer>

<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/js/google-maps.js')}}"></script>

<script src="{{asset('assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{asset('assets/js/theme.js')}}"></script>
@if(Route::current()->getName() == 'profsiko')
  <script src="{{asset('js/profsiko.js')}}"></script>
@endif

@if(Route::current()->getName() == 'contact')
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>
@elseif(Route::current()->getName() == 'pilreksa')
  <script>
    $(document).ready(function(){
    // membatasi jumlah inputan
    var maxGroup = 10;
    //melakukan proses multiple input 
    $(".addMore").click(function(){
        if($('body').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
            $('body').find('.fieldGroup:last').after(fieldHTML);
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });
    
    //remove fields group
    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroup").remove();
      });
    });
	</script>
@endif

<!-- Bot -->
<script>
	  window.watsonAssistantChatOptions = {
		  integrationID: "e37bf3d6-57e7-4dcf-9d75-337c653e7e32", // The ID of this integration.
		  region: "us-south", // The region your integration is hosted in.
		  serviceInstanceID: "b31b47e4-6a60-43bd-87e6-5091322d7ff2", // The ID of your service instance.
		  
      // Config option to change Carbon themes.
      carbonTheme: 'g10',
    onLoad: function(instance) {
      // Instance method to adjust specific CSS variables
      instance.updateCSSVariables({
        'BASE-font-family': '"Times New Roman", Times, serif',
        '$active-primary': '#009747',
        '$focus': '#045A48',
        '$hover-primary': '#045A48',
        '$interactive-01': '#009747'
      });
      instance.render();
    }
		};
	  setTimeout(function(){
		const t=document.createElement('script');
		t.src="https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
		document.head.appendChild(t);
	  });
	</script>
  
</body>
</html>