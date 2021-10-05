<link rel="stylesheet" type="text/css" href="css/style.css">
<meta charset="UTF-8">
<div class="caixa"></div>
<div class="container ">
    <br>
    <form action="cb.php" method="post">
        <? $idusuario_cookie = $_COOKIE['idusuario'];
        $q = $banco->query("SELECT * FROM emcargo") or die("erro ao selecionar emcargo");
        $qr = $banco->query("SELECT * FROM rede") or die("erro ao selecionar rede");
        ?>
        <table class="centro menos-top">
            <tbody>
                <? if (isset($_GET["id"]) != null) { ?>
                    <? $pessoa = selectIdPessoa($_GET["id"]); ?>
                <? } ?>
                <tr>
                    <td class="texto">Nome: </td>
                    <? if (isset($_GET["id"]) != null) { ?>
                        <td><input class="input1" id="nome" type="text" name="nome" value="<?= $pessoa["nome"] ?>" size="20" placeholder="digite seu nome aqui ..."></td>
                    <? } else { ?>
                        <td><input type="text" id="nome" name="nome" value="<?= $pessoa["nome"] ?>" class="input1" placeholder="digite seu nome aqui ..."></td>
                    <? } ?>
                </tr>
                <tr>
                    <td class="texto">Email: </td>
                    <? if (isset($_GET["id"]) != null) { ?>
                        <td><input class="input1" id="nome" type="email" name="email" value="<?= $pessoa["email"] ?>" size="20" placeholder="..."></td>
                    <? } else { ?>
                        <td><input type="email" id="nome" name="email" value="<?= $pessoa["email"] ?>" class="input1" placeholder="..."></td>
                    <? } ?>
                </tr>
                <tr>

                    <? if (isset($_GET["id"]) != null) { ?>
                        <!--  _1_i_pessoa_emcargo  ---->
                        <input type="hidden" name="_modulo" value="pessoa"><input type="hidden" name="_acao" value="i">
                        <td class="texto">Emcargo: </td>
                        <? echo "<td> <select class='input1' name='emcargo'>";
                        while ($rows = mysqli_fetch_array($q)) {
                            echo "<option value='" . $rows['idemcargo'] . "'>" . $rows['cargo'] . "</option>";
                        }
                        echo "</select></td>"; ?>
                    <? } else { ?>
                        <input type="hidden" name="_modulo" value="pessoa"><input type="hidden" name="_acao" value="i">
                        <td class="texto">Emcargo: </td>

                        <? echo "<td> <select class='input1' name='emcargo'>";
                        while ($rows = mysqli_fetch_array($q)) {
                            echo "<option value='" . $rows['idemcargo'] . "'>" . $rows['cargo'] . "</option>";
                        }
                        echo "</select></td>"; ?>
                    <? } ?>
                </tr>
                <tr>
                    <td class="texto1">Sexo: </td>
                    <? if (isset($_GET["id"]) != null) { ?>
                        <!--  _1_i_pessoa_sexo  ---->
                        <td><select class="selects" name="sexo" value="">
                                <option value="Homem">Homem</option>
                                <option value="mulher">mulher</option>
                            </select>
                        </td>
                    <? } else { ?>
                        <td><select class="selects" name="sexo" value="">
                                <option value="Homem">Homem</option>
                                <option value="mulher">mulher</option>
                            </select>
                        </td>
                    <? } ?>
                </tr>
                <tr>
                    <? if (isset($_GET["id"]) != null) { ?>
                        <input type="hidden" name="_modulo" value="pessoa" ><input type="hidden" name="_acao" value="u" >
                <td class="texto">rede: </td>
                
              <? echo "<td> <select class='input1' name='rede'>";
                while ($row = mysqli_fetch_array($qr)) {
                    echo "<option value='" . $row['idrede'] . "'>" . $row['rede'] . "</option>";
                }
                echo "</select></td>";?>
                    <? } else { ?>
                        <input type="hidden" name="_modulo" value="pessoa" ><input type="hidden" name="_acao" value="u" >
                <td class="texto">rede: </td>
                
              <? echo "<td> <select class='input1' name='rede'>";
                while ($row = mysqli_fetch_array($qr)) {
                    echo "<option value='" . $row['idrede'] . "'>" . $row['rede'] . "</option>";
                }
                echo "</select></td>";?>
                    <? } ?>
                </tr>
                <? if (isset($_GET["id"]) != null) { ?>
                    <td><input type="hidden" name="_acao" value="u">
                    <td><input type="hidden" name="_modulo" value="pessoa">
                    <? } else { ?>
                    <td><input type="hidden" name="_acao" value="i">
                    <td><input type="hidden" name="_modulo" value="pessoa">
                    <? } ?>
                    <input type="hidden" name="id" value="<?= $pessoa["id"] ?> ">
                    <input type="hidden" nome="idusuario" value="<?= $idusuario_cookie ?>">
                    </td>
                    <td><br><br><br><br><br><input class="enviar btn1 left" type="submit" name="Enviar" value="Enviar"></td>
                    </tr>
            </tbody>
        </table>
    </form>
</div>