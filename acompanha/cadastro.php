<?php
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

unset ($_SESSION['Faz_uma']);

$nome3 = $_SESSION["nome_log"];

// include("../logar.php");

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("FORM_ACOMPA");

if ($deixar == "SIM"){

// Resgata a Sessao
session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
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

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
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

if (strlen($cod_1) > 0){
	
   $consulta  = "SELECT * FROM acompa WHERE id = '$cod_1'";

}else{

   $consulta  = "SELECT * FROM acompa ORDER BY id ASC LIMIT 0,50";
	
}
if (!empty($Cod_xx)){
	
   $consulta  = "SELECT * FROM acompa WHERE id = '$Cod_xx'";
	
}

if (!empty($cod_3)){
	
   $consulta  = "SELECT * FROM acompa WHERE id = '$cod_3'";
	
}

if (!empty($cod_5)){
	
   $consulta  = "SELECT * FROM acompa WHERE id = '$cod_5'";
	
}

if (!empty($cod_6)){
	
   $consulta  = "SELECT * FROM acompa WHERE PROC_N LIKE '$cod_6' AND RG LIKE '$cod_7'";
	
}

// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id     = @$row["id"];
$Edit1  = @$row["N_SOCIO"];
$Edit2  = @$row["RG"];
$Edit3  = @$row["CIC"];
$Edit4  = @$row["CART_TRAB"];
$Edit5  = @$row["NOME_SOC"];
$Edit6  = @$row["END_SOC"];
$Edit7  = @$row["CEP_SOC"];
$Edit8  = @$row["EST_SOC"];
$Edit9  = @$row["FONE_SOC"];
$Edit10 = @$row["N_EDIF"];
$Edit11 = @$row["NOME_EDI"];
$Edit12 = @$row["END_EDI"];
$Edit13 = @$row["CEP_EDI"];
$Edit14 = @$row["FONE_EDI"];
$Edit15 = @$row["OBJETO"];
$Edit16 = @$row["JCJ"];
$Edit17 = @$row["PROC_N"];
$Edit18 = @$row["ANO_N"];
$Edit19 = @$row["N_ADV_1"];
$Edit20 = @$row["TRT"];
$Edit21 = @$row["EM_TRT"];
$Edit22 = @$row["NO_AD_1"];
$Edit23 = @$row["TST"];
$Edit24 = @$row["EM_TST"];
$Edit25 = @$row["N_ADV_2"];
$Edit26 = @$row["SOLUCAO"];
$Edit27 = @$row["SOL_EM"];
$Edit28 = @$row["NO_AD_2"];
$Edit29 = @$row["ASSUNTO"];
$Edit30 = @$row["ASSU_1"];

$nome_adm  = @$row["CAMPO_ADM"];

$menssagens = "* * * Visualizar * * *";

// Salva Secao
session_start();
$_SESSION['navega'] = $id;
$_SESSION['lista_soc'] = $Edit1;

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$aco1       = @$row3["aco1"];
$aco2       = @$row3["aco2"];
$aco3       = @$row3["aco3"];

// Salva Secao
session_start();
$id1 = $_SESSION['navega'];

if (!empty($id1)){
	$id1 = $_SESSION['navega'];
}else{
	$id1 = $id;
}	
$_SESSION['tipo_acao'] = "alterar_1";
?>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<style type="text/css" media="print">
div.invisivel {
visibility: hidden; 
}
</style>
<script src="script.js"></script>
</head>

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);
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

<div style="Z-INDEX: 500; LEFT: 00px; WIDTH: 616px; POSITION: absolute; TOP: 157px; HEIGHT: 19px">

<IFRAME src="../info/informes2.php" width="1" height="1" scrolling="no" frameborder="0" align="left"></IFRAME>

</div>

<?php
include("help.php");
include("botoes.php");
include("layout.php");
?>
<tr><td><!-- AQUI SERÁ APRESENTADO O RESULTADO DA BUSCA DINÂMICA.. OU SEJA OS NOMES -->
<div id="pagina" class="invisivel"></div></td></tr>
</body>
</html>
<?php
}else{
	
include("enaaurlnp.php");
	
}
?>
