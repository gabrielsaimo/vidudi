<?
include("cb.php");
$login_cookie = $_COOKIE['login'];
if ($login_cookie != null) {
    include_once("navibar.php");
}
$banco = abrirBanco();
require_once('Mobile_Detect.php');
$detect = new Mobile_Detect; //criando uma nova instância de Mobile_Detect
if ($detect->isMobile()) {  //se o dispositivo é um dispositivo móvel
    $celula = 'Y';
    setcookie("mobile", $celula);
} else //senão
{
    $celula = 'N';
    setcookie("mobile", $celula);
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

<body>
    <div class="container" style="margin-top:-60px ;">
        <div class="posicionarCabecalho">
        </div>
        <? if (empty($idusuario_cookie)) {
            $idusuario_cookie = 0;
        }
        $q1 = $banco->query("SELECT u.*,p.id,p.idemcargo,p.idrede from usuario u join pessoa p on (u.idusuario = p.idusuario)where u.idusuario =" . $idusuario_cookie);
        $row = mysqli_fetch_array($q1); ?>
        <div class="row" style="margin-top: 100px; height:50px ;">
            <?

            if (mysqli_num_rows($q1) > 0) {
                if ($_GET['_acao']) {
                } else {
                    if (isset($login_cookie) and empty($_GET['_modulo'])) {
                        echo "Bem-Vindo, $login_cookie <br>";
                        include_once("home.php");
                    } else if (empty($_GET['_modulo'])) {
                        include_once("login.php");
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