<?php
session_start();
require_once "bancodedados.php";
$usuario=bd_obter_usuario_por_apelido_e_senha( $con, $_POST[ 'username' ], $_POST[ 'senha' ] );

var_dump( $con->errorInfo() );

if ($usuario!=false)
{
	$_SESSION['usuario']=$usuario;
	header('location:home.php');
}
else
{  
   header('location:erro.php');
}
?>