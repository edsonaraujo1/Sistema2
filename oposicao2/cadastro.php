<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

unset ($_SESSION['Faz_uma']);

$nome3 = $_SESSION["nome_log"];

require($path."logar.php");

require("menu.php");

require("vaurls.php");

$deixar = acesso_url("CADOPOS");

if ($deixar == "SIM"){

// Resgata a Sessao
session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);

// Abre Conex�o com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** N�o foi possivel conectar !!! ***</b>
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

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** N�o Foi possivel selecionar o banco de dados !!! ***</b>
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
	
   $consulta  = "SELECT * FROM oposicao3 WHERE id = '$cod_1' ORDER BY COD ASC";

}else{

   $consulta  = "SELECT * FROM oposicao3 ORDER BY id ASC LIMIT 0,50";
	
}
if (!empty($Cod_xx)){
	
   $consulta  = "SELECT * FROM oposicao3 WHERE id = '$Cod_xx' ORDER BY COD ASC";
	
}

if (!empty($cod_3)){
	
   $consulta  = "SELECT * FROM oposicao3 WHERE id = '$cod_3' ORDER BY COD ASC";
	
}

if (!empty($cod_5)){
	
   $consulta  = "SELECT * FROM oposicao3 WHERE COD = '$cod_5' ORDER BY COD ASC";
	
}

// Fim da Fun��o Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id     = @$row["id"];
$Edit1  = @$row["COD"];
$Edit2  = @$row["DAT2"];
$Edit3  = @$row["DATINSC"];
$Edit4  = @$row["RGASSOC"];
$Edit5  = @$row["CPF"];
$Edit6  = @$row["CODP"];
$Edit7  = @$row["CATEGORIA"];
$Edit8  = @$row["NOMEASSOC"];
$Edit9  = @$row["ENDRESID"];
$Edit10 = @$row["CEPRES"];
$Edit11 = @$row["CODEDIF"];
$Edit12 = @$row["CNPJ"];
$Edit13 = @$row["ADMS"];
$Edit14 = @$row["CNPJ2"];
$Edit15 = @$row["OBS"];
$Edit16 = @$row["NOMEEDIF"];
$Edit17 = @$row["NOMEADMS"];

$menssagens = "* * * Visualizar * * *";

$nome_do_edif = $Edit16;

$nome_da_adms = $Edit17;


// Salva Secao
session_start();
$_SESSION['navega'] = $id;
$_SESSION['lista_soc'] = $Edit1;

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$opo1       = @$row3["opo1"];
$opo2       = @$row3["opo2"];
$opo3       = @$row3["opo3"];

// Salva Secao
session_start();
$id1 = $_SESSION['navega'];

if (!empty($id1)){
	$id1 = $_SESSION['navega'];
}else{
	$id1 = $id;
}	
$_SESSION['tipo_acao'] = "alterar_1";
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
<body>
<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 
<?
include("help.php");
?>

<?
require("botoes.php");
require("layout.php");
?>
<tr><td><!-- AQUI SER� APRESENTADO O RESULTADO DA BUSCA DIN�MICA.. OU SEJA OS NOMES -->
<div id="pagina" class="invisivel"></div></td></tr>
</body>
</html>
<?
}else{
	
require("enaaurlnp.php");
	
}
?>