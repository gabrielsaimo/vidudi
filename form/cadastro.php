<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <title>Cadastro</title>
</head>

<body>
  <style>
    <? if ($_COOKIE['mobile'] == 'Y') { ?>.form-container {
      width: 100% !important;
    }

    <? } ?>
  </style>

  <form method="POST" action="cadastrocb.php">
    <div class="form-container" ng-class="done" style="padding-top: 0px;">
      <img src="../img/logovid.jpg" class="imagem" />
      <div class="login-form">

        <div>
          <input type="text" placeholder="Usuario" name="login">
        </div>

        <div>
          <input type="password" placeholder="Senha" name="senha">
        </div>
        <div>
          <input type="password" placeholder="Confirmar Senha" name="confsenha">
        </div>

        <button type="submit" value="Cadastrar" id="cadastrar" name="cadastrar" data-loading-btn class="">
          Cadastra
        </button>

      </div>


    </div>
  </form>
</body>

</html>