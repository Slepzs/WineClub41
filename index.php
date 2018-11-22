<?php include('includes/header.php'); ?>




<div id="myDiv"><p>test</p></div>


<script type="text/javascript">

window.onload = function() {

  var elem = document.getElementById('myDiv');
  elem.parentNode.removeChild(elem);

}

</script>
<?php include("includes/footer.php"); ?>
