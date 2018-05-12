<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
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
            <li><a href="#" style="color:  #5e5240;">Contact Us</a></li>
        </ul>
        <p class="text-center"><span style="margin-top: 30px; font-size: 30px;font-weight: 400;color:#5e5240; ">Contact</span></p>
             <p class="text-center"><span class="center-block" style="margin-top: 20px;color: #5e5240;font-weight: 250;font-size: 18px;">We're happy to answer questions or help you with the returns.<br>Please fill out the form below if you need assistance.</span></p>
        <div class="container">
           <div class="login-form">
            <form action="" method="post">
               <div class="modal-body">
                <div class="row" style="margin-left: 10%;margin-top: 40px;">
                   <div class="col-md-5">
                        <div class="form-group">
											<label for="userEmail" style="color: #5e5240;font-size: 17px;font-weight: 200;">Full Name</label>
											<input type="email" class="form-control" required="" name="userEmail" value="" style="height: 40px;">

                                            <label for="userEmail" style="color: #5e5240;font-size: 17px;font-weight: 200;margin-top: 20px;">Email Address</label>
											<input type="password" class="form-control" required="" name="password" value="" style="height: 40px;">

                                            <div class="row">
                                            <label for="Comment" style="color: #5e5240;font-size: 17px;font-weight: 200;margin-left: 10px;margin-top: 20px">Comment / Questions</label>
                                            <textarea class="form-control" rows="5" cols="50" style="margin-left: 10px;width: 820px"></textarea>
                                            <button type="button" class="btn btn-default " action="" style="margin-top: 40px;margin-left: 375px;color: white;background-color: #5e5240;width: 150px">Submit Form</button>
                                            </div>
    										</div>
                    </div>
                     <div class="col-md-5">
                        <div class="form-group">
											<label for="userEmail" style="color: #5e5240;font-size: 17px;font-weight: 200;">Phone Number</label>
											<input type="email" class="form-control" required="" name="userEmail" value="" style="height: 40px;">

                                            <label for="userEmail" style="color: #5e5240;font-size: 17px;font-weight: 200;margin-top: 20px;">Order Number</label>
											<input type="password" class="form-control" required="" name="password" value="" style="height: 40px;">
    										</div>
                    </div>
                   </div>
                </div>
               </form>
            </div>
        </div>
    </div>
    <?php include("include/footer.php"); ?>

    </body>
</html>
