<?
/*
 ---------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Emitir Guias Cadastro Empresa
 Criado em Data.....: 01/01/2008
 Ultima Atualização : 01/01/2008 

 DEUS SEJA LOUVADO
 ---------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_EDIF");

if ($deixar_1 == "NAO"){
	
    echo "              <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			body { background-image: url('../$logo_sis');
                   background-attachment: fixed }
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			

			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** <font color = #FF0000> ERRO ACESSO NÃO PERMITIDO !!!</font> ***<br>
				                     
									 <font face=arial>Usuário sem Permissão</b>
			<table align=center>
			<form method='POST' action='../avaleht.php'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>
";
	        exit();
}	

/*
Dados do boleto - Obrigatórios
*/

/*
$vencto    = $_POST['vencto'];
$nudoc     = $_POST['nudoc'];
$sacado    = strtoupper($_POST['sacado']);
$CNPJ      = $_POST['CNPJ'];
$endereco  = strtoupper($_POST['endereco']);
$bairro    = strtoupper($_POST['bairro']);
$cidade    = strtoupper($_POST['cidade']);
$cep       = $_POST['cep'];
$estado    = strtoupper($_POST['estado']);
$valor     = $_POST['valor'];
$cod_intru = $_POST['instrucao_x'];

$valor = $valor = str_replace(".",",",$valor);


/*
Dados do boleto - Obrigatórios
*/

$dadosboleto["data_vencimento"] = addslashes($vencto); // Data de Vencimento do Boleto
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = addslashes($valor); 	// Valor do Boleto, com vírgula, sempre com duas casas depois da virgula

$valor2=$dadosboleto["valor_boleto"];
define ("valor2","$valor2");

//opcionais
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "N";		
$dadosboleto["uso_banco"] = ""; 	
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "RC";

//dados da sua conta e convênio
$dadosboleto["agencia"] = "1202"; // Num da agencia, sem digito
$dadosboleto["conta"] = "17727"; 	// Num da conta, sem digito
//convenio e contrato podem ser vistos no gerenciador financeiro do BB
$dadosboleto["convenio"] = "284723";  // Num do convênio
$dadosboleto["contrato"] = ""; // Num do seu contrato

/*
FORMATAÇÃO DO NOSSO NUMERO
*/

$dadosboleto["formatacao_nosso_numero"] = "1";

/*
#################################################
Carteira 18....pras outras, deixe opção 1

1	=	Formatação gerada: Num do convenio + 5 digitos informados por você + digito verificador
		(neste caso, informe de 1 a 5 digitos somente)

2	=	para 17 digitos informados por você ( de 1 a 99999999999999999)

Nosso número:
de 1 a 99999 para opção de 12 dígitos
de 1 a 99999999999999999 para opção de 17 dígitos
#################################################
*/

$dadosboleto["nosso_numero"] = addslashes($nudoc);
$dadosboleto["numero_documento"] = addslashes($nudoc);	// Num do pedido ou nosso numero
$dadosboleto["carteira"] = "18";  // Código da Carteira 18 - 17 ou 11
$dadosboleto["variacao_carteira"] = "";  // Variação da Carteira, com traço (opcional)

/*
DADOS DO SINDICATO
*/
$dadosboleto["cpf_cnpj"] = "56.092.463/0001-85";
$dadosboleto["endereco"] = "Rua Sete de Abril, 34";
$dadosboleto["cidade"] = "São Paulo - SP";
$dadosboleto["cedente"] = "SINDIFICIOS - Sind. dos Trabalhadores em Edif. de SP";

/*
DADOS DO COMDOMINIO
*/
$dadosboleto["sacado"] = "Cond. Edif. Carolina";
$dadosboleto["endereco1"] = "Rua Carolina Soares, 1021";
$dadosboleto["endereco2"] = "02554-000  - São Paulo - SP";

/*
INSTRUÇÕES PARA O BOLETO
*/
$dadosboleto["instrucoes"]  = "CONTRIBUIÇÃO AO SINDICATO CONFORME  CLÁUSULA 56 DA CONVENÇÃO              ";
$dadosboleto["instrucoes1"] = "COLETIVA DE TRABALHO. TENDO COMO BASE DE CÁLCULO  8% (OITO POR CENTO) ";
$dadosboleto["instrucoes2"] = "DO PISO SALARIAL DO EMPREGADO EM CONDOMÍNIO OU EDIFÍCIO ASSOCIADO OU      ";
$dadosboleto["instrucoes3"] = "NÃO, SENDO O PISO SALARIAL ATUAL DE ZELADOR R$ 600,00, PORTEIRO R$ 575,00 ";
$dadosboleto["instrucoes4"] = "FAXINEIROS E OUTROS R$ 550,00.                                             ";

//formatando os dados
$codigobanco 		= "001";
$nummoeda 			= "9";
$fator_vencimento 	= fator_vencimento($dadosboleto["data_vencimento"]);
$loc_pag            = "Pagável em qualquer banco até o vencimento";
/*
Linha digitavel
*/
//valor tem 10 digitos, sem virgula
$valor 				= formata_numero($dadosboleto["valor_boleto"],10,0,"valor");
//convenio tem 6 digitos
$convenio 			= formata_numero($dadosboleto["convenio"],6,0,"convenio");
//agencia é sempre 4 digitos
$agencia 			= formata_numero($dadosboleto["agencia"],4,0);
//conta é sempre 8 digitos
$conta 				= formata_numero($dadosboleto["conta"],8,0);

$carteira 			= $dadosboleto["carteira"];

if ($dadosboleto["formatacao_nosso_numero"] == "1") {
	// 12 dígitos
	$nossonumero 	= formata_numero($dadosboleto["nosso_numero"],5,0);
	$dv 			= modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$convenio$nossonumero$agencia$conta$carteira");
	$linha 			= "$codigobanco$nummoeda$dv$fator_vencimento$valor$convenio$nossonumero$agencia$conta$carteira";
	//recolocando o nosso numero com DV
	$nossonumero 	= $convenio . $nossonumero ."-". modulo_11("$convenio$nossonumero");
	$agencia_codigo = $agencia."-". modulo_11($agencia) ." / ". $conta ."-". modulo_11($conta);
}

if ($dadosboleto["formatacao_nosso_numero"] == "2") {
	// 17 dígitos
	$nservico 		= "21";
	$nossonumero 	= formata_numero($dadosboleto["nosso_numero"],17,0);
	$dv 			= modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$convenio$nossonumero$nservico");
	$linha 			= "$codigobanco$nummoeda$dv$fator_vencimento$valor$convenio$nossonumero$nservico";
	$agencia_codigo = $agencia."-". modulo_11($agencia) ." / ". $conta ."-". modulo_11($conta);
}

$dadosboleto["codigo_barras"] 	= $linha;
$dadosboleto["linha_digitavel"] = monta_linha_digitavel($linha);
$dadosboleto["agencia_codigo"] 	= $agencia_codigo ;
$dadosboleto["nosso_numero"] 	= $nossonumero;


$digit_nun = $dadosboleto["linha_digitavel"];
define ("digit_nun","$digit_nun");

$dig_barr = $dadosboleto["codigo_barras"];
define ("dig_barr","$dig_barr");

/*
FUNÇÕES MINHAS ;)
*/

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


/*
*******************************************************************************************************************************
*	Basta chamar a função fbarcode("01202") com o valor
**********************************************************************************************************************************
*/

function fbarcode($valor){

$fino 	= 1 ;
$largo 	= 3 ;
$altura = 50 ;

  $barcodes[0] = "00110" ;
  $barcodes[1] = "10001" ;
  $barcodes[2] = "01001" ;
  $barcodes[3] = "11000" ;
  $barcodes[4] = "00101" ;
  $barcodes[5] = "10100" ;
  $barcodes[6] = "01100" ;
  $barcodes[7] = "00011" ;
  $barcodes[8] = "10010" ;
  $barcodes[9] = "01010" ;
  for($f1=9;$f1>=0;$f1--){ 
    for($f2=9;$f2>=0;$f2--){  
      $f = ($f1 * 10) + $f2 ;
      $texto = "" ;
      for($i=1;$i<6;$i++){ 
        $texto .=  substr($barcodes[$f1],($i-1),1) . substr($barcodes[$f2],($i-1),1);
      }
      $barcodes[$f] = $texto;
    }
  }


//Desenho da barra

//Guarda inicial
?><img src=../imagens/p.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=../imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=../imagens/p.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=../imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
<?
$texto = $valor ;
if((strlen($texto) % 2) <> 0){
	$texto = "0" . $texto;
}

// Draw dos dados
while (strlen($texto) > 0) {
  $i = round(esquerda($texto,2));
  $texto = direita($texto,strlen($texto)-2);
  $f = $barcodes[$i];
  for($i=1;$i<11;$i+=2){
    if (substr($f,($i-1),1) == "0") {
      $f1 = $fino ;
    }else{
      $f1 = $largo ;
    }
?>
    src=../imagens/p.gif width=<?=$f1?> height=<?=$altura?> border=0><img 
<?
    if (substr($f,$i,1) == "0") {
      $f2 = $fino ;
    }else{
      $f2 = $largo ;
    }
?>
    src=../imagens/b.gif width=<?=$f2?> height=<?=$altura?> border=0><img 
<?
  }
}

// Draw guarda final
?>
src=../imagens/p.gif width=<?=$largo?> height=<?=$altura?> border=0><img 
src=../imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=../imagens/p.gif width=<?=1?> height=<?=$altura?> border=0> 
  <?
}
//Fim da função

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

/*
#################################################
FUNÇÃO DO MÓDULO 10 RETIRADA DO BOLETO

ESTA FUNÇÃO PEGA O DÍGITO VERIFICADOR DO PRIMEIRO, SEGUNDO
E TERCEIRO CAMPOS DA LINHA DIGITÁVEL
#################################################
*/
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

/*
#################################################
FUNÇÃO DO MÓDULO 11 RETIRADA DO BOLETO

MODIFIQUEI ALGUMAS COISAS...

ESTA FUNÇÃO PEGA O DÍGITO VERIFICADOR:

NOSSONUMERO
AGENCIA
CONTA
CAMPO 4 DA LINHA DIGITÁVEL
#################################################
*/

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
			//então estamos checando a linha digitável
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

/*
Montagem da linha digitável - Função tirada do PHPBoleto
Não mudei nada
*/
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

function MUDA_CNPJ($CNPJ){
	if(strlen($CNPJ) == 14){
		$X = substr($CNPJ, 0, 2).'.'.substr($CNPJ, 2, 3).'.'.substr($CNPJ, 5, 3).'/'.substr($CNPJ, 8, 4).'-'.substr($CNPJ, 12, 2);
		return $X;
	}
	elseif(strlen($CNPJ) == 11){
		$X = substr($CNPJ, 0, 3).'.'.substr($CNPJ, 3, 3).'.'.substr($CNPJ, 6, 3).'-'.substr($CNPJ, 9, 2);
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

	function valorFormatado($x){
		if(empty($x)){
			$valor_retorno = '';
		} else {
   		$valor_retorno = number_format($x, 2, ',' , '.');
			//$valor_retorno = $valor_retorno;
		}
   	return $valor_retorno;
    }

function NumeroCodigoBarra(){

	$banco = 001;
	$moeda = 9;
	$vencimento = AnoVencimento.MesVencimento.DiaVencimento;
	$vencto = AnoVencimento.MesVencimento.DiaVencimento;
	$database  = 19971007;
	$FatorVencimento = floor(abs(strtotime($database) - strtotime($vencimento))/86400);
//	$FatorVencimento = '0000';
	$valor = SoNumeros(valor);
	//$valor = colocaZeroEsquerda($valor, 10);
	$agencia_cod_cedente = SoNumeros(AGENCIA_COD_CEDENTE);
	
	//$campo1 = $banco.$moeda.substr(nossoNumero,0,1).'.'.substr(nossoNumero,1,4);
	$campo1 = $banco.$moeda.'1.'.substr($agencia_cod_cedente,4,4);
	$DV_campo1 = Modulo10(SoNumeros($campo1));
	$campo1.=$DV_campo1;
	
	//$campo2 = substr(nossoNumero,5,5).'.'.substr($agencia_cod_cedente,0,5);
	$campo2 = substr($agencia_cod_cedente,8,2).substr(nossoNumero,0,3).'.'.substr(nossoNumero,3,5);
	$DV_campo2 = Modulo10(SoNumeros($campo2));
	$campo2.=$DV_campo2;
	
	//$campo3 = substr($agencia_cod_cedente,5,5).'.'.substr($agencia_cod_cedente,10,5);
	$campo3 = substr(nossoNumero,8,5).'.'.substr(nossoNumero,13,5);
	$DV_campo3 = Modulo10(SoNumeros($campo3));
	$campo3.=$DV_campo3;
	$DV_CBarra = Modulo11($banco.$moeda.$FatorVencimento.$valor.'1'.substr($agencia_cod_cedente,4,6).nossoNumero);
	$CodigoBarra = "00".$banco.$moeda.$DV_CBarra.$FatorVencimento.$valor.'1'.substr($agencia_cod_cedente,4,6).nossoNumero;
	
	//define("numero_digitavel","$campo1 $campo2 $campo3 $DV_CBarra $FatorVencimento.$valor");

                $numero_digitavel = $dadosboleto["linha_digitavel"];

	define("numero_digitavel","$numero_digitavel");

	define("codigoDeBarra", "$CodigoBarra");
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

function esquerda($entra,$comp){
	return substr($entra,0,$comp);
}

function direita($entra,$comp){
	return substr($entra,strlen($entra)-$comp,$comp);
}

function CodigoDeBarra($valor){

$fino = 1;
$largo = 3;
$altura = 50;

  $barcodes[0] = "00110" ;
  $barcodes[1] = "10001" ;
  $barcodes[2] = "01001" ;
  $barcodes[3] = "11000" ;
  $barcodes[4] = "00101" ;
  $barcodes[5] = "10100" ;
  $barcodes[6] = "01100" ;
  $barcodes[7] = "00011" ;
  $barcodes[8] = "10010" ;
  $barcodes[9] = "01010" ;
  for($f1=9;$f1>=0;$f1--){
    for($f2=9;$f2>=0;$f2--){
      $f = ($f1 * 10) + $f2 ;
      $texto = "" ;
      for($i=1;$i<6;$i++){ 
        $texto .=  substr($barcodes[$f1],($i-1),1) . substr($barcodes[$f2],($i-1),1);
      }
      $barcodes[$f] = $texto;
    }
  }


//Desenho da barra


//Guarda inicial
?>
<img src=../imagens/p.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=../imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=../imagens/p.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=../imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
<?
$texto = $valor ;
if((strlen($texto) % 2) <> 0){
	$texto = "0" . $texto;
}

// Draw dos dados
while (strlen($texto) > 0) {
  $i = round(esquerda($texto,2));
  $texto = direita($texto,strlen($texto)-2);
  $f = $barcodes[$i];
  for($i=1;$i<11;$i+=2){
    if (substr($f,($i-1),1) == "0") {
      $f1 = $fino ;
    }else{
      $f1 = $largo ;
    }
?>
    src=../imagens/p.gif width=<?=$f1?> height=<?=$altura?> border=0><img 
<?
    if (substr($f,$i,1) == "0") {
      $f2 = $fino ;
    }else{
      $f2 = $largo ;
    }
?>
    src=../imagens/b.gif width=<?=$f2?> height=<?=$altura?> border=0><img 
<?
  }
}

// Draw guarda final
?>
src=../imagens/p.gif width=<?=$largo?> height=<?=$altura?> border=0><img 
src=../imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=../imagens/p.gif width=<?=1?> height=<?=$altura?> border=0> 
  <?
} //Fim da função

define ("valor", "$valor");
$multa = valorFormatado(($valor*2)/100); //2% ao mês
$juros = valorFormatado(($valor*0.33)/100); //1% ao mes ou melhor 0,33% ao dia

$nosso_nun = $dadosboleto["nosso_numero"];
define ("nosso_nun","$nosso_nun");


$digit_nun = $dadosboleto["linha_digitavel"];
define ("digit_nun","$digit_nun");


define ("vencimento", "$diaVencimento/$mesVencimento/$anoVencimento");
define ("AnoVencimento", "$anoVencimento");
define ("MesVencimento", "$mesVencimento");
define ("DiaVencimento", "$diaVencimento");
define ("vencto", "$vencto");
define ("rest2","$rest2");
define ("nudoc","$nudoc");

define ("sacado", "$sacado");
define ("CNPJ", "$CNPJ");
define ("endereco", "$endereco");
define ("bairro", "$bairro");
define ("cidade", "$cidade");
define ("cep", "$cep");
define ("estado", "$estado");


if($tipo == "Confederativa"){
//   $cod_intru = 3;
   $des_aberto = "CONFEDERATIVA";
  
}

if($tipo == "Assistencial"){
//   $cod_intru = 6;
   $des_aberto = "ASSISTENCIAL";
     
}

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Abrir tabela instrucao

$consulta  = "SELECT * FROM instrucao WHERE Edit1 = '". anti_sql_injection($cod_intru) ."'";

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$Edit2      = @$row['Edit2'];
$Edit3      = @$row['Edit3'];
$Edit12	    = @$row["Edit12"];
$Edit13	    = @$row["Edit13"];
$Edit14	    = @$row["Edit14"];
$Edit15	    = @$row["Edit15"];
$Edit16	    = @$row["Edit16"];
$Edit17	    = @$row["Edit17"];

$sed_agecho = trim($Edit13)."-".trim($Edit14)."/".trim($Edit16)."-".$Edit17;

define ("Instru1", $Edit12);
define ("Instru2", "");
define ("Instru3", "");
define ("Instru4", "");
define ("CodigoDaCaixa", "Código da Caixa");
define ("CEDENTE", $Edit2);
define ("AGENCIA_COD_CEDENTE", $sed_agecho );
define ("INSTRUCAO_RODAPE", "");

	NumeroCodigoBarra($nossoNumero,$vencimento);

$emi_aber      = date("d/m/Y");
$pag_aber      = "  /  /    ";
$dat_pag       = "  /  /    ";
$dat_bai       = "  /  /    ";
$Edit9         = "...";
$Edit10        = substr($vencto,0,2);
$Edit11        = substr($vencto,3,2);
$Edit12        = substr($vencto,6,4);
$Edit13        = 1;

$decim = substr($valor,0,8);
$dezen = substr($valor,8,2);
$fim_t = $decim.".".$dezen;

$total_aber = $fim_t;

if (!empty($valor2)){
	
    $total_aber    = $fim_t; 
}else{
	$total_aber    = 0;
}

// Atualiza Tabela Aberto

$descri_ca = "CONF./ASSIST.";

$consulta_aber  = "SELECT * FROM ABERTO WHERE CONFCOD = '". anti_sql_injection($nudoc) ."' AND VENCTO = '". anti_sql_injection($vencto) ."' AND DESCRICAO = '". anti_sql_injection($descri_ca) ."'";

$resultado_aber = @mysql_query($consulta_aber);

$row_aber = @mysql_fetch_array($resultado_aber);

$id       = @$row_aber["id"];
$QTD_x    = @$row_aber["QTD"];

if (empty($id)){
	// Inclui

    $qtd_aber  = 1;
    $ipag4     = date('d/m/Y');
    $descri_ca = "CONF./ASSIST.";
    $local     = "...";
    $dia_x     = date('d');
    $mes_x     = date('m');
    $ano_x     = date('Y');

    $consulta_at9 = "INSERT INTO  aberto  (CONFCOD,
	                                       QTD, 	  
                                           DATA,
										   VENCTO,
										   DESCRICAO,
										   DIA,
										   MES,
										   ANO,
										   LOCAL,
										   TOTAL)
                                           
								VALUES    ('$nudoc',
								           '$qtd_aber',
								           '$ipag4',
										   '$vencto',
										   '$descri_ca',
										   '$dia_x',
										   '$mes_x',
										   '$ano_x',
										   '$local',
										   '$valor')";

    @mysql_query($consulta_at9, $link);

}else{
	// Altera

    $qtd_aber = $QTD_x + 1;
    $ipag4    = date('d/m/Y');
    $hora_x   = date("H:i:s");

    $consulta_at9 = "UPDATE aberto  SET QTD 	  = '$qtd_aber',
                                        DATA	  = '$ipag4',
										TOTAL     = '$valor' WHERE CONFCOD = '". anti_sql_injection($nudoc) ."' AND VENCTO = '". anti_sql_injection($vencto) ."' AND DESCRICAO = '". anti_sql_injection($descri_ca) ."'";
	@mysql_query($consulta_at9, $link);

}

// Fim da Atualizacao do Aberto
	

// Atualiza arquivo Log
$data_log = date("d/m/Y");
$hora_log = date("H:i:s"); 
$even_log = $des_aberto."/".$nudoc."/".$vencto;
			
$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
	             VALUES
	             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
@mysql_query($consulta_log, $link);

?>

<script language="JavaScript" type="text/javascript">
if (document.all) {
    document.onkeydown = function() {
        var teclaCtrl = event.keyCode ? event.keyCode : (event.which ? event.which : event.charCode);
        if (teclaCtrl == 17) {
            alert('Opção Invalida !!!');
            return false;
        }
    }
}
function click() { 
if (event.button==2||event.button==3) { 
alert('Botão desativado !!!') 
} 
} 
document.onmousedown=click 

</script>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<body>

</HEAD>
<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

</HEAD>
<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0>


<HTML>
<HEAD>
<style type=text/css>

body { background-image: url("../imagens/b.gif");}

</style> 

</HEAD>
<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0>

<!-- \/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ -->
<table cellspacing=0 cellpadding=0 width=666 border=0>
	<tr>
		<td class=cp width=150><img src="../imagens/logo-bb.png" border=0 HEIGHT="30"></td>
		<td width=3 valign=bottom><img height=22 src="../imagens/3.gif" width=2 border=0></td>
		<td class=cpt  width=61 valign=bottom><div align=center><font class=bc>001-9</font></div></td>
		<td width=3 valign=bottom><img height=22 src="../imagens/3.gif" width=2 border=0></td>
		<td class=ld align=right width=452 valign=bottom><span class=ld>Recibo do Sacado</span></td>
	</tr>
	<tr>
		<td colspan=5><img height=2 src="../imagens/2.gif" width=666 border=0></td>
	</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>


	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=472 height=13>Local de pagamento</td>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=180 height=13>Vencimento</td>
	</tr>
	<tr>
		<td class=cp valign=top width=7 height=12><img height=15 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top width=472 height=12><?=$loc_pag;?> </td>
		<td class=cp valign=top width=7 height=12><img height=15 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=bottom align=right width=180 style="font-size: 12px;" height=12><?=$vencto;?></td>
	</tr>
	<tr>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=472 height=1><img height=1 src="../imagens/2.gif" width=472 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
	</tr>



	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=472 height=13>Cedente</td>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=180 height=13>Agência/Código cedente</td>
	</tr>

	<tr>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top width=472 height=12><?=CEDENTE;?></td>

		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top align=right width=180 height=12><?=AGENCIA_COD_CEDENTE;?></td>
	</tr>

		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=472 height=1><img height=1 src="../imagens/2.gif" width=472 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
	</tr>


</table>
<table cellspacing=0 cellpadding=0 border=0>
	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=113 height=13>Data do documento</td>
		<td class=ct valign=top width=7 height=13> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=163 height=13>N<u>o</u> documento</td>
		<td class=ct valign=top width=7 height=13> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=62 height=13>Espécie doc.</td>
		<td class=ct valign=top width=7 height=13> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=34 height=13>Aceite</td>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=72 height=13>Data processamen</td>
		<td class=ct valign=top width=7 height=13> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=180 height=13>Nosso número</td>
	</tr>
	<tr>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=113 height=12><?=date("d/m/Y");?></td>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top width=163 height=12><?=nudoc;?></td>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=62 height=12><div align=left>RC</div></td>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=34 height=12><div align=left>N</div></td>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=72 height=12><div align=left><?=date("d/m/Y");?></div></td>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top align=right width=180 height=12><?=nosso_nun;?></td>
	</tr>
	<tr>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=113 height=1><img height=1 src="../imagens/2.gif" width=113 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=163 height=1><img height=1 src="../imagens/2.gif" width=163 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=62 height=1><img height=1 src="../imagens/2.gif" width=62 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=34 height=1><img height=1 src="../imagens/2.gif" width=34 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=72 height=1><img height=1 src="../imagens/2.gif" width=72 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 border=0>
	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top COLSPAN="3" height=13>Uso do banco</td>
		<td class=ct valign=top height=13 width=7> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=83 height=13>Carteira</td>
		<td class=ct valign=top height=13 width=7><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=53 height=13>Espécie</td>
		<td class=ct valign=top height=13 width=7><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=123 height=13>Quantidade</td>
		<td class=ct valign=top height=13 width=7><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=72 height=13>Valor</td>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=180 height=13>(=) Valor documento</td>
	</tr>
	<tr>		<td class=cp valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td valign=top class=cp height=12 COLSPAN="3"><div align=left>&nbsp;</div></td>
		<td class=cp valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=83>18</td>
		<td class=cp valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=53>R$</td>
		<td class=cp valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=123> </td>
		<td class=ct valign=top width=7 height=13 align="right">x</td>
		<td class=cp valign=top  width=72></td>
		<td class=cp valign=top width=7 height=13> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top align=right width=180 height=12><?=valor2;?></td>
	</tr>
	<tr>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=75 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=31 height=1><img height=1 src="../imagens/2.gif" width=31 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=83 height=1><img height=1 src="../imagens/2.gif" width=83 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=53 height=1><img height=1 src="../imagens/2.gif" width=53 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=123 height=1><img height=1 src="../imagens/2.gif" width=123 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=72 height=1><img height=1 src="../imagens/2.gif" width=72 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 width=666 border=0>
	<tr>
		<td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=1 border=0></td>
			</tr>
		</table></td>
		<td valign=top width=468 rowspan=4><font class=ct>Instruções(Texto de responsabilidade do cedente)</font><br>
		<span class=cp>REFERENTE
		
		  <? 
              $monthName = array(1=>"Janeiro",  "Fevereiro", "Marco",
                                    "Abril",    "Maio",      "Junho",    "Julho",   "Agosto",
                                    "Setembro", "Outubro",   "Novembro", "Dezembro");

              /* mes referencia */

			  $rest = substr(vencto, 3,2);
			  $rest2 = strval($rest)-1;
			  $mEs =$rest2;
                                           
			  echo strtoupper($monthName[$mEs]);?> <br><?=Instru1;?><br><?=Instru2;?><br><?=Instru3;?><br><?=Instru4;?>
			  </span></td>
		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>(-) Desconto</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td align=right width=10>
			<table cellspacing=0 cellpadding=0 border=0 align=left>
				<tr>
					<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
				</tr>
				<tr>
					<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
				</tr>
				<tr>
					<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=1 border=0></td>
				</tr>
			</table>
		</td>
		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>(-) Outras deduções / Abatimentos</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12> <img height=12 src="../imagens/1.gif" width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=1 border=0></td>
			</tr></table></td>
		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>(+) Mora / Multa / Juros</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=1 border=0></td>
			</tr>
		</table></td>
		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>(+) Outros acréscimos</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
		</table></td>
		<td align="center"><!-- <font style="FONT: bold 11px "Arial Narrow";">*** PAGUE NAS CASAS LOTERICAS ATÉ O VENCIMENTO ***</font> --></td>
		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>

				<td class=ct valign=top width=180 height=13>(=) Valor cobrado</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12></td>
			</tr>
		</table></td>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 width=666 border=0>
	<tr>
		<td valign=top width=666 height=1><img height=1 src="../imagens/2.gif" width=666 border=0></td>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 border=0>
	<tr>
		<td class=ct valign=top width=7 rowspan="4"><img height=38 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=30 rowspan="4">Sacado</td>
		</tr>
	<tr>
		<td class=cp valign=top><?=sacado;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CPF/CNPJ: <?=CNPJ;?></td>
	</tr>
	<tr>
		<td class=cp valign=top><?=endereco;?> - <?=bairro;?></td>
	</tr>
	<tr>
		<td class=cp valign=top><?=cidade;?> - <?=estado;?> - CEP: <?=cep;?></td>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 border=0>
	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=470 colspan="2" height=13>Sacador/Avalista</td>
		<td class=ct valign=top width=180 height=13><?=CodigoDaCaixa;?></td>
	</tr>
	<tr>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=472 height=1><img height=1 src="../imagens/2.gif" width=472 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
	</tr>
</table>

<TABLE cellSpacing=0 cellPadding=0 border=0 width=666>
	<TR>
		<TD class=ct width=416></TD>
		<TD class=ct width=250><div align=right>Autenticação mecânica</div></TD>
	</TR>
	<TR>
		<TD class=ct colspan=3></TD>
	</tr>
</table>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>

<!--
	<TR>
		<TD class=ct width=666><div align=right>Corte na linha pontilhada</div></TD>
	</TR>
-->
	<TR>
		<TD class=ct width=666><img height=1 src="../imagens/6.gif" width=665 border=0></TD>
	</tr> 
	
<!--		
	<TR>
		<TD class=ct height="18" width=666></TD>
	</TR>
-->
	
</table>
<!-- /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/ -->
<!-- \/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ -->
<table cellspacing=0 cellpadding=0 width=666 border=0>
	<tr>
		<td class=cp width=150><img src="../imagens/logo-bb.png" border=0 HEIGHT="30"></td>
		<td width=3 valign=bottom><img height=22 src="../imagens/3.gif" width=2 border=0></td>
		<td class=cpt  width=61 valign=bottom><div align=center><font class=bc>001-9</font></div></td>
		<td width=3 valign=bottom><img height=22 src="../imagens/3.gif" width=2 border=0></td>
		<td class=ld align=right width=452 valign=bottom><span class=ld>Ficha do Caixa</td>
	</tr>
	<tr>
		<td colspan=5><img height=2 src="../imagens/2.gif" width=666 border=0></td>
	</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>


	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=472 height=13>Local de pagamento</td>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=180 height=13>Vencimento</td>
	</tr>
	<tr>
		<td class=cp valign=top width=7 height=12><img height=15 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top width=472 height=12><?=$loc_pag;?> </td>
		<td class=cp valign=top width=7 height=12><img height=15 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=bottom align=right width=180 style="font-size: 12px;" height=12><?=vencto;?></td>
	</tr>
	<tr>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=472 height=1><img height=1 src="../imagens/2.gif" width=472 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
	</tr>



	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=472 height=13>Cedente</td>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=180 height=13>Agência/Código cedente</td>
	</tr>

	<tr>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top width=472 height=12><?=CEDENTE;?></td>

		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top align=right width=180 height=12><?=AGENCIA_COD_CEDENTE;?></td>
	</tr>

		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=472 height=1><img height=1 src="../imagens/2.gif" width=472 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
	</tr>


</table>
<table cellspacing=0 cellpadding=0 border=0>
	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=113 height=13>Data do documento</td>
		<td class=ct valign=top width=7 height=13> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=163 height=13>N<u>o</u> documento</td>
		<td class=ct valign=top width=7 height=13> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=62 height=13>Espécie doc.</td>
		<td class=ct valign=top width=7 height=13> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=34 height=13>Aceite</td>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=72 height=13>Data processamen</td>
		<td class=ct valign=top width=7 height=13> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=180 height=13>Nosso número</td>
	</tr>
	<tr>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=113 height=12><?=date("d/m/Y");?></td>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top width=163 height=12><?=nudoc;?></td>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=62 height=12><div align=left>RC</div></td>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=34 height=12><div align=left>N</div></td>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=72 height=12><div align=left><?=date("d/m/Y");?></div></td>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top align=right width=180 height=12><?=nosso_nun;?></td>
	</tr>
	<tr>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=113 height=1><img height=1 src="../imagens/2.gif" width=113 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=163 height=1><img height=1 src="../imagens/2.gif" width=163 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=62 height=1><img height=1 src="../imagens/2.gif" width=62 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=34 height=1><img height=1 src="../imagens/2.gif" width=34 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=72 height=1><img height=1 src="../imagens/2.gif" width=72 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 border=0>
	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top COLSPAN="3" height=13>Uso do banco</td>
		<td class=ct valign=top height=13 width=7> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=83 height=13>Carteira</td>
		<td class=ct valign=top height=13 width=7><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=53 height=13>Espécie</td>
		<td class=ct valign=top height=13 width=7><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=123 height=13>Quantidade</td>
		<td class=ct valign=top height=13 width=7><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=72 height=13>Valor</td>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=180 height=13>(=) Valor documento</td>
	</tr>
	<tr>		<td class=cp valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td valign=top class=cp height=12 COLSPAN="3"><div align=left>&nbsp;</div></td>
		<td class=cp valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=83>18</td>
		<td class=cp valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=53>R$</td>
		<td class=cp valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=123> </td>
		<td class=ct valign=top width=7 height=13 align="right">x</td>
		<td class=cp valign=top  width=72></td>
		<td class=cp valign=top width=7 height=13> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top align=right width=180 height=12><?=valor2;?></td>
	</tr>
	<tr>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=75 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=31 height=1><img height=1 src="../imagens/2.gif" width=31 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=83 height=1><img height=1 src="../imagens/2.gif" width=83 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=53 height=1><img height=1 src="../imagens/2.gif" width=53 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=123 height=1><img height=1 src="../imagens/2.gif" width=123 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=72 height=1><img height=1 src="../imagens/2.gif" width=72 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 width=666 border=0>
	<tr>
		<td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=1 border=0></td>
			</tr>
		</table></td>
		<td valign=top width=468 rowspan=4><font class=ct>Instruções(Texto de responsabilidade do cedente)</font><br>
		<span class=cp>REFERENTE 
		
		  <? 
              $monthName = array(1=>"Janeiro",  "Fevereiro", "Marco",
                                    "Abril",    "Maio",      "Junho",    "Julho",   "Agosto",
                                    "Setembro", "Outubro",   "Novembro", "Dezembro");

              /* mes referencia */

			  $rest = substr(vencto, 3,2);
			  $rest2 = strval($rest)-1;
			  $mEs =$rest2;
                                           
			  echo strtoupper($monthName[$mEs]);?> <br><?=Instru1;?><br><?=Instru2;?><br><?=Instru3;?><br><?=Instru4;?>
        </span></td>
        
		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>(-) Desconto</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td align=right width=10>
			<table cellspacing=0 cellpadding=0 border=0 align=left>
				<tr>
					<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
				</tr>
				<tr>
					<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
				</tr>
				<tr>
					<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=1 border=0></td>
				</tr>
			</table>
		</td>
		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>(-) Outras deduções / Abatimentos</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12> <img height=12 src="../imagens/1.gif" width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=1 border=0></td>
			</tr></table></td>
		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>(+) Mora / Multa / Juros</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=1 border=0></td>
			</tr>
		</table></td>
		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>(+) Outros acréscimos</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
		</table></td>
		<td align="center"><!-- <font style="FONT: bold 11px "Arial Narrow";">*** PAGUE NAS CASAS LOTERICAS ATÉ O VENCIMENTO ***</font> --></td>
		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>

				<td class=ct valign=top width=180 height=13>(=) Valor cobrado</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12></td>
			</tr>
		</table></td>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 width=666 border=0>
	<tr>
		<td valign=top width=666 height=1><img height=1 src="../imagens/2.gif" width=666 border=0></td>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 border=0>
	<tr>
		<td class=ct valign=top width=7 rowspan="4"><img height=38 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=30 rowspan="4">Sacado</td>
		</tr>
	<tr>
		<td class=cp valign=top><?=sacado;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CPF/CNPJ: <?=CNPJ;?></td>
	</tr>
	<tr>
		<td class=cp valign=top><?=endereco;?> - <?=bairro;?></td>
	</tr>
	<tr>
		<td class=cp valign=top><?=cidade;?> - <?=estado;?> - CEP: <?=cep;?></td>
	</tr>                                       
</table>
<table cellspacing=0 cellpadding=0 border=0>
	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=470 colspan="2" height=13>Sacador/Avalista</td>
		<td class=ct valign=top width=180 height=13><?=CodigoDaCaixa;?></td>
	</tr>
	<tr>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=472 height=1><img height=1 src="../imagens/2.gif" width=472 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
	</tr>
</table>

<TABLE cellSpacing=0 cellPadding=0 border=0 width=666>
	<TR>
		<TD class=ct width=416></TD>
		<TD class=ct width=250><div align=right>Autenticação mecânica</div></TD>
	</TR>
	<TR>
		<TD class=ct colspan=3></TD>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 width=666 border=0>
	<tr>
		<td width=7></td>
		<td width=500 class=cp><font style="font-size:8px;"></font></td>
		<td width=159></td>
	</tr>
</table>
<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
<!--
	<TR>
		<TD class=ct width=666><div align=right>Corte na linha pontilhada</div></TD>
	</TR>
-->	
	<TR>
		<TD class=ct width=666><img height=1 src="../imagens/6.gif" width=665 border=0></TD>
	</tr>
<!--	
	<TR>
		<TD class=ct height="18" width=666></TD>
	</TR>
-->	
</table>
<!-- /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/ -->
<!-- \/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ -->
<table cellspacing=0 cellpadding=0 width=666 border=0>
	<tr>
		<td class=cp width=150><img src="../imagens/logo-bb.png" border=0 HEIGHT="30"></td>
		<td width=3 valign=bottom><img height=22 src="../imagens/3.gif" width=2 border=0></td>
		<td class=cpt  width=61 valign=bottom><div align=center><font class=bc>001-9</font></div></td>
		<td width=3 valign=bottom><img height=22 src="../imagens/3.gif" width=2 border=0></td>
		<td class=ld align=right width=452 valign=bottom><?=digit_nun;?></td>
	</tr>
	<tr>
		<td colspan=5><img height=2 src="../imagens/2.gif" width=666 border=0></td>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 border=0>


	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=472 height=13>Local de pagamento</td>    
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=180 height=13>Vencimento</td>
	</tr>
	<tr>
		<td class=cp valign=top width=7 height=12><img height=15 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top width=472 height=12><?=$loc_pag;?> </td>
		<td class=cp valign=top width=7 height=12><img height=15 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=bottom align=right width=180 style="font-size: 12px;" height=12><?=vencto;?></td>
	</tr>
	<tr>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=472 height=1><img height=1 src="../imagens/2.gif" width=472 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
	</tr>


</table>
<table cellspacing=0 cellpadding=0 border=0>


	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=472 height=13>Cedente</td>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=180 height=13>Agência/Código cedente</td>
	</tr>

	<tr>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top width=472 height=12><?=CEDENTE;?></td>

		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top align=right width=180 height=12><?=AGENCIA_COD_CEDENTE;?></td>
	</tr>

	<tr>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=472 height=1><img height=1 src="../imagens/2.gif" width=472 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
	</tr>


</table>
<table cellspacing=0 cellpadding=0 border=0>
	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=113 height=13>Data do documento</td>
		<td class=ct valign=top width=7 height=13> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=163 height=13>N<u>o</u> documento</td>
		<td class=ct valign=top width=7 height=13> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=62 height=13>Espécie doc.</td>
		<td class=ct valign=top width=7 height=13> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=34 height=13>Aceite</td>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=72 height=13>Data processamen</td>
		<td class=ct valign=top width=7 height=13> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=180 height=13>Nosso número</td>
	</tr>
	<tr>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=113 height=12><?=date("d/m/Y");?></td>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top width=163 height=12><?=nudoc;?></td>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=62 height=12><div align=left>RC</div></td>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=34 height=12><div align=left>N</div></td>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=72 height=12><div align=left><?=date("d/m/Y");?></div></td>
		<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top align=right width=180 height=12><?=nosso_nun;?></td>
	</tr>
	<tr>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=113 height=1><img height=1 src="../imagens/2.gif" width=113 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=163 height=1><img height=1 src="../imagens/2.gif" width=163 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=62 height=1><img height=1 src="../imagens/2.gif" width=62 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=34 height=1><img height=1 src="../imagens/2.gif" width=34 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=72 height=1><img height=1 src="../imagens/2.gif" width=72 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 border=0>
	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top COLSPAN="3" height=13>Uso do banco</td>
		<td class=ct valign=top height=13 width=7> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=83 height=13>Carteira</td>
		<td class=ct valign=top height=13 width=7><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=53 height=13>Espécie</td>
		<td class=ct valign=top height=13 width=7><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=123 height=13>Quantidade</td>
		<td class=ct valign=top height=13 width=7><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=72 height=13>Valor</td>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=180 height=13>(=) Valor documento</td>
	</tr>
	<tr>		<td class=cp valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td valign=top class=cp height=12 COLSPAN="3"><div align=left>&nbsp;</div></td>
		<td class=cp valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=83>18</td>
		<td class=cp valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=53>R$</td>
		<td class=cp valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top  width=123> </td>
		<td class=ct valign=top width=7 height=13 align="right">x</td>
		<td class=cp valign=top  width=72></td>
		<td class=cp valign=top width=7 height=13> <img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=cp valign=top align=right width=180 height=12><?=valor2;?></td>
	</tr>
	<tr>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=75 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=31 height=1><img height=1 src="../imagens/2.gif" width=31 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=83 height=1><img height=1 src="../imagens/2.gif" width=83 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=53 height=1><img height=1 src="../imagens/2.gif" width=53 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=123 height=1><img height=1 src="../imagens/2.gif" width=123 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=72 height=1><img height=1 src="../imagens/2.gif" width=72 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 width=666 border=0>
	<tr>
		<td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=1 border=0></td>
			</tr>
		</table></td>
		<td valign=top width=468 rowspan=4><font class=ct>Instruções(Texto de responsabilidade do cedente)</font><br>
		<span class=cp>REFERENTE 
		
		  <? 
              $monthName = array(1=>"Janeiro",  "Fevereiro", "Marco",
                                    "Abril",    "Maio",      "Junho",    "Julho",   "Agosto",
                                    "Setembro", "Outubro",   "Novembro", "Dezembro");

              /* mes referencia */

			  $rest = substr(vencto, 3,2);
			  $rest2 = strval($rest)-1;
			  $mEs =$rest2;
                                           
			  echo strtoupper($monthName[$mEs]);?> <br><?=Instru1;?><br><?=Instru2;?><br><?=Instru3;?><br><?=Instru4;?>
        </span></td>
        
		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>(-) Desconto</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td align=right width=10>
			<table cellspacing=0 cellpadding=0 border=0 align=left>
				<tr>
					<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
				</tr>
				<tr>
					<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
				</tr>
				<tr>
					<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=1 border=0></td>
				</tr>
			</table>
		</td>
		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>(-) Outras deduções / Abatimentos</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12> <img height=12 src="../imagens/1.gif" width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=1 border=0></td>
			</tr></table></td>
		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>(+) Mora / Multa / Juros</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=1 border=0></td>
			</tr>
		</table></td>
		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
				<td class=ct valign=top width=180 height=13>(+) Outros acréscimos</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12></td>
			</tr>
			<tr>
				<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
				<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
			</tr>
		</table></td>
		<td align="center"><!-- <font style="FONT: bold 11px "Arial Narrow";">*** PAGUE NAS CASAS LOTERICAS ATÉ O VENCIMENTO ***</font> --></td>
		<td align=right width=188><table cellspacing=0 cellpadding=0 border=0>
			<tr>
				<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>

				<td class=ct valign=top width=180 height=13>(=) Valor cobrado</td>
			</tr>
			<tr>
				<td class=cp valign=top width=7 height=12><img height=12 src="../imagens/1.gif" width=1 border=0></td>
				<td class=cp valign=top align=right width=180 height=12></td>
			</tr>
		</table></td>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 width=666 border=0>
	<tr>
		<td valign=top width=666 height=1><img height=1 src="../imagens/2.gif" width=666 border=0></td>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 border=0>
	<tr>
		<td class=ct valign=top width=7 rowspan="4"><img height=38 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=30 rowspan="4">Sacado</td>
		</tr>
	<tr>
		<td class=cp valign=top><?=sacado;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CPF/CNPJ: <?=CNPJ;?></td>
	</tr>
	<tr>
		<td class=cp valign=top><?=endereco;?> - <?=bairro;?></td>
	</tr>
	<tr>
		<td class=cp valign=top><?=cidade;?> - <?=estado;?> - CEP: <?=cep;?></td>
	</tr>
</table>
<table cellspacing=0 cellpadding=0 border=0>
	<tr>
		<td class=ct valign=top width=7 height=13><img height=13 src="../imagens/1.gif" width=1 border=0></td>
		<td class=ct valign=top width=470 colspan="2" height=13>Sacador/Avalista</td>
		<td class=ct valign=top width=180 height=13>Código da Caixa</td>
	</tr>
	<tr>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=472 height=1><img height=1 src="../imagens/2.gif" width=472 border=0></td>
		<td valign=top width=7 height=1><img height=1 src="../imagens/2.gif" width=7 border=0></td>
		<td valign=top width=180 height=1><img height=1 src="../imagens/2.gif" width=180 border=0></td>
	</tr>
</table>

<TABLE cellSpacing=0 cellPadding=0 border=0 width=666>
	<TR>
		<TD class=ct width=416></TD>
		<TD class=ct width=250><div align=right>Autenticação mecânica - <b class=cp>Ficha de Compensação</b></div></TD>
	</TR>
	<TR>
		<TD class=ct colspan=3></TD>
	</tr>
</table>

<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
	<TR>
		<TD vAlign=bottom align=left height=50>&nbsp;&nbsp;&nbsp;<?CodigoDeBarra(dig_barr);?></TD>
	</tr>
</table>

<!-- /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/ -->
</BODY></HTML>
<script language="javascript">
<!--
 
//-->
</script>
