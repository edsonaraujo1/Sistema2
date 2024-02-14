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

$deixar = acesso_url("APOSENT_1");

if ($deixar == "SIM"){

$log_ssoc = $nome3;
$hora = date("d/m/Y"); 

?>
<script language="JavaScript"><!--

//document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
}
//-->
</script>

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
$Edit6		= trim(strtoupper(retirar_carac(@$row0["Edit6"])));
$Edit7		= trim(strtoupper(retirar_carac(@$row0["Edit7"])));
$Edit8		= trim(retirar_carac(@$row0["Edit8"]));
$Edit9		= trim(strtoupper(retirar_carac(@$row0["Edit9"])));
$Edit10		= trim(strtoupper(retirar_carac(@$row0["Edit10"])));
$Edit11		= trim(strtoupper(retirar_carac(@$row0["Edit11"])));
$Edit12		= trim(strtoupper(retirar_carac(@$row0["Edit12"])));
$Edit13	    = trim(retirar_carac(@$row0["memo1"]));
$alerta_1   = trim(strtoupper(retirar_carac(@$row0["mensage1"])));
$nome_adm   = trim(strtoupper(retirar_carac(@$row0["mensage3"])));

if(strlen($Edit14)<=0){
  $Edit14   = 0; 	
}
if(strlen($Edit19)<=0){
  $Edit19   = 0; 	
}

$cami2 = '../imagens/fotos/Branco.bmp';  

$consulta0  = "SELECT * FROM aposentados WHERE CODIGO = '$Edit1'";

$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$id    = @$row0["id"];
$cod_2 = @$row0["CODIGO"];

if (!empty($cod_2)){
	
	$Edit1 = $cod_2+1;
}

	
		$consulta = "INSERT INTO aposentados    (CODIGO,
											NOME,
		                                    CPF,
											RG,
											OAB,
											FONE,
											CELULAR,
											EMAIL,
											ENDER,
											BAIRRO,
											ESTADO,
											CEP,
											OBS)
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
										   '$Edit11',
										   '$Edit12',
										   '$Edit13')";
		
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

<script language="JavaScript"><!--

document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
}
//-->
</script>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="/advogado_layout.php">
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 540px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 508 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 508 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 508 - 16 + 1);
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
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 361px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:371px;"   >  <STRONG>Cadastro de Aposentados</STRONG>  </div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 418px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 416 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 416 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 416 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 189px; WIDTH: 64px; POSITION: absolute; TOP: 145px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><STRONG>Codigo.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 305px; WIDTH: 74px; POSITION: absolute; TOP: 141px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:74px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 189px; WIDTH: 107px; POSITION: absolute; TOP: 170px; HEIGHT: 26px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   >  <STRONG>Nome.:</STRONG>  </div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 305px; WIDTH: 383px; POSITION: absolute; TOP: 166px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:383px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 189px; WIDTH: 107px; POSITION: absolute; TOP: 196px; HEIGHT: 26px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   >  <STRONG>C.P.F.:</STRONG>  </div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 305px; WIDTH: 199px; POSITION: absolute; TOP: 192px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:199px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 11; LEFT: 189px; WIDTH: 99px; POSITION: absolute; TOP: 221px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:99px;"   >  <STRONG>RG.:</STRONG>  </div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 12; LEFT: 305px; WIDTH: 199px; POSITION: absolute; TOP: 217px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:199px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 13; LEFT: 189px; WIDTH: 64px; POSITION: absolute; TOP: 247px; HEIGHT: 26px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><STRONG>Beneficio.:</STRONG></div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 14; LEFT: 305px; WIDTH: 127px; POSITION: absolute; TOP: 243px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:127px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 15; LEFT: 189px; WIDTH: 64px; POSITION: absolute; TOP: 273px; HEIGHT: 26px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><STRONG>Fone.:</STRONG></div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 16; LEFT: 305px; WIDTH: 199px; POSITION: absolute; TOP: 269px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:199px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 17; LEFT: 509px; WIDTH: 67px; POSITION: absolute; TOP: 271px; HEIGHT: 26px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:67px;"   ><STRONG>Celular.:</STRONG></div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 18; LEFT: 584px; WIDTH: 184px; POSITION: absolute; TOP: 267px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:184px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 19; LEFT: 189px; WIDTH: 123px; POSITION: absolute; TOP: 299px; HEIGHT: 26px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:123px;"   ><STRONG>E-Mail..:</STRONG></div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 20; LEFT: 305px; WIDTH: 463px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:463px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Label10_outer" style="Z-INDEX: 21; LEFT: 189px; WIDTH: 123px; POSITION: absolute; TOP: 325px; HEIGHT: 26px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:123px;"   ><STRONG>Endereco.:</STRONG></div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 22; LEFT: 305px; WIDTH: 463px; POSITION: absolute; TOP: 321px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:463px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 23; LEFT: 189px; WIDTH: 123px; POSITION: absolute; TOP: 351px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:123px;"   ><STRONG>Bairro.:</STRONG></div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 24; LEFT: 305px; WIDTH: 199px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:199px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 39; LEFT: 509px; WIDTH: 83px; POSITION: absolute; TOP: 351px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:83px;"   ><STRONG>Estado.:</STRONG></div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 40; LEFT: 585px; WIDTH: 183px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:183px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 41; LEFT: 189px; WIDTH: 123px; POSITION: absolute; TOP: 376px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:123px;"   ><STRONG>CEP.:</STRONG></div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 42; LEFT: 305px; WIDTH: 199px; POSITION: absolute; TOP: 372px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:199px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Label14_outer" style="Z-INDEX: 43; LEFT: 189px; WIDTH: 123px; POSITION: absolute; TOP: 402px; HEIGHT: 26px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:123px;"   ><STRONG>Observacao.:</STRONG></div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 44; LEFT: 305px; WIDTH: 463px; POSITION: absolute; TOP: 398px; HEIGHT: 50px">
<textarea id="Edit13" name="Edit13" style=" font-family: Verdana; font-size: 14px;  height:49px;width:463px; color: #696969; background-color: #FFFFFF; background-color: #FFFFFF;" disabled   tabindex="0"  wrap="virtual"   ><?=$Edit13;?> </textarea>
</div>
<div id="Image1_outer" style="Z-INDEX: 45; LEFT: 704px; WIDTH: 96px; POSITION: absolute; TOP: 144px; HEIGHT: 112px">
<div id="Image1_container" style=" width: 96;  height: 112; overflow: hidden;" ><img id="Image1" src="<?=$cami2;?>"  width="96"  height="112"  border="0"       /></div>
</div>
</td></tr></table>
</form></body>

<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 495px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php?cod_5=<?=$Edit1;?>">
          <td><input type=image name="Voltar" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>

<?

}else{
	
include("enaaurlnp.php");
	
}
?>
