<link rel="stylesheet" type="text/css" href="../css/mobile.css">
<?
$banco = abrirBanco();
$qp = $banco->query("SELECT p.*,e.cargo,r.rede from celula c join pessoa p on(p.idlider = c.idlider) join rede r on(p.idrede = r.idrede) join emcargo e on(p.idemcargo = e.idemcargo) where c.idcelula =" . $_GET['id']) or die('erro');
$q = $banco->query("SELECT p.*,e.cargo,r.rede from celula c join pessoa p on(p.idlider = c.idlider) join rede r on(p.idrede = r.idrede) join emcargo e on(p.idemcargo = e.idemcargo) where c.idcelula =" . $_GET['id'] . " order by idemcargo desc ") or die('erro');
if ($_COOKIE['mobile'] == 'Y') { ?>
    <div style="overflow-y: scroll;width:  100%; height: 500px">
        <? if ($_GET['_modulo'] == 'icelula') {
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
                            <td style="font-size: 14px;width: 40%;">
                                <?= $row["cargo"] ?>
                            <td style="width: 30%;"></td>
                            <td style="width: 30%;">
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
                            <td style="width: 60%;">
                                <h6> <?= $row["nome"] ?></h6>
                            </td>
                            <td style="width: 0%;">

                            </td>
                            <td style="width: 40%;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Rede: <?= $row["rede"] ?></h6>
                            </td>
                            <td></td>
                            <td>
                                <? if (!empty($row["celula"])) {
                                    echo  "<h6> Célula: " . $row["celula"] . "</h6>";
                                } ?>
                            </td>
                        </tr>

                    </table>
                </div>
        <? }
        }
    } else { ?>
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
            <?
            while ($row = mysqli_fetch_array($qp)) { //desenhar apenas as colunas
            ?>
                <tr class="bb">
                    <td><?= $row["nome"] ?></td>
                    <td><?= $row["sexo"] ?></td>
                    <td><?= $row["cargo"] ?></td>
                    <td><?= $row["rede"] ?></td>
                    <td><?= $row["criadoem"] ?></td>
                    <td><?= $row["alteradoem"] ?></td>
                    <td class="clickable-row" data-href="index.php?_modulo=ipessoa&_acao=r&id=<?= $row["id"] ?>">Visializar</td>
                    <? if ($row["status"] != 'ATIVO') { ?>
                        <td> <button class="btn fundo-azul" id="<?= $row["id"] ?>" onclick="ativar(this)"><img src="../img/visivel.png"></button></td>
                    <? } else { ?>
                        <td><a class="btn fundo-amarelo" title="Editar" href="?_modulo=<?= $_GET['_modulo'] ?>&_acao=r&id=<?= $row["id"] ?>"><img src="../img/editar.png"> </a> </td>
                        <td> <button class="btn fundo-vermelho" title="Inativar" onclick="deletar(this)" id="<?= $row["id"] ?>"><img src="../img/invisivel.png"></button></td>
                    <? } ?>
                </tr>
        <? }
        } ?>
        </table>
        <script>
            jQuery(document).ready(function($) {
                $(".clickable-row").click(function() {
                    window.location = $(this).data("href");
                });
            });
        </script>