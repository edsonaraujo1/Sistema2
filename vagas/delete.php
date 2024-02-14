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
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

$data1 = date("d/m/Y");
$hora  = date("H:i:s");
$log_ssoc = $nome3." em ".$data1; 
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

$consulta0  = "SELECT * FROM vaga WHERE id = '$Cod_2'";

$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$id     = @$row0["id"];
$Edit1  = trim(strtoupper(retirar_carac(@$row0["COD"])));
$Edit2  = trim(strtoupper(retirar_carac(@$row0["SITU"])));
$Edit3  = trim(strtoupper(retirar_carac(@$row0["DATA"])));
$Edit4  = trim(strtoupper(retirar_carac(@$row0["FUNCAO"])));
$Edit5  = trim(strtoupper(retirar_carac(@$row0["QTD"])));
$Edit6  = trim(strtoupper(retirar_carac(@$row0["ENCA"])));
$Edit7  = trim(strtoupper(retirar_carac(@$row0["NOME"])));
$Edit8  = trim(strtoupper(retirar_carac(@$row0["ENDERECO"])));
$Edit9  = trim(strtoupper(retirar_carac(@$row0["BAIRRO"])));
$Edit10 = trim(strtoupper(retirar_carac(@$row0["CIDADE"])));
$Edit11 = trim(strtoupper(retirar_carac(@$row0["ESTADO"]))); 
$Edit12 = trim(strtoupper(retirar_carac(@$row0["CEP"])));
$Edit13 = trim(strtoupper(retirar_carac(@$row0["TELEFONE"])));
$Edit16 = trim(strtoupper(retirar_carac(@$row0["IDADE"])));
$Edit14 = trim(retirar_carac(@$row0["CONTATO"]));
$Edit15 = trim(retirar_carac(@$row0["OBS"]));


if(strlen($Edit5)<=0){
  $Edit5   = 0; 	
}
if(strlen($Edit6)<=0){
  $Edit6   = 0; 	
}

$date_1 = date("d/m/Y")."-".date("H:i:s")." POR ".$nome3;

// Salva Registro excluido em tabela temporaria
$consulta1 = "INSERT INTO vaga_excluidas   (COD,
                                    		SITU,
								    		DATA,
								    		FUNCAO,
								    		QTD,
								    		ENCA,
								    		NOME,
								    		ENDERECO,
											BAIRRO,
											CIDADE,
											ESTADO,
											CEP,
											TELEFONE,
											CONTATO,
											OBS,
											NOVO,
											IDADE)
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
									'$Edit13',
									'$Edit14',
									'$Edit15',
									'$date_1',
									'$Edit16')";
		
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
$consulta2 = "DELETE FROM vaga WHERE id = '$Cod_2'";

@mysql_query($consulta2, $link);


// Organiza Tabela apos a Exclusao
$sql0 = 'ALTER TABLE `vaga` ORDER BY `COD`';
$res0 = mysql_query($sql0);

$sql3 = 'ALTER TABLE `vaga` DROP `id`';
$res3 = mysql_query($sql3);

$sql4 = 'ALTER TABLE `vaga` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res4 = mysql_query($sql4);


$consulta4  = "SELECT * FROM vaga ORDER BY id ASC LIMIT 0,50";

$resultado4 = @mysql_query($consulta4);

$row4 = @mysql_fetch_array($resultado4);

$id      = @$row["id"];


// Abrir tabela Senha

$consulta5 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado5 = @mysql_query($consulta5);

$row5 = @mysql_fetch_array($resultado5);

$vag1       = @$row5["vag1"];
$vag2       = @$row5["vag2"];
$vag3       = @$row5["vag3"];


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagem."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);

?>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="vagaslayout.php">
<table  width="100"   style="height:200px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 145px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 532px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 478 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 478 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 478 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 178px; WIDTH: 658px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
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
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 187px; WIDTH: 449px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: #5A9CB1; background-color: #FFFFFF;height:32px;width:449px;"   ><strong>Cadastro de&nbsp;Vagas</strong></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 618px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><strong><?=$menssagens;?></strong></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 178px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 410px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 386 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 386 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 386 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 185px; WIDTH: 64px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><strong>Codigo.:</strong></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 282px; WIDTH: 56px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 356px; WIDTH: 152px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:152px;"   > <strong>Vaga Preenchida.:</strong> </div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 498px; WIDTH: 34px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px; background-color: #FFFFFF;"  disabled  tabindex="1"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 680px; WIDTH: 47px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:47px;"   ><strong>Data.:</strong></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 733px; WIDTH: 93px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px; background-color: #FFFFFF;" disabled   tabindex="2"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 11; LEFT: 185px; WIDTH: 89px; POSITION: absolute; TOP: 170px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Função.:</strong>&nbsp;</div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 12; LEFT: 602px; WIDTH: 32px; POSITION: absolute; TOP: 164px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:32px; background-color: #FFFFFF;"  disabled  tabindex="4"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 13; LEFT: 185px; WIDTH: 89px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Adm./Edif..:</strong>&nbsp;</div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 14; LEFT: 282px; WIDTH: 450px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:450px; background-color: #FFFFFF;"  disabled  tabindex="5"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 15; LEFT: 185px; WIDTH: 89px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Endereço.:</strong>&nbsp;</div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 16; LEFT: 282px; WIDTH: 450px; POSITION: absolute; TOP: 213px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:450px; background-color: #FFFFFF;"  disabled  tabindex="7"    />
</div>
<div id="Label14_outer" style="Z-INDEX: 17; LEFT: 187px; WIDTH: 62px; POSITION: absolute; TOP: 243px; HEIGHT: 26px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:62px;"   ><strong>Bairro.:</strong>&nbsp;</div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 18; LEFT: 282px; WIDTH: 180px; POSITION: absolute; TOP: 238px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:180px; background-color: #FFFFFF;"  disabled  tabindex="9"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 19; LEFT: 185px; WIDTH: 89px; POSITION: absolute; TOP: 268px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Cep.:</strong>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 20; LEFT: 282px; WIDTH: 83px; POSITION: absolute; TOP: 263px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:83px; background-color: #FFFFFF;" disabled   tabindex="8"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 21; LEFT: 185px; WIDTH: 139px; POSITION: absolute; TOP: 293px; HEIGHT: 21px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:139px;"   ><strong>Telefone.:</strong>&nbsp;</div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 22; LEFT: 282px; WIDTH: 218px; POSITION: absolute; TOP: 288px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:218px; background-color: #FFFFFF;"  disabled  tabindex="11"    />
</div>
<div id="Label17_outer" style="Z-INDEX: 23; LEFT: 757px; WIDTH: 36px; POSITION: absolute; TOP: 244px; HEIGHT: 26px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:36px;"   ><strong>Uf.:</strong>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 24; LEFT: 787px; WIDTH: 39px; POSITION: absolute; TOP: 238px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px; background-color: #FFFFFF;"  disabled  tabindex="10"    />
</div>
<div id="Label18_outer" style="Z-INDEX: 25; LEFT: 505px; WIDTH: 82px; POSITION: absolute; TOP: 293px; HEIGHT: 20px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:20px;width:82px;"   ><strong>Contato.:</strong>&nbsp;</div>
</div>
<div id="Edit14_outer" style="Z-INDEX: 26; LEFT: 581px; WIDTH: 244px; POSITION: absolute; TOP: 288px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:244px; background-color: #FFFFFF;"  disabled  tabindex="12"    />
</div>
<div id="Label70_outer" style="Z-INDEX: 29; LEFT: 367px; WIDTH: 100px; POSITION: absolute; TOP: 269px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:100px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep" target="new" ><strong><font color="#0000ff"><u>Procurar Cep</u></font></strong></A></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 30; LEFT: 282px; WIDTH: 193px; POSITION: absolute; TOP: 164px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;"  disabled  tabindex="3"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 31; LEFT: 481px; WIDTH: 120px; POSITION: absolute; TOP: 168px; HEIGHT: 18px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:120px;"   > <strong>Qtd. de Vagas.:</strong> </div>
</div>
<div id="Label7_outer" style="Z-INDEX: 32; LEFT: 662px; WIDTH: 120px; POSITION: absolute; TOP: 168px; HEIGHT: 18px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:120px;"   > <strong>Encaminhados.:</strong> </div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 33; LEFT: 788px; WIDTH: 38px; POSITION: absolute; TOP: 164px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:38px; background-color: #FFFFFF;"   disabled tabindex="4"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 34; LEFT: 467px; WIDTH: 62px; POSITION: absolute; TOP: 243px; HEIGHT: 26px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:62px;"   ><strong>Cidade.:</strong>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 35; LEFT: 531px; WIDTH: 201px; POSITION: absolute; TOP: 238px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:201px; background-color: #FFFFFF;"  disabled  tabindex="9"    />
</div>
<div id="Label68_outer" style="Z-INDEX: 27; LEFT: 184px; WIDTH: 103px; POSITION: absolute; TOP: 317px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:103px;"   ><strong>Observação:</strong></div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 28; LEFT: 282px; WIDTH: 544px; POSITION: absolute; TOP: 313px; HEIGHT: 183px">
<textarea id="Edit15" name="Edit15" style=" font-family: Verdana; font-size: 14px;  height:130px;width:544px; color: #696969; background-color: #FFFFFF;"  readonly tabindex="17"    wrap="virtual"><?=$Edit15;?></textarea>
</div>

<div id="Label15_outer" style="Z-INDEX: 19; LEFT: 474px; WIDTH: 89px; POSITION: absolute; TOP: 268px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Idade.:</strong>&nbsp;</div>
</div>

<div id="Edit16_outer" style="Z-INDEX: 20; LEFT: 531px; WIDTH: 201px; POSITION: absolute; TOP: 263px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?=$Edit16;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:201px; background-color: #FFFFFF;" disabled   tabindex="9"    />
</div>


</td></tr></table>
</form></body>

<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 480px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php">
          <td><input type=image name="Voltar" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>