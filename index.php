<?php session_start(); ?>
<?php include('loops.php'); ?>
<?php if(isset($_SESSION['username'])) { ?>
<?php include('includes/header.php'); ?>





<div class="uk-width-1-1" uk-grid>

<div class="uk-width-1-4">

  <div class="comment-section">
Comment section implementation
  </div>

</div>


<div class="uk-width-1-2">

<?php allWines(); ?>
</div>


<?php include('includes/sidebar.php'); ?>

</div>


<script type="text/javascript">
function getstars() {
var target = document.getElementById('allratinga');
var uservalue = document.getElementById('userstars').value;
var userid = document.getElementById('userid').value;
var wineid = document.getElementById('wineid').value;

var xhr = new XMLHttpRequest();
xhr.open('POST', 'givenstars.php?stars='+ uservalue + '&userid=' + userid + '&wineid=' + wineid, true);
xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
xhr.onreadystatechange  = function() {
  if(xhr.readyState == 4 && xhr.status == 200) {
   var result = xhr.responseText;
    target.innerHTML = result;send
  }
}
xhr.send();
};

var button = document.getElementsByClassName("submitstars");
for (var i = 0; i < button.length; i++) {
  button.item(i).addEventListener("click", getstars);
}




</script>

<?php include("includes/footer.php"); ?>
<?php } else { Header("Location: login.php"); }; ?>
