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

$consulta  = "SELECT * FROM socios WHERE CODEDIF != 0 AND id >= 1 ORDER BY id ASC";
		
$resultado = @mysql_query($consulta);

$contr_0    = 0;
$contr_1    = 0;
		
while ($linha = mysql_fetch_array($resultado))
{
		
				    $id_conf   = $linha["id"];
					$cod       = $linha["CODP"];
					$nome      = $linha["NOMEASSOC"];
					$rua       = trim(strtoupper($linha["RUA"]));
					$endereco  = trim(strtoupper($linha["ENDRESID"]));
					$numero    = trim(strtoupper($linha["NUMERO"]));
					$cep       = trim(strtoupper($linha["CEPRES"]));
					$bairro    = trim(strtoupper($linha["BAIRRORES"]));
					$cidade    = trim(strtoupper($linha["CIDADERES"]));
					$rg        = trim(strtoupper($linha["RGASSOC"]));
					$cpf       = trim(strtoupper($linha["CPF"]));
					$cod_edif  = $linha["CODEDIF"];
					
					$categoria = $linha["CATEGORIA"];
					$inscricao = $linha["DATINSC"];
					$mes_i     = $linha["MES"];
					$ano_i     = $linha["ANO"];

                    //echo "Retornado<br><br>";
					//echo $cod."<br>";
                    //echo $nome."<br>";
                    //echo $cod_edif."<br>";


                   // Pesquiza Edificio
                    $sql  = "SELECT * FROM edificios WHERE COD = '$cod_edif'";	
	
	                $resultado5 = @mysql_query($sql);

                    $row5 = @mysql_fetch_array($resultado5);

                    $id_edif     = @$row5["id"];
                    $edif_cgc    = @$row5["CGC"];
                    
                    if (!empty($id_edif)){
                    	
                    	// Atualiza Socios
                    	
                    	
						$consulta_up = "UPDATE socios SET CNPJ_EDIF = '$edif_cgc' WHERE id = '$id_conf'";
						
						@mysql_query($consulta_up, $link);
                    	
                    	$contr_0++;
                    	
                    	echo "Atualizado<br><br>";
						echo $cod."<br>";
                    	echo $nome."<br>";
                    	
                    }else{
                    	
                    	//echo "Edif não Encontrado!!<br><br>";
                    	$contr_1++;
                    }
                    

}

echo "Total Atualizado = ".$contr_0."<br>";
echo "Total Não Atualizado = ".$contr_1."<br>";

?>