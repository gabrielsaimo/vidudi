
<?php
    /*mixed str_replace (mixed procura, mixed substituo, mixed contexto)*/
    $texto = "https://drive.google.com/file/d/12437qj3glUPyiF048nYvuvik3RoB9iVaZqE199UfAikgw_4Yap09UVsf9b6cvjXXDfXiFjGsimPZxw5b/view?usp=sharing";
    $novo_texto = str_replace("file/d/","u/0/uc?id=", $texto);
    
    echo $novo_texto;
    $novo_tetxo1 = str_replace("/view?usp=sharing","&export=download", $novo_texto);
    echo $novo_tetxo1;
?>
<button> <a href="<?=$novo_tetxo1?>"> Dowloada</a></button>

