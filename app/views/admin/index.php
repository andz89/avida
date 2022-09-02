

<?php require APPROOT . '/views/inc/header.php';?>

  <?php require APPROOT . '/views/inc/admin_navbar.php'; ?>

  <div class="container jumbotron pt-4 pb-4 mt-3 admin-index">
    <div class="btns-top">
    <li>
    <a class="btn btn-primary btn-md "  href="<?php echo URLROOT;?>/pages/index" role="button">Go to Avida Hotel Website</a>
    </li>
  <li>
  <a class="nav-link " href="<?php echo URLROOT; ?>/users/logout">Logout</a>

  </li>
    </div>

      
      
  <h1 class="display-5 mt-5 ">Avida Hotel Dashboard</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <span class="bg-secondary py-1 px-2 radius-3 mr-2"><span style="font-size: 16px; font-weight: bold;"> Total No. of booking for this month:</span> <strong> 16</strong> </span>
  <span class="bg-secondary py-1 px-2 radius-3"><span style="font-size: 16px; font-weight: bold;">Total No. of added rooms: </span> <strong><?php echo $data['added-rooms']?> </strong> </span>


 


</div>
<div class="container mb-5 d-flex justify-content-center ">
<div class="card mr-5 p-2 " style="width: 18rem;">
            <a href="<?php echo URLROOT; ?>/admin/rooms"> <img class="card-img-top" src="<?php echo URLROOT;?>/images/room-a.png" alt="Card image cap"></a>
            <div class="card-body">
                <h4 class="room-title text-center">Avida Rooms</h4>
            </div>
      </div>
      <div class="card mr-5 p-2" style="width: 18rem;">
            <a href="<?php echo URLROOT; ?>/admin/index"> <img class="card-img-top" src="<?php echo URLROOT;?>/images/room-b.png" alt="Card image cap"></a>
            <div class="card-body">
                <h4 class="room-title text-center">Bookings</h4>
            </div>
      </div>
</div>






