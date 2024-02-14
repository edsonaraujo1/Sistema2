<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Pesquisa Arquivo Aberto
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 04/07/2008 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

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

<?php

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
$Cod_Edif = $_SESSION['lista_soc'];
$Cod_2    = $_SESSION['navega'];

unset ($_SESSION['lista_soc']);
unset ($_SESSION['navega']);

// retorna uma pesquisa

$consulta  = "SELECT * FROM ABERTO WHERE CONFCOD = '$Cod_Edif' ORDER BY str_to_date( VENCTO, '%d/%m/%Y')";

$resultado = @mysql_query($consulta)
        or 

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
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

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Informacao nao Encontrada !!! ***</b>
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

$consulta  = "SELECT * FROM ABERTO WHERE CONFCOD = '$Cod_Edif' ORDER BY str_to_date( VENCTO, '%d/%m/%Y')";

$resultado = @mysql_query($consulta);

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = mysql_fetch_array($resultado3);

$nov1       = @$row3["nov1"];
$nov2       = @$row3["nov2"];
$nov3       = @$row3["nov3"];

$faz = 1;

echo "
          <br>
          <br>
          
          <table border=0  align=center>
          <tr align=center colspan=2> 


          <form method='POST' action='cadastro.php?Cod_xx=$Cod_2'>
          <td><input type=image name='incluir' src='../imagens/botao_voltar.PNG'></td>
          </form>";

if ($nov1 == 'SIM'){

echo "
          <form method='POST' action='acordo.php?Cod_2=$Cod_Edif'>
          <td><input type=image name='incluir' src='../imagens/acord.PNG'></td>
          </form>";

}

echo "

<div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <table border='1' align=center>";

       while ($linha = mysql_fetch_array($resultado))
       {

	$cod      = $linha["CONFCOD"];
	$vencto   = $linha["VENCTO"];
	$total    = $linha["TOTAL"];
	$descri   = $linha["DESCRICAO"];
	$emissao  = $linha["DATA"];
	$dat_bai  = $linha["DAT_BAI"];
	$dat_pag  = $linha["DAT_PAG"];
	$qtd      = $linha["QTD"];
	$local    = $linha["LOCAL"];
	$acordo   = $linha["ACORDO"];
	$pag_to   = $linha["PAGTO"];
	
	if ($acordo == 'S'){
		$aco_de = "Feito Acordo";
	}else{
		$aco_de = "";
	}
	

	// Pesquisa contribuicoes pagas e atualiza aberto

	$consulta0  = "SELECT * FROM conf WHERE CONFCOD = '$Cod_Edif' AND VENCTO = '$vencto'";

	$resultado0 = @mysql_query($consulta0);

	$row0 = mysql_fetch_array($resultado0);

	$cod_conf = @$row0["CONFCOD"];
	$ven_conf = @$row0["VENCTO"];
	$val_conf = @$row0["TOTAL"];
	$age_conf = @$row0["AGENCIA"];
	$des_conf = @$row0["DESCRICAO"];
	$bai_conf = @$row0["DAT_BAI"];

	if ($cod_conf != 0){

    	$consulta9 = "UPDATE aberto SET PAGTO 	  = '$bai_conf',
                                        DAT_BAI	  = '$bai_conf',
			  						    TOTAL     = '$val_conf',
									    LOCAL     = '$age_conf' WHERE CONFCOD = '$cod_conf' AND VENCTO = '$vencto'";

    	@mysql_query($consulta9, $link);
    	
}

        if ($faz == 1){
           ?>
           
	   <td valign=top><b>COD</b><th><b>VENCTO</b><th><b>DESCRIÇÃO</b><th><b>EMISSÃO</b><th><b>QTD</b><th><b>DAT.PAGTO</b><th><b>DAT.BAIXA</b><th><b>VALOR PAGO</b><th><b>LOCAL PAGO</b></td>
           
           <?php
           $faz = 0;
        }

        echo "
        
              <tr> 
	          <td valign=top><b>$cod</b></a><td>$vencto<td>$descri<td>$emissao<td>$qtd<td>$pag_to<td>$dat_bai<td align='right'>$total<td align='right'>$local
	          </td>";

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
          
if ($nov1 == 'SIM'){

echo "

          <form method='POST' action='acordo.php?Cod_2=$Cod_Edif'>
          <td><input type=image name='incluir' src='../imagens/acord.PNG'></td>
          </form>";
}          

// <A HREF='edifguias_adms.php?Cod_2=$cod'><img id='Image3' src='../imagens/acord.PNG' border='0'></A>
?>
