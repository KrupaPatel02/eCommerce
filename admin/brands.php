<?php
require_once("../core/connection.php");
include("../admin/include/header.php");
include("../admin/include/navigation.php");
include("../helpers/helpers.php");

$sql = "SELECT * FROM brand ORDER BY brand";
$result = $db->query($sql);
?>

<?php
$brand =  $_POST["brand"];
$errors =array();

//Edit  Brand
if(isset($_GET['edit']) && !empty($_GET['edit'])){
    $edit_id = (int)$_GET['edit'];
    $edit_id = sanitize($edit_id);
    $sql2 = "SELECT * FROM brand WHERE id = '$edit_id''";
    $edit_result = $db->query($sql2);
    $eBrand = mysqli_fetch_assoc($edit_result);
    header("Location: brands.php");

}

//Delete Brand
if(isset($_GET['delete']) && !empty($_GET['delete'])){
    $delete_id = (int)$_GET['delete'];
    $delete_id = sanitize($delete_id);
    $sql = "DELETE FROM brand WHERE id = '$delete_id'";
    $db->query($sql);
     header("Location: brands.php");
}

//Add Brand
if(isset($_POST["add_submit"])){
    $brand = sanitize($_POST["brand"]);
    
    if ($_POST["brand"] == ""){
        $errors[] .= "You must enter a brand!";
    }
    
    //Check if brand already exist
    $sql = "SELECT * FROM brand WHERE brand = '$brand'";
    if(isset($_GET["edit"])){
        $sql = "SELECT * FROM brand WHERE brand = '$brand' AND id != '$edit_id'";  }
    $result = $db -> query($sql);
    $count = mysqli_num_rows($result);
    if($count > 0){
        $errors[] .= $brand." already exists.Please choose another brand name.";
    }
    
    //Display Errors
    if(!empty($errors)){
        echo display_errors($errors);
    } else{
        $sql = "INSERT INTO brand (brand) VALUES ('$brand')";
        if(isset($_GET['edit'])){
            $sql = "UPDATE brand SET brand = '$brand' WHERE id='$edit_id'";
        }
        $db->query($sql);
        header("Location: brands.php");
    }
}
?>
<h2 class="text-center">Brands</h2>
<hr>
<div class="text-center">
    <form class="form-inline" action="brands.php<?php ((isset($_GET['edit']))?'?edit='.$edit_id:''); ?>" method="post">
        <div class="form-group">
            <?php 
            $brand_value = "";
            if(isset($_GET['edit'])) {
                    $brand_value = $eBrand['brand'];
            }    else {
                        if(isset($_POST['brand'])){
                            $brand_value = sanitize($_POST['brand']);
                        }
            }
            ?>
            <label for="brand" ><?php echo((isset($_GET['edit']))?"Edit":"Add"); ?>  Brand:</label>
            <input type="text" name="brand" id="brand" class="form-control" value="<?php echo $brand_value;?>">
            <?php if(isset($_GET["edit"])): ?>
                        <a href="brands.php" class="btn btn-default">Cancel</a>
             <?php endif; ?>
            <input  type="submit" name="add_submit" value="<?php echo((isset($_GET['edit']))?"Edit":"Add"); ?>" class="btn  btn-success">
        </div>
    </form>
</div><hr>

<table class="table table-bordered table-striped table-condensed" style="width: auto;margin: 0 auto;">
    <thead>
    <th></th>
        <th>Brand</th>
        <th></th>
    </thead>
    <tbody>
        <?php while($brand = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><a href="brands.php?edit=<?php echo $brand["id"]; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a></td>
            <td><?php echo($brand["brand"]); ?></td>
            <td><a href="brands.php?delete=<?php echo $brand["id"]; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php include("../admin/include/footer.php"); ?>