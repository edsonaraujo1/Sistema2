<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Incluir Cadastro 
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 21/01/20097 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

$Faz_uma_vez = $_SESSION['Faz_uma'];

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("FORM_SAUDE");

if ($deixar == "SIM"){

?>

<script language="JavaScript"><!--

document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
   
   if (event.keyCode == 27) 
   {
		window.location="cadastro.php";
   }
   
}
//-->
</script>

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
// Abre Conex�o com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Antes de eliminar a Tabel temp 
// Verifica se existe dados

$nome3a = strtolower($nome3);

$consultax  = "SELECT * FROM $nome3a LIMIT 0,50";

$resultadox = @mysql_query($consultax);

$rowx = @mysql_fetch_array($resultadox);

$id_x      = @$rowx["Nome1"];

	
	$Faz_xxx = "nao";
	
    // Resgata a Sessao
    @session_start();
    $_SESSION['Faz_uma'] = 'nao';
	

if ($Faz_xxx == "nao"){

$nome3a = strtolower($nome3);
// Elimina a Tabela Temp

$add0 = "DROP TABLE `$nome3a`";
@mysql_query($add0, $link);




// Cria Tablea Temp

$add1 = "CREATE TABLE `$nome3a` ( `Nome1`    VARCHAR(100) DEFAULT '$nome3a', 
                                 `Edit1`    VARCHAR(100), 
                                 `Edit2`    VARCHAR(100), 
                                 `Edit3`    VARCHAR(100), 
                                 `Edit4`    VARCHAR(100), 
                                 `Edit5`    VARCHAR(100), 
                                 `Edit6`    VARCHAR(100), 
                                 `Edit7`    VARCHAR(100), 
                                 `Edit8`    VARCHAR(100), 
                                 `Edit9`    VARCHAR(100), 
                                 `Edit10`   VARCHAR(100), 
                                 `Edit11`   VARCHAR(100), 
                                 `Edit12`   VARCHAR(100), 
                                 `Edit13`   VARCHAR(100), 
                                 `Edit14`   VARCHAR(100), 
                                 `Edit15`   VARCHAR(100), 
                                 `Edit16`   VARCHAR(100), 
                                 `Edit17`   VARCHAR(100), 
                                 `Edit18`   VARCHAR(100), 
                                 `Edit19`   VARCHAR(100), 
                                 `Edit20`   VARCHAR(100), 
                                 `Edit21`   VARCHAR(100), 
                                 `Edit22`   VARCHAR(100), 
                                 `Edit23`   VARCHAR(100), 
                                 `Edit24`   VARCHAR(100), 
                                 `Edit25`   VARCHAR(100), 
                                 `Edit26`   VARCHAR(100), 
                                 `Edit27`   VARCHAR(100), 
                                 `Edit28`   VARCHAR(100), 
                                 `Edit29`   VARCHAR(100), 
                                 `Edit30`   VARCHAR(100), 
                                 `Edit31`   VARCHAR(100), 
                                 `Edit32`   VARCHAR(100), 
                                 `Edit33`   VARCHAR(100), 
                                 `Edit34`   VARCHAR(100), 
                                 `Edit35`   VARCHAR(100), 
                                 `Edit36`   VARCHAR(100), 
                                 `Edit37`   VARCHAR(100), 
                                 `Edit38`   VARCHAR(100), 
                                 `Edit39`   VARCHAR(100), 
                                 `Edit40`   VARCHAR(100), 
                                 `Edit41`   VARCHAR(100), 
                                 `Edit42`   VARCHAR(100), 
                                 `Edit43`   VARCHAR(100), 
                                 `Edit44`   VARCHAR(100), 
                                 `Edit45`   VARCHAR(100), 
                                 `Edit46`   VARCHAR(100), 
                                 `Edit47`   VARCHAR(100), 
                                 `Edit48`   VARCHAR(100), 
                                 `Edit49`   VARCHAR(100), 
                                 `Edit50`   VARCHAR(100), 
                                 `Edit51`   VARCHAR(100), 
                                 `Edit52`   VARCHAR(100), 
                                 `Edit53`   VARCHAR(100), 
                                 `Edit54`   VARCHAR(100), 
                                 `Edit55`   VARCHAR(100), 
                                 `Edit56`   VARCHAR(100), 
                                 `Edit57`   VARCHAR(100), 
                                 `Edit58`   VARCHAR(100), 
                                 `Edit59`   VARCHAR(100), 
                                 `Edit60`   VARCHAR(100), 
                                 `Edit61`   VARCHAR(100), 
                                 `Edit62`   VARCHAR(100), 
                                 `Edit63`   VARCHAR(100), 
                                 `Edit64`   VARCHAR(100), 
                                 `Edit65`   VARCHAR(100), 
                                 `Edit66`   VARCHAR(100), 
                                 `Edit67`   VARCHAR(100), 
                                 `Edit68`   VARCHAR(100), 
                                 `Edit69`   VARCHAR(100), 
                                 `Edit70`   VARCHAR(100), 
                                 `Edit71`   VARCHAR(100), 
                                 `Edit72`   VARCHAR(100), 
                                 `Edit73`   VARCHAR(100), 
                                 `Edit74`   VARCHAR(100), 
                                 `Edit75`   VARCHAR(100), 
                                 `Edit76`   VARCHAR(100), 
                                 `Edit77`   VARCHAR(100), 
                                 `Edit78`   VARCHAR(100), 
                                 `Edit79`   VARCHAR(100), 
                                 `Edit80`   VARCHAR(100), 
                                 `memo1`    TEXT,
                                 `mensage1` VARCHAR(100), 
                                 `mensage2` VARCHAR(100), 
                                 `mensage3` VARCHAR(100), 
                                 `mensage4` VARCHAR(100), 
                                 `mensage5` VARCHAR(100), 
                                 `mensage6` VARCHAR(100) ) TYPE = innodb";
@mysql_query($add1, $link);

// Incluir nome do usuario na Tabela

$add2 = "INSERT INTO $nome3a (Nome1) VALUES ('$nome3a')";
@mysql_query($add2, $link);

}else{
	
}

// Abrir tabela edificios

$consulta  = "SELECT * FROM saude_atendi ORDER BY id DESC LIMIT 0,1";

$resultado = @mysql_query($consulta);

// Incrementa novo codigo

$row = mysql_fetch_array($resultado);

$id       = @$row["id"];

$Edit14  = date("d/m/Y");

// Atualiza Tabela Temp

$add3 = "UPDATE $nome3a         SET Edit14   = '$Edit14' WHERE Nome1 = '$nome3a'";
@mysql_query($add3, $link);

// Abrir tabela Senha

$tabela_1 = strtoupper('saude_atendi');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

if ($per1 != "SIM")
{
    include("enaaurlnp.php");
}
else
{

include("menu.php");

$menssagens = "* * * Incluir * * *";

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<style type="text/css" media="print">
div.invisivel {
visibility: hidden; 
}
</style>
<script src="script.js"></script>
<script src="function_salva.js"></script>
</head>
<body>

<div style="Z-INDEX: 500; LEFT: 00px; WIDTH: 616px; POSITION: absolute; TOP: 157px; HEIGHT: 19px">

<IFRAME src="../info/informes2.php" width="1" height="1" scrolling="no" frameborder="0" align="left"></IFRAME>

</div>

<?
include("botoes_ins.php");
include("funcoes2.php");
include("layout2.php");
?>
<tr><td><!-- AQUI SER� APRESENTADO O RESULTADO DA BUSCA DIN�MICA.. OU SEJA OS NOMES -->
<div id="pagina" class="invisivel"></div></td></tr>
</body>
</html><?
}
}else{
	
include("enaaurlnp.php");
	
}
?>