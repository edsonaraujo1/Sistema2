<?php
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
@session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include_once('../sql_injection.php');

include_once("funcoes2.php");

include("vaurls.php");

$deixar = acesso_url("FORM_MENSALIDADE");

if ($deixar == "SIM"){


// Regata Secao
@session_start();
$id_navega = $_SESSION['navega'];

if (!empty($id_navega)){
	
   $id_navega = $_SESSION['navega'];
	
}else{
	
   $id_navega = $Cod_2;	
}
?>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<body>

<script language="JavaScript"><!--

document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
   
   if (event.keyCode == 27) 
   {
		window.location="cadsocios.php?cod_3=<?php echo $id_navega ?>";
   }

}
//-->
</script>

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

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
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

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
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



// Abrir tabela Senha

$tabela_1 = strtoupper('aberto_soc');

$consulta3 = "SELECT * FROM permissoes WHERE login = '". anti_sql_injection($nome3) ."' and tabela = '". anti_sql_injection($tabela_1) ."'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

// retorna uma pesquisa


$consulta2  = "SELECT * FROM socios WHERE id = '". anti_sql_injection($id_navega) ."'";
	
$resultado2 = @mysql_query($consulta2);

$row2 = @mysql_fetch_array($resultado2);

$id_soc		= @$row2["id"];
$Edit1		= @$row2["COD"];
$new_fot    = @$row2["CODP"];
$Edit2	    = @$row2["NU"];


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = "CONSULTA MENSALIDADE/".$new_fot;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);


// Resgata Secao
@session_start();

$volta_1 = $_SESSION['volta_mensa'];

if(!empty($volta_1)){
	
	$new_fot = $volta_1;
}

$sql  = "SELECT * FROM aberto_soc WHERE CODP = '". anti_sql_injection($new_fot) ."' ORDER BY ANO ASC, MES ASC";

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

$resultado = @mysql_query("$sql LIMIT $inicio, $registros_pagina");

$todos = @mysql_query("$sql");

$tr = @mysql_num_rows($todos);

$tp = $tr / $registros_pagina;

if(@mysql_num_rows($resultado) < 1) {

	echo "
	
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Nenhuma Mensalidade Encontrada !!! ***</b>
     <table align=center>
     <form method='POST' action='cadsocios.php?cod_3=$id_soc'>
     <td><input type=image name='Consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>";

	 @session_start();
	 $_SESSION['volta_mensa'] = ''; 

}
else {
	
echo "
          <br>
          
          <table border=0  align=center>
          <tr align=center colspan=2> 


          <form method='POST' action='cadsocios.php?cod_3=$id_soc'>
          <td><input type=image name='incluir' src='../imagens/botao_voltar.PNG'></td>
          </form>";
	
     echo "
          <br>
 
	      <div align=center>
	
	      <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
	      <tr>
	      <td>
	      <table border='1' align=center>";


       while ($linha = @mysql_fetch_array($resultado))
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
		$coluna9  = $linha["CODP"];


        if ($faz == 1){
           ?>
           
  	       <td valign=top><b>MATRICULA</b>
		   <th><b>Mes/Ano Pago</b>
		   <th><b>VALOR R$</b>
		   <th><b>Descricao</b>
		   <th><b>Dt.Pago</b>
		   <th><b>Dt.Baixa</b>
		   <th><b>Agencia</b>
  	       <th><th></th>
           </td>
           
           <?php
           $faz = 0;
        }

	
	        ?>
	
	        <tr> 
		    <td valign=top align='center'><b><?php echo $coluna9 ?></b><td align='center'><?php echo $coluna3 ?><td align='right'><?php echo $coluna4 ?><td><?php echo $coluna5 ?><td><?php echo $coluna6 ?><td><?php echo $coluna7 ?><td align='right'><?php echo $coluna8 ?></td>
		    
		    <?php
		    if ($per2 == "SIM"){
		    ?>	
		    
			    <td><A HREF='excluir_mensa.php?Cod_2=<?php echo $id ?>&Acao=deletar'><img id='Image3' src='../imagens/excluir.gif' border='0'></A>
			<?php
			}
		    if ($per3 == "SIM"){
		    ?>	
			<td><A HREF='alterar_mensa.php?Cod_2=<?php echo $id ?>'><img id='Image3' src='../imagens/editar.gif' border='0'></A>
	
	        <?php
	        }
	        ?>
	        </td>
<?php	
		}
     echo "
		      
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>


	         <table border=0  align=center>
	         <tr align=center colspan=2> 
	
	         <form method='POST' action='cadsocios.php?cod_3=$id_soc'>
	         <td><input type=image name='incluir' src='../imagens/botao_voltar.PNG'></td>
	         </form>
	          
	         </table>";

@session_start();
$_SESSION['volta_mensa'] = ''; 

?>
<div align="center">
<?php
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
<?php
}else{
	
include("enaaurlnp.php");
	
}
?>
