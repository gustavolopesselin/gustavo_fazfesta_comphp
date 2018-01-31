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
$query_selectindex = "SELECT tipo_servico, descricao_servico FROM tb_servico";
$selectindex = mysql_query($query_selectindex, $conexaobanco) or die(mysql_error());
$row_selectindex = mysql_fetch_assoc($selectindex);
$totalRows_selectindex = mysql_num_rows($selectindex);
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
    <title>Faz Festa Locadora</title>
</head>
<body>
    <header class="">
        <?php include_once('header.php'); ?>
    </header>
    <section class="row sectionindex">
        <div class="animated rotateInUpLeft container">
            <p>Melhores Cadeiras para Sua Festa</p>
        </div>
        <div class="slideshowindex container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="img/foto-1-cadeira.png" alt="Casamentos" style="width:100%;">
                    </div>
                    <div class="item">
                        <img src="img/foto-2-cadeira.png" alt="Churrasco" style="width:100%;">
                    </div>
                    <div class="item">
                        <img src="img/foto-3-cadeira.png" alt="Festa" style="width:100%;">
                    </div>
                    <div class="item">
                        <img src="img/foto-4-cadeira.png" alt="Confraternização" style="width:100%;">
                    </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>           
    </section>
    <section class="row sectionindexbarrapreta animar-interno">
            <ul class="rslides">
                    <li>
                        <blockquote>
                            <p>Confie em Nós para montarmos uma Festa Inesquecível</p>
                        </blockquote>
                    </li>
    
                    <li>
                        <blockquote>
                            <p>Toda a equipe do Faz Festa trabalha para que a sua Festa sejá a Melhor</p>
                        </blockquote>
                    </li>
    
                    <li>
                        <blockquote>
                            <p>Nosso trabalho é inteiramente focado para que seu evento seja especial</p>
                        </blockquote>
                    </li>
                </ul>
    </section>
    <section class="row sectioninformacoes">
        <div class="container infoindex">
            <?php $caminhofoto =("img/fotoindex")  ?>
            <?php $estilo = (".png") ?>
            <?php $x = 0 ?>

            <?php do { $x++?>
            <?php $foto = $caminhofoto . $x . $estilo ?>
              <div class="col-md-4 col-sm-12 col-xs-12 pbarraindex">
                <h1 class="col-md-12 col-sm-12 col-xs-12"><?php echo $row_selectindex['tipo_servico']; ?></h1>
                <img class="img_responsive" src="<?php echo $foto ?>" alt="">
                <p class="pindex"><?php echo $row_selectindex['descricao_servico']; ?></p>
                </div>
              <?php } while ($row_selectindex = mysql_fetch_assoc($selectindex)); ?>
                
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
mysql_free_result($selectindex);
?>
