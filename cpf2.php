<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dados</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

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

  <!-- Page Content
  <div class="container">

    <div class="row">-->

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
Digite seu CPF:
</h2>
<style type="text/css">
.tabela {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 10px;
}
</style>
<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)

  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }

}
</script>
	<form action="meus-pedidos.php" name="cadastro" method="post">
    <tr>
      <td height="24">CPF:</td>
      <td><input type="text" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required></td>
    </tr>
		<input type="submit" value="Meu carrinho">
	</form>
</div>
<br />
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; TERRA Limpa <?php echo date('Y'); ?></p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
