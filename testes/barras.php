<?
$valor = $valor = str_replace(".",",",$valor);

$valor9x = $valor;

//define ("edit3",   $Edit3);
//define ("Instru1", $Edit12);
//define ("Instru2", "");
//define ("Instru3", "");
//define ("Instru4", "");
//define ("codigo_agencia_sed", $sed_agecho);
//define ("Edit16", $Edit16);

//define ("CodigoDaCaixa", "Código da Caixa");
//define ("CEDENTE", "Sind. Empreg. Edif. de São Paulo");
//define ("AGENCIA_COD_CEDENTE", $Edit3);
//define ("nome_do_sindical", $Edit2);

//define ("nossoNumero", 		"$nossoNumero");

//define ("INSTRUCAO_RODAPE", "O pagamento até o vencimento poderá ser efetuado em qualquer Banco participante da compensação.<br>Após o vencimento somente nas agências da CEF.");


//define ("valor", "$valor");
//$multa = valorFormatado(($valor*2)/100); //2% ao mês
//$juros = valorFormatado(($valor*0.33)/100); //1% ao mes ou melhor 0,33% ao dia
//$valor = valorFormatado($valor);

//define ("nossoNumero", 		"$nossoNumero");
//define ("vencimento", 		"$diaVencimento/$mesVencimento/$anoVencimento");
//define ("vencimento2", 		"$anoVencimento.$mesVencimento.$diaVencimento");
//define ("AnoVencimento", 	"$anoVencimento");
//define ("MesVencimento", 	"$mesVencimento");
//define ("DiaVencimento", 	"$diaVencimento");

//define ("sacado",   "$sacado");
//define ("cnpj", 	"$cnpj");
//define ("endereco", "$endereco");
//define ("bairro", 	"$bairro");
//define ("cidade", 	"$cidade");
//define ("cep", 		"$cep");
//define ("estado", 	"$estado");
//define ("exec", 	"$exec");
//define ("vencto", 	"$vencto");

//define ("Instru1", "$Instru1");
//define ("Instru2", "<br><br><br>* * * Valores Expresso em Reais * * *");
//define ("Instru3", "APÓS VENCIMENTO MULTA DE.......$multa");
//define ("Instru4", "MORA DIA/COM.PERMANENC.........$juros");

//NumeroCodigoBarra($nossoNumero,$vencimento);



//******************************************************


$emi_aber      = date("d/m/Y");
$pag_aber      = "  /  /    ";
$dat_pag       = "  /  /    ";
$dat_bai       = "  /  /    ";
$des_aberto    = "SINDICAL";
$Edit9         = "...";
$Edit10        = substr($vencto,0,2);
$Edit11        = substr($vencto,3,2);
$Edit12        = substr($vencto,6,4);
$Edit13        = 1;

$total_aber    = 0;

NumeroCodigoBarra();
?>

<html>
<b><?=$numero_digitavel;?></b>
</html>
