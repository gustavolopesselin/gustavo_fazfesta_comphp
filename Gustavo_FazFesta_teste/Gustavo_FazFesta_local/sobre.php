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
$query_selectsobre = "SELECT descricao_sobre FROM tb_sobre";
$selectsobre = mysql_query($query_selectsobre, $conexaobanco) or die(mysql_error());
$row_selectsobre = mysql_fetch_assoc($selectsobre);
$totalRows_selectsobre = mysql_num_rows($selectsobre);
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
    <title>Sobre Faz Festa</title>
</head>
<body>
    <header>
        <?php include_once('header.php'); ?>
    </header>
    <section class="row sectionsobre">
        <div class="container">
            <div class="animated rotateInUpLeft col-md-12 col-sm-12 col-xs-12">
                <h1>Sobre</h1>
            </div>
            

            <div class="col-md-6 col-sm-12 col-xs-12">
                <p><?php echo $row_selectsobre['descricao_sobre']; ?></p>
              </div>
              
              

            <div class="col-md-6 col-sm-12 col-xs-12 sectionalbumsobre">
              
          </div>
        </div>

    </section>

    <footer class="row">
        <?php include_once('footer.php'); ?>
    </footer>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	
    <script src="js/responsiveslides.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php
mysql_free_result($selectsobre);
?>
