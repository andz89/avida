

<?php require APPROOT . '/views/inc/header.php';?>

  <?php require APPROOT . '/views/inc/admin_navbar.php'; ?>

  <div class="container jumbotron pt-4 pb-4 mt-3 admin-index bg-dark text-white">
 

      
      
  <h1 class="display-5 mt-5 ">Avida Hotel Dashboard </h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">




 


</div>

<div class="container  mx-auto p-0 my-0">

<div class="row flex-lg-row align-items-center justify-content-center  list-unstyled">
<div class="  col-lg-6  ">

  <ul class="list-group mb-2">
  <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white">
  Rooms :
    <span class=" badge-primary badge-pill">  <?php echo $data['added-rooms']?> </span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center  bg-dark text-white">
  Users :
    <span class=" badge-primary badge-pill">  <?php echo $data['users']?> </span>
  </li>
  
</ul>
</div>

<div class="  col-lg-6  ">

  <ul class="list-group mb-2" >
  <li class="list-group-item d-flex justify-content-between align-items-center  bg-dark text-white">
  bookings : 
    <span class=" badge-primary badge-pill "><?php echo $data['added-book']?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center  bg-dark text-white">
  Tatal Booking Fee Recieved : 
    <span class=" badge-primary badge-pill"> <?php echo number_format($data['payment_received']) ?> Pesos</span>
  </li>
</ul>
</div>
</div>
</div>



<?php require APPROOT . '/views/inc/script_bootstrap.php';?>





