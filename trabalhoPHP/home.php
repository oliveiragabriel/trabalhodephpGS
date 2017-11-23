<?php
	require_once "bancodedados.php";
	session_start();
		
	if(isset($_SESSION['usuario'])&& !isset($_GET['uid'] ))
	{
		$u = $_SESSION['usuario'];
	}
	else if(isset($_SESSION['usuario'])&& isset($_GET['uid'] ))
	{
		$u = bd_obter_usuario_por_id( $con, $_GET['uid'] );
	}
	else if(!isset($_SESSION['usuario'])&& isset($_GET['uid'] ))
	{
		$u = bd_obter_usuario_por_id( $con, $_GET['uid'] );
	}
	else
	{
		header('location:erro.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/home.css"/>
	</head>
	<body>
	<img class="perfil" src= <?php echo '"dados/'.$u['apelido'].'/perfil.jpg"'?>/>
	<img class="fundo" src= <?php echo '"dados/'.$u['apelido'].'/fundo.jpg"'?>/>
	<h2> <?php echo $u['apelido'];	?> </h2>
	<ul>
	<li> <?php echo $u['nome']; ?> </li>
	<li> <?php echo $u['sobrenome']; ?> </li>
	<li> <?php echo $u['sexo'];	?>	</li>
	<li> <?php echo $u['email']; ?> </li>
	<?php 
	if(isset($_SESSION['usuario']) && isset($_GET['uid'] ))
	{ 
		if(bd_verificar_amizade_existe( $con, $_SESSION['usuario'],[ 'id' => $_GET['uid'] ])){
	?>
	<form action="funcaoadd.php" method="get">
		<input type="submit" value="Adicionar" name="add"/></br></br>
		<input type="hidden" name="uid" value=<?php echo '"'.$_GET['uid'].'"';?>/>
		
	</form>	
	<?php 
		}
		else{
			echo "Esse contato já está na sua lista de amigos";
		}
	?>
	<?php 
	}
	
	if(isset($_SESSION['usuario']))
	{
		//if( isset( $_GET[ 'uid' ] ) )
		//	$u = bd_obter_usuario_por_id( $con, $_GET['uid'] );
		//else
		//	$u = $_SESSION[ 'usuario' ];
		//var_dump( $_SESSION['usuario'] );
		$amigos=bd_obter_amigos_usuario( $con, $u );
	?>
		<p>Amigos</p>
		
		<?php 
		foreach ($amigos as $amigo)
		{
		?>
		
		
		<div>
			<?php echo $amigo['nome'];?>
			<img src="./dados/<?php echo $amigo['apelido'] ?>/perfil.jpg"/>
		</div>
		<?php
		}
	}
	?>
	 
	</ul>
	
	</body>
</html>