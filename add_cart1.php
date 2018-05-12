<?php

session_start();
$total=0;
$qty = $_POST["quantity"];

//Database connection, replace with your connection string.. Used PDO
$conn = new PDO("mysql:host=localhost;dbname=siphawaii", 'root', 'root');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//get action string
$action = isset($_GET['action'])?$_GET['action']:"";

//Add to cart
if($action=='addcart' && $_SERVER['REQUEST_METHOD']=='POST') {

	//Finding the product by code
	$query = "SELECT * FROM products WHERE id=:id";
	$stmt = $conn->prepare($query);
	$stmt->bindParam('id', $_POST['id']);
	$stmt->execute();
	$product = $stmt->fetch();

	$currentQty = $_SESSION['products'][$_POST['id']][$qty]+1; //Incrementing the product qty in cart
	$_SESSION['products'][$_POST['id']] =array('qty'=>$currentQty,'name'=>$product['title'],'image'=>$product['image'],'price'=>$product['price']);
	$product='';
	header("Location:add_cart1.php");
}

//Empty All
if($action=='emptyall') {
	$_SESSION['products'] =array();
	header("Location:add_cart1.php");
}

//Empty one by one
if($action=='empty') {
	$sku = $_GET['id'];
	$products = $_SESSION['products'];
	unset($products[$sku]);
	$_SESSION['products']= $products;
	header("Location:add_cart1.php");
}




 //Get all Products
$query = "SELECT * FROM products";
$stmt = $conn->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll();

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
          <li><a href="registration.php"><span class="glyphicon glyphicon-user" style="color: #5e5240;"> SignUp</span> </a></li>
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in" style="color: #5e5240;"> Login</span></a></li>
          <li><a href="#"><span class="glyphicon glyphicon-shopping-cart" style="color: #5e5240;"> Cart</span> </a></li>
        </ul>

          <form class="navbar-form navbar-right" action="#">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" name="search">
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
  <span class="text-center"><h3 style="margin-left:30px;color:#5e5240">Shopping Cart</h3></span>
    <!-- <span style="margin-left:30px;"><a href="add_cart.php?action=empty"><h4>Empty Cart</h4></span></a></div> -->
  </div>
  <div class="container" style="width:1000px">
  <?php if(!empty($_SESSION['products'])):?>
  <table class="table table-striped">
    <thead>
      <tr><h2>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Actions</th></h2>
      </tr>
    </thead>
    <?php foreach($_SESSION['products'] as $key=>$product):?>
    <tr>
      <td><img src="<?php print $product['image']?>" width="50"></td>
      <td><?php print $product['name']?></td>
      <td>$<?php print $product['price']?></td>
      <td><input type="text" class="" name="quantity" value="<?php print $product['qty']; ?>"></td>
      <td><a href="add_cart1.php?action=empty&id=<?php print $key?>" class="btn btn-info" style="background-color:#5e5240">Delete</a></td>
    </tr>

    <?php $total = $total+($product['price']*$product['qty']);?>
    <?php endforeach;?>
    <tr><td colspan="5" align="right"><h4>Total:   $<?php print $total?></h4></td></tr>
  </table>
  <?php endif;?>
</div>
  <div class="row">
  <a href="index.php" class="btn btn-info" style="margin-left:63%;background-color:#5e5240">Continue Shopping</a>
  <a href="payment.php" class="btn btn-info" style="margin-left:10px;background-color:#5e5240">Proceed Checkout</a>
</div>
</div>
</body>
</html>
