<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/admin_navbar.php'; ?>

<div class="container col-md-8 mx-auto my-3">

  <div class="list-group ">
    <div class="bg-dark p-4 text-white">
      <h4>List of Bookings</h4>
      <hr class="my-4 bg-white p-0 m-0">
      <span>Total no. of bookings: <b><?php echo $data['total_bookings'] ?> </b></span>

      <div class=" d-flex justify-content-end my-2">

        <div>
          <span class="btn  btn-sm text-info  all"> See all </span>
        </div>
        <div>
          <span class="btn  btn-sm btn-primary  custom" id="custom"> Select date </span>
        </div>
      </div>
    </div>
    <div class="container-display-date" style="display:none ;">
      <div>Total Number of bookings on <span class="display-date"> </span>: <b class="count"> </b> </div>
    </div>
    <?php foreach ($data['booking'] as  $booking) : ?>

      <div class="list-group-item  flex-column align-items-start  my-2">
        <div class="d-flex w-100 justify-content-between">


          <div>
            <span class=""> <b> Booking ID: </b><?php echo $booking->booking_id ?></span><br>
            <b> Room Name:</b> <?php echo $booking->room_name ?>
            <h6 style="margin:0 ;"> <b>User name:</b> <?php echo $booking->user_name ?></h6>
            <b> Dates:</b> <?php echo $booking->check_in_and_out ?>

          </div>

          <div>
            <span class="btn btn-primary btn-sm" data-toggle="collapse" href="#<?php echo $booking->id ?>" role="button" aria-expanded="false" aria-controls="<?php echo $booking->id ?>">
              View
            </span>
          </div>
        </div>


        <div class="d-flex w-100 justify-content-between ">

          <span></span>
          <small class="mt-2"><?php echo $booking->created_at ?> </small>

        </div>

        <!-- hide area -->

        <div class="collapse" id="<?php echo $booking->id ?>">
          <hr class="my-2 mx-5 bg-white ">
          <div class="list-unstyled p-2 " style="background-color:#FFF6BF">
            <li class="mb-1"><b>Email: </b><?php echo $booking->user_email ?></li>
            <li><b>Contact No. :</b> <?php echo $booking->user_number ?></li>

            <li><b> Room Name:</b> <?php echo $booking->room_name ?></li>
            <li><b>Number of Adults: </b> <?php echo $booking->number_adults ?></li>
            <li><b>Number of Children: </b> <?php echo $booking->number_children ?></li>
            <li><b> Dates:</b> <span class="date"><?php echo $booking->check_in_and_out ?> </span> </li>


          </div>

        </div>
      </div>


    <?php endforeach; ?>


  </div>
</div>
<?php require APPROOT . '/views/inc/script_bootstrap.php'; ?>
<script>
  flatpickr('#custom', {
      dateFormat: 'Y-m-d',
      onChange: function(e) {
        let dates = document.querySelector('#custom').value


        let date_x = document.querySelectorAll('.date')
        let count = 0
        for (var i = 0; i < date_x.length; i++) {
          let date_element = date_x[i].innerText
          let parent = date_x[i].parentElement.parentElement.parentElement.parentElement
          parent.style.display = 'none'


          let a = date_element.slice(0, 10);
          let b = a.trim()

          if (b == dates.trim()) {

            count++
            parent.style.display = 'block'

          }



        }

        document.querySelector('.display-date').innerText = dates
        document.querySelector('.count').innerText = count

        document.querySelector('.container-display-date').style.display = 'block'
        //   Array.from(date_x).forEach((e)=>{
        //     console.log(e.style.display == 'none')

        //  if(e.style.display == 'none'){
        //     console.log('no found bookings')
        //  }
        //   }) 

      },

    }

  );
  document.body.addEventListener('click', (e) => {


    if (e.target.classList.contains('all')) {
      // let month = date_filter.getMonth() + 1;
      let dates = document.querySelectorAll('.date')
      // let month = date_today.split('-')[1]

      for (var i = 0; i < dates.length; i++) {
        let parent = dates[i].parentElement.parentElement.parentElement.parentElement
        parent.style.display = 'block';
        document.querySelector('.container-display-date').style.display = 'none'


      }
    }


  })
</script>