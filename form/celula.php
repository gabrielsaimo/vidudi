<link rel="stylesheet" type="text/css" href="css/style.css">
<meta charset="UTF-8">


<div class="container menos-top">
    <form action="cb.php" method="pots">
        <? $banco = abrirBanco();
        $sqlbairro = $banco->query("SELECT * FROM bairro");
        $q = $banco->query("SELECT p.id,p.nome FROM pessoa p join emcargo e on(p.idemcargo = e.idemcargo) where p.idemcargo in(2,3,4,5) and p.status='ATIVO'") or die("erro ao selecionar");
        ?>
        <table>
            <tbody>
                <tr>
                    <td>
                    <td></td>
                    <td class="texto">Célula: </td>
                    <? if ($_REQUEST['_acao'] == 'u') { ?>
                        <td>
                        <td><input type="text" name="celula" value="<?= $_REQUEST['celula'] ?>" class="input1" placeholder="Digite a Célula aqui..."></td>
                        <input type="hidden" name="idcelula" value="<?= $_REQUEST['id'] ?>">
                    <? } else { ?>
                        <td>
                        <td><input type="text" name="_1_i_celula_celula" value="" class="input1" placeholder="Digite a Célula aqui..."></td>
                    <? } ?>
                </tr>
                <tr>
                <td>
                    <td></td>
                    
                    <td class="texto">Bairro: </td>
                    <td></td>
                    <? echo "<td> <select class='input1' name='_1_i_celula_bairro'>";
                    while ($rowb = mysqli_fetch_array($sqlbairro)) {
                        echo "<option value='" . $rowb['idbairro'] . "'>" . $rowb['bairro'] . "</option>";
                    }
                    echo "</select></td>"; ?>
                </tr>
                <tr>
                    <td>
                    <td></td>
                    <td class="texto">Endereço: </td>
                    <? if ($_REQUEST['_acao'] == 'u') { ?>
                        <td>
                        <td><input type="text" name="endereco" value="<?= $_REQUEST['celula'] ?>" class="input1" placeholder="ex: rua 1 bairo 2"></td>
                        <input type="hidden" name="endereco" value="<?= $_REQUEST['endereco'] ?>">
                    <? } else { ?>
                        <td>
                        <td><input type="text" name="_1_i_celula_endereco" value="" class="input1" placeholder="ex: rua 1 bairo 2"></td>
                    <? } ?>
                </tr>
                <tr>
                    <td>
                    <td></td>
                    <td class="texto">horario: </td>
                    <? if ($_REQUEST['_acao'] == 'u') { ?>
                        <td>
                        <td><input type="text" name="endereco" value="<?= $_REQUEST['celula'] ?>" class="input1" placeholder="ex: 18h"></td>
                        <input type="hidden" name="endereco" value="<?= $_REQUEST['horario'] ?>">
                    <? } else { ?>
                        <td>
                        <td><input type="text" name="_1_i_celula_horario" value="" class="input1" placeholder="ex: 18h"></td>
                    <? } ?>
                </tr>
                <tr>
                    <td>
                    <td></td>
                    <td class="texto">dia: </td>
                    <? if ($_REQUEST['_acao'] == 'u') { ?>
                        <td>
                        <td><input type="data" name="_1_u_celula_dia" value="<?= $_REQUEST['celula'] ?>" class="input1" placeholder="ex: 18h"></td>
                        <input type="hidden" name="endereco" value="<?= $_REQUEST['dia'] ?>">
                    <? } else { ?>
                        <td>
                        <td><input type="text" name="_1_i_celula_dia" value="" class="input1" placeholder="ex: Sabado"></td>
                    <? } ?>
                </tr>
                <td>
                <td></td>
                <td class="texto">muliplicou: </td>
                <? if ($_REQUEST['_acao'] == 'u') { ?>
                    <td>
                    <td><input type="data" name="endereco" value="<?= $_REQUEST['celula'] ?>" class="input1" placeholder="ex: 18h"></td>
                    <input type="hidden" name="endereco" value="<?= $_REQUEST['inidata'] ?>">
                <? } else { ?>
                    <td>
                    <td><input type="date" name="_1_i_celula_inidata" value="" class="input1"></td>
                <? } ?>
                <tr>
                    <td>
                    <td></td>
                    <td class="texto">Lider: </td>
                    <td>
                        <? echo "<td> <select class='input1' name='_1_i_celula_idlider'>";
                        while ($row = mysqli_fetch_array($q)) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                        }
                        echo "</select></td>"; ?>
                </tr>
                <tr>
                    <td colspan="10" ><input type="submit" class="btn1" style="display: block;
    margin-left:auto;
    margin-right:auto;"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

</div>