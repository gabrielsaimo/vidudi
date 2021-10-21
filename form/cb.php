<?
$idusuario_cookie = $_COOKIE['idusuario'];
if(empty($idusuario_cookie)){

}
//verifica e define em qual foi recebido
if(!empty($_REQUEST)) {
    
    $arrynomes = [];
    $arryvalor = [];
    $arryvalorup=[];
    foreach ($_REQUEST as $nome_campo => $valor_campo) { // pegando os posts 

        $post =  explode('_', $nome_campo);
        $nunpost = $post[1];
        if (!empty($post[2])) {
            $acao = $post[2];
        }
        if (!empty($post[3])) {
            $tabela = $post[3];
        }
            $coluna = $post[4];
            
        if (!empty($acao) and !empty($tabela) and !empty($coluna) and !empty($nunpost)) {
           $result = "_" . $post[1] . "_" . $post[2] . "_" . $post[3] . "_" . $post[4]; // refazendo o post
            $valor =  $_REQUEST[$result]; // pegando o valor 
            $arryvalorup[] = $coluna.' = "'.$valor.'"';
        }

        if (!empty($coluna) and !empty($valor)) {
            $arrynomes[] = $coluna;
            $arryvalor[] = $valor;
        }

    }
    if(!empty($result)){
    // tratando pod valores para o insert
    $nomes = implode(",", $arrynomes);
    $valores = implode(',', $arryvalor);
    $valoreup = implode(',', $arryvalorup);
    $value1 = '(' . $valores . ')';
    $obj = '(' . $nomes . ')';
    $valu2 = str_replace('(', "('", $value1); //colcanado '' em tudo 
    $value3 = str_replace(',', "','", $valu2); //colcanado '' em tudo 
    $value = str_replace(')', "')", $value3); //colcanado '' em tudo 
    $modulo = $tabela;
        if (isset($tabela)) {
            if ($acao) {
                sql($modulo,$acao,$obj,$valoreup,$value,$valor);
            }
        }
    }
}

function sql($modulo,$acao,$obj,$valoreup,$value,$valor)
{
    if($acao == 'u'){
        $idpost = str_replace(' ','',$_REQUEST["id"]);
        $sql = "UPDATE ". $modulo .' set '. $valoreup." WHERE id='$idpost'";
    }
    if($acao == 'i'){
        $sql = "INSERT INTO ". $modulo . $obj . " VALUES " . $value;
    }  
    if($acao == 'd'){
        $idpost = str_replace(' ','',$valor);
        $sql = "DELETE FROM ". $modulo ." WHERE id='$idpost'";
    } 
    banco($sql);
    
    voltarIndex();
}
//funçao que abre o banco de dados MSQLI
function abrirBanco()
{
    $conexao = new mysqli("localhost", "root", "root", "vid_udi", "3306");
    return $conexao;
}

function voltarIndex()
{
    if ($_REQUEST['_modulo'] == "pessoa") {
        header("Location:index.php");
    } else {
        header("Location:index.php");
    }
}
//funçao para abrir e fechar o banco de dados
function banco($sql)
{
    $banco = abrirBanco();
    $banco->query($sql) or die('erro no sql :' . mysqli_error($banco));
    $banco->close();
    voltarIndex();
}
