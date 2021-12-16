<?php
  function adminLogin($username,$password){
    $loginCorrect = false;
    $db_server_name = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "administrative_users";
    $db_table_name = "users";
    $conn = mysqli_connect($db_server_name,$db_username,$db_password,$db_name);
    $sql = "SELECT  user_pass,user_rname,user_pid FROM $db_table_name WHERE user_name='$username'";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if($count == 1){
      $data = mysqli_fetch_assoc($result);
      if(password_verify($password,$data["user_pass"])){
        echo 'Success';
        $_SESSION['username'] = $username;
        $_SESSION['real_name'] = $data["user_rname"];
        $_SESSION['user_verifier'] = $data["user_pid"];
        $loginCorrect = true;
        return $loginCorrect;
      }
      else {
        echo 'Failed';
        return $loginCorrect;
      }
      ob_end_flush();
    }
    return $loginCorrect;
  }
  ob_end_flush();
  /*$pass = "Kbl-124578";
  echo password_hash($pass, PASSWORD_DEFAULT);*/
?>
