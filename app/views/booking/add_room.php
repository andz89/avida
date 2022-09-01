<?php require APPROOT . '/views/inc/header.php';?>  

<?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
<?php require APPROOT . '/views/inc/admin_navbar.php'; ?>
<?php endif; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>


booking room


<?php require APPROOT . '/views/inc/footer.php'; ?>