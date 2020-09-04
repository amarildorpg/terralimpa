<?php
require '../php/conn.php';
$login = $_POST['login'];
$entrar = $_POST['oi'];
$senha = md5($_POST['senha']);


  if (isset($entrar)) {

    $verifica = mysqli_query($conn,"SELECT * FROM login WHERE login =
    '$login' AND senha = '$senha'") or die("erro ao selecionar");
      if (mysqli_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='../index.php';</script>";
        die();
      }else{
        setcookie("login",$login);
        header("Location:index.php");
      }
  }
?>
