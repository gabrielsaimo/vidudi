<?$banco = abrirBanco();
$qpf = $banco->query("SELECT * From anexo where tipoanexo = 'pdf' ") or die('erro');?>

    <form action="upanexo.php" method="post" enctype="multipart/form-data">
        <label for="file">Enviar pdf</label>
        <input hidden type="file" name="file" id="file">
        <input type="hidden" nome="id" value="<?= $idpessoa ?>" name="id">
        <input type="hidden" nome="tipo" value="pdf" name="tipo">
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

