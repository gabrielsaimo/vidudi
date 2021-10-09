<meta charset="UTF-8">

<head>
    <link rel="stylesheet" type="text/css" href="../css/mobile.css">
</head>
<style>
    <? if ($celula == 1) { ?>@media only screen and (min-width: 600px) {
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

        .texto {
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
    }

    <? } ?>
</style>
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
                    <td class="texto">Sexo: </td>
                    <? if (isset($_GET["id"]) != null) { ?>
                        <!--  _1_i_pessoa_sexo  ---->
                        <td><select class='input1' name="sexo" value="">
                                <option value="Homem">Homem</option>
                                <option value="mulher">mulher</option>
                            </select>
                        </td>
                    <? } else { ?>
                        <td><select class='input1' name="sexo" value="">
                                <option value="Homem">Homem</option>
                                <option value="mulher">mulher</option>
                            </select>
                        </td>
                    <? } ?>
                </tr>
                <tr>
                    <? if (isset($_GET["id"]) != null) { ?>
                        <input type="hidden" name="_modulo" value="pessoa"><input type="hidden" name="_acao" value="u">
                        <td class="texto">rede: </td>

                        <? echo "<td> <select class='input1' name='rede'>";
                        while ($row = mysqli_fetch_array($qr)) {
                            echo "<option value='" . $row['idrede'] . "'>" . $row['rede'] . "</option>";
                        }
                        echo "</select></td>"; ?>
                    <? } else { ?>
                        <input type="hidden" name="_modulo" value="pessoa"><input type="hidden" name="_acao" value="u">
                        <td class="texto">rede: </td>

                        <? echo "<td> <select class='input1' name='rede'>";
                        while ($row = mysqli_fetch_array($qr)) {
                            echo "<option value='" . $row['idrede'] . "'>" . $row['rede'] . "</option>";
                        }
                        echo "</select></td>"; ?>
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
                    <tr>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td colspan=3><input class=" btn1 " type="submit" name="Enviar" value="Enviar"></td>
                    </tr>
                    </td>
                    </tr>
            </tbody>
        </table>
    </form>
</div>