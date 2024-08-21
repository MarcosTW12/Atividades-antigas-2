<?php
include("conexao.php");

$pesquisa = $_POST["pesquisa"];

$sql = "SELECT * FROM filme WHERE codigo LIKE '%$pesquisa%' OR titulo LIKE '%$pesquisa%' OR ano LIKE '%$pesquisa%' OR duracao LIKE '%$pesquisa%'";
$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    echo "Erro na consulta: " . mysqli_error($conexao);
} else {
    echo "<!DOCTYPE html>
          <html lang='pt-br'>
          <head>
              <meta charset='UTF-8'>
              <meta http-equiv='X-UA-Compatible' content='IE=edge'>
              <meta name='viewport' content='width=device-width, initial-scale=1.0'>
              <title>Resultados da Pesquisa</title>
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
                  
                  table {
                      width: 100%;
                      border-collapse: collapse;
                      margin-top: 20px;
                  }
                  
                  th, td {
                      border: 1px solid #ddd;
                      padding: 8px;
                      text-align: left;
                  }
                  
                  th {
                      background-color: #f4f4f4;
                  }
                  
                  a {
                      display: block;
                      margin-top: 10px;
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
              <div class='container'>
                  <h1>Resultados da Pesquisa</h1>";

    if (mysqli_num_rows($resultado) > 0) {
        echo "<table>";
        echo "<tr><th>Código</th><th>Nome</th><th>Ano de Lançamento</th><th>Duração</th></tr>";

        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $row['codigo'] . "</td>";
            echo "<td>" . $row['titulo'] . "</td>";
            echo "<td>" . $row['ano'] . "</td>";
            echo "<td>" . $row['duracao'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhum resultado encontrado.";
    }

    echo "<a href='pagina_principal.html'>Cadastrar Filmes</a>
          <a href='select2.php'>Ver os dados já cadastrados</a>
          <a href='delete.html'>Excluir Filmes</a>
          <a href='pesquisar.html'>Pesquisar Filmes</a>
          </div>
          </body>
          </html>";
}

mysqli_close($conexao);
?>
