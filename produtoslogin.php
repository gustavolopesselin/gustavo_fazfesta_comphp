<?php require_once('Connections/conexaobanco.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "usu,adm";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "menu.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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
$query_selectprodutousuario = "SELECT * FROM tb_produto";
$selectprodutousuario = mysql_query($query_selectprodutousuario, $conexaobanco) or die(mysql_error());
$row_selectprodutousuario = mysql_fetch_assoc($selectprodutousuario);
$totalRows_selectprodutousuario = mysql_num_rows($selectprodutousuario);
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
                  <td><?php echo $row_selectprodutousuario['id_produto']; ?></td>
                  <td><?php echo $row_selectprodutousuario['tipo_produto']; ?></td>
                  <td><?php echo $row_selectprodutousuario['cor_produto']; ?></td>
                  <td><?php echo $row_selectprodutousuario['descricao_produto']; ?></td>
                  <td><?php echo $row_selectprodutousuario['quantidade_produto']; ?></td>
                  <td><?php echo $row_selectprodutousuario['precound_produto']; ?></td>  
                  </tr>
                <?php } while ($row_selectprodutousuario = mysql_fetch_assoc($selectprodutousuario)); ?>
                
              </table>
              
              
        </div>
    </section>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
<?php
mysql_free_result($selectprodutousuario);
?>
