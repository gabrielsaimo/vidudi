<?
    include("cb.php");
    $grupo = selectAllPessoa();
    $login_cookie = $_COOKIE['login'];
    $banco = abrirBanco();
?>
<!DOCTYPE html>

<html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <title>Videria</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
        <body>
        <a href="index.php"> <img src="../img/logovid.jpg"  style="width: 100px; border-radius: 50%;"/></a> 
            <div class="container" style="margin-top:-60px ;">
                <div class="posicionarCabecalho">
                </div>
                <div class="centro">
                 
                    <?$q1 = $banco->query("SELECT u.*,p.id,p.idemcargo,p.idrede from usuario u join pessoa p on (u.idusuario = p.idusuario)where u.idusuario =".$idusuario_cookie);
                    $row = mysqli_fetch_array($q1);
                    if(isset($login_cookie)){
                        if(!empty($row['idemcargo']) and $row['idemcargo'] >= 3){?>
                            <a class="btn1 fundo-azulc espaco" href="?_modulo=pessoa&_colunas[]=nome&_colunas[]=sexo&_colunas[]=emcargo&_colunas[]=rede&_colunas[]=criadoem&_colunas[]=alteradoem&_pk=idpessoa">Pesquisar Pessoa</a><br>
                            <a class="btn1 fundo-azulc espaco" href="?_modulo=celula&_colunas[]=id&_colunas[]=celula&_colunas[]=endereco&_colunas[]=dia&_colunas[]=hora&_colunas[]=lider&_colunas[]=multiplicou">celulas</a><br>
                        <?}?>
                    
                        <a class="btn1 fundo-azulc espaco" href="?_modulo=celula&_acao=r">Inserir celula</a><br>
                            
                    <?}else{?>
                            
                    <?}?>
                   
                </div>
                        <br>
                <div class="row">
                <?
                    
                    if(mysqli_num_rows($q1)>0){
                        if($_GET['_acao']){   
                        }else{
                         if(isset($login_cookie) and empty($_GET['_modulo'])){
                         echo"Bem-Vindo, $login_cookie <br>";
                            include_once("home.php");
                         }else if(empty($_GET['_modulo'])){
                             include_once("login.php");
                         }
                    }
                    }else{
                        if($_GET['k']==1){
                            if(mysqli_num_rows($q1)>0){
                                include_once("home.php");
                            }else{
                                $_GET['_modulo'] = 'pessoa';
                                $_GET['_acao'] = 'r';
                            }
                            
                        }else{
                        include_once("login.php");
                        }
                    };
                    
                        if(isset($_GET['_acao']) and isset($_GET['_modulo'])){ 
                            include_once ($_GET['_modulo'].".php");
                        }else{
                            include_once ("../pesquisa.php");
                        }
                        if($_GET['k']==1){
                          //  include_once("home.php");
                         }?>
                </div>
            </div>
        </body>
</html>
