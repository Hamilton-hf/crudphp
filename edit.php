<?php 

	include("db.php");
	$nombre = '';
	$descripcion= '';

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$query = "SELECT * FROM productos WHERE id = $id";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) == 1)
		{
		//	echo 'se puede editar';
			 $row = mysqli_fetch_array($result);
   			 $nombre = $row['nombre'];
    		 $descripcion = $row['descripcion'];

		}
	}
	if(isset($_POST['update']))
	{
		//		echo 'Actualizando';
		$id = $_GET['id'];
		$nombre = $_POST['title'];
		$desc = $_POST['description'];

		$query = "UPDATE productos SET nombre = '$nombre', descripcion = '$desc' WHERE id = $id";
		mysqli_query($conn, $query);

		$_SESSION['message'] = 'Registro Actualizado';
		$_SESSION['message_type'] = 'warning';
		header("Location: index.php");

	}
 ?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
	      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
	        <div class="form-group">
	          	<input name="title" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Title">
	        </div>
	        <div class="form-group">
	        	<textarea name="description" class="form-control" rows="2"><?php echo $descripcion;?></textarea>
	        </div>
	        <button class="btn-success" name="update">
	        	  Update
			</button>
	      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>