<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Relatorio na Tela Adms
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");

$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$Titulo_rel2 = "Relatorio de Contribuições Pagas";
$Pagina      = 1;
$conta_p     = 0;
$dat_rel     = $hora = date("d/m/Y"); 
?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>
</html>

<?

$codigo      = $_POST['Edit1'];

// Abrir Table de Edificios

$consulta4  = "SELECT * FROM edificios Where COD = '$Edit1'";

$resultado4 = @mysql_query($consulta4);

$row4 = @mysql_fetch_array($resultado4);

$cod_edif   = @$row4["COD"];
$cond  = trim(@$row4["COND"].@$row4["NOME"]);
$edif  = trim(@$row4["NOME"]);
$cgc   = trim(@$row4["CGC"]);

// retorna uma pesquisa

$consulta  = "SELECT * FROM conf WHERE CONFCOD = '$codigo' AND TOTAL != 0 ORDER BY str_to_date( VENCTO, '%d/%m/%Y')";

$resultado = @mysql_query($consulta)
        or 

die("
     <br>
     <br> 

     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='rel_frm.php'>
     <td><input type=image name='Consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

$faz = 1;

echo "

     <table border=0  align=center>
     <tr align=center colspan=2> 
     <form method='POST' action='cadedif.php'>
     <td>";
?>	


     <div align='left'>
	 <table  border=0  collspan='2' height=3px align='left' >
	 <tr>
	 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0>
	 </tr>
	 <tr>
	 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0>
	 <table  border=0  collspan='2' align='left' >
	 <td width=500px >
	 <font style=' font-family: Verdana; font-size: 10px;'><?=$Titulo;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
	 </td>
	 <td width=473px align='right'>
	 <font style=' font-family: Verdana; font-size: 12px;'>Data.:<?=$dat_rel;?></font>
	 </td>
	 </table>
	 <tr>
	 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0>
	 </tr>
	 <tr>
	 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0>
	 <table  border=0  collspan='3' align='center' >
	 <td width=900px align='center'>
	 <b><?=$Titulo_rel2;?><br/><br/>
	 <?=$cod_edif;?>  -  <?=$cond;?> - <?=$cgc;?>  
	 </td>
	 
	 </td>
	 </table>
	 <tr>
	 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0>
	 </tr>
	 <tr>
	 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0>
	 </tr>
	 </table>
     </div><br />
     
     <table align=center border='0' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <table border='1' align=center>
<?	 
     while ($linha = mysql_fetch_array($resultado))
       {

		    $id_conf  = $linha["id"];
			$cod      = $linha["CONFCOD"];
			$vencto   = $linha["VENCTO"];
			$total    = $linha["TOTAL"];
			$descri   = trim(strtoupper($linha["DESCRICAO"]));
			$emissao  = $linha["DATA"];
			$dat_bai  = $linha["DAT_BAI"];
			$dat_pag  = $linha["PAGTO"];
			$qtd      = $linha["QTD"];
			$local    = $linha["AGENCIA"];
			$acordo   = $linha["ACORDO"];


		     if ($faz == 1){
		        ?>
		        <font style=' font-family: Verdana; font-size: 14px;'>
			    <td valign=top width=200px align="center">     <b>Descrição</b>
				<td width=150px align="center">  <b>Vencimento</b>
				<td width=105px align="center">               <b>Valor Pago</b>
				<td width=150px align="center">               <b>Data Baixa</b>
				<td width=80px align="center"><b>Local Pago</b>
                </font>
		        <?
		        $faz = 0;
		     }
      
                       if ($negrita==1){ 
                         ?>
		                 <tr> 
			             <td valign=top  align='center'><font style=' font-family: Verdana; font-size: 14px;'><b><?=$descri;?>&nbsp;</b>
						 <td align='center'>            <font style=' font-family: Verdana; font-size: 14px;'>   <?=$vencto;?>&nbsp;
						 <td align='right'>               		  <font style=' font-family: Verdana; font-size: 14px;'>   <?=$total;?>&nbsp;
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 14px;'>   <?=$dat_bai;?>
						 <td align='center'>		  <font style=' font-family: Verdana; font-size: 14px;'>   <?=$local;?>
						 </font>
						 </td>
						 <? 
			            $conta_p = $conta_p + 1;
			            $rec_nu = $rec_nu + 1;
			            
			            $negrita = 0;
			            }else{
                        ?>
		                 <tr bgcolor="#C0C0C0"> 
			             <td  valign=top align='center'><font style=' font-family: Verdana; font-size: 14px;'><b><?=$descri;?>&nbsp;</b>
						 <td align='center'>            <font style=' font-family: Verdana; font-size: 14px;'>   <?=$vencto;?>&nbsp;
						 <td align='right'>               		  <font style=' font-family: Verdana; font-size: 14px;'>   <?=$total;?>&nbsp;
						 <td align='center'>  		  <font style=' font-family: Verdana; font-size: 14px;'>   <?=$dat_bai;?>
						 <td align='center'>		  <font style=' font-family: Verdana; font-size: 14px;'>   <?=$local;?>
                         </font>
						 </td>
						 <? 
			            $conta_p = $conta_p + 1;
			            $rec_nu = $rec_nu + 1;
			            
			            $negrita = 1;
						}
						?> 

			         <?
					 $conta_p = 0;		
				}
 
	
    echo "
	        
	       </table>
	       </td>
	       </tr>
	       </table>
	       </div>
	       <table border=0  align=center>
	       <tr align=center colspan=2>  ";
           ?>
		   <table>
		   <tr>
		   <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0>
		   </tr>
		   <tr>
		   <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0>
		   </tr>
		   </table>
           <table border=0  align=left>  
           <td>Total de Registros Pesquisado.:   <?=$rec_nu;?></td>
</body>