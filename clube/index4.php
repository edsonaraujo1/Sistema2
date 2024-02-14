<script language="javascript">
// Altera cabeçalho padrão
function fnPrint() {
		try	{
		// Aplica as alterações nos registros
		var ret = saveAndClearSetting();
		// chama o evento de impressão
		window.print();
		// Define alteração de cabeçalho e rodapé da página
		if ( ret ) restoreSetting();
		} catch (e) { alert("err="+e.description); }
}
		var hkey_path = "HKEY_CURRENT_USER\\Software\\Microsoft\\Internet Explorer\\PageSetup\\";
		var hkey_key_header = hkey_path+"header"; // cabeçalho
		var hkey_key_footer = hkey_path+"footer"; //rodapé
		var hkey_key_margin_bottom = hkey_path+"margin_bottom"; // margem inferior
		var hkey_key_margin_left = hkey_path+"margin_left"; // margem esquerda
		var hkey_key_margin_right = hkey_path+"margin_right"; // margem direita
		var hkey_key_margin_top = hkey_path+"margin_top"; // margem superior
		var old_header = "&w&bPágina &p de &P "; // cabeçalho original
		var old_footer = "&u&b&d "; // rodapé original
		
		//Salva as configurações originais e  aplica as configurações em branco
		function saveAndClearSetting() {
		  try {
			var RegWsh = new ActiveXObject("WScript.Shell");
			old_header = RegWsh.RegRead(hkey_key_header);
			old_footer = RegWsh.RegRead(hkey_key_footer);
			RegWsh.RegWrite(hkey_key_header,"");
			RegWsh.RegWrite(hkey_key_footer,"");
			RegWsh.RegWrite(hkey_key_margin_left,"0");
			RegWsh.RegWrite(hkey_key_margin_top,"0");
			return true;
		  } catch (e) { 
			if ( e.description.indexOf("O servidor de automação não pode criar objeto") != -1 ) {
				alert(" Erro ao tentar alterar as configurações do IE. Por favor altere as configurações de segurança  e tente novamente."); 
			} // if
			else {
				alert("ERR="+e.description); 
			} // else
		  } // catch
			return false;
		}
		// Restaura as configurações originais
		function restoreSetting() {
		  try {
			var RegWsh = new ActiveXObject("WScript.Shell");
			RegWsh.RegWrite(hkey_key_header,old_header);
			RegWsh.RegWrite(hkey_key_footer,old_footer);
		  } catch (e) {
			if ( e.description.indexOf("O servidor de automação não pode criar objeto") != -1 ) {
				alert("Erro ao tentar alterar as configurações do IE. Por favor altere as configurações de segurança  e tente novamente."); 
			} // if
			else {
				alert("ERR="+e.description); 
			} // else
		  } // catch
		}
</script>
<?
$id    = 3;
$Edit4 = "JOAO LIMA SANTOS";
$Edit1 = "1";
$Edit2 = "2343A";
$Edit3 = "15/08/2010";

?>

<input name='idprint' type='button' value="imprimir" onclick="fnPrint()"/>

<html>

<div align="center">

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<table  width="86"  style="height:54px"  border="0" cellpadding="0" cellspacing="0" border="1" >
<tr>
<td valign="top">
<div id="Image2_outer" style="Z-INDEX: 1; LEFT: 14px; WIDTH: 90px; POSITION: absolute; TOP: 57px; HEIGHT: 113px">
<div id="Image2_container" style=" width: 90;  height: 113; overflow: hidden;" ><img id="Image2" src="ver.php?new_fot=<?=$id;?>"  width="90"  height="113"  border="0"       /></div>
</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 120px; WIDTH: 232px; POSITION: absolute; TOP: 60px; HEIGHT: 24px">
<div id="Label1" style=" font-family: Arial; font-size: 16px;  background-color: #E3BC88;height:24px;width:232px;"   ><P><?=$Edit4;?></P></div>
</div>
<div id="Label2_outer" style="Z-INDEX: 3; LEFT: 120px; WIDTH: 232px; POSITION: absolute; TOP: 85px; HEIGHT: 24px">
<div id="Label2" style=" font-family: Arial; font-size: 16px;  background-color: #E3BC88;height:24px;width:232px;"  align="Center"   ><P><?=$Edit1;?></P></div>
</div>
<div id="Label3_outer" style="Z-INDEX: 4; LEFT: 120px; WIDTH: 232px; POSITION: absolute; TOP: 109px; HEIGHT: 24px">
<div id="Label3" style=" font-family: Arial; font-size: 16px;  background-color: #E3BC88;height:24px;width:232px;"  align="Center"   ><P><?=$Edit2;?></P></div>
</div>
<div id="Label4_outer" style="Z-INDEX: 5; LEFT: 120px; WIDTH: 232px; POSITION: absolute; TOP: 135px; HEIGHT: 24px">
<div id="Label4" style=" font-family: Arial; font-size: 16px;  background-color: #E3BC88;height:24px;width:232px;"  align="Center"   ><P><?=$Edit3;?></P></div>
</div>
</td>
</tr>
</table>
</body>

</div>