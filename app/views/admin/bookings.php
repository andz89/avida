<?php require APPROOT . '/views/inc/header.php';?>

  <?php require APPROOT . '/views/inc/admin_navbar.php'; ?>

<div class="container col-md-8 mx-auto my-3">
    
<div class="list-group ">
    <div class="bg-dark p-4 text-white">
        <h4>List of Bookings</h4>
        <hr class="my-4 bg-white p-0 m-0">
        <span>Total no. of bookings: <b><?php echo $data['total_bookings'] ?> </b></span>
    </div>
<?php foreach($data['booking'] as  $booking): ?>

            <div class="list-group-item  flex-column align-items-start  my-2">
              <div  class="d-flex w-100 justify-content-between">

                 
                  <div>
                  <span class=""> <b> Booking ID: </b><?php echo $booking->booking_id?></span>

                  <h6> <b>User name:</b> <?php echo $booking->user_name?></h6>
                  </div>
            
              <div>
              <span class="btn btn-primary btn-sm" data-toggle="collapse" href="#<?php echo $booking->id?>" role="button" aria-expanded="false" aria-controls="<?php echo $booking->id?>">
             View
            </span>
              </div>
              </div>
            
            
            <div class="d-flex w-100 justify-content-between ">
          
                <span></span>
              <small class="mt-2"><?php echo $booking->created_at?> </small>
           
            </div>
          
            <!-- hide area -->
      
            <div class="collapse" id="<?php echo $booking->id?>">
            <hr class="my-2 mx-5 bg-white ">
            <div class="list-unstyled p-2 "style="background-color:#FFF6BF">
            <li class="mb-1"><b>Email: </b><?php echo $booking->user_email?></li>
            <li><b>Contact No. :</b>  <?php echo $booking->user_number?></li>

            <li><b> Room Type:</b>  <?php echo $booking->room_name ?></li>
            <li><b>Number of Adults:  </b> <?php echo $booking->number_adults?></li>
            <li><b>Number of Children: </b>  <?php echo $booking->number_children?></li>
            <li><b> Dates:</b> <?php echo $booking->check_in_and_out ?></li>
            

            </div>
         
            </div>
</div>

  
<?php endforeach; ?>


</div>
</div>

<?php require APPROOT . '/views/inc/script_bootstrap.php';?>

