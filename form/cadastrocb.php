<?php
include_once('cb.php');
$login = $_POST['login'];
$senha = $_POST['senha'];
$confsenha = $_POST['confsenha'];
$banco = abrirBanco();
$q = $banco->query ("SELECT login,idusuario FROM usuario WHERE login = '$login'");
$array = mysqli_fetch_array($q);
$logarray = $array['login'];
$idusuario = $array['idusuario'];
  if($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');window.location.href='
    cadastro.php';</script>";
    }elseif($senha != $confsenha){?>
      <script language='javascript' type='text/javascript'>
      alert('As Senhas São Diferentes');window.location.href='cadastro.php'</script>";
    <?}else{
      if($logarray == $login){
        echo"<script language='javascript' type='text/javascript'>
        alert('Esse login já existe');window.location.href='
        cadastro.php';</script>";
        die();
      }else{
        $insert = $banco->query ("INSERT INTO usuario (login,senha,criadoem) VALUES ('$login','$senha',sysdate())");
        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='index.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');'</script>";
        }
      }
    }
?>
