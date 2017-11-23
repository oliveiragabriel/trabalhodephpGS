<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="./css/index.css"/>
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	</head>
	<body>
		<header class="cabecalho">
			<button class="cad"><a href="index.php">Voltar</a></button>
		</header>
		<div class="caixa">
			<img class="logo "src="./img/logo.png"/>
			<h1 class="title"> Novo por aqui? Cadastre-se </h1>
			<form action="cads.php" method="post" enctype="multipart/form-data">
				<input type="text" placeholder="Nome" name="nome" class="lado"/>
				<input type="text" placeholder="Sobrenome" name="sobrenome" class="lado"/></br></br>
				
				<label for="sexo">Sexo:</label>
				<input type="radio" name="sexo" class="sexo" value="F"/>F
				<input type="radio" name="sexo" class="sexo" value="M"/>M
				<input type="radio" name="sexo" class="sexo" value="O"/>Outro</br></br>
				
				<input type="email" placeholder="Email" name="email" class="box" size="46"/></br></br>
				<input type="text" placeholder="Nome de usuário" name="username" class="box" size="46"/></br></br>
				
				<input type="password" placeholder="Senha" name="senha" class="box" size="18"/>
				<input type="password" placeholder="Confirmação da senha" name="csenha" class="box" size="21"/>
				
				<input type="file" name="perfil"/>
				<input type="file" name="fundo"/>
				
				</br></br>
				
				<input type="submit" value="Cadastrar" id="ent"/>
			</form>
		</div>
	</body>
</html>