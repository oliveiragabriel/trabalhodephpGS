<?php

function bd_conectar( $bd ){
	
	$host = '127.0.0.1';
	$usuario = 'root';
	$senha = '';
	
	$str_con = 'mysql:host='.$host.';dbname='.$bd;
	
	$con = new PDO($str_con, $usuario, $senha);
	
	return $con;
}

function bd_obter_usuario_por_id( $con, $id ){
	$usuario = [];
	
	$sql = 'SELECT id, nome, sobrenome, sexo, email, apelido FROM usuario WHERE id = '.$id;
	$res = $con->query( $sql );
	
	foreach( $res as $us ){
		$usuario[ 'id' ] =        $us[ 'id' ];
		$usuario[ 'nome' ] =      $us[ 'nome' ];
		$usuario[ 'sobrenome' ] = $us[ 'sobrenome' ];
		$usuario[ 'sexo' ] =      $us[ 'sexo' ];
		$usuario[ 'email' ] =     $us[ 'email' ];
		$usuario[ 'apelido' ] =   $us[ 'apelido' ];
	}
	
	if( count( $usuario ) > 0 )
		return $usuario;
	else
		return false;
}

function bd_obter_usuario_por_apelido_e_senha( $con, $apelido, $senha ){
	$usuario = [];
	
	$sql = 'SELECT id, nome, sobrenome, sexo, email, apelido FROM usuario WHERE apelido = "'.$apelido.'" AND senha ="'.$senha.'"';
	$res = $con->query( $sql );

	foreach( $res as $us ){
		$usuario[ 'id' ] =        $us[ 'id' ];
		$usuario[ 'nome' ] =      $us[ 'nome' ];
		$usuario[ 'sobrenome' ] = $us[ 'sobrenome' ];
		$usuario[ 'sexo' ] =      $us[ 'sexo' ];
		$usuario[ 'email' ] =     $us[ 'email' ];
		$usuario[ 'apelido' ] =   $us[ 'apelido' ];
	}
	
	if( count( $usuario ) > 0 )
		return $usuario;
	else
		return false;
}

function bd_obter_usuario_por_apelido( $con, $apelido ){
	$usuario = [];
	
	$sql = 'SELECT id, nome, sobrenome, sexo, email, apelido FROM usuario WHERE apelido = "'.$apelido.'"';
	$res = $con->query( $sql );

	foreach( $res as $us ){
		$usuario[ 'id' ] =        $us[ 'id' ];
		$usuario[ 'nome' ] =      $us[ 'nome' ];
		$usuario[ 'sobrenome' ] = $us[ 'sobrenome' ];
		$usuario[ 'sexo' ] =      $us[ 'sexo' ];
		$usuario[ 'email' ] =     $us[ 'email' ];
		$usuario[ 'apelido' ] =   $us[ 'apelido' ];
	}
	
	if( count( $usuario ) > 0 )
		return $usuario;
	else
		return false;
}

function bd_obter_amigos_usuario( $con, $usuario ){
	$amigos = [];
	
	$sql = '(SELECT u.id, u.nome, u.sobrenome, u.sexo, u.email, u.apelido FROM usuario u 
	INNER JOIN amizade a ON (u.id=a.amigo_2_id)
	WHERE a.amigo_1_id = '.$usuario[ 'id' ].')
	UNION
	(SELECT u.id, u.nome, u.sobrenome, u.sexo, u.email, u.apelido FROM usuario u 
	INNER JOIN amizade a ON (u.id=a.amigo_1_id)
	WHERE a.amigo_2_id = '.$usuario[ 'id' ].')';
	
	$res = $con->query( $sql );
	
	foreach( $res as $us ){
		$amigo = [];
		$amigo[ 'id' ] =        $us[ 'id' ];
		$amigo[ 'nome' ] =      $us[ 'nome' ];
		$amigo[ 'sobrenome' ] = $us[ 'sobrenome' ];
		$amigo[ 'sexo' ] =      $us[ 'sexo' ];
		$amigo[ 'email' ] =     $us[ 'email' ];
		$amigo[ 'apelido' ] =   $us[ 'apelido' ];
		$amigos[]= $amigo;
	}
	
	return $amigos;
	
}

function bd_adicionar_usuario( $con, $usuario ){
	$sql = 'INSERT INTO usuario(nome,sobrenome,sexo,email,apelido,senha) VALUES 
	("'.$usuario[ 'nome' ].'","'.$usuario[ 'sobrenome' ].'","'.$usuario[ 'sexo' ].'","'.$usuario[ 'email' ].'","'.$usuario[ 'apelido' ].'","'.$usuario[ 'senha' ].'")';
	
	$suc = $con->exec( $sql );
	
	return $suc;
}

function bd_adicionar_amizade( $con, $amigo1, $amigo2 ){
	$sql = 'INSERT INTO amizade(amigo_1_id,amigo_2_id) VALUES ('.$amigo1[ 'id' ].','.$amigo2[ 'id' ].')';
	$suc = $con->exec( $sql );
	
	return $suc;
}

function bd_verificar_amizade_existe( $con, $amigo1, $amigo2 ){
	$sql = 'SELECT COUNT(*) as contador FROM amizade WHERE 
	(amigo_1_id = '.$amigo1[ 'id' ].' AND amigo_2_id = '.$amigo2[ 'id' ].')
	OR
	(amigo_1_id = '.$amigo2[ 'id' ].' AND amigo_2_id = '.$amigo1[ 'id' ].')';

	$res = $con->query( $sql )->fetchAll();

	$cont = $res[ 0 ][ 'contador' ];

	return  $cont > 0 ;
}

function bd_verificar_apelido_existe( $con, $apelido ){
	$sql = 'SELECT COUNT(*) as contador FROM usuario WHERE apelido ="'.$apelido.'"';
	$res = $con->query( $sql )->fetchAll();
	
	$cont = $res[ 0 ][ 'contador' ];
	
	return  $cont > 0 ;
}

function bd_verificar_email_existe( $con, $email ){
	$sql = 'SELECT COUNT(*) as contador FROM usuario WHERE email ="'.$email.'"';
	$res = $con->query( $sql )->fetchAll();
	
	$cont = $res[ 0 ][ 'contador' ];
	
	return  $cont > 0 ;
}

if( !isset( $con ) )
	$con = bd_conectar( 'rede_social' );

?>