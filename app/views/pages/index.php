<?php require APPROOT . '/views/inc/header.php';?>  
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?> <!-- admin nav -->
<?php require APPROOT . '/views/inc/navbar.php'; ?>




<img  src="<?php echo URLROOT;?>/images/hero-image_3.png " class="banner-image" draggable="false" alt="">

<div class=" text-center" style="height: 250px; margin-top: 90px">
    <h2 class=" m-0" style="font-family: 'Great Vibes', cursive; font-size:5rem"><?php echo SITENAME; ?><br></h2>
    <p class="lead"><?php echo $data['description']; ?></p>
</div>

<?php require APPROOT . '/views/inc/footer.php';?>
