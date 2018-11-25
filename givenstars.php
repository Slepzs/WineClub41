<?php
include('conn.php');

function is_ajax_request() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

if(!is_ajax_request()) { exit; }

$stars = $_GET['stars'];
$userid = $_GET['userid'];
$wineid = $_GET['wineid'];


$sqlc = ("SELECT * FROM stars where users_userid = $userid");
$stmtc = $conn->prepare($sqlc);
$stmtc->execute();
$stmtc->bind_result($suerid, $swineid, $stars);

while($stmtc->fetch()) {};

if($suerid == null) {
$sql = ("INSERT INTO stars(wines_wineid, users_userid, stars) values(?, ?, ?)");
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $wineid, $userid, $stars);
$stmt->execute();
} else {
  echo 'You have already votes once';
};


$sqlsel = ("SELECT stars FROM stars");
$stmts = $conn->prepare($sqlsel);
$stmts->execute();
$stmts->bind_result($stars);

while($stmts->fetch()) {
  $arraystars[] = $stars;

}


  $allstars = array_sum($arraystars);
echo $allstars / count($arraystars);
