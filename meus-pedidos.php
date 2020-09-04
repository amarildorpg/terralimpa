<?php
session_start();
require 'php/conn.php';
if (isset($_SESSION['cpf'])) {
$cpf=$_SESSION['cpf'];
}elseif (isset($_POST['cpf'])) {
$cpf=$_POST['cpf'];
$_SESSION['cpf']=$cpf;
}else {
  echo "<script>window.location.href = 'cpf2.php'</script>";
}
echo "<center>Esse é seu <font size='20'>CPF ".$cpf." </font>Se não for<a href='limp.php' class='btn btn-success'>Clique aqui</a></center>";
if (!isset($_SESSION['carrinho'])) {
  $_SESSION['carrinho'] = array();
}

if (!isset($_SESSION['carrinho'])) {
  $_SESSION['carrinho'] = array();
}
if (isset($_GET['id'])) {


$id_produto = addslashes($_GET['id']);
$read_produto = mysqli_query($conn,'SELECT * FROM produto where produto_id='.$id_produto.' order by produto_desc ASC');
if (mysqli_num_rows ($read_produto) > '0'){
  foreach ($read_produto as $read_produto_view) ;
  if ($_SESSION['carrinho'] [$id_produto]) {
    $_SESSION['carrinho'] [$id_produto] += 1;
  }else {
    $_SESSION['carrinho'] [$id_produto] = 1;
  }
 header('Location: meu-carrinho.php');
}}
//print_r($_SESSION['carrinho']);
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
        <ul class="navbar-nav ml-auto" style="font-family: Jazz LET, fantasy">
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

      <div class="col-lg-12">
<h2>
Carrinho de Compras
</h2>
<table class="table">
  <tr>
    <td>PEDIDO</td>
    <td>DATA DA COMPRA</td>
    <td>VALOR</td>
    <td>STATUS</td>
    <td>OPÇÃO</td>
  </tr>
  <?php
 $read_pedido = mysqli_query($conn, "select * from pedido where cpf= '".$cpf."' order by pedido_data desc");
 if (mysqli_num_rows($read_pedido) >'0') {
   foreach ($read_pedido as $read_pedido_view) {
     if ($read_pedido_view['pedido_status'] == '0') {
      $status_pedido = 'Processando';
    }elseif ($read_pedido_view['pedido_status'] == '1'){
      $status_pedido = 'Aprovado';
    }else{
      $status_pedido = "<font color='red'>NEGADO</font>";  
    }
	$data = date("d/m/Y", strtotime($read_pedido_view['pedido_data']));
     echo'<tr>
       <td>'.$read_pedido_view['pedido_id'].'</td>
       <td>'.$data.'</td>
       <td>'.number_format($read_pedido_view['pedido_valor'], 2,".",",").'</td>
       <td>'.$status_pedido.'</td>';
       if ($status_pedido == 'Processando') {
        echo  '<td><a href="pagar.php?id='. $read_pedido_view['pedido_id'].'"><img class="img-responsive" src="img/ps.png" width="200" height="50"></a></td>';
       }

     echo '</tr>';
   }
 }

   ?>
    
</table>
<?php
$tot='0';
$select = mysqli_query($conn,"select * from pedido where pedido_status = 1 ");
if (mysqli_num_rows($select) >'0') {
	foreach ($select as $select_view) {
		$tot+=$select_view['pedido_valor'];
	}		
}

$tot2= ( 4000 * 100 ) / 3000;
?>
<table border="1px" bgcolor="yellow"  >
            <tr align='center'>
          <td> <font size=12>
     <b>Prezados Colaboradores(as)</b></font><p/>
	 </td>
	 </tr>
	 <tr>
	 <td>

Nosso projeto de Compras Coletivas não é comércio convencional, é uma ação de organização de compradores(as) ativos(as) e participativos(as) que constroem juntos respostas às ordens estabelecidas pelo mundo comercial, que visa lucro, e, muitas vezes, atinge patamares não acessíveis à maioria da população de média e baixa renda, quando se trata de alimento limpo, ou seja, produzidos sem insumos químicos, sem agrotóxicos.<p/>

A Compra Coletiva exige um espaço de tempo maior que o convencional, pois precisam atingir certas metas de valores e de quantidades, barateamento do frete, alcance do maior número de pessoas, para que cumpra sua função social.<p/>

<b>ENTREGA:</b> a data de entrega é aberta e será fechada assim que os itens acima sejam satisfatórios. Assim que a Compra Coletiva for encerrada, precisamos de um pequeno tempo para processamento junto aos gerenciadores de valores (FAEPEN e Pag Seguro). Em seguida, o dinheiro é depositado na conta do fornecedor, que enviará pelo sistema de transportes. Some-se a isso um tempo estimado de transporte, então receberemos o produto em Cuiabá e Sinop. <p/> 

<b>AVISO DE ENTREGA: </b>quando as pessoas compram no site, deixam seus dados, telefone, e-mail. Nossa equipe avisará com pelo menos 3 dias de antecedência o dia, o local e horário de entregas. <p/>

<b>TEMPO ESTIMADO DE ENTREGA: </b>em torno de 30 dias, podendo ser um pouco mais ou pouco menos, dependendo da velocidade de execução das compras e o atingimento de metas. <p/> 
        </td>
        </tr>
</table>
<table align="center">
<tr>
<td>

<div class="container">
  <h2>Meta da compra coletiva</h2>
  <div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $tot2; ?>%">
      <?php echo $tot2; ?>%
    </div>
  </div>
</div>
</td>
</tr>
</table>

<hr />
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
      <p class="m-0 text-center text-white">Copyright &copy; TERRA Limpa <?php echo date('Y'); ?></p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
