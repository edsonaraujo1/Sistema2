<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Cadastro de Socios
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");

require("menu.php");

$nome3 = $_SESSION["nome_log"];


session_start();

unset ($_SESSION['cod']);
unset ($_SESSION['nu']);
unset ($_SESSION['rgassoc']);
unset ($_SESSION['cpf']);
unset ($_SESSION['datinsc']);
unset ($_SESSION['dat2']);
unset ($_SESSION['dat3']);
unset ($_SESSION['sede']);
unset ($_SESSION['categoria']);
unset ($_SESSION['codedif']);
unset ($_SESSION['nomeassoc']);
unset ($_SESSION['rua']);
unset ($_SESSION['endresid']);
unset ($_SESSION['numero']);
unset ($_SESSION['bairrores']);
unset ($_SESSION['cepres']);
unset ($_SESSION['cidaderes']);
unset ($_SESSION['estadores']);
unset ($_SESSION['telefone']);
unset ($_SESSION['carttrab']);
unset ($_SESSION['serie']);
unset ($_SESSION['emiscart']);
unset ($_SESSION['cargoassoc']);
unset ($_SESSION['datadimis']);
unset ($_SESSION['estcivil']);
unset ($_SESSION['numdep']);
unset ($_SESSION['mes']);
unset ($_SESSION['ano']);
unset ($_SESSION['cad_si']);
unset ($_SESSION['saldo']);
unset ($_SESSION['prest']);
unset ($_SESSION['pago']);
unset ($_SESSION['natural']);
unset ($_SESSION['datnasc']);
unset ($_SESSION['nascion']);
unset ($_SESSION['pai']);
unset ($_SESSION['mae']);
unset ($_SESSION['conjuge']);
unset ($_SESSION['datconj']);
unset ($_SESSION['filho01']);
unset ($_SESSION['dat01']);
unset ($_SESSION['sexo01']);
unset ($_SESSION['filho02']);
unset ($_SESSION['dat02']);
unset ($_SESSION['sexo02']);
unset ($_SESSION['filho03']);
unset ($_SESSION['dat03']);
unset ($_SESSION['sexo03']);
unset ($_SESSION['filho04']);
unset ($_SESSION['dat04']);
unset ($_SESSION['sexo04']);
unset ($_SESSION['filho05']);
unset ($_SESSION['dat05']);
unset ($_SESSION['sexo05']);
unset ($_SESSION['filho06']);
unset ($_SESSION['dat06']);
unset ($_SESSION['sexo06']);
unset ($_SESSION['filho07']);
unset ($_SESSION['dat07']);
unset ($_SESSION['sexo07']);
unset ($_SESSION['filho08']);
unset ($_SESSION['dat08']);
unset ($_SESSION['sexo08']);
unset ($_SESSION['filho09']);
unset ($_SESSION['dat09']);
unset ($_SESSION['sexo09']);
unset ($_SESSION['filho10']);
unset ($_SESSION['dat10']);
unset ($_SESSION['sexo10']);
unset ($_SESSION['obs']);

// Abre Conexão com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

@mysql_select_db($db)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

if (strlen($cod_1) > 0){
	
   $consulta  = "SELECT * FROM socios WHERE CODP = '$cod_1'";

}else{

   $consulta  = "SELECT * FROM socios ORDER BY id ASC LIMIT 0,50";
	
}
if (!empty($Cod_xxx)){
	
   $consulta  = "SELECT * FROM socios WHERE id = '$Cod_xxx' ORDER BY id ASC LIMIT 0,50";
	
}
// Função Navegar pelo registro Proximo e Anterior
If ($Cod_Anterior != 0){
	
	$id = $Cod_Anterior;

    if($Cod_Anterior != 0){
       $id = $id - 1;
       }
       else{
           $id = $id +1;
           }

       if ($id) {
       $consulta = "SELECT * FROM socios WHERE id = '$Cod_Anterior' ORDER BY id ";
	
}
}
If ($Cod_Proximo != 0){
	
	$id = $Cod_Proximo;

    if($Cod_Proximo != 0){
       $id = $id -0;
       }
       else{
           $id = $id -1;
           }

       if ($id) {
       $consulta = "SELECT * FROM socios ORDER BY id LIMIT $id,1";
	
}
}

If ($Cod_fim != 0){
	
       $consulta = "SELECT * FROM socios ORDER BY id DESC LIMIT 0,1";
}

If ($Cod_inicio != 0){
	
       $consulta = "SELECT * FROM socios ORDER BY id ASC LIMIT 0,1";
	
}

// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id			= @$row["id"];
$Edit1		= @$row["COD"];
$new_fot    = @$row["CODP"];
$Edit2	    = @$row["NU"];
$Edit3      = Trim(@$row["RGASSOC"]);
$Edit4  	= @$row["CPF"];
$Edit5  	= @$row["DATINSC"];
$Edit6		= @$row["DAT2"];
$Edit7		= @$row["DAT3"];
$Edit8		= @$row["SEDE"];
$Edit9		= @$row["CATEGORIA"];
$Edit10		= @$row["CODEDIF"];
$Edit11		= @$row["NOMEASSOC"];
$Edit12		= @$row["RUA"];
$Edit13 	= @$row["ENDRESID"];
$Edit14		= @$row["NUMERO"];
$Edit15		= @$row["BAIRRORES"];
$Edit16		= @$row["CEPRES"];
$Edit17		= @$row["CIDADERES"];
$Edit18		= @$row["ESTADORES"];
$Edit19		= @$row["TELEFONE"];
$Edit20		= @$row["CARTTRAB"];
$Edit21		= @$row["SERIE"];
$Edit22		= @$row["EMISCART"];
$Edit23		= @$row["CARGOASSOC"];
$Edit24		= @$row["DATADIMIS"];
$Edit25		= @$row["ESTCIVIL"];
$Edit26		= @$row["NUMDEP"];
$Edit27		= @$row["MES"];
$Edit28		= @$row["ANO"];
$Edit29		= @$row["CAD_SI"];
$Edit30		= @$row["SALDO"];
$Edit31		= @$row["PREST"];
$Edit32		= @$row["PAGO"];
$Edit33		= @$row["NATURAL1"];
$Edit34		= @$row["DATNASC"];
$Edit35		= @$row["NASCION"];
$Edit36		= @$row["PAI"];
$Edit37		= @$row["MAE"];
$Edit38		= @$row["CONJUGE"];
$Edit39		= @$row["DATCONJ"];
$Edit40		= @$row["FILHO01"];
$Edit41		= @$row["DAT01"];
$Edit42		= @$row["SEXO01"];
$Edit43		= @$row["FILHO02"];
$Edit44		= @$row["DAT02"];
$Edit45		= @$row["SEXO02"];
$Edit46		= @$row["FILHO03"];
$Edit47		= @$row["DAT03"];
$Edit48		= @$row["SEXO03"];
$Edit49		= @$row["FILHO04"];
$Edit50		= @$row["DAT04"];
$Edit51		= @$row["SEXO04"];
$Edit52		= @$row["FILHO05"];
$Edit53		= @$row["DAT05"];
$Edit54		= @$row["SEXO05"];
$Edit55		= @$row["FILHO06"];
$Edit56		= @$row["DAT06"];
$Edit57		= @$row["SEXO06"];
$Edit58		= @$row["FILHO07"];
$Edit59		= @$row["DAT07"];
$Edit60		= @$row["SEXO07"];
$Edit61		= @$row["FILHO08"];
$Edit62		= @$row["DAT08"];
$Edit63		= @$row["SEXO08"];
$Edit64 	= @$row["FILHO09"];
$Edit65		= @$row["DAT09"];
$Edit66		= @$row["SEXO09"];
$Edit67		= @$row["FILHO10"];
$Edit68		= @$row["DAT10"];
$Edit69		= @$row["SEXO10"];
$Edit70		= @$row["OBS"];

$log_ssoc	= @$row["LOG_SSOC"];
$hora		= @$row["HORA"];
$sexo		= @$row["SEXO"];
$campo1		= @$row["CAMPO1"];
$campo2		= @$row["CAMPO2"];
$menssagens = "* * * Visualizar * * *";

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$soc1       = @$row3["soc1"];
$soc2       = @$row3["soc2"];
$soc3       = @$row3["soc3"];

// Abrir Table de Edificios

$consulta4  = "SELECT * FROM edificios Where COD = '$Edit10'";

$resultado4 = @mysql_query($consulta4);

$row4 = @mysql_fetch_array($resultado4);

$cod_edif   = @$row4["COD"];
$cond  = trim(@$row4["COND"].@$row4["NOME"]);
$edif  = trim(@$row4["NOME"]);

$nome_do_edif = $cond;

// Abre Tabela Categoria

$consulta5  = "SELECT * FROM categ Where CODIGO = '$Edit9'";

$resultado5 = @mysql_query($consulta5);

$row5 = @mysql_fetch_array($resultado5);

$categ_1   = @$row5["DESCRICAO"];

// Abre Tabela Oposicao

$consulta6  = "SELECT * FROM oposicao3 Where RGASSOC = '$Edit3'";

$resultado6 = @mysql_query($consulta6);

$row6 = mysql_fetch_array($resultado6);

$cod_opo = @$row6["COD"];
$rg_opo  = @$row6["RGASSOC"];

if ($cod_opo != 0){
	?>	
		<script LANGUAGE='JavaScript'>
		<!--
		alert("Socio com carta de OPOSIÇÃO !!!");
		//-->
		</script>
	<?	
	
	}

$consulta7 = "SELECT * FROM tb_segunda WHERE codp = '$new_fot'";
	
$resultado7 = @mysql_query($consulta7);

$row7 = @mysql_fetch_array($resultado7);

$id_9 	   = @$row7["cod_foto"];
$id_imagem = @$row7["id_imagem"];

if(!empty($id_imagem)){
$mostra_branco = "faz";	
}else{
$mostra_branco = "nao";	
	
}	

?>

<html>
<head>
<title><?=$Titulo;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<style type="text/css" media="print">
div.invisivel {
visibility: hidden; 
}
</style>
<script src="script.js"></script>
</head>

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
<body>
<?
require("soclayout.php");
?>
<tr><td><!-- AQUI SERÁ APRESENTADO O RESULTADO DA BUSCA DINÂMICA.. OU SEJA OS NOMES -->
<div id="pagina" class="invisivel"></div></td></tr>
</body>
</html>