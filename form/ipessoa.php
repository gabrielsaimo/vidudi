<?
    $banco = abrirBanco();
    $qp = $banco->query("SELECT p.nome,p.telefone,p.email,p.idade,p.endereco,p.cursao,p.ctl,p.batizado,p.status,p.criadoem,r.rede,e.cargo,pl.nome as nomelider from pessoa p join rede r on(p.idrede = r.idrede) join emcargo e on(p.idemcargo = e.idemcargo) left join pessoa pl on(p.idlider = pl.id) where p.id=".$_GET['id']) or die('erro');
    $row = mysqli_fetch_array($qp);
    $data = $row['idade'];
    list($ano, $mes, $dia) = explode('-', $data);
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

    /* batizado,status, lider, se registrou em  */ 
?>
        <div>Nome: <?=$row['nome']?></div>
        <div>Telefone: <?=$row['telefone']?> </div>
        <div>Endereço: <?=$row['endereco']?> </div>
        <div>Email: <?=$row['email']?> </div>
        <div>Data de Naiscimento: <?=date('d-m-Y', strtotime($row['idade']))?></div>
        <div>Idade: <?=$idade?> Anos</div>
        <div>Emcargo: <?=$row['cargo']?></div>
        <div>Rede: <?=$row['rede']?></div>
        <div>Cursao: <?=$row['cursao']?></div>
        <div>CTL: <?=$row['ctl']?></div>
        <div>Batizado: <?=$row['batizado']?></div>
        <div>Status: <?=$row['status']?></div>
        <div>Lider: <?=$row['nomelider']?></div>
        <div>Registrdo em: <?=$row['criadoem']?></div>
        