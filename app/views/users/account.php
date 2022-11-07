<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?>
<!-- admin nav -->
<?php require APPROOT . '/views/inc/navbar.php'; ?>



<div class="col-md-6 mx-auto my-5 " style="height: 400px; ">
  <div class="card card-body" style="background-color: #f8efda;margin-top:100px">
    <div>
      <span class="btn btn-sm btn-secondary float-right">
        <a class="text-white text-decoration-none" href="<?php echo URLROOT; ?>/users/update_account"> Edit Profile</a>
      </span>

    </div>
    <h2><i class="fa-solid fa-user text-dark"></i> Your Account</h2>
    <!-- Button trigger modal -->

    <div class="mb-1"><b>User Name:</b> <?php echo $data['user_name'] ?></div>
    <div class="mb-1"><b>Email:</b> <?php echo $data['user_email'] ?></div>
    <div class="mb-1"><b>Contact Number:</b> <?php echo $data['user_contact_number'] ?></div>
    <div class="mb-1"><b>Date Created:</b> <?php echo $data['user_created'] ?></div>





  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>