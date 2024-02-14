<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Cadastro de Modelo
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 22/09/2010 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

unset ($_SESSION['Faz_uma']);

$nome3 = addslashes($_SESSION["nome_log"]);

include("../logar.php");

include("menu.php");

include_once('../sql_injection.php');

include("vaurls.php");

$deixar = acesso_url("FORM_EDIF");

if ($deixar == "SIM"){

// Resgata a Sessao
@session_start();
$Procura = addslashes(strtoupper($_SESSION['Procura']));
$Opcao   = addslashes(strtoupper($_SESSION['Opcao']));

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

if (strlen($cod_1) > 0){
	
   $consulta  = "SELECT * FROM edificios WHERE id = '". anti_sql_injection($cod_1) ."'";

}else{

   $consulta  = "SELECT * FROM edificios ORDER BY id ASC LIMIT 0,50";
	
}
if (!empty($Cod_xx)){
	
   $consulta  = "SELECT * FROM edificios WHERE id = '". anti_sql_injection($Cod_xx) ."'";
	
}

if (!empty($cod_3)){
	
   $consulta  = "SELECT * FROM edificios WHERE id = '". anti_sql_injection($cod_3) ."'";
	
}

if (!empty($cod_5)){
	
   $consulta  = "SELECT * FROM edificios WHERE COD = '". anti_sql_injection($cod_5) ."'";
	
}

// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id      = @$row["id"];
$Edit1   = @$row["COD"];
$Edit2   = @$row["ATIV"];
$Edit3   = @$row["DATA"];
$Edit4   = @$row["COND"];
$Edit5   = @$row["NOME"];
$Edit6   = @$row["RUA"];
$Edit7   = @$row["ENDERECO"];
$Edit8   = @$row["NUMERO"];
$Edit9   = @$row["CEP"];
$Edit10  = @$row["BAIRRO"];
$Edit11  = @$row["UF"]; 
$Edit12  = @$row["CGC"];
$Edit13  = @$row["FONE"];
$Edit14  = @$row["NU_EMP"];
$Edit15  = @$row["TIPOIMOV"];
$Edit16  = @$row["ZONA"];
$Edit17  = @$row["EMAIL"];
$Edit18  = @$row["T_MAIL"];
$Edit19  = @$row["ADM"];
$Edit20  = @$row["OBS"];

$nome_adm2  = @$row["CAMPO_ADM"];

$menssagens = "* * * Visualizar * * *";

// Salva Secao
@session_start();
$_SESSION['navega'] = $id;
$_SESSION['lista_soc'] = $Edit1;

// Abrir tabela Senha

$tabela_1 = strtoupper('edificios');

$consulta3 = "SELECT * FROM permissoes WHERE login = '". anti_sql_injection($nome3) ."' and tabela = '". anti_sql_injection($tabela_1) ."'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];


// Abrir tabela Administradora

$consulta2 = "SELECT * FROM adms Where cod = '". anti_sql_injection($Edit19) ."'";

$resultado2 = @mysql_query($consulta2);

$row2 = @mysql_fetch_array($resultado2);

$cod_adm      = @$row2["cod"];
$nome_adm     = @$row2["nomeadm"];

if (empty($cod_adm)){
	
	$nome_adm = $nome_adm2;
}

// Conta Nº de Socios 
$consulta4  = "SELECT * FROM socios WHERE CODEDIF = '". anti_sql_injection($Edit1) ."'";

$resultado4 = @mysql_query($consulta4);

while ($linha4 = @mysql_fetch_array($resultado4))
{
  $cop = $cop + 1;

}

$Edit14 = $cop;


// Salva Secao
@session_start();
$id1 = addslashes($_SESSION['navega']);

if (!empty($id1)){
	$id1 = addslashes($_SESSION['navega']);
}else{
	$id1 = addslashes($id);
}	
$_SESSION['tipo_acao'] = "alterar_1";
?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-UTF-8"/>
<style type="text/css" media="print">
div.invisivel {
visibility: hidden; 
}
</style>
<script src="script.js"></script>
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

<div style="Z-INDEX: 500; LEFT: 00px; WIDTH: 616px; POSITION: absolute; TOP: 157px; HEIGHT: 19px">

<IFRAME src="../info/informes2.php" width="1" height="1" scrolling="no" frameborder="0" align="left"></IFRAME>

</div>

<?
include("help.php");
include("botoes.php");
include("layout.php");
?>
<tr><td><!-- AQUI SERÁ APRESENTADO O RESULTADO DA BUSCA DINÂMICA.. OU SEJA OS NOMES -->
<div id="pagina" class="invisivel"></div></td></tr>
</body>
</html>
<?
}else{
	
include("enaaurlnp.php");
	
}
?>
