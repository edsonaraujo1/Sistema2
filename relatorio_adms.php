<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Relatorio na Tela Adms
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

include("logar.php");
@session_start();
$nome3  = $_SESSION["nome_log"];

include("vaurls.php");

$deixar = acesso_url("REL_ADMS");

if ($deixar == "SIM"){

$Titulo_rel2 = "Cadastro de Administradora";
$Pagina      = 1;
$conta_p     = 0;

//include("index.php");

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

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
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

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
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

$consulta  = "SELECT * FROM adms ORDER BY cod";

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
     <form method='POST' action='cadadms.php'>
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
	 <font style=' font-family: Verdana; font-size: 10px;'><?php echo $Titulo ?></font>
	 </td>
	 <td width=473px align='right'>
	 <font style=' font-family: Verdana; font-size: 12px;'>Página.:<?php echo $Pagina ?></font>
	 </td>
	 </table>
	 <tr>
	 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0>
	 </tr>
	 <tr>
	 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0>
	 <table  border=0  collspan='3' align='center' >
	 <td width=500px align='center'>
	 <b><?php echo $Titulo_rel2 ?></b>
	 </td>
	 </table>
	 <tr>
	 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0>
	 </tr>
	 <tr>
	 <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="imagens/2.gif" width=978 border=0>
	 </tr>
	 </table>
     </div>
	 <input type=image name='incluir' src='imagens/botao_voltar.PNG'></td>
     </form>
     <div align=center>
     <table align=center border='0' bgcolor='#FFFFFF' bordercolor ='<?php echo $color_bor ?>'>
     <tr>
     <td>
     <table border='0' align=center>
<?php	 
     while ($linha = @mysql_fetch_array($resultado))
       {

		     $cod      = $linha["cod"];
			 $cond     = Trim($linha["nome1"]);
			 $nome     = Trim($linha["nomeadm"]);
			 $rua      = $linha["rua"];
			 $endereco = $linha["endadm"];
			 $numero   = $linha["numero"];
			 $bairro   = $linha["bairroadm"];
			 $cep      = $linha["fone"];
			 $adms     = $linha["ativa"];

             // Soma Nº de Registros da Consulta
             $query = "select * from edificios where ADM = '$cod'";
             $result = @mysql_query ($query, $link);
             if (@mysql_num_rows($result) > 0); //linha 23
             {
	            $qtd_edif = @mysql_num_rows($result);
             }	


		     if ($faz == 1){
		        ?>
			    <td valign=top width=50px>     <b>Codigo</b>
				<td width=350px align="left">  <b>Nome</b>
				<td width=280px>               <b>Endereço</b>
				<td width=100px>               <b>Bairro</b>
				<td width=100px align="center"><b>Fone</b>
				<th>                           <b>Edif</b></td>
		        <?php
		        $faz = 0;
		     }
      
		           echo "
		                 <tr> 
			             <td valign=top align='right'><font style=' font-family: Verdana; font-size: 8px;'><b>$cod&nbsp;&nbsp;&nbsp;&nbsp;</b>
						 <td align='left'>            <font style=' font-family: Verdana; font-size: 8px;'>   $cond&nbsp;&nbsp;$nome
						 <td>               		  <font style=' font-family: Verdana; font-size: 8px;'>   $rua&nbsp;&nbsp;$endereco,$numero
						 <td align='left'>  		  <font style=' font-family: Verdana; font-size: 8px;'>   $bairro
						 <td align='center'>		  <font style=' font-family: Verdana; font-size: 8px;'>   $cep
						 <td align='right'> 		  <font style=' font-family: Verdana; font-size: 8px;'>   $qtd_edif
						 </font>
						 </td> 
			            ";
			            $rec_nu = $rec_nu + 1;
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
           <td>Total de Registros Pesquisado.:   <?php echo $rec_nu ?></td>
</div>
</body>
<?php
}else{
	
include("enaaurlnp.php");
	
}
?>