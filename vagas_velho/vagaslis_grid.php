<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Listagem na Tela por Codigo
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require("../logar.php");
$nome3 = $_SESSION["nome_log"];

require("menu.php");

?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>
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

// Resgata a Sessao
session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);



$sql  = "SELECT * FROM vaga WHERE COD >= '$Cod_2' ORDER BY cod ASC";
   
if (!empty($Opcao)){
}else{
	
   $Procura = 2; 
   $Opcao   = "CODIGO";
	
}
if ($Opcao == "CODIGO"){

   $sql  = "SELECT * FROM vaga WHERE COD >= '$Procura' ORDER BY cod ASC";
	
}
if ($Opcao == "FUNÇÃO"){

   $sql  = "SELECT * FROM vaga WHERE FUNCAO >= '$Procura' ORDER BY FUNCAO ASC";
	
}
if ($Opcao == "ADM./EDIF."){

   $sql  = "SELECT * FROM vaga WHERE NOME >= '$Procura' ORDER BY NOME ASC";
	
}
if ($Opcao == "CONTATO"){

   $sql  = "SELECT * FROM adms WHERE CONTATO >= '$Procura' ORDER BY CONTATO ASC";
	
}

$faz = 1;

// Número de registros por página
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

	echo "
	
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadvagas.php'>
     <td><input type=image name='Consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>";
	
}
else {
	
      echo "
          <br>
          <br>
          
          <table border=0  align=center>
          <tr align=center colspan=2> 


          <form method='POST' action='cadvagas.php'>
          <td><input type=image name='incluir' src='../imagens/botao_voltar.PNG'></td>
          </form>

          <div align=center>

          <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
          <tr>
          <td>
          <table border='1' align=center>";


       while ($linha = mysql_fetch_array($resultado))
       {

	$cod      = $linha["COD"];
	$data     = $linha["FUNCAO"];
	$cond     = $linha["QTD"];
	$nome     = $linha["NOME"];
	$rua      = $linha["SITU"];
	$endereco = $linha["TELEFONE"];


        if ($faz == 1){
           ?>
           
	   <td valign=top><b>COD</b><th><b>FUNÇÃO</b><th><b>QTD</b><th><b>NOME</b><th><b>PREENCHIDA</b><th><b>FONE</b></td>
           
           <?
           $faz = 0;
        }

        echo "

        <tr> 
	<td valign=top><a href=cadvagas.php?Cod_xxx=$cod><b>$cod</b></a><td>$data<td>$cond<td>$nome<td>$rua<td>$endereco</td>
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
	
	         <form method='POST' action='cadvagas.php'>
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
		echo " <a href=\"?lista=$proxima\">[Próxima]</a>";
	}
}
?>
</div>
