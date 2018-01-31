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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "update_usuario")) {
  $updateSQL = sprintf("UPDATE tb_usuario SET nome_usuario=%s, email_usuario=%s, cidade_usuario=%s, estado_usuario=%s, celular_usuario=%s, senha_usuario=%s, tipo_usuario=%s WHERE id_usuario=%s",
                       GetSQLValueString($_POST['nome_usuario'], "text"),
                       GetSQLValueString($_POST['email_usuario'], "text"),
                       GetSQLValueString($_POST['cidade_usuario'], "text"),
                       GetSQLValueString($_POST['estado_usuario'], "text"),
                       GetSQLValueString($_POST['celular_usuario'], "text"),
                       GetSQLValueString($_POST['senha_usuario'], "text"),
                       GetSQLValueString($_POST['tipo_usuario'], "text"),
                       GetSQLValueString($_POST['id_usuario'], "int"));

  mysql_select_db($database_conexaobanco, $conexaobanco);
  $Result1 = mysql_query($updateSQL, $conexaobanco) or die(mysql_error());

  $updateGoTo = "controleusuario.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_consulta_usuario = "-1";
if (isset($_GET['id_usuario'])) {
  $colname_consulta_usuario = $_GET['id_usuario'];
}
mysql_select_db($database_conexaobanco, $conexaobanco);
$query_consulta_usuario = sprintf("SELECT * FROM tb_usuario WHERE id_usuario = %s", GetSQLValueString($colname_consulta_usuario, "int"));
$consulta_usuario = mysql_query($query_consulta_usuario, $conexaobanco) or die(mysql_error());
$row_consulta_usuario = mysql_fetch_assoc($consulta_usuario);
$totalRows_consulta_usuario = mysql_num_rows($consulta_usuario);
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
    <title>Dados Sobre a Conta</title>
</head>
<body>
    <section class="sectiondadoscontacliente">
      <div class="container sectioncadastroclientetesto">
        <img class="img_responsive" src="img/logotipo_fazfesta_cadastro.png" alt="">
          <h1 >Dados Sobre Sua Conta</h1>
        </div>
        <div class="container">
            <form action="<?php echo $editFormAction; ?>" class="form-horizontal" method="POST" name="update_usuario">
                <fieldset>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-6 control-label" for="txt_nomedadosconta">Nome Completo</label>  
                  <div class="col-md-6">
                  <input name="nome_usuario" type="text" required="" class="form-control input-md" id="txt_nomedadosconta" placeholder="Digite seu Nome Completo" value="<?php echo $row_consulta_usuario['nome_usuario']; ?>" maxlength="50">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_emaildadosconta">E-Mail</label>  
                  <div class="col-md-6">
                  <input name="email_usuario" type="email" required="" class="form-control input-md" id="txt_emaildadosconta" placeholder="Digite seu E-Mail" value="<?php echo $row_consulta_usuario['email_usuario']; ?>" maxlength="50">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_cidadedadosconta">Cidade</label>  
                  <div class="col-md-6">
                  <input name="cidade_usuario" type="text" required="" class="form-control input-md" id="txt_cidadedadosconta" placeholder="Digite sua Cidade" value="<?php echo $row_consulta_usuario['cidade_usuario']; ?>" maxlength="20">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_estadodadosconta">Estado</label>  
                  <div class="col-md-6">
                  <input name="estado_usuario" type="text" required="" class="form-control input-md" id="txt_estadodadosconta" placeholder="Digite seu Estado" value="<?php echo $row_consulta_usuario['estado_usuario']; ?>" maxlength="2">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_celulardadosconta">Celular</label>  
                  <div class="col-md-6">
                  <input name="celular_usuario" type="text" required="" class="form-control input-md" id="txt_celularcadastro" placeholder="Digite seu Celular" value="<?php echo $row_consulta_usuario['celular_usuario']; ?>" maxlength="13">
                  <span class="help-block">Exemplo: (xx)xxxx-xxxx</span>  
                  </div>
                </div>
                
                <!-- Select Basic -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="id_tipo">Tipo Usuario</label>
					  <div class="col-md-4">
						<select id="id_tipo" name="tipo_usuario" class="form-control">
						  <option value="usu" <?php if (!(strcmp("usu", $row_consulta_usuario['tipo_usuario']))) {echo "selected=\"selected\"";} ?>>Usuario</option>
						  <option value="adm" <?php if (!(strcmp("adm", $row_consulta_usuario['tipo_usuario']))) {echo "selected=\"selected\"";} ?>>Adminisitrador</option>
						</select>
					  </div>
					</div>

                <!-- Password input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_senhadadosconta">Senha</label>
                  <div class="col-md-6">
                    <input name="senha_usuario" type="text" required="" class="form-control input-md" id="txt_senhadadosconta" placeholder="Digite sua Senha" value="<?php echo $row_consulta_usuario['senha_usuario']; ?>" maxlength="10">
                    
                  </div>
                </div>
                
                <input type="hidden" value="<?php echo $row_consulta_usuario['id_usuario']; ?>" name="id_usuario">
                
                <!-- Button -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="btn_salvardadosconta"></label>
                  <div class="col-md-4">
                    <button id="btn_salvardadosconta" name="btn_salvardadosconta" class="btn btn-success">Salvar</button>
                  </div>
                </div>
                
                </fieldset>
                <input type="hidden" name="MM_update" value="update_usuario">
                </form>
                </div>
            <h2><a href="menu.php">Voltar</a> </h2>
            </section>
</body>
</html>
<?php
mysql_free_result($consulta_usuario);
?>
