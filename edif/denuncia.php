<?
// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

unset ($_SESSION['Faz_uma']);

$nome3 = $_SESSION["nome_log"];

include("../logar.php");

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_DENUN");

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



$consulta  = "SELECT * FROM edificios WHERE COD = '". anti_sql_injection($Cod_Edif) ."'";
	
// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id    = @$row["id"];
$cod   = @$row["COD"];
$nome  = trim(@$row["COND"]." ".@$row["NOME"]);
$cnpj  = @$row["CGC"];

// Atualiza arquivo Log
$data_log = date("d/m/Y");
$hora_log = date("H:i:s"); 
$even_log = "DENUNCIA EDIF/".$cod;
				
$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
				             VALUES
				             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
				
@mysql_query($consulta_log, $link);

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


        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit1").focus();	
		}
		
		</script>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

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

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px;" onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="foco();">
<form style="margin-bottom: 0" id="Form1" name="Form1" method="post"  action="rel_pdf.php">
<table  width="704"   style="height:472px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 0px; WIDTH: 696px; POSITION: absolute; TOP: 0px; HEIGHT: 464px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 664 - 16, 432 - 16);
  Shape1_Canvas.fillRect(16, 16, 664 - 16 + 1, 432 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 664 - 16 + 1, 432 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 34px; WIDTH: 628px; POSITION: absolute; TOP: 34px; HEIGHT: 46px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 626 - 1, 44 - 1);
  Shape2_Canvas.fillRect(1, 1, 626 - 1 + 1, 44 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 626 - 1 + 1, 44 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 47px; WIDTH: 321px; POSITION: absolute; TOP: 41px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:321px;"   ><P><STRONG>Denúncia</STRONG></P></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 3; LEFT: 34px; WIDTH: 628px; POSITION: absolute; TOP: 82px; HEIGHT: 348px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 626 - 1, 346 - 1);
  Shape3_Canvas.fillRect(1, 1, 626 - 1 + 1, 346 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 626 - 1 + 1, 346 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 4; LEFT: 49px; WIDTH: 700px; POSITION: absolute; TOP: 96px; HEIGHT: 24px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; font-weight: bold; height:24px;width:700px;"   ><STRONG>Empresa.:</STRONG>&nbsp;&nbsp;<font color="#0000FF"><?=$nome;?></font></div>
</div>

<div id="Label2a_outer" style="Z-INDEX: 4; LEFT: 49px; WIDTH: 700px; POSITION: absolute; TOP: 118px; HEIGHT: 24px">
<div id="Label2a" style=" font-family: Verdana; font-size: 14px; font-weight: bold; height:24px;width:700px;"   ><STRONG>Cnpj.:</STRONG>&nbsp;&nbsp;<font color="#0000FF"><?=$cnpj;?></font></div>
</div>

<div id="Label3_outer" style="Z-INDEX: 5; LEFT: 48px; WIDTH: 168px; POSITION: absolute; TOP: 144px; HEIGHT: 24px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px;  height:24px;width:168px;"   ><P><STRONG>Digite a Denúncia.:</STRONG></P></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 48px; WIDTH: 600px; POSITION: absolute; TOP: 168px; HEIGHT: 216px">
<textarea id="Edit1" name="Edit1"  style=" font-family: Verdana; font-size: 14px;  height:215px;width:600px;"  onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"  tabindex="0"    /> <?=$Edit1;?></textarea>
</div>
<input type="hidden" name="id" value="<?=$id;?>"/>
<input type="hidden" name="cnpj" value="<?=$cnpj;?>"/>
<input type="hidden" name="cod" value="<?=$cod;?>"/>

<div id="Image1_outer" style="Z-INDEX: 7; LEFT: 248px; WIDTH: 92px; POSITION: absolute; TOP: 395px; HEIGHT: 22px">
<div id="Image1_container" style=" width: 92;  height: 22; overflow: hidden;" >

<input type=image name="consultar" src="../imagens/botaoazul23.PNG" />
</div>
</div>
<div id="Image2_outer" style="Z-INDEX: 8; LEFT: 357px; WIDTH: 92px; POSITION: absolute; TOP: 395px; HEIGHT: 22px">
<div id="Image2_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="javascript:window.close()"><img id="Image2" src="../imagens/botaoazul9.PNG"  width="92"  height="22"  border="0"       /></a></div>
</div>
</td></tr></table>
</form></body>
</html>



