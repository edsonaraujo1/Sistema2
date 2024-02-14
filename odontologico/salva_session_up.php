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

    $Edit1 = retirar_carac($_GET["Edit1"]);
   
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
	//$mes_pg_soc = @$row10["MES"];
	//$ano_pg_soc = @$row10["ANO"];
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


	// Atualiza Mensalidade
	
	$consulta7  = "SELECT * FROM aberto_soc WHERE CODP = '$new_fot'  ORDER BY ANO ASC, MES ASC";
	
	$resultado7 = @mysql_query($consulta7);
	
	while ($linha = @mysql_fetch_array($resultado7))
	{
	
	$data_b = $linha["MES"];
	$data_c = $linha["ANO"];
	
	}
	
    $data_fim_db = $data_b."/".$data_c;

?>
<?



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
		if ($cate_soc == "A"){
			//$menssagem1 = "Candidato consta como FALECIDO";
		}
		if ($cate_soc == "R"){
			//$menssagem1 = "................................";
		}else{
	
	
			$Edit5  = $insc_soc;
			//$Edit27 = $mes_pg_soc;
			//$Edit28 = $ano_pg_soc;
			
			$Edit27 = $data_b;
			$Edit28 = $data_c;
			
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
		                               Edit3    = '$Edit27',
		                               Edit4    = '$Edit28',
			 					       Edit5    = 'TITULAR',
								       Edit6    = '',
								       Edit7    = '',
								       Edit8    = '$insc_soc',
									   mensage1 = '$menssagem1' WHERE Nome1 = '$nome3'";
									   
									   
						@mysql_query($add1, $link);
				   
	
	}else{
		
	    $Edit1 = retirar_carac($_GET["Edit1"]);
		$add1 = "UPDATE $nome3 SET Edit1    = '$Edit1',
		                           mensage1 = '$menssagem1' WHERE Nome1 = '$nome3'";
		                           
		                           	@mysql_query($add1, $link);

		
	}
	
		//@mysql_query($add1, $link);
		
		                    if ($cate_soc == "O"){
		                    	
		                    	echo "
										<div id='popup' class='popup' style='Z-INDEX: 100; LEFT: 189px; WIDTH: 632px; POSITION: absolute; TOP: 218px; HEIGHT: 320px' align='center'>
										<div align=center style='Z-INDEX: 100;'>
										<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
										<tr align='center'><td>
										<font face=arial><img src='../imagens/W95MBX03.ICO' width='55' height='55' align='center'/><br />
										     <b>&nbsp;&nbsp;&nbsp;Socio com CARTA de OPOSICAO!!!&nbsp;&nbsp;&nbsp;<br />
										  	                  verifique cadastro de associados !!!!<br />
															 	  	   </b><br /></font>
										<table align=center>
										<form method='POST' action='cadastro.php'>
										<td><input type=image name='sim' src='../imagens/botaoazul24.PNG'/></td>
										</form></table></td></tr></table></div>
										</div>";
		                    	
                    	//include("mensagemop.php");
                    	
	                }else{
	                	//echo $qtd_fim;
	                	
	                	if($qtd_fim != 0){
	                		
	                		echo "
							
								<div id='popup' class='popup' style='Z-INDEX: 500; LEFT: 189px; WIDTH: 632px; POSITION: absolute; TOP: 218px; HEIGHT: 320px' align='center'>
								<div align=center style='Z-INDEX: 100;'>
								<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
								<tr align='center'><td>
								<font face=arial><img src='../imagens/W95MBX03.ICO' width='55' height='55' align='center'/><br />
								     <b>&nbsp;&nbsp;&nbsp;Socio ATRASADO COM PAGAMENTO, acertar no CAIXA !&nbsp;&nbsp;&nbsp;<br />
								  	                  Quantidade de $qtd_fim Mensalidades atrasada num <br />
													 	  	   total de R$ $valor_3,00 Reais !!!</b><br /></font>
								<table align=center>
								<form method='POST' action='cadastro.php'>
								<td><input type=image name='sim' src='../imagens/botaoazul24.PNG'></td>
								</form></table></td></tr></table></div>
								</div>";
	                		
	                	  //include("mensagem.php"); 	
	                	}
	                	
	                }

	
}
if (!empty($_GET["Edit2"]))   {
	
    $Edit2 = retirar_carac($_GET["Edit2"]);
	$add2 = "UPDATE $nome3 SET Edit2    = '$Edit2' WHERE Nome1 = '$nome3'";
	@mysql_query($add2, $link);
}
if (!empty($_GET["Edit3"]))   {

    $Edit3 = retirar_carac($_GET["Edit3"]);
    $add3 = "UPDATE $nome3 SET Edit3    = '$Edit3'  WHERE Nome1 = '$nome3'";
    @mysql_query($add3, $link);

}
if (!empty($_GET["Edit4"]))   {

    $Edit4 = retirar_carac($_GET["Edit4"]);
    $add4 = "UPDATE $nome3 SET Edit4    = '$Edit4'  WHERE Nome1 = '$nome3'";
    @mysql_query($add4, $link);

}
if (!empty($_GET["Edit5"]))   {
		
	    $Edit5 = retirar_carac($_GET["Edit5"]);
		$add5 = "UPDATE $nome3 SET Edit5    = '$Edit5' WHERE Nome1 = '$nome3'";
		
		@mysql_query($add5, $link);
	
}
if (!empty($_GET["Edit6"]))   {

    $Edit6 = retirar_carac($_GET["Edit6"]);
    $add6 = "UPDATE $nome3 SET Edit6    = '$Edit6'  WHERE Nome1 = '$nome3'";
    @mysql_query($add6, $link);

}

if (!empty($_GET["Edit7"]))   {
		
	    $Edit7 = retirar_carac($_GET["Edit7"]);
		$add7 = "UPDATE $nome3 SET Edit7    = '$Edit7' WHERE Nome1 = '$nome3'";
		@mysql_query($add7, $link);
	
}
if (!empty($_GET["Edit8"]))   {

    $Edit8 = retirar_carac($_GET["Edit8"]);
    $add8 = "UPDATE $nome3 SET Edit8    = '$Edit8' WHERE Nome1 = '$nome3'";
    @mysql_query($add8, $link);

}
if (!empty($_GET["Edit9"]))   {

    $Edit9 = retirar_carac($_GET["Edit9"]);
    $add9 = "UPDATE $nome3 SET Edit9    = '$Edit9' WHERE Nome1 = '$nome3'";
    @mysql_query($add9, $link);

}
if (!empty($_GET["Edit10"]))   {

    $Edit10 = retirar_carac($_GET["Edit10"]);
    $add10 = "UPDATE $nome3 SET Edit10    = '$Edit10' WHERE Nome1 = '$nome3'";
    @mysql_query($add10, $link);

}
if (!empty($_GET["Edit11"]))   {

    $Edit11 = retirar_carac($_GET["Edit11"]);
    $add11 = "UPDATE $nome3 SET Edit11    = '$Edit11' WHERE Nome1 = '$nome3'";
    @mysql_query($add11, $link);

}
if (!empty($_GET["Edit12"]))   {

    $Edit12 = retirar_carac($_GET["Edit12"]);
    $add12 = "UPDATE $nome3 SET Edit12    = '$Edit12' WHERE Nome1 = '$nome3'";
    @mysql_query($add12, $link);

}
if (!empty($_GET["Edit13"]))   {

    $Edit13 = retirar_carac($_GET["Edit13"]);
    $add13 = "UPDATE $nome3 SET Edit13    = '$Edit13' WHERE Nome1 = '$nome3'";
    @mysql_query($add13, $link);

}
if (!empty($_GET["Edit14"]))   {

    $Edit14 = retirar_carac($_GET["Edit14"]);
    $add14 = "UPDATE $nome3 SET Edit14    = '$Edit14' WHERE Nome1 = '$nome3'";
    @mysql_query($add14, $link);

}
if (!empty($_GET["Edit15"]))   {

    $Edit15 = retirar_carac($_GET["Edit15"]);
    $add15 = "UPDATE $nome3 SET Edit15   = '$Edit15' WHERE Nome1 = '$nome3'";
    @mysql_query($add15, $link);

}

include("layout_opo_up.php");
?>

</html>

<?

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


// Função que valida o CPF
function verificaCPF($cpf)
{	// Verifiva se o número digitado contém todos os digitos
    $cpf = str_pad(ereg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);
	
	// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
    if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999')
	{
	return false;
	// echo '<center><font color="#FF0000" size="4">CNPJ Inválido, por favor digite um CNPJ válido.</b></font>'; 
    }
	else
	{   // Calcula os números para verificar se o CPF é verdadeiro
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf{$c} != $d) {
                return false;
                // echo '<center><font color="#FF0000" size="4">CNPJ Inválido, por favor digite um CNPJ válido.</b></font>'; 
            }
        }

        return true;
    }
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
$var = ereg_replace("[íìî]",       "i",$var);
$var = ereg_replace("[ÍÌÎ]",       "I",$var);
$var = ereg_replace("[?*#'´`!$%¨]"," ",$var);
$var = str_replace("Ç",            "C",$var);
$var = str_replace("ç",            "c",$var);

return($var);
}

/*
  ---------------------------
  Função para Subtrair Data
  ---------------------------
*/

function SubtraiData($data, $dias, $meses, $ano)
{
   //passe a data no formato dd/mm/yyyy 
   $data = explode("/", $data);
   $newData = date("d/m/Y", mktime(0, 0, 0, $data[1] - $meses,
    $data[0] - $dias, $data[2] - $ano) );
   return $newData;
}

/*
  ------------------------
  Função para Somar Data
  ------------------------
*/

function SomarData($data, $dias, $meses, $ano)
{
   //passe a data no formato dd/mm/yyyy 
   $data = explode("/", $data);
   $newData = date("d/m/Y", mktime(0, 0, 0, $data[1] + $meses,
    $data[0] + $dias, $data[2] + $ano) );
   return $newData;
}

?>
