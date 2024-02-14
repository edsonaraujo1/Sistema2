<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Operador Aplicativos
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");

require("menu.php");

$nome3 = $_SESSION["nome_log"];

// Resgata Sessao
session_name("Val_Sind");
session_start();

$Edit1  = $_SESSION['Edit1'];
$Edit2  = $_SESSION['Edit2'];
$Edit3  = $_SESSION['Edit3']; 
$Edit4  = $_SESSION['Edit4'];
$Edit5  = $_SESSION['Edit5'];

$mensagem = "  ";

require("funcoes2.php");


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
echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";

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
for ($i=0; $i < 100; $i++)
{
if (empty($var[$i]))
{
	$var[$i] = "*";
}
//    echo $i."=".$var[$i]."<br>";
	  
}

$cnpj_1 = substr($var[1],0,18);
//echo $cnpj_1."<br>";

// Rotina Cria variavel NOME
$nome_1 = ' ';
$var_comp2 = ' ';
for ($i=2; $i < 100; $i++) 
{
    while($var[$i] != "*")
    {
    	  if ($var[$i] == "CONDOMINIO"){
    	  	 $var_comp_1 =  "COND.";
    	  	 $var_comp2 = $var_comp2." ".$var_comp_1; 
    	  	 $i++;
    	  }
    	  if ($var[$i] == "EDIFICIO"){
    	  	 $var_comp_2 =  "EDIF.";
    	  	 $var_comp2 = $var_comp2." ".$var_comp_2;
    	  	 $i++;
    	  }

		  if ($var[$i] != "CONDOMINIO"){
		  	  if ($var[$i] != "*"){ 
                 $nome_1 = $nome_1." ".$var[$i];
              }   
    	  	 $i++;
    	  } 
		  if ($var[$i] != "EDIFICIO"){
		  	  if ($var[$i] != "*"){ 
                 $nome_1 = $nome_1." ".$var[$i];
              }   
    	  	 $i++;
    	  } 

//		  echo $nome_1."<br>"; 
//          $i++;
          if ($var[$i] == "*")
          {
          	  $pax = $i;
              break;	
          }
          if ($i > 300)
          {
          	break;
          }
    }
    break;
}
//echo $nome_1."<br>";

$endereco = ' ';
$var_comp3 = ' ';
$pax--;
for ($i=$pax; $i < 100; $i++)
{
    while($var[$i] != "*")
    {
    	
   	     if ($var[$i] == "R"){
    	  	 $var_rua1 =  "RUA";
    	  	 $var_comp3 = $var_comp3." ".$var_rua1; 
    	  	 $i++;
    	  }
    	  if ($var[$i] == "AV"){
    	  	 $var_rua2 =  "AVENIDA";
    	  	 $var_comp3 = $var_comp3." ".$var_rua2;
    	  	 $i++;
    	  }
    	  if ($var[$i] != "R"){
    	  	 if ($var[$i] != "*"){ 
                $endereco_1 = $endereco_1." ".$var[$i];
             }   
    	  	 echo $var[$i]."<br>";
             $i++;
          }   
    	  if ($var[$i] != "AV"){
    	  	 if ($var[$i] != "*"){ 
                $endereco_1 = $endereco_1." ".$var[$i];
             }   
    	  	 echo $var[$i]."<br>";
             $i++;
          }   
//		  echo $endereco_1."<br>"; 
          if ($var[$i] == "*")
          {
          	  $pax = $i;
          	  $fara = "sim";
              break;
          }else
		  {
              if ($i > 600)
              {
          	     break;
              }
          	
          }
    }
          if ($fara == "sim")
          {
          	$fara = " ";
          	break;
          }

    if ($var[$i] == "*")
    {
       $i++;
    }
          if ($i > 300)
          {
          	break;
          }
}
//echo $endereco_1."<br>";

$numero = ' ';
$pax++;
for ($i=$pax; $i < 50; $i++)
{
    while($var[$i] != "*")
    {
          $numero_1 = $numero_1." ".$var[$i];
          	  $pax = $i;
          	  $fara = "sim";
              break;

//		  echo $endereco_1."<br>"; 
          $i++;
          if ($var[$i] == "*")
          {
          	  $pax = $i;
          	  $fara = "sim";
              break;
          }else
		  {
              if ($i > 50)
              {
          	     break;
              }
          	
          }
    }
          if ($fara == "sim")
          {
          	$fara = " ";
          	break;
          }

    if ($var[$i] == "*")
    {
       $i++;
    }
          if ($i > 50)
          {
          	break;
          }
}
//echo $numero_1."<br>";

$cep_1 = ' ';
$pax++;
for ($i=$pax; $i < 50; $i++)
{
    while($var[$i] != "*")
    {
          $cep_1 = $cep_1." ".$var[$i];
          	  $pax = $i;
          	  $fara = "sim";
              break;

//		  echo $cep_1.$var[$i]."<br>"; 
          $i++;
          if ($var[$i] == "*")
          {
          	  $pax = $i;
          	  $fara = "sim";
              break;
          }else
		  {
              if ($i > 50)
              {
          	     break;
              }
          	
          }
    }
          if ($fara == "sim")
          {
          	$fara = " ";
          	break;
          }

    if ($var[$i] == "*")
    {
       $i++;
    }
          if ($i > 50)
          {
          	break;
          }
}
//echo retirar_ponto($cep_1)."<br>";

$bairro_1 = ' ';
$pax++;
for ($i=$pax; $i < 100; $i++)
{
    while($var[$i] != "*")
    {
          $bairro_1 = $bairro_1." ".$var[$i];
//		  echo $bairro_1."<br>"; 
          $i++;
          if ($var[$i] == "*")
          {
          	  $pax = $i;
          	  $fara = "sim";
              break;
          }else
		  {
              if ($i > 600)
              {
          	     break;
              }
          	
          }
    }
          if ($fara == "sim")
          {
          	$fara = " ";
          	break;
          }

    if ($var[$i] == "*")
    {
       $i++;
    }
          if ($i > 300)
          {
          	break;
          }
}
//echo $bairro_1."<br>";

$cidade_1 = ' ';
for ($i=$pax; $i < 100; $i++)
{
    while($var[$i] != "*")
    {
          $cidade_1 = $cidade_1." ".$var[$i];
//		  echo $cidade_1."<br>"; 
          $i++;
          if ($var[$i] == "*")
          {
          	  $pax = $i;
          	  $fara = "sim";
              break;
          }else
		  {
              if ($i > 600)
              {
          	     break;
              }
          	
          }
    }
          if ($fara == "sim")
          {
          	$fara = " ";
          	break;
          }

    if ($var[$i] == "*")
    {
       $i++;
    }
          if ($i > 300)
          {
          	break;
          }
}
//echo $cidade_1."<br>";

$uf_1 = ' ';
for ($i=$pax; $i < 100; $i++)
{
    while($var[$i] != "*")
    {
          $uf_1 = $uf_1." ".$var[$i];
//		  echo $uf_1."<br>"; 
          $i++;
          if ($var[$i] == "*")
          {
          	  $pax = $i;
          	  $fara = "sim";
              break;
          }else
		  {
              if ($i > 600)
              {
          	     break;
              }
          	
          }
    }
          if ($fara == "sim")
          {
          	$fara = " ";
          	break;
          }

    if ($var[$i] == "*")
    {
       $i++;
    }
          if ($i > 300)
          {
          	break;
          }
}
//echo $uf_1."<br>";


echo $cnpj_1."<br>";
echo $var_comp2."<br>";
echo $nome_1."<br>";
echo $var_comp3."<br>";
echo $endereco_1."<br>";
echo $numero_1."<br>"; 
echo retirar_ponto($cep_1)."<br>";
echo $bairro_1."<br>";
echo $cidade_1."<br>";
echo $uf_1."<br>";


// Salva Sessao
session_start();

$_SESSION['cnpj']       = $cnpj_1;
$_SESSION['comp_nome']  = $var_comp2;
$_SESSION['nome_1']     = $nome_1;
$_SESSION['comp_end']   = $var_comp3; 
$_SESSION['endereco_1'] = $endereco_1; 
$_SESSION['numero_1']   = $numero_1; 
$_SESSION['cep_1']      = retirar_ponto($cep_1);
$_SESSION['bairro_1']   = $bairro_1;
$_SESSION['cidade_1']   = $cidade_1;
$_SESSION['uf_1']       = $uf_1;

// Abre Conexão com o MySql
include($path."conexao.php");
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
		document.getElementById("Edit2").focus();	
		}
		
		</script>
		<?
}
if (!empty($Edit2)){
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

<html>
<head>
<title><?=$Titulo;?></title>
</head>

<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

<script LANGUAGE="JavaScript">
<!-- Begin
nextfield = "Edit1";
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

</html>
<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; " onload="foco();">
<form style="margin-bottom: 0" id="Form1" name="Form1" method="post"  action="">
<table  width="824"   style="height:456px"  border="0" cellpadding="0" cellspacing="0"  ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 264px; WIDTH: 488px; POSITION: absolute; TOP: 80px; HEIGHT: 368px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(15, 15, 458 - 15, 338 - 15);
  Shape1_Canvas.fillRect(15, 15, 458 - 15 + 1, 338 - 15 + 1);
  Shape1_Canvas.setStroke(15);
  Shape1_Canvas.setColor("#5a9cb1");
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
  Shape2_Canvas.setColor("#5a9cb1");
  Shape2_Canvas.drawRect(1, 1, 422 - 1 + 1, 46 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 313px; WIDTH: 383px; POSITION: absolute; TOP: 119px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: #5a9cb1; height:32px;width:383px;"   ><P><STRONG>Buscar CNPJ/CPF</STRONG></P></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 3; LEFT: 296px; WIDTH: 424px; POSITION: absolute; TOP: 162px; HEIGHT: 254px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 422 - 1, 252 - 1);
  Shape3_Canvas.fillRect(1, 1, 422 - 1 + 1, 252 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("#5a9cb1");
  Shape3_Canvas.drawRect(1, 1, 422 - 1 + 1, 252 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 4; LEFT: 350px; WIDTH: 98px; POSITION: absolute; TOP: 180px; HEIGHT: 24px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px;  height:24px;width:98px;"   ><P><STRONG>CNPJ / CPF:</STRONG></P></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 5; LEFT: 456px; WIDTH: 176px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:150px; background-color: #FFFFFF;" onkeypress="return txtBoxFormat(document.Form1, 'Edit1', '99.999.999/9999', event);" onchange="Salva_sind1(this)"  onFocus="nextfield ='Edit2';" maxlength="15"  tabindex="0"    /><font size="4,5"><b>-??</b></font>
</div>

<div id="Memo1_outer" style="Z-INDEX: 8; LEFT: 315px; WIDTH: 392px; POSITION: absolute; TOP: 256px; HEIGHT: 56px">
<textarea id="Memo1" name="Memo1" style=" font-family: Verdana; font-size: 14px;  height:55px;width:392px; background-color: #FFFFFF;"  onchange="Salva_sind2(this)" onFocus="nextfield ='Edit1';"  tabindex="1"    wrap="virtual"><?=$Edit2;?></textarea>
</div>

<div id="Label3_outer" style="Z-INDEX: 9; LEFT: 318px; WIDTH: 242px; POSITION: absolute; TOP: 324px; HEIGHT: 20px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px;  height:20px;width:242px;"   ><A HREF="javascript:janelaSecundaria3('http://www.receita.fazenda.gov.br/PessoaJuridica/CNPJ/cnpjreva/Cnpjreva_Solicitacao.asp')" ><P><STRONG><u>Consultar Cadastro na Receita</u> </STRONG></P></A></div>
</div>
<div id="Label4_outer" style="Z-INDEX: 11; LEFT: 316px; WIDTH: 74px; POSITION: absolute; TOP: 239px; HEIGHT: 19px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px;  height:19px;width:74px;"   ><P><STRONG>cole aqui</STRONG></P></div>
</div>

<div id="Label5_outer" style="Z-INDEX: 12; LEFT: 346px; WIDTH: 322px; POSITION: absolute; TOP: 212px; HEIGHT: 24px">
<div id="Label5" style=" font-family: Verdana; font-size: 16px;  height:24px;width:322px;"  align="Center"   ><P><FONT color=#ff0000><STRONG><?=$mensagem;?></STRONG></FONT></P></div>
</div>

</td></tr></table>
</form></body>

<div id="Image3_outer" style="Z-INDEX: 10; LEFT: 368px; WIDTH: 92px; POSITION: absolute; TOP: 368px; HEIGHT: 22px">
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><img id="Image3" src="imagens/botaoazul_copy.PNG"  width="92"  height="22"  border="0"  onClick="goToURL()"     /></a></div>
</div>
<div id="Image1_outer" style="Z-INDEX: 6; LEFT: 468px; WIDTH: 92px; POSITION: absolute; TOP: 368px; HEIGHT: 22px">
<div id="Image1_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="incluir.php"><img id="Image1" src="imagens/botaoazul6.PNG"  width="92"  height="22"  border="0"       /></a></div>
</div>
<div id="Image2_outer" style="Z-INDEX: 7; LEFT: 567px; WIDTH: 92px; POSITION: absolute; TOP: 368px; HEIGHT: 22px">
<div id="Image2_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="<?=$path;?>index.php" ><img id="Image2" src="imagens/botaoazul9.PNG"  width="92"  height="22"  border="0"       /></a></div>
</div>

</html>

<?

Function retirar_ponto($var){

$var = str_replace(".",             "",$var);

return($var);
}

?>
<script>
function janelaSecundaria3 (URL){ 
   window.open(URL,"janela3","width=670,height=730,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 
</script>
