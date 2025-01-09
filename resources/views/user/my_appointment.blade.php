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
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="header_main">
            <div class="mobile_menu">
               <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <div class="logo_mobile"><a href="index.html"><img src="images/logo.png"></a></div>
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
               <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
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

      <!-- Main Content -->
      <div class="container mt-5">
        <h2 class="text-center">My Appointments</h2>
        <table class="table table-bordered mt-4">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Date</th>
                 <th>Time</th>
                 <th>Message</th>
                 <th>Status</th>
                 <th>User ID</th>
                 <th>Created At</th>
                 <th>Updated At</th>
                 <th>Cancel Appointment</th>
              </tr>
           </thead>
           <tbody>
            @foreach($appoint as $appointment) <!-- Utiliser $appointment ici, pas $appoint -->
               <tr align="center">
                  <td>{{ $appointment->id }}</td>
                  <td>{{ $appointment->name }}</td>
                  <td>{{ $appointment->email }}</td>
                  <td>{{ $appointment->date }}</td>
                  <td>{{ $appointment->time }}</td>
                  <td>{{ $appointment->message }}</td>
                  <td>{{ $appointment->status }}</td>
                  <td>{{ $appointment->user_id }}</td>
                  <td>{{ $appointment->created_at }}</td>
                  <td>{{ $appointment->updated_at }}</td>
                  <td><a class="bt btn-danger" onclick="return confirm('are you sure to delete this')" href="{{url('cancel_appoint',$appointment->id)}}">Cancel</a></td>
               </tr>
            @endforeach
         </tbody>         
        </table>
     </div>

      <!-- Footer Section -->
      <footer class="footer_section layout_padding mt-5">
         <div class="container">
            <div class="location_main">
               <div class="call_text"><img src="{{ asset('images/call-icon.png') }}"></div>
               <div class="call_text"><a href="#">Call +01 1234567890</a></div>
               <div class="call_text"><img src="{{ asset('images/mail-icon.png') }}"></div>
               <div class="call_text"><a href="#">demo@gmail.com</a></div>
            </div>
         </div>
      </footer>

      <!-- Scripts -->
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
   </body>
</html>