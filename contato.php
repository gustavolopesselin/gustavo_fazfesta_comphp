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
$query_selectcontato = "SELECT tipo_contato, descricao_contato FROM tb_contato";
$selectcontato = mysql_query($query_selectcontato, $conexaobanco) or die(mysql_error());
$row_selectcontato = mysql_fetch_assoc($selectcontato);
$totalRows_selectcontato = mysql_num_rows($selectcontato);
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
    <script>
            function initMap() {
            var uluru = {lat: -22.9340641, lng: -47.0671007};
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 18,
              center: uluru
            });
            var marker = new google.maps.Marker({
              position: uluru,
              map: map
            });
          }
            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7JBdljC0bCdl5FGEAyc0f_7F-3J5sgf0&callback=initMap"></script>
    <title>Contato Faz Festa</title>
</head>
<body>
    <header>
        <?php include_once('header.php'); ?>
    </header>
    <section class="row sectioncontato">
        <div class="animated rotateInUpLeft container">
            <h1>Contato</h1>
            <div class="container" id="map"></div>
            <h2>Av. Ralfo Leite de Barros, 235 - Jardim do Trevo, Campinas - SP, 13040-020</h2>
        </div>
    </section>
    <section class="row sectioncontatoinfo">
        <div class="container">
            <?php $nomefoto = "img/fotocontato"?>
            <?php $tipo = ".png"?>
            <?php $x = 0 ?>

            <?php do { $x++?>
            <?php $fotocontato = $nomefoto . $x . $tipo ?>
              <div class="col-md-4 col-sm-12 col-xs-12 pbarraindex">
                <h1 class="col-md-12 col-sm-12 col-xs-12"><?php echo $row_selectcontato['tipo_contato']; ?></h1>
                <img src="<?php echo $fotocontato ?>" alt="">
                <p><?php echo $row_selectcontato['descricao_contato']; ?></p>
              </div>
              <?php } while ($row_selectcontato = mysql_fetch_assoc($selectcontato)); ?>
     
        </div>
    </section>
    <footer class="row">
    <?php include_once('footer.php'); ?>
    </footer>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
<?php
mysql_free_result($selectcontato);
?>
