<?
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Desenvolvido por...: Jean Carlos de Araujo
 
 Finalidade.........: Index do Sistema
 Criado em Data.....: 06/07/2009
 Ultima Atualização : 06/07/2009 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/

$nome3 = "Visitante";
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
$bomdia = $situa_1." Seja Bem vindo, ".$nome3." hoje e  ".strftime("%A, %d de %B de %Y"); 

?>

<script>
x=screen.width; 
if (x != 1024)
{
   </script>	
	<style type=text/css>
	
	body { background-image: url('layout.gif');}
	       
	
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
		A.clase1:link {color:#FFFFFF}
		A.clase1:hover {color:#FF3333}
	
	
	</style>	
<script>
}else{
	
   </script>	
	<style type=text/css>
	
	body { background-image: url('layout.gif');}
	       
	
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
		A.clase1:link {color:#FFFFFF}
		A.clase1:hover {color:#FF3333}
	
	
	</style>	
<script>
	
}
</script>

<html>
<head>
<title>Bem Vindo ao SysMP.com</title>
</head>

</html>

<html >
<head>
<script type="text/javascript" src="vcl-bin/js/common.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; ">
<form style="margin-bottom: 0" id="Unit1" name="Unit1" method="post"  action="/layout.php">
<table  width="1000"   style="height:784px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">
<div id="Image1_outer" style="Z-INDEX: 0; LEFT: 8px; WIDTH: 312px; POSITION: absolute; TOP: 2px; HEIGHT: 108px">
<div id="Image1_container" style=" width: 312;  height: 108; " ><img id="Image1" src="logo2_sem.PNG"  width="316"  height="108"  border="0"       /></div>
</div>

<div id="Image2_outer" style="Z-INDEX: 7; LEFT: 95px; WIDTH: 125px; POSITION: absolute; TOP: -1px; HEIGHT: 112px">
<div id="Image2_container" style=" width: 125;  height: 112; " ><img id="Image2" src="logo.gif"  width="126"  height="112"  border="0"       /></div>
</div>

<div id="Label1_outer" style="Z-INDEX: 1; LEFT: 0px; WIDTH: 993px; POSITION: absolute; TOP: 770px; HEIGHT: 11px">
<div id="Label1" style=" font-family: Verdana; font-size: 10px;  height:11px;width:993px;"  align="Center"   >Creat by SysMp todos diretos reservado 2009</div>
</div>
<div id="Label2_outer" style="Z-INDEX: 2; LEFT: 376px; WIDTH: 616px; POSITION: absolute; TOP: 8px; HEIGHT: 16px">
<div id="Label2" style=" font-family: Verdana; font-size: 10px;  height:16px;width:616px;"  align="Right"   ><STRONG><?=$bomdia;?></STRONG></div>
</div>
<div id="Label3_outer" style="Z-INDEX: 3; LEFT: 41px; WIDTH: 64px; POSITION: absolute; TOP: 172px; HEIGHT: 24px">
<div id="Label3" style=" font-family: Verdana; font-size: 18px;  height:24px;width:64px;"  align="Center"   ><p><STRONG><a href="forum.php" class="clase1">Farum</a></STRONG></p></div>
</div>
<div id="Label4_outer" style="Z-INDEX: 4; LEFT: 60px; WIDTH: 109px; POSITION: absolute; TOP: 252px; HEIGHT: 36px">
<div id="Label4" style=" font-family: Verdana; font-size: 13px;  height:36px;width:109px;"  align="Center"   ><P><STRONG><a href="programa.php" class="clase1">Programação PHP</a></STRONG></P></div>
</div>
<div id="Label5_outer" style="Z-INDEX: 5; LEFT: 24px; WIDTH: 76px; POSITION: absolute; TOP: 336px; HEIGHT: 36px">
<div id="Label5" style=" font-family: Verdana; font-size: 13px;  height:36px;width:76px;"  align="Center"   ><P><STRONG><a href="comercio.php" class="clase1">Portal da Troca</a></STRONG></P></div>
</div>
<div id="Label6_outer" style="Z-INDEX: 6; LEFT: 62px; WIDTH: 64px; POSITION: absolute; TOP: 414px; HEIGHT: 36px">
<div id="Label6" style=" font-family: Verdana; font-size: 12px;  height:36px;width:64px;"  align="Center"   ><P><STRONG><a href="sistema.php" class="clase1">Sistemas Web</a></STRONG></P></div>
</div>
</td></tr></table>
</form></body>
</html>

