<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
   
	<title>CRUD PHP</title>



	<style>
	.box-search{
		display: flex; 
		justify-content: center;
		gap:.2%;
	}
</style>


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
		$result=$mysqli->query("SELECT * FROM funcionario") or die ($mysqli->error());
	?>
	<div class="box-search">
		<input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
		<button onclick="searchData()" class ="btn btn-primary" > 
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
       <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
		</button>
	</div>
	<br>
		<a href="index.php" type="submit" class="btn btn-primary">Cadastrar</a>
		
	<div class="row justify-content-center">
		<table class="table">
		
			<thead>
			
				<tr  style="background-color: ffffff">
					<th>nome</th>
					<th>data_nascimento</th>
					<th>morada</th>
					<th>telefone</th>
					<th>area_formado</th>
					<th>nfi</th>
					
					
					<th colspan="2">Ação</th>
				</tr>
			</thead>
		<?php 
			while ($row=$result->fetch_assoc()):?>
				<tr>
					<td><?php echo $row['nome']?></td>
					<td><?php echo $row['data_nascimento']?></td>
					<td><?php echo $row['morada']?></td>
					<td><?php echo $row['telefone']?></td>
					<td><?php echo $row['area_formado']?></td>
					<td><?php echo $row['nfi']?></td>
                    		
					
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

</script>
</html>