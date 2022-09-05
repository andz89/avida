


<?php require APPROOT . '/views/inc/header.php';?>  
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?> <!-- admin nav -->
<?php require APPROOT . '/views/inc/navbar.php'; ?>


        <div class="container booking-page">
        <ul class="list-group  m-5 ">
        <div class="booking-header bg-secondary">
        <h4> Booking of <?php echo $_SESSION['user_name'] ?></h4> 
        
        </div>
        <?php foreach($data['booking'] as  $bookings): ?>
       
              <li class="list-group-item">
            <span class="btn btn-info btn-sm">Status: <?php echo $bookings->booking_status ?></span><br>
            
            <span><b> Booking ID:</b>  <?php echo $bookings->booking_id ?></span><br>
            <span><b> Room Type:</b>  <?php echo $bookings->room_name ?></span><br>
            <span><b>Number of Adults:  </b> <?php echo $bookings->number_adults?></span><br>
            <span><b>Number of Children: </b>  <?php echo $bookings->number_children?></span><br>
            <span><b> Date of Arrival:</b> <?php echo $bookings->arrival_date ?></span><br>
            <span><b> Date of Departure: </b> <?php echo $bookings->departure_date ?></span><br>

            </li>
            <?php endforeach; ?>
        </ul>
        </div>

    <?php require APPROOT . '/views/inc/footer.php';?>
  
 

