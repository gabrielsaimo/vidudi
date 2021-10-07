
<div class="caixa"></div>
<table  class="table menos-top">
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
    <tbody>
        <?
            //usar os campos de get['coluna'] para buscar na tabela (get[_modulo]) os dados cadastrados la.. apresentaremos apenas as colunas definidas no bloco php anterior.
            $banco = abrirBanco();
            if($_GET['_modulo']=='celula' or $_GET['_modulo']=='pessoa'){
            $qp = $banco->query("SELECT p.idemcargo,p.idrede from pessoa p join usuario u on (p.idusuario = u.idusuario) where u.idusuario =".$_COOKIE['idusuario']);
            $rows = mysqli_fetch_array($qp);
            if($rows['idemcargo']== 2){
                $per = 'p.idemcargo in(1) and p.idrede ='.$rows['idrede'];
            }else if($rows['idemcargo']== 3){
                $per = 'p.idemcargo in(1,2) and p.idrede ='.$rows['idrede'];
            }else if($rows['idemcargo']== 4) {
                $per = 'p.idemcargo in(1,2,3) and p.idrede ='.$rows['idrede'];
            }else{
                $per = 'p.idemcargo';
            }
            
            $modulo = $_GET['_modulo'];
            if($_GET['_modulo'] != 'celula'){
                $cond = "p join rede r on(p.idrede = r.idrede) join emcargo e on(p.idemcargo = e.idemcargo) where ".$per;
                $from = "p.*,e.cargo,r.rede";
            }else{
                $cond = "c join pessoa p on(c.idlider = p.id)";
                $from = "c.*,p.nome";
            }
            $q = $banco->query("SELECT ".$from." FROM " .$modulo ." ". $cond." ");
            $banco->close();
            
                $nump = mysqli_num_rows($q);
                echo $nump;
            
            if($_GET['_modulo']=='celula'){

                while($row = mysqli_fetch_array($q)) { ?>
                    <tr class="bb clickable-row" data-href="index.php?_modulo=icelula&_colunas[]=nome&_colunas[]=sexo&_colunas[]=emcargo&_colunas[]=rede&_colunas[]=criadoem&_colunas[]=alteradoem&_pk=idpessoa&id=<?=$row["idcelula"]?>&_acao=r" >
                    <td ><?= $row["idcelula"] ?></td>
                    <td ><?= $row["celula"] ?></td>
                    <td ><?= $row["endereco"] ?></td>
                    <td ><?= $row["dia"] ?></td>
                    <td ><?= $row["horario"] ?></td>
                    <td ><?= $row["nome"] ?></td>
                    <td ><?= date('d-m-Y', strtotime($row["inidata"] ))?></td>
                    <?if($row["status"] != 'ATIVO'){?>
                        <td> <button class="btn fundo-azul" title="Ativar" id="<?=$row["idcelula"]?>" onclick="ativar(this)"><img src="../img/visivel.png"></button></td>
                        <td></td>
                    <?}else{?>
                        <td> <a class="btn fundo-amarelo" title="Editar" href="?_modulo=celula&celula=<?=$row['celula']?>&_acao=u&id=<?=$row["idcelula"]?>"><img src="../img/editar.png" ></a> </td>
                        <td> <button class="btn fundo-vermelho" title="Inativar" id="<?=$row["idcelula"]?>" onclick="deletar(this)"><img src="../img/invisivel.png"></button></td>
                    <?}?>
                    </tr>
                    <?}
                }
               
                
            while($row = mysqli_fetch_array($q)) {//desenhar apenas as colunas?>
                <tr class="bb"> 
                    <td ><?=$row["nome"]?></td>
                    <td ><?=$row["sexo"]?></td>
                    <td ><?=$row["cargo"]?></td>
                    <td ><?=$row["rede"]?></td>
                    <td ><?=$row["criadoem"]?></td>
                    <td ><?=$row["alteradoem"]?></td>
                    <td class="clickable-row" data-href="index.php?_modulo=ipessoa&_acao=r&id=<?=$row["id"]?>">Visializar</td>
                    <?if($row["status"] != 'ATIVO'){?>
                        <td> <button class="btn fundo-azul" id="<?=$row["id"]?>" onclick="ativar(this)"><img src="../img/visivel.png"></button></td>
                    <?}else {?>
                    <td><a class="btn fundo-amarelo" title="Editar" href="?_modulo=<?=$_GET['_modulo']?>&_acao=r&id=<?=$row["id"]?>"><img src="../img/editar.png" > </a> </td>
                    <td> <button class="btn fundo-vermelho" title="Inativar" onclick="deletar(this)" id="<?=$row["id"]?>"><img src="../img/invisivel.png"></button></td>
                    <?}?>
                </tr>
            <?}
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
        function deletar(vthis){
            var id=$(vthis).attr("id");
            $.ajax({
                url: 'cb.php',
                type: 'POST',
                dataType :'text',
                data:{ id,_acao:"d",_modulo:"<?=$modulo?>"},
                success: function(data,text,jqxhr) {
                    location.reload();
                },
                error: function(r){
                    alert('deu erro');
                }
            });
        }
        function ativar(vthis){
            var id=$(vthis).attr("id");
            $.ajax({
                url: 'cb.php',
                type: 'POST',
                dataType :'text',
                data:{ id,_acao:"u",_modulo:"<?=$modulo?>",status:"ATIVO"},
                success: function(data,text,jqxhr) {
                    location.reload();
                },
                error: function(r){
                    alert('deu erro');
                }
            });
        }

    </script>