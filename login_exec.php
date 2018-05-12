<?php
	//Start session
	session_start();

	//Include database connection details
	require_once('core/connection.php');
  include('helpers/helpers.php');

	$errors = array();

	//Sanitize the POST values
	$username = sanitize($_POST['userEmail']);
	$password = sanitize($_POST['password']);

	//Input Validations
	if($username == '') {
		$errors[] = 'Username missing';
	}
	if($password == '') {
		$errors[] = 'Password missing';
	}

	if(!empty( $errors)){
			echo display_errors($errors);
	}

		// create query
		$query = "SELECT * FROM users WHERE email='".$_POST['userEmail']."' AND password='".$_POST['password']."'";

		// execute query
		$sql = $db->query($query);
		// num_rows will count the affected rows base on your sql query. so $n will return a number base on your query
		$n = $sql->num_rows;

	if($sql) {
		if($n > 0) {
			//Login Successful
			session_id("login");
			$member = mysqli_fetch_assoc($sql);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
			$_SESSION['SESS_LAST_NAME'] = $member['lastname'];
      $_SESSION['SESS_EMAIL_ID'] = $member['email'];
      $_SESSION['SESS_PERMISSIONS'] = $member['permissions'];
			session_write_close();
			include("login_index.php");
			exit();
		}else {
			//Login failed
			$errors[] = 'user name and password not found';
				include("login.php");
				exit();
			}
	}else {
		die("Query failed");
	}
?>
