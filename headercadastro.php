<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "loginecadastro.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<div class="container">
            <a href="menu.php" class="col-md-12 col-sm-12 col-xs-12"><img src="img/logotipo_fazfesta_index.png" alt="Logo Faz Festa"></a>                    
            <nav class="col-md-12 col-sm-12 col-xs-12">
                <ul>
                    <li><a href="controleusuario.php">Controle de Usuarios</a></li>
                    <li><a href="produtosloginadm.php">Produtos ADM</a></li>
                    <li><a href="produtoslogin.php">Produtos</a></li>
                    <li><a href="dadosconta.php">Dados Sobre a Conta</a></li>
                    <li><a href="<?php echo $logoutAction ?>">Sair</a></li>
                </ul>
            </nav>
        </div>