<?php

/**
 * @author holodek
 * @copyright 2010
 */


$nick = $_SESSION["vc"];
$abrir = fopen("usuarios/$nick.txt","w");
fwrite($abrir,"$_GET[nome]");
fclose($abrir);

echo "

  <select name='saborx' value='Escolha o Sabor'>".
  
  $programa = trim('Todos,'.$linha[6]);
  $array    = explode(',', $programa);
  
  for ($si = 0; $si < strlen($programa); $si++){
  
       if (!empty($array[$si])){
       	
              echo "<option value='" . $array[$si] . "'>". $array[$si] ." </option>";
              
       }else{
       	   break;
       }
  }
    
  $si = 0;

  echo "</select>";



while (false !== ($file = readdir($handle))) {
if ($file != "." && $file != "..") {
	
echo "<select name='para' value='Todos'>";
	
echo "<option value='".basename("$file",".txt"). "'>" . basename("$file",".txt")." </option>";


}
       }


?>