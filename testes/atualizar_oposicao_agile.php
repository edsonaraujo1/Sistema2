<?php

/**
 * @author holodek
 * @copyright 2011
 */

// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$consulta  = "SELECT * FROM oposicao3";
		
$resultado = @mysql_query($consulta);

$contr_0    = 0;
$contr_1    = 0;
		
while ($linha = mysql_fetch_array($resultado))
{
		
				    $id_opos   = $linha["id"];
					$cnpj      = $linha["CNPJ"];
					$a1 = substr($cnpj,0,2);
					$a2 = substr($cnpj,2,3);
					$a3 = substr($cnpj,5,3);
					$a4 = substr($cnpj,8,4);
					$a5 = substr($cnpj,12,2);
					
					$nov_cnpj = $a1.".".$a2.".".$a3."/".$a4."-".$a5;
					
					echo $nov_cnpj."<br>";
					
					
					$cod_edif  = $linha["CODEDIF"];
					
                     // Pesquiza Edificio
                    $sql  = "SELECT * FROM edificios WHERE CGC = '$nov_cnpj'";	
	
	                $resultado5 = @mysql_query($sql);

                    $row5 = @mysql_fetch_array($resultado5);

                    $id_edif     = @$row5["id"];
                    $edi_cod     = @$row5["COD"];
                    $edif_cgc    = @$row5["CGC"];
                    
                    if (!empty($id_edif)){
                    	
                    	// Atualiza Socios
                    	
                    	
						$consulta_up = "UPDATE oposicao3 SET CNPJ = '$nov_cnpj', CODEDIF = '$edi_cod' WHERE id = '$id_opos'";
						
						@mysql_query($consulta_up, $link);
                    	
                    	$contr_0++;
                    	
                    	//echo "Atualizado<br><br>";
						//echo $cod."<br>";
                    	//echo $nome."<br>";
                    	
                    }else{
                    	
                    	//echo "Edif não Encontrado!!<br><br>";
                    	$contr_1++;
                    }
                    

break;

}

echo "Total Atualizado = ".$contr_0."<br>";
echo "Total Não Atualizado = ".$contr_1."<br>";

?>