<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Update Cadastro 
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

include("menu.php");

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

$Edit1      = trim(strtoupper(retirar_carac4(@$row0["Edit1"])));
$Edit2		= trim(strtoupper(retirar_carac4(@$row0["Edit2"])));
$Edit3		= trim(strtoupper(retirar_carac4(@$row0["Edit3"])));
$Edit4		= trim(strtoupper(retirar_carac4(@$row0["Edit4"])));
$Edit5		= trim(strtoupper(retirar_carac4(@$row0["Edit5"])));
$Edit6		= trim(strtoupper(retirar_carac4(@$row0["Edit6"])));
$Edit7		= trim(strtoupper(retirar_carac4(@$row0["Edit7"])));
$Edit8		= trim(strtoupper(retirar_carac4(@$row0["Edit8"])));
$Edit9		= trim(strtoupper(retirar_carac4(@$row0["Edit9"])));
$Edit10	    = trim(strtoupper(retirar_carac4(@$row0["Edit10"])));
$Edit11	    = trim(strtoupper(retirar_carac4(@$row0["Edit11"])));
$Edit12	    = trim(strtoupper(retirar_carac4(@$row0["Edit12"])));
$Edit13	    = trim(strtoupper(retirar_carac4(@$row0["Edit13"])));
$Edit14	    = trim(strtoupper(retirar_carac4(@$row0["Edit14"])));
$Edit15	    = trim(retirar_carac4(@$row0["memo1"]));
$alerta_1   = trim(strtoupper(retirar_carac4(@$row0["mensage1"])));
$nome_do_edif = trim(strtoupper(retirar_carac4(@$row0["mensage2"])));
$nome_da_adms = trim(strtoupper(retirar_carac4(@$row0["mensage3"])));
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


if(strlen($Edit6)<=0){
  $Edit6   = 0; 	
}
if(strlen($Edit11)<=0){
  $Edit11   = 0; 	
}
if(strlen($Edit13)<=0){
  $Edit13   = 0; 	
}

$menssagens = "* * * Alterado * * *";

// retorna uma pesquisa

$consulta = "UPDATE oposicao3 SET  
                                   COD       = '$Edit1',
                                   DAT2      = '$Edit2',
                                   DATINSC   = '$Edit3',
                                   RGASSOC   = '$Edit4',
								   CPF       = '$Edit5',
								   CODP      = '$Edit6',
                                   CATEGORIA = '$Edit7',
								   NOMEASSOC = '$Edit8',
								   ENDRESID  = '$Edit9',
								   CEPRES    = '$Edit10',
                                   CODEDIF   = '$Edit11',
								   CNPJ      = '$Edit12',
								   ADMS      = '$Edit13',
								   CNPJ2     = '$Edit14',
                                   OBS       = '$Edit15',
								   NOMEEDIF  = '$nome_do_edif',
								   NOMEADMS  = '$nome_da_adms'  WHERE id = '". anti_sql_injection($id) ."'";


@mysql_query($consulta, $link) or


die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Altera��o !!! ***</b>
     <table align=center>
     <form method='POST' action='cadastro.php'>
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
			$even_log = $menssagens."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);


// Abrir tabela Senha

$tabela_1 = strtoupper('oposicao3');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

?>

<html>
<body>
<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 500px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php?cod_5=<?=$Edit1;?>">
          <td><input type=image name="Voltar" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>

<div style="Z-INDEX: 35; LEFT: 800px; WIDTH: 25px; POSITION: absolute; TOP: 510px; HEIGHT: 35px" align="center">
<img id="Image3" src="../imagens/vacina.JPG"  width="25"  height="35"  border="0"       />
</div>
	
 
<?
include("layout.php");
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

Function retirar_carac4($var){

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