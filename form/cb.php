<?

session_start();
foreach ($_POST as $nome_campo => $valor_campo) {
    if($nome_campo == ''){
        unset($nome_campo);
        unset($valor_campo);
    }

   if($nome_campo == "sexo" ){
    
   }
}
if($_REQUEST["batizado"] == 'on'){
    $_REQUEST["batizado"] = 'Y';
}else{
    $_REQUEST["batizado"] = 'N';
} 
if($_REQUEST["cursao"] == 'on'){
    $_REQUEST["cursao"] = 'Y';
}else{
    $_REQUEST["cursao"] = 'N';
}
 if($_REQUEST["ctl"] == 'on'){
    $_REQUEST["ctl"] = 'Y';
}else{
    $_REQUEST["ctl"] = 'N';
}
if($_REQUEST["semi"] == 'on'){
    $_REQUEST["semi"] = 'Y';
}else{
    $_REQUEST["semi"] = 'N';
}

$idusuario_cookie = $_COOKIE['idusuario'];

    //verifica e define em qual foi recebido
    if($_REQUEST['_modulo'] == 'pessoa'){
        $obj = "(nome,bairro,endereco,sexo,criadoem,alteradoem,email,idemcargo,idrede,idusuario)";
        $value = "('{$_REQUEST["nome"]}','{$_REQUEST['bairro']}','{$_REQUEST['endereco']}','{$_REQUEST["sexo"]}',sysdate(),sysdate(),'{$_REQUEST["email"]}','{$_REQUEST["emcargo"]}','{$_REQUEST["rede"]}','{$_COOKIE['idusuario']}')";
        $modulo = 'pessoa';
    }else{
        $obj = "(celula,endereco,horario,inidata,dia,idlider,status)";
        $value ="('{$_REQUEST["celula"]}','{$_REQUEST['endereco']}','{$_REQUEST['horario']}','{$_REQUEST['inidata']}','{$_REQUEST['dia']}','{$_REQUEST['idlider']}','{$_REQUEST['status']}')";
        $modulo = 'celula';
    }
        //verifica se recebe modulo
    if(isset($_REQUEST['_modulo'])){

        //define qual finçao sera realizada 
        if( $_REQUEST['_acao']=="u"){
            $acaoss="UPDATE ";
            alterarPessoa($modulo);
        }
        elseif( $_REQUEST['_acao']=="i"){
            $acaoss="INSERT INTO ";
            inserirPessoa($modulo, $_REQUEST['_acao']);
        }
        elseif( $_REQUEST['_acao']=="d"){
            $acaoss="DELETE FROM ";
            excluirPessoa($modulo);
        }

    }
    //funçao que abre o banco de dados MSQLI
    function abrirBanco() {
        $conexao = new mysqli("localhost", "root", "root", "crud","3306");
        return $conexao;
    }

    function inserirPessoa($modulo, $_acao) {
        global $acaoss;
        global $obj;
        global $value;
        $sql = $acaoss. $modulo. $obj. " VALUES " .$value;
        banco($sql);
        voltarIndex(); 
    }
    
    function alterarPessoa($modulo) {
        global $acaoss;
        global $idusuario_cookie;
        
        if($_REQUEST['_modulo']=="celula"){
            $sql = $acaoss." $modulo SET status='ATIVO' WHERE idcelula='{$_REQUEST["id"]}'";
            
        }else{
            if( empty($_REQUEST["nome"]) and empty($_REQUEST["status"])){
                $sql = $acaoss." $modulo SET telefone='{$_REQUEST["telefone"]}',idade='{$_REQUEST["idade"]}',idlider='{$_REQUEST["idlider"]}',batizado='{$_REQUEST["batizado"]}',cursao='{$_REQUEST["cursao"]}',ctl='{$_REQUEST["ctl"]}',semi='{$_REQUEST["semi"]}',bairro='{$_REQUEST['bairro']}',endereco='{$_REQUEST['endereco']}' WHERE id='{$_REQUEST["id"]}'";
            }else if(!empty($_REQUEST["nome"])){
                $sql = $acaoss." $modulo SET nome='{$_REQUEST["nome"]}',sexo='{$_REQUEST["sexo"]}',alteradoem=now(),email='{$_REQUEST["email"]}',idemcargo='{$_REQUEST["emcargo"]}',idrede='{$_REQUEST["rede"]}',idusuario='$idusuario_cookie' WHERE id='{$_REQUEST["id"]}'";
            }else{
                $sql = $acaoss." $modulo SET status='ATIVO' WHERE id='{$_REQUEST["id"]}'";
            }
    }
        banco($sql);
        voltarIndex();
    }

    function excluirPessoa($modulo) {
        global $acaoss;
        if($_REQUEST['_acao']=='d' && $_REQUEST['_modulo']=="celula"){
            $sql = $acaoss. $modulo." WHERE idcelula='{$_REQUEST["id"]}'";
        }else{
            $sql = $acaoss. $modulo." WHERE id='{$_REQUEST["id"]}'";
        }
        banco($sql);
        voltarIndex();
    }

    function selectAllPessoa() {
        $banco = abrirBanco();
        $sql = "SELECT p.id,p.nome,DATE_FORMAT(p.criadoem,'%d/%m/%Y %H:%i:%s') as criadoem,DATE_FORMAT(p.alteradoem,'%d/%m/%Y %H:%i:%s') as alteradoem,p.sexo,e.celula FROM pessoa p JOIN celula e on (p.idempresa = e.idcelula) ORDER BY p.nome";
        $resultado = $banco->query($sql) or die ('erro no sql :'.mysqli_error($banco));
        $banco->close();
        while($row = mysqli_fetch_array($resultado)) {
            $grupo[] = $row;
        }
        return $grupo;
    }

    function selectIdPessoa($id) {
        $banco = abrirBanco();
        $sql = "SELECT * FROM pessoa WHERE id=".$id;
        $resultado = $banco->query($sql) or die ('erro no sql :'.mysqli_error($banco));
        $banco->close();
        $pessoa = mysqli_fetch_assoc($resultado);
        return $pessoa;
    }

    function voltarIndex(){
        if($_REQUEST['_modulo']=="pessoa"){
            header("Location:index.php");
        }else{
            header("Location:index.php?_modulo=celula&_colunas[]=idcelula&_colunas[]=celula&_colunas[]=endereco&_colunas[]=hora&_colunas[]=multiplicou");
        }

    }
    //funçao para abrir e fechar o banco de dados
    function banco($sql){
        $banco = abrirBanco();
        $banco->query($sql) or die ('erro no sql :'.mysqli_error($banco));
        $banco->close();
        voltarIndex();
    }

?>