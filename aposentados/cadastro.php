<?
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

include("../logar.php");

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("APOSENT_1");

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
	
   $consulta  = "SELECT * FROM aposentados WHERE id = '$cod_1' ORDER BY id ASC LIMIT 0,50";

}else{

   $consulta  = "SELECT * FROM aposentados ORDER BY id ASC LIMIT 0,50";
	
}
if (!empty($Cod_xx)){
	
   $consulta  = "SELECT * FROM aposentados WHERE id = '$Cod_xx' ORDER BY id ASC LIMIT 0,50";
	
}

if (!empty($cod_3)){
	
   $consulta  = "SELECT * FROM aposentados WHERE id = '$cod_3' ORDER BY id ASC LIMIT 0,50";
	
}

if (!empty($cod_5)){
	
   $consulta  = "SELECT * FROM aposentados WHERE CODIGO = '$cod_5' ORDER BY id ASC LIMIT 0,50";
	
}

// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id      = @$row["id"];
$Edit1   = @$row["CODIGO"];
$Edit2   = @$row["NOME"];
$Edit3   = @$row["CPF"];
$Edit4   = @$row["RG"];
$Edit5   = @$row["OAB"];
$Edit6   = @$row["FONE"];
$Edit7   = @$row["CELULAR"];
$Edit8   = @$row["EMAIL"];
$Edit9   = @$row["ENDER"];
$Edit10  = @$row["BAIRRO"];
$Edit11  = @$row["ESTADO"];
$Edit12  = @$row["CEP"];
$Edit13  = @$row["OBS"];
$Edit14  = @$row["FOTO"];

$nome_adm  = @$row["CAMPO_ADM"];

$cami2 = '../imagens/fotos/Branco.bmp';  

$menssagens = "* * * Visualizar * * *";

// Salva Secao
session_start();
$_SESSION['navega'] = $id;
$_SESSION['lista_soc'] = $Edit1;

// Abrir tabela Senha

$tabela_1 = strtoupper('aposentados');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

$consulta10 = "SELECT * FROM tb_terceira WHERE codp = '$Edit1'";
	
$resultado10 = @mysql_query($consulta10);

$row10 = @mysql_fetch_array($resultado10);

$id_9 	   = @$row10["cod_foto"];
$id_imagem = @$row10["id_imagem"];

if(!empty($id_imagem)){
	
   $mostra_branco = "faz";	
}else{
   $mostra_branco = "nao";	
	
}	

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

<script language="JavaScript"><!--

//document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
}
//-->
</script>

<html>
<head>
<title><?=$Titulo;?></title>
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

<div style="Z-INDEX: 500; LEFT: 00px; WIDTH: 10px; POSITION: absolute; TOP: 157px; HEIGHT: 19px">

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
