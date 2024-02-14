<?
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Acesso ao Sistema
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/

require("../config.php");

session_name("MeuLogin");
session_start();
//session_destroy();

if($_GET['login'] == "falhou") {
    print $_GET['causa'];
}

?>

<script>

Mensagem = "Sindificios - Sindicato dos Empreg. de Edif. de São Paulo";
Espacos = "..... .....";
Posicao = 0;

function RolaMensagem()
{
    window.status = Mensagem.substring(Posicao, Mensagem.length)
+ Espacos + Mensagem.substring(0, Posicao);     Posicao ++;

   if (Posicao > Mensagem.length) Posicao = 0; 

    window.setTimeout("RolaMensagem()", 200);
}
RolaMensagem();
</script>

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
<title>Segurança</title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
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

    A:link,a:active,a:visited{ color:white; text-decoration:none; }
    A:hover{ color:#FF3333; text-decoration:none; }
	A:visited {color:#0000cc;}
	A:active {color:#0000cc;}
	
	A.clase1:visited {color:#000000;}
	A.clase1:active {color:#000000;} 
	A.clase1:link {color:#000000}
	A.clase1:hover {color:#FFFFFF}

<!--
.style1 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 14px;
}
.style2 {
	font-family: Arial;
	font-weight: bold;
	font-size: 14px;
}
-->

</style> 

</html>

<?

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
$bomdia = $situa_1.", hoje e  ".strftime("%A, %d de %B de %Y"); 

?>

<html>

<div align=center>

<div id="Label71_outer" style="Z-INDEX: 7; LEFT: 132px; WIDTH: 716px; POSITION: absolute; TOP: 4px; HEIGHT: 19px">
<div id="Label71" style=" font-family: Arial; font-size: 16px; color: #000000; background-color: #FFFFFF; height:19px; width:716px;"   ><img id="Image99" src="<?=$sol_1;?>"  width="20"  height="17"  border="0"  />&nbsp;&nbsp;<b><i><?=$bomdia;?></i></b></div>
</div>
</div>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >

<?php
if (empty($_POST)) {
?>

<form method="POST">

<table  width="1000"   style="height:19px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">

<div id="Image1_outer" style="Z-INDEX: 1; LEFT: 105px; WIDTH: 112px; POSITION: absolute; TOP: 26px; HEIGHT: 26px">
<div id="Image1_container" style=" width: 112;  height: 26; overflow: hidden;" ><img id="Image1" src="../imagens/menu.png"  width="112"  height="26"  border="0"       /></div>
</div>
<div id="Image2_outer" style="Z-INDEX: 2; LEFT: 219px; WIDTH: 112px; POSITION: absolute; TOP: 26px; HEIGHT: 26px">
<div id="Image2_container" style=" width: 112;  height: 26; overflow: hidden;" ><img id="Image2" src="../imagens/menu.png"  width="112"  height="26"  border="0"       /></div>
</div>
<div id="Image3_outer" style="Z-INDEX: 3; LEFT: 333px; WIDTH: 112px; POSITION: absolute; TOP: 26px; HEIGHT: 26px">
<div id="Image3_container" style=" width: 112;  height: 26; overflow: hidden;" ><img id="Image3" src="../imagens/menu.png"  width="112"  height="26"  border="0"       /></div>
</div>
<div id="Image4_outer" style="Z-INDEX: 4; LEFT: 447px; WIDTH: 112px; POSITION: absolute; TOP: 26px; HEIGHT: 26px">
<div id="Image4_container" style=" width: 112;  height: 26; overflow: hidden;" ><img id="Image4" src="../imagens/menu.png"  width="112"  height="26"  border="0"       /></div>
</div>
<div id="Image5_outer" style="Z-INDEX: 5; LEFT: 561px; WIDTH: 112px; POSITION: absolute; TOP: 26px; HEIGHT: 26px">
<div id="Image5_container" style=" width: 112;  height: 26; overflow: hidden;" ><img id="Image5" src="../imagens/menu.png"  width="112"  height="26"  border="0"       /></div>
</div>
<div id="Image6_outer" style="Z-INDEX: 6; LEFT: 675px; WIDTH: 112px; POSITION: absolute; TOP: 26px; HEIGHT: 26px">
<div id="Image6_container" style=" width: 112;  height: 26; overflow: hidden;" ><img id="Image6" src="../imagens/menu.png"  width="112"  height="26"  border="0"       /></div>
</div>
<div id="Image7_outer" style="Z-INDEX: 7; LEFT: 789px; WIDTH: 112px; POSITION: absolute; TOP: 26px; HEIGHT: 26px">
<div id="Image7_container" style=" width: 112;  height: 26; overflow: hidden;" ><img id="Image7" src="../imagens/menu.png"  width="112"  height="26"  border="0"       /></div>
</div>
<div id="Label1_outer" style="Z-INDEX: 8; LEFT: 111px; WIDTH: 100px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label1" style=" font-family: Arial; font-size: 15px; font-weight: bold; height:19px;width:100px;"  align="Center"   ><a href="../login.php" class="clase1"> Cadastros </a></a></div>
</div>
<div id="Label2_outer" style="Z-INDEX: 9; LEFT: 225px; WIDTH: 100px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label2" style=" font-family: Arial; font-size: 15px; font-weight: bold; height:19px;width:100px;"  align="Center"   ><a href="../login.php" class="clase1"> Contribuição </a></div>
</div>
<div id="Label3_outer" style="Z-INDEX: 10; LEFT: 339px; WIDTH: 100px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label3" style=" font-family: Arial; font-size: 15px; font-weight: bold; height:19px;width:100px;"  align="Center"   ><a href="../login.php" class="clase1"> Relatórios </a></div>
</div>
<div id="Label4_outer" style="Z-INDEX: 11; LEFT: 453px; WIDTH: 100px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label4" style=" font-family: Arial; font-size: 15px; font-weight: bold; height:19px;width:100px;"  align="Center"   ><a href="../login.php" class="clase1"> Saúde </a></div>
</div>
<div id="Label5_outer" style="Z-INDEX: 12; LEFT: 567px; WIDTH: 100px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label5" style=" font-family: Arial; font-size: 15px; font-weight: bold; height:19px;width:100px;"  align="Center"   ><a href="../login.php" class="clase1"> Caixa </a></div>
</div>
<div id="Label6_outer" style="Z-INDEX: 13; LEFT: 681px; WIDTH: 100px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label6" style=" font-family: Arial; font-size: 15px; font-weight: bold; height:19px;width:100px;"  align="Center"   ><a href="../login.php" class="clase1"> Juridico </a></div>
</div>
<div id="Label7_outer" style="Z-INDEX: 14; LEFT: 795px; WIDTH: 100px; POSITION: absolute; TOP: 30px; HEIGHT: 19px">
<div id="Label7" style=" font-family: Arial; font-size: 15px; font-weight: bold; height:19px;width:100px;"  align="Center"   ><a href="../login.php" class="clase1"> Operador </a></div>
</div>
</td></tr></table>

<br/>
<br/>
<br/>
<br/>

<table width="100%" border="0">
  <tr>
  <td>
  <table width="303" height="0%" border="18" align="center" bordercolor="<?=$color_bor;?>" bgcolor="#FFFFFF">

      <tr>
        <td height="10%"><div align="center">*** <span class="style1">Digite sua Senha de Acesso</span>*** </div></td>
      </tr>
      <tr>
        <td height="90%" valign="top"><p></p>          
          <table width="200" border="0" align="center">
            <tr>
              <td width="68"><strong>Usuario:</strong></td>
              <td width="122"><input type="text" name="nome_log" onchange="this.value.toUpperCase" style="text-transform: uppercase;"/></td>
            </tr>
            <tr>
              <td><strong>Senha:</strong></td>
              <td><input type="password" name="pwd"      onchange="this.value.toUpperCase" style="password-transform: uppercase;"/></td>
            </tr>
          </table>
          <table width="235" border="1" align="center" cellspacing="0" bordercolor="<?=$color_bor;?>">
            <tr>
              <td width="430">
			  
			  <div >
                <div align="left"><img id="siimage" align="left" style="padding-right: 5px; border: 0" src="securimage_show.php?sid=<?php echo md5(time()) ?>" />
    
                  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="19" height="19" id="SecurImage_as3" align="middle">
			            <param name="allowScriptAccess" value="sameDomain" />
			            <param name="allowFullScreen" value="false" />
			            <param name="movie" value="securimage_play.swf?audio=securimage_play.php&bgColor1=#777&bgColor2=#fff&iconColor=#000&roundedCorner=5" />
			            <param name="quality" value="high" />
			        
			        <param name="bgcolor" value="#ffffff" />
			            <embed src="securimage_play.swf?audio=securimage_play.php&bgColor1=#777&bgColor2=#fff&iconColor=#000&roundedCorner=5" quality="high" bgcolor="#ffffff" width="19" height="19" name="SecurImage_as3" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />                                    
			          </object>
    
                  <br />
            
                  <!-- pass a session id to the query string of the script to prevent ie caching -->
                      <a tabindex="-1" style="border-style: none" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = 'securimage_show.php?sid=' + Math.random(); return false"><img src="images/refresh.gif" alt="Reload Image" border="0" onclick="this.blur()" align="bottom" /></a>
                </div>
			  </div>
<div style="clear: both"></div>

			  &nbsp;</td>
            </tr>
          </table>   
		         
          <div align="center">
		  
		  <span class="style2">Code:</span><br />

          <!-- NOTE: the "name" attribute is "code" so that $img->check($_POST['code']) will check the submitted form field -->
          <input type="text" name="code" size="12" /><br/>


          <input type=image name='Sair' value="Submit Form" src='../imagens/login.PNG'>
   </form>


		  
		  
          </div></td>
      </tr>
    </table></td>
  </tr>
</table>

<?php
} else { //form is posted
  include("securimage.php");
  $img = new Securimage();
  $valid = $img->check($_POST['code']);

  if($valid == true) {

  	//require("..logar.php");
  	
    echo "<center>Senha correta<br />Click <a href=\"../logar.php?acao=logar\">here</a> to go back.</center>";
  } else {
    echo "<center>Senha Invalida  <a href=\"javascript:history.go(-1)\">Go back</a> to try again.</center>";
  }
}

?>

</body>


<script> window.focus();</script>
<script type="text/javascrip">document.form1.nome_log.focus(); </script>

</html>