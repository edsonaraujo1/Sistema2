<?php
/*
 --------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Ficha de Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 --------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);
$Titulo = "Impressao";

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

setlocale(LC_TIME,"portuguese");
$mes_data = strftime("%B");

if (strftime("%B") == "January")   { $mes_data = "Janeiro"; }
if (strftime("%B") == "February")  { $mes_data = "Fevereiro"; }
if (strftime("%B") == "March")     { $mes_data = "Março"; }
if (strftime("%B") == "April")     { $mes_data = "Abril"; }
if (strftime("%B") == "May")       { $mes_data = "Maio"; }
if (strftime("%B") == "June")      { $mes_data = "Junho"; }
if (strftime("%B") == "July")      { $mes_data = "Julho"; }
if (strftime("%B") == "August")    { $mes_data = "Agosto"; }
if (strftime("%B") == "September") { $mes_data = "Setembro"; }
if (strftime("%B") == "October")   { $mes_data = "Outubro"; }
if (strftime("%B") == "November")  { $mes_data = "Novembro"; }
if (strftime("%B") == "December")  { $mes_data = "Dezembro"; }


?>

<style type="text/css" media="print">
div.invisivel {
visibility: hidden; 
}
</style>

<div class="invisivel">

          <form method="POST" action="javascript:window.close()"><br />
          <td>&nbsp;&nbsp;&nbsp;<input type=image name="socios" src="../imagens/botaoazul25.PNG"></td>
          </form>



</div>

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
<title><?php echo $Titulo ?></title>
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

<?php

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

mysql_select_db($db);
// retorna uma pesquisa

$data_fi = date("d/m/Y");
// Regata Secao
session_start();
$Cod_3 = $_SESSION['navega'];

$Cod_p = $Cod_2;


if ($Cod_3 != 0)
{
   $consulta  = "SELECT * FROM cursos WHERE id = '$Cod_3' ORDER BY COD";
}
else
{
   $consulta  = "SELECT * FROM cursos WHERE CODP = '$Cod_p'";
}   

$resultado = mysql_query($consulta);

$row = mysql_fetch_array($resultado);

$id         = @$row["id"];

if (!empty($id)){

	$id     = @$row["id"];
	$Edit1  = @$row["CODP"];
	$Edit2  = @$row["DATINI"];
	$Edit3  = @$row["DATTER"];
	$Edit4  = @$row["CURSOS_1"];
	$Edit5  = @$row["RG"];
	$Edit6  = @$row["PERI"];
	$Edit7  = @$row["CPF"];
	$Edit8  = @$row["NOME"];
	$Edit9  = @$row["OCUPA"];
	$Edit10 = @$row["DATNASC"];
	$Edit11 = @$row["CIVIL"];
	$Edit12 = @$row["NACIONAL"];
	$Edit13 = @$row["SEXO"];
	$Edit14 = @$row["DATA"];
	$Edit15 = @$row["ENDERECO"];
	$Edit16 = @$row["CEP"];
	$Edit17 = @$row["BAIRRO"];
	$Edit18 = @$row["FONE"];
	$Edit19 = @$row["ESCOLA"];
	$Edit20 = @$row["TECNICO"];
	$Edit21 = @$row["OBS"];
}else{

	
$consulta2  = "SELECT * FROM cursos WHERE CODP = '$Cod_3' ORDER BY COD";

$resultado2 = mysql_query($consulta2);

$row = mysql_fetch_array($resultado2);
	
$id     = @$row["id"];
$Edit1  = @$row["CODP"];
$Edit2  = @$row["DATINI"];
$Edit3  = @$row["DATTER"];
$Edit4  = @$row["CURSOS_1"];
$Edit5  = @$row["RG"];
$Edit6  = @$row["PERI"];
$Edit7  = @$row["CPF"];
$Edit8  = @$row["NOME"];
$Edit9  = @$row["OCUPA"];
$Edit10 = @$row["DATNASC"];
$Edit11 = @$row["CIVIL"];
$Edit12 = @$row["NACIONAL"];
$Edit13 = @$row["SEXO"];
$Edit14 = @$row["DATA"];
$Edit15 = @$row["ENDERECO"];
$Edit16 = @$row["CEP"];
$Edit17 = @$row["BAIRRO"];
$Edit18 = @$row["FONE"];
$Edit19 = @$row["ESCOLA"];
$Edit20 = @$row["TECNICO"];
$Edit21 = @$row["OBS"];

}


If ($Edit4 == "Z"){
   $Edit4 = "Curso de Zeladoria";
}   
If ($Edit4 == "A"){
   $Edit4 =  "Curso de Ascensorista";
}
If ($Edit4 == "C"){
   $Edit4 =  "Curso de CIPA";
}
If ($Edit4 == "I"){
   $Edit4 =  "Curso de Inglês";
}
If ($Edit4 == "E"){
   $Edit4 =  "Curso Espanhol";
}
If ($Edit4 == "M"){
   $Edit4 =  "Curso de Microinformática";
}
If ($Edit4 == "S"){
   $Edit4 =  "Curso Supletivo";
}


If ($Edit6 == "M"){
   $Edit6 = "Periodo da Manha";
}   
If ($Edit6 == "T"){
   $Edit6 =  "Periodo da Tarde";
}
If ($Edit6 == "N"){
   $Edit6 =  "Periodo Noturno";
}

			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = "FICHA_CURSOS/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);
?>


<html >
<head>
<title><?php echo $Titulo ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="vcl/js/common.js"></script>
</head>

<script language="javascript">

function fechar(){
	
	if(document.all){
		window.opener=window;
		window.close("#");
	}else{
		self.close();
	}
}

</script>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="Unit1" name="Unit1" method="post"  action="/Ficha_Cursos.php">
<table  width="760"   style="height:1048px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">
<div class="nao_mostrar" id="Image1_outer" style="Z-INDEX: 0; LEFT: 0px; WIDTH: 750px; POSITION: absolute; TOP: 8px; HEIGHT: 124px">
<div id="Image1_container" style=" width: 750;  height: 124; overflow: hidden;" ><img id="Image1" src="../imagens/Logo_oficio2.bmp"  width="750"  height="124"  border="0"       /></div>
</div>
<div id="Label2_outer" style="Z-INDEX: 1; LEFT: 67px; WIDTH: 72px; POSITION: absolute; TOP: 286px; HEIGHT: 24px">
<div id="Label2" style=" font-family: Courier New; font-size: 14px;  height:24px;width:72px;"   >CURSO:</div>
</div>
<div id="Label3_outer" style="Z-INDEX: 2; LEFT: 401px; WIDTH: 160px; POSITION: absolute; TOP: 285px; HEIGHT: 24px">
<div id="Label3" style=" font-family: Courier New; font-size: 14px;  height:24px;width:160px;"   >PERIODO DO CURSO:</div>
</div>
<div id="Label4_outer" style="Z-INDEX: 3; LEFT: 67px; WIDTH: 272px; POSITION: absolute; TOP: 315px; HEIGHT: 24px">
<div id="Label4" style=" font-family: Courier New; font-size: 14px;  height:24px;width:272px;"   >LOCAL DE REALIZAÇÃO DO CURSO:</div>
</div>
<div id="Label5_outer" style="Z-INDEX: 4; LEFT: 67px; WIDTH: 96px; POSITION: absolute; TOP: 348px; HEIGHT: 24px">
<div id="Label5" style=" font-family: Courier New; font-size: 14px;  height:24px;width:96px;"   >ENDEREÇO:</div>
</div>
<div id="Label6_outer" style="Z-INDEX: 5; LEFT: 67px; WIDTH: 144px; POSITION: absolute; TOP: 380px; HEIGHT: 24px">
<div id="Label6" style=" font-family: Courier New; font-size: 14px;  height:24px;width:144px;"   >INICIO DO CURSO:</div>
</div>
<div id="Label7_outer" style="Z-INDEX: 6; LEFT: 401px; WIDTH: 160px; POSITION: absolute; TOP: 378px; HEIGHT: 24px">
<div id="Label7" style=" font-family: Courier New; font-size: 14px;  height:24px;width:160px;"   >TERMINO DO CURSO:</div>
</div>
<div id="Label31_outer" style="Z-INDEX: 7; LEFT: 121px; WIDTH: 256px; POSITION: absolute; TOP: 285px; HEIGHT: 24px">
<div id="Label31" style=" font-family: Arial; font-size: 12px;  height:24px;width:256px;"   ><STRONG><?php echo $Edit4 ?></STRONG></div>
</div>
<div id="Label32_outer" style="Z-INDEX: 8; LEFT: 562px; WIDTH: 185px; POSITION: absolute; TOP: 284px; HEIGHT: 24px">
<div id="Label32" style=" font-family: Arial; font-size: 12px;  height:24px;width:185px;"   ><STRONG><?php echo $Edit6 ?></STRONG></div>
</div>
<div id="Label33_outer" style="Z-INDEX: 9; LEFT: 329px; WIDTH: 415px; POSITION: absolute; TOP: 315px; HEIGHT: 24px">
<div id="Label33" style=" font-family: Verdana; font-size: 12px;  height:24px;width:415px;"   ><STRONG>SINDICATO DOS EMPREGADOS DE EDIFICIOS SP</STRONG></div>
</div>
<div id="Label34_outer" style="Z-INDEX: 10; LEFT: 156px; WIDTH: 519px; POSITION: absolute; TOP: 348px; HEIGHT: 24px">
<div id="Label34" style=" font-family: Arial; font-size: 12px;  height:24px;width:519px;"   ><STRONG>R. SETE DE ABRIL, 34 - 2o ANDAR</STRONG></div>
</div>
<div id="Label35_outer" style="Z-INDEX: 11; LEFT: 209px; WIDTH: 192px; POSITION: absolute; TOP: 380px; HEIGHT: 24px">
<div id="Label35" style=" font-family: Arial; font-size: 12px;  height:24px;width:192px;"   ><STRONG><?php echo $Edit2 ?></STRONG></div>
</div>
<div id="Label36_outer" style="Z-INDEX: 12; LEFT: 560px; WIDTH: 187px; POSITION: absolute; TOP: 379px; HEIGHT: 24px">
<div id="Label36" style=" font-family: Arial; font-size: 12px;  height:24px;width:187px;"   ><STRONG><?php echo $Edit3 ?></STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 13; LEFT: 162px; WIDTH: 392px; POSITION: absolute; TOP: 188px; HEIGHT: 40px">
<input type="text" id="Edit1" name="Edit1" value="" style=" font-family: Verdana; font-size: 10px;  height:39px;width:392px;"    tabindex="0"    />
</div>
<div id="Label57_outer" style="Z-INDEX: 14; LEFT: 170px; WIDTH: 379px; POSITION: absolute; TOP: 196px; HEIGHT: 24px">
<div id="Label57" style=" font-family: Courier New; font-size: 20px;  height:24px;width:379px;"  align="Center"   ><STRONG>FICHA DE CADASTRO DE CANDIDATOS</STRONG></div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 15; LEFT: 67px; WIDTH: 597px; POSITION: absolute; TOP: 424px; HEIGHT: 592px">
<input type="text" id="Edit2" name="Edit2" value="" style=" font-family: Verdana; font-size: 10px;  height:591px;width:597px;"    tabindex="0"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 16; LEFT: 85px; WIDTH: 184px; POSITION: absolute; TOP: 444px; HEIGHT: 24px">
<div id="Label8" style=" font-family: Courier New; font-size: 14px;  height:24px;width:184px;"   >NOME DO CANDIDATO:</div>
</div>
<div id="Label37_outer" style="Z-INDEX: 17; LEFT: 253px; WIDTH: 395px; POSITION: absolute; TOP: 445px; HEIGHT: 24px">
<div id="Label37" style=" font-family: Arial; font-size: 12px;  height:24px;width:395px;"   ><STRONG><?php echo $Edit8 ?></STRONG></div>
</div>
<div id="Label9_outer" style="Z-INDEX: 18; LEFT: 85px; WIDTH: 96px; POSITION: absolute; TOP: 470px; HEIGHT: 24px">
<div id="Label9" style=" font-family: Courier New; font-size: 14px;  height:24px;width:96px;"   >OCUPAÇÃO:</div>
</div>
<div id="Label38_outer" style="Z-INDEX: 19; LEFT: 172px; WIDTH: 192px; POSITION: absolute; TOP: 471px; HEIGHT: 24px">
<div id="Label38" style=" font-family: Arial; font-size: 12px;  height:24px;width:192px;"   ><STRONG><?php echo $Edit9 ?></STRONG></div>
</div>
<div id="Label10_outer" style="Z-INDEX: 20; LEFT: 85px; WIDTH: 176px; POSITION: absolute; TOP: 497px; HEIGHT: 24px">
<div id="Label10" style=" font-family: Courier New; font-size: 14px;  height:24px;width:176px;"   >DATA DE NASCIMENTO:</div>
</div>
<div id="Label39_outer" style="Z-INDEX: 21; LEFT: 257px; WIDTH: 192px; POSITION: absolute; TOP: 498px; HEIGHT: 24px">
<div id="Label39" style=" font-family: Arial; font-size: 12px;  height:24px;width:192px;"   ><STRONG><?php echo $Edit10 ?></STRONG></div>
</div>
<div id="Label12_outer" style="Z-INDEX: 22; LEFT: 85px; WIDTH: 120px; POSITION: absolute; TOP: 525px; HEIGHT: 24px">
<div id="Label12" style=" font-family: Courier New; font-size: 14px;  height:24px;width:120px;"   >ESTADO CIVIL:</div>
</div>
<div id="Label41_outer" style="Z-INDEX: 23; LEFT: 196px; WIDTH: 192px; POSITION: absolute; TOP: 527px; HEIGHT: 24px">
<div id="Label41" style=" font-family: Arial; font-size: 12px;  height:24px;width:192px;"   ><STRONG><?php echo $Edit11 ?></STRONG></div>
</div>
<div id="Label14_outer" style="Z-INDEX: 24; LEFT: 85px; WIDTH: 96px; POSITION: absolute; TOP: 555px; HEIGHT: 24px">
<div id="Label14" style=" font-family: Courier New; font-size: 14px;  height:24px;width:96px;"   >ENDEREÇO:</div>
</div>
<div id="Label44_outer" style="Z-INDEX: 25; LEFT: 172px; WIDTH: 476px; POSITION: absolute; TOP: 556px; HEIGHT: 24px">
<div id="Label44" style=" font-family: Arial; font-size: 12px;  height:24px;width:476px;"   ><STRONG><?php echo $Edit15 ?></STRONG></div>
</div>
<div id="Label15_outer" style="Z-INDEX: 26; LEFT: 85px; WIDTH: 96px; POSITION: absolute; TOP: 585px; HEIGHT: 24px">
<div id="Label15" style=" font-family: Courier New; font-size: 14px;  height:24px;width:96px;"   >BAIRRO:</div>
</div>
<div id="Label45_outer" style="Z-INDEX: 27; LEFT: 148px; WIDTH: 209px; POSITION: absolute; TOP: 586px; HEIGHT: 24px">
<div id="Label45" style=" font-family: Arial; font-size: 12px;  height:24px;width:209px;"   ><STRONG><?php echo $Edit17 ?></STRONG></div>
</div>
<div id="Label18_outer" style="Z-INDEX: 28; LEFT: 85px; WIDTH: 96px; POSITION: absolute; TOP: 616px; HEIGHT: 24px">
<div id="Label18" style=" font-family: Courier New; font-size: 14px;  height:24px;width:96px;"   >TEL.:</div>
</div>
<div id="Label48_outer" style="Z-INDEX: 29; LEFT: 129px; WIDTH: 209px; POSITION: absolute; TOP: 617px; HEIGHT: 24px">
<div id="Label48" style=" font-family: Arial; font-size: 12px;  height:24px;width:209px;"   ><STRONG><?php echo $Edit18 ?></STRONG></div>
</div>
<div id="Label20_outer" style="Z-INDEX: 30; LEFT: 85px; WIDTH: 96px; POSITION: absolute; TOP: 646px; HEIGHT: 24px">
<div id="Label20" style=" font-family: Courier New; font-size: 14px;  height:24px;width:96px;"   >R.G.:</div>
</div>
<div id="Label50_outer" style="Z-INDEX: 31; LEFT: 129px; WIDTH: 209px; POSITION: absolute; TOP: 647px; HEIGHT: 24px">
<div id="Label50" style=" font-family: Arial; font-size: 12px;  height:24px;width:209px;"   ><STRONG><?php echo $Edit5 ?></STRONG></div>
</div>


<div id="Label1_outer" style="Z-INDEX: 59; LEFT: 323px; WIDTH: 136px; POSITION: absolute; TOP: 647px; HEIGHT: 24px">
<div id="Label1" style=" font-family: Courier New; font-size: 14px;  height:24px;width:136px;"   ><P>C.P.F&nbsp;.:</P></div>
</div>
<div id="Label58_outer" style="Z-INDEX: 60; LEFT: 399px; WIDTH: 140px; POSITION: absolute; TOP: 647px; HEIGHT: 24px">
<div id="Label58" style=" font-family: Verdana; font-size: 10px;  height:24px;width:140px;"   ><STRONG><?php echo $Edit7 ?></STRONG></div>
</div>



<div id="Label22_outer" style="Z-INDEX: 32; LEFT: 85px; WIDTH: 128px; POSITION: absolute; TOP: 677px; HEIGHT: 24px">
<div id="Label22" style=" font-family: Courier New; font-size: 14px;  height:24px;width:128px;"   >ESCOLARIDADE:</div>
</div>
<div id="Label52_outer" style="Z-INDEX: 33; LEFT: 212px; WIDTH: 153px; POSITION: absolute; TOP: 678px; HEIGHT: 24px">
<div id="Label52" style=" font-family: Arial; font-size: 12px;  height:24px;width:153px;"   ><STRONG><?php echo $Edit19 ?></STRONG></div>
</div>
<div id="Label24_outer" style="Z-INDEX: 34; LEFT: 85px; WIDTH: 56px; POSITION: absolute; TOP: 707px; HEIGHT: 24px">
<div id="Label24" style=" font-family: Courier New; font-size: 14px;  height:24px;width:56px;"   >CTPS:</div>
</div>
<div id="Label54_outer" style="Z-INDEX: 35; LEFT: 132px; WIDTH: 257px; POSITION: absolute; TOP: 708px; HEIGHT: 24px">
<div id="Label54" style=" font-family: Arial; font-size: 12px;  height:24px;width:257px;"   ><STRONG><?php echo $Edit20 ?></STRONG></div>
</div>
<div id="Label55_outer" style="Z-INDEX: 36; LEFT: 220px; WIDTH: 140px; POSITION: absolute; TOP: 739px; HEIGHT: 24px">
<div id="Label55" style=" font-family: Arial; font-size: 14px;  height:24px;width:140px;"   ><STRONG><?php echo $Edit1 ?></STRONG></div>
</div>
<div id="Label11_outer" style="Z-INDEX: 37; LEFT: 424px; WIDTH: 96px; POSITION: absolute; TOP: 497px; HEIGHT: 24px">
<div id="Label11" style=" font-family: Courier New; font-size: 14px;  height:24px;width:96px;"   >SEXO:</div>
</div>
<div id="Label40_outer" style="Z-INDEX: 38; LEFT: 471px; WIDTH: 193px; POSITION: absolute; TOP: 498px; HEIGHT: 24px">
<div id="Label40" style=" font-family: Arial; font-size: 12px;  height:24px;width:193px;"   ><STRONG><?php echo $Edit13 ?></STRONG></div>
</div>
<div id="Label13_outer" style="Z-INDEX: 39; LEFT: 424px; WIDTH: 136px; POSITION: absolute; TOP: 525px; HEIGHT: 24px">
<div id="Label13" style=" font-family: Courier New; font-size: 14px;  height:24px;width:136px;"   >NACIONALIDADE:</div>
</div>
<div id="Label42_outer" style="Z-INDEX: 40; LEFT: 559px; WIDTH: 97px; POSITION: absolute; TOP: 526px; HEIGHT: 24px">
<div id="Label42" style=" font-family: Arial; font-size: 12px;  height:24px;width:97px;"   ><STRONG><?php echo $Edit12 ?></STRONG></div>
</div>
<div id="Label16_outer" style="Z-INDEX: 41; LEFT: 319px; WIDTH: 96px; POSITION: absolute; TOP: 584px; HEIGHT: 24px">
<div id="Label16" style=" font-family: Courier New; font-size: 14px;  height:24px;width:96px;"   >CEP:</div>
</div>
<div id="Label46_outer" style="Z-INDEX: 42; LEFT: 355px; WIDTH: 209px; POSITION: absolute; TOP: 585px; HEIGHT: 24px">
<div id="Label46" style=" font-family: Arial; font-size: 12px;  height:24px;width:209px;"   ><STRONG><?php echo $Edit16 ?></STRONG></div>
</div>
<div id="Label17_outer" style="Z-INDEX: 43; LEFT: 562px; WIDTH: 96px; POSITION: absolute; TOP: 584px; HEIGHT: 24px">
<div id="Label17" style=" font-family: Courier New; font-size: 14px;  height:24px;width:96px;"   >UF:</div>
</div>
<div id="Label47_outer" style="Z-INDEX: 44; LEFT: 585px; WIDTH: 71px; POSITION: absolute; TOP: 585px; HEIGHT: 24px">
<div id="Label47" style=" font-family: Verdana; font-size: 10px;  height:24px;width:71px;"   ><STRONG>SP</STRONG></div>
</div>
<div id="Label27_outer" style="Z-INDEX: 52; LEFT: 261px; WIDTH: 216px; POSITION: absolute; TOP: 804px; HEIGHT: 24px">
<div id="Label27" style=" font-family: Courier New; font-size: 16px;  height:24px;width:216px;"  align="Center"   ><STRONG><U>A T E N Ç Ã O</U></STRONG></div>
</div>
<div id="Label26_outer" style="Z-INDEX: 53; LEFT: 79px; WIDTH: 569px; POSITION: absolute; TOP: 828px; HEIGHT: 92px">
<div id="Label26" style=" font-family: Courier New; font-size: 14px;  height:92px;width:569px;"   ><P align=center><STRONG>Para as desistências que forem comunicadas à secretaria no prazo de até 3 (três) dias úteis antes da data de início do curso, será devolvido o valor correspondente a 75% (setenta e cinco por cento) do valor pago pelo material didático. O Valor retido é para pagamento de despesas de secretaria.</STRONG></div>
</div>
<div id="Label28_outer" style="Z-INDEX: 54; LEFT: 109px; WIDTH: 56px; POSITION: absolute; TOP: 947px; HEIGHT: 24px">
<div id="Label28" style=" font-family: Courier New; font-size: 14px;  height:24px;width:56px;"   >DATA:</div>
</div>
<div id="Label56_outer" style="Z-INDEX: 55; LEFT: 156px; WIDTH: 185px; POSITION: absolute; TOP: 948px; HEIGHT: 24px">
<div id="Label56" style=" font-family: Arial; font-size: 12px;  height:24px;width:185px;"   ><STRONG><?php echo $data_fi ?></STRONG></div>
</div>
<div id="Label30_outer" style="Z-INDEX: 56; LEFT: 381px; WIDTH: 256px; POSITION: absolute; TOP: 963px; HEIGHT: 24px">
<div id="Label30" style=" font-family: Verdana; font-size: 14px;  height:24px;width:256px;"   ><P align=center>___________________________</div>
</div>
<div id="Label29_outer" style="Z-INDEX: 57; LEFT: 373px; WIDTH: 272px; POSITION: absolute; TOP: 979px; HEIGHT: 24px">
<div id="Label29" style=" font-family: Courier New; font-size: 14px;  height:24px;width:272px;"   ><P align=center>ASSINATURA DO CANDIDATO</div>
</div>
<div id="Label25_outer" style="Z-INDEX: 58; LEFT: 85px; WIDTH: 136px; POSITION: absolute; TOP: 738px; HEIGHT: 24px">
<div id="Label25" style=" font-family: Courier New; font-size: 14px;  height:24px;width:136px;"   >ASSOCIADO ? No:</div>
</div>
</td></tr></table>
</form></body>
</html>
<script Language="JavaScript">
window.print();
</script>

<script language="JavaScript"> 
<!--
window.opener = window
window.close()
--> </script>

<script language="javascript">
setTimeout("fechar()",100);
</script>
