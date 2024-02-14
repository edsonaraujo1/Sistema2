<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Update Cadastro 
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

require("menu.php");

$log_ssoc = $nome3;
$hora = date("d/m/Y"); 
$sexo = " ";
$campo1 = 'Alterado';
$campo2 = 0;

?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>

<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);
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

// Abre Conexão com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Abre Tabela Tenporaria

$consulta0  = "SELECT * FROM $nome3 WHERE Nome1 = '$nome3'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$Edit1      = trim(strtoupper(retirar_carac4(@$row0["Edit1"])));
$Edit2		= trim(strtoupper(retirar_carac4(@$row0["Edit2"])));
$Edit3		= trim(strtoupper(retirar_carac4(@$row0["Edit3"])));
$Edit4		= trim(strtoupper(retirar_carac4(@$row0["Edit4"])));
$Edit5		= trim(strtoupper(retirar_carac4(@$row0["Edit5"])));
$Edit6		= trim(strtoupper(retirar_carac4(@$row0["Edit6"])));
$Edit7		= trim(strtoupper(retirar_carac4(@$row0["Edit7"])));
$Edit8		= trim(strtoupper(retirar_carac4(@$row0["Edit8"])));
$Edit9		= trim(strtoupper(retirar_carac4(@$row0["Edit9"])));
$Edit10	    = trim(strtoupper(retirar_carac4(@$row0["Edit10"])));
$Edit11	    = trim(strtoupper(retirar_carac4(@$row0["Edit11"])));
$Edit12	    = trim(strtoupper(retirar_carac4(@$row0["Edit12"])));
$Edit13	    = trim(strtoupper(retirar_carac4(@$row0["Edit13"])));
$Edit14	    = trim(strtoupper(retirar_carac4(@$row0["Edit14"])));
$Edit15	    = trim(retirar_carac4(@$row0["memo1"]));
$alerta_1   = trim(strtoupper(retirar_carac4(@$row0["mensage1"])));
$nome_do_edif = trim(strtoupper(retirar_carac4(@$row0["mensage2"])));
$nome_da_adms = trim(strtoupper(retirar_carac4(@$row0["mensage3"])));
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

$menssagens = "* * * Alterado * * *";

// retorna uma pesquisa

$consulta = "UPDATE oposicao3 SET  
                                   COD       = '$Edit1',
                                   DAT2      = '$Edit2',
                                   DATINSC   = '$Edit3',
                                   RGASSOC   = '$Edit4',
								   CPF       = '$Edit5',
								   CODP      = '$Edit6',
                                   CATEGORIA = '$Edit7',
								   NOMEASSOC = '$Edit8',
								   ENDRESID  = '$Edit9',
								   CEPRES    = '$Edit10',
                                   CODEDIF   = '$Edit11',
								   CNPJ      = '$Edit12',
								   ADMS      = '$Edit13',
								   CNPJ2     = '$Edit14',
                                   OBS       = '$Edit15',
								   NOMEEDIF  = '$nome_do_edif',
								   NOMEADMS  = '$nome_da_adms'  WHERE id = '$id'";


@mysql_query($consulta, $link) or


die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Alteração !!! ***</b>
     <table align=center>
     <form method='POST' action='cadastro.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagens."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);


// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = mysql_fetch_array($resultado3);

$opo1       = @$row3["opo1"];
$opo2       = @$row3["opo2"];
$opo3       = @$row3["opo3"];

?>

<html>
<body>
<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 480px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php?cod_5=<?=$Edit1;?>">
          <td><input type=image name="Voltar" src="imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>
	
 
<?
require("layout.php");
?>

</body>
</html>
<?

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac4($var){

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