<?
/*
 ----------------------------------------------------
 Desenvolvido por...: Kemper Alves de Castro Carlos
 Programador........: Edson de Araujo
 Finalidade.........: Testar Desempenho da Rede
 Criado em Data.....: 23/09/2010
 Ultima Atualização : 23/09/2010 

 DEUS SEJA LOUVADO
 ----------------------------------------------------
*/

$prefixo="Kb/s";
$velo=$velocidade;
$sufixo="Discada = ";

if ($velo>8192)
{
   $scala=8192*2;
   $ref=1024;
   $sufixo="ADSL 1Mb = ";
}
if ($velo<=8192)
{
   $scala=8192;
   $ref=1024;
   $sufixo="ADSL 1Mb = ";
}
if ($velo<=1024)
{
   $scala=1024;
   $ref=512;
   $sufixo="ADSL 512 = ";
}
if ($velo<=512)
{
   $scala=512;
   $ref=128;
   $sufixo="ADSL 128 = ";
}
if ($velo<=256)
{
   $scala=256;
   $sufixo="Discada = ";
   $ref=56;
}

if ($velocidade>=1024)
{
   $velocidade=$velocidade/1024;
   $prefixo="Mb/s";
}

if ($ref>1024)
{
   $ref=number_format($ref/1024, 0, ",", ".");
   $sufixo="ADSL 1Mb = ";
}
else
{
   $prefixoref="Kb/s";
}

$im=imagecreate(300, 300);
imagecolorallocate($im, 255, 255, 255);

$line_color=imagecolorallocate($im, 0, 40, 110);
$text_color=imagecolorallocate($im, 0, 40, 160);
$bar_color=imagecolorallocate($im, 0, 255, 0);
$grid_color=imagecolorallocate($im, 240, 240, 240);

for ($i=10; $i<$scala; $i+=$scala/100)
{
   imageline($im, ((290/$scala)*$i)+10, 30, ((290/$scala)*$i)+10, 290, $grid_color);
}

imagestring($im, 5, 70, 1, "Teste de Desempenho", $text_color);
imagestring($im, 2, 12, 16, "Teste efetuado em: ".date("d/m/Y g:i:s"), $text_color);
barra(2, $im, $bar_color, "$sufixo$ref$prefixoref", $ref, $scala);
barra(1, $im, $bar_color, "Sua conexão: ".number_format($velo, 0, ",", ".").$prefixo, $velo, $scala);

imageline($im, 10, 20, 10, 290, $line_color);
imageline($im, 10, 290, 290, 290, $line_color);

header("Content-type: image/png");
imagepng($im);

function barra($local, $im, $cor, $texto, $speed, $escala)
{
   if ($local==1)
   {
      $y1=50;
   }
   else
   {
      $y1=150;
   }
   
   imagefilledrectangle($im, 10, $y1, (290/$escala*$speed), $y1+70, $cor);
   imagestring($im, 3, 11, $y1-12, $texto, imagecolorallocate($im,0,0,0));
}
?> 