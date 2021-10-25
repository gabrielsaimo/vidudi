<style>
    input[type="file"] {
        display: none;
    }

    label,
    input[type=submit] {
        padding: 20px 10px;
        width: 200px;
        background-color: #333;
        color: #FFF;
        text-align: center;
        display: block;
        margin-top: 10px;
        cursor: pointer;
    }
</style>
<?
$banco = abrirBanco();
if($_GET['_acao'] == 'u'){
    $qid = $banco->query("SELECT p.idpessoa FROM pessoa p WHERE p.idusuario =".$idusuario_cookie) or die('erro ao restornar o id');
    $rowid = mysqli_fetch_assoc($qid);
  echo $id = $rowid['id'];
}else{
    $id = $_GET['id'];
}
$qp = $banco->query("SELECT p.nome,p.telefone,b.bairro,p.email,p.idade,p.endereco,p.cursao,p.ctl,p.batizado,p.status,p.criadoem,r.rede,e.cargo,pl.nome as nomelider from pessoa p join rede r on(p.idrede = r.idrede) join emcargo e on(p.idemcargo = e.idemcargo) left join pessoa pl on(p.idlider = pl.id) join bairro b on(p.bairro = b.idbairro) where p.idpessoa=" . $id) or die('erro');
$row = mysqli_fetch_assoc($qp);
$data = $row['idade'];

$qi = $banco->query("SELECT anexo from anexo where tipoanexo='avatar' and idobjeto=" . $id);
$rown = mysqli_num_rows($qi);
$rowi = mysqli_fetch_assoc($qi);

if ($rown > 0) {
    echo '<img class="imagem" style="width: 200px!important;height: 160px; border-radius: 50%;" src="data:image/jpeg;base64,' . base64_encode($rowi['anexo']) . '"/>';
    Header("Content-type:anexo/jrpg");
} else {
    echo '<img style="width: 200px; border-radius: 50%;" src="../img/avatar.jpg"/>';
}

list($ano, $mes, $dia) = explode('-', $data);
$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
$nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
if ($row['cursao'] == 'Y') {
    $cursao = 'Sim';
} else {
    $cursao = 'Não';
}
if ($row['ctl'] == 'Y') {
    $ctl = 'Sim';
} else {
    $ctl = 'Não';
}
if ($row['batizado'] == 'Y') {
    $batizado = 'Sim';
} else {
    $batizado = 'Não';
}

if ($_GET['id'] == $idpessoa) { ?>
    <form action="upanexo.php" method="post" enctype="multipart/form-data">
        <? if ($rown > 0) { ?>
            <label for="file">Atuzalizar foto</label>
        <? } else { ?>
            <label for="file">Enviar foto</label>
        <? } ?>
        <input hidden type="file" name="file" id="file" accept="image/png, image/gif, image/jpeg">
        <input type="hidden" nome="id" value="<?= $idpessoa ?>" name="id">
        <input type="hidden" nome="tipo" value="avatar" name="tipo">
        <input style="display: none;" id="submit" type="submit" value="submit" name="submit">
    </form>
<? } ?>
<div>Nome: <?= $row['nome'] ?></div>
<div>Telefone: <?= $row['telefone'] ?> </div>
<div>Bairro: <?= $row['bairro'] ?> </div>
<div>Endereço: <?= $row['endereco'] ?> </div>
<div>Email: <?= $row['email'] ?> </div>
<div>Data de Naiscimento: <?= date('d-m-Y', strtotime($row['idade'])) ?></div>
<div>Idade: <?= $idade ?> Anos</div>
<div>Encargo: <?= $row['cargo'] ?></div>
<div>Rede: <?= $row['rede'] ?></div>
<div>Cursao: <?= $cursao ?></div>
<div>CTL: <?= $ctl ?></div>
<div>Batizado: <?= $batizado ?></div>
<div>Status: <?= $row['status'] ?></div>
<div>Lider: <?= $row['nomelider'] ?></div>
<div>Registrdo em: <?= $row['criadoem'] ?></div>

<script>
    document.getElementById("file").onchange = function() {
        if ($("form").children('input').val() != '') {
            $("form").children('input#submit').css("display", "block");
            $("form").children('label').css("display", "none");
        }
    };
</script>