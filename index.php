<?php
session_start();
require 'php/conn.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="img/ico.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Terra Limpa</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link href="css/zoon.css" rel="stylesheet">

</head>

<body>
  <style type="text/css">
  .escondida {
      display:none;
  }
  </style>

  <script type="text/javascript">
  function abrir() {
      var main = document.getElementById("central");
      var iten = main.getElementsByTagName("input");
      if (iten) {
          for (var i=0;i<iten.length;i++) {
              iten[i].onclick = function() {
                  var el = document.getElementById(this.id.substr(7,7));
                  if (el.style.display == "block")
                      el.style.display = "none";
                  else
                      el.style.display = "block";
              }
          }
      }
  }
  window.onload=abrir;
  </script>


  <!-- Navigation -->
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">

      <a class="navbar-brand" href="index.php"><img src="img/tl.png" width='70' height='40'></a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto" style="font-family: Jazz LET, fantasy">


          <li class="nav-item">

            <a class="nav-link" href="meus-pedidos.php" >Meus Pedidos</a>
	
	</li>
          <li class="nav-item">
            <a class="nav-link" href="meu-carrinho.php">Meu Carrinho</a>
          </li>
          <li class="nav-item">
            <div id="central">
              <!-- Botao
                <input type="button" value="Administrador" id="receita1">-->
                <input type="image" src="img/adm.png" id="receita1" alt="Submit" width="35" height="35">
              <!-- conteudo escondido -->
                <div id="1" class="escondida">
                <!-- Aqui fica o seu form -->

                      <!-- INICIO DO FORMULÁRIO -->

                      <form id="formulario" method="post" action="adm/logar.php">

                        <p>
                        <font color="white">   Nome: </font> <br>
                          <input type="text" name="login" id="nome_id">
                        </p>

                        <p>
                        <font color="white">  Senha: </font><br>
                          <input type="password" name="senha" id="senha_id">
                          <input type="hidden" name="oi" value="oi">
                        </p>

                        <p>
                          <input class="botao" type="submit"  id="Logar" value="Logar">
                        </p>

                      </form>

                      <!-- FIM DO FORMULÁRIO -->


              </div>

            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

    <!--  <div class="col-lg-3">

        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>

      </div>
 /.col-lg-3 -->
 <table align= 'center'>
 <tr>
 <td>
<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <!--<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="img/unemat2.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/2.jpg" alt="Second slide">
            </div>
          <!--  <div class="carousel-item">
              <img class="d-block img-fluid" src="img/img3.png" alt="Third slide">
            </div>-->
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
 </div>
 </td>
 </tr>
      <div class="col-lg-12">

        
        <table border="1px" bgcolor="#32CD32">
            <tr>
            <td><center><b>
        Faça suas compras de ARROZ ORGÂNICO, é só encher o carrinho com quantos pacotes e de quais tipos você quiser. As entregas serão feitas em Sinop (na UNEMAT) e em Cuiabá (no Feitiço da Lua) e os compradores serão avisados pelos contatos que deixarem no site. O Terra Limpa é um projeto de Pesquisa e Extensão Universitária da UNEMAT/Sinop, não tem fins lucrativos, você estará pagando apenas o valor do produto, frete e taxas de serviço da Fundação (FAEPEN), que gerencia os recursos do projeto. O arroz orgânico virá de uma Cooperativa de Eldorado do Sul (Grande Porto Alegre), a COOTAP.</b></center>
        </td>
        </tr>
</table>
        <div class="row">
<?php
$read_produto = mysqli_query($conn,'SELECT * FROM produto order by produto_preco ASC');
if (mysqli_num_rows ($read_produto) > '0'){
  foreach ($read_produto as $read_produto_view) {

 ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <!--<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
              <div class="card-body">
                <h4 class="card-title">
                  <a href="produto.php?id=<?php echo $read_produto_view['produto_id']; ?>"><?php echo $read_produto_view['produto_desc']; ?></a>
                </h4>
                <h5>R$ <?php echo number_format($read_produto_view['produto_preco'], 2,".",","); ?></h5>
                <p class="card-text"><?php echo $read_produto_view['produto_desc_breve']; ?> </p>
              </div>

            </div>
          </div>

        <?php
          }
      }
         ?>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
     <p class="m-0 text-center text-white">Clique nas imagens e confira nossos Parceiros: <center><table><tr><td><a href='http://www.faepenmt.com.br/' target="_blank"><div class="zoom"><img class="img-responsive" src="img/img3.png" width='100' height='70'></div></a></td><td><a href='https://www.facebook.com/feiticodalua2/' target="_blank"><div class="zoom"><img class="img-responsive" src="img/u.jpg" width='100' height='70'></td></tr></table></a></center></div></p>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
