<?php require APPROOT . '/views/inc/header.php';?>  
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?> <!-- admin nav -->
<?php require APPROOT . '/views/inc/navbar.php'; ?>






<div class="col-md-7 mx-auto my-5 ">
      <div class="card card-body bg-light ">
        <span> User ID : <?php echo $data['user_id'] ?></span>
        <h6>User Name: <strong> <?php echo $data['user_name'] ?></strong></h6>
        <h6>User Email: <strong> <?php echo $data['user_email'] ?></strong></h6>

        <h6>Room ID: <strong> <?php echo $data['room_id'] ?></strong></h6>
        <h6>Room Type: <strong> <?php echo $data['room_name'] ?></strong></h6>

        <form action="<?php echo URLROOT; ?>/pages/booking?id=<?php echo $data['room_id'] ?>" method="post">
    
          <div class="form-group">
            <label for="number_adults">No. of Adults: <sup>*</sup></label>
            <input type="number" name="number_adults" max="4" min="1" class="form-control form-control-lg <?php echo (!empty($data['number_adults_err'])) ? 'is-invalid' : ''; ?>" value="">
            <span class="invalid-feedback"><?php echo $data['number_adults_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="number_children">No. of Children: <sup>*</sup></label>
            <input type="number" name="number_children"  max="4" min="1" class="form-control form-control-lg <?php echo (!empty($data['number_children_err'])) ? 'is-invalid' : ''; ?>" value="">
            <span class="invalid-feedback"><?php echo $data['number_children_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="arrival_date">Arrival Date: <sup>*</sup></label>
            <input type="date" name="arrival_date" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="departure_date">Departure Date: <sup>*</sup></label>
            <input type="date" name="departure_date" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          </div>
      
            <div class="col">
              <input type="submit" value="Check out" class="btn btn-primary btn-block">
            </div>
      
        </form>
      </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>