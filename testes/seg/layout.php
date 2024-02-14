<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout Cadastro 
 Criado em Data.....: 28/02/2008
 Ultima Atualização : 21/01/2009

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/
// salva Secao
session_start();
$_SESSION['Inic'] = $id;
$_SESSION['Ante'] = $id;
$_SESSION['Prox'] = $id;
$_SESSION['Fim']  = $id;
$_SESSION['tipo_acao'] = 'alterar_1';

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");


// Resgata a Sessao
session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);

include ("funcoes2.php");
 
?>

<script language='javascript'> 

function janelaSecundaria (URL){ 
   window.open(URL,"janela1","width=120,height=30,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

</script> 

<html >
<head>
<title><?=$Titulo;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<script src="script.js"></script>
<script>
function Inicio()
{
url="navegacao_top.php";
ajax(url);
}
function Proximo()
{
url="navegacao_next.php";
ajax(url);
}
function Anterior()
{
url="navegacao_prev.php";
ajax(url);
}
function Fim()
{
url="navegacao_end.php";
ajax(url);
}

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
        function foco(){
		document.getElementById("Edit1").focus();	
		}
		
		</script>


<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onload="foco();" >
<form style="margin-bottom: 0" id="Form1" name="Form1" method="post"  action="/cnpj_cpf.php">
<table  width="824"   style="height:456px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 264px; WIDTH: 488px; POSITION: absolute; TOP: 80px; HEIGHT: 368px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(15, 15, 458 - 15, 338 - 15);
  Shape1_Canvas.fillRect(15, 15, 458 - 15 + 1, 338 - 15 + 1);
  Shape1_Canvas.setStroke(15);
  Shape1_Canvas.setColor("#5a9cb1");
  Shape1_Canvas.drawRect(15, 15, 458 - 15 + 1, 338 - 15 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 296px; WIDTH: 424px; POSITION: absolute; TOP: 112px; HEIGHT: 48px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 422 - 1, 46 - 1);
  Shape2_Canvas.fillRect(1, 1, 422 - 1 + 1, 46 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("#5a9cb1");
  Shape2_Canvas.drawRect(1, 1, 422 - 1 + 1, 46 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 313px; WIDTH: 383px; POSITION: absolute; TOP: 119px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: #5a9cb1; height:32px;width:383px;"   ><P><STRONG>Buscar CNPJ/CPF</STRONG></P></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 3; LEFT: 296px; WIDTH: 424px; POSITION: absolute; TOP: 162px; HEIGHT: 254px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 422 - 1, 252 - 1);
  Shape3_Canvas.fillRect(1, 1, 422 - 1 + 1, 252 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("#5a9cb1");
  Shape3_Canvas.drawRect(1, 1, 422 - 1 + 1, 252 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 4; LEFT: 350px; WIDTH: 98px; POSITION: absolute; TOP: 180px; HEIGHT: 24px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px;  height:24px;width:98px;"   ><P><STRONG>CNPJ / CPF:</STRONG></P></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 5; LEFT: 456px; WIDTH: 176px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:150px; background-color: #FFFFFF;" onchange="Salva2(this.value)"  onkeypress="return txtBoxFormat(document.Form1, 'Edit1', '99.999.999/9999', event);" maxlength="15"  tabindex="0"    />
</div>

<div id="Memo1_outer" style="Z-INDEX: 8; LEFT: 315px; WIDTH: 392px; POSITION: absolute; TOP: 256px; HEIGHT: 56px">
<textarea id="Memo1" name="Memo1" style=" font-family: Verdana; font-size: 5px;  height:55px;width:392px;"    tabindex="1"    wrap="virtual"><?$Edit2;?></textarea>
</div>

<div id="Image3_outer" style="Z-INDEX: 10; LEFT: 368px; WIDTH: 92px; POSITION: absolute; TOP: 368px; HEIGHT: 22px">
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><img id="Image3" src="imagens/botaoazul7.PNG"  width="92"  height="22"  border="0"       /></div>
</div>
<div id="Image1_outer" style="Z-INDEX: 6; LEFT: 468px; WIDTH: 92px; POSITION: absolute; TOP: 368px; HEIGHT: 22px">
<div id="Image1_container" style=" width: 92;  height: 22; overflow: hidden;" ><img id="Image1" src="imagens/botaoazul6.PNG"  width="92"  height="22"  border="0"       /></div>
</div>
<div id="Image2_outer" style="Z-INDEX: 7; LEFT: 567px; WIDTH: 92px; POSITION: absolute; TOP: 368px; HEIGHT: 22px">
<div id="Image2_container" style=" width: 92;  height: 22; overflow: hidden;" ><img id="Image2" src="imagens/botaoazul9.PNG"  width="92"  height="22"  border="0"       /></div>
</div>
<div id="Label3_outer" style="Z-INDEX: 9; LEFT: 318px; WIDTH: 242px; POSITION: absolute; TOP: 324px; HEIGHT: 20px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px;  height:20px;width:242px;"   ><A HREF="http://www.receita.fazenda.gov.br/PessoaJuridica/CNPJ/cnpjreva/Cnpjreva_Solicitacao.asp"  ><P><STRONG>Consular Cadastro de Receita</STRONG></P></A></div>
</div>
<div id="Label4_outer" style="Z-INDEX: 11; LEFT: 316px; WIDTH: 74px; POSITION: absolute; TOP: 239px; HEIGHT: 19px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px;  height:19px;width:74px;"   ><P><STRONG>cole aqui</STRONG></P></div>
</div>

<div id="Label5_outer" style="Z-INDEX: 12; LEFT: 346px; WIDTH: 322px; POSITION: absolute; TOP: 212px; HEIGHT: 24px">
<div id="Label5" style=" font-family: Verdana; font-size: 16px;  height:24px;width:322px;"  align="Center"   ><P><FONT color=#ff0000><STRONG><?=$mensagem;?></STRONG></FONT></P></div>
</div>

</td></tr></table>
</form></body>
</html>