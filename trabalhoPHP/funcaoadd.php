<?php
	require_once "bancodedados.php";
	session_start();
	if( isset($_SESSION['usuario']) && isset($_GET['uid'] ))
	{	
		$user=$_SESSION['usuario'];
		$u['id']=$_GET['uid'];
		if(!bd_verificar_amizade_existe( $con, $user, $u ))
		{
			bd_adicionar_amizade( $con, $user, $u );
			header('location:home.php');
		}
		else
		{
			header('location:erro.php');
		}
	}
	
?>