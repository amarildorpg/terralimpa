<!DOCTYPE html>
<html lang="en">

<head>
<link rel="shortcut icon" href="img/ico.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dados</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link href="css/chec.css" rel="stylesheet">

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
<script type="text/javascript">
/* Máscaras ER */
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('telefone').onkeyup = function(){
		mascara( this, mtel );
	}
}
</script>
<script type="text/javascript">

function confere() {
    document.getElementById('ck_incluir').disabled = ! document.getElementById('ck_permissao').checked;
}
</script>
</div>
<center>
<div class="col-lg-10" align="center">
<table border="1px" bgcolor="yellow"  >
            <tr align='center'>
          <td> <font size=12>
     <b>Prezados compradores e compradoras</b></font><p/>
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
<?php
require 'php/conn.php';
$tot='0';
$select = mysqli_query($conn,"select * from pedido where pedido_status = 1 ");
if (mysqli_num_rows($select) >'0') {
	foreach ($select as $select_view) {
		$tot+=$select_view['pedido_valor'];
	}		
}

$tot2= ( $tot * 100 ) / 3000;
?>

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

	
    <table>
	<tr>
	<td colspan="2" height="24"> <b>Li e Concordo com as condiçoes estabelecidas acima:<b>
	<div class="checkbox-custom">
  <label>
               <input name="ck_permissao"  type="checkbox" id="ck_permissao" value="checkbox" onclick="return confere()" />
                <b></b>
                <span>CONCORDO</span>
            </label>
</div>
	
	
	</td>
	</tr>
	<form action="finalizar-pedido.php" name="cadastro" method="post">
    <tr>
	
      <td height="24">Nome Completo:</td>
      <td><input type="text" name="nome"  maxlength="60" size='30' required></td>
    </tr>
    <tr>
      <td height="24">CPF:</td>
      <td><input type="tel" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required></td>
    </tr>
    <tr>
      <td height="24">Telefone:</td>
      <td> <input type="text" name="telefone" id= 'telefone' maxlength="15" required></td>
    </tr>
    <tr>
      <td height="24">Cidade de Retirada:</td>
      <td><select name="cidade">
    <option value="0" selected>ESCOLHA</option> 
  <option value="1">Sinop</option> 
  <option value="2">Cuiabá</option>
  
</select>
</td>
    </tr>
    <td>
	<input disabled name="ck_incluir" type="submit" id="ck_incluir" value="Finalizar a compra"/>
		
  </td>
  <td>
    <?php  echo "<a href='" . $_SERVER['HTTP_REFERER'] . "'>Voltar</a>";  ?>
  </td>
    </tr>
		</form>
  </table>
</center>

</div>
<br />
</center>
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
