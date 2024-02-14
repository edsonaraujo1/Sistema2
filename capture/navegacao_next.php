<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Navegacao do Cadastro de Socios
 Criado em Data.....: 30/12/2008
 Ultima Atualização : 30/12/2008

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

//include("../logar.php");

//include("menu.php");

$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// resgata Secao
@session_start();
$Cod_Proximo  = $_SESSION['Prox'];

$id = $Cod_Proximo + 1;

$consulta = "SELECT * FROM socios WHERE id = '". anti_sql_injection($id) ."' ORDER BY id ";
	
// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id1		= @$row["id"];

if (!empty($id1)){
	
$id			= @$row["id"];
$Edit1		= @$row["COD"];
$new_fot    = @$row["CODP"];
$Edit2	    = @$row["NU"];
$Edit3      = Trim(@$row["RGASSOC"]);
$Edit4  	= @$row["CPF"];
$Edit5  	= @$row["DATINSC"];
$Edit6		= @$row["DAT2"];
$Edit7		= @$row["DAT3"];
$Edit8		= @$row["SEDE"];
$Edit9		= @$row["CATEGORIA"];
$Edit10		= @$row["CODEDIF"];
$Edit11		= @$row["NOMEASSOC"];
$Edit12		= @$row["RUA"];
$Edit13 	= @$row["ENDRESID"];
$Edit14		= @$row["NUMERO"];
$Edit15		= @$row["BAIRRORES"];
$Edit16		= @$row["CEPRES"];
$Edit17		= @$row["CIDADERES"];
$Edit18		= @$row["ESTADORES"];
$Edit19		= @$row["TELEFONE"];
$Edit20		= @$row["CARTTRAB"];
$Edit21		= @$row["SERIE"];
$Edit22		= @$row["EMISCART"];
$Edit23		= @$row["CARGOASSOC"];
$Edit24		= @$row["DATADIMIS"];
$Edit25		= @$row["ESTCIVIL"];
$Edit26		= @$row["NUMDEP"];
$Edit27		= @$row["MES"];
$Edit28		= @$row["ANO"];
$Edit29		= @$row["CAD_SI"];
$Edit30		= @$row["SALDO"];
$Edit31		= @$row["PREST"];
$Edit32		= @$row["PAGO"];
$Edit33		= @$row["NATURAL1"];
$Edit34		= @$row["DATNASC"];
$Edit35		= @$row["NASCION"];
$Edit36		= @$row["PAI"];
$Edit37		= @$row["MAE"];
$Edit38		= @$row["CONJUGE"];
$Edit39		= @$row["DATCONJ"];
$Edit40		= @$row["FILHO01"];
$Edit41		= @$row["DAT01"];
$Edit42		= @$row["SEXO01"];
$Edit43		= @$row["FILHO02"];
$Edit44		= @$row["DAT02"];
$Edit45		= @$row["SEXO02"];
$Edit46		= @$row["FILHO03"];
$Edit47		= @$row["DAT03"];
$Edit48		= @$row["SEXO03"];
$Edit49		= @$row["FILHO04"];
$Edit50		= @$row["DAT04"];
$Edit51		= @$row["SEXO04"];
$Edit52		= @$row["FILHO05"];
$Edit53		= @$row["DAT05"];
$Edit54		= @$row["SEXO05"];
$Edit55		= @$row["FILHO06"];
$Edit56		= @$row["DAT06"];
$Edit57		= @$row["SEXO06"];
$Edit58		= @$row["FILHO07"];
$Edit59		= @$row["DAT07"];
$Edit60		= @$row["SEXO07"];
$Edit61		= @$row["FILHO08"];
$Edit62		= @$row["DAT08"];
$Edit63		= @$row["SEXO08"];
$Edit64 	= @$row["FILHO09"];
$Edit65		= @$row["DAT09"];
$Edit66		= @$row["SEXO09"];
$Edit67		= @$row["FILHO10"];
$Edit68		= @$row["DAT10"];
$Edit69		= @$row["SEXO10"];
$Edit70		= @$row["OBS"];
$Edit71	    = @$row["SEXO_SOC"];
$Edit72	    = @$row["ESCOLARIDADE"];

$soma1 = date('Y') - substr($Edit41,6,4);
if ($soma1 >= 18){ $cod_linha1  = 'color:#FF6347'; }else{ $cod_linha1  = 'color:#828282';}

$soma2 = date('Y') - substr($Edit44,6,4);
if ($soma2 >= 18){ $cod_linha2  = 'color:#FF6347'; }else{ $cod_linha2  = 'color:#828282';}

$soma3 = date('Y') - substr($Edit47,6,4);
if ($soma3 >= 18){ $cod_linha3  = 'color:#FF6347'; }else{ $cod_linha3  = 'color:#828282';}

$soma4 = date('Y') - substr($Edit50,6,4);
if ($soma4 >= 18){ $cod_linha4  = 'color:#FF6347'; }else{ $cod_linha4  = 'color:#828282';}
	
$soma5 = date('Y') - substr($Edit53,6,4);
if ($soma5 >= 18){ $cod_linha5  = 'color:#FF6347'; }else{ $cod_linha5  = 'color:#828282';}
	
$soma6 = date('Y') - substr($Edit56,6,4);
if ($soma6 >= 18){ $cod_linha6  = 'color:#FF6347'; }else{ $cod_linha6  = 'color:#828282';}
	
$soma7 = date('Y') - substr($Edit59,6,4);
if ($soma7 >= 18){ $cod_linha7  = 'color:#FF6347'; }else{ $cod_linha7  = 'color:#828282';}
	
$soma8 = date('Y') - substr($Edit62,6,4);
if ($soma8 >= 18){ $cod_linha8  = 'color:#FF6347'; }else{ $cod_linha8  = 'color:#828282';}
	
$soma9 = date('Y') - substr($Edit65,6,4);
if ($soma9 >= 18){ $cod_linha9  = 'color:#FF6347'; }else{ $cod_linha9  = 'color:#828282';}
	
$soma10 = date('Y') - substr($Edit68,6,4);
if ($soma10 >= 18){ $cod_linha10  = 'color:#FF6347'; }else{ $cod_linha10  = 'color:#828282';}

$nome_do_edif	= @$row["CAMPO_EDIF"];
$categ_1  	    = @$row["CAMPO_CATEG"];
$nome_cad_si	= @$row["CAMPO_SIT"];

$log_ssoc	= @$row["LOG_SSOC"];
$hora		= @$row["HORA"];
$sexo		= @$row["SEXO"];
$campo1		= @$row["CAMPO1"];
$campo2		= @$row["CAMPO2"];
$nome_do_edif = "                                                       ";

}else{
	
$id2 = $id + 1;

$consulta = "SELECT * FROM socios WHERE id = '$id2' ORDER BY id ";
	
// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id			= @$row["id"];

// Salva Secao
@session_start();
$_SESSION['Prox'] = $id;

include("navegacao_next.php");
exit;
	
}

$menssagens = "* * * Visualizar * * *";

// Abrir tabela Senha

$tabela_1 = strtoupper('socios');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

// Abrir Table de Edificios

$consulta4  = "SELECT * FROM edificios Where COD = '$Edit10'";

$resultado4 = @mysql_query($consulta4);

$row4 = @mysql_fetch_array($resultado4);

$cod_edif   = @$row4["COD"];
$cond  = trim(@$row4["COND"].@$row4["NOME"]);
$edif  = trim(@$row4["NOME"]);
$nome_do_edif = "  ";   

if (!empty($cod_edif)){
   $nome_do_edif = $cond;
}else{
   $nome_do_edif = "  ";  
}

// Abre Tabela Categoria

$consulta5  = "SELECT * FROM categ Where CODIGO = '$Edit9'";

$resultado5 = @mysql_query($consulta5);

$row5 = @mysql_fetch_array($resultado5);

$cat_nome   = @$row5["DESCRICAO"];
$categ_1    = " ";

if (!empty($cat_nome)){
   $categ_1   = $cat_nome;
	
}else{
   $categ_1   = " ";
	
}

// Abre Tabela Oposicao

$consulta6  = "SELECT * FROM oposicao3 Where RGASSOC = '$Edit3'";

$resultado6 = @mysql_query($consulta6);

$row6 = @mysql_fetch_array($resultado6);

$cod_opo = @$row6["COD"];
$rg_opo  = @$row6["RGASSOC"];

if ($cod_opo != 0){
	?>	
		<script LANGUAGE='JavaScript'>
		<!--
		alert("Socio com carta de OPOSIÇÃO !!!");
		//-->
		</script>
	<?	
	
	}

$consulta7 = "SELECT * FROM tb_segunda WHERE codp = '$new_fot'";
	
$resultado7 = @mysql_query($consulta7);

$row7 = @mysql_fetch_array($resultado7);

$id_9 	   = @$row7["cod_foto"];
$id_imagem = @$row7["id_imagem"];

if(!empty($id_imagem)){
$mostra_branco = "faz";	
}else{
$mostra_branco = "nao";	
}	

// Atualiza Mensalidade

$consulta8  = "SELECT * FROM aberto_soc WHERE CODP = '$new_fot'  ORDER BY ANO ASC, MES ASC";

$resultado8 = @mysql_query($consulta8);

while ($linha = @mysql_fetch_array($resultado8))
{

$mes_y = $linha["MES"];
$ano_y = $linha["ANO"];

$consulta9 = "UPDATE socios SET MES 		= '$Edit27',
                                ANO 		= '$Edit28' WHERE id = '". anti_sql_injection($id) ."'";

@mysql_query($consulta9, $link);

}
// Fim da Consulta

if (!empty($mes_y)){

   $Edit27		= $mes_y;
   $Edit28		= $ano_y;

}

// Salva Secao
@session_start();
$_SESSION['navega'] = $id;
$_SESSION['bole_soc'] = $new_fot;

include("soclayout.php");

?>
