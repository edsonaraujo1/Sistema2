<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<link rel="stylesheet" href="menu.css" type="text/css"/>

<?php
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Acesso ao Sistema
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/
include('config.php');
?>

<style type="text/css" media="screen"> 

body { background-image: url(<?=$logo_sis;?>);
       background-attachment: fixed }


</style>
</head>


<?php
// Resgata a Sessao
@session_start();
$nome3       = addslashes(strtoupper($_SESSION["nome_log"]));
$inf1        = addslashes($_SESSION["informes_log"]);
$servletjs2  = addslashes($_SESSION["servletjs2"]);

include_once('sql_injection.php');

$servletjs2 = '20$$20';

if ($servletjs2 == '20$$20'){
	
?>

<script language="JavaScript">

<!--
x=screen.width; 
if (x < 800)
{
	//window.location = "error2.php";
}

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

<?php

// Saldação ao usuario

$hora = date("H"); //Extrai apenas a hora
if ($hora >= 0 and $hora < 6) {
 $situa_1 = "Boa Madrugada";
 $sol_1   = "imagens/noite.bmp";
 } elseif ($hora >=6 and $hora <12) {
 $situa_1 = "Bom Dia";
 $sol_1   = "imagens/dia.bmp";
 } elseif ($hora >=12 and $hora <19) {
 $situa_1 = "Boa Tarde";
 $sol_1   = "imagens/dia.bmp";
 }else {
 $situa_1 = "Boa Noite";
 $sol_1   = "imagens/noite.bmp";
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
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)

    or die( include("login.php"));

@mysql_select_db($db);


// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '". anti_sql_injection($nome3) ."'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$conta      = strtoupper(trim(@$row3['conta']));

if ($conta == "BLOQUEADA" or $conta == "BLOQUEADO"){
            	
            	
            	
    echo "<html>
						<head>
						<title>ERRO AO CONECTAR</title>
			            <link rel='shortcut icon' href='favicon.ico'/>
						</head>
						<body>
									
						<style type=text/css>
						
						
						<!--.cp {  font: bold 10px Arial; color: black}
						<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
						<!--.ld { font: bold 15px Arial; color: #000000}
						<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
						<!--.cn { FONT: 9px Arial; COLOR: black }
						<!--.bc { font: bold 22px Arial; color: #000000 }
						--></style> 
						
						</HEAD>
						<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 background='$logo_sis'>
						</html>
						
						<br><br><br><br>
							
						<div align=center>
						
						<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
						<tr>
						<td align=center>
						     <font face=arial><b>*** SUA CONTA ESTA BLOQUEADA  !!! ***<br>
							                     Tentativa de acesso ultrapassou 3 tentativas,<br> entre em contato com o <br>
												 ADMINISTRADOR DO SISTEMA</b>
						<table align=center>
						<form method='POST' action='login.php'>
						<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
						</form>  
						</table>
						</td>
						</tr>
						</table>
						</div>";
    exit;
}

?>

<body style=" margin-left: 0px;  margin-top: 3px;  margin-right: 0px;  margin-bottom: 0px; ">
<!-- start menu HTML -->

<div align="center" >


<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50"><table width="125" border="0" cellspacing="0">
      <tr>
        <td width="50"><div align="center"><font color="#669999" size="2" face="Times New Roman, Times, serif">
        
		<iframe src="../../info/user.php" width="130" height="22" scrolling="no" frameborder="0" align="left"></iframe>
		
		</font></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
    </table></td>
    <td width="860"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><div align="center"><img src="<?=$sol_1;?>" width="17" height="17"><img src="imagens/px1.gif" width="10" height="10"><font face="Arial"><i><b><?=$bomdia;?></b></i></font></div></td>
        <td><img src="imagens/px1.gif" width="80" height="10" border="0"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><div align="center">
	
	<img src="imagens/carta.gif" width="45" height="40" border="0" />
		
	</div></td>
    <td><div align="center">
	
	
	<table border="0" cellpadding="1" cellspacing="0" >

<tr>

<!-- Inicio menu -->
<td align="left"><div id="menu"><ul> 
<?php
include('cadastro.php');  
?>
</ul></div></td>
<!-- Fim menu -->

<!-- Inicio menu -->
<td align="left"><div id="menu"><ul> 
<?php
include('cobranca.php');  
?>
</ul></div></td>
<!-- Fim menu -->

<!-- Inicio menu -->
<td align="left"><div id="menu"><ul> 
<?php
include('relatorios.php');  
?>
</ul></div></td>
<!-- Fim menu -->

<!-- Inicio menu -->
<td align="left"><div id="menu"><ul> 
<?php
include('saude.php');  
?>
</ul></div></td>
<!-- Fim menu -->

<!-- Inicio menu -->
<td align="left"><div id="menu"><ul> 
<?php
include('caixa.php');  
?>
</ul></div></td>
<!-- Fim menu -->

<!-- Inicio menu -->
<td align="left"><div id="menu"><ul> 
<?php
include('juridico.php');  
?>
</ul></div></td>
<!-- Fim menu -->

<!-- Inicio menu -->
<td align="left"><div id="menu"><ul> 
<?php
include('website.php');  
?>
</ul></div></td>
<!-- Fim menu -->

<!-- Inicio menu -->
<td align="left"><div id="menu"><ul> 
<?php
include('operador.php');  
?>
</ul></div></td>
<!-- Fim menu -->

</td>

<td><img src="imagens/px1.gif" width="90" height="10"/></td>

</tr>
</table>

	
	
	
	</div></td>
  </tr>
</table>


</div> 
<?php

?>
</body>
</html>
<?php
}else{
	
	include('index.htm');
}	

?>
