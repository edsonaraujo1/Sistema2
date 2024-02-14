<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Imprimir Codigo de Barras 
 Criado em Data.....: 05/05/2009
 Ultima Atualização : 06/05/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);
// Realiza uma comsulta
$consulta9  = "SELECT * FROM instrucao WHERE Edit1 = '$cod_intru'";

$resultado9 = @mysql_query($consulta9);

$row9 = @mysql_fetch_array($resultado9);

$Edit2      = @$row9['Edit2'];
$Edit3      = @$row9['Edit3'];
$Edit12	    = @$row9["Edit12"];
$Edit13	    = @$row9["Edit13"];
$Edit14	    = @$row9["Edit14"];
$Edit15	    = @$row9["Edit15"];
$Edit16	    = @$row9["Edit16"];
$Edit17	    = @$row9["Edit17"];

$sed_agecho = trim($Edit13)."/".trim($Edit14).".".trim($Edit15).".".trim($Edit16)."-".$Edit17;

$codigo_agencia_sed = $sed_agecho;

$consulta  = "SELECT * FROM edificios WHERE id >= 1 ORDER BY id";
		
$resultado = @mysql_query($consulta);

$dat_rel = date("d/m/Y");
$soma_quant = 0;

?>

<div align='left'>
<table align="center">
<font style=' font-family: Verdana; font-size: 10px;'>Data.:<?=$dat_rel;?></font>
</table>
<td><img height='1' src="imagens/2.gif" width='978' border='0'/>
<table  border='0'  align='left' >
<td width='500px'>
			 
SIN EMPREG EDIFICIOS PORTEIROS CABINEIROS MUNICIPIO SP<br />
CODIGO SINDICAL =  <b>020.501.86200-0</b><br />
CNPJ = <b>43.070.481/0001-14</b><br />

<tr>
<td style=' font-family: Verdana; font-size: 1px;  height:1px;'><img height='1' src="imagens/2.gif" width='978' border='0'></td>
</tr>
</table>

</div>
<br/><br/><br/><br/>

<table  border='0'align='center' >
<td width='800px' align='center'>
<b>RELATORIO DE CODIGO DE BARRA/LINHA DIGITAVEL E CNPJ<br/><br/></b>
</td>
</table>

<?		
while ($linha = mysql_fetch_array($resultado))
{
		
		$id_conf   = $linha["id"];
		$cod       = $linha["COD"];
		$cond      = $linha["COND"];
		$nome      = $linha["NOME"];
		$rua       = trim(strtoupper($linha["RUA"]));
		$endereco  = trim(strtoupper($linha["ENDRESID"]));
		$numero    = trim(strtoupper($linha["NUMERO"]));
		$ativ      = $linha["ATIV"];
		$cnpj_1    = $linha["CGC"];

		$cnpj_ed    = retirar_carac3($cnpj_1);
		$exec       = "2009";
		$vencto     = "30/04/2009";
		$valor      = 0;
		$cod_intru  = 1;

        // Pesquiza contribuicao paga
        $sql  = "SELECT * FROM sindical WHERE SINDCOD = '$cod' AND VENCTO = '$vencto'";
	
	    $resultado2 = @mysql_query($sql);

        $row2 = @mysql_fetch_array($resultado2);

        $id          = @$row2["id"];
		$cod_SIND    = @$row2["SINDCOD"];
		$venc_SIND   = @$row2["VENCTO"];

		if (!empty($id))
		{
			$cat_echo = $cod_SIND."  Pagou...<br>";	
			
		}else{
            // Cria Variaveis usadas na Barra
			$banco       = 104;
			$moeda       = 9;
		    $database    = 19971007;
		    $vencimento2 = substr($vencto,6,4).substr($vencto,3,2).substr($vencto,0,2);
		    $fav_venc    = floor(abs(strtotime($database) - strtotime($vencimento2))/86400);
			$valor       = SoNumeros("");
			$valor       = colocaZeroEsquerda($valor, 10);
		    $sico        = 97;
		    $cod_ent     = 86200; //$Edit16;
		    $cod_cnae    = 9;
		    $tipo_ent    = 1;
		    $sitcs       = 77;
		    $cnae        = 3;
		    $zero1       = 0;
		    $nosso1      = $cnpj_ed;
		    $nosso       = substr($nosso1,0,12);
		    $codent      = $Edit3;
		    $agenced     = $codigo_agencia_sed;
            $soma_quant++; 
            
            echo "CNPJ ".$cnpj_1."<br>";
	
			$campo1 = $banco.$moeda.$sico.substr($cod_ent,0,3);
			$DV_campo1 = Modulo10($campo1);
			$campo1a = substr($campo1,0,5).'.'.substr($campo1,5,4).$DV_campo1.'   ';
		
			$campo2 = substr($cod_ent,3,5).$cod_cnae.$tipo_ent.$sitcs.substr($nosso,0,4);
			$DV_campo2 = Modulo10($campo2);
		        $campo2a = substr($campo2,0,5).'.'.substr($campo2,5,5).$DV_campo2.'   ';
		
			$campo3 = substr($nosso,4,8).$cnae.$zero1;
			$DV_campo3 = Modulo10($campo3);
		        $campo3a = substr($campo3,0,5).'.'.substr($campo3,5,5).$DV_campo3.'    ';
		
			$campo4 = substr($campo1,0,4).$fav_venc.$valor.substr($campo1,4,5).$campo2.$campo3;
			$DV_campo4 = Modulo11($campo4);
		        $campo4a = $DV_campo4.'    ';
		
		        $campo5a = $fav_venc.$valor; 
		
			$DV_CBarra   = Modulo11($banco.$moeda.$FatorVencimento.$valor.$nossoNumero.substr($agencia_cod_cedente,0,15));
			$CodigoBarra = $campo1.$DV_campo1.$campo2.$DV_campo2.$campo3.$DV_campo3.$DV_campo4.$campo5a;
	
	
		    $CodigoBarra = 	Trim(substr($campo1,0,4).$DV_campo4.$campo5a.substr($campo1,4,5).$campo2.$campo3);
		
		    define("numero_barra","$CodigoBarra");

		    $numero_barra = $CodigoBarra;

			$numero_digitavel = $campo1a.$campo2a.$campo3a.$campo4a.$campo5a;

			//echo $numero_digitavel."<br>";
            
			//echo CodigoDeBarra(ltrim(Sonumeros($numero_barra)))."<br>";
			        
            }
}
echo "Total de Predios  ".$soma_quant;

// Funcoes do Sistema Barras
function MOSTRA_DIAMESANO($DATE){

        $agora = time();
        $data = getdate($agora);

        if($data["wday"]==0) { echo "Domingo, "; }
        
                elseif($data["wday"]==1) { echo "Segunda, "; }

                elseif($data["wday"]==2) { echo "Terça, "; }

                elseif($data["wday"]==3) { echo "Quarta, "; }

                elseif($data["wday"]==4) { echo "Quinta, "; }

                elseif($data["wday"]==5) { echo "Sexta, "; }

                elseif($data["wday"]==6) { echo "Sábado, "; }

        if($data["mon"]==1) { $mes="Janeiro"; }

                elseif($data["mon"]==2) { $mes="Fevereiro"; }

                elseif($data["mon"]==3) { $mes="Março"; }

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
<img src='imagens/p.gif' width=<?=$fino?> height=<?=$altura?> border='0'><img 
src='imagens/b.gif' width=<?=$fino?> height=<?=$altura?> border='0'><img 
src='imagens/p.gif' width=<?=$fino?> height=<?=$altura?> border='0'><img 
src='imagens/b.gif' width=<?=$fino?> height=<?=$altura?> border='0'><img 
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
    src='imagens/p.gif' width=<?=$f1?> height=<?=$altura?> border='0'><img 
<?
    if (substr($f,$i,1) == "0") {
      $f2 = $fino ;
    }else{
      $f2 = $largo ;
    }
?>
    src='imagens/b.gif' width=<?=$f2?> height=<?=$altura?> border='0'><img 
<?
  }
}

// Draw guarda final
?>
src='imagens/p.gif' width=<?=$largo?> height=<?=$altura?> border='0'><img 
src='imagens/b.gif' width=<?=$fino?> height=<?=$altura?> border='0'><img 
src='imagens/p.gif' width=<?=1?> height=<?=$altura?> border='0'> 
<?

}
//Fim da função


Function retirar_carac3($var){

$var = str_replace(".",             "",$var);
$var = str_replace("-",             "",$var);
$var = str_replace("/",             "",$var);

return($var);
}

?>