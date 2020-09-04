<?php
 require '../php/conn.php';
$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$query_select = mysqli_query($conn,"SELECT * FROM login WHERE login = '$login'");

$array = mysqli_fetch_array($query_select);
$logarray = $array['login'];

  if($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');window.location.href='
    criar.php';</script>";

    }else{
      if($logarray == $login){

        echo"<script language='javascript' type='text/javascript'>
        alert('Esse login já existe');window.location.href='
        criar.php';</script>";
        die();

      }else{
        $query = "INSERT INTO login (nome,cpf,login,senha) VALUES ('$nome','$cpf','$login','$senha')";
        $insert = mysqli_query($conn, $query);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='../index.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='criar.php'</script>";
        }
      }
    }
?>
