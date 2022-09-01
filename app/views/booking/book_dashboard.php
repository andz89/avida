


<?php require APPROOT . '/views/inc/header.php';?>  

<?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?>
<?php endif; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>

        <div class="container booking-page">
        <ul class="list-group  m-5 ">
        <div class="booking-header bg-secondary">
        <h4> Booking of <?php echo $_SESSION['user_name'] ?></h4> 
        <?php discount_button($data['discount-btn']); ?>
        </div>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Morbi leo risus</li>
        <li class="list-group-item">Porta ac consectetur ac</li>
        <li class="list-group-item">Vestibulum at eros</li>
        </ul>
        </div>

    <?php require APPROOT . '/views/inc/footer.php';?>
  
 


