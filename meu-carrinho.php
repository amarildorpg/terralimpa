<?php
session_start();
require 'php/conn.php';

if (isset($_POST['produto'])) {

$quant = $_POST['quant'];
$id_produto = addslashes($_POST['produto']);
$read_produto = mysqli_query($conn,'SELECT * FROM produto where produto_id='.$id_produto.' order by produto_desc ASC');
if (mysqli_num_rows ($read_produto) > '0'){
  foreach ($read_produto as $read_produto_view) ;
  if ($_SESSION['carrinho'] [$id_produto]) {
    $_SESSION['carrinho'] [$id_produto] += $quant;
  }else {
    $_SESSION['carrinho'] [$id_produto] = $quant;
  }
 header('Location: meu-carrinho.php');
}}
//print_r($_SESSION['carrinho']);
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
  <script>
  $(document).ready(function(){
    $('#campo').on('input', function(){
      $('#manda').prop('disabled', $(this).val().length < 11);
    });
  });
  </script>

</head>

<body>


  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Voltar a comprar</a>
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
<h2>
Carrinho de Compras
</h2>
<table class="table">
  <tr>
    <td>ITEM</td>
    <td>DESCRIÇÃO</td>
    <td>VALOR</td>
    <td>QUANTIDADE</td>
    <td>VALOR TOTAL</td>
    <td>opções</td>
  </tr>
  <?php
  $item_carrinho = '0';
  $valor_total_venda='0';
if (count($_SESSION['carrinho']) > '0') {
  foreach ($_SESSION['carrinho'] as $id_produto_carrinho => $quantidade_produto_carrinho) {
      $item_carrinho++;
$read_produto_carrinho = mysqli_query($conn, "select * from produto where produto_id=".$id_produto_carrinho." ");
if (mysqli_num_rows($read_produto_carrinho) >'0') {
foreach ($read_produto_carrinho as $read_produto_carrinho_view) ;
$valor_total_produto_carrinho = $quantidade_produto_carrinho * $read_produto_carrinho_view['produto_preco'];
$valor_total_venda += $valor_total_produto_carrinho;
}

    echo'<tr>
      <td>'.$item_carrinho.'</td>
      <td>'.$read_produto_carrinho_view['produto_desc'].'</td>
      <td>'.number_format($read_produto_carrinho_view['produto_preco'], 2,".",",").'</td>
      <td>'.$quantidade_produto_carrinho.'</td>
      <td>'.number_format($valor_total_produto_carrinho, 2,".",",").'</td>
      <td><a href="del_prod_car.php?id='. $id_produto_carrinho.'">Deletar</a></td>
    </tr>';
  }
}
   ?>
</table>
<hr />
<h3>VALOR TOTAL VENDA:R$ <?php echo number_format($valor_total_venda, 2,".",","); ?></h3>

<div class="text-right">
  <a href="index.php" class="btn btn-info">Continuar Comprando</a>
  <a href="cpf.php" class="btn btn-warning">Finalizar Pedido</a>
</div>
<br />

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
