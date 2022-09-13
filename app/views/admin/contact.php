<?php require APPROOT . '/views/inc/header.php';?>  
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?> <!-- admin nav -->


<div class="alert-flash text-center p-0" style="position:fixed; width:100%; z-index:9"> 
        
        <?php flash('contact_update'); ?>
      </div>
<div class="container col-md-8 mx-auto ">
  
   

 
<div class="list-group mt-4">
    <div class="bg-dark px-4 pt-4 pb-1 text-white">
        <h4>Contact</h4>
        <hr class="my-4 bg-white p-0 m-0">
        <div class="d-flex justify-content-between align-items-center">
        <!-- <span>Total No. of added rooms: <b><?php echo $data['added-rooms']?> </b> </span>  -->
        <!-- <a href="<?php echo URLROOT;?>/admin/add_room" class="btn btn-success btn-md">Add Rooms</a> -->
      </div>
    </div>


<!-- sdfdsf ------------------------ -->
<div class="list-group-item  flex-column align-items-start  mt-0 pt-1">
              <div  class="d-flex w-100 justify-content-end ">
              <small class="">Last update:  <?php echo  $data['update_at']; ?></small>  

            

          
              </div>
            
            <div class="d-flex w-100 justify-content-between mb-0">
              <div>
        
              <h6> Telephone : <b>  <?php echo  $data['telephone']; ?></b></h6>
              <h6> Email : <b> <?php echo $data['email'] ?></b></h6>
              <h6> Address : <b> <?php echo $data['address'] ?></b></h6>
        


              </div>

              <div>
              <span class="btn btn-primary btn-sm" data-toggle="collapse" href="#contact-id" role="button" aria-expanded="false" aria-controls="contact-id">
             Edit
            </span>
              </div>
             

              
            </div>
            <div class="d-flex align-items-baseline mt-0 pt-0">
     

  



      </div>    
</div>
            <!-- hide area -->
            <div class="collapse mt-0 p-0" id="contact-id">
    


      <div class="card card-body bg-light">
        <h5>Edit Contact</h5>
       
        <form action="<?php echo URLROOT; ?>/admin/contact" method="post">
        <input type="hidden" name='id' value="<?php echo $data['id'] ?>">
       
        <div class="form-group">
            <label for="telephone">Telephone: <sup>*</sup></label>
            <input type="tel" name="telephone" class="form-control form-control-lg <?php echo (!empty($data['telephone_err'])) ? 'is-invalid' : ''; ?>"  value=" <?php echo $data['telephone'] ?>">
            <span class="invalid-feedback"><?php echo $data['telephone_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"  value=" <?php echo $data['email'] ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="address">Address: <sup>*</sup></label>
            <input type="text" name="address" class="form-control form-control-lg <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>"  value=" <?php echo $data['address'] ?>">
            <span class="invalid-feedback"><?php echo $data['address_err']; ?></span>
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" value="Update Contact" id="contact_btn_admin" class="btn btn-success btn-block">
            </div>
           
          </div>
        </form>
      </div>

          
</div>

</div>
</div>





<!-- Sdfsdfsd-------------------------------- -->

  <script>
  <?php echo alert_flash(); ?>

  </script>
<?php require APPROOT . '/views/inc/script_bootstrap.php';?>

