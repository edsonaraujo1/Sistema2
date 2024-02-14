<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Pesquisa Arquivo Confederatica
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 04/07/2008 

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

$volta_1 = addslashes($_SESSION['volta_conf']);

if (empty($Cod_Edif)){
   $Cod_Edif = addslashes($_SESSION['lista_soc']);
}else{
   $volta_1 = $Cod_Edif;  	
}

$Cod_2    = addslashes($_SESSION['navega']);

unset ($_SESSION['lista_soc']);
unset ($_SESSION['navega']);

if (!empty($volta_1)){
   	
	$Cod_Edif = $volta_1;
	 
}

if (empty($Cod_2)){
	
	$Cod_2 = $volta_1;
	
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


// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '". anti_sql_injection($nome3) ."'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$mens1     = @$row3["mens1"];
$mens2     = @$row3["mens2"];
$mens3     = @$row3["mens3"];


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
     <font face=arial><b>*** Nenhuma Contribuição Encontrada !!! ***</b>
     <table align=center>
     <form method='POST' action='cadastro.php?Cod_xx=$Cod_2'>
     <td><input type=image name='Consulta' src='../imagens/botao_voltar.PNG'></td>
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
          <br>
          <br>
          
          <table border=0  align=center>
          <tr align=center colspan=2> 


          <form method='POST' action='cadastro.php?Cod_xx=$Cod_2'>
          <td><input type=image name='incluir' src='../imagens/botao_voltar.PNG'></td>
          </form>";

echo "

<div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     
     <table border='1' align=center>";


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
           
	   <td valign=top><b>CONFCOD</b>
	   <th>           <b>VENCTO</b>
	   <th>           <b>PAGAMENTO</b>
	   <th>           <b>VALOR R$</b>
	   <th>           <b>AGENCIA</b>
	   <th>           <b>DAT-BAIXA</b>
	   <th>           <b>DESCRIÇÃO</b>
	   <th><th></th>
       </td>
           
           <?
           $faz = 0;
        }



        echo "
        <tr> 
	    <td valign=top align='center'><b>$cod</b><td>$vencto<td align='center'>$dat_pag<td align='right'>$total<td align='center'>$local<td align='center'>$dat_bai<td>$descri<td>";

if ($mens2 == "SIM"){
        
		echo "	    
		<A HREF='excluir_conf.php?Cod_2=$id_conf'><img id='Image3' src='../imagens/excluir.gif' border='0'></A>";
		
}
if ($mens3 == "SIM"){
	
	    echo "
		<td><A HREF='alterar_conf.php?Cod_2=$id_conf'><img id='Image3' src='../imagens/editar.gif' border='0'></A>
        </td>";

}

        echo "</td>";

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
          </form>";
          

// <A HREF='edifguias_adms.php?Cod_2=$cod'><img id='Image3' src='../imagens/acord.PNG' border='0'></A>
}
?>
