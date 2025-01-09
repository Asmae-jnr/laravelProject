<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />

    <!-- Custom CSS -->
    <style>
      /* Centrage global de la page */
      .page-body-wrapper {
          display: flex;
          justify-content: center;
          align-items: flex-start;
          min-height: 100vh;
          background-color: #202838;
          overflow-x: hidden;
      }

      /* Style pour le conteneur de la table */
      .table-container {
          width: 90%;
          max-width: 1200px;
          margin: 20px auto;
          background: #1e1e2f;
          border-radius: 10px;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
          padding: 20px;
          overflow-x: auto; /* Ajout d'un défilement horizontal si nécessaire */
      }

      /* Style de la table */
      .table {
          width: 100%;
          border-collapse: collapse;
          margin-top: 20px;
      }

      /* Style du header de la table */
      .table thead {
          background-color: #44475a;
          color: #f8f8f2;
          text-align: center;
      }

      .table th, .table td {
          padding: 12px 15px;
          text-align: center;
          border-bottom: 1px solid #44475a;
      }

      /* Style des lignes du tableau */
      .table tbody tr {
          background-color: #282a36;
      }

      .table tbody tr:hover {
          background-color: #44475a;
      }

      /* Style des boutons */
      .btn {
          border-radius: 5px;
          padding: 5px 10px;
          font-size: 0.9em;
      }

      .btn-success {
          background-color: #4CAF50;
          border: none;
      }

      .btn-success:hover {
          background-color: #388E3C;
      }

      .btn-danger {
          background-color: #D32F2F;
          border: none;
      }

      .btn-danger:hover {
          background-color: #B71C1C;
      }

      /* Titre */
      h2 {
          text-align: center;
          margin-bottom: 20px;
          font-size: 1.8em;
          color: #f8f8f2;
      }

      /* Responsiveness */
      @media (max-width: 768px) {
          .table-container {
              width: 95%;
          }

          .table th, .table td {
              font-size: 0.9em;
              padding: 8px;
          }

          .btn {
              font-size: 0.8em;
          }
      }

      @media (max-width: 480px) {
          .table-container {
              padding: 10px;
          }

          .table th, .table td {
              font-size: 0.8em;
              padding: 5px;
          }

          .btn {
              font-size: 0.7em;
              padding: 4px 8px;
          }
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- Sidebar inclusion -->
      @include('admin.sidebar')
      
      <div class="container-fluid page-body-wrapper">
        <div class="table-container">
          <h2>Appointment List</h2>
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Message</th>
                  <th>User ID</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Status</th>
                  <th>Approved</th>
                  <th>Canceled</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $appointment)
                  <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->name }}</td>
                    <td>{{ $appointment->email }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>{{ $appointment->time }}</td>
                    <td>{{ $appointment->message }}</td>
                    <td>{{ $appointment->user_id }}</td>
                    <td>{{ $appointment->created_at }}</td>
                    <td>{{ $appointment->updated_at }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td>
                      <a class="btn btn-success" href="{{ url('approved', $appointment->id) }}">
                        Approve
                      </a>
                    </td>
                    <td>
                      <a class="btn btn-danger" href="{{ url('canceled', $appointment->id) }}">
                        Cancel
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

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
