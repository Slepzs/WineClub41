<?php
include('conn.php');



if(isset($_POST['submit'])) {

$wine_name = filter_input(INPUT_POST, 'wine_name', FILTER_SANITIZE_STRING) or die('Name wrong');

$wine_region_country = filter_input(INPUT_POST, 'wine_name', FILTER_SANITIZE_STRING) or die('Name wrong');

$wine_grapes = filter_input(INPUT_POST, 'wine_name', FILTER_SANITIZE_STRING) or die('Name wrong');

$wine_year = filter_input(INPUT_POST, 'wine_name', FILTER_SANITIZE_STRING) or die('Name wrong');

$wine_volume = filter_input(INPUT_POST, 'wine_name', FILTER_SANITIZE_STRING) or die('Name wrong');

$wine_size = filter_input(INPUT_POST, 'wine_name', FILTER_SANITIZE_STRING) or die('Name wrong');

$wine_price = filter_input(INPUT_POST, 'wine_name', FILTER_SANITIZE_STRING) or die('Name wrong');

$wine_real_price = filter_input(INPUT_POST, 'wine_name', FILTER_SANITIZE_STRING) or die('Name wrong');

$wine_date = filter_input(INPUT_POST, 'wine_name', FILTER_SANITIZE_STRING) or die('Name wrong');

$wine_img  = filter_input(INPUT_POST, 'wine_name', FILTER_SANITIZE_STRING) or die('Name wrong');




}




 ?>
