<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Cadastro de Instrução
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

include("menu.php");

$nome3 = $_SESSION["nome_log"];

include("vaurls.php");

$deixar = acesso_url("FORM_INSTRU");

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
}
//-->
</script>

<html>
<head>
<title><?=$Titulo;?></title>
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
include("help.php");
?>

<?

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Abrir tabela instrucao

if ($Cod_xxx != 0)
{
$consulta = "SELECT * FROM instrucao WHERE Edit1 = '$Cod_xxx' ORDER BY Edit1";

}else{
	
$consulta = "SELECT * FROM instrucao  ORDER BY Edit1 LIMIT 0,100";
              
}

// Função Navegar pelo registro Proximo e Anterior
If ($Cod_Anterior != 0){
	
	$id = $Cod_Anterior;

    if($Cod_Anterior != 0){
       $id = $id -1;
       }
       else{
           $id = $id +1;
           }

       if ($id) {
       $consulta = "SELECT * FROM instrucao ORDER BY id LIMIT $id,1";
	
}
}
If ($Cod_Proximo != 0){
	
	$id = $Cod_Proximo;

    if($Cod_Proximo != 0){
       $id = $id -0;
       }
       else{
           $id = $id -1;
           }

       if ($id) {
       $consulta = "SELECT * FROM instrucao ORDER BY id LIMIT $id,1";
	
}
}

If ($Cod_fim != 0){
	
       $consulta = "SELECT * FROM instrucao ORDER BY Edit1 DESC LIMIT 0,1";
	
}

If ($Cod_inicio != 0){
	
       $consulta = "SELECT * FROM instrucao ORDER BY Edit1 ASC LIMIT 0,1";
	
}
// Fim da Função Navegar pelo registro

$resultado = @mysql_query($consulta)

or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Tabela Instrução Não Foi encontrada !!! ***</b>
     <table align=center>
     <form method='POST' action='index.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

$row = @mysql_fetch_array($resultado);


$Edit1	    = @$row["Edit1"];
$Edit2	    = @$row["Edit2"];
$Edit3	    = @$row["Edit3"];
$Edit4	    = @$row["Edit4"];
$Edit5	    = @$row["Edit5"];
$Edit6	    = @$row["Edit6"];
$Edit7	    = @$row["Edit7"];
$Edit8	    = @$row["Edit8"];
$Edit9	    = @$row["Edit9"];
$Edit10	    = @$row["Edit10"];
$Edit11	    = @$row["Edit11"];
$Edit12	    = @$row["Edit12"];
$Edit13	    = @$row["Edit13"];
$Edit14	    = @$row["Edit14"];
$Edit15	    = @$row["Edit15"];
$Edit16	    = @$row["Edit16"];
$Edit17	    = @$row["Edit17"];
$Edit18	    = @$row["Edit18"];

$menssagens = "* * * Visualizar * * *";


// Abrir tabela Senha

$tabela_1 = strtoupper('instrucao');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];


include("instrulayout.php");

include("botoes.php");

}else{
	
include("enaaurlnp.php");
	
}
?>
