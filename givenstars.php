<?php
include('conn.php');
include('loops.php');

function is_ajax_request() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

if(!is_ajax_request()) { exit; }

$stars = $_GET['stars'];
$userid = $_GET['userid'];
$wineid = $_GET['wineid'];


if($userid == null) {
$sql = ("INSERT INTO stars(wines_wineid, users_userid, stars) values(?, ?, ?)");
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $wineid, $userid, $stars);
$stmt->execute();
} else {
  $sqld = ("UPDATE stars SET stars=? WHERE users_userid = $userid AND wines_wineid = $wineid");
  $stmtd = $conn->prepare($sqld);
  $stmtd->bind_param("i", $stars);
  $stmtd->execute();
};



$sqlc = ("SELECT * FROM stars where users_userid = $userid");
$stmtc = $conn->prepare($sqlc);
$stmtc->execute();
$stmtc->bind_result($suerid, $swineid, $stars);

while($stmtc->fetch()) {};


  $sqlsel = ("SELECT stars FROM stars");
  $stmts = $conn->prepare($sqlsel);
  $stmts->execute();
  $stmts->bind_result($stars);

  while($stmts->fetch()) {
    $arraystars[] = $stars;
  }

    $allstars = array_sum($arraystars);
  echo $allstars / count($arraystars);

    if($allstars > 1 && $allstars < 2) {
      $ss = '<i class="fas fa-star"></i>';
      echo $ss;
    } elseif($allstars >= 2 && $allstars < 3 ) {
      $ss = '<i class="fas fa-star"></i><i class="fas fa-star"></i>';
          echo $ss;
    } elseif($allstars >= 3 && $allstars < 4) {
      $ss = '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
          echo $ss;
    } elseif($allstars >= 4 && $allstars < 5) {
      $ss = '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
          echo $ss;
    } elseif($allstars >= 5 && $allstars < 6) {
      $ss = '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
      echo $ss;
    } else {
      $ss = '<i class="fas fa-star"></i>';
      echo $ss;
    }
