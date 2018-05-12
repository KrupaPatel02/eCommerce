<?php
session_start("login");
require_once("../core/connection.php");
include("../admin/include/header.php");
include("../admin/include/navigation.php");
include("../helpers/helpers.php");

if(isset($_GET["delete"]) && !empty($_GET["delete"])){
    $delete_id = (int)$_GET["delete"];
    $delete_id = sanitize($delete_id);
    $dsql = "DELETE FROM users WHERE id ='$delete_id'";
    $db->query($dsql);
    header("Location: users.php");
}

$userQuery = "SELECT * FROM users";
$sql = $db->query($userQuery);
 ?>
<h2 class="text-center">USERS</h2><hr>
<table class="table table-bordered table-striped table-condensed">
  <thead>
    <th></th><th>Name</th><th>Email</th><th>Join Date</th><th>Last Login</th><th>Permissions</th>
  </thead>
  <tbody>
    <?php while($user = mysqli_fetch_assoc($sql)): ?>
    <tr>
      <td>
        <?php if($user['id'] != $_SESSION[SESS_USER_ID]):?>
          <a href="edit_User.php?edit=<?php echo($user['id']); ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span>
          <a href="users.php?delete=<?php echo($user['id']); ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove-sign"></span>
        <?php endif; ?>
      </td>
      <td><?php echo($user["firstname"]); ?></td>
      <td><?php echo($user["email"]); ?></td>
      <td><?php echo(pretty_date($user["join_date"])); ?></td>
      <td><?php echo(pretty_date($user["last_login"])); ?></td>
      <td><?php echo($user["permissions"]); ?></td>
    </tr>
  <?php endwhile; ?>
  </tbody>

</table>


<?php include("../admin/include/footer.php"); ?>
