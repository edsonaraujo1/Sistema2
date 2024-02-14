<?
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
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."config.php");

require($path."logar.php");

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
<title><?=$Titulo;?></title>
</head>
<body>


<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);}

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


<?
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

// Abre Conexão com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

$link = mysql_connect($host,$user,$pass);

mysql_select_db($db);


  //--- Informa quantos usuarios estao conectados ao sistema
  $timestamp=time(); 
  $timeout=time()-100; // valor em segundos 
  $result=mysql_db_query($db, "INSERT INTO useronline VALUES ('$timestamp','$REMOTE_ADDR','$PHP_SELF')");
  $result=mysql_db_query($db, "DELETE FROM useronline WHERE timestamp<$timeout"); 
  $result=mysql_db_query($db, "SELECT DISTINCT ip FROM useronline"); 
  $usuarios=mysql_num_rows($result); 
  mysql_close();   

?>
<html>

<div id="Label71_outer" style="Z-INDEX: 7; LEFT: 0px; WIDTH: 616px; POSITION: absolute; TOP: 0px; HEIGHT: 19px">
<?
if (!empty($usuarios)){
?>
<font color="#4682B4" face="Ariel" size="2"><?=$usuarios;?> usuário(s) on-line</font>
<?
}
?>   
</div>

<div align="center">

<div id="Label71_outer" style="Z-INDEX: 7; LEFT: 132px; WIDTH: 716px; POSITION: absolute; TOP: 4px; HEIGHT: 19px">
<div id="Label71" style=" font-family: Arial; font-size: 16px; color: #000000; background-color: #FFFFFF; height:19px; width:716px;"><img id="Image99" src="<?=$sol_1;?>"  width="20"  height="17"  border="0"  />&nbsp;&nbsp;<b><i><?=$bomdia;?></i></b></div>
</div>
</div>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<table  width="1000"   style="height:19px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">

<div id="Image1_outer" style="Z-INDEX: 1; LEFT: 105px; WIDTH: 112px; POSITION: absolute; TOP: 26px; HEIGHT: 26px">
<div id="Image1_container" style=" width: 112;  height: 26; overflow: hidden;" ><img id="Image1" src="imagens/menu.png"  width="112"  height="26"  border="0"       /></div>
</div>
<div id="Image2_outer" style="Z-INDEX: 2; LEFT: 219px; WIDTH: 112px; POSITION: absolute; TOP: 26px; HEIGHT: 26px">
<div id="Image2_container" style=" width: 112;  height: 26; overflow: hidden;" ><img id="Image2" src="imagens/menu.png"  width="112"  height="26"  border="0"       /></div>
</div>
<div id="Image3_outer" style="Z-INDEX: 3; LEFT: 333px; WIDTH: 112px; POSITION: absolute; TOP: 26px; HEIGHT: 26px">
<div id="Image3_container" style=" width: 112;  height: 26; overflow: hidden;" ><img id="Image3" src="imagens/menu.png"  width="112"  height="26"  border="0"       /></div>
</div>
<div id="Image4_outer" style="Z-INDEX: 4; LEFT: 447px; WIDTH: 112px; POSITION: absolute; TOP: 26px; HEIGHT: 26px">
<div id="Image4_container" style=" width: 112;  height: 26; overflow: hidden;" ><img id="Image4" src="imagens/menu.png"  width="112"  height="26"  border="0"       /></div>
</div>
<div id="Image5_outer" style="Z-INDEX: 5; LEFT: 561px; WIDTH: 112px; POSITION: absolute; TOP: 26px; HEIGHT: 26px">
<div id="Image5_container" style=" width: 112;  height: 26; overflow: hidden;" ><img id="Image5" src="imagens/menu.png"  width="112"  height="26"  border="0"       /></div>
</div>
<div id="Image6_outer" style="Z-INDEX: 6; LEFT: 675px; WIDTH: 112px; POSITION: absolute; TOP: 26px; HEIGHT: 26px">
<div id="Image6_container" style=" width: 112;  height: 26; overflow: hidden;" ><img id="Image6" src="imagens/menu.png"  width="112"  height="26"  border="0"       /></div>
</div>
<div id="Image7_outer" style="Z-INDEX: 7; LEFT: 789px; WIDTH: 112px; POSITION: absolute; TOP: 26px; HEIGHT: 26px">
<div id="Image7_container" style=" width: 112;  height: 26; overflow: hidden;" ><img id="Image7" src="imagens/menu.png"  width="112"  height="26"  border="0"       /></div>
</div>
<div id="Label1_outer" style="Z-INDEX: 8; LEFT: 111px; WIDTH: 100px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label1" style=" font-family: Arial; font-size: 15px; font-weight: bold; height:19px;width:100px;"  align="Center"   >Cadastros</div>
</div>
<div id="Label2_outer" style="Z-INDEX: 9; LEFT: 225px; WIDTH: 100px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label2" style=" font-family: Arial; font-size: 15px; font-weight: bold; height:19px;width:100px;"  align="Center"   >Contribuição</div>
</div>
<div id="Label3_outer" style="Z-INDEX: 10; LEFT: 339px; WIDTH: 100px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label3" style=" font-family: Arial; font-size: 15px; font-weight: bold; height:19px;width:100px;"  align="Center"   >Relatórios</div>
</div>
<div id="Label4_outer" style="Z-INDEX: 11; LEFT: 453px; WIDTH: 100px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label4" style=" font-family: Arial; font-size: 15px; font-weight: bold; height:19px;width:100px;"  align="Center"   >Saúde</div>
</div>
<div id="Label5_outer" style="Z-INDEX: 12; LEFT: 567px; WIDTH: 100px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label5" style=" font-family: Arial; font-size: 15px; font-weight: bold; height:19px;width:100px;"  align="Center"   >Caixa</div>
</div>
<div id="Label6_outer" style="Z-INDEX: 13; LEFT: 681px; WIDTH: 100px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label6" style=" font-family: Arial; font-size: 15px; font-weight: bold; height:19px;width:100px;"  align="Center"   >Juridico</div>
</div>
<div id="Label7_outer" style="Z-INDEX: 14; LEFT: 795px; WIDTH: 100px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label7" style=" font-family: Arial; font-size: 15px; font-weight: bold; height:19px;width:100px;"  align="Center"   >Operador</div>
</div>
</td></tr></table>
</form></body>

</html>