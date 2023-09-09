<?php 
$connection = require_once 'connection.php';

$connection->RemoveNote($_POST['id']);

print_r($_POST);
header("location:index.php?msg=deleted successfully&color=red");


 ?>
