<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Pesquisa Arquivo Confederatica
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 04/07/2008 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

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
			     <font face=arial><b>*** <font color = #FF0000> ERRO ACESSO N�O PERMITIDO !!!</font> ***<br>
				                     
									 <font face=arial>Usu�rio sem Permiss�o</b>
			<table align=center>
			<form method='POST' action='../avaleht.php?servletjs2=20$$20'>
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

//include("menu.php");

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

// Abre Conex�o com o MySql
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
     <font face=arial><b>*** N�o foi possivel conectar !!! ***</b>
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
     <font face=arial><b>*** N�o Foi possivel selecionar o banco de dados !!! ***</b>
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

$consulta  = "SELECT * FROM conf WHERE CONFCOD = '". anti_sql_injection($Cod_Edif) ."' AND TOTAL != 0 ORDER BY str_to_date( VENCTO, '%d/%m/%Y')";

$resultado = @mysql_query($consulta)
        or 

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Registro N�o Encontrado !!! ***</b>
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

$ide       = @$row["id"];

if (empty($ide)){
	
	echo "
	
     <br>
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Nenhuma Contribui��o Encontrada !!! ***</b>
     <table align=center>
     <form method='POST' action='javascript:window.close()'>
     <td><input type=image name='Consulta' src='../imagens/botaoazul25.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>";
	
	
}else{


$consulta  = "SELECT * FROM conf WHERE CONFCOD = '". anti_sql_injection($Cod_Edif) ."' AND TOTAL != 0 ORDER BY str_to_date( VENCTO, '%d/%m/%Y')";

$resultado = @mysql_query($consulta);

$faz = 1;

echo "
          
          <table border=0  align=center>
          <tr align=center colspan=2> 

          <form method='POST' action='cadastro.php?Cod_xx=$Cod_2'>
          <td></td>
          </form>";

echo "
     <br>

<div id='Label1_outer' style='Z-INDEX: 2; LEFT: 40px; WIDTH: 329px; POSITION: absolute; TOP: 0px; HEIGHT: 32px'>
<div id='Label1' style=' font-family: Verdana; font-size: 26px; color: #5A9CB1; background-color: #FFFFFF;height:32px;width:529px;'   ><STRONG>Confederativas e Assistencial Pagas</STRONG></div>
</div>

<div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <table border='1' align=center>
	 
	 ";


       while ($linha = @mysql_fetch_array($resultado))
       {

    $id_conf  = $linha["id"];
	$cod      = $linha["CONFCOD"];
	$vencto   = $linha["VENCTO"];
	$total    = $linha["TOTAL"];
	$descri   = $linha["DESCRICAO"];
	$emissao  = $linha["DATA"];
	$dat_bai  = $linha["DAT_BAI"];
	$dat_pag  = $linha["PAGTO"];
	$qtd      = $linha["QTD"];
	$local    = $linha["AGENCIA"];
	$acordo   = $linha["ACORDO"];
	if ($acordo == 'S'){
		$aco_de = "Feito Acordo";
	}else{
		$aco_de = "";
	}
	


        if ($faz == 1){
           ?>
           
	   <td valign=top><b>COD</b>
	   <th>           <b>VENCTO</b>
	   <th>           <b>PAGTO</b>
	   <th>           <b>VALOR R$</b>
	   <th>           <b>AGENCIA</b>
	   <th>           <b>DAT-BAIXA</b>
	   <th>           <b>DESCRI��O</b>
	   <th><th></th>
       </td>
           
           <?
           $faz = 0;
        }


if ($edi3 == "SIM"){
	


        echo "
        <tr> 
	    <td valign=top align='center'><b>$cod</b><td>$vencto<td align='center'>$dat_pag<td align='right'>$total<td align='center'>$local<td align='center'>$dat_bai<td>$descri<td>
        </td>";

}else{
	
        echo "
        <tr> 
	    <td valign=top align='center'><b>$cod</b><td>$vencto<td align='center'>$dat_pag<td align='right'>$total<td align='center'>$local<td align='center'>$dat_bai<td>$descri<td>
		</td>";

}

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
          <td></td>
          </form>";
          

// <A HREF='edifguias_adms.php?Cod_2=$cod'><img id='Image3' src='../imagens/acord.PNG' border='0'></A>
}
?>
