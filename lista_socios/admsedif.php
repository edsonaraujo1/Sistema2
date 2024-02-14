<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Pesquisa Predios da Adms
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_ADM");

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
            </style> 
			</html>
			<br><br><br><br>
			<div align=center>
			<table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** ERRO ACESSO NÃO PERMITIDO PARA USUARIO !!! ***<br>
				                     Entre em Contato com o Administrador do Programa <br>
									 erro: TENTATIVA DE ACESSO</b>
			<table align=center>
			<form method='POST' action='../index.php'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form></table></td></tr></table>
			</div>";
	        exit();
}	

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

// Resgata Secao
session_start();
$Cod_2 = $_SESSION['lista_soc'];

//unset ($_SESSION['lista_soc']);

// retorna uma pesquisa

$consulta  = "SELECT * FROM edificios WHERE ADM = '$Cod_2' ORDER BY COD";

@$resultado = mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id       = @$row["id"];

if (empty($id)){
	
	echo "
	
     <br>
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Nenhuma Edificio Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadastro.php?cod_5=$Cod_2'>
     <td><input type=image name='Consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>";
	
exit;	
}

$consulta  = "SELECT * FROM edificios WHERE ADM = '$Cod_2' ORDER BY COD";

@$resultado = @mysql_query($consulta);
 
$faz = 1;

echo "
          <br>
          <br>
          
          <table border=0  align=center>
          <tr align=center colspan=2> 


          <form method='POST' action='cadastro.php?cod_5=$Cod_2'>
          <td><input type=image name='incluir' src='../imagens/botao_voltar.PNG'></td>
          </form>


     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <table border='1' align=center>";


       while ($linha = @mysql_fetch_array($resultado))
       {

	$cod      = $linha["COD"];
	$nu       = $linha["COND"];
	$categ    = $linha["NOME"];
	$nome     = $linha["ADM"];
	$mes      = $linha["ATIV"];


        if ($faz == 1){
           ?>
           
	   <td valign=top><th><b>COD</b><th><b>NOME DO COMDOMINIO</b><th><b>AMDS</b><th><b>ATIVIDADE</b></td>
           
           <?
           $faz = 0;
        }

        echo "
        
        <tr> 
	    <td align='left'>
		<A HREF='edifguias_adms.php?Cod_2=$cod'><img id='Image3' src='../imagens/conf1.PNG' border='0'></A>
		<A HREF='edif_sind_adms.php?Cod_2=$cod'><img id='Image3' src='../imagens/sind1.PNG' border='0'></A>
        <A HREF='incluir_conf.php?Cod_1=$cod'><img id='Image3' src='../imagens/botaoazul6.PNG' border='0'></A>		
		<td align='right'><b>$cod&nbsp;&nbsp;</b>
		<td>$nu&nbsp;&nbsp;$categ
		<td align='right'>$nome
		<td align='center'>$mes
		</td>
";


	}

     echo "
      
     </table>
     </td>
     </tr>
     </table>
     </div>


          <table border=0  align=center>
          <tr align=center colspan=2> 


          <form method='POST' action='cadastro.php?cod_5=$Cod_2'>
          <td><input type=image name='incluir' src='../imagens/botao_voltar.PNG'></td>
          </form>


";

?>
