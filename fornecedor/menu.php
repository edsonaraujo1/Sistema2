<?php
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Index do Sistema
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/


// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../config.php");

// include("../logar.php");

$nome3 = strtoupper($_SESSION["nome_log"]);

?>

<script>
x=screen.width; 
if (x != 1024)
{
//	alert("ATENÇÃO altere resolução para 1024 x 768 !!!");
//	window.location = "error.php";
}
</script>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

<!--
<div style="Z-INDEX: 500; LEFT: 00px; WIDTH: 616px; POSITION: absolute; TOP: 157px; HEIGHT: 19px">

<IFRAME src="../info/informes2.php" width="1" height="1" scrolling="no" frameborder="0" align="left"></IFRAME>

</div>

-->

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->

    A:link,a:active,a:visited{ color:#000000; text-decoration:none; }
    A:hover{ color:#FF3333; text-decoration:none; }
	A:visited {color:#0000cc;}
	A:active {color:#0000cc;}

	A.clase1:visited {color:#000000;}
	A.clase1:active {color:#000000;} 
	A.clase1:link {color:#000000}
	A.clase1:hover {color:#FFFFFF}

</style>	

</HEAD>

<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0>
</html>


<?php
// Saldação ao usuario

$hora = date("H"); //Extrai apenas a hora
if ($hora >= 0 and $hora < 6) {
 $situa_1 = "Boa Madrugada";
 $sol_1   = "../imagens/noite.bmp";
 } elseif ($hora >=6 and $hora <12) {
 $situa_1 = "Bom Dia";
 $sol_1   = "../imagens/dia.bmp";
 } elseif ($hora >=12 and $hora <19) {
 $situa_1 = "Boa Tarde";
 $sol_1   = "../imagens/dia.bmp";
 }else {
 $situa_1 = "Boa Noite";
 $sol_1   = "../imagens/noite.bmp";
}

setlocale(LC_TIME,"portuguese");

$dia_semana  = strftime("%A");
$dia_sem_mes = strftime("%B");

// Converte Dia da Semana Ingles Portugues
if (strftime("%A") == "Sunday")   { $dia_semana = "Domingo"; }
if (strftime("%A") == "Monday")   { $dia_semana = "Segunda-feira"; }
if (strftime("%A") == "Tuesday")  { $dia_semana = "Terça-feira"; }
if (strftime("%A") == "Wednesday"){ $dia_semana = "Quarta-feira"; }
if (strftime("%A") == "Thursday") { $dia_semana = "Quinta-feira"; }
if (strftime("%A") == "Friday")   { $dia_semana = "Sexta-feira"; }
if (strftime("%A") == "Saturday") { $dia_semana = "Sabado"; }

// Converte Meses do Ano Ingles Portugues
if (strftime("%B") == "January")   { $dia_sem_mes = "Janeiro"; }
if (strftime("%B") == "February")  { $dia_sem_mes = "Fevereiro"; }
if (strftime("%B") == "March")     { $dia_sem_mes = "Março"; }
if (strftime("%B") == "April")     { $dia_sem_mes = "Abril"; }
if (strftime("%B") == "May")       { $dia_sem_mes = "Maio"; }
if (strftime("%B") == "June")      { $dia_sem_mes = "Junho"; }
if (strftime("%B") == "July")      { $dia_sem_mes = "Julho"; }
if (strftime("%B") == "August")    { $dia_sem_mes = "Agosto"; }
if (strftime("%B") == "September") { $dia_sem_mes = "Setembro"; }
if (strftime("%B") == "October")   { $dia_sem_mes = "Outubro"; }
if (strftime("%B") == "November")  { $dia_sem_mes = "Novembro"; }
if (strftime("%B") == "December")  { $dia_sem_mes = "Dezembro"; }

$bomdia = $situa_1." Seja Bem vindo, ".$nome3." hoje e  ".$dia_semana. strftime(", %d de")." ".$dia_sem_mes.strftime("  de %Y"); 

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


  //--- Informa quantos usuarios estao conectados ao sistema
  $timestamp=time(); 
  $timeout=time()-100; // valor em segundos 
  $result=@mysql_db_query($db, "INSERT INTO useronline VALUES ('$timestamp','$REMOTE_ADDR','$PHP_SELF')");
//  $result=mysql_db_query($db, "DELETE FROM useronline WHERE timestamp<$timeout"); 
  $result=@mysql_db_query($db, "SELECT DISTINCT ip FROM useronline"); 
  $usuarios=@mysql_num_rows($result); 
//  @mysql_close();   

    $RES       = @mysql_db_query($db, "SELECT * FROM useronline"); 
    $usuarios  = @mysql_num_rows($RES);


?>
<html>

<div id="Label71_outer" style="Z-INDEX: 7; LEFT: 0px; WIDTH: 616px; POSITION: absolute; TOP: 0px; HEIGHT: 19px">
<?php
if (!empty($usuarios)){
?>
<font color="#4682B4" face="Ariel" size="2">&nbsp;&nbsp;<?php echo $usuarios ?> usuário(s) on-line</font>
<?php
}
?>   
</div>
<div style="Z-INDEX: 500; LEFT: 0px; WIDTH: 616px; POSITION: absolute; TOP: 7px; HEIGHT: 20px">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../imagens/kitt.GIF" height="3" width="62" />
</div>


<div align="center">

<div id="Label71_outer" style="Z-INDEX: 7; LEFT: 132px; WIDTH: 716px; POSITION: absolute; TOP: 4px; HEIGHT: 19px">
<div id="Label71" style=" font-family: Arial; font-size: 16px; color: #000000; height:19px; width:716px;"><img id="Image99" src="<?php echo $sol_1 ?>"  width="20"  height="17"  border="0"  />&nbsp;&nbsp;<b><i><?php echo $bomdia ?></i></b></div>
</div>
</div>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<table  width="1000"   style="height:19px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">

<div id="Image1_outer" style="Z-INDEX: 1; LEFT: 107px; WIDTH: 95px; POSITION: absolute; TOP: 26px; HEIGHT: 25px">
<div id="Image1_container" style=" width: 95;  height: 25; " ><img id="Image1" src="../imagens/menu.png"  width="95"  height="25"  border="0"       /></div>
</div>
<div id="Image2_outer" style="Z-INDEX: 2; LEFT: 204px; WIDTH: 95px; POSITION: absolute; TOP: 26px; HEIGHT: 25px">
<div id="Image2_container" style=" width: 95;  height: 25; " ><img id="Image2" src="../imagens/menu.png"  width="95"  height="25"  border="0"       /></div>
</div>
<div id="Image3_outer" style="Z-INDEX: 3; LEFT: 301px; WIDTH: 95px; POSITION: absolute; TOP: 26px; HEIGHT: 25px">
<div id="Image3_container" style=" width: 95;  height: 25; overflow: hidden;" ><img id="Image3" src="../imagens/menu.png"  width="95"  height="25"  border="0"       /></div>
</div>
<div id="Image4_outer" style="Z-INDEX: 4; LEFT: 398px; WIDTH: 95px; POSITION: absolute; TOP: 26px; HEIGHT: 25px">
<div id="Image4_container" style=" width: 95;  height: 25; overflow: hidden;" ><img id="Image4" src="../imagens/menu.png"  width="95"  height="25"  border="0"       /></div>
</div>
<div id="Image5_outer" style="Z-INDEX: 5; LEFT: 495px; WIDTH: 95px; POSITION: absolute; TOP: 26px; HEIGHT: 25px">
<div id="Image5_container" style=" width: 95;  height: 25; overflow: hidden;" ><img id="Image5" src="../imagens/menu.png"  width="95"  height="25"  border="0"       /></div>
</div>
<div id="Image6_outer" style="Z-INDEX: 6; LEFT: 592px; WIDTH: 95px; POSITION: absolute; TOP: 26px; HEIGHT: 25px">
<div id="Image6_container" style=" width: 95;  height: 25; overflow: hidden;" ><img id="Image6" src="../imagens/menu.png"  width="95"  height="25"  border="0"       /></div>
</div>
<div id="Image7_outer" style="Z-INDEX: 7; LEFT: 786px; WIDTH: 95px; POSITION: absolute; TOP: 26px; HEIGHT: 25px">
<div id="Image7_container" style=" width: 95;  height: 25; overflow: hidden;" ><img id="Image7" src="../imagens/menu.png"  width="95"  height="25"  border="0"       /></div>
</div>
<div id="Image8_outer" style="Z-INDEX: 16; LEFT: 689px; WIDTH: 95px; POSITION: absolute; TOP: 26px; HEIGHT: 25px">
<div id="Image8_container" style=" width: 95;  height: 25; overflow: hidden;" ><img id="Image8" src="../imagens/menu.png"  width="95"  height="25"  border="0"       /></div>
</div>
<div id="Label1_outer" style="Z-INDEX: 8; LEFT: 113px; WIDTH: 85px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label1" style=" font-family: Arial; font-size: 13px; font-weight: bold; height:19px;width:85px;"  align="Center"   >Cadastros</div>
</div>
<div id="Label2_outer" style="Z-INDEX: 9; LEFT: 210px; WIDTH: 85px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label2" style=" font-family: Arial; font-size: 13px; font-weight: bold; height:19px;width:85px;"  align="Center"   ><b>Contribuição</b></div>
</div>
<div id="Label3_outer" style="Z-INDEX: 10; LEFT: 307px; WIDTH: 85px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label3" style=" font-family: Arial; font-size: 13px; font-weight: bold; height:19px;width:85px;"  align="Center"   >Relatórios</div>
</div>
<div id="Label4_outer" style="Z-INDEX: 11; LEFT: 404px; WIDTH: 85px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label4" style=" font-family: Arial; font-size: 13px; font-weight: bold; height:19px;width:85px;"  align="Center"   >Saúde</div>
</div>
<div id="Label5_outer" style="Z-INDEX: 12; LEFT: 501px; WIDTH: 85px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label5" style=" font-family: Arial; font-size: 13px; font-weight: bold; height:19px;width:85px;"  align="Center"   >Caixa</div>
</div>
<div id="Label6_outer" style="Z-INDEX: 13; LEFT: 598px; WIDTH: 85px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label6" style=" font-family: Arial; font-size: 13px; font-weight: bold; height:19px;width:85px;"  align="Center"   >Juridico</div>
</div>
<div id="Label7_outer" style="Z-INDEX: 14; LEFT: 792px; WIDTH: 85px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label7" style=" font-family: Arial; font-size: 13px; font-weight: bold; height:19px;width:85px;"  align="Center"   >Operador</div>
</div>
<div id="Label9_outer" style="Z-INDEX: 17; LEFT: 695px; WIDTH: 85px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label9" style=" font-family: Arial; font-size: 13px; font-weight: bold; height:19px;width:85px;"  align="Center"   >Jornalismo</div>
</div>
<div id="Label8_outer" style="Z-INDEX: 15; LEFT: 104px; WIDTH: 232px; POSITION: absolute; TOP: 51px; HEIGHT: 8px">
<div id="Label8" style=" font-family: Verdana; font-size: 8px;  height:8px;width:232px;"   ><b><?php echo "Atualizado em ".$atuali_za ?></b></div>
</div>

</td></tr></table>
</form></body>

</html>
