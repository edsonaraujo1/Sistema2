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
session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("GRID_CATEGORIA");

if ($deixar == "SIM"){


$titulo_tabela = "2ª Tela de 'ANDAMENTO' Alterar";
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
}
//-->
</script>

        <script language="JavaScript">
        function foco(){
		document.getElementById("data").focus();	
		}
		
		</script>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>
		
<body onkeydown="javascript:if (event.KeyCode==13) event.KeyCode=9; javascript:document.onkeydown = keyCatcher();" onload="foco();">          


<?php

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// retorna uma pesquisa

$sql  = "SELECT * FROM acompa_2 WHERE id = '$Cod_2'";

$resultado = @mysql_query($sql);
	
$row = mysql_fetch_array($resultado);

$id_codigo = @$row["id"];
$data      = @$row["DATA_PRO"];
$andamento = @$row["ANDAMENTO"];


$faz = 1;

?>
<br>
<br>
          
<table border=0  align=center>
<tr align=left colspan=2> 
<td><b><?php echo $titulo_tabela ?></b></td>
<div align=center>

<form type="hidden" method="POST" action="cadastrar.php?Acao=update">

<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?php echo $color_bor ?>'>
<tr>
<td>
<table border='1' align=center>

          
		   <td valign=top><b>DATA</b>
		   <th><b>ANDAMENTO</b>
		   </td>

<tr> 
<td align='left'> <font style=' font-family: Verdana; font-size: 14px;'> <b><input type="text" name="data" value="<?php echo $data ?>"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px;" onfocus="this.className='anormal';" onblur="this.className='normal'"></b>
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'> <input type="text" name="andamento"  value="<?php echo $andamento ?>"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:378px;" onfocus="this.className='anormal';" onblur="this.className='normal'">
<input type="hidden" name="id" value="<?php echo $id_codigo ?>"/>
<td>
<input type=image name="Alterar" src='../imagens/atualizar.gif'><td>
<A HREF='javascript:history.go(-1)'><img alt='Cancelar' id='Image2' src='../imagens/cancelar.gif' border='0'></A><td>

</form>
</font>
</td>
</table>
<?php

echo "
		      
	</table>
	</td>
	</tr>
	</table>
	</div>";

?>
<div align="center">
</div>
<?php
}else{
	
include("enaaurlnp.php");
	
}
?>
