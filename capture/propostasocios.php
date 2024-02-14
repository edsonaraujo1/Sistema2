<?
/*
 --------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Proposta de Associados
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 --------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_ASOC");

if ($deixar_1 == "NAO"){
	
    echo "  <html>
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
			     <font face=arial><b>*** <font color = #FF0000> ERRO ACESSO NÃO PERMITIDO !!!</font> ***<br>
				                     
									 <font face=arial>Usuário sem Permissão</b>
			<table align=center>
			<form method='POST' action='../avaleht.php?servletjs2=20$$20'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>";
	        exit();
}	

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

          <form method="POST" action="javascript:window.close()">
          <td><input type=image name="socios" src="../imagens/botaoazul25.PNG"></td>
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
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
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

@mysql_select_db($db);
// retorna uma pesquisa

// Regata Secao
@session_start();
$Cod_3 = $_SESSION['navega'];

$Cod_p = $Cod_2;


if ($Cod_3 != 0)
{
   $consulta  = "SELECT * FROM socios WHERE id = '". anti_sql_injection($Cod_3) ."' ORDER BY COD";
}
else
{
   $consulta  = "SELECT * FROM socios WHERE CODP = '". anti_sql_injection($Cod_p) ."'";
}   

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id         = @$row["id"];

if (!empty($id)){

$cod		= @$row["COD"];
$new_fot    = @$row["CODP"];
$datinsc	= @$row["DATINSC"];
$dat2		= @$row["DAT2"];
$sede		= @$row["SEDE"];
$dat3		= @$row["DAT3"];
$categoria	= @$row["CATEGORIA"];
$nomeassoc	= @$row["NOMEASSOC"];
$datnasc	= @$row["DATNASC"];
$rgassoc    = Trim(@$row["RGASSOC"]);
$cpf  		= @$row["CPF"];
$natural	= @$row["NATURAL1"];
$nascion	= @$row["NASCION"];
$rua		= @$row["RUA"];
$endresid	= @$row["ENDRESID"];
$numero		= @$row["NUMERO"];
$bairrores	= @$row["BAIRRORES"];
$cidaderes	= @$row["CIDADERES"];
$cepres		= @$row["CEPRES"];
$estadores	= @$row["ESTADORES"];
$telefone	= @$row["TELEFONE"];
$carttrab	= @$row["CARTTRAB"];
$serie		= @$row["SERIE"];
$emiscart	= @$row["EMISCART"];
$cargoassoc	= @$row["CARGOASSOC"];
$datadimis	= @$row["DATADIMIS"];
$codedif	= @$row["CODEDIF"];
$pai		= @$row["PAI"];
$mae		= @$row["MAE"];
$estcivil	= @$row["ESTCIVIL"];
$numdep		= @$row["NUMDEP"];
$conjuge	= @$row["CONJUGE"];
$datconj	= @$row["DATCONJ"];
$filho01	= @$row["FILHO01"];
$dat01		= @$row["DAT01"];
$sexo01		= @$row["SEXO01"];
$filho02	= @$row["FILHO02"];
$dat02		= @$row["DAT02"];
$sexo02		= @$row["SEXO02"];
$filho03	= @$row["FILHO03"];
$dat03		= @$row["DAT03"];
$sexo03		= @$row["SEXO03"];
$filho04	= @$row["FILHO04"];
$dat04		= @$row["DAT04"];
$sexo04		= @$row["SEXO04"];
$filho05	= @$row["FILHO05"];
$dat05		= @$row["DAT05"];
$sexo05		= @$row["SEXO05"];
$filho06	= @$row["FILHO06"];
$dat06		= @$row["DAT06"];
$sexo06		= @$row["SEXO06"];
$filho07	= @$row["FILHO07"];
$dat07		= @$row["DAT07"];
$sexo07		= @$row["SEXO07"];
$filho08	= @$row["FILHO08"];
$dat08		= @$row["DAT08"];
$sexo08		= @$row["SEXO08"];
$filho09	= @$row["FILHO09"];
$dat09		= @$row["DAT09"];
$sexo09		= @$row["SEXO09"];
$filho10	= @$row["FILHO10"];
$dat10		= @$row["DAT10"];
$sexo10		= @$row["SEXO10"];
$mes		= @$row["MES"];
$ano		= @$row["ANO"];
$cad_si		= @$row["CAD_SI"];
$saldo		= @$row["SALDO"];
$prest		= @$row["PREST"];
$pago		= @$row["PAGO"];
$nu			= @$row["NU"];
$obs		= @$row["OBS"];
$log_ssoc	= @$row["LOG_SSOC"];
$hora		= @$row["HORA"];
$sexo		= @$row["SEXO"];
$campo1		= @$row["CAMPO1"];
$campo2		= @$row["CAMPO2"];
}else{

	
$consulta2  = "SELECT * FROM socios WHERE CODP = '". anti_sql_injection($Cod_3) ."' ORDER BY COD";

$resultado2 = @mysql_query($consulta2);

$row2 = @mysql_fetch_array($resultado2);
	
$id         = @$row2["id"];
$cod		= @$row2["COD"];
$new_fot    = @$row2["CODP"];
$datinsc	= @$row2["DATINSC"];
$dat2		= @$row2["DAT2"];
$sede		= @$row2["SEDE"];
$dat3		= @$row2["DAT3"];
$categoria	= @$row2["CATEGORIA"];
$nomeassoc	= @$row2["NOMEASSOC"];
$datnasc	= @$row2["DATNASC"];
$rgassoc    = Trim(@$row2["RGASSOC"]);
$cpf  		= @$row2["CPF"];
$natural	= @$row2["NATURAL1"];
$nascion	= @$row2["NASCION"];
$rua		= @$row2["RUA"];
$endresid	= @$row2["ENDRESID"];
$numero		= @$row2["NUMERO"];
$bairrores	= @$row2["BAIRRORES"];
$cidaderes	= @$row2["CIDADERES"];
$cepres		= @$row2["CEPRES"];
$estadores	= @$row2["ESTADORES"];
$telefone	= @$row2["TELEFONE"];
$carttrab	= @$row2["CARTTRAB"];
$serie		= @$row2["SERIE"];
$emiscart	= @$row2["EMISCART"];
$cargoassoc	= @$row2["CARGOASSOC"];
$datadimis	= @$row2["DATADIMIS"];
$codedif	= @$row2["CODEDIF"];
$pai		= @$row2["PAI"];
$mae		= @$row2["MAE"];
$estcivil	= @$row2["ESTCIVIL"];
$numdep		= @$row2["NUMDEP"];
$conjuge	= @$row2["CONJUGE"];
$datconj	= @$row2["DATCONJ"];
$filho01	= @$row2["FILHO01"];
$dat01		= @$row2["DAT01"];
$sexo01		= @$row2["SEXO01"];
$filho02	= @$row2["FILHO02"];
$dat02		= @$row2["DAT02"];
$sexo02		= @$row2["SEXO02"];
$filho03	= @$row2["FILHO03"];
$dat03		= @$row2["DAT03"];
$sexo03		= @$row2["SEXO03"];
$filho04	= @$row2["FILHO04"];
$dat04		= @$row2["DAT04"];
$sexo04		= @$row2["SEXO04"];
$filho05	= @$row2["FILHO05"];
$dat05		= @$row2["DAT05"];
$sexo05		= @$row2["SEXO05"];
$filho06	= @$row2["FILHO06"];
$dat06		= @$row2["DAT06"];
$sexo06		= @$row2["SEXO06"];
$filho07	= @$row2["FILHO07"];
$dat07		= @$row2["DAT07"];
$sexo07		= @$row2["SEXO07"];
$filho08	= @$row2["FILHO08"];
$dat08		= @$row2["DAT08"];
$sexo08		= @$row2["SEXO08"];
$filho09	= @$row2["FILHO09"];
$dat09		= @$row2["DAT09"];
$sexo09		= @$row2["SEXO09"];
$filho10	= @$row2["FILHO10"];
$dat10		= @$row2["DAT10"];
$sexo10		= @$row2["SEXO10"];
$mes		= @$row2["MES"];
$ano		= @$row2["ANO"];
$cad_si		= @$row2["CAD_SI"];
$saldo		= @$row2["SALDO"];
$prest		= @$row2["PREST"];
$pago		= @$row2["PAGO"];
$nu			= @$row2["NU"];
$obs		= @$row2["OBS"];
$log_ssoc	= @$row2["LOG_SSOC"];
$hora		= @$row2["HORA"];
$sexo		= @$row2["SEXO"];
$campo1		= @$row2["CAMPO1"];
$campo2		= @$row2["CAMPO2"];
	
	
}
$del_2 = $cam_foto;
$ext2  = '.bmp';
$cami2 = "'".Trim($del_2.$cod.$nu.$ext2)."'";
$cami3 = Trim(" ".$del_2.$cod.$nu.$ext2);

			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = "PROPOSTA/".$cod.$nu;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);


// Abrir Table de Edificios

$consulta1  = "SELECT * FROM edificios Where COD = '". anti_sql_injection($codedif) ."'";

$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$cod_edif     = @$row1["COD"];
$cond_edif    = @$row1["COND"];
$nom_edif     = @$row1["NOME"];
$rua_edif     = @$row1["RUA"];
$end_edif     = @$row1["ENDERECO"];
$num_edif     = @$row1["NUMERO"];


// Abre Tabela Categoria

$consulta2a  = "SELECT * FROM categ Where CODIGO = '". anti_sql_injection($categoria) ."'";

$resultado2a = @mysql_query($consulta2a);

$row2a = @mysql_fetch_array($resultado2a);

$categ_1   = @$row2a["DESCRICAO"];

?>

<html>
<div class=nao_mostrar>
<table border="0" colspan=6 Width="770" class=p>
<tr>
   <th><img src=<?='../'.$logo2_sis;?> ></th>
   </th>
<tr>
   <td class=p align=center><b>P&nbsp;&nbsp;R&nbsp;&nbsp;O&nbsp;&nbsp;P&nbsp;&nbsp;O&nbsp;&nbsp;S&nbsp;&nbsp;T&nbsp;&nbsp;                            A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;P&nbsp;&nbsp;A&nbsp;&nbsp;R&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;                         &nbsp;&nbsp;&nbsp;&nbsp;S&nbsp;&nbsp;Ó&nbsp;&nbsp;C&nbsp;&nbsp;I&nbsp;&nbsp;O</b></td>
</tr>
<tr>   
<td align="center" class=p >---------------------------------------------------------------------------------------------------------------------------</td>
</tr>
<tr>
   <th align="center" class=p><p style="font-family:Arial; font-size:12;"><b>DADOS PESSOAIS DO SÓCIO </b></font></th>
</tr>
<tr>
   <th class=p><b>=============================</b></th>
</tr>   
</table>

<table  cellpadding="0" cellspacing="1" border="0" Width="770" class=p>
<tr align=left class=p>
<th class=p><p style="font-family:Arial; font-size:12;">Nº INSCRIÇÃO </th>
<th class=p><b><?=$cod;?><?=$nu;?></b></th>

<th class=p></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">CADASTRO </th>
<th class=p><p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$datinsc;?></th>

<th class=p  align=right><p style="font-family:Arial; font-size:12;">CATEGORIA </th>
<th class=p><p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$categ_1;?></th>
</tr>

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">NOME </th>
<th colspan="5"><p style="font-family:Arial; font-size:12;"><?=$nomeassoc;?></th>
</tr> 

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">ENDEREÇO </th>
<th colspan="5"><p style="font-family:Arial; font-size:12;"><?=$rua." ".$endresid.", ".$numero;?></th>
</tr>

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">BAIRRO </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;"><?=$bairrores;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">CEP </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$cepres;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">FONE </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$telefone;?></th>


<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">CIDADE </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;"><?=$cidaderes;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">ESTADO </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$estadores;?></th>

<th class=p align=right><p style="font-family:Arial; font-size:12;">DT. NASCIMENTO </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$datnasc;?></th>

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">NATURAL DE </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;"><?=$natural;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">NACIONALIDADE </th>
<th colspan="3"><p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$nascion;?></th>


<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">MÃE </th>
<th colspan="5"><p style="font-family:Arial; font-size:12;"><?=$mae;?></th>
</tr>

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">PAI </th>
<th colspan="5"><p style="font-family:Arial; font-size:12;"><?=$pai;?></th>
</tr>


<tr>   
<th colspan="7" class=p>----------------------------------------------------------------------------------------------------------------------------------------</th>
</tr>

<tr>   
<th colspan="7" align="center" class=p><p style="font-family:Arial; font-size:12;"><b>DADOS PROFISSIONAIS DO SÓCIO </b></th>
</tr>

<tr>   
<th colspan="7" align="center" class=p><b>=============================</b></th>
</tr>

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">REGISTRO GERAL </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;"><?=$rgassoc;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">CPF </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$cpf;?></th>


<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">CART. TRAB. </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;"><?=$carttrab;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">SERIE </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$serie;?></th>

<th class=p align=right><p style="font-family:Arial; font-size:12;">OECP </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$emiscart;?></th>


<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">CARGO </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;"><?=$cargoassoc;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">DT. ADMISSAO </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$datadimis;?></th>


<tr>   
<th colspan="7" class=p>----------------------------------------------------------------------------------------------------------------------------------------</th>
</tr>

<tr>   
<th colspan="7" align="center"><p style="font-family:Arial; font-size:12;"><b>DADOS DOS DEPENDENTES DO SÓCIO</b> </th>
</tr>

<tr>   
<th colspan="7" align="center" class=p><b>=========================================</b></th>
</tr>

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">Nº DEPENDENTES </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;"><?=$numdep;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">ESTADO CIVIL </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$estcivil;?></th>

</tr>
</td>

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">CONJUGE </th>
<th colspan="4"><p style="font-family:Arial; font-size:12;"><?=$conjuge;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">DT. NASC. </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$datconj;?></th>
</tr>

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">DEPENDENTE </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;"><?=$filho01;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">DAT. NASC. </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$dat01;?></th>

<th class=p align=right><p style="font-family:Arial; font-size:12;">SEXO </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$sexo01;?></th>

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">DEPENDENTE </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;"><?=$filho02;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">DAT. NASC. </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$dat02;?></th>

<th class=p align=right><p style="font-family:Arial; font-size:12;">SEXO </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$sexo02;?></th>

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">DEPENDENTE </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;"><?=$filho03;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">DAT. NASC. </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$dat03;?></th>

<th class=p align=right><p style="font-family:Arial; font-size:12;">SEXO </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$sexo03;?></th>

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">DEPENDENTE </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;"><?=$filho04;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">DAT. NASC. </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$dat04;?></th>

<th class=p align=right><p style="font-family:Arial; font-size:12;">SEXO </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$sexo04;?></th>

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">DEPENDENTE </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;"><?=$filho05;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">DAT. NASC. </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$dat05;?></th>

<th class=p align=right><p style="font-family:Arial; font-size:12;">SEXO </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$sexo05;?></th>

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">DEPENDENTE </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;"><?=$filho06;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">DAT. NASC. </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$dat06;?></th>

<th class=p align=right><p style="font-family:Arial; font-size:12;">SEXO </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$sexo06;?></th>

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">DEPENDENTE </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;"><?=$filho07;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">DAT. NASC. </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$dat07;?></th>

<th class=p align=right><p style="font-family:Arial; font-size:12;">SEXO </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$sexo07;?></th>

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">DEPENDENTE </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;"><?=$filho08;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">DAT. NASC. </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$dat08;?></th>

<th class=p align=right><p style="font-family:Arial; font-size:12;">SEXO </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$sexo08;?></th>

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">DEPENDENTE </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;"><?=$filho09;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">DAT. NASC. </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$dat09;?></th>

<th class=p align=right><p style="font-family:Arial; font-size:12;">SEXO </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$sexo09;?></th>

<tr align=left>
<th class=p><p style="font-family:Arial; font-size:12;">DEPENDENTE </th>
<th colspan="2"><p style="font-family:Arial; font-size:12;"><?=$filho10;?></th>
<th class=p align=right><p style="font-family:Arial; font-size:12;">DAT. NASC. </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$dat10;?></th>

<th class=p align=right><p style="font-family:Arial; font-size:12;">SEXO </th>
<th>            <p style="font-family:Arial; font-size:12;">&nbsp;&nbsp;&nbsp;<?=$sexo10;?></th>


<tr>   
<th class=cp colspan="7" align="center"><p style="font-family:Arial; font-size:17;">&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>DECLARAÇÃO</b> </th>
</tr>

<tr>   
<th colspan="7" align="center" class=p><b>
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;=========================================</b></th>
</tr>

<table width="755" border="0">
  <tr>
    <th width="871" scope="col">
    <img src='ver.php?new_fot=<?=$new_fot;?>' width="120" height="158" align="left" border="1">
    
      <div align="center">
        <table width="552" border="0">

            <tr>
              <th scope="col"><div align="right">
			  Declaro acatar as noramas contidas no Estatuto Social da Entidade
			  
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="right">
			  Sindical,&nbsp;&nbsp;&nbsp;comprometendo-me,&nbsp;&nbsp;neste&nbsp;ato&nbsp;a&nbsp;respeitar&nbsp;e&nbsp;cumprir&nbsp;&nbsp;&nbsp;&nbsp;as
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="right">
			  suas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;disposições,&nbsp;&nbsp;&nbsp;bem como&nbsp;&nbsp;&nbsp;as&nbsp;&nbsp;deliberações&nbsp;&nbsp;das&nbsp;&nbsp;&nbsp;assembléias
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="right">
			  realizadas.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="right">
			  ##########################################################
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="left" class=p>
              <p style="font-family:Arial; font-size:12;">CODIGO......
              &nbsp;&nbsp;&nbsp;<?=$codedif;?>  
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="left" class=p>
			  <p style="font-family:Arial; font-size:12;">NOME.........
              &nbsp;&nbsp;&nbsp;<?=$cond_edif." ".$nom_edif;?>  
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="left" class=p>
			  <p style="font-family:Arial; font-size:12;">ENDEREÇO
              &nbsp;&nbsp;&nbsp;<?=$rua_edif." ".$end_edif.", ".$num_edif;?>  
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="right"></div></th>
            </tr>
                  </table>
    </div></th>
  </tr>
</table>

<table border="0" width="750">
<tr>   
<th class=cp colspan="7" align="center"><p style="font-family:Arial; font-size:17;">&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ATENÇÃO</b> </th>
</tr>

<tr>   
<th colspan="7" align="center" class=p><b>
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;=========================================</b></th>
</tr>
</table>


<table width="755" border="0">
  <tr>
   <font face="Arial" size="1">&nbsp;&nbsp;&nbsp;&nbsp;IMPRESSÃO DIGITAL</font>

    <th width="871" scope="col">

    <img src="../imagens/fotos/0A.bmp" width="120" height="158" align="left" border="1">
    
      <div align="center">
        <table width="552" border="0">

            <tr>
              <th scope="col"><div align="right">
			  Para pagamento das mensalidades trazer o último Comprovante
			  
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="right">
              de Pagamento ou Carteira Profissional com registro.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                 &nbsp;&nbsp;
			  </div></th> 
            </tr>
            <tr>
              <th scope="row"><div align="right">
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="right">
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="right">
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="left" class=p>
              </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="center">
			  <font face="Arial" size="3">SÃO PAULO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=DATE("d");?>
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DE 
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$mes_data;?>  
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DE &nbsp;&nbsp;&nbsp;&nbsp;<?=DATE("Y");?></font> 
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="left">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="center">
              ---------------------------------------------------------------------------------------<br>
              <font face="Arial" size="2">ASSINATURA DO SÓCIO</font>
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="center">
              <p style="font-family:Arial; font-size:10;">PARA QUALQUER ATENDIMENTOS NO SINDICATO, SOMENTE COM A CARTEIRA SOCIAL</font>
			  </div></th>
            </tr>


                  </table>

                  
    </div></th>
  </tr>
</table>



</table>

</body>
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
