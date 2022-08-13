<?php  require_once ('db.php'); ?>
<?php require_once('includes/header.php'); ?>


<div class="container p-4">

	<div class="row">
		
		<div class="col-md-4">

			<?php 

				if(isset($_SESSION['message']))
				{ ?>
					<div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
  						<?= $_SESSION['message']?>
  						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
			<?php session_unset();
				}
			  ?>

			
			<div class="card card-body">
				<form action="save_task.php" method="POST">
					<div class="form-group">
						<input type="" name="title" class="form-control" placeholder="Product Name" autofocus>
					</div>
					<div class="form-group">
						<textarea name="description" rows="2" class="form-control" placeholder="description"></textarea>
					</div>
					<input type="submit" name="save" class="btn btn-success btn-block" value="Guardar">
				</form>
			</div>


		</div>

		<div class="col-md-8">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Producto</th>
						<th>Descripcion</th>
						<th>Fecha de Registro</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 

						$query = "SELECT * FROM productos";
						$result = mysqli_query($conn,$query);

						while($row = mysqli_fetch_array($result))
						{?>

							<tr>
								<!-- COLUMNAS/CELDAS DE DATOS -->
								<td><?php echo $row['nombre']?></td>
								<td><?php echo $row['descripcion']?></td>
								<td><?php echo $row['fechaRegistro']?></td>
								<td>
									<a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
										<i class="fas fa-marker"></i>
									</a>
									<a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
										<i class="far fa-trash-alt"></i>
									</a>
								</td>
							</tr>

						<?php } ?>
					 ?>
				</tbody>
			</table>
		</div>

	</div>
	
</div>


<?php require_once('includes/footer.php'); ?>




