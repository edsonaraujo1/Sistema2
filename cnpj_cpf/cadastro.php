<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Operador Aplicativos
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 31/03/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("FORM_CNPJ");

if ($deixar == "SIM"){


// Resgata Sessao
session_name("Val_Sind");
session_start();

$Edit1  = $_SESSION['Edit1'];
$Edit2  = $_SESSION['Edit2'];
$Edit3  = $_SESSION['Edit3']; 
$Edit4  = $_SESSION['Edit4'];
$Edit5  = $_SESSION['Edit5'];

$mensagem = "  ";

include("funcoes2.php");

?>
<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
</head>

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

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}


-->
</style> 


<?
include("help.php");

Function retirar_ponto($var){

$var = str_replace(".",             "",$var);

return($var);
}


//$v = trim(retirar_carac3($v));

$Edit1 = preg_replace ('/[^0-9]/', '', $Edit1);

if (!empty($Edit1)){
	

$ok = false;
if (strlen($Edit1) == 9) {
  $mensagem = "CPF:  ".cpf_calc($Edit1);
  $ok = true;
}
if (strlen($Edit1) == 12) {
  $mensagem = "CNPJ: ".cnpj_calc($Edit1);
  $ok = true;
}
if ($ok == false) {
  //echo "erro: valor preenchido deve ter 9 (CPF) ou 12 (CNPJ) números!";
}

$dv = substr($mensagem,6,19);

}

// Limpa Variaveis
$cnpj_1      = '';
$var_comp1   = '';
$nome_1      = '';
$var_comp3   = ''; 
$endereco_1  = ''; 
$numero_1    = ''; 
$cep_1       = '';
$bairro_1    = '';
$cidade_1    = '';
$uf_1        = '';


$Edit1 = trim(substr(retirar_carac3($mensagem),5,18));

$titulo1  = "INSCRIÇÃO";
$titulo2  = "EMPRESARIAL";
$titulo3  = "TÍTULO";
$titulo4  = "LOGRADOURO";
$titulo5  = "NÚMERO";
$titulo6  = "CEP";
$titulo7  = "BAIRRO/DISTRITO";
$titulo8  = "MUNICÍPIO";
$titulo9  = "UF";
$titulo10 = "SITUAÇÃO";


//$titulo1  = "INSCRICAO";
//$titulo2  = "EMPRESARIAL";
//$titulo3  = "TÍTULO";
//$titulo4  = "LOGRADOURO";
//$titulo5  = "NUMERO";
//$titulo6  = "CEP";
//$titulo7  = "BAIRRO/DISTRITO";
//$titulo8  = "MUNICÍPIO";
//$titulo9  = "UF";
//$titulo10 = "SITUACAO";


// Inicio
$frase1 = $Edit2; // A frase

$palavras = explode(' ',$frase1); // Divide $frase usando o " " (espaço) como divisor 

for ($i=0; $i < 300; $i++)
{
     if ($palavras[$i] == $titulo1) // INSCRIÇÃO
     {
	    $i++;
	    //echo $i."=".$palavras[$i]."<br>";
	    $x++;
	    $var[$x] = $palavras[$i];
	    $i = 0;
        break;	
     } 
}

for ($i=0; $i < 300; $i++)
{
     if ($palavras[$i] == $titulo2) // EMPRESARIAL
     {
     	
	    $i++;
	    //echo $i."=".$palavras[$i]."<br>";
	    $x++;
	    $var[$x] = $palavras[$i];
	    $i++;
	    while($palavras[$i] != " ")
	    {
	      //echo $i."=".$palavras[$i]."<br>";
	    $x++;
	    $var[$x] = $palavras[$i];
          $i++;
          if ($palavras[$i] == $titulo3){
             break;	
          }
          if ($i >= 300)
		  {
             break;	
          }
        }
	  }  
}

for ($i=0; $i < 300; $i++)
{
     if ($palavras[$i] == $titulo4) // LOGRADOURO
     {
	    $i++;
	    //echo $i."=".$palavras[$i]."<br>";
	    $x++;
	    $var[$x] = $palavras[$i];
	    $i++;
	    while($palavras[$i] != " ")
	    {
	      //echo $i."=".$palavras[$i]."<br>";
	    $x++;
	    $var[$x] = $palavras[$i];
          $i++;
          if ($palavras[$i] == $titulo5){
          	  $i++;
	          //echo $i."=".$palavras[$i]."<br>";
	    $x++;
	    $var[$x] = $palavras[$i];
             break;	
          }
          if ($i >= 300)
		  {
             break;	
          }
        }
	    
	  }  
}

for ($i=0; $i < 300; $i++)
{
     if ($palavras[$i] == $titulo6) // CEP

     {
	    $i++;
	    //echo $i."=".$palavras[$i]."<br>";
	    $x++;
	    $var[$x] = $palavras[$i];
	    $i++;
	    while($palavras[$i] != " ")
	    {
	      //echo $i."=".$palavras[$i]."<br>";
	    $x++;
	    $var[$x] = $palavras[$i];
          $i++;
          if ($palavras[$i] == $titulo7){
             break;	
          }
          if ($i >= 300)
		  {
             break;	
          }
        }
	    
	  }  
}


for ($i=0; $i < 300; $i++)
{
     if ($palavras[$i] == $titulo7) // BAIRRO/DISTRITO

     {
	    $i++;
	    //echo $i."=".$palavras[$i]."<br>";
	    $x++;
	    $var[$x] = $palavras[$i];
	    $i++;
	    while($palavras[$i] != " ")
	    {
	      //echo $i."=".$palavras[$i]."<br>";
	    $x++;
	    $var[$x] = $palavras[$i];
          $i++;
          if ($palavras[$i] == $titulo8){
             break;	
          }
          if ($i >= 300)
		  {
             break;	
          }
        }
	    
	  }  
}


for ($i=0; $i < 300; $i++)
{
     if ($palavras[$i] == $titulo8) // MUNICÍPIO
     {
	    $i++;
	    //echo $i."=".$palavras[$i]."<br>";
	    $x++;
	    $var[$x] = $palavras[$i];
	    $i++;
	    while($palavras[$i] != " ")
	    {
	      //echo $i."=".$palavras[$i]."<br>";
	    $x++;
	    $var[$x] = $palavras[$i];
          $i++;
          if ($palavras[$i] == $titulo9){
             break;	
          }
          if ($i >= 300)
		  {
             break;	
          }
        }
	    
	  }  
}


for ($i=0; $i < 300; $i++)
{
     if ($palavras[$i] == $titulo9) // UF
     {
	    $i++;
	    //echo $i."=".$palavras[$i]."<br>";
	    $x++;
	    $var[$x] = $palavras[$i];
	    $i++;
	    while($palavras[$i] != " ")
	    {
	      //echo $i."=".$palavras[$i]."<br>";
	    $x++;
	    $var[$x] = $palavras[$i];
          $i++;
          if ($palavras[$i] == $titulo10){
             break;	
          }
          if ($i >= 300)
		  {
             break;	
          }
        }
	    
	  }  
}
// Fim
//echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";


$frase1 = strtoupper($Edit2); // A frase

$var = explode(' ',$frase1); // Divide $frase usando o " " (espaço) como divisor 


for ($i=0; $i < 300; $i++)
{
if (empty($var[$i]))
{
	$var[$i] = "*";
}
 //   echo $i."=".$var[$i]."<br>";
	  
}

$titulo1  = "INSCRIÇÃO";
$titulo2  = "EMPRESARIAL";
$titulo3  = "TÍTULO";
$titulo4  = "LOGRADOURO";
$titulo5  = "NÚMERO";
$titulo6  = "CEP";
$titulo7  = "BAIRRO/DISTRITO";
$titulo8  = "MUNICÍPIO";
$titulo9  = "UF";
$titulo10 = "SITUAÇÃO";


// Rotina Cria variavel CNPJ1
$cnpj_1 = ' ';
for ($i=20; $i < 100; $i++)
{
	if ($var[$i] == $titulo1)
	{
        $i++;	
        $cnpj_1 = $cnpj_1." ".$var[$i];
        break;
    }
}
$cnpj_1 = substr($var[$i],0,18);
//echo $cnpj_1."<br>";

// Rotina Cria variavel NOME
$nome_1 = ' ';
for ($i=0; $i < 300; $i++)
{
	if ($var[$i] == $titulo2)
	{
        $i++;	
        $nome_1 = $nome_1." ".$var[$i];
        $i++;
        while($var[$i] != "*")
        {
             $nome_1 = $nome_1." ".$var[$i];
        	 $i++;
        }
        if ($i > 600)
        {
          	break;
        }
    }
}
//echo $nome_1."<br>";

// Rotina Cria variavel ENDERECO
$endereco_1 = ' ';
for ($i=0; $i < 300; $i++)
{
	if ($var[$i] == $titulo4)
	{
        $i++;	
        $endereco_1 = $endereco_1." ".$var[$i];
        $i++;
        while($var[$i] != "*")
        {
             $endereco_1 = $endereco_1." ".$var[$i];
        	 $i++;
        	 $pax = $i;
        }
        if ($i > 600)
        {
          	break;
        }
    }
}
//echo $endereco_1."<br>";

// Rotina Cria variavel NUMERO
$numero = ' ';
for ($i=$pax; $i < 300; $i++)
{
	if ($var[$i] == $titulo5)
	{
        $i++;	
        $numero_1 = $numero_1." ".$var[$i];
        $i++;
        while($var[$i] != "*")
        {
             $numero_1 = $numero_1." ".$var[$i];
        	 $i++;
        }
        if ($i > 600)
        {
          	break;
        }
    }
}
//echo $numero_1."<br>";

// Rotina Cria variavel CEP
$cep_1 = ' ';
for ($i=0; $i < 300; $i++)
{
	if ($var[$i] == $titulo6)
	{
        $i++;	
        $cep_1 = $cep_1." ".$var[$i];
        $i++;
        while($var[$i] != "*")
        {
             $cep_1 = $cep_1." ".$var[$i];
        	 $i++;
        }
        if ($i > 600)
        {
          	break;
        }
    }
}
//echo retirar_ponto($cep_1)."<br>";

// Rotina Cria variavel BAIRRO
$bairro_1 = ' ';
for ($i=0; $i < 300; $i++)
{
	if ($var[$i] == $titulo7)
	{
        $i++;	
        $bairro_1 = $bairro_1." ".$var[$i];
        $i++;
        while($var[$i] != "*")
        {
             $bairro_1 = $bairro_1." ".$var[$i];
        	 $i++;
        }
        if ($i > 600)
        {
          	break;
        }
    }
}
//echo $bairro_1."<br>";

// Rotina Cria variavel CIDADE
$cidade_1 = ' ';
for ($i=0; $i < 300; $i++)
{
	if ($var[$i] == $titulo8)
	{
        $i++;	
        $cidade_1 = $cidade_1." ".$var[$i];
        $i++;
        while($var[$i] != "*")
        {
             $cidade_1 = $cidade_1." ".$var[$i];
        	 $i++;
        }
        if ($i > 600)
        {
          	break;
        }
    }
}
//echo $cidade_1."<br>";

// Rotina Cria variavel UF
$uf_1 = ' ';
for ($i=0; $i < 300; $i++)
{
	if ($var[$i] == $titulo9)
	{
        $i++;	
        $uf_1 = $uf_1." ".$var[$i];
        $i++;
        while($var[$i] != "*")
        {
             $uf_1 = $uf_1." ".$var[$i];
        	 $i++;
        }
        if ($i > 600)
        {
          	break;
        }
    }
}
//echo $uf_1."<br>";


//echo "<br><br>".$cnpj_1."<br>";
//echo $var_comp1."<br>";
//echo $nome_1."<br>";
//echo $var_comp3."<br>"; 
//echo $endereco_1."<br>"; 
//echo $numero_1."<br>"; 
//echo retirar_ponto($cep_1)."<br>";
//echo $bairro_1."<br>";
//echo $cidade_1."<br>";
//echo $uf_1."<br>";


// Salva Sessao
session_start();

$_SESSION['cnpj']       = $cnpj_1;
$_SESSION['comp_nome']  = $var_comp1;
$_SESSION['nome_1']     = $nome_1;
$_SESSION['comp_end']   = $var_comp3; 
$_SESSION['endereco_1'] = $endereco_1; 
$_SESSION['numero_1']   = $numero_1; 
$_SESSION['cep_1']      = retirar_ponto($cep_1);
$_SESSION['bairro_1']   = $bairro_1;
$_SESSION['cidade_1']   = $cidade_1;
$_SESSION['uf_1']       = $uf_1;

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit1").focus();	
		}
		</script>
<?

if (!empty($Edit1)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Memo1").focus();	
		}
		
		</script>
		<?
}
if (!empty($Memo1)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit1").focus();	
		}
		
		</script>
		<?
}

?>


<script language="JavaScript">
var copytoclip=1
function HighlightAll(theField) {
var tempval=eval("document."+theField)
tempval.focus()
tempval.select()
 if (document.all&&copytoclip==1){
  therange=tempval.createTextRange()
  therange.execCommand("Copy")
  window.status="Conteúdo selecionado e copiado para a área de transferência!"
  setTimeout("window.status=''",2400);
  }
}

function highlight(field) {
       field.focus();
       field.select();
}

function goToURL() { window.location = "javascript:HighlightAll('forms[0].Edit1')"; }
</script>

<script LANGUAGE="JavaScript">
<!-- Begin
nextfield = "Edit1";
netscape  = "";
ver = navigator.appVersion; len = ver.length;

function keyDown(DnEvents) {
k = (netscape) ? DnEvents.which : window.event.keyCode;
if (k == 13) {
if (nextfield == '') {
return false;
} else {
eval('document.Form1.' + nextfield + '.focus()');
return false;}}}
document.onkeydown = keyDown;
if (netscape) document.captureEvents(Event.KEYDOWN|Event.KEYUP);
// End -->

function txtBoxFormat(objForm, strField, sMask, evtKeyPress) {
var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;


     if(document.all) { nTecla = evtKeyPress.keyCode; }
else if(document.getElementById) { nTecla = evtKeyPress.which; }

sValue = objForm[strField].value;
sValue = sValue.toString().replace( "-", "" );
sValue = sValue.toString().replace( "-", "" );
sValue = sValue.toString().replace( ".", "" );
sValue = sValue.toString().replace( ".", "" );
sValue = sValue.toString().replace( "/", "" );
sValue = sValue.toString().replace( "/", "" );
sValue = sValue.toString().replace( "(", "" );
sValue = sValue.toString().replace( "(", "" );
sValue = sValue.toString().replace( ")", "" );
sValue = sValue.toString().replace( ")", "" );
sValue = sValue.toString().replace( " ", "" );
sValue = sValue.toString().replace( " ", "" );
fldLen = sValue.length;
mskLen = sMask.length;
i = 0;
nCount = 0;
sCod = "";
mskLen = fldLen;
while (i <= mskLen) {
bolMask = ((sMask.charAt(i) == "-") || (sMask.charAt(i) == ".") || (sMask.charAt(i) == "/"))
bolMask = bolMask || ((sMask.charAt(i) == "(") || (sMask.charAt(i) == ")") || (sMask.charAt(i) == " "))
if (bolMask) {
sCod += sMask.charAt(i);
mskLen++; }
else {
sCod += sValue.charAt(nCount);
nCount++;
}
i++;
}
objForm[strField].value = sCod;
if (nTecla != 8) { 
if (sMask.charAt(i-1) == "9") { 
return ((nTecla > 47) && (nTecla < 58)); } 
else { 
return true;
} }
else {
return true;
}
}
// Fim
// End -->
</script>

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

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="foco();">
<form style="margin-bottom: 0" id="Form1" name="Form1" method="post"  action="">
<table  width="824"   style="height:456px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 264px; WIDTH: 488px; POSITION: absolute; TOP: 80px; HEIGHT: 368px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(15, 15, 458 - 15, 338 - 15);
  Shape1_Canvas.fillRect(15, 15, 458 - 15 + 1, 338 - 15 + 1);
  Shape1_Canvas.setStroke(15);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(15, 15, 458 - 15 + 1, 338 - 15 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 296px; WIDTH: 424px; POSITION: absolute; TOP: 112px; HEIGHT: 48px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 422 - 1, 46 - 1);
  Shape2_Canvas.fillRect(1, 1, 422 - 1 + 1, 46 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 422 - 1 + 1, 46 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 313px; WIDTH: 383px; POSITION: absolute; TOP: 119px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; height:32px;width:383px;"   > <STRONG>Buscar CNPJ/CPF</STRONG><font size="2" color="#000000"><img src="../imagens/px1.gif" width="10" height="1"/>Versão Demo</font> </div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 3; LEFT: 296px; WIDTH: 424px; POSITION: absolute; TOP: 162px; HEIGHT: 254px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 422 - 1, 252 - 1);
  Shape3_Canvas.fillRect(1, 1, 422 - 1 + 1, 252 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 422 - 1 + 1, 252 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 4; LEFT: 350px; WIDTH: 98px; POSITION: absolute; TOP: 180px; HEIGHT: 24px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px;  height:24px;width:98px;"   > <STRONG>CNPJ / CPF:</STRONG> </div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 5; LEFT: 456px; WIDTH: 176px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" onfocus="this.className='anormal'" onblur="this.className='normal'" style=" font-family: Verdana; font-size: 14px;  height:25px;width:150px;" onkeypress="return txtBoxFormat(document.Form1, 'Edit1', '99.999.999/9999', event);" onchange="Salva_sind1(this)"  onFocus="nextfield ='Edit2';" maxlength="15"  tabindex="0"    /><font size="4,5"><b>-??</b></font>
</div>

<div id="Memo1_outer" style="Z-INDEX: 8; LEFT: 315px; WIDTH: 392px; POSITION: absolute; TOP: 256px; HEIGHT: 56px">
<textarea id="Memo1" name="Memo1" onfocus="this.className='anormal'" onblur="this.className='normal'" style=" font-family: Verdana; font-size: 14px;  height:55px;width:392px;"  onchange="Salva_sind2(this)" onFocus="nextfield ='Edit1';"  tabindex="1"    wrap="virtual"><?=retirar_carac3($Edit2);?></textarea>
</div>

<div id="Label3_outer" style="Z-INDEX: 9; LEFT: 318px; WIDTH: 242px; POSITION: absolute; TOP: 324px; HEIGHT: 20px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px;  height:20px;width:242px;"   ><A HREF="javascript:janelaSecundaria3('http://www.receita.fazenda.gov.br/PessoaJuridica/CNPJ/cnpjreva/Cnpjreva_Solicitacao.asp')" > <STRONG><u>Consultar Cadastro na Receita</u> </STRONG> </A></div>
</div>
<div id="Label4_outer" style="Z-INDEX: 11; LEFT: 316px; WIDTH: 74px; POSITION: absolute; TOP: 239px; HEIGHT: 19px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px;  height:19px;width:74px;"   > <STRONG>cole aqui</STRONG> </div>
</div>

<div id="Label5_outer" style="Z-INDEX: 12; LEFT: 346px; WIDTH: 322px; POSITION: absolute; TOP: 212px; HEIGHT: 24px">
<div id="Label5" style=" font-family: Verdana; font-size: 16px;  height:24px;width:322px;"  align="Center"   > <FONT color=#ff0000><STRONG><?=$mensagem;?></STRONG></FONT> </div>
</div>

</td></tr></table>
</form></body>

<div id="Image3_outer" style="Z-INDEX: 10; LEFT: 368px; WIDTH: 92px; POSITION: absolute; TOP: 368px; HEIGHT: 22px">
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><img id="Image3" src="../imagens/botaoazul_copy.PNG"  width="92"  height="22"  border="0"  onClick="goToURL()"     /></a></div>
</div>
<div id="Image1_outer" style="Z-INDEX: 6; LEFT: 468px; WIDTH: 92px; POSITION: absolute; TOP: 368px; HEIGHT: 22px">
<div id="Image1_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="incluir.php"><img id="Image1" src="../imagens/botaoazul6.PNG"  width="92"  height="22"  border="0"       /></a></div>
</div>
<div id="Image2_outer" style="Z-INDEX: 7; LEFT: 567px; WIDTH: 92px; POSITION: absolute; TOP: 368px; HEIGHT: 22px">
<div id="Image2_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="<?=$path;?>avaleht.php?servletjs2=20$$20" ><img id="Image2" src="../imagens/botaoazul9.PNG"  width="92"  height="22"  border="0"       /></a></div>
</div>

</html>

<script>
function janelaSecundaria3 (URL){ 
   window.open(URL,"janela3","width=670,height=730,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 
</script>
<?
}else{
	
include("enaaurlnp.php");
	
}
?>