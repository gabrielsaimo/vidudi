<head>
    <link rel="stylesheet" type="text/css" href="../css/mobile.css">
</head>


<style>
    <? if ($_COOKIE['mobile'] == 'Y') { ?>@media only screen and (min-width: 600px) {
        .imagem {
            width: 280px !important;
            border-radius: 50%;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .btn1 {
            display: block;
            margin-left: auto;
            margin-right: auto;
            transition: .4s;
            width: 75% !important;
            height: 100px;
            font-size: 45px !important;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            font-weight: 500;
            color: #000;
            background-color: #094679;
            border: none;
            border-radius: 20px;
            box-shadow: 0px 8px 15px rgb(0 0 0 / 10%);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            outline: none;
        }

        td.texto {
            /*** futurista esquerda ****/
            display: flex;
            text-align: center;
            align-items: center;
            justify-content: center;
            width: 450px;
            height: 150px;
            margin-top: 1px;
            font-size: 45px;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            font-weight: 500;
            color: #000;
            margin-right: -25px;
            background-color: rgb(185, 177, 177);
            border: none;
            border-radius: 45px 10px 10px 40px;
            box-shadow: 0px 0px 50px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: default;
            outline: none;
        }

        .input1 {
            /*** futurista direita ****/
            display: flex;
            text-align: center;
            align-items: center;
            justify-content: center;
            width: 450px;
            height: 150px;
            font-size: 40px;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            font-weight: 500;
            color: #000;
            background-color: #fff;
            border: 1px solid rgb(220, 220, 220);
            border-radius: 45px;
            box-shadow: 0px 0px 60px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            outline: none;
            z-index: 2;
        }

        input[type=checkbox] {
            transform: scale(6);
        }

        .row {
            margin-left: 50px;
        }
    }

    <? } ?>
</style>
<form style="margin-top: 1000px; cursor: pointer;">
    <? $idusuario_cookie = $_COOKIE['idusuario'];
    $qp = $banco->query("SELECT p.* from pessoa p join usuario u on (p.idusuario = u.idusuario) where u.idusuario =" . $idusuario_cookie);
    $rows = mysqli_fetch_array($qp);
    $sqlbairro = $banco->query("SELECT * FROM bairro");
    if (empty($rows['idlider'])) {
        $q = $banco->query("SELECT p.id,p.nome FROM pessoa p join emcargo e on(p.idemcargo = e.idemcargo) where p.idemcargo in(2,3,4) and p.status='ATIVO'") or die("erro ao selecionar"); ?>
        <table class=" menos-top">
            <tbody>
                <? if (isset($rows["id"]) != null) { ?>
                    <? $pessoa = selectIdPessoa($rows["id"]); ?>
                <? } ?>

                <tr>
                    <td class="texto">Telefone: </td>
                    <? if (isset($rows["id"]) != null) { ?>
                        <td><input class="input1" id="telefone" type="phone" name="telefone" value="<?= $pessoa["telefone"] ?>" size="20" placeholder="..."></td>
                    <? } else { ?>
                        <td><input type="phone" id="telefone" name="telefone" value="<?= $pessoa["telefone"] ?>" class="input1" placeholder="..."></td>
                    <? } ?>
                </tr>
                <tr>

                    <input type="hidden" name="_modulo" value="pessoa"><input type="hidden" name="_acao" value="u">
                    <td class="texto">Bairro: </td>

                    <? echo "<td> <select class='input1' name='bairro'>";
                    while ($rowb = mysqli_fetch_array($sqlbairro)) {
                        echo "<option value='" . $rowb['idbairro'] . "'>" . $rowb['bairro'] . "</option>";
                    }
                    echo "</select></td>"; ?>
                </tr>
                <tr>
                    <td class="texto">Endereço: </td>
                    <? if (isset($rows["id"]) != null) { ?>
                        <td><input class="input1" id="endereco" type="andrres" name="endereco" value="<?= $pessoa["endereco"] ?>" size="20" placeholder="..."></td>
                    <? } else { ?>
                        <td><input type="andrres" id="endereco" name="endereco" value="<?= $pessoa["endereco"] ?>" class="input1" placeholder="..."></td>
                    <? } ?>
                </tr>
                <tr>

                    <input type="hidden" name="_modulo" value="pessoa"><input type="hidden" name="_acao" value="u">
                    <td class="texto">Lider: </td>

                    <? echo "<td> <select class='input1' name='idlider'>";
                    while ($row = mysqli_fetch_array($q)) {
                        echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                    }
                    echo "</select></td>"; ?>
                </tr>
                <tr>
                    <input type="hidden" name="_modulo" value="pessoa">
                    <td class="texto">data de nascimento: </td>
                    <input type="hidden" name="_acao" value="u">
                    <input type="hidden" name="idade" value="">
                    <td><input type="date" name="idade" value="" class="input1"></td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="batizado" id="batizado">
                        <label style="font-size: 70px; margin-left: 40px;" for="batizado">Batizado</label>

                    </td>
                <tr>
                    <td>
                        <input type="checkbox" name="cursao" id="cursao">
                        <label style="font-size: 70px; margin-left: 40px;" for="cursao">Cursao</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="ctl" id="ctl">
                        <label style="font-size: 70px; margin-left: 40px;" for="ctl">CTL</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="semi" id="semi">
                        <label style="font-size: 70px; margin-left: 40px;" for="semi">Seminario</label>
                    </td>
                </tr>

                </tr>

                <? if (isset($rows["id"]) != null) { ?>
                    <td><input type="hidden" name="_acao" value="u">
                    <td><input type="hidden" name="_modulo" value="pessoa">
                    <? } else { ?>
                    <td><input type="hidden" name="_acao" value="u">
                    <td><input type="hidden" name="_modulo" value="pessoa">
                    <? } ?>
                    <input type="hidden" name="id" value="<?= $pessoa["id"] ?> ">
                    <input type="hidden" nome="idusuario" value="<?= $idusuario_cookie ?>">
                    </td>
                    <tr>
                        <td colspan=3>
                            <input class="enviar btn1 left" type="submit" name="Enviar" value="Enviar">
                        </td>
                    </tr>
                    </td>
            </tbody>
        </table>
    <? } else { ?>

    <? } ?>

</form>