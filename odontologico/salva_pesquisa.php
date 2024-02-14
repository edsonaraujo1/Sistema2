<?
/*
 ----------------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Salvar info. digitadas em Sessao Soc
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ----------------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include("../conexao.php");
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);

$consulta0  = "SELECT * FROM $nome3 WHERE Nome1 = '$nome3'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$Edit10	    = @$row0["Edit10"];

// Codigo do Edificios
	
$add1 = "UPDATE $nome3 SET Edit1    = '$Edit10' WHERE Nome1 = '$nome3'";
@mysql_query($add1, $link);


    $Edit1 = $Edit10;
   
    // Consulta Socio

	$consulta10  = "SELECT * FROM socios    WHERE CODP = '$Edit1'";
	
	$resultado10 = @mysql_query($consulta10);
	
	$row10 = @mysql_fetch_array($resultado10);
	
	$id_soc		= @$row10["id"];
	$cod_soc    = @$row10["COD"];
	$new_fot    = @$row10["CODP"];
	$nu_cod	    = @$row10["NU"];
	$rg_soc     = Trim(@$row10["RGASSOC"]);
	$cpf_soc  	= @$row10["CPF"];
	$insc_soc 	= @$row10["DATINSC"];
	$cate_soc	= @$row10["CATEGORIA"];
	$edif_soc	= @$row10["CODEDIF"];
	$nome_soc	= @$row10["NOMEASSOC"];
	$end_soc	= Trim(@$row10["RUA"])." ".Trim(@$row10["ENDRESID"]).",".Trim(@$row10["NUMERO"]);
	$cep_soc	= @$row10["CEPRES"];
	$mes_pg_soc = @$row10["MES"];
	$ano_pg_soc = @$row10["ANO"];
	$dat_nascim = @$row10["DATNASC"];
	$carg_asso  = @$row10["CARGOASSOC"];
	$esta_civil = @$row10["ESTCIVIL"];
	$natural_de = @$row10["NASCION"];
	$bairro_res = @$row10["BAIRRORES"];
	$cart_trab  = @$row10["CARTTRAB"]."-".@$row10["SERIE"]."-".@$row10["EMISCART "];


	$consulta10b  = "SELECT * FROM odontologico  WHERE matricula = '$Edit1' ORDER BY str_to_date( data, '%d/%m/%Y') DESC, id DESC LIMIT 0,1";
	
	$resultado10b = @mysql_query($consulta10b);
	
	$row10b = mysql_fetch_array($resultado10b);
	
	$odo_data	= @$row10b["data"];
	$odo_pep    = @$row10b["dependente"];
	$odo_dent   = @$row10b["dentista"];
	$odo_proc   = @$row10b["procedimento"];


	if (!empty($id_soc)){

		if ($cate_soc == "C"){
			//$menssagem1 = "................................";
		}
		if ($cate_soc == "D"){
			//$menssagem1 = "Candidato DESISTENTE";
		}
		if ($cate_soc == "I"){
			//$menssagem1 = "................................";
		}
		if ($cate_soc == "O"){
			//$menssagem1 = "Candidato com CARTA DE OPOSICAO";
		}
		if ($cate_soc == "F"){
			//$menssagem1 = "Candidato consta como FALECIDO";
		}
		if ($cate_soc == "R"){
			//$menssagem1 = "................................";
		}else{
	
	
			$Edit5  = $insc_soc;
			$Edit27 = $mes_pg_soc;
			$Edit28 = $ano_pg_soc;
			
			/* Variaveis do Sistema */
			$qtd          = 0;
			$qtd_fim      = 0;
			$valor_3      = 0;
			$ins_cri_sa   = $Edit5; 
			$mes_inicio   = $Edit27;
			$ano_inicio   = $Edit28;
			$mes_hj       = intval(date("m"));
			$ano_hj       = intval(date("Y"));
			$fim_insc_ano = substr($ins_cri_sa,6,4); /* Retira o ano da Inscricao */
			$fim_insc_mes = substr($ins_cri_sa,3,2); /* Retira o mes da Inscricao */
			
			/* Compara Ano e Mes de Inscricao */
			if (intval($fim_insc_ano) >= $ano_hj and intval($fim_insc_mes) >= $mes_hj){
				/* Socios em Dia com Pagamento */
				//echo "Socio em Dia !!!";
			}else{
				/* Verifica mes e ano de pagamento */
				if($mes_inicio == 0 and $ano_inicio == 0){
					$mes_inicio = intval($fim_insc_mes);
					$ano_inicio = intval($fim_insc_ano);
				}
			
					//echo "Mes e ano pagos = ".trim($mes_inicio)."/".trim($ano_inicio)."<br><br>";
					/* Calcula quantidade me mensalidade devedora */
					while ($ano_inicio < $ano_hj)
					{
						$qtd++;
						If($mes_inicio != 12)
						{
						    $mes_inicio++;
						}else{
							$mes_inicio = 1;
							$ano_inicio++;
						}
					}
					while($ano_inicio == $ano_hj)
					{
						if($ano_inicio == $ano_hj and $mes_inicio >= $mes_hj)
						{
						   $qtd = 0;
						   break;
						}
						$mes_inicio++;
						$qtd++;
						if($mes_inicio == $mes_hj)
						{
							break;
						}
					}
					/* Calcula Valor devedor */
					if ($qtd > 0)
					{
					   $qtd_fim = $qtd - 1;
					   $valor_3 = $qtd_fim * 8.00;
					}
					//echo $cate_soc;

					$texto_rg = $rg_soc;
					
					$eli_rg1 = str_replace("-"," ",$texto_rg);
					$eli_rg2 = str_replace("."," ",$eli_rg1);
					$valor_rg = str_replace(" ","",$eli_rg2);
						
					// Abre Tabela Oposicao
					
					$consulta6  = "SELECT * FROM oposicao3 Where RGASSOC = '$valor_rg'";
					
					$resultado6 = @mysql_query($consulta6);
					
					$row6 = mysql_fetch_array($resultado6);
					
					$cod_opo = @$row6["COD"];
					$rg_opo  = @$row6["RGASSOC"];
					$cpf_opo = @$row6["CPF"];
					
					if (strlen(trim($rg_opo)) > 0){
					   $cate_soc = "O";	
					}

					$texto_cpf = $cpf_soc;
					
					$eliminar1 = str_replace("-"," ",$texto_cpf);
					$eliminar2 = str_replace("."," ",$eliminar1);
					$valor_cp = str_replace(" ","",$eliminar2);
					
					$consulta7  = "SELECT * FROM oposicao3 Where CPF = '$valor_cp'";
					
					$resultado7 = @mysql_query($consulta7);
					
					$row7 = mysql_fetch_array($resultado7);
					
					$cod_opo = @$row7["COD"];
					$rg_opo  = @$row7["RGASSOC"];
					$cpf_opo = @$row7["CPF"];
					
					if (strlen(trim($cpf_opo)) > 0){
					   $cate_soc = "O";	
					}
					
					}
			}
	
//echo $nome_soc."<br>";
//echo $mes_pg_soc."<br>";
//echo $nome3."<br>";
	
		    $add1 = "UPDATE $nome3 SET Edit1    = '$Edit1',
		                               Edit2    = '$nome_soc',
		                               Edit3    = '$mes_pg_soc',
		                               Edit4    = '$ano_pg_soc',
			 					       Edit5    = 'TITULAR',
								       Edit6    = '',
								       Edit7    = '',
								       Edit8    = '$insc_soc',
									   mensage1 = '$menssagem1' WHERE Nome1 = '$nome3'";
									   
									   
						@mysql_query($add1, $link);

}
include("layout_opo.php");
?>
