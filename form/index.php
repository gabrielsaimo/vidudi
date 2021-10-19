<?
include("cb.php");
$login_cookie = $_COOKIE['login'];
$idpessoa = $_COOKIE['id'];
if ($login_cookie != null) {
    include_once("navibar.php");
}
$banco = abrirBanco();
require_once('Mobile_Detect.php');
$detect = new Mobile_Detect; //criando uma nova instância de Mobile_Detect
if ($detect->isMobile()) {  //se o dispositivo é um dispositivo móvel
    $celula = 'Y';
    setcookie("mobile", $celula);
    $l ='370px';
    $h = '475px';
    $a ='320px';
    $m = '445px';
} else //senão
{
    $celula = 'N';
    setcookie("mobile", $celula);
    $l ='600px';
    $h= '600px';
    $a ='530px';
    $m = '560px';
}
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Videria</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<style>
    <? if ($_GET['logout'] == 'Y') { ?>.form-container {
        width: 100% !important;
    }

    <? } ?>
    .container  {

  margin-top: 250px;
  transform: translate(-50%, -50%);
  height: 400px;
  width: 600px;
  background: #f2f2f2;
  overflow: hidden;
  border-radius: 20px;
  box-shadow: 0 0 20px 8px #d0d0d0;
}
</style>

<body>
    <div  style="margin-top:-60px ;">
        <div class="posicionarCabecalho">
        </div>
        <? if (empty($idusuario_cookie)) {
            $idusuario_cookie = 0;
        }
        $q1 = $banco->query("SELECT u.*,p.id,p.idemcargo,p.idrede,p.telefone from usuario u join pessoa p on (u.idusuario = p.idusuario)where u.idusuario =" . $idusuario_cookie);
        $row = mysqli_fetch_array($q1); ?>
        <div class="row" style="margin-top: 100px; height:50px;margin-right: 0px;">
            <?

            if (mysqli_num_rows($q1) > 0) {
                if ($_GET['_acao']) {
                } else {
                    if (isset($login_cookie) and empty($_GET['_modulo']) and !empty($row['telefone'])) {
                        echo '<div >';
                        //echo "Bem-Vindo, $login_cookie <br>";
                        $qli = $banco->query("SELECT * From anexo where tipoanexo = 'cadapdf' order by idanexo desc") or die('erro ao buscar link');
                        $i = 1;
                        while ($rowli = mysqli_fetch_array($qli)) {
                            $texto = $rowli['link'];
                            $audio = $rowli['linkaudio'];
                            if($rowli['anexo'] != ''){
                                if($i == 1){
                                    $widith = '370px';
                                    $margentop = '80px';
                                }else{
                                    if($celula != 'Y'){
                                        $widith = '37px';
                                    }else{
                                        $widith = '70px';
                                    }
                                    
                                    $margentop = '-190px';
                                }
                                
                                if(!empty($texto) and $texto != ' '){
                                    echo '<div class="container" style="display: block;margin-left: 51.7%;margin-right: auto;width: 370px;height: 600px;text-align: center;margin-top: '.$widith.'">'.$rowli['titulo'];
                                    echo '<img style="width: 320px; height: 445px; border-radius: 5%;" src="data:image/gif;base64,' . base64_encode($rowli['anexo']) . '"/>'; 
                                }else{
                                    echo '<div class="container" style="display: block;margin-left: 51.7%;margin-right: auto;width: '.$l.';height:'.$h.';text-align: center;margin-top: '.$widith.'">'.$rowli['titulo'];
                                    echo '<img style="width: '.$a.'; height: '.$m.';margin-top: 5px; border-radius: 5%;" src="data:image/gif;base64,' . base64_encode($rowli['anexo']) . '"/>';
                                }
                            }else{
                                if($i == 1){
                                    $margentop = '80px';
                                }else{
                                    $margentop = '-190px';
                                }
                                echo '<div class="container" style="margin-bottom: 260px;display: block;margin-left: 51.7%;margin-right: auto;width: 368px;height: 140px;text-align: center;margin-top: '. $margentop.';"> '.$rowli['titulo'];
                            }
                                
                                $novo_texto = str_replace("file/d/", "u/0/uc?id=", $texto);
                                if(!empty($rowli['data']) and $rowli['data'] !='1970-01-01'){
                                    $data = str_replace('-','/',date('d-m-Y', strtotime($rowli['data'])));
                                }
                                $link = str_replace("/view?usp=sharing", "&export=download", $novo_texto);
                                $novo_audio = str_replace("file/d/", "u/0/uc?id=", $audio);
                                $linkaudio = str_replace("/view?usp=sharing", "&export=download", $novo_audio);
                                if($rowli['anexo'] == ''){
                                    $w = '310px';
                                }else{
                                    $w = '320px';
                                }
                            if(!empty($texto) ){?><a style="display: block;width: <?=$w?>;  margin-top:5px" href="<?= $link ?>"><li type="button"  style="width: <?=$w?>;" class="btn1"> <?=$rowli['titulo']?> <br> <?=$data?> PDF  </li></a> <?
                            }if(!empty($audio)){?> 
                           <a style="display: block;width: <?=$w?>;  margin-top:5px" href="<?=$linkaudio?>"><li type="button"  style="width: <?=$w?>;" class="btn1"> <?=$data?>  Audio</li> </a><?}
                            echo '</div>';
                            $i++;
                        }
                        echo '</div>';
                    } else if (empty($_GET['_modulo']) and !empty($row['telefone'])) {
                        include_once("login.php");
                    }else if($_GET['_modulo'] != 'pessoa' and $_GET['_modulo'] != 'celula'){
                        include_once("home.php");
                    }
                }
            } else {
                if ($_GET['k'] == 1) {
                    if (mysqli_num_rows($q1) > 0) {
                        include_once("home.php");
                    } else {
                        $_GET['_modulo'] = 'pessoa';
                        $_GET['_acao'] = 'r';
                    }
                } else {
                    include_once("login.php");
                }
            };

            if (isset($_GET['_acao']) and isset($_GET['_modulo'])) {
                include_once($_GET['_modulo'] . ".php");
            } else {
                include_once("../pesquisa.php");
            }
                            ?>
        </div>
    </div>
</body>