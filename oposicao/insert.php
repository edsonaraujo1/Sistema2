<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Insert Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 21/01/2009

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

@session_cache_expire(180); //5 minutos por exemplo...

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("CAD_OPOS");

if ($deixar == "SIM"){

$log_ssoc = $nome3;
$hora = date("d/m/Y"); 

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

// Abre Conex�o com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$nome3a = strtolower($nome3);

// Abre Tabela Tenporaria

$consulta0  = "SELECT * FROM $nome3a WHERE Nome1 = '$nome3a'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$Edit1      = trim(strtoupper(retirar_carac3(@$row0["Edit1"])));
$Edit2		= trim(strtoupper(retirar_carac3(@$row0["Edit2"])));
$Edit3		= trim(strtoupper(retirar_carac3(@$row0["Edit3"])));
$Edit4		= trim(strtoupper(retirar_carac3(@$row0["Edit4"])));
$Edit5		= trim(strtoupper(retirar_carac3(@$row0["Edit5"])));
$Edit6		= trim(strtoupper(retirar_carac3(@$row0["Edit6"])));
$Edit7		= trim(strtoupper(retirar_carac3(@$row0["Edit7"])));
$Edit8		= trim(strtoupper(retirar_carac3(@$row0["Edit8"])));
$Edit9		= trim(strtoupper(retirar_carac3(@$row0["Edit9"])));
$Edit10	    = trim(strtoupper(retirar_carac3(@$row0["Edit10"])));
$Edit11	    = trim(strtoupper(retirar_carac3(@$row0["Edit11"])));
$Edit12	    = trim(strtoupper(retirar_carac3(@$row0["Edit12"])));
$Edit13	    = trim(strtoupper(retirar_carac3(@$row0["Edit13"])));
$Edit14	    = trim(strtoupper(retirar_carac3(@$row0["Edit14"])));
$Edit15	    = trim(retirar_carac3(@$row0["memo1"]));
$alerta_1   = trim(@$row0["mensage1"]);
$nome_do_edif = trim(strtoupper(retirar_carac3(@$row0["mensage2"])));
$nome_da_adms = trim(strtoupper(retirar_carac3(@$row0["mensage3"])));
$id           = @$row0["mensage6"];

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


if(strlen($Edit5)<=0){
  $Edit5   = 0; 	
}
if(strlen($Edit6)<=0){
  $Edit6   = 0; 	
}
if(strlen($Edit11)<=0){
  $Edit11   = 0; 	
}
if(strlen($Edit13)<=0){
  $Edit13   = 0; 	
}


if ($alerta_1 == "CPF digitado INVALIDO VERIFIQUE !!!"){
	

	 	 echo ("
				
			     <br>
			     <br>
			     <br>
			     
				 <div align=center>
			
			     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
			     <tr>
			     <td>
			     <font face=arial><b>*** CPF informado e invalido !!! ***</b>
			     <table align=center>
			     <form method='POST' action='cadastro.php?Cod_xx=$id'>
			     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
			     </form> 
			     </table>
			     </td>
			     </tr>
			     </table>
			     </div>");
	             exit;
	
}

$consulta01  = "SELECT * FROM oposicao3 ORDER BY COD DESC LIMIT 0,1";

$resultado01 = @mysql_query($consulta01);

$row01 = @mysql_fetch_array($resultado01);

$id      = @$row01["id"];
$cod_2   = @$row01["COD"];


$novo_1 = $cod_2+1;

	
     // retorna uma pesquisa


	$texto_cpf = $Edit5;
	$eliminar1 = str_replace("-"," ",$texto_cpf);
	$eliminar2 = str_replace("."," ",$eliminar1);
	$valor_cp = str_replace(" ","",$eliminar2);


	 $consulta02  = "SELECT * FROM oposicao3 WHERE CPF = '". anti_sql_injection($valor_cp) ."'";

	 $resultado02 = @mysql_query($consulta02);

	 $row02 = @mysql_fetch_array($resultado02);

	 $id    = @$row02["id"];
     $cgc   = @$row02["CPF"];



//echo $Edit1."<br>";
//echo $Edit2."<br>";
//echo $Edit3."<br>";
//echo $Edit4."<br>";
//echo $Edit5."<br>";
//echo $Edit6."<br>";
//echo $Edit7."<br>";
//echo $Edit8."<br>";
//echo $Edit9."<br>";
//echo $Edit10."<br>";
//echo $Edit11."<br>";
//echo $Edit12."<br>";
//echo $Edit13."<br>";
//echo $Edit14."<br>";
//echo $Edit15."<br>";
//echo $Edit16."<br>";
//echo $Edit17."<br>";
//echo $valor_cp."<br>";

     
	 if (!empty($cgc)){
		
	 	 echo ("
				
			     <br>
			     <br>
			     
				 <div align=center>
			
			     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
			     <tr>
			     <td>
			     <font face=arial><b>*** CPF ja consta no Cadastro !!! ***</b>
			     <table align=center>
			     <form method='POST' action='cadastro.php?Cod_xx=$id'>
			     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
			     </form> 
			     </table>
			     </td>
			     </tr>
			     </table>
			     </div>");
	             exit;
		
	// nao incluir codigo ja existe
	
	}else{





$consulta = "INSERT INTO oposicao3  (COD,
                                     DAT2,
								     DATINSC,
								     RGASSOC,
								     CPF,
								     CODP,
								     CATEGORIA,
								     NOMEASSOC,
							 	  	 ENDRESID,
							 		 CEPRES,
									 CODEDIF,
									 CNPJ,
									 ADMS,
									 CNPJ2,
									 OBS,
									 NOMEEDIF,
									 NOMEADMS)
                VALUES
                                   ('$novo_1',
								    '$Edit2',
									'$Edit3',
									'$Edit4',
									'$valor_cp',
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
									'$nome_do_edif',
									'$nome_da_adms')";
	
		@mysql_query($consulta, $link) or
		
		die("
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Falha na Inclus�o !!! ***</b>
		     <table align=center>
		     <form method='POST' action='cadastro.php'>
		     <td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
}

     
			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagens."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);
     

// Elimina Tabela temp
$add0 = "DROP TABLE `$nome3a`";
@mysql_query($add0, $link);

// Salva Secao
session_start();
$_SESSION['navega'] = $Edit1;
     
?>

<html>
<body  style=" margin-left: 0px;  margin-top: 21px;  margin-right: 0px;  margin-bottom: 0px; ">

<?

// Abrir tabela Senha

$tabela_1 = strtoupper('oposicao3');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];


include("botoes.php");
include("layout.php");
?>

</body>
</html>

<?

}else{
	
include("enaaurlnp.php");
	
}
?>

<?
/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac3($var){

$var = ereg_replace("[����]",        "A",$var);
$var = ereg_replace("[����]",       "a",$var);
$var = ereg_replace("[���]",         "E",$var);
$var = ereg_replace("[���]",         "e",$var);
$var = ereg_replace("[����]",        "O",$var);
$var = ereg_replace("[�����]",       "o",$var);
$var = ereg_replace("[���]",         "U",$var);
$var = ereg_replace("[���]",         "u",$var);
$var = ereg_replace("[?*#'�`!$%�]",  " ",$var);
$var = str_replace("�",              "C",$var);
$var = str_replace("�",              "c",$var);
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

return($var);
}
?>