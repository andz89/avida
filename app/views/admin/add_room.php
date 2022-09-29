<?php require APPROOT . '/views/inc/header.php';?>

  <?php require APPROOT . '/views/inc/admin_navbar.php'; ?>

  <div class="container my-5">
    <a  href="<?php echo URLROOT;?>/admin/rooms" class="btn btn-md btn-primary mb-3"><-Back</a>
    <h3>Add room in Avida Hotel</h3>
    <form action="<?php echo URLROOT; ?>/admin/add_room" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="room_name">Room Name</label>
    <input type="text" name="room_name" class="form-control form-control-lg <?php echo (!empty($data['room_name_err'])) ? 'is-invalid' : ''; ?>"  value=" <?php echo $data['room_name'] ?>">
    <span class="invalid-feedback"><?php echo $data['room_name_err']; ?></span>
  </div>

  <div class="form-group">
    <label for="number_of_rooms">Room Quantity</label>
    <input name="number_of_rooms" type="number" class="form-control form-control-lg <?php echo (!empty($data['number_of_rooms_err'])) ? 'is-invalid' : ''; ?>"  value="<?php echo $data['number_of_rooms'] ?> " > 
    <span class="invalid-feedback"><?php echo $data['number_of_rooms_err']; ?></span>
    
  </div>  
  <div class="form-group">
    <label for="room_amount">Room amount</label>
    <input name="room_amount" type="number" class="form-control form-control-lg <?php echo (!empty($data['room_amount_err'])) ? 'is-invalid' : ''; ?>"  value="<?php echo $data['room_amount'] ?> " > 
    <span class="invalid-feedback"><?php echo $data['room_amount_err']; ?></span>
  </div>  
  <div class="form-group">
    <label for="booking_fee">booking fee</label>
    <input name="booking_fee" type="number" class="form-control form-control-lg <?php echo (!empty($data['booking_fee_err'])) ? 'is-invalid' : ''; ?>"  value="<?php echo $data['booking_fee'] ?> " > 
    <span class="invalid-feedback"><?php echo $data['booking_fee_err']; ?></span>
  </div>  
  <div class="form-group">
    <label for="description_1">Room description 1</label>
    <textarea name="description_1" rows="3" class="form-control form-control-lg <?php echo (!empty($data['description_1_err'])) ? 'is-invalid' : ''; ?>"  ><?php echo $data['description_1'] ?></textarea>
    <span class="invalid-feedback"><?php echo $data['description_1_err']; ?></span>
    
  </div>  

  <div class="form-group">
    <label for="description_2">Room description 2</label>
<textarea name="description_2" rows="3" class="form-control form-control-lg <?php echo (!empty($data['description_2_err'])) ? 'is-invalid' : ''; ?>"  > <?php echo $data['description_2'] ?></textarea>
<span class="invalid-feedback"><?php echo $data['description_1_err']; ?></span>
  </div>

 

  <div class="form-group">
  <label for="image_big">Room Name</label>
    <input type="file" id="imgInput" name="image_big" class="form-control form-control-lg <?php echo (!empty($data['image_big_err'])) ? 'is-invalid' : ''; ?>"  value="">
    <span class="invalid-feedback"><?php echo $data['image_big_err']; ?></span>

  </div>

  <div>
  <img id="blah" src="" alt="">
  </div>




  <div class="d-flex justify-content-end" >
  <input type="submit" value="submit" class="btn btn-success ">
  </div> 



</form>
  </div>
  <?php require APPROOT . '/views/inc/script_bootstrap.php';?>


