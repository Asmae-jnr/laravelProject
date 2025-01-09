<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>A World</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Righteous&display=swap" rel="stylesheet">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
            <!-- Footer CSS -->
            <style>
               .footer_section {
                  background-color: #2b2278;
                  color: white;
                  padding: 40px 0;
               }
      
               .footer_section .location_main {
                  display: flex;
                  justify-content: space-around;
                  flex-wrap: wrap;
                  align-items: center;
               }
      
               .footer_section .call_text {
                  display: flex;
                  align-items: center;
                  margin-bottom: 10px;
               }
      
               .footer_section .call_text img {
                  margin-right: 10px;
               }
      
               .footer_section .call_text a {
                  color: white;
                  text-decoration: none;
                  font-size: 16px;
               }
      
               .footer_section .social_icons {
                  margin-top: 20px;
                  text-align: center;
               }
      
               .footer_section .social_icons a {
                  margin: 0 10px;
                  font-size: 24px;
                  color: white;
                  text-decoration: none;
               }
      
               .footer_section .social_icons a:hover {
                  color: #f1c40f; /* Or any color you prefer for hover effect */
               }

               .logo {
            width: 250px; /* Taille très petite pour le logo */
            height: auto;
            position: absolute;
            top: 20px; /* Ajuster la position verticale si nécessaire */
            left: 20px; /* Ajuster la position horizontale */
         }
            </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="header_main">
            <div class="mobile_menu">
               <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <div class="logo_mobile"><a href="index.html"><img src="images/logoT.png"></a></div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link " href="contact.html">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link " href="{{ route('register') }}">Register</a></li>
                     </ul>
                  </div>
               </nav>
            </div>
            <div class="container-fluid">
               <div class="logo"><a href="index.html"><img src="images/logoT.png"></a></div>
               <div class="menu_main">
                  <ul>
                     <li class="active"><a href="index.html">Home</a></li>
                     <li><a href="about.html">About</a></li>
                     <li><a href="contact.html">Contact us</a></li>
                     @if(Route::has('login'))
                        @auth
                        <li><a href="{{url('myappointment')}}">My Appointments</a></li>
                        <x-app-layout></x-app-layout>
                        @else
                           <li><a href="{{ route('login') }}">Login</a></li>
                           <li><a href="{{ route('register') }}">Register</a></li>
                        @endauth
                     @endif
                  </ul>
               </div>
            </div>
         </div>

            
@if(session()->has('message'))
<div class="alert alert-success">
   <button type="button" class="close" data-dismiss="alert">
   x
   </button>
   {{session()->get('message')}}
</div>
@endif


   <!-- Main Content Section -->
<!-- Main Content Section -->
<main class="container mt-5 mb-4cm">
   <div class="container mt-5">
      @guest
         <!-- Afficher seulement pour les visiteurs non connectés -->
         <h1 class="text-center mb-4 font-weight-bold text-primary">Welcome to SchedulEase</h1>
         <p class="text-center mb-4 font-italic text-muted">Your trusted platform for managing appointments efficiently.</p>
      @endguest

      @guest
         <!-- Section pour les visiteurs non connectés -->
         <div class="card shadow-lg p-5 mt-4 custom-card">
            <div class="card-body text-center">
               <h3 class="font-weight-bold text-dark mb-3">Book an Appointment</h3>
               <p class="text-muted mb-4">You need to log in to book an appointment.</p>
               <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 py-2 rounded-pill shadow-md">Login to Book an Appointment</a>
            </div>
         </div>
      @endguest
      <div style="height: 4cm;"></div> <!-- Section vide avec hauteur de 4 cm -->

   @auth
      <!-- Section pour les utilisateurs connectés -->
      <div class="card shadow-lg p-4 mt-4">
         <div class="card-body text-center">
            @include('user.appointement')
         </div>
      </div>
   @endauth

   @if(session()->has('message'))
      <div class="alert alert-success mt-3">
         <button type="button" class="close" data-dismiss="alert">x</button>
         {{ session()->get('message') }}
      </div>
   @endif
</main>


      {{-- <!-- Footer Section -->
      <footer class="footer_section layout_padding mt-5">
         <div class="container">
            <div class="location_main">
               <div class="call_text"><img src="{{ asset('images/call-icon.png') }}"></div>
               <div class="call_text"><a href="#">Call +01 1234567890</a></div>
               <div class="call_text"><img src="{{ asset('images/mail-icon.png') }}"></div>
               <div class="call_text"><a href="#">demo@gmail.com</a></div>
            </div>
         </div>
      </footer> --}}

            <!-- Footer Section -->
            <footer class="footer_section layout_padding mt-5">
               <div class="container">
                  <div class="location_main">
                     <div class="call_text">
                        <img src="images/call-icon.png" alt="phone">
                        <a href="tel:+0123456789">Call +01 1234567890</a>
                     </div>
                     <div class="call_text">
                        <img src="images/mail-icon.png" alt="email">
                        <a href="mailto:demo@gmail.com">demo@gmail.com</a>
                     </div>
                     <div class="call_text">
                        <img src="images/location-icon.png" alt="location">
                        <a href="#">1234 Street Name, City, Country</a>
                     </div>
                  </div>
      
                  <div class="social_icons">
                     <a href="https://facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
                     <a href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
                     <a href="https://linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a>
                     <a href="https://instagram.com" target="_blank"><i class="fa fa-instagram"></i></a>
                  </div>
               </div>
            </footer>

   {{-- <footer class="footer_section layout_padding mt-5">
      <div class="call_text"><img src="{{ asset('images/call-icon.png') }}"></div>
      <div class="call_text"><a href="#">Call +01 1234567890</a></div>
      <div class="call_text"><img src="{{ asset('images/mail-icon.png') }}"></div>
      <div class="call_text"><a href="#">demo@gmail.com</a></div>
   </footer> --}}

      <!-- Scripts -->
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
   </body>
</html>