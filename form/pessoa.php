<meta charset="UTF-8">

<head>
    <link rel="stylesheet" required type="text/css" href="../css/mobile.css">
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
    }

    <? } ?>
</style>
<? $acao = $_GET['_acao'];
if($_GET['edite'] = "Y"){
    $id = $_GET['id'];
}else if ($_COOKIE['id'] != $_GET['id']) {
    $id = $_GET['id'];
}if(empty($id) and $id == null){
    $id = $_COOKIE['id'];
} ?>
<div class="container ">
    <br>
    <form action="cb.php" method="post">
        <? $idusuario_cookie = $_COOKIE['idusuario'];
        $q = $banco->query("SELECT * FROM emcargo") or die("erro ao selecionar emcargo");
        $qr = $banco->query("SELECT * FROM rede") or die("erro ao selecionar rede");
        ?>
        <table class="centro">
            <tbody>
                <?if(!empty($id)){
                    $qp = $banco->query("SELECT * FROM pessoa where idpessoa = " . $id) or die("erro ao selecionar pessoa");
                    $rowno = mysqli_fetch_assoc($qp);
                }else{
                    $acao = "i";
                }
                
                ?>
                <tr>
                    <td class="texto">Nome: </td>
                    <?if($acao != "i"){?><input type="hidden" name="_1_<?=$acao?>_pessoa_idpessoa" value="<?= $id ?>">
                    <?}?>
                        <td>
                            <input class="input1" id="nome" required type="text" name="_1_<?=$acao?>_pessoa_nome" value="<?= $rowno["nome"] ?>" size="20" placeholder="digite seu nome aqui ...">
                        </td>
                </tr>
                <tr>
                    <td class="texto">Email: </td>
                        <td><input class="input1" id="nome" required type="email" name="_1_<?=$acao?>_pessoa_email" value="<?= $rowno["email"] ?>" size="20" placeholder="..."></td>
                </tr>
                <tr>

                        <!--  _1_i_pessoa_emcargo  ---->
                        <td class="texto">Encargo: </td>
                        <? echo "<td> <select class='input1' name='_1_".$acao."_pessoa_idemcargo'>";
                        while ($rows = mysqli_fetch_array($q)) {
                            echo "<option value='" . $rows['idemcargo'] . "'>" . $rows['cargo'] . "</option>";
                        }
                        echo "</select></td>"; ?>
                </tr>
                <tr>
                    <td class="texto">Sexo: </td>
                        <!--  _1_i_pessoa_sexo  ---->
                        <td><select class='input1' name="_1_<?=$acao?>_pessoa_sexo" value="">
                                <option value="Homem">Homem</option>
                                <option value="mulher">mulher</option>
                            </select>
                        </td>
                </tr>
                <tr>
                        <td class="texto">Rede: </td>

                        <? echo "<td> <select class='input1' name='_1_".$acao."_pessoa_idrede'>";
                        while ($row = mysqli_fetch_array($qr)) {
                            echo "<option value='" . $row['idrede'] . "'>" . $row['rede'] . "</option>";
                        }
                        echo "</select></td>"; ?>
                    
                    </tr>
                    <?if($_GET['edite'] != 'Y' or $acao == "i"){?>
                        <input required type="hidden" name="_1_i_pessoa_idusuario" value="<?= $idusuario_cookie ?>">
                        <?}?>  
                    </td>
                    <tr>
                        <td colspan=3><input class=" btn1 " required type="submit" name="Enviar" value="Enviar"></td>
                    </tr>
                    </td>
                    </tr>
            </tbody>
        </table>
    </form>
</div>