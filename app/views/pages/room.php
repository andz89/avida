<?php require APPROOT . '/views/inc/header.php';?>  
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?> <!-- admin nav -->
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<div class="d-flex justify-content-start m-5 ">
 <div  style="margin-right:20px; width:280rem">
 <img  src ="<?php echo $data['image_path'] ?>" style="margin-right:20px" width="100%" alt="Card image cap">
 </div>
  
        
            <div style="position:relative;"> 
            <div class="rooms-content mx-1">
         <a href="<?php echo URLROOT;?> /pages/booking?id=<?php echo $data['id']?>"><button type="button" class="btn btn-md  mx-5 float-right text-white" style="background-color:#5F6F94">Book Room  </button></a> 
        </div>  
                <h2 class="room-title"><?php echo $data['room_name'] ?></h2>
                <p class="lead"> <?php echo $data['description_1'] ?></p>
                <p class="lead"> <?php echo $data['description_2']?></p>  
            </div>
</div>

 

<?php require APPROOT . '/views/inc/footer.php'; ?>