<?php
  require_once("core/connection.php");
  include('helpers/helpers');

    $query = $_POST['query'];
    $min_length = 3;

    if(strlen($query) >= $min_length){
        $sql = "SELECT * FROM products WHERE title LIKE '%".$query."%' OR description LIKE '%".$query."%'";
        $result = $db->query($sql);
    }

?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <title>Cart</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
     <link rel="stylesheet" href="css/main.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="js/main.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body style="overflow-x: hidden">
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
             <img style="margin-left:40px;" src="images/logo3.png" alt="SIP">
         <ul class="nav navbar-nav navbar-right">
           <li><a href="index.php"><span class="glyphicon" style="color: #5e5240;"> Home </span></a></li>
           <li><a href="registration.php"><span class="glyphicon glyphicon-user" style="color: #5e5240;"> <?php echo((isset($_SESSION['SESS_FIRST_NAME']))?:'SignUp'); ?></span> </a></li>
           <li><a href="login.php"><span class="glyphicon glyphicon-log-in" style="color: #5e5240;"> <?php echo((isset($_SESSION['SESS_FIRST_NAME']))?$fn:'Login'); ?></span></a></li>
           <li><a href="add_cart1.php"><span class="glyphicon glyphicon-shopping-cart" style="color: #5e5240;"> Cart</span> </a></li>
         </ul>

           <form class="navbar-form navbar-right" action="#" method="post">
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
 <div class="nav navbar">
   <span class="text-center"><h3 style="margin-left:30px;color:#5e5240">Products</h3></span>
     <!-- <span style="margin-left:30px;"><a href="add_cart.php?action=empty"><h4>Empty Cart</h4></span></a></div> -->
   </div>
   <div class="row">
     <nav class="navbar navbar-collapse"  style="margin-left: 35%;margin-top: -25px;">
       <ul class="nav navbar-nav" style="text-align: justify;color:#5e5240;">
         <li class="active"><a href="index.php" style="text-decoration: none;color:#5e5240; ">Tea</a></li>
         <li class=""><a href="#" style="text-decoration: none;color:#5e5240; ">Coffee</a></li>
         <li class=""><a href="#" style="text-decoration: none;color:#5e5240; ">Macademia Nuts</a></li>
         <li class=""><a href="#" style="text-decoration: none;color:#5e5240; ">Pancakes</a></li>
         <li class=""><a href="#" style="text-decoration: none;color:#5e5240; ">Chocolates</a></li>
       </ul>
     </nav>
   </div>
   <div class="row">
     <div class="container" style="width:1000px;">
       <?php while($product = mysqli_fetch_assoc($result)):?>
       <div class="col-md-4">
         <div class="thumbnail"> <img src="<?php print $product['image']?>" alt="" style="width:250px;height:250px">
           <div class="caption">
             <p style="text-align:center;"><?php echo($product['title']);?></p>
             <p style="text-align:center;color:#04B745;"><b>$<?php print $product['price'];?></b></p>
             <form method="post" action="add_cart1.php?action=addcart">
               <p style="text-align:center;color:#04B745;">
                 <button type="submit" class="btn btn-warning">Add To Cart</button>
                 <input type="hidden" name="id" value="<?php print $product['id']?>">
               </p>
             </form>
           </div>
         </div>
       </div>
     <?php endwhile;?>
     </div>
   </div>
 </body>
 </html>
