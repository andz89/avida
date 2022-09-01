<?php require APPROOT . '/views/inc/header.php';?>  

<?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?>
<?php endif; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>



    <div class="about-page">
    <img  src="<?php echo URLROOT;?>/images/hero-image.png" class="about-page-banner-img" draggable="false" alt="">
    <div class="about-page-content">
        <div class="about-details" >
        <h2><?php echo $data['title']; ?></h2>
        <img  src="<?php echo URLROOT;?>/images/emerald_room.jpg"  class="feature-image"  draggable="false" alt="">
        <p class="lead">    <?php echo $data['description']; ?></p>
        </div>
    </div>
</div>

  
<?php call_section($data['discount-btn'])?>
<?php require APPROOT . '/views/inc/footer.php';?>