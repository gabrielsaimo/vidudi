<?
include('cb.php');
$banco = abrirBanco();
$id =$_REQUEST['id'];

// arquivos
$qi = $banco->query("SELECT anexo from anexo where tipoobjeto='avatar' and  idobjeto=".$_REQUEST['id']);
    $rowi = mysqli_num_rows($qi);
    if($rowi>0){
        if (isset($_FILES['file'])) {
            $file =addslashes(file_get_contents($_FILES['file']['tmp_name']));
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
                }}
    }
?>