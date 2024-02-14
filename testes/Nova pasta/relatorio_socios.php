<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Relatorio na Tela Socios
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

header('Content-type: application/vnd.ms-excel');
header('Content-type: application/force-download');
header('Content-Disposition: attachment; filename=rel_edif.xls');
header('Pragma: no-cache');

require_once("logar.php");

$nome3  = $_SESSION["nome_log"];

$Titulo_rel2 = "Cadastro de Associados";
$Pagina      = 1;
$conta_p     = 0;
$data_rel    = date("d/m/Y");

// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass) or

die("
     <br>
     <br> 

     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

@mysql_select_db($db)  or

die("
     <br>
     <br> 

     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// retorna uma pesquisa

$Cod_2a = $Cod_2 + 300;

$consulta  = "SELECT * FROM socios WHERE COD >= 2 and COD <= 340  ORDER BY COD";

$resultado = @mysql_query($consulta)  or 

die("
     <br>
     <br> 

     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <tr>
     <td>
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadsocios.php'>
     <td><input type=image name='Consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

$faz = 1;
$negrita = 1;

     ?>	
     <td></td>
     <td><b><?=$Titulo;?></b></td><br/><br/>
     <td><b><?=$data_rel;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$Titulo_rel2;?></b></td>

     <table border='0' bgcolor='#FFFFFF' bordercolor ='#4682B4'>
     <table border='1' >
     <?	 
     while ($linha = mysql_fetch_array($resultado))
       {

		     $cod      = $linha["COD"];
		     $nu       = $linha['NU'];
			 $nome     = Trim($linha["NOMEASSOC"]);
			 $rua      = $linha["RUA"];
			 $endereco = $linha["ENDRESID"];
			 $numero   = $linha["NUMERO"];
			 $bairro   = substr($linha["BAIRRORES"],1,25);
			 $cep      = $linha["CEPRES"];
			 $categ    = $linha["CATEGORIA"];


		     if ($faz == 1){
		        ?>
			    <td valign=top width=50px>     <b>Matricula</b>
				<td width=280px align="left">  <b>Nome Sócio</b>
				<td width=280px>               <b>Endereço</b>
				<td width=100px>               <b>Bairro</b>
				<td width=100px align="center"><b>Cep</b>
				<td>                           <b>Categ</b>
		        <?
		        $faz = 0;
		     }
      
                       if ($negrita==1){ 
                         ?>
		                 <tr> 
			             <td  align='right'><font style=' font-family: Verdana; font-size: 8px;'><b><?=$cod;?><?=$nu;?>&nbsp;&nbsp;&nbsp;&nbsp;</b>
						 <td align='left'>            <font style=' font-family: Verdana; font-size: 8px;'>   <?=$cond;?>&nbsp;&nbsp;<?=$nome;?>
						 <td>               		  <font style=' font-family: Verdana; font-size: 8px;'>   <?=$rua;?>&nbsp;&nbsp;<?=$endereco;?>,<?=$numero;?>
						 <td align='left'>  		  <font style=' font-family: Verdana; font-size: 8px;'>   <?=$bairro;?>
						 <td align='center'>		  <font style=' font-family: Verdana; font-size: 8px;'>   <?=$cep;?>
						 <td align='center'> 		  <font style=' font-family: Verdana; font-size: 8px;'>   <?=$categ;?>
						 </font>
						 </td>
						 <? 
			            $conta_p = $conta_p + 1;
			            $rec_nu = $rec_nu + 1;
			            
			            $negrita = 0;
			            }else{
                        ?>
		                 <tr bgcolor="#C0C0C0"> 
			             <td  align='right'><font style=' font-family: Verdana; font-size: 8px;'><b><?=$cod;?><?=$nu;?>&nbsp;&nbsp;&nbsp;&nbsp;</b>
						 <td align='left'>            <font style=' font-family: Verdana; font-size: 8px;'>   <?=$cond;?>&nbsp;&nbsp;<?=$nome;?>
						 <td>               		  <font style=' font-family: Verdana; font-size: 8px;'>   <?=$rua;?>&nbsp;&nbsp;<?=$endereco;?>,<?=$numero;?>
						 <td align='left'>  		  <font style=' font-family: Verdana; font-size: 8px;'>   <?=$bairro;?>
						 <td align='center'>		  <font style=' font-family: Verdana; font-size: 8px;'>   <?=$cep;?>
						 <td align='center'> 		  <font style=' font-family: Verdana; font-size: 8px;'>   <?=$categ;?>
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
		   <td></td>
           <td>Total de Registros Pesquisado.:   <?=$rec_nu;?></td>
</div>
</body>