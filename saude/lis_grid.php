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

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("FORM_SAUDE");

if ($deixar == "SIM"){

?>

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
		window.location="cadastro.php";
   }
   
}
//-->
</script>

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

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
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

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
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

// Atualiza arquivo Log
$data_log = date("d/m/Y");
$hora_log = date("H:i:s"); 
$even_log = "LISTA CONSULTA Medico/";
				
$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
				 VALUES
				('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
				
@mysql_query($consulta_log, $link);


// Resgata a Sessao
session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);


//echo $Procura."<br>";
//echo $Opcao."<br>";
//echo $Cod_2;

if (!empty($Opcao)){
	
	
}else{
	
   $sql  = "SELECT * FROM saude_atendi WHERE id >= 1 ORDER BY id ASC";
	
}

if(!empty($Procura)){
	
	
}else{

   $sql  = "SELECT * FROM saude_atendi WHERE id >= '$Cod_2' ORDER BY id ASC";

}


if ($Opcao == "MATRICULA"){

    $sql  = "SELECT * FROM saude_atendi WHERE matricula >= '$Procura' ORDER BY matricula";
}
if ($Opcao == "TITULAR"){

    $sql  = "SELECT * FROM saude_atendi WHERE titular >=  '$Procura' ORDER BY titular";
}
if ($Opcao == "DEPENDENTE"){

    $sql  = "SELECT * FROM saude_atendi WHERE dependente >=  '$Procura' ORDER BY dependente";
}
if ($Opcao == "MEDICO"){

    $sql  = "SELECT * FROM saude_atendi WHERE dentista >= '$Procura' ORDER BY dentista";
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
          <td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
          </form>

          <div align=center>

          <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
          <tr>
          <td>
          <table border='1' align=center>";


       while ($linha = mysql_fetch_array($resultado))
       {

    $id       = $linha["id"];
	$cod      = $linha["matricula"];
	$cpf      = $linha["titular"];
	$nome     = $linha["data"];
	$endereco = $linha["procedimento"];
	$numero   = $linha["CURSOS_1"];
    $novo     = $linha["id"];
    $depend   = $linha["dependente"];

    if ($depend != 'TITULAR'){
    	
    	$cpf = $depend;
    	
    }


        if ($faz == 1){
           ?>
           
	   <td valign=top><b>MATRICULA</b><th><b>TITULAR/Dependetes</b><th><b>DATA</b><th><b>PROCEDIMENTO</b></td>
           
           <?
           $faz = 0;
        }

        echo "

        <tr> 
	<td valign=top><a href=cadastro.php?cod_5=$novo><b>$cod</b></a><td>$cpf<td align='right'>$nome<td>$endereco</td>
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
	         <td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
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
