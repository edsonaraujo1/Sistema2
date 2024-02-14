<?
include("../config.php");

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


// Resgata a Sessao
session_start();
$nick = strtolower($_SESSION["nome_log"]);

$nome     = $_SESSION['Privado'];

$nome_txt = $_SESSION["nome_txt"];


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
<meta http-equiv="refresh" content="15">
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

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

$while =  fread($arquivo,filesize($banco));
if($while == "0"){
	
	
}else{
	
	echo"$while";

}
fclose($arquivo);

//echo "<b>On-line!!!</b><br>";
//echo "<script>document.getElementById('mensagem2')</script>";
//$meu_tex = "<script>document.getElementById('mensagem2')</script>";

//echo"<textarea rows=10 cols=38>$banco</textarea>";
?>
<script>
//document.write("<textarea rows=3 name=mensagem2 cols=30 onfocus=this.className='anormal' onblur=this.className='normal'>$mensagem2</textarea>");
</script>
<?
}
else
{
echo "<b>".strtolower($nome)."</b> Esta Off-line!!!";
}
?>
</body>
