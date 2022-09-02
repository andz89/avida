<nav class="">
<div class='blue-bg navbar navbar-expand-lg '>
     <a class="navbar-brand text-white logo" href="<?php echo URLROOT; ?>"> <h3><?php echo SITENAME; ?></h3></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse " id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto ">
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo URLROOT;?>/pages/index">Home</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link text-white"  href="<?php echo URLROOT; ?>/hotelroom/index">Rooms</a>
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
              <a class="nav-link text-white"  href="<?php echo URLROOT; ?>/booking/book_dashboard">My Booking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
            </li>
        <?php else : ?>

            <?php if(isset($_SESSION['user_id'] )&& $_SESSION['user_role'] == 'user') : ?>
            <li class="nav-item ">
            <a class="nav-link text-white" href="<?php echo URLROOT; ?>/users/register">Register</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo URLROOT; ?>/users/login">Login</a>
            </li>
            <?php endif; ?>
        <?php endif; ?>

        </ul>
      </div>
  </div>
</nav>