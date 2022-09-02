

<?php require APPROOT . '/views/inc/header.php';?>  

<?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?>
<?php endif; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>


<div class="card m-1">
  <div class="card-body text-center">
    <h2 class="avida-rooms-title">Avida Rooms </h2>
    <div class="rooms-container">
    <div class="container">
  <div class="d-flex  flex-column justify-content-center">
  <?php foreach($data['rooms'] as  $rooms): ?>
  <div class="mt-3 ">
  <div class="card  py-3 room-a d-flex flex-row" >
        <a href="<?php echo URLROOT; ?>/hotelroom/room?id=<?php echo $rooms->id ?>"> <img class="card-img-top" src="<?php echo $rooms->large_image ?> "  alt="Card image cap"></a>
        <div class="card-body">
            <h4 class="room-title text-left"><?php echo $rooms->room_name ?></h4>
        <p class="card-text text-left"><?php echo $rooms->description_1 ?></p>
        </div>
    </div>
  
    </div>
      
    <?php endforeach; ?>
  </div>

</div>


 

    

      
    </div>
     
  </div>
</div>

<?php call_section($data['discount-btn'])?>
<?php require APPROOT . '/views/inc/footer.php';?>

