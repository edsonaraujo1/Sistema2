<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Listagem na Tela por Codigo
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/
include("../config.php");

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);
$nome3 = $_SESSION["nome_log"];

include("vaurls.php");

$deixar = acesso_url("FORM_CRACHA");

if ($deixar == "SIM"){
	
	include_once('java2_js.php');

    include("../menu_sub2.php");

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

<?

// Abre Conex�o com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("<br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** N�o foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='../menu_1.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


@mysql_select_db($db)
        or

die("<br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** N�o Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='../menu_1.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// retorna uma pesquisa

// Resgata a Sessao
@session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);

//if (!empty($Cod_2)){

//   $Procura = $Cod_2; 
//   $Opcao   = "ID";
	
//}
if (!empty($Opcao)){
}else{
	
   $Procura = 1; 
   $Opcao   = "ID";
	
}

if ($Opcao == "LOGIN"){

    $sql  = "SELECT * FROM cracha WHERE nome_guera >= '$Procura' ORDER BY nome_guera ASC";
}
if ($Opcao == "SENHA"){

    $sql  = "SELECT * FROM cracha WHERE nome >= '$Procura' ORDER BY senha ASC";
}
if ($Opcao == "NOME"){

    $sql  = "SELECT * FROM cracha WHERE cpf >= '$Procura' ORDER BY cpf ASC";
}
if ($Opcao == "ID"){

    $sql  = "SELECT * FROM cracha WHERE id >= '$Procura' ORDER BY id ASC";
}

if ($Opcao == "CODIGO"){

    $sql  = "SELECT * FROM cracha ORDER BY id ASC";
}

$faz = 1;

// N�mero de registros por p�gina
$registros_pagina = "15";

$lista = (int)$_GET["lista"];

if(!$lista) {
	$pc = "1";
}
else {
	$pc = $lista;
}

$inicio = $pc - 1;
$inicio = $inicio * $registros_pagina;

$resultado = mysql_query("$sql LIMIT $inicio, $registros_pagina");

$todos = mysql_query("$sql");

$tr = mysql_num_rows($todos);

$tp = $tr / $registros_pagina;

if(mysql_num_rows($resultado) < 1) {

	echo "<br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Registro N�o Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadastro.php'>
     <td><input type=image name='Consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>";
	
}
else {
	
      echo "<table border=0  align=center>
          <tr align=center colspan=2> 


          <form method='POST' action='cadastro.php'>
          <td><input type=image name='incluir' src='../imagens/botao_voltar.PNG'></td>
          </form>

          <div align=center>

          <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
          <tr>
          <td>
          <table border='1' align=center>";


       while ($linha = mysql_fetch_array($resultado))
       {

	$Edit1     	= $linha["id"];
	$Edit2	  	= $linha["nome_guera"];
	$Edit3   	= $linha["nome"];
	$Edit4  	= $linha["cargo"];
	$Edit5  	= $linha["cpf"];
	$Edit6      = $linha["matricula"];
	$Edit7      = $linha["rg"];


        if ($faz == 1){
           ?>
           
	   <td valign=top><b>MATRICULA</b><th><b>NOME GUERRA</b><th><b>CARGO</b><th><b>RG</b><th><b>CPF</b></th></th></td>
           
           <?
           $faz = 0;
        }

        echo "

        <tr> 
	<td valign=top><a href=cadastro.php?Cod_xxx=$Edit1><b>$Edit6</b></a><td>$Edit2<td>$Edit4<td>$Edit7<td>$Edit5</td>
";


	}

     echo "
		      
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>


	         <table border=0  align=center>
	         <tr align=center colspan=2> 
	
	         <form method='POST' action='cadastro.php'>
	         <td><input type=image name='incluir' src='../imagens/botao_voltar.PNG'></td>
	         </form>
	          
	         </table>";

?>
<div align="center">
<?
	$tp = ceil($tp);
	if($pc>1) {
		$anterior = $pc - 1;
		echo "<a href=\"?lista=$anterior\">[Anterior]</a>";
	}
	for($i=$pc-5;$i<$pc;$i++) {
		if($i<=0) {
		}
		else {
			echo "<a href=\"?lista=$i\">";
			if($i=="$pc") {
				echo "<b>[$i]</b>";
			}
			else {
				echo "[$i]";
			}
			echo "</a> ";
		}
	}
	for($i=$pc;$i<=$pc+5;$i++) {
		if($i==$tp) {
			echo "<a href=\"?lista=$i\">";
			if($i=="$pc") {
				echo "<b>[$i]</b>";
			}
			else {
				echo "[$i]";
			}

			echo "</a> ";
			break;
		}
		else {
			echo "<a href=\"?lista=$i\">";
			if($i=="$pc") {
				echo "<b>[$i]</b>";
			}
			else {
				echo "[$i]";
			}
			echo "</a> ";

			if($i==$pc+5 && $tp>$pc+5) {
				echo " ... <a href=\"?lista=$tp\">[$tp]</a>";
			}
		}
	}
	if($pc<$tp) {
		$proxima = $pc + 1;
		echo " <a href=\"?lista=$proxima\">[Pr�xima]</a>";
	}
}
?>
</div>
<?
}else{

include("enaaurlnp.php");
	
}
?>