<?php require_once("core/connection.php");

$sql = "SELECT * FROM products WHERE featured = 1 AND brand = 1";
$featured = $db->query($sql);

$sql2 = "SELECT * FROM products WHERE featured = 1 AND brand = 2";
   $featured2 = $db->query($sql2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.2/jquery.min.js"></script>-->
    <script src="js/main.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="overflow-x: hidden">
<?php include("include/header.php"); ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 450px;margin-top: -25px;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="images/tea-1.jpg" alt="Tea" style="width:100%;">
        <div class="carousel-caption">
          <h3>Decaf Oraganic Tea</h3>
          <p></p>
        </div>
      </div>

      <div class="item">
        <img src="images/coffee-1.jpg" alt="Coffee" style="width:100%;">
        <div class="carousel-caption">
          <h3>Best Roasted Coffee Beans!! </h3>
          <p></p>
        </div>
      </div>

      <div class="item">
        <img src="images/chocolate.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3 style="color: black;">Maui Chocolates!!</h3>
          <p></p>
        </div>
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

    <!-- Tea Container -->
    <div class="row">
   <div class="container" style="height: 500px;">
<!--       <form action="detailsmodal.php?id=<?= $product["id"]; ?>" method="get">-->
        <h2 class="text-center" style="margin-top: 40px;color: 	#ec500d;margin-bottom: 40px;font-family: aladin"><span  class="ion-minus-round"></span>    Tea Flavors    <span class="ion-minus-round"></span> </h2>
       <?php while($product = mysqli_fetch_assoc($featured)) : ?>
        <div class="col-sm-4" style="height: 100px;border: medium">
            <img class="img-thumbnail center-block" src="<?= $product["image"]; ?>" style="height: 200px;width: 200px;" alt="">
            <p class="text-center" style="margin-top: 20px;color:#5e5240;font-weight: 300 ;font-size: 17px "><?= $product["title"]; ?></p>
            <p class="text-center text-danger" style="margin: 20px;font-weight: 300; font-size: 17px">List Price: <s>$ <?= $product["list_price"]; ?></s></p>
             <p class="text-center" style="margin-top: 5px;color:#5e5240;font-weight: 300 ;font-size: 17px ">Current Price: $ <?= $product["price"]; ?></p>
                        <a href="productDetails.php?id=<?= $product["id"]; ?>" style="text-decoration: none;"><button type="button" class="btn btn-default center-block" style="margin-top: 20px;color: chocolate">Add to Cart</button></a>
        </div>
       <?php endwhile; ?>
<!--           </form>-->
    </div>
        </div>

    <!--Coffee Tastes-->
    <div class="row">
    <div class="container" style="height: 500px;background-color:#dddddd;width: 100%;margin-top: 20px">
        <h2 class="text-center" style="margin-top: 40px;color:crimson;margin-bottom: 40px;font-family:aladin "> <span class="ion-minus-round"></span>    Coffee Tastes    <span class="ion-minus-round"></span></h2>
               <?php while($product2= mysqli_fetch_assoc($featured2)) : ?>
        <div class="col-sm-3" style="height: 100px;">
            <img class="img-thumbnail center-block"  src="<?= $product2["image"]; ?>" style="height: 250px;width: 200px;" alt="">
             <p class="text-center" style="margin-top: 10px;color:chocolate;font-weight: 500 ;font-size: 17px"><?= $product2["title"]; ?></p>
             <p class="text-center" style="margin-top: 10px;color:chocolate;font-weight: 500 ;font-size: 17px">$<?= $product2["price"]; ?></p>
            <a href="productDetails.php?id=<?= $product2["id"]; ?>" style="text-decoration: none;">  <button type="button" class="btn btn-default center-block" style="margin-top: 20px;color: chocolate;background-color:#dddddd;border-color: chocolate">Add to Cart</button></a>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
    <div class="modal-container"></div>

    <!--Special Deals -->
    <div class="container" style="height: 500px;">
    <h2 class="text-center" style="margin-top: 40px;font-family: aladin;margin-bottom: 40px;color:darkgreen"> <span class="ion-minus"></span>    Testimonials    <span class="ion-minus"></span></h2>
  <section id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-xs-12 text-center">
                <i class="fa fa-quote-right"></i>
                    <div id="slider" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#slider" data-slide-to="0" class="active"></li>
                                <li data-target="#slider" data-slide-to="1"></li>
                                <li data-target="#slider" data-slide-to="2"></li>
                            </ol>

                            <div class="carousel-inner">
                                <div class="item active">
                                     <img class="img-circle" style="width: 120px;height: 120px; " src="images/testimonial1.jpg" alt="">
                                    <p>Thank you for the great service and order, your product is very high quality and we have officially replaced Starbucks with Avalon - Shop in Paradise. We hope to visit your beautiful islands someday.</p>
                                    <h5>Robert and Karen C. - Texas - August 2017</h5>
                                </div>

                                <div class="item">
                                     <img class="img-circle" style="width: 120px;height: 120px; " src="images/testimonial2.jpg" alt="">
                                    <p>Just wanted to say 'Thank you!' for great customer service and a great coffee product!<br> My husband says he likes the coffee alot!!! Wishing you a Happy Day!</p>
                                    <h5>Simonne A. - Hong Kong - October 2017</h5>
                                </div>


                                <div class="item">
                                     <img class="img-circle" style="width: 120px;height: 120px; " src="images/testimonial3.jpg" alt="">
                                    <p>Good afternoon, I received my Paradise Bloom weekender bag today. It's beautiful.<br>Thank you for the fast and great service.I can't wait to order something next month!</p>
                                    <h5>Kathy C. - New Jersey - April 2015</h5>
                                </div>
                            </div>  <!-- carousel-inner -->
				    </div>  <!-- carousel slide -->
                </div>
           </div>
   </div>
</section>
    </div>

    </div>
    </div>



    <!-- Footer -->
<?php include("include/footer.php"); ?>


    </body>
</html>
