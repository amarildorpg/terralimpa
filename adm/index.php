<?php
  $login_cookie = $_COOKIE['login'];
    if(isset($login_cookie)){
function saudacao( $nome = '' ) 
{date_default_timezone_set('America/Sao_Paulo');
$hora = date('H');
if( $hora >= 6 && $hora <= 12 )
return 'Bom dia' . (empty($nome) ? '' : ', ' . $nome);	
else if ( $hora > 12 && $hora <=18  )			return 'Boa tarde' . (empty($nome) ? '' : ', ' . $nome);
else return 'Boa noite' . (empty($nome) ? '' : ', ' . $nome);	
}
      echo saudacao(ucfirst($login_cookie))." <br>";

}else{
  echo "<script>alert('Você não tem aurorização para estar aqui.')</script>";
  echo "<script>window.location.href = '../index.php'</script>";
    }
?>
<html>
<head>
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
</head>
<body>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dados</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/shop-homepage.css" rel="stylesheet">

</head>

<body>
<form method="POST" action="index.php">
<td><select name="cidade">
    <option value="0" selected>ESCOLHA</option> 
  <option value="1">Sinop</option> 
  <option value="2">Cuiabá</option>
  
</select>
</td>
<td><input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar"></td>
</form>
<?php
if ($_POST['cidade']==1){
	$f = 'select * from pedido where cit="1"';	
}elseif ($_POST['cidade']==2){
	$f = 'select * from pedido where cit="2"';	
}else{
$f = 'select * from pedido';	
}
//echo $f;
?>




  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
    <a class="navbar-brand" href="index.php">Administração</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="imp.php">IMPORTAR CSV PAGSEGURO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sair.php">SAIR</a>
          </li>
          
        </ul> 
      </div>
    </div>
  </nav>
<table border="1" align="center">
  <tr>
    <td align='center'>CPF</td>
    <td align='center'>NOME</td>
    <td align='center'>Nº PEDIDO</td>
    <td align='center'>DATA</td>
    <td align='center'>VALOR</td>
    <td align='center'>CIDADE PARA ENTREGA</td>
    
    <td align='center'>STATUS</td>
  </tr>
<?php
require '../php/conn.php';
$select = mysqli_query($conn,"".$f."" );
if (mysqli_num_rows($select) >'0') {
  foreach ($select as $select_view) {
    if ($select_view['pedido_status'] == '0') {
     $status_pedido = 'Processando';
     $total_pr += $select_view['pedido_valor'];
   }elseif ($select_view['pedido_status'] == '1') {
     $status_pedido = '<font color= "green">Aprovado</font>';
     $total_ap += $select_view['pedido_valor'];
   }else {
     $status_pedido = '<font color= "red">Negado</font>';
     $total_na += $select_view['pedido_valor'];
   }
 $select2 = mysqli_query($conn,"select * from cliente where cpf = '".$select_view['cpf']."' ");
 $array = mysqli_fetch_array($select2);
$logarray = $array['nome'];
$total += $select_view['pedido_valor'];

if ($select_view['cit']=='1'){
    $cidade='Sinop';
}else {
    $cidade='Cuiabá';
}
 

   $num_for = number_format($select_view['pedido_valor'],2,",",".");
   $data = date("d/m/Y", strtotime($select_view['pedido_data']));
   
 $read_produto_carrinho = mysqli_query($conn, "SELECT produto.produto_desc, itens_pedidos.itens_pedido_quantidade, itens_pedidos.itens_pedido_valor_produto FROM itens_pedidos inner join pedido on itens_pedidos.itens_pedido_id_pedido = pedido.pedido_id INNER JOIN produto on itens_pedidos.itens_pedido_id_produto = produto.produto_id where pedido_id = ".$select_view['pedido_id']."
");
while($fetch = mysqli_fetch_row($read_produto_carrinho)){
        $a = "<p>". $fetch['0'] . " - " . $fetch['1'] . " - " .$fetch['2'] . " - </p>";
    }

 //if (mysqli_num_rows($read_produto_carrinho) >'0') {
   // foreach ($read_produto_carrinho as $read_produto_carrinho_view) ;
   //$nome_prod = $read_produto_carrinho_view['produto_desc'];
   //$quan_prod = $read_produto_carrinho_view['itens_pedido_quantidade'];
    //$val_prod = $read_produto_carrinho_view['itens_pedido_valor_produto'];
// } 
 
   
 echo'<tr>
    <td >'.$select_view['cpf'].'</td>
    <td>'; ?>
<script src="../css/jquery.min.js"></script>
<input type="button" style="width:400;height:40" value="<?php echo $logarray;?>" id="<?php echo $select_view['pedido_id'];?>">
<div id="1<?php echo $select_view['pedido_id'];?>2" style="display:none;">
<ul>
<table border="1" align="center">
<tr>
    <td>Produto</td><td>Quantidade</td><td>Valor UN.</td><td>Valor</td>
</tr>
<?php 
$read_produto_carrinho = mysqli_query($conn, "SELECT produto.produto_desc, itens_pedidos.itens_pedido_quantidade, itens_pedidos.itens_pedido_valor_produto, itens_pedidos.itens_pedido_valor_total FROM itens_pedidos inner join pedido on itens_pedidos.itens_pedido_id_pedido = pedido.pedido_id INNER JOIN produto on itens_pedidos.itens_pedido_id_produto = produto.produto_id where pedido_id = ".$select_view['pedido_id']."
");
while($fetch = mysqli_fetch_row($read_produto_carrinho)){
        echo "<tr><td>". $fetch['0'] . "</td><td>" . $fetch['1'] . "</td><td> " .$fetch['2'] . " </td><td> " .$fetch['3'] . " </td></tr>";
    }
    ?>

</table>
</ul>
</div>


    <script type="text/javascript">
        $(function() {
  $("#<?php echo $select_view['pedido_id'];?>").click(function(){
    if($("#1<?php echo $select_view['pedido_id'];?>2").css('display') === 'none'){
      $("#1<?php echo $select_view['pedido_id'];?>2").show();
    }else{
      $("#1<?php echo $select_view['pedido_id'];?>2").hide();
    }
    
  });
});
    </script>
    
    
    
 <?php   
    echo '</td>
      <td align="center">'.$select_view['pedido_id'].'</td>
      <td align="center">'.$data.'</td>
      <td>R$ '.$num_for.'</td>
      <td align="center">'.$cidade.'</td>
      <td align="center">'.$status_pedido.'</td>';
      
      if ($status_pedido == 'Processando') {
       echo  '<td><a href="baixar.php?id='. $select_view['pedido_id'].'">Baixar como Pago</a></td>';
      }
      
      if ($status_pedido == 'Processando') {
       echo  '<td><a href="bloqueio.php?id='. $select_view['pedido_id'].'"><font color="red">Bloquear Pedido<font></a></td>';
      }
    echo '</tr>';
  } 
    $fa= ($total_ap * 10)/100;
    $tl= $total_ap - $fa;
      echo '<table border="1" align="center"><TR><td>TOTAL TERRA LIMPA</TD><td>FAEPEN</TD><td>TOTAL APROVADO</TD><td>NEGADOS</TD><td>PROCESSANDOS</TD><td>BRUTO</TD></TR>';
      echo '<tr><td><font color="green">R$ '.number_format($tl,2,",",".").'</font></td><td><font color="green">R$ '.number_format($fa,2,",",".").'</font></td><td><font color="green">R$ '.number_format($total_ap,2,",",".").'</font></td><td><font color="red">R$ '.number_format($total_na,2,",",".").'</font></td><td><font color="#a2a600">R$ '.number_format($total_pr,2,",",".").'</font></td><td>R$ '.number_format($total,2,",",".").'</td></tr></table>';
}
 ?>
</table>

  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; TERRA Limpa <?php echo date('Y'); ?></p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
