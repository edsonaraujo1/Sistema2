<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Imprimir Codigo de Barras 
 Criado em Data.....: 05/05/2009
 Ultima Atualização : 06/05/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

header('Content-type: application/vnd.ms-excel');
header('Content-type: application/force-download');
header('Content-Disposition: attachment; filename=rel_sind.xls');
header('Pragma: no-cache');

// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);
// Realiza uma comsulta

$consulta  = "SELECT * FROM edificios WHERE id >= 1 ORDER BY id";
		
$resultado = @mysql_query($consulta);

$dat_rel = date("d/m/Y");
$soma_quant = 0;

?>

<div align='left'>
<table align="center">
<font style=' font-family: Verdana; font-size: 10px;'>Data.:<?=$dat_rel;?></font>
</table>
<td><img height='1' src="imagens/2.gif" width='978' border='0'/>
<table  border='0'  align='left' >
<td width='500px'>
			 
SIN EMPREG EDIFICIOS PORTEIROS CABINEIROS MUNICIPIO SP<br />
CODIGO SINDICAL =  <b>020.501.86200-0</b><br />
CNPJ = <b>43.070.481/0001-14</b><br />

<tr>
<td style=' font-family: Verdana; font-size: 1px;  height:1px;'><img height='1' src="imagens/2.gif" width='978' border='0'></td>
</tr>
</table>

</div>
<br/><br/><br/><br/>

<table  border='0'align='center' >
<td width='800px' align='center'>
<b>RELATORIO DE CODIGO DE BARRA/LINHA DIGITAVEL E CNPJ<br/><br/></b>
</td>
</table>

<?		
while ($linha = mysql_fetch_array($resultado))
{
		
		$id_conf   = $linha["id"];
		$cod       = $linha["COD"];
		$cond      = $linha["COND"];
		$nome      = $linha["NOME"];
		$rua       = trim(strtoupper($linha["RUA"]));
		$endereco  = trim(strtoupper($linha["ENDRESID"]));
		$numero    = trim(strtoupper($linha["NUMERO"]));
		$ativ      = $linha["ATIV"];
		$cnpj_1    = $linha["CGC"];

		//$cnpj_ed    = retirar_carac3($cnpj_1);
		$exec       = "2009";
		$vencto     = "30/04/2009";
		$valor      = 0;
		$cod_intru  = 1;

        // Pesquiza contribuicao paga
        $sql  = "SELECT * FROM sindical WHERE SINDCOD = '$cod' AND VENCTO = '$vencto'";
	
	    $resultado2 = @mysql_query($sql);

        $row2 = @mysql_fetch_array($resultado2);

        $id          = @$row2["id"];
		$cod_SIND    = @$row2["SINDCOD"];
		$venc_SIND   = @$row2["VENCTO"];

		if (!empty($id))
		{
//			$cat_echo = $cod_SIND."  Pagou...<br>";
			
            $soma_quant++;
            echo "CNPJ ".$cnpj_1."<br>";
				
			
		}else{

            $soma_quant++;
            echo "CNPJ ".$cnpj_1."<br>";
	
			//echo $numero_digitavel."<br>";
            
			//echo CodigoDeBarra(ltrim(Sonumeros($numero_barra)))."<br>";
			        
            }
}
echo "Total de Predios  ".$soma_quant;

?>