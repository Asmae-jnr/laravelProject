<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin - User List</title>
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
          justify-content: center; /* Centre horizontalement */
          align-items: center; /* Centre verticalement */
          height: 100vh; /* Prend toute la hauteur de l'écran */
          background-color: #202838; /* Légère couleur de fond */
      }

      /* Style pour le conteneur de la table */
      .table-container {
          width: 80%;
          max-width: 1000px;
          margin: 0 auto;
          background: black;
          border-radius: 10px;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
          padding: 20px;
          overflow: hidden;
      }

      /* Style de la table */
      .table {
          width: 100%;
          border-collapse: collapse;
          margin-top: 20px;
      }

      /* Style du header de la table */
      .table thead {
          background-color: #d3d3d3; /* Fond gris pour le header */
          color: black; /* Texte en noir */
          text-align: center;
      }

      /* Style des cellules */
      .table th, .table td {
          padding: 12px 15px;
          text-align: center;
          border-bottom: 1px solid #ddd;
          color: rgb(255, 255, 255); /* Texte blanc */
      }

      /* Lignes du tableau */
      .table tbody tr {
          background-color: #d3d3d3; /* Fond gris clair */
      }

      .table tbody tr:hover {
          background-color: #c0c0c0; /* Gris plus clair au survol */
      }

      /* Style des boutons */
      .btn {
          border-radius: 5px;
          padding: 5px 10px;
          font-size: 0.9em;
      }

      .btn-primary {
          background-color: #1976D2;
          border: none;
      }

      .btn-primary:hover {
          background-color: #1565C0;
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
          color: white;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')
      
      <div class="container-fluid page-body-wrapper">
        <div class="table-container">
          <h2>User List</h2>
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Time</th>
                  <th>Date</th>
                  <th>Update</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $user)
                @if($user->appointments->isNotEmpty())
                  @foreach($user->appointments as $appointment)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->phone }}</td>
                      <td>{{ $appointment->time }}</td>
                      <td>{{ $appointment->date }}</td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="{{ url('updateuser', $user->id) }}">
                          Update
                        </a>
                      </td>
                      <td>
                        <a onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger btn-sm" href="{{ url('deleteuser', $user->id) }}">
                          Delete
                        </a>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td colspan="2">No Appointment</td>
                    <td>
                      <a class="btn btn-primary btn-sm" href="{{ url('updateuser', $user->id) }}">
                        Update
                      </a>
                    </td>
                    <td>
                      <a onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger btn-sm" href="{{ url('deleteuser', $user->id) }}">
                        Delete
                      </a>
                    </td>
                  </tr>
                @endif
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
