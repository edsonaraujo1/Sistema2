<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Listagem na Tela por Codigo
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/
// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

include("menu.php");

$titulo_tabela = "'CONTRIBUIÇÕES - EMPRESAS'";

?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

<body>
</html>

<?

$id         = addslashes($_POST['id']);
$Edit1      = addslashes(strtoupper($_POST['Edit1']));
$Edit2      = addslashes(strtoupper($_POST['Edit2']));
$Edit3      = addslashes($_POST['Edit3']);
$Edit4      = addslashes(strtoupper($_POST['Edit4']));
$Edit5      = addslashes(strtoupper($_POST['Edit5']));
$Edit6      = addslashes(strtoupper($_POST['Edit6']));
$Edit7      = addslashes(strtoupper($_POST['Edit7']));
$Edit8      = addslashes(strtoupper($_POST['Edit8']));
$Edit9      = addslashes(strtoupper($_POST['Edit9']));

$data_sys   = date("d/m/Y");

include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);
        
@mysql_select_db($db);


	$consulta_gera2  = "SELECT * FROM gerador_conf WHERE controle = $Cod_2";
	
	$resultado_gera2 = @mysql_query($consulta_gera2);
	
	$row_gera2 = @mysql_fetch_array($resultado_gera2);
	
	$nudoc_ret = @$row_gera2["COD"];

// retorna uma pesquisa

if ($Acao == "insert"){
	
	
	$consulta_gera  = "SELECT * FROM edificios WHERE COD = '$Edit1'";
	
	$resultado_gera = @mysql_query($consulta_gera);
	
	$row_gera = @mysql_fetch_array($resultado_gera);
	
	$vencto       = $Edit2;
	$nudoc1       = @$row_gera["COD"];
	$num_doc1     = @$row_gera["COD"];
	$estado       = @$row_gera["UF"];
	$valor        = $Edit7;
	$sacado       = @$row_gera["COND"]." ".@$row_gera["NOME"];
	$cnpj         = @$row_gera["CGC"];
	$endereco     = @$row_gera["RUA"]." ".@$row_gera["ENDERECO"].",".@$row_gera["NUMERO"];
	$cep          = @$row_gera["CEP"];
	$bairro       = @$row_gera["BAIRRO"];
	$cidade       = @$row_gera["CIDADE"];
	$uf           = @$row_gera["UF"];
	$adm          = @$row_gera["ADM"];
	$ativ_e       = @$row_gera["ATIV"];     
	$e_mail_ed    = @$row_gera["EMAIL"];
	$tipo_imo     = @$row_gera["TIPOIMOV"];
	$zona         = @$row_gera["ZONA"];     
	$date_1       = date('d/m/Y');
	$hora         = date("H:i:s");
	$multa        = 0;
	$juros        = 0;
	$correcao     = 0;
	$qtd_inst     = 1;
	$tipo_cont_1  = $Edit4;
	$situa_cont   = $Edit5;
	$prorr_ga     = $Edit6;
	$dat_baixa    = $Edit8;
	
	If ($tipo_cont_1 == 'SINDICAL'){
		
		$instru_c = 1;
		
	}

	If ($tipo_cont_1 == 'CONFEDERATIVA'){
		
		$instru_c = 3;
		
	}

	If ($tipo_cont_1 == 'ASSISTENCIAL'){
		
		$instru_c = 4;
		
	}
	
	IF (empty($valor)){
	
	$valor = 0;
}

	// Verifica se Boleto ja foi gerado

	$consulta_gera  = "SELECT * FROM gerador_conf WHERE COD = '$Edit1' AND VENCTO = '$Edit2' AND TIPO_CONT = '$tipo_cont_1'";
	
	$resultado_gera = @mysql_query($consulta_gera);
	
	$row_gera = @mysql_fetch_array($resultado_gera);
	
	$id_gera  = @$row_gera["controle"];
	$QTD      = @$row_gera["QTD"];


/*
echo $vencto."<br>";
echo $nudoc1."<br>";
echo $num_doc1."<br>";
echo $estado."<br>";
echo $valor."<br>";
echo $sacado."<br>";
echo $cnpj."<br>";
echo $endereco."<br>";
echo $cep."<br>";
echo $bairro."<br>";
echo $cidade."<br>";
echo $uf."<br>";
echo $adm."<br>";
echo $ativ_e."<br>";     
echo $e_mail_ed."<br>";
echo $tipo_imo."<br>";
echo $zona."<br>";     
echo $date_1."<br>";
echo $hora."<br>";
echo $multa."<br>";
echo $juros."<br>";
echo $correcao."<br>";
echo $qtd_inst."<br>";
echo $tipo_cont_1."<br>";
echo $situa_cont."<br>";
echo $prorr_ga."<br>";
*/

	
	if (empty($id_gera)){


		$consulta = "INSERT INTO gerador_conf  (COD,
											    ATIV,
		                                    	DATA,
												NOME,
												ENDERECO,
												CEP,
												BAIRRO,
												UF,
												CGC,
												TIPOIMOV,
												ZONA,
												EMAIL,
												ADM,
												HORA,
												VENCTO,
												VALOR,
												MULTA,
												JUROS,
												CORRECAO,
										        LOG_SSOC,
												QTD,
												TIPO_CONT,
												SITUACAO,
												PRORROGA,
												DATA_BAI,
												EXEC,
												INSTRUCAO)
		                VALUES
		                                  ('$nudoc1',
										   '$ativ_e',
										   '$date_1',
										   '$sacado',
										   '$endereco',
										   '$cep',
										   '$bairro',
										   '$uf',
										   '$cnpj',
										   '$tipo_imo',
										   '$zona',
										   '$e_email_ed',
										   '$adm',
										   '$hora',
										   '$vencto',
										   '$valor',
										   '$multa',
										   '$juros',
										   '$correcao',
										   '$nome3',
										   '$qtd_inst',
										   '$tipo_cont_1',
										   '$situa_cont',
										   '$prorr_ga',
										   '$dat_baixa',
										   '$Edit9',
										   '$instru_c')";
		$Acao = " ";                           
		
		@mysql_query($consulta, $link) or
		
		die("
		     <br>
		     <br>
		     
		     <div align=center>
		
		     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Falha na Inclusão !!! (9)***</b>
		     <table align=center>
		     <form method='POST' action='mostra_grid.php'>
		     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
		
	}else{
		
		echo "
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Contribuição ja foi Gerada Verifique !!! ***</b>
		     <table align=center>
		     <form method='POST' action='mostra_grid.php'>
		     <td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>";
		     exit;
		
		
	}
}

if ($Acao == "update"){


	If ($Edit4 == 'SINDICAL'){
		
		$instru_c = 1;
		
	}

	If ($Edit4 == 'CONFEDERATIVA'){
		
		$instru_c = 3;
		
	}

	If ($Edit4 == 'ASSISTENCIAL'){
		
		$instru_c = 4;
		
	}


   $consulta = "UPDATE gerador_conf    SET    TIPO_CONT   = '$Edit4',
                                              SITUACAO    = '$Edit5',
									          PRORROGA    = '$Edit6',
									          VALOR       = '$Edit7',
											  DATA_BAI    = '$Edit8',
											  EXEC        = '$Edit9',
											  INSTRUCAO   = '$instru_c' WHERE controle = '". anti_sql_injection($id) ."'";
								              $Acao = " ";                    

@mysql_query($consulta, $link) or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Alteracao !!! ***</b>
     <table align=center>
     <form method='POST' action='mostra_grid.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

}

if ($Acao == "deletar"){

   $consulta = "DELETE FROM gerador_conf WHERE controle = '". anti_sql_injection($Cod_2) ."'";
   $Acao = "deletar";                           

@mysql_query($consulta, $link) or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Exclusao !!! ***</b>
     <table align=center>
     <form method='POST' action='mostra_grid.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

}

// Resgata a Sessao
@session_start();
if (!empty($Edit1)){
$_SESSION['cod_incl'] = $Edit1;
}else{
	
$_SESSION['cod_incl'] = $nudoc_ret;	
}
$empr =	$_SESSION['empr'];


//echo "<br><br><br>";
//echo $nudoc_ret."<br>";
//echo $Acao."<br>";

include("mostra_grid.php");

?>
