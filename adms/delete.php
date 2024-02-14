<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Excluir Cadastro Empresa
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

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

$data1 = date("d/m/Y");
$hora  = date("H:i:s");
$log_ssoc = $nome3." em ".$data1; 
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
$menssagens = "*** Excluido ***";

// Abre Conexão com o MySql
include("../conexao.php");
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

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
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

$consulta0  = "SELECT * FROM adms WHERE id = '". anti_sql_injection($_GET['Cod_2']) ."'";

$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$id     = trim(strtoupper(retirar_carac_a(@$row0["id"])));
$Edit1  = trim(strtoupper(retirar_carac_a(@$row0["cod"])));
$Edit2  = trim(strtoupper(retirar_carac_a(@$row0["ativa"])));
$Edit3  = trim(strtoupper(retirar_carac_a(@$row0["data"])));
$Edit4  = trim(strtoupper(retirar_carac_a(@$row0["nome1"])));
$Edit5  = trim(strtoupper(retirar_carac_a(@$row0["nomeadm"])));
$Edit6  = trim(strtoupper(retirar_carac_a(@$row0["rua"])));
$Edit7  = trim(strtoupper(retirar_carac_a(@$row0["endadm"])));
$Edit8  = trim(strtoupper(retirar_carac_a(@$row0["numero"])));
$Edit9  = trim(strtoupper(retirar_carac_a(@$row0["cep"])));
$Edit10 = trim(strtoupper(retirar_carac_a(@$row0["bairroadm"])));
$Edit11 = trim(strtoupper(retirar_carac_a(@$row0["ufadm"]))); 
$Edit12 = trim(strtoupper(retirar_carac_a(@$row0["cgc"])));
$Edit13 = trim(strtoupper(retirar_carac_a(@$row0["fone"])));
$Edit14 = trim(strtoupper(retirar_carac_a(@$row0["nu_pred"])));
$Edit15 = trim(strtoupper(retirar_carac_a(@$row0["zona"])));
$Edit16 = trim(retirar_carac_a(@$row0["email"]));
$Edit17 = trim(strtoupper(retirar_carac_a(@$row0["t_mail"])));
$Edit18 = trim(retirar_carac_a(@$row0["obs"]));

if(strlen($Edit14)<=0){
  $Edit14   = 0; 	
}

$date_1 = date("d/m/Y")."-".date("H:i:s");

// Salva Registro excluido em tabela temporaria
$consulta1 = "INSERT INTO adms_excluido (cod,
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
									    obs,
										hora,
										log_ssoc)
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
									'$Edit18',
									'$date_1',
									'$nome3')";
		
@mysql_query($consulta1, $link);

// Exclui Edificio
$consulta2 = "DELETE FROM adms WHERE id = '". anti_sql_injection($_GET['Cod_2']) ."'";

@mysql_query($consulta2, $link);

$consulta4  = "SELECT * FROM adms ORDER BY id ASC LIMIT 0,50";

$resultado4 = @mysql_query($consulta4);

$row4 = @mysql_fetch_array($resultado4);

$id      = @$row["id"];


// Abrir tabela Senha

$tabela_1 = strtoupper('adms');

$consulta5 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado5 = @mysql_query($consulta5);

$row5 = @mysql_fetch_array($resultado5);

$per1       = @$row5["incluir"];
$per2       = @$row5["alterar"];
$per3       = @$row5["excluir"];
$per4       = @$row5["imprimir"];


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagem."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);

?>

<html>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<?php
include("layout.php");
?>


<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 475px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php">
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

Function retirar_carac_a($var){

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
