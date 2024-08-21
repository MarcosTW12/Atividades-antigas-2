<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM filme WHERE codigo = $id";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_assoc($resultado);
        $codigo = $row['codigo'];
        $titulo = $row['titulo'];
        $ano = $row['ano'];
        $duracao = $row['duracao'];
    } else {
        echo "Filme não encontrado.";
        exit;
    }
} else {
    echo "ID do filme não especificado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novoTitulo = $_POST['titulo'];
    $novoAno = $_POST['ano'];
    $novaDuracao = $_POST['duracao'];

    $atualizarSql = "UPDATE filme SET titulo = '$novoTitulo', ano = '$novoAno', duracao = '$novaDuracao' WHERE codigo = $id";
    if (mysqli_query($conexao, $atualizarSql)) {
        header("Location: select2.php"); 
        exit;
    } else {
        echo "Erro ao atualizar o filme: " . mysqli_error($conexao);
    }
}

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Filme</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="time"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        a {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Alterar Filme</h1>
        <form action="" method="post">
            <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?php echo $titulo; ?>">
            <br><br>
            <label for="ano">Ano de Lançamento:</label>
            <input type="number" name="ano" id="ano" value="<?php echo $ano; ?>">
            <br><br>
            <label for="duracao">Duração:</label>
            <input type="time" name="duracao" id="duracao" value="<?php echo $duracao; ?>">
            <br><br>
            <input type="submit" value="Salvar Alterações">
        </form>
        <a href="select2.php">Voltar para a lista de filmes</a>
        <a href="pagina_principal.html">Voltar para a Pagina de Cadastro</a>
    </div>
</body>
</html>
