<?
$banco = abrirBanco();
            $qp = $banco->query("SELECT p.*,e.cargo,r.rede from celula c join pessoa p on(p.idlider = c.idlider) join rede r on(p.idrede = r.idrede) join emcargo e on(p.idemcargo = e.idemcargo) where c.idcelula =".$_GET['id']) or die('erro');?>
            <div class="caixa"></div>
            <table class="table menos-top">
                <thead class="thead-light">
                    <tr>
                        <?
                        if(!empty($_GET)){
                            foreach($_GET['_colunas'] as $v) {
                                //listas os campos enviados pelo get para montar a tabela de pesquisa
                                echo '<td class="bb">'.$v.' </td>';
                            }
                        }
                        ?>
                    </tr>
                </thead>
                    <?
                while($row = mysqli_fetch_array($qp)) {//desenhar apenas as colunas?>
                    <tr class="bb clickable-row" data-href="index.php?_modulo=ipessoa&_acao=r&id=<?=$row["id"]?>" > 
                    <td ><?=$row["nome"]?></td>
                    <td ><?=$row["sexo"]?></td>
                    <td ><?=$row["cargo"]?></td>
                    <td ><?=$row["rede"]?></td>
                    <td ><?=$row["criadoem"]?></td>
                    <td ><?=$row["alteradoem"]?></td>
                    <?if($row["status"] != 'ATIVO'){?>
                        <td> <button class="btn fundo-azul" id="<?=$row["id"]?>" onclick="ativar(this)"><b>ATIVAR</b></button></td>
                    <?}else {?>
                    <td><a class="btn fundo-amarelo" href="?_modulo=<?=$_GET['_modulo']?>&_acao=r&id=<?=$row["id"]?>"><b>Editar</b></a> </td>
                    <td> <button class="btn fundo-vermelho" onclick="deletar(this)" id="<?=$row["id"]?>"><b>Excluir</b></button></td>
                    <?}?>
                    </tr>
                <?}?>
            </table>
            <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
            </script>
            
