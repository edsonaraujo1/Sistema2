<?php
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Mensagem de Erro na Tela
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
@session_start();

$website	= $_SESSION['website'];
$cpfwebsite = $_SESSION['cpfwebsite'];
$atuali_za  = $_SESSION['atuali_za'];
$criado_za  = $_SESSION['criado_za'];
$logo_sis   = $_SESSION['logo_sis'];
$Titulo     = $_SESSION['Titulo'];
$cnpj_sis   = $_SESSION['cnpj_sis'];
$logo1_sis  = $_SESSION['logo1_sis'];
$logo2_sis  = $_SESSION['logo2_sis'];
$color_bor  = $_SESSION['color_bor'];
$versao_1   = $_SESSION['versao_1'];
$color_menu = $_SESSION['color_menu'];

//include("config.php");

define("logo_sis", "$logo_sis");

if (!empty($criado_za)){

?>

<html>
			<head>
			<title>ERRO DE TELA</title>
			<link rel="shortcut icon" href="favicon.ico"/>
			</head>
						
			<style type=text/css>
			
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 background="<?php echo $logo_sis ?>">
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='<?php echo $color_bor ?>'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** ERRO NA RESOLUÇÃO DA TELA TAMANHO IDEAL !! ***<br>
				                     1024 x 768 POR FAVOR MUDE PARA 1024 X 768         <br>
									                  OBRIGADO !!</b>
			<table align=center>
			<form method='POST' action='index.php'>
			<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
			</form> 
			</table>
			</td>
			</tr>
			</table>
			</div>
</body>
</html>			
<?php
}else{

header('Location:index.php');

	
}
?>