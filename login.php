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
        <ul class="breadcrumb text-center">
            <li><a href="index.php" style="color:  #5e5240;">Home</a></li>
            <li><a href="#" style="color:  #5e5240;">Login</a></li>
        </ul>

        <p class="text-center"><span style="margin-top: 30px; font-size: 30px;font-weight: 400;color:#5e5240; ">Sign In</span></p>

        <div class="container">
           <div class="login-form">
               <div class="modal-body">
                <div class="row" style="margin-left: 10%;margin-top: 40px;">
                   <div class="col-md-5">
                     <form action="login_exec.php" method="post">
                        <div class="form-group">
											<label for="userEmail" style="color: #5e5240;font-size: 17px;font-weight: 200;">Email Address</label>
											<input type="email" class="form-control" required="" name="userEmail" value="" style="height: 40px;">

                                            <label for="userEmail" style="color: #5e5240;font-size: 17px;font-weight: 200;margin-top: 20px;">Password</label>
											<input type="password" class="form-control" required="" name="password" value="" style="height: 40px;">

                                            <div class="row">
                                            <button type="submit" name="Login" class="btn btn-default " style="margin-top: 40px;margin-left: 25px;color: white;background-color: #5e5240;width: 100px">Sign In</button>
                                                <label><a href=""style="color:#5e5240;font-weight: 100;margin-left: 20px;margin-top: 40px;">Forgot your Password?</a></label>
                                            </div>
    										</div>
                    </div>
                    </form>
                    <div class="col-md-5" style="height:300px;background-color:#f2eee9;">
                        <div class="text-info" style="margin-top: 30px;">
                            <p><span style="color:#5e5240;margin-left: 20px;font-size: 20px;"> New Customer? </span></p>
                            <p><span style="color:#5e5240;margin-left: 20px;font-size: 15px;font-weight: 200">Create an account with us and you'll able to:</p>
                            <ul style="margin-left: 20px;color:#5e5240;font-weight: 200">
                                <li>Check out faster</li>
                                <li>Save multiple shipping addresses</li>
                                <li>Access your order history</li>
                                <li>Track new orders</li>
                                <li>Save items to your wishlist items</li>
                            </ul>
                            <a href="registration.php"><button type="button" class="btn btn-default " style="margin-top: 20px;margin-left: 25px;color: white;background-color: #5e5240;width: 150px;">Create Account</button></a>
                        </div>

                    </div>
                   </div>
                </div>

            </div>
        </div>
    </div>
    <?php include("include/footer.php"); ?>

    </body>
</html>
