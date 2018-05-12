<?php
require_once("core/connection.php");
session_start("login");
$fn = $_SESSION['SESS_FIRST_NAME'];

$sql = "SELECT * FROM categories WHERE parent = 0";
$pquery = $db->query($sql);
?>
<!doctype html>
<!-- Header -->
<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar" style="color: #5e5240;"></span>
        <span class="icon-bar" style="color: #5e5240;"></span>
        <span class="icon-bar" style="color: #5e5240;"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="registration.php"><span class="glyphicon glyphicon-user" style="color: #5e5240;"> <?php echo((isset($_SESSION['SESS_FIRST_NAME']))?:'SignUp'); ?></span> </a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in" style="color: #5e5240;"> <?php echo((isset($_SESSION['SESS_FIRST_NAME']))?$fn:'Login'); ?></span></a></li>
        <li><a href="add_cart1.php"><span class="glyphicon glyphicon-shopping-cart" style="color: #5e5240;"> Cart</span> </a></li>
      </ul>

        <form name="search" class="navbar-form navbar-right" action="search.php" method="post">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="query">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    </div>
  </div>
</nav>

    <div class="row">
        <div class="col-lg-12" style="height: 180px">
            <img style="margin-left: 42%;margin-top: 20px;" src="images/logo3.png" alt="SIP">
        </div>
    </div>
     <div class="row" >
         <nav class="navbar navbar-collapse"  style="margin-left: 35%;margin-top: -25px;">
    <ul class="nav navbar-nav" style="text-align: justify;color:#5e5240; ">
      <li class="active"><a href="index.php" style="text-decoration: none;color:#5e5240; ">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="text-decoration: none;color:#5e5240; ">Products <span class="caret"></span></a>
           <ul class="dropdown-menu">
               <?php while($parent = mysqli_fetch_assoc($pquery)): ?>
                   <?php
                                $parent_id = $parent["id"];
                                $sql2 = "SELECT * FROM categories where parent = '$parent_id'";
                                $cquery = $db->query($sql2);
                   ?>
      <li class="dropdown-submenu">
        <a class="test dropdown-hover disabled" data-toggle="dropdown" data-hover="dropdown" tabindex="-1" href="category.php?cat=<?php echo($parent['id']); ?>"><?php echo $parent["category"]; ?>   <span class="caret"></span></a>
        <ul class="dropdown-menu">
                <?php while($child = mysqli_fetch_assoc($cquery)): ?>
          <li><a class="test dropdown-toggle disabled" data-toggle="dropdown" tabindex="-1" href="#"><?php echo $child["category"]; ?> </a></li>
                <?php endwhile; ?>
        </ul>
      </li>
               <?php endwhile; ?>
          </ul>
        </li>
      <li><a href="about.php" style="text-decoration: none;color:#5e5240; ">About Us</a></li>
        <li><a href="contact.php" style="text-decoration: none;color:#5e5240; ">Contact Us</a></li>
    </ul>
      </nav>
    </div>

<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
