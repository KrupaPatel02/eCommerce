<?php
  require_once("../core/connection.php");
  include('../helpers/helpers.php');

  if (isset($_GET["cat"])&& !empty($_GET["cat"])){
    $cat_id = (int)$cat_id;
    $cat_id = sanitize($_GET['cat']);
    echo "$cat_id";
  } else {
    $cat_id = '';
  }

  $sql = "SELECT * FROM products WHERE ORDER BY categories"  ;
  $productQ = $db->query($sql);
  echo "$productQ['title']";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign In</title>
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
<?php include("include/header.php"); ?>
<hr class="clearfix" style="margin-top:-10px;">
<div class="row" style="height: 500px">
  <div class="container" style="height: 500px;">
       <h2 class="text-center" style="margin-top: 40px;color:#ec500d;margin-bottom: 40px;font-family: aladin"><span class="ion-minus-round"></span>    Tea Flavors    <span class="ion-minus-round"></span> </h2>
      <?php while($product = mysqli_fetch_assoc($productQ)) : ?>
       <div class="col-sm-4" style="height: 100px;border: medium">
           <img class="img-thumbnail center-block" src="<?php echo($product["image"]); ?>" style="height: 200px;width: 200px;" alt="">
           <p class="text-center" style="margin-top: 20px;color:#5e5240;font-weight: 300 ;font-size: 17px "><?php echo($product["title"]); ?></p>
           <p class="text-center text-danger" style="margin: 20px;font-weight: 300; font-size: 17px">List Price: <s>$ <?php echo($product["list_price"]); ?></s></p>
            <p class="text-center" style="margin-top: 5px;color:#5e5240;font-weight: 300 ;font-size: 17px ">Current Price: $ <?php echo($product["price"]); ?></p>
                       <a href="productDetails.php?id=<?php echo($product["id"]); ?>" style="text-decoration: none;"><button type="button" class="btn btn-default center-block" style="margin-top: 20px;color: chocolate">Add to Cart</button></a>
       </div>
      <?php endwhile; ?>
   </div>
 </div>
<?php include("include/footer.php"); ?>
