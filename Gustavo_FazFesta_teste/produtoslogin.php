<?php require_once('Connections/conexaobanco.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_conexaobanco, $conexaobanco);
$query_selectproduto = "SELECT * FROM tb_produto";
$selectproduto = mysql_query($query_selectproduto, $conexaobanco) or die(mysql_error());
$row_selectproduto = mysql_fetch_assoc($selectproduto);
$totalRows_selectproduto = mysql_num_rows($selectproduto);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/fazfesta.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/responsiveslides.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animacao.js"></script>
    <title>Produtos</title>
</head>
<body>
    <header class="headermenucliente">
        <?php include_once('headercadastro.php'); ?>
    </header>
    <section class="sectionprodutoslogin">
        <div class="container">
            <h1>Produtos</h1>
        </div>
        <div>
            <p>Esse espaço é para que você possa conferir todos os produtos que o Faz Festa possui e ver suas caracteristicas</p>
        </div>
        <div>
            
            
            <table class="tabelaprodutos">
                <tr>
                  <th>ID</th>
                  <th>Tipo</th>
                  <th>Cor</th>
                  <th>Descrição</th>
                  <th>Quantidade</th>
                  <th>Preco UND</th>
                  </tr>
                
                
               <?php do { ?>
                <tr>
                  <td><?php echo $row_selectproduto['id_produto']; ?></td>
                  <td><?php echo $row_selectproduto['tipo_produto']; ?></td>
                  <td><?php echo $row_selectproduto['cor_produto']; ?></td>
                  <td><?php echo $row_selectproduto['descricao_produto']; ?></td>
                  <td><?php echo $row_selectproduto['quantidade_produto']; ?></td>
                  <td><?php echo $row_selectproduto['precound_produto']; ?></td> 
                  </tr>
                <?php } while ($row_selectproduto = mysql_fetch_assoc($selectproduto)); ?>
                
            </table>
              
        </div>
    </section>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
<?php
mysql_free_result($selectproduto);

mysql_free_result($selectcadeira);
?>
