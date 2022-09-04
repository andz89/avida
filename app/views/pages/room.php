<?php require APPROOT . '/views/inc/header.php';?>  
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?> <!-- admin nav -->
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<div class=" each_rooms ">
 
  <img  src =" <?php echo $data['large_image'] ?>"  alt="Card image cap">

    
         
          <div class="rooms-content mx-1">
          <div class="btn-book mx-5"> <a href="<?php echo URLROOT;?> /pages/booking?id=<?php echo $data['id']?>"><button type="button" class="btn btn-md btn-primary mx-5">Book Room  </button></a> </div>
    </div>

      
            <div> 
           
            <br>
                <h2 class="room-title"><?php echo $data['room_name'] ?></h2>
                <p class="lead"> <?php echo $data['description_1'] ?></p>
                <p class="lead"> <?php echo $data['description_2']?></p>
        
           
                
            </div>
        
  
     
        </div>

 

<?php require APPROOT . '/views/inc/footer.php'; ?>