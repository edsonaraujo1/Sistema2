<?
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: configuracao visual do Sistema
 Criado em Data.....: 07/12/2007
 Ultima Atualizaчуo : 07/12/2007 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/

//$path        = "http://localhost/MySQL/"; // Local
$path        = "../"; // Local

if (file_exists("config.txt"))
{
	
	$cria   = fopen("config.txt", "a+");
	
	$linha  = file("config.txt");
	
}
else
{
	
	$cria   = fopen($path."config.txt", "a+");
	
	$linha  = file($path."config.txt");

}


$total  = count($linha);
for ($i = "0"; $i < $total; $i++){
     list($dado1,$dado2,$dado3,$dado4,$dado5,$dado6,$dado7,$dado8,$dado9) = explode(";",$linha[$i]);
}

$website     = $dado1;
$cpfwebsite  = $dado2;
$atuali_za   = $dado3;
$criado_za   = $dado4;
$logo_sis    = $dado5; 
$Titulo      = $dado6;
$cnpj_sis    = $dado7;
$logo1_sis   = $dado8;
$logo2_sis   = $dado9;

session_start();
unset ($_SESSION['Path1']);

// salva Secao
session_name("Path");
session_start();
$_SESSION['Path1'] = $path;

//$website    = "http://www.sindificios.com.br/index.htm";
//$cpfwebsite = "http://www.receita.fazenda.gov.br/Aplicacoes/ATCTA/cpf/ConsultaPublica.asp";
//$atuali_za  = "01/04/2008 рs 19:10";
//$criado_za  = "07/08/2007 рs 15:32";
//$logo_sis   = "imagens/logo2.PNG"; 
//$Titulo     = "Sindificios - Sind. Empreg. Edif. SP";
//$cnpj_sis   = "43.070.481/0001-14";
//$logo1_sis  = "imagens/Logo1.JPG";
//$logo2_sis  = "imagens/Logo_oficio4.bmp";

//define("logo_sis", "$logo_sis");

?>