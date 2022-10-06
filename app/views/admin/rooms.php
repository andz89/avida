

<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?>


<div class="container col-md-8 mx-auto my-3">
    
<div class="list-group ">
    <div class="bg-dark p-4 text-white">
        <h4>Rooms</h4>
        <hr class="my-4 bg-white p-0 m-0">
        <div class="d-flex justify-content-between align-items-center">
        <span>Total No. of added rooms: <?php echo $data['added-rooms']?> </b> </span> 
        <a href="<?php echo URLROOT;?>/admin/add_room" class="btn btn-success btn-md">Add Rooms</a>
      </div>
    </div>
    <?php foreach($data['rooms'] as  $rooms): ?>

            <div class="list-group-item  flex-column align-items-start  mt-1">
              <div  class="d-flex w-100 justify-content-between">

              <div class="d-flex w-100 justify-content-between mb-0">
              <div>
        
              <span class="fs-5"> <b>Room ID: </b>   <?php echo $rooms->id?> </b> </span>

              <h6> <b> Room name:</b>   <?php echo $rooms->room_name ?></b></h6>
              <h6> <b> Room Pricce:</b>   <?php echo $rooms->room_amount?></b></h6>
              <h6> <b>Booking fee:</b>   <?php echo $rooms->booking_fee?></b></h6>


              </div>
         
      

            </div>
        <div>
        <span class="btn btn-primary btn-sm" data-toggle="collapse" href="#<?php echo $rooms->id?>" role="button" aria-expanded="false" aria-controls="<?php echo $rooms->id?>">
             View Room Details
            </span><br>
            <small class="mt-2"> <?php echo $rooms->date?> </small>
        </div>
    
              </div>
            
           
            <div class="d-flex align-items-baseline mt-0 pt-0">
     
     <a target="blank" href="<?php echo URLROOT;?>/pages/room?id=<?php  echo $rooms->id  ?>" class="text-primary m-0 py-0 px-1" style="font-size :15px;" > view room </a> 

     <a href="<?php echo URLROOT;?>/admin/edit_room?id=<?php  echo $rooms->id  ?>" class=" text-primary m-0 py-0 px-1 " style="font-size :15px;" >Edit Room </a>
    
     <!-- Button trigger delete modal -->
      <a class="text-primary m-0 py-0 px-1" href=""  style="font-size :15px;" data-toggle="modal" data-target="#<?php  echo $rooms->id  ?>-delete">
      Delete
      </a>  
 <!-- Button trigger disable dates modal -->
 <a class="text-primary m-0 py-0 px-1" href="<?php echo URLROOT;?>/admin/disable_dates?id=<?php echo $rooms->id  ?>"  style="font-size :15px;" >Disable Dates</a>  
<!-- Modal delete-->
<div class="modal fade" id="<?php  echo $rooms->id  ?>-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
 <div class="modal-header">
   <h5 class="modal-title" id="exampleModalLabel"><?php echo $rooms->room_name ?></h5>
   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
 <div class="modal-body">
   are you sure to delete <?php echo $rooms->room_name ?>?

 </div>
 <div class="modal-footer">
 <form action="<?php echo URLROOT;?>/admin/delete?id=<?php  echo $rooms->id  ?>"  method="post">
    
    <input class="btn btn-danger btn-md" style="font-size :12px; background-color:none;" type="submit" value="Delete">
    </form>
 </div>
</div>
</div>
</div>


</div>
            <!-- hide area -->
            <div class="collapse" id="<?php echo $rooms->id?>">
            
            <hr class="my-1 bg-white p-0 m-0">
            <span> description 1</b> </span><br>
            <textarea class="p-2" rows="4" readonly style="width:100%">
            <?php echo $rooms->description_1?>
            </textarea>
            <hr class="my-1 bg-white p-0 m-0">
            <span> description 2</b> </span><br>
            <textarea class="p-2" rows="4" readonly style="width:100%">
            <?php echo $rooms->description_2?>
            </textarea>
            <hr class="my-1 bg-white p-0 m-0">
            <div>
            <span> Image </b> </span><br>

              <img src="<?php echo $rooms->image_path?>" width="50%" alt="">
     
            </div>
            </div>
</div>

  
<?php endforeach; ?>


</div>
</div>


<?php require APPROOT . '/views/inc/script_bootstrap.php';?>

 



  




