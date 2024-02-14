<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Excluir Cadastro Empresa
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

$data1 = date("d/m/Y");
$hora  = date("H:i:s");
$log_ssoc = $nome3." em ".$data1; 
?>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);
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

<?php
$menssagens = "*** Excluido ***";

// Abre Conexão com o MySql
include("../conexao.php");
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
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
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
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// retorna uma pesquisa

$consulta0  = "SELECT * FROM cursos WHERE id = '$Cod_2'";

$resultado0 = @mysql_query($consulta0);

$row0 = mysql_fetch_array($resultado0);


$id     = @$row0["id"];
$novo_cod = trim(strtoupper(retirar_carac_2(@$row0["COD"])));
$Edit1  = trim(strtoupper(retirar_carac_2(@$row0["CODP"])));
$Edit2  = trim(strtoupper(retirar_carac_2(@$row0["DATINI"])));
$Edit3  = trim(strtoupper(retirar_carac_2(@$row0["DATTER"])));
$Edit4  = trim(strtoupper(retirar_carac_2(@$row0["CURSOS_1"])));
$Edit5  = trim(strtoupper(retirar_carac_2(@$row0["RG"])));
$Edit6  = trim(strtoupper(retirar_carac_2(@$row0["PERI"])));
$Edit7  = trim(strtoupper(retirar_carac_2(@$row0["CPF"])));
$Edit8  = trim(strtoupper(retirar_carac_2(@$row0["NOME"])));
$Edit9  = trim(strtoupper(retirar_carac_2(@$row0["OCUPA"])));
$Edit10 = trim(strtoupper(retirar_carac_2(@$row0["DATNASC"])));
$Edit11 = trim(strtoupper(retirar_carac_2(@$row0["CIVIL"])));
$Edit12 = trim(strtoupper(retirar_carac_2(@$row0["NACIONAL"])));
$Edit13 = trim(strtoupper(retirar_carac_2(@$row0["SEXO"])));
$Edit14 = trim(strtoupper(retirar_carac_2(@$row0["DATA"])));
$Edit15 = trim(strtoupper(retirar_carac_2(@$row0["ENDERECO"])));
$Edit16 = trim(strtoupper(retirar_carac_2(@$row0["CEP"])));
$Edit17 = trim(strtoupper(retirar_carac_2(@$row0["BAIRRO"])));
$Edit18 = trim(strtoupper(retirar_carac_2(@$row0["FONE"])));
$Edit19 = trim(strtoupper(retirar_carac_2(@$row0["ESCOLA"])));
$Edit20 = trim(strtoupper(retirar_carac_2(@$row0["TECNICO"])));
$Edit21 = trim(strtoupper(retirar_carac_2(@$row0["OBS"])));
$nome_do_edif = trim(strtoupper(retirar_carac_2(@$row0["NOMEEDIF"])));
$nome_da_adms = trim(strtoupper(retirar_carac_2(@$row0["NOMEADMS"])));

$Edi_zero = 0;

$date_1 = date("d/m/Y")."-".date("H:i:s");
$hora = date("H:i:s");

//echo $novo_cod."<br>";
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
//echo $Edit18."<br>";
//echo $Edit19."<br>";
//echo $Edit20."<br>";
//echo $Edit21."<br>";
//echo $hora;

// Salva Registro excluido em tabela temporaria

$consulta1 = "INSERT INTO cursos_excluidos (COD,
                                     		CODP,
                                     		DATINI,
								     		DATTER,
								     		CURSOS_1,
								     		RG,
								     		PERI,
								     		CPF,
								     		NOME,
							 	  	 		OCUPA,
							 		 		DATNASC,
									 		CIVIL,
									 		NACIONAL,
									 		SEXO,
									 		DATA,
									 		ENDERECO,
									 		CEP,
									 		BAIRRO,
									 		FONE,
									 		ESCOLA,
									 		TECNICO,
									 		OBS,
											LOG_SSOC,
											HORA)
                VALUES
                                   ('$novo_cod',
								    '$Edit1',
								    '$Edit2',
									'$Edit3',
									'$Edit4',
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
									'$nome3',
									'$hora')";
		
@mysql_query($consulta1, $link)

or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Inclusao !!! ***</b>
     <table align=center>
     <form method='POST' action='cadastro.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// Abrir tabela Senha

$consulta5 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado5 = @mysql_query($consulta5);

$row5 = mysql_fetch_array($resultado5);

$cur1       = @$row5["botao4"];
$cur2       = @$row5["botao5"];
$cur3       = @$row5["botao6"];

if ($cur3 == "NAO")
{
   include("cadastro.php");
}
else
{

// Exclui Registro
$consulta2 = "DELETE FROM cursos WHERE id = '$Cod_2'";

@mysql_query($consulta2, $link);

$consulta4  = "SELECT * FROM cursos ORDER BY id ASC LIMIT 0,50";

$resultado4 = @mysql_query($consulta4);

$row4 = mysql_fetch_array($resultado4);

$id      = @$row["id"];

			$sql17 = 'ALTER TABLE `cursos` ORDER BY `COD`';
			$res17 = mysql_query($sql17);
			
			$sql18 = 'ALTER TABLE `cursos` DROP `id`';
			$res18 = mysql_query($sql18);
			
			$sql19 = 'ALTER TABLE `cursos` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
			$res19 = mysql_query($sql19);

			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagens."/cursos/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);

?>

<html>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<?php
include("layout.php");
?>


<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 475px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php">
          <td><input type=image name="Voltar" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>
</body>
</html>
<?php
}

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac_2($var){

$var = @ereg_replace("[ÁÀÂÃ]",      "A",$var);
$var = @ereg_replace("[áàâãª]",     "a",$var);
$var = @ereg_replace("[ÉÈÊ]",       "E",$var);
$var = @ereg_replace("[éèê]",       "e",$var);
$var = @ereg_replace("[ÓÒÔÕ]",      "O",$var);
$var = @ereg_replace("[óòôõº]",     "o",$var);
$var = @ereg_replace("[ÚÙÛ]",       "U",$var);
$var = @ereg_replace("[úùû]",       "u",$var);
$var = @ereg_replace("[?*#'´`!$%¨]"," ",$var);
$var = str_replace("Ç",            "C",$var);
$var = str_replace("ç",            "c",$var);

return($var);
}

?>
