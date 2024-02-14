<?


//cria a array com todas as frases
$frase[] = "Don't run to the gym";
$frase[] = "Don't call 911";
$frase[] = "Don't go back";


//sorteia uma frase
// o srand melhora o sorteio ;-)
srand ((double) microtime() * 1000000);
$sorteio = rand(0, count($frase));


$frase_do_dia = $frase[$sorteio];


//imprime
echo "$frase_do_dia
Keep Walking
Jonny Walker
Red Lable";


?>

