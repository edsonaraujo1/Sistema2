<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Update Cadastro Socios
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

require("menu.php");

$log_ssoc = $nome3;
$hora = date("d/m/Y"); 
$sexo = " ";
$campo1 = 'Alterado';
$campo2 = 0;

?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>

<?

session_start();
$proc_up = strtoupper($_SESSION['Procura_up']);

// Resgata Sessao
session_name("Val_Socio");
session_start();

$Edit1 		= strtoupper($_SESSION['cod']);
$Edit2 		= strtoupper($_SESSION['nu']);
$Edit3 		= strtoupper($_SESSION['rgassoc']);
$Edit4 		= strtoupper($_SESSION['cpf']);
$Edit5 		= strtoupper($_SESSION['datinsc']);
$Edit6 		= strtoupper($_SESSION['dat2']);
$Edit7 		= strtoupper($_SESSION['dat3']);
$Edit8 		= strtoupper($_SESSION['sede']);
$Edit9 		= strtoupper($_SESSION['categoria']);

if (!empty($proc_up)){
	$Edit10 = $proc_up;
}else{
	$Edit10 = strtoupper($_SESSION['codedif']);
}

$Edit11		= strtoupper($_SESSION['nomeassoc']);
$Edit12		= strtoupper($_SESSION['rua']);
$Edit13		= strtoupper($_SESSION['endresid']);
$Edit14		= strtoupper($_SESSION['numero']);
$Edit15		= strtoupper($_SESSION['bairrores']);
$Edit16		= strtoupper($_SESSION['cepres']);
$Edit17		= strtoupper($_SESSION['cidaderes']);
$Edit18		= strtoupper($_SESSION['estadores']);
$Edit19		= strtoupper($_SESSION['telefone']);
$Edit20		= strtoupper($_SESSION['carttrab']);
$Edit21		= strtoupper($_SESSION['serie']);
$Edit22		= strtoupper($_SESSION['emiscart']);
$Edit23		= strtoupper($_SESSION['cargoassoc']);
$Edit24		= strtoupper($_SESSION['datadimis']);
$Edit25		= strtoupper($_SESSION['estcivil']);
$Edit26		= strtoupper($_SESSION['numdep']);
$Edit27		= strtoupper($_SESSION['mes']);
$Edit28		= strtoupper($_SESSION['ano']);
$Edit29		= strtoupper($_SESSION['cad_si']);
$Edit30		= strtoupper($_SESSION['saldo']);
$Edit31		= strtoupper($_SESSION['prest']);
$Edit32		= strtoupper($_SESSION['pago']);
$Edit33		= strtoupper($_SESSION['natural']);
$Edit34		= strtoupper($_SESSION['datnasc']);
$Edit35		= strtoupper($_SESSION['nascion']);
$Edit36		= strtoupper($_SESSION['pai']);
$Edit37		= strtoupper($_SESSION['mae']);
$Edit38		= strtoupper($_SESSION['conjuge']);
$Edit39		= strtoupper($_SESSION['datconj']);
$Edit40		= strtoupper($_SESSION['filho01']);
$Edit41		= strtoupper($_SESSION['dat01']);
$Edit42		= strtoupper($_SESSION['sexo01']);
$Edit43		= strtoupper($_SESSION['filho02']);
$Edit44		= strtoupper($_SESSION['dat02']);
$Edit45		= strtoupper($_SESSION['sexo02']);
$Edit46		= strtoupper($_SESSION['filho03']);
$Edit47		= strtoupper($_SESSION['dat03']);
$Edit48		= strtoupper($_SESSION['sexo03']);
$Edit49		= strtoupper($_SESSION['filho04']);
$Edit50		= strtoupper($_SESSION['dat04']);
$Edit51		= strtoupper($_SESSION['sexo04']);
$Edit52		= strtoupper($_SESSION['filho05']);
$Edit53		= strtoupper($_SESSION['dat05']);
$Edit54		= strtoupper($_SESSION['sexo05']);
$Edit55		= strtoupper($_SESSION['filho06']);
$Edit56		= strtoupper($_SESSION['dat06']);
$Edit57		= strtoupper($_SESSION['sexo06']);
$Edit58		= strtoupper($_SESSION['filho07']);
$Edit59		= strtoupper($_SESSION['dat07']);
$Edit60		= strtoupper($_SESSION['sexo07']);
$Edit61		= strtoupper($_SESSION['filho08']);
$Edit62		= strtoupper($_SESSION['dat08']);
$Edit63		= strtoupper($_SESSION['sexo08']);
$Edit64		= strtoupper($_SESSION['filho09']);
$Edit65		= strtoupper($_SESSION['dat09']);
$Edit66		= strtoupper($_SESSION['sexo09']);
$Edit67		= strtoupper($_SESSION['filho10']);
$Edit68		= strtoupper($_SESSION['dat10']);
$Edit69		= strtoupper($_SESSION['sexo10']);
$Edit70		= strtoupper($_SESSION['obs']);


$cod        = strtoupper($Edit1);
$nu         = strtoupper($Edit2);
$rgassoc    = strtoupper($Edit3);
$cpf        = strtoupper($Edit4);
$datinsc    = strtoupper($Edit5);      
$dat2       = strtoupper($Edit6);      
$dat3       = strtoupper($Edit7);      
$sede       = strtoupper($Edit8);       
$categoria  = strtoupper($Edit9);  
$codedif    = strtoupper($Edit10);    
$nomeassoc  = strtoupper($Edit11);
$rua        = strtoupper($Edit12);        
$endresid   = strtoupper($Edit13);
$numero     = strtoupper($Edit14);     
$bairrores  = strtoupper($Edit15);     
$cepres     = strtoupper($Edit16);        
$cidaderes  = strtoupper($Edit17);     
$estadores  = strtoupper($Edit18);         
$telefone   = strtoupper($Edit19);       
$carttrab   = strtoupper($Edit20);       
$serie      = strtoupper($Edit21);      
$emiscart   = strtoupper($Edit22);    
$cargoassoc = strtoupper($Edit23);     
$datadimis  = strtoupper($Edit24);   
$estcivil   = strtoupper($Edit25);      
$numdep     = strtoupper($Edit26); 
$mes        = strtoupper($Edit27);        
$ano        = strtoupper($Edit28);        
$cad_si     = strtoupper($Edit29);   
$saldo      = strtoupper($Edit30);      
$prest      = strtoupper($Edit31);  
$pago       = strtoupper($Edit32);       
$natural    = strtoupper($Edit33);    
$datnasc    = strtoupper($Edit34); 
$nascion    = strtoupper($Edit35);  
$pai        = strtoupper($Edit36);        
$mae        = strtoupper($Edit37);        
$conjuge    = strtoupper($Edit38);   
$datconj    = strtoupper($Edit39);    
$filho01    = strtoupper($Edit40);     
$dat01      = strtoupper($Edit41);     
$sexo01     = strtoupper($Edit42);     
$filho02    = strtoupper($Edit43);     
$dat02      = strtoupper($Edit44);     
$sexo02     = strtoupper($Edit45);     
$filho03    = strtoupper($Edit46);     
$dat03      = strtoupper($Edit47);     
$sexo03     = strtoupper($Edit48);     
$filho04    = strtoupper($Edit49);     
$dat04      = strtoupper($Edit50);     
$sexo04     = strtoupper($Edit51);     
$filho05    = strtoupper($Edit52);     
$dat05      = strtoupper($Edit53);     
$sexo05     = strtoupper($Edit54);     
$filho06    = strtoupper($Edit55);     
$dat06      = strtoupper($Edit56);     
$sexo06     = strtoupper($Edit57);     
$filho07    = strtoupper($Edit58);     
$dat07      = strtoupper($Edit59);     
$sexo07     = strtoupper($Edit60);     
$filho08    = strtoupper($Edit61);     
$dat08      = strtoupper($Edit62);     
$sexo08     = strtoupper($Edit63);     
$filho09    = strtoupper($Edit64);     
$dat09      = strtoupper($Edit65);     
$sexo09     = strtoupper($Edit66);     
$filho10    = strtoupper($Edit67);    
$dat10      = strtoupper($Edit68);     
$sexo10     = strtoupper($Edit69);     
$obs        = strtoupper($Edit70);        

$menssagens = "* * * Alterado * * *";

if(strlen($codedif)<=0){
  $codedif = 0;
}

if(strlen($mes)<=0){
  $mes   = 0; 	
}
if(strlen($ano)<=0){
  $ano   = 0; 	
}
if(strlen($saldo)<=0){
  $saldo = 0.00; 	
}
if(strlen($prest)<=0){
  $prest = 0; 	
}
if(strlen($pago)<=0){
  $pago  = 0.00; 	
}


Switch ($Edit2){

	Case 'A':
             $sede = "SETE DE ABRIL";
        break;

	Case 'B':
             $sede = "SANTO AMARO";
        break;

	Case 'C':
             $sede = "SANTANA";
        break;

	Case 'D':
             $sede = "TATUAPE";
        break;

	Case 'E':
             $sede = "SETE DE ABRIL";
        break;
        
}

// Abre Conexão com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

$link = mysql_connect($host,$user,$pass)
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

mysql_select_db($db)
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

// retorna uma pesquisa

$consulta = "UPDATE socios SET RGASSOC = '$rgassoc',
CPF         = '$cpf',
DATINSC 	= '$datinsc',
DAT2        = '$dat2',
DAT3 		= '$dat3',
SEDE 		= '$sede',
CATEGORIA 	= '$categoria',
CODEDIF   	= '$codedif',
NOMEASSOC 	= '$nomeassoc',
RUA			= '$rua',
ENDRESID	= '$endresid',
NUMERO		= '$numero',
BAIRRORES	= '$bairrores',
CEPRES		= '$cepres',
CIDADERES	= '$cidaderes',
ESTADORES	= '$estadores',
TELEFONE 	= '$telefone',
CARTTRAB 	= '$carttrab',
SERIE 		= '$serie',
EMISCART 	= '$emiscart',
CARGOASSOC 	= '$cargoassoc',
DATADIMIS 	= '$datadimis',
ESTCIVIL 	= '$estcivil',
NUMDEP 		= '$numdep',
MES 		= '$mes',
ANO 		= '$ano',
CAD_SI 		= '$cad_si',
SALDO 		= '$saldo',
PREST 		= '$prest',
PAGO 		= '$pago',
DATNASC 	= '$datnasc',
NASCION 	= '$nascion',
PAI 		= '$pai',
MAE 		= '$mae',
CONJUGE 	= '$conjuge',
DATCONJ 	= '$datconj',
FILHO01 	= '$filho01',
DAT01 		= '$dat01',
SEXO01 		= '$sexo01',
FILHO02 	= '$filho02',
DAT02 		= '$dat02',
SEXO02 		= '$sexo02',
FILHO03 	= '$filho03',
DAT03 		= '$dat03',
SEXO03 		= '$sexo03',
FILHO04 	= '$filho04',
DAT04 		= '$dat04',
SEXO04 		= '$sexo04',
FILHO05 	= '$filho05',
DAT05 		= '$dat05',
SEXO05 		= '$sexo05',
FILHO06 	= '$filho06',
DAT06 		= '$dat06',
SEXO06 		= '$sexo06',
FILHO07 	= '$filho07',
DAT07 		= '$dat07',
SEXO07 		= '$sexo07',
FILHO08 	= '$filho08',
DAT08 		= '$dat08',
SEXO08 		= '$sexo08',
FILHO09 	= '$filho09',
DAT09 		= '$dat09',
SEXO09 		= '$sexo09',
FILHO10 	= '$filho10',
DAT10 		= '$dat10',
SEXO10 		= '$sexo10',
NATURAL1 	= '$natural',
LOG_SSOC    = '$log_ssoc',
HORA        = '$hora',
CAMPO1      = '$campo1',
CAMPO2      = '$campo2',
OBS 		= '$obs' WHERE CODP = '$Cod_P'";


@mysql_query($consulta, $link) or


die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Alteração !!! ***</b>
     <table align=center>
     <form method='POST' action='cadsocios.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagens."/".$Cod_P;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);


// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = mysql_fetch_array($resultado3);

$soc1       = @$row3["soc1"];
$soc2       = @$row3["soc2"];
$soc3       = @$row3["soc3"];


$consulta7 = "SELECT * FROM socios WHERE CODP = '$Cod_P'";

$resultado7 = @mysql_query($consulta7);

$row7 = @mysql_fetch_array($resultado7);

$id			= @$row7["id"];


$consulta8 = "SELECT * FROM tb_segunda WHERE cod_foto = '$id'";
	
$resultado8 = @mysql_query($consulta8);

$row8 = @mysql_fetch_array($resultado8);

$id_9 	   = @$row8["cod_foto"];
$id_imagem = @$row8["id_imagem"];

if(!empty($id_imagem)){
$mostra_branco = "faz";	
}else{
$mostra_branco = "nao";	
	
}	

// Abrir Table de Edificios

$consulta9  = "SELECT * FROM edificios Where COD = '$codedif'";

$resultado9 = @mysql_query($consulta9);

$row9 = @mysql_fetch_array($resultado9);

$cod_edif   = @$row9["COD"];
$cond  = trim(@$row9["COND"].@$row9["NOME"]);
$edif  = trim(@$row9["NOME"]);

$nome_do_edif = $cond;

// Abre Tabela Categoria

$consulta10  = "SELECT * FROM categ Where CODIGO = '$categoria'";

$resultado10 = @mysql_query($consulta10);

$row10 = @mysql_fetch_array($resultado10);

$categ_1   = @$row10["DESCRICAO"];

?>

<html>


<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style>

</HEAD>
<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0>

<?
require("soclayout.php");
?>

</body>
</html>
