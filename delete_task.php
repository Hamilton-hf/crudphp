<?php 

	require_once('db.php');

	if(isset($_GET['id']))
	{
		$id= $_GET['id'];
		$query = "DELETE FROM productos WHERE id= $id";
		$result = mysqli_query($conn, $query);
		if(!$result)
		{
			die("Error");
		}
		else{
			$_SESSION['message'] = 'Dato eliminado correctamente';
			$_SESSION['message_type'] = 'danger';
			header("Location: index.php");
		}
	}

 ?>