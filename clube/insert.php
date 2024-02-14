<?
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
session_start();
$path = strtoupper($_SESSION['Path1']);

session_cache_expire(180); //5 minutos por exemplo...

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("FORM_TIETE");

if ($deixar == "SIM"){

$log_ssoc = $nome3;
$hora = date("d/m/Y"); 

?>
<script language="JavaScript"><!--

//document.onkeydown = keyCatcher;

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

body { background-image: url(<?="../".$logo_sis;?>);
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

$menssagens = "* * * Incluido * * *";

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

include("funcoes2.php");

$nome3a = strtolower($nome3);

// Abre Tabela Tenporaria

$consulta0  = "SELECT * FROM $nome3a WHERE Nome1 = '$nome3a'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$Edit1      = trim(strtoupper(retirar_carac(@$row0["Edit1"])));
$Edit2		= trim(strtoupper(retirar_carac(@$row0["Edit2"])));
$Edit3		= trim(strtoupper(retirar_carac(@$row0["Edit3"])));
$Edit4		= trim(strtoupper(retirar_carac(@$row0["Edit4"])));
$Edit5		= trim(strtoupper(retirar_carac(@$row0["Edit5"])));
$Edit6		= trim(strtoupper(retirar_carac(@$row0["Edit6"])));
$Edit7		= trim(strtoupper(retirar_carac(@$row0["Edit7"])));
$Edit8		= trim(strtoupper(retirar_carac(@$row0["Edit8"])));
$Edit9		= trim(strtoupper(retirar_carac(@$row0["Edit9"])));
$Edit10		= trim(strtoupper(retirar_carac(@$row0["Edit10"])));
$Edit11		= trim(strtoupper(retirar_carac(@$row0["Edit11"])));
$Edit12		= trim(strtoupper(retirar_carac(@$row0["Edit12"])));
$Edit13	    = trim(strtoupper(retirar_carac(@$row0["Edit13"])));
$Edit14		= trim(strtoupper(retirar_carac(@$row0["Edit14"])));
$Edit15		= trim(strtoupper(retirar_carac(@$row0["Edit15"])));
$Edit16		= trim(strtoupper(retirar_carac(@$row0["Edit16"])));
$Edit17		= trim(strtoupper(retirar_carac(@$row0["Edit17"])));
$Edit18		= trim(retirar_carac(@$row0["Edit18"]));
$Edit19		= trim(strtoupper(retirar_carac(@$row0["Edit19"])));
$Edit20		= trim(strtoupper(retirar_carac(@$row0["Edit20"])));
$Edit21		= trim(strtoupper(retirar_carac(@$row0["Edit21"])));
$Edit22		= trim(retirar_carac(@$row0["memo1"]));
$Edit23     = trim(retirar_carac(@$row0["Edit22"]));
$alerta_1   = trim(strtoupper(retirar_carac(@$row0["mensage1"])));
$nome_adm   = trim(strtoupper(retirar_carac(@$row0["mensage3"])));
$id_a       = trim(retirar_carac(@$row0["mensage6"]));

$cami2 = '../imagens/fotos/Branco.bmp';  

//CODIGO = '$Edit1' AND 

$consulta0i  = "SELECT * FROM clube_tiete WHERE MATRICULA = '$Edit2' AND NOME = '$Edit4'";
					
$resultado0i = @mysql_query($consulta0i);
					
$row0i = @mysql_fetch_array($resultado0i);
					
$id      = @$row0i["id"];
$cod_2   = @$row0i["CODIGO"];
					

//echo $Edit1."<br>";
//echo $Edit2."<br>";
//echo $Edit21."<br>";
//echo $cod_2."<br>";

//break;
					
if (!empty($cod_2)){
	
		echo ("
			
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Socio ou Dependente ja consta no Cadastro !!! ***</b>
		     <table align=center>
		     <form method='POST' action='cadastro.php?Cod_xxx=$id'>
		     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
             exit;
					
}



$consulta0a  = "SELECT * FROM clube_tiete WHERE MATRICULA = '$Edit2' ORDER BY N_LETRA DESC";

$resultado0a = @mysql_query($consulta0a);

$row0a = @mysql_fetch_array($resultado0a);

$id      = @$row0a["id"];
$cod_2a  = @$row0a["CODIGO"];
$cod_ass = @$row0a["CODIGO"];
$cod_clu = @$row0a["MATRICULA"];
$cod_let = @$row0a["LETRA"];
$N_letA  = @$row0a["N_LETRA"];
			
				
				if (empty($cod_2a)){
					
				
					$consulta0b  = "SELECT * FROM clube_tiete ORDER BY CODIGO DESC LIMIT 0,1";
					
					$resultado0b = @mysql_query($consulta0b);
					
					$row0b = @mysql_fetch_array($resultado0b);
					
					$id      = @$row0b["id"];
					$cod_2b  = @$row0b["CODIGO"];
					

						$Edit1 = $cod_2b+1;
						$N_letX = 1;
				    
                }else{
                	
                	
                	$Edit1 = $cod_ass;
                	$N_letX = $N_letA + 1; 
                }

//echo "Edit1 = ".$Edit1."<br>";


if ($N_letX == "1") { $nov_let = " "; }
if ($N_letX == "2") { $nov_let = "A"; }
if ($N_letX == "3") { $nov_let = "B"; }
if ($N_letX == "4") { $nov_let = "C"; }
if ($N_letX == "5") { $nov_let = "D"; }
if ($N_letX == "6") { $nov_let = "E"; }
if ($N_letX == "7") { $nov_let = "F"; }
if ($N_letX == "8") { $nov_let = "G"; }
if ($N_letX == "9") { $nov_let = "H"; }
if ($N_letX == "10") { $nov_let = "I"; }
if ($N_letX == "11") { $nov_let = "J"; }
if ($N_letX == "12") { $nov_let = "K"; }
if ($N_letX == "13") { $nov_let = "L"; }
if ($N_letX == "14") { $nov_let = "M"; }
if ($N_letX == "15") { $nov_let = "N"; }


/*
echo $Edit1."<br>";
echo $Edit2."<br>";
echo $Edit3."<br>";
echo $Edit4."<br>";
echo $Edit5."<br>";
echo $Edit6."<br>";
echo $Edit7."<br>";
echo $Edit8."<br>";
echo $Edit9."<br>";
echo $Edit10."<br>";
echo $Edit11."<br>";
echo $Edit12."<br>";
echo $Edit13."<br>";
echo $Edit14."<br>";
echo $Edit15."<br>";
echo $Edit16."<br>";
echo $Edit17."<br>";
echo $Edit18."<br>";
echo $Edit19."<br>";
echo $Edit20."<br>";
echo $Edit21."<br>";
echo $Edit22."<br>";
*/


	
		$consulta = "INSERT INTO clube_tiete   (CODIGO,    
												MATRICULA,
												N_LETRA,
												LETRA,  
												DATA,  
												NOME,  
												SEXO,  
												DATNASC,  
												NACION1,  
												NATURA1,  
												ESCOLA,  
												CIVIL,  
												ENDER,  
												BAIRRO,  
												CEP,  
												CIDADE,  
												UF,  
												FONE,  
												CEL,  
												EMAIL,
												CPF,
												RG,
												ORG,  
												OBS)
		                VALUES
		                                  ('$Edit1',
										   '$Edit2',
										   '$N_letX',
										   '$nov_let',
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
										   '$Edit19',
										   '$Edit20',
										   '$Edit21',
										   '$Edit22')";
		
		@mysql_query($consulta, $link) or
		
		die("
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Falha na Inclusão !!! ***</b><br>
		                         *** Erro no: " . @mysql_error() . "!!! ***
		     <table align=center>
		     <form method='POST' action='cadastro.php'>
		     <td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
		     
     
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
session_start();
$_SESSION['navega'] = $Edit1;
     
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

<?

$consulta_in  = "SELECT * FROM clube_tiete WHERE CODIGO = '$Edit1' AND LETRA = '$nov_let' LIMIT 0,1";

$resultado_in = @mysql_query($consulta_in);

$row_in = @mysql_fetch_array($resultado_in);

$id_in      = @$row_in["id"];

include("layout.php");

?>

<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 495px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php?cod_5=<?=$id_in;?>">
          <td><input type=image name="Voltar" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>

<?

}else{
	
include("enaaurlnp.php");
	
}
?>
