<?php 
include "config.php";

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {
		$firstname = $_POST['vardas'];
		$id = $_POST['id'];
		$projektas = $_POST['projektai'];
		// write the update query
		$sql = "UPDATE `forma` SET `vardas`='$firstname',`projektai`='$projektas', WHERE `id`='$id'";

		// execute the query
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "Record updated successfully.";
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `users` WHERE `id`='$id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			$first_name = $row['vardas'];
			$lastname = $row['projektai'];
			$id = $row['id'];
		}

	?>
		<h2>User Update Form</h2>
		<form action="" method="post">
		  <fieldset>
		    <legend>Informacija:</legend>
		   Vardas:<br>
		    <input type="text" name="vardas" value="<?php echo $first_name; ?>">
		    <input type="hidden" name="id" value="<?php echo $id; ?>">
		    <br>
		    Projektas:<br>
		    <input type="text" name="projektai" value="<?php echo $projektas; ?>">
		    <br>
		    <input type="submit" value="Update" name="update">
		  </fieldset>
		</form>

		</body>
		</html>




	<?php
	} else{
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: view.php');
	}

}
?>