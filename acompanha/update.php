<?php
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

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

$log_ssoc = $nome3;
$hora = date("d/m/Y"); 
$sexo = " ";
$campo1 = 'Alterado';
$campo2 = 0;

?>

<script language="JavaScript"><!--

document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
}
//-->
</script>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

<?php

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

$Edit1      = trim(strtoupper(retirar_carac2(@$row0["Edit1"])));
$Edit2		= trim(strtoupper(retirar_carac2(@$row0["Edit2"])));
$Edit3		= trim(strtoupper(retirar_carac2(@$row0["Edit3"])));
$Edit4		= trim(strtoupper(retirar_carac2(@$row0["Edit4"])));
$Edit5		= trim(strtoupper(retirar_carac2(@$row0["Edit5"])));
$Edit6		= trim(strtoupper(retirar_carac2(@$row0["Edit6"])));
$Edit7		= trim(strtoupper(retirar_carac2(@$row0["Edit7"])));
$Edit8		= trim(strtoupper(retirar_carac2(@$row0["Edit8"])));
$Edit9		= trim(strtoupper(retirar_carac2(@$row0["Edit9"])));
$Edit10	    = trim(strtoupper(retirar_carac2(@$row0["Edit10"])));
$Edit11	    = trim(strtoupper(retirar_carac2(@$row0["Edit11"])));
$Edit12	    = trim(strtoupper(retirar_carac2(@$row0["Edit12"])));
$Edit13	    = trim(strtoupper(retirar_carac2(@$row0["Edit13"])));
$Edit14	    = trim(strtoupper(retirar_carac2(@$row0["Edit14"])));
$Edit15	    = trim(strtoupper(retirar_carac2(@$row0["Edit15"])));
$Edit16	    = trim(strtoupper(retirar_carac2(@$row0["Edit16"])));
$Edit17	    = trim(strtoupper(retirar_carac2(@$row0["Edit17"])));
$Edit18	    = trim(strtoupper(retirar_carac2(@$row0["Edit18"])));
$Edit19	    = trim(strtoupper(retirar_carac2(@$row0["Edit19"])));
$Edit20	    = trim(strtoupper(retirar_carac2(@$row0["Edit20"])));
$Edit21	    = trim(strtoupper(retirar_carac2(@$row0["Edit21"])));
$Edit22	    = trim(strtoupper(retirar_carac2(@$row0["Edit22"])));
$Edit23	    = trim(strtoupper(retirar_carac2(@$row0["Edit23"])));
$Edit24	    = trim(strtoupper(retirar_carac2(@$row0["Edit24"])));
$Edit25	    = trim(strtoupper(retirar_carac2(@$row0["Edit25"])));
$Edit26	    = trim(strtoupper(retirar_carac2(@$row0["Edit26"])));
$Edit27	    = trim(strtoupper(retirar_carac2(@$row0["Edit27"])));
$Edit28	    = trim(strtoupper(retirar_carac2(@$row0["Edit28"])));
$Edit29	    = trim(strtoupper(retirar_carac2(@$row0["memo1"])));
$Edit30	    = trim(strtoupper(retirar_carac2(@$row0["Edit30"])));
$alerta_1   = trim(strtoupper(retirar_carac2(@$row0["mensage1"])));
$nome_adm   = trim(strtoupper(retirar_carac2(@$row0["mensage3"])));
$id         = trim(strtoupper(retirar_carac2(@$row0["mensage6"])));

$menssagens = "* * * Alterado * * *";

if ($Edit1  == '.'){	$Edit1  = 0;}
if ($Edit2  == '.'){	$Edit2  = '';}
if ($Edit3  == '.'){	$Edit3  = '';}
if ($Edit4  == '.'){	$Edit4  = '';}
if ($Edit5  == '.'){	$Edit5  = '';}
if ($Edit6  == '.'){	$Edit6  = '';}
if ($Edit7  == '.'){	$Edit7  = '';}
if ($Edit8  == '.'){	$Edit8  = '';}
if ($Edit9  == '.'){	$Edit9  = '';}
if ($Edit10 == '.'){	$Edit10 = 0;}
if ($Edit11 == '.'){	$Edit11 = '';}
if ($Edit12 == '.'){	$Edit12 = '';}
if ($Edit13 == '.'){	$Edit13 = '';}
if ($Edit14 == '.'){	$Edit14 = '';}
if ($Edit15 == '.'){	$Edit15 = '';}
if ($Edit16 == '.'){	$Edit16 = 0;}
if ($Edit17 == '.'){	$Edit17 = '';}
if ($Edit18 == '.'){	$Edit18 = 0;}
if ($Edit19 == '.'){	$Edit19 = 0;}
if ($Edit20 == '.'){	$Edit20 = '';}
if ($Edit21 == '.'){	$Edit21 = '';}
if ($Edit22 == '.'){	$Edit22 = '';}
if ($Edit23 == '.'){	$Edit23 = '';}
if ($Edit24 == '.'){	$Edit24 = '';}
if ($Edit25 == '.'){	$Edit25 = 0;}
if ($Edit26 == '.'){	$Edit26 = '';}
if ($Edit27 == '.'){	$Edit27 = '';}
if ($Edit28 == '.'){	$Edit28 = '';}
if ($Edit29 == '.'){	$Edit29 = '';}
if ($Edit30 == '.'){	$Edit30 = '';}

if(strlen($Edit1)<=0){
  $Edit1 = 0;
}
if($Edit1 == "."){
  $Edit1 = 0; 	
}
if(strlen($Edit10)<=0){
  $Edit10 = 0.00; 	
}
if($Edit10 == "."){
  $Edit10 = 0.00; 	
}
if(strlen($Edit11)<=0){
  $Edit11 = 0.00; 	
}
if($Edit11 == "."){
  $Edit11 = 0.00; 	
}
if(strlen($Edit18)<=0){
  $Edit18 = 0.00; 	
}
if($Edit18 == "."){
  $Edit18 = 0.00; 	
}
if(strlen($Edit19)<=0){
  $Edit19 = 0.00; 	
}
if($Edit19 == "."){
  $Edit19 = 0.00; 	
}
if(strlen($Edit25)<=0){
  $Edit25 = 0.00; 	
}
if($Edit25 == "."){
  $Edit25 = 0.00; 	
}

// retorna uma pesquisa

$consulta = "UPDATE acompa  SET N_SOCIO   = '$Edit1',
								RG        = '$Edit2',
								CIC       = '$Edit3',
								CART_TRAB = '$Edit4',
								NOME_SOC  = '$Edit5',
								END_SOC   = '$Edit6',
								CEP_SOC   = '$Edit7',
								EST_SOC   = '$Edit8',
								FONE_SOC  = '$Edit9',
								N_EDIF    = '$Edit10',
								NOME_EDI  = '$Edit11',
								END_EDI   = '$Edit12',
								CEP_EDI   = '$Edit13',
								FONE_EDI  = '$Edit14',
								OBJETO    = '$Edit15',
								JCJ       = '$Edit16',
								PROC_N    = '$Edit17',
								ANO_N     = '$Edit18',
								N_ADV_1   = '$Edit19',
								TRT       = '$Edit20',
								EM_TRT    = '$Edit21',
								NO_AD_1   = '$Edit22',
								TST       = '$Edit23',
								EM_TST    = '$Edit24',
								N_ADV_2   = '$Edit25',
								SOLUCAO   = '$Edit26',
								SOL_EM    = '$Edit27',
								NO_AD_2   = '$Edit28',
								ASSUNTO   = '$Edit29',
								ASSU_1    = '$Edit30' WHERE id = '$Cod_P'";

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
     <form method='POST' action='cadastro.php?cod_1=$id'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
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

$aco1       = @$row3["aco1"];
$aco2       = @$row3["aco2"];
$aco3       = @$row3["aco3"];

?>

<html>


<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style>

<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 490px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php?cod_1=<?php echo $id ?>">
          <td><input type=image name="Voltar" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>
	
 
<?php
include("layout.php");
?>

</body>
</html>
<?php

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac2($var){

$var = @ereg_replace("[ÁÀÂÃ]",      "A",$var);
$var = @ereg_replace("[áàâãª]",     "a",$var);
$var = @ereg_replace("[ÉÈÊ]",       "E",$var);
$var = @ereg_replace("[éèê]",       "e",$var);
$var = @ereg_replace("[ÓÒÔÕ]",      "O",$var);
$var = @ereg_replace("[óòôõº]",     "o",$var);
$var = @ereg_replace("[ÚÙÛ]",       "U",$var);
$var = @ereg_replace("[úùû]",       "u",$var);
$var = @ereg_replace("[?*#'´`!$%¨]"," ",$var);
$var = str_replace("Ç",            "C",$var);
$var = str_replace("ç",            "c",$var);

return($var);
}

?>
