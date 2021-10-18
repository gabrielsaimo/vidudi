<head>
    <link rel="stylesheet" type="text/css" href="../css/mobile.css">
</head>
<?
$banco = abrirBanco();
if ($_GET['_modulo'] == 'celula' or $_GET['_modulo'] == 'pessoa') {
    $qp = $banco->query("SELECT p.idemcargo,p.idrede,p.id from pessoa p join usuario u on (p.idusuario = u.idusuario) where u.idusuario =" . $_COOKIE['idusuario']);
    $rows = mysqli_fetch_array($qp);
    if ($_GET['_modulo'] != 'celula') {
        if ($rows['idemcargo'] == 2) {
            $per = ' where p.idemcargo in(1) and p.idrede =' . $rows['idrede'];
        } else if ($rows['idemcargo'] == 3) {
            $per = ' where p.idemcargo in(1,2) and p.idrede =' . $rows['idrede'];
        } else if ($rows['idemcargo'] == 4) {
            $per = ' where p.idemcargo in(1,2,3) and p.idrede =' . $rows['idrede'];
        }
    } else {
        $per = "where statusc = 'ATIVO' or statusc = 'INATIVO'";
    }
}
$modulo = $_GET['_modulo'];
if ($_GET['_modulo'] == 'pessoa') {
    $q = $banco->query("SELECT * FROM vwpessoa " . $cond . " " . $per);
    $nump = mysqli_num_rows($q);
} elseif ($_GET['_modulo'] == 'celula') {
    $q = $banco->query("select * from pessoa p left join celula c on(p.idlider = c.idlider and c.status = 'ATIVO') group by  c.idcelula");
    $nump = mysqli_num_rows($q);
}
if(!empty($modulo)){
    echo '<div style="text-align: end;">'.$nump.' Resultados.</div>';
}


if ($_COOKIE['mobile'] == 'Y') { ?>
    <div style="overflow-y: scroll;width:  100%; height: 500px">
        <? if ($_GET['_modulo'] == 'celula') { ?>
            <? while ($row = mysqli_fetch_array($q)) {
                if (!empty($row['idlider'])) {
                    $qc = $banco->query("select * from pessoa where idlider=" . $row['idlider']);
                    $rowc = mysqli_num_rows($qc);
                }

                if ($rowc > 1) {
                    $rowc = $rowc - 1;
                }
            ?>
                <div class="card clickable-row" data-href="index.php?_modulo=icelula&_colunas[]=nome&_colunas[]=sexo&_colunas[]=emcargo&_colunas[]=rede&_colunas[]=criadoem&_colunas[]=alteradoem&_pk=idpessoa&id=<?= $row["idcelula"] ?>&_acao=r">
                    <table>
                        <tr>
                            <td style="width: 50%;">
                                <h6>Célula: <?= $row["celula"] ?><h6>
                            </td>
                            <td style="width: 20%;"></td>
                            <td style="width: 30%;"> Membros:<?= $rowc ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Dia: <?= $row["dia"] ?></td>
                        </tr>
                        <tr>
                            <td>Bairro: <?= $row["bairro"] ?></td>
                            <td></td>
                            <td>As <?= $row["horario"] ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <h6> Líder: <?= $row["nome"] ?><h6>
                            </td>
                        </tr>


                    </table>


                </div>

            <? }
        } else if ($_GET['_modulo'] == 'pessoa') {
            while ($row = mysqli_fetch_array($q)) { ?>
                <div class="card">

                    <? $qi = $banco->query("SELECT anexo from anexo where idobjeto=" . $row["id"]);
                    $rown = mysqli_num_rows($qi);
                    $rowi = mysqli_fetch_array($qi);
                    ?>
                    <table>
                        <tr>

                            <?
                            if ($rown > 0) {
                                echo '<td> <img style="width: 62px; height: 62px; border-radius: 80%;" src="data:image/jpeg;base64,' . base64_encode($rowi['anexo']) . '"/> </td>';
                                Header("Content-type:anexo/jrpg");
                            } else {
                                echo '<td> <img style="width: 62px; height: 62px; border-radius: 80%;" src="../img/avatar.jpg"/> </td> ';
                            }
                            ?>
                            <td style="width: 3%;"></td>
                            <td style="font-size: 14px;width: 50%;">
                                <?= $row["cargo"] ?>
                            <td style="width: 28%;">
                                <? if ($row["batizado"] == 'Y') { ?>
                                    <img style="width: 15px; height: 15px;margin-bottom: -7px;" src="../img/bati.png" />
                                <? } ?>
                                <? if ($row["cursao"] == 'Y') { ?>
                                    <img style="width: 15px; height: 15px;margin-bottom: -7px;" src="../img/cursao.png" />
                                <? } ?>
                                <? if ($row["ctl"] == 'Y') { ?>
                                    <img style="width: 15px; height: 15px;margin-bottom: -7px;" src="../img/ctl.png" />
                                <? } ?>
                                <? if ($row["semi"] == 'Y') { ?>
                                    <img style="width: 15px; height: 15px;margin-bottom: -7px;" src="../img/semi.png" />
                                <? } ?>
                            </td>

                        </tr>
                    </table>
                    <table class="margemleft">
                        <tr>
                            <td colspan="3">
                                <h6> <?= $row["nome"] ?></h6>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%;">
                                <h6>Rede: <?= $row["rede"] ?></h6>
                            </td>
                            <td style="width: 35%;">
                                <? if (!empty($row["celula"])) {
                                    echo  "<h6> Célula: " . $row["celula"] . "</h6>";
                                } ?>
                            </td>
                        </tr>

                    </table>
                </div>
    <? }
        }
    } ?>
    </div>

    <? if ($_COOKIE['mobile'] == 'N' and !empty($_GET['_modulo'])) { ?>
        <div class="caixa"></div>
        <table class="table menos-top">
            <thead class="thead-light">
                <tr>
                    <?
                    if (!empty($_GET)) {
                        foreach ($_GET['_colunas'] as $v) {
                            //listas os campos enviados pelo get para montar a tabela de pesquisa
                            echo '<td class="bb">' . $v . ' </td>';
                        }
                    }

                    ?>
                </tr>
            </thead>
            <tbody>
                <?
                if ($_GET['_modulo'] == 'celula') {

                    while ($row = mysqli_fetch_array($q)) { ?>
                        <tr class="bb clickable-row" data-href="index.php?_modulo=icelula&_colunas[]=nome&_colunas[]=sexo&_colunas[]=emcargo&_colunas[]=rede&_colunas[]=criadoem&_colunas[]=alteradoem&_pk=idpessoa&id=<?= $row["idcelula"] ?>&_acao=r">
                            <td><?= $row["idcelula"] ?></td>
                            <td><?= $row["celula"] ?></td>
                            <td><?= $row["endereco"] ?></td>
                            <td><?= $row["dia"] ?></td>
                            <td><?= $row["horario"] ?></td>
                            <td><?= $row["nome"] ?></td>
                            <td><?= date('d-m-Y', strtotime($row["inidata"])) ?></td>
                            <? if ($row["status"] != 'ATIVO') { ?>
                                <td> <button class="btn fundo-azul" title="Ativar" id="<?= $row["idcelula"] ?>" onclick="ativar(this)"><img src="../img/visivel.png"></button></td>
                                <td></td>
                            <? } else { ?>
                                <td> <a class="btn fundo-amarelo" title="Editar" href="?_modulo=celula&celula=<?= $row['celula'] ?>&_acao=u&id=<?= $row["idcelula"] ?>"><img src="../img/editar.png"></a> </td>
                                <td> <button class="btn fundo-vermelho" title="Inativar" id="<?= $row["idcelula"] ?>" onclick="deletar(this)"><img src="../img/invisivel.png"></button></td>
                            <? } ?>
                        </tr>
                    <? }
                }

                if ($_GET['_modulo'] == 'pessoa') {
                    while ($row = mysqli_fetch_array($q)) { //desenhar apenas as colunas
                    ?>
                        <tr class="bb">
                            <td><?= $row["nome"] ?></td>
                            <td><?= $row["sexo"] ?></td>
                            <td><?= $row["cargo"] ?></td>
                            <td><?= $row["rede"] ?></td>
                            <td><?= $row["criadoem"] ?></td>
                            <td><?= $row["alteradoem"] ?></td>
                            <td class="clickable-row" data-href="index.php?_modulo=ipessoa&_acao=r&id=<?= $row["id"] ?>">Visualizar</td>
                            <? if ($row["status"] != 'ATIVO') { ?>
                                <td> <button class="btn fundo-azul" id="<?= $row["id"] ?>" onclick="ativar(this)"><img src="../img/visivel.png"></button></td>
                            <? } else { ?>
                                <td><a class="btn fundo-amarelo" title="Editar" href="?_modulo=<?= $_GET['_modulo'] ?>&_acao=r&id=<?= $row["id"] ?>"><img src="../img/editar.png"> </a> </td>
                                <td> <button class="btn fundo-vermelho" title="Inativar" onclick="deletar(this)" id="<?= $row["id"] ?>"><img src="../img/invisivel.png"></button></td>
                            <? } ?>
                        </tr>
            <? }
                }
            }
            ?>
            </tbody>
        </table>
        <br>
        <div style="display: flex; justify-content: center;">
        </div>
        <script>
            jQuery(document).ready(function($) {
                $(".clickable-row").click(function() {
                    window.location = $(this).data("href");
                });
            });

            function deletar(vthis) {
                var id = $(vthis).attr("id");
                $.ajax({
                    url: 'cb.php',
                    type: 'POST',
                    dataType: 'text',
                    data: {
                        id,
                        _acao: "d",
                        _modulo: "<?= $modulo ?>"
                    },
                    success: function(data, text, jqxhr) {
                        location.reload();
                    },
                    error: function(r) {
                        alert('deu erro');
                    }
                });
            }

            function ativar(vthis) {
                var id = $(vthis).attr("id");
                $.ajax({
                    url: 'cb.php',
                    type: 'POST',
                    dataType: 'text',
                    data: {
                        id,
                        _acao: "u",
                        _modulo: "<?= $modulo ?>",
                        status: "ATIVO"
                    },
                    success: function(data, text, jqxhr) {
                        location.reload();
                    },
                    error: function(r) {
                        alert('deu erro');
                    }
                });
            }
        </script>