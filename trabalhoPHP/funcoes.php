<?php
function logar_usuario($u)
{
	$_SESSION['usuario']=$u;
}
function deslogar_usuario()
{
	unset ($_SESSION['usuario']); //unset() destrói a variável especificada.
}
function obter_usuario_logado()
{
	if (isset($_SESSION['usuario']))
	{
		return $_SESSION['usuario'];
	}
	else 
	{
		return false;
	}
	function finalizar_sessao()
	{
		session_destroy();//destrói todos os dados associados com a sessão atual. Ela não apaga nenhuma das variáveis globais associadas à sessão atual, nem apaga o cookie de sessão. 
	}
}


?>