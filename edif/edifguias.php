<?
/*
 ----------------------------------------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Emitir Guias Confederativa/Assistencial do Cadastro Empresa
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/12/2007 

 DEUS SEJA LOUVADO
 ----------------------------------------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include_once('../sql_injection.php');

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_EDIF");

if ($deixar_1 == "NAO"){
	
    echo "              <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			body { background-image: url('../$logo_sis');
                   background-attachment: fixed }
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			

			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** <font color = #FF0000> ERRO ACESSO N�O PERMITIDO !!!</font> ***<br>
				                     
									 <font face=arial>Usu�rio sem Permiss�o</b>
			<table align=center>
			<form method='POST' action='../avaleht.php'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>
";
	        exit();
}	

?>

<script language='javascript'> 

 

function janelaSecundaria (URL){ 
   window.open(URL,"janela1","width=800,height=600,resizable=YES,status=NO,Scrollbars=YES,location=NO,menubar=NO,toolbar=NO"); 
} 

</script> 

<html>

<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

</HEAD>

<?

define ("vencto",   "$vencto");
define ("rest2",    "$rest2");
define ("nudoc",    "$nudoc");
define ("sacado",   "$sacado");
define ("CNPJ",     "$CNPJ");
define ("endereco", "$endereco");
define ("bairro",   "$bairro");
define ("cidade",   "$cidade");
define ("cep",      "$cep");
define ("estado",   "$estado");
define ("tipo",     "$tipo");


// Abre Conex�o com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


// Resgata Secao
@session_start();
$Cod_2 = $_SESSION['navega'];

// retorna uma pesquisa

$consulta  = "SELECT * FROM edificios Where id = '". anti_sql_injection($Cod_2) ."'";

$resultado = @mysql_query($consulta)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Registro N�o Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='consulta.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

$row = @mysql_fetch_array($resultado);

$id       = @$row["id"];
$cod      = @$row["COD"];
$data     = @$row["DATA"];
$cond     = @$row["COND"];
$nome     = @$row["NOME"];
$rua      = @$row["RUA"];
$endereco = @$row["ENDERECO"];
$numero   = @$row["NUMERO"];
$bairro   = @$row["BAIRRO"];
$cidade   = @$row["CIDADE"];
$cep      = @$row["CEP"];
$zona     = @$row["ZONA"];
$adm      = @$row["ADM"];
$ativ     = @$row["ATIV"];
$cgc      = @$row["CGC"];
$fone     = @$row["FONE"];
$uf       = @$row["UF"]; 
$tipoimov = @$row["TIPOIMOV"];
$obs      = @$row["OBS"];
$cnpj     = @$row["CGC"];
$nuemp    = @$row["NUEMP"];


// Salva Secao
@session_start();
$_SESSION['navega'] = $id;


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
eval('document.form1.' + nextfield + '.focus()');
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

document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
   
   if (event.keyCode == 27) 
   {
		window.location="cadastro.php?Cod_xx=<?=$id;?>";
   }
   
}
//-->
</script>

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>

<br/>
<br/>
<body onload="document.form1.valor.focus();">

<form name="form1" type="hidden" method="POST" action="novo.php?ti_wy=01" target="new">

<br/>                            

<table  width="1001"   style="height:440px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 392px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 454 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 454 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 454 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 77px; HEIGHT: 37px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 656 - 1, 35 - 1);
  Shape2_Canvas.fillRect(1, 1, 656 - 1 + 1, 35 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 656 - 1 + 1, 35 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 633px; POSITION: absolute; TOP: 90px; HEIGHT: 22px">
<div id="Label1" style=" font-family: Verdana; font-size: 14px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:22px;width:633px;"  align="Center"   ><STRONG>IMPRESS�O DE GUIAS C/CODIGO DE BARRAS</STRONG>&nbsp;</div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 3; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 116px; HEIGHT: 244px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 336 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 336 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 336 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 4; LEFT: 181px; WIDTH: 64px; POSITION: absolute; TOP: 127px; HEIGHT: 20px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:20px;width:64px;"   ><STRONG>Valor.:</STRONG></div>
</div>
<div id="valor_outer" style="Z-INDEX: 5; LEFT: 349px; WIDTH: 111px; POSITION: absolute; TOP: 122px; HEIGHT: 26px">
<input type="text" id="valor" name="valor" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:111px;" tabindex="0"  onfocus="this.className='anormal'" onblur="this.className='normal'"  />
</div>
<div id="Label3_outer" style="Z-INDEX: 6; LEFT: 181px; WIDTH: 126px; POSITION: absolute; TOP: 153px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:126px;"   ><STRONG>Vencimento.:</STRONG></div>
</div>
<div id="vencto_outer" style="Z-INDEX: 7; LEFT: 349px; WIDTH: 111px; POSITION: absolute; TOP: 147px; HEIGHT: 26px">
<input type="text" id="vencto" name="vencto" value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:111px;" onfocus="this.className='anormal'" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.form1, 'vencto', '99/99/9999', event);"  tabindex="0"    />
</div>

<div id="Label3_outer" style="Z-INDEX: 6; LEFT: 513px; WIDTH: 126px; POSITION: absolute; TOP: 153px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:126px;"   ><STRONG>Instru��o.:</STRONG></div>
</div>
<div id="vencto_outer" style="Z-INDEX: 7; LEFT: 666px; WIDTH: 111px; POSITION: absolute; TOP: 147px; HEIGHT: 26px">
<select type="text" id="instrucao_x" name="instrucao_x" value="<?=$instrucao_x;?>" onfocus="this.className='anormal'" onblur="this.className='normal'"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:159px;"   tabindex="0"    />

<option value="1"> 1 (Sindical)</option>
<option value="2"> 2 (Sindical Feder��o)</option>
<option value="3"> 3 (Confederativa)</option>
<option value="4" selected > 4 (Assistencial)</option>
<option value="5"> 5 (Acordo)</option>
<option value="6"> 6 (Assistencial antiga)</option>
<option value="7"> 7 (Novo Acordo)</option>
<option value="9"> 9 (Confederativa Antiga)</option>
<option value="10"> 10 (Assistencial Antiga)</option>

</select>

</div>


<div id="Label4_outer" style="Z-INDEX: 8; LEFT: 181px; WIDTH: 171px; POSITION: absolute; TOP: 178px; HEIGHT: 19px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>Numero Documento.:</STRONG></div>
</div>
<div id="nudoc_outer" style="Z-INDEX: 9; LEFT: 349px; WIDTH: 88px; POSITION: absolute; TOP: 172px; HEIGHT: 26px">
<input type="text" id="nudoc" name="nudoc" value="<?=$cod;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:88px;"  disabled tabindex="0"    />

<input type="hidden" id="nudoc" name="nudoc" value="<?=$cod;?>"/>

</div>

<div id="Label15_outer" style="Z-INDEX: 28; LEFT: 513px; WIDTH: 180px; POSITION: absolute; TOP: 177px; HEIGHT: 19px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:180px;"   ><STRONG>Tipo Contribui��o.:</STRONG></div>
</div>
<div id="tipo_outer" style="Z-INDEX: 29; LEFT: 666px; WIDTH: 159px; POSITION: absolute; TOP: 174px; HEIGHT: 24px">
<select name="tipo" id="tipo" size="1" onfocus="this.className='anormal'" onblur="this.className='normal'" style=" font-family: Verdana; font-size: 14px;  height:22px;width:159px;"   tabindex="0"   >
<option value="Assistencial" selected> Assistencial </option>
<option value="Confederativa"> Confederativa </option>

</select>
</div>

<div id="Label5_outer" style="Z-INDEX: 10; LEFT: 181px; WIDTH: 171px; POSITION: absolute; TOP: 203px; HEIGHT: 19px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>Nome/Raz�o Social.:</STRONG></div>
</div>
<div id="sacado_outer" style="Z-INDEX: 11; LEFT: 349px; WIDTH: 475px; POSITION: absolute; TOP: 197px; HEIGHT: 26px">
<input type="text" id="sacado" name="sacado" value="<?=Trim($cond)."  ";?><?=Trim($nome);?>" onfocus="this.className='anormal'" onblur="this.className='normal'" style=" font-family: Verdana; font-size: 14px;  height:25px;width:475px;"  tabindex="0"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 12; LEFT: 181px; WIDTH: 171px; POSITION: absolute; TOP: 228px; HEIGHT: 19px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>CNPJ/CEI.:</STRONG></div>
</div>
<div id="CNPJ_outer" style="Z-INDEX: 13; LEFT: 349px; WIDTH: 211px; POSITION: absolute; TOP: 222px; HEIGHT: 26px">
<input type="text" id="CNPJ" name="CNPJ" value="<?=$cnpj;?>" onfocus="this.className='anormal'" onblur="this.className='normal'" style=" font-family: Verdana; font-size: 14px;  height:25px;width:211px;"   tabindex="0"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 14; LEFT: 181px; WIDTH: 171px; POSITION: absolute; TOP: 253px; HEIGHT: 19px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>Endere�o.:</STRONG></div>
</div>
<div id="endereco_outer" style="Z-INDEX: 15; LEFT: 349px; WIDTH: 475px; POSITION: absolute; TOP: 247px; HEIGHT: 26px">
<input type="text" id="endereco" name="endereco" value="<?=Trim($rua)."  ";?><?=Trim($endereco).", ";?><?=Trim($numero);?>" onfocus="this.className='anormal'" onblur="this.className='normal'" style=" font-family: Verdana; font-size: 14px;  height:25px;width:475px;"   tabindex="0"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 16; LEFT: 181px; WIDTH: 171px; POSITION: absolute; TOP: 278px; HEIGHT: 19px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>Bairro.:</STRONG></div>
</div>
<div id="bairro_outer" style="Z-INDEX: 17; LEFT: 349px; WIDTH: 211px; POSITION: absolute; TOP: 272px; HEIGHT: 26px">
<input type="text" id="bairro" name="bairro" value="<?=$bairro;?>" onfocus="this.className='anormal'" onblur="this.className='normal'" style=" font-family: Verdana; font-size: 14px;  height:25px;width:211px;"   tabindex="0"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 18; LEFT: 181px; WIDTH: 171px; POSITION: absolute; TOP: 303px; HEIGHT: 19px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>Cidade.:</STRONG></div>
</div>
<div id="cidade_outer" style="Z-INDEX: 19; LEFT: 349px; WIDTH: 211px; POSITION: absolute; TOP: 297px; HEIGHT: 26px">
<input type="text" id="cidade" name="cidade" value="<?=$cidade;?>" onfocus="this.className='anormal'" onblur="this.className='normal'" style=" font-family: Verdana; font-size: 14px;  height:25px;width:211px;"   tabindex="0"    />
</div>
<div id="Label10_outer" style="Z-INDEX: 20; LEFT: 181px; WIDTH: 171px; POSITION: absolute; TOP: 329px; HEIGHT: 19px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>CEP.:</STRONG></div>
</div>
<div id="cep_outer" style="Z-INDEX: 21; LEFT: 349px; WIDTH: 123px; POSITION: absolute; TOP: 323px; HEIGHT: 26px">
<input type="text" id="cep" name="cep" value="<?=$cep;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:123px;" onfocus="this.className='anormal'" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.form1, 'cep', '99999-999', event);"  tabindex="0"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 22; LEFT: 622px; WIDTH: 73px; POSITION: absolute; TOP: 329px; HEIGHT: 19px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:73px;"   ><STRONG>Estado.:</STRONG></div>
</div>
<div id="estado_outer" style="Z-INDEX: 23; LEFT: 700px; WIDTH: 59px; POSITION: absolute; TOP: 324px; HEIGHT: 28px">
<select name="estado" id="estado" size="1" onfocus="this.className='anormal'" onblur="this.className='normal'" style=" font-family: Verdana; font-size: 14px;  height:26px;width:59px;"   tabindex="0">

<option value="SP" selected> SP </option>
            <option value="AC"> AC </option>
            <option value="AL"> AL </option>
            <option value="AM"> AM </option>
            <option value="AP"> AP </option>
            <option value="BA"> BA </option>
            <option value="CE"> CE </option>
            <option value="DF"> DF </option>
            <option value="ES"> ES </option>
            <option value="GO"> GO </option>
            <option value="MA"> MA </option>
            <option value="MG"> MG </option>
            <option value="MS"> MS </option>
            <option value="MT"> MT </option>
            <option value="PA"> PA </option>
            <option value="PB"> PB </option>
            <option value="PE"> PE </option>
            <option value="PI"> PI </option>
            <option value="PR"> PR </option>
            <option value="RN"> RN </option>
            <option value="RO"> RO </option>
            <option value="RR"> RR </option>
            <option value="RJ"> RJ </option>
            <option value="RS"> RS </option>
            <option value="SC"> SC </option>
            <option value="SE"> SE </option>
            <option value="TO"> TO </option>
</select>
</div>
<div id="Shape4_outer" style="Z-INDEX: 24; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 456px; HEIGHT: 41px">
<script type="text/javascript">
  var Shape4_Canvas = new jsGraphics("Shape4_outer");
  Shape4_Canvas.setColor("#FFFFFF");
  Shape4_Canvas.fillRect(1, 1, 656 - 1, 39 - 1);
  Shape4_Canvas.fillRect(1, 1, 656 - 1 + 1, 39 - 1 + 1);
  Shape4_Canvas.setStroke(1);
  Shape4_Canvas.setColor("<?=$color_bor;?>");
  Shape4_Canvas.drawRect(1, 1, 656 - 1 + 1, 39 - 1 + 1);
  Shape4_Canvas.paint();
</script>

</div>
<div id="Label12_outer" style="Z-INDEX: 25; LEFT: 469px; WIDTH: 171px; POSITION: absolute; TOP: 127px; HEIGHT: 19px">
<div id="Label12" style=" font-family: Verdana; font-size: 13px; color: #000000;font-weight: normal; height:19px;width:171px;"   > <STRONG># Ex: "0000,00"</STRONG> </div>
</div>
<div id="Label13_outer" style="Z-INDEX: 26; LEFT: 563px; WIDTH: 261px; POSITION: absolute; TOP: 227px; HEIGHT: 19px">
<div id="Label13" style=" font-family: Verdana; font-size: 13px; color: #000000;font-weight: normal; height:19px;width:261px;"   > <STRONG># Ex: "00.000.000/0000-00"</STRONG> </div>
</div>
<div id="Label14_outer" style="Z-INDEX: 27; LEFT: 477px; WIDTH: 139px; POSITION: absolute; TOP: 327px; HEIGHT: 19px">
<div id="Label14" style=" font-family: Verdana; font-size: 13px; color: #000000;font-weight: normal; height:19px;width:139px;"   > <STRONG># Ex: "00000-000"</STRONG> </div>
</div>

<div id="Label10_outer" style="Z-INDEX: 20; LEFT: 181px; WIDTH: 171px; POSITION: absolute; TOP: 352px; HEIGHT: 19px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>E-Mail.:</STRONG></div>
</div>

<div id="obs_outer" style="Z-INDEX: 34; LEFT: 349px; WIDTH: 153px; POSITION: absolute; TOP: 350px; HEIGHT: 26px">
<input type="text" id="email" name="email" value="" onfocus="this.className='anormal'" onblur="this.className='normal'" style=" font-family: Verdana; font-size: 14px;  height:26px;width:475px;"/>
</div>

<div id="Label10_outer" style="Z-INDEX: 20; LEFT: 181px; WIDTH: 171px; POSITION: absolute; TOP: 377px; HEIGHT: 19px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>Texto do E-Mail.:</STRONG></div>
</div>

<div id="obs_outer" style="Z-INDEX: 34; LEFT: 349px; WIDTH: 475px; POSITION: absolute; TOP: 377px; HEIGHT: 70px">
<textarea id="mensagem" name="mensagem" onfocus="this.className='anormal'" onblur="this.className='normal'" style=" font-family: Verdana; font-size: 14px;  height:70px;width:475px;"     wrap="virtual"></textarea>
</div>


</td></tr>
</table>

<!--
          <div style="Z-INDEX: 34; LEFT: 400px; WIDTH: 544px; POSITION: absolute; TOP: 369px; HEIGHT: 80px">
          <table border='0' aling=center>
          <td>
          <input type='radio' Name='recerber'  Value='1'            /><b>Enviar por Email</b>
          <input type='radio' Name='recerber'  Value='2'  checked   ><b>Nao Enviar por Email</b>
          </table>
          </div>          
-->


<div style="Z-INDEX: 34; LEFT: 180px; WIDTH: 544px; POSITION: absolute; TOP: 464px; HEIGHT: 80px">

<table border='0' aling=center>
          <td> </td>

          <td><input type="submit" value="Imprimir" name="acao" style="font-family: Verdana; font-size: 10pt; font-weight:bold; color:000000;background:url(../imagens/botaoazul01.PNG);border=0;width:92;"/>
          <td><input type="submit" value="Email" name="acao" style="font-family: Verdana; font-size: 10pt; font-weight:bold; color:000000;background:url(../imagens/botaoazul01.PNG);border=0;width:92;"/></td>

         </form>
         </body>

          <form method="POST" action="ver_email_enviado.php?Cod_xx=<?=$id;?>">
          <td><input type=image name="ver_email" src="../imagens/botaoazul3.PNG"></td>
          </form>

          <form method="POST" action="cadastro.php?Cod_xx=<?=$id;?>">
          <td><input type=image name="socios" src="../imagens/botaoazul9.PNG"></td>
          </form>


</table>
</div>

<div style="Z-INDEX: 35; LEFT: 800px; WIDTH: 25px; POSITION: absolute; TOP: 460px; HEIGHT: 35px" align="center">
<img id="Image3" src="../imagens/vacina.JPG"  width="25"  height="35"  border="0"       />
</div>

</html>
<script language="javascript">
<!--
 
//-->
</script>

