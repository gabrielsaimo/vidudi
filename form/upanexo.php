<?
include('cb.php');
$banco = abrirBanco();
$id =$_REQUEST['id'];
$tipo =$_REQUEST['tipo'];
// arquivos
$qi = $banco->query("SELECT anexo from anexo where tipoanexo = '".$tipo."' and idobjeto=".$_REQUEST['id']);
if($tipo == 'avatar'){
    $rowi = mysqli_num_rows($qi);
    if($rowi>0){
        if (isset($_FILES['file'])) {
            $file =addslashes(file_get_contents($_FILES['file']['tmp_name']));
            if (isset($file)) {
                $insert = $banco->query ("UPDATE anexo SET anexo = '$file',atualizadoem=sysdate() where idobjeto=".$id) or die(mysqli_error($banco));
                ?><script language='javascript' type='text/javascript'>
                    alert('Imagem de perfil atualizada!');window.location.
                    href='javascript:history.back()'</script>";<?
            }}
    }else{
            if (isset($_FILES['file'])) {
                $file =addslashes(file_get_contents($_FILES['file']['tmp_name']));
                if (isset($file)) {
                    $insert = $banco->query ("INSERT INTO anexo SET anexo = '$file',tipoanexo='avatar',idobjeto='$id',criadoem=sysdate()") or die(mysqli_error($banco));
                    ?><script language='javascript' type='text/javascript'>
                    alert('Imagem de perfil  cadastrado com sucesso!');window.location.
                    href='javascript:history.back()'</script>;<?
                }
            }
    }
}else if($tipo == 'pdf'){
    if (isset($_FILES['file'])) {
        $file =addslashes(file_get_contents($_FILES['file']['tmp_name']));
        if (isset($file)) {
            $insert = $banco->query ("INSERT INTO anexo SET anexo = '$file',tipoanexo='pdf',idobjeto='$id',criadoem=sysdate()") or die(mysqli_error($banco));
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
}
