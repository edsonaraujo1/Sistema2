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

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

require("menu.php");

?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>
</html>

<?

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


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = "CONSULTA MENSALIDADE/".$cod.$nu;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);

// retorna uma pesquisa

$sql  = "SELECT * FROM aberto_soc WHERE CODP = '$Cod_2' ORDER BY CODP ASC";
	

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

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Nenhuma Mensalidade Encontrada !!! ***</b>
     <table align=center>
     <form method='POST' action='cadsocios.php?cod_1=$Cod_2'>
     <td><input type=image name='Consulta' src='imagens/botao_voltar.PNG'></td>
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
          <br>
          
          <table border=0  align=center>
          <tr align=center colspan=2> 

          <div align=center>

          <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
          <tr>
          <td>
          <table border='1' align=center>";


       while ($linha = mysql_fetch_array($resultado))
       {

	    $id       = $linha["id"]; 
	  	$coluna1  = $linha["COD"];
		$coluna2  = $linha["NU"];
		$coluna3  = $linha["MESANO"];
		$coluna4  = $linha["TOTAL"];
		$coluna5  = $linha["DESCRICAO"];
		$coluna6  = $linha["PAGTO"];
		$coluna7  = $linha["DAT_BAI"];
		$coluna8  = $linha["AGENCIA"];
		$mesano   = $linha["MESANO"];
		$varmes   = $linha["MES"];
		$varano   = $linha["ANO"];

        if ($faz == 1){
           ?>
           
  	       <td valign=top><b>MATRICULA</b><th><b>Mes/Ano Pago</b><th><b>VALOR R$</b><th><b>Descricao</b><th><b>Dt.Pago</b><th><b>Dt.Baixa</b><th><b>Agencia</b></td>
           
           <?
           $faz = 0;
        }

        echo "

        <tr> 
	    <td valign=top><b>$coluna1$coluna2</b><td>$coluna3<td align='right'>$coluna4<td>$coluna5<td>$coluna6<td>$coluna7<td align='right'>$coluna8</td>";


	}

     echo "
		      
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>


	         <table border=0  align=center>
	         <tr align=center colspan=2> 
	
	         <form method='POST' action='cadsocios.php?cod_1=$coluna1$coluna2'>
	         <td><input type=image name='incluir' src='imagens/botao_voltar.PNG'></td>
	         </form>
	          
	         </table>";


// Procedimento para Atualizar mensalidade da primeira tela

$var_cod = $coluna1.$coluna2;

if ($varano >= '2009'){
	
//$consulta = "UPDATE socios SET  MES  = '$varmes',
//                                ANO  = '$varano'  WHERE CODP = '$var_cod'";

//@mysql_query($consulta, $link);

}
     
	    
// Fim da Atualizacao da mensalidade da primeira tela	    
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
