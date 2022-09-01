<?php require APPROOT . '/views/inc/header.php';?>

<?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?>
<?php endif; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>



<?php if(isLoggedIn() && $_SESSION['user_role']== 'user') : ?>
  <div class="alert alert-primary m-0 d-flex">
     
        <h2 class="mr-4">Hello <?php echo $_SESSION['user_role']; ?> welcome back!</h2>  
        <div><?php discount_button($data['discount-btn']); ?></div> 
  </div> 
<?php else : ?>
  
   <?php endif; ?>



<img  src="<?php echo URLROOT;?>/images/hero-image_3.png " class="banner-image" draggable="false" alt="">

<div class="homepage text-center">
    <h2 class="homepage-title"><?php echo $data['title']; ?><br></h2>
    <p class="lead"><?php echo $data['description']; ?></p>
</div>
<?php call_section($data['discount-btn'])?>
<?php require APPROOT . '/views/inc/footer.php';?>
