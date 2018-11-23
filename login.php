<?php include('conn.php');
      include('login/login.php');
?>
<?php include('includes/header.php'); ?>



<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
  <input type="text" name="username">
  <input type="text" name="password">
  <button type="submit" name="submit">submit</button>
</form>




<?php include("includes/footer.php"); ?>
