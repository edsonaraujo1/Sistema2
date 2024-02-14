<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Relatorio na Tela Oposicao
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/


include("logar.php");
@session_start();
$nome3  = $_SESSION["nome_log"];

$Titulo_rel2 = "Listagem de Carta de Oposição";
$Pagina      = 1;
$conta_p     = 0;

?>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body>
</html>

<?php

// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br> 

     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='<?php echo $color_bor ?>'>
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


@mysql_select_db($db)
        or

die("
     <br>
     <br> 

     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='<?php echo $color_bor ?>'>
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

$consulta  = "SELECT * FROM oposicao ORDER BY nomeassoc";

$resultado = @mysql_query($consulta)
        or 

die("
     <br>
     <br> 

     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='<?php echo $color_bor ?>'>
     <tr>
     <td>
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='cadopos.php'>
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
     <form method='POST' action='cadopos.php'>
     <td>";
?>	
     <div align='left'>
	 <table  border=0  collspan='2' height=3px align='left' >
	 <tr>
	 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
	 </tr>
	 <tr>
	 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
	 <table  border=0  collspan='2' align='left' >
	 <td width=500px >
	 <font style=' font-family: Verdana; font-size: 10px;'><?php echo $Titulo ?></font>
	 </td>
	 <td width=473px align='right'>
	 <font style=' font-family: Verdana; font-size: 12px;'>Página.:<?php echo $Pagina ?></font>
	 </td>
	 </table>
	 <tr>
	 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
	 </tr>
	 <tr>
	 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
	 <table  border=0  collspan='3' align='center' >
	 <td width=500px align='center'>
	 <b><?php echo $Titulo_rel2 ?></b>
	 </td>
	 </table>
	 <tr>
	 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
	 </tr>
	 <tr>
	 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
	 </tr>
	 </table>
     </div>
	 <input type=image name='incluir' src='imagens/botao_voltar.PNG'/></td>
     </form>
     <div align=center>
     <table align=center border='0' bgcolor='#FFFFFF' bordercolor ='<?php echo $color_bor ?>'>
     <tr>
     <td>
     <table border='0' align=center>
<?php	 
     while ($linha = @mysql_fetch_array($resultado))
       {

		     $id       = $linha["cod"];
			 $cod      = $linha["rgassoc"];
			 $data     = $linha["codedif"];
			 $cond     = $linha["adms"];
			 $nome     = $linha["matricula"];
			 $rua      = $linha["nu1"];
			 $endereco = $linha["nomeassoc"];
			 $numero   = $linha["categoria"];


		     if ($faz == 1){
		        ?>
			    <td valign=top width=150px><b>R.G.:</b><td width=150px align="center"><b>Matricula</b><td width=450px><b>Nome</b><th><b>Categoria</b></td>
		        <?php
		        $faz = 0;
		     }
      
		        if ($conta_p < 57){
		           echo "
		                 <tr> 
			             <td valign=top><b>$cod</b><td align='center'>$nome$rua<td>$endereco<td align='center'>$numero</td> 
			            ";
			            $conta_p = $conta_p + 1;
			            $rec_nu = $rec_nu + 1;
		        }else{
		        	 $Pagina = $Pagina + 1;
		             ?>	
		             <div align="left">
		             <table>
					 <tr>
					 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
					 </tr>
					 <tr>
					 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
					 </tr>
					 <tr>
					 <td style=' font-family: Verdana; font-size: 35px;  height:1px;' width:500px;><img height=0 src="imagens/2.gif" width=0 border=0/>
					 </tr>
		             </table>
					 <table  border=0  collspan='2' height=3px align='left' >
					 <tr>
			         <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
					 </tr>
					 <tr>
			         <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
					 <table  border=0  collspan='2' align='left' >
					 <td width=500px >
					 <font style=' font-family: Verdana; font-size: 10px;'><?php echo $Titulo_rel1 ?></font>
					 </td>
					 <td width=473px align='right'>
					 <font style=' font-family: Verdana; font-size: 12px;'>Página.:<?php echo $Pagina ?></font>
					 </td>
					 </table>
					 <tr>
			         <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
					 </tr>
					 <tr>
			         <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
					 <table  border=0  collspan='3' align='center' >
					 <td width=500px align="center">
					 <b><?php echo $Titulo_rel2 ?></b>
					 </td>
					 </table>
					 <tr>
			         <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
					 </tr>
					 <tr>
			         <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
					 </tr>
					 </table>
		             </div>
		             </table>
		             </td>
		             </tr>
		             </table>
		             <table align=center border='0' bgcolor='#FFFFFF' bordercolor ='<?php echo $color_bor ?>'>
		             <tr>
		             <td>
		             <table border='0' align=center>
			         <td valign=top width=150px><b>R.G.:</b><td width=150px align="center"><b>Matricula</b><td width=450px><b>Nome</b><th><b>Categoria</b></td>
			         <?php
					 $conta_p = 0;		
				}
 
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
		   <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
		   </tr>
		   <tr>
		   <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0/>
		   </tr>
		   </table>
           <table border=0  align=left>  
           <td>Total de Registros Pesquisado.:   <?php echo $rec_nu ?></td>
</div>
</body>
