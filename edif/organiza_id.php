<?
/*
 ----------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar Link de Boletos Sindical
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/04/2009 

 DEUS SEJA LOUVADO
 ----------------------------------------------------
*/

include('../config.php');

	$for_adms        = $for_adms;
	$Edit2_tipo      = $Edit2_tipo;
	$vencto1         = $vencto1;
	$cod_intru       = $cod_intru;
	$cod_edif1       = $cod_edif1;
	$Email_sn        = $Email_sn;
	$id_conf_2       = $id_conf_2;
	$Edit8_sei       = $Edit8_sei;
	$nome_adm        = $nome_adm;
	$exer            = substr($vencto1,6,4);
	$exec            = substr($vencto1,6,4);
	$men_digitada2   = $men_digitada2;

@session_start();

$_SESSION['Edit1e']     = $for_adms;
$_SESSION['Edit2e']     = $Edit2_tipo;
$_SESSION['Edit3e']     = $vencto1;
$_SESSION['Edit4e']     = $cod_intru;
$_SESSION['Edit5e']     = $cod_edif1;
$_SESSION['Edit6e']     = $Email_sn;
$_SESSION['Edit7e']     = $id_conf_2;
$_SESSION['Edit8e']     = $Edit8_sei;
$_SESSION['Edit9e']     = $nome_adm;
$_SESSION['Edit10e']    = $valor1;
$_SESSION['Edit11e']    = $men_digitada2;
$_SESSION['Edit12e']    = $email;


/*
    echo $vencto."<br>";
	echo $nudoc."<br>";
	echo $sacado."<br>";
	echo $CNPJ."<br>";
	echo $endereco."<br>";
	echo $bairro."<br>";
	echo $cidade."<br>";
	echo $cep."<br>";
	echo $estado."<br>";
	echo $valor1."<br>";
	echo $cod_intru."<br>";
	echo $tipo."<br>";
	echo $men_digitada2."<br>";
*/

?>

<html>
<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<script src="XHConn.js"></script>
<script src="aguarde.js"></script>
<link rel="shortcut icon" href="favicon.ico"/>
</head>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 

<body>
<div style='Z-INDEX: 34; LEFT: -5px; WIDTH: 544px; POSITION: absolute; TOP: 25px; HEIGHT: 80px'>
<div id="include" align="center">

</div>
</div>
</body>
</html>
<script>
incluir('user_mail');
</script>
