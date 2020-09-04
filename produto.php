<?php
session_start();
require 'php/conn.php';
$id_produto = addslashes($_GET['id']);
$read_produto = mysqli_query($conn,'SELECT * FROM produto where produto_id='.$id_produto.' order by produto_desc ASC');
if (mysqli_num_rows ($read_produto) > '0'){
  foreach ($read_produto as $read_produto_view) ;
}else {
header('Location: index.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Terra Limpa</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>


  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Voltar a comprar Sem adicionar ao Carrinho</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="meus-pedidos.php">Meus Pedidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="meu-carrinho.php">Meu Carrinho</a>
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

      <div class="col-lg-9">



        <div class="card mt-4">
            <!--<img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">-->
            <div class="card-body">
              <h3 class="card-title"><?php echo $read_produto_view['produto_desc']; ?></h3>
              <h4>R$ <?php echo number_format($read_produto_view['produto_preco'], 2,".",","); ?></h4>
              <p class="card-text"><?php echo $read_produto_view['produto_desc_breve']; ?> </p>
              </div>
              <div class="text-right">
                <form action="meu-carrinho.php" method="post">
                  quantidade:
                  <select name="quant">
                <?php
                    for ($i=1; $i<=50; $i++)
                    {
                        ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                        <?php
                    }
                ?>

</select>
                  <input type="hidden" name="produto"  value="<?php echo $id_produto; ?>"/>
                  <input type="submit"  class="btn btn-success" value='Adicionar ao Carrinho' />
                </form>

              </div>
              <br />
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
      <p class="m-0 text-center text-white">Copyright &copy; TERRA LIMPA <?php echo date('Y'); ?></p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
