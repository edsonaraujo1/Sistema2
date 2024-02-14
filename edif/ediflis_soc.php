<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Pesquisa Socios do Edificio
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

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

$deixar_1 = acesso("FORM_EDIF");

if ($deixar_1 == "NAO"){
	
    echo "              <html>
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
			<form method='POST' action='../avaleht.php'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>
";
	        exit();
}	

// Resgata Secao
@session_start();
$Cod_Edif = addslashes($_SESSION['lista_soc']);
$Cod_2    = addslashes($_SESSION['navega']);

unset ($_SESSION['lista_soc']);
unset ($_SESSION['navega']);

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
		window.location="cadastro.php?Cod_xx=<?=$Cod_2;?>";
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

$consulta  = "SELECT * FROM socios WHERE CODEDIF = '". anti_sql_injection($Cod_Edif) ."' ORDER BY CODEDIF";

$resultado = @mysql_query($consulta)
        or 

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadastro.php?Cod_xx=$Cod_2'>
     <td><input type=image name='Consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


$row = @mysql_fetch_array($resultado);

$id       = @$row["id"];

if (empty($id)){
	
	echo "
	
     <br>
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Nenhum Socio Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadastro.php?Cod_xx=$Cod_2''>
     <td><input type=image name='Consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>";
	
exit;	
}

$consulta  = "SELECT * FROM socios WHERE CODEDIF = '". anti_sql_injection($Cod_Edif) ."' ORDER BY codedif";

$resultado = @mysql_query($consulta);


$faz = 1;
$ano_p = strftime("%Y");

echo "
          <br>
          <br>
          
          <table border=0  align=center>
          <tr align=center colspan=2> 


          <form method='POST' action='cadastro.php?Cod_xx=$Cod_2'>
          <td><input type=image name='Voltar' src='../imagens/botao_voltar.PNG'></td>
          </form>


<div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <table border='1' align=center>";


       while ($linha = @mysql_fetch_array($resultado))
       {

	$cod      = $linha["COD"];
	$nu       = $linha["NU"];
	$categ    = $linha["CATEGORIA"];
	$nome     = $linha["NOMEASSOC"];
	$mes      = $linha["MES"];
	$ano      = $linha["ANO"];
	$funcao   = $linha["CARGOASSOC"];
	$inscri   = $linha["DATINSC"];



    $consulta2  = "SELECT * FROM pisos WHERE ano = '". anti_sql_injection($ano_p) ."' and Funcao = '". anti_sql_injection($funcao) ."'";

    $resultado2 = @mysql_query($consulta2);

    $row2 = @mysql_fetch_array($resultado2);

    $id       = @$row2["piso"];

        if ($faz == 1){
           ?>
           
	   <td valign=top><b>COD</b><th><b>CATEG.</b><th><b>NOME ASSOCIADO</b><th><b>INSCRICAO</b><th><b>MES</b><th><b>ANO</b><th><b>FUNÇÃO</b><th><b>PISO em <?=$ano_p;?></b></td>
           
           <?
           $faz = 0;
        }

        echo "
        
        <tr> 
	<td valign=top><b>$cod$nu</b></a><td>$categ<td>$nome<td>$inscri<td>$mes<td>$ano<td>$funcao<td align='right'>R$&nbsp;&nbsp;$id</td>";

}
     echo "
      
     </table>
     </td>
     </tr>
     </table>
     </div>
     <table border=0  align=center>
     <tr align=center colspan=2> 
     <form method='POST' action='cadastro.php?Cod_xx=$Cod_2'>
     <td><input type=image name='incluir' src='../imagens/botao_voltar.PNG'></td>
     </form> ";
?>          
