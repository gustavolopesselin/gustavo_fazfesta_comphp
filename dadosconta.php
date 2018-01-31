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
            <form action="menu.php" class="form-horizontal" method="POST" name="update_usuario">
                <fieldset>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-6 control-label" for="txt_nomedadosconta">Nome Completo</label>  
                  <div class="col-md-6">
                  <input id="txt_nomedadosconta" name="nome_usuario" type="text" placeholder="Digite seu Nome Completo" class="form-control input-md" required="" maxlength="50">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_emaildadosconta">E-Mail</label>  
                  <div class="col-md-6">
                  <input id="txt_emaildadosconta" name="txt_emaildadosconta" type="email" placeholder="Digite seu E-Mail" class="form-control input-md" required="" maxlength="50">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_cidadedadosconta">Cidade</label>  
                  <div class="col-md-6">
                  <input id="txt_cidadedadosconta" name="txt_cidadedadosconta" type="text" placeholder="Digite sua Cidade" class="form-control input-md" required="" maxlength="20">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_estadodadosconta">Estado</label>  
                  <div class="col-md-6">
                  <input id="txt_estadodadosconta" name="txt_estadodadosconta" type="text" placeholder="Digite seu Estado" class="form-control input-md" required="" maxlength="2">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_celulardadosconta">Celular</label>  
                  <div class="col-md-6">
                  <input id="txt_celularcadastro" name="txt_celulardadosconta" type="text" placeholder="Digite seu Celular" class="form-control input-md" required="" maxlength="13">
                  <span class="help-block">Exemplo: (xx)xxxx-xxxx</span>  
                  </div>
                </div>
                
                <!-- Multiple Checkboxes -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="id_tipocadastrocliente">Tipo Usuario</label>
                    <div class="col-md-4">
                    <div class="checkbox">
                      <select id="selectbasic" name="tipo_usuario" class="form-control">
      						<option value="1">Usuario</option>
    				  </select>
                    </div>
                  </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="txt_senhadadosconta">Senha</label>
                  <div class="col-md-6">
                    <input id="txt_senhadadosconta" name="txt_senhadadosconta" type="text" placeholder="Digite sua Senha" class="form-control input-md" required="" maxlength="10">
                    
                  </div>
                </div>
                
                <!-- Button -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="btn_salvardadosconta"></label>
                  <div class="col-md-4">
                    <button id="btn_salvardadosconta" name="btn_salvardadosconta" class="btn btn-success">Salvar</button>
                  </div>
                </div>
                
                </fieldset>
                </form>
                </div>
            <h2><a href="menu.php">Voltar</a> </h2>
            </section>
</body>
</html>