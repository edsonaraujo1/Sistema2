<?
/**
 * @author holodek
 * @copyright 2007
 */

// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$consta = 0;
$naoconsta = 0;
$conta_1 = 0;

// panl_contribuintes 
// panl_aposentados 
// panl_diretores
// panl_remidos


$consulta  = "SELECT * FROM panl_diretores";
		
$resultado = @mysql_query($consulta);


		
		     while ($linha = mysql_fetch_array($resultado))
		       {
		
				    $id_pesq   = $linha["id"];
					$cod       = $linha["CODP"];
					$nome      = $linha["NOME"];
					$cpf       = $linha["CPF"];
					$mes       = $linha["MES"];
					$ano       = $linha["ANO"];
					$insc      = $linha["INSCRI"];
					$cate      = $linha["CATEGORIA"];
					
					// Verifica se ja existe consulta pelo codigo

					$consulta3  = "SELECT * FROM plan_josenildo WHERE CODP = '$cod'";
					
					$resultado3 = @mysql_query($consulta3);
					
					$row3 = @mysql_fetch_array($resultado3);
					
					$cod_codp  = @$row3["CODP"];
					$id_conf   = @$row3["id"];
					
					echo "Primeiro teste COD = ". $cod ."<br>";
					
					if (!empty($cod_codp)){
						
						echo "1º Achou...<br><br>";
						// Atualiza
						
						$consulta_up = "UPDATE plan_josenildo SET EXISTIA = 'SIM',
								                                  CPF     = '$cpf',
																  MES     = '$mes',
																  ANO     = '$ano',
																  INSCRI  = '$insc' WHERE id = '$id_conf'";
						
						@mysql_query($consulta_up, $link);
                    	
                    	$consta++;
 						
			
					}else{
								
								echo "Incluido ".$nome."<br>";

								// Inclui na Tabela

//echo $cod."<br>";
//echo $insc."<br>";
//echo $cate."<br>";
//echo $nome."<br>";
//echo $cpf."<br>";
//echo $mes."<br>";
//echo $ano."<br>";
//echo $exit."<br>";
								
					            $exit      = "NAO";
									
								$consulta9 = "INSERT INTO plan_josenildo  (CODP,
                                    								       INSCRI,
																           CATEGORIA,
																		   NOME,
																		   CPF,
																		   MES,
																		   ANO,
																		   EXISTIA)
								                VALUES
								                                   ('$cod',
																    '$insc',
																	'$cate',
																	'$nome',
																	'$cpf',
																	'$mes',
																	'$ano',
																	'$exit')";
			
									
									
									
								@mysql_query($consulta9, $link);
/*								
								 or
		
		die("
		     <br>
		     <br>
		     
		     <font face=arial><b>*** Falha na Inclusão !!! ***</b>
             ");

*/								
								
								$naoconsta++;
								
								
								
					} // 1º If CODIGO
					$conta_1++;
					
					if ($conta_1 == 10){
						
						//break;
					}
				}  //  While	

echo "Resultado da Pesquisa<br><br>";				
echo "Registros Incluidos ... " . $naoconsta."<br>";
echo "Registro ja existentes ... " . $consta;				

?>
