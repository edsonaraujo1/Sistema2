<?
/*
 ----------------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Salvar info. digitadas em Sessao
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ----------------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = strtolower($_SESSION["nome_log"]);

// Abre Conexão com o MySql
include("../conexao.php");
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);

// -- Codigo
if (!empty($_GET["Edit1"]))   {

    $Edit1 = $_GET["Edit1"];
	$add1 = "UPDATE $nome3 SET Edit1    = '$Edit1' WHERE Nome1 = '$nome3'";
	@mysql_query($add1, $link);
}
if (!empty($_GET["Edit2"]))   {
	
	
    $Edit2 = retirar_carac($_GET["Edit2"]);
   
    // Consulta Socio

	$consulta10  = "SELECT * FROM socios    WHERE CODP = '$Edit2'";
	
	$resultado10 = @mysql_query($consulta10);
	
	$row10 = @mysql_fetch_array($resultado10);
	
	$id_soc		= @$row10["id"];
	$cod_soc    = @$row10["COD"];
	$new_fot    = strtoupper(@$row10["CODP"]);
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
	$nascio_de  = @$row10["NASCION"];
	$natural_de = @$row10["NATURAL1"];
	$bairro_res = @$row10["BAIRRORES"];
	$cart_trab  = @$row10["CARTTRAB"]."-".@$row10["SERIE"]."-".@$row10["EMISCART "];
	$sexo       = @$row10["SEXO"];
	$escola     = @$row10["ESCOLARIDADE"];
	$civel      = @$row10["ESTCIVIL"];
	$cida_re    = @$row10["CIDADERES"];
	$esta_re    = @$row10["ESTADORES"];
	$fone_re    = @$row10["TELEFONE"];


	if (!empty($id_soc)){

		if ($cate_soc == "A"){
			//$menssagem1 = "................................";
		}
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
			
			// Verifica se Titular ja e cadastrado

			
			$consulta6b  = "SELECT * FROM clube_tiete WHERE MATRICULA = '$Edit2' ORDER BY N_LETRA DESC";
					
			$resultado6b = @mysql_query($consulta6b);
					
			$row6b = mysql_fetch_array($resultado6b);
					
            $cod_ass = @$row6b["CODIGO"];
			$cod_clu = @$row6b["MATRICULA"];
			$cod_let = @$row6b["LETRA"];
			$N_let   = @$row6b["N_LETRA"];
			
			if (!empty($cod_clu)){
				
				
				
				$consulta0i  = "SELECT * FROM clube_tiete WHERE CODIGO = '$cod_ass' AND MATRICULA = '$Edit2' AND N_LETRA = '$Edit23'";
					
				$resultado0i = @mysql_query($consulta0i);
									
				$row0i = @mysql_fetch_array($resultado0i);
									
				$id      = @$row0i["id"];
				$cod_2   = @$row0i["CODIGO"];
									
				
				//echo $Edit1."<br>";
				//echo $Edit2."<br>";
				//echo $Edit23."<br>";

				if (!empty($cod_2)){
										
					//echo 'ja cadastrado = '.$Edit1.$N_letX." em ".$Edit2;
					exit;
				}else{
				
				$N_let_x = $N_let + 1;
				
				if ($N_let_x == 1){ $nov_let = " "; }
				if ($N_let_x == 2){ $nov_let = "A"; }
				if ($N_let_x == 3){ $nov_let = "B"; }
				if ($N_let_x == 4){ $nov_let = "C"; }
				if ($N_let_x == 5){ $nov_let = "D"; }
				if ($N_let_x == 6){ $nov_let = "E"; }
				if ($N_let_x == 7){ $nov_let = "F"; }
				if ($N_let_x == 8){ $nov_let = "G"; }
				if ($N_let_x == 9){ $nov_let = "H"; }
				if ($N_let_x == 10){ $nov_let = "I"; }
				if ($N_let_x == 11){ $nov_let = "J"; }
				if ($N_let_x == 12){ $nov_let = "K"; }
				if ($N_let_x == 13){ $nov_let = "L"; }
				if ($N_let_x == 14){ $nov_let = "M"; }
				if ($N_let_x == 15){ $nov_let = "N"; }
				if ($N_let_x == 16){ $nov_let = "O"; }
				if ($N_let_x == 17){ $nov_let = "P"; }
				if ($N_let_x == 18){ $nov_let = "Q"; }
				if ($N_let_x == 19){ $nov_let = "R"; }
				if ($N_let_x == 20){ $nov_let = "S"; }
				if ($N_let_x == 21){ $nov_let = "T"; }
				if ($N_let_x == 22){ $nov_let = "U"; }
				if ($N_let_x == 23){ $nov_let = "V"; }
				if ($N_let_x == 24){ $nov_let = "X"; }
				if ($N_let_x == 25){ $nov_let = "Z"; }
				$Edit1 = $cod_ass;
				}
			}else{
				
				// nao faz nada
				$Edit21 = 0;
				$Edit1 = $cod_ass;
			}
			
	//echo $Edit1."<br>";
	//echo $new_fot."<br>";
	//echo $cod_let."<br>";
	//break;
	

		    $add2 = "UPDATE $nome3 SET      Edit1  = '$Edit1',
			                                Edit2  = '$new_fot',
										    Edit4  = '$nome_soc',
										    Edit5  = '$sexo',
										    Edit6  = '$dat_nascim',
										    Edit7  = '$nascio_de',
										    Edit8  = '$natural_de',
										    Edit9  = '$escola',
										    Edit10 = '$civel',
										    Edit11 = '$end_soc',
										    Edit12 = '$bairro_res',
										    Edit13 = '$cep_soc',
										    Edit14 = '$cida_re',
										    Edit15 = '$esta_re',
										    Edit16 = '$fone_re',
										    Edit19 = '$cpf_soc',
										    Edit20 = '$rg_soc',
										    Edit21 = '$Edit21',
										    Edit22 = '$nov_let',
									      mensage1 = '$menssagem1' WHERE Nome1 = '$nome3'";
									   
									   
									   
						@mysql_query($add2, $link);
						
						
	}else{
		
    $Edit2 = $_GET["Edit2"];
	$add2 = "UPDATE $nome3 SET Edit2    = '$Edit2' WHERE Nome1 = '$nome3'";
	@mysql_query($add2, $link);

		
	}
	
		//@mysql_query($add1, $link);
		
		                    if ($cate_soc == "O"){
		                    	
		                    	echo "
										<div id='popup' class='popup' style='Z-INDEX: 5000; LEFT: 189px; WIDTH: 632px; POSITION: absolute; TOP: 75px; HEIGHT: 320px' align='center'>
										<div align=center style='Z-INDEX: 100;'>
										<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
										<tr align='center'><td>
										<font face=arial size=2><img src='../imagens/W95MBX03.ICO' width='40' height='40' align='center'/><br />
										     <b>&nbsp;&nbsp;&nbsp;Socio com CARTA de OPOSICAO!!!&nbsp;&nbsp;&nbsp;<br />
										  	                  verifique cadastro de associados !!!!<br />
															 	  	   </b></font>
										<table align=center>
										<form method='POST' action='cadastro.php'>
										<td><input type=image name='sim' src='../imagens/botaoazul24.PNG'/></td>
										</form></table></td></tr></table></div>
										</div>";
		                    	
                    	//include("mensagemop.php");
                    	
	                }else{
	                	//echo $qtd_fim;
	                	if ($cate_soc == "C"){
	                	if($qtd_fim > 3){


	                		echo "
							
								<div id='popup' class='popup' style='Z-INDEX: 5000; LEFT: 189px; WIDTH: 632px; POSITION: absolute; TOP: 63px; HEIGHT: 320px' align='center'>
								<div align=center style='Z-INDEX: 5000;'>
								<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
								<tr align='center'><td>
								<font face=arial size=2><img src='../imagens/W95MBX03.ICO' width='40' height='40' align='center'/><br />
								     <b>&nbsp;&nbsp;&nbsp;Socio ATRASADO COM PAGAMENTO, acertar no CAIXA !&nbsp;&nbsp;&nbsp;<br />
								  	                  Quantidade de $qtd_fim Mensalidades atrasada num <br />
													 	  	   total de R$ $valor_3,00 Reais !!!</b><br /></font>
								<table align=center>
								<form method='POST' action='cadastro.php'>
								<td><input type=image name='sim' src='../imagens/botaoazul24.PNG'></td>
								</form></table></td></tr></table></div>
								</div>";
	                		
	                		
//	                	  include("mensagem.php");
	                	  
	                	}
	                	}
	                }



	
}
if (!empty($_GET["Edit3"]))   {

   $Edit3 = $_GET["Edit3"];
   $add3 = "UPDATE $nome3 SET Edit3    = '$Edit3'  WHERE Nome1 = '$nome3'";
   @mysql_query($add3, $link);

}
if (!empty($_GET["Edit4"]))   {

   $Edit4 = $_GET["Edit4"];


	$program    = $Edit4;
	$string     = $program;
	$array      = explode(',', $string);
	
	for ($si = 0; $si < strlen($program); $si++)
	{
	    $linha = $Campo."$si";
	    //echo $array[$si]."<br>";
	    $novo[$si] = $array[$si];
	    if (empty($array[$si])){
	    	//echo 'parei<br><br>';
	    	break;
	    }
	}
	if (!empty($novo[0])){ $Edit21  = $novo[0]; }
	if (!empty($novo[1])){ $Edit4   = $novo[1]; }

   $add4 = "UPDATE $nome3 SET Edit4    = '$Edit4',
                              Edit21   = '$Edit21' WHERE Nome1 = '$nome3'";
   @mysql_query($add4, $link);

}
if (!empty($_GET["Edit5"]))   {
	
   $Edit5 = $_GET["Edit5"];
   $add5 = "UPDATE $nome3 SET Edit5    = '$Edit5' WHERE Nome1 = '$nome3'";
   @mysql_query($add5, $link);
	
}
if (!empty($_GET["Edit6"]))   {

    $Edit6 = $_GET["Edit6"];
	$add6 = "UPDATE $nome3 SET Edit6   = '$Edit6' WHERE Nome1 = '$nome3'";
	@mysql_query($add6, $link);
	
}
if (!empty($_GET["Edit7"]))   {

    $Edit7 = $_GET["Edit7"];
    $add7 = "UPDATE $nome3 SET Edit7    = '$Edit7' WHERE Nome1 = '$nome3'";
    @mysql_query($add7, $link);

}
if (!empty($_GET["Edit8"]))   {

    $Edit8 = $_GET["Edit8"];
    $add8 = "UPDATE $nome3 SET Edit8    = '$Edit8' WHERE Nome1 = '$nome3'";
    @mysql_query($add8, $link);

}
// Cep
if (!empty($_GET["Edit9"]))   {

    $Edit9 = $_GET["Edit9"];
    $add9 = "UPDATE $nome3 SET Edit9    = '$Edit9' WHERE Nome1 = '$nome3'";
    @mysql_query($add9, $link);

}
// Codigo do Edificios
if (!empty($_GET["Edit10"]))  {
	
    $Edit10 = $_GET["Edit10"];
    $add10 = "UPDATE $nome3 SET Edit10    = '$Edit10' WHERE Nome1 = '$nome3'";
    @mysql_query($add10, $link);

}
if (!empty($_GET["Edit11"]))  {

    $Edit11 = $_GET["Edit11"];
	$add11 = "UPDATE $nome3 SET Edit11    = '$Edit11' WHERE Nome1 = '$nome3'";
	@mysql_query($add11, $link);

}

if (!empty($_GET["Edit12"]))  {

    $Edit12 = $_GET["Edit12"];
	$add12 = "UPDATE $nome3 SET Edit12    = '$Edit12' WHERE Nome1 = '$nome3'";
	@mysql_query($add12, $link);

}
if (!empty($_GET["Edit13"]))  {

    $Edit13 = $_GET["Edit13"];
	$add13 = "UPDATE $nome3 SET Edit13    = '$Edit13' WHERE Nome1 = '$nome3'";
	@mysql_query($add13, $link);

}
if (!empty($_GET["Edit14"]))  {

    $Edit14 = $_GET["Edit14"];
	$add14 = "UPDATE $nome3 SET Edit14     = '$Edit14' WHERE Nome1 = '$nome3'";
	@mysql_query($add14, $link);

}
if (!empty($_GET["Edit15"]))  {

    $Edit15 = $_GET["Edit15"];
	$add15 = "UPDATE $nome3 SET Edit15     = '$Edit15' WHERE Nome1 = '$nome3'";
	@mysql_query($add15, $link);

}
if (!empty($_GET["Edit16"]))  {

    $Edit16 = $_GET["Edit16"];
	$add16 = "UPDATE $nome3 SET Edit16     = '$Edit16' WHERE Nome1 = '$nome3'";
	@mysql_query($add16, $link);

}
if (!empty($_GET["Edit17"]))  {

    $Edit17 = $_GET["Edit17"];
	$add17 = "UPDATE $nome3 SET Edit17     = '$Edit17' WHERE Nome1 = '$nome3'";
	@mysql_query($add17, $link);

}
if (!empty($_GET["Edit18"]))  {

    $Edit18 = $_GET["Edit18"];
	$add18 = "UPDATE $nome3 SET Edit18     = '$Edit18' WHERE Nome1 = '$nome3'";
	@mysql_query($add18, $link);

}
if (!empty($_GET["Edit19"]))  {

    $Edit19 = $_GET["Edit19"];
	$add19 = "UPDATE $nome3 SET Edit19     = '$Edit19' WHERE Nome1 = '$nome3'";
	@mysql_query($add19, $link);

}
if (!empty($_GET["Edit20"]))  {

    $Edit20 = $_GET["Edit20"];
	$add20 = "UPDATE $nome3 SET Edit20     = '$Edit20' WHERE Nome1 = '$nome3'";
	@mysql_query($add20, $link);

}
if (!empty($_GET["Edit21"]))  {

    $Edit21 = $_GET["Edit21"];
	$add21 = "UPDATE $nome3 SET Edit21     = '$Edit21' WHERE Nome1 = '$nome3'";
	@mysql_query($add21, $link);

}
if (!empty($_GET["Edit22"]))  {

    $Edit22 = $_GET["Edit22"];
	$add22 = "UPDATE $nome3 SET memo1     = '$Edit22' WHERE Nome1 = '$nome3'";
	@mysql_query($add22, $link);

}



include("layout_incluir.php");
	

// Função que valida o CNPJ

function validaCNPJ($cnpj) { 
	
    if (strlen($cnpj) <> 18) return 0; 
    $soma1 = ($cnpj[0] * 5) + 

    ($cnpj[1] * 4) + 
    ($cnpj[3] * 3) + 
    ($cnpj[4] * 2) + 
    ($cnpj[5] * 9) + 
    ($cnpj[7] * 8) + 
    ($cnpj[8] * 7) + 
    ($cnpj[9] * 6) + 
    ($cnpj[11] * 5) + 
    ($cnpj[12] * 4) + 
    ($cnpj[13] * 3) + 
    ($cnpj[14] * 2); 
    $resto = $soma1 % 11; 
    $digito1 = $resto < 2 ? 0 : 11 - $resto; 
    $soma2 = ($cnpj[0] * 6) + 

    ($cnpj[1] * 5) + 
    ($cnpj[3] * 4) + 
    ($cnpj[4] * 3) + 
    ($cnpj[5] * 2) + 
    ($cnpj[7] * 9) + 
    ($cnpj[8] * 8) + 
    ($cnpj[9] * 7) + 
    ($cnpj[11] * 6) + 
    ($cnpj[12] * 5) + 
    ($cnpj[13] * 4) + 
    ($cnpj[14] * 3) + 
    ($cnpj[16] * 2); 
    $resto = $soma2 % 11; 
    $digito2 = $resto < 2 ? 0 : 11 - $resto; 
    return (($cnpj[16] == $digito1) && ($cnpj[17] == $digito2)); 
} 

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac($var){

$var = ereg_replace("[ÁÀÂÃ]",      "A",$var);
$var = ereg_replace("[áàâãª]",     "a",$var);
$var = ereg_replace("[ÉÈÊ]",       "E",$var);
$var = ereg_replace("[éèê]",       "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",      "O",$var);
$var = ereg_replace("[óòôõº]",     "o",$var);
$var = ereg_replace("[ÚÙÛ]",       "U",$var);
$var = ereg_replace("[úùû]",       "u",$var);
$var = ereg_replace("[?*#'´`!$%¨]"," ",$var);
$var = str_replace("Ç",            "C",$var);
$var = str_replace("ç",            "c",$var);

return($var);
}

?>
