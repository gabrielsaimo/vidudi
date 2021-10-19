<?
$idusuario_cookie = $_COOKIE['idusuario'];

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
            
        if (!empty($nunpost)) {
            $result = "_" . $post[1] . "_" . $post[2] . "_" . $post[3] . "_" . $post[4]; // refazendo o post
            $valor =  $_REQUEST[$result]; // pegando o valor 
            $arryvalorup[] = $coluna.' = "'.$valor.'"';
        }

        if (!empty($coluna) and !empty($valor)) {
            $arrynomes[] = $coluna;
            $arryvalor[] = $valor;
        }

    }
 
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
    $modulo;
    if (isset($tabela)) {

        //define qual finçao sera realizada 
        if ($acao == "u") {
            $acaoss = "UPDATE ";
            alterarPessoa($modulo);
        } elseif ($acao == "i") {
            $acaoss = "INSERT INTO ";
            inserirPessoa($modulo, $acao);
        } elseif ($acao == "d") {
            $acaoss = "DELETE FROM ";
            excluirPessoa($modulo);
        }
    }
}
//verifica se recebe modulo
if (isset($_REQUEST['_modulo'])) {

    //define qual finçao sera realizada 
    if ($_REQUEST['_acao'] == "d") {
        $acaoss = "DELETE FROM ";
        excluirPessoa($modulo);
    }
}
//funçao que abre o banco de dados MSQLI
function abrirBanco()
{
    $conexao = new mysqli("localhost", "root", "root", "crud", "3306");
    return $conexao;
}

function inserirPessoa($modulo, $_acao)
{
    global $acaoss;
    global $obj;
    global $value;
    $sql = $acaoss . $modulo . $obj . " VALUES " . $value;
    banco($sql);
    voltarIndex();
}

function alterarPessoa($modulo)
{
    
    global $acaoss;
    global $obj;
    global $valoreup;
    global $idusuario_cookie;
    $idpost = str_replace(' ','',$_REQUEST["id"]);

        $sql = $acaoss . $modulo .' set '. $valoreup." WHERE id='$idpost'";
        
    banco($sql);
    
    voltarIndex();
}

function excluirPessoa($modulo)
{
    global $acaoss;
    if ($_REQUEST['_acao'] == 'd' && $_REQUEST['_modulo'] == "celula") {
        echo $acaoss . $modulo . " WHERE idcelula='{$_REQUEST["id"]}'";
        $sql = $acaoss . $modulo . " WHERE idcelula='{$_REQUEST["id"]}'";
    } else {
        $sql = $acaoss . $modulo . " WHERE id='{$_REQUEST["id"]}'";
    }
    banco($sql);
    voltarIndex();
}



function selectIdPessoa($id)
{
    $banco = abrirBanco();
    $sql = "SELECT * FROM pessoa WHERE id=" . $id;
    $resultado = $banco->query($sql) or die('erro no sql :' . mysqli_error($banco));
    $banco->close();
    $pessoa = mysqli_fetch_assoc($resultado);
    return $pessoa;
}

function voltarIndex()
{
    if ($_REQUEST['_modulo'] == "pessoa") {
        header("Location:index.php");
    } else {
        header("Location:index.php?_modulo=celula&_colunas[]=idcelula&_colunas[]=celula&_colunas[]=endereco&_colunas[]=hora&_colunas[]=multiplicou");
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
