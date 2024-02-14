<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Insert Cadastro Socios
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

//session_cache_expire(180); //5 minutos por exemplo...

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

unset ($_SESSION['navega1']);

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
$campo1 = 'Incluido';
$campo2 = 0;

$cami2 = '../imagens/fotos/Branco.bmp'; 

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

$menssagens = "* * * Incluido * * *";

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

$Cod_p = Trim($Edit1).Trim($Edit2);

/*
if (empty($Edit11)){
	echo ("<br><br><br><br><br><div align=center><table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		   <tr><td><font face=arial><b>*** Existe Campos em Branco Verifique !!! ***</b>
		   <table align=center><form method='POST' action='javascript:history.back(2)'>
		   <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		   </form></table></td></tr></table></div>");
           exit;}

if (empty($Edit12)){
	echo ("<br><br><br><br><br><div align=center><table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		   <tr><td><font face=arial><b>*** Existe Campos em Branco Verifique !!! ***</b>
		   <table align=center><form method='POST' action='javascript:history.back(2)'>
		   <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		   </form></table></td></tr></table></div>");
           exit;}

if (empty($Edit13)){
	echo ("<br><br><br><br><br><div align=center><table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		   <tr><td><font face=arial><b>*** Existe Campos em Branco Verifique !!! ***</b>
		   <table align=center><form method='POST' action='javascript:history.back(2)'>
		   <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		   </form></table></td></tr></table></div>");
           exit;}

if (empty($Edit14)){
	echo ("<br><br><br><br><br><div align=center><table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		   <tr><td><font face=arial><b>*** Existe Campos em Branco Verifique !!! ***</b>
		   <table align=center><form method='POST' action='javascript:history.back(2)'>
		   <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		   </form></table></td></tr></table></div>");
           exit;}

if (empty($Edit15)){
	echo ("<br><br><br><br><br><div align=center><table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		   <tr><td><font face=arial><b>*** Existe Campos em Branco Verifique !!! ***</b>
		   <table align=center><form method='POST' action='javascript:history.back(2)'>
		   <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		   </form></table></td></tr></table></div>");
           exit;}

if (empty($Edit16)){
	echo ("<br><br><br><br><br><div align=center><table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		   <tr><td><font face=arial><b>*** Existe Campos em Branco Verifique !!! ***</b>
		   <table align=center><form method='POST' action='javascript:history.back(2)'>
		   <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		   </form></table></td></tr></table></div>");
           exit;}

if (empty($Edit17)){
	echo ("<br><br><br><br><br><div align=center><table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		   <tr><td><font face=arial><b>*** Existe Campos em Branco Verifique !!! ***</b>
		   <table align=center><form method='POST' action='javascript:history.back(2)'>
		   <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		   </form></table></td></tr></table></div>");
           exit;}

if (empty($Edit18)){
	echo ("<br><br><br><br><br><div align=center><table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		   <tr><td><font face=arial><b>*** Existe Campos em Branco Verifique !!! ***</b>
		   <table align=center><form method='POST' action='javascript:history.back(2)'>
		   <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		   </form></table></td></tr></table></div>");
           exit;}

if (empty($Edit8)){
	echo ("<br><br><br><div align=center><table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		   <tr><td><font face=arial><b>*** Existe Campos em Branco Verifique !!! ***</b>
		   <table align=center><form method='POST' action='javascript:history.back(2)'>
		   <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		   </form></table></td></tr></table></div>");
           exit;}

if (empty($Edit9)){
	echo ("<br><br><br><br><br><div align=center><table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		   <tr><td><font face=arial><b>*** Existe Campos em Branco Verifique !!! ***</b>
		   <table align=center><form method='POST' action='javascript:history.back(2)'>
		   <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		   </form></table></td></tr></table></div>");
           exit;}
*/

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


if(strlen($Edit10)<=0){
  $Edit10 = 0;
}
if($Edit10 == "."){
  $Edit10 = 0;
}
if(strlen($Edit26)<=0){
  $Edit26 = 0;	
}
if($Edit26 == "."){
  $Edit26 = 0;	
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


$consulta0A  = "SELECT * FROM socios WHERE COD = '". anti_sql_injection($Edit1) ."'";

$resultado0A = @mysql_query($consulta0A);

// Incrementa novo codigo

$row0A = @mysql_fetch_array($resultado0A);

$id       = @$row0A["id"];
$cod_2    = @$row0A["COD"];

// Incrementa novo codigo

if (!empty($id)){
   $cod   = $cod_2+1;
   $Edit1 = $cod;
   $Cod_p = $cod.$Edit2;
}


$consulta00  = "SELECT * FROM socios WHERE CODP = '". anti_sql_injection($Cod_p) ."'";

$resultado00 = @mysql_query($consulta00);

$row00 = @mysql_fetch_array($resultado00);

$id       = @$row00["id"];
$cod_2    = @$row00["COD"];

if (!empty($id)){
   $cod   = $cod_2+1;
   $Cod_p = $cod.$Edit2;
}


$texto_cpf = $Edit4;
$eliminar1 = str_replace("-"," ",$texto_cpf);
$eliminar2 = str_replace("."," ",$eliminar1);
$valor_cp = str_replace(" ","",$eliminar2);

// verifica se CPF ja esta cadastrado

$consulta01  = "SELECT * FROM socios WHERE CPF = '". anti_sql_injection($Edit4) ."'";
$resultado01 = @mysql_query($consulta01);
$row01 = @mysql_fetch_array($resultado01);
		
$id        = @$row01["id"];
$cod_2     = @$row01["COD"];
$cpf_ins   = @$row01["CPF"];

if (!empty($cpf_ins)){
	
	echo ("
			
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Verifique CPF ja consta no Cadastro !!! ***</b>
		     <table align=center>
		     <form method='POST' action='cadsocios.php?Cod_xxx=$id'>
		     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
             exit;
	
	// nao incluir
}else{


	$texto_rg = $Edit3;
	
	$eli_rg1 = str_replace("-"," ",$texto_rg);
	$eli_rg2 = str_replace("."," ",$eli_rg1);
	$valor_rg = str_replace(" ","",$eli_rg2);

    // Verifica se o RG ja ta cadastrado
	$consulta02  = "SELECT * FROM socios WHERE RGASSOC = '". anti_sql_injection($Edit3) ."'";
	$resultado02 = @mysql_query($consulta02);
	$row02 = @mysql_fetch_array($resultado02);
			
	$id        = @$row02["id"];
	$cod_2     = @$row02["COD"];
	$rg_ins    = @$row02["RGASSOC"];

	
	if (!empty($rg_ins)){
		
		echo ("
				
			     <br>
			     <br>
			     
				 <div align=center>
			
			     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
			     <tr>
			     <td>
			     <font face=arial><b>*** Verifique RG ja consta no Cadastro !!! ***</b>
			     <table align=center>
			     <form method='POST' action='cadsocios.php?Cod_xxx=$id'>
			     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
			     </form> 
			     </table>
			     </td>
			     </tr>
			     </table>
			     </div>");
	             exit;
		
		
		// nao incluir
	}else{


/// ********************
/*

echo $Edit1."<br>";
echo $Edit2."<br>";
echo $Edit3."<br>";
echo $valor_cp."<br>";
echo $Edit5."<br>";
echo $Edit6."<br>";
echo $Edit7."<br>";
echo $Edit8."<br>";
echo $Edit9."<br>";
echo $Edit10."<br>";
echo $Edit11."<br>";
echo $Edit12."<br>";
echo $Edit13."<br>";
echo $Edit14."<br>";
echo $Edit15."<br>";
echo $Edit16."<br>";
echo $Edit17."<br>";
echo $Edit18."<br>";
echo $Edit19."<br>";
echo $Edit20."<br>";
echo $Edit21."<br>";
echo $Edit22."<br>";
echo $Edit23."<br>";
echo $Edit24."<br>";
echo $Edit25."<br>";
echo $Edit26."<br>";
echo $Edit27."<br>";
echo $Edit28."<br>";
echo $Edit30."<br>";
echo $Edit31."<br>";
echo "Edit32  ".$Edit32."<br>";
echo "Edit33  ".$Edit33."<br>";
echo "Edit34  ".$Edit34."<br>";
echo "Edit35  ".$Edit35."<br>";
echo $Edit36."<br>";
echo $Edit37."<br>";
echo $Edit38."<br>";
echo $Edit39."<br>";
echo $Edit40."<br>";
echo $Edit41."<br>";
echo $Edit42."<br>";
echo $Edit43."<br>";
echo $Edit44."<br>";
echo $Edit45."<br>";
echo $Edit46."<br>";
echo $Edit47."<br>";
echo $Edit48."<br>";
echo $Edit49."<br>";
echo $Edit50."<br>";
echo $Edit51."<br>";
echo $Edit52."<br>";
echo $Edit53."<br>";
echo $Edit54."<br>";
echo $Edit55."<br>";
echo $Edit56."<br>";
echo $Edit57."<br>";
echo $Edit58."<br>";
echo $Edit59."<br>";
echo $Edit60."<br>";
echo $Edit61."<br>";
echo $Edit62."<br>";
echo $Edit63."<br>";
echo $Edit64."<br>";
echo $Edit65."<br>";
echo $Edit66."<br>";
echo $Edit67."<br>";
echo $Edit68."<br>";
echo $Edit69."<br>";
echo $Edit70."<br>";
echo $alerta_1."<br>";
echo $categ_1."<br>";
echo $nome_do_edif."<br>";
echo $nome_cad_si."<br>";
echo "../<br>";
echo $nome3."<br>";
echo session_cache_expire()."<br>";
echo $erro;

echo 
 
*/// ********************	

	
		$consulta03 = "INSERT INTO socios ( COD,
											NU,
											CODP,
											RGASSOC,
											CPF,
											DATINSC,
											DAT2,
											DAT3,
											SEDE,
											CATEGORIA,
											CODEDIF,
											NOMEASSOC,
											RUA,
											ENDRESID,
											NUMERO,
											BAIRRORES,
											CEPRES,
											CIDADERES,
											ESTADORES,
											TELEFONE,
											CARTTRAB,
											SERIE,
											EMISCART,
											CARGOASSOC,
											DATADIMIS,
											ESTCIVIL,
											NUMDEP,
											MES,
											ANO,
											CAD_SI,
											SALDO,
											PREST,
											PAGO,
											NATURAL1,
											DATNASC,
											NASCION,
											PAI,
											MAE,
											CONJUGE,
											DATCONJ,
											FILHO01,
											DAT01,
											SEXO01,
											FILHO02,
											DAT02,
											SEXO02,
											FILHO03,
											DAT03,
											SEXO03,
											FILHO04,
											DAT04,
											SEXO04,
											FILHO05,
											DAT05,
											SEXO05,
											FILHO06,
											DAT06,
											SEXO06,
											FILHO07,
											DAT07,
											SEXO07,
											FILHO08,
											DAT08,
											SEXO08,
											FILHO09,
											DAT09,
											SEXO09,
											FILHO10,
											DAT10,
											SEXO10,
											OBS,
											CAMPO_EDIF,
											CAMPO_CATEG,
											CAMPO_SIT,
											SEXO_SOC,
											ESCOLARIDADE,
											USUARIO)
		 
		 
		VALUES ('$Edit1',
				'$Edit2',
				'$Cod_p',
				'$valor_rg',
				'$valor_cp',
				'$Edit5',
				'$Edit6',      
				'$Edit7',      
				'$Edit8',
				'$Edit9',
				'$Edit10',    
				'$Edit11',
				'$Edit12',        
				'$Edit13',
				'$Edit14',
				'$Edit15',     
				'$Edit16',        
				'$Edit17',     
				'$Edit18',         
				'$Edit19',
				'$Edit20',       
				'$Edit21',      
				'$Edit22',    
				'$Edit23',     
				'$Edit24',   
				'$Edit25',      
				'$Edit26', 
				'$Edit27',        
				'$Edit28',
				'$Edit29',
				'$Edit30',
				'$Edit31',
				'$Edit32',
				'$Edit33',
				'$Edit34',
				'$Edit35',  
				'$Edit36',        
				'$Edit37',
				'$Edit38',   
				'$Edit39',    
				'$Edit40',     
				'$Edit41',     
				'$Edit42',
				'$Edit43',     
				'$Edit44',     
				'$Edit45',
				'$Edit46',     
				'$Edit47',     
				'$Edit48',
				'$Edit49',     
				'$Edit50',     
				'$Edit51',
				'$Edit52',     
				'$Edit53',     
				'$Edit54',
				'$Edit55',     
				'$Edit56',     
				'$Edit57',
				'$Edit58',     
				'$Edit59',     
				'$Edit60',
				'$Edit61',     
				'$Edit62',     
				'$Edit63',
				'$Edit64',     
				'$Edit65',     
				'$Edit66',
				'$Edit67',    
				'$Edit68',     
				'$Edit69',
				'$Edit70',
				'$nome_do_edif',
				'$categ_1',
				'$nome_cad_si',
				'$Edit71',
				'$Edit72',
				'$nome3')";
		
		@mysql_query($consulta03, $link) or
		
		die("
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Falha na Inclusão !!! ***</b>

		     <table align=center>
		     <form method='POST' action='cadsocios.php'>
		     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
     }
}     
     
			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagens."/".$Cod_p;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);
     


$consulta4_s  = "SELECT * FROM edificios Where COD = '". anti_sql_injection($Edit10) ."'";

$resultado4_s = @mysql_query($consulta4_s);

$row4_s = @mysql_fetch_array($resultado4_s);

$cod_edif     = @$row4_s["COD"];
$nome_do_edif = @$row4_s["COD"]." - ".trim(retirar_carac(@$row4_s["COND"]))." ".trim(retirar_carac(@$row4_s["NOME"]));
$Edit12s      = trim(retirar_carac(@$row4_s["RUA"]));
$Edit13s      = trim(retirar_carac(@$row4_s["ENDERECO"]));
$Edit14s      = trim(retirar_carac(@$row4_s["NUMERO"]));
$Edit15s      = trim(retirar_carac(@$row4_s["BAIRRO"]));
$Edit16s      = trim(retirar_carac(@$row4_s["CEP"]));
$Edit18s      = trim(retirar_carac(@$row4_s["UF"]));


// Verifica Bairro para Cadastro na lista

$var_bai_grup = trim($Edit15s);


$consulta0b  = "SELECT * FROM `grup_lis_bai` WHERE `bairros` LIKE '%". anti_sql_injection($var_bai_grup) ."%'";

$resultado0b = @mysql_query($consulta0b);
$row0b = @mysql_fetch_array($resultado0b);

$nom_grup     = @$row0b["nome"];
$bai_grup     = @$row0b["bairros"];

$nome3_list = strtolower(trim("lista_".$nom_grup));

//echo $var_bai_grup."<br>";
//echo $nom_grup."<br>";
//echo $nome3_list."<br>";
//break;

// Verifica se arquivos exixte se nao cria

$creat_x  = "CREATE TABLE IF NOT EXISTS `$nome3_list` ( `id`         int(11) NOT NULL auto_increment,
													  `codigo`       varchar(10),
													  `codigo2`      int(11),
													  `data`         varchar(10),
													  `proprietario` varchar(30),
													  `nome`         varchar(100),
													  `rua`          varchar(100),
													  `endereco`     varchar(100),
													  `numero`       varchar(100),
													  `cep`          varchar(30),
													  `bairro`       varchar(100),
													  `uf`           varchar(2),
													  `funcao`       varchar(100),
													  `condominio`   varchar(100),
													  `obs`          text,
													  `log`          varchar(100),
													  PRIMARY KEY  (`id`)) TYPE = innodb";

@mysql_query($creat_x, $link);

if (!empty($nom_grup)){
	
	    // Cadastra Lista	
		$consulta_g = "INSERT INTO $nome3_list (   codigo,
												   codigo2,
												   data,
												   proprietario,
												   nome,
												   rua,
												   endereco,
												   numero,
												   bairro,
												   cep,
												   uf,
												   funcao,
												   condominio,
												   obs)											  
												  
			                VALUES
			                                  ('$Cod_p',
											   '$Edit1',
											   '$hora',
											   '$nome3',
											   '$Edit11',
											   '$Edit12s',
											   '$Edit13s',
											   '$Edit14s',
											   '$Edit15s',
											   '$Edit16s',
											   '$Edit18s',
											   '$Edit23',
											   '$nome_do_edif',
											   'automatico')";
			
		@mysql_query($consulta_g, $link);
	
	// Fim do Cadastro Lista	
}

// Elimina Tabela temp
$add0 = "DROP TABLE `$nome3a`";
@mysql_query($add0, $link);


// Salva Secao
@session_start();
$_SESSION['navega1'] = $Cod_p;
//$_SESSION['navega']  = $Cod_p;
     
?>

<html>

<body  style=" margin-left: 0px;  margin-top: 21px;  margin-right: 0px;  margin-bottom: 0px; ">

<script>

if (!document.layers)

document.write('<div id="fixacam" style="position:absolute; background:#ffffff; bordercolordark:#4682B4; width:100px; height:25px; font:10pt Tahoma; color:#666666" align="Right">'  )

</script>

<layer id="fixacam"> 

	<a rel="home" class="home" href="socincluir.php">
	<img alt="Incluir" src="../imagens/botaoazul6.PNG" border="0"></a>

	<a rel="home" class="home" href="cadsocios.php?cod_5=<?=$Cod_p;?>">
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
include('soclayout.php');
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
