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

include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("GRID_MENSALIDADE");

if ($deixar == "SIM"){

$titulo_tabela = "'DEPENDENTES - TABELAS' Incluir";
?>

<html>
<head>
<title><?=$titulo_tabela;?></title>
</head>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

</html>

<?

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// retorna uma pesquisa

// Consulta Dependente
$consulta4 = "SELECT * FROM socios WHERE CODP = '$Edit2'";
	
$resultado4 = @mysql_query($consulta4);

$row4 = @mysql_fetch_array($resultado4);

$dep_[1]   = $row4["CONJUGE"];
$dep_[2]   = trim($row4["FILHO01"]);
$ani_[2]   = trim($row4["DAT01"]);
$dep_[3]   = trim($row4["FILHO02"]);
$ani_[3]   = trim($row4["DAT02"]);
$dep_[4]   = trim($row4["FILHO03"]);
$ani_[4]   = trim($row4["DAT03"]);
$dep_[5]   = trim($row4["FILHO04"]);
$ani_[5]   = trim($row4["DAT04"]);
$dep_[6]   = trim($row4["FILHO05"]);
$ani_[6]   = trim($row4["DAT05"]);
$dep_[7]   = trim($row4["FILHO06"]);
$ani_[7]   = trim($row4["DAT06"]);
$dep_[8]   = trim($row4["FILHO07"]);
$ani_[8]   = trim($row4["DAT07"]);
$dep_[9]   = trim($row4["FILHO08"]);
$ani_[9]   = trim($row4["DAT08"]);
$dep_[10]  = trim($row4["FILHO09"]);
$ani_[10]  = trim($row4["DAT009"]);
$dep_[11]  = trim($row4["FILHO10"]);
$ani_[11]  = trim($row4["DAT10"]);

$si = 0;

?>

<br>
<br>
          
<table border=0  align=center>
<tr align=left colspan=2> 
<td><b><?=$titulo_tabela;?></b></td>
<div align=center>

<form type="hidden" method="POST" action="cadastrar_grid.php?Acao=insert">

<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
<tr>
<td>
<table border='1' align=center>

		   <td valign=top><b>LOGIN</b>
		   <th><b>TABELA</b>
		   <th><b>INCLUIR</b>
		   <th><b>ALTERAR</b>
		   <th><b>EXCLUIR</b>
		   <th><b>IMPRIMIR</b>
</td>

<tr> 
<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'>

 <input type="text"    name="Edit1" value="<?=$var_w2;?>" readonly  style=" font-family: Verdana; font-size: 14px; color: #696969;"/>
 
<td align='right'> <font style=' font-family: Verdana; font-size: 12px;'>

 <select type="text"   name="Edit2" style=" font-family: Verdana; font-size: 14px;">
 
<?

if (!empty($Edit2)){
	
	?>
	<option value="<?=$dep_[1];?>"><?=$dep_[1];?></option>
	<?	
	
	for ($si = 2; $si < 11; $si++){
		
		if (!empty($dep_[$si])){

           $soma1 = date('Y') - substr($ani_[$si],6,4);
           
           if ($soma1 >= 18){ 
           	
           	   
           	   $maior_18 = "|&nbsp;e Maior de 18 anos";
			   ?>
			   <option value="<?=$dep_[$si];?>"><?=$dep_[$si];?><?=$maior_18;?></option>
			   <?
			   $maior_18 = "";
			   
		   }else{
		   	
			   ?>
			   <option value="<?=$dep_[$si];?>"><?=$dep_[$si];?></option>
			   <?
		   	  
		   }

		}
	}

}else{

	?>
	<option value="<?=$Edit2;?>"><?=$Edit2;?></option>
	<?	
	
	for ($si = 1; $si < 11; $si++){
		
		$Edit4 = $dep_[$si];
		
		if (!empty($Edit2)){
	    ?>
	      <option value="<?=$Edit2;?>"><?=$Edit2;?></option>
	    <?
		}
	}
	
}

?>

</select>
 
 
 
<td align='center'> <font style=' font-family: Verdana; font-size: 12px;'>

 <select type="text"    name="Edit3"  style=" font-family: Verdana; font-size: 14px; ">
 
 	<option value="<?=$Edit3;?>"> <?=$Edit3;?> </option>
            <option value="SIM"> SIM </option>
            <option value="NAO"> NAO </option>

</select>

 
<td align='center'> <font style=' font-family: Verdana; font-size: 12px;'>

 <select type="text"    name="Edit4"   style=" font-family: Verdana; font-size: 14px; ">
 
  	<option value="<?=$Edit4;?>"> <?=$Edit4;?> </option>
            <option value="SIM"> SIM </option>
            <option value="NAO"> NAO </option>

</select>

<td align='left'> <font style=' font-family: Verdana; font-size: 12px;'>

 <select type="text"    name="Edit5"   style=" font-family: Verdana; font-size: 14px; ">
 
  	<option value="<?=$Edit5;?>"> <?=$Edit5;?> </option>
            <option value="SIM"> SIM </option>
            <option value="NAO"> NAO </option>

</select>

<td align='center'> <font style=' font-family: Verdana; font-size: 12px;'>

 <select type="text"    name="Edit6"  style=" font-family: Verdana; font-size: 14px; ">
 
  	<option value="<?=$Edit6;?>"> <?=$Edit6;?> </option>
            <option value="SIM"> SIM </option>
            <option value="NAO"> NAO </option>

</select>

<td>
<input type=image name="Incluir" src='../imagens/cadastrar.gif'><td>
<A HREF='javascript:history.go(-1)'><img alt='Cancelar' id='Image2' src='../imagens/cancelar.gif' border='0'></A><td>

</form>
</font>
</td>
</table>
<?

echo "
		      
	</table>
	</td>
	</tr>
	</table>
	</div>";

?>
<div align="center">
</div>
<?
}else{
	
include("enaaurlnp.php");
	
}
?>