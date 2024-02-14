<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Insert Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

session_cache_expire(180); //5 minutos por exemplo...

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("CADATENDI_SOC");

if ($deixar == "SIM"){

$log_ssoc = $nome3;
$hora = date("d/m/Y"); 

?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

</body>
</html>

<?

$menssagens = "* * * Incluido * * *";

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$nome3a = strtolower($nome3);

// Abre Tabela Tenporaria

$consulta0  = "SELECT * FROM $nome3a WHERE Nome1 = '$nome3a'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$Edit1      = trim(strtoupper(retirar_carac3(@$row0["Edit1"])));
$Edit2		= trim(strtoupper(retirar_carac3(@$row0["Edit2"])));
$Edit3		= trim(strtoupper(retirar_carac3(@$row0["Edit3"])));
$Edit4		= trim(strtoupper(retirar_carac3(@$row0["Edit4"])));
$Edit5		= trim(strtoupper(retirar_carac3(@$row0["Edit5"])));
$Edit6		= trim(strtoupper(retirar_carac3(@$row0["Edit6"])));
$Edit7		= trim(strtoupper(retirar_carac3(@$row0["Edit7"])));
$Edit8		= trim(strtoupper(retirar_carac3(@$row0["Edit8"])));
$Edit9		= trim(strtoupper(retirar_carac3(@$row0["Edit9"])));
$Edit10	    = trim(strtoupper(retirar_carac3(@$row0["Edit10"])));
$Edit11	    = trim(strtoupper(retirar_carac3(@$row0["Edit11"])));
$Edit12	    = trim(strtoupper(retirar_carac3(@$row0["Edit12"])));
$Edit13	    = trim(strtoupper(retirar_carac3(@$row0["Edit13"])));
$Edit14	    = trim(strtoupper(retirar_carac3(@$row0["Edit14"])));
$Edit15	    = trim(retirar_carac3(@$row0["memo1"]));
$alerta_1   = trim(strtoupper(retirar_carac3(@$row0["mensage1"])));
$nome_do_edif = trim(strtoupper(retirar_carac3(@$row0["mensage2"])));
$nome_da_adms = trim(strtoupper(retirar_carac3(@$row0["mensage3"])));
$id           = @$row0["mensage6"];

if ($Edit1  == '.'){	$Edit1  = '';}
if ($Edit2  == '.'){	$Edit2  = '';}
if ($Edit3  == '.'){	$Edit3  = '';}
if ($Edit4  == '.'){	$Edit4  = '';}
if ($Edit5  == '.'){	$Edit5  = '';}
if ($Edit6  == '.'){	$Edit6  = '';}
if ($Edit7  == '.'){	$Edit7  = '';}
if ($Edit8  == '.'){	$Edit8  = '';}
if ($Edit9  == '.'){	$Edit9  = '';}
if ($Edit10 == '.'){	$Edit10 = '';}
if ($Edit11 == '.'){	$Edit11 = '';}
if ($Edit12 == '.'){	$Edit12 = '';}
if ($Edit13 == '.'){	$Edit13 = '';}
if ($Edit14 == '.'){	$Edit14 = '';}
if ($Edit15 == '.'){	$Edit15 = '';}


if(strlen($Edit6)<=0){
  $Edit6   = 0; 	
}
if(strlen($Edit11)<=0){
  $Edit11   = 0; 	
}
if(strlen($Edit13)<=0){
  $Edit13   = 0; 	
}

$consulta01  = "SELECT * FROM atendimento_soc WHERE CODP = '$Edit6'";

$resultado01 = @mysql_query($consulta01);

$row01 = @mysql_fetch_array($resultado01);

$id    = @$row01["id"];

if (!empty($id)){
	
	echo ("
			
		     <br>
		     <br>
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Socios ja consta no Atendimento !!! ***</b>
		     <table align=center>
		     <form method='POST' action='cadastro.php?Cod_xx=$id'>
		     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
             exit;
	
// nao incluir codigo ja existe

}else{
	
     // retorna uma pesquisa

	 $consulta02  = "SELECT * FROM atendimento_soc WHERE CPF = '$Edit5'";

	 $resultado02 = @mysql_query($consulta02);

	 $row02 = @mysql_fetch_array($resultado02);

	 $id    = @$row02["id"];
     $cgc   = @$row02["CPF"];
     
	 if (!empty($cgc)){
		
	 	 echo ("
				
			     <br>
			     <br>
			     
				 <div align=center>
			
			     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
			     <tr>
			     <td>
			     <font face=arial><b>*** CNPJ ja consta no Cadastro !!! ***</b>
			     <table align=center>
			     <form method='POST' action='cadastro.php?Cod_xx=$id'>
			     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
			     </form> 
			     </table>
			     </td>
			     </tr>
			     </table>
			     </div>");
	             exit;
		
	// nao incluir codigo ja existe
	
	}else{

$consulta = "INSERT INTO atendimento_soc  (COD,
                                     DAT2,
								     DATINSC,
								     RGASSOC,
								     CPF,
								     CODP,
								     CATEGORIA,
								     NOMEASSOC,
							 	  	 ENDRESID,
							 		 CEPRES,
									 CODEDIF,
									 CNPJ,
									 ADMS,
									 CNPJ2,
									 OBS,
									 NOMEEDIF,
									 NOMEADMS)
                VALUES
                                   ('$Edit1',
								    '$Edit2',
									'$Edit3',
									'$Edit4',
									'$Edit5',
									'$Edit6',
									'$Edit7',
									'$Edit8',
									'$Edit9',
									'$Edit10',
									'$Edit11',
									'$Edit12',
									'$Edit13',
									'$Edit14',
									'$Edit15',
									'$nome_do_edif',
									'$nome_da_adms')";
	
		@mysql_query($consulta, $link) or
		
		die("
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Falha na Inclusão !!! ***</b>
		     <table align=center>
		     <form method='POST' action='cadastro.php'>
		     <td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
}
}
     
			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagens."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);
     

// Elimina Tabela temp
$add0 = "DROP TABLE `$nome3a`";
@mysql_query($add0, $link);

// Salva Secao
session_start();
$_SESSION['navega'] = $Edit1;
     
?>

<html>
<body  style=" margin-left: 0px;  margin-top: 21px;  margin-right: 0px;  margin-bottom: 0px; ">

<?
include("layout.php");
?>

<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 495px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php?cod_5=<?=$Edit1;?>">
          <td><input type=image name="Voltar" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>
</body>
</html>

<?

}else{
	
include("enaaurlnp.php");
	
}
?>

<?
/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac3($var){

$var = ereg_replace("[ÁÀÂÃ]",      "A",$var);
$var = ereg_replace("[áàâãª]",     "a",$var);
$var = ereg_replace("[ÉÈÊ]",       "E",$var);
$var = ereg_replace("[éèê]",       "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",      "O",$var);
$var = ereg_replace("[óòôõº]",     "o",$var);
$var = ereg_replace("[ÚÙÛ]",       "U",$var);
$var = ereg_replace("[úùû]",       "u",$var);
$var = ereg_replace("[?*#'´`!$%¨]"," ",$var);
$var = str_replace("Ç",            "C",$var);
$var = str_replace("ç",            "c",$var);

return($var);
}
?>