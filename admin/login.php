<?php
require_once("../core/connection.php");
include("../admin/include/header.php");
include("../helpers/helpers.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

$email = ((isset($_POST["email"]))?sanitize($_POST["email"]):"");
$email = trim($email);
$password = ((isset($_POST["password"]))?sanitize($_POST["password"]):"");
$password = trim($password);
$errors = array();
        //form validation
        if(empty($email) || empty($password)){
            $errors[] = "You must provide email and password";
        }

        //validate email
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors[] = "You must enter a valid email.";
        }

        //password is more than 6 characters
        if(strlen($password) < 6){
            $errors[] = "Password must be atleast 6 characters";
        }

        $sql = "SELECT * FROM `users` WHERE email='$email' AND password='$password'";
        $res = $db->query($sql);
        $user = mysqli_fetch_assoc($res);
        $n = $res->num_rows;
        //$userCount = mysqli_num_rows($user);
        if($n < 1){
            $errors[] = "That email doesn't exist in our database.";
        }

        if($password != $user["password"]){
            $errors[] = "The password does not match our records. Please try again";
        }

        //check for errors
          if($n > 0){

                  if ( $user['permissions'] == "admin") {
                    // include('index.php');
                    $errors[] = "Login Successful";
                    session_id("login");
              			$_SESSION['SESS_USER_ID'] = $user['id'];
              			$_SESSION['SESS_FIRST_NAME'] = $user['firstname'];
              			$_SESSION['SESS_LAST_NAME'] = $user['lastname'];
                    $_SESSION['SESS_EMAIL_ID'] = $user['email'];
                    $_SESSION['SESS_ROLE'] = $user['permission'];
                    session_write_close();
                    $user_id = $user["id"];
                    $name = $user["firstname"];
                    login($user_id,$name);
                  }
                  else{ ?>
                <div class="bg-danger" style="margin-top:50px;"><p class="text-danger text-center"><?php echo "You need have an Administrative permission to access page."; ?></p>
                  <div class="col-md-3 center"><button class="btn btn-primary" style="margin-left:650px;"><a href="login.php" style="color:white">LOG IN</a></button></div>
                </div>
                <?php
                    }
      			exit();
      		}
          if(!empty($errors)){
            echo (display_errors($errors));
          }

}
?>
<div id="login-form" style="width: 50%;
    height: 60%;
    border: 2px solid #000;
    border-radius: 15px;
    box-shadow: 7px 7px 15px rgba(0,0,0,0.6);
    margin: 8% auto;
    padding: 15px;">
    <div>

    </div>
    <h2 class="text-center">Login</h2><hr>
    <form name="adminloginform" action='' method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
         <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Login" name="adminLogin">
        </div>
    </form>
    <p class="text-right" ><a href="../index.php" alt="">Visit Site</a></p>
</div>
<?php include("../admin/include/footer.php");
