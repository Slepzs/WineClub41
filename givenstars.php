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


$sql = ("INSERT INTO stars(wines_wineid, users_userid, stars) values('$wineid', '$userid', '$stars')");
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $wineid, $userid, $stars);
$stmt->execute();
