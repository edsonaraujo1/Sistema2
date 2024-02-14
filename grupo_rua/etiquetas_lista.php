<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar Mala direta de Lista Socios em PDF
 Criado em Data.....: 09/12/2009
 Ultima Atualizaчуo : 09/12/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

include('PDF_Label.php');

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = strtoupper($_SESSION["nome_log"]);

// Abre Conexуo com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$nome3_list = strtolower(trim("lista_".$nome3));

$sql  = "SELECT * FROM $nome3_list";

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

$cod_p        = " Att.: Sr(a)";

$nudoc        = $linha["id"];
$estado       = "SAO PAULO";
$sacado       = trim($linha["nome"]);
$cnpj         = $linha["CPF"];
$endereco     = trim($linha["rua"])."  ".trim($linha["endereco"]).", ".trim($linha["numero"]);
$cep          = $linha["cep"];
$bairro       = trim($linha["bairro"]);
$cidade       = "SAO PAULO";
$uf           = $linha["uf"];;


// Print labels

    $text = sprintf("%s \n %s \n %s \n %s  -  %s  -  %s","$cod_p", $sacado, $endereco, $cep, $bairro, $uf);
    $pdf->Add_Label($text);

}


$conta_pag = $conta_pg++;	
$pdf->Text(190,6, "Pagina.: ".$conta_pag);
        
$pdf->Output();
?>