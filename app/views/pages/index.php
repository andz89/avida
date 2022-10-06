<?php require APPROOT . '/views/inc/header.php';?>  
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?> <!-- admin nav -->
<?php require APPROOT . '/views/inc/navbar.php'; ?>



<!-- start --------------------------------------------->
<div class="container my-2 ">

<div class="row flex-lg-row-reverse align-items-center g-3 py-5">
      <div class="d-flex justify-content-center  col-lg-6 mb-2" >

        <img src="<?php echo URLROOT;?>/images/hero-image_final.png "  alt="Bootstrap Themes" width="100%"  loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-6 fw-bold lh-1 mb-3">Enjoy and relax in our Hotel</h1>
        <p class="lead"><?php echo $data['description']; ?></p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
         <a href="<?php echo URLROOT;?>/pages/room"><button type="button" class="btn btn-danger btn-lg px-4 me-md-2">Book Now</button>
      </a> 
        </div>
      </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php';?>
