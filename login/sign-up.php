<?php
  if (isset($_POST['submit'])) {

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING) or die('Error in username');
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING) or die('password');
    $retypepassword = filter_input(INPUT_POST, 'retypepassword', FILTER_SANITIZE_STRING) or die('Error in retyped password');
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) or die('password');

    if(empty($username) || empty($password) ) {
      Echo 'No username or password given';
      exit;
    } elseif(!preg_match('/^[a-zA-z]*$/', $username)) {
      Echo 'Characters not valid';
      exit;
    } elseif($password !== $retypepassword) {
      echo 'Passwords are not matching';
    } else {
      $sqlcheck = "SELECT username, password, email FROM users WHERE username='$username'";
      $stmt = $conn->prepare($sqlcheck);
      $stmt->execute();
      $stmt->store_result();
      $result = $stmt->num_rows;
      if($result > 0) {
        echo 'Findes allerede';
      } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt1 = $conn->prepare('INSERT INTO users(username, password, email) VALUES(?, ?, ?)');
        $stmt1->bind_param('sss', $username, $password, $email);
        $stmt1->execute();
        header('Refresh: 5; URL=admin-login.php');
        Echo 'User Created';
        exit;
      }
    }
  }
 ?>
