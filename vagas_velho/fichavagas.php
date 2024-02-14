<?
/*
 --------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Ficha de Encaminhamento
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 03/07/2008 

 DEUS SEJA LOUVADO
 --------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

//require("logar.php");

setlocale(LC_TIME,"portuguese");
$mes_data = strftime("%B");

?>


<style type="text/css" media="print">
div.invisivel {
visibility: hidden; 
}
</style>

<script language="JavaScript" type="text/javascript">
// Funcao Imprimir
function printit(){ 
if (NS) { 
window.print(); 
} else { 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(6,11);//Use a 1 vs. a 2 for a prompting dialog box WebBrowser1.outerHTML = ""; 
} 
} 

// bloqueando a tecla Ctrl
if (document.all) {
    document.onkeydown = function() {
        var teclaCtrl = event.keyCode ? event.keyCode : (event.which ? event.which : event.charCode);
        if (teclaCtrl == 17) {
            alert('Opção Invalida !!!');
            return false;
        }
    }
}
// Bloqueia Botao direito do mouse
function click() { 
if (event.button==2||event.button==3) { 
alert('Botão desativado !!!') 
} 
} 
document.onmousedown=click 

</script>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>
</html>

<style type=text/css>

<!--.cp {  font: bold 11px Arial; color: black}
<!--.ti {  font: 10px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
<!--.p  { line-height: 10pt}
<!--.edt {
	width: 350px;
	height: 26px;
	border: 0px;
}

@media screen{
	.nao_mostrar { display: none;}
    .nao_imprimir { display: block;}	
}

@media print{
	.nao_mostrar { display:block;}
    .nao_imprimir { display:none;}	
}
--></style> 

<?

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

mysql_select_db($db);

// retorna uma pesquisa

$consulta  = "SELECT * FROM vaga WHERE COD = '$Cod_2'";

$resultado = mysql_query($consulta);

$row = mysql_fetch_array($resultado);

$Edit1  = @$row["COD"];
$Edit2  = @$row["SITU"];
$Edit3  = @$row["DATA"];
$Edit4  = @$row["FUNCAO"];
$Edit5  = @$row["QTD"];
$Edit6  = @$row["ENCA"];
$Edit7  = @$row["NOME"];
$Edit8  = @$row["ENDERECO"];
$Edit9  = @$row["BAIRRO"];
$Edit10 = @$row["CIDADE"];
$Edit11 = @$row["ESTADO"]; 
$Edit12 = @$row["CEP"];
$Edit13 = @$row["TELEFONE"];
$Edit14 = @$row["CONTATO"];
$Edit15 = @$row["OBS"];

$nome     = strtoupper($_POST['Edit5']);

If ($Edit5 <= 0){
?>	
	<SCRIPT LANGUAGE='JavaScript'>
	<!--
	alert("Verifique quantidade de Vagas !!!");
	//-->
	</script>
	
<?
}

$hora = date("H"); //Extrai apenas a hora
if ($hora >= 0 and $hora < 6) {
 $situa_1 = "Boa Madrugada";
 } elseif ($hora >=6 and $hora <12) {
 $situa_1 = "Bom Dia";
 } elseif ($hora >=12 and $hora <18) {
 $situa_1 = "Boa Tarde";
 }else {
 $situa_1 = "Boa Noite";
}

setlocale(LC_TIME,"portuguese");
$bomdia = "São Paulo, ".strftime("%d de %B de %Y"); 

$soma_enca = $Edit6 + 1;
$sobra_1   = $Edit5 - 1;

$consulta2 = "UPDATE vaga    SET ENCA  = '$soma_enca', QTD = '$sobra_1' WHERE COD = '$Edit1'";

@mysql_query($consulta2, $link) or

die("
     <br>
     <br>

     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolordark='$color_bor' bordercolorlight='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Impressão !!! ***</b>
     <table align=center>
     <form method='POST' action='javascript:window.close()'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form></p>
     </table>
     </td>
     </tr>
     </table>
     </div>");

?>
<html>
<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="fichavagas.php">
<table  width="800"   style="height:1032px"  border="0" cellpadding="0" cellspacing="0" class=p ><tr><td valign="top">
<div id="Image1_outer" style="Z-INDEX: 0; LEFT: 8px; WIDTH: 784px; POSITION: absolute; TOP: 8px; HEIGHT: 120px">
<div id="Image1_container" style=" width: 784;  height: 120; overflow: hidden;" ><img id="Image1" src="../imagens/Logo_oficio4.bmp"  width="784"  height="120"  border="0"       /></div>
</div>
<div id="Label1_outer" style="Z-INDEX: 1; LEFT: 25px; WIDTH: 360px; POSITION: absolute; TOP: 166px; HEIGHT: 24px">
<div id="Label1" style=" font-family: Courier New; font-size: 14px;  height:24px;width:360px;"   ><?=$bomdia;?></div>
</div>
<div id="Label2_outer" style="Z-INDEX: 2; LEFT: 25px; WIDTH: 102px; POSITION: absolute; TOP: 257px; HEIGHT: 24px">
<div id="Label2" style=" font-family: Courier New; font-size: 14px;  height:24px;width:102px;"   >A(o).:</div>
</div>
<div id="Label3_outer" style="Z-INDEX: 3; LEFT: 24px; WIDTH: 104px; POSITION: absolute; TOP: 279px; HEIGHT: 24px">
<div id="Label3" style=" font-family: Courier New; font-size: 14px;  height:24px;width:104px;"   >Adm./Cond.:</div>
</div>
<div id="Label4_outer" style="Z-INDEX: 4; LEFT: 24px; WIDTH: 104px; POSITION: absolute; TOP: 301px; HEIGHT: 24px">
<div id="Label4" style=" font-family: Courier New; font-size: 14px;  height:24px;width:104px;"   >Av./Rua.:</div>
</div>
<div id="Label5_outer" style="Z-INDEX: 5; LEFT: 24px; WIDTH: 104px; POSITION: absolute; TOP: 323px; HEIGHT: 24px">
<div id="Label5" style=" font-family: Courier New; font-size: 14px;  height:24px;width:104px;"   >Bairro.:</div>
</div>
<div id="Label6_outer" style="Z-INDEX: 6; LEFT: 24px; WIDTH: 103px; POSITION: absolute; TOP: 346px; HEIGHT: 22px">
<div id="Label6" style=" font-family: Courier New; font-size: 14px;  height:22px;width:103px;"   >Contato.:</div>
</div>
<div id="Label7_outer" style="Z-INDEX: 7; LEFT: 24px; WIDTH: 720px; POSITION: absolute; TOP: 426px; HEIGHT: 24px">
<div id="Label7" style=" font-family: Courier New; font-size: 14px;  height:24px;width:720px;"   ><STRONG>Ref.: - SOLICITAÇÃO PARA PREENCHIMENTO DE VAGAS</STRONG></div>
</div>
<div id="Label8_outer" style="Z-INDEX: 8; LEFT: 25px; WIDTH: 695px; POSITION: absolute; TOP: 552px; HEIGHT: 16px">
<div id="Label8" style=" font-family: Courier New; font-size: 14px;  height:16px;width:695px;"   ><P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pela&nbsp; &nbsp;presente&nbsp;&nbsp; estamos&nbsp;&nbsp; &nbsp;encaminhando&nbsp; &nbsp;o&nbsp;&nbsp;Candidato(a)&nbsp;&nbsp;&nbsp;Sr.(a).</P></div>
</div>
<div id="Label9_outer" style="Z-INDEX: 9; LEFT: 32px; WIDTH: 688px; POSITION: absolute; TOP: 577px; HEIGHT: 16px">
<div id="Label9" style=" font-family: Courier New; font-size: 14px;  height:16px;width:688px;"   ><P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; para&nbsp; a&nbsp; vaga&nbsp; de</P></div>
</div>
<div id="Label10_outer" style="Z-INDEX: 10; LEFT: 25px; WIDTH: 663px; POSITION: absolute; TOP: 602px; HEIGHT: 16px">
<div id="Label10" style=" font-family: Courier New; font-size: 14px;  height:16px;width:663px;"   ><P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; nesse&nbsp; edificio.</P></div>
</div>
<div id="Label11_outer" style="Z-INDEX: 11; LEFT: 25px; WIDTH: 695px; POSITION: absolute; TOP: 628px; HEIGHT: 16px">
<div id="Label11" style=" font-family: Courier New; font-size: 14px;  height:16px;width:695px;"   ><P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No&nbsp; intuito&nbsp; de&nbsp;&nbsp; continuarmos&nbsp; prestando bons&nbsp; serviços,&nbsp; &nbsp;pedimos a</P></div>
</div>
<div id="Label12_outer" style="Z-INDEX: 12; LEFT: 26px; WIDTH: 694px; POSITION: absolute; TOP: 654px; HEIGHT: 16px">
<div id="Label12" style=" font-family: Courier New; font-size: 14px;  height:16px;width:694px;"   ><P>gentileza&nbsp; de &nbsp; nos comunicar&nbsp; caso o candidato tenha sido contratado. Para tanto,</P></div>
</div>
<div id="Label13_outer" style="Z-INDEX: 13; LEFT: 27px; WIDTH: 693px; POSITION: absolute; TOP: 679px; HEIGHT: 16px">
<div id="Label13" style=" font-family: Courier New; font-size: 14px;  height:16px;width:693px;"   ><P>favor &nbsp;entrar &nbsp;em&nbsp; contato &nbsp;com&nbsp; Jeanne &nbsp;no &nbsp;telefone&nbsp;&nbsp; 3123-3228/3258,&nbsp;3123-3229,</P></div>
</div>
<div id="Label14_outer" style="Z-INDEX: 14; LEFT: 27px; WIDTH: 693px; POSITION: absolute; TOP: 703px; HEIGHT: 16px">
<div id="Label14" style=" font-family: Courier New; font-size: 14px;  height:16px;width:693px;"   ><P>3123-3229,  ou através do e-mail: sindificios@sindificios.com.br,&nbsp; aos cuidados do</P></div>
</div>
<div id="Label15_outer" style="Z-INDEX: 15; LEFT: 27px; WIDTH: 671px; POSITION: absolute; TOP: 729px; HEIGHT: 16px">
<div id="Label15" style=" font-family: Courier New; font-size: 14px;  height:16px;width:671px;"   ><P>Depto. de Vagas, sem mais.</P></div>
</div>
<div id="Label16_outer" style="Z-INDEX: 16; LEFT: 35px; WIDTH: 671px; POSITION: absolute; TOP: 977px; HEIGHT: 20px">
<div id="Label16" style=" font-family: Courier New; font-size: 14px;  height:20px;width:671px;"   ><P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; _________________________________</P></div>
</div>
<div id="Label17_outer" style="Z-INDEX: 17; LEFT: 34px; WIDTH: 671px; POSITION: absolute; TOP: 999px; HEIGHT: 20px">
<div id="Label17" style=" font-family: Courier New; font-size: 14px;  height:20px;width:671px;"   ><P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <STRONG>SATE/DEPTO DE VAGAS</STRONG></P></div>
</div>
<div id="Label18_outer" style="Z-INDEX: 18; LEFT: 28px; WIDTH: 671px; POSITION: absolute; TOP: 771px; HEIGHT: 16px">
<div id="Label18" style=" font-family: Courier New; font-size: 14px;  height:16px;width:671px;"   ><P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; Atenciosamente</P></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 19; LEFT: 113px; WIDTH: 608px; POSITION: absolute; TOP: 256px; HEIGHT: 24px">
<input type="text" id="Edit1" name="Edit1" value="" style=" font-family: Courier New; font-size: 14px;  border-width: 0px; border-style: none;height:23px;width:608px;"    tabindex="0"    />
</div>
<div id="Edit2_outer" style="Z-INDEX: 20; LEFT: 113px; WIDTH: 608px; POSITION: absolute; TOP: 278px; HEIGHT: 24px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit7;?>" style=" font-family: Courier New; font-size: 14px;  border-width: 0px; border-style: none;height:23px;width:608px;"    tabindex="0"    />
</div>
<div id="Edit3_outer" style="Z-INDEX: 21; LEFT: 113px; WIDTH: 608px; POSITION: absolute; TOP: 300px; HEIGHT: 24px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit8;?>" style=" font-family: Courier New; font-size: 14px;  border-width: 0px; border-style: none;height:23px;width:608px;"    tabindex="0"    />
</div>
<div id="Edit4_outer" style="Z-INDEX: 22; LEFT: 113px; WIDTH: 608px; POSITION: absolute; TOP: 322px; HEIGHT: 24px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit9;?>" style=" font-family: Courier New; font-size: 14px;  border-width: 0px; border-style: none;height:23px;width:608px;"    tabindex="0"    />
</div>
<div id="Edit5_outer" style="Z-INDEX: 23; LEFT: 113px; WIDTH: 608px; POSITION: absolute; TOP: 344px; HEIGHT: 24px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit14;?>" style=" font-family: Courier New; style:bold; font-size: 14px;  border-width: 0px; border-style: none;height:23px;width:608px;"    tabindex="0"    />
</div>
<div id="Edit6_outer" style="Z-INDEX: 24; LEFT: 25px; WIDTH: 507px; POSITION: absolute; TOP: 577px; HEIGHT: 24px">
<div id="Label19" style=" font-family: Courier New; font-size: 14px;  height:16px;width:671px;"   ><b><?=$nome;?></b></div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 25; LEFT: 25px; WIDTH: 208px; POSITION: absolute; TOP: 602px; HEIGHT: 24px">
<div id="Label20" style=" font-family: Courier New; font-size: 14px;  height:16px;width:671px;"   ><b><?=$Edit4;?></b></div>
</div>
</td></tr></table>
</form></body>
</html>
<script Language="JavaScript">
window.print();
</script>
