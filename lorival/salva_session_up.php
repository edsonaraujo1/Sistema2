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
include("../config.php");

include("../logar.php");
// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);
$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include("../conexao.php");
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);

$nome3a = strtolower($nome3);

// -- Codigo
if (!empty($_GET["Edit1"]))   {
	
    $Edit1 = retirar_carac($_GET["Edit1"]);
	$add1 = "UPDATE $nome3a SET Edit1    = '$Edit1' WHERE Nome1 = '$nome3a'";
	@mysql_query($add1, $link);
}
if (!empty($_GET["Edit2"]))   {
	
    $Edit2 = retirar_carac($_GET["Edit2"]);
	$add2 = "UPDATE $nome3a SET Edit2    = '$Edit2' WHERE Nome1 = '$nome3a'";
	@mysql_query($add2, $link);
}
if (!empty($_GET["Edit3"]))   {

    $Edit3 = retirar_carac($_GET["Edit3"]);
    $add3 = "UPDATE $nome3a SET Edit3    = '$Edit3'  WHERE Nome1 = '$nome3a'";
    @mysql_query($add3, $link);

}
if (!empty($_GET["Edit4"]))   {

	$texto_rg = $_GET["Edit4"];
	
	$eli_rg1 = str_replace("-"," ",$texto_rg);
	$eli_rg2 = str_replace("."," ",$eli_rg1);
	$valor_rg = str_replace(" ","",$eli_rg2);
		
	// Verifica se o Candidato ja esta Cadastrado
	
	$consulta8  = "SELECT * FROM socios    WHERE RGASSOC = '$valor_rg'";
	
	$resultado8 = @mysql_query($consulta8);
	
	$row8 = mysql_fetch_array($resultado8);
	
	$id			= @$row8["id"];
	$cod_soc    = @$row8["COD"];
	$new_fot    = @$row8["CODP"];
	$nu_cod	    = @$row8["NU"];
	$rg_soc     = Trim(@$row8["RGASSOC"]);
	$cpf_soc  	= @$row8["CPF"];
	$insc_soc 	= @$row8["DATINSC"];
	$cate_soc	= @$row8["CATEGORIA"];
	$edif_soc	= @$row8["CODEDIF"];
	$nome_soc	= retirar_carac(@$row8["NOMEASSOC"]);
	$end_soc	= Trim(retirar_carac(@$row8["RUA"]))." ".Trim(retirar_carac(@$row8["ENDRESID"])).",".Trim(retirar_carac(@$row8["NUMERO"]));
	$cep_soc	= @$row8["CEPRES"];
	$mes_pg_soc = @$row10["MES"];
	$ano_pg_soc = @$row10["ANO"];

if (!empty($id)){

	if ($cate_soc == "C"){
		$cate_soc = "CONTRIBUINTE";
	}
	if ($cate_soc == "D"){
		$cate_soc = "DESISTENTE";
	}
	if ($cate_soc == "I"){
		$cate_soc = "ISENTO";
	}
	if ($cate_soc == "O"){
		$cate_soc = "CARTA - OPOSICAO";
	}
	if ($cate_soc == "F"){
		$cate_soc = "FALECIDO";
	}
	if ($cate_soc == "R"){
		$cate_soc = "REMIDO";
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
                include("mensagem.php");
		}
	}


	$consulta10  = "SELECT * FROM edificios Where COD = '$edif_soc'";
	
	$resultado10 = @mysql_query($consulta10);
	
	$row10 = @mysql_fetch_array($resultado10);
	
	$cod_edif   = @$row10["COD"];
	$cond  = trim(retirar_carac(@$row10["COND"].@$row10["NOME"]));
	$Cnpj_Edif  = @$row10["CGC"];
	
	$nome_do_edif = $cond;



    $Edit4 = retirar_carac($_GET["Edit4"]);
    $add4 = "UPDATE $nome3a SET Edit6    = '$new_fot',
                               Edit2    = '$insc_soc',
                               Edit4    = '$Edit4',
                               Edit5    = '$cpf_soc',
                               Edit7    = '$cate_soc',
                               Edit11   = '$edif_soc',
                               Edit8    = '$nome_soc',
							   Edit9    = '$end_soc',
							   Edit10   = '$cep_soc',
							   Edit12   = '$Cnpj_Edif', 
	                           mensage2 = '$cond' WHERE Nome1 = '$nome3a'";


}else{

    $Edit4 = retirar_carac($_GET["Edit4"]);
    $add4 = "UPDATE $nome3a SET Edit4    = '$Edit4' WHERE Nome1 = '$nome3a'";

}							   
    @mysql_query($add4, $link);

}
if (!empty($_GET["Edit5"]))   {

$texto_cpf = $_GET["Edit5"];

$resu_t = verificaCPF($texto_cpf);

	if ($resu_t != 1){
	   $menssagem1 = "CPF digitado INVALIDO VERIFIQUE !!!";	
	}

	$eli_cpf1 = str_replace("-"," ",$texto_cpf);
	$eli_cpf2 = str_replace("."," ",$eli_cpf1);
	$valor_cpf = str_replace(" ","",$eli_cpf2);
		
	// Verifica se o Candidato ja esta Cadastrado
	
	$consulta9  = "SELECT * FROM socios    WHERE CPF = '$valor_cpf'";
	
	$resultado9 = @mysql_query($consulta9);
	
	$row9 = mysql_fetch_array($resultado9);
	
	$id			= @$row9["id"];
	$cod_soc    = @$row9["COD"];
	$new_fot    = @$row9["CODP"];
	$nu_cod	    = @$row9["NU"];
	$rg_soc     = Trim(@$row9["RGASSOC"]);
	$cpf_soc  	= @$row9["CPF"];
	$insc_soc 	= @$row9["DATINSC"];
	$cate_soc	= @$row9["CATEGORIA"];
	$edif_soc	= @$row9["CODEDIF"];
	$nome_soc	= retirar_carac(@$row9["NOMEASSOC"]);
	$end_soc	= Trim(retirar_carac(@$row9["RUA"]))." ".Trim(retirar_carac(@$row9["ENDRESID"])).",".Trim(retirar_carac(@$row9["NUMERO"]));
	$cep_soc	= @$row9["CEPRES"];
	$mes_pg_soc = @$row10["MES"];
	$ano_pg_soc = @$row10["ANO"];

if (!empty($id)){

	if ($cate_soc == "C"){
		$cate_soc = "CONTRIBUINTE";
	}
	if ($cate_soc == "D"){
		$cate_soc = "DESISTENTE";
	}
	if ($cate_soc == "I"){
		$cate_soc = "ISENTO";
	}
	if ($cate_soc == "O"){
		$cate_soc = "CARTA - OPOSICAO";
	}
	if ($cate_soc == "F"){
		$cate_soc = "FALECIDO";
	}

	if ($cate_soc == "R"){
		$cate_soc = "REMIDO";
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
                include("mensagem.php");
		}
	}


	$consulta10  = "SELECT * FROM edificios Where COD = '$edif_soc'";
	
	$resultado10 = @mysql_query($consulta10);
	
	$row10 = @mysql_fetch_array($resultado10);
	
	$cod_edif   = @$row10["COD"];
	$cond  = trim(retirar_carac(@$row10["COND"].@$row10["NOME"]));
	$Cnpj_Edif  = @$row10["CGC"];
	
	$nome_do_edif = $cond;


    $Edit5 = retirar_carac($_GET["Edit5"]);
    $add5 = "UPDATE $nome3a SET Edit2    = '$insc_soc',
	                           Edit6    = '$new_fot',
                               Edit4    = '$rg_soc,
                               Edit5    = '$Edit5',
                               Edit7    = '$cate_soc',
                               Edit11   = '$edif_soc',
                               Edit8    = '$nome_soc',
							   Edit9    = '$end_soc',
							   Edit10   = '$cep_soc',
							   mensage1 = '$menssagem1',
							   Edit12   = '$Cnpj_Edif', 
	                           mensage2 = '$cond' WHERE Nome1 = '$nome3a'";


}else{
	
    $Edit5 = retirar_carac($_GET["Edit5"]);
    $add5 = "UPDATE $nome3a SET Edit5    = '$Edit5',
	                           mensage1 = '$menssagem1' WHERE Nome1 = '$nome3a'";
	
}
    @mysql_query($add5, $link);

}
if (!empty($_GET["Edit6"]))   {

    $Edit6 = retirar_carac($_GET["Edit6"]);
   

    $consulta_xx  = "SELECT * FROM atendimento_soc WHERE CODP = '$Edit6'";
    $resultado_xx = @mysql_query($consulta_xx);
    $row_xx       = @mysql_fetch_array($resultado_xx);
    $idx           = @$row_xx["id"];

	$Edit1x  = retirar_carac(@$row_xx["COD"]);
	$Edit2x  = retirar_carac(@$row_xx["DAT2"]);
	$Edit3x  = retirar_carac(@$row_xx["DATINSC"]);
	$Edit4x  = retirar_carac(@$row_xx["RGASSOC"]);
	$Edit5x  = retirar_carac(@$row_xx["CPF"]);
	$Edit6x  = retirar_carac(@$row_xx["CODP"]);
	$Edit7x  = retirar_carac(@$row_xx["CATEGORIA"]);
	$Edit8x  = retirar_carac(@$row_xx["NOMEASSOC"]);
	$Edit9x  = retirar_carac(@$row_xx["ENDRESID"]);
	$Edit10x = retirar_carac(@$row_xx["CEPRES"]);
	$Edit11x = retirar_carac(@$row_xx["CODEDIF"]);
	$Edit12x = retirar_carac(@$row_xx["CNPJ"]);
	$Edit13x = retirar_carac(@$row_xx["ADMS"]);
	$Edit14x = retirar_carac(@$row_xx["CNPJ2"]);
	$Edit15x = retirar_carac(@$row_xx["OBS"]);
	$Edit16x = retirar_carac(@$row_xx["NOMEEDIF"]);
	$Edit17x = retirar_carac(@$row_xx["NOMEADMS"]);

   if (!empty($idx)){

		?>
		<style type=text/css> #popup{position: relative; top: 0%; left: 0%;width: 400px;height: 100px;padding: 20px 20px 20px 20px;border-width: 17px;border-style: solid;border-color: #5A9CB1;background: white;color: #000066;display: none;}
        </style> 
		<br /><br /><br /><br /><br /><br /><br /><br /><br />
		<!--Inicio da Funcao Menssagem 'Segunda Tela de Ajuda' com a classe popup-->
		<body>
		<div id='popup' class='popup' style="Z-INDEX: 1000; LEFT: 189px; WIDTH: 632px; POSITION: absolute; TOP: 215px; HEIGHT: 320px" align="center">
		<div align=center>
		<table align=center border='15' bgcolor='#FFFFFF' bordercolor ='<?=$color_bor;?>'>
		<tr align="center"><td>
		<font face=arial><img src="../imagens/W95MBX03.ICO" width="55" height="55" align="center"><br />
		     <b>&nbsp;&nbsp;&nbsp;Socio ja Foi Atendido...Verifique !!!&nbsp;&nbsp;&nbsp;
							 </b><br /></font>
		<table align=center>
		<form method='POST' action='cadastro.php?Cod_xx=<?=$idx;?>'>
		<td><input type=image name='sim' src='../imagens/botaoazul24.PNG'></td>
		</form></table></td></tr></table></div>
		</div>
		</body>
		<!--Fim da Funcao PopUP 'Segunda Tela de Ajuda' com a classe popup-->
		<?
   	
   }else{
  
    // Consulta Socio

	$consulta10  = "SELECT * FROM socios    WHERE CODP = '$Edit6'";
	
	$resultado10 = @mysql_query($consulta10);
	
	$row10 = mysql_fetch_array($resultado10);
	
	$id_soc		= @$row10["id"];
	$cod_soc    = @$row10["COD"];
	$new_fot    = @$row10["CODP"];
	$nu_cod	    = @$row10["NU"];
	$rg_soc     = Trim(@$row10["RGASSOC"]);
	$cpf_soc  	= @$row10["CPF"];
	$insc_soc 	= @$row10["DATINSC"];
	$cate_soc	= @$row10["CATEGORIA"];
	$edif_soc	= @$row10["CODEDIF"];
	$nome_soc	= retirar_carac(@$row10["NOMEASSOC"]);
	$end_soc	= Trim(retirar_carac(@$row10["RUA"]))." ".Trim(retirar_carac(@$row10["ENDRESID"])).",".Trim(retirar_carac(@$row10["NUMERO"]));
	$cep_soc	= @$row10["CEPRES"];
	$mes_pg_soc = @$row10["MES"];
	$ano_pg_soc = @$row10["ANO"];

	if (!empty($id_soc)){

		if ($cate_soc == "C"){
			$cate_soc = "CONTRIBUINTE";
		}
		if ($cate_soc == "D"){
			$cate_soc = "DESISTENTE";
		}
		if ($cate_soc == "I"){
			$cate_soc = "ISENTO";
		}
		if ($cate_soc == "O"){
			$cate_soc = "CARTA - OPOSICAO";
		}
		if ($cate_soc == "F"){
			$cate_soc = "FALECIDO";
		}
		if ($cate_soc == "R"){
			$cate_soc = "REMIDO";
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
					
                    if ($cate_soc == "O"){
                    	include("mensagemop.php");
	                }else{
	                	//echo $qtd_fim;
	                	
	                	if($qtd_fim != 0){
	                	  include("mensagem.php"); 	
	                	}
	                	
	                }
					}
			}
	
			$consulta10  = "SELECT * FROM edificios Where COD = '$edif_soc'";
			
			$resultado10 = @mysql_query($consulta10);
			
			$row10 = @mysql_fetch_array($resultado10);
			
			$cod_edif   = @$row10["COD"];
			$cond  = trim(retirar_carac(@$row10["COND"].@$row10["NOME"]));
			$Cnpj_Edif  = @$row10["CGC"];
		
			$nome_do_edif = $cond;
	
		
		    $add6 = "UPDATE $nome3a SET Edit2    = '$insc_soc',
			                           Edit6    = '$Edit6',
		                               Edit4    = '$rg_soc',
		                               Edit5    = '$cpf_soc',
		                               Edit7    = '$cate_soc',
		                               Edit11   = '$edif_soc',
		                               Edit8    = '$nome_soc',
			 					       Edit9    = '$end_soc',
								       Edit10   = '$cep_soc',
									   Edit12   = '$Cnpj_Edif', 
		                               mensage2 = '$cond' WHERE Nome1 = '$nome3a'";
	
	}else{
		
	    $Edit6 = retirar_carac($_GET["Edit6"]);
		$add6 = "UPDATE $nome3a SET Edit6   = '$Edit6' WHERE Nome1 = '$nome3a'";
		
	}

		@mysql_query($add6, $link);
	
}
}
if (!empty($_GET["Edit7"]))   {

    $Edit7 = retirar_carac($_GET["Edit7"]);
    $add7 = "UPDATE $nome3a SET Edit7    = '$Edit7' WHERE Nome1 = '$nome3a'";
    @mysql_query($add7, $link);

}
if (!empty($_GET["Edit8"]))   {

    $Edit8 = retirar_carac($_GET["Edit8"]);
    $add8 = "UPDATE $nome3a SET Edit8    = '$Edit8' WHERE Nome1 = '$nome3a'";
    @mysql_query($add8, $link);

}
if (!empty($_GET["Edit9"]))   {

    $Edit9 = retirar_carac($_GET["Edit9"]);
    $add9 = "UPDATE $nome3a SET Edit9    = '$Edit9' WHERE Nome1 = '$nome3a'";
    @mysql_query($add9, $link);

}
if (!empty($_GET["Edit10"]))   {

    $Edit10 = retirar_carac($_GET["Edit10"]);
    $add10 = "UPDATE $nome3a SET Edit10    = '$Edit10' WHERE Nome1 = '$nome3a'";
    @mysql_query($add10, $link);

}
if (!empty($_GET["Edit11"]))   {

$consulta10  = "SELECT * FROM edificios Where COD = '$Edit11'";

$resultado10 = @mysql_query($consulta10);

$row10 = @mysql_fetch_array($resultado10);

$cod_edif   = @$row10["COD"];
$cond  = trim(retirar_carac(@$row10["COND"].@$row10["NOME"]));
$Cnpj_Edif  = @$row10["CGC"];

$nome_do_edif = $cond;

if (!empty($cod_edif)){
	
    $Edit11 = retirar_carac($_GET["Edit11"]);
    $add11 = "UPDATE $nome3a SET Edit11    = '$Edit11',
                                Edit12    = '$Cnpj_Edif', 
	                            mensage2  = '$cond' WHERE Nome1 = '$nome3a'";
	                            
}else{

    $Edit11 = retirar_carac($_GET["Edit11"]);
    $add11 = "UPDATE $nome3a SET Edit11    = '$Edit11' WHERE Nome1 = '$nome3a'";
	
}	                            
    @mysql_query($add11, $link);

}
if (!empty($_GET["Edit12"]))   {

//$Edit12 = $_GET["Edit12"];

$consulta12  = "SELECT * FROM edificios Where CGC = '$Edit12'";

$resultado12 = @mysql_query($consulta12);

$row12 = @mysql_fetch_array($resultado12);

$cod_edif   = @$row12["COD"];
$cond  = trim(retirar_carac(@$row12["COND"].@$row12["NOME"]));
$Cnpj_Edif  = @$row12["CGC"];

$nome_do_edif = $cond;

if (!empty($cod_edif)){
	
    $Edit12 = retirar_carac($_GET["Edit12"]);
    $add12 = "UPDATE $nome3a SET Edit12    = '$Edit12',
                                Edit11    = '$cod_edif',
	                            mensage2  = '$cond' WHERE Nome1 = '$nome3a'";
	                            
}else{

    $Edit12 = retirar_carac($_GET["Edit12"]);
    $add12 = "UPDATE $nome3a SET Edit12    = '$Edit12' WHERE Nome1 = '$nome3a'";
	
}	                            

    @mysql_query($add12, $link);

}
if (!empty($_GET["Edit13"]))   {

    $consulta13  = "SELECT * FROM adms WHERE cod = '$Edit13'";

    $resultado13 = @mysql_query($consulta13);

    $row13 = @mysql_fetch_array($resultado13);

    $Cod_adms   = @$row13["cod"];
    $Nome_adms  = retirar_carac(@$row13["nomeadm"]);
    $Cnpj_Adms  = @$row13["cgc"];

if (!empty($Cod_adms)){
	
    $Edit13 = retirar_carac($_GET["Edit13"]);
    $add13 = "UPDATE $nome3a SET Edit13    = '$Edit13',
                                Edit14    = '$Cnpj_Adms',
	                            mensage3  = '$Nome_adms' WHERE Nome1 = '$nome3a'";
	
}else{

    $Edit13 = retirar_carac($_GET["Edit13"]);
    $add13 = "UPDATE $nome3a SET Edit13    = '$Edit13' WHERE Nome1 = '$nome3a'";
	
}    
    @mysql_query($add13, $link);

}
if (!empty($_GET["Edit14"]))   {

    $consulta14  = "SELECT * FROM adms WHERE cgc = '$Edit14'";

    $resultado14 = @mysql_query($consulta14);

    $row14 = @mysql_fetch_array($resultado14);

    $Cod_adms   = @$row14["cod"];
    $Nome_adms  = retirar_carac(@$row14["nomeadm"]);
    $Cnpj_Adms  = @$row14["cgc"];

if (!empty($Cod_adms)){
	
    $Edit14 = retirar_carac($_GET["Edit14"]);
    $add14 = "UPDATE $nome3a SET Edit13    = '$Cod_adms',
                                Edit14    = '$Cnpj_Adms',
	                            mensage3  = '$Nome_adms' WHERE Nome1 = '$nome3a'";
	
}else{

    $Edit14 = retirar_carac($_GET["Edit14"]);
    $add14 = "UPDATE $nome3a SET Edit14    = '$Edit14' WHERE Nome1 = '$nome3a'";

}

    @mysql_query($add14, $link);

}
if (!empty($_GET["Edit15"]))   {

    $Edit15 = retirar_carac($_GET["Edit15"]);
    $add15 = "UPDATE $nome3a SET memo1    = '$Edit15' WHERE Nome1 = '$nome3a'";
    @mysql_query($add15, $link);

}

include("layout_opo_up.php");

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