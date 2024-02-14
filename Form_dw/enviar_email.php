<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<?
// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

//require("../logar.php");

require("../menu.php");

$nome3 = $_SESSION["nome_log"];

$mensagem = "  ";

require("../funcoes2.php");


// salva Secao
session_start();
$Edit2_y = $_SESSION['Codigo_ed'];
$texto_3 = $_SESSION['Nome_ed'];


// Resgata Sessao
session_name("Val_Email");
session_start();

$Edit1   = $_SESSION['Edit1e'];
$Edit2   = $_SESSION['Edit2e'];
$Edit3   = $_SESSION['Edit3e']; 
$Edit4   = $_SESSION['Edit4e'];
$Edit5   = $_SESSION['Edit5e'];
$Edit6   = $_SESSION['Edit6e'];
$Edit7   = $_SESSION['Edit7e'];
$Edit8   = $_SESSION['Edit8e'];
$Edit9   = $_SESSION['Edit9e'];
$Edit10  = $_SESSION['Edit10e'];
$Edit11  = $_SESSION['Edit11e'];
$Edit12  = $_SESSION['Edit12e'];
$Edit13  = $_SESSION['Edit13e'];
$Edit14  = $_SESSION['Edit14e'];
$Edit15  = $_SESSION['Edit15e'];

if (empty($Edit2))
{
	$Edit2 = $Edit2_y;
}

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

if ($Edit1 == "EDIFICIOS")
{

   $consultaxx  = "SELECT * FROM edificios WHERE COD = '$Edit3'";
     
   $resultadoxx = @mysql_query($consultaxx);

   $rowxx = @mysql_fetch_array($resultadoxx);

   $id       = @$rowxx["id"];
   $cod_ED   = @$rowxx["COD"];
   $texto_1  = trim(@$rowxx["COND"].@$rowxx["NOME"]);
   $cnpj     = @$rowxx["CGC"];
	
}else{
	
   $consultaxx  = "SELECT * FROM adms WHERE cod = '$Edit3'";
	
   $resultadoxx = @mysql_query($consultaxx);

   $rowxx = @mysql_fetch_array($resultadoxx);

   $id_adms   = @$rowxx["id"];
   $cod_adms  = @$rowxx["cod"];
   $texto_1   = @$rowxx["nomeadm"];
   $cnpj_adms = @$rowxx["cgc"];

}

?>
<html>
<head>
<title><?=$Titulo;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<style type="text/css">
<!--
.style1 {
	font-family: Arial;
	font-weight: bold;
	font-size: 18px;
}
.style3 {
	color: #6699FF;
	font-size: 21px;
}
.style4 {font-size: 16px}
.style6 {font-family: Arial; font-weight: bold; font-size: 14px; }
.style7 {
	font-size: 23px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style8 {color: #FF0000}
.style10 {color: #FF0000; font-weight: bold; }
-->
</style>
</head>


        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit1").focus();	
		}
		</script>
<?

if (!empty($Edit1)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit2").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit2)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit3").focus();	
		}
		
		</script>
		<?
}

if (!empty($Edit3)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit4").focus();	
		}
		
		</script>
		<?
}

if (!empty($Edit4)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit5").focus();	
		}
		
		</script>
		<?
}

if (!empty($Edit5)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit6").focus();	
		}
		
		</script>
		<?
}

if (!empty($Edit6)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit7").focus();	
		}
		
		</script>
		<?
}

if (!empty($Edit7)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit7").focus();	
		}
		
		</script>
		<?
}

?>

<script language="JavaScript">
<!-- Begin
nextfield = "Edit1";
netscape = "";
ver = navigator.appVersion; len = ver.length;
function keyDown(DnEvents) {
k = (netscape) ? DnEvents.which : window.event.keyCode;
if (k == 13) {
if (nextfield == 'done') {
return false;
} else {
eval('document.Unit5.' + nextfield + '.focus()');
return false;}}}
document.onkeydown = keyDown;
if (netscape) document.captureEvents(Event.KEYDOWN|Event.KEYUP);
// End -->

function txtBoxFormat(objForm, strField, sMask, evtKeyPress) {
var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;
if(document.all) { 
nTecla = evtKeyPress.keyCode; }
else if(document.layers) { 
nTecla = evtKeyPress.which;}
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

<script language="JavaScript">
var copytoclip=1
function HighlightAll(theField) {
var tempval=eval("document."+theField)
tempval.focus()
tempval.select()
 if (document.all&&copytoclip==1){
  therange=tempval.createTextRange()
  therange.execCommand("Copy")
  window.status="Conteúdo selecionado e copiado para a área de transferência!"
  setTimeout("window.status=''",2400);
  }
}

function highlight(field) {
       field.focus();
       field.select();
}

function goToURL() { window.location = "javascript:HighlightAll('forms[0].Edit1')"; }
</script>

<script LANGUAGE="JavaScript">
<!-- Begin
nextfield = "Edit1";
netscape = "";
ver = navigator.appVersion; len = ver.length;
function keyDown(DnEvents) {
k = (netscape) ? DnEvents.which : window.event.keyCode;
if (k == 13) {
if (nextfield == 'done') {
return false;
} else {
eval('document.form1.' + nextfield + '.focus()');
return false;}}}
document.onkeydown = keyDown;
if (netscape) document.captureEvents(Event.KEYDOWN|Event.KEYUP);
// End -->
</script>

<body>
<table width="436" height="202" border="15" align="center" cellspacing="0" bordercolor="#6699FF">
  <tr>
    <td valign="top"><div align="center">
      <table width="100%" border="1" cellspacing="0" bordercolor="#6699FF">
	  <form name="form1"  method="post"  action="exemplos.php">
        <tr>
          <td height="38" valign="top"><div align="left">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="34"><span class="style1"><span class="style3"><img src="../../novo/graphics/px1.gif" width="9" height="1"><span class="style7">Enviar Guias E-Mail</span></span> <span class="style4">(Recolhimento)</span></span></td>
              </tr>
            </table>
            </div></td>
        </tr>
        <tr>
          <td height="244" align="center" valign="top"><table width="100%" border="0">
            <tr>
              <td width="53%"><div align="left"><span class="style6">Enviar e-mail Para: </span></div></td>
              <td width="47%"><div align="left">
                <select type="text" name="Edit1" value="<?=$Edit1;?>" onchange="Salva_email_1(this)">
				
				<?

				if (!empty($Edit1))
				{
				?>	

				
				            <option value="<?=$Edit1;?>"> <?=$Edit1;?> </option>
            				<option value="EDIFICIOS">      EDIFICIOS   </option>
            				<option value="ADMINISTRADORA"> ADMINISTRADORA </option>
            				
            	<?	

				}else{
					
				?>	
			
				
				            <option value=" ">  </option>
            				<option value="EDIFICIOS">      EDIFICIOS   </option>
            				<option value="ADMINISTRADORA"> ADMINISTRADORA </option>
				
				<?
				}
				?>
				
				</select>
              </div></td>
              </tr>
            <tr>
              <td><div align="left"><span class="style6">Tipo de Contribui&ccedil;&atilde;o: </span></div></td>
              <td><div align="left">
                <select type="text" name="Edit2" value="<?=$Edit2;?>" onchange="Salva_email_2(this)">
				
				
				<?

				if (!empty($Edit2))
				{
				?>	
				
							<option value="<?=$Edit2;?> ">  <?=$Edit2;?> </option>
            				<option value="SINDICAL">      SINDICAL   </option>
            				<option value="CONFEDERATIVA"> CONFEDERATIVA </option>
            				<option value="ASSISTENCIAL"> ASSISTENCIAL </option>
                <?
                }else{
                ?>
				
							<option value=" ">   </option>
            				<option value="SINDICAL">      SINDICAL   </option>
            				<option value="CONFEDERATIVA"> CONFEDERATIVA </option>
            				<option value="ASSISTENCIAL"> ASSISTENCIAL </option>
				
				<?	
                }
				?>
				</select>

              </div></td>
              </tr>
            <tr>
              <td><div align="left"><span class="style6">Vencimento.: </span></div></td>
              <td>                <div align="left">
                  <input name="Edit3" type="text" value="<?=$Edit3;?>" size="13" onchange="Salva_email_3(this)" onkeypress="return txtBoxFormat(document.form1, 'Edit3', '99/99/9999', event);"/>
				</div></td>
              </tr>
            <tr>
              <td align="left"><div align="left"><span class="style6">Instru&ccedil;&atilde;o da Guia.:</span></div></td>
              <td align="left"><div align="left">
</div>
              <div align="left">
			                <select type="text" name="Edit4" value="<?=$Edit4;?>" onchange="Salva_email_4(this)">
				
				
				<?

				if (!empty($Edit4))
				{
				?>	

				            <option value="<?=$Edit4;?>"> <?=$Edit4;?> </option>
							<option value="1">	1</option>
							<option value="2">  2 </option>
                            <option value="3">  3</option>
                            <option value="4">  4</option>
                            <option value="5">  5</option>
                            <option value="6">  6</option>
                            <option value="7">  7</option>
                <?
                }else{
                ?>	
                	
				            <option value=" ">  </option>
							<option value="1">	1</option>
							<option value="2">  2 </option>
                            <option value="3">  3</option>
                            <option value="4">  4</option>
                            <option value="5">  5</option>
                            <option value="6">  6</option>
                            <option value="7">  7</option>
                
                
				<?	
                }
                ?>
                </select>
              </div></td>
            </tr>
            <tr>
              <td align="left"><span class="style6">Entre com o Codigo.:</span></td>
              <td align="left">
			  
			<?
			
			if ($Edit1 == "EDIFICIOS")
			{
			?>
			  
			  <input name="Edit5" type="text" value="<?=$Edit5;?>" size="10" onchange="Salva_email_5(this)"/>
              <a href="javascript:janelaSecundaria4('edifconsulta.php')"><img src="../sindical_email/imagens/lupa.PNG" width="17" height="18" border="0"></a>
			  
			<?
			}else{
			?>

			  <input name="Edit5" type="text" value="<?=$Edit5;?>" size="10" onchange="Salva_email_5(this)" onclick="document.execCommand('Refresh');"/>
              <a href="javascript:janelaSecundaria4('admsconsulta.php')"><img src="../sindical_email/imagens/lupa.PNG" width="17" height="18" border="0"></a>


            <?
			}
			?>			  
			  </td>
            </tr>
            <tr>
              <td align="left"><span class="style6">Usar e-mail do Cadastro?</span></td>
              <td align="left"><select type="text" name="Edit6" value="<?=$Edit6;?>" onchange="Salva_email_6(this)" >
			  
			  				<option value="<?=$Edit6;?>"> <?=$Edit6;?> </option>
							<option value="SIM"> SIM  </option>
							<option value="NAO"> NAO  </option>

              </select></td>
            </tr>
          </table>
            <table width="100%" border="0">
              <tr>
                <td><div align="left"><span class="style6">Digite o E-mail</span></div></td>
              </tr>
              <tr>
                <td><input name="Edit7" type="text" value="<?=$Edit7;?>" size="65" onchange="Salva_email_7(this)"/></td>
              </tr>
              <tr>
                <td><div align="left"><span class="style6">Enviar para.: </span><span class="style10">
                  <?=$texto_1;?>
                </span><span class="style8">                </span></div></td>
              </tr>
            </table>
            <br/>            <br/>
			<input type=image name="guias" src="../sindical_email/imagens/botaoazul_enviar.PNG" width="92" height="22"/>
			<img src="../../novo/graphics/px1.gif" width="10" height="1">
            <a href='<?="../index.php";?>'><img src="../sindical_email/imagens/botaoazul33.PNG" width="92" height="22" border="0"></a><br>
            <img src="../../novo/graphics/px1.gif" width="10" height="12"></td>
        </tr>
		</form>
      </table>
    </div></td>
  </tr>
</table>
<div align="center"></div>
</body>
</html>

<?

Function retirar_ponto($var){

$var = str_replace(".",             "",$var);

return($var);
}

?>
<script>
function janelaSecundaria3 (URL){ 
   window.open(URL,"janela3","width=670,height=730,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

function janelaSecundaria4 (URL){ 
   window.open(URL,"janela2","width=690,height=235,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO");
} 

</script>

