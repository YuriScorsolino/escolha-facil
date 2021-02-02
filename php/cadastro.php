<!DOCTYPE html>
<?php
	require_once'Classes/usuarios.php';
	$u = new usuario;
?>

<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>Login</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div id="corpo-form">	
	<h1>Cadastrar</h1>
	<form method="POST">
		<input type="text" name="nome" placeholder="Nome Completo">
		<input type="text" name="telefone" placeholder="Telefone">
		<input type="Email" name="email" placeholder="Usuário">
		<input type="password" name="senha" placeholder="Senha">
		<input type="password" name="confsenha" placeholder="Confirmar Senha">
		<input type="submit" value="Cadastrar">
		<li><a href="index.php">Voltar para Página Inicial</a></li>
		
		
		
	</form>
</div>
<?php
//verificar se clicou no botão
if(isset($_POST['nome']))
{
	$nome = ($_POST['nome']);
	$telefone =($_POST['telefone']);
	$email = ($_POST['email']);
	$senha = ($_POST['senha']);
	$confirmarsenha = ($_POST['confsenha']);
//verificar se esta preenchido
	if(!empty($nome)&& !empty($telefone)&& !empty($email)&& !empty($senha)&& !empty($confirmarsenha))
	{
		$u->conectar("projeto_login","localhost","root","");
		if($u->msgErro == "")
		{
			if($senha == $confirmarsenha)
			{
				if($u->cadastrar($nome,$telefone,$email,$senha))
				{
					echo "cadastrado com sucesso!";
				}
				else
				{
					echo "Email já cadastrado!";
				}
			}
			else
			{
				echo "Senha e confirmar senha não corresponde!";
			}
			

		}else
		{
			echo "Erro:".$u->msgErro;
		}
	}else
	{
		echo "Preencha todos os campos!";
	}


}





?>


</body>
</html>