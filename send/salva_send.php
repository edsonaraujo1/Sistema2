<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Configuracoes do Sistema
 Criado em Data.....: 19/12/2008
 Ultima Atualização : 19/12/2008 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/
include("../config.php");

$nome3 = strtoupper($_SESSION["nome_log"]);

include("../menu_sub2.php");

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

body { background-image: url(<?=$logo_sis;?>);
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


$Edit1  = $_POST['Edit1'];       // Usuario
$Edit2  = trim($_POST['Edit2']); // Mensagem

$date1   = date('m/d/Y');
$origem1 = trim($_SERVER['REMOTE_ADDR']);


//echo "<br><br><br>".$Edit1."<br>";
//echo "<br><br><br>".$Edit2."<br>";

//echo $date1."<br>";
//echo $origem1."<br>";

include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);
        
@mysql_select_db($db);

// retorna uma pesquisa

if ($Edit1 == 'Todos'){

	$consulta  = "SELECT login FROM tt_ser_01 ";
	
	$resultado = @mysql_query($consulta);

	
	while ($linha = mysql_fetch_array($resultado))
    {
        $nome_user  = $linha["login"];

		$consulta = "INSERT INTO `inform_user` (    `user` ,
												    `mensagem` ,
													`data` ,
													`origem`) 
									
							VALUES ('$nome_user',
									'$Edit2',
									'$date1',
									'$nome3')";
		
		@mysql_query($consulta, $link) or
	
	die("
	     <style type=text/css>
	      
	     body { background-image: url('../$logo_sis');
	                         background-attachment: fixed }
	     </style>       
	
	     <div align=center>
	
	     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
	     <tr>
	     <td>
	     <font face=arial><b>*** Falha no Envio da Mensagem !!! ***</b>
	     <table align=center>
	     <form method='POST' action='send.php'>
	     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
	     </form> 
	     </table>
	     </td>
	     </tr>
	     </table>
	     </div>");

    	
    }	

	 
}else{
	

	$consulta = "INSERT INTO `inform_user` (    `user` ,
											    `mensagem` ,
												`data` ,
												`origem`) 
								
						VALUES ('$Edit1',
								'$Edit2',
								'$date1',
								'$nome3')";
	
	@mysql_query($consulta, $link) or
	
	die("
	     <style type=text/css>
	      
	     body { background-image: url('../$logo_sis');
	                         background-attachment: fixed }
	     </style>       
	
	     <div align=center>
	
	     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
	     <tr>
	     <td>
	     <font face=arial><b>*** Falha no Envio da Mensagem !!! ***</b>
	     <table align=center>
	     <form method='POST' action='send.php'>
	     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
	     </form> 
	     </table>
	     </td>
	     </tr>
	     </table>
	     </div>");
	     
}

			echo "
			      <style type=text/css>

                  body { background-image: url('../$logo_sis');
                         background-attachment: fixed }
                  </style>       

			      
				  <div align=center>
				  <table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
				  <tr>
				  <td align=center>
				  <font face=arial><b>*** Mensagem Enviada para <b> ( $Edit1 ) </b> com SUCESSO !!! ***<br></b>
			                    
				  <table align=center>
				  <form method='POST' action='../menu_1.php?servletjs2=20$$20'>
				  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
				  </form>  
				  </table>
				  </td>
				  </tr>
				  </table>
				  </div>";

?>
