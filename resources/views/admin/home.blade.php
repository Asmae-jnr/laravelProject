<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    
    <style>
      /* Arrière-plan sombre */
      body {
        /* background-color: #1e1e2f; */
        color: #ffffff;
        margin: 0;
        font-family: Arial, sans-serif;
      }

      /* Conteneur principal */
      .welcome-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%;
      }

      .welcome-box {
        background-color: #2a2a3c;
        border-radius: 10px;
        margin-top: 40px;
        padding: 60px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        text-align: center;
        max-width: 600px;
        width: 90%;
      }

      .welcome-title {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 10px;
      }

      .welcome-message {
        font-size: 18px;
        line-height: 1.5;
        margin-bottom: 20px;
      }

      .btn-dashboard {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4caf50;
        color: #ffffff;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        transition: background-color 0.3s ease;
      }

      .btn-dashboard:hover {
        background-color: #388e3c;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- Sidebar -->
      @include('admin.sidebar')
      @include('admin.navbar')


      <!-- Section principale -->
      <div class="welcome-container">
        <div class="welcome-box">
          <h1 class="welcome-title">👋 Welcome, Admin!</h1>
          <p class="welcome-message">
            We are glad to have you back. Manage your users, appointments, and settings seamlessly from your dashboard.
          </p>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <script src="admin/assets/js/dashboard.js"></script>
  </body>
</html>
