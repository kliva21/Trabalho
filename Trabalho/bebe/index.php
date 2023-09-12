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

		<div class="container my-5">
		



		</div>



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
		$result=$mysqli->query("SELECT * FROM bebe") or die ($mysqli->error());
	?>

	<div class="row justify-content-center">
		<table class="table">
			<thead>
				<tr>
					
				</tr>
			</thead>
		<?php 
			while ($row=$result->fetch_assoc()):?>
				<tr>
					</td>
				</tr>
		<?php endwhile;?>
		<H1>Bebe</H1>
		</table>
	</div>
	
<div class="row justify-content-center">
	<form action= "" method="POST">
		<input type="hidden" name="id" value="">
		
		<br><div class="form-group">
			<label>Nome</label>
			<input type="text" class="form-control" name="nome" placeholder="Digite o teu nome" required value="" style="width: 30">
		</div>
	
		<br><div class="form-group">
			<label>apelido</label>
			<input type="text" class="form-control" name="apelido" placeholder="Digite o teu apelido" required value=""style="width: 30%">
		</div>		
	
		<br><div class="form-group">		
			<label>data_nascimento</label>
			<input type="date" class="form-control" name="data_nascimento" placeholder="Digite a sua data_nascimento" required value=""style="width: 30%">
		</div>

		<br><div class="form-group">
			<label>Morada</label>
			<input type="text" class="form-control" name="morada" placeholder="Digite a sua moradada" required value=""style="width: 30%">
		</div>

		<br><div class="form-group">
			<label>concelho</label>
			<input type="text" class="form-control" name="concelho" placeholder="Digite o teu concelho" required value=""style="width: 30%">
		</div>

		<div>	<br><?php
	include_once("conexao.php");
?>
		Responsavel
				<br><select name="id_responsavel" style="
   
   width: 1119px;
    height: 26px;
    padding-right: 12px;
    padding-left: 12px;
    padding-bottom: 6px;

">
					<option >Selecione.</option>
					<?php
						$result_niveis_acessos = "SELECT * FROM responsavel";
						$resultado_niveis_acesso = mysqli_query($conn, $result_niveis_acessos);
						while($row_niveis_acessos = mysqli_fetch_assoc($resultado_niveis_acesso)){ ?>
						<option value="<?php echo $row_niveis_acessos['id']; ?>"><?php echo $row_niveis_acessos['nome']; ?></option> <?php
						}
					?>
						</select><br>

		
		

		<br><div class="form-group">
			<?php
				if($update==true):?>
				<button type="submit" class="btn btn-primary" name="atualizar">Atualizar</button>

			<?php else:?>
				<button type="submit" class="btn btn-primary" name="guardar" >Guardar</button>
				<a href="salvar.php" type="submit" class="btn btn-primary">Ver registo</a>
			<?php endif;?>

		</div>
	</form>
</div>
</div>
<script src="script.js"></script>
</body>
</html>