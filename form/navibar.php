<?
$banco = abrirBanco();
if (empty($idusuario_cookie)) {
  $idusuario_cookie = 0;
}
$q1 = $banco->query("SELECT u.*,p.id,p.idemcargo,p.idrede from usuario u join pessoa p on (u.idusuario = p.idusuario)where u.idusuario =" . $idusuario_cookie);
$row = mysqli_fetch_array($q1);


?>
<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</head>

<body>
  <style>
    .navibar1 {
      width: 100%;
      padding-right: var(--bs-gutter-x, .75rem);
      padding-left: var(--bs-gutter-x, .75rem);
      margin-right: auto;
      margin-left: auto;
    }

    body {
      height: 50px;
    }

    .gradient-pattern {
      animation: gradient 4s ease infinite;
      background-image: linear-gradient(1deg, #79BAB6, #542B79);
      background-size: 400% 400%;
      height: 100%;
      width: 100%;
    }

    @keyframes gradient {
      0% {
        background-position: 51% 0%;
      }

      50% {
        background-position: 50% 100%;
      }

      100% {
        background-position: 51% 0%;
      }
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
            <li class="nav-item active"> <a class="nav-link" href="index.php">Home </a> </li>
            <? if (!empty($row['idemcargo']) and $row['idemcargo'] >= 3) { ?>
              <li class="nav-item"><a class="nav-link" href="?_modulo=pessoa&_colunas[]=nome&_colunas[]=sexo&_colunas[]=emcargo&_colunas[]=rede&_colunas[]=criadoem&_colunas[]=alteradoem&_pk=idpessoa">Pesquisar Pessoa</a></li>
              <li class="nav-item"><a class="nav-link" href="?_modulo=celula&_colunas[]=id&_colunas[]=celula&_colunas[]=endereco&_colunas[]=dia&_colunas[]=hora&_colunas[]=lider&_colunas[]=multiplicou">celulas</a></li>
              <li class="nav-item"><a class="nav-link" href="?_modulo=celula&_acao=r">Inserir celula</a></li>
            <? } ?>
            <li class="nav-item dropdown">
              <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown"> Hover me </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#"> Submenu item 1</a></li>
                <li><a class="dropdown-item" href="#"> Submenu item 2 </a></li>
                <li><a class="dropdown-item" href="#"> Submenu item 3 </a></li>
              </ul>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">tiem</a></li>
            <li class="nav-item"><a class="nav-link" href="#"> Menu item </a></li>
            <li class="nav-item dropdown">
              <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown"> Dropdown right </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"> Seu perfiu</a></li>
                <li><a class="dropdown-item" onclick="logout()" href="index.php">Sair</a></li>
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