

<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?>

<div class="container col-md-8 mx-auto my-3">
      <div class="list-group ">
      <div class="bg-dark p-4 text-white">
      <h4><?php echo $data['title'] ?></h4>
          <hr class="my-4 bg-white p-0 m-0">
      <div class="d-flex justify-content-between align-items-center">
        <span>Total No. of added rooms: <b><?php echo $data['added-rooms']?> </b> </span> 
        <a href="<?php echo URLROOT;?>/admin/add_room" class="btn btn-success btn-md">Add Rooms</a>
      </div>
      </div>
  </div>
<div class="container px-0 mb-5">
<ul class="list-group">
<?php foreach($data['rooms'] as  $rooms): ?>
  
  <li class="list-group-item list-group-item-action flex-column align-items-start  mt-1"><h3><a href=" <?php echo URLROOT;?>/pages/each_room?id=<?php  echo $rooms->id  ?>" class="text-dark "><?php echo $rooms->room_name ?> </a></h3>
    <div class="d-flex justify-content-between">
      <div class="d-flex align-items-baseline">
     
          <a target="blank" href="<?php echo URLROOT;?>/pages/room?id=<?php  echo $rooms->id  ?>" class="text-primary m-0 py-0 px-1" style="font-size :15px;" > view room </a> 



     
          <a href="<?php echo URLROOT;?>/admin/edit_room?id=<?php  echo $rooms->id  ?>" class=" text-primary m-0 py-0 px-1 " style="font-size :15px;" >Edit Room </a>

    


<!-- Button trigger modal -->
<a class="text-primary m-0 py-0 px-1" href=""  style="font-size :15px;" data-toggle="modal" data-target="#delete">
Delete
</a>

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <form action="<?php echo URLROOT;?>/admin/delete?id=<?php  echo $rooms->id  ?>"  method="post" enctype="multipart/form-data">
         
         <input class="btn btn-danger btn-md" style="font-size :12px; background-color:none;" type="submit" value="Delete">
         </form>
      </div>
    </div>
  </div>
</div>














          
    </div>

    <div class="d-flex ">
      <strong class="mr-2"> Date Created:  </strong>  <?php echo $rooms->date ?>
    </div>
    </div>
    </li>


   
<?php endforeach; ?>
</ul> 
</div>
</div>


<?php require APPROOT . '/views/inc/script_bootstrap.php';?>

 



  




