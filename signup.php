<?php include('conn.php');
      include('login/sign-up.php'); ?>
<?php include('includes/header.php'); ?>



<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
  <input type="text" name="username">
  <input type="text" name="password">
  <input type="text" name="retypepassword">
  <input type="email" name="email">
  <button type="submit" name="submit">submit</button>
</form>




<?php include("includes/footer.php"); ?>
