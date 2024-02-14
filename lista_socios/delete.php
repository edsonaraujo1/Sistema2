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

$consulta0  = "SELECT * FROM lis_fun_sind WHERE id = '$Cod_2'";

$resultado0 = @mysql_query($consulta0);

$row0 = mysql_fetch_array($resultado0);

$id            = @$row0["id"];
$Edit1         = trim(strtoupper(retirar_carac(@$row0["cnpj"])));
$Edit2		   = trim(strtoupper(retirar_carac(@$row0["nome"])));
$Edit4		   = trim(strtoupper(retirar_carac(@$row0["codigo"])));
$Edit5		   = trim(strtoupper(retirar_carac(@$row0["data"])));
$nome_do_edif  = trim(strtoupper(retirar_carac(@$row0["nome"])));

if(strlen($Edit3)<=0){
  $Edit3   = 0; 	
}

$date_1 = date("d/m/Y")."-".date("H:i:s")." POR ".$nome3;
$date   = date("d/m/Y");

// Salva Registro excluido em tabela temporaria
$consulta1 = "INSERT INTO lis_fun_sind_excluido  (cnpj,
		                                          nome,
										          codigo,
										          data,
										          obs)
		                VALUES
		                                   ('$Edit1',
										    '$Edit2',
											'$Edit4',
											'$date',
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
     <font face=arial><b>*** Falha na Exclusao !!! ***</b>
     <table align=center>
     <form method='POST' action='javascript:history.go(-1)'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


// Exclui Edificio
$consulta2 = "DELETE FROM lis_fun_sind WHERE id = '$Cod_2'";

@mysql_query($consulta2, $link);


// Organiza Tabela apos a Exclusao

$sql3 = 'ALTER TABLE `lis_fun_sind` DROP `id`';
$res3 = mysql_query($sql3);

$sql4 = 'ALTER TABLE `lis_fun_sind` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res4 = mysql_query($sql4);


$consulta4  = "SELECT * FROM lis_fun_sind ORDER BY id ASC LIMIT 0,50";

$resultado4 = @mysql_query($consulta4);

$row4 = mysql_fetch_array($resultado4);

$id      = @$row["id"];


// Abrir tabela Senha

$consulta5 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado5 = @mysql_query($consulta5);

$row5 = mysql_fetch_array($resultado5);

$adm1       = @$row5["adm1"];
$adm2       = @$row5["adm2"];
$adm3       = @$row5["adm3"];


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagem."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);

?>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:document.onkeydown = keyCatcher();" >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="/lista_funcionarios.php">
<table  width="1000"   style="height:712px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 316px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 284 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 284 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 284 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 656 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 417px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:417px;"   ><P><STRONG>Lista Funcionarios Sindical</STRONG></P></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 195px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 193 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 193 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 193 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 181px; WIDTH: 67px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:67px;"   ><STRONG>CNPJ.:</STRONG></div>
</div>
<div id="Codigo_outer" style="Z-INDEX: 6; LEFT: 253px; WIDTH: 194px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:194px;" disabled tabindex="0"    />
</div>


<div id="Label3_outer" style="Z-INDEX: 121; LEFT: 181px; WIDTH: 67px; POSITION: absolute; TOP: 171px; HEIGHT: 26px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:67px;"   ><STRONG>Nome.:</STRONG></div>
</div>


<div id="label1_outer" style="Z-INDEX: 123; LEFT: 250px; WIDTH: 442px; POSITION: absolute; TOP: 171px; HEIGHT: 20px">
<input type="text" id="label1" name="label1" value="<?=$nome_do_edif;?>" style=" font-family: Verdana; font-size: 14px; color: #0000FF;font-weight: bold; border-width: 0px; border-style: none;height:20px;width:442px;"  readonly  tabindex="0"    />
</div>


<div id="Label4_outer" style="Z-INDEX: 22; LEFT: 181px; WIDTH: 75px; POSITION: absolute; TOP: 199px; HEIGHT: 27px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:27px;width:75px;"   ><STRONG>No Emp.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 23; LEFT: 253px; WIDTH: 61px; POSITION: absolute; TOP: 195px; HEIGHT: 27px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:61px;" disabled   tabindex="0"    />
</div>
</td></tr></table>
</form></body>

<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 275px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php">
          <td><input type=image name="Voltar" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>
