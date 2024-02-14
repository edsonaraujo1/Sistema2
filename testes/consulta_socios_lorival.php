<?php

/**
 * @author holodek
 * @copyright 2007
 */

// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


$prc_daa = '11/2011';

$consulta  = "SELECT * FROM atendimento_soc WHERE SUBSTRING(DATINSC,4,7) = '$prc_daa' ORDER BY str_to_date(DATINSC,'%d/%m/%Y') DESC";
		
$resultado = @mysql_query($consulta);

$contr_0    = 0;
$emdia      = 0;
$desist     = 0;
$cat_fale   = 0;
$cat_apos   = 0;
$cat_dire   = 0;
$cat_remi   = 0;
$cat_isen   = 0;
$cat_opos   = 0;
$total_1    = 0;

		
		     while ($linha = mysql_fetch_array($resultado))
		       {
		
				    $id_conf   = $linha["id"];
					$cod       = $linha["CODP"];
					$inscr     = $linha["DATINSC"];
					
                    // Procurar Socio 
                    
					$consulta3  = "SELECT * FROM socios Where CODP = '$cod'";
					
					$resultado3 = @mysql_query($consulta3);
					
					$row3 = mysql_fetch_array($resultado3);
					
					$cod_opo = @$row3["COD"];
					$rg_opo  = @$row3["RGASSOC"];
					
					
					$nome      = @$row3["NOMEASSOC"];
					$rua       = @$row3["RUA"];
					$endereco  = @$row3["ENDRESID"];
					$numero    = @$row3["NUMERO"];
					$cep       = @$row3["CEPRES"];
					$bairro    = @$row3["BAIRRORES"];
					$cidade    = @$row3["CIDADERES"];
					$rg        = @$row3["RGASSOC"];
					$cpf       = @$row3["CPF"];
					
					$categoria = @$row3["CATEGORIA"];
					$inscricao = @$row3["DATINSC"];
					$mes_i     = @$row3["MES"];
					$ano_i     = @$row3["ANO"];
					$fone      = @$row3["TELEFONE"];
					
					
					echo "Atendimento em = ".SUBSTR($inscr,3,7)."<br>";
					
					
					echo "Matricula   = ".$cod."<br>";
					echo "Nome        = <b>".$nome."</b><br>";
					echo "Mensalidade = ".$mes_i."/".$ano_i."<br>";
					echo "Inscricao   = ".$inscricao."<br>";
					echo "<b>Telefones   = ".$fone."<br><br></b>";
					$total_1++;
					
}

echo "Total                  = ".$total_1;

?>