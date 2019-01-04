<?php 
include('server1.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM contact WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($results);
			$name = $n['name'];
			$address = $n['address'];
			$phone_number = $n['phone_number'];
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="new.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
</head>
<body>
	<form method="post" action="server1.php" >
	<?php if (isset($_SESSION['message'])): ?>
  	
		<div class="msg">
		
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM contact"); ?>

<table class="table table-dark">
	<thead>
	    <tr>
			<th></th>
			<th></th>
			<th><center><h1><font color="red">PHONEBOOK</font></h1></center></th>
			<th colspan="2"></th>
		</tr>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th>PhoneNumber</th>
			<th colspan="2">UPDATE</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td><?php echo $row['phone_number']; ?></td>
			<td>
				<a href="welcome.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server1.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	




	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<b><font color="yellow"><div class="input-group">
		<label>Name: </label>
		<input type="text" name="name" value="<?php echo $name; ?>">
	</div><br>
	<div class="input-group">
		<label>Address: </label>
		<input type="text" name="address" value="<?php echo $address; ?>">
	</div><br>
	<div class="input-group">
		<label>Phone Number: </label>
		<input type="text" name="phone_number" value="<?php echo $phone_number; ?>">
	</div></font><br>
	<div class="input-group">

		<?php if ($update == true): ?>
			<div class="input-group">
  	          <b><button class="btn" type="submit" name="update" style="background: #0000FF;" ><font color="white">Save</font></button></b>
  	        </div>
		<?php else: ?>
			<b><button class="btn" type="submit" name="save" >Save</button></b>
		<?php endif ?>
			<p class="change_link">
			  <b><a href="login.php"><font color="red">Logout</font></a></b>
			</p>
	</div>

</form>
</body>
</html>
