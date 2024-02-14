<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Relatorio de Oposicao no formato Excel
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/
// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

unset ($_SESSION['Faz_uma']);

include("../logar.php");

$nome3  = $_SESSION["nome_log"];

include("vaurls.php");

$deixar = acesso_url("CADATENDI_SOC");

if ($deixar == "SIM"){


header('Content-type: application/vnd.ms-excel');
header('Content-type: application/force-download');
header('Content-Disposition: attachment; filename=rel_opos.xls');
header('Pragma: no-cache');


$Titulo_rel2 = "Relatorio de Atendimento ao Socio";
$Pagina      = 1;
$conta_p     = 0;
$data_rel    = date("d/m/Y");

//include("index.php");

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

// retorna uma pesquisa

$Cod_2a = $Cod_2 + 300;

$consulta  = "SELECT * FROM atendimento_soc ORDER BY NOMEASSOC";

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
     <form method='POST' action='cadopos.php'>
     <td><input type=image name='Consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $Titulo_rel2;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);


$faz = 1;
$negrita = 1;

     ?>	
     <td></td>
     <td><b><?=$Titulo;?></b></td><br/><br/>
     <td><b><?=$data_rel;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$Titulo_rel2;?></b></td>

     <table border='0' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <table border='0' >
     <?	 
     while ($linha = @mysql_fetch_array($resultado))
       {

		     $id       = $linha["COD"];
			 $cod      = $linha["RGASSOC"];
			 $cpf      = $linha["CPF"];
			 $cond     = $linha["ADMS"];
			 $nome     = $linha["CODP"];
			 $rua      = $linha["NU1"];
			 $endereco = $linha["NOMEASSOC"];
			 $numero   = $linha["CATEGORIA"];
			 $histo    = $linha["OBS"];
			 if ($numero == "O"){
			 	$desc = "OPOSICAO";
			 }
			 if ($numero == "C"){
			 	$desc = "CONTRIBUINTE";
			 }
			 if ($numero == "D"){
			 	$desc = "DESISTENTE";
			 }
			 if ($numero == " "){
			 	$desc = " ";
			 }
			 

		     if ($faz == 1){
		        ?>
		        
                <td align='left' width=150px><b>C.P.F.:</b>
				<td width=18px align='left'><b>R.G.:</b>
				<td width=14px align="center"><b>Matricula</b>
				<td width=45px><b>Nome</b>
				<th><b>Categoria</b>
				<th><b>Adms</b>
				<th><b>Historico</b></td>		        
		        
		        <?
		        $faz = 0;
		     }
      
					  if ($negrita==1){
		                 ?>	
		                 
		                 <tr> 
			             <td align='left'>     <font style=' font-family: Verdana; font-size: 8px;'><b><?=$cpf;?></b>
						 <td align='left'>     <font style=' font-family: Verdana; font-size: 8px;'><b><?=$cod;?></b>
						 <td align='center'>   <font style=' font-family: Verdana; font-size: 8px;'><?=$nome;?>
						 <td>                  <font style=' font-family: Verdana; font-size: 8px;'><?=$endereco;?>
						 <td align='center'>   <font style=' font-family: Verdana; font-size: 8px;'><?=$desc;?>
						 <td align='right'>   <font style=' font-family: Verdana; font-size: 8px;'><?=$cond;?>
						 <td align='right'>   <font style=' font-family: Verdana; font-size: 8px;'><?=$histo;?></td> 
		                 
						 </font>
						 </td>
						 <? 
			             $conta_p = $conta_p + 1;
			             $rec_nu = $rec_nu + 1;
	                    
						 $negrita = 0;		            
			             }else{
			             ?>	
		                 <tr bgcolor="#C0C0C0"> 
			             <td align='left'>     <font style=' font-family: Verdana; font-size: 8px;'><b><?=$cpf;?></b>
						 <td align='left'>     <font style=' font-family: Verdana; font-size: 8px;'><b><?=$cod;?></b>
						 <td align='center'>   <font style=' font-family: Verdana; font-size: 8px;'><?=$nome;?>
						 <td>                  <font style=' font-family: Verdana; font-size: 8px;'><?=$endereco;?>
						 <td align='center'>   <font style=' font-family: Verdana; font-size: 8px;'><?=$desc;?>
						 <td align='right'>   <font style=' font-family: Verdana; font-size: 8px;'><?=$cond;?>
						 <td align='right'>   <font style=' font-family: Verdana; font-size: 8px;'><?=$histo;?></td> 
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
	       <table border=0  >
	       <tr align=center colspan=2>  ";
           ?>
		   <table>
		   <tr>
		   <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="../imagens/2.gif" width=978 border=0>
		   </tr>
		   <tr>
		   <td style=' font-family: Verdana; font-size: 1px;  height:1px;' width:500px;><img height=1 src="../imagens/2.gif" width=978 border=0>
		   </tr>
		   </table>
		   <td></td>
           <td>Total de Registros Pesquisado.:   <?=$rec_nu;?></td>
</div>
</body>

<?
}else{
	
include("enaaurlnp.php");
	
}
?>