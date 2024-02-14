<?
include("../config.php");

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


// Resgata a Sessao
session_start();
$nick = strtolower($_SESSION["log_name_c"]);

$nome     = strtolower($_SESSION['Privado']);

$nome_txt = strtolower($_SESSION["nome_txt"]);


$consulta_x  = "SELECT * FROM tt_ser_01 WHERE login = '$nick'";

$resultado_x = @mysql_query($consulta_x);

$row_x = @mysql_fetch_array($resultado_x);

$id        = @$row_x["id"];
$on_line   = @$row_x["messenger"];

if ($chamar_x == 1){

?>
<script>

if ((!document.all) && (!document.hasFocus())) {
//if (document.form.mensagem2.value != '') && (!document.hasFocus())) {

}
</script>
<?
}
?>

<head>
<title>Bate-Papo</title>
<!-- <meta http-equiv="refresh" content="15"> -->
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">   
        #scroll { border: 1px solid black; height: 258px; width: 358px; overflow: auto }   

body { background-image: url(<?="../".$logo_sis;?>);
       background-attachment: fixed }

</style>

    
</head>

<body onload="setTimeout('window.location.reload(true)',15000)" >

<div id="scroll" style="background-color: #FFFFFF;">   

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

	$consulta2  = "SELECT * FROM messenger WHERE destino = '$nick' and origem = '$nome' ORDER BY id ASC";
	
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

<?php
$sala2    = strtolower($nome_txt.$nome.date("dmY"));
$sala2_pr = strtolower($nome_txt.$nick.date("dmY"));
$banco    = "privado/$sala2.txt";
$banco_pr = "privado/$sala2_pr.txt";

if(file_exists($banco_pr))
{
//$arquivo = fopen($banco,"r");
//$while = fread($arquivo,filesize($banco));
//if($while == "0"){ }else{echo"$while";}
//fclose($arquivo);

// Arquivo proprio
$arquivo_pr = fopen($banco_pr,"r");
$while_pr = fread($arquivo_pr,filesize($banco_pr));
if($while_pr == "0"){ }else{echo"$while_pr";}
fclose($arquivo_pr);

//echo "<b>On-line!!!</b><br>";
echo "<script>document.getElementById('mensagem2')</script>"

?>


<?
}
else
{

// Arquivo proprio
//$arquivo_pr = fopen($banco_pr,"r");
//$while_pr = fread($arquivo_pr,filesize($banco_pr));
//if($while_pr == "0"){ }else{echo"$while_pr";}
//fclose($arquivo_pr);

echo "<b>".strtolower($nome)."</b> Esta Off-line!!!";
}
?>
</div>

</body>
<script type="text/javascript">   
    var div = document.getElementById("scroll");   
    div.scrollTop = div.scrollHeight*div.scrollHeight;   
</script>   
