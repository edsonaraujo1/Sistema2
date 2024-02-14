<?
/*
 ----------------------------------------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Emitir Guias Sindical do Cadastro Empresa
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ----------------------------------------------------------------------------------
*/

?>

<html>
<head>
<title>Guia de Contribuição Sindical Urbana - GRCSU </title>
<link rel="shortcut icon" href="imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
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

</HEAD>
</html>

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


// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);
// retorna uma pesquisa

include("funcoes2.php");

?>

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

<body onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();"  onload="document.form1.valor.focus();">
<form name="form1" type="hidden" method="POST" action="sindical2.php" target="new">


<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 145px; WIDTH: 724px; POSITION: absolute; TOP: 240px; HEIGHT: 392px">
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
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 178px; WIDTH: 658px; POSITION: absolute; TOP: 273px; HEIGHT: 37px">
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
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 187px; WIDTH: 633px; POSITION: absolute; TOP: 286px; HEIGHT: 22px">
<div id="Label1" style=" font-family: Verdana; font-size: 14px; color: #5A9CB1; background-color: #FFFFFF;height:22px;width:633px;"  align="Center"   ><STRONG>IMPRESSÃO DE GUIAS GRCSU - SINDICAL</STRONG>&nbsp;</div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 3; LEFT: 178px; WIDTH: 658px; POSITION: absolute; TOP: 312px; HEIGHT: 244px">
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
<div id="Label2_outer" style="Z-INDEX: 4; LEFT: 185px; WIDTH: 64px; POSITION: absolute; TOP: 323px; HEIGHT: 20px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:20px;width:64px;"   ><STRONG>Valor.:</STRONG></div>
</div>
<div id="valor_outer" style="Z-INDEX: 5; LEFT: 353px; WIDTH: 111px; POSITION: absolute; TOP: 318px; HEIGHT: 26px">
<input type="text" id="valor" name="valor" value="" onfocus="this.className='anormal'; nextfield ='vencto';" onblur="this.className='normal'"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:111px;"     tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 6; LEFT: 185px; WIDTH: 126px; POSITION: absolute; TOP: 349px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:126px;"   ><STRONG>Vencimento.:</STRONG></div>
</div>

<div id="vencto_outer" style="Z-INDEX: 7; LEFT: 353px; WIDTH: 111px; POSITION: absolute; TOP: 345px; HEIGHT: 26px">
<select type="text" id="vencto" name="vencto" value="" onfocus="this.className='anormal'; nextfield ='nudoc';" onblur="this.className='normal'"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:111px;"   tabindex="0"    />

<option value="30/04/2010"selected> 30/04/2010 </option>
 
          <option value="30/04/2010"> 30/04/2010 </option>
          <option value="30/04/2009"> 30/04/2009 </option>
                    
          </select>


</div>

<div id="Label4_outer" style="Z-INDEX: 8; LEFT: 185px; WIDTH: 171px; POSITION: absolute; TOP: 374px; HEIGHT: 19px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>Numero Documento.:</STRONG></div>
</div>
<div id="nudoc_outer" style="Z-INDEX: 9; LEFT: 353px; WIDTH: 88px; POSITION: absolute; TOP: 368px; HEIGHT: 26px">
<input type="text" id="nudoc" name="nudoc" value="" onfocus="this.className='anormal'; nextfield ='exec';" onblur="this.className='normal'"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:88px;"     tabindex="0"    />
</div>
<div id="Edit1_outer" style="Z-INDEX: 29; LEFT: 560px; WIDTH: 88px; POSITION: absolute; TOP: 368px; HEIGHT: 26px">
<input type="text" id="exec" name="exec" value="" onfocus="this.className='anormal'; nextfield ='sacado';" onblur="this.className='normal'"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:88px;"     tabindex="0"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 10; LEFT: 185px; WIDTH: 171px; POSITION: absolute; TOP: 399px; HEIGHT: 19px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>Nome/Razão Social.:</STRONG></div>
</div>
<div id="sacado_outer" style="Z-INDEX: 11; LEFT: 353px; WIDTH: 475px; POSITION: absolute; TOP: 393px; HEIGHT: 26px">
<input type="text" id="sacado" name="sacado" value="" onfocus="this.className='anormal'; nextfield ='CNPJ';" onblur="this.className='normal'"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:475px;"     tabindex="0"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 12; LEFT: 185px; WIDTH: 171px; POSITION: absolute; TOP: 424px; HEIGHT: 19px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>CNPJ.:</STRONG></div>
</div>
<div id="CNPJ_outer" style="Z-INDEX: 13; LEFT: 353px; WIDTH: 211px; POSITION: absolute; TOP: 418px; HEIGHT: 26px">
<input type="text" id="CNPJ" name="CNPJ" value="" onfocus="this.className='anormal'; nextfield ='endereco';" onblur="this.className='normal'"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:211px;"  onchange="validaCNPJ(this)"   tabindex="0"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 14; LEFT: 185px; WIDTH: 171px; POSITION: absolute; TOP: 449px; HEIGHT: 19px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>Endereço.:</STRONG></div>
</div>
<div id="endereco_outer" style="Z-INDEX: 15; LEFT: 353px; WIDTH: 475px; POSITION: absolute; TOP: 443px; HEIGHT: 26px">
<input type="text" id="endereco" name="endereco" onfocus="this.className='anormal'; nextfield ='bairro';" onblur="this.className='normal'"  value="" style=" font-family: Verdana; font-size: 14px;  height:25px;width:475px;"     tabindex="0"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 16; LEFT: 185px; WIDTH: 171px; POSITION: absolute; TOP: 474px; HEIGHT: 19px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>Bairro.:</STRONG></div>
</div>
<div id="bairro_outer" style="Z-INDEX: 17; LEFT: 353px; WIDTH: 211px; POSITION: absolute; TOP: 468px; HEIGHT: 26px">
<input type="text" id="bairro" name="bairro" value="" onfocus="this.className='anormal'; nextfield ='cidade';" onblur="this.className='normal'"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:211px;"     tabindex="0"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 18; LEFT: 185px; WIDTH: 171px; POSITION: absolute; TOP: 499px; HEIGHT: 19px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>Cidade.:</STRONG></div>
</div>
<div id="cidade_outer" style="Z-INDEX: 19; LEFT: 353px; WIDTH: 211px; POSITION: absolute; TOP: 493px; HEIGHT: 26px">
<input type="text" id="cidade" name="cidade" value="" onfocus="this.className='anormal'; nextfield ='cep';" onblur="this.className='normal'"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:211px;"     tabindex="0"    />
</div>
<div id="Label10_outer" style="Z-INDEX: 20; LEFT: 185px; WIDTH: 171px; POSITION: absolute; TOP: 525px; HEIGHT: 19px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:171px;"   ><STRONG>CEP.:</STRONG></div>
</div>
<div id="cep_outer" style="Z-INDEX: 21; LEFT: 353px; WIDTH: 123px; POSITION: absolute; TOP: 519px; HEIGHT: 26px">
<input type="text" id="cep" name="cep" value="" onfocus="this.className='anormal'; nextfield ='estado';" onblur="this.className='normal'"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:123px;"     tabindex="0"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 22; LEFT: 626px; WIDTH: 73px; POSITION: absolute; TOP: 525px; HEIGHT: 19px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:73px;"   ><STRONG>Estado.:</STRONG></div>
</div>
<div id="estado_outer" style="Z-INDEX: 23; LEFT: 704px; WIDTH: 59px; POSITION: absolute; TOP: 520px; HEIGHT: 28px">
<select name="estado" id="estado" size="1" onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"  style=" font-family: Verdana; font-size: 14px;  height:26px;width:59px;"   tabindex="0"   >

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
<div id="Shape4_outer" style="Z-INDEX: 24; LEFT: 178px; WIDTH: 658px; POSITION: absolute; TOP: 558px; HEIGHT: 41px">
<script type="text/javascript">
  var Shape4_Canvas = new jsGraphics("Shape4_outer");
  Shape4_Canvas.setColor("#FFFFFF");
  Shape4_Canvas.fillRect(1, 1, 656 - 1, 39 - 1);
  Shape4_Canvas.fillRect(1, 1, 656 - 1 + 1, 39 - 1 + 1);
  Shape4_Canvas.setStroke(1);
  Shape4_Canvas.setColor("#5A9CB1");
  Shape4_Canvas.drawRect(1, 1, 656 - 1 + 1, 39 - 1 + 1);
  Shape4_Canvas.paint();
</script>

</div>
<div id="Label12_outer" style="Z-INDEX: 25; LEFT: 473px; WIDTH: 171px; POSITION: absolute; TOP: 323px; HEIGHT: 19px">
<div id="Label12" style=" font-family: Verdana; font-size: 13px; color: #000000;font-weight: normal; height:19px;width:171px;"   >  <STRONG># Ex: "0000,00"</STRONG>  </div>
</div>
<div id="Label13_outer" style="Z-INDEX: 26; LEFT: 567px; WIDTH: 261px; POSITION: absolute; TOP: 423px; HEIGHT: 19px">
<div id="Label13" style=" font-family: Verdana; font-size: 13px; color: #000000;font-weight: normal; height:19px;width:261px;"   >  <STRONG># Ex: "00.000.000/0000-00"</STRONG>  </div>
</div>
<div id="Label14_outer" style="Z-INDEX: 27; LEFT: 481px; WIDTH: 139px; POSITION: absolute; TOP: 523px; HEIGHT: 19px">
<div id="Label14" style=" font-family: Verdana; font-size: 13px; color: #000000;font-weight: normal; height:19px;width:139px;"   >  <STRONG># Ex: "00000-000"</STRONG>  </div>
</div>
<div id="Label15_outer" style="Z-INDEX: 28; LEFT: 478px; WIDTH: 87px; POSITION: absolute; TOP: 373px; HEIGHT: 19px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:87px;"   ><STRONG>Exercicio.:</STRONG></div>
</div>
<div id="Shape5_outer" style="Z-INDEX: 30; LEFT: 88px; WIDTH: 840px; POSITION: absolute; TOP: 2px; HEIGHT: 255px">
<script type="text/javascript">
  var Shape5_Canvas = new jsGraphics("Shape5_outer");
  Shape5_Canvas.setColor("#FFFFFF");
  Shape5_Canvas.fillRect(16, 16, 808 - 16, 223 - 16);
  Shape5_Canvas.fillRect(16, 16, 808 - 16 + 1, 223 - 16 + 1);
  Shape5_Canvas.setStroke(16);
  Shape5_Canvas.setColor("#5A9CB1");
  Shape5_Canvas.drawRect(16, 16, 808 - 16 + 1, 223 - 16 + 1);
  Shape5_Canvas.paint();
</script>

</div>
<div id="Shape6_outer" style="Z-INDEX: 31; LEFT: 122px; WIDTH: 772px; POSITION: absolute; TOP: 35px; HEIGHT: 189px">
<script type="text/javascript">
  var Shape6_Canvas = new jsGraphics("Shape6_outer");
  Shape6_Canvas.setColor("#FFFFFF");
  Shape6_Canvas.fillRect(1, 1, 770 - 1, 187 - 1);
  Shape6_Canvas.fillRect(1, 1, 770 - 1 + 1, 187 - 1 + 1);
  Shape6_Canvas.setStroke(1);
  Shape6_Canvas.setColor("#5A9CB1");
  Shape6_Canvas.drawRect(1, 1, 770 - 1 + 1, 187 - 1 + 1);
  Shape6_Canvas.paint();
</script>

</div>
<div id="Label16_outer" style="Z-INDEX: 32; LEFT: 136px; WIDTH: 744px; POSITION: absolute; TOP: 43px; HEIGHT: 173px">
<div id="Label16" style=" font-family: verdana; font-size: 13px;  height:173px;width:744px;"   >  <STRONG>Instrução: Guia Sindical - GRCSU - Sindificios<BR><BR>1</STRONG>. Imprima em impressora jato de tinta (ink jet) ou laser em qualidade normal ou alta Não use modo econômico.<BR><STRONG>Por favor, configure a margens esquerda e direita para 17 mm<BR>2</STRONG>. Utilize folha A4 (210 x 297 mm) ou Carta (216 x 279 mm) e margens mínimas à esquerda e à direita do formulário.<BR><STRONG>3</STRONG>. Corte na linha indicada. Não rasure, risque, fure ou dobre a região onde se encontra o código de barras.<BR><STRONG>4</STRONG> . Informamos que o prazo para o recolhimento da Contribuição Sindical devida, da categoria profissional no mês de Março sendo um dia de serviço de cada empregado pode se emitida pelo site do Sindificios, com vencimento em 30 de Abril de 2010 podendo ser paga em Casas Loterias e Agências da Caixa e Rede Bancaria, por isso não deixe para ultima hora...<BR>  </div>
</div>
</td></tr></table>

<div style="Z-INDEX: 34; LEFT: 180px; WIDTH: 544px; POSITION: absolute; TOP: 567px; HEIGHT: 40px">

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