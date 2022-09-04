


<?php require APPROOT . '/views/inc/header.php';?>  
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?> <!-- admin nav -->
<?php require APPROOT . '/views/inc/navbar.php'; ?>



    <div class="col-md-6 mx-auto my-5 ">
      <div class="card card-body bg-light ">
        <h2>Your Account</h2>
       
        <div class="mb-1"><b>User Name:</b>  <?php echo $_SESSION['user_name'] ?></div>
        <div class="mb-1"><b>Email:</b>  <?php echo $_SESSION['user_email']?></div>
        <div class="mb-1"><b>Date Created:</b>  <?php echo $_SESSION['user_created']?></div>
        <div class="mb-1"><b>Contact Number:</b>  <?php echo $_SESSION['user_contact_number']?></div>
     
      
          

      </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php';?>
  


