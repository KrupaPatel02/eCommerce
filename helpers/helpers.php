<?php
    function display_errors($errors){
        $display = "<ul class='bg-danger'>";
        foreach($errors as $error){
            $display .= "<li class='text-danger'>".$error."</li>";
        }
        $display .= "</ul>";
        return $display;

    }

function  sanitize($dirty){
    return htmlentities($dirty,ENT_QUOTES,"UTF-8");
}

function money($number){
    return "$" .   number_format($number,2);
}

function login($user_id,$name){
  session_id('login');
  $_SESSION['SESS_USER_ID'] = $user_id;
  $_SESSION['SESS_FIRST_NAME'] = $name;
  global $db;
  $date = date("Y-m-d H:i:s");
  $db->query("UPDATE users SET last_login = '$date' WHERE id = '$user_id'");
  $_SESSION['success_flash'] = 'You are now logged in!';
  include("index.php");
}

function is_logged_in(){
  if(isset($_SESSION['SESS_USER_ID']) && $_SESSION['SESS_USER_ID'] > 0){
    return true;
  }
  return false;
}

function pretty_date($date){
  return date("M d, Y h:i A",strtotime($date));
}
