


<?php require APPROOT . '/views/inc/header.php';?>  
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?> <!-- admin nav -->
<?php require APPROOT . '/views/inc/navbar.php'; ?>


        <div class="container  my-5" style=" padding-bottom:100px;">
        <ul class="list-group  m-5 ">
        <div class="list-group-item p-3 bg-white" >
        <h4 class=" text-dark"> <i class="fa-solid fa-bookmark"></i> Your Booking</h4> 
        
        </div>
        <?php if($data['booking']):?>
   
        <?php else: ?>

          <h3 class="text-center mt-5"> No bookings added</h3>
        <?php endif; ?>


         
        <?php foreach($data['booking'] as  $bookings): ?>
       
              <li class="list-group-item my-2">
          
            
            <span><b> Booking ID:</b>  <?php echo $bookings->booking_id ?></span><br>
            <span><b> Room Type:</b>  <?php echo $bookings->room_name ?></span><br>
            <span><b>Number of Adults:  </b> <?php echo $bookings->number_adults?></span><br>
            <span><b>Number of Children: </b>  <?php echo $bookings->number_children?></span><br>
            <span><b>Booking Dates:</b> <?php echo $bookings->check_in_and_out  ?></span><br>
            <span><b>Contact Number:</b> <?php echo $bookings->user_number  ?></span><br>
            <span><b>Email:</b> <?php echo $bookings->user_email  ?></span><br>

            


            </li>
            <?php endforeach; ?>
        </ul>
        </div>

    <?php require APPROOT . '/views/inc/footer.php';?>
  
 


