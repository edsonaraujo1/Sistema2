<?
/*
 ---------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Emitir Guias Sindical Cadastro Empresa
 Criado em Data.....: 01/04/2008
 Ultima Atualiza��o : 01/05/2008 

 DEUS SEJA LOUVADO
 ---------------------------------------------------
*/

function verificaCNPJ($cnpj) { 
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



define ("0","$faz_2");
$faz_2=0;

//if(empty($nudoc)){

//   echo '<center><font color="#FF0000" size="4">N�mero do Documento invalido!!!</font>';
//   echo '<center><font color="#FF0000" size="4">Caso este numero n�o seja o fornecido pela entidade entre em</font>';
//   echo '<center><font color="#FF0000" size="4">contato com o Sindificios para cadastramento do mesmo</font>';
//   echo '<center><font color="#FF0000" size="4">Obrigado</font>';
//   $faz_2=1;
//   $erro++;}

if ($CNPJ=="") {
   
//        echo '<center><font color="#FF0000" size="4">CNPJ Inv�lido !!!</font>';
//        $faz_2 = 1;
//        $erro++;
}

else 
{
if (!verificaCNPJ($CNPJ)) {
 
//    echo '<center><font color="#FF0000" size="4">CNPJ Inv�lido, por favor digite um CNPJ v�lido.</b></font>'; 
//    $faz_2=1;
//    $erro++;
} 
}


if ($faz_2 == 1){
	
   ?>
   <br>
   <br>
   
          <table border=0  align=center>
          <tr align=center colspan=2>  

	      <a href="javascript:window.close()">
	      <img alt="fechar" src="imagens/botaoazul25.PNG" border="0"></a>
	      </tr>
	      </table>
    <?

	
}

if ($faz_2 == 0){

$admed     = 0;
$cod_intru = 1;

$valor = $valor = str_replace(".",",",$valor);

include_once('sql_injection.php');

// Abre Conex�o com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Abrir tabela Edificios

$consulta_x  = "SELECT * FROM edificios_sindical WHERE COD = '". anti_sql_injection($cod_recue) ."'";

$resultado_x = @mysql_query($consulta_x);

$row_x = @mysql_fetch_array($resultado_x);

$vencto    = @$row_x['VENCTO'];
$nudoc     = @$row_x['COD'];
$sacado    = @$row_x['SACADO'];
$cnpj      = @$row_x['CNPJ'];
$endereco  = @$row_x['ENDERECO'];
$bairro    = @$row_x['BAIRRO'];
$cidade    = @$row_x['CIDADE'];
$cep       = @$row_x['CEP'];
$estado    = @$row_x['ESTADO'];
$valor     = @$row_x['VALOR'];
$exec      = @$row_x['EXEC'];
$coded     = @$row_x['COD'];

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

$sed_agecho = trim($Edit13)."/".trim($Edit14).".".trim($Edit15).".".trim($Edit16)."-".$Edit17;

define ("edit3",   $Edit3);
define ("Instru1", $Edit12);
define ("Instru2", "");
define ("Instru3", "");
define ("Instru4", "");
define ("codigo_agencia_sed", $sed_agecho);
define ("Edit16", $Edit16);

define ("CodigoDaCaixa", "C�digo da Caixa");
define ("CEDENTE", "Sind. Empreg. Edif. de S�o Paulo");
define ("AGENCIA_COD_CEDENTE", $Edit3);
define ("nome_do_sindical", $Edit2);

define ("INSTRUCAO_RODAPE", "O pagamento at� o vencimento poder� ser efetuado em qualquer Banco participante da compensa��o.<br>Ap�s o vencimento somente nas ag�ncias da CEF.");

function MOSTRA_DIAMESANO($DATE){

        $agora = time();
        $data = getdate($agora);

        if($data["wday"]==0) { echo "Domingo, "; }
        
                elseif($data["wday"]==1) { echo "Segunda, "; }

                elseif($data["wday"]==2) { echo "Ter�a, "; }

                elseif($data["wday"]==3) { echo "Quarta, "; }

                elseif($data["wday"]==4) { echo "Quinta, "; }

                elseif($data["wday"]==5) { echo "Sexta, "; }

                elseif($data["wday"]==6) { echo "S�bado, "; }

        if($data["mon"]==1) { $mes="Janeiro"; }

                elseif($data["mon"]==2) { $mes="Fevereiro"; }

                elseif($data["mon"]==3) { $mes="Mar�o"; }

                elseif($data["mon"]==4) { $mes="Abril"; }

                elseif($data["mon"]==5) { $mes="Maio"; }

                elseif($data["mon"]==6) { $mes="Junho"; }

                elseif($data["mon"]==7) { $mes="Julho"; }

                elseif($data["mon"]==8) { $mes="Agosto"; }

                elseif($data["mon"]==9) { $mes="Setembro"; }

                elseif($data["mon"]==10) { $mes="Outubro"; }

                elseif($data["mon"]==11) { $mes="Novembro"; }

                elseif($data["mon"]==12) { $mes="Dezembro"; }

        Return $Date;

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

	function valorFormatado($x){
		if(empty($x)){
			$valor_retorno = '';
		} else {
    		$valor_retorno = number_format($x, 2, ',', '.');
			$valor_retorno = $valor_retorno;
		}
    	return $valor_retorno;
    }

function NumeroCodigoBarra(){

    $file = fopen ("soma.txt" , "r+" ); 
    $contador = fread($file, filesize("soma.txt")); 
    fclose($file); 
    $contador +=1; 
    $file = fopen("soma.txt","w+"); 
    fputs($file, $contador); 
    fclose($file); 

	$banco       = 104;
	$moeda       = 9;
    $database    = 19971007;
    $vencimento2 = substr(vencto,6,4).substr(vencto,3,2).substr(vencto,0,2);
    $fav_venc    = floor(abs(strtotime($database) - strtotime($vencimento2))/86400);
	$valor       = SoNumeros("");
	$valor       = colocaZeroEsquerda($valor, 10);
    $sico        = 97;
    $cod_ent     = Edit16;
    $cod_cnae    = 9;
    $tipo_ent    = 1;
    $sitcs       = 77;
	$cod_cont    = SoNumeros(AGENCIA_COD_CEDENTE);
    $cnae        = 3;
    $zero1       = 0;
    $nosso       = SoNumeros(cnpj);
    $nosso       = substr($nosso,0,12);
    $codent      = AGENCIA_COD_CEDENTE;
    $agenced     = codigo_agencia_sed;
    $cedente     = nome_do_sindical;
    $local       = "PREFERENCIALMENTE NAS LOT�RICAS AT� O VALOR LIMITE";

    $instru1 = "BLOQUETO DE CONTRIBUI��O SINDICAL URBANA"; 
	$instru2 = "At� o vencimento pag�vel nas Lot�ricas, Ag�ncias da CAIXA e Rede Banc�ria."; 
	$instru3 = "Documento vencido pag�vel somente nas Ag�ncias da CAIXA."; 
	$instru4 = "Guia vencida - cobrar multa de 10% nos trinta primeiros dias, com o adicional de 2% por"; 
	$instru5 = "m�s subseq�nte de atraso e juros de mora de 1% ao m�s e corre��o monetaria."; 
	$instru6 = " "; 
	$instru7 = " "; 

    define("instru1", "$instru1"); 
    define("instru2", "$instru2"); 
    define("instru3", "$instru3"); 
    define("instru4", "$instru4"); 
    define("instru5", "$instru5"); 
    define("instru6", "$instru6"); 
    define("instru7", "$instru7"); 

    define("codent", 	"$codent");
    define("nosso", 	"$nosso");
    define("agenced", 	"$agenced");
    define("cedente", 	"$cedente");
    define("local", 	"$local");
    define("valor", 	"$valor"); 
	
	$campo1 = $banco.$moeda.$sico.substr($cod_ent,0,3);
	$DV_campo1 = Modulo10($campo1);
	$campo1a = substr($campo1,0,5).'.'.substr($campo1,5,4).$DV_campo1.'   ';

	$campo2 = substr($cod_ent,3,5).$cod_cnae.$tipo_ent.$sitcs.substr(nosso,0,4);
	$DV_campo2 = Modulo10($campo2);
        $campo2a = substr($campo2,0,5).'.'.substr($campo2,5,5).$DV_campo2.'   ';

	$campo3 = substr($nosso,4,8).$cnae.$zero1;
	$DV_campo3 = Modulo10($campo3);
        $campo3a = substr($campo3,0,5).'.'.substr($campo3,5,5).$DV_campo3.'    ';

	$campo4 = substr($campo1,0,4).$fav_venc.$valor.substr($campo1,4,5).$campo2.$campo3;
	$DV_campo4 = Modulo11($campo4);
        $campo4a = $DV_campo4.'    ';

        $campo5a = $fav_venc.$valor; 

	$DV_CBarra   = Modulo11($banco.$moeda.$FatorVencimento.$valor.nossoNumero.substr($agencia_cod_cedente,0,15));
//	$CodigoBarra = $campo1.$DV_campo1.$campo2.$DV_campo2.$campo3.$DV_campo3.$DV_campo4.$campo5a;
	
	
    $CodigoBarra = 	Trim(substr($campo1,0,4).$DV_campo4.$campo5a.substr($campo1,4,5).$campo2.$campo3);

//    define("numero_barra","$campo1 $DV_campo1 $campo2 $DV_campo2 $campo3 $DV_campo3 $DV_campo4 $campo5a");
    define("numero_barra","$CodigoBarra");

	define("numero_digitavel","$campo1a $campo2a $campo3a $campo4a $campo5a");

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
?>
<img src=imagens/p.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=imagens/p.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
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
    src=imagens/p.gif width=<?=$f1?> height=<?=$altura?> border=0><img 
<?
    if (substr($f,$i,1) == "0") {
      $f2 = $fino ;
    }else{
      $f2 = $largo ;
    }
?>
    src=imagens/b.gif width=<?=$f2?> height=<?=$altura?> border=0><img 
<?
  }
}

// Draw guarda final
?>
src=imagens/p.gif width=<?=$largo?> height=<?=$altura?> border=0><img 
src=imagens/b.gif width=<?=$fino?> height=<?=$altura?> border=0><img 
src=imagens/p.gif width=<?=1?> height=<?=$altura?> border=0> 
<?

}

//Fim da fun��o

define ("valor", "$valor");
$multa = valorFormatado(($valor*2)/100); //2% ao m�s
$juros = valorFormatado(($valor*0.33)/100); //1% ao mes ou melhor 0,33% ao dia
$valor = valorFormatado($valor);

define ("nossoNumero", 		"$nossoNumero");
define ("vencimento", 		"$diaVencimento/$mesVencimento/$anoVencimento");
define ("vencimento2", 		"$anoVencimento.$mesVencimento.$diaVencimento");
define ("AnoVencimento", 	"$anoVencimento");
define ("MesVencimento", 	"$mesVencimento");
define ("DiaVencimento", 	"$diaVencimento");

define ("sacado",   "$sacado");
define ("cnpj", 	"$cnpj");
define ("endereco", "$endereco");
define ("bairro", 	"$bairro");
define ("cidade", 	"$cidade");
define ("cep", 		"$cep");
define ("estado", 	"$estado");
define ("exec", 	"$exec");
define ("vencto", 	"$vencto");

define ("Instru1", "$Instru1");
define ("Instru2", "<br><br><br>* * * Valores Expresso em Reais * * *");
define ("Instru3", "AP�S VENCIMENTO MULTA DE.......$multa");
define ("Instru4", "MORA DIA/COM.PERMANENC.........$juros");


NumeroCodigoBarra($nossoNumero,$vencimento);
//******************************************************

?>

<html>
<head>
<title>Sindificios - Sind. Empreg. Edif. SP</title>
<link rel="shortcut icon" href="imagens/favicon.ico"/>
</head>

<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0>

<!-- \/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ -->
<table cellspacing=0 cellpadding=0 width=666 border=0>
	<tr>
		<td class=ld align=right width=452 valign=bottom></td>
	</tr>


</table>
<font face=arial>
<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td class=cp width=150><img src="imagens/logo-caixa.png" border=0 HEIGHT="35"></td>
<td colspan=0 class=ct valign=top width=400 height=13><font face=arial size=2><b>GRCS - Guias de Recolhimento da Contribui��o Sindical</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=#FFFFFF></font></td>
<td colspan=0 class=ct valign=bottom width=155 height=13 style="font-size: 12px;" align=right><font face=arial size2>1� Via - Contribuinte</td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=13 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=530 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=25 height=2 style="font-size: 8px;">Vencimento</td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=35 height=2 style="font-size: 8px;">Exercicio</td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
</tr>
<tr>
<td colspan=0><img height=13 src="imagens/1a.gif"></td>
<td class=ct valign=top width=530 height=2 style="font-size: 12px;"></td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td class=ct valign=top width=50 height=2 style="font-size: 12px;"><font face=arial><b><?=vencto;?><b></td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td class=ct valign=top width=25 height=2 style="font-size: 12px;"><font face=arial><b><?=exec;?></b></td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=530 height=1><img height=1 src="imagens/2a.gif" width=530 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=95 height=1><img height=1 src="imagens/2.gif" width=95 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=57 height=1><img height=1 src="imagens/2.gif" width=57 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<font face=arial size=1,25><b>   Dados da Entidade Sindical</b>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=420 height=2 style="font-size: 8px;">Nome da Entidade</td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=170 height=2 style="font-size: 8px;">Codigo da Entidade Sindical</td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=30 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=13 src="imagens/1a.gif"></td>
</tr>
<tr>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td class=ct valign=top width=490 height=2 style="font-size: 12px;"><font face=arial><b>SIND EMPREG EDIFICIOS PORTEIROS CABINEIROS MUNICIPIO SP</b></td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td class=ct valign=top width=120 height=2 style="font-size: 12px;"><font face=arial><b><?=codent;?><b></td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td class=ct valign=top width=20 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=13 src="imagens/1a.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=490 height=1><img height=1 src="imagens/2.gif" width=490 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=200 height=1><img height=1 src="imagens/2.gif" width=200 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=44 height=1><img height=1 src="imagens/2a.gif" width=44 border=0></td>
</tr>
</table>


<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=300 height=2 style="font-size: 8px;">Endere�o</td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=48 height=2 style="font-size: 8px;">N�mero</td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=30 height=2 style="font-size: 8px;">Complemento</td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=90 height=2 style="font-size: 8px;">CNPJ da Entidade</td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
</tr>
<tr>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td class=ct valign=top width=320 height=2 style="font-size: 12px;"><font face=arial><b>RUA SETE DE ABRIL</b></td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td class=ct valign=top width=48 height=2 style="font-size: 12px;"><font face=arial><b>34<b></td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td class=ct valign=top width=20 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td class=ct valign=top width=150 height=2 style="font-size: 12px;"><font face=arial><b>43.070.481/0001-14</b></td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=320 height=1><img height=1 src="imagens/2.gif" width=320 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=67 height=1><img height=1 src="imagens/2.gif" width=67 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=89 height=1><img height=1 src="imagens/2.gif" width=89 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=200 height=1><img height=1 src="imagens/2.gif" width=200 border=0></td>
</tr>
</table>


<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=165 height=2 style="font-size: 8px;">Bairro/Distrito</td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=48 height=2 style="font-size: 8px;">Cep</td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=30 height=2 style="font-size: 8px;">Cidade/Municipio</td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=40 height=2 style="font-size: 8px;">UF</td>
<td colspan=0><img height=13 src="imagens/1.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=165 height=2 style="font-size: 11px;"><font face=arial><b>CENTRO</b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=60 height=2 style="font-size: 11px;"><font face=arial><b>01044-000<b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=80 height=2 style="font-size: 11px;"><font face=arial><b>S�O PAULO</b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=40 height=2 style="font-size: 11px;"><font face=arial><b>SP</b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=290 height=1><img height=1 src="imagens/2.gif" width=290 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=97 height=1><img height=1 src="imagens/2.gif" width=97 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=249 height=1><img height=1 src="imagens/2.gif" width=249 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=40 height=1><img height=1 src="imagens/2.gif" width=40 border=0></td>
</tr>
</table>


<table cellspacing=0 cellpadding=0 border=0>
<tr>
<font face=arial size=1,25><b>   Dados do Contribuinte</b>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=300 height=2 style="font-size: 8px;">Nome/Raz�o Social/Denomina��o Social</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=200 height=2 style="font-size: 8px;">CPF/CNPJ/C�digo do Contribuinte</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=400 height=2 style="font-size: 12px;"><font face=arial><b><?=sacado;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>[<?=$coded;?>-<?=$admed;?>]&nbsp;&nbsp;</b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=120 height=2 style="font-size: 12px;"><font face=arial><b><?=cnpj;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=25 height=2 style="font-size: 12px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=490 height=1><img height=1 src="imagens/2.gif" width=490 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=200 height=1><img height=1 src="imagens/2.gif" width=200 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
</tr>
</table>


<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=300 height=2 style="font-size: 8px;">Endere�o</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=48 height=2 style="font-size: 8px;">N�mero</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=30 height=2 style="font-size: 8px;">Complemento</td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=90 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=320 height=2 style="font-size: 12px;"><font face=arial><b><?=endereco;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=48 height=2 style="font-size: 12px;"><font face=arial><b><b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=20 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td class=ct valign=top width=150 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=320 height=1><img height=1 src="imagens/2.gif" width=320 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=67 height=1><img height=1 src="imagens/2.gif" width=67 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=89 height=1><img height=1 src="imagens/2.gif" width=89 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=200 height=1><img height=1 src="imagens/2.gif" width=200 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=100 height=2 style="font-size: 8px;">Cep</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=100 height=2 style="font-size: 8px;">Bairro/Distrito</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=100 height=2 style="font-size: 8px;">cidade/Municipio</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=40 height=2 style="font-size: 8px;">UF</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=60 height=2 style="font-size: 8px;">C�digo Atividade</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=100 height=2 style="font-size: 12px;"><font face=arial><b><?=cep;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=165 height=2 style="font-size: 12px;"><font face=arial><b><?=bairro;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=100 height=2 style="font-size: 12px;"><font face=arial><b><?=cidade;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=20 height=2 style="font-size: 12px;"><font face=arial><b><?=estado;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=60 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=100 height=1><img height=1 src="imagens/2.gif" width=100 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=287 height=1><img height=1 src="imagens/2.gif" width=287 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=165 height=1><img height=1 src="imagens/2.gif" width=165 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=40 height=1><img height=1 src="imagens/2.gif" width=40 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=77 height=1><img height=1 src="imagens/2.gif" width=77 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<font face=arial size=1,25><b>   Dados de Referencia da Contribui��o</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>Dados da Contribui��o</b>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=300 height=2 style="font-size: 8px;"><b>Categoria</b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=200 height=2 style="font-size: 8px;">(=)Valor do Documento</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td class=ct valign=top width=300 height=2 style="font-size: 12px;"><img src="imagens/4.gif"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=50 height=2 style="font-size: 12px;" align=right><font face=arial><b>&nbsp;&nbsp;<?=valor;?>&nbsp;&nbsp;&nbsp;</b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=25 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=490 height=1><img height=1 src="imagens/2a.gif" width=490 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=200 height=1><img height=1 src="imagens/2.gif" width=200 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=109 height=2 style="font-size: 8px;">Capital Social - Empresa</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=220 height=2 style="font-size: 8px;">N� Empregados - Contribuintes</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=200 height=2 style="font-size: 8px;">(-)Desconto/Abatimento</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=100 height=2 style="font-size: 12px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=50 height=2 style="font-size: 12px;"><font face=arial><b><b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=25 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=263 height=1><img height=1 src="imagens/2.gif" width=263 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=220 height=1><img height=1 src="imagens/2.gif" width=220 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=200 height=1><img height=1 src="imagens/2.gif" width=200 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=109 height=2 style="font-size: 8px;">Capital Social - Estabelecimento</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=220 height=2 style="font-size: 8px;">Total Remunera��o - Contribuintes</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=200 height=2 style="font-size: 8px;">(-)Outras Dedu��es</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=100 height=2 style="font-size: 12px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=50 height=2 style="font-size: 12px;"><font face=arial><b><b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=25 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=263 height=1><img height=1 src="imagens/2.gif" width=263 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=220 height=1><img height=1 src="imagens/2.gif" width=220 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=200 height=1><img height=1 src="imagens/2.gif" width=200 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=109 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=220 height=2 style="font-size: 8px;">Total Empregados - Estabelecimento</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=200 height=2 style="font-size: 8px;">(+)Mora/Multa</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=100 height=2 style="font-size: 12px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=50 height=2 style="font-size: 12px;"><font face=arial><b><b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=25 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=263 height=1><img height=1 src="imagens/2a.gif" width=263 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=220 height=1><img height=1 src="imagens/2.gif" width=220 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=200 height=1><img height=1 src="imagens/2.gif" width=200 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=109 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=220 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=200 height=2 style="font-size: 8px;">(+)Outros Acrescimos</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=100 height=2 style="font-size: 12px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td class=ct valign=top width=50 height=2 style="font-size: 12px;"><font face=arial><b><b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=25 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=263 height=1><img height=1 src="imagens/2a.gif" width=263 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=220 height=1><img height=1 src="imagens/2a.gif" width=220 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=200 height=1><img height=1 src="imagens/2.gif" width=200 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=109 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=220 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=200 height=2 style="font-size: 8px;">(=)Valor Cobrado</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=100 height=2 style="font-size: 12px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td class=ct valign=top width=50 height=2 style="font-size: 12px;"><font face=arial><b><b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=25 height=2 style="font-size: 12px;" align=right><font face=arial><b>&nbsp;&nbsp;<?=valor;?>&nbsp;&nbsp;&nbsp;</b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=263 height=1><img height=1 src="imagens/2.gif" width=263 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=220 height=1><img height=1 src="imagens/2.gif" width=220 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=200 height=1><img height=1 src="imagens/2.gif" width=200 border=0></td>
</tr>
</table>

<Table>
<td valign=top width=44 height=1><img height=1 src="imagens/2a.gif" width=44 border=0></td>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=60 height=2 style="font-size: 2px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=109 height=2 style="font-size: 2px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=160 height=2 style="font-size: 2px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
</tr>
<tr>
<td colspan=0><img height=13 src="imagens/1a.gif"></td>
<td class=ct valign=top width=60 height=2 style="font-size: 19px;"  align=right><font face=arial><b>104-0&nbsp;</b></td>
<td colspan=0><img height=23 src="imagens/1.gif"></td>
<td class=ct valign=top width=650 height=2 style="font-size: 15px;"><font face=arial><b>&nbsp;&nbsp;<?=numero_digitavel;?><b></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td class=ct valign=top width=25 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=60 height=1><img height=1 src="imagens/2.gif" width=60 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=631 height=1><img height=1 src="imagens/2.gif" width=631 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=109 height=2 style="font-size: 8px;">C�digo do Cedente</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=109 height=2 style="font-size: 8px;">Nosso N�mero</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=109 height=2 style="font-size: 8px;">Valor do Documento</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=100 height=2 style="font-size: 8px;">Data Vencimento</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;">Exercicio</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=100 height=2 style="font-size: 12px;"><font face=arial><b><?=codent;?><b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=50 height=2 style="font-size: 12px;"><font face=arial><b><?=nosso;?><b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=25 height=2 style="font-size: 12px;" align=right><font face=arial><b>&nbsp;&nbsp;<?=valor;?>&nbsp;&nbsp;&nbsp;</b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=25 height=2 style="font-size: 12px;"><font face=arial><b><?=vencto;?><b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=25 height=2 style="font-size: 12px;"><font face=arial><b><?=exec;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=143 height=1><img height=1 src="imagens/2.gif" width=143 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=160 height=1><img height=1 src="imagens/2.gif" width=160 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=148 height=1><img height=1 src="imagens/2.gif" width=148 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=110 height=1><img height=1 src="imagens/2.gif" width=110 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=108 height=1><img height=1 src="imagens/2.gif" width=108 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=10 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=10 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=10 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=170 height=2 style="font-size: 8px;">Autentica��o mec�nica</td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td class=ct valign=top width=30 height=2 style="font-size: 12px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td class=ct valign=top width=50 height=2 style="font-size: 12px;"><font face=arial><b><b></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td class=ct valign=top width=25 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td class=ct valign=top width=180 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td class=ct valign=top width=25 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=170 height=1><img height=1 src="imagens/2a.gif" width=170 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=60 height=1><img height=1 src="imagens/2a.gif" width=60 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=148 height=1><img height=1 src="imagens/2a.gif" width=148 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=190 height=1><img height=1 src="imagens/2a.gif" width=190 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=108 height=1><img height=1 src="imagens/2a.gif" width=108 border=0></td>
</tr>
</table>

<Table>
<td valign=top width=44 height=1><img height=1 src="imagens/2a.gif" width=44 border=0></td>
</table>

<Table cellSpacing=0 cellPadding=0 width=677 border=0>
<tr>
<td class=ct width=700><div align=right style="font-size: 9px;">Corte na linha pontilhada</div></td>
</tr>
<tr>
<td class=ct width=700><img height=1 src="imagens/6.gif" width=700 border=0></td>
</tr>
<tr>
<td class=ct height="18" width=700></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=1 height=2 style="font-size: 2px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=1 height=2 style="font-size: 2px;"></td>
<td colspan=0 class=ct valign=bottom width=485 height=2 style="font-size: 12px;" align=right><font face=arial>2� Via - Documento do Banco</td>
<td colspan=0 class=ct valign=top width=1 height=2 style="font-size: 2px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=1 height=2 style="font-size: 12px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=1 height=2 style="font-size: 2px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
</tr>
<tr>
<td class=cp width=10><img height=30 src="imagens/logo-caixa.png" border=0 HEIGHT="30"></td>
<td colspan=0><img height=30 src="imagens/1.gif"></td>
<td class=ct valign=bottom width=56 height=2 style="font-size: 19px;"  align=right><font face=arial><b>104-0&nbsp;</b></td>
<td colspan=0><img height=30 src="imagens/1.gif"></td>
<td class=ct valign=bottom width=440 height=2 style="font-size: 15px;" align=right><font face=arial><b>&nbsp;&nbsp;&nbsp;&nbsp;<?=numero_digitavel;?></b></font></td>
<td colspan=0><img height=22 src="imagens/1a.gif"></td>
<td class=ct valign=top width=25 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=18 src="imagens/1a.gif"></td>
</tr>
<tr>
<td valign=bottom width=150 height=2><img height=2 src="imagens/2.gif" width=150 border=0></td>
<td valign=bottom width=7 height=2><img height=2 src="imagens/2.gif" width=7 border=0></td>
<td valign=bottom width=56 height=2><img height=2 src="imagens/2.gif" width=56 border=0></td>
<td valign=bottom width=7 height=2><img height=2 src="imagens/2.gif" width=7 border=0></td>
<td valign=bottom width=485 height=2><img height=2 src="imagens/2.gif" width=485 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=109 height=2 style="font-size: 8px;">Local de Pagamento</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;">&nbsp;&nbsp;&nbsp;Vencimento</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=400 height=2 style="font-size: 12px;"><font face=arial><b><?=local;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=1 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=25 height=2 style="font-size: 12px;"><font face=arial><b>&nbsp;&nbsp;<?=vencto;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=543 height=1><img height=1 src="imagens/2.gif" width=543 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=1 height=1><img height=1 src="imagens/2a.gif" width=1 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=145 height=1><img height=1 src="imagens/2.gif" width=145 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=242 height=2 style="font-size: 8px;">Cedente</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=145 height=2 style="font-size: 8px;">&nbsp;&nbsp;&nbsp;Ag�ncia/C�digo Cedente</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=400 height=2 style="font-size: 12px;"><font face=arial><b><?=cedente;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=1 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=145 height=2 style="font-size: 12px;"><font face=arial><b>&nbsp;&nbsp;<?=agenced;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=543 height=1><img height=1 src="imagens/2.gif" width=543 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=1 height=1><img height=1 src="imagens/2a.gif" width=1 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=145 height=1><img height=1 src="imagens/2.gif" width=145 border=0></td>

</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=100 height=2 style="font-size: 8px;">Data do Documento</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=162 height=2 style="font-size: 8px;">N�mero do Documento</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=47 height=2 style="font-size: 8px;">Esp. Docum.</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=37 height=2 style="font-size: 8px;">Aceite</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=98 height=2 style="font-size: 8px;">&nbsp;&nbsp;&nbsp;Data Processamento</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=145 height=2 style="font-size: 8px;">&nbsp;&nbsp;&nbsp;Nosso Numero</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=100 height=2 style="font-size: 12px;"><font face=arial><b><?=date("d/m/Y");?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=162 height=2 style="font-size: 12px;"><font face=arial><b><?=nosso;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=47 height=2 style="font-size: 12px;"><font face=arial><b>GRCSU</b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=37 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=95 height=2 style="font-size: 12px;"><font face=arial><b>&nbsp;&nbsp;<?=date("d/m/Y");?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=1 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=145 height=2 style="font-size: 12px;"><font face=arial><b>&nbsp;&nbsp;<?=nosso;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=100 height=1><img height=1 src="imagens/2.gif" width=100 border=0></td>

<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=162 height=1><img height=1 src="imagens/2.gif" width=162 border=0></td>

<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=47 height=1><img height=1 src="imagens/2.gif" width=47 border=0></td>

<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=77 height=1><img height=1 src="imagens/2.gif" width=77 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=135 height=1><img height=1 src="imagens/2.gif" width=135 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=145 height=1><img height=1 src="imagens/2.gif" width=145 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=100 height=2 style="font-size: 8px;">Uso do Banco</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=50 height=2 style="font-size: 8px;">Carteira</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=47 height=2 style="font-size: 8px;">Esp�cie.</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=37 height=2 style="font-size: 8px;">Quantidade</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=100 height=2 style="font-size: 8px;">&nbsp;&nbsp;&nbsp;Valor</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=145 height=2 style="font-size: 8px;">&nbsp;&nbsp;&nbsp;(=)Valor do Documento</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=100 height=2 style="font-size: 12px;"><font face=arial><b>EXERC&nbsp;<?=exec;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=50 height=2 style="font-size: 12px;"><font face=arial><b>SIND</b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=47 height=2 style="font-size: 12px;"><font face=arial><b>R$</b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=37 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=130 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=1 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=145 height=2 style="font-size: 12px;" align=right><font face=arial><b>&nbsp;&nbsp;<?=valor;?>&nbsp;&nbsp;&nbsp;</b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=100 height=1><img height=1 src="imagens/2.gif" width=100 border=0></td>

<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=50 height=1><img height=1 src="imagens/2.gif" width=50 border=0></td>

<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=105 height=1><img height=1 src="imagens/2.gif" width=105 border=0></td>

<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=131 height=1><img height=1 src="imagens/2.gif" width=131 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=135 height=1><img height=1 src="imagens/2.gif" width=135 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>


<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=145 height=1><img height=1 src="imagens/2.gif" width=145 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=242 height=2 style="font-size: 8px;">Instru��es (Texto de responsabilidade do cedente)</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 12px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=145 height=2 style="font-size: 8px;">&nbsp;&nbsp;&nbsp;(-)Desconto/Abatimento</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=500 height=2 style="font-size: 12px;" align=center><font face=arial><?=instru1;?></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=1 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=145 height=2 style="font-size: 12px;"><font face=arial><b>&nbsp;&nbsp;<?=$Valor2;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=543 height=1><img height=1 src="imagens/2a.gif" width=543 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=1 height=1><img height=1 src="imagens/2a.gif" width=1 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=145 height=1><img height=1 src="imagens/2.gif" width=145 border=0></td>

</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=542 height=2 style="font-size: 12px;"><b><font face=arial><b><?=instru2;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=145 height=2 style="font-size: 8px;">&nbsp;&nbsp;&nbsp;(-)Outras Dedu��es</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=500 height=2 style="font-size: 12px;"><font face=arial><b><?=instru3;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=1 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=145 height=2 style="font-size: 12px;"><font face=arial><b>&nbsp;&nbsp;<?=$Valor3;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=543 height=1><img height=1 src="imagens/2a.gif" width=543 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=1 height=1><img height=1 src="imagens/2a.gif" width=1 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=145 height=1><img height=1 src="imagens/2.gif" width=145 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=542 height=2 style="font-size: 12px;"><font face=arial><b><?=instru4;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=145 height=2 style="font-size: 8px;">&nbsp;&nbsp;&nbsp;(+)Mora/Multa</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=500 height=2 style="font-size: 12px;"><font face=arial><b><?=instru5;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=1 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=145 height=2 style="font-size: 12px;"><font face=arial><b>&nbsp;&nbsp;<?=$Valor4;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=543 height=1><img height=1 src="imagens/2a.gif" width=543 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=1 height=1><img height=1 src="imagens/2a.gif" width=1 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=145 height=1><img height=1 src="imagens/2.gif" width=145 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=542 height=2 style="font-size: 12px;"><font face=arial><b><?=instru6;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=145 height=2 style="font-size: 8px;">&nbsp;&nbsp;&nbsp;(+)Outros Acr�cimos</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=500 height=2 style="font-size: 8px;"><font face=arial><b> </b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=1 height=2 style="font-size: 8px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=145 height=2 style="font-size: 12px;"><font face=arial><b>&nbsp;&nbsp;<?=$Valor5;?></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=543 height=1><img height=1 src="imagens/2a.gif" width=543 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=1 height=1><img height=1 src="imagens/2a.gif" width=1 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=145 height=1><img height=1 src="imagens/2.gif" width=145 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=242 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=145 height=2 style="font-size: 8px;">&nbsp;&nbsp;&nbsp;(=)Valor Cobrado</td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=400 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=1 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=145 height=2 style="font-size: 12px;" align=right><font face=arial><b>&nbsp;&nbsp;<?=valor;?>&nbsp;&nbsp;&nbsp;</b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=543 height=1><img height=1 src="imagens/2.gif" width=543 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=1 height=1><img height=1 src="imagens/2a.gif" width=1 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=145 height=1><img height=1 src="imagens/2.gif" width=145 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>                                           
<td colspan=0 class=ct valign=top width=543 height=2 style="font-size: 8px;">Sacado&nbsp;&nbsp;<font style="font-size: 12px;" face=arial>&nbsp;<?=sacado;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?=cnpj;?></b></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=145 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=top width=480 height=2 style="font-size: 12px;"><font face=arial>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=endereco;?></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td class=ct valign=top width=1 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td class=ct valign=top width=145 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2a.gif" width=7 border=0></td>
<td valign=top width=530 height=1><img height=1 src="imagens/2a.gif" width=500 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=1 height=1><img height=1 src="imagens/2a.gif" width=1 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2a.gif" width=1 border=0></td>
<td valign=top width=145 height=1><img height=1 src="imagens/2a.gif" width=145 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td colspan=0 class=ct valign=top width=542 height=2 style="font-size: 12px;"><font face=arial>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?=cep;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=cidade;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=estado;?></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=7 height=2 style="font-size: 8px;"></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td colspan=0 class=ct valign=top width=145 height=2 style="font-size: 12px;" align=right><b>[<?=$coded;?>-<?=$admed;?>]&nbsp;&nbsp;</b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
<td class=ct valign=bottom width=400 height=2 style="font-size: 8px;"><font face=arial>Sacados/Avalista:________________</td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td class=ct valign=top width=1 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1a.gif"></td>
<td class=ct valign=top width=145 height=2 style="font-size: 12px;"><font face=arial><b></b></td>
<td colspan=0><img height=14 src="imagens/1.gif"></td>
</tr>
<tr>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>
<td valign=top width=543 height=1><img height=1 src="imagens/2.gif" width=543 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=7 height=1><img height=1 src="imagens/2.gif" width=7 border=0></td>

<td valign=top width=1 height=1><img height=1 src="imagens/2.gif" width=1 border=0></td>
<td valign=top width=145 height=1><img height=1 src="imagens/2.gif" width=145 border=0></td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
<td colspan=0 class=ct valign=rigth width=690 height=2 style="font-size: 8px;" align=right>Ficha de Compensa��o/Autentica��o Mec�nica</td>
</tr>
</table>

<TABLE cellSpacing=0 cellPadding=0 width=666 border=0>
	<TR>
		<TD vAlign=bottom align=left height=50>&nbsp;&nbsp;&nbsp;<?CodigoDeBarra(ltrim(Sonumeros(numero_barra)));?></TD>
	</tr>
</table>

<!-- /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/ -->
</BODY>
</HTML>

<?
}
?>