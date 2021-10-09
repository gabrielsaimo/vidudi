<?
$banco = abrirBanco();
$qp = $banco->query("SELECT p.nome,p.telefone,b.bairro,p.email,p.idade,p.endereco,p.cursao,p.ctl,p.batizado,p.status,p.criadoem,r.rede,e.cargo,pl.nome as nomelider from pessoa p join rede r on(p.idrede = r.idrede) join emcargo e on(p.idemcargo = e.idemcargo) left join pessoa pl on(p.idlider = pl.id) join bairro b on(p.bairro = b.idbairro) where p.id=" . $_GET['id']) or die('erro');
$row = mysqli_fetch_array($qp);
$data = $row['idade'];
$qi = $banco->query("SELECT anexo from anexo where tipoanexo='avatar' and idobjeto=" . $_GET['id']);
$rown = mysqli_num_rows($qi);
$rowi = mysqli_fetch_array($qi);

if ($rown > 0) {

    echo '<img style="width: 100px; height: 100px; border-radius: 50%;" src="data:image/jpeg;base64,' . base64_encode($rowi['anexo']) . '"/>';
    Header("Content-type:anexo/jrpg");
} else {
    echo '<img style="width: 100px; height: 100px; border-radius: 50%;" src="../img/avatar.jpg"/>';
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

if ($rown < 1) { ?>
    <form action="upanexo.php" method="post" enctype="multipart/form-data">
        adicione uma imagem:
        <input type="file" name="file" id="file">
        <input type="hidden" nome="id" value="<?= $_GET['id'] ?>" name="id">
        <input type="hidden" nome="tipo" value="avatar" name="id">
        <input type="submit" value="submit" name="submit">
    </form>
<? } ?>
<div>Nome: <?= $row['nome'] ?></div>
<div>Telefone: <?= $row['telefone'] ?> </div>
<div>Bairro: <?= $row['bairro'] ?> </div>
<div>Endereço: <?= $row['endereco'] ?> </div>
<div>Email: <?= $row['email'] ?> </div>
<div>Data de Naiscimento: <?= date('d-m-Y', strtotime($row['idade'])) ?></div>
<div>Idade: <?= $idade ?> Anos</div>
<div>Emcargo: <?= $row['cargo'] ?></div>
<div>Rede: <?= $row['rede'] ?></div>
<div>Cursao: <?= $cursao ?></div>
<div>CTL: <?= $ctl ?></div>
<div>Batizado: <?= $batizado ?></div>
<div>Status: <?= $row['status'] ?></div>
<div>Lider: <?= $row['nomelider'] ?></div>
<div>Registrdo em: <?= $row['criadoem'] ?></div>