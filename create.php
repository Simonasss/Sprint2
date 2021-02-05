<?php 
include "config.php";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
		$first_name = $_POST['vardas'];
		$prjt = $_POST['projektai'];
		//write sql query

		$sql = "INSERT INTO `forma`(`vardas`, `projektai`) VALUES ('$first_name','$prjt')";

		// execute the query

		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

		$conn->close();

	}



?>

<!DOCTYPE html>
<html>
<body>

<h2>Signup Form</h2>

<form action="" method="POST">
  <fieldset>
    <legend>Personal information:</legend>
    Vardas:<br>
    <input type="text" name="vardas">
    <br>
    Projektai:<br>
    <input type="text" name="projektai">
    <br>
    <input type="submit" name="submit" value="submit">
  </fieldset>
</form>

</body>
</html>