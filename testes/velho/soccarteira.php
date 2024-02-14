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
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

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
<td><input type=image name="socios" src="imagens/botaoazul25.PNG"></td>
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
include($path."conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

mysql_select_db($db);
// retorna uma pesquisa

$Cod_p = Trim($Cod_2.$Nu_2);

if ($Cod_3 != 0)
{
   $consulta  = "SELECT * FROM socios WHERE CODP = '$Cod_3' ORDER BY COD";
}
else
{
   $consulta  = "SELECT * FROM socios WHERE CODP = '$Cod_p' ORDER BY COD";
}   

$resultado = mysql_query($consulta);

$row = mysql_fetch_array($resultado);

$id         = @$row["id"];
$cod		= @$row["COD"];
$datinsc	= @$row["DATINSC"];
$dat2		= @$row["DAT2"];
$sede		= @$row["SEDE"];
$dat3		= @$row["DAT3"];
$categoria	= @$row["CATEGORIA"];
$nomeassoc	= @$row["NOMEASSOC"];
$datnasc	= @$row["DATNASC"];
$rgassoc    = Trim(@$row["RGASSOC"]);
$cpf  		= @$row["CPF"];
$natural	= @$row["CRIACAO"];
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

$consulta1  = "SELECT * FROM edificios Where COD = '$codedif'";

$resultado1 = @mysql_query($consulta1);

$row1 = mysql_fetch_array($resultado1);

$cod_edif     = @$row1["COD"];
$cond_edif    = @$row1["COND"];
$nom_edif     = @$row1["NOME"];
$rua_edif     = @$row1["RUA"];
$end_edif     = @$row1["ENDERECO"];
$num_edif     = @$row1["NUMERO"];


// Abre Tabela Categoria

$consulta2  = "SELECT * FROM categ Where codigo = '$categoria'";

$resultado2 = @mysql_query($consulta2);

$row2 = mysql_fetch_array($resultado2);

$categ_1   = @$row2["descricao"];

?>

<html>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div align="center" class=nao_mostrar>
<table border="0" colspan=6 class=p align="center">

<table width="155" border="0">
  <tr align="center">
    <th width="171" scope="col">
    <img src='ver.php?new_fot=<?=$id;?>' width="100" height="130" align="left" border="0">
    
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
			  <?=$cod.$nu;?></b>			  </div></th>
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
