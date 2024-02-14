<?
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Informações do Sistema
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/

include("../config.php");

// Resgata a Sessao
@session_start();
$nome3      = $_SESSION["nome_log"];
$_SESSION["servletjs2"] = '20$$20';

// <bgsound src="imagens/onestop.mid" Delay=5 Loop=2 Volume=0 Balance=0>

?>
<style type=text/css>
<!--

body { background-image: url(<?="../".$logo_sis;?>);}

.style6{
	
	color: #336699;
	font-family: Verdana, Arial;
	font-weight: bold;
}	

-->
</style>
<html >
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../graphics/favicon.ico"/>

<style type="text/css">
<!--

.style19 {
	font-family: "Comic Sans MS";
	font-size: 20px;
	font-style: italic;
	color: #000000;
}

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

-->
</style>

</head>


<script>
// Valida Campo
function validaCampo()
{
if(document.Form1.palavra_sec.value=="")
{
//	alert("A Palavra secreta é Obrigatorio!");
//	return false;
}
else	
return true;	
}

// Valida email
function ValidaEmail()
{
  var obj = eval("document.Form1.mail_sec");
  var txt = obj.value;
  if ((txt.length != 0) && ((txt.indexOf("@") < 1) || (txt.indexOf('.') < 7)))
  {
    alert('Email nao e valido !!!');
	obj.focus();
  }
}
        
</script>


<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "   bgcolor="#FFFFFF" onload="document.Form1.mail_sec.focus();">

<table  border="15" align="center" bordercolor ='<?=$color_bor;?>' bgcolor="#FFFFFF" >


<br>


<form name="Form1" action="enviar.php" method="POST" onsubmit="return validaCampo(); return false;">
      <input type="hidden">
      <!-- e-mail do destinatario -->
      <center>
				                 
             <tr> 
             <td bgcolor="#FFF8DC">
			 
			 <br />
			<center><font face=Tahoma><font size=4 color='#FF0000'><b>A T E N Ç Ã O</b></font><font size=2></center>
			<center><b>Para Recuperação da sua senha digite seu e-mail</b><br></center>
			<center><b>cadastrado no Sistema, você recebera um e-mail</b><br></center>
			<center><b>com seu Usuario e Senha para uso no programa.</b><br></center>
			<center><b>Caso não possua um e-maul cadastrado entre em</b><br></center>
			<center><b>contato com o Administrador do Sistema. Abrigado !!!</b><br></center>
			</font>
			<br /> 
			 
			 <font face=Arial>&nbsp;&nbsp;<b>Digite Seu E-Mail Cadastrado:</b><br>
			    <input type="text" size="60" name="mail_sec" value="<?=$mail_des;?>" onfocus="this.className='anormal'" onblur="this.className='normal';ValidaEmail();"></td>
             </tr>
             
             <tr>
             <td bgcolor="#FFF8DC">
			 <br />
          <table width="235" border="0" align="center" cellspacing="0" bordercolor="#3399FF">
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
    
                  
            
                  <!-- pass a session id to the query string of the script to prevent ie caching -->
                      <a tabindex="-1" style="border-style: none" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = 'securimage_show.php?sid=' + Math.random(); return false"><img src="../imagens/refresh.gif" alt="Reload Image" border="0" onclick="this.blur()" align="bottom" /></a>
                </div>
			  </div>
<div style="clear: both"></div>

			  &nbsp;</td>
            </tr>
          </table>   
		         
          <div align="center">
		  
		  <span class="style2">Codigo:</span>

          <!-- NOTE: the "name" attribute is "code" so that $img->check($_POST['code']) will check the submitted form field -->
          <input type="text" name="code" size="12" onfocus="this.className='anormal'" onblur="this.className='normal'" />
          <input type="hidden" name="acao" value="logar"/>
			 
			 
			 </td>
			               
             </tr>
             
                <tr> 
                
                <td bgcolor="#FFF8DC"><br />
				<center>
				<input name="submit" type=image src="../imagens/botaoazul_enviar.PNG" width="92" height="22" />
 
               
                &nbsp; <a href="../avaleht.php">
	      <img alt="sair" src="../imagens/botaoazul33.PNG" border="0"/></a>
				
				
				<br />
				
				</td>
                </center> 
                
                
                
              </tr>
</center>
</form>


</table>
</body>
</html>
