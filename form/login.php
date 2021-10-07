<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>Document</title>
</head>
<body>

    
    
<form method="POST" action="logincb.php" >
    <div class="form-container" ng-class="done">
      <div class="login-form">
        
        <div>
          <input type="text" placeholder="Email" name="login" >
        </div>
        
        <div>
          <input type="password" placeholder="Password" name="senha">
        </div>
        
        <button type="submit" value="entrar" id="entrar" name="entrar"  data-loading-btn class="">
          <span data-loaded-msg="Thank you!">Log in</span>
        </button>
        <button   data-loading-btn class="">

        <a data-loading-btn href="cadastro.php" value=''>Cadastre-se </a>
        </button>
      </div>
      
     
    </div> 
</form>
</div>
</div>
</body>
</html>
