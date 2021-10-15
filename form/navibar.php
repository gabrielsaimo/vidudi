<!DOCTYPE HTML>
<html lang="pt-br">

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/navibar.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
<?
$banco = abrirBanco();
if (empty($idusuario_cookie)) {
  $idusuario_cookie = 0;
}
$q1 = $banco->query("SELECT u.*,p.id,p.idemcargo,p.idrede from usuario u join pessoa p on (u.idusuario = p.idusuario)where u.idusuario =" . $idusuario_cookie);
$row = mysqli_fetch_array($q1);
if(!empty($idpessoa)){
  $qi = $banco->query("SELECT anexo from anexo where idobjeto=".$idpessoa);
  $rowi = mysqli_fetch_array($qi);
}

?>

<body>
  <style>
    .dropdown-menu-end {
      right: 0 !important;
      left: auto !important;
    }
  </style>
  <header>
    <div class="navibar1">
    </div>
  </header> <!-- section-header.// -->



  <div class="navibar1">

    <!-- ============= COMPONENT ============== -->
    <nav class="navbar navbar-expand-lg navbar-dark gradient-pattern">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="../img/logovid.jpg" style="width: 40px; border-radius: 50%;" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
          <ul class="navbar-nav">
            <li class="nav-item active"> <a class="nav-link" href="index.php">Inicio </a> </li>
            <? if (!empty($row['idemcargo']) and $row['idemcargo'] >= 3) { ?>
              <li class="nav-item"><a class="nav-link" href="?_modulo=pessoa&_colunas[]=nome&_colunas[]=sexo&_colunas[]=emcargo&_colunas[]=rede&_colunas[]=criadoem&_colunas[]=alteradoem&_pk=idpessoa">Pesquisar Membros</a></li>
              <li class="nav-item"><a class="nav-link" href="?_modulo=celula&_colunas[]=id&_colunas[]=celula&_colunas[]=endereco&_colunas[]=dia&_colunas[]=hora&_colunas[]=lider&_colunas[]=multiplicou">Células</a></li>
              <li class="nav-item"><a class="nav-link" href="?_modulo=celula&_acao=r">Inserir Celula</a></li>
            <? } ?>
          <!--  <li class="nav-item dropdown">
              <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown"> Teste </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#"> Submenu item 1</a></li>
                <li><a class="dropdown-item" href="#"> Submenu item 2 </a></li>
                <li><a class="dropdown-item" href="#"> Submenu item 3 </a></li>
              </ul>
            </li> -->
          </ul>
          <ul class="navbar-nav ms-auto">
           <!-- <li class="nav-item"><a class="nav-link" href="#">Test</a></li> -->
            <? if (!empty($row['idemcargo']) and $row['idemcargo'] > 3) { ?>
              <li class="nav-item"><a class="nav-link" href="index.php?_modulo=gerenciar&_acao=r">Gerenciar</a></li>
            <? } ?>
            <li class="nav-item dropdown">
              <?if(!empty($rowi['anexo'])){?>
              <a class="nav-link " data-bs-toggle="dropdown"><? echo '<img style="width: 30px;  border-radius: 80%;" src="data:image/gif;base64,' . base64_encode($rowi['anexo']) . '"/>'; ?></a>
              <?}else{?>
                <a class="nav-link " data-bs-toggle="dropdown"><img style="width: 30px; border-radius: 50%;" src="../img/avatar.jpg"/> </a>
                <?}?>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="index.php?_modulo=ipessoa&_acao=r&id=<?= $idpessoa ?>"> Seu perfil</a></li>
                <li><a class="dropdown-item" onclick="logout()" href="index.php?_modulo=sobre&_acao=r">Sobre</a></li>
                <li><a class="dropdown-item" onclick="logout()" href="index.php?&logout=Y">Sair</a></li>
              </ul>
            </li>
          </ul>
        </div> <!-- navbar-collapse.// -->
      </div> <!-- container-fluid.// -->
    </nav>
  </div><!-- container //  -->
  <script>
    function logout() {
      var c = document.cookie.split("; ");
      for (i in c)
        document.cookie = /^[^=]+/.exec(c[i])[0] + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";

    }
  </script>
</body>

</html>