<?php

/**
 * @author holodek
 * @copyright 2009
 */

// a função explode é usada para separar uma string em
// uma matriz de strings usando um delimitador
/*
$frase = "Gosto de programar em PHP";
$frase2 = explode(" ", $frase);
// exibe apenas a segunda palavra da frase
echo $frase2[1];

$frase = "Olá mundo, tudo bem?";
$palavras = explode(" ", $frase);
foreach ($palavras as &$tags) {
/    echo "<a href=\"busca.php?tag=$tags\">$tags</a> <br><br>";
}
*/

$texto = "texto todo do html que voce abriu";
$pesquisa = "do html";
$handle = explode($pesquisa, $texto);
if(isset($handle[1])){
echo "achou -> ".$handle[1];
}else{
echo "nao achou -> ".$handle[1];
}

echo $handle[1]."<br>";
echo $handle[2]."<br>";
echo $handle[3]."<br>";
echo $handle[4]."<br>";
echo isset($handle[1])."<br>";
?>
