<?
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

include("funcoes2.php");

$consulta0  = "SELECT * FROM protocolo WHERE id = '$Cod_2'";

$resultado0 = @mysql_query($consulta0);

$row0 = mysql_fetch_array($resultado0);

$id      = @$row0["id"];
$Edit1   = @$row0["CODIGO"];
$Edit2   = trim(strtoupper(retirar_carac(@$row0["CONDOMINIO"])));
$Edit3   = trim(strtoupper(retirar_carac(@$row0["ENDERECO"])));
$Edit4   = trim(strtoupper(retirar_carac(@$row0["TELEFONE"])));
$Edit5   = trim(strtoupper(retirar_carac(@$row0["DATA"])));
$Edit6   = trim(strtoupper(retirar_carac(@$row0["HORA"])));
$Edit7   = trim(strtoupper(retirar_carac(@$row0["ACORDO"])));
$Edit8   = trim(strtoupper(retirar_carac(@$row0["RESP"])));
$Edit9   = trim(strtoupper(retirar_carac(@$row0["CHEGADA"])));
$Edit10  = @$row0["OBS"];

if(strlen($Edit14)<=0){
  $Edit14   = 0; 	
}
if(strlen($Edit19)<=0){
  $Edit19   = 0; 	
}

$date_1 = date("d/m/Y")."-".date("H:i:s")." POR ".$nome3;


// Salva Registro excluido em tabela temporaria
   $consulta1 = "INSERT INTO protocolo_excluir (CODIGO,
											    CONDOMINIO,
		                                    	ENDERECO,
												TELEFONE,
												DATA,
												HORA,
												ACORDO,
												RESP,
												CHEGADA,
												OBS,
												LOG)
		                VALUES
		                                  ('$Edit1',
										   '$Edit2',
										   '$Edit3',
										   '$Edit4',
										   '$Edit5',
										   '$Edit6',
										   '$Edit7',
										   '$Edit8',
										   '$Edit9',
										   '$Edit10',
										   '$date_1')";
		
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


// Exclui Edificio
$consulta2 = "DELETE FROM protocolo WHERE id = '$Cod_2'";

@mysql_query($consulta2, $link);


// Organiza Tabela apos a Exclusao
$sql0 = 'ALTER TABLE `protocolo` ORDER BY `CODIGO`';
$res0 = mysql_query($sql0);

$sql3 = 'ALTER TABLE `protocolo` DROP `id`';
$res3 = mysql_query($sql3);

$sql4 = 'ALTER TABLE `protocolo` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res4 = mysql_query($sql4);


$consulta4  = "SELECT * FROM protocolo ORDER BY id ASC LIMIT 0,50";

$resultado4 = @mysql_query($consulta4);

$row4 = mysql_fetch_array($resultado4);

$id      = @$row["id"];


// Abrir tabela Senha

$consulta5 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado5 = @mysql_query($consulta5);

$row5 = mysql_fetch_array($resultado5);

$aco1       = @$row5["aco1"];
$aco2       = @$row5["aco2"];
$aco3       = @$row5["aco3"];


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagem."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);

?>

<html>


<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style>

<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 495px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php?cod_1=">
          <td><input type=image name="Voltar" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>
	
 
<?
include("layout.php");
?>

</body>
</html>
