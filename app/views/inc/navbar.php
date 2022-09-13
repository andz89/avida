<nav class="">
<div class='navbar navbar-expand-lg navbar-dark py-0 mb-0 ' style="background-color: #256D85;">
  <div class="d-flex justify-content-center allign-text-center">
  <a class="navbar-brand text-white logo mt-3" href="<?php echo URLROOT; ?>" style="font-family: 'Great Vibes', cursive;"> <h3><?php echo SITENAME; ?></h3></a>

  </div>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto ">
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo URLROOT;?>/pages/index">Home</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link text-white"  href="<?php echo URLROOT; ?>/pages/rooms">Rooms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo URLROOT; ?>/pages/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo URLROOT; ?>/pages/contact">Contacts</a>
          </li>
         

        </ul>
        
        <ul class="navbar-nav ">
        <?php if(isset($_SESSION['user_id'] )&& $_SESSION['user_role'] == 'user') : ?>
         
          <li class="nav-item">
            
            </li>
           
            </li>
      

            <li class="nav-item ml-2">
            <div class="btn-group">
            <button type="button" class="btn-default btn-sm btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa-solid fa-user text-dark"></i>  Account
            </button>
            <div class="dropdown-menu dropdown-menu-right">
            <a href="<?php echo URLROOT; ?>/users/account" style="text-decoration:none"> 
            <button class="dropdown-item " type="button" >My account</button></a>
            <a class=""  href="<?php echo URLROOT; ?>/users/booking">
            <button class="dropdown-item " type="button" > My Booking</button></a>
            <a href="<?php echo URLROOT; ?>/users/logout" style="text-decoration:none"> 
            <button class="dropdown-item" type="button" >Logout</button>
          </a>

            </div>
            </div>
        <?php else : ?>

    
            <li class="nav-item ">
            <a class="nav-link text-white" href="<?php echo URLROOT; ?>/users/register">Register</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo URLROOT; ?>/users/login">Login</a>
            </li>
        
        <?php endif; ?>

        </ul>
      </div>
  </div>
</nav>

