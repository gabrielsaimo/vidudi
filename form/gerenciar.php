
<?$banco = abrirBanco();
$qpf = $banco->query("SELECT * From anexo  ") or die('erro ao consultar'.mysqli_error($banco));?>
<form action="upanexo.php" method="post" enctype="multipart/form-data" >
        <label class="btn1" for="file">selecionar capa do pdf</label>
        <input hidden type="file" name="file" id="file" accept="image/png, image/gif, image/jpeg">
        <input type="hidden" nome="id" value="<?= $idpessoa ?>" name="id">
        <input type="hidden" nome="tipo" value="cadapdf" name="tipo">
    
<br>
<table>
<tr>
        <td class="texto" style="width: 105px;" >Titulo:</td>
        <td><input type="text" name="titulo" value="" class="input1" placeholder="Titulo da palavra"></td>
    </tr>
    <tr>
        <td class="texto" style="width: 105px;" >Link do PDF:</td>
        <td><input type="text" name="link" value="" class="input1" placeholder="link do google drive"></td>
    </tr>
    <tr>
        <td class="texto"  >Link do audio:</td>
        <td><input type="text" name="linkaudio" value="" class="input1" placeholder="link do google drive"></td>
    </tr>
    <tr>
        
        <td class="texto"  >Data:</td>
        <td><input type="date" name="data" value="" class="input1" ></td>
        
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

