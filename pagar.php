<?php
session_start();
require 'php/conn.php';
require_once "pagseguro-php-sdk-master/vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

try {
    $sessionCode = \PagSeguro\Services\Session::create(
        \PagSeguro\Configuration\Configure::getAccountCredentials()
    );
$count_prod='0';
$payment = new \PagSeguro\Domains\Requests\Payment();

$id_pedido = addslashes($_GET['id']);
$read_pedido = mysqli_query($conn, "select * from pedido where pedido_id = '".$id_pedido."'");
if (mysqli_num_rows($read_pedido) > '0' ) {
 foreach ($read_pedido as $read_pedido_view);
  $read_itens_pedido = mysqli_query($conn, "select * from itens_pedidos inner join produto ON produto.produto_id = itens_pedidos.itens_pedido_id_produto where itens_pedido_id_pedido = '".$id_pedido."'");

if (mysqli_num_rows($read_itens_pedido) > '0' ) {

    foreach ($read_itens_pedido as $read_itens_pedido_view){
      $count_prod ++;
      $payment->addItems()->withParameters(
          $count_prod,
          $read_itens_pedido_view['produto_desc'],
          $read_itens_pedido_view['itens_pedido_quantidade'],
          $read_itens_pedido_view['itens_pedido_valor_produto']
      );
    }
  }
}
$payment->setCurrency("BRL");
$payment->setReference($id_pedido);
$payment->setRedirectUrl("http://terralimpacc.org");
$payment->setSender()->setName('Amarildo Silva');
$payment->setSender()->setEmail('amarildorpg@gmail.com.br');
$payment->setShipping()->setCost()->withParameters(0.00);
$payment->setShipping()->setType()->withParameters(\PagSeguro\Enum\Shipping\Type::SEDEX);
$payment->addParameter()->withArray(['notificationURL', 'http://terralimpacc.org/notificacao-carrinho-compras.php']);
  $payment->setRedirectUrl("http://terralimpacc.org");
  $payment->setNotificationUrl("http://terralimpacc.org/notificacao-carrinho-compras.php");
    try {

        /**
         * @todo For checkout with application use:
         * \PagSeguro\Configuration\Configure::getApplicationCredentials()
         *  ->setAuthorizationCode("FD3AF1B214EC40F0B0A6745D041BF50D")
         */
        $result = $payment->register(
            \PagSeguro\Configuration\Configure::getAccountCredentials()
        );

       //echo "<h2>Criando requisi&ccedil;&atilde;o de pagamento</h2>"
        //    . "<p>URL do pagamento: <strong>$result</strong></p>"
          //  . "<p><a title=\"URL do pagamento\" href=\"$result\" target=\_blank\">Ir para URL do pagamento.</a></p>";
        echo "<script>window.location.href = '".$result."'</script>";
    } catch (Exception $e) {
        die($e->getMessage());
    }


} catch (Exception $e) {
    die($e->getMessage());
}


 ?>
