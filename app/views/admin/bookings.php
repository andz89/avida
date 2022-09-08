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

            <div class="list-group-item  flex-column align-items-start  mt-1">
              <div  class="d-flex w-100 justify-content-between">

              <span >Booking Status: <span class="btn <?php echo ($booking->booking_status == 'Approved')? 'btn-success' : 'btn-warning'?>  btn-sm py-0 my-1" ><b><?php echo $booking->booking_status?></b> </span></span><br> 

              <span class="btn btn-primary btn-sm" data-toggle="collapse" href="#<?php echo $booking->id?>" role="button" aria-expanded="false" aria-controls="<?php echo $booking->id?>">
             View
            </span>
              </div>
            
            <div class="d-flex w-100 justify-content-between ">
              <div>
          

              <span class=""> <b> Booking ID: </b><?php echo $booking->booking_id?></span>

              <h6> <b>User name:</b> <?php echo $booking->user_name?></h6>
              </div>
       
              <small class="mt-2"><?php echo $booking->created_at?> </small>
           
            </div>
          
            <!-- hide area -->
            <div class="collapse" id="<?php echo $booking->id?>">
            <div class="card card-body">
            <span class="mb-1"><b>Email: </b><?php echo $booking->user_email?></span>
            <span><b>Contact No. :</b>  <?php echo $booking->contact_number?></span>

            <span><b> Room Type:</b>  <?php echo $booking->room_name ?></span>
            <span><b>Number of Adults:  </b> <?php echo $booking->number_adults?></span>
            <span><b>Number of Children: </b>  <?php echo $booking->number_children?></span>
            <span><b> Date of Arrival:</b> <?php echo $booking->arrival_date ?></span>
            <span><b> Date of Departure: </b> <?php echo $booking->departure_date ?></span>
         
      
            <form action="<?php echo URLROOT; ?>/admin/approve_book?id=<?php echo $booking->id ?>" method="post">
            <div class="d-flex justify-content-end align-items-center ">
           
           <div class="float-right mr-3">  <?php echo ($booking->booking_status == 'Approved')?  $booking->date_approved : ''?> </div>
           <input type="submit" class="btn btn-sm btn-success float-right"<?php echo ($booking->booking_status == 'Approved')? 'disabled': ''?>  value="<?php echo ($booking->booking_status == 'Approved')? 'Approved' : 'Approve Booking'?>">
            </div>
         

            </form>
            </div>
         
            </div>
</div>

  













<?php endforeach; ?>


</div>
</div>

<?php require APPROOT . '/views/inc/script_bootstrap.php';?>

