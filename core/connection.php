 <?php

$db = mysqli_connect("localhost","root","root","siphawaii");
if(mysqli_connect_errno()){
    echo "Database connection failed with following errors:" . mysqli_connect_error();
    die();
}
session_start();


if(isset($_SESSION['success_flash'])){
  ?>
<div class="bg-success"><p class="text-success text-center"><?php echo $_SESSION['success_flash']; ?></p></div>;
  <?php
  unset($_SESSION['success_flash']);
}
if(isset($_SESSION['error_flash'])){
  ?>
  <div class="bg-danger"><p class="text-danger text-center"><?php echo $_SESSION['error_flash']; ?></p></div>;
    <?php
    unset($_SESSION['error_flash']);
}
