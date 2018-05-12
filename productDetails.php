<?php require_once("core/connection.php");
$id = $_GET["id"];
$sql = "SELECT * FROM products WHERE id = '$id'";
$result = $db -> query($sql);
$product = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us</title>
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
    <div class="row" style="height: 700px">
        <ul class="breadcrumb text-center">
            <li><a href="index.php" style="color:  #5e5240;">Home</a></li>
            <li><a href="productList.php" style="color:  #5e5240;">Product</a></li>
            <li><a href="#" style="color:  #5e5240;">Details</a></li>
        </ul>
        <div class="container">


                <div class="row" style="margin-left: 10%;margin-top: 40px;">
                   <div class="col-md-5">
                  <img src="<?= $product["image"]; ?>" style="width: 300px;height: 300px">
                    </div>
                    <div class="col-md-5" style="height:300px;">
                        <div class="text-info" style="margin-top: 30px;">
                            <p><span style="color:#5e5240;margin-left: 20px;font-size: 20px;"> <?= $product["title"]; ?></span></p>
                            <p><span style="color:#5e5240;margin-left: 20px;font-size: 21px;font-weight: 500"><s>$<?= $product["list_price"];?></s>    $<?= $product["price"]; ?></p>
                            <p><a href="#" style="text-decoration: none;"><span style="margin-left: 20px;color:#5e5240;font-weight: 200;font-size: 20px">Write a Review</span></a></p>
                            <p><span style="margin-left: 20px;color:#5e5240;">Gift wrapping:</p>
                            <p><span style="margin-left: 20px;color:#5e5240;">Options available</p>
                            <hr class="clearfix">
                              <form method="post" action="add_cart1.php?action=addcart">
                             <p><span style="margin-left: 20px;color:#5e5240;">Quantity:</p>
                            <input type="text" value="1" id="quantity" name="quantity" style="margin-left: 20px;padding-top:-50px; border-color:#5e5240;border-width: thin "><br>


                             <button type="submit" class="btn btn-default " style="margin-top: 10px;margin-left: 20px;color: white;background-color: #5e5240;width: 150px;">Add to Cart</button>
                             <input type="hidden" name="id" value="<?php print $product['id']?>">

                        </div>
                        <ul class="nav nav-tabs" style="margin-top: 20px;margin-left: 20px">
                        <li class="active"><a data-toggle="tab">Description</a></li>
                        </ul>
                          <p style="margin-top: 40px"><span style="margin-left: 20px;color: #5e5240;font-weight: 100"><?= $product["description"]; ?></span></p>
                    </div>
            </div>
          </form>
        </div>
    </div>




    <?php include("include/footer.php"); ?>
 </body>
</html>
