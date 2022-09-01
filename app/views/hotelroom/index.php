

<?php require APPROOT . '/views/inc/header.php';?>  

<?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?>
<?php endif; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>


<div class="card m-5">
  <div class="card-body text-center">
    <h2 class="avida-rooms-title">Avida Rooms </h2>
    <div class="rooms-container">

    <?php foreach($data['rooms'] as  $rooms): ?>

    <div class="card  room-a" style="width: 18rem;">
        <a href="<?php echo URLROOT; ?>/hotelroom/room?id=<?php echo $rooms->id ?>"> <img class="card-img-top" src="<?php echo URLROOT;?><?php echo $rooms->mini_image ?>" alt="Card image cap"></a>
        <div class="card-body">
            <h4 class="room-title"><?php echo $rooms->title ?></h4>
        <p class="card-text"><?php echo $rooms->description_1 ?></p>
        </div>
    </div>
<?php endforeach; ?>
    

      
    </div>
     
  </div>
</div>

<?php call_section($data['discount-btn'])?>
<?php require APPROOT . '/views/inc/footer.php';?>