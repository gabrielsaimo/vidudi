<? ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <title>Login</title>
</head>

<body>
  <style>
    <? if ($_COOKIE['mobile'] == 'Y') { ?>.form-container {
      width: 100% !important;
    }

    <? } ?>
  </style>

  <form method="POST" action="logincb.php">
    <div class="form-container" ng-class="done" style="padding-top: 0px;">
      <img src="../img/logovid.jpg" class="imagem" />
      <div class="login-form">

        <div>
          <input type="text" placeholder="Usuario" name="login">
        </div>

        <div>
          <input type="password" placeholder="Senha" name="senha">
        </div>

        <button type="submit" value="entrar" id="entrar" name="entrar" data-loading-btn class="">
          <span data-loaded-msg="Thank you!">Log in</span>
        </button>
        <button data-loading-btn class="">

          <a data-loading-btn href="cadastro.php" value=''>Cadastre-se </a>
        </button>
      </div>


    </div>
  </form>
  </div>
  </div>
</body>

</html>