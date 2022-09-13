

<?php require APPROOT . '/views/inc/header.php';?>  
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?> <!-- admin nav -->
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<style>
  h4{
    color:#333
  }
h4:hover{

  font-weight: 600;
}
</style>


  <div class="card-body text-center ">
    <h2 class="avida-rooms-title">Avida Rooms </h2>
    <div class="rooms-container">
    <div class="container">
  <div class="d-flex  flex-column justify-content-center">
  <?php foreach($data['rooms'] as  $rooms): ?>
  <div class="mt-3 shadow-md">
    
  <div class="card  py-3 room-a d-flex flex-row" >
        <a href="<?php echo URLROOT; ?>/pages/room?id=<?php echo $rooms->id ?>"> <img class="card-img-top" src="<?php echo $rooms->image_path ?> "  alt="Card image cap"></a>
        <div class="card-body ">
        <a href="<?php echo URLROOT; ?>/pages/room?id=<?php echo $rooms->id ?>"style=" text-decoration:none;"><h4 class=" text-left" ><?php echo $rooms->room_name ?></h4></a>
        <span class=" text-left"> <h5><b> <?php echo $rooms->price?></b></h5> </span>
        <p class="card-text text-left"><?php echo $rooms->description_1 ?></p>
        </div>
    </div>
  
    </div>
      
    <?php endforeach; ?>
  </div>

</div>
 
    </div>
     
  </div>



<?php require APPROOT . '/views/inc/footer.php';?>

