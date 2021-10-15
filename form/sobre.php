<?
$banco = abrirBanco();
$q = $banco->query("SELECT p.idemcargo, count(*) as valor  FROM pessoa p group by p.idemcargo;");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre</title>
</head>
<body>
  <?
  while($row = mysqli_fetch_array($q)){
      if($row['idemcargo'] == 1){
        $membros = $row['valor']; echo 'Frequentantes:'.$row['valor'] .'<br>';
      }if ($row['idemcargo'] == 2){
        $lideres = $row['valor']; 'Lideres:'.$row['valor'].'<br>';
      }if ($row['idemcargo'] == 3){
        $dicipuladores = $row['valor']; echo 'Dicipuladores'.$row['valor'].'<br>';
      }if ($row['idemcargo'] == 4){
        $obreiros = $row['valor']; echo'Obreiros:'.$row['valor'].'<br>';
      }if ($row['idemcargo'] == 5){
        $pastores = $row['valor']; echo 'Pastores:'.$row['valor'].'<br>';
      }
  }
 $total = $membros+$lideres+$dicipuladores+$obreiros+$pastores;
 echo 'nos somos : '.$total. ' membros';
  ?>
</body>
</html>