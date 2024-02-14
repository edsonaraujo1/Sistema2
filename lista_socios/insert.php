<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Insert Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

session_cache_expire(180); //5 minutos por exemplo...

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("CADASTRO");

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

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

include("funcoes2.php");

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
$alerta_1   = trim(strtoupper(retirar_carac(@$row0["mensage1"])));
$nome_edif  = trim(strtoupper(retirar_carac(@$row0["mensage3"])));

if(strlen($Edit3)<=0){
  $Edit3   = 0; 	
}


if ($Edit1  == '.'){	$Edit1  = '';}

$consulta0  = "SELECT * FROM lis_fun_sind WHERE cnpj =  '$Edit1'";

$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$id    = @$row0["id"];
$data  = date("d/m/Y");

if (!empty($id)){
	
	echo ("
			
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** CNPJ ja Cadastrado !!! ***</b>
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

$consulta01  = "SELECT * FROM lis_fun_sind ORDER BY id DESC LIMIT 0,1";

$resultado01 = @mysql_query($consulta01);

$row01 = @mysql_fetch_array($resultado01);

$id_01    = @$row01["id"];

/* 
echo $Edit1."<br>";
echo $Edit2."<br>";
echo $Edit3."<br>";
echo $Edit4."<br>";
echo $Edit5."<br>";
*/

$consulta = "INSERT INTO lis_fun_sind (cnpj,
                                       nome,
								       codigo,
								       data)
                VALUES
                                   ('$Edit1',
								    '$nome_edif',
									'$Edit4',
									'$data')";

@mysql_query($consulta, $link) or
		
		die("
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Falha na Inclusão !!! ***</b>
		     <table align=center>
		     <form method='POST' action='cadastro.php'>
		     <td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");

     
			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = "LISTA/FUNC.SINDICAL ".$menssagens."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);
     

// Elimina Tabela temp
$add0 = "DROP TABLE `$nome3a`";
@mysql_query($add0, $link);


// Salva Secao
session_start();
$_SESSION['id_RG'] = $Edit1;
     
?>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="/acompanhalayout.php">
<table  width="1000"   style="height:600px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
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
<input type="text" id="label1" name="label1" value="<?=$nome_edif;?>" style=" font-family: Verdana; font-size: 14px; color: #0000FF;font-weight: bold; border-width: 0px; border-style: none;height:20px;width:442px;"  readonly  tabindex="0"    />
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

          <form method="POST" action="cadastro.php?cod_1=<?=$Edit1;?>">
          <td><input type=image name="Voltar" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>

<?

}else{
	
include("enaaurlnp.php");
	
}
?>
