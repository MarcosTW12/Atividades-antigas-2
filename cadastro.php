<?php
include("conexao.php");

$titulo = $_POST["titulo"];
$ano = $_POST["ano"];
$duracao = $_POST["duracao"];

$sql = "INSERT INTO filme (titulo, ano, duracao)
        VALUES ('$titulo', '$ano', '$duracao')";

if (mysqli_query($conexao, $sql)) {
    $mensagem = "Filme Cadastrado com Sucesso!";
} else {
    $mensagem = "Erro ao cadastrar o filme: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Filme - Resultado</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Resultado do Cadastro</h1>
        <p><?php echo $mensagem; ?></p>
        <p><a href="pagina_principal.html">Voltar à Página Principal</a></p>
    </div>
</body>
</html>
