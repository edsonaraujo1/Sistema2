<?php

/**
 * Project:     Securimage: A PHP class for creating and managing form CAPTCHA images<br />
 * File:        securimage.php<br />
 * URL:         www.phpcaptcha.org
 */


session_start();  // Start the session where the code will be stored.

//session_destroy();


?>
<html>
<head>
  <title>Securimage Test Form</title>

<style type="text/css">
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
</head>

<body onload="document.form1.nome_log.focus();">
<table width="100%" border="0">
  <tr>
  <td>
  <table width="303" height="0%" border="18" align="center" bordercolor="#3399FF">

<?php
if (empty($_POST)) {
	$acao = 'logar';
?>

<form name="form1" method="POST">
      <tr>
        <td height="10%"><div align="center">*** <span class="style1">Digite sua Senha de Acesso</span>*** </div></td>
      </tr>
      <tr>
        <td height="90%" valign="top"><p></p>          
          <table width="200" border="0" align="center">
            <tr>
              <td width="68"><strong>Usuario:</strong></td>
              <td width="122"><input type="text" name="nome_log" value="<?=$nome_log;?>" onchange="this.value.toUpperCase" style="text-transform: uppercase;"></td>
            </tr>
            <tr>
              <td><strong>Senha:</strong></td>
              <td><input type="password" name="pwd"  value="<?=$pwd;?>"    onchange="this.value.toUpperCase" style="password-transform: uppercase;"></td>
            </tr>
          </table>
          <table width="235" border="1" align="center" cellspacing="0" bordercolor="#3399FF">
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
          <input type="text" name="code" size="12" /><br/><br/>
          <input type="hidden" name="acao" value="<?=$acao;?>"/>

          <input type=image name='Sair' value="Submit Form" src='images/login.PNG'>
   </form>

<?php
} else { //form is posted
  include("securimage.php");
  $img = new Securimage();
  $valid = $img->check($_POST['code']);

  if($valid == true) {
  	
echo $_POST['nome_log'];
echo $_POST['pwd'];
echo $_POST['acao'];
  	
  	
  	// Salva Nome do Usuario	
session_start();	
$_SESSION['nome_log'] = $nome_log;
$_SESSION['pwd']      = $pwd;
$_SESSION['acao']     = $acao;

$nome_log = '';
$pwd      = '';
$acao     = '';

	  //require("../logar.php");
  	
  	
    echo "<center>Senha correta<br />Click <a href=\"../logar.php\">here</a> to go back.</center>";
  } else {
    echo "<center>Senha Invalida  <a href=\"javascript:history.go(-1)\">Go back</a> to try again.</center>";
  }
}

?>

		  
		  
          </div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
<script> window.focus();</script>
<script type="text/javascrip">document.form1.nome_log.focus(); </script>

</html>
