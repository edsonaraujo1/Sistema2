<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar Boletos Socios em PDF
 Criado em Data.....: 13/11/2009
 Ultima Atualiza��o : 19/11/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

include("../config.php");
// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("vaurls.php");

$deixar = acesso_url("BOLETOS_SOC");

if ($deixar == "SIM"){


// Variavei usadas pelo Boleto

$Edit1        = $_POST['Edit1'];
$Edit2        = $_POST['Edit2']; // Qtd Mes
$Edit3        = $_POST['Edit3'];
$Edit4        = $_POST['Edit4'];
$Edit5        = $_POST['Edit5'];
$insc_2       = $_POST['insc'];


$i_vencto     = $_POST['insc'];


$for_adms      = 2;     // 1 Para Adms e 2 Para Edif
$cod_intru     = 8;     // Instrucao

$cod_edif1     = $Edit4; // Iniciar em 
$cod_edif2     = $Edit5; // Terminar em
$i_ano_data    = $Edit1; 


$i_ate_mes     = $Edit2;
$valor1        = $Edit3;
$codigobanco   = "001";
$nummoeda 	   = "9";
$cedente       = "SINDIFICIOS - SIND. DOS TRABALHADORES EM EDIF. DE S�O PAULO";
$cedente2      = "SINDIFICIOS";
$agen_cod      = "1202-5/17727-X";
$agencia       = "1202";
$conta         = "17727";
$data_doc      = date("d/m/Y");
$especie_doc   = "RC";
$aceite        = "N";
$convenio      = "1449863";
$carteira      = "18";
$especie       = "R$";

$referente     = "MENSALIDADE CLUBE TIETE REF: "; 

$conta_pg      = 1;
$faz_gui1      = 1;

// Mostra Nome Mes Referencia
$monthName = array(1=>"Janeiro",  "Fevereiro", "Marco",
                      "Abril",    "Maio",      "Junho",    "Julho",   "Agosto",
                      "Setembro", "Outubro",   "Novembro", "Dezembro");

/* mes referencia */

$rest = substr($i_vencto, 3,2);
$rest2 = strval($rest)-1;
$mEs =$rest2;
                                           
$mes_ref = strtoupper($monthName[$mEs]);


// Abre Conex�o com o MySql
include("../conexao.php");

// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


// Atualiza arquivo Log
$data_log = date("d/m/Y");
$hora_log = date("H:i:s"); 
$even_log = "CARNE CLUBE"."/".$cod_edif1;
			
$consulta_log_Z = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
	             VALUES
	             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
@mysql_query($consulta_log_Z, $link);


$sql  = "SELECT * FROM socios WHERE CODP >= '$cod_edif1' and CODP <= '$cod_edif2' and CATEGORIA != 'O'";

$resultado = @mysql_query($sql);

// Abrir tabela instrucao

$consultaz  = "SELECT * FROM instrucao WHERE Edit1 = '$cod_intru'";

$resultadoz = @mysql_query($consultaz);

$rowz = @mysql_fetch_array($resultadoz);

$Edit2      = utf8_decode(@$rowz['Edit2']);
$Edit3      = utf8_decode(@$rowz['Edit3']);
$Edit12	    = @$rowz["Edit12"];
$Edit13	    = utf8_decode(@$rowz["Edit13"]);
$Edit14	    = utf8_decode(@$rowz["Edit14"]);
$Edit15	    = utf8_decode(@$rowz["Edit15"]);
$Edit16	    = utf8_decode(@$rowz["Edit16"]);
$Edit17	    = utf8_decode(@$rowz["Edit17"]);

$sed_agecho = trim($Edit13)."-".trim($Edit14)."/".trim($Edit16)."-".$Edit17;

include('fpdf.php');
// Inicia Codigo dos Boletos
include('i25.php');

// Inicio do Boleto
$pdf = new PDF_i25();
$pdf->Open();
$pdf->SetAutoPageBreak(0, 0);
$pdf->SetTopMargin(0);
$pdf->AddPage('L');
$pdf->SetDisplayMode(fullwidth, continuous);

// Inicio do Loop
while($linha = @mysql_fetch_array($resultado)) {

$conta_pag = $conta_pg++;
$faz_gui1 = 1;

$pdf->ln();

// x = horizontal y = vertical z = largura w = altura

$vencto       = $vencto1;
$categoria    = $linha["CATEGORIA"];
$cod_p        = $linha["CODP"];
$rg           = $linha["RGASSOC"];
$nudoc        = $linha["COD"];
$num_doc      = $linha["COD"];
$estado       = $linha["ESTADORES"];
$valor        = $valor1;
$sacado       = $linha["NOMEASSOC"];
$cnpj         = $linha["CPF"];
$endereco     = $linha["RUA"]." ".$linha["ENDRESID"].",".$linha["NUMERO"];
$cep          = $linha["CEPRES"];
$bairro       = $linha["BAIRRORES"];
$cidade       = $linha["CIDADERES"];
$uf           = $linha["ESTADORES"];
$nu           = $linha["NU"];
$i_inscri     = $insc_2;
$adm          = 0;
//$i_mes1       = $linha["MES"];;
//$i_ano1       = $linha["ANO"];;

// Abre Tabela Oposicao

$consulta6a  = "SELECT * FROM oposicao3 Where RGASSOC = '$rg'";

$resultado6a = @mysql_query($consulta6a);

$row6a = @mysql_fetch_array($resultado6a);

$cod_opo = @$row6a["COD"];
$rg_opo  = @$row6a["RGASSOC"];

if ($cod_opo != 0){

	echo  'S�cio Com Carta de OPOSI��O sem emiss�o de Boletos '.$i_ano_data.'<br>';
	echo  'Nome do S�cio   '.$sacado.'<br>';
	echo  'Matricula N�  '.$cod_p.'<br>';
	$conta_dor = "";	
	?>
	
	<form method="POST" action="javascript:window.close()">
	<td><input type=image name="vontar" src="../imagens/botaoazul33.PNG"/></td>
	</form>
	
	<?
		
	exit;
}

$consulta7a  = "SELECT * FROM oposicao3 Where CPF = '$cnpj'";

$resultado7a = @mysql_query($consulta7a);

$row7a = @mysql_fetch_array($resultado7a);

$cod_opo = @$row7a["COD"];
$cpf_opo = @$row7a["CPF"];

if ($cod_opo != 0){
	
	echo  'S�cio Com Carta de OPOSI��O sem emiss�o de Boletos '.$i_ano_data.'<br>';
	echo  'Nome do S�cio   '.$sacado.'<br>';
	echo  'Matricula N�  '.$cod_p.'<br>';
	$conta_dor = "";	
	?>
	
	<form method="POST" action="javascript:window.close()">
	<td><input type=image name="vontar" src="../imagens/botaoazul33.PNG"/></td>
	</form>
	
	<?
		
	exit;
}


// Atualiza Mensalidade

$cons_mensa_7  = "SELECT * FROM aberto_soc_tiete WHERE CODP = '$cod_p'  ORDER BY ANO ASC, MES ASC";

$resu_mensa_7 = @mysql_query($cons_mensa_7);

while ($linha7 = @mysql_fetch_array($resu_mensa_7))
{

$i_mes2 = $linha7["MES"];
$i_ano2 = $linha7["ANO"];

}

//if($i_mes2 >= 1){
//	if($i_mes2 != 12){
//       $i_ate_mes  =  ($i_ate_mes - $i_mes2);
//	}
   //echo $i_ate_mes;
   //break;
//}

if (empty($i_mes2)){
	$i_mes = $i_mes1;
}else{
	$i_mes = $i_mes2;
}

if (empty($i_ano2)){
	$i_ano = $i_ano1;
}else{
	$i_ano = $i_ano2;
}

if (empty($i_ano)){

   $i_mes = substr($i_inscri,3,2) + 1;
   
   if ($i_ano_data > substr($i_inscri,6,4)){
   	
   	   $i_ano = substr($i_inscri,6,4);
   	   
   }else{
   
       $i_ano = substr($i_inscri,6,4);	
   }
  
	if ($i_mes > 12){
		
		$i_ano++;
		$i_mes = 1;
		    
	}
	
	$nov_mes = $i_mes;


}else{

	if ($i_ano_data > date('Y') or $i_ano_data < date('Y') ){
		
		$i_mes = $i_mes + 1;
		//$i_mes = 1;
		//$i_ano = $i_ano_data;
        //$nov_mes = 0;

		if ($i_mes > 12){
				  	
			$i_ano++;
			$i_mes = 1;
		}
		$nov_mes = $i_mes;


	}else{

		$i_mes = $i_mes + 1;
		
		if ($i_mes > 12){
				  	
			$i_ano++;
			$i_mes = 1;
		}
		$nov_mes = $i_mes;

	}
	    
}

$nov_ano = $i_ano;

$ate_nov_ano = $i_ano_data + 1;

while($nov_ano < $ate_nov_ano and $conta_dor < $i_ate_mes){

      $conta_dor++;
      if ($conta_dor > 150){
      	
      	echo "Ocorreu um Erro Interno: Tente novamente!!! N� erro:".$conta_dor."<br>";
      	echo "Iniciar em Ano ".$nov_ano."<br>";
        echo "Apartir do Mes ".$i_mes."<br>";

      	break;
      	
      }

      
      if ($i_mes == 1){
      	  $mes_pag = "JAN";
      	  $ref = "JAN /".$i_ano;
      	  $i_vencto = "05/01/".$i_ano;
      }
      if ($i_mes == 2){
      	  $mes_pag = "FEV";
      	  $ref = "FEV /".$i_ano;
      	  $i_vencto = "05/02/".$i_ano;
      }
      if ($i_mes == 3){
      	  $mes_pag = "MAR";
      	  $ref = "MAR /".$i_ano;
      	  $i_vencto = "05/03/".$i_ano;
      }
      if ($i_mes == 4){
      	  $mes_pag = "ABR";
      	  $ref = "ABR /".$i_ano;
      	  $i_vencto = "05/04/".$i_ano;
      }
      if ($i_mes == 5){
      	  $mes_pag = "MAI";
      	  $ref = "MAI /".$i_ano;
      	  $i_vencto = "05/05/".$i_ano;
      }
      if ($i_mes == 6){
      	  $mes_pag = "JUN";
      	  $ref = "JUN /".$i_ano;
      	  $i_vencto = "05/06/".$i_ano;
      }
      if ($i_mes == 7){
      	  $mes_pag = "JUL";
      	  $ref = "JUL /".$i_ano;
      	  $i_vencto = "05/07/".$i_ano;
      }
      if ($i_mes == 8){
      	  $mes_pag = "AGO";
      	  $ref = "AGO /".$i_ano;
      	  $i_vencto = "05/08/".$i_ano;
      }
      if ($i_mes == 9){
      	  $mes_pag = "SET";
      	  $ref = "SET /".$i_ano;
      	  $i_vencto = "05/09/".$i_ano;
      }
      if ($i_mes == 10){
      	  $mes_pag = "OUT";
      	  $ref = "OUT /".$i_ano;
      	  $i_vencto = "05/10/".$i_ano;
      }
      if ($i_mes == 11){
      	  $mes_pag = "NOV";
      	  $ref = "NOV /".$i_ano;
      	  $i_vencto = "05/11/".$i_ano;
      }
      if ($i_mes == 12){
      	  $mes_pag = "DEZ";
      	  $ref = "DEZ /".$i_ano;
      	  $i_vencto = "05/12/".$i_ano;
      }
      if ($i_mes > 12){
      	  $i_ano++;
      	  
      }


		if ($nu == "A"){
			$vv_nui = 1; // Sede Sete de Abril
		}
		if ($nu == "B"){
			$vv_nui = 2; // Sub Santo Amaro
		}
		if ($nu == "C"){
			$vv_nui = 3; // Sub Santana
		}
		if ($nu == "D"){
			$vv_nui = 4; // Sub Tatuape
		}
		if ($nu == "E"){
			$vv_nui = 5; // Sede Sete de Abril
		}
		
		if ($i_mes == 1){
			$vv_mesi = "01";
		}    
		if ($i_mes == 2){
			$vv_mesi = "02";
		}    
		if ($i_mes == 3){
			$vv_mesi = "03";
		}    
		if ($i_mes == 4){
			$vv_mesi = "04";
		}    
		if ($i_mes == 5){
			$vv_mesi = "05";
		}    
		if ($i_mes == 6){
			$vv_mesi = "06";
		}    
		if ($i_mes == 7){
			$vv_mesi = "07";
		}    
		if ($i_mes == 8){
			$vv_mesi = "08";
		}    
		if ($i_mes == 9){
			$vv_mesi = "09";
		}    
		if ($i_mes == 10){
			$vv_mesi = "10";
		}    
		if ($i_mes == 11){
			$vv_mesi = "11";
		}    
		if ($i_mes == 12){
			$vv_mesi = "12";
		}    
		
        if ($i_mes > 12){
        	$vv_mesi = "1";
        	$i_ano++;
        }
		
		$nov_valor1 = str_replace(".","",$valor1);
		$nov_valor2 = str_replace(",","",$nov_valor1);
		
		$valorz = formata_numero($nov_valor2,10,0);
		
		$fator_vencimento 	=  fator_vencimento($i_vencto);
		$nudoc1             =  formata_numero($nudoc,5,0);
		$nosso_numero       =  $convenio.$nudoc1.'-'.modulo_10($convenio.$nudoc1);
		$nossonumero        =  $nudoc1;
		$conta 				=  formata_numero($conta,8,0);
		
		$vCOMPL             = '00'.$nudoc1.$vv_nui.$vv_mesi;
		
		$dv 			    =  modulo_11($codigobanco.$nummoeda.$fator_vencimento.$valorz."000000".$convenio.$vCOMPL.$carteira);
		$linha 			    =  $codigobanco.$nummoeda.$dv.$fator_vencimento.$valorz."000000".$convenio.$vCOMPL.$carteira;
		$linha2             =  monta_linha_digitavel($linha);
		
		$codigo_barras      = $linha;
		$linha_digitavel    = $linha2;
		
		if ($faz_gui1 == 1){
	    			
		// Primeira Guia Recibo do Sacado
		
			$i_var_1a    = $conta_pag;
			$i_var_2a    = $linha_digitavel;
			$i_var_3a    = $i_vencto;
			$i_var_4a    = $cedente;
			$i_var_5a    = $agen_cod;
			$i_var_6a    = $data_doc;
			$i_var_7a    = $cod_p;
			$i_var_8a    = $adm;
			$i_var_9a    = $especie_doc;
			$i_var_10a   = $aceite;
			$i_var_11a   = $data_doc;
			$i_var_12a   = $nosso_numero;
			$i_var_13a   = $carteira;
			$i_var_14a   = $especie;
			$i_var_15a   = $valor;
			$i_var_16a   = $referente;
			$i_var_17a   = $ref;
			$i_var_18a   = $Edit12;
			$i_var_19a   = $valor;
			$i_var_20a   = $sacado;
			$i_var_21a   = $cod_p;
			$i_var_22a   = $cnpj;
			$i_var_23a   = $endereco;
			$i_var_24a   = $cep;
			$i_var_25a   = $cidade;
			$i_var_26a   = $uf;
			$i_var_27a   = $codigo_barras;
					
			$faz_gui1++;
			$conta_pag++;
					 
			$i_mes = $i_mes + 1;
			$qtd = $qtd + 1;
			$som_qtd = $som_qtd + 1;
		
		}else{
	
		// Segunda Guia Recibo do Sacado
		
			$i_var_1b    = $conta_pag;
			$i_var_2b    = $linha_digitavel;
			$i_var_3b    = $i_vencto;
			$i_var_4b    = $cedente;
			$i_var_5b    = $agen_cod;
			$i_var_6b    = $data_doc;
			$i_var_7b    = $cod_p;
			$i_var_8b    = $adm;
			$i_var_9b    = $especie_doc;
			$i_var_10b   = $aceite;
			$i_var_11b   = $data_doc;
			$i_var_12b   = $nosso_numero;
			$i_var_13b   = $carteira;
			$i_var_14b   = $especie;
			$i_var_15b   = $valor;
			$i_var_16b   = $referente;
			$i_var_17b   = $ref;
			$i_var_18b   = $Edit12;
			$i_var_19b   = $valor;
			$i_var_20b   = $sacado;
			$i_var_21b   = $cod_p;
			$i_var_22b   = $cnpj;
			$i_var_23b   = $endereco;
			$i_var_24b   = $cep;
			$i_var_25b   = $cidade;
			$i_var_26b   = $uf;
			$i_var_27b   = $codigo_barras;
				
			$faz_gui1 = 1;
			$conta_pag++;
					 
			$i_mes = $i_mes + 1;
			$qtd = $qtd + 1;
			$som_qtd = $som_qtd + 1;


		$pdf->image("../imagens/bb_doc_2.png",0,0,257,209);

		
		// Primeira Guia
		
		// Recibo do Sacado
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,5.4, 'Cedente');

		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(13,8.3, 'SINDIFICIOS');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,12.2, 'Vencimento');
		
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Text(28,15.3, $i_var_3a);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,19, 'Ag�ncia/C�digo Cedente');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(17,22, $i_var_5a);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,25.5, 'Nosso N�mero');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(21,29, $i_var_12a);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,33, 'N� do Documento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(34,36, $i_var_7a.'/'.$i_var_8a);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,39.8, '(=) Valor do Documento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(40,43, $i_var_15a);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,47.4, '(-) Descontos/Abatimentos');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,54, '(-) Outras Dedu��es');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,60.3, '(+) Mora/Multa');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,67.3, '(+) Outros Acr�scimos');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,73.4, '(=) Valor Cobrado');

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,80, 'Sacado');
		
		$pdf->SetFont('Arial', '', 6);
		$pdf->Text(12,83, substr($i_var_20a,0,25));
		
		$pdf->SetFont('Arial', '',6);
		$pdf->Text(38,80, $i_var_17a);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,86, 'N� Matricula');

		$pdf->SetFont('Arial', '', 10);
		$pdf->Text(22,90, $i_var_21a);

        // Ficha de Compensa��o
		
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Text(34,2, $i_var_1a);
		
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->Text(56.1,6, 'Banco do Brasil');
		
		$pdf->SetFont('Arial', 'B', 17);
		$pdf->Text(99,6, '001-9');
		
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Text(126,7, $i_var_2a); 
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56.1,11.2, 'Local de Pagamento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(56.1,14.5, 'Pag�vel em qualquer banco at� o vencimento');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(202,11.2, 'Vencimento');
		
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Text(221,14, $i_var_3a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56.1,18, 'Cedente');
		
		$pdf->SetFont('Arial', '', 8);
		$pdf->Text(56.1,20.7, $i_var_4a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(202,18, 'Ag�ncia/C�digo Cedente');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(207,20.9, $i_var_5a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56.1,25, 'Data do Documento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(60,28, $i_var_6a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(83,25, 'N� do Documento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(88,28, $i_var_7a.'/'.$i_var_8a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(122,25, 'Esp�cie Doc.');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(128,28, $i_var_9a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(147,25, 'Aceite');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(153,28, $i_var_10a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(165,25, 'Data Processamento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(175,28, $i_var_11a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(202,25, 'Nosso N�mero');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(218,28, $i_var_12a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56.1,32, 'Uso do banco');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(99.1,32, 'Carteira');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(110,34, $i_var_13a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(122.1,32, 'Moeda');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(131,34, $i_var_14a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(146.1,32, 'Quantidade');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(165.1,32, 'Valor');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(202.4,31.6, '(=) Valor do Documento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(230,34, $i_var_15a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56,37.6, 'Instru��es(Texto de responsabilidade do cedente)');
		
		$pdf->SetFont('Arial', '',8);
		$pdf->Text(57,40.8, $i_var_16a.':');
		
		$pdf->SetFont('Arial', '',8);
		$pdf->Text(108,40.8, $i_var_17a);
		
		$pdf->SetXY(56,42);
		$pdf->MultiCell(143,4, $i_var_18a, 0, '',0); // J Justificado
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(203,37.9, '(-) Descontos/Abatimentos');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(203,44.5, '(-) Outras Dedu��es');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(203,51.3, '(+) Mora/Multa');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(203,58.6, '(+) Outros Acr�scimos');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(203,65.5, '(=) Valor Cobrado');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(230,67.7, $i_var_19a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56,71.4, 'Sacado');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(75,72, $i_var_20a);
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(188,72, $i_var_21a);
		
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Text(237.6,72, '17727');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(216,75.6, 'CPF.: '.$i_var_22a);
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(75,75.6, $i_var_23a);
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(75,79.4, $i_var_24a.'     -     '.$i_var_25a.'      -     '.$i_var_26a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56,80.9, 'Sacador/Avalista');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(170,80.9, 'C�digo de Caixa');
		
		// Codigo de Barras
		$pdf->i25(55,84.4, $i_var_27a);
 
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Text(10,95.6, 'Recibo do Sacado');
		 
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(185,84.6, 'Autentica��o Mec�nica / FICHA DE COMPENSA��O');

        // Limpa Variaveis da Primeira Guia

		$i_var_1a    = '';
		$i_var_2a    = '';
		$i_var_3a    = '';
		$i_var_4a    = '';
		$i_var_5a    = '';
		$i_var_6a    = '';
		$i_var_7a    = '';
		$i_var_8a    = '';
		$i_var_9a    = '';
		$i_var_10a   = '';
		$i_var_11a   = '';
		$i_var_12a   = '';
		$i_var_13a   = '';
		$i_var_14a   = '';
		$i_var_15a   = '';
		$i_var_16a   = '';
		$i_var_17a   = '';
		$i_var_18a   = '';
		$i_var_19a   = '';
		$i_var_20a   = '';
		$i_var_21a   = '';
		$i_var_22a   = '';
		$i_var_23a   = '';
		$i_var_24a   = '';
		$i_var_25a   = '';
		$i_var_26a   = '';
		$i_var_27a   = '';


        // Segunda Guia

		// Recibo do Sacado
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,109.4, 'Cedente');

		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(13,112.4, 'SINDIFICIOS');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,116.2, 'Vencimento');
		
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Text(28,119, $i_var_3b);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,123, 'Ag�ncia/C�digo Cedente');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(17,126, $i_var_5b);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,129.5, 'Nosso N�mero');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(21,133, $i_var_12b);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,137, 'N� do Documento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(34,140, $i_var_7b.'/'.$i_var_8b);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,143.8, '(=) Valor do Documento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(40,147, $i_var_15b);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,151.4, '(-) Descontos/Abatimentos');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,158, '(-) Outras Dedu��es');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,164.3, '(+) Mora/Multa');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,171.3, '(+) Outros Acr�scimos');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,177.4, '(=) Valor Cobrado');

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,184, 'Sacado');
		
		$pdf->SetFont('Arial', '', 6);
		$pdf->Text(12,187, substr($i_var_20b,0,25));
		
		$pdf->SetFont('Arial', '',6);
		$pdf->Text(38,184, $i_var_17b);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,190, 'N� Matricula');

		$pdf->SetFont('Arial', '', 10);
		$pdf->Text(22,194, $i_var_21b);

        // Ficha de Compensa��o

		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Text(34,106, $i_var_1b);
		
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->Text(56.1,110, 'Banco do Brasil');
		
		$pdf->SetFont('Arial', 'B', 17);
		$pdf->Text(99,110, '001-9');
		
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Text(126,110.7, $i_var_2b); 
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56.1,115.4, 'Local de Pagamento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(56.1,118.5, 'Pag�vel em qualquer banco at� o vencimento');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(202,115.4, 'Vencimento');
		
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Text(221,118.5, $i_var_3b);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56.1,122, 'Cedente');
		
		$pdf->SetFont('Arial', '', 8);
		$pdf->Text(56.1,124.7, $i_var_4b);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(202,122, 'Ag�ncia/C�digo Cedente');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(207,124.9, $i_var_5b);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56.1,129, 'Data do Documento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(60,132, $i_var_6b);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(83,129, 'N� do Documento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(88,132, $i_var_7b.'/'.$i_var_8b);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(122,129, 'Esp�cie Doc.');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(128,132, $i_var_9b);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(147,129, 'Aceite');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(153,132, $i_var_10b);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(165,129, 'Data Processamento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(175,132, $i_var_11b);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(202,128.5, 'Nosso N�mero');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(218,132, $i_var_12b);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56.1,136, 'Uso do banco');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(99.1,136, 'Carteira');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(110,138, $i_var_13b);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(122.1,136, 'Moeda');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(131,138, $i_var_14b);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(146.1,136, 'Quantidade');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(165.1,136, 'Valor');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(202.4,136, '(=) Valor do Documento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(230,138, $i_var_15b);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56,141.6, 'Instru��es(Texto de responsabilidade do cedente)');
		
		$pdf->SetFont('Arial', '',8);
		$pdf->Text(57,144.8, $i_var_16b.':');
		
		$pdf->SetFont('Arial', '',8);
		$pdf->Text(108,144.8, $i_var_17b);
		
		$pdf->SetXY(56,146);
		$pdf->MultiCell(143,4, $i_var_18b, 0, '',0); // J Justificado
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(203,141.6, '(-) Descontos/Abatimentos');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(203,148.5, '(-) Outras Dedu��es');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(203,155.5, '(+) Mora/Multa');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(203,162.6, '(+) Outros Acr�scimos');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(203,169.5, '(=) Valor Cobrado');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(230,171.9, $i_var_19b);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56,175.6, 'Sacado');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(75,176.3, $i_var_20b);
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(188,176.3, $i_var_21b);
		
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Text(237.6,176.3, '17727');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(216,179.6, 'CPF.: '.$i_var_22b);
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(75,179.6, $i_var_23b);
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(75,183.4, $i_var_24b.'     -     '.$i_var_25b.'      -     '.$i_var_26b);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56,184.9, 'Sacador/Avalista');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(170,184.9, 'C�digo de Caixa');
		
		// Codigo de Barras
		$pdf->i25(55,188.4, $i_var_27b);
		 
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Text(10,199.6, 'Recibo do Sacado');
		 
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(185,188.6, 'Autentica��o Mec�nica / FICHA DE COMPENSA��O');
				
        $pdf->AddPage('L');	

		}
		
		if ($i_ano_data == date('Y')){
			
			$i_ano = date('Y');
		}

		if (!empty($i_var_1a) and $i_ano == $i_ano_data ){
			
		$pdf->image("../imagens/bb_doc_1.png",0,0,257,209);

		
		// Primeira Guia
		
		// Recibo do Sacado
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,5.4, 'Cedente');

		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(13,8.3, 'SINDIFICIOS');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,12.2, 'Vencimento');
		
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Text(28,15.3, $i_var_3a);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,19, 'Ag�ncia/C�digo Cedente');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(17,22, $i_var_5a);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,25.5, 'Nosso N�mero');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(21,29, $i_var_12a);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,33, 'N� do Documento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(34,36, $i_var_7a.'/'.$i_var_8a);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,39.8, '(=) Valor do Documento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(40,43, $i_var_15a);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,47.4, '(-) Descontos/Abatimentos');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,54, '(-) Outras Dedu��es');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,60.3, '(+) Mora/Multa');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,67.3, '(+) Outros Acr�scimos');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,73.4, '(=) Valor Cobrado');

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,80, 'Sacado');
		
		$pdf->SetFont('Arial', '', 6);
		$pdf->Text(12,83, substr($i_var_20a,0,25));
		
		$pdf->SetFont('Arial', '',6);
		$pdf->Text(38,80, $i_var_17a);

		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,86, 'N� Matricula');

		$pdf->SetFont('Arial', '', 10);
		$pdf->Text(22,90, $i_var_21a);
		
		
		// Ficha de Compensa��o
		
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Text(34,2, $i_var_1a);
		
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->Text(56.1,6, 'Banco do Brasil');
		
		$pdf->SetFont('Arial', 'B', 17);
		$pdf->Text(99,6, '001-9');
		
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Text(126,7, $i_var_2a); 
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56.1,11.2, 'Local de Pagamento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(56.1,14.5, 'Pag�vel em qualquer banco at� o vencimento');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(202,11.2, 'Vencimento');
		
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Text(221,14, $i_var_3a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56.1,18, 'Cedente');
		
		$pdf->SetFont('Arial', '', 8);
		$pdf->Text(56.1,20.7, $i_var_4a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(202,18, 'Ag�ncia/C�digo Cedente');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(207,20.9, $i_var_5a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56.1,25, 'Data do Documento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(60,28, $i_var_6a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(83,25, 'N� do Documento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(88,28, $i_var_7a.'/'.$i_var_8a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(122,25, 'Esp�cie Doc.');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(128,28, $i_var_9a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(147,25, 'Aceite');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(153,28, $i_var_10a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(165,25, 'Data Processamento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(175,28, $i_var_11a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(202,25, 'Nosso N�mero');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(218,28, $i_var_12a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56.1,32, 'Uso do banco');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(99.1,32, 'Carteira');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(110,34, $i_var_13a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(122.1,32, 'Moeda');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(131,34, $i_var_14a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(146.1,32, 'Quantidade');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(165.1,32, 'Valor');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(202.4,31.6, '(=) Valor do Documento');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(230,34, $i_var_15a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56,37.6, 'Instru��es(Texto de responsabilidade do cedente)');
		
		$pdf->SetFont('Arial', '',8);
		$pdf->Text(57,40.8, $i_var_16a.':');
		
		$pdf->SetFont('Arial', '',8);
		$pdf->Text(108,40.8, $i_var_17a);
		
		$pdf->SetXY(56,42);
		$pdf->MultiCell(143,4, $i_var_18a, 0, '',0); // J Justificado
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(203,37.9, '(-) Descontos/Abatimentos');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(203,44.5, '(-) Outras Dedu��es');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(203,51.3, '(+) Mora/Multa');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(203,58.6, '(+) Outros Acr�scimos');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(203,65.5, '(=) Valor Cobrado');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(230,67.7, $i_var_19a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56,71.4, 'Sacado');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(75,72, $i_var_20a);
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(188,72, $i_var_21a);
		
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Text(237.6,72, '17727');
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(216,75.6, 'CPF.: '.$i_var_22a);
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(75,75.6, $i_var_23a);
		
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(75,79.4, $i_var_24a.'     -     '.$i_var_25a.'      -     '.$i_var_26a);
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(56,80.9, 'Sacador/Avalista');
		
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(170,80.9, 'C�digo de Caixa');
		
		// Codigo de Barras
		$pdf->i25(55,84.4, $i_var_27a);
 
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Text(10,95.6, 'Recibo do Sacado');
		 
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(185,84.6, 'Autentica��o Mec�nica / FICHA DE COMPENSA��O');
        }

		if ($i_mes > 12){
		  	
		   	$nov_ano++;
		  	//$i_ano++;
		  	$i_mes = 1;
		}

  }  // Pertence ao While		

}


if ($categoria == 'D'){

echo  'S�cio Consta como DESISTENTE sem emiss�o de Boletos '.$i_ano_data.'<br>';
echo  'Nome do S�cio   '.$sacado;
$conta_dor = "";	
?>

<form method="POST" action="javascript:window.close()">
<td><input type=image name="vontar" src="../imagens/botaoazul33.PNG"/></td>
</form>

<?
	
exit;
	
}
if ($categoria == 'O'){

echo  'S�cio Com Carta de OPOSI��O sem emiss�o de Boletos '.$i_ano_data.'<br>';
echo  'Nome do S�cio   '.$sacado;
$conta_dor = "";	
?>

<form method="POST" action="javascript:window.close()">
<td><input type=image name="vontar" src="../imagens/botaoazul33.PNG"/></td>
</form>

<?
	
exit;
	
}
if (empty($cnpj)){

echo  'S�cio Com CPF invalido Verifique !!! CPF.: '.$cnpj.'<br>';
echo  'Nome do S�cio   '.$sacado;
$conta_dor = "";	
?>

<form method="POST" action="javascript:window.close()">
<td><input type=image name="vontar" src="../imagens/botaoazul33.PNG"/></td>
</form>

<?
	
exit;
	
}

if (!empty($conta_dor)){
	

		// Atualiza Tabela Socios_historico
		$data_log = date("d/m/Y");
		$hora_log = date("H:i:s"); 
		$even_log = "Retirada de Carne Clube Tiete";
		
		$consulta_log  = "SELECT * FROM socios_historico WHERE CODP = '$cod_p' AND DATE = '$data_log'";
			                   
		$resultado_log = @mysql_query($consulta_log);
		
		$row_log       = @mysql_fetch_array($resultado_log);
		
		$id_log        = @$row_log["id"];
		
		if (empty($id_log)){
			
			$cons_10 = "INSERT INTO socios_historico (CODP,
			                                          DATA,
													  HORA,
													  DESCRICAO)
													 
			                              VALUES     ('$cod_p',
										              '$data_log',
													  '$hora_log',
													  '$even_log')";
			
		}else{
		
		//ECHO "ENTREI AQUI ".$cod_p;
			
			$cons_10 = "UPDATE socios_historico SET DATA = '$data_log',
			                                        HORA = '$hora_log'  WHERE CODP = '$cod_p' AND DATE = '$data_log'";
			
		}
					
		@mysql_query($cons_10, $link);
	
	
	   $pdf->AutoPrint(true);
	   $pdf->Output();
	   @mysql_close(); 
}else{
	

$pdf->SetFont('Arial', '', 18);
$pdf->Text(12,10, 'N�o Consta Debito referente ao ano de  '.$i_ano_data.', sem Emiss�o de Boletos ');
$pdf->Text(12,18, 'S�cio  '.$sacado);

$pdf->Output();
@mysql_close(); 	
}

}else{
	
include("enaaurlnp.php");
	
}


// Inicio das Funcoes do Boleto

/*
  Fator vencimento Modulo 10 e 11 
  Gerador de Linha digitavel
*/
function fator_vencimento($data) {
	$data = split("/",$data);
	$ano = $data[2];
	$mes = $data[1];
	$dia = $data[0];
    return(abs((_dateToDays("1997","10","07")) - (_dateToDays($ano, $mes, $dia))));
}

function _dateToDays($year,$month,$day)
{
    $century = substr($year, 0, 2);
    $year = substr($year, 2, 2);
    if ($month > 2) {
        $month -= 3;
    } else {
        $month += 9;
        if ($year) {
            $year--;
        } else {
            $year = 99;
            $century --;
        }
    }

    return ( floor((  146097 * $century)    /  4 ) +
            floor(( 1461 * $year)        /  4 ) +
            floor(( 153 * $month +  2) /  5 ) +
                $day +  1721119);
}

function modulo_10($num) { 
	$numtotal10 = 0;
	$fator = 2;
 
	for ($i = strlen($num); $i > 0; $i--) {
		$numeros[$i] = substr($num,$i-1,1);
		$parcial10[$i] = $numeros[$i] * $fator;
		$numtotal10 .= $parcial10[$i];
		if ($fator == 2) {
			$fator = 1;
		}
		else {
			$fator = 2; 
		}
	}
	
	$soma = 0;
	for ($i = strlen($numtotal10); $i > 0; $i--) {
		$numeros[$i] = substr($numtotal10,$i-1,1);
		$soma += $numeros[$i]; 
	}
	$resto = $soma % 10;
	$digito = 10 - $resto;
	if ($resto == 0) {
		$digito = 0;
	}

	return $digito;
}

function modulo_11($num, $base=9, $r=0) {
	$soma = 0;
	$fator = 2; 
	for ($i = strlen($num); $i > 0; $i--) {
		$numeros[$i] = substr($num,$i-1,1);
		$parcial[$i] = $numeros[$i] * $fator;
		$soma += $parcial[$i];
		if ($fator == $base) {
			$fator = 1;
		}
		$fator++;
	}
	if ($r == 0) {
		$soma *= 10;
		$digito = $soma % 11;
		
		//corrigido
		if ($digito == 10) {
			$digito = "X";
		}

		if (strlen($num) == "43") {
			//ent�o estamos checando a linha digit�vel
			if ($digito == "0" or $digito == "X" or $digito > 9) {
					$digito = 1;
			}
		}
		return $digito;
	} 
	elseif ($r == 1){
		$resto = $soma % 11;
		return $resto;
	}
}

function calcNossoNumero($X){
	$peso = 2;
	for($i=strlen($X)-1;$i>=0;$i--){
		$num[$i] = substr($X, $i,1)*$peso;
		$soma += $num[$i];
		$peso++;
		if($peso == 10){	$peso=2;	}
	}
	$resto = $soma % 11;
	$resultado = 11 - $resto;
	if($resultado>9){	$resultado=0;	}
	return $resultado;
}

function esquerda($entra,$comp){
	return substr($entra,0,$comp);
}

function direita($entra,$comp){
	return substr($entra,strlen($entra)-$comp,$comp);
}

function formata_numero($numero,$loop,$insert,$tipo = "geral") {
	if ($tipo == "geral") {
		$numero = str_replace(",","",$numero);
		while(strlen($numero)<$loop){
			$numero = $insert . $numero;
		}
	}
	if ($tipo == "valor") {
		/*
		retira as virgulas
		formata o numero
		preenche com zeros
		*/
		$numero = str_replace(",","",$numero);
		while(strlen($numero)<$loop){
			$numero = $insert . $numero;
		}
	}
	if ($tipo = "convenio") {
		while(strlen($numero)<$loop){
			$numero = $numero . $insert;
		}
	}
	return $numero;
}
function monta_linha_digitavel($linha) {

    $p1 = substr($linha, 0, 4);
    $p2 = substr($linha, 19, 5);
    $p3 = modulo_10("$p1$p2");
    $p4 = "$p1$p2$p3";
    $p5 = substr($p4, 0, 5);
    $p6 = substr($p4, 5);
    $campo1 = "$p5.$p6";

    // 2. Campo - composto pelas posi�oes 6 a 15 do campo livre
    // e livre e DV (modulo10) deste campo
    $p1 = substr($linha, 24, 10);
    $p2 = modulo_10($p1);
    $p3 = "$p1$p2";
    $p4 = substr($p3, 0, 5);
    $p5 = substr($p3, 5);
    $campo2 = "$p4.$p5";

    // 3. Campo composto pelas posicoes 16 a 25 do campo livre
    // e livre e DV (modulo10) deste campo
    $p1 = substr($linha, 34, 10);
    $p2 = modulo_10($p1);
    $p3 = "$p1$p2";
    $p4 = substr($p3, 0, 5);
    $p5 = substr($p3, 5);
    $campo3 = "$p4.$p5";

    // 4. Campo - digito verificador do codigo de barras
    $campo4 = substr($linha, 4, 1);

    $campo5 = substr($linha, 5, 14);

    return "$campo1 $campo2 $campo3 $campo4 $campo5"; 
}

function Limpa_var_a(){
	
$i_var_1a    = '';
$i_var_2a    = '';
$i_var_3a    = '';
$i_var_4a    = '';
$i_var_5a    = '';
$i_var_6a    = '';
$i_var_7a    = '';
$i_var_8a    = '';
$i_var_9a    = '';
$i_var_10a   = '';
$i_var_11a   = '';
$i_var_12a   = '';
$i_var_13a   = '';
$i_var_14a   = '';
$i_var_15a   = '';
$i_var_16a   = '';
$i_var_17a   = '';
$i_var_18a   = '';
$i_var_19a   = '';
$i_var_20a   = '';
$i_var_21a   = '';
$i_var_22a   = '';
$i_var_23a   = '';
$i_var_24a   = '';
$i_var_25a   = '';
$i_var_26a   = '';
$i_var_27a   = '';
	
}

function Limpa_var_b(){
	
$i_var_1b    = '';
$i_var_2b    = '';
$i_var_3b    = '';
$i_var_4b    = '';
$i_var_5b    = '';
$i_var_6b    = '';
$i_var_7b    = '';
$i_var_8b    = '';
$i_var_9b    = '';
$i_var_10b   = '';
$i_var_11b   = '';
$i_var_12b   = '';
$i_var_13b   = '';
$i_var_14b   = '';
$i_var_15b   = '';
$i_var_16b   = '';
$i_var_17b   = '';
$i_var_18b   = '';
$i_var_19b   = '';
$i_var_20b   = '';
$i_var_21b   = '';
$i_var_22b   = '';
$i_var_23b   = '';
$i_var_24b   = '';
$i_var_25b   = '';
$i_var_26b   = '';
$i_var_27b   = '';
	
}

?>
