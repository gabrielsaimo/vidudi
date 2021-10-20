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
<form style=" cursor: pointer;">
    <? $idusuario_cookie = $_COOKIE['idusuario'];
    $qp = $banco->query("SELECT p.* from pessoa p join usuario u on (p.idusuario = u.idusuario) where u.idusuario =" . $idusuario_cookie);
    $rows = mysqli_fetch_array($qp);
    $sqlbairro = $banco->query("SELECT * FROM bairro");
    if (empty($rows['idlider'])) {
        $q = $banco->query("SELECT p.id,p.nome FROM pessoa p join emcargo e on(p.idemcargo = e.idemcargo) where p.idemcargo in(2,3,4) and p.status='ATIVO'") or die("erro ao selecionar"); ?>
        <table >
            <tbody>
                <tr>
                    <td class="texto">Telefone: </td>
                    <? if (isset($rows["id"]) != null) { ?>
                        <td><input required class="input1" id="telefone" type="phone" name="_1_u_pessoa_telefone" value="<?= $rows["telefone"] ?>" size="20" placeholder="..."></td>
                    <? } else { ?>
                        <td><input type="phone" id="telefone" name="_1_u_pessoa_telefone" value="<?= $rows["telefone"] ?>" class="input1" placeholder="..."></td>
                    <? } ?>
                </tr>
                <tr>
                    <td class="texto">Bairro: </td>
                    <? echo "<td> <select class='input1' required name='_1_u_pessoa_bairro'>";
                    echo "<option value='0'> </option>";
                    while ($rowb = mysqli_fetch_array($sqlbairro)) {
                        echo "<option value='" . $rowb['idbairro'] . "'>" . $rowb['bairro'] . "</option>";
                    }
                    echo "</select></td>"; ?>
                </tr>
                <tr>
                    <td class="texto">Endereço: </td>
                    <? if (isset($rows["id"]) != null) { ?>
                        <td><input required class="input1" id="endereco" type="andrres" name="_1_u_pessoa_endereco" value="<?= $rows["endereco"] ?>" size="20" placeholder="..."></td>
                    <? } else { ?>
                        <td><input required type="andrres" id="endereco" name="_1_u_pessoa_endereco" value="<?= $rows["endereco"] ?>" class="input1" placeholder="..."></td>
                    <? } ?>
                </tr>
                <tr>
                    <td class="texto">Lider: </td>
                    <? echo "<td> <select class='input1' name='_1_u_pessoa_idlider'>";
                        echo "<option value='0'> </option>";
                    while ($row = mysqli_fetch_array($q)) {
                        echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                    }
                    echo "</select></td>"; ?>
                </tr>
                <tr>
                    <td class="texto">Data de Nascimento: </td>
                    <td><input required type="date" name="_1_u_pessoa_idade" value="" class="input1"></td>
                </tr>
                <tr>
                    <td>
                        <input  type="checkbox" name="_1_u_pessoa_batizado" id="batizado" value="Y">
                        <label style="font-size: 20px; margin-left: 10px;" for="batizado">Batizado</label>

                    </td>
                <tr>
                    <td>
                        <input  type="checkbox" name="_1_u_pessoa_cursao" id="cursao" value="Y">
                        <label style="font-size: 20px; margin-left: 10px;" for="cursao">Cursao</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input  type="checkbox" name="_1_u_pessoa_ctl" id="ctl" value="Y">
                        <label style="font-size: 20px; margin-left: 10px;" for="ctl">CTL</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input  type="checkbox" name="_1_u_pessoa_semi" id="semi" value="Y">
                        <label style="font-size: 20px; margin-left: 10px;" for="semi">Seminario</label>
                    </td>
                </tr>

                </tr>

                <? if (isset($rows["id"]) != null) { ?>
                    <td>
            
                    <? } else { ?>
                    <td>
            
                    <? } ?>
                    <input type="hidden" name="id" value="<?= $rows["id"] ?> ">
                    <input type="hidden" nome="_1_u_pessoa_idusuario" value="<?= $idusuario_cookie ?>">
                    </td>
                    <tr>
                        <td colspan=3><input class=" btn1 " type="submit" name="Enviar" value="Enviar"></td>
                    </tr>
                    </td>
            </tbody>
        </table>
    <? } else { ?>

    <? } ?>

</form>