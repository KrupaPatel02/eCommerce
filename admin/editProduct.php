<?php
require_once("../core/connection.php");
include("../admin/include/header.php");
include("../admin/include/navigation.php");
include("../helpers/helpers.php");

$id = $_GET['edit'];
$sql = "SELECT * FROM products WHERE id = '$id'";
$result = $db->query($sql);
$row = mysqli_fetch_assoc($result);

if(isset($_GET['add'])){
  $title = sanitize($_POST["title"]);
  $brand = sanitize($_POST["brand"]);
  $price = sanitize($_POST["price"]);
  $list_price = sanitize($_POST["list_price"]);
  $description = sanitize($_POST["description"]);
  $child = sanitize($_POST["child"]);

  $errors = array();
$required = array('title', 'brand' , 'price' , 'parent', 'child' );
  foreach($required as $field){
      if($_POST[$field] == ""){
          $errors[] = "All fields with an Asterisk(*) are required";
          break;
      }
  }

  if(!empty( $errors)){
        echo display_errors($errors);
  }
      else {
          //upload file and insert into database
          $insertSql = "INSERT INTO products (`title`,`price`,`list_price`,`brand`,`categories`,`description`) VALUES ('$title','$price','$list_price','$brand','$child','$description')";
          $db->query($insertSql);
          header("Location: ../products.php");

      }
}

if($_POST){
  $title = sanitize($_POST["title"]);
  $price = sanitize($_POST["price"]);
  $list_price = sanitize($_POST["list_price"]);
  $description = sanitize($_POST["description"]);


  $query = "UPDATE products SET title = '$title' , price = '$price' , list_price = '$list_price' , description = '$description' WHERE id = '$id'";
  $sql1 = $db->prepare($query);
  $sql1->execute();
  include("../products.php");

}
?>
<h2 class="text-center">Edit Product</h2><hr>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group col-md-3">
        <label for="title">Title*:</label>
        <input type="text" name="title" class="form-control" id="title" value="<?php echo($row['title']); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="price">Price*:</label>
        <input type="text" name="price" class="form-control" id="price" value="<?php echo($row['price']); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="list_price">List Price*:</label>
        <input type="text" name="list_price" class="form-control" id="list_price" value="<?php echo($row['list_price']); ?>">
    </div>

    <div class="form-group col-md-6">
        <label for="photo">Product Photo*:</label>
        <input type="file" id="photo" name="photo" class="form-control" rows="6"><?php echo($row['image']); ?>
        <?php
        $saved_image = $row['image'];
        if($saved_image!= ''){?>
          <div class="saved-image"><img src="<?php echo($saved_image); ?>" alt="saved-image"></div>
      <?php   } ?>
    </div>
    <div class="form-group col-md-6">
        <label for="description">Description*:</label>
        <textarea id="description" name="description" class="form-control" rows="6"><?php echo($row['description']); ?></textarea>
    </div>

    <div class="form-group" style="margin-top: 25px;margin-left: 600px;width: 200px">
      <a href="products.php" class="btn btn-default form-control" style="margin-bottom:20px">Cancel</a>
    <input type="submit" value="Edit Product" class="form-control btn btn-success">
    </div>
    <div class="clearfix"></div>
</form>



<?php include("../admin/include/footer.php"); ?>
