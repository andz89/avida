

<?php require APPROOT . '/views/inc/header.php';?>

  <?php require APPROOT . '/views/inc/admin_navbar.php'; ?>

  <div class="container jumbotron mt-3 mb-3 pt-3 pb-4">
  <h1 class="display-4"><?php echo $data['title'] ?></h1>

  <p class="lead"><?php echo $data['description'] ?></p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="<?php echo URLROOT;?>/hotelroom/index" role="button">view avida rooms</a>
  </p>
 
  
  <hr class="my-4">
  <div class="d-flex justify-content-between align-items-center">
 

  <div class="bg-secondary py-1 px-2 radius-3 "><span style="font-size: 16px; font-weight: bold;">Total No. of added rooms: </span> <strong><?php echo $data['added-rooms']?> </strong> 
</div>

  <a href="<?php echo URLROOT;?>/admin/add_room" class="btn btn-dark btn-md">Add Rooms</a>


  </div>

</div>
<div class="container mb-5">
<ul class="list-group">
<?php foreach($data['rooms'] as  $rooms): ?>
    <li class="list-group-item "><h3><?php echo $rooms->room_name ?> </h3><a href="<?php echo URLROOT;?>/hotelroom/room?id=<?php  echo $rooms->id  ?>" class="btn btn-sm btn-primary m-0 py-0 px-1" style="font-size :12px;" > view room </a> 
    <a href="<?php echo URLROOT;?>/hotelroom/room?id=<?php  echo $rooms->id  ?>" class="btn btn-sm btn-secondary m-0 py-0 px-1 " style="font-size :12px;" >Edit Room </a><span class="float-right"><strong> Date Created:</strong> <?php echo $rooms->date ?></span>
  

<?php endforeach; ?>
</ul> 
</div>



 



  




