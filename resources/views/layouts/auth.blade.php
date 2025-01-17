<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<meta name="description" content="Mobile Application HTML5 Template">

	<meta name="copyright" content="MACode ID, https://www.macodeid.com/">

	<title>@yield('judul')</title>

  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">
  <link rel="manifest" href="{{asset('site.webmanifest')}}">
  <link rel="mask-icon" href="{{asset('safari-pinned-tab.svg')}}" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <!-- end favicon -->

	<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

<link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
<!--===============================================================================================-->
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
	.checkbox label:after, 
.radio label:after {
    content: '';
    display: table;
    clear: both;
}

.checkbox .cr,
.radio .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: left;
    margin-right: .5em;
}

.radio .cr {
    border-radius: 50%;
}

.checkbox .cr .cr-icon,
.radio .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 20%;
}

.radio .cr .cr-icon {
    margin-left: 0.04em;
}

.checkbox label input[type="checkbox"],
.radio label input[type="radio"] {
    display: none;
}

.checkbox label input[type="checkbox"] + .cr > .cr-icon,
.radio label input[type="radio"] + .cr > .cr-icon {
    transform: scale(3) rotateZ(-20deg);
    opacity: 0;
    transition: all .3s ease-in;
}

.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
.radio label input[type="radio"]:checked + .cr > .cr-icon {
    transform: scale(1) rotateZ(0deg);
    opacity: 1;
}
</style>
</head>
<body>

@yield('content')

<!--===============================================================================================-->
	<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="assets/js/login.js"></script>
	
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
