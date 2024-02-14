<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Insert Cadastro Socios
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

require("menu.php");

$log_ssoc = $nome3;
$hora = date("d/m/Y"); 
$sexo = " ";
$campo1 = 'Incluido';
$campo2 = 0;

$cami2 = 'imagens/fotos/Branco.bmp'; 

?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>

<?

session_start();
$proc_add = strtoupper($_SESSION['Procura']);

// Resgata Sessao
session_name("Val_Socio");
session_start();

$Edit1 		= strtoupper($_SESSION['cod']);
$Edit2 		= strtoupper($_SESSION['nu']);
$Edit3 		= strtoupper($_SESSION['rgassoc']);
$Edit4 		= strtoupper($_SESSION['cpf']);
$Edit5 		= strtoupper($_SESSION['datinsc']);
$Edit6 		= strtoupper($_SESSION['dat2']);
$Edit7 		= strtoupper($_SESSION['dat3']);
$Edit8 		= strtoupper($_SESSION['sede']);
$Edit9 		= strtoupper($_SESSION['categoria']);
$Edit10		= $proc_add;
$Edit11		= strtoupper($_SESSION['nomeassoc']);
$Edit12		= strtoupper($_SESSION['rua']);
$Edit13		= strtoupper($_SESSION['endresid']);
$Edit14		= strtoupper($_SESSION['numero']);
$Edit15		= Trim(strtoupper($_SESSION['bairrores']));
$Edit16		= strtoupper($_SESSION['cepres']);
$Edit17		= strtoupper($_SESSION['cidaderes']);
$Edit18		= strtoupper($_SESSION['estadores']);
$Edit19		= strtoupper($_SESSION['telefone']);
$Edit20		= strtoupper($_SESSION['carttrab']);
$Edit21		= strtoupper($_SESSION['serie']);
$Edit22		= strtoupper($_SESSION['emiscart']);
$Edit23		= strtoupper($_SESSION['cargoassoc']);
$Edit24		= strtoupper($_SESSION['datadimis']);
$Edit25		= strtoupper($_SESSION['estcivil']);
$Edit26		= strtoupper($_SESSION['numdep']);
$Edit27		= strtoupper($_SESSION['mes']);
$Edit28		= strtoupper($_SESSION['ano']);
$Edit29		= strtoupper($_SESSION['cad_si']);
$Edit30		= strtoupper($_SESSION['saldo']);
$Edit31		= strtoupper($_SESSION['prest']);
$Edit32		= strtoupper($_SESSION['pago']);
$Edit33		= strtoupper($_SESSION['natural']);
$Edit34		= strtoupper($_SESSION['datnasc']);
$Edit35		= strtoupper($_SESSION['nascion']);
$Edit36		= strtoupper($_SESSION['pai']);
$Edit37		= strtoupper($_SESSION['mae']);
$Edit38		= strtoupper($_SESSION['conjuge']);
$Edit39		= strtoupper($_SESSION['datconj']);
$Edit40		= strtoupper($_SESSION['filho01']);
$Edit41		= strtoupper($_SESSION['dat01']);
$Edit42		= strtoupper($_SESSION['sexo01']);
$Edit43		= strtoupper($_SESSION['filho02']);
$Edit44		= strtoupper($_SESSION['dat02']);
$Edit45		= strtoupper($_SESSION['sexo02']);
$Edit46		= strtoupper($_SESSION['filho03']);
$Edit47		= strtoupper($_SESSION['dat03']);
$Edit48		= strtoupper($_SESSION['sexo03']);
$Edit49		= strtoupper($_SESSION['filho04']);
$Edit50		= strtoupper($_SESSION['dat04']);
$Edit51		= strtoupper($_SESSION['sexo04']);
$Edit52		= strtoupper($_SESSION['filho05']);
$Edit53		= strtoupper($_SESSION['dat05']);
$Edit54		= strtoupper($_SESSION['sexo05']);
$Edit55		= strtoupper($_SESSION['filho06']);
$Edit56		= strtoupper($_SESSION['dat06']);
$Edit57		= strtoupper($_SESSION['sexo06']);
$Edit58		= strtoupper($_SESSION['filho07']);
$Edit59		= strtoupper($_SESSION['dat07']);
$Edit60		= strtoupper($_SESSION['sexo07']);
$Edit61		= strtoupper($_SESSION['filho08']);
$Edit62		= strtoupper($_SESSION['dat08']);
$Edit63		= strtoupper($_SESSION['sexo08']);
$Edit64		= strtoupper($_SESSION['filho09']);
$Edit65		= strtoupper($_SESSION['dat09']);
$Edit66		= strtoupper($_SESSION['sexo09']);
$Edit67		= strtoupper($_SESSION['filho10']);
$Edit68		= strtoupper($_SESSION['dat10']);
$Edit69		= strtoupper($_SESSION['sexo10']);
$Edit70		= strtoupper($_SESSION['obs']);

$cod        = ($Edit1);
$nu         = strtoupper($Edit2);
$rgassoc    = strtoupper($Edit3);
$cpf        = strtoupper($Edit4);
$datinsc    = strtoupper($Edit5);      
$dat2       = strtoupper($Edit6);      
$dat3       = strtoupper($Edit7);      
$sede       = strtoupper($Edit8);       
$categoria  = strtoupper($Edit9);  
$codedif    = ($Edit10);    
$nomeassoc  = strtoupper($Edit11);
$rua        = strtoupper($Edit12);        
$endresid   = strtoupper($Edit13);
$numero     = strtoupper($Edit14);     
$bairrores  = strtoupper($Edit15);     
$cepres     = strtoupper($Edit16);        
$cidaderes  = strtoupper($Edit17);     
$estadores  = strtoupper($Edit18);         
$telefone   = strtoupper($Edit19);       
$carttrab   = strtoupper($Edit20);       
$serie      = strtoupper($Edit21);      
$emiscart   = strtoupper($Edit22);    
$cargoassoc = strtoupper($Edit23);     
$datadimis  = strtoupper($Edit24);   
$estcivil   = strtoupper($Edit25);      
$numdep     = ($Edit26); 
$mes        = ($Edit27);        
$ano        = ($Edit28);        
$cad_si     = strtoupper($Edit29);   
$saldo      = ($Edit30);      
$prest      = ($Edit31);  
$pago       = ($Edit32);       
$natural    = strtoupper($Edit33);    
$datnasc    = strtoupper($Edit34); 
$nascion    = strtoupper($Edit35);  
$pai        = strtoupper($Edit36);        
$mae        = strtoupper($Edit37);        
$conjuge    = strtoupper($Edit38);   
$datconj    = strtoupper($Edit39);    
$filho01    = strtoupper($Edit40);     
$dat01      = strtoupper($Edit41);     
$sexo01     = strtoupper($Edit42);     
$filho02    = strtoupper($Edit43);     
$dat02      = strtoupper($Edit44);     
$sexo02     = strtoupper($Edit45);     
$filho03    = strtoupper($Edit46);     
$dat03      = strtoupper($Edit47);     
$sexo03     = strtoupper($Edit48);     
$filho04    = strtoupper($Edit49);     
$dat04      = strtoupper($Edit50);     
$sexo04     = strtoupper($Edit51);     
$filho05    = strtoupper($Edit52);     
$dat05      = strtoupper($Edit53);     
$sexo05     = strtoupper($Edit54);     
$filho06    = strtoupper($Edit55);     
$dat06      = strtoupper($Edit56);     
$sexo06     = strtoupper($Edit57);     
$filho07    = strtoupper($Edit58);     
$dat07      = strtoupper($Edit59);     
$sexo07     = strtoupper($Edit60);     
$filho08    = strtoupper($Edit61);     
$dat08      = strtoupper($Edit62);     
$sexo08     = strtoupper($Edit63);     
$filho09    = strtoupper($Edit64);     
$dat09      = strtoupper($Edit65);     
$sexo09     = strtoupper($Edit66);     
$filho10    = strtoupper($Edit67);    
$dat10      = strtoupper($Edit68);     
$sexo10     = strtoupper($Edit69);     
$obs        = strtoupper($Edit70);   
     
$menssagens = "* * * Incluido * * *";

if(strlen($codedif)<=0){
  $codedif = 0;
}
if(strlen($numdep)<=0){
  $numdep = 0;	
}
if(strlen($mes)<=0){
  $mes   = 0; 	
}
if(strlen($ano)<=0){
  $ano   = 0; 	
}
if(strlen($saldo)<=0){
  $saldo = 0.00; 	
}
if(strlen($prest)<=0){
  $prest = 0; 	
}
if(strlen($pago)<=0){
  $pago  = 0.00; 	
}

$Cod_p = Trim($cod.$nu);


Switch ($Edit2){

	Case 'A':
             $sede = "SETE DE ABRIL";
        break;

	Case 'B':
             $sede = "SANTO AMARO";
        break;

	Case 'C':
             $sede = "SANTANA";
        break;

	Case 'D':
             $sede = "TATUAPE";
        break;
        
}

// Abre Conexão com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
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

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


$consulta00  = "SELECT * FROM socios WHERE CODP = '$Cod_p'";

$resultado00 = @mysql_query($consulta00);

// Incrementa novo codigo

$row00 = mysql_fetch_array($resultado00);

$id       = @$row00["id"];
$cod_2    = @$row00["COD"];

if (!empty($id)){
   $cod   = $cod_2+1;
   $Cod_p = $cod+$nu;
}

$texto_cpf = $cpf;
$eliminar1 = str_replace("-"," ",$texto_cpf);
$eliminar2 = str_replace("."," ",$eliminar1);
$valor_cp = str_replace(" ","",$eliminar2);


// retorna uma pesquisa

$consulta = "INSERT INTO socios (   COD,
									NU,
									CODP,
									RGASSOC,
									CPF,
									DATINSC,
									DAT2,
									DAT3,
									SEDE,
									CATEGORIA,
									CODEDIF,
									NOMEASSOC,
									RUA,
									ENDRESID,
									NUMERO,
									BAIRRORES,
									CEPRES,
									CIDADERES,
									ESTADORES,
									TELEFONE,
									CARTTRAB,
									SERIE,
									EMISCART,
									CARGOASSOC,
									DATADIMIS,
									ESTCIVIL,
									NUMDEP,
									MES,
									ANO,
									CAD_SI,
									SALDO,
									PREST,
									PAGO,
									DATNASC,
									NATURAL1,
									NASCION,
									PAI,
									MAE,
									CONJUGE,
									DATCONJ,
									FILHO01,
									DAT01,
									SEXO01,
									FILHO02,
									DAT02,
									SEXO02,
									FILHO03,
									DAT03,
									SEXO03,
									FILHO04,
									DAT04,
									SEXO04,
									FILHO05,
									DAT05,
									SEXO05,
									FILHO06,
									DAT06,
									SEXO06,
									FILHO07,
									DAT07,
									SEXO07,
									FILHO08,
									DAT08,
									SEXO08,
									FILHO09,
									DAT09,
									SEXO09,
									FILHO10,
									DAT10,
									SEXO10,
									OBS)
 
 
VALUES ('$cod',
		'$nu',
		'$Cod_p',
		'$rgassoc',
		'$valor_cp',
		'$datinsc',
		'$dat2',      
		'$dat3',      
		'$sede',
		'$categoria',
		'$codedif',    
		'$nomeassoc',
		'$rua',        
		'$endresid',
		'$numero',
		'$bairrores',     
		'$cepres',        
		'$cidaderes',     
		'$estadores',         
		'$telefone',
		'$carttrab',       
		'$serie',      
		'$emiscart',    
		'$cargoassoc',     
		'$datadimis',   
		'$estcivil',      
		'$numdep', 
		'$mes',        
		'$ano',
		'$cad_si',
		'$saldo',
		'$prest',
		'$pago',
		'$datnasc',
		'$natural',
		'$nascion',  
		'$pai',        
		'$mae',
		'$conjuge',   
		'$datconj',    
		'$filho01',     
		'$dat01',     
		'$sexo01',     
		'$filho02',     
		'$dat02',     
		'$sexo02',     
		'$filho03',     
		'$dat03',     
		'$sexo03',     
		'$filho04',     
		'$dat04',     
		'$sexo04',     
		'$filho05',     
		'$dat05',     
		'$sexo05',     
		'$filho06',     
		'$dat06',     
		'$sexo06',     
		'$filho07',     
		'$dat07',     
		'$sexo07',     
		'$filho08',     
		'$dat08',     
		'$sexo08',     
		'$filho09',     
		'$dat09',     
		'$sexo09',     
		'$filho10',    
		'$dat10',     
		'$sexo10',     
		'$obs')";

@mysql_query($consulta, $link) or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Inclusão !!! ***</b>
     <table align=center>
     <form method='POST' action='cadsocios.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");
     
     
// Abrir Table de Edificios

$consulta4  = "SELECT * FROM edificios Where COD = '$Edit10'";

$resultado4 = @mysql_query($consulta4);

$row4 = @mysql_fetch_array($resultado4);

$cod_edif   = @$row4["COD"];
$cond  = trim(@$row4["COND"].@$row4["NOME"]);
$edif  = trim(@$row4["NOME"]);

$nome_do_edif = $cond;

// Abre Tabela Categoria

$consulta5  = "SELECT * FROM categ Where CODIGO = '$Edit9'";

$resultado5 = @mysql_query($consulta5);

$row5 = @mysql_fetch_array($resultado5);

$categ_1   = @$row5["DESCRICAO"];
     

     
			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagens."/".$Cod_p;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);
     
     
?>

<html>

<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style>

</HEAD>
<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0>
<div align=center>

<html >

<body  style=" margin-left: 0px;  margin-top: 21px;  margin-right: 0px;  margin-bottom: 0px; ">

<script>

if (!document.layers)

document.write('<div id="fixacam" style="position:absolute; background:#ffffff; bordercolordark:#4682B4; width:100px; height:25px; font:10pt Tahoma; color:#666666" align="Right">'  )

</script>

<layer id="fixacam"> 

	<a rel="home" class="home" href="cadsocios.php?cod_1=<?=$Edit1;?><?=$Edit2;?>">
	<img alt="Proposta" src="imagens/botao_voltar.PNG" border="0"></a>
	
 
</layer>


<script type="text/javascript">
var posvertical="rodape"
if (!document.layers)
document.write('</div>')
function menufloat(){
var startX = 3,
startY = 550;
var ns = (navigator.appName.indexOf("Netscape") != -1);
var d = document;
function ml(id){
var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
if(d.layers)el.style=el;
el.sP=function(x,y){this.style.left=x;this.style.top=y;};
el.x = startX;
if (posvertical=="rodape")
el.y = startY;
else{
el.y = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
el.y -= startY;
}
return el;
}
window.stayTopLeft=function(){
if (posvertical=="topo"){
var pY = ns ? pageYOffset : document.body.scrollTop;
ftlObj.y += (pY + startY - ftlObj.y)/8;
}
else{
var pY = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
ftlObj.y += (pY - startY - ftlObj.y)/8;
}
ftlObj.sP(ftlObj.x, ftlObj.y);
setTimeout("stayTopLeft()", 10);
}
ftlObj = ml("fixacam");
stayTopLeft();
}
menufloat();
</script>

<?
require("funcoes2.php");
?>

<br>
<br>

<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="post"  action="soclayout.php">
<table  width="794"   style="height:188px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 91px; WIDTH: 819px; POSITION: absolute; TOP: 45px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 787 - 16, 884 - 16);
  Shape1_Canvas.fillRect(16, 16, 787 - 16 + 1, 884 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("#5A9CB1");
  Shape1_Canvas.drawRect(16, 16, 787 - 16 + 1, 884 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 124px; WIDTH: 752px; POSITION: absolute; TOP: 79px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 750 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 750 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("#5A9CB1");
  Shape2_Canvas.drawRect(1, 1, 750 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 135px; WIDTH: 283px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: #5A9CB1; background-color: #FFFFFF;height:32px;width:283px;"   ><strong>Cadastro de&nbsp;Socios</strong></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 613px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><strong><?=$menssagens;?> </strong></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 124px; WIDTH: 752px; POSITION: absolute; TOP: 136px; HEIGHT: 792px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 750 - 1, 790 - 1);
  Shape3_Canvas.fillRect(1, 1, 750 - 1 + 1, 790 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("#5A9CB1");
  Shape3_Canvas.drawRect(1, 1, 750 - 1 + 1, 790 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 131px; WIDTH: 64px; POSITION: absolute; TOP: 155px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><strong>Codigo</strong></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 225px; WIDTH: 56px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:56px;"  disabled  tabindex="0"    />
</div>
<div id="Edit2_outer" style="Z-INDEX: 7; LEFT: 283px; WIDTH: 33px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:33px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 8; LEFT: 384px; WIDTH: 32px; POSITION: absolute; TOP: 155px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:32px;"   ><strong>RG:.</strong></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 9; LEFT: 417px; WIDTH: 137px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 10; LEFT: 592px; WIDTH: 47px; POSITION: absolute; TOP: 155px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:47px;"   ><strong>CPF:.</strong></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 11; LEFT: 634px; WIDTH: 137px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:137px;"  disabled  tabindex="0"    />
</div>
<div id="Label5_outer" style="Z-INDEX: 12; LEFT: 131px; WIDTH: 96px; POSITION: absolute; TOP: 179px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:96px;"   ><strong>Data Insc.:</strong></div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 13; LEFT: 225px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:91px;"  disabled  tabindex="0"    />
</div>
<div id="Label6_outer" style="Z-INDEX: 14; LEFT: 320px; WIDTH: 96px; POSITION: absolute; TOP: 179px; HEIGHT: 26px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:96px;"   ><strong>Data Saida.:</strong></div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 15; LEFT: 417px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:91px;"  disabled  tabindex="0"    />
</div>
<div id="Label7_outer" style="Z-INDEX: 16; LEFT: 515px; WIDTH: 128px; POSITION: absolute; TOP: 179px; HEIGHT: 26px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:128px;"   ><strong>Data Retorno.:</strong></div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 17; LEFT: 634px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:91px;"  disabled  tabindex="0"    />
</div>

<div id="Image1_outer" style="Z-INDEX: 18; LEFT: 749px; WIDTH: 112px; POSITION: absolute; TOP: 179px; HEIGHT: 146px">
<div id="Image1_container" style=" width: 112;  height: 146; overflow: hidden;" ><img id="Image1" src="<?=$cami2;?>"  width="107"  height="137"  border="1"  style=" border-color: #000000 "       /></div>
</div>

<div id="Label8_outer" style="Z-INDEX: 19; LEFT: 131px; WIDTH: 96px; POSITION: absolute; TOP: 203px; HEIGHT: 26px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:96px;"   ><strong>Sede.:</strong></div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 20; LEFT: 225px; WIDTH: 159px; POSITION: absolute; TOP: 199px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:159px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label9_outer" style="Z-INDEX: 21; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 228px; HEIGHT: 26px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Categoria.:</strong>&nbsp;</div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 22; LEFT: 225px; WIDTH: 28px; POSITION: absolute; TOP: 223px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:28px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label10_outer" style="Z-INDEX: 23; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 252px; HEIGHT: 26px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Cod. Edif.:</strong>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 24; LEFT: 225px; WIDTH: 55px; POSITION: absolute; TOP: 247px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:55px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 25; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 276px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Nome.:</strong>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 26; LEFT: 225px; WIDTH: 423px; POSITION: absolute; TOP: 271px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:423px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 27; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 300px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Endereço.:</strong>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 28; LEFT: 225px; WIDTH: 127px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:127px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Edit13_outer" style="Z-INDEX: 29; LEFT: 352px; WIDTH: 385px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:385px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 30; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 324px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Numero.:</strong>&nbsp;</div>
</div>
<div id="Edit14_outer" style="Z-INDEX: 31; LEFT: 225px; WIDTH: 127px; POSITION: absolute; TOP: 319px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:127px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label14_outer" style="Z-INDEX: 32; LEFT: 351px; WIDTH: 62px; POSITION: absolute; TOP: 324px; HEIGHT: 26px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:62px;"   ><strong>Bairro.:</strong>&nbsp;</div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 33; LEFT: 416px; WIDTH: 216px; POSITION: absolute; TOP: 319px; HEIGHT: 26px">
<input type="text" id="Edit15" name="Edit15" value="<?=$Edit15;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:216px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 34; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 348px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Cep.:</strong>&nbsp;</div>
</div>
<div id="Edit16_outer" style="Z-INDEX: 35; LEFT: 225px; WIDTH: 83px; POSITION: absolute; TOP: 343px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?=$Edit16;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:83px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 36; LEFT: 351px; WIDTH: 70px; POSITION: absolute; TOP: 348px; HEIGHT: 26px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:70px;"   ><strong>Cidade.:</strong>&nbsp;</div>
</div>
<div id="Edit17_outer" style="Z-INDEX: 37; LEFT: 416px; WIDTH: 216px; POSITION: absolute; TOP: 343px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?=$Edit17;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:216px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label17_outer" style="Z-INDEX: 38; LEFT: 634px; WIDTH: 70px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:70px;"   ><strong>Estado.:</strong>&nbsp;</div>
</div>
<div id="Edit18_outer" style="Z-INDEX: 39; LEFT: 699px; WIDTH: 36px; POSITION: absolute; TOP: 342px; HEIGHT: 26px">
<input type="text" id="Edit18" name="Edit18" value="<?=$Edit18;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:36px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label18_outer" style="Z-INDEX: 40; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 372px; HEIGHT: 26px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Fone.:</strong>&nbsp;</div>
</div>
<div id="Edit19_outer" style="Z-INDEX: 41; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 367px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?=$Edit19;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label19_outer" style="Z-INDEX: 42; LEFT: 363px; WIDTH: 55px; POSITION: absolute; TOP: 372px; HEIGHT: 21px">
<div id="Label19" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:55px;"   ><strong>CTPS.:</strong>&nbsp;</div>
</div>
<div id="Edit20_outer" style="Z-INDEX: 43; LEFT: 416px; WIDTH: 116px; POSITION: absolute; TOP: 367px; HEIGHT: 26px">
<input type="text" id="Edit20" name="Edit20" value="<?=$Edit20;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:116px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label20_outer" style="Z-INDEX: 44; LEFT: 583px; WIDTH: 55px; POSITION: absolute; TOP: 372px; HEIGHT: 21px">
<div id="Label20" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:55px;"   ><strong>Serie.:</strong>&nbsp;</div>
</div>
<div id="Edit21_outer" style="Z-INDEX: 45; LEFT: 634px; WIDTH: 102px; POSITION: absolute; TOP: 367px; HEIGHT: 26px">
<input type="text" id="Edit21" name="Edit21" value="<?=$Edit21;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:102px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label21_outer" style="Z-INDEX: 46; LEFT: 741px; WIDTH: 70px; POSITION: absolute; TOP: 371px; HEIGHT: 26px">
<div id="Label21" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:70px;"   ><strong>Emissor.:</strong>&nbsp;</div>
</div>
<div id="Edit22_outer" style="Z-INDEX: 47; LEFT: 815px; WIDTH: 42px; POSITION: absolute; TOP: 366px; HEIGHT: 26px">
<input type="text" id="Edit22" name="Edit22" value="<?=$Edit22;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:42px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label22_outer" style="Z-INDEX: 48; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 396px; HEIGHT: 26px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Função.:</strong>&nbsp;</div>
</div>
<div id="Edit23_outer" style="Z-INDEX: 49; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 391px; HEIGHT: 26px">
<input type="text" id="Edit23" name="Edit23" value="<?=$Edit23;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label23_outer" style="Z-INDEX: 50; LEFT: 347px; WIDTH: 75px; POSITION: absolute; TOP: 396px; HEIGHT: 21px">
<div id="Label23" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><strong>Dt.Adm.:</strong>&nbsp;</div>
</div>
<div id="Edit24_outer" style="Z-INDEX: 51; LEFT: 416px; WIDTH: 91px; POSITION: absolute; TOP: 391px; HEIGHT: 26px">
<input type="text" id="Edit24" name="Edit24" value="<?=$Edit24;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Edit25_outer" style="Z-INDEX: 52; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit25" name="Edit25" value="<?=$Edit25;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px; background-color: #FFFFFF"  disabled  tabindex="0"    />
</div>
<div id="Label24_outer" style="Z-INDEX: 53; LEFT: 349px; WIDTH: 69px; POSITION: absolute; TOP: 420px; HEIGHT: 21px">
<div id="Label24" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:69px;"   ><strong>Nº.Dep.:</strong>&nbsp;</div>
</div>
<div id="Edit26_outer" style="Z-INDEX: 54; LEFT: 416px; WIDTH: 34px; POSITION: absolute; TOP: 415px; HEIGHT: 26px">
<input type="text" id="Edit26" name="Edit26" value="<?=$Edit26;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px; background-color: #FFFFFF"  disabled   tabindex="0"    />
</div>
<div id="Label25_outer" style="Z-INDEX: 55; LEFT: 459px; WIDTH: 179px; POSITION: absolute; TOP: 419px; HEIGHT: 21px">
<div id="Label25" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:179px;"   ><strong>Mês/Ano Pagamento.:</strong>&nbsp;</div>
</div>
<div id="Edit27_outer" style="Z-INDEX: 56; LEFT: 634px; WIDTH: 34px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit27" name="Edit27" value="<?=$Edit27;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px; background-color: #FFFFFF"  disabled   tabindex="0"    />
</div>
<div id="Edit28_outer" style="Z-INDEX: 57; LEFT: 668px; WIDTH: 62px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit28" name="Edit28" value="<?=$Edit28;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:62px; background-color: #FFFFFF"  disabled   tabindex="0"    />
</div>
<div id="Label26_outer" style="Z-INDEX: 58; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 420px; HEIGHT: 26px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Est.Civil.:</strong>&nbsp;</div>
</div>
<div id="Label27_outer" style="Z-INDEX: 59; LEFT: 128px; WIDTH: 182px; POSITION: absolute; TOP: 445px; HEIGHT: 22px">
<div id="Label27" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:182px;"   ><strong>Situação do Cadastro.:</strong>&nbsp;</div>
</div>
<div id="Edit29_outer" style="Z-INDEX: 60; LEFT: 313px; WIDTH: 29px; POSITION: absolute; TOP: 441px; HEIGHT: 26px">
<input type="text" id="Edit29" name="Edit29" value="<?=$Edit29;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:29px; background-color: #FFFFFF"  disabled   tabindex="0"    />
</div>
<div id="Label28_outer" style="Z-INDEX: 61; LEFT: 128px; WIDTH: 75px; POSITION: absolute; TOP: 469px; HEIGHT: 22px">
<div id="Label28" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:75px;"   ><strong>Saldo.:</strong>&nbsp;</div>
</div>
<div id="Edit30_outer" style="Z-INDEX: 62; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 466px; HEIGHT: 26px">
<input type="text" id="Edit30" name="Edit30" value="<?=$Edit30;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px; background-color: #FFFFFF"  disabled   tabindex="0"    />
</div>
<div id="Label29_outer" style="Z-INDEX: 63; LEFT: 384px; WIDTH: 35px; POSITION: absolute; TOP: 469px; HEIGHT: 22px">
<div id="Label29" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:35px;"   ><strong>de.:</strong>&nbsp;</div>
</div>
<div id="Edit31_outer" style="Z-INDEX: 64; LEFT: 416px; WIDTH: 34px; POSITION: absolute; TOP: 466px; HEIGHT: 26px">
<input type="text" id="Edit31" name="Edit31" value="<?=$Edit31;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px; background-color: #FFFFFF"  disabled     tabindex="0"    />
</div>
<div id="Label30_outer" style="Z-INDEX: 65; LEFT: 543px; WIDTH: 92px; POSITION: absolute; TOP: 470px; HEIGHT: 23px">
<div id="Label30" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:92px;"   ><strong>x / Pagos.:</strong>&nbsp;</div>
</div>
<div id="Edit32_outer" style="Z-INDEX: 66; LEFT: 634px; WIDTH: 92px; POSITION: absolute; TOP: 463px; HEIGHT: 28px">
<input type="text" id="Edit32" name="Edit32" value="<?=$Edit32;?>" style=" font-family: Verdana; font-size: 14px;  height:27px;width:92px; background-color: #FFFFFF"  disabled      tabindex="0"    />
</div>
<div id="Label31_outer" style="Z-INDEX: 67; LEFT: 128px; WIDTH: 99px; POSITION: absolute; TOP: 494px; HEIGHT: 22px">
<div id="Label31" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:99px;"   ><strong>Natural de.:</strong>&nbsp;</div>
</div>
<div id="Edit33_outer" style="Z-INDEX: 68; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 491px; HEIGHT: 26px">
<input type="text" id="Edit33" name="Edit33" value="<?=$Edit33;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px; background-color: #FFFFFF"  disabled      tabindex="0"    />
</div>
<div id="Label32_outer" style="Z-INDEX: 69; LEFT: 347px; WIDTH: 75px; POSITION: absolute; TOP: 496px; HEIGHT: 21px">
<div id="Label32" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><strong>Dt.Nasc.:</strong>&nbsp;</div>
</div>
<div id="Edit34_outer" style="Z-INDEX: 70; LEFT: 416px; WIDTH: 91px; POSITION: absolute; TOP: 491px; HEIGHT: 26px">
<input type="text" id="Edit34" name="Edit34" value="<?=$Edit34;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF"  disabled    tabindex="0"    />
</div>
<div id="Label33_outer" style="Z-INDEX: 71; LEFT: 509px; WIDTH: 127px; POSITION: absolute; TOP: 497px; HEIGHT: 23px">
<div id="Label33" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:127px;"   ><strong>Nascionalidade.:</strong>&nbsp;</div>
</div>
<div id="Edit35_outer" style="Z-INDEX: 72; LEFT: 634px; WIDTH: 179px; POSITION: absolute; TOP: 490px; HEIGHT: 28px">
<input type="text" id="Edit35" name="Edit35" value="<?=$Edit35;?>" style=" font-family: Verdana; font-size: 14px;  height:27px;width:179px; background-color: #FFFFFF"  disabled   tabindex="0"    />
</div>
<div id="Label34_outer" style="Z-INDEX: 73; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 521px; HEIGHT: 26px">
<div id="Label34" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Pai.:</strong>&nbsp;</div>
</div>
<div id="Edit36_outer" style="Z-INDEX: 74; LEFT: 225px; WIDTH: 409px; POSITION: absolute; TOP: 516px; HEIGHT: 27px">
<input type="text" id="Edit36" name="Edit36" value="<?=$Edit36;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:409px; background-color: #FFFFFF"  disabled   tabindex="0"    />
</div>
<div id="Label35_outer" style="Z-INDEX: 75; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 546px; HEIGHT: 26px">
<div id="Label35" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Mãe.:</strong>&nbsp;</div>
</div>
<div id="Edit37_outer" style="Z-INDEX: 76; LEFT: 225px; WIDTH: 409px; POSITION: absolute; TOP: 541px; HEIGHT: 26px">
<input type="text" id="Edit37" name="Edit37" value="<?=$Edit37;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:409px; background-color: #FFFFFF"  disabled   tabindex="0"    />
</div>
<div id="Label36_outer" style="Z-INDEX: 77; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 571px; HEIGHT: 26px">
<div id="Label36" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Conjugue.:</strong>&nbsp;</div>
</div>
<div id="Edit38_outer" style="Z-INDEX: 78; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 566px; HEIGHT: 26px">
<input type="text" id="Edit38" name="Edit38" value="<?=$Edit38;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF"  disabled   tabindex="0"    />
</div>
<div id="Label37_outer" style="Z-INDEX: 79; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 574px; HEIGHT: 21px">
<div id="Label37" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><strong>Dt.Nasc.:</strong>&nbsp;</div>
</div>
<div id="Edit39_outer" style="Z-INDEX: 80; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 566px; HEIGHT: 26px">
<input type="text" id="Edit39" name="Edit39" value="<?=$Edit39;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF"  disabled    tabindex="0"    />
</div>
<div id="Label38_outer" style="Z-INDEX: 81; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 599px; HEIGHT: 26px">
<div id="Label38" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>1º Filho.:</strong>&nbsp;</div>
</div>
<div id="Edit40_outer" style="Z-INDEX: 82; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 591px; HEIGHT: 26px">
<input type="text" id="Edit40" name="Edit40" value="<?=$Edit40;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF"  disabled    tabindex="0"    />
</div>
<div id="Label39_outer" style="Z-INDEX: 83; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 600px; HEIGHT: 21px">
<div id="Label39" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><strong>Dt.Nasc.:</strong>&nbsp;</div>
</div>
<div id="Edit41_outer" style="Z-INDEX: 84; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 591px; HEIGHT: 26px">
<input type="text" id="Edit41" name="Edit41" value="<?=$Edit41;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF"  disabled    tabindex="0"    />
</div>
<div id="Label40_outer" style="Z-INDEX: 85; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 599px; HEIGHT: 21px">
<div id="Label40" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:52px;"   ><strong>Sexo.:</strong>&nbsp;</div>
</div>
<div id="Edit42_outer" style="Z-INDEX: 86; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 591px; HEIGHT: 26px">
<input type="text" id="Edit42" name="Edit42" value="<?=$Edit42;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:41px;"  disabled  tabindex="0"    />
</div>
<div id="Label41_outer" style="Z-INDEX: 87; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 624px; HEIGHT: 26px">
<div id="Label41" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>2º Filho.:</strong>&nbsp;</div>
</div>
<div id="Edit43_outer" style="Z-INDEX: 88; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 616px; HEIGHT: 26px">
<input type="text" id="Edit43" name="Edit43" value="<?=$Edit43;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF"  disabled    tabindex="0"    />
</div>
<div id="Label42_outer" style="Z-INDEX: 89; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 625px; HEIGHT: 21px">
<div id="Label42" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><strong>Dt.Nasc.:</strong>&nbsp;</div>
</div>
<div id="Edit44_outer" style="Z-INDEX: 90; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 616px; HEIGHT: 26px">
<input type="text" id="Edit44" name="Edit44" value="<?=$Edit44;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF"  disabled    tabindex="0"    />
</div>
<div id="Label43_outer" style="Z-INDEX: 91; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 625px; HEIGHT: 21px">
<div id="Label43" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:52px;"   ><strong>Sexo.:</strong>&nbsp;</div>
</div>
<div id="Edit45_outer" style="Z-INDEX: 92; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 616px; HEIGHT: 26px">
<input type="text" id="Edit45" name="Edit45" value="<?=$Edit45;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:41px;" disabled   tabindex="0"    />
</div>
<div id="Image3_outer" style="Z-INDEX: 93; LEFT: 702px; WIDTH: 112px; POSITION: absolute; TOP: 526px; HEIGHT: 24px">
<div id="Image3_container" style=" width: 112;  overflow: hidden;" ><A HREF="<?=$path;?>ts2.php" target="new"  ><img id="Image3" src="imagens/botaoazul21.PNG"  border="0"       /></a></div>
</div>
<div id="Image2_outer" style="Z-INDEX: 94; LEFT: 761px; WIDTH: 85px; POSITION: absolute; TOP: 331px; HEIGHT: 28px">
<div id="Image2_container" style=" width: 112;  height: 28; overflow: hidden;" ><a href="javascript:Download();"><img id="Image2" src="imagens/botaoazul17.PNG"  border="0"       /></A></div>
</div>
<div id="Label44_outer" style="Z-INDEX: 95; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 674px; HEIGHT: 24px">
<div id="Label44" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><strong>4º Filho.:</strong>&nbsp;</div>
</div>
<div id="Label45_outer" style="Z-INDEX: 96; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 674px; HEIGHT: 19px">
<div id="Label45" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><strong>Dt.Nasc.:</strong>&nbsp;</div>
</div>
<div id="Label46_outer" style="Z-INDEX: 97; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 673px; HEIGHT: 19px">
<div id="Label46" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><strong>Sexo.:</strong>&nbsp;</div>
</div>
<div id="Label47_outer" style="Z-INDEX: 98; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 649px; HEIGHT: 24px">
<div id="Label47" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><strong>3º Filho.:</strong>&nbsp;</div>
</div>
<div id="Label48_outer" style="Z-INDEX: 99; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 650px; HEIGHT: 19px">
<div id="Label48" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><strong>Dt.Nasc.:</strong>&nbsp;</div>
</div>
<div id="Label49_outer" style="Z-INDEX: 100; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 650px; HEIGHT: 19px">
<div id="Label49" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><strong>Sexo.:</strong>&nbsp;</div>
</div>
<div id="Label50_outer" style="Z-INDEX: 101; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 774px; HEIGHT: 24px">
<div id="Label50" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><strong>8º Filho.:</strong>&nbsp;</div>
</div>
<div id="Label51_outer" style="Z-INDEX: 102; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 772px; HEIGHT: 19px">
<div id="Label51" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><strong>Dt.Nasc.:</strong>&nbsp;</div>
</div>
<div id="Label52_outer" style="Z-INDEX: 103; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 772px; HEIGHT: 19px">
<div id="Label52" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><strong>Sexo.:</strong>&nbsp;</div>
</div>
<div id="Label53_outer" style="Z-INDEX: 104; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 749px; HEIGHT: 24px">
<div id="Label53" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><strong>7º Filho.:</strong>&nbsp;</div>
</div>
<div id="Label54_outer" style="Z-INDEX: 105; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 747px; HEIGHT: 19px">
<div id="Label54" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><strong>Dt.Nasc.:</strong>&nbsp;</div>
</div>
<div id="Label55_outer" style="Z-INDEX: 106; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 747px; HEIGHT: 19px">
<div id="Label55" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><strong>Sexo.:</strong>&nbsp;</div>
</div>
<div id="Label56_outer" style="Z-INDEX: 107; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 724px; HEIGHT: 24px">
<div id="Label56" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><strong>6º Filho.:</strong>&nbsp;</div>
</div>
<div id="Label57_outer" style="Z-INDEX: 108; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 723px; HEIGHT: 19px">
<div id="Label57" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><strong>Sexo.:</strong>&nbsp;</div>
</div>
<div id="Label58_outer" style="Z-INDEX: 109; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 698px; HEIGHT: 19px">
<div id="Label58" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><strong>Sexo.:</strong>&nbsp;</div>
</div>
<div id="Label59_outer" style="Z-INDEX: 110; LEFT: 564px; WIDTH: 70px; POSITION: absolute; TOP: 698px; HEIGHT: 19px">
<div id="Label59" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:70px;"   ><strong>Dt.Nasc.:</strong>&nbsp;</div>
</div>
<div id="Label60_outer" style="Z-INDEX: 111; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 698px; HEIGHT: 24px">
<div id="Label60" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><strong>5º Filho.:</strong>&nbsp;</div>
</div>
<div id="Label61_outer" style="Z-INDEX: 112; LEFT: 564px; WIDTH: 68px; POSITION: absolute; TOP: 722px; HEIGHT: 19px">
<div id="Label61" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:68px;"   ><strong>Dt.Nasc.:</strong>&nbsp;</div>
</div>
<div id="Label62_outer" style="Z-INDEX: 113; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 797px; HEIGHT: 24px">
<div id="Label62" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><strong>9º Filho.:</strong>&nbsp;</div>
</div>
<div id="Label63_outer" style="Z-INDEX: 114; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 821px; HEIGHT: 24px">
<div id="Label63" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:89px;"   ><strong>10º Filho.:</strong>&nbsp;</div>
</div>
<div id="Label64_outer" style="Z-INDEX: 115; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 796px; HEIGHT: 19px">
<div id="Label64" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><strong>Dt.Nasc.:</strong>&nbsp;</div>
</div>
<div id="Label65_outer" style="Z-INDEX: 116; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 821px; HEIGHT: 19px">
<div id="Label65" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:75px;"   ><strong>Dt.Nasc.:</strong>&nbsp;</div>
</div>
<div id="Label66_outer" style="Z-INDEX: 117; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 798px; HEIGHT: 19px">
<div id="Label66" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><strong>Sexo.:</strong>&nbsp;</div>
</div>
<div id="Label67_outer" style="Z-INDEX: 118; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 822px; HEIGHT: 19px">
<div id="Label67" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:19px;width:52px;"   ><strong>Sexo.:</strong>&nbsp;</div>
</div>
<div id="Label68_outer" style="Z-INDEX: 119; LEFT: 127px; WIDTH: 103px; POSITION: absolute; TOP: 843px; HEIGHT: 24px">
<div id="Label68" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:24px;width:103px;"   ><strong>Observação:</strong></div>
</div>
<div id="Memo1_outer" style="Z-INDEX: 120; LEFT: 225px; WIDTH: 501px; POSITION: absolute; TOP: 842px; HEIGHT: 78px">
<textarea id="Memo1" name="Memo1" style=" font-family: Verdana; font-size: 14px;  height:77px;width:501px; background-color: #FFFFFF;" disabled   tabindex="0"    wrap="virtual"><?=$Edit70;?></textarea>
</div>
<div id="Label69_outer" style="Z-INDEX: 121; LEFT: 774px; WIDTH: 77px; POSITION: absolute; TOP: 156px; HEIGHT: 20px">
<div id="Label69" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:20px;width:77px;"   ><A HREF="http://www.receita.fazenda.gov.br/Aplicacoes/ATCTA/cpf/ConsultaPublica.asp"  ><font color='#0000FF'><u>Clique Aqui</u></A></div>
</div>
<div id="Label70_outer" style="Z-INDEX: 122; LEFT: 314px; WIDTH: 31px; POSITION: absolute; TOP: 349px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:31px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep"  ><font color='#0000FF'><u>Cep</u></A></div>
</div>
<div id="Label72_outer" style="Z-INDEX: 123; LEFT: 283px; WIDTH: 462px; POSITION: absolute; TOP: 249px; HEIGHT: 20px">
<div id="Label72" style=" font-family: Verdana; font-size: 14px; color: #0000FF;font-weight: normal; height:20px;width:462px;"   ><strong><?=$nome_do_edif;?></strong>&nbsp;</div>
</div>
<div id="Label73_outer" style="Z-INDEX: 124; LEFT: 257px; WIDTH: 462px; POSITION: absolute; TOP: 227px; HEIGHT: 20px">
<div id="Label73" style=" font-family: Verdana; font-size: 14px; color: #0000FF;font-weight: normal; height:20px;width:462px;"   ><strong><?=$categ_1;?></strong>&nbsp;</div>
</div>
<div id="Label74_outer" style="Z-INDEX: 125; LEFT: 345px; WIDTH: 511px; POSITION: absolute; TOP: 445px; HEIGHT: 20px">
<div id="Label74" style=" font-family: Verdana; font-size: 14px; color: #0000FF;font-weight: normal; height:20px;width:511px;"   ><strong><?=$nome_cad_si;?></strong>&nbsp;</div>
</div>
<div id="Edit46_outer" style="Z-INDEX: 126; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 641px; HEIGHT: 26px">
<input type="text" id="Edit46" name="Edit46" value="<?=$Edit46;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Edit47_outer" style="Z-INDEX: 127; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 641px; HEIGHT: 26px">
<input type="text" id="Edit47" name="Edit47" value="<?=$Edit47;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;"  disabled  tabindex="0"    />
</div>
<div id="Edit48_outer" style="Z-INDEX: 128; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 641px; HEIGHT: 26px">
<input type="text" id="Edit48" name="Edit48" value="<?=$Edit48;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:41px;"  disabled  tabindex="0"    />
</div>
<div id="Edit49_outer" style="Z-INDEX: 129; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 666px; HEIGHT: 26px">
<input type="text" id="Edit49" name="Edit49" value="<?=$Edit49;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;"  disabled  tabindex="0"    />
</div>
<div id="Edit50_outer" style="Z-INDEX: 130; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 666px; HEIGHT: 26px">
<input type="text" id="Edit50" name="Edit50" value="<?=$Edit50;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Edit51_outer" style="Z-INDEX: 131; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 666px; HEIGHT: 26px">
<input type="text" id="Edit51" name="Edit51" value="<?=$Edit51;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:41px;"  disabled  tabindex="0"    />
</div>
<div id="Edit52_outer" style="Z-INDEX: 132; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 691px; HEIGHT: 26px">
<input type="text" id="Edit52" name="Edit52" value="<?=$Edit52;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;"  disabled  tabindex="0"    />
</div>
<div id="Edit53_outer" style="Z-INDEX: 133; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 691px; HEIGHT: 26px">
<input type="text" id="Edit53" name="Edit53" value="<?=$Edit53;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Edit54_outer" style="Z-INDEX: 134; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 691px; HEIGHT: 26px">
<input type="text" id="Edit54" name="Edit54" value="<?=$Edit54;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:41px;"  disabled  tabindex="0"    />
</div>
<div id="Edit55_outer" style="Z-INDEX: 135; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 716px; HEIGHT: 26px">
<input type="text" id="Edit55" name="Edit55" value="<?=$Edit55;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;"  disabled  tabindex="0"    />
</div>
<div id="Edit56_outer" style="Z-INDEX: 136; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 716px; HEIGHT: 26px">
<input type="text" id="Edit56" name="Edit56" value="<?=$Edit56;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Edit57_outer" style="Z-INDEX: 137; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 716px; HEIGHT: 26px">
<input type="text" id="Edit57" name="Edit57" value="<?=$Edit57;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:41px;" disabled   tabindex="0"    />
</div>
<div id="Edit58_outer" style="Z-INDEX: 138; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 741px; HEIGHT: 26px">
<input type="text" id="Edit58" name="Edit58" value="<?=$Edit58;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Edit59_outer" style="Z-INDEX: 139; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 741px; HEIGHT: 26px">
<input type="text" id="Edit59" name="Edit59" value="<?=$Edit59;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Edit60_outer" style="Z-INDEX: 140; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 741px; HEIGHT: 26px">
<input type="text" id="Edit60" name="Edit60" value="<?=$Edit60;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:41px;" disabled   tabindex="0"    />
</div>
<div id="Edit61_outer" style="Z-INDEX: 141; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 766px; HEIGHT: 26px">
<input type="text" id="Edit61" name="Edit61" value="<?=$Edit61;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Edit62_outer" style="Z-INDEX: 142; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 766px; HEIGHT: 26px">
<input type="text" id="Edit62" name="Edit62" value="<?=$Edit62;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Edit63_outer" style="Z-INDEX: 143; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 766px; HEIGHT: 26px">
<input type="text" id="Edit63" name="Edit63" value="<?=$Edit63;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:41px;"  disabled  tabindex="0"    />
</div>
<div id="Edit64_outer" style="Z-INDEX: 144; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 791px; HEIGHT: 26px">
<input type="text" id="Edit64" name="Edit64" value="<?=$Edit64;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Edit65_outer" style="Z-INDEX: 145; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 791px; HEIGHT: 26px">
<input type="text" id="Edit65" name="Edit65" value="<?=$Edit65;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Edit66_outer" style="Z-INDEX: 146; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 791px; HEIGHT: 26px">
<input type="text" id="Edit66" name="Edit66" value="<?=$Edit66;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:41px;" disabled   tabindex="0"    />
</div>
<div id="Edit67_outer" style="Z-INDEX: 147; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 816px; HEIGHT: 26px">
<input type="text" id="Edit67" name="Edit67" value="<?=$Edit67;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Edit68_outer" style="Z-INDEX: 148; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 816px; HEIGHT: 26px">
<input type="text" id="Edit68" name="Edit68" value="<?=$Edit68;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px; background-color: #FFFFFF;" disabled   tabindex="0"    />
</div>
<div id="Edit69_outer" style="Z-INDEX: 149; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 816px; HEIGHT: 26px">
<input type="text" id="Edit69" name="Edit69" value="<?=$Edit69;?>" style=" font-family: Verdana; font-size: 14px;  background-color: #FFFFFF;height:25px;width:41px;"  disabled  tabindex="0"    />
</div>
</td></tr></table>
</form>
</html>

<script>
<!--
function Download()
{
	window.location = "captura.exe";     
}
//-->
</script>