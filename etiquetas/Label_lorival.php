<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar Mala direta de Socios em PDF
 Criado em Data.....: 09/12/2009
 Ultima Atualizaчуo : 09/12/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

include('PDF_Label.php');

// Example of custom format
// $pdf = new PDF_Label(array('paper-size'=>'A4', 'metric'=>'mm', 'marginLeft'=>1, 'marginTop'=>1, 'NX'=>2, 'NY'=>7, 'SpaceX'=>0, 'SpaceY'=>0, 'width'=>99, 'height'=>38, 'font-size'=>14));

// Abre Conexуo com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

//$sql  = "SELECT * FROM etiquetas_paulo WHERE id > 9631  LIMIT 0,10000";

//$sql  = "SELECT * FROM etiquetas_socios ORDER BY COD ASC";

$sql  = "SELECT * FROM etiquetas_lorival";

$resultado = mysql_query($sql);

// Standard format
$pdf = new PDF_Label('L7163');

$pdf->AddPage();

$faz = 1;
// Inicio do Loop
while($linha = @mysql_fetch_array($resultado)) {

$e++;

if ($faz == 1){
    $conta_pag = $conta_pg++;	
	$pdf->Text(190,6, "Pagina.: ".$conta_pag);
    $faz=0;	
} 

if ($il == 20){
    $conta_pag = $conta_pg++;	
    $pdf->Text(190,6, "Pagina.: ".$conta_pag);
    $il=0;	
} 
$il++;
//$cod_p        = " Matricula : ".$linha["CODP"];
$cod_p        = " Att.: Sr(a)";


$nudoc        = $linha["COD"];
$estado       = $linha["ESTADORES"];
$sacado       = $linha["NOMEASSOC"];
$cnpj         = $linha["CPF"];
$endereco     = trim($linha["RUA"]."  ".$linha["ENDRESID"].", ".$linha["NUMERO"]);
$cep          = $linha["CEPRES"];
$bairro       = "SAO PAULO"; // $linha["BAIRRORES"];
$cidade       = "SAO PAULO"; // $linha["CIDADERES"];
$uf           = $linha["ESTADORES"];
$nu           = $linha["NU"];
$i_inscri     = $linha["DATINSC"];
$cod_pesq     = $linha["CODP"];


if (empty($cep)){
	
	$consulta_pes  = "SELECT * FROM socios WHERE CODP = '$cod_pesq'";
	
	$resultado_pes = @mysql_query($consulta_pes);
	
	$row_pes = @mysql_fetch_array($resultado_pes);
	
	$endereco     = trim(@$row_pes["RUA"]."  ".@$row_pes["ENDRESID"].", ".@$row_pes["NUMERO"]);
	$cep          = @$row_pes["CEPRES"];
	$bairro       = @$row_pes["BAIRRORES"]; // $linha["BAIRRORES"];
	$cidade       = @$row_pes["CIDADERES"]; // $linha["CIDADERES"];
	$uf           = @$row_pes["CIDADERES"];


}else{


/*
$nudoc        = $linha["id"];
$estado       = "SAO PAULO";
$sacado       = trim($linha["NOME"]);
$cnpj         = $linha["CPF"];
$endereco     = trim($linha["RUA"]).",  ".trim($linha["ENDERECO"]).", ".trim($linha["NUMERO"]);
$cep          = $linha["CEP"];
$bairro       = trim($linha["BAIRRO"]);
$cidade       = "SAO PAULO";
$uf           = "SP";
$nu           = $linha["NU"];
$i_inscri     = $linha["DATINSC"];
*/
}
// Print labels

    $text = sprintf("%s \n %s \n %s \n %s  -  %s  -  %s","$cod_p", $sacado, $endereco, $cep, $bairro, $uf);
    $pdf->Add_Label($text);

}


$conta_pag = $conta_pg++;	
$pdf->Text(190,6, "Pagina.: ".$conta_pag);
        
$pdf->Output();
?>