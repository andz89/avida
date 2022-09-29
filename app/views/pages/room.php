<?php require APPROOT . '/views/inc/header.php';?>  
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?> <!-- admin nav -->
<?php require APPROOT . '/views/inc/navbar.php'; ?>



 
<div class="row flex-lg-row col-sm-12 g-4 p-3   ">
        <div class="col-10 col-sm-8 col-lg-6 mx-auto mb-3">
        <img src="<?php echo $data['image_path'] ?>" class="d-block mx-lg-auto" alt="Bootstrap Themes" width="100%"  loading="lazy">
        </div>
      <div class="col-lg-6 ">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="<?php echo URLROOT;?>/pages/booking?id=<?php echo $data['id']?>"><button type="button" class="btn btn-md btn-danger float-right text-white" >Book Room  </button></a> 
   
        </div>
        <h2 class="fw-bold lh-1 "><b> <?php echo $data['room_name'] ?></b></h2  >
    <h4>  <b> <?php echo $data['room_amount'] ?> </b> </h4>
        <p class="lead"><?php echo $data['description_1'] ?></p>
        <p class="lead"><?php echo $data['description_2'] ?></p>

       
      </div>
     
    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>