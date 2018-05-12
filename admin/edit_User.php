<?php
require_once("../core/connection.php");
include("../admin/include/header.php");
include("../admin/include/navigation.php");
include("../helpers/helpers.php");

$id = (int)$_GET['edit'];
$id = sanitize($id);
$sql = "SELECT * FROM users WHERE id = '$id'";
$result = $db->query($sql);
$row = mysqli_fetch_assoc($result);

if($_POST){
  $firstname = sanitize($_POST["firstname"]);
  $lastname = sanitize($_POST["lastname"]);
  $email = sanitize($_POST["email"]);
  $add_line_1 = sanitize($_POST["add_line_1"]);
  $city = sanitize($_POST["city"]);
  $state = sanitize($_POST["state"]);
  $country = sanitize($_POST["country"]);
  $zip = sanitize($_POST["zip"]);
  $password = sanitize($_POST["password"]);
  $permissions = sanitize($_POST["permissions"]);

  $query = "UPDATE users SET firstname = '$firstname' , lastname = '$lastname' , email = '$email' , add_line_1 = '$add_line_1', city = '$city' , state = '$state' , country = '$country' , zip = '$zip' , password = '$password' , permissions = '$permissions' WHERE id = '$id'";
  $sql1 = $db->prepare($query);
  $sql1->execute();
  include("../admin/users.php");

}
?>
<h2 class="text-center">Edit Product</h2><hr>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group col-md-3">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo($row['firstname']); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" class="form-control" id="lastname" value="<?php echo($row['lastname']); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="email">Email:</label>
        <input type="text" name="email" class="form-control" id="email" value="<?php echo($row['email']); ?>">
    </div>
    <div class="form-group col-md-3">
        <label for="add_line_1">Address Line 1:</label>
        <input type="text" name="add_line_1" class="form-control" id="add_line_1" value="<?php echo($row['add_line_1']); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="city">City</label>
        <input type="text" name="city" class="form-control" id="city" value="<?php echo($row['city']); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="state">State:</label>
        <input type="text" name="state" class="form-control" id="state" value="<?php echo($row['state']); ?>">
    </div>
    <div class="form-group col-md-3">
        <label for="country">Country</label>
        <input type="text" name="country" class="form-control" id="country" value="<?php echo($row['country']); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="zip">Zip code</label>
        <input type="text" name="zip" class="form-control" id="zip" value="<?php echo($row['zip']); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="password">Password:</label>
        <input type="text" name="password" class="form-control" id="password" value="<?php echo($row['password']); ?>">
    </div>
    <div class="form-group col-md-3">
        <label for="permissions">Permissions:</label>
        <input type="text" name="permissions" class="form-control" id="permissions" value="<?php echo($row['permissions']); ?>">
    </div>

    <div class="form-group" style="margin-top: 25px;margin-left: 600px;width: 200px">
      <a href="users.php" class="btn btn-default form-control" style="margin-bottom:20px">Cancel</a>
    <input type="submit" value="Edit User" class="form-control btn btn-success">
    </div>
    <div class="clearfix"></div>
</form>



<?php include("../admin/include/footer.php"); ?>
