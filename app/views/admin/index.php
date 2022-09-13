

<?php require APPROOT . '/views/inc/header.php';?>

  <?php require APPROOT . '/views/inc/admin_navbar.php'; ?>

  <div class="container jumbotron pt-4 pb-4 mt-3 admin-index bg-dark text-white">
 

      
      
  <h1 class="display-5 mt-5 ">Avida Hotel Dashboard </h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">


  <div class="row list-unstyled">
          <div class="col-md-4 ">
            <div><b> Rooms :</b></div>
            <li style="font-size: 16px; ">Added rooms :  <b><?php echo $data['added-rooms']?></b></li >
            

           
          </div>
          <div class="col-md-4">
          <div><b> Users : </b></div>
         
          <li style="font-size: 16px; ">users:  <b><?php echo $data['users']?> </b></li>

  
          </div>
          <div class="col-md-4">
          <div><b> Transanction :</b></div>
          <li style="font-size: 16px; ">Pending bookings:   <b><?php echo $data['added-book']?></b> </li>


     
          </div>
        </div>

 


</div>



<?php require APPROOT . '/views/inc/script_bootstrap.php';?>





