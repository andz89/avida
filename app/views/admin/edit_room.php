<?php require APPROOT . '/views/inc/header.php';?>

  <?php require APPROOT . '/views/inc/admin_navbar.php'; ?>

  <div class="container my-5">
    
    <h3>Edit room in Avida Hotel</h3>
    <form action="<?php echo URLROOT; ?>/admin/edit_room?id=<?php echo $data['id'] ?> "  method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="room_name">Room Name</label>
    <input type="text" name="room_name" class="form-control form-control-lg <?php echo (!empty($data['room_name_err'])) ? 'is-invalid' : ''; ?>"  value=" <?php echo $data['room_name'] ?>">
    <span class="invalid-feedback"><?php echo $data['room_name_err']; ?></span>
  </div>
  <div class="form-group">
    <label for="number_of_rooms">Room Quantity</label>
    <input name="number_of_rooms"  class="form-control form-control-lg <?php echo (!empty($data['number_of_rooms_err'])) ? 'is-invalid' : ''; ?>"  value="<?php echo $data['number_of_rooms'] ?> " > 
    <span class="invalid-feedback"><?php echo $data['number_of_rooms_err']; ?></span>
    
  </div>  



  <div class="form-group">
    <label for="description_1">Room description 1</label>
    <textarea name="description_1" rows="3" class="form-control form-control-lg <?php echo (!empty($data['description_1_err'])) ? 'is-invalid' : ''; ?>"  > <?php echo $data['description_1'] ?> </textarea>
    <span class="invalid-feedback"><?php echo $data['description_1_err']; ?></span>
    
  </div>  

  <div class="form-group">

  <label for="description_2">Room description 2</label>
    <textarea name="description_2" rows="3" class="form-control form-control-lg <?php echo (!empty($data['description_2_err'])) ? 'is-invalid' : ''; ?>"  > <?php echo $data['description_2'] ?> </textarea>
    <span class="invalid-feedback"><?php echo $data['description_2_err']; ?></span>
</div> 
  <div>
  <img id="blah" src="<?php echo $data['image_path'] ?>" alt="">
</div>

<!-- if there is no new image uploaded -->
<input type="hidden" name="image_path" value="<?php echo $data['image_path'] ?>">

  <div class="form-group mt-3">
  <label for="imgInput" class="btn btn-secondary">Change Image</label> <span  id="file-name" style="font-size:20px;"></span>
    <input type="file" name="image_big" id="imgInput"  style="display:none ;" class=" form-control form-control-lg <?php echo (!empty($data['image_big_err'])) ? 'is-invalid' : ''; ?>" >
  
    <span class="invalid-feedback"><?php echo $data['image_big_err']; ?></span>

  </div>
 


  <div class="d-flex justify-content-end" >
              <input type="submit" value="submit" class="btn btn-success ">
            </div>

</form>
  </div>
  <script>

  <?php echo script_edit_rooms_admin(); ?>
  </script>
<?php require APPROOT . '/views/inc/script_bootstrap.php';?>


