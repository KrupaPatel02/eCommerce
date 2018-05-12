<?php
	//Start session
	session_start();

	//Include database connection details
require_once('core/connection.php');
include('helpers/helpers');

	//Sanitize the POST values
	$firstname = $_POST['firstname']; // get name value
  $lastname = $_POST['lastname'];
  $email  = $_POST['userEmail'];
  $ph = $_POST['phnumber']; // get name value
  $password = $_POST['password'];
  $confirmpwd = $_POST['confirmpwd'];
  $add1 = $_POST['add1'];
  $add2 = $_POST['add2'];
  $country = $_POST['country'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $zip = $_POST['zip'];

  $errors = array();
$required = array('firstname', 'lastname' , 'userEmail' , 'password', 'confirmpwd' , 'add1' , 'add2' , 'country' , 'state' ,'city' , 'zip');
  foreach($required as $field){
      if($_POST[$field] == ""){
          $errors[] = "All fields with an Asterisk(*) are required";
          break;
      }
  }

  if(!empty( $errors)){
      echo display_errors($errors);
  }

		// create query
		$query = "INSERT INTO users(firstname,lastname,email,add_line_1,add_line_2,phone_num,city,state,country,zip,password,join_date,last_login) VALUES('$firstname', '$lastname', '$email', '$add1', '$add2','$ph','$city','$state','$country','$zip','$password',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";

		// execute query
		$sql = $db->prepare($query);
        $sql->execute();
      $n = $sql->num_rows();
			include("login.php");

?>
