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

require("logar.php");
$nome3 = $_SESSION["nome_log"];

require("index.php");

?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>
</html>

<?

// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolordark='$color_bor' bordercolorlight='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form></p>
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

     <table align=center border='15' bgcolor='#FFFFFF' bordercolordark='$color_bor' bordercolorlight='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form></p>
     </table>
     </td>
     </tr>
     </table>
     </div>");

// retorna uma pesquisa

$consulta  = "SELECT * FROM edificios WHERE adm = '$Cod_2' ORDER BY cod";

@$resultado = mysql_query($consulta);
 
$faz = 1;

echo "
          <br>
          <br>
          
          <table border=0  align=center>
          <tr align=center colspan=2><p>


          <form method='POST' action='cadadms.php?Cod_xxx=$Cod_2''>
          <td><input type=image name='incluir' src='../imagens/botao_voltar.PNG'></td>
          </form>


<div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolordark='$color_bor' bordercolorlight='$color_bor'>
     <tr>
     <td>
     <table border='1' align=center>";


       while ($linha = mysql_fetch_array($resultado))
       {

	$cod      = $linha["cod"];
	$nu       = $linha["cond"];
	$categ    = $linha["Nome"];
	$nome     = $linha["adm"];
	$mes      = $linha["ativ"];


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
		<td align='right'><a href=cadedif.php?Cod_xx=$cod><b>$cod&nbsp;&nbsp;</b></a>
		<td>$nu&nbsp;&nbsp;$categ
		<td align='right'>$nome
		<td align='center'>$mes
		</td>
";


	}

     echo "
     </p>
     </table>
     </td>
     </tr>
     </table>
     </div>


          <table border=0  align=center>
          <tr align=center colspan=2><p>


          <form method='POST' action='cadadms.php?Cod_xxx=$Cod_2'>
          <td><input type=image name='incluir' src='../imagens/botao_voltar.PNG'></td>
          </form>


";

?>
