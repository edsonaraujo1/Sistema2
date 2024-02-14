<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar Mala direta de Socios em PDF
 Criado em Data.....: 09/12/2009
 Ultima Atualização : 09/12/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

include('PDF_Label.php');

// Example of custom format
// $pdf = new PDF_Label(array('paper-size'=>'A4', 'metric'=>'mm', 'marginLeft'=>1, 'marginTop'=>1, 'NX'=>2, 'NY'=>7, 'SpaceX'=>0, 'SpaceY'=>0, 'width'=>99, 'height'=>38, 'font-size'=>14));

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$sql  = "SELECT * FROM etiquetas_adms";

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

$id         = $linha["id"];
$nudoc      = colocaZeroEsquerda($linha["cod"],5);
$sacado     = trim(substr($linha["nomeadm"],0,42));
$endereco   = trim($linha["rua"])." ".trim(substr($linha["endadm"],0,34)).", ".trim($linha["numero"]);
$cep        = $linha["cep"];
$bairro     = trim($linha["bairroadm"]);
$uf         = trim($linha["ufadm"]); 
$cidade     = trim($linha["cidadm"]);

$cod_p      = " ".$nudoc;
// Print labels

    $text = sprintf("%s \n %s \n %s \n %s  -  %s  -  %s","$cod_p", $sacado, $endereco, $cep, $bairro, $uf);
    $pdf->Add_Label($text);

}


$conta_pag = $conta_pg++;	
$pdf->Text(190,6, "Pagina.: ".$conta_pag);
        
$pdf->Output();

function colocaZeroEsquerda($X, $digitos){
	$zeros = $digitos - strlen($X);
	for($i=0;$i<$zeros;$i++){	$x .= 0;	}
	$X = $x.$X;
	return $X;
}

?>