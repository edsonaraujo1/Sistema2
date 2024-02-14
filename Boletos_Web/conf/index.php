<?
/*
 ----------------------------------------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Emitir Guias Sindical do Cadastro Empresa
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 22/10/2008 

 DEUS SEJA LOUVADO
 ----------------------------------------------------------------------------------
*/

?>

<html>
<head>
<TITLE>Sindificios - Boleto Bancário Banco do Brasil</TITLE>
<link rel="shortcut icon" href="imagens/favicon.ico"/>
</head>
<style type=text/css>

body { background-image: url("imagens/logo2.PNG");}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

</html>

<?

define ("vencto",   "$vencto");
define ("rest2",    "$rest2");
//define ("nudoc",    "$nudoc");
define ("sacado",   "$sacado");
//define ("CNPJ",     "$CNPJ");
define ("endereco", "$endereco");
define ("bairro",   "$bairro");
define ("cidade",   "$cidade");
define ("cep",      "$cep");
define ("estado",   "$estado");
define ("tipo",     "$tipo");


// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);
// retorna uma pesquisa

include("funcoes2.php");

?>
<head>
<title>Sindificios - Boleto Bancário Banco do Brasil</title>
<link rel="shortcut icon" href="imagens/favicon.ico"/>
</head>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->

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

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>


<body onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="document.form1.valor.focus();">
<form name="form1" type="hidden" method="POST" action="edifguias2.php" target="new">


<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 149px; WIDTH: 724px; POSITION: absolute; TOP: 218px; HEIGHT: 392px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 360 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 360 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("#5A9CB1");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 360 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 182px; WIDTH: 658px; POSITION: absolute; TOP: 251px; HEIGHT: 37px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 656 - 1, 35 - 1);
  Shape2_Canvas.fillRect(1, 1, 656 - 1 + 1, 35 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("#5A9CB1");
  Shape2_Canvas.drawRect(1, 1, 656 - 1 + 1, 35 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 191px; WIDTH: 633px; POSITION: absolute; TOP: 264px; HEIGHT: 22px">
<div id="Label1" style=" font-family: Verdana; font-size: 14px; color: #5A9CB1; background-color: #FFFFFF;height:22px;width:633px;"  align="Center"   ><STRONG>IMPRESSÃO DE GUIAS C/CODIGO DE BARRAS</STRONG>&nbsp;</div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 3; LEFT: 182px; WIDTH: 658px; POSITION: absolute; TOP: 290px; HEIGHT: 244px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 242 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 242 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("#5A9CB1");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 242 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 4; LEFT: 189px; WIDTH: 64px; POSITION: absolute; TOP: 301px; HEIGHT: 20px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:20px;width:64px;"   ><STRONG>Valor.:</STRONG></div>
</div>
<div id="valor_outer" style="Z-INDEX: 5; LEFT: 357px; WIDTH: 111px; POSITION: absolute; TOP: 296px; HEIGHT: 26px">
<input type="text" id="valor" name="valor" value="" onfocus="this.className='anormal'; nextfield ='vencto';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:111px;"  tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 6; LEFT: 189px; WIDTH: 126px; POSITION: absolute; TOP: 327px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:126px;"   ><STRONG>Vencimento.:</STRONG></div>
</div>
<div id="vencto_outer" style="Z-INDEX: 7; LEFT: 357px; WIDTH: 111px; POSITION: absolute; TOP: 323px; HEIGHT: 26px">
<select type="text" id="vencto" name="vencto" value="" onfocus="this.className='anormal'; nextfield ='nudoc';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:111px;"   tabindex="0"    />

<option value="05/02/2011"selected> 05/02/2011 </option>

          <option value="05/02/2011"> 05/02/2011 </option>
          <option value="25/11/2010"> 25/11/2010 </option>
          <option value="05/11/2010"> 05/11/2010 </option>
          <option value="05/09/2010"> 05/09/2010 </option>
          <option value="05/06/2010"> 05/06/2010 </option>
          <option value="05/02/2010"> 05/02/2010 </option>
          <option value="05/09/2009"> 05/09/2009 </option>
          <option value="05/06/2009"> 05/06/2009 </option>          
          <option value="05/02/2009"> 05/02/2009 </option>
          
          <option value="05/11/2008"> 05/11/2008 </option>
		  <option value="05/09/2008"> 05/09/2008 </option>
          <option value="05/06/2008"> 05/06/2008 </option>
          <option value="05/02/2008"> 05/02/2008 </option>
          
          <option value="05/11/2007"> 05/11/2007 </option>
          <option value="05/09/2007"> 05/09/2007 </option>
          <option value="05/06/2007"> 05/06/2007 </option>
          <option value="05/02/2007"> 05/02/2007 </option>

          <option value="05/11/2006"> 05/11/2006 </option>
          <option value="05/09/2006"> 05/09/2006 </option>
          <option value="05/06/2006"> 05/06/2006 </option>
          <option value="05/02/2006"> 05/02/2006 </option>

          <option value="05/11/2005"> 05/11/2005 </option>
          <option value="05/09/2005"> 05/09/2005 </option>
          <option value="05/06/2005"> 05/06/2005 </option>
          <option value="05/02/2005"> 05/02/2005 </option>

          <option value="05/11/2004"> 05/11/2004 </option>
          <option value="05/09/2004"> 05/09/2004 </option>
          <option value="05/06/2004"> 05/06/2004 </option>
          <option value="05/02/2004"> 05/02/2004 </option>

          <option value="05/12/2003"> 05/12/2003 </option>
          <option value="05/10/2003"> 05/10/2003 </option>
          <option value="05/06/2003"> 05/06/2003 </option>
          <option value="05/02/2003"> 05/02/2003 </option>

          </select>


</div>
<div id="Label4_outer" style="Z-INDEX: 8; LEFT: 189px; WIDTH: 171px; POSITION: absolute; TOP: 352px; HEIGHT: 19px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>Numero Documento.:</STRONG></div>
</div>
<div id="nudoc_outer" style="Z-INDEX: 9; LEFT: 357px; WIDTH: 88px; POSITION: absolute; TOP: 346px; HEIGHT: 26px">
<input type="text" id="nudoc" name="nudoc" value="" onfocus="this.className='anormal'; nextfield ='sacado';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:88px;"  tabindex="0"    />
</div>

<div id="nudoc_outer2" style="Z-INDEX: 9; LEFT: 450px; WIDTH: 88px; POSITION: absolute; TOP: 349px; HEIGHT: 26px">

<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="javascript:;" onClick="MM_openBrWindow('help.php','','scrollbars=no,width=490,height=295,left=1o,top=10')"  ><img id="Image3" src="imagens/qmark.gif"  width="22"  height="22"  border="0"       /></a>
</div>
</div>

<div id="Label5_outer" style="Z-INDEX: 10; LEFT: 189px; WIDTH: 171px; POSITION: absolute; TOP: 377px; HEIGHT: 19px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>Nome/Razão Social.:</STRONG></div>
</div>
<div id="sacado_outer" style="Z-INDEX: 11; LEFT: 357px; WIDTH: 475px; POSITION: absolute; TOP: 371px; HEIGHT: 26px">
<input type="text" id="sacado" name="sacado" value="" onfocus="this.className='anormal'; nextfield ='CNPJ';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:475px;"     tabindex="0"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 12; LEFT: 189px; WIDTH: 171px; POSITION: absolute; TOP: 402px; HEIGHT: 19px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>CNPJ/CEI.:</STRONG></div>
</div>
<div id="CNPJ_outer" style="Z-INDEX: 13; LEFT: 357px; WIDTH: 211px; POSITION: absolute; TOP: 396px; HEIGHT: 26px">
<input type="text" id="CNPJ" name="CNPJ" value="" onfocus="this.className='anormal'; nextfield ='endereco';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:211px;" onkeypress="return txtBoxFormat(document.form1, 'CNPJ', '99.999.999/9999-99', event);" onchange="validaCNPJ(this)"   tabindex="0"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 14; LEFT: 189px; WIDTH: 171px; POSITION: absolute; TOP: 427px; HEIGHT: 19px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>Endereço.:</STRONG></div>
</div>
<div id="endereco_outer" style="Z-INDEX: 15; LEFT: 357px; WIDTH: 475px; POSITION: absolute; TOP: 421px; HEIGHT: 26px">
<input type="text" id="endereco" name="endereco" value="" onfocus="this.className='anormal'; nextfield ='bairro';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:475px;"     tabindex="0"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 16; LEFT: 189px; WIDTH: 171px; POSITION: absolute; TOP: 452px; HEIGHT: 19px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>Bairro.:</STRONG></div>
</div>
<div id="bairro_outer" style="Z-INDEX: 17; LEFT: 357px; WIDTH: 211px; POSITION: absolute; TOP: 446px; HEIGHT: 26px">
<input type="text" id="bairro" name="bairro" value="" onfocus="this.className='anormal'; nextfield ='cidade';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:211px;"     tabindex="0"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 18; LEFT: 189px; WIDTH: 171px; POSITION: absolute; TOP: 477px; HEIGHT: 19px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>Cidade.:</STRONG></div>
</div>
<div id="cidade_outer" style="Z-INDEX: 19; LEFT: 357px; WIDTH: 211px; POSITION: absolute; TOP: 471px; HEIGHT: 26px">
<input type="text" id="cidade" name="cidade" value="" onfocus="this.className='anormal'; nextfield ='cep';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:211px;"     tabindex="0"    />
</div>
<div id="Label10_outer" style="Z-INDEX: 20; LEFT: 189px; WIDTH: 171px; POSITION: absolute; TOP: 503px; HEIGHT: 19px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>CEP.:</STRONG></div>
</div>
<div id="cep_outer" style="Z-INDEX: 21; LEFT: 357px; WIDTH: 123px; POSITION: absolute; TOP: 497px; HEIGHT: 26px">
<input type="text" id="cep" name="cep" value="" onfocus="this.className='anormal'; nextfield ='estado';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:25px;width:123px;"     tabindex="0"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 22; LEFT: 630px; WIDTH: 73px; POSITION: absolute; TOP: 503px; HEIGHT: 19px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:73px;"   ><STRONG>Estado.:</STRONG></div>
</div>
<div id="estado_outer" style="Z-INDEX: 23; LEFT: 708px; WIDTH: 59px; POSITION: absolute; TOP: 498px; HEIGHT: 28px">
<select name="estado" id="estado" size="1" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:26px;width:59px;"   tabindex="0"   >

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
<div id="Shape4_outer" style="Z-INDEX: 24; LEFT: 182px; WIDTH: 658px; POSITION: absolute; TOP: 536px; HEIGHT: 41px">
<script type="text/javascript">
  var Shape4_Canvas = new jsGraphics("Shape4_outer");
  Shape4_Canvas.setColor("#FFFFFF");
  Shape4_Canvas.fillRect(1, 1, 656 - 1, 39 - 1);
  Shape4_Canvas.fillRect(1, 1, 656 - 1 + 1, 39 - 1 + 1);
  Shape4_Canvas.setStroke(1);
  Shape4_Canvas.setColor("#0000FF");
  Shape4_Canvas.drawRect(1, 1, 656 - 1 + 1, 39 - 1 + 1);
  Shape4_Canvas.paint();
</script>

</div>
<div id="Label12_outer" style="Z-INDEX: 25; LEFT: 477px; WIDTH: 171px; POSITION: absolute; TOP: 301px; HEIGHT: 19px">
<div id="Label12" style=" font-family: Verdana; font-size: 13px; color: #000000;font-weight: normal; height:19px;width:171px;"   >  <STRONG># Ex: "0000,00"</STRONG>  </div>
</div>
<div id="Label13_outer" style="Z-INDEX: 26; LEFT: 571px; WIDTH: 261px; POSITION: absolute; TOP: 401px; HEIGHT: 19px">
<div id="Label13" style=" font-family: Verdana; font-size: 13px; color: #000000;font-weight: normal; height:19px;width:261px;"   >  <STRONG># Ex: "00.000.000/0000-00"</STRONG>  </div>
</div>
<div id="Label14_outer" style="Z-INDEX: 27; LEFT: 485px; WIDTH: 139px; POSITION: absolute; TOP: 501px; HEIGHT: 19px">
<div id="Label14" style=" font-family: Verdana; font-size: 13px; color: #000000;font-weight: normal; height:19px;width:139px;"   >  <STRONG># Ex: "00000-000"</STRONG>  </div>
</div>
<div id="Label15_outer" style="Z-INDEX: 28; LEFT: 521px; WIDTH: 161px; POSITION: absolute; TOP: 351px; HEIGHT: 19px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:161px;"   ><STRONG>Tipo Contribuição.:</STRONG></div>
</div>
<div id="tipo_outer" style="Z-INDEX: 29; LEFT: 674px; WIDTH: 159px; POSITION: absolute; TOP: 348px; HEIGHT: 24px">
<select name="tipo" id="tipo" size="1" onfocus="this.className='anormal'; nextfield ='sacado';" onblur="this.className='normal'"   style=" font-family: Verdana; font-size: 14px;  height:22px;width:159px;"   tabindex="0"   >


          <option value="Confederativa"  selected> Confederativa </option>
          <option value="Assistencial"> Assistencial </option>

</select>
</div>
<div id="Shape5_outer" style="Z-INDEX: 30; LEFT: 111px; WIDTH: 786px; POSITION: absolute; TOP: 4px; HEIGHT: 225px">
<script type="text/javascript">
  var Shape5_Canvas = new jsGraphics("Shape5_outer");
  Shape5_Canvas.setColor("#FFFFFF");
  Shape5_Canvas.fillRect(16, 16, 754 - 16, 193 - 16);
  Shape5_Canvas.fillRect(16, 16, 754 - 16 + 1, 193 - 16 + 1);
  Shape5_Canvas.setStroke(16);
  Shape5_Canvas.setColor("#5A9CB1");
  Shape5_Canvas.drawRect(16, 16, 754 - 16 + 1, 193 - 16 + 1);
  Shape5_Canvas.paint();
</script>

</div>
<div id="Shape6_outer" style="Z-INDEX: 31; LEFT: 144px; WIDTH: 720px; POSITION: absolute; TOP: 37px; HEIGHT: 159px">
<script type="text/javascript">
  var Shape6_Canvas = new jsGraphics("Shape6_outer");
  Shape6_Canvas.setColor("#FFFFFF");
  Shape6_Canvas.fillRect(1, 1, 718 - 1, 157 - 1);
  Shape6_Canvas.fillRect(1, 1, 718 - 1 + 1, 157 - 1 + 1);
  Shape6_Canvas.setStroke(1);
  Shape6_Canvas.setColor("#5A9CB1");
  Shape6_Canvas.drawRect(1, 1, 718 - 1 + 1, 157 - 1 + 1);
  Shape6_Canvas.paint();
</script>

</div>
<div id="Label16_outer" style="Z-INDEX: 32; LEFT: 160px; WIDTH: 696px; POSITION: absolute; TOP: 44px; HEIGHT: 149px">
<div id="Label16" style=" font-family: verdana; font-size: 13px;  height:149px;width:696px;"   >  <STRONG>Instruções: Guia de Contribuição ao Sindicato - Sindificios</STRONG>  
  <STRONG>1</STRONG>. Imprima em impressora jato de tinta (ink jet) ou laser em qualidade normal ou alta Não use modo econômico.<BR><STRONG>Por favor, configure a margens esquerda 8.89 e direita para 4.23 mm<BR>2</STRONG>. Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) as margens superior e inferior do formulário em 4.23 mm.<BR><STRONG>3</STRONG>. Corte na linha indicada. Não rasure, risque, fure ou dobre a região onde se encontra o código de barras.<BR>  </div>
</div>
</td></tr></table>

<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 545px; HEIGHT: 40px">

<table border='0' aling=center>
          <td> </td>

          <td><input type=image name="guias" src="imagens/botaoazul23.PNG"></td>

         </form>
         </body>

          <form method="POST" action="javascript:window.close()">
          <td><input type=image name="socios" src="imagens/botaoazul9.PNG"></td>
          </form>

</table>
</div>
</html>