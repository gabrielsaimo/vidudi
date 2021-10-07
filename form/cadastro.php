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
 


        <form method="POST" action="cadastrocb.php" >
    <div class="form-container" ng-class="done">
      <div class="login-form">
        
        <div>
          <input type="text" placeholder="Login" name="login" >
        </div>
        
        <div>
          <input type="password" placeholder="Password" name="senha">
        </div>
        
        <button type="submit" value="Cadastrar" id="cadastrar" name="cadastrar"  data-loading-btn class="">
        Cadastra
        </button>

      </div>
      
     
    </div> 
</form>
</body>
</html>