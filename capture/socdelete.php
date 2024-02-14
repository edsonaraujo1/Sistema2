<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Excluir Cadastro Empresa
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include_once('../sql_injection.php');

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_ASOC");

if ($deixar_1 == "NAO"){
	
    echo "  <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			body { background-image: url('../$logo_sis');
                   background-attachment: fixed }
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			

			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** <font color = #FF0000> ERRO ACESSO NÃO PERMITIDO !!!</font> ***<br>
				                     
									 <font face=arial>Usuário sem Permissão</b>
			<table align=center>
			<form method='POST' action='../avaleht.php?servletjs2=20$$20'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>";
	        exit();
}	

$data1 = date("d/m/Y");
$hora  = date("H:i:s");
$log_ssoc = $nome3." em ".$data1; 
?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

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

</body>
</html>

<?

$menssagem = "*** Excluido ***";

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

@mysql_select_db($db)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// retorna uma pesquisa


$consulta0  = "SELECT * FROM socios WHERE id = '". anti_sql_injection($Cod_2) ."'";

$resultado0 = @mysql_query($consulta0);

$row0 = mysql_fetch_array($resultado0);

$id			= trim(strtoupper(retirar_carac(@$row0["id"])));
$Edit1		= trim(strtoupper(retirar_carac(@$row0["COD"])));
$Cod_p      = trim(strtoupper(retirar_carac(@$row0["COD"].@$row0["NU"])));
$Edit2	    = trim(strtoupper(retirar_carac(@$row0["NU"])));
$Edit3      = trim(strtoupper(retirar_carac(@$row0["RGASSOC"])));
$Edit4  	= trim(strtoupper(retirar_carac(@$row0["CPF"])));
$Edit5  	= trim(strtoupper(retirar_carac(@$row0["DATINSC"])));
$Edit6		= trim(strtoupper(retirar_carac(@$row0["DAT2"])));
$Edit7		= trim(strtoupper(retirar_carac(@$row0["DAT3"])));
$Edit8		= trim(strtoupper(retirar_carac(@$row0["SEDE"])));
$Edit9		= trim(strtoupper(retirar_carac(@$row0["CATEGORIA"])));
$Edit10		= trim(strtoupper(retirar_carac(@$row0["CODEDIF"])));
$Edit11		= trim(strtoupper(retirar_carac(@$row0["NOMEASSOC"])));
$Edit12		= trim(strtoupper(retirar_carac(@$row0["RUA"])));
$Edit13 	= trim(strtoupper(retirar_carac(@$row0["ENDRESID"])));
$Edit14		= trim(strtoupper(retirar_carac(@$row0["NUMERO"])));
$Edit15		= trim(strtoupper(retirar_carac(@$row0["BAIRRORES"])));
$Edit16		= trim(strtoupper(retirar_carac(@$row0["CEPRES"])));
$Edit17		= trim(strtoupper(retirar_carac(@$row0["CIDADERES"])));
$Edit18		= trim(strtoupper(retirar_carac(@$row0["ESTADORES"])));
$Edit19		= trim(strtoupper(retirar_carac(@$row0["TELEFONE"])));
$Edit20		= trim(strtoupper(retirar_carac(@$row0["CARTTRAB"])));
$Edit21		= trim(strtoupper(retirar_carac(@$row0["SERIE"])));
$Edit22		= trim(strtoupper(retirar_carac(@$row0["EMISCART"])));
$Edit23		= trim(strtoupper(retirar_carac(@$row0["CARGOASSOC"])));
$Edit24		= trim(strtoupper(retirar_carac(@$row0["DATADIMIS"])));
$Edit25		= trim(strtoupper(retirar_carac(@$row0["ESTCIVIL"])));
$Edit26		= trim(strtoupper(retirar_carac(@$row0["NUMDEP"])));
$Edit27		= trim(strtoupper(retirar_carac(@$row0["MES"])));
$Edit28		= trim(strtoupper(retirar_carac(@$row0["ANO"])));
$Edit29		= trim(strtoupper(retirar_carac(@$row0["CAD_SI"])));
$Edit30		= trim(strtoupper(retirar_carac(@$row0["SALDO"])));
$Edit31		= trim(strtoupper(retirar_carac(@$row0["PREST"])));
$Edit32		= trim(strtoupper(retirar_carac(@$row0["PAGO"])));
$Edit33		= trim(strtoupper(retirar_carac(@$row0["NATURAL1"])));
$Edit34		= trim(strtoupper(retirar_carac(@$row0["DATNASC"])));
$Edit35		= trim(strtoupper(retirar_carac(@$row0["NASCION"])));
$Edit36		= trim(strtoupper(retirar_carac(@$row0["PAI"])));
$Edit37		= trim(strtoupper(retirar_carac(@$row0["MAE"])));
$Edit38		= trim(strtoupper(retirar_carac(@$row0["CONJUGE"])));
$Edit39		= trim(strtoupper(retirar_carac(@$row0["DATCONJ"])));
$Edit40		= trim(strtoupper(retirar_carac(@$row0["FILHO01"])));
$Edit41		= trim(strtoupper(retirar_carac(@$row0["DAT01"])));
$Edit42		= trim(strtoupper(retirar_carac(@$row0["SEXO01"])));
$Edit43		= trim(strtoupper(retirar_carac(@$row0["FILHO02"])));
$Edit44		= trim(strtoupper(retirar_carac(@$row0["DAT02"])));
$Edit45		= trim(strtoupper(retirar_carac(@$row0["SEXO02"])));
$Edit46		= trim(strtoupper(retirar_carac(@$row0["FILHO03"])));
$Edit47		= trim(strtoupper(retirar_carac(@$row0["DAT03"])));
$Edit48		= trim(strtoupper(retirar_carac(@$row0["SEXO03"])));
$Edit49		= trim(strtoupper(retirar_carac(@$row0["FILHO04"])));
$Edit50		= trim(strtoupper(retirar_carac(@$row0["DAT04"])));
$Edit51		= trim(strtoupper(retirar_carac(@$row0["SEXO04"])));
$Edit52		= trim(strtoupper(retirar_carac(@$row0["FILHO05"])));
$Edit53		= trim(strtoupper(retirar_carac(@$row0["DAT05"])));
$Edit54		= trim(strtoupper(retirar_carac(@$row0["SEXO05"])));
$Edit55		= trim(strtoupper(retirar_carac(@$row0["FILHO06"])));
$Edit56		= trim(strtoupper(retirar_carac(@$row0["DAT06"])));
$Edit57		= trim(strtoupper(retirar_carac(@$row0["SEXO06"])));
$Edit58		= trim(strtoupper(retirar_carac(@$row0["FILHO07"])));
$Edit59		= trim(strtoupper(retirar_carac(@$row0["DAT07"])));
$Edit60		= trim(strtoupper(retirar_carac(@$row0["SEXO07"])));
$Edit61		= trim(strtoupper(retirar_carac(@$row0["FILHO08"])));
$Edit62		= trim(strtoupper(retirar_carac(@$row0["DAT08"])));
$Edit63		= trim(strtoupper(retirar_carac(@$row0["SEXO08"])));
$Edit64 	= trim(strtoupper(retirar_carac(@$row0["FILHO09"])));
$Edit65		= trim(strtoupper(retirar_carac(@$row0["DAT09"])));
$Edit66		= trim(strtoupper(retirar_carac(@$row0["SEXO09"])));
$Edit67		= trim(strtoupper(retirar_carac(@$row0["FILHO10"])));
$Edit68		= trim(strtoupper(retirar_carac(@$row0["DAT10"])));
$Edit69		= trim(strtoupper(retirar_carac(@$row0["SEXO10"])));
$Edit70		= trim(strtoupper(retirar_carac(@$row0["OBS"])));
$Edit71	    = trim(strtoupper(retirar_carac(@$row0["SEXO_SOC"])));
$Edit72	    = trim(strtoupper(retirar_carac(@$row0["ESCOLARIDADE"])));

if(strlen($Edit10)<=0){
  $Edit10 = 0;
}
if(strlen($Edit26)<=0){
  $Edit26 = 0;	
}
if(strlen($Edit27)<=0){
  $Edit27   = 0; 	
}
if(strlen($Edit27)<=0){
  $Edit27   = 0; 	
}
if(strlen($Edit28)<=0){
  $Edit28   = 0; 	
}
if(strlen($Edit28)<=0){
  $Edit28   = 0; 	
}
if(strlen($Edit30)<=0){
  $Edit30 = 0.00; 	
}
if(strlen($Edit31)<=0){
  $Edit31 = 0; 	
}
if(strlen($Edit32)<=0){
  $Edit32  = 0.00; 	
}

$date_1 = date("d/m/Y")."-".date("H:i:s");

// Salva Registro excluido em tabela temporaria
$consulta1 = "INSERT INTO socios_excluido ( COD,
											NU,
											CODP,
											RGASSOC,
											CPF,
											DATINSC,
											DAT2,
											DAT3,
											SEDE,
											CATEGORIA,
											CODEDIF,
											NOMEASSOC,
											RUA,
											ENDRESID,
											NUMERO,
											BAIRRORES,
											CEPRES,
											CIDADERES,
											ESTADORES,
											TELEFONE,
											CARTTRAB,
											SERIE,
											EMISCART,
											CARGOASSOC,
											DATADIMIS,
											ESTCIVIL,
											NUMDEP,
											MES,
											ANO,
											CAD_SI,
											SALDO,
											PREST,
											PAGO,
											NATURAL1,
											DATNASC,
											NASCION,
											PAI,
											MAE,
											CONJUGE,
											DATCONJ,
											FILHO01,
											DAT01,
											SEXO01,
											FILHO02,
											DAT02,
											SEXO02,
											FILHO03,
											DAT03,
											SEXO03,
											FILHO04,
											DAT04,
											SEXO04,
											FILHO05,
											DAT05,
											SEXO05,
											FILHO06,
											DAT06,
											SEXO06,
											FILHO07,
											DAT07,
											SEXO07,
											FILHO08,
											DAT08,
											SEXO08,
											FILHO09,
											DAT09,
											SEXO09,
											FILHO10,
											DAT10,
											SEXO10,
											OBS,
											CAMPO_EDIF,
											CAMPO_CATEG,
											CAMPO_SIT,
											LOG_SSOC,
											HORA,
											SEXO_SOC,
											ESCOLARIDADE)
		 
		 
		VALUES ('$Edit1',
				'$Edit2',
				'$Cod_p',
				'$Edit3',
				'$Edit4',
				'$Edit5',
				'$Edit6',      
				'$Edit7',      
				'$Edit8',
				'$Edit9',
				'$Edit10',    
				'$Edit11',
				'$Edit12',        
				'$Edit13',
				'$Edit14',
				'$Edit15',     
				'$Edit16',        
				'$Edit17',     
				'$Edit18',         
				'$Edit19',
				'$Edit20',       
				'$Edit21',      
				'$Edit22',    
				'$Edit23',     
				'$Edit24',   
				'$Edit25',      
				'$Edit26', 
				'$Edit27',        
				'$Edit28',
				'$Edit29',
				'$Edit30',
				'$Edit31',
				'$Edit32',
				'$Edit34',
				'$Edit33',
				'$Edit35',  
				'$Edit36',        
				'$Edit37',
				'$Edit38',   
				'$Edit39',    
				'$Edit40',     
				'$Edit41',     
				'$Edit42',
				'$Edit43',     
				'$Edit44',     
				'$Edit45',
				'$Edit46',     
				'$Edit47',     
				'$Edit48',
				'$Edit49',     
				'$Edit50',     
				'$Edit51',
				'$Edit52',     
				'$Edit53',     
				'$Edit54',
				'$Edit55',     
				'$Edit56',     
				'$Edit57',
				'$Edit58',     
				'$Edit59',     
				'$Edit60',
				'$Edit61',     
				'$Edit62',     
				'$Edit63',
				'$Edit64',     
				'$Edit65',     
				'$Edit66',
				'$Edit67',    
				'$Edit68',     
				'$Edit69',
				'$Edit70',
				'$nome_do_edif',
				'$categ_1',
				'$nome_cad_si',
				'$log_ssoc',
				'$hora',
				'$Edit71',
				'$Edit72')";
		
@mysql_query($consulta1, $link)

or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** ERRO ao excluir os Dados !!! ***</b>
     <table align=center>
     <form method='POST' action='cadsocios.php?cod_3=$Cod_2'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

$Cod_p = Trim($Edit1.$Edit2);

$consulta2 = "DELETE FROM socios WHERE id = '". anti_sql_injection($Cod_2) ."'";

@mysql_query($consulta2, $link);

// Apaga Foto
//$consulta2_fot = "DELETE FROM tb_segunda WHERE codp = '". anti_sql_injection($Cod_p) ."'";

//@mysql_query($consulta2_fot, $link);


$sql0 = 'ALTER TABLE `socios` ORDER BY `COD`';
$res0 = mysql_query($sql0);

$sql1 = 'ALTER TABLE `socios` DROP `id`';
$res1 = mysql_query($sql1);

$sql2 = 'ALTER TABLE `socios` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res2 = mysql_query($sql2);



$consulta4  = "SELECT * FROM socios ORDER BY COD ASC LIMIT 0,50";

$resultado4 = @mysql_query($consulta4);

$row4 = @mysql_fetch_array($resultado4);

$id			= @$row4["id"];
$Edit1		= @$row4["COD"];
$Edit2	    = @$row4["NU"];
$Edit3      = Trim(@$row4["RGASSOC"]);
$Edit4  	= @$row4["CPF"];
$Edit5  	= @$row4["DATINSC"];
$Edit6		= @$row4["DAT2"];
$Edit7		= @$row4["DAT3"];
$Edit8		= @$row4["SEDE"];
$Edit9		= @$row4["CATEGORIA"];
$Edit10		= @$row4["CODEDIF"];
$Edit11		= @$row4["NOMEASSOC"];
$Edit12		= @$row4["RUA"];
$Edit13 	= @$row4["ENDRESID"];
$Edit14		= @$row4["NUMERO"];
$Edit15		= @$row4["BAIRRORES"];
$Edit16		= @$row4["CEPRES"];
$Edit17		= @$row4["CIDADERES"];
$Edit18		= @$row4["ESTADORES"];
$Edit19		= @$row4["TELEFONE"];
$Edit20		= @$row4["CARTTRAB"];
$Edit21		= @$row4["SERIE"];
$Edit22		= @$row4["EMISCART"];
$Edit23		= @$row4["CARGOASSOC"];
$Edit24		= @$row4["DATADIMIS"];
$Edit25		= @$row4["ESTCIVIL"];
$Edit26		= @$row4["NUMDEP"];
$Edit27		= @$row4["MES"];
$Edit28		= @$row4["ANO"];
$Edit29		= @$row4["CAD_SI"];
$Edit30		= @$row4["SALDO"];
$Edit31		= @$row4["PREST"];
$Edit32		= @$row4["PAGO"];
$Edit33		= @$row4["CRIACAO"];
$Edit34		= @$row4["DATNASC"];
$Edit35		= @$row4["NASCION"];
$Edit36		= @$row4["PAI"];
$Edit37		= @$row4["MAE"];
$Edit38		= @$row4["CONJUGE"];
$Edit39		= @$row4["DATCONJ"];
$Edit40		= @$row4["FILHO01"];
$Edit41		= @$row4["DAT01"];
$Edit42		= @$row4["SEXO01"];
$Edit43		= @$row4["FILHO02"];
$Edit44		= @$row4["DAT02"];
$Edit45		= @$row4["SEXO02"];
$Edit46		= @$row4["FILHO03"];
$Edit47		= @$row4["DAT03"];
$Edit48		= @$row4["SEXO03"];
$Edit49		= @$row4["FILHO04"];
$Edit50		= @$row4["DAT04"];
$Edit51		= @$row4["SEXO04"];
$Edit52		= @$row4["FILHO05"];
$Edit53		= @$row4["DAT05"];
$Edit54		= @$row4["SEXO05"];
$Edit55		= @$row4["FILHO06"];
$Edit56		= @$row4["DAT06"];
$Edit57		= @$row4["SEXO06"];
$Edit58		= @$row4["FILHO07"];
$Edit59		= @$row4["DAT07"];
$Edit60		= @$row4["SEXO07"];
$Edit61		= @$row4["FILHO08"];
$Edit62		= @$row4["DAT08"];
$Edit63		= @$row4["SEXO08"];
$Edit64 	= @$row4["FILHO09"];
$Edit65		= @$row4["DAT09"];
$Edit66		= @$row4["SEXO09"];
$Edit67		= @$row4["FILHO10"];
$Edit68		= @$row4["DAT10"];
$Edit69		= @$row4["SEXO10"];
$Edit70		= @$row4["OBS"];
$Edit71		= @$row4["SEXO_SOC"];
$Edit72		= @$row4["ESCOLARIDADE"];

// Abrir tabela Senha

$tabela_1 = strtoupper('socios');

$consulta5 = "SELECT * FROM permissoes WHERE login = '". anti_sql_injection($nome3) ."' and tabela = '". anti_sql_injection($tabela_1) ."'";

$resultado5 = @mysql_query($consulta5);

$row5 = @mysql_fetch_array($resultado5);

$per1       = @$row5["incluir"];
$per2       = @$row5["alterar"];
$per3       = @$row5["excluir"];
$per4       = @$row5["imprimir"];

// Abrir Table de Edificios

$consulta6  = "SELECT * FROM edificios Where COD = '". anti_sql_injection($Edit10) ."'";

$resultado6 = @mysql_query($consulta6);

$row6 = @mysql_fetch_array($resultado6);

$cod_edif   = @$row6["COD"];
$cond  = trim(@$row6["COND"].@$row6["NOME"]);
$edif  = trim(@$row6["NOME"]);

$nome_do_edif = $cond;

// Abre Tabela Categoria

$consulta7  = "SELECT * FROM categ Where CODIGO = '". anti_sql_injection($Edit9) ."'";

$resultado7 = @mysql_query($consulta7);

$row7 = @mysql_fetch_array($resultado7);

$categ_1   = @$row7["DESCRICAO"];


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagem."/".$Cod_2;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);

?>

<html>
<head>
<title><?=$Titulo;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<style type="text/css" media="print">
div.invisivel {
visibility: hidden; 
}
</style>
<script src="script.js"></script>
</head>

<body>

<script language='javascript'>

if (!document.layers)

document.write('<div id="fixacam" style="position:absolute; background:#ffffff; bordercolordark:#4682B4; width:100px; height:50px; font:10pt Tahoma; color:#666666" align="Right">'  )

</script>

<layers id="fixacam"> 

	<a rel="home" class="home" href="javascript:janelaSecundaria('propostasocios.php?Cod_2=<?=$id;?>')">
	<img alt="Proposta" src="../imagens/botaoazul18.PNG" border="0"/></a>
	
	<a rel="home" class="home" href="javascript:janelaSecundaria('soccarteira.php?Cod_2=<?=$id;?>')">
	<img alt="Carteira" src="../imagens/botaoazul19.PNG" border="0"/></a>

<?

if (!empty($Acao)){
	// OK
}else{
	$Acao = ""; 
}

?>
	<a rel="home" class="home" href="soclis_grid.php?Cod_2=<?=$id;?>">
	<img alt="lista" src="../imagens/botaoazul3.PNG" border="0"/></a>

<?
if ($per3 == "SIM"){
?>

	<a rel="home" class="home" href="socexcluir.php?Cod_2=<?=$Edit1;?><?=$Edit2;?>">
	<img alt="Excluir" src="../imagens/botaoazul4.PNG" border="0"/></a>


<?
}

if ($per2 == "SIM"){
?>

	<a rel="home" class="home" href="socalterar.php?Cod_2=<?=Trim($Edit1).Trim($Edit2);?>">
	<img alt="Alterar" src="../imagens/botaoazul5.PNG" border="0"/></a>


<?
}

if ($per1 == "SIM"){
?>

	<a rel="home" class="home" href="socincluir.php">
	<img alt="Incluir" src="../imagens/botaoazul6.PNG" border="0"/></a>


<?
}
?>

	<a rel="home" class="home" href="sociosconsulta.php">
	<img alt="Consultar" src="../imagens/botaoazul7.PNG" border="0"/></a>
	
	<a rel="home" class="home" href="sochistorico.php?Cod_2=<?=$Edit1;?><?=$Edit2;?>">
	<img alt="Historico" src="../imagens/botaoazul37.PNG" border="0"/></a>

	<a rel="home" class="home" href="<?=$path;?>ts2.php" target="new">
	<img alt="Debitos" src="../imagens/botaoazul38.PNG" border="0"/></a>
	
	<a rel="home" class="home" href="aberto_soc.php?Cod_2=<?=$Edit1;?><?=$Edit2;?>">
	<img alt="Mansalidade" src="../imagens/botaoazul28.PNG" border="0"/></a>

	<a rel="home" class="home" href="Javascript:Inicio(<?=$Edit1;?>)">
	<img alt="Inicio" src="../imagens/botaobranco35.PNG" border="0"/></a>

	<a rel="home" class="home" href="Javascript:Anterior(<?=$id-1;?>)">
	<img alt="Anterior" src="../imagens/botaoazul31.PNG" border="0"/></a>

	<a rel="home" class="home" href="Javascript:Proximo(<?=$id+1;?>);">
	<img alt="Proximo" src="../imagens/botaoazul30.PNG" border="0"/></a>

	<a rel="home" class="home" href="Javascript:Fim(<?=$id;?>)">
	<img alt="Fim" src="../imagens/botaobranco36.PNG" border="0"/></a>
	
	<a rel="home" class="home" href="<?=$path;?>avaleht.php?servletjs2=20$$20">
	<img alt="Fechar" src="../imagens/botaoazul24.PNG" border="0"/></a>

    <a rel="home" class="home" href="<?=$website;?>" align="center" target="new"><b>Web Site&nbsp;&nbsp;&nbsp;&nbsp;</b></a> 

</layers>

<script type="text/javascript">
var posvertical="rodape"
if (!document.layers)
document.write('</div>')
function menufloat(){
var startX = 3,
startY = 390; // antes era 67
var ns = (navigator.appName.indexOf("Netscape") != -1);
var d = document;
function ml(id){
var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
if(d.layers)el.style=el;
el.sP=function(x,y){this.style.left=x;this.style.top=y;};
el.x = startX;
if (posvertical=="rodape")
el.y = startY;
else{
el.y = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
el.y -= startY;
}
return el;
}
window.stayTopLeft=function(){
if (posvertical=="topo"){
var pY = ns ? pageYOffset : document.body.scrollTop;
ftlObj.y += (pY + startY - ftlObj.y)/8;
}
else{
var pY = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
ftlObj.y += (pY - startY - ftlObj.y)/8;
}
ftlObj.sP(ftlObj.x, ftlObj.y);
setTimeout("stayTopLeft()", 10);
}
ftlObj = ml("fixacam");
stayTopLeft();
}
menufloat();
</script>

<?
include("soclayout.php");
?>

<tr><td><!-- AQUI SERÁ APRESENTADO O RESULTADO DA BUSCA DINÂMICA.. OU SEJA OS NOMES -->
<div id="pagina" class="invisivel"></div></td></tr>
</body>
</html>

<?

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac($var){

$var = ereg_replace("[ÁÀÂÃ]",        "A",$var);
$var = ereg_replace("[áàâãª]",       "a",$var);
$var = ereg_replace("[ÉÈÊ]",         "E",$var);
$var = ereg_replace("[éèê]",         "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",        "O",$var);
$var = ereg_replace("[óòôõº]",       "o",$var);
$var = ereg_replace("[ÚÙÛ]",         "U",$var);
$var = ereg_replace("[úùû]",         "u",$var);
$var = ereg_replace("[?*#'´`!$%¨]",  " ",$var);
$var = str_replace("Ç",              "C",$var);
$var = str_replace("ç",              "c",$var);
$var = str_replace("\\",             " ",$var);
$var = str_replace(" or ",           " ",$var);
$var = str_replace("select ",        " ",$var);
$var = str_replace("delete ",        " ",$var);
$var = str_replace("create ",        " ",$var);
$var = str_replace("drop ",          " ",$var);
$var = str_replace("update ",        " ",$var);
$var = str_replace("drop table",     " ",$var);
$var = str_replace("show table",     " ",$var);
$var = str_replace("applet",         " ",$var);
$var = str_replace("objetc",         " ",$var);
$var = str_replace("where",          " ",$var);

return($var);
}

?>
