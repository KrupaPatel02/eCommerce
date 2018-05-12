<?php
require_once("../core/connection.php");
include("../admin/include/header.php");
include("../admin/include/navigation.php");
include("../helpers/helpers.php");

if(isset($_GET["delete"]) && !empty($_GET["delete"])){
    $delete_id = (int)$_GET["delete"];
    $delete_id = sanitize($delete_id);
    $dsql = "DELETE FROM products WHERE id ='$delete_id'";
    $db->query($dsql);
    header("Location: products.php");
}

if(isset($_GET['add'])) {
$brandQuery = $db->query("SELECT * FROM brand ORDER BY brand");
$parentQuery = $db->query("SELECT * FROM categories WHERE parent = 0 ORDER BY category");
$childQuery = $db->query("SELECT * FROM categories WHERE parent != 0 ORDER BY category");


if(isset($_POST['add_product'])){

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

      $name = $_FILES['photo']['name'];
      $target_dir = "images/";
      $target_file = $target_dir . basename($_FILES["photo"]["name"]);
      echo($name);
      // Select file type
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Valid file extensions
      $extensions_arr = array("jpg","jpeg","png","gif");

      // Check extension
      if(in_array($imageFileType,$extensions_arr) ){

       // Insert record
       // $query = "insert into images(name) values('".$name."')";
       // $db->query($query);

       // Upload file
       // move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

      }

if(!empty( $errors)){
      echo display_errors($errors);
}
    else {
        //upload file and insert into database
        move_uploaded_file($_FILES['photo']['tmp_name'], $target_dir.$name);
        $query1 = "INSERT INTO images(name) VALUES ('".$name."')";
        $db->query($query1);
        $insertSql = "INSERT INTO products (`title`,`price`,`list_price`,`brand`,`categories`,`description`) VALUES ('$title','$price','$list_price','$brand','$child','$description')";
        $db->query($insertSql);
        header("Location: products.php");

    }
}
?>
<h2 class="text-center"><?php echo((isset($_GET['edit']))?'Edit':'Add A New'); ?> Product</h2><hr>
<form action="editProduct.php?<?php echo((isset($_GET['edit']))?'edit='.$edit_id:'add=1'); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group col-md-3">
        <label for="title">Title*:</label>
        <input type="text" name="title" class="form-control" id="title" value="<?php echo((isset($_POST['title']))?sanitize($_POST['title']):''); ?>">
    </div>
    <div class="form-group col-md-3">
        <label for="brand">Brand*:</label>
        <select class="form-control" id="brand" name="brand">
            <option value="<?php echo((isset($_POST["brand"]) && $_POST["brand"] == "")?"selected":""); ?>"></option>
            <?php while($brand = mysqli_fetch_assoc($brandQuery)): ?>
                <option value="<?php echo($brand["id"]); ?>"<?php echo((isset($_POST["brand"]) && $_POST["brand"] == $brand["id"])?"selected":""); ?>><?php echo($brand["brand"]); ?></option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="form-group col-md-3">
        <label for="parent">Parent Category* :</label>
        <select class="form-control" id="parent" name="parent">
            <option value="<?php echo((isset($_POST['parent']) && $_POST['parent'] == '')?'selected':''); ?>"></option>
            <?php while($parent = mysqli_fetch_assoc($parentQuery)):
              ?>
                <option value="<?php echo($parent['id']); ?>"<?php echo((isset($_POST['parent']) && $_POST['parent'] == $parent['id'])?'selected':''); ?>><?php echo($parent['category']); ?></option>
              <?php endwhile; ?>

        </select>
    </div>
   <div class="form-group col-md-3">
        <label for="child">Child Category* :</label>
        <select class="form-control" id="child" name="child">
          <option value="<?php echo((isset($_POST['child']) && $_POST['child'] == '')?'selected':''); ?>"></option>
          <?php while($child = mysqli_fetch_assoc($childQuery)):
            ?>
              <option value="<?php echo($child['id']); ?>"<?php echo((isset($_POST['child']) && $_POST['child'] == $child['id'])?'selected':''); ?>><?php echo($child['category']); ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="form-group col-md-3">
        <label for="price">Price* :</label>
        <input id="price" type="text" name="price" class="form-control" value="<?php echo((isset($_POST["price"]))?sanitize($_POST["price"]):""); ?>">
    </div>
     <div class="form-group col-md-3">
        <label for="list_price">List Price:</label>
        <input id="list_price" type="text" name="list_price" class="form-control" value="<?php echo((isset($_POST["list_price"]))?sanitize($_POST["list_price"]):""); ?>">
    </div>
<!--
    <div class="form-group col-md-3">
            <label>Quantity</label>
        <button class="btn btn-default form-control" onClick="">Quantity</button>
    </div>
-->
    <div class="form-group col-md-9">
        <label for="description">Description*:</label>
        <textarea id="description" name="description" class="form-control" rows="6"><?php echo((isset($_POST["description"]))?sanitize($_POST["description"]):""); ?></textarea>
    </div>  34edc
    <div class="form-group col-md-3">
        <label for="photo">Product Photo*:</label>
        <input type="file" name="photo" id="photo" class="form-control" value="<?php echo((isset($_POST["image_name"]))?sanitize($_POST['image_name']):"") ?>">
    </div>
    <div class="form-group pull-left" style="margin-top: 25px;margin-left: 10px">
      <a href="products.php" class="btn btn-default form-control" style="margin-bottom:20px">Cancel</a>
    <input type="submit" value="<?php echo((isset($_GET['edit']))?'Edit':'Add'); ?> Product" class="form-control btn btn-success" name="add_product">
    </div>
    <div class="clearfix"></div>
</form>

<?php }
else {

$sql = " SELECT * FROM products WHERE deleted = 0";
$presults = $db->query($sql);
if(isset($_GET["featured"])){
$id =  (int)$_GET["id"];
$featured = (int)$_GET["featured"];
$featuredSql =  "UPDATE products SET featured = '$featured' WHERE id='$id'";
$db->query($featuredSql);
header("Location: products.php");
}

?>
<hr>
<hr>
<h2 class="text-center">Products</h2><hr>
<a href="products.php?add=1" class="btn btn-success pull-right" id="add-product-btn">Add Product</a><div class="clearfix"></div><hr>
<table class="table table-bordered table-condensed table-striped">
<thead>
    <th></th>
    <th>Product</th>
    <th>Price</th>
    <th>Category</th>
    <th>Featured</th>
</thead>
<tbody>
        <?php while($product = mysqli_fetch_assoc($presults)):
            $childID = $product["categories"];
            $catSql = "SELECT * FROM categories WHERE id = $childID";
            $result = $db->query($catSql);
            $child = mysqli_fetch_assoc($result);
            $parentID = $child["parent"];
            $pSql = "SELECT * FROM categories WHERE id='$parentID'";
            $presult = $db->query($pSql);
            $parent  = mysqli_fetch_assoc($presult);
            $category = $parent['category'].'~'.$child['category'];

    ?>
            <tr>
                <td>
                    <a href="editProduct.php?edit=<?php echo($product["id"]); ?>" class="btn btn-xs btn-default "><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="products.php?delete=<?php echo($product["id"]); ?>" class="btn btn-xs btn-default "><span class="glyphicon glyphicon-remove-sign"></span></a>
                </td>
                <td><?php echo($product["title"]); ?></td>
                 <td><?php echo(money($product["price"])); ?></td>
                <td><?php echo($category); ?></td>
                 <td><a href="products.php?featured=<?php echo(($product["featured"] == 0 )?'1':'0'); ?>&id=<?php echo($product["id"]); ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-<?php echo(($product["featured"] == 1)?'minus':'plus'); ?>"></span>
                    </a> &nbsp; <?php echo(($product["featured"] == 1)?'Featured Product':''); ?>
                     </td>
            </tr>
        <?php endwhile; ?>
</tbody>
</table>
<?php  }  include("../admin/include/footer.php"); ?>
