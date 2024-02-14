<?php

/**
 * @author holodek
 * @copyright 2011
 */





//echo $valor_m."<br>";

fbarcode($valor_m); // Linha de Exemplo

function fbarcode($valor){

$fino = 2 ;
$largo = 6 ;
$altura = 40 ;

  $barcodes[0] = "00110" ;
  $barcodes[1] = "10001" ;
  $barcodes[2] = "01001" ;
  $barcodes[3] = "11000" ;
  $barcodes[4] = "00101" ;
  $barcodes[5] = "10100" ;
  $barcodes[6] = "01100" ;
  $barcodes[7] = "00011" ;
  $barcodes[8] = "10010" ;
  $barcodes[9] = "01010" ;
  for($f1=9;$f1>=0;$f1--){
    for($f2=9;$f2>=0;$f2--){
      $f = ($f1 * 10) + $f2 ;
      $texto = "" ;
      for($i=1;$i<6;$i++){
        $texto .=  substr($barcodes[$f1],($i-1),1) . substr($barcodes[$f2],($i-1),1);
      }
      $barcodes[$f] = $texto;
    }
  }


//Desenho da barra


//Guarda inicial
?>
<html>
<head>
<title>Sysmp - Sistemas Web</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>


<body bgcolor="#FFFFFF" text="#000000">
<p><font face="Arial, Helvetica, sans-serif" size="2"><b></b><br><br>
  <img src=p.gif width=<?=$fino?> height=<?=$altura?> border=0><img
src=b.gif width=<?=$fino?> height=<?=$altura?> border=0><img
src=p.gif width=<?=$fino?> height=<?=$altura?> border=0><img
src=b.gif width=<?=$fino?> height=<?=$altura?> border=0><img
<?
$texto = $valor ;
if((strlen($texto) % 2) <> 0){
	$texto = "0" . $texto;
}

// Draw dos dados
while (strlen($texto) > 0) {
  $i = round(esquerda($texto,2));
  $texto = direita($texto,strlen($texto)-2);
  $f = $barcodes[$i];
  for($i=1;$i<11;$i+=2){
    if (substr($f,($i-1),1) == "0") {
      $f1 = $fino ;
    }else{
      $f1 = $largo ;
    }
?>
    src=p.gif width=<?=$f1?> height=<?=$altura?> border=0><img
<?
    if (substr($f,$i,1) == "0") {
      $f2 = $fino ;
    }else{
      $f2 = $largo ;
    }
?>
    src=b.gif width=<?=$f2?> height=<?=$altura?> border=0><img
<?
  }
}

// Draw guarda final
?>
src=p.gif width=<?=$largo?> height=<?=$altura?> border=0><img
src=b.gif width=<?=$fino?> height=<?=$altura?> border=0><img
src=p.gif width=<?=$fino?> height=<?=$altura?> border=0>
  <?
} //Fim da função

function esquerda($entra,$comp){
	return substr($entra,0,$comp);
}

function direita($entra,$comp){
	return substr($entra,strlen($entra)-$comp,$comp);
}

?>
</p>
<form name="form1" method="post" action="">
  <font face="Arial, Helvetica, sans-serif" size="2"><b>Codigo Funcionario:</b></font><br>
  <input type="text" name="valor" maxlength="10" size="10" value="<? echo $valor ?>">
  <input type="submit" name="Submit" value="Gerar">
</form>

</body>
</html>
