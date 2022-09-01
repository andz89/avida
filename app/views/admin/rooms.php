

<?php require APPROOT . '/views/inc/header.php';?>

  <?php require APPROOT . '/views/inc/admin_navbar.php'; ?>

  <div class="container jumbotron mt-3 mb-3 pt-3 pb-1">
  <h1 class="display-4"><?php echo $data['title'] ?></h1>

  <p class="lead"><?php echo $data['description'] ?></p>
  <hr class="my-4">

  <p class="lead">
    <a class="btn btn-primary btn-lg" href="<?php echo URLROOT;?>/hotelroom/index" role="button">view avida rooms</a>
  </p>
</div>
<div class="container mb-5">
<ul class="list-group">
<?php foreach($data['rooms'] as  $rooms): ?>
    <li class="list-group-item "><?php echo $rooms->title ?></li>

<?php endforeach; ?>
</ul> 
</div>



 



  




