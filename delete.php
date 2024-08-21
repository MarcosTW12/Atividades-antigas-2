<?php
include("conexao.php");

$deletar = $_POST['deletar'];

$sql = "DELETE FROM filme WHERE codigo = '$deletar'";
$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
    $mensagem = "Filme excluído com sucesso";
} else {
    $mensagem = "Algo deu errado: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Filme - Resultado</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Resultado da Exclusão</h1>
        <p><?php echo $mensagem; ?></p>
        <p><a href="pagina_principal.html">Voltar à Página Principal</a></p>
    </div>
</body>
</html>
