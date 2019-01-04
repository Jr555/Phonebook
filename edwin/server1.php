<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'register');

	// initialize variables
	$name = "";
	$address= "";
	$phone_number = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		$phone_number = $_POST['phone_number'];

		mysqli_query($db, "INSERT INTO contact (name, address, phone_number) VALUES ('$name', '$address', '$phone_number')"); 
		$_SESSION['message']; 
		header('location: welcome.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$phonenum = $_POST['phone_number'];

		mysqli_query($db, "UPDATE contact SET name='$name', address='$address' ,phone_number='$phone_number' WHERE id=$id" );
		$_SESSION['message']; 
		header('location: welcome.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM contact WHERE id=$id");
	$_SESSION['message']; 
	header('location: welcome.php');
}


	$results = mysqli_query($db, "SELECT * FROM contact");


	//Add button
	if(isset($_POST['back'])){
		header("location: welcome.php");
		
	}
	
	// ...	
?>
