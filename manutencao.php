<?php

/**
 * @author holodek
 * @copyright 2013
 */
?>

<script language='JavaScript'><!--
		    document.onkeydown = keyCatcher;
			function keyCatcher() 
			{
			   var e = event.srcElement.tagName;
			
			   if (event.keyCode == 8 && e != 'INPUT' && e != 'TEXTAREA') 
			   {
			      event.cancelBubble = true;
			      event.returnValue = false;
			   }
			}
</script>

<?php

include('menu_info.php');

//  Chama o Banco de Dados
$consulta_zon1  = "SELECT * FROM time_zone ORDER BY zone_id ASC LIMIT 0,1";

$result_zo1 = @mysql_query($consulta_zon1);

$row_zo1 = @mysql_fetch_array($result_zo1)

    or die("
			<body text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0 background='$logo_sis'>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** ERRO NA ESTALAÇÃO DO PROGRAMA !!! ***<br>
				                     Não e possivel executar o modulo principal<br>
									 contate o ADMINISTRADOR DO SISTEMA</b>
			<table align=center>
			<form method='POST' action='login.php'>
			<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
			</form>  
			</table>
			</td>
			</tr>
			</table>
			</div>
			</body>"); 

$id_zo1       = @$row_zo1["zone_id"];
$id_dat       = @$row_zo1["id_date"];

$dat_zo1 = date("d/m/Y");

if ($id_zo1 < 366){  // 1 Ano

   if ($id_dat != $dat_zo1)
   {
       $id_zo1  = $id_zo1 + 1;
       $sql_id_seek = "UPDATE `time_zone` SET zone_id = '". anti_sql_injection($id_zo1) ."', id_date = '". anti_sql_injection($dat_zo1) ."'"; 
	
   }
	 
@mysql_query($sql_id_seek,$conn);
  
 
}else{
// Salva Nome do Usuario	
@session_start();	
$_SESSION['nome_user_1'] = addslashes($nome2);

?>

<script>
function janelaSecundaria3 (URL){ 
   window.open(URL,"janela3","width=675,height=395,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 
</script>
	        <?php
	        //include_once('menu_info.php');
	        ?>
            <html>
			<head>
			<title>EXPIROU !!!</title>
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
			
			    A:link,a:active,a:visited{ color:#000000; text-decoration:none; }
			    A:hover{ color:#FF3333; text-decoration:none; }
				A:visited {color:#0000cc;}
				A:active {color:#0000cc;}
			
				A.clase1:visited {color:#000000;}
				A.clase1:active {color:#000000;} 
				A.clase1:link {color:#000000}
				A.clase1:hover {color:#FFFFFF}
			
			</style>	

			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC' bordercolor ='<?php echo $color_bor ?>'>
			<tr>
			<td align=center>
			     <font face=arial><b>&nbsp;&nbsp;*** <font color = #FF0000>ERRO AO ACESSAR O SISTEMA</font> (erro nº 9) ***&nbsp;&nbsp;<br/>
				                     &nbsp;&nbsp;Sistema necessita de manutenção risco de&nbsp;&nbsp;<br />
									 &nbsp;&nbsp;  perda de dados entre em contato com o &nbsp;&nbsp;<br/>
								              ADMINISTRADOR DO SISTEMA </b>
			<table align=center>
			<form method='POST' action="javascript:janelaSecundaria3('upper.php')">
			<td><input type=image name='consulta' src='imagens/botaoazul45.PNG'/></td>
			</form>  
			<form method='POST' action="login.php">
			<td><input type=image name='consulta' src='imagens/botao_voltar.PNG'/></td>
			</form>  
			</table>
			</td>
			</tr>
			</table>
			</div>
			</body>
			</html>

<?php
			@mysql_close();   
			exit(); 	
}


?>