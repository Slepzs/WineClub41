<?php session_start();
if(isset($_POST['submit'])) {
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING) or die('No can\'t do');
  $password = filter_input(INPUT_POST, 'password');
  if(empty($username) || empty($password)) {
    echo 'Empty fields';
  } else {
    $sql = "SELECT * FROM users WHERE username=?";
    if (!$stmt = $conn->prepare($sql)) {
      echo 'Derp';
    } else {
      $stmt->bind_param('s', $username);
      $stmt->execute();
      $resultat = $stmt->get_result();
      if($row = $resultat->fetch_assoc()) {
        $hash = $row['password'];
        if(password_verify($password, $hash)) {
          $_SESSION['userid'] = $row['userid'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['admin'] = $row['admin'];
          $succes = '<p>Du har succesfult logget ind ' . $_SESSION['username'] . '. Du vil nu blive redirected</p>';
          header('Refresh: 2; URL=index.php');
        } else {
          echo 'Du har dongoofed'; }
        } else {
          echo 'Blev ikke fundet i databasen';
        }
      }
    }
  }
 ?>
