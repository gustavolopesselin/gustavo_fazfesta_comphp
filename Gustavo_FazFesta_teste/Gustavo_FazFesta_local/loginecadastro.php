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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['nome_usuario'])) {
  $loginUsername=$_POST['nome_usuario'];
  $password=$_POST['senha_usuario'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "menu.php";
  $MM_redirectLoginFailed = "loginecadastro.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_conexaobanco, $conexaobanco);
  
  $LoginRS__query=sprintf("SELECT nome_usuario, senha_usuario FROM tb_usuario WHERE nome_usuario=%s AND senha_usuario=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $conexaobanco) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html lang="pt">
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
    <title>Login e Cadastro</title>
</head>
<body>
    <header>
        <?php include_once('header.php'); ?>
    </header>
    <section class="sectioncadastro">
        <div class="container">
            <form action="<?php echo $loginFormAction; ?>" class="form-horizontal" method="POST" name="logindousuario">
                    <fieldset>
                    
                    <!-- Form Name -->
                    <legend>Login e Cadastro</legend>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="txt_login">Login</label>  
                      <div class="col-md-6">
                      <input id="txt_login" name="nome_usuario" type="text" placeholder="Digite seu Login" class="form-control input-md" required="">
                        
                      </div>
                    </div>
                    
                    <!-- Password input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="txt_senha">Senha</label>
                      <div class="col-md-6">
                        <input id="txt_senha" name="senha_usuario" type="password" placeholder="Digite sua Senha" class="form-control input-md" required="">
                        
                      </div>
                    </div>
                    
                    <!-- Button -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="btn_entrar"></label>
                      <div class="col-md-4">
                        <button id="btn_entrar" name="btn_entrar" class="btn btn-success sectioncadastrobuttonlogar">Entrar</button>
                      </div>
                    </div>
                    
                    
                    </fieldset>
                    </form>
        
            <div class="form-group">
                    <label class="col-md-4 control-label" for="btn_cadastro"></label>
                    <div class="col-md-4">
                        <a href="cadastrocliente.php"><button id="btn_cadastro" name="btn_cadastro" class="btn btn-warning sectioncadastrobuttoncadastro">Cadastre-se</button></a>
                    
                    </div>
                </div> 
        </div>        
    </section>
    <section class="sectioncadastroinfo">
        <div class="container">
            <p>Essa area é para clientes que queiram saber mais sobre nossos produtros
                e trabalho, tendo um contato com fotos atualizadas semanalmente de eventos 
                realizados pelo Faz Festa Locadora. Tambem temos anuncios de promoçoes
                de produtos especificos toda semana.

            </p>
    </div>
    </section>
    <footer>
        <?php include_once('footer.php'); ?>
        </footer>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>