<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Deletar Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = $_SESSION["nome_log"];

include("../logar.php");

include("menu.php");

include_once('../sql_injection.php');

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_EDIF");

if ($deixar_1 == "NAO"){
	
    echo "              <html>
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
			<form method='POST' action='../avaleht.php'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>
";
	        exit();
}	

// Regata Secao
@session_start();
$id_navega = $_SESSION['navega'];

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

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("

     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
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

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
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

// Abrir tabela Senha

$tabela_1 = strtoupper('edificios');

$consulta3 = "SELECT * FROM permissoes WHERE login = '". anti_sql_injection($nome3) ."' and tabela = '". anti_sql_injection($tabela_1) ."'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];


if ($per3 == "NAO")
{
   include("cadastro.php");
}

else
{

// retorna uma pesquisa

if (!empty($Cod_2)){
	
   $consulta  = "SELECT * FROM edificios Where id = '". anti_sql_injection($Cod_2) ."'";
	
}

if (!empty($id_navega)){

   $consulta  = "SELECT * FROM edificios Where id = '". anti_sql_injection($id_navega) ."'";
	
}

//echo $Cod_2."<br>";
//echo $id_navega."<br>";

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id      = @$row["id"];

if (empty($id)){
	
   $consulta  = "SELECT * FROM edificios Where COD = '". anti_sql_injection($id_navega) ."'";
	
}

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$Edit1   = @$row["COD"];
$Edit2   = @$row["ATIV"];
$Edit3   = @$row["DATA"];
$Edit4   = @$row["COND"];
$Edit5   = @$row["NOME"];
$Edit6   = @$row["RUA"];
$Edit7   = @$row["ENDERECO"];
$Edit8   = @$row["NUMERO"];
$Edit9   = @$row["CEP"];
$Edit10  = @$row["BAIRRO"];
$Edit11  = @$row["UF"]; 
$Edit12  = @$row["CGC"];
$Edit13  = @$row["FONE"];
$Edit14  = @$row["NU_EMP"];
$Edit15  = @$row["TIPOIMOV"];
$Edit16  = @$row["ZONA"];
$Edit17  = @$row["EMAIL"];
$Edit18  = @$row["T_MAIL"];
$Edit19  = @$row["ADM"];
$Edit20  = @$row["OBS"];

$menssagens = "* * * Excluir * * *";

// Abrir tabela Administradora

$consulta2 = "SELECT * FROM Adms Where cod = '". anti_sql_injection($Edit19) ."'";

$resultado2 = @mysql_query($consulta2);

$row2 = @mysql_fetch_array($resultado2);

$cod_adm      = @$row2["cod"];
$nome_adm     = @$row2["nomeadm"];

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


<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form name="form1" method='POST' action='pesquisa.php'>

<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 541px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 509 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 509 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 509 - 16 + 1);
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
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 329px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:329px;"   ><STRONG>Cadastro de&nbsp;Edificios</STRONG></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 419px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 417 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 417 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 417 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 181px; WIDTH: 64px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><STRONG>Codigo.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 56px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 382px; WIDTH: 84px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:84px;"   ><STRONG>Atividade.:</STRONG></div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 470px; WIDTH: 137px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px; background-color: #FFFFFF;" disabled    tabindex="2"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 676px; WIDTH: 47px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:47px;"   ><STRONG>Data.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 729px; WIDTH: 93px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Edit4_outer" style="Z-INDEX: 36; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 164px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;" disabled   tabindex="4"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 11; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 170px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Nome.:</STRONG>&nbsp;</div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 12; LEFT: 470px; WIDTH: 352px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:352px; background-color: #FFFFFF;" disabled    tabindex="5"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 13; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Endereco.:</STRONG>&nbsp;</div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 14; LEFT: 278px; WIDTH: 192px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:192px; background-color: #FFFFFF;" disabled   tabindex="6"    />
</div>
<div id="Edit7_outer" style="Z-INDEX: 15; LEFT: 470px; WIDTH: 352px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:352px; background-color: #FFFFFF;" disabled   tabindex="7"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 16; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Numero.:</STRONG>&nbsp;</div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 17; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 213px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;" disabled    tabindex="8"    />
</div>
<div id="Label14_outer" style="Z-INDEX: 18; LEFT: 468px; WIDTH: 62px; POSITION: absolute; TOP: 242px; HEIGHT: 26px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:62px;"   ><STRONG>Bairro.:</STRONG>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 19; LEFT: 532px; WIDTH: 180px; POSITION: absolute; TOP: 237px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:180px; background-color: #FFFFFF;" disabled   tabindex="10"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 20; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 242px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Cep.:</STRONG>&nbsp;</div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 21; LEFT: 278px; WIDTH: 83px; POSITION: absolute; TOP: 237px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:83px; background-color: #FFFFFF;" disabled   tabindex="9"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 22; LEFT: 181px; WIDTH: 70px; POSITION: absolute; TOP: 267px; HEIGHT: 21px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:70px;"   ><STRONG>CNPJ.:</STRONG>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 23; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 262px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;" disabled   tabindex="12"    />
</div>
<div id="Label17_outer" style="Z-INDEX: 24; LEFT: 718px; WIDTH: 70px; POSITION: absolute; TOP: 243px; HEIGHT: 26px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:70px;"   ><STRONG>Estado.:</STRONG>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 25; LEFT: 783px; WIDTH: 39px; POSITION: absolute; TOP: 238px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px; background-color: #FFFFFF;" disabled   tabindex="11"    />
</div>
<div id="Label18_outer" style="Z-INDEX: 26; LEFT: 478px; WIDTH: 52px; POSITION: absolute; TOP: 267px; HEIGHT: 20px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:20px;width:52px;"   ><STRONG>Fone.:</STRONG>&nbsp;</div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 27; LEFT: 532px; WIDTH: 153px; POSITION: absolute; TOP: 262px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:153px; background-color: #FFFFFF;" disabled   tabindex="13"    />
</div>
<div id="Edit14_outer" style="Z-INDEX: 38; LEFT: 783px; WIDTH: 39px; POSITION: absolute; TOP: 263px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px; background-color: #FFFFFF;" disabled   tabindex="14"    />
</div>
<div id="Label22_outer" style="Z-INDEX: 28; LEFT: 181px; WIDTH: 107px; POSITION: absolute; TOP: 292px; HEIGHT: 26px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   ><STRONG>Tp. Imovel.:</STRONG>&nbsp;</div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 29; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 287px; HEIGHT: 26px">
<input type="text" id="Edit15" name="Edit15" value="<?=$Edit15;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;" disabled   tabindex="15"    />
</div>
<div id="Label23_outer" style="Z-INDEX: 30; LEFT: 477px; WIDTH: 52px; POSITION: absolute; TOP: 292px; HEIGHT: 21px">
<div id="Label23" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:52px;"   ><STRONG>Zona.:</STRONG>&nbsp;</div>
</div>
<div id="Edit16_outer" style="Z-INDEX: 31; LEFT: 532px; WIDTH: 153px; POSITION: absolute; TOP: 287px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?=$Edit16;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:153px; background-color: #FFFFFF;" disabled   tabindex="16"    />
</div>
<div id="Label26_outer" style="Z-INDEX: 32; LEFT: 181px; WIDTH: 103px; POSITION: absolute; TOP: 341px; HEIGHT: 26px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:103px;"   ><STRONG>Cod. Adm.:</STRONG>&nbsp;</div>
</div>
<div id="Label68_outer" style="Z-INDEX: 33; LEFT: 180px; WIDTH: 103px; POSITION: absolute; TOP: 366px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:103px;"   ><STRONG>Observacao:</STRONG></div>
</div>
<div id="obs_outer" style="Z-INDEX: 34; LEFT: 278px; WIDTH: 544px; POSITION: absolute; TOP: 362px; HEIGHT: 110px">
<textarea id="obs" name="obs" style=" font-family: Verdana; font-size: 14px;  height:109px;width:544px; color: #696969; background-color: #FFFFFF;"  readonly tabindex="17"    wrap="virtual"><?=$Edit20;?></textarea>
</div>
<div id="Label70_outer" style="Z-INDEX: 35; LEFT: 363px; WIDTH: 100px; POSITION: absolute; TOP: 243px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:100px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep"  ><STRONG>Procurar Cep </STRONG></A></div>
</div>
<div id="Label5_outer" style="Z-INDEX: 37; LEFT: 697px; WIDTH: 90px; POSITION: absolute; TOP: 268px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:90px;"   ><STRONG>N. Empre.:</STRONG>&nbsp;</div>
</div>
<div id="Edit19_outer" style="Z-INDEX: 39; LEFT: 278px; WIDTH: 81px; POSITION: absolute; TOP: 337px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?=$Edit19;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:81px; background-color: #FFFFFF;" disabled   tabindex="19"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 40; LEFT: 361px; WIDTH: 459px; POSITION: absolute; TOP: 341px; HEIGHT: 18px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:459px;"   ><STRONG><FONT color=#0000ff><?=$nome_adm;?></FONT></STRONG></div>
</div>
<div id="Label7_outer" style="Z-INDEX: 41; LEFT: 181px; WIDTH: 70px; POSITION: absolute; TOP: 317px; HEIGHT: 21px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:70px;"   ><STRONG>E-Mail.:</STRONG>&nbsp;</div>
</div>
<div id="Edit17_outer" style="Z-INDEX: 42; LEFT: 278px; WIDTH: 346px; POSITION: absolute; TOP: 312px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?=$Edit17;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:346px; background-color: #FFFFFF;" disabled   tabindex="17"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 43; LEFT: 640px; WIDTH: 147px; POSITION: absolute; TOP: 321px; HEIGHT: 18px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:147px;"   ><STRONG>Guias por E-mail.:</STRONG></div>
</div>
<div id="Edit18_outer" style="Z-INDEX: 44; LEFT: 783px; WIDTH: 39px; POSITION: absolute; TOP: 314px; HEIGHT: 26px">
<input type="text" id="Edit18" name="Edit18" value="<?=$Edit18;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px; background-color: #FFFFFF;" disabled   tabindex="18"    />
</div>


<div id="Image1_outer" style="Z-INDEX: 45; LEFT: 696px; WIDTH: 56px; POSITION: absolute; TOP: 291px; HEIGHT: 19px">
<div id="Image1_container" style=" width: 56;  height: 19; overflow: hidden;" ><img id="Image1" src="../imagens/conf1.PNG"  width="56"  height="19"  border="0" /></div>
</div>
<div id="Image2_outer" style="Z-INDEX: 46; LEFT: 759px; WIDTH: 56px; POSITION: absolute; TOP: 290px; HEIGHT: 21px">
<div id="Image2_container" style=" width: 56;  height: 21; overflow: hidden;" ><img id="Image2" src="../imagens/sind1.PNG"  width="56"  height="21"  border="0" /></div>
</div>

</td></tr></table></form></body>

<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 495px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>
          <form type="hidden" method="POST" action="delete.php?Cod_2=<?=$id;?>">
          <td><input type=image name="Deletar" src="../imagens/botaoazul4.PNG"></td>
          </form>

          <form method="POST" action="cadastro.php?Cod_xx=<?=$id_navega;?>">
          <td><input type=image name="Descartar" src="../imagens/botaoazul9.PNG"></td>
          </form>

</table>

</div>

<div style="Z-INDEX: 35; LEFT: 800px; WIDTH: 25px; POSITION: absolute; TOP: 510px; HEIGHT: 35px" align="center">
<img id="Image3" src="../imagens/vacina.JPG"  width="25"  height="35"  border="0"       />
</div>


</body>
</html>
<?
}	
?>
<?
?>
