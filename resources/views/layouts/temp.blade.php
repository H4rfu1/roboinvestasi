<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="dicoding:email" content="takun917@gmail.com">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">
  <link rel="manifest" href="{{asset('site.webmanifest')}}">
  <link rel="mask-icon" href="{{asset('safari-pinned-tab.svg')}}" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <!-- end favicon -->

  <title>@yield('title')</title>
  <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/maicons.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

  <link rel="stylesheet" href="{{asset('assets/vendor/animate/animate.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
  
@if(Route::current()->getName() == 'profsiko' || Route::current()->getName() == 'diskusi' || Route::current()->getName() == 'tools')
  <link rel="stylesheet" href="{{asset('css/profsiko.css')}}">
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
@elseif(Route::current()->getName() == 'profil')
  <link rel="stylesheet" href="{{asset('css/profil.css')}}">
@endif
@if(Route::current()->getName() == 'tools')
<script>
      function countChar1(val) {  
        var len = val.value.length;
        if (len >= 51) {
          val.value = val.value.substring(0, 50);
        } else {
          $('#charNum1').text(50 - len);
        }
      };

      function countChar2(val) {
        var len = val.value.length;
        if (len >= 251) {
          val.value = val.value.substring(0, 250);
        } else {
          $('#charNum2').text(250 - len);
        }
      };
    </script>
    <style>
      .carousel-indicators li {
    border-radius: 12px;
    width: 12px;
    height: 12px;
    background-color: #009747;
}
    </style>
@endif

  <style>
  .page-banner{
    background: #7F7FD5;
    background: -webkit-linear-gradient(135deg, #00961D 0%, #045A48 80%);
    background: linear-gradient(135deg, #00961D 0%, #045A48 80%);
	}

  .modal-backdrop {
    z-index: 100000 !important;
  }

  .modal {
    z-index: 100001 !important;
  }
  </style>
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
          <ul class="navbar-nav ml-auto ">
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
          </ul>
          @if(Auth::check())
            <div class="ml-auto my-2 my-lg-0">
              <div class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle user-action text-black text-decoration-none">
                  @if(auth()->user()->photo)
                      <img src="{{ auth()->user()->photo }}" alt="photo" width="32" height="32" style="margin-right: 8px;">
                  @else
                  <img src="{{asset('assets/img/person.png')}}" style="max-width:40px" class="rounded-circle mr-1" alt="Avatar">
                  @endif
                  {{Auth::user()->name}}
                  <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="{{url('/profil')}}" class="text-decoration-none"><i class="fa fa-user-o"></i> Profil</a></li>
                  <!-- <li><a href="#" class="text-decoration-none"><i class="fa fa-calendar-o"></i> Calendar</a></li>
                  <li><a href="#" class="text-decoration-none"><i class="fa fa-sliders"></i> Settings</a></li> -->
                  <li class="dropdown-divider"></li>
                  <li><a href="#" data-toggle="modal" data-target="#exampleModal" class="text-decoration-none"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
              </div>
            </div>
            @else
            <div class="ml-auto my-2 my-lg-0">
              <a class="btn btn-light" href="{{url('register')}}">Daftar</a>
              <a class="btn btn-primary ml-1" href="{{url('login')}}">Masuk</a>
            </div>
            @endif
        </div>

      </div>
    </nav>
  @if(Route::current()->getName() == 'homepage')
    <div class="container">
      <div class="page-banner home-banner">
        <div class="row align-items-center flex-wrap-reverse h-100">
          <div class="col-md-6 py-5 wow fadeInLeft">
          <div class="d-flex justify-content-center mb-5">
              <img class="img-fluid" src="{{asset('assets/img/avatar100.png')}}" alt="">
            </div>
            <h1 class="mb-4 text-white text-center">Mari Melek Finansial!</h1>
            <p class="text-lg text-white mb-5 text-center">RoboInvestasi siap membantu anda <i>"Finansial Freedom"</i> dengan berinvestasi.</p>
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
                 <li class="breadcrumb-item "><a href="{{url('alat')}}">Alat</a></li>
                @else
                  <li class="breadcrumb-item"><a href="{{url('')}}" style="color:#00BF26">Home</a></li>
                @endif
                <li class="breadcrumb-item active text-white">@yield('breadcrumb')</li>
              </ul>
            </nav>
            <h1 class="text-center text-white">@yield('title2')</h1>
          </div>
        </div>
      </div>
    </div>
  </header>
  @endif
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
              @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin keluar?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Logout</button>
      </div>
      </form>
    </div>
  </div>
</div>

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
<script>
    $('.modal').on('shown.bs.modal', function() {
    $(this).find('[autofocus]').focus();
  });
  </script>
  
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