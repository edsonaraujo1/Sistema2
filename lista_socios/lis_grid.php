<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Listagem na Tela
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("CADASTRO");

if ($deixar == "SIM"){

?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>
</html>

<?

// Abre Conex�o com o MySql
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
     <font face=arial><b>*** N�o foi possivel conectar !!! ***</b>
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
     <font face=arial><b>*** N�o Foi possivel selecionar o banco de dados !!! ***</b>
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

if($Cod_2 == 0){
	
	$Cod_2 = 1;
}

$sql  = "SELECT * FROM lis_fun_sind WHERE id >= '$Cod_2' ORDER BY id ASC";
   
if (!empty($Opcao)){
}else{
	
   $Procura = 1; 
   $Opcao   = "CODIGO";
	
}

if ($Opcao == "CNPJ"){

    $sql  = "SELECT * FROM lis_fun_sind WHERE cnpj >= '$Procura' ORDER BY cnpj ASC";
}
if ($Opcao == "CODIGO"){

    $sql  = "SELECT * FROM lis_fun_sind WHERE codigo >= '$Procura' ORDER BY codigo ASC";
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

	echo "
	
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
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
	
      echo "
          <br>
          <br>
          
          <table border=0  align=center>
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

    $id_cod   = $linha["id"];
	$cod      = $linha["codigo"];
	$data     = $linha["cnpj"];
	$cond     = $linha["nome"];
	$nome     = $linha["data"];
	//$rua      = $linha["NO_ADV1"];
	//$endereco = $linha["OBJETO"];


        if ($faz == 1){
           ?>
           
	   <td valign=top><b>CODIGO</b><th><b>CNPJ</b><th><b>NOME CONDOMINIO</b><th><b>DATA</b></td>
           
           <?
           $faz = 0;
        }

        echo "

        <tr> 
	<td valign=top><a href=cadastro.php?cod_3=$id_cod><b>$cod</b></a><td>$data<td>$cond<td>$nome</td>
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
