

<?php require APPROOT . '/views/inc/header.php';?>  
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?> <!-- admin nav -->
<?php require APPROOT . '/views/inc/navbar.php'; ?>



<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5 list-unstyled">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="<?php echo URLROOT;?>/images/contact.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
      <h1 class="display-5 fw-bold lh-1 mb-3">Feel free to contact us! </h1>
       <li class="mt-3 text-info">         <h5><i class="fa-solid fa-phone"></i> <?php echo $data['contact']; ?></h5> </li>
       <li class="mt-3 text-info">       <h5><i class="fa-solid fa-envelope"></i> <?php echo $data['email']; ?></h5></li>
       <li class="mt-3 text-info">   <h5><i class="fa-solid fa-location-dot"></i> <?php echo $data['address']; ?></h5></li>



        <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
        </div> -->
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php';?>
