<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- Custom styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <style>
      label {
        color: #000; /* Noir pour une bonne visibilité */
        font-weight: bold; /* Gras pour améliorer la lisibilité */
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')

      <div class="container-fluid page-body-wrapper">
        <div class="container" style="padding: 50px; max-width: 600px;">
          <h3 class="text-center mb-4">Edit User</h3>
          <form action="{{url('edituser', $data->id)}}" method="POST" enctype="multipart/form-data" class="p-4 shadow rounded bg-white">
            @csrf

            <!-- User Name -->
            <div class="mb-3">
              <label for="name" class="form-label">User Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}" required>
            </div>

            <!-- Phone Number -->
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="phone" name="phone" value="{{$data->phone}}" required>
            </div>

            <!-- Appointment Time -->
            <div class="mb-3">
              <label for="time" class="form-label">Appointment Time</label>
              <input type="datetime-local" class="form-control" id="time" name="time" value="{{ $data->appointement->date ?? '' }}">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Required JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/js/misc.js"></script>
  </body>
</html>
