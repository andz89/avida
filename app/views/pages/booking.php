<?php require APPROOT . '/views/inc/header.php';?>  
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?> <!-- admin nav -->
<?php require APPROOT . '/views/inc/navbar.php'; ?>






<div class="col-md-7 mx-auto my-5 ">
      <div class="card card-body bg-light ">
        <h6>User Name: <strong> <?php echo $data['user_name'] ?></strong></h6>
        <h6>User Email: <strong> <?php echo $data['user_email'] ?></strong></h6>
        <h6>User Contact Number: <strong> <?php echo $data['user_number'] ?></strong></h6>
        <h6>Room ID: <strong> <?php echo $data['room_id'] ?></strong></h6>
        <h6>Room Type: <strong> <?php echo $data['room_name'] ?></strong></h6>
        <h6>Room Amount: <strong> <?php echo $data['room_amount'] ?></strong>  Pesos</h6>
        <h6>booking Fee: <strong> <?php echo $data['booking_fee'] ?></strong>  Pesos</h6>



        <form action="<?php echo URLROOT; ?>/pages/booking?id=<?php echo $data['room_id'] ?>" method="post">
    
          <div class="form-group">
            <label for="number_adults">No. of Adults: <sup>*</sup></label>
            <input type="number" name="number_adults" max="4" min="1" class="form-control form-control-lg <?php echo (!empty($data['number_adults_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['number_adults']; ?>">
            <span class="invalid-feedback"><?php echo $data['number_adults_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="number_children">No. of Children: <sup>*</sup></label>
            <input type="number" name="number_children"  max="4" min="1" class="form-control form-control-lg <?php echo (!empty($data['number_children_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['number_children']; ?>">
            <span class="invalid-feedback"><?php echo $data['number_children_err']; ?></span>
          </div>
      
         
            <!-- date calendar -->
        <div class="form-group">
        <label for="check_in_and_out">Select a range of dates using the range calendar.: <sup>*</sup></label>
        <input id="arrival" name="check_in_and_out"  class="form-control form-control-lg <?php echo (!empty($data['check_in_and_out_err'])) ? 'is-invalid' : ''; ?>" value=""placeholder="Check in date" >
        <span class="invalid-feedback"><?php echo $data['check_in_and_out_err']; ?></span>
        </div>
        <input type="hidden" name="booking_fee"  value="<?php echo $data['booking_fee'] ?>">
    

        <div class="taken" >    
      <?php foreach($data['date_disabled'] as $list): ?>
        <span ><?php echo $list?></span>
        <?php endforeach; ?>
  
        </div>
          <div>
          </div>
     
      <div id='test'>

      </div>
            <!-- <div class="col">
              <input type="submit" value="Check out" class="btn btn-primary btn-block">
            </div> -->
    
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_51Lj0jSLurj3fjTl9NilNF3EoSRF93XuNnOHCH3AJxJYliNSrItH2INq85NN4abETbxpDbQCXF3TXrcoZNwABlKyl00LUG5N1Km"
                data-amount= <?php 
                $amount = $data['booking_fee'] * 0.01695 ;
                $total = round($amount) * 100;
                echo $total;
                ?>
                data-name="<?php echo $data['room_name'] ?>"
                data-description="booking payment for room reservation"
                data-email=<?php echo $data['user_email'] ?>

                data-currency="usd"
                data-locale="auto">
                </script>
                
              
        </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>


    let taken = document.querySelector('.taken').innerHTML
   
    let date =  new Date();

    flatpickr('#arrival', {
      disable:[   function(date) {
            const rdatedData = `${taken}`; 
            return rdatedData.includes(date.toISOString().substring(0, 10));
        },date],
      dateFormat: 'Y-m-d',
      minDate: "today",
      mode:'range',
      onClose: function(selectedDates, dateStr, instance) {
        let a = document.querySelector('#arrival').value;
        if(a.length == 10){
        
            document.querySelector('#arrival').value = ''
        }

}       
    });

    </script>

<?php require APPROOT . '/views/inc/footer.php'; ?>