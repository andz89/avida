<?php require APPROOT . '/views/inc/header.php';?>  

<?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?>
<?php endif; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>


<?php 
 
  room_template(
  $data['id'], 
  $data['large_image'], 
  $data['room_name'], 
  $data['description_1'], 
  $data['description_2'],
  ) 
  
  ?>


<?php require APPROOT . '/views/inc/footer.php'; ?>