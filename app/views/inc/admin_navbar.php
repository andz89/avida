

<?php if(isset($_SESSION['user_role']) && $_SESSION['user_role']== 'admin'): ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-dark my-0 ">
<div class="navbar-brand">
<a class="btn btn-primary btn-sm"  href="<?php echo URLROOT;?>/pages/index" role="button">Website</a>
<div class="btn-group dropleft">
  <button type="button" class="btn btn-secondary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Pages
  </button>
  <div class="dropdown-menu">
  <a class=" btn text-dark" href="<?php echo URLROOT;?>/admin/index"> Dashboard </a>
  <a class="nav-link text-dark" href="<?php echo URLROOT;?>/admin/rooms"> Rooms </a>
  <a class="nav-link text-dark" href="<?php echo URLROOT;?>/admin/bookings"> Bookings</a>
  <a class="nav-link text-dark" href="<?php echo URLROOT;?>/admin/contact">Contact</a>



  </div>
</div>

</div>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav ml-auto ">
    
         

    



<a class="nav-link text-white" href="<?php echo URLROOT; ?>/users/logout">Logout</a>


    </ul>
  </div>
</nav>


    <?php endif; ?>
    