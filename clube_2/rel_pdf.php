<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar Relatorio em PDF
 Criado em Data.....: 13/11/2009
 Ultima Atualização : 24/11/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

//$timestamp = $_SERVER['REQUEST_TIME'];
//echo "Data e hora da requisição: " . 
//   date('d/m/Y - H:i:s', $timestamp);

include("../config.php");

include("../logar.php");

$tempo       = 0;
$cont_linha  = 0;
$lin         = 0;
$data        = date("d/m/Y"); 
$hora        = date("H:M:S");
$Pagina      = 1;
$conta_pag   = 1;
$total       = 0;

$inicio      = $_POST['Edit1'];
$fim         = $_POST['Edit2'];
$recebe      = $_POST['recerber'];


//echo $inicio."<br>";
//echo $fim."<br>";

$inicio_1 = substr($inicio,0,2);  // Dia
$inicio_2 = substr($inicio,3,2);  // Mes
$inicio_3 = substr($inicio,6,4);  // Ano
  

$fim_1 = substr($fim,0,2);  // Dia
$fim_2 = substr($fim,3,2);  // Mes
$fim_3 = substr($fim,6,4);  // Ano

$inicio_x = $inicio_3."-".$inicio_2."-".$inicio_1;
$fim_x    = $fim_3."-".$fim_2."-".$fim_1;

$iniciop = substr($inicio,6,4);

ini_set("max_execution_time", 7200); // Setado para 1 hora

$nome3 = strtoupper($_SESSION["nome_log"]);

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


$sql  = "SELECT * FROM `aberto_soc` WHERE str_to_date( DAT_BAI, '%d/%m/%Y' ) >= str_to_date('$inicio','%d/%m/%Y' )";



$resultado = @mysql_query($sql);

$row = @mysql_fetch_array($resultado);

$id      = @$row["id"];

if (empty($id)){
	
	echo "
	
	<style type=text/css>
    <!--

    body { background-image: url('../$logo_sis');}

    .style6{
	
	color: #336699;
	font-family: Verdana, Arial;
	font-weight: bold;
    }	

    -->
    </style>

	
     <br>
     <br>
     <body>
	 <div align=center>
     
     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Data Informada Não Encontrada !!! ***</b>
     <table align=center>
     <form method='POST' action='javascript:window.close()'>
     <td><input type=image name='Consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div></body>";

	exit;
}

			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = "IMPRESSAO DE REL.Conf/Assist/".$inicio_x;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);




//	$sql1  = "SELECT * FROM sindical WHERE SUBSTR(VENCTO,7,4) = '$iniciop' ORDER BY SINDCOD ASC";
//	$sql1  = "SELECT * FROM sindical WHERE EXER = '$iniciop' ORDER BY SINDCOD ASC";
	$sql1  = "SELECT * FROM `aberto_soc` WHERE str_to_date( DAT_BAI, '%d/%m/%Y' ) >= str_to_date('$inicio','%d/%m/%Y' ) AND str_to_date( DAT_BAI, '%d/%m/%Y' ) <= str_to_date('$fim','%d/%m/%Y' ) ORDER BY COD ASC, ANO ASC, MES ASC";
	
	$resultado1 = @mysql_query($sql1);
	
	
	include('fpdf.php');
	// Inicia Codigo dos Boletos
	include('i25.php');
	
	
	ini_set("max_execution_time", 7200); // Setado para 1 hora
	
	// Inicio do Boleto
	
	$pdf = new PDF_i25();
	$pdf->Open();
	$pdf->SetAutoPageBreak(0, 0);
	$pdf->SetTopMargin(0);
	$pdf->AddPage();
	$pdf->SetDisplayMode(fullwidth, continuous);
	
	// Inicio do Loop
	while($linha = @mysql_fetch_array($resultado1)) {
	
	//$conta_pag = $conta_pg++;
	
	$pdf->ln();
	
	// x = horizontal y = vertical z = largura w = altura
	
	//$pdf->image("../imagens/cef.png",0,0,211,303);
	//$total++;
	
	
	$codigo       = $linha["CODP"];
	$val_sindi    = $linha["TOTAL"];
	$venc_to      = $linha["VENCTO"];
	$exer         = $linha["MESANO"];
	$loc_pag      = $linha["AGENCIA"];
	$val_cred     = $linha["VALOR_CRED"];
		
	$consulta_cgc  = "SELECT * FROM socios WHERE CODP = '$codigo'";
							
							// Retorno o Resultado da Pesquisa
							
	@mysql_query($consulta_cgc, $link);
							     
	$resultado_cgc = @mysql_query($consulta_cgc);
							
	$row_cgc = @mysql_fetch_array($resultado_cgc);
							
	$id_cgc    = @$row_cgc["id"];
	$edif_cgc  = @$row_cgc["CODP"];
	$emp_edif  = @$row_cgc["NU_EMP"];
	$nome_edif = trim(@$row_cgc["NOMEASSOC"]);
	$end_edif  = trim(@$row_cgc["RUA"])." ".trim(@$row_cgc["ENDRESID"]).",".trim(@$row_cgc["NUMERO"]);
	$adm_edif  = @$row_cgc["ADM"];
	
	
	if ($cont_linha == 0){
		// Cabecalho do Relatorio
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Text(12,10, '_____________________________________________________________________________________________________________________________________');
		$pdf->Text(12,11, '_____________________________________________________________________________________________________________________________________');
		$pdf->Text(14,16, 'Sindificios - Sind. Empreg. Edif. SP');
		$pdf->Text(97,16, $data);
		$pdf->Text(182,16, 'Pagina.: '.$Pagina);
		$pdf->Text(12,18, '_____________________________________________________________________________________________________________________________________');
		$pdf->Text(12,19, '_____________________________________________________________________________________________________________________________________');
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->SetXY(12,20);
		
	
		$pdf->MultiCell(182,5, 'Relatorio de Baixa Mensalidades. de '.$inicio." ate ".$fim, 0, 'C',0); // J Justificado
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Text(12,25, '_____________________________________________________________________________________________________________________________________');
		$pdf->Text(12,26, '_____________________________________________________________________________________________________________________________________');
			//               012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890
			//               1         2         3         4         5         6         7         8         9         10        11        12        13        14        15          
			//                   Codigo      
		$pdf->SetFont('Arial', '', 7);
		$pdf->Text(12,30, 'Matricula');
		$pdf->Text(25,30, 'Nome Socio');
		$pdf->Text(75,30, 'Endereco');
		$pdf->SetXY(14,27);
		$pdf->MultiCell(130,5, 'Valor', 0, 'R',0); // J Justificado

		$pdf->SetXY(14,27);
		$pdf->MultiCell(150,5, 'Val.Cred.', 0, 'R',0); // J Justificado

		$pdf->Text(165,30, 'Ultimo Pagto');
//		$pdf->Text(177,30, 'Vencto');
	}
	
	
	// Conta numero de linha
	if ($lin == 0){
		$lin = 33;
	}else{
		$lin = $lin + 3;
	}
	
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Text(14,$lin, $codigo);
		
		
	$pdf->Text(25,$lin, substr($nome_edif,0,32));
		
	$pdf->Text(75,$lin, substr($end_edif,0,30));
		
	$pdf->SetXY(14,$lin-3);
	$pdf->MultiCell(130,5, number_format($val_sindi,2,",","."), 0, 'R',0); // J Justificado

	$pdf->SetXY(14,$lin-3);
	$pdf->MultiCell(149,5, number_format($val_cred,2,",","."), 0, 'R',0); // J Justificado
		
	$pdf->Text(166,$lin, $exer);
		
//	$pdf->Text(175,$lin, $venc_to);
	
	
	$valor_fim = $valor_fim + $val_sindi;
	$valor_fim2 = $valor_fim2 + $val_cred;
		
	$conta_pag++;
	$total++;
	
	
	// Verifica Numero de linha e cria outra pagina
	if ($conta_pag == 80){  // 80 em Retrato 54 em Paisagem
	   $cont_linha = 0;	
	   $conta_pag  = 1;
	   $Pagina++;
	   $pdf->SetFont('Arial', 'B', 7);
	   $pdf->Text(12,$lin+3, '_____________________________________________________________________________________________________________________________________');
	   $pdf->Text(12,$lin+4, '_____________________________________________________________________________________________________________________________________');
	   $lin = 0;
	   $pdf->AddPage();
		
	}
	
	}
	
	// Final do Relatorio
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Text(12,$lin+3, '_____________________________________________________________________________________________________________________________________');
	$pdf->Text(12,$lin+4, '_____________________________________________________________________________________________________________________________________');
	$pdf->SetFont('Arial', 'B', 9);
	
	
		$pdf->Text(15,$lin+8, 'Qtd.: '.$total);
	
		$pdf->Text(70,$lin+8, 'Total.:');
		
		$pdf->SetXY(14,$lin+5);
		$pdf->MultiCell(100,5, number_format($valor_fim,2,",","."), 0, 'R',0); // J Justificado

		$pdf->Text(120,$lin+8, 'Total Cred.:');
	
		$pdf->SetXY(14,$lin+5);
		$pdf->MultiCell(155,5, number_format($valor_fim2,2,",","."), 0, 'R',0); // J Justificado
	
	$pdf->AutoPrint(true);
	$pdf->Output();
	
	@mysql_close();   


// Inicio das Funcoes do Boleto

/*
Fator vencimento, phpboleto
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

function Modulo10($X){
	$peso = 1;
	for($i=1;$i<=strlen($X);$i++){
	$peso = ($peso == 2)? 1:2;
		$num[$i] = substr($X, strlen($X)-$i,1)*$peso;
		if(($num[$i])>9){	$num[$i] = substr($num[$i],0,1)+substr($num[$i],1,1);	}
		$soma += $num[$i];
	}
	$resto = $soma % 10;
	if($resto == 0)	$resultado = 0;
	else $resultado = 10 - $resto;
	
	return $resultado;
}

function Modulo11($X){
	$peso = 2;
	for($i=strlen($X)-1;$i>=0;$i--){
		$num[$i] = substr($X, $i,1)*$peso;
		$soma += $num[$i];
		$peso++;
		if($peso == 10){	$peso=2;	}
	}
	$resto = $soma % 11;
	$resultado = 11 - $resto;
	if($resultado>9 || $resultado<=1){	$resultado=1;	}
	return $resultado;
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

function MUDA_CNPJ($CNPJ2){
	if(strlen($CNPJ2) == 14){
		$X = substr($CNPJ2, 0, 2).'.'.substr($CNPJ2, 2, 3).'.'.substr($CNPJ2, 5, 3).'/'.substr($CNPJ2, 8, 4).'-'.substr($CNPJ2, 12, 2);
		return $X;
	}
	elseif(strlen($CNPJ2) == 11){
		$X = substr($CNPJ2, 0, 3).'.'.substr($CNPJ2, 3, 3).'.'.substr($CNPJ2, 6, 3).'-'.substr($CNPJ2, 9, 2);
		return $X;
	}
}

function SoNumeros($X){
	$tira = array(" ", ",", ".", "-","/");
	for($i=0;$i<strlen($X);$i++){	$X = str_replace($tira[$i],"", $X);	}
	return $X;
}

function colocaZeroEsquerda($X, $digitos){
	$zeros = $digitos - strlen($X);
	for($i=0;$i<$zeros;$i++){	$x .= 0;	}
	$X = $x.$X;
	return $X;
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

    // 2. Campo - composto pelas posiçoes 6 a 15 do campo livre
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

?>
