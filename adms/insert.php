<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Insert Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

//session_cache_expire(180); //5 minutos por exemplo...

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include_once('../sql_injection.php');

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_ADM");

if ($deixar_1 == "NAO"){
	
    echo "<html>
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
			<form method='POST' action='../avaleht.php?servletjs2=20$$20'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>";
	        exit();
}	

$log_ssoc = $nome3;
$hora = date("d/m/Y"); 

?>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);
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

$menssagens = "* * * Incluido * * *";

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Abre Tabela Tenporaria

$nome3a = strtolower($nome3);

$consulta0  = "SELECT * FROM $nome3a WHERE Nome1 = '$nome3a'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$Edit1      = trim(strtoupper(retirar_carac3(@$row0["Edit1"])));
$Edit2		= trim(strtoupper(retirar_carac3(@$row0["Edit2"])));
$Edit3		= trim(strtoupper(retirar_carac3(@$row0["Edit3"])));
$Edit4		= trim(strtoupper(retirar_carac3(@$row0["Edit4"])));
$Edit5		= trim(strtoupper(retirar_carac3(@$row0["Edit5"])));
$Edit6		= trim(strtoupper(retirar_carac3(@$row0["Edit6"])));
$Edit7		= trim(strtoupper(retirar_carac3(@$row0["Edit7"])));
$Edit8		= trim(strtoupper(retirar_carac3(@$row0["Edit8"])));
$Edit9		= trim(strtoupper(retirar_carac3(@$row0["Edit9"])));
$Edit10	    = trim(strtoupper(retirar_carac3(@$row0["Edit10"])));
$Edit11	    = trim(strtoupper(retirar_carac3(@$row0["Edit11"])));
$Edit12	    = trim(strtoupper(retirar_carac3(@$row0["Edit12"])));
$Edit13	    = trim(strtoupper(retirar_carac3(@$row0["Edit13"])));
$Edit14	    = trim(strtoupper(retirar_carac3(@$row0["Edit14"])));
$Edit15	    = trim(strtoupper(retirar_carac3(@$row0["Edit15"])));
$Edit16	    = trim(retirar_carac3(@$row0["Edit16"]));
$Edit17	    = trim(strtoupper(retirar_carac3(@$row0["Edit17"])));
$Edit18	    = trim(retirar_carac3(@$row0["memo1"]));
$alerta_1   = trim(strtoupper(retirar_carac3(@$row0["mensage1"])));
$categ_1    = trim(strtoupper(retirar_carac3(@$row0["mensage2"])));
$nome_do_edif = trim(strtoupper(retirar_carac3(@$row0["mensage3"])));
$nome_cad_si  = trim(strtoupper(retirar_carac3(@$row0["mensage4"])));

$Edit18 = str_replace('.', '.'.chr(13),$Edit18);

if(strlen($Edit14)<=0){
  $Edit14   = 0; 	
}

$consulta01  = "SELECT * FROM adms WHERE cod = '". anti_sql_injection($Edit1) ."'";

$resultado01 = @mysql_query($consulta01);

$row01 = @mysql_fetch_array($resultado01);

$id      = @$row01["id"];

if (!empty($id)){
	
	echo ("
			
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Codigo ja consta no Cadastro !!! ***</b>
		     <table align=center>
		     <form method='POST' action='cadastro.php?Cod_xx=$id'>
		     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
             exit;
	
// nao incluir codigo ja existe

}else{
	
     // retorna uma pesquisa

	 $consulta02  = "SELECT * FROM adms WHERE cgc = '". anti_sql_injection($Edit12) ."'";

	 $resultado02 = @mysql_query($consulta02);

	 $row02 = @mysql_fetch_array($resultado02);

	 $id    = @$row02["id"];
     $cgc   = @$row02["cgc"];
     
	 if (!empty($cgc)){
		
	 	 echo ("
				
			     <br>
			     <br>
			     
				 <div align=center>
			
			     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
			     <tr>
			     <td>
			     <font face=arial><b>*** CNPJ ja consta no Cadastro !!! ***</b>
			     <table align=center>
			     <form method='POST' action='cadastro.php?Cod_xx=$id'>
			     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
			     </form> 
			     </table>
			     </td>
			     </tr>
			     </table>
			     </div>");
	             exit;
		
	// nao incluir codigo ja existe
	
	}else{

		
$consulta = "INSERT INTO adms      (cod,
                                    ativa,
								    data,
								    nome1,
								    nomeadm,
								    rua,
								    endadm,
								    numero,
									cep,
									bairroadm,
									ufadm,
									cgc,
									fone,
									nu_pred,
									zona,
									email,
									t_mail,
									obs)
                VALUES
                                   ('$Edit1',
								    '$Edit2',
									'$Edit3',
									'$Edit4',
									'$Edit5',
									'$Edit6',
									'$Edit7',
									'$Edit8',
									'$Edit9',
									'$Edit10',
									'$Edit11',
									'$Edit12',
									'$Edit13',
									'$Edit14',
									'$Edit15',
									'$Edit16',
									'$Edit17',
									'$Edit18')";
		
		@mysql_query($consulta, $link) or
		
		die("
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Falha na Inclusão !!! ***</b>
		     <table align=center>
		     <form method='POST' action='cadastro.php'>
		     <td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
}
}
     
			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagens."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);
     

// Elimina Tabela temp
$add0 = "DROP TABLE `$nome3a`";
@mysql_query($add0, $link);

// Salva Secao
@session_start();
$_SESSION['navega'] = $Edit1;
     
?>
<html>
<body  style=" margin-left: 0px;  margin-top: 21px;  margin-right: 0px;  margin-bottom: 0px; ">

<?php
include("layout.php");
?>

<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 495px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php?cod_5=<?php echo $Edit1 ?>">
          <td><input type=image name="Voltar" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>
</body>
</html>

<?php
/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac3($var){

$var = @ereg_replace("[ÁÀÂÃ]",        "A",$var);
$var = @ereg_replace("[áàâãª]",       "a",$var);
$var = @ereg_replace("[ÉÈÊ]",         "E",$var);
$var = @ereg_replace("[éèê]",         "e",$var);
$var = @ereg_replace("[ÓÒÔÕ]",        "O",$var);
$var = @ereg_replace("[óòôõº]",       "o",$var);
$var = @ereg_replace("[ÚÙÛ]",         "U",$var);
$var = @ereg_replace("[úùû]",         "u",$var);
$var = @ereg_replace("[?*#'´`!$%¨;]", " ",$var);
$var = str_replace("Ç",              "C",$var);
$var = str_replace("ç",              "c",$var);
$var = str_replace(" or ",           " ",$var);
$var = str_replace("select ",        " ",$var);
$var = str_replace("delete ",        " ",$var);
$var = str_replace("create ",        " ",$var);
$var = str_replace("drop ",          " ",$var);
$var = str_replace("update ",        " ",$var);
$var = str_replace("drop table",     " ",$var);
$var = str_replace("show table",     " ",$var);
$var = str_replace("applet",         " ",$var);
$var = str_replace("objetc",         " ",$var);

return($var);
}
?>
