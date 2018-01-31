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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "inserir_usuario")) {
  $insertSQL = sprintf("INSERT INTO tb_usuario (nome_usuario, email_usuario, cidade_usuario, estado_usuario, celular_usuario, senha_usuario, tipo_usuario) VALUES (%s, %s, %s, %s, %s, %s, 'usu')",
                       GetSQLValueString($_POST['nome_usuario'], "text"),
                       GetSQLValueString($_POST['email_usuario'], "text"),
                       GetSQLValueString($_POST['cidade_usuario'], "text"),
                       GetSQLValueString($_POST['estado_usuario'], "text"),
                       GetSQLValueString($_POST['celular_usuario'], "text"),
                       GetSQLValueString($_POST['senha_usuario'], "text"));
                       //GetSQLValueString(isset($_POST['tipo_usuario']) ? "true" : "", "defined","'Y'","'N'"));

  mysql_select_db($database_conexaobanco, $conexaobanco);
  $Result1 = mysql_query($insertSQL, $conexaobanco) or die(mysql_error());

  $insertGoTo = "loginecadastro.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/fazfesta.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/responsiveslides.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animacao.js"></script>
    <title>Cadastro Cliente</title>
</head>
<body>
    <section class="sectioncadastrocliente">
        <div class="container ">
            <img class="img_responsive" src="img/logotipo_fazfesta_cadastro.png" alt="Logo Faz Festa">
            <h1 >Cadastre-se</h1>
        </div>
        <div class="container">
            <form action="<?php echo $editFormAction; ?>" class="form-horizontal" method="POST" name="inserir_usuario">
                <fieldset>
                
                <div class="form-group">
                  <label class="col-md-6 control-label" for="txt_nomecadastro">Nome Completo</label>  
                  <div class="col-md-6">
                  <input id="txt_nomecadastro" name="nome_usuario" type="text" placeholder="Digite seu Nome Completo" class="form-control input-md" required="" maxlength="50">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_emailcadastro">E-Mail</label>  
                  <div class="col-md-6">
                  <input id="txt_emailcadastro" name="email_usuario" type="email" placeholder="Digite seu E-Mail" class="form-control input-md" required="" maxlength="50">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_cidadecadastro">Cidade</label>  
                  <div class="col-md-6">
                  <input id="txt_cidadecadastro" name="cidade_usuario" type="text" placeholder="Digite sua Cidade" class="form-control input-md" required="" maxlength="20">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_estadocadastro">Estado</label>  
                  <div class="col-md-6">
                  <input id="txt_estadocadastro" name="estado_usuario" type="text" placeholder="Digite seu Estado" class="form-control input-md" required="" maxlength="2">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_celularcadastro">Celular</label>  
                  <div class="col-md-6">
                  <input id="txt_celularcadastro" name="celular_usuario" type="text" placeholder="Digite seu Celular" class="form-control input-md" required="" maxlength="13">
                  <span class="help-block">Exemplo: (xx)xxxx-xxxx</span>  
                  </div>
                </div>

                            
                <!-- Password input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_senhacadastro">Senha</label>
                  <div class="col-md-6">
                    <input id="txt_senhacadastro" name="senha_usuario" type="text" placeholder="Digite sua Senha" class="form-control input-md" required="" maxlength="10">
                    
                  </div>
                </div>
                
                <!-- Button -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="btn_cadastro"></label>
                  <div class="col-md-4">
                    <button id="btn_cadastro" name="btn_cadastro" class="btn btn-success" >Cadastre-se</button>
                  </div>
                </div>
                
                </fieldset>
                <input type="hidden" name="MM_insert" value="inserir_usuario">
                </form>
          
                
    <h2><a href="loginecadastro.php">Voltar</a> </h2>
    </section>
</body>
</html>
            