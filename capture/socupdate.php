<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Update Cadastro Socios
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

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

$log_ssoc = $nome3;
$hora = date("d/m/Y"); 
$sexo = " ";
$campo1 = 'Alterado';
$campo2 = 0;

?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

</body>
</html>

<?

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$nome3a = strtolower($nome3);

// Abre Tabela Tenporaria

$consulta0  = "SELECT * FROM $nome3a WHERE Nome1 = '$nome3a'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$Edit1      = trim(strtoupper(retirar_carac(@$row0["Edit1"])));
$Edit2		= trim(strtoupper(retirar_carac(@$row0["Edit2"])));
$Edit3		= trim(strtoupper(retirar_carac(@$row0["Edit3"])));
$Edit4		= trim(strtoupper(retirar_carac(@$row0["Edit4"])));
$Edit5		= trim(strtoupper(retirar_carac(@$row0["Edit5"])));
$Edit6		= trim(strtoupper(retirar_carac(@$row0["Edit6"])));
$Edit7		= trim(strtoupper(retirar_carac(@$row0["Edit7"])));
$Edit8		= trim(strtoupper(retirar_carac(@$row0["Edit8"])));
$Edit9		= trim(strtoupper(retirar_carac(@$row0["Edit9"])));
$Edit10	    = trim(strtoupper(retirar_carac(@$row0["Edit10"])));
$Edit11	    = trim(strtoupper(retirar_carac(@$row0["Edit11"])));
$Edit12	    = trim(strtoupper(retirar_carac(@$row0["Edit12"])));
$Edit13	    = trim(strtoupper(retirar_carac(@$row0["Edit13"])));
$Edit14	    = trim(strtoupper(retirar_carac(@$row0["Edit14"])));
$Edit15	    = trim(strtoupper(retirar_carac(@$row0["Edit15"])));
$Edit16	    = trim(strtoupper(retirar_carac(@$row0["Edit16"])));
$Edit17	    = trim(strtoupper(retirar_carac(@$row0["Edit17"])));
$Edit18	    = trim(strtoupper(retirar_carac(@$row0["Edit18"])));
$Edit19	    = trim(strtoupper(retirar_carac(@$row0["Edit19"])));
$Edit20	    = trim(strtoupper(retirar_carac(@$row0["Edit20"])));
$Edit21	    = trim(strtoupper(retirar_carac(@$row0["Edit21"])));
$Edit22	    = trim(strtoupper(retirar_carac(@$row0["Edit22"])));
$Edit23	    = trim(strtoupper(retirar_carac(@$row0["Edit23"])));
$Edit24	    = trim(strtoupper(retirar_carac(@$row0["Edit24"])));
$Edit25	    = trim(strtoupper(retirar_carac(@$row0["Edit25"])));
$Edit26	    = trim(strtoupper(retirar_carac(@$row0["Edit26"])));
$Edit27	    = trim(strtoupper(retirar_carac(@$row0["Edit27"])));
$Edit28	    = trim(strtoupper(retirar_carac(@$row0["Edit28"])));
$Edit29	    = trim(strtoupper(retirar_carac(@$row0["Edit29"])));
$Edit30	    = trim(strtoupper(retirar_carac(@$row0["Edit30"])));
$Edit31     = trim(strtoupper(retirar_carac(@$row0["Edit31"])));
$Edit32	    = trim(strtoupper(retirar_carac(@$row0["Edit32"])));
$Edit33	    = trim(strtoupper(retirar_carac(@$row0["Edit33"])));
$Edit34	    = trim(strtoupper(retirar_carac(@$row0["Edit34"])));
$Edit35	    = trim(strtoupper(retirar_carac(@$row0["Edit35"])));
$Edit36	    = trim(strtoupper(retirar_carac(@$row0["Edit36"])));
$Edit37	    = trim(strtoupper(retirar_carac(@$row0["Edit37"])));
$Edit38	    = trim(strtoupper(retirar_carac(@$row0["Edit38"])));
$Edit39	    = trim(strtoupper(retirar_carac(@$row0["Edit39"])));
$Edit40	    = trim(strtoupper(retirar_carac(@$row0["Edit40"])));
$Edit41	    = trim(strtoupper(retirar_carac(@$row0["Edit41"])));
$Edit42	    = trim(strtoupper(retirar_carac(@$row0["Edit42"])));
$Edit43	    = trim(strtoupper(retirar_carac(@$row0["Edit43"])));
$Edit44	    = trim(strtoupper(retirar_carac(@$row0["Edit44"])));
$Edit45	    = trim(strtoupper(retirar_carac(@$row0["Edit45"])));
$Edit46	    = trim(strtoupper(retirar_carac(@$row0["Edit46"])));
$Edit47	    = trim(strtoupper(retirar_carac(@$row0["Edit47"])));
$Edit48	    = trim(strtoupper(retirar_carac(@$row0["Edit48"])));
$Edit49	    = trim(strtoupper(retirar_carac(@$row0["Edit49"])));
$Edit50	    = trim(strtoupper(retirar_carac(@$row0["Edit50"])));
$Edit51	    = trim(strtoupper(retirar_carac(@$row0["Edit51"])));
$Edit52	    = trim(strtoupper(retirar_carac(@$row0["Edit52"])));
$Edit53	    = trim(strtoupper(retirar_carac(@$row0["Edit53"])));
$Edit54	    = trim(strtoupper(retirar_carac(@$row0["Edit54"])));
$Edit55	    = trim(strtoupper(retirar_carac(@$row0["Edit55"])));
$Edit56	    = trim(strtoupper(retirar_carac(@$row0["Edit56"])));
$Edit57	    = trim(strtoupper(retirar_carac(@$row0["Edit57"])));
$Edit58	    = trim(strtoupper(retirar_carac(@$row0["Edit58"])));
$Edit59	    = trim(strtoupper(retirar_carac(@$row0["Edit59"])));
$Edit60	    = trim(strtoupper(retirar_carac(@$row0["Edit60"])));
$Edit61	    = trim(strtoupper(retirar_carac(@$row0["Edit61"])));
$Edit62	    = trim(strtoupper(retirar_carac(@$row0["Edit62"])));
$Edit63	    = trim(strtoupper(retirar_carac(@$row0["Edit63"])));
$Edit64	    = trim(strtoupper(retirar_carac(@$row0["Edit64"])));
$Edit65	    = trim(strtoupper(retirar_carac(@$row0["Edit65"])));
$Edit66	    = trim(strtoupper(retirar_carac(@$row0["Edit66"])));
$Edit67	    = trim(strtoupper(retirar_carac(@$row0["Edit67"])));
$Edit68	    = trim(strtoupper(retirar_carac(@$row0["Edit68"])));
$Edit69	    = trim(strtoupper(retirar_carac(@$row0["Edit69"])));
$Edit70	    = trim(strtoupper(retirar_carac(@$row0["memo1"])));
$Edit71	    = trim(strtoupper(retirar_carac(@$row0["Edit71"])));
$Edit72	    = trim(strtoupper(retirar_carac(@$row0["Edit72"])));
$alerta_1   = trim(strtoupper(retirar_carac(@$row0["mensage1"])));
$categ_1    = trim(strtoupper(retirar_carac(@$row0["mensage2"])));
$nome_do_edif = trim(strtoupper(retirar_carac(@$row0["mensage3"])));
$nome_cad_si  = trim(strtoupper(retirar_carac(@$row0["mensage4"])));
$id           = trim(strtoupper(retirar_carac(@$row0["mensage6"])));

$new_fot    = trim($Edit1).trim($Edit2);

if ($Edit1  == '.'){	$Edit1  = '';}
if ($Edit2  == '.'){	$Edit2  = '';}
if ($Edit3  == '.'){	$Edit3  = '';}
if ($Edit4  == '.'){	$Edit4  = '';}
if ($Edit5  == '.'){	$Edit5  = '';}
if ($Edit6  == '.'){	$Edit6  = '';}
if ($Edit7  == '.'){	$Edit7  = '';}
if ($Edit8  == '.'){	$Edit8  = '';}
if ($Edit9  == '.'){	$Edit9  = '';}
if ($Edit10 == '.'){	$Edit10 = '';}
if ($Edit11 == '.'){	$Edit11 = '';}
if ($Edit12 == '.'){	$Edit12 = '';}
if ($Edit13 == '.'){	$Edit13 = '';}
if ($Edit14 == '.'){	$Edit14 = '';}
if ($Edit15 == '.'){	$Edit15 = '';}
if ($Edit16 == '.'){	$Edit16 = '';}
if ($Edit17 == '.'){	$Edit17 = '';}
if ($Edit18 == '.'){	$Edit18 = '';}
if ($Edit19 == '.'){	$Edit19 = '';}
if ($Edit20 == '.'){	$Edit20 = '';}
if ($Edit21 == '.'){	$Edit21 = '';}
if ($Edit22 == '.'){	$Edit22 = '';}
if ($Edit23 == '.'){	$Edit23 = '';}
if ($Edit24 == '.'){	$Edit24 = '';}
if ($Edit25 == '.'){	$Edit25 = '';}
if ($Edit26 == '.'){	$Edit26 = '';}
if ($Edit27 == '.'){	$Edit27 = '';}
if ($Edit28 == '.'){	$Edit28 = '';}
if ($Edit29 == '.'){	$Edit29 = '';}
if ($Edit30 == '.'){	$Edit30 = '';}
if ($Edit31 == '.'){	$Edit31 = '';}
if ($Edit32 == '.'){	$Edit32 = '';}
if ($Edit33 == '.'){	$Edit33 = '';}
if ($Edit34 == '.'){	$Edit34 = '';}
if ($Edit35 == '.'){	$Edit35 = '';}
if ($Edit36 == '.'){	$Edit36 = '';}
if ($Edit37 == '.'){	$Edit37 = '';}
if ($Edit38 == '.'){	$Edit38 = '';}
if ($Edit39 == '.'){	$Edit39 = '';}
if ($Edit40 == '.'){	$Edit40 = '';}
if ($Edit41 == '.'){	$Edit41 = '';}
if ($Edit42 == '.'){	$Edit42 = '';}
if ($Edit43 == '.'){	$Edit43 = '';}
if ($Edit44 == '.'){	$Edit44 = '';}
if ($Edit45 == '.'){	$Edit45 = '';}
if ($Edit46 == '.'){	$Edit46 = '';}
if ($Edit47 == '.'){	$Edit47 = '';}
if ($Edit48 == '.'){	$Edit48 = '';}
if ($Edit49 == '.'){	$Edit49 = '';}
if ($Edit50 == '.'){	$Edit50 = '';}
if ($Edit51 == '.'){	$Edit51 = '';}
if ($Edit52 == '.'){	$Edit52 = '';}
if ($Edit53 == '.'){	$Edit53 = '';}
if ($Edit54 == '.'){	$Edit54 = '';}
if ($Edit55 == '.'){	$Edit55 = '';}
if ($Edit56 == '.'){	$Edit56 = '';}
if ($Edit57 == '.'){	$Edit57 = '';}
if ($Edit58 == '.'){	$Edit58 = '';}
if ($Edit59 == '.'){	$Edit59 = '';}
if ($Edit60 == '.'){	$Edit60 = '';}
if ($Edit61 == '.'){	$Edit61 = '';}
if ($Edit62 == '.'){	$Edit62 = '';}
if ($Edit63 == '.'){	$Edit63 = '';}
if ($Edit64 == '.'){	$Edit64 = '';}
if ($Edit65 == '.'){	$Edit65 = '';}
if ($Edit66 == '.'){	$Edit66 = '';}
if ($Edit67 == '.'){	$Edit67 = '';}
if ($Edit68 == '.'){	$Edit68 = '';}
if ($Edit69 == '.'){	$Edit69 = '';}
if ($Edit70 == '.'){	$Edit70 = '';}
if ($Edit71 == '.'){	$Edit71 = '';}
if ($Edit72 == '.'){	$Edit72 = '';}

$menssagens = "* * * Alterado * * *";

if(strlen($Edit10)<=0){
  $Edit10 = 0;
}
if($Edit10 == "."){
  $Edit10 = 0; 	
}
if(strlen($Edit27)<=0){
  $Edit27   = 0; 	
}
if(strlen($Edit27)<=0){
  $Edit27   = 0; 	
}
if(strlen($Edit28)<=0){
  $Edit28   = 0; 	
}
if(strlen($Edit28)<=0){
  $Edit28   = 0; 	
}
if(strlen($Edit30)<=0){
  $Edit30 = 0.00; 	
}
if($Edit30 == "."){
  $Edit30 = 0.00; 	
}
if(strlen($Edit31)<=0){
  $Edit31 = 0; 	
}
if($Edit31 == "."){
  $Edit31 = 0; 	
}
if(strlen($Edit32)<=0){
  $Edit32  = 0.00; 	
}
if($Edit32 == "."){
  $Edit32  = 0.00; 	
}
if($Edit26 == "."){
  $Edit26  = 0; 	
}

$Cod_P   = $id;

$texto_cpf = $Edit4;
$eliminar1 = str_replace("-"," ",$texto_cpf);
$eliminar2 = str_replace("."," ",$eliminar1);
$valor_cp = str_replace(" ","",$eliminar2);

// retorna uma pesquisa

$consulta = "UPDATE socios SET RGASSOC = '$Edit3',
CPF         = '$valor_cp',
DATINSC 	= '$Edit5',
DAT2        = '$Edit6',
DAT3 		= '$Edit7',
SEDE 		= '$Edit8',
CATEGORIA 	= '$Edit9',
CODEDIF   	= '$Edit10',
NOMEASSOC 	= '$Edit11',
RUA			= '$Edit12',
ENDRESID	= '$Edit13',
NUMERO		= '$Edit14',
BAIRRORES	= '$Edit15',
CEPRES		= '$Edit16',
CIDADERES	= '$Edit17',
ESTADORES	= '$Edit18',
TELEFONE 	= '$Edit19',
CARTTRAB 	= '$Edit20',
SERIE 		= '$Edit21',
EMISCART 	= '$Edit22',
CARGOASSOC 	= '$Edit23',
DATADIMIS 	= '$Edit24',
ESTCIVIL 	= '$Edit25',
NUMDEP 		= '$Edit26',
MES 		= '$Edit27',
ANO 		= '$Edit28',
CAD_SI 		= '$Edit29',
SALDO 		= '$Edit30',
PREST 		= '$Edit31',
PAGO 		= '$Edit32',
DATNASC 	= '$Edit34',
NASCION 	= '$Edit35',
PAI 		= '$Edit36',
MAE 		= '$Edit37',
CONJUGE 	= '$Edit38',
DATCONJ 	= '$Edit39',
FILHO01 	= '$Edit40',
DAT01 		= '$Edit41',
SEXO01 		= '$Edit42',
FILHO02 	= '$Edit43',
DAT02 		= '$Edit44',
SEXO02 		= '$Edit45',
FILHO03 	= '$Edit46',
DAT03 		= '$Edit47',
SEXO03 		= '$Edit48',
FILHO04 	= '$Edit49',
DAT04 		= '$Edit50',
SEXO04 		= '$Edit51',
FILHO05 	= '$Edit52',
DAT05 		= '$Edit53',
SEXO05 		= '$Edit54',
FILHO06 	= '$Edit55',
DAT06 		= '$Edit56',
SEXO06 		= '$Edit57',
FILHO07 	= '$Edit58',
DAT07 		= '$Edit59',
SEXO07 		= '$Edit60',
FILHO08 	= '$Edit61',
DAT08 		= '$Edit62',
SEXO08 		= '$Edit63',
FILHO09 	= '$Edit64',
DAT09 		= '$Edit65',
SEXO09 		= '$Edit66',
FILHO10 	= '$Edit67',
DAT10 		= '$Edit68',
SEXO10 		= '$Edit69',
NATURAL1 	= '$Edit33',
LOG_SSOC    = '$log_ssoc',
HORA        = '$hora',
CAMPO1      = '$campo1',
CAMPO2      = '$campo2',
OBS 		= '$Edit70',
CAMPO_EDIF  = '$nome_do_edif',
CAMPO_CATEG = '$categ_1',
CAMPO_SIT   = '$nome_cad_si',
SEXO_SOC    = '$Edit71',
ESCOLARIDADE = '$Edit72' WHERE id = '". anti_sql_injection($Cod_P) ."'";

@mysql_query($consulta, $link) or


die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Alteração !!! ***</b>
     <table align=center>
     <form method='POST' action='cadsocios.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagens."/".$new_fot;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);


// Elimina Tabela temp
$add90 = "DROP TABLE `$nome3a`";
@mysql_query($add90, $link);

// Abrir tabela Senha

$tabela_1 = strtoupper('socios');

$consulta3 = "SELECT * FROM permissoes WHERE login = '". anti_sql_injection($nome3) ."' and tabela = '". anti_sql_injection($tabela_1) ."'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];


$consulta7 = "SELECT * FROM socios WHERE CODP = '". anti_sql_injection($new_fot) ."'";

$resultado7 = @mysql_query($consulta7);

$row7 = @mysql_fetch_array($resultado7);

$id			= @$row7["id"];


// Procura Foto

$consulta11 = "SELECT * FROM tb_segunda WHERE codp = '". anti_sql_injection($new_fot) ."'";
	
$resultado11 = @mysql_query($consulta11);

$row11 = @mysql_fetch_array($resultado11);

$id_9 	   = @$row11["cod_foto"];
$id_imagem = @$row11["id_imagem"];

if(!empty($id_imagem)){
$mostra_branco = "faz";	
}else{
$mostra_branco = "nao";	
	
}	

?>

<html>
<body text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0>

<script>

if (!document.layers)

document.write('<div id="fixacam" style="position:absolute; background:#ffffff; bordercolordark:#4682B4; width:100px; height:25px; font:10pt Tahoma; color:#666666" align="Right">'  )

</script>

<layer id="fixacam"> 

	<a rel="home" class="home" href="cadsocios.php?Cod_xxx=<?=$Cod_P;?>">
	<img alt="Voltar" src="../imagens/botao_voltar.PNG" border="0"></a>
	
 
</layer>


<script type="text/javascript">
var posvertical="rodape"
if (!document.layers)
document.write('</div>')
function menufloat(){
var startX = 3,
startY = 80;
var ns = (navigator.appName.indexOf("Netscape") != -1);
var d = document;
function ml(id){
var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
if(d.layers)el.style=el;
el.sP=function(x,y){this.style.left=x;this.style.top=y;};
el.x = startX;
if (posvertical=="rodape")
el.y = startY;
else{
el.y = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
el.y -= startY;
}
return el;
}
window.stayTopLeft=function(){
if (posvertical=="topo"){
var pY = ns ? pageYOffset : document.body.scrollTop;
ftlObj.y += (pY + startY - ftlObj.y)/8;
}
else{
var pY = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
ftlObj.y += (pY - startY - ftlObj.y)/8;
}
ftlObj.sP(ftlObj.x, ftlObj.y);
setTimeout("stayTopLeft()", 10);
}
ftlObj = ml("fixacam");
stayTopLeft();
}
menufloat();
</script>

<?

$soma1 = date('Y') - substr($Edit41,6,4);
if ($soma1 >= 18){ $cod_linha1  = 'color:#FF6347'; }else{ $cod_linha1  = 'color:#828282';}

$soma2 = date('Y') - substr($Edit44,6,4);
if ($soma2 >= 18){ $cod_linha2  = 'color:#FF6347'; }else{ $cod_linha2  = 'color:#828282';}

$soma3 = date('Y') - substr($Edit47,6,4);
if ($soma3 >= 18){ $cod_linha3  = 'color:#FF6347'; }else{ $cod_linha3  = 'color:#828282';}

$soma4 = date('Y') - substr($Edit50,6,4);
if ($soma4 >= 18){ $cod_linha4  = 'color:#FF6347'; }else{ $cod_linha4  = 'color:#828282';}
	
$soma5 = date('Y') - substr($Edit53,6,4);
if ($soma5 >= 18){ $cod_linha5  = 'color:#FF6347'; }else{ $cod_linha5  = 'color:#828282';}
	
$soma6 = date('Y') - substr($Edit56,6,4);
if ($soma6 >= 18){ $cod_linha6  = 'color:#FF6347'; }else{ $cod_linha6  = 'color:#828282';}
	
$soma7 = date('Y') - substr($Edit59,6,4);
if ($soma7 >= 18){ $cod_linha7  = 'color:#FF6347'; }else{ $cod_linha7  = 'color:#828282';}
	
$soma8 = date('Y') - substr($Edit62,6,4);
if ($soma8 >= 18){ $cod_linha8  = 'color:#FF6347'; }else{ $cod_linha8  = 'color:#828282';}
	
$soma9 = date('Y') - substr($Edit65,6,4);
if ($soma9 >= 18){ $cod_linha9  = 'color:#FF6347'; }else{ $cod_linha9  = 'color:#828282';}
	
$soma10 = date('Y') - substr($Edit68,6,4);
if ($soma10 >= 18){ $cod_linha10  = 'color:#FF6347'; }else{ $cod_linha10  = 'color:#828282';}

include("soclayout.php");
?>

</body>
</html>
<?

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac($var){

$var = ereg_replace("[ÁÀÂÃ]",        "A",$var);
$var = ereg_replace("[áàâãª]",       "a",$var);
$var = ereg_replace("[ÉÈÊ]",         "E",$var);
$var = ereg_replace("[éèê]",         "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",        "O",$var);
$var = ereg_replace("[óòôõº]",       "o",$var);
$var = ereg_replace("[ÚÙÛ]",         "U",$var);
$var = ereg_replace("[úùû]",         "u",$var);
$var = ereg_replace("[?*#'´`!$%¨]",  " ",$var);
$var = str_replace("Ç",              "C",$var);
$var = str_replace("ç",              "c",$var);
$var = str_replace("\\",             " ",$var);
$var = str_replace(" or ",           " ",$var);
$var = str_replace("select ",        " ",$var);
$var = str_replace("delete ",        " ",$var);
$var = str_replace("create ",        " ",$var);
$var = str_replace("drop ",          " ",$var);
$var = str_replace("update ",        " ",$var);
$var = str_replace("drop table",     " ",$var);
$var = str_replace("show table",     " ",$var);
$var = str_replace("applet",         " ",$var);
$var = str_replace("objetc",         " ",$var);
$var = str_replace("where",          " ",$var);

return($var);
}

?>
