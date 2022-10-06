<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?>
<style>
   #btn-disable-dates, #btn-edit-notes{
	background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
}
</style>
<div class="container col-md-6 mx-auto  mt-5">
    <a href="<?php echo URLROOT;?>/admin/rooms" class="btn btn-secondary mb-3">Back</a>
    <h4><?php echo $data['room_name'] ?></h4>
<form action="<?php echo URLROOT;?>/admin/disable_dates?id=<?php echo $_GET['id'] ?>"  method="post">
   <!-- date calendar -->
   <div class="form-group">
        <label for="disable_dates">Select dates to disable: <sup>*</sup></label>
        <input id="disable_dates" name="disable_dates"  class="form-control form-control-lg <?php echo (!empty($data['disable_dates_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['disable_dates'] ?>" placeholder="Check in date" >
        <span class="invalid-feedback"><?php echo $data['disable_dates_err']; ?></span>
        </div>
        <div class="form-group">
        <label for="notes">Notes <sup>*</sup></label>
        <textarea name="notes" id="" cols="30" rows="2" class="form-control form-control-lg <?php echo (!empty($data['notes_err'])) ? 'is-invalid' : ''; ?>" ><?php echo $data['notes'] ?></textarea>
        <span class="invalid-feedback"><?php echo $data['notes_err']; ?></span>
        </div>

    <input class="btn btn-primary btn-md btn-block" style="font-size :12px; background-color:none;" type="submit" value="Add">
    </form>
    <div class="my-5 bg-secondary p-3 text-white">
        <h5>Disable dates</h5>  
      
                <?php if($data['display_disable_dates']): ?>
                        <?php foreach($data['display_disable_dates'] as  $dates): ?>
                        <div class="list-group-item list-group-item-action flex-column align-items-start ">
                        <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?php echo $dates->disable_dates ?></h5>
                        <small>3 days ago</small>
                        </div>
                        <p class="mb-1"><?php echo $dates->notes ?></p>
                        <div class="d-flex  align-items-center">
                        <small class=" mr-2">
                            <form action="<?php echo URLROOT;?>/admin/delete_dates?id=<?php echo $dates->id ?>" method="post">
                            <input type="text" hidden name="room_id" value="<?php echo $_GET['id'] ?>">
                                <input class="text-info" id="btn-disable-dates" type="submit" value="Remove">
                             </form>
                          </small>

                        <small class="text-info">
                           <button id="btn-edit-notes"   data-toggle="modal" data-target="#exampleModal">Edit notes</button> 

                        </small>
                        </div>
                            <!-- modal edit notes -->
 <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Notes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo URLROOT;?>/admin/edit_notes?id=<?php echo $_GET['id'] ?>" method="post">
   
      <div class="modal-body">
       <textarea name="notes"  style="width: 100% ;padding:10px" rows="3"><?php echo $dates->notes ?></textarea>
       <input type="text" hidden name="room_id" value="<?php echo $_GET['id'] ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Save changes">
      </div>
      </form>
    </div>
  </div>
</div>

                        </div>

                        <?php endforeach; ?>
                <?php endif; ?>
            
      


            <div class="list-group">
 

</div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>


    // let taken = document.querySelector('.taken').innerHTML
   
    let date =  new Date();

    flatpickr('#disable_dates', {
      // disable:[   function(date) {
      //       const rdatedData = `${taken}`; 
      //       return rdatedData.includes(date.toISOString().substring(0, 10));
      //   },date],
      dateFormat: 'Y-m-d',
      minDate: "today",
      // mode:'range',
      
    });

    </script>
<?php require APPROOT . '/views/inc/script_bootstrap.php';?>