<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Consultar Cadastro Empresa
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("vaurls.php");

$deixar = acesso_url("FORM_ODONTO");

if ($deixar == "SIM"){

include_once("funcoes2.php");

// Resgata Sessao
session_name("Val_Etq_Edif");
session_start();

unset ($_SESSION['Acao']);
unset ($_SESSION['Edit1']);
unset ($_SESSION['Edit2']);

	$consulta10  = "SELECT * FROM socios    WHERE CODP = '$matri'";
	
	$resultado10 = @mysql_query($consulta10);
	
	$row10 = @mysql_fetch_array($resultado10);
	
	$id_soc		= @$row10["id"];
	$cod_soc    = @$row10["COD"];
	$new_fot    = @$row10["CODP"];
	$nu_cod	    = @$row10["NU"];
	$rg_soc     = Trim(@$row10["RGASSOC"]);
	$cpf_soc  	= @$row10["CPF"];
	$insc_soc 	= @$row10["DATINSC"];
	$cate_soc	= @$row10["CATEGORIA"];
	$edif_soc	= @$row10["CODEDIF"];
	$nome_soc	= @$row10["NOMEASSOC"];
	$end_soc	= Trim(@$row10["RUA"])." ".Trim(@$row10["ENDRESID"]).",".Trim(@$row10["NUMERO"]);
	$cep_soc	= @$row10["CEPRES"];
	$mes_pg_soc = @$row10["MES"];
	$ano_pg_soc = @$row10["ANO"];
	$dat_nascim = @$row10["DATNASC"];
	$carg_asso  = @$row10["CARGOASSOC"];
	$esta_civil = @$row10["ESTCIVIL"];
	$natural_de = @$row10["NASCION"];
	$bairro_res = @$row10["BAIRRORES"];
	$cart_trab  = @$row10["CARTTRAB"]."-".@$row10["SERIE"]."-".@$row10["EMISCART "];
	$obs        = @$row10["OBS"];

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


<html >

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; ">
<form name="Form1" type='hidden' method='POST' action='javascript:window.close()'>

<table  width="688"   style="height:232px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 0px; WIDTH: 688px; POSITION: absolute; TOP: 0px; HEIGHT: 232px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(15, 15, 658 - 15, 202 - 15);
  Shape1_Canvas.fillRect(15, 15, 658 - 15 + 1, 202 - 15 + 1);
  Shape1_Canvas.setStroke(15);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(15, 15, 658 - 15 + 1, 202 - 15 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 32px; WIDTH: 624px; POSITION: absolute; TOP: 32px; HEIGHT: 48px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 622 - 1, 46 - 1);
  Shape2_Canvas.fillRect(1, 1, 622 - 1 + 1, 46 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 622 - 1 + 1, 46 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 49px; WIDTH: 543px; POSITION: absolute; TOP: 39px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; height:32px;width:543px;"   ><STRONG>Observações Socio</STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 3; LEFT: 32px; WIDTH: 624px; POSITION: absolute; TOP: 82px; HEIGHT: 118px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 622 - 1, 116 - 1);
  Shape3_Canvas.fillRect(1, 1, 622 - 1 + 1, 116 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 622 - 1 + 1, 116 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 4; LEFT: 48px; WIDTH: 128px; POSITION: absolute; TOP: 100px; HEIGHT: 24px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px;  height:24px;width:128px;"   ><STRONG>Observação:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 5; LEFT: 150px; WIDTH: 496px; POSITION: absolute; TOP: 96px; HEIGHT: 60px">
<textarea id="Edit1_ed" name="Edit1_ed" style=" font-family: Verdana; font-size: 14px;  height:60px;width:496px; color: #696969; background-color: #FFFFFF;" readonly tabindex="0"    /><?=$obs;?></textarea>
</div>


<div id="Label4_outer" style="Z-INDEX: 8; LEFT: 416px; WIDTH: 224px; POSITION: absolute; TOP: 48px; HEIGHT: 24px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #FF0000; height:24px;width:224px;"  align="Center"   ><STRONG><?=$menssagem;?></STRONG></div>
</div>
</td></tr></table>
</body>

<div style="Z-INDEX: 34; LEFT: 290px; WIDTH: 544px; POSITION: absolute; TOP: 165px; HEIGHT: 80px">
<table border='0'>
         
         <form method="POST" action="javascript:window.close()">
         <td><input type=image name="vontar" src="../imagens/botaoazul25.PNG"/></td>
         </form>

</table>
</div>
</html>
<?
}else{
	
include("enaaurlnp.php");
	
}

// Resgata Sessao
session_start();

unset ($_SESSION['Edit1']);
unset ($_SESSION['Edit2']);

?>