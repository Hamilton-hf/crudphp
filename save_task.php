<?php 

	require_once('db.php');

	if(isset($_POST['save']))
	{
		$title = $_POST['title'];
		$description = $_POST['description'];

		$query = "INSERT INTO productos(nombre, descripcion) VALUES ('$title','$description')";
		$result = mysqli_query($conn, $query);

		if(!$result)
		{
			die("Qyeri failed");
		}
		else{
			$_SESSION['message'] = 'Dato guardado exitosamente';
			$_SESSION['message_type'] = 'success';
			header("Location: index.php");
		}
	}

 ?>