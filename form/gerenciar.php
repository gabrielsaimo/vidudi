<style>
    input[type="file"] {
        display: none;
    }

    label,
    input[type=submit] {
        padding: 20px 10px;
        width: 200px;
        background-color: #333;
        color: #FFF;
        text-transform: uppercase;
        text-align: center;
        display: block;
        margin-top: 10px;
        cursor: pointer;
    }
</style>
<?$banco = abrirBanco();
$qpf = $banco->query("SELECT * From anexo where tipoanexo = 'pdf' ") or die('erro ao consultar'.mysqli_error($banco));?>
<form action="upanexo.php" method="post" enctype="multipart/form-data">
        <label for="file">Enviar capa do pfd</label>
        <input hidden type="file" name="file" id="file">
        <input type="hidden" nome="id" value="<?= $idpessoa ?>" name="id">
        <input type="hidden" nome="tipo" value="cadapfd" name="tipo">
        <input style="display: none;" id="submit" type="submit" value="submit" name="submit">
    </form>
    <form action="upanexo.php" method="post" enctype="multipart/form-data">
        <label for="file">Enviar pdf</label>
        <input hidden type="file" name="file" id="file">
        <input type="hidden" nome="id" value="<?= $idpessoa ?>" name="id">
        <input type="hidden" nome="tipo" value="pdf" name="tipo">
        <input  id="submit" type="submit" value="submit" name="submit">
    </form>
    <form action="upanexo.php" method="post" enctype="multipart/form-data">
        <label for="file">Enviar audio</label>
        <input hidden type="file" name="file" id="file">
        <input type="hidden" nome="id" value="<?= $idpessoa ?>" name="id">
        <input type="hidden" nome="tipo" value="audio" name="tipo">
        <input style="display: none;" id="submit" type="submit" value="submit" name="submit">
    </form>
    <script>
    document.getElementById("file").onchange = function() {
        if ($("form").children('input').val() != '') {
            $("form").children('input#submit').css("display", "block");
            $("form").children('label').css("display", "none");
        }
    };
</script>
<?
while ($rowf = mysqli_fetch_array($qpf)) { 
echo '<iframe  style="width: 400px!important; height: 500px;!important" src="data:application/pdf;base64,' . base64_encode($rowf['anexo']) . '"/>';
header("Content-type: application/pdf");
header("Content-Disposition: attachment; filename=".$rowf['anexo']);
}
?>

