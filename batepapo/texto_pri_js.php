<?php

/**
 * @author holodek
 * @copyright 2010
 */



?>
<script language="Javascript"> 
<!-- 
 // Toca o Som & Chama a Janela :) 
 function AlertError() {  
  // De preferencia em formato MIDI ou WAV. 
  document.write('<embed src="despertador.wav" autostart="true" hidden="true">'); 
  // Abre a Janela Forcadamente 
  window.self.focus(); 
 } 
//--> 

//  window.self.focus(); 

</script>

<?

	$consulta2  = "SELECT * FROM messenger WHERE destino = '$nick' ORDER BY id ASC";
	
	$resultado2 = @mysql_query($consulta2);
	
	$row2 = @mysql_fetch_array($resultado2);
	
	$id2       = @$row2["id"];
	$origem    = @$row2["origem"];
	$destino   = @$row2["destino"];
	$data      = @$row2["data"];
	$hora      = @$row2["hora"];
	$mensagem  = trim(@$row2["texto"]);

	if (!empty($destino)){
		?>	
		<script>		

		 document.write('<embed src="despertador.wav" autostart="true" hidden="true">'); 
		 window.self.focus(); 

		</script>
	    <?
	    
//	    if ($on_line != 'ON'){
	    	
	        $consulta2 = "DELETE FROM messenger WHERE id = '$id2'";
			
		    @mysql_query($consulta2, $link);
//        }
	}	
?>

<script language=JavaScript>
function rolar() {
    scrollTo(0,100000);
  setTimeout("rolar()", 100);
}

</script>
<body onload="rolar();" bgcolor="#CCCCFF">
<?php
$sala2 = $nome_txt.date("dmY");
$banco = "privado/$sala2.txt";

if(file_exists($banco))
{
$arquivo = fopen($banco,"r");
$while = fread($arquivo,filesize($banco));
if($while == "0"){ }else{echo"$while";}
fclose($arquivo);

//echo "<b>On-line!!!</b><br>";
echo "<script>document.getElementById('mensagem2')</script>"

?>


<?
}
else
{
echo "<b>".strtolower($nome)."</b> Esta Off-line!!!";
}
?>
</body>

</script>