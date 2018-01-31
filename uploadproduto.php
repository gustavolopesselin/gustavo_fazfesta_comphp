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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "update_produto")) {
  $updateSQL = sprintf("UPDATE tb_produto SET tipo_produto=%s, cor_produto=%s, descricao_produto=%s, quantidade_produto=%s, precound_produto=%s WHERE id_produto=%s",
                       GetSQLValueString($_POST['tipo_produto'], "text"),
                       GetSQLValueString($_POST['cor_produto'], "text"),
                       GetSQLValueString($_POST['descricao_produto'], "text"),
                       GetSQLValueString($_POST['quantidade_produto'], "int"),
                       GetSQLValueString($_POST['precound_produto'], "double"),
                       GetSQLValueString($_POST['id_usuario'], "int"));

  mysql_select_db($database_conexaobanco, $conexaobanco);
  $Result1 = mysql_query($updateSQL, $conexaobanco) or die(mysql_error());

  $updateGoTo = "produtosloginadm.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_selectupdateproduto = "-1";
if (isset($_GET['id_produto'])) {
  $colname_selectupdateproduto = $_GET['id_produto'];
}
mysql_select_db($database_conexaobanco, $conexaobanco);
$query_selectupdateproduto = sprintf("SELECT * FROM tb_produto WHERE id_produto = %s", GetSQLValueString($colname_selectupdateproduto, "int"));
$selectupdateproduto = mysql_query($query_selectupdateproduto, $conexaobanco) or die(mysql_error());
$row_selectupdateproduto = mysql_fetch_assoc($selectupdateproduto);
$totalRows_selectupdateproduto = mysql_num_rows($selectupdateproduto);
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
    <title>Dados Produtos</title>
</head>
<body>
    <section class="sectiondadoscontacliente">
      <div class="container sectioncadastroclientetesto">
        <img class="img_responsive" src="img/logotipo_fazfesta_cadastro.png" alt="">
          <h1 >Dados Produto</h1>
        </div>
        <div class="container">
            <form action="<?php echo $editFormAction; ?>" class="form-horizontal" method="POST" name="update_produto">
                <fieldset>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-6 control-label" for="txt_nomedadosconta">Tipo</label>  
                  <div class="col-md-6">
                  <input name="tipo_produto" type="text" required="" class="form-control input-md" id="txt_nomedadosconta" placeholder="Digite seu Nome Completo" value="<?php echo $row_selectupdateproduto['tipo_produto']; ?>" maxlength="50">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_emaildadosconta">Cor</label>  
                  <div class="col-md-6">
                  <input name="cor_produto" type="text" required="" class="form-control input-md" id="txt_emaildadosconta" placeholder="Digite seu E-Mail" value="<?php echo $row_selectupdateproduto['cor_produto']; ?>" maxlength="50">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_cidadedadosconta">Descrição</label>  
                  <div class="col-md-6">
                  <input name="descricao_produto" type="text" required="" class="form-control input-md" id="txt_cidadedadosconta" placeholder="Digite sua Cidade" value="<?php echo $row_selectupdateproduto['descricao_produto']; ?>" maxlength="20">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_estadodadosconta">Quantidade</label>  
                  <div class="col-md-6">
                  <input name="quantidade_produto" type="number" required="" class="form-control input-md" id="txt_estadodadosconta" placeholder="Digite seu Estado" value="<?php echo $row_selectupdateproduto['quantidade_produto']; ?>" maxlength="2">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_celulardadosconta">Preço Unidade</label>  
                  <div class="col-md-6">
                  <input name="precound_produto" type="number" required="" class="form-control input-md" id="txt_celularcadastro" placeholder="Digite seu Celular" value="<?php echo $row_selectupdateproduto['precound_produto']; ?>" maxlength="13"> 
                  </div>
                </div>
              
                <input type="hidden" value="<?php echo $row_selectupdateproduto['id_produto']; ?>" name="id_usuario">
                
                <!-- Button -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="btn_salvardadosconta"></label>
                  <div class="col-md-4">
                    <button id="btn_salvardadosconta" name="btn_salvardadosconta" class="btn btn-success">Salvar</button>
                  </div>
                </div>
                
                </fieldset>
                <input type="hidden" name="MM_update" value="id_produto">
                <input type="hidden" name="MM_update" value="update_produto">
                </form>
                </div>
            <h2><a href="menu.php">Voltar</a> </h2>
            </section>
</body>
</html>
<?php
mysql_free_result($selectupdateproduto);
?>
