<!-- appointment section start -->
<div class="appointment_section layout_padding">
   <div class="container">
      <h1 class="appointment_taital text-center mb-4 custom-title">Book an Appointment</h1>
      <p class="appointment_text text-center mb-4 custom-subtitle">Schedule your appointment quickly and easily using the form below.</p>      <form action="{{ url('appointement') }}" method="POST" class="shadow-lg p-4 rounded-lg bg-white">
         @csrf
         <div class="row">
            <div class="col-md-6">
               <div class="form-group mb-3">
                  <label for="name" class="font-weight-bold">Full Name</label>
                  <input type="text" class="form-control form-control-lg border-0 shadow-sm rounded-pill" id="name" name="name" placeholder="Enter your full name" required>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group mb-3">
                  <label for="email" class="font-weight-bold">Email</label>
                  <input type="email" class="form-control form-control-lg border-0 shadow-sm rounded-pill" id="email" name="email" placeholder="Enter your email" required>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group mb-3">
                  <label for="date" class="font-weight-bold">Preferred Date</label>
                  <input type="date" class="form-control form-control-lg border-0 shadow-sm rounded-pill" id="date" name="date" required>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group mb-3">
                  <label for="time" class="font-weight-bold">Preferred Time</label>
                  <input type="time" class="form-control form-control-lg border-0 shadow-sm rounded-pill" id="time" name="time" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group mb-3">
                  <label for="message" class="font-weight-bold">Message</label>
                  <textarea class="form-control form-control-lg border-0 shadow-sm rounded" id="message" name="message" rows="4" placeholder="Additional details..."></textarea>
               </div>
            </div>
            <div class="col-md-12 text-center">
               <button type="submit" class="btn btn-primary btn-lg shadow-lg px-4 py-2 rounded-pill">Book Appointment</button>
            </div>
         </div>
      </form>
   </div>
</div>

 <!-- appointment section end  -->
 {{-- {{ route('user.appointment') }} --}}

 <!-- CSS Styles -->
<style>
   .custom-title {
      font-size: 3rem; /* Taille de police plus grande */
      font-weight: bold;
      color: #2a9df4; /* Couleur bleue */
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1); /* Effet d'ombre */
      text-transform: uppercase; /* Mettre en majuscules */
   }

   .custom-subtitle {
      font-size: 1.5rem; /* Taille de police augmentée */
      color: #555; /* Couleur gris clair */
      font-weight: 400;
      font-style: italic; /* Texte en italique */
   }
</style>
 