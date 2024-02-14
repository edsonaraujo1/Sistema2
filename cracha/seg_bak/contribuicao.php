<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Sysmp - Sistema ERP Web</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<style type="text/css">
<!--
.style1 {	font-family: Arial;
	font-weight: bold;
	font-size: 18px;
}
.style3 {	color: <?=$color_bor;?>;
	font-size: 21px;
}
.style7 {	font-size: 23px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style6 {font-family: Arial; font-weight: bold; font-size: 14px; }
.style8 {font-weight: bold; font-family: Arial;}
-->
</style>
</head>

<body background="../imagens/logo2.PNG">
<div align="center">
  <br>
  <table width="697" border="16" bordercolor="#669999" bgcolor="#FFFFFF">
    <tr>
      <td><div align="center">        
        <table width="100%" border="0">
          <tr>
            <td width="64%" height="42"><div align="left"><b><span class="style1"><span class="style3"><span class="style7"><font color="#669999">Impress&atilde;o Contribui&ccedil;&atilde;o </font> </span></span></span></b></div></td>
            <td width="36%"><div align="center"><span class="style8"><font size="3">* * * Visualizar * * *</font></span></div></td>
          </tr>
        </table>
        </div></td>
    </tr>
    <tr>
      <td><div align="center">
        <table width="100%" border="0" cellpadding="1" cellspacing="0">
          <form name="form1" method="post"  action="barcode1.php" target="new">
            <div align="left"></div>
            <tr>
              <td width="25%" class="style3"><div align="right"><b><font size="2" face="Verdana">Vencimento.: </font></b></div></td>
              <td width="75%"><div align="left">
                <input name="Edit1" type="text" id="Edit1" style=" font-family: Verdana; font-size: 14px;  height:19px;width:56px; background-color: #FFFFFF;">
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Cod. Instru&ccedil;&atilde;o.:</font></b></div></td>
              <td><div align="left">
                  <input name="Edit2" type="text" id="Edit2" style=" font-family: Verdana; font-size: 14px;  height:19px;width:200px; background-color: #FFFFFF;">
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Tipo de Contr.:</font></b></div></td>
              <td><div align="left">
                  <input name="Edit3" type="text" id="Edit3" style=" font-family: Verdana; font-size: 14px;  height:19px;width:460px; background-color: #FFFFFF;">
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Exercicio.:</font></b></div></td>
              <td><div align="left">
                  <input name="Edit4" type="text" id="Edit4" style=" font-family: Verdana; font-size: 14px;  height:19px;width:256px; background-color: #FFFFFF;">
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Imprive Verso.:</font></b></div></td>
              <td><div align="left">
                  <input name="Edit5" type="text" id="Edit5" style=" font-family: Verdana; font-size: 14px;  height:19px;width:56px; background-color: #FFFFFF;" maxlength="5">
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Imprimir para.:</font></b></div></td>
              <td><div align="left">
                  <input name="Edit6" type="text" id="Edit6" style=" font-family: Verdana; font-size: 14px;  height:19px;width:156px; background-color: #FFFFFF;">
                   <b><font size="2" face="Verdana">
                  </font></b></div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Iniciar em Cod.:</font></b></div></td>
              <td><div align="left">
                <input name="Edit7" type="text" id="dpto2" style=" font-family: Verdana; font-size: 14px;  height:19px;width:256px; background-color: #FFFFFF;">
</div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Terminar em Cod.:</font></b></div></td>
              <td><div align="left">
                <input name="Edit8" type="text" id="Edit8" style=" font-family: Verdana; font-size: 14px;  height:19px;width:85px; background-color: #FFFFFF;">
</div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Envias por Email.: </font></b></div></td>
              <td><div align="left">
                <input name="Edit9" type="text" id="Edit9" style=" font-family: Verdana; font-size: 14px;  height:19px;width:460px; background-color: #FFFFFF;">
</div></td>
            </tr>
            <tr>
              <td valign="top" class="style3"><div align="right"><b><font size="2" face="Verdana">Email.:</font></b></div></td>
              <td><div align="left">
                <input name="Edit10" type="text" id="Edit10" style=" font-family: Verdana; font-size: 14px;  height:19px;width:460px; background-color: #FFFFFF;">
</div></td>
            </tr>
          </form>
        </table>
        <img src="../imagens/px1.gif" width="10" height="8">        <table width="633" border="0">
          <tr>
            <td width="4"><img src="../imagens/px1.gif" width="15" height="8"></td>
            <td width="590"><div align="center">
                <table width="325" border="0">
                  <tr>
                    <td width="243"><div align="center"><img src="../imagens/botaoazul01.PNG" width="92" height="22"></div></td>
                    <td width="92"><div align="center"><img src="../imagens/botaoazul3.PNG" width="92" height="22"></div></td>
                    <td width="164"><div align="center"><img src="../imagens/botaoazul4.PNG" width="92" height="22"></div></td>
                    </tr>
                </table>
            </div></td>
            <td width="33" valign="bottom"><img src="../imagens/vacina.JPG" width="27" height="38"></td>
          </tr>
        </table>
      <img src="../imagens/px1.gif" width="10" height="9"> </div></td>
    </tr>
  </table>
  <p>    <input type="submit" name="Submit" value="imprimir">
    </form>
</p>
</div>
</body>
</html>
