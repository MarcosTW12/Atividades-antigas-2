<?php
 include("conexao.php");
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Dados</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
  
    $sql= "SELECT codigo, titulo, ano, duracao FROM filme";

    $resultado = mysqli_query($conexao, $sql);

   if(mysqli_num_rows($resultado)){
    echo"<table><tr><th>Código</th>
    <th>Titulo</th><th>Data de Lançamento</th><th>Duração</th></tr>";
    while($row=mysqli_fetch_assoc($resultado)){
    echo"<tr><td>".$row["codigo"]."</td><td>".
    $row["titulo"]."</td><td>".
    $row["ano"]."</td><td>".$row["duracao"]."</td></tr>";
   } 
    echo"</table>";
}
   else{
    echo"Zero Resultados";
   }
   mysqli_close($conexao);
?>
<br>
<div class="center-button">
    <a href="pagina_principal.html" >Pagina de Cadastro</a>
</div>

</body>
</html>