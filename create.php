<?php 
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
	

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit;

$connection = require_once 'connection.php';
$id = $_POST['id'] ?? '';
if ($id){
	$connection->UpdateNote($_POST['id'],$_POST);
		header("location:index.php?msg=updated successfully&color=green");

}
else{
		$connection->addNote($_POST);
		header("location:index.php?msg=added successfully&color=green");
	
}
 



 ?>