<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Excluir Cadastro Empresa
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

$data1 = date("d/m/Y");
$hora  = date("H:i:s");
$log_ssoc = $nome3." em ".$data1; 
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
$menssagens = "*** Excluido ***";

// Abre Conex�o com o MySql
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
     <font face=arial><b>*** N�o foi possivel conectar !!! ***</b>
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
     <font face=arial><b>*** N�o Foi possivel selecionar o banco de dados !!! ***</b>
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

$consulta0  = "SELECT * FROM odontologico WHERE id = '$Cod_2'";

$resultado0 = @mysql_query($consulta0);

$row0 = mysql_fetch_array($resultado0);


$id     = @$row0["id"];
$Edit1  = trim(strtoupper(retirar_carac_2(@$row0["matricula"])));
$Edit2  = trim(strtoupper(retirar_carac_2(@$row0["titular"])));
$Edit3  = trim(strtoupper(retirar_carac_2(@$row0["mes"])));
$Edit4  = trim(strtoupper(retirar_carac_2(@$row0["ano"])));
$Edit5  = trim(strtoupper(retirar_carac_2(@$row0["dependente"])));
$Edit6  = trim(strtoupper(retirar_carac_2(@$row0["dentista"])));
$Edit7  = trim(strtoupper(retirar_carac_2(@$row0["procedimento"])));

$Edi_zero = 0;

$date_1 = date("d/m/Y")."-".date("H:i:s");
$data = date("d/m/Y");
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

$consulta1 = "INSERT INTO odontologico_excluir  (matricula,
                                     	titular,
                                     	mes,
								     	ano,
								     	dependente,
								     	dentista,
								     	procedimento,
								     	data,
								     	hora,
								     	setor)
                VALUES
                                   ('$Edit1',
								    '$Edit2',
								    '$Edit3',
									'$Edit4',
									'$Edit5',
									'$Edit6',
									'$Edit7',
									'$data',
									'$hora',
									'$log_ssoc')";
	
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

$odo1       = @$row5["odo1"];
$odo2       = @$row5["odo2"];
$odo3       = @$row5["odo3"];

if ($odo3 == "NAO")
{
   include("cadastro.php");
}
else
{

// Exclui Registro
$consulta2 = "DELETE FROM odontologico WHERE id = '$Cod_2'";

@mysql_query($consulta2, $link);

$consulta4  = "SELECT * FROM odontologico ORDER BY id ASC LIMIT 0,50";

$resultado4 = @mysql_query($consulta4);

$row4 = mysql_fetch_array($resultado4);

$id      = @$row["id"];

			$sql17 = 'ALTER TABLE `odontologico` ORDER BY `COD`';
			$res17 = mysql_query($sql17);
			
			$sql18 = 'ALTER TABLE `odontologico` DROP `id`';
			$res18 = mysql_query($sql18);
			
			$sql19 = 'ALTER TABLE `odontologico` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
			$res19 = mysql_query($sql19);

			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagens."/odonto/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);

?>

<html>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<?
include("layout.php");
?>


<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 425px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php">
          <td><input type=image name="Voltar" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>
</body>
</html>
<?
}

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac_2($var){

$var = ereg_replace("[����]",      "A",$var);
$var = ereg_replace("[����]",     "a",$var);
$var = ereg_replace("[���]",       "E",$var);
$var = ereg_replace("[���]",       "e",$var);
$var = ereg_replace("[����]",      "O",$var);
$var = ereg_replace("[�����]",     "o",$var);
$var = ereg_replace("[���]",       "U",$var);
$var = ereg_replace("[���]",       "u",$var);
$var = ereg_replace("[?*#'�`!$%�]"," ",$var);
$var = str_replace("�",            "C",$var);
$var = str_replace("�",            "c",$var);

return($var);
}

?>
