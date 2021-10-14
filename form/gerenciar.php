
<?$banco = abrirBanco();
$qpf = $banco->query("SELECT * From anexo  ") or die('erro ao consultar'.mysqli_error($banco));?>
<form action="upanexo.php" method="post" enctype="multipart/form-data" >
        <label class="btn1" for="file">Enviar capa do pdf</label>
        <input hidden type="file" name="file" id="file">
        <input type="hidden" nome="id" value="<?= $idpessoa ?>" name="id">
        <input type="hidden" nome="tipo" value="cadapdf" name="tipo">
    
<br>
<table>
    <tr>
        <td class="texto" style="width: 50px;" >Link do PDF:</td>
        <td><input type="text" name="link" value="" class="input1" placeholder="link do google drive"></td>
    </tr>
    <tr>
        <td class="texto" style="width: 50px;" >Link do audio:</td>
        <td><input type="text" name="linkaudio" value="" class="input1" placeholder="link do google drive"></td>
    </tr>
    <tr>
        <td>
        <td class="texto" style="width: 50px;" >Data:</td>
        <td><input type="date" name="data" value="" class="input1" ></td>
        </td>
    </tr>
    <tr>
                    <td colspan="2"><input id="submit" type="submit" class="btn1" style="display: block;
    margin-left:auto;
    margin-right:auto;"></td>
                </tr>
                </form>
</table>
    <script>
    document.getElementById("file").onchange = function() {
        if ($("form").children('input').val() != '') {
            $("form").children('input#submit').css("display", "block");
            $("form").children('label').css("display", "none");
        }
    };
</script>

<a href="<? echo $rowf['anexo']?>"><? echo 'asda'?></a>

