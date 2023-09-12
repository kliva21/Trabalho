<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
   
	<title>CRUD PHP</title>
</head>
<body>





	<?php require_once 'process.php' ?>
	<?php 
		if (isset($_SESSION['message'])):?>
	<div class="alert alert-<?=$_SESSION['msg_type'] ?>">
		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message'])
		?>
	</div>
<?php endif?>
	<div class="container">
	<?php 
		$mysqli=new mysqli('localhost', 'root','','gest_pessoas' ) or die(mysqli_error($mysqli));
		$result=$mysqli->query("SELECT * FROM responsavel") or die ($mysqli->error());
	?>
	<br>
		<a href="index.php" type="submit" class="btn btn-primary">Cadastrar</a>
		
	<div class="row justify-content-center">
		<table class="table">
		
			<thead>
			
				<tr  style="background-color: ffffff">
					<th>Nome</th>
					<th>Apelido</th>
					<th>Relacao</th>
					<th>Telefone </th>
					<th>N_BI </th>

					<th colspan="2">Ação</th>
				</tr>
			</thead>
		<?php 
			while ($row=$result->fetch_assoc()):?>
				<tr>
					<td><?php echo $row['nome']?></td>
					<td><?php echo $row['apelido']?></td>
					<td><?php echo $row['relacao']?></td>
					<td><?php echo $row['telefone']?></td>
					<td><?php echo $row['n_bi']?></td>
					<td>
						<a href="index.php?edit=<?php echo $row['id'];?>" class="btn btn-success">Editar</a>
						<a href="process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger" onclick="return confirm('Tem a certeza que pretende eliminar este item?');">Eliminar</a>
					</td>
				</tr>
		<?php endwhile;?>
		</table>
	</div>

		</div>
	</form>
</div>
</div>
<script src="script.js"></script>
</body>
</html>