<!doctype html>
<html lang="pt-br">
	<head>
		<title> gravarDados.php </title>
		<meta charset="utf-8">
	</head>
	<body>
	<?php
	echo "Rodrigo Silva Nunes Rgm:30464820<br>";
	
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$telefone =$_POST["telefone"];
	$dataAgendamento =$_POST["dataAgendamento"];
	$horarioAgendamento =$_POST["horarioAgendamento"];
	$dataNascimento =$_POST["dataNascimento"];
	$tipo = $_POST["tipo"];
	$sexo = $_POST["sexo"];
	$deonca = $_POST["deonca"];
	$carteirinha = $_FILES["carteirinha"]["name"];
	$rg = $_FILES["rg"]["name"];
	$numeroCart = $_POST["numeroCart"];
	$situacaoMed = $_POST["situacaoMed"];
	$deonca = 0;
	
	
	if ($nome==""){
			die("Nome não pode ficar vazio");
	}
	if ($tipo == "") {
			die("Estado Civil deve ser escolhido!");
	}
	if ($sexo == "") {
			die("sexo deve ser escolhido!");
	}
	
	$con = mysqli_connect ("localhost", "root", "");
	
    mysqli_set_charset($con, "utf8");
	
    echo "<hr>";
        mysqli_select_db($con, "ALUNO30464820") or 
            die(
                "Erro na abertura do banco de dados:<br>" .
                mysqli_error($con)
            );
         
         $sql="
        INSERT INTO CADASTRO (  $nome,
		$email,
		$telefone,
		$dataAgendamento,
		$horarioAgendamento,
		$dataNascimento,
		$tipo,
		$sexo,
		$deonca,
		$carteirinha,
		$rg,
		$numeroCart,
		$situacaoMed) 
        VALUES ('$nome',
		'$email',
		'$telefone',
		'$dataAgendamento',
		'$horarioAgendamento',
		'$dataNascimento',
		'$tipo',
		'$sexo',
		'$deonca',
		'$carteirinha',
		'$rg',
		'$numeroCart',
		'$situacaoMed')
        ";
        mysqli_query($con, $sql) or 
            die(
                "Erro na inserção:<br>" .
                mysqli_error($con)
            );
			
			
			 $destino = "arquivos\\$rg";
            echo "Movendo arquivos para a pasta arquivos";
            move_uploaded_file($rg, $destino) or 
                die(
                    "Falha na transferência do arquivo:" .
                    $_FILES["rg"]["error"]
                );
        
        echo "CADASTRO $nome cadastrado com sucesso!<hr>";
	?>
</body>
</html>