<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alterar Background</title>
<script type="text/javascript">
function muda(pl)
{
        if(pl == 'c')
        {       
                document.forms[0].img.disabled = true
				document.forms[0].cori.disabled = false
				
        }
        else
        {
				document.forms[0].img.disabled = false
				document.forms[0].cori.disabled = true
        }
}
</script>
<style type="text/css">
<!--

.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
}
.style7 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; }
-->
</style>
</head>

<body>
<form action="salvar_cor.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="404" border="1" cellpadding="0" cellspacing="0" bordercolor="#333333">
    <tr>
      <td height="28" colspan="2" bgcolor="#999999"><span class="style1">&nbsp;Escolha uma opção</span></td>
    </tr>
    <tr>
      <td height="27" colspan="2"><div align="center"><span class="style2">Cor:
        <input name="cor" type="radio" id="cor2" onclick="muda('c')" value="c"/>
        Imagem:
  <input type="radio" name="cor" id="cor2" value="i" onclick="muda('n')"/>
      </span></div></td>
    </tr>
    <tr>
      <td width="134">&nbsp;</td>
      <td width="270">&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style7">Cor:</span></td>
      <td><input name="cori" type="text" id="cori" size="30" /></td>
    </tr>
    <tr>
      <td height="32"><span class="style7">Imagem:</span></td>
      <td><input type="file" name="img" id="img" disabled="disabled"/></td>
    </tr>
    <tr>
      <td height="28" colspan="2" bgcolor="#999999"><span class="style1">&nbsp;
        <input type="submit" name="button2" id="button2" value="Salvar Informações" />
      </span></td>
    </tr>
  </table>
  </form>

</body>
</html>
