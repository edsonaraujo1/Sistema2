<?php
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

// include("../logar.php");
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
$Edit8		= trim(strtoupper(retirar_carac(@$row0["Edit8"])));
$Edit9		= trim(strtoupper(retirar_carac(@$row0["Edit9"])));
$Edit10	    = trim(strtoupper(retirar_carac(@$row0["Edit10"])));
$Edit11	    = trim(strtoupper(retirar_carac(@$row0["Edit11"])));
$Edit12	    = trim(strtoupper(retirar_carac(@$row0["Edit12"])));
$Edit13	    = trim(strtoupper(retirar_carac(@$row0["Edit13"])));
$Edit14	    = trim(strtoupper(retirar_carac(@$row0["Edit14"])));
$Edit15	    = trim(strtoupper(retirar_carac(@$row0["Edit15"])));
$Edit16	    = trim(strtoupper(retirar_carac(@$row0["Edit16"])));
$Edit17	    = trim(strtoupper(retirar_carac(@$row0["Edit17"])));
$Edit18	    = trim(strtoupper(retirar_carac(@$row0["Edit18"])));
$Edit19	    = trim(strtoupper(retirar_carac(@$row0["Edit19"])));
$Edit20	    = trim(strtoupper(retirar_carac(@$row0["Edit20"])));
$Edit21	    = trim(strtoupper(retirar_carac(@$row0["Edit21"])));
$Edit22	    = trim(strtoupper(retirar_carac(@$row0["Edit22"])));
$Edit23	    = trim(strtoupper(retirar_carac(@$row0["Edit23"])));
$Edit24	    = trim(strtoupper(retirar_carac(@$row0["Edit24"])));
$Edit25	    = trim(strtoupper(retirar_carac(@$row0["Edit25"])));
$Edit26	    = trim(strtoupper(retirar_carac(@$row0["Edit26"])));
$Edit27	    = trim(strtoupper(retirar_carac(@$row0["Edit27"])));
$Edit28	    = trim(strtoupper(retirar_carac(@$row0["Edit28"])));
$Edit29	    = trim(strtoupper(retirar_carac(@$row0["Edit29"])));
$alerta_1   = trim(strtoupper(retirar_carac(@$row0["mensage1"])));
$nome_adm   = trim(strtoupper(retirar_carac(@$row0["mensage3"])));

if(strlen($Edit1)<=0){
  $Edit1   = 0; 	
}
if(strlen($Edit10)<=0){
  $Edit10   = 0; 	
}
if(strlen($Edit16)<=0){
  $Edit16   = 0; 	
}
if(strlen($Edit18)<=0){
  $Edit18   = 0; 	
}
if(strlen($Edit19)<=0){
  $Edit19   = 0; 	
}
if(strlen($Edit25)<=0){
  $Edit25   = 0; 	
}

$NOV_ZERO = 0;


if ($Edit1  == '.'){	$Edit1  = 0;}
if ($Edit2  == '.'){	$Edit2  = '';}
if ($Edit3  == '.'){	$Edit3  = '';}
if ($Edit4  == '.'){	$Edit4  = '';}
if ($Edit5  == '.'){	$Edit5  = '';}
if ($Edit6  == '.'){	$Edit6  = '';}
if ($Edit7  == '.'){	$Edit7  = '';}
if ($Edit8  == '.'){	$Edit8  = '';}
if ($Edit9  == '.'){	$Edit9  = '';}
if ($Edit10 == '.'){	$Edit10 = 0;}
if ($Edit11 == '.'){	$Edit11 = '';}
if ($Edit12 == '.'){	$Edit12 = '';}
if ($Edit13 == '.'){	$Edit13 = '';}
if ($Edit14 == '.'){	$Edit14 = '';}
if ($Edit15 == '.'){	$Edit15 = '';}
if ($Edit16 == '.'){	$Edit16 = 0;}
if ($Edit17 == '.'){	$Edit17 = '';}
if ($Edit18 == '.'){	$Edit18 = 0;}
if ($Edit19 == '.'){	$Edit19 = 0;}
if ($Edit20 == '.'){	$Edit20 = '';}
if ($Edit21 == '.'){	$Edit21 = '';}
if ($Edit22 == '.'){	$Edit22 = '';}
if ($Edit23 == '.'){	$Edit23 = '';}
if ($Edit24 == '.'){	$Edit24 = '';}
if ($Edit25 == '.'){	$Edit25 = 0;}
if ($Edit26 == '.'){	$Edit26 = '';}
if ($Edit27 == '.'){	$Edit27 = '';}
if ($Edit28 == '.'){	$Edit28 = '';}
if ($Edit29 == '.'){	$Edit29 = '';}
if ($Edit30 == '.'){	$Edit30 = '';}

$consulta0  = "SELECT * FROM acompa WHERE PROC_N LIKE '$Edit17' AND RG LIKE '$Edit2'";

$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$id    = @$row0["id"];
$cod_2 = @$row0["RG"];
$data  = date("d/m/Y");

if (!empty($cod_2)){

/*	
	echo ("
			
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Acompanhamento ja Cadastrado !!! ***</b>
		     <table align=center>
		     <form method='POST' action='cadastro.php?cod_1=$id'>
		     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
             exit;
*/

}

$consulta01  = "SELECT * FROM acompa ORDER BY id DESC LIMIT 0,1";

$resultado01 = @mysql_query($consulta01);

$row01 = @mysql_fetch_array($resultado01);

$id_01    = @$row01["id"];

$nov_id_01 = $id_01 + 1;

/* 
echo $Edit1."<br>";
echo $Edit2."<br>";
echo $Edit3."<br>";
echo $Edit4."<br>";
echo $Edit5."<br>";
echo $Edit6."<br>";
echo $Edit7."<br>";
echo $Edit8."<br>";
echo $Edit9."<br>";
echo $Edit10."<br>";
echo $Edit11."<br>";
echo $Edit12."<br>";
echo $Edit13."<br>";
echo $Edit14."<br>";
echo $Edit15."<br>";
echo $Edit16."<br>";
echo $Edit17."<br>";
echo $Edit18."<br>";
echo $Edit19."<br>";
echo $Edit20."<br>";
echo $Edit21."<br>";
echo $Edit22."<br>";
echo $Edit23."<br>";
echo $Edit24."<br>";
echo $Edit25."<br>";
echo $Edit26."<br>";
echo $Edit27."<br>";
echo $Edit28."<br>";
echo $Edit29."<br>";
echo $Edit30."<br>";
echo $NOV_ZERO;
*/

$consulta = "INSERT INTO acompa    (N_SOCIO,
                                    RG,
								    CIC,
								    CART_TRAB,
								    NOME_SOC,
								    END_SOC,
								    CEP_SOC,
								    EST_SOC,
									FONE_SOC,
									N_EDIF,
									NOME_EDI,
									END_EDI,
									CEP_EDI,
									FONE_EDI,
									OBJETO,
									JCJ,
									PROC_N,
									ANO_N,
									N_ADV_1,
									TRT,
									EM_TRT,
									NO_AD_1,
									TST,
									EM_TST,
									N_ADV_2,
									SOLUCAO,
									SOL_EM,
									NO_AD_2,
									ASSUNTO,
									COD_MOV,
									DATA)
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
									'$Edit16',
									'$Edit17',
									'$Edit18',
									'$Edit19',
									'$Edit20',
									'$Edit21',
									'$Edit22',
									'$Edit23',
									'$Edit24',
									'$Edit25',
									'$Edit26',
									'$Edit27',
									'$Edit28',
									'$Edit29',
									'$NOV_ZERO',
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
			$even_log = "ACOMPANHAMENTO ".$menssagens."/".$Edit1;
			
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

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="/acompanhalayout.php">
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 541px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 509 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 509 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?php echo $color_bor ?>");
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
  Shape2_Canvas.setColor("<?php echo $color_bor ?>");
  Shape2_Canvas.drawRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 449px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 22px; color: <?php echo $color_bor ?>; background-color: #FFFFFF;height:32px;width:449px;"   ><STRONG>Cadastro de&nbsp;Acompanhamento</STRONG></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?php echo $menssagens ?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 419px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 417 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 417 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?php echo $color_bor ?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 417 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 144px; HEIGHT: 24px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   > <STRONG>No Socio.:</STRONG> </div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 77px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:77px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 359px; WIDTH: 57px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:57px;"   > <STRONG>R.G.:</STRONG> </div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 400px; WIDTH: 163px; POSITION: absolute; TOP: 139px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:163px; background-color: #FFFFFF;" disabled   tabindex="2"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 597px; WIDTH: 51px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:51px;"   ><STRONG>CPF.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 640px; WIDTH: 182px; POSITION: absolute; TOP: 139px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:182px; background-color: #FFFFFF;"  disabled   tabindex="3"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 25; LEFT: 181px; WIDTH: 91px; POSITION: absolute; TOP: 170px; HEIGHT: 24px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   > <STRONG>CTPS.:</STRONG> </div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 26; LEFT: 278px; WIDTH: 122px; POSITION: absolute; TOP: 166px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?php echo $Edit4 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:122px; background-color: #FFFFFF;"  disabled   tabindex="1"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 27; LEFT: 405px; WIDTH: 67px; POSITION: absolute; TOP: 169px; HEIGHT: 18px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:67px;"   ><STRONG>Nome.:</STRONG></div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 28; LEFT: 462px; WIDTH: 360px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?php echo $Edit5 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:360px; background-color: #FFFFFF;"  disabled   tabindex="3"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 29; LEFT: 184px; WIDTH: 104px; POSITION: absolute; TOP: 196px; HEIGHT: 18px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:104px;"   ><STRONG>Endereco.:</STRONG></div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 30; LEFT: 278px; WIDTH: 370px; POSITION: absolute; TOP: 192px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?php echo $Edit6 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:370px; background-color: #FFFFFF;"  disabled   tabindex="3"    />
</div>
<div id="Label8_outer" style="Z-INDEX: 31; LEFT: 661px; WIDTH: 51px; POSITION: absolute; TOP: 196px; HEIGHT: 24px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:51px;"   > <STRONG>CEP.:</STRONG> </div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 32; LEFT: 706px; WIDTH: 117px; POSITION: absolute; TOP: 192px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?php echo $Edit7 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 33; LEFT: 184px; WIDTH: 88px; POSITION: absolute; TOP: 223px; HEIGHT: 18px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:88px;"   > <STRONG>Estado.:</STRONG> </div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 34; LEFT: 278px; WIDTH: 182px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?php echo $Edit8 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:182px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label10_outer" style="Z-INDEX: 35; LEFT: 472px; WIDTH: 56px; POSITION: absolute; TOP: 223px; HEIGHT: 18px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:56px;"   > <STRONG>Fone:</STRONG> </div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 36; LEFT: 520px; WIDTH: 303px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?php echo $Edit9 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:303px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 37; LEFT: 182px; WIDTH: 91px; POSITION: absolute; TOP: 248px; HEIGHT: 24px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   > <STRONG>No Edif.:</STRONG> </div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 38; LEFT: 278px; WIDTH: 77px; POSITION: absolute; TOP: 244px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?php echo $Edit10 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:77px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 39; LEFT: 359px; WIDTH: 57px; POSITION: absolute; TOP: 248px; HEIGHT: 18px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:57px;"   > <STRONG>Nome.:</STRONG> </div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 40; LEFT: 416px; WIDTH: 407px; POSITION: absolute; TOP: 244px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?php echo $Edit11 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:407px; background-color: #FFFFFF;" disabled   tabindex="2"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 41; LEFT: 184px; WIDTH: 104px; POSITION: absolute; TOP: 274px; HEIGHT: 18px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:104px;"   ><STRONG>Endereco.:</STRONG></div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 42; LEFT: 278px; WIDTH: 370px; POSITION: absolute; TOP: 270px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?php echo $Edit12 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:370px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label14_outer" style="Z-INDEX: 43; LEFT: 661px; WIDTH: 51px; POSITION: absolute; TOP: 274px; HEIGHT: 24px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:51px;"   > <STRONG>CEP.:</STRONG> </div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 44; LEFT: 706px; WIDTH: 117px; POSITION: absolute; TOP: 270px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?php echo $Edit13 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 45; LEFT: 184px; WIDTH: 102px; POSITION: absolute; TOP: 301px; HEIGHT: 18px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:102px;"   > <STRONG>Fone:</STRONG> </div>
</div>
<div id="Edit14_outer" style="Z-INDEX: 46; LEFT: 278px; WIDTH: 186px; POSITION: absolute; TOP: 296px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?php echo $Edit14 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:186px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 47; LEFT: 478px; WIDTH: 202px; POSITION: absolute; TOP: 301px; HEIGHT: 18px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:202px;"   > <STRONG>Objeto da Reclamacao.:</STRONG> </div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 48; LEFT: 672px; WIDTH: 152px; POSITION: absolute; TOP: 296px; HEIGHT: 26px">
<input type="text" id="Edit15" name="Edit15" value="<?php echo $Edit15 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:152px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Edit16_outer" style="Z-INDEX: 49; LEFT: 184px; WIDTH: 88px; POSITION: absolute; TOP: 322px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?php echo $Edit16 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:88px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label17_outer" style="Z-INDEX: 50; LEFT: 272px; WIDTH: 144px; POSITION: absolute; TOP: 325px; HEIGHT: 18px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:144px;"   > <STRONG>o J.C.J. - Proc. no</STRONG> </div>
</div>
<div id="Edit17_outer" style="Z-INDEX: 51; LEFT: 416px; WIDTH: 64px; POSITION: absolute; TOP: 322px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?php echo $Edit17 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:64px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label18_outer" style="Z-INDEX: 52; LEFT: 484px; WIDTH: 16px; POSITION: absolute; TOP: 325px; HEIGHT: 18px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:16px;"   > <STRONG>/</STRONG> </div>
</div>
<div id="Edit18_outer" style="Z-INDEX: 53; LEFT: 496px; WIDTH: 64px; POSITION: absolute; TOP: 322px; HEIGHT: 26px">
<input type="text" id="Edit18" name="Edit18" value="<?php echo $Edit18 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:64px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label19_outer" style="Z-INDEX: 54; LEFT: 566px; WIDTH: 153px; POSITION: absolute; TOP: 326px; HEIGHT: 24px">
<div id="Label19" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:153px;"   > <STRONG>No Advogado(a).:</STRONG> </div>
</div>
<div id="Edit19_outer" style="Z-INDEX: 55; LEFT: 707px; WIDTH: 117px; POSITION: absolute; TOP: 322px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?php echo $Edit19 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label20_outer" style="Z-INDEX: 56; LEFT: 182px; WIDTH: 91px; POSITION: absolute; TOP: 350px; HEIGHT: 24px">
<div id="Label20" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   > <STRONG>T.R.T. no</STRONG> </div>
</div>
<div id="Edit20_outer" style="Z-INDEX: 57; LEFT: 278px; WIDTH: 58px; POSITION: absolute; TOP: 346px; HEIGHT: 26px">
<input type="text" id="Edit20" name="Edit20" value="<?php echo $Edit20 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:58px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label21_outer" style="Z-INDEX: 58; LEFT: 338px; WIDTH: 58px; POSITION: absolute; TOP: 350px; HEIGHT: 24px">
<div id="Label21" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:58px;"   > <STRONG>- em</STRONG> </div>
</div>
<div id="Edit21_outer" style="Z-INDEX: 59; LEFT: 375px; WIDTH: 102px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<input type="text" id="Edit21" name="Edit21" value="<?php echo $Edit21 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:102px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label22_outer" style="Z-INDEX: 60; LEFT: 480px; WIDTH: 56px; POSITION: absolute; TOP: 352px; HEIGHT: 18px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:56px;"   > <STRONG>Nome.:</STRONG> </div>
</div>
<div id="Edit22_outer" style="Z-INDEX: 61; LEFT: 536px; WIDTH: 288px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<input type="text" id="Edit22" name="Edit22" value="<?php echo $Edit22 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:288px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label23_outer" style="Z-INDEX: 62; LEFT: 182px; WIDTH: 91px; POSITION: absolute; TOP: 375px; HEIGHT: 24px">
<div id="Label23" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   > <STRONG>T.R.T. no</STRONG> </div>
</div>
<div id="Edit23_outer" style="Z-INDEX: 63; LEFT: 278px; WIDTH: 58px; POSITION: absolute; TOP: 371px; HEIGHT: 26px">
<input type="text" id="Edit23" name="Edit23" value="<?php echo $Edit23 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:58px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label24_outer" style="Z-INDEX: 64; LEFT: 338px; WIDTH: 58px; POSITION: absolute; TOP: 375px; HEIGHT: 24px">
<div id="Label24" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:58px;"   > <STRONG>- em</STRONG> </div>
</div>
<div id="Edit24_outer" style="Z-INDEX: 65; LEFT: 375px; WIDTH: 102px; POSITION: absolute; TOP: 372px; HEIGHT: 26px">
<input type="text" id="Edit24" name="Edit24" value="<?php echo $Edit24 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:102px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label25_outer" style="Z-INDEX: 66; LEFT: 480px; WIDTH: 64px; POSITION: absolute; TOP: 377px; HEIGHT: 18px">
<div id="Label25" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:64px;"   > <STRONG>No Adv.</STRONG> </div>
</div>
<div id="Edit25_outer" style="Z-INDEX: 67; LEFT: 536px; WIDTH: 80px; POSITION: absolute; TOP: 372px; HEIGHT: 26px">
<input type="text" id="Edit25" name="Edit25" value="<?php echo $Edit25 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:80px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label26_outer" style="Z-INDEX: 68; LEFT: 182px; WIDTH: 91px; POSITION: absolute; TOP: 400px; HEIGHT: 24px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   > <STRONG>Situacao.:</STRONG> </div>
</div>
<div id="Edit26_outer" style="Z-INDEX: 69; LEFT: 278px; WIDTH: 58px; POSITION: absolute; TOP: 396px; HEIGHT: 26px">
<input type="text" id="Edit26" name="Edit26" value="<?php echo $Edit26 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:58px; background-color: #FFFFFF;" disabled   tabindex="1"    />
</div>
<div id="Label27_outer" style="Z-INDEX: 70; LEFT: 338px; WIDTH: 58px; POSITION: absolute; TOP: 400px; HEIGHT: 24px">
<div id="Label27" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:58px;"   > <STRONG>- em</STRONG> </div>
</div>
<div id="Edit27_outer" style="Z-INDEX: 71; LEFT: 375px; WIDTH: 102px; POSITION: absolute; TOP: 397px; HEIGHT: 26px">
<input type="text" id="Edit27" name="Edit27" value="<?php echo $Edit27 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:102px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label28_outer" style="Z-INDEX: 72; LEFT: 480px; WIDTH: 56px; POSITION: absolute; TOP: 402px; HEIGHT: 18px">
<div id="Label28" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:56px;"   > <STRONG>Nome.:</STRONG> </div>
</div>
<div id="Edit28_outer" style="Z-INDEX: 73; LEFT: 536px; WIDTH: 288px; POSITION: absolute; TOP: 397px; HEIGHT: 26px">
<input type="text" id="Edit28" name="Edit28" value="<?php echo $Edit28 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:288px; background-color: #FFFFFF;" disabled   tabindex="3"    />
</div>
<div id="Label29_outer" style="Z-INDEX: 74; LEFT: 182px; WIDTH: 91px; POSITION: absolute; TOP: 425px; HEIGHT: 24px">
<div id="Label29" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:91px;"   > <STRONG>Assunto.:</STRONG> </div>
</div>
<div id="Edit29_outer" style="Z-INDEX: 75; LEFT: 278px; WIDTH: 546px; POSITION: absolute; TOP: 422px; HEIGHT: 42px">
<textarea  id="Edit29" name="Edit29" style=" font-family: Verdana; font-size: 14px;  height:41px;width:546px; color: #696969; background-color: #FFFFFF;"" readonly   tabindex="1"  wrap="virtual" > <?php echo $Edit29 ?> </textarea>
</div>
</td></tr></table>
</form></body>


<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 490px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php?cod_1=<?php echo $nov_id_01 ?>">
          <td><input type=image name="Voltar" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>

<?php

}else{
	
include("enaaurlnp.php");
	
}
?>
