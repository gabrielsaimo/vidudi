<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form  style="margin-top: 437px;margin-bottom: -450px; cursor: pointer;">
<?$idusuario_cookie = $_COOKIE['idusuario'];
$qp = $banco->query("SELECT p.* from pessoa p join usuario u on (p.idusuario = u.idusuario) where u.idusuario =".$idusuario_cookie);
$rows = mysqli_fetch_array($qp);
    if(empty($rows['idlider'])){
        $q = $banco->query("SELECT p.id,p.nome FROM pessoa p join emcargo e on(p.idemcargo = e.idemcargo) where p.idemcargo in(2,3,4) and p.status='ATIVO'") or die("erro ao selecionar");?>
    <table class="centro menos-top" >
        <tbody>
            <?if (isset($rows["id"]) != null ){?>
                <?$pessoa = selectIdPessoa($rows["id"]);?>
            <?}?>
           
            <tr>
                <td class="texto">Telefone: </td>
                <?if(isset($rows["id"]) != null ){?>
                    <td><input class="input1" id="telefone" type="phone" name="telefone" value="<?=$pessoa["telefone"]?>" size="20" placeholder="..."></td>
                <?}else{?>
                    <td><input type="phone" id="telefone" name="telefone" value="<?=$pessoa["telefone"]?>" class="input1" placeholder="..."></td>
                <?}?>
            </tr>
            <tr>
           
           <input type="hidden" name="_modulo" value="pessoa" ><input type="hidden" name="_acao" value="u" >
                <td class="texto">Lider:  </td>
                
              <? echo "<td> <select class='input1' name='idlider'>";
                while ($row = mysqli_fetch_array($q)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                }
                echo "</select></td>";?>
           </tr>
           <tr>
           <input type="hidden" name="_modulo" value="pessoa" >
                <td class="texto">data de nascimento: </td>
                <input type="hidden" name="_acao" value="u" >
                    <input type="hidden" name="idade" value="" >
                    <td><input type="date" name="idade" value="" class="input1" ></td>
           </tr>
           <tr>
               <td>
               <input type="checkbox" name="batizado" id="batizado">
                <label for="batizado">Bati</label>
                
               </td>
               <tr>
               <td>
               <input type="checkbox" name="cursao" id="cursao">
                <label for="cursao">Cursao</label>
               </td>
               </tr>
              <tr>
              <td>
               <input type="checkbox" name="ctl" id="ctl">
                <label for="ctl">CTL</label>
               </td>
              </tr>
              
           </tr>
          
                <?if(isset($rows["id"]) != null ){?>
                    <td><input type="hidden" name="_acao" value="u" >
                    <td><input type="hidden" name="_modulo" value="pessoa" >
                <?}else{?>
                    <td><input type="hidden" name="_acao" value="u" >
                    <td><input type="hidden" name="_modulo" value="pessoa" >
                <?}?>
            <input type="hidden" name="id" value="<?=$pessoa["id"]?> ">
            <input type="hidden" nome="idusuario" value="<?=$idusuario_cookie?>"></td>
            <td><br><br><br><br><br><input class="enviar btn1 left" type="submit" name="Enviar" value="Enviar" ></td>
        </tbody>
    </table> 
    <?}else{?>

    <?}?>

    <button class="btn1" style="background-color: red;" onclick="logout()">Logout</button>
    <script>function logout(){
     var c = document.cookie.split("; ");
 for (i in c) 
  document.cookie =/^[^=]+/.exec(c[i])[0]+"=;expires=Thu, 01 Jan 1970 00:00:00 GMT";    

    }
    </script>
</form>
</body>
</html>