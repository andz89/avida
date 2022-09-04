

<?php require APPROOT . '/views/inc/header.php';?>

  <?php require APPROOT . '/views/inc/admin_navbar.php'; ?>

  <div class="container jumbotron pt-4 pb-4 mt-3 admin-index bg-dark text-white">
 

      
      
  <h1 class="display-5 mt-5 ">Avida Hotel Dashboard</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">

   <span style="font-size: 16px; ">Total No. of booking added:   <b><?php echo $data['added-book']?></b> </span>
    <br>
  <span style="font-size: 16px; ">Total No. of added rooms:  <b><?php echo $data['added-rooms']?></b></span>
   <br>
  <span style="font-size: 16px; ">Total No. of users:  <b><?php echo $data['users']?> </b></span>


</span>


 


</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>





