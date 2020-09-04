<?php
$valor_total_venda='0';
session_start();
require 'php/conn.php';
$cpf = $_POST['cpf'];
$_SESSION['cpf']=$cpf;


if (count($_SESSION['carrinho']) == '0') {
echo "<script>alert('Não existe itens no seu carrinho.')</script>";
echo "<script>window.location.href = 'index.php'</script>";
}else {
  $insert_pedido="insert into pedido (pedido_data, pedido_data_hora, pedido_valor, pedido_status,cpf) values ('".date('Y-m-d')."','".date('Y-m-d H:i:s')."','0','0','".$cpf."')";
   mysqli_query($conn,$insert_pedido);
   $read_ultimo_pedido = mysqli_query($conn, "select pedido_id from pedido order by pedido_id desc limit 1");
   if(mysqli_num_rows($read_ultimo_pedido) > '0') {
     foreach ($read_ultimo_pedido as $read_ultimo_pedido_view) ;
   }

  foreach ($_SESSION['carrinho'] as $id_produto => $qtd_produto) {
    $read_produto_carrinho = mysqli_query($conn, "select * from produto where produto_id=".$id_produto." ");
    if (mysqli_num_rows($read_produto_carrinho) >'0') {
    foreach ($read_produto_carrinho as $read_produto_carrinho_view) ;
    $valor_total_produto_carrinho =  $qtd_produto * $read_produto_carrinho_view['produto_preco'];
    $valor_total_venda += $valor_total_produto_carrinho;
    }

    $inser_itens_pedido = "insert into itens_pedidos (itens_pedido_id_pedido,                    itens_pedido_id_produto, itens_pedido_quantidade, itens_pedido_valor_produto,                        itens_pedido_valor_total) values
                                                    ('".$read_ultimo_pedido_view['pedido_id']."','".$id_produto."',       '".$qtd_produto."',      '".$read_produto_carrinho_view['produto_preco']."','".$valor_total_produto_carrinho."')";
    mysqli_query($conn,$inser_itens_pedido);
    //echo $inser_itens_pedido;
  }
  $update_pedido = "update pedido set pedido_valor = '".$valor_total_venda."' where pedido_id = '".$read_ultimo_pedido_view['pedido_id']."'";
    mysqli_query($conn,$update_pedido);
    unset( $_SESSION['carrinho'] );
  echo "<script>alert('Pedido Finalizado.')</script>";
  echo "<script>window.location.href = 'meus-pedidos.php'</script>";
//echo $inser_itens_pedido;
}
?>
