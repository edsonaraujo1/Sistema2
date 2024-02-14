<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout Cadastro Alterar
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include("../conexao.php");
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);

// Abre Tabela Tenporaria

$consulta0  = "SELECT * FROM $nome3 WHERE Nome1 = '$nome3'";
	
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

$menssagens = "* * * Alterar * * *";

// Abrir tabela Senha

$tabela_1 = strtoupper('email_boletim');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];


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
nextfield = "Edit2";
netscape = "";
ver = navigator.appVersion; len = ver.length;
function keyDown(DnEvents) {
k = (netscape) ? DnEvents.which : window.event.keyCode;
if (k == 13) {
if (nextfield == 'done') {
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
		document.getElementById("Edit2").focus();	
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

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="foco();" >
<form style="margin-bottom: 0" id="Form1" name="Form1" method="post"  action="admslayout.php">
<div align="center" style="Z-INDEX: 0; LEFT: 142px; POSITION: absolute;  TOP: 39px;"> 
  
  <img src="../imagens/px1.gif" width="10" height="20">
  <table width="697" border="16" bordercolor="<?php echo $color_bor ?>" bgcolor="#FFFFFF">
    <tr>
      <td><div align="center">        
        <table width="100%" border="0">
          <tr>
            <td width="64%" height="42"><div align="left"><b><font size="5" face="Verdana" color="<?php echo $color_bor ?>">Cadastro de E-Mails </font></b></div></td>
            <td width="36%"><div align="center"><b><font size="2" face="Verdana"><?php echo $menssagens ?></font></b></div></td>
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
              <td width="25%" class="style3"><div align="right"><b><font size="2" face="Verdana">Codigo.: </font></b></div></td>
              <td width="75%"><div align="left">
                <input name="Edit1" type="text" disabled id="codigo" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px;" value="<?php echo $Edit1 ?>" onfocus="this.className='anormal'; nextfield ='Edit2';" onblur="this.className='normal'"  onchange="Salva1(this.value)">
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Nome .:</font></b></div></td>
              <td><div align="left">
                  <input name="Edit2" type="text"  id="nome" style=" font-family: Verdana; font-size: 14px;  height:23px;width:460px;" value="<?php echo $Edit2 ?>" onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'"  onchange="Salva2(this.value)">
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">E-Mail.:</font></b></div></td>
              <td><div align="left">
                  <input name="Edit3" type="text"  id="email" style=" font-family: Verdana; font-size: 14px;  height:23px;width:460px;" value="<?php echo $Edit3 ?>" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'"  onchange="Salva3(this.value)">
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Categoria.:</font></b></div></td>
              <td><div align="left">
                  <select name="Edit4" type="text"  id="categoria" style=" font-family: Verdana; font-size: 14px;  height:23px;width:256px;" value="<?php echo $Edit4 ?>" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'"  onchange="Salva4(this.value)" >
                  
<?php

if (!empty($Edit4))
{
?>	
	        <option value="<?php echo $Edit4 ?>"> <?php echo $Edit4 ?> </option>
            <option value="WEB SITE">        WEB SITE        </option>
            <option value="DIRETORES">       DIRETORES       </option>
            <option value="SOCIOS">          SOCIOS          </option>
            <option value="SINDICOS">        SINDICOS        </option>
            <option value="ADMINISTRADORAS"> ADMINISTRADORAS </option>
            <option value="SINDICATOS">      SINDICATOS      </option>
            <option value="OUTROS">          OUTROS          </option>
<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="WEB SITE">        WEB SITE        </option>
            <option value="DIRETORES">       DIRETORES       </option>
            <option value="SOCIOS">          SOCIOS          </option>
            <option value="SINDICOS">        SINDICOS        </option>
            <option value="ADMINISTRADORAS"> ADMINISTRADORAS </option>
            <option value="SINDICATOS">      SINDICATOS      </option>
            <option value="OUTROS">          OUTROS          </option>
<?php            
 }
?>

</select>
                  
                  
                  
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Enviado.:</font></b></div></td>
              <td><div align="left">
                  <input name="Edit5" type="text"  id="situacao" style=" font-family: Verdana; font-size: 14px;  height:23px;width:156px;" value="<?php echo $Edit5 ?>" maxlength="20" onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'"  onchange="Salva5(this.value)" >
                  <img src="../imagens/px1.gif" width="10" height="10" border="0"><b><font size="2" face="Verdana">em .:
                  <input name="Edit6" type="text"  id="data" style=" font-family: Verdana; font-size: 14px;  height:23px;width:100px;" value="<?php echo $Edit6 ?>" maxlength="10"  onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'"  onchange="Salva6(this.value)">
                  </font></b></div></td>
            </tr>
            <tr>
              <td valign="top" class="style3"><div align="right"><b><font size="2" face="Verdana">Historico.:</font></b></div></td>
              <td><div align="left">                  
                <textarea name="Edit7" cols="55" rows="5"  id="obs" style=" font-family: Verdana; font-size: 14px;  width:460px;" onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"  onchange="Salva7(this.value)" ><?php echo $Edit7 ?> 
                </textarea>
              </div></td>
            </tr>
          </form>
        </table>
        <img src="../imagens/px1.gif" width="10" height="4">
		
		<table width="633" border="0">
          <tr>
            <td width="4"><img src="../imagens/px1.gif" width="15" height="1"></td>
            <td width="590"><div align="center">
            



			<?php
			include('botoes_up.php');
			?>



                
                
            </div></td>
            <td width="33" valign="bottom"><img src="../imagens/vacina.JPG" width="27" height="38"></td>
          </tr>
        </table>
        
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
