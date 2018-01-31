<?php require_once('Connections/conexaobanco.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "adm";
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
$query_selectusuario = "SELECT * FROM tb_usuario";
$selectusuario = mysql_query($query_selectusuario, $conexaobanco) or die(mysql_error());
$row_selectusuario = mysql_fetch_assoc($selectusuario);
$totalRows_selectusuario = mysql_num_rows($selectusuario);
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
    <title>Controle Usuario</title>
</head>
<body>
    <header class="headermenucliente">
      <?php include_once('headercadastro.php'); ?>
    </header>
    <section class="sectioncontroleusuario">
        <div class="container">
            <h1>Controle Usuario</h1>
        </div>
        <div>
            <p>Esse espaço é somente para usuarios ADMINISTRATIVO onde os mesmos terao acesso a toda informação de cadastro dos clientes</p>
        </div>
        <div>
            
            
            <table class="tabelacontroleusuario">
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>E-Mail</th>
                  <th>Cidade</th>
                  <th>Celular</th>
                  <th>Estado</th>
                  <th>Senha</th>
                  <th>Tipo</th>
                  </tr>
                
                <?php do { ?>
                <tr>
                  <td><?php echo $row_selectusuario['id_usuario']; ?></td>
                  <td><?php echo $row_selectusuario['nome_usuario']; ?></td>
                  <td><?php echo $row_selectusuario['email_usuario']; ?></td>
                  <td><?php echo $row_selectusuario['cidade_usuario']; ?></td>
                  <td><?php echo $row_selectusuario['estado_usuario']; ?></td>
                  <td><?php echo $row_selectusuario['celular_usuario']; ?></td>
                  <td><?php echo $row_selectusuario['senha_usuario']; ?></td>
                  <td><?php echo $row_selectusuario['tipo_usuario']; ?></td>
                  <td> <button type="button" onClick="location. href='upload.php?id_usuario=<?php echo $row_selectusuario['id_usuario']; ?>'">Alterar</button> </td>
                  <td><button type="button" onClick="location. href='delet.php?id_usuario=<?php echo $row_selectusuario['id_usuario']; ?>'">Deletar</button></td>
                  </tr>
                <?php } while ($row_selectusuario = mysql_fetch_assoc($selectusuario)); ?>
                
            </table>
              
              
        </div>
    </section>
</body>
</html>
<?php
mysql_free_result($selectusuario);

mysql_free_result($selectcontroleusuario);
?>
