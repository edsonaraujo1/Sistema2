<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout Cadastro Socios Alterar
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

// Abre Conexão com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Resgata Sessao
session_name("Val_Socio");
session_start();

$Edit1 		= $_SESSION['cod'];
$Edit2 		= $_SESSION['nu'];
$Edit3	    = $_SESSION['rgassoc'];
$Edit4 		= $_SESSION['cpf'];
$Edit5 		= $_SESSION['datinsc'];
$Edit6 		= $_SESSION['dat2'];
$Edit7 		= $_SESSION['dat3'];
$Edit8 		= $_SESSION['sede'];
$Edit9 		= $_SESSION['categoria'];

// Resgata a Sessao
session_start();
$Edit10_up = $_SESSION['Procura_up'];

if (!empty($Edit10_up)){
	$Edit10 = $Edit10_up;
	$_SESSION['codedif_1'] = $Edit10_up;
	 
}else{
	$Edit10 = $_SESSION['codedif'];
}

unset ($_SESSION['Procura_up']);

$Edit11		= $_SESSION['nomeassoc'];
$Edit12		= $_SESSION['rua'];
$Edit13		= $_SESSION['endresid'];
$Edit14		= $_SESSION['numero'];
$Edit15		= $_SESSION['bairrores'];
$Edit16		= $_SESSION['cepres'];
$Edit17		= $_SESSION['cidaderes'];
$Edit18		= $_SESSION['estadores'];
$Edit19		= $_SESSION['telefone'];
$Edit20		= $_SESSION['carttrab'];
$Edit21		= $_SESSION['serie'];
$Edit22		= $_SESSION['emiscart'];
$Edit23		= $_SESSION['cargoassoc'];
$Edit24		= $_SESSION['datadimis'];
$Edit25		= $_SESSION['estcivil'];
$Edit26		= $_SESSION['numdep'];
$Edit27		= $_SESSION['mes'];
$Edit28		= $_SESSION['ano'];
$Edit29		= strtoupper($_SESSION['cad_si']);
$Edit30		= $_SESSION['saldo'];
$Edit31		= $_SESSION['prest'];
$Edit32		= $_SESSION['pago'];
$Edit33		= $_SESSION['natural'];
$Edit34		= $_SESSION['datnasc'];
$Edit35		= $_SESSION['nascion'];
$Edit36		= $_SESSION['pai'];
$Edit37		= $_SESSION['mae'];
$Edit38		= $_SESSION['conjuge'];
$Edit39		= $_SESSION['datconj'];
$Edit40		= $_SESSION['filho01'];
$Edit41		= $_SESSION['dat01'];
$Edit42		= $_SESSION['sexo01'];
$Edit43		= $_SESSION['filho02'];
$Edit44		= $_SESSION['dat02'];
$Edit45		= $_SESSION['sexo02'];
$Edit46		= $_SESSION['filho03'];
$Edit47		= $_SESSION['dat03'];
$Edit48		= $_SESSION['sexo03'];
$Edit49		= $_SESSION['filho04'];
$Edit50		= $_SESSION['dat04'];
$Edit51		= $_SESSION['sexo04'];
$Edit52		= $_SESSION['filho05'];
$Edit53		= $_SESSION['dat05'];
$Edit54		= $_SESSION['sexo05'];
$Edit55		= $_SESSION['filho06'];
$Edit56		= $_SESSION['dat06'];
$Edit57		= $_SESSION['sexo06'];
$Edit58		= $_SESSION['filho07'];
$Edit59		= $_SESSION['dat07'];
$Edit60		= $_SESSION['sexo07'];
$Edit61		= $_SESSION['filho08'];
$Edit62		= $_SESSION['dat08'];
$Edit63		= $_SESSION['sexo08'];
$Edit64		= $_SESSION['filho09'];
$Edit65		= $_SESSION['dat09'];
$Edit66		= $_SESSION['sexo09'];
$Edit67		= $_SESSION['filho10'];
$Edit68		= $_SESSION['dat10'];
$Edit69		= $_SESSION['sexo10'];
$Edit70		= $_SESSION['obs'];

$menssagens = "* * * alterar * * *";

$del_2 = $cam_foto;
$ext2  = '.bmp';
$cami2 = Trim($del_2.$Edit1.$Edit2.$ext2);

$cami2 = 'imagens/fotos/Branco.bmp'; 

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$soc1       = @$row3["soc1"];
$soc2       = @$row3["soc2"];
$soc3       = @$row3["soc3"];

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

// Abre Tabela Oposicao

$consulta6  = "SELECT * FROM oposicao3 Where RGASSOC = '$Edit3'";

$resultado6 = @mysql_query($consulta6);

$row6 = mysql_fetch_array($resultado6);

$cod_opo = @$row6["COD"];
$rg_opo  = @$row6["RGASSOC"];
$rg_cpf  = @$row6["CPF"];

if ($cod_opo != 0){
	?>	
		<script LANGUAGE='JavaScript'>
		<!--
		alert("Socio com carta de OPOSIÇÃO !!!");
		//-->
		</script>
	<?	
	
	}

// Abre Tabela Oposicao

$texto_cpf = $Edit4;
$eliminar1 = str_replace("-"," ",$texto_cpf);
$eliminar2 = str_replace("."," ",$eliminar1);
$valor_cp = str_replace(" ","",$eliminar2);

$consulta7  = "SELECT * FROM oposicao3 Where CPF = '$valor_cp'";

$resultado7 = @mysql_query($consulta7);

$row7 = mysql_fetch_array($resultado7);


$cod_opo = @$row7["COD"];
$rg_opo  = @$row7["RGASSOC"];
$cpf_opo = @$row7["CPF"];

if (strlen(trim($cpf_opo)) > 0){
	?>	
		<script LANGUAGE='JavaScript'>
		<!--
		alert("Candidato com carta de OPOSIÇÃO !!!");
		//-->
		</script>
	<?	
	
	}

/*
  ------------------------
  Função para Informar
  Situação do Cadastro
  ------------------------
*/  
  
Switch ($Edit29){

	Case 'E':
             $nome_cad_si = " ENDEREÇO DESATUALIZADO";
        break;

	Case 'C':
             $nome_cad_si = " CEP DESATUALIZADO";
        break;

	Case 'N':
             $nome_cad_si = " NOME NÃO CONFERE";
        break;

	Case 'R':
             $nome_cad_si = " RG DESATUALIZADO";
        break;
        
}


include ("funcoes2.php");

if (!empty($Edit1)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit2").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit2)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit3").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit3)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit4").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit4)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit6").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit6)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit7").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit7)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit8").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit8)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit9").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit9)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit10").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit10)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit11").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit11)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit12").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit12)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit13").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit13)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit14").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit14)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit15").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit15)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit16").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit16)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit17").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit17)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit18").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit18)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit19").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit19)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit20").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit20)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit21").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit21)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit22").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit22)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit23").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit23)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit24").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit24)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit25").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit25)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit26").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit26)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit29").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit29)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit30").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit30)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit31").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit31)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit32").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit32)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit33").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit33)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit34").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit34)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit35").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit35)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit36").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit36)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit37").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit37)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit38").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit38)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit39").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit39)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit40").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit40)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit41").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit41)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit42").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit42)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit43").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit43)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit44").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit44)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit45").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit45)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit46").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit46)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit47").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit47)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit48").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit48)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit49").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit49)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit50").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit50)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit51").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit51)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit52").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit52)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit53").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit53)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit54").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit54)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit55").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit55)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit56").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit56)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit57").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit57)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit58").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit58)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit59").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit59)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit60").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit60)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit61").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit61)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit62").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit62)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit63").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit63)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit64").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit64)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit65").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit65)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit66").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit66)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit67").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit67)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit68").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit68)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit69").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit69)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit70").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit70)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit3").focus();	
		}
		
		</script>
		<?
}
//if (!empty($Edit1)){
//        ?>	
        <script language="JavaScript">
//        function foco(){
//		document.getElementById("Edit3").focus();	
//		}
//		
		</script>
		<?
//}

?>

<script LANGUAGE="JavaScript">
<!-- Begin
nextfield = "Edit2";
netscape = "";
ver = navigator.appVersion; len = ver.length;
function keyDown(DnEvents) {
k = (netscape) ? DnEvents.which : window.event.keyCode;
if (k == 13) { 
if (nextfield == 'done') {
return false;
} else {
eval('document.form1.' + nextfield + '.focus()');
return false;}}}
document.onkeydown = keyDown; 
if (netscape) document.captureEvents(Event.KEYDOWN|Event.KEYUP);
// End -->
</script>


<html >

<body bgcolor="white" onload="foco();"  style=" margin-top: 54px;">

<script>

if (!document.layers)

document.write('<div id="fixacam" style="position:absolute; background:#ffffff; bordercolordark:#4682B4; width:100px; height:50px; font:10pt Tahoma; color:#666666" align="Right">'  )

</script>

<layers id="fixacam"> 


	<a rel="home" class="home" href="socupdate.php?Cod_P=<?=$Edit1;?><?=$Edit2;?>">
	<img alt="Proposta" src="imagens/botaoazul10.PNG" border="0"/></a>
	
	<a rel="home" class="home" href="cadsocios.php">
	<img alt="Carteira" src="imagens/botaoazul9.PNG" border="0"/></a>
	

 
</layers>

<script type="text/javascript">
var posvertical="rodape"
if (!document.layers)
document.write('</div>')
function menufloat(){
var startX = 3,
startY = 80;
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

<form style="margin-bottom: 0" id="form1" name="form1" method="post"  action="socupdate.php" onSubmit="return checa(this);">
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
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px;" readonly="readonly" tabindex="1" maxlength="11"  />
</div>
<div id="Edit2_outer" style="Z-INDEX: 7; LEFT: 283px; WIDTH: 33px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:33px;" readonly="readonly" onchange="Salva2u(this)"  onFocus="nextfield ='Edit3';" style="text-transform: uppercase;"   tabindex="2"  maxlength="1"  />
</div>
<div id="Label3_outer" style="Z-INDEX: 8; LEFT: 384px; WIDTH: 32px; POSITION: absolute; TOP: 155px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:32px;"   ><strong>RG:.</strong></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 9; LEFT: 417px; WIDTH: 137px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px;" onchange="Salva3u(this)"  onFocus="nextfield ='Edit4';"  tabindex="14" maxlength="14"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 10; LEFT: 592px; WIDTH: 47px; POSITION: absolute; TOP: 155px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:47px;"   ><strong>CPF:.</strong></div>
</div>
<div id="Edit4_outer" style="Z-INDEX: 11; LEFT: 634px; WIDTH: 137px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px;"   onkeypress="return txtBoxFormat(document.form1, 'Edit4', '999.999.999-99', event);"  onchange="validarCPFu(this)"  onFocus="nextfield ='Edit5';"  tabindex="4" maxlength="14"   />
</div>
<div id="Label5_outer" style="Z-INDEX: 12; LEFT: 131px; WIDTH: 96px; POSITION: absolute; TOP: 179px; HEIGHT: 26px">
<div id="Label5" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:96px;"   > <strong>Data Insc.:</strong> </div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 13; LEFT: 225px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"  readonly="readonly"  tabindex="5"  maxlength="10"  />
</div>
<div id="Label6_outer" style="Z-INDEX: 14; LEFT: 320px; WIDTH: 96px; POSITION: absolute; TOP: 179px; HEIGHT: 26px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:96px;"   > <strong>Data Saida.:</strong> </div>
</div>
<div id="Edit6_outer" style="Z-INDEX: 15; LEFT: 417px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"  onchange="Salva6u(this)"  onFocus="nextfield ='Edit7';" style="text-transform: uppercase;"  tabindex="6"  maxlength="10"  />
</div>
<div id="Label7_outer" style="Z-INDEX: 16; LEFT: 515px; WIDTH: 128px; POSITION: absolute; TOP: 179px; HEIGHT: 26px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:128px;"   > <strong>Data Retorno.:</strong> </div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 17; LEFT: 634px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"  onchange="Salva7u(this)"  onFocus="nextfield ='Edit8';" style="text-transform: uppercase;"  tabindex="7"  maxlength="10"  />
</div>
<div id="Image1_outer" style="Z-INDEX: 18; LEFT: 749px; WIDTH: 112px; POSITION: absolute; TOP: 179px; HEIGHT: 146px">
<div id="Image1_container" style=" width: 112;  height: 146; overflow: hidden;" ><img id="Image1" src='ver.php?new_fot=<?=$id;?>'  width="107"  height="137"  border="1"  style=" border-color: #000000 "       /></div>
</div>
<div id="Label8_outer" style="Z-INDEX: 19; LEFT: 131px; WIDTH: 96px; POSITION: absolute; TOP: 203px; HEIGHT: 26px">
<div id="Label8" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:96px;"   > <strong>Sede.:</strong> </div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 20; LEFT: 225px; WIDTH: 159px; POSITION: absolute; TOP: 201px; HEIGHT: 26px">
<select id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:159px;"  onchange="Salva8u(this)"  onFocus="nextfield ='Edit9';"    style="text-transform: uppercase;"  tabindex="8"  maxlength="20"  />

<?

if (!empty($Edit8))
{
?>	
	<option value="<?=$Edit8;?>"> <?=$Edit8;?> </option>
            <option value="SETE DE ABRIL">  SETE DE ABRIL </option>
            <option value="SANTO AMARO"> SANTO AMARO </option>
            <option value="SANTANA"> SANTANA </option>
            <option value="TATUAPE"> TATUAPE </option>
<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="SETE DE ABRIL">  SETE DE ABRIL </option>
            <option value="SANTO AMARO"> SANTO AMARO </option>
            <option value="SANTANA"> SANTANA </option>
            <option value="TATUAPE"> TATUAPE </option>
<?            
 }
?>

</select>



</div>
<div id="Label9_outer" style="Z-INDEX: 21; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 228px; HEIGHT: 26px">
<div id="Label9" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Categoria.:</strong>&nbsp;</div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 22; LEFT: 225px; WIDTH: 28px; POSITION: absolute; TOP: 223px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:28px;"  onchange="Salva9u(this)" onFocus="nextfield ='Edit10';" style="text-transform: uppercase;"  tabindex="9"  maxlength="1"  />
</div>
<div id="Label10_outer" style="Z-INDEX: 23; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 252px; HEIGHT: 26px">
<div id="Label10" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Cod. Edif.:</strong>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 24; LEFT: 225px; WIDTH: 55px; POSITION: absolute; TOP: 247px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:55px;"  onchange="Salva10u(this)"  onFocus="nextfield ='Edit11';" style="text-transform: uppercase;" tabindex="10" maxlength="11"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 25; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 276px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Nome.:</strong>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 26; LEFT: 225px; WIDTH: 423px; POSITION: absolute; TOP: 271px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:423px;"  onchange="Salva11u(this)"  onFocus="nextfield ='Edit12';" style="text-transform: uppercase;" tabindex="11"  maxlength="60"   />
</div>
<div id="Label12_outer" style="Z-INDEX: 27; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 300px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Endereço.:</strong>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 28; LEFT: 225px; WIDTH: 127px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:127px;"  onchange="Salva12u(this)"  onFocus="nextfield ='Edit13';" style="text-transform: uppercase;" tabindex="12"  maxlength="20"   />
</div>
<div id="Edit13_outer" style="Z-INDEX: 29; LEFT: 352px; WIDTH: 385px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:385px;"  onchange="Salva13u(this)"  onFocus="nextfield ='Edit14';" style="text-transform: uppercase;" tabindex="13"  maxlength="75"   />
</div>
<div id="Label13_outer" style="Z-INDEX: 30; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 324px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Numero.:</strong>&nbsp;</div>
</div>
<div id="Edit14_outer" style="Z-INDEX: 31; LEFT: 225px; WIDTH: 127px; POSITION: absolute; TOP: 319px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:127px;" onchange="Salva14u(this)"  onFocus="nextfield ='Edit15';" style="text-transform: uppercase;"  tabindex="14"  maxlength="40"   />
</div>
<div id="Label14_outer" style="Z-INDEX: 32; LEFT: 351px; WIDTH: 62px; POSITION: absolute; TOP: 324px; HEIGHT: 26px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:62px;"   ><strong>Bairro.:</strong>&nbsp;</div>
</div>
<div id="Edit15_outer" style="Z-INDEX: 33; LEFT: 416px; WIDTH: 216px; POSITION: absolute; TOP: 319px; HEIGHT: 26px">
<input type="text" id="Edit15" name="Edit15" value="<?=$Edit15;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:216px;"  onchange="Salva15u(this)"  onFocus="nextfield ='Edit16';" style="text-transform: uppercase;" tabindex="15"  maxlength="35"   />
</div>
<div id="Label15_outer" style="Z-INDEX: 34; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 348px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Cep.:</strong>&nbsp;</div>
</div>
<div id="Edit16_outer" style="Z-INDEX: 35; LEFT: 225px; WIDTH: 83px; POSITION: absolute; TOP: 343px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?=$Edit16;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:83px;"   onkeypress="return txtBoxFormat(document.form1, 'Edit16', '99999-999', event);"  onchange="Salva16u(this)"  onFocus="nextfield ='Edit17';" style="text-transform: uppercase;" tabindex="16"  maxlength="9"   />
</div>
<div id="Label16_outer" style="Z-INDEX: 36; LEFT: 351px; WIDTH: 70px; POSITION: absolute; TOP: 348px; HEIGHT: 26px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:70px;"   ><strong>Cidade.:</strong>&nbsp;</div>
</div>
<div id="Edit17_outer" style="Z-INDEX: 37; LEFT: 416px; WIDTH: 216px; POSITION: absolute; TOP: 343px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?=$Edit17;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:216px;"  onchange="Salva17u(this)"  onFocus="nextfield ='Edit18';" style="text-transform: uppercase;" tabindex="17"  maxlength="15"   />
</div>
<div id="Label17_outer" style="Z-INDEX: 38; LEFT: 634px; WIDTH: 70px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:70px;"   ><strong>Estado.:</strong>&nbsp;</div>
</div>
<div id="Edit18_outer" style="Z-INDEX: 39; LEFT: 699px; WIDTH: 36px; POSITION: absolute; TOP: 345px; HEIGHT: 26px">
<select type="text" id="Edit18" name="Edit18" value="<?=$Edit18;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:46px;"  onchange="Salva18u(this)"  onFocus="nextfield ='Edit19';" style="text-transform: uppercase;" tabindex="18"  maxlength="2"   />

<?

if (!empty($Edit18))
{
?>	
	<option value="<?=$Edit18;?>"> <?=$Edit18;?> </option>
            <option value="SP"> SP </option>
            <option value="AC"> AC </option>
            <option value="AL"> AL </option>
            <option value="AM"> AM </option>
            <option value="AP"> AP </option>
            <option value="BA"> BA </option>
            <option value="CE"> CE </option>
            <option value="DF"> DF </option>
            <option value="ES"> ES </option>
            <option value="GO"> GO </option>
            <option value="MA"> MA </option>
            <option value="MG"> MG </option>
            <option value="MS"> MS </option>
            <option value="MT"> MT </option>
            <option value="PA"> PA </option>
            <option value="PB"> PB </option>
            <option value="PE"> PE </option>
            <option value="PI"> PI </option>
            <option value="PR"> PR </option>
            <option value="RN"> RN </option>
            <option value="RO"> RO </option>
            <option value="RR"> RR </option>
            <option value="RJ"> RJ </option>
            <option value="RS"> RS </option>
            <option value="SC"> SC </option>
            <option value="SE"> SE </option>
            <option value="TO"> TO </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="SP"> SP </option>
            <option value="AC"> AC </option>
            <option value="AL"> AL </option>
            <option value="AM"> AM </option>
            <option value="AP"> AP </option>
            <option value="BA"> BA </option>
            <option value="CE"> CE </option>
            <option value="DF"> DF </option>
            <option value="ES"> ES </option>
            <option value="GO"> GO </option>
            <option value="MA"> MA </option>
            <option value="MG"> MG </option>
            <option value="MS"> MS </option>
            <option value="MT"> MT </option>
            <option value="PA"> PA </option>
            <option value="PB"> PB </option>
            <option value="PE"> PE </option>
            <option value="PI"> PI </option>
            <option value="PR"> PR </option>
            <option value="RN"> RN </option>
            <option value="RO"> RO </option>
            <option value="RR"> RR </option>
            <option value="RJ"> RJ </option>
            <option value="RS"> RS </option>
            <option value="SC"> SC </option>
            <option value="SE"> SE </option>
            <option value="TO"> TO </option>
<?            
 }
?>

</select>

</div>
<div id="Label18_outer" style="Z-INDEX: 40; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 372px; HEIGHT: 26px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Fone.:</strong>&nbsp;</div>
</div>
<div id="Edit19_outer" style="Z-INDEX: 41; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 367px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?=$Edit19;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;"  onchange="Salva19u(this)"  onFocus="nextfield ='Edit20';" style="text-transform: uppercase;" tabindex="19"  maxlength="25"   />
</div>
<div id="Label19_outer" style="Z-INDEX: 42; LEFT: 363px; WIDTH: 55px; POSITION: absolute; TOP: 372px; HEIGHT: 21px">
<div id="Label19" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:55px;"   ><strong>CTPS.:</strong>&nbsp;</div>
</div>
<div id="Edit20_outer" style="Z-INDEX: 43; LEFT: 416px; WIDTH: 116px; POSITION: absolute; TOP: 367px; HEIGHT: 26px">
<input type="text" id="Edit20" name="Edit20" value="<?=$Edit20;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:116px;"  onchange="Salva20u(this)"  onFocus="nextfield ='Edit21';" style="text-transform: uppercase;" tabindex="20"  maxlength="10"   />
</div>
<div id="Label20_outer" style="Z-INDEX: 44; LEFT: 583px; WIDTH: 55px; POSITION: absolute; TOP: 372px; HEIGHT: 21px">
<div id="Label20" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:55px;"   ><strong>Serie.:</strong>&nbsp;</div>
</div>
<div id="Edit21_outer" style="Z-INDEX: 45; LEFT: 634px; WIDTH: 102px; POSITION: absolute; TOP: 367px; HEIGHT: 26px">
<input type="text" id="Edit21" name="Edit21" value="<?=$Edit21;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:102px;"  onchange="Salva21u(this)"  onFocus="nextfield ='Edit22';" style="text-transform: uppercase;" tabindex="21"  maxlength="5"   />
</div>
<div id="Label21_outer" style="Z-INDEX: 46; LEFT: 741px; WIDTH: 70px; POSITION: absolute; TOP: 371px; HEIGHT: 26px">
<div id="Label21" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:70px;"   ><strong>Emissor.:</strong>&nbsp;</div>
</div>
<div id="Edit22_outer" style="Z-INDEX: 47; LEFT: 815px; WIDTH: 42px; POSITION: absolute; TOP: 369px; HEIGHT: 26px">
<select type="text" id="Edit22" name="Edit22" value="<?=$Edit22;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:45px;"  onchange="Salva22u(this)"  onFocus="nextfield ='Edit23';" style="text-transform: uppercase;" tabindex="22"  maxlength="2"   />

<?

if (!empty($Edit22))
{
?>	
	<option value="<?=$Edit22;?>"> <?=$Edit22;?> </option>
            <option value="SP"> SP </option>
            <option value="AC"> AC </option>
            <option value="AL"> AL </option>
            <option value="AM"> AM </option>
            <option value="AP"> AP </option>
            <option value="BA"> BA </option>
            <option value="CE"> CE </option>
            <option value="DF"> DF </option>
            <option value="ES"> ES </option>
            <option value="GO"> GO </option>
            <option value="MA"> MA </option>
            <option value="MG"> MG </option>
            <option value="MS"> MS </option>
            <option value="MT"> MT </option>
            <option value="PA"> PA </option>
            <option value="PB"> PB </option>
            <option value="PE"> PE </option>
            <option value="PI"> PI </option>
            <option value="PR"> PR </option>
            <option value="RN"> RN </option>
            <option value="RO"> RO </option>
            <option value="RR"> RR </option>
            <option value="RJ"> RJ </option>
            <option value="RS"> RS </option>
            <option value="SC"> SC </option>
            <option value="SE"> SE </option>
            <option value="TO"> TO </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="SP"> SP </option>
            <option value="AC"> AC </option>
            <option value="AL"> AL </option>
            <option value="AM"> AM </option>
            <option value="AP"> AP </option>
            <option value="BA"> BA </option>
            <option value="CE"> CE </option>
            <option value="DF"> DF </option>
            <option value="ES"> ES </option>
            <option value="GO"> GO </option>
            <option value="MA"> MA </option>
            <option value="MG"> MG </option>
            <option value="MS"> MS </option>
            <option value="MT"> MT </option>
            <option value="PA"> PA </option>
            <option value="PB"> PB </option>
            <option value="PE"> PE </option>
            <option value="PI"> PI </option>
            <option value="PR"> PR </option>
            <option value="RN"> RN </option>
            <option value="RO"> RO </option>
            <option value="RR"> RR </option>
            <option value="RJ"> RJ </option>
            <option value="RS"> RS </option>
            <option value="SC"> SC </option>
            <option value="SE"> SE </option>
            <option value="TO"> TO </option>
<?            
 }
?>

</select>

</div>
<div id="Label22_outer" style="Z-INDEX: 48; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 396px; HEIGHT: 26px">
<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Função.:</strong>&nbsp;</div>
</div>
<div id="Edit23_outer" style="Z-INDEX: 49; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 391px; HEIGHT: 26px">
<input type="text" id="Edit23" name="Edit23" value="<?=$Edit23;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;"  onchange="Salva23u(this)"  onFocus="nextfield ='Edit24';" style="text-transform: uppercase;" tabindex="23"  maxlength="15"   />
</div>
<div id="Label23_outer" style="Z-INDEX: 50; LEFT: 347px; WIDTH: 75px; POSITION: absolute; TOP: 396px; HEIGHT: 21px">
<div id="Label23" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><strong>Dt.Adm.:</strong>&nbsp;</div>
</div>
<div id="Edit24_outer" style="Z-INDEX: 51; LEFT: 416px; WIDTH: 91px; POSITION: absolute; TOP: 391px; HEIGHT: 26px">
<input type="text" id="Edit24" name="Edit24" value="<?=$Edit24;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"  onkeypress="return txtBoxFormat(document.form1, 'Edit24', '99/99/9999', event);"   onchange="Salva24u(this)"  onFocus="nextfield ='Edit25';" style="text-transform: uppercase;" tabindex="24"  maxlength="10"   />
</div>
<div id="Edit25_outer" style="Z-INDEX: 52; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit25" name="Edit25" value="<?=$Edit25;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;" onchange="Salva25u(this)"  onFocus="nextfield ='Edit26';" style="text-transform: uppercase;" tabindex="25"  maxlength="10"   />
</div>
<div id="Label24_outer" style="Z-INDEX: 53; LEFT: 349px; WIDTH: 69px; POSITION: absolute; TOP: 420px; HEIGHT: 21px">
<div id="Label24" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:69px;"   ><strong>Nº.Dep.:</strong>&nbsp;</div>
</div>
<div id="Edit26_outer" style="Z-INDEX: 54; LEFT: 416px; WIDTH: 34px; POSITION: absolute; TOP: 415px; HEIGHT: 26px">
<input type="text" id="Edit26" name="Edit26" value="<?=$Edit26;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px;"  onchange="Salva26u(this)"  onFocus="nextfield ='Edit29';" style="text-transform: uppercase;" tabindex="26"  maxlength="2"   />
</div>
<div id="Label25_outer" style="Z-INDEX: 55; LEFT: 459px; WIDTH: 179px; POSITION: absolute; TOP: 419px; HEIGHT: 21px">
<div id="Label25" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:179px;"   ><strong>Mês/Ano Pagamento.:</strong>&nbsp;</div>
</div>


<?

if ($soc2 == "SIM"){

?>

<div id="Edit27_outer" style="Z-INDEX: 56; LEFT: 634px; WIDTH: 34px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit27" name="Edit27" value="<?=$Edit27;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px;"  onchange="Salva27u(this)"  onFocus="nextfield ='Edit28';" style="text-transform: uppercase;" tabindex="27"  maxlength="2"   />
</div>
<div id="Edit28_outer" style="Z-INDEX: 57; LEFT: 668px; WIDTH: 62px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit28" name="Edit28" value="<?=$Edit28;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:62px;" onchange="Salva28u(this)"  onFocus="nextfield ='Edit29';" style="text-transform: uppercase;" tabindex="28"  maxlength="4"   />
</div>

<?
}else{
?>
	
<div id="Edit27_outer" style="Z-INDEX: 56; LEFT: 634px; WIDTH: 34px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit27" name="Edit27" value="<?=$Edit27;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px;"  readonly="readonly" onchange="Salva27u(this)"  onFocus="nextfield ='Edit28';" style="text-transform: uppercase;" tabindex="27"  maxlength="2"   />
</div>
<div id="Edit28_outer" style="Z-INDEX: 57; LEFT: 668px; WIDTH: 62px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit28" name="Edit28" value="<?=$Edit28;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:62px;" readonly="readonly" onchange="Salva28u(this)"  onFocus="nextfield ='Edit29';" style="text-transform: uppercase;" tabindex="28"  maxlength="4"   />
</div>
	
<?	
}
?>

<div id="Label26_outer" style="Z-INDEX: 58; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 420px; HEIGHT: 26px">
<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Est.Civil.:</strong>&nbsp;</div>
</div>
<div id="Label27_outer" style="Z-INDEX: 59; LEFT: 128px; WIDTH: 182px; POSITION: absolute; TOP: 445px; HEIGHT: 22px">
<div id="Label27" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:182px;"   ><strong>Situação do Cadastro.:</strong>&nbsp;</div>
</div>
<div id="Edit29_outer" style="Z-INDEX: 60; LEFT: 313px; WIDTH: 29px; POSITION: absolute; TOP: 441px; HEIGHT: 26px">
<input type="text" id="Edit29" name="Edit29" value="<?=$Edit29;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:29px;"  onchange="Salva29u(this)"  onFocus="nextfield ='Edit30';" style="text-transform: uppercase;" tabindex="29"  maxlength="1"   />
</div>
<div id="Label28_outer" style="Z-INDEX: 61; LEFT: 128px; WIDTH: 75px; POSITION: absolute; TOP: 469px; HEIGHT: 22px">
<div id="Label28" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:75px;"   ><strong>Saldo.:</strong>&nbsp;</div>
</div>
<div id="Edit30_outer" style="Z-INDEX: 62; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 466px; HEIGHT: 26px">
<input type="text" id="Edit30" name="Edit30" value="<?=$Edit30;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;"  onchange="Salva30u(this)"  onFocus="nextfield ='Edit31';" style="text-transform: uppercase;" tabindex="30"  maxlength="14"   />
</div>
<div id="Label29_outer" style="Z-INDEX: 63; LEFT: 384px; WIDTH: 35px; POSITION: absolute; TOP: 469px; HEIGHT: 22px">
<div id="Label29" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:35px;"   ><strong>de.:</strong>&nbsp;</div>
</div>
<div id="Edit31_outer" style="Z-INDEX: 64; LEFT: 416px; WIDTH: 34px; POSITION: absolute; TOP: 466px; HEIGHT: 26px">
<input type="text" id="Edit31" name="Edit31" value="<?=$Edit31;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px;"  onchange="Salva31u(this)"  onFocus="nextfield ='Edit32';" style="text-transform: uppercase;" tabindex="31"  maxlength="4"   />
</div>
<div id="Label30_outer" style="Z-INDEX: 65; LEFT: 543px; WIDTH: 92px; POSITION: absolute; TOP: 470px; HEIGHT: 23px">
<div id="Label30" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:92px;"   ><strong>x / Pagos.:</strong>&nbsp;</div>
</div>
<div id="Edit32_outer" style="Z-INDEX: 66; LEFT: 634px; WIDTH: 92px; POSITION: absolute; TOP: 463px; HEIGHT: 28px">
<input type="text" id="Edit32" name="Edit32" value="<?=$Edit32;?>" style=" font-family: Verdana; font-size: 14px;  height:27px;width:92px;"  onchange="Salva32u(this)"  onFocus="nextfield ='Edit33';" style="text-transform: uppercase;" tabindex="32"  maxlength="14"   />
</div>
<div id="Label31_outer" style="Z-INDEX: 67; LEFT: 128px; WIDTH: 99px; POSITION: absolute; TOP: 494px; HEIGHT: 22px">
<div id="Label31" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:99px;"   ><strong>Natural de.:</strong>&nbsp;</div>
</div>
<div id="Edit33_outer" style="Z-INDEX: 68; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 491px; HEIGHT: 26px">
<input type="text" id="Edit33" name="Edit33" value="<?=$Edit33;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;"  onchange="Salva33u(this)"  onFocus="nextfield ='Edit34';" style="text-transform: uppercase;" tabindex="33"  maxlength="20"   />
</div>
<div id="Label32_outer" style="Z-INDEX: 69; LEFT: 347px; WIDTH: 75px; POSITION: absolute; TOP: 496px; HEIGHT: 21px">
<div id="Label32" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><strong>Dt.Nasc.:</strong>&nbsp;</div>
</div>
<div id="Edit34_outer" style="Z-INDEX: 70; LEFT: 416px; WIDTH: 91px; POSITION: absolute; TOP: 491px; HEIGHT: 26px">
<input type="text" id="Edit34" name="Edit34" value="<?=$Edit34;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"   onkeypress="return txtBoxFormat(document.form1, 'Edit34', '99/99/9999', event);"   onchange="Salva34u(this)"  onFocus="nextfield ='Edit35';" style="text-transform: uppercase;" tabindex="34"  maxlength="10"   />
</div>
<div id="Label33_outer" style="Z-INDEX: 71; LEFT: 509px; WIDTH: 127px; POSITION: absolute; TOP: 497px; HEIGHT: 23px">
<div id="Label33" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:23px;width:127px;"   ><strong>Nacionalidade.:</strong>&nbsp;</div>
</div>
<div id="Edit35_outer" style="Z-INDEX: 72; LEFT: 634px; WIDTH: 179px; POSITION: absolute; TOP: 490px; HEIGHT: 28px">
<input type="text" id="Edit35" name="Edit35" value="<?=$Edit35;?>" style=" font-family: Verdana; font-size: 14px;  height:27px;width:179px;"  onchange="Salva35u(this)"  onFocus="nextfield ='Edit36';" style="text-transform: uppercase;" tabindex="35"  maxlength="10"   />
</div>
<div id="Label34_outer" style="Z-INDEX: 73; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 521px; HEIGHT: 26px">
<div id="Label34" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Pai.:</strong>&nbsp;</div>
</div>
<div id="Edit36_outer" style="Z-INDEX: 74; LEFT: 225px; WIDTH: 409px; POSITION: absolute; TOP: 516px; HEIGHT: 27px">
<input type="text" id="Edit36" name="Edit36" value="<?=$Edit36;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:409px;"  onchange="Salva36u(this)"  onFocus="nextfield ='Edit37';" style="text-transform: uppercase;" tabindex="36"  maxlength="45"   />
</div>
<div id="Label35_outer" style="Z-INDEX: 75; LEFT: 130px; WIDTH: 89px; POSITION: absolute; TOP: 546px; HEIGHT: 26px">
<div id="Label35" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Mãe.:</strong>&nbsp;</div>
</div>
<div id="Edit37_outer" style="Z-INDEX: 76; LEFT: 225px; WIDTH: 409px; POSITION: absolute; TOP: 541px; HEIGHT: 26px">
<input type="text" id="Edit37" name="Edit37" value="<?=$Edit37;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:409px;"  onchange="Salva37u(this)"  onFocus="nextfield ='Edit38';" style="text-transform: uppercase;" tabindex="37"  maxlength="45"   />
</div>
<div id="Label36_outer" style="Z-INDEX: 77; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 571px; HEIGHT: 26px">
<div id="Label36" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>Conjugue.:</strong>&nbsp;</div>
</div>
<div id="Edit38_outer" style="Z-INDEX: 78; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 566px; HEIGHT: 26px">
<input type="text" id="Edit38" name="Edit38" value="<?=$Edit38;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;"  onchange="Salva38u(this)"  onFocus="nextfield ='Edit39';" style="text-transform: uppercase;" tabindex="38"  maxlength="35"   />
</div>
<div id="Label37_outer" style="Z-INDEX: 79; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 574px; HEIGHT: 21px">
<div id="Label37" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><strong>Dt.Nasc.:</strong>&nbsp;</div>
</div>
<div id="Edit39_outer" style="Z-INDEX: 80; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 566px; HEIGHT: 26px">
<input type="text" id="Edit39" name="Edit39" value="<?=$Edit39;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"    onkeypress="return txtBoxFormat(document.form1, 'Edit39', '99/99/9999', event);"  onchange="Salva39u(this)"  onFocus="nextfield ='Edit40';" style="text-transform: uppercase;" tabindex="39"  maxlength="10"   />
</div>
<div id="Label38_outer" style="Z-INDEX: 81; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 599px; HEIGHT: 26px">
<div id="Label38" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>1º Filho.:</strong>&nbsp;</div>
</div>
<div id="Edit40_outer" style="Z-INDEX: 82; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 591px; HEIGHT: 26px">
<input type="text" id="Edit40" name="Edit40" value="<?=$Edit40;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;"  onchange="Salva40u(this)"  onFocus="nextfield ='Edit41';" style="text-transform: uppercase;" tabindex="40"  maxlength="35"   />
</div>
<div id="Label39_outer" style="Z-INDEX: 83; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 600px; HEIGHT: 21px">
<div id="Label39" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><strong>Dt.Nasc.:</strong>&nbsp;</div>
</div>
<div id="Edit41_outer" style="Z-INDEX: 84; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 591px; HEIGHT: 26px">
<input type="text" id="Edit41" name="Edit41" value="<?=$Edit41;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"    onkeypress="return txtBoxFormat(document.form1, 'Edit41', '99/99/9999', event);"  onchange="Salva41u(this)"  onFocus="nextfield ='Edit42';" style="text-transform: uppercase;" tabindex="41"  maxlength="10"   />
</div>
<div id="Label40_outer" style="Z-INDEX: 85; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 599px; HEIGHT: 21px">
<div id="Label40" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:52px;"   ><strong>Sexo.:</strong>&nbsp;</div>
</div>
<div id="Edit42_outer" style="Z-INDEX: 86; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 594px; HEIGHT: 26px">
<select type="text" id="Edit42" name="Edit42" value="<?=$Edit42;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onchange="Salva42u(this)"  onFocus="nextfield ='Edit43';" style="text-transform: uppercase;" tabindex="42"  maxlength="1"   />

<?

if (!empty($Edit42))
{
?>	
	<option value="<?=$Edit42;?>"> <?=$Edit42;?> </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?            
 }
?>

</select>

</div>
<div id="Label41_outer" style="Z-INDEX: 87; LEFT: 129px; WIDTH: 89px; POSITION: absolute; TOP: 624px; HEIGHT: 26px">
<div id="Label41" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><strong>2º Filho.:</strong>&nbsp;</div>
</div>
<div id="Edit43_outer" style="Z-INDEX: 88; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 616px; HEIGHT: 26px">
<input type="text" id="Edit43" name="Edit43" value="<?=$Edit43;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;"  onchange="Salva43u(this)"  onFocus="nextfield ='Edit44';" style="text-transform: uppercase;" tabindex="43"  maxlength="35"   />
</div>
<div id="Label42_outer" style="Z-INDEX: 89; LEFT: 564px; WIDTH: 75px; POSITION: absolute; TOP: 625px; HEIGHT: 21px">
<div id="Label42" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:75px;"   ><strong>Dt.Nasc.:</strong>&nbsp;</div>
</div>
<div id="Edit44_outer" style="Z-INDEX: 90; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 616px; HEIGHT: 26px">
<input type="text" id="Edit44" name="Edit44" value="<?=$Edit44;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"    onkeypress="return txtBoxFormat(document.form1, 'Edit44', '99/99/9999', event);"  onchange="Salva44u(this)"  onFocus="nextfield ='Edit45';" style="text-transform: uppercase;" tabindex="44"  maxlength="10"   />
</div>
<div id="Label43_outer" style="Z-INDEX: 91; LEFT: 761px; WIDTH: 52px; POSITION: absolute; TOP: 625px; HEIGHT: 21px">
<div id="Label43" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:52px;"   ><strong>Sexo.:</strong>&nbsp;</div>
</div>
<div id="Edit45_outer" style="Z-INDEX: 92; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 619px; HEIGHT: 26px">
<select type="text" id="Edit45" name="Edit45" value="<?=$Edit45;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;"  onchange="Salva45u(this)"  onFocus="nextfield ='Edit46';" style="text-transform: uppercase;" tabindex="45"  maxlength="1"   />

<?

if (!empty($Edit45))
{
?>	
	<option value="<?=$Edit45;?>"> <?=$Edit45;?> </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?            
 }
?>

</select>

</div>
<div id="Image3_outer" style="Z-INDEX: 93; LEFT: 702px; WIDTH: 112px; POSITION: absolute; TOP: 526px; HEIGHT: 24px">
<div id="Image3_container" style=" width: 112;  overflow: hidden;" ><A HREF="<?=$path;?>ts2.php" target="new"  ><img id="Image3" src="imagens/botaoazul21.PNG"     border="0"       /></A></div>
</div>


<div id="Image2_outer" style="Z-INDEX: 94; LEFT: 761px; WIDTH: 112px; POSITION: absolute; TOP: 331px; HEIGHT: 24px">
<div id="Image2_container" style=" width: 112;   overflow: hidden;" ><A href="javascript:Download();"><img id="Image2" src="imagens/botaoazul17.PNG"  border="0"       /></A></div>
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
<textarea id="Edit70" name="Edit70" style=" font-family: Verdana; font-size: 14px;  height:81px;width:544px;"  onchange="Salva70u(this)"  onFocus="nextfield ='Edit70';" style="text-transform: uppercase;" tabindex="70"    wrap="virtual"><?=$Edit70;?></textarea>
</div>




<div id="Label69_outer" style="Z-INDEX: 121; LEFT: 774px; WIDTH: 77px; POSITION: absolute; TOP: 156px; HEIGHT: 20px">
<div id="Label69" style=" font-family: Verdana; font-size: 13px; color: #4682B4; height:20px;width:77px;"   ><A HREF="http://www.receita.fazenda.gov.br/Aplicacoes/ATCTA/cpf/ConsultaPublica.asp"  >Clique Aqui</A></div>
</div>
<div id="Label70_outer" style="Z-INDEX: 122; LEFT: 310px; WIDTH: 31px; POSITION: absolute; TOP: 349px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #4682B4; height:18px;width:31px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep"  ><strong>Cep </strong></A></div>
</div>

<div id="Label72_outer" style="Z-INDEX: 123; LEFT: 305px; WIDTH: 442px; POSITION: absolute; TOP: 249px; HEIGHT: 20px">
<div id="Label72" style=" font-family: Verdana; font-size: 14px; color: #0000FF;font-weight: normal; height:20px;width:442px;"   ><strong><?=$nome_do_edif;?></strong>&nbsp;</div>
</div>
<div id="Image4_outer" style="Z-INDEX: 150; LEFT: 283px; WIDTH: 17px; POSITION: absolute; TOP: 250px; HEIGHT: 18px">
<div id="Image4_container" style=" width: 17;  height: 18; overflow: hidden;" ><A HREF="edifconsulta_up.php?Cod_pp=<?=$Edit1.$Edit2;?>"  ><img id="Image4" src="imagens/lupa.PNG"  width="17"  height="18"  border="0"       /></A></div>
</div>

<div id="Label73_outer" style="Z-INDEX: 124; LEFT: 257px; WIDTH: 462px; POSITION: absolute; TOP: 227px; HEIGHT: 20px">
<div id="Label73" style=" font-family: Verdana; font-size: 14px; color: #4682B4;font-weight: normal; height:20px;width:462px;"   ><strong><?=$categ_1;?></strong>&nbsp;</div>
</div>
<div id="Label74_outer" style="Z-INDEX: 125; LEFT: 345px; WIDTH: 511px; POSITION: absolute; TOP: 445px; HEIGHT: 20px">
<div id="Label74" style=" font-family: Verdana; font-size: 14px; color: #4682B4;font-weight: normal; height:20px;width:511px;"   ><strong><?=$nome_cad_si;?></strong>&nbsp;</div>
</div>           
<div id="Edit46_outer" style="Z-INDEX: 126; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 641px; HEIGHT: 26px">
<input type="text" id="Edit46" name="Edit46" value="<?=$Edit46;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;"  onchange="Salva46u(this)"  onFocus="nextfield ='Edit47';" style="text-transform: uppercase;" tabindex="46" maxlength="35"    />
</div>
<div id="Edit47_outer" style="Z-INDEX: 127; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 641px; HEIGHT: 26px">
<input type="text" id="Edit47" name="Edit47" value="<?=$Edit47;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"    onkeypress="return txtBoxFormat(document.form1, 'Edit47', '99/99/9999', event);"  onchange="Salva47u(this)"  onFocus="nextfield ='Edit48';" style="text-transform: uppercase;" tabindex="47"  maxlength="10"   />
</div>
<div id="Edit48_outer" style="Z-INDEX: 128; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 644px; HEIGHT: 26px">
<select type="text" id="Edit48" name="Edit48" value="<?=$Edit48;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onchange="Salva48u(this)"  onFocus="nextfield ='Edit49';" style="text-transform: uppercase;" tabindex="48"  maxlength="1"   />

<?

if (!empty($Edit48))
{
?>	
	<option value="<?=$Edit48;?>"> <?=$Edit48;?> </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?            
 }
?>

</select>

</div>
<div id="Edit49_outer" style="Z-INDEX: 129; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 666px; HEIGHT: 26px">
<input type="text" id="Edit49" name="Edit49" value="<?=$Edit49;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;"  onchange="Salva49u(this)"  onFocus="nextfield ='Edit50';" style="text-transform: uppercase;" tabindex="49"  maxlength="35"   />
</div>
<div id="Edit50_outer" style="Z-INDEX: 130; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 666px; HEIGHT: 26px">
<input type="text" id="Edit50" name="Edit50" value="<?=$Edit50;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"    onkeypress="return txtBoxFormat(document.form1, 'Edit50', '99/99/9999', event);"  onchange="Salva50u(this)"  onFocus="nextfield ='Edit51';" style="text-transform: uppercase;" tabindex="50"  maxlength="10"   />
</div>
<div id="Edit51_outer" style="Z-INDEX: 131; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 669px; HEIGHT: 26px">
<select type="text" id="Edit51" name="Edit51" value="<?=$Edit51;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;"  onchange="Salva51u(this)"  onFocus="nextfield ='Edit52';" style="text-transform: uppercase;" tabindex="51" maxlength="1"    />

<?

if (!empty($Edit51))
{
?>	
	<option value="<?=$Edit51;?>"> <?=$Edit51;?> </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?            
 }
?>

</select>

</div>
<div id="Edit52_outer" style="Z-INDEX: 132; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 691px; HEIGHT: 26px">
<input type="text" id="Edit52" name="Edit52" value="<?=$Edit52;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;"  onchange="Salva52u(this)"  onFocus="nextfield ='Edit53';" style="text-transform: uppercase;" tabindex="52"  maxlength="35"   />
</div>
<div id="Edit53_outer" style="Z-INDEX: 133; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 691px; HEIGHT: 26px">
<input type="text" id="Edit53" name="Edit53" value="<?=$Edit53;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"    onkeypress="return txtBoxFormat(document.form1, 'Edit53', '99/99/9999', event);"  onchange="Salva53u(this)"  onFocus="nextfield ='Edit54';" style="text-transform: uppercase;" tabindex="53"  maxlength="10"   />
</div>
<div id="Edit54_outer" style="Z-INDEX: 134; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 694px; HEIGHT: 26px">
<select type="text" id="Edit54" name="Edit54" value="<?=$Edit54;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;"  onchange="Salva54u(this)"  onFocus="nextfield ='Edit55';" style="text-transform: uppercase;" tabindex="54"  maxlength="1"   />

<?

if (!empty($Edit54))
{
?>	
	<option value="<?=$Edit54;?>"> <?=$Edit54;?> </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?            
 }
?>

</select>

</div>
<div id="Edit55_outer" style="Z-INDEX: 135; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 716px; HEIGHT: 26px">
<input type="text" id="Edit55" name="Edit55" value="<?=$Edit55;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;"  onchange="Salva55u(this)"  onFocus="nextfield ='Edit56';" style="text-transform: uppercase;" tabindex="55"  maxlength="35"   />
</div>
<div id="Edit56_outer" style="Z-INDEX: 136; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 716px; HEIGHT: 26px">
<input type="text" id="Edit56" name="Edit56" value="<?=$Edit56;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"   onkeypress="return txtBoxFormat(document.form1, 'Edit56', '99/99/9999', event);"  onchange="Salva56u(this)"  onFocus="nextfield ='Edit57';" style="text-transform: uppercase;" tabindex="56"  maxlength="10"   />
</div>
<div id="Edit57_outer" style="Z-INDEX: 137; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 719px; HEIGHT: 26px">
<select type="text" id="Edit57" name="Edit57" value="<?=$Edit57;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onchange="Salva57u(this)"  onFocus="nextfield ='Edit58';" style="text-transform: uppercase;" tabindex="57"  maxlength="1"   />

<?

if (!empty($Edit57))
{
?>	
	<option value="<?=$Edit57;?>"> <?=$Edit57;?> </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?            
 }
?>

</select>

</div>
<div id="Edit58_outer" style="Z-INDEX: 138; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 741px; HEIGHT: 26px">
<input type="text" id="Edit58" name="Edit58" value="<?=$Edit58;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onchange="Salva58u(this)"  onFocus="nextfield ='Edit59';" style="text-transform: uppercase;" tabindex="58"  maxlength="35"   />
</div>
<div id="Edit59_outer" style="Z-INDEX: 139; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 741px; HEIGHT: 26px">
<input type="text" id="Edit59" name="Edit59" value="<?=$Edit59;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"   onkeypress="return txtBoxFormat(document.form1, 'Edit59', '99/99/9999', event);"  onchange="Salva59u(this)"  onFocus="nextfield ='Edit60';" style="text-transform: uppercase;" tabindex="59"  maxlength="10"   />
</div>
<div id="Edit60_outer" style="Z-INDEX: 140; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 744px; HEIGHT: 26px">
<select type="text" id="Edit60" name="Edit60" value="<?=$Edit60;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onchange="Salva60u(this)"  onFocus="nextfield ='Edit61';" style="text-transform: uppercase;" tabindex="60"  maxlength="1"   />

<?

if (!empty($Edit60))
{
?>	
	<option value="<?=$Edit60;?>"> <?=$Edit60;?> </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?            
 }
?>

</select>

</div>
<div id="Edit61_outer" style="Z-INDEX: 141; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 766px; HEIGHT: 26px">
<input type="text" id="Edit61" name="Edit61" value="<?=$Edit61;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onchange="Salva61u(this)"  onFocus="nextfield ='Edit62';" style="text-transform: uppercase;" tabindex="61"  maxlength="35"   />
</div>
<div id="Edit62_outer" style="Z-INDEX: 142; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 766px; HEIGHT: 26px">
<input type="text" id="Edit62" name="Edit62" value="<?=$Edit62;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"   onkeypress="return txtBoxFormat(document.form1, 'Edit62', '99/99/9999', event);"  onchange="Salva62u(this)"  onFocus="nextfield ='Edit63';" style="text-transform: uppercase;" tabindex="62"  maxlength="10"   />
</div>
<div id="Edit63_outer" style="Z-INDEX: 143; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 769px; HEIGHT: 26px">
<select type="text" id="Edit63" name="Edit63" value="<?=$Edit63;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onchange="Salva63u(this)"  onFocus="nextfield ='Edit64';" style="text-transform: uppercase;" tabindex="63"  maxlength="1"   />

<?

if (!empty($Edit63))
{
?>	
	<option value="<?=$Edit63;?>"> <?=$Edit63;?> </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?            
 }
?>

</select>

</div>
<div id="Edit64_outer" style="Z-INDEX: 144; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 791px; HEIGHT: 26px">
<input type="text" id="Edit64" name="Edit64" value="<?=$Edit64;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onchange="Salva64u(this)"  onFocus="nextfield ='Edit65';" style="text-transform: uppercase;" tabindex="64"  maxlength="35"   />
</div>
<div id="Edit65_outer" style="Z-INDEX: 145; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 791px; HEIGHT: 26px">
<input type="text" id="Edit65" name="Edit65" value="<?=$Edit65;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"   onkeypress="return txtBoxFormat(document.form1, 'Edit65', '99/99/9999', event);"  onchange="Salva65u(this)"  onFocus="nextfield ='Edit66';" style="text-transform: uppercase;" tabindex="65"  maxlength="10"   />
</div>
<div id="Edit66_outer" style="Z-INDEX: 146; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 794px; HEIGHT: 26px">
<select type="text" id="Edit66" name="Edit66" value="<?=$Edit66;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onchange="Salva66u(this)"  onFocus="nextfield ='Edit61';" style="text-transform: uppercase;" tabindex="66"  maxlength="1"   />

<?

if (!empty($Edit66))
{
?>	
	<option value="<?=$Edit66;?>"> <?=$Edit66;?> </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?            
 }
?>

</select>

</div>
<div id="Edit67_outer" style="Z-INDEX: 147; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 816px; HEIGHT: 26px">
<input type="text" id="Edit67" name="Edit67" value="<?=$Edit67;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onchange="Salva67u(this)"  onFocus="nextfield ='Edit68';" style="text-transform: uppercase;" tabindex="67"  maxlength="35"   />
</div>
<div id="Edit68_outer" style="Z-INDEX: 148; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 816px; HEIGHT: 26px">
<input type="text" id="Edit68" name="Edit68" value="<?=$Edit68;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;"   onkeypress="return txtBoxFormat(document.form1, 'Edit68', '99/99/9999', event);"  onchange="Salva68u(this)"  onFocus="nextfield ='Edit69';" style="text-transform: uppercase;" tabindex="68"  maxlength="10"   />
</div>
<div id="Edit69_outer" style="Z-INDEX: 149; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 819px; HEIGHT: 26px">
<select type="text" id="Edit69" name="Edit69" value="<?=$Edit69;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onchange="Salva69u(this)"  onFocus="nextfield ='Edit70';" style="text-transform: uppercase;" tabindex="69"  maxlength="1"   />

<?

if (!empty($Edit69))
{
?>	
	<option value="<?=$Edit69;?>"> <?=$Edit69;?> </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?            
 }
?>

</select>

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
