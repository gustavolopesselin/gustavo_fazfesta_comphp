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
    <title> Produtos Faz Festa</title>
</head>
<body>
    <header>
        <?php include_once('header.php'); ?>
    </header>
    <section class="sectionprodutos1">
        <div class="animated rotateInUpLeft slideshowprodutos container">
                <h1>Cadeiras</h1>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="img/foto-1-cadeira.png" alt="Cadeira" style="width:100%;">
                    </div>
                    <div class="item">
                        <img src="img/foto-2-cadeira.png" alt="Cadeira" style="width:100%;">
                    </div>
                    <div class="item">
                        <img src="img/foto-3-cadeira.png" alt="Cadeira" style="width:100%;">
                    </div>
                    <div class="item">
                        <img src="img/foto-4-cadeira.png" alt="Cadeira" style="width:100%;">
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
    <section class="row sectionprodutos">
            <div class="slideshowprodutos container">
                    <h1>Mesas</h1>
                <div id="myCarousel2" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel2" data-slide-to="1"></li>
                        <li data-target="#myCarousel2" data-slide-to="2"></li>
                        <li data-target="#myCarousel2" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="img/foto-1-mesa.png" alt="Los Angeles" style="width:100%;">
                        </div>
                        <div class="item">
                            <img src="img/foto-2-mesa.png" alt="Chicago" style="width:100%;">
                        </div>
                        <div class="item">
                            <img src="img/foto-3-mesa.png" alt="New york" style="width:100%;">
                        </div>
                        <div class="item">
                            <img src="img/foto-4-mesa.png" alt="New york" style="width:100%;">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel2" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
    </section>
    <section class="row sectionprodutos">
        <div class="slideshowprodutos container">
                <h1>Sofá</h1>
            <div id="myCarousel3" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel3" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel3" data-slide-to="1"></li>
                    <li data-target="#myCarousel3" data-slide-to="2"></li>
                    <li data-target="#myCarousel3" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="img/foto-1-sofa.png" alt="Los Angeles" style="width:100%;">
                    </div>
                    <div class="item">
                        <img src="img/foto-2-sofa.png" alt="Chicago" style="width:100%;">
                    </div>
                    <div class="item">
                        <img src="img/foto-3-sofa.png" alt="New york" style="width:100%;">
                    </div>
                    <div class="item">
                        <img src="img/foto-4-sofa.png" alt="New york" style="width:100%;">
                    </div>
                </div>
                <a class="left carousel-control" href="#myCarousel3" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel3" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
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