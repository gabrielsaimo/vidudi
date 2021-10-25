<?php
include('cb.php');
$login = $_POST['login'];
$entrar = $_POST['entrar'];
$senha = $_POST['senha'];
  if (isset($entrar)) {
    $banco = abrirBanco();
    $q = $banco->query("SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'") or die("erro ao selecionar");
    $row = mysqli_fetch_array($q);
      if (mysqli_num_rows($q)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.php';</script>";
        die();
      }else{
        $q1 = $banco->query("SELECT u.idusuario,p.idpessoa FROM usuario u join pessoa p on(u.idusuario = p.idusuario)WHERE u.idusuario =".
        $row['idusuario']);
        $array = mysqli_fetch_array($q1);
        if(mysqli_num_rows($q1)>0){
            setcookie("idusuario",$array['idusuario']);
            setcookie("id",$array['idpessoa']);
        }
        setcookie("login",$login);
        setcookie("idusuario",$row['idusuario']);
        header("Location:index.php?&k=1");
        exit;
      }
  }
