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

$cad_catego_01 = "        "; 

If ($categoria == "I")
{
	$cad_catego_01 = "(ISENTO)";
}
If ($categoria == "R")
{
	$cad_catego_01 = "(REMIDO)";
}

$del_2 = $cam_foto;
$ext2  = '.bmp';
$cami2 = "'".Trim($del_2.$cod.$nu.$ext2)."'";
$cami3 = Trim(" ".$del_2.$cod.$nu.$ext2);


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = "CARTEIRINHA/".$cod.$nu;
			
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

$consulta2a  = "SELECT * FROM categ Where codigo = '". anti_sql_injection($categoria) ."'";

$resultado2a = @mysql_query($consulta2a);

$row2a = @mysql_fetch_array($resultado2a);

$categ_1   = @$row2a["descricao"];

?>

<html>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br />
<br />
<br />

<div align="center" class=nao_mostrar>
<table border="0" colspan=6 class=p align="center">

<table width="155" border="0">
  <tr align="center">
    <th width="171" scope="col">
    <img src='ver.php?new_fot=<?=$new_fot;?>' width="100" height="130" align="left" border="0">
    
      <div align="center">
        <table width="252" border="0" align="center">
            <tr align="center">
              <th scope="col"><div align="center">
			  <p style="font-family:Arial; font-size:5; COLOR:white">
			   . </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="center">
			  
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="center" class=p>
              <p style="font-family:Arial; font-size:11;">
			  <?=$nomeassoc;?> 
			    </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="center">
              <p style="font-family:Arial; font-size:16;">
			  <?=$cod.$nu;?>&nbsp;&nbsp;&nbsp;&nbsp;<?=$cad_catego_01;?></b>			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="center">
              <p style="font-family:Arial; font-size:11;">
			  <?=$datinsc;?> 
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="center" class=p>
              <p style="font-family:Arial; font-size:12;">
			  <?=$cargoassoc;?>  
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="left" class=p>
			  <p style="font-family:Arial; font-size:12;">  
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="left" class=p>
			  <p style="font-family:Arial; font-size:12;">  
			  </div></th>
            </tr>
            <tr>
              <th scope="row"><div align="right"></div></th>
            </tr>
                  </table>
    </div></th>
  </tr>
</table>

</body>
</html>
<script Language="JavaScript">
window.print();
</script>

<script language="javascript">
setTimeout("fechar()",100);
</script>
