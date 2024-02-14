<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout Cadastro Incluir
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

//// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include("../conexao.php");
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);

$nome3a = strtolower($nome3);


$consulta0  = "SELECT * FROM $nome3a WHERE Nome1 = '$nome3a'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$Edit1      = @$row0["Edit1"];
$Edit2		= @$row0["Edit2"];
$Edit3		= @$row0["Edit3"];
$Edit4		= @$row0["Edit4"];
$Edit5		= @$row0["Edit5"];
$Edit6		= @$row0["Edit6"];
$Edit7		= @$row0["Edit7"];
$Edit8		= @$row0["Edit8"];
$Edit9		= @$row0["Edit9"];
$Edit10		= @$row0["Edit10"];
$Edit11		= @$row0["Edit11"];
$Edit12		= @$row0["Edit12"];
$Edit13	    = @$row0["memo1"];
$alerta_1   = @$row0["mensage1"];
$categ_1    = @$row0["mensage2"];
$nome_do_edif = @$row0["mensage3"];
$nome_cad_si  = @$row0["mensage4"];

$alerta_1 = $alerta_1;
$nome2_adms = $nome_do_edif; 


$cami2 = '../imagens/fotos/Branco.bmp';  

$menssagens = "* * * Incluir * * *";

// Abrir tabela Senha

$tabela_1 = strtoupper('estoque');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3a' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

?>

<script language="javascript">
function mudacor(campoatual){
var cor = "#EAEAEA"
document.getElementById(campoatual).style.background = cor;
}
function voltacor(campoatual){

document.getElementById(campoatual).style.background = '';
}
</script>

<?php


if (!empty($Edit1)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit2").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit2)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit3").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit3)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit4").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit4)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit5").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit5)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit6").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit6)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit7").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit7)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit8").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit8)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit9").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit9)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit10").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit10)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit11").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit11)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit12").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit12)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit13").focus();	
		}
		
		</script>
		<?php
}
if (!empty($Edit13)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit13").focus();	
		}
		
		</script>
		<?php
}

?>
<script language="JavaScript">
<!-- Begin
nextfield = "Edit3";
netscape = "";
ver = navigator.appVersion; len = ver.length;
function keyDown(DnEvents) {
k = (netscape) ? DnEvents.which : window.event.keyCode;
if (k == 13) {
if (nextfield == '') {
return false;
} else {
eval('document.Form1.' + nextfield + '.focus()');
return false;}}}
document.onkeydown = keyDown;
if (netscape) document.captureEvents(Event.KEYDOWN|Event.KEYUP);
// End -->

function txtBoxFormat(objForm, strField, sMask, evtKeyPress) {
var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;

     if(document.all) { nTecla = evtKeyPress.keyCode; }
else if(document.getElementById) { nTecla = evtKeyPress.which; }

sValue = objForm[strField].value;
sValue = sValue.toString().replace( "-", "" );
sValue = sValue.toString().replace( "-", "" );
sValue = sValue.toString().replace( ".", "" );
sValue = sValue.toString().replace( ".", "" );
sValue = sValue.toString().replace( "/", "" );
sValue = sValue.toString().replace( "/", "" );
sValue = sValue.toString().replace( "(", "" );
sValue = sValue.toString().replace( "(", "" );
sValue = sValue.toString().replace( ")", "" );
sValue = sValue.toString().replace( ")", "" );
sValue = sValue.toString().replace( " ", "" );
sValue = sValue.toString().replace( " ", "" );
fldLen = sValue.length;
mskLen = sMask.length;
i = 0;
nCount = 0;
sCod = "";
mskLen = fldLen;
while (i <= mskLen) {
bolMask = ((sMask.charAt(i) == "-") || (sMask.charAt(i) == ".") || (sMask.charAt(i) == "/"))
bolMask = bolMask || ((sMask.charAt(i) == "(") || (sMask.charAt(i) == ")") || (sMask.charAt(i) == " "))
if (bolMask) {
sCod += sMask.charAt(i);
mskLen++; }
else {
sCod += sValue.charAt(nCount);
nCount++;
}
i++;
}
objForm[strField].value = sCod;
if (nTecla != 8) { 
if (sMask.charAt(i-1) == "9") { 
return ((nTecla > 47) && (nTecla < 58)); } 
else { 
return true;
} }
else {
return true;
}
}
// Fim
</script>


<script language="JavaScript"><!--

//document.onkeydown = keyCatcher;

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


        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit3").focus();	
		}
		
		</script>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>


<br/>
<img src="../imagens/px1.gif" width="15" height="23">
<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="foco();"  >

<div align="center">
  <table width="697" height="190" border="16" bordercolor="<?php echo $color_bor ?>" bgcolor="#FFFFFF">
    <tr>
      <td height="53"><table width="100%" border="0">
        <tr>
          <td width="64%" height="42"><div align="left"><b><font size="5" face="Verdana" color="<?php echo $color_bor ?>">Cadastro de Estoque</font></b></div></td>
          <td width="36%"><div align="center"><b><font size="2" face="Verdana">
              <?php echo $menssagens ?>
          </font></b></div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="688" border="0">
        <tr>
          <td width="569"><table width="100%" border="0" cellpadding="1" cellspacing="0">
            <form name="form1" method="post"  action="barcode1.php" target="new">
              <div align="left"></div>
              <tr>
                <td width="25%" class="style3"><div align="right"><b><font size="2" face="Verdana">Codigo.: </font></b></div></td>
                <td width="75%"><div align="left">
                    <input name="Edit1" type="text" disabled id="Edit1" onchange="Salva1(this.value)"  style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;" value="<?php echo $novo_1 ?>">
                    <img src="../imagens/px1.gif" width="10" height="10" border="0"><b><font size="2" face="Verdana">Data .:
                    <input name="Edit2" type="text" disabled id="Edit2" onchange="Salva2(this.value)" style=" font-family: Verdana; font-size: 14px;  height:23px;width:100px; background-color: #FFFFFF;" value="<?php echo $dat_insc ?>" maxlength="10" >
                </font></b> </div></td>
              </tr>
              <tr>
                <td class="style3"><div align="right"><b><font size="2" face="Verdana">Descri&ccedil;&atilde;o .:</font></b></div></td>
                <td><div align="left">
                    <input name="Edit3" type="text"  id="Edit3" onchange="Salva3(this.value)" style=" font-family: Verdana; font-size: 14px;  height:23px;width:460px" value="<?php echo $Edit3 ?>" onfocus="this.className='anormal'" onblur="this.className='normal'" >
                </div></td>
              </tr>
              <tr>
                <td class="style3"><div align="right"><b><font size="2" face="Verdana">Unidade.:</font></b></div></td>
                <td><div align="left">
                    <input name="Edit4" type="text"  id="Edit4" onchange="Salva4(this.value)" style=" font-family: Verdana; font-size: 14px;  height:23px;width:100px" onfocus="this.className='anormal'" onblur="this.className='normal'" value="<?php echo $Edit4 ?>" >
                    <img src="../imagens/px1.gif" width="10" height="10" border="0"><strong><font size="2" face="Verdana">Qtd.Estoq.:
                    <input name="Edit5" type="text"  id="Edit5" onchange="Salva5(this.value)" style=" font-family: Verdana; font-size: 14px;  height:23px;width:100px" onfocus="this.className='anormal'" onblur="this.className='normal'" value="<?php echo $Edit5 ?>" >
                    <img src="../imagens/px1.gif" width="10" height="10" border="0">Qtd.Min. :
                    <input name="Edit6" type="text"  id="Edit6" onchange="Salva6(this.value)" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px" onfocus="this.className='anormal'" onblur="this.className='normal'" value="<?php echo $Edit6 ?>"> 
                    </font></strong></div></td>
              </tr>
              <tr>
                <td class="style3"><div align="right"><b><font size="2" face="Verdana">Classe.:</font></b></div></td>
                <td><div align="left">
                    <input name="Edit7" type="text"  id="Edit7" onchange="Salva7(this.value)" style=" font-family: Verdana; font-size: 14px;  height:23px;width:156px" onfocus="this.className='anormal'" onblur="this.className='normal'" value="<?php echo $Edit7 ?>" >
                    <img src="../imagens/px1.gif" width="10" height="10" border="0"><strong><font size="2" face="Verdana">Vencimento.: 
                    <input name="Edit8" type="text"  id="Edit8" onchange="Salva8(this.value)" style=" font-family: Verdana; font-size: 14px;  height:23px;width:100px" onfocus="this.className='anormal'" onblur="this.className='normal'" value="<?php echo $Edit8 ?>" >
                    </font></strong></div></td>
              </tr>
              <tr>
                <td class="style3"><div align="right"><b><font size="2" face="Verdana">Fornecedor.:</font></b></div></td>
                <td><div align="left">
                    <input name="Edit9" type="text"  id="Edit9" onchange="Salva9(this.value)" style=" font-family: Verdana; font-size: 14px;  height:23px;width:460px" onfocus="this.className='anormal'" onblur="this.className='normal'" value="<?php echo $Edit9 ?>" maxlength="10" >
                    <b><font size="2" face="Verdana"> </font></b></div></td>
              </tr>
              <tr>
                <td class="style3"><div align="right"><b><font size="2" face="Verdana">Refer&ecirc;ncia.:</font></b></div></td>
                <td><div align="left">
                    <input name="Edit10" type="text"  id="Edit10" onchange="Salva10(this.value)" style=" font-family: Verdana; font-size: 14px;  height:23px;width:256px" onfocus="this.className='anormal'" onblur="this.className='normal'" value="<?php echo $Edit10 ?>" >
                </div></td>
              </tr>
              <tr>
                <td class="style3"><div align="right"><b><font size="2" face="Verdana">Saldo.:</font></b></div></td>
                <td><div align="left">
                    <input name="Edit11" type="text"  id="Edit11" onchange="Salva11(this.value)" style=" font-family: Verdana; font-size: 14px;  height:23px;width:200px" onfocus="this.className='anormal'" onblur="this.className='normal'" value="<?php echo $Edit11 ?>" >
                    <img src="../imagens/px1.gif" width="10" height="10" border="0"><strong><font size="2" face="Verdana">Valor.:
                    <input name="Edit12" type="text"  id="Edit12" onchange="Salva12(this.value)" style=" font-family: Verdana; font-size: 14px;  height:23px;width:156px" onfocus="this.className='anormal'" onblur="this.className='normal'" value="<?php echo $Edit12 ?>" >
                    </font></strong></div></td>
              </tr>
              <tr>
                <td valign="top" class="style3"><div align="right"><b><font size="2" face="Verdana">Observa&ccedil;&otilde;es.:</font></b></div></td>
                <td><div align="left">
                			                 
                <textarea name="obs" cols="55" rows="5"  id="obs" onchange="Salva13(this.value)" style=" font-family: Verdana; font-size: 14px;  width:460px" onfocus="this.className='anormal'" onblur="this.className='normal'" ><?php echo $Edit13 ?>
                </textarea>

                </div></td>
              </tr>
            </form>
          </table></td>
          <td valign="top"><div align="center"><img src="../imagens/fotos/Branco.bmp" width="102" height="102"><br>
            <br>
              <a href="captura.php">Incluir Foto</a>          </div></td>
        </tr>
      </table>        
        <table width="633" border="0" align="center">
        <tr>
          <td width="4"><img src="../imagens/px1.gif" width="15" height="1"></td>
          <td width="590"><div align="center">
              <?php
			include('botoes_ins.php');
			?>
          </div></td>
          <td width="33" valign="bottom"><img src="../imagens/vacina.JPG" width="27" height="38"></td>
        </tr>
      </table>
      </td>
    </tr>
  </table>
</div>
</body>




</html>
<script>
function janelaSecundaria (URL){ 
   window.open(URL,"janela2","width=690,height=235,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 
</script>
