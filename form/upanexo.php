<?
include('cb.php');
$banco = abrirBanco();
$id =$_REQUEST['id'];
$tipo =$_REQUEST['tipo'];
$link = $_REQUEST['link'];
$data = $_REQUEST['data'];
$linkaudio = $_REQUEST['linkaudio'];
$titulo = $_REQUEST['titulo'];
// arquivos
$qi = $banco->query("SELECT anexo from anexo");
if($tipo == 'avatar'){

    $rowi = mysqli_num_rows($qi);
    if($rowi>0){
        if (isset($_FILES['file'])) {
            $file =addslashes(file_get_contents($_FILES['file']['tmp_name']));
            $file =addslashes(file_get_contents($_FILES['file']['type']));
            if (isset($file)) {
                $insert = $banco->query ("UPDATE anexo SET anexo = '$file',atualizadoem=sysdate() where idobjeto=".$id) or die(mysqli_error($banco));
                echo"<script language='javascript' type='text/javascript'>
                    alert('Imagem de perfil atualizada!');window.location.
                    href='javascript:history.back()'</script>";
            }}
    }else{
            if (isset($_FILES['file'])) {
                $file =addslashes(file_get_contents($_FILES['file']['tmp_name']));
                if (isset($file)) {
                    $insert = $banco->query ("INSERT INTO anexo SET anexo = '$file',tipoanexo='avatar',idobjeto='$id',criadoem=sysdate()") or die(mysqli_error($banco));
                    echo"<script language='javascript' type='text/javascript'>
                    alert('Imagem de perfil  cadastrado com sucesso!');window.location.
                    href='javascript:history.back()'</script>";
                }
            }
    }
}else if($tipo == 'cadapdf'){
    if (isset($_FILES['file'])) {
        $file =addslashes(file_get_contents($_FILES['file']['tmp_name']));
        if (isset($file)) {
            $insert = $banco->query ("INSERT INTO anexo SET anexo = '$file',link= '$link ',data='$data',tipoanexo='cadapdf',idobjeto='$id',linkaudio='$linkaudio',titulo='$titulo',criadoem=sysdate()") or die(mysqli_error($banco));
            echo"<script language='javascript' type='text/javascript'>
            alert('".$tipo." cadastrado com sucesso!');window.location.
            href='javascript:history.back()'</script>";
        }
    }
}else if($tipo == 'audio'){
    if (isset($_FILES['file'])) {
        $file =addslashes(file_get_contents($_FILES['file']['tmp_name']));
        if (isset($file)) {
            $insert = $banco->query ("INSERT INTO anexo SET anexo = '$file',tipoanexo='audio',idobjeto='$id',criadoem=sysdate()") or die(mysqli_error($banco));
            echo"<script language='javascript' type='text/javascript'>
            alert('".$tipo." cadastrado com sucesso!');window.location.
            href='javascript:history.back()'</script>";
        }
    }
}else if ($tipo == 'link'){
    $insert = $banco->query ("INSERT INTO anexo SET link = '$link ',tipoanexo='link',idobjeto='$id',criadoem=sysdate()") or die(mysqli_error($banco));
    if($insert){
      echo"<script language='javascript' type='text/javascript'>
      alert('Usuário cadastrado com sucesso!');window.location.
      href='index.php'</script>";
    }
}
?>