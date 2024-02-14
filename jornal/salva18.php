<?php
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Configuracoes do Sistema
 Criado em Data.....: 19/12/2008
 Ultima Atualização : 19/12/2008 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// include("../logar.php");
$nome3 = strtoupper($_SESSION["nome_log"]);

include("menu.php");

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
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?php echo $logo_sis ?>);
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

$codigo   = $_POST['id'];    // id
$Edit1    = $_POST['Edit1']; // Titulo
$Edit2    = $_POST['elm1']; // Texto

$date1   = date('m/d/Y');
$origem1 = trim($_SERVER['REMOTE_ADDR']);

//echo "<br><br><br>".$Edit1."<br>";
//echo $Edit2."<br>";
//echo $codigo."<br>";
//echo $origem1."<br>";

include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);
        
@mysql_select_db($db);

// retorna uma pesquisa

include("../config.php");


   $consulta = "UPDATE form18 SET  titulo     = '$Edit1',
                                   data       = '$date1',
                                   texto      = '$Edit2' WHERE id = '$codigo'";

	
	@mysql_query($consulta, $link) or
	
	die("
	     <style type=text/css>
	      
	     body { background-image: url('../$logo_sis');
	                         background-attachment: fixed }
	     </style>       
	
	     <br>
	     <br>
	     <br>
	
	     <div align=center>
	
	     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
	     <tr>
	     <td>
	     <font face=arial><b>*** Falha no Envio do Texto !!! ***</b>
	     <table align=center>
	     <form method='POST' action='../avaleht.php?servletjs2=20$$20'>
	     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
	     </form> 
	     </table>
	     </td>
	     </tr>
	     </table>
	     </div>");
	     

			echo "
			      <style type=text/css>

                  body { background-image: url('../$logo_sis');
                         background-attachment: fixed }
                  </style>       

			      <br><br><br>
				  <div align=center>
				  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
				  <tr>
				  <td align=center>
				  <font face=arial><b>*** Mensagem Enviada para o site com SUCESSO !!! ***<br></b>
			                    
				  <table align=center>
				  <form method='POST' action='../avaleht.php?servletjs2=20$$20'>
				  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
				  </form>  
				  </table>
				  </td>
				  </tr>
				  </table>
				  </div>";

?>
