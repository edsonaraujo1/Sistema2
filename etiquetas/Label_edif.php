<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar Mala direta de Socios em PDF
 Criado em Data.....: 09/12/2009
 Ultima Atualiza��o : 09/12/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

include('PDF_Label.php');

// Example of custom format
// $pdf = new PDF_Label(array('paper-size'=>'A4', 'metric'=>'mm', 'marginLeft'=>1, 'marginTop'=>1, 'NX'=>2, 'NY'=>7, 'SpaceX'=>0, 'SpaceY'=>0, 'width'=>99, 'height'=>38, 'font-size'=>14));

// Abre Conex�o com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$sql  = "SELECT * FROM etiquetas_edif ORDER BY COD";

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
//$cod_p        = " Att.: Sr(a)";
$cod_p        = "                                                                                              ".$linha["COD"];

$nudoc        = $linha["COD"];
$estado       = $linha["UF"];
$sacado       = $linha["COND"]." ".$linha["NOME"];
$cnpj         = $linha["CPF"];
$endereco     = abreviar($linha["RUA"]."  ".$linha["ENDERECO"].", ".$linha["NUMERO"]);
$cep          = $linha["CEP"];
$bairro       = $linha["BAIRRO"];
$cidade       = $linha["CIDADE"];
$uf           = $linha["UF"];
$nu           = $linha["NU"];
$i_inscri     = $linha["DATINSC"];


// Print labels

    $text = sprintf("%s \n %s \n %s \n %s  -  %s  -  %s","$cod_p", $sacado, $endereco, $cep, $cidade, $uf);
    $pdf->Add_Label($text);

}


$conta_pag = $conta_pg++;	
$pdf->Text(190,6, "Pagina.: ".$conta_pag);
        
$pdf->Output();


Function abreviar($var){

$var = ereg_replace("AVENIDA",       "AV.",$var);
$var = ereg_replace("RUA",           "R.",$var);
$var = ereg_replace("PRACA",         "PCA.",$var);
$var = ereg_replace("LARGO",         "LG.",$var);
$var = ereg_replace("DOUTOR",        "DR.",$var);
$var = ereg_replace("ENGENHEIRO",    "ENG.",$var);
$var = ereg_replace("VILA",          "VL.",$var);

return($var);
}

?>