<?php

/**
 * @author holodek
 * @copyright 2010
 */

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$C0D_1 = "3693A";

$consulta0 = "SELECT * FROM socios WHERE CODP = '$C0D_1'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$dep_[1]   = $row0["CONJUGE"];
$dep_[2]   = $row0["FILHO01"];
$dep_[3]   = $row0["FILHO02"];
$dep_[4]   = $row0["FILHO03"];
$dep_[5]   = $row0["FILHO04"];
$dep_[6]   = $row0["FILHO05"];
$dep_[7]   = $row0["FILHO06"];
$dep_[8]   = $row0["FILHO07"];
$dep_[9]   = $row0["FILHO08"];
$dep_[10]  = $row0["FILHO09"];
$dep_[11]  = $row0["FILHO010"];

?>

<select type="text" id="Edit1" name="Edit1" value="" onfocus="this.className='anormal'" onblur="this.className='normal'" style=" font-family: Verdana; font-size: 14px; height:26px;width:441px;""    tabindex="0"    />

      <option value="Todos">Todos</option>

<?

for ($si = 1; $si < 11; $si++){
	
	
	if (!empty($dep_[$si])){
    ?>
      <option value="<?=$dep_[$si];?>"><?=$dep_[$si];?></option>
    <?
	}
}
?>

</select>
<br />
<?

$consulta1 = "SELECT * FROM dentista ORDER BY NOME";
	
$resultado1 = @mysql_query($consulta1);


?>

<select type="text" id="Edit1" name="Edit1" value="" onfocus="this.className='anormal'" onblur="this.className='normal'" style=" font-family: Verdana; font-size: 14px; height:26px;width:441px;""    tabindex="0"    />

      <option value="Selecione">Selecione</option>
<?
while ($linha1 = mysql_fetch_array($resultado1))
{
       $nome_de_0  = $linha1["NOME"];
?>

      <option value="<?=$nome_de_0;?>"><?=$nome_de_0;?></option>

<?

}
?>

</select>
