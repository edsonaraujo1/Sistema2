<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Update Cadastro 
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

$log_ssoc = $nome3;
$hora = date("d/m/Y"); 
$sexo = " ";
$campo1 = 'Alterado';
$campo2 = 0;

?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

<?

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$nome3a = strtolower($nome3);
// Abre Tabela Tenporaria

$consulta0  = "SELECT * FROM $nome3a WHERE Nome1 = '$nome3a'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$Edit0      = trim(strtoupper(retirar_carac2(@$row0["Edit0"])));
$Edit1      = trim(strtoupper(retirar_carac2(@$row0["Edit1"])));
$Edit2		= trim(strtoupper(retirar_carac2(@$row0["Edit2"])));
$Edit3		= trim(strtoupper(retirar_carac2(@$row0["Edit3"])));
$Edit4		= trim(strtoupper(retirar_carac2(@$row0["Edit4"])));
$Edit5		= trim(strtoupper(retirar_carac2(@$row0["Edit5"])));
$Edit6		= trim(strtoupper(retirar_carac2(@$row0["Edit6"])));
$Edit7		= trim(strtoupper(retirar_carac2(@$row0["Edit7"])));
$Edit8		= trim(strtoupper(retirar_carac2(@$row0["Edit8"])));
$Edit9		= trim(strtoupper(retirar_carac2(@$row0["Edit9"])));
$Edit10	    = trim(strtoupper(retirar_carac2(@$row0["memo1"])));
$Edit12		= trim(strtoupper(retirar_carac2(@$row0["Edit12"])));
$Edit13		= trim(strtoupper(retirar_carac2(@$row0["Edit13"])));
$alerta_1   = trim(strtoupper(retirar_carac2(@$row0["mensage1"])));
$nome_adm   = trim(strtoupper(retirar_carac2(@$row0["mensage3"])));
$id         = trim(strtoupper(retirar_carac2(@$row0["mensage6"])));

$Edit10 = str_replace('.', '.'.chr(13),$Edit10);

$menssagens = "* * * Alterado * * *";

if ($Edit1  == '.'){	$Edit1  = '';}
if ($Edit2  == '.'){	$Edit2  = '';}
if ($Edit3  == '.'){	$Edit3  = '';}
if ($Edit4  == '.'){	$Edit4  = '';}
if ($Edit5  == '.'){	$Edit5  = '';}
if ($Edit6  == '.'){	$Edit6  = '';}
if ($Edit7  == '.'){	$Edit7  = '';}
if ($Edit8  == '.'){	$Edit8  = '';}
if ($Edit9  == '.'){	$Edit9  = '';}
if ($Edit10 == '.'){	$Edit10 = '';}
if ($Edit11 == '.'){	$Edit11 = '';}
if ($Edit12 == '.'){	$Edit12 = '';}
if ($Edit13 == '.'){	$Edit13 = '';}
if ($Edit14 == '.'){	$Edit14 = '';}
if ($Edit15 == '.'){	$Edit15 = '';}
if ($Edit16 == '.'){	$Edit16 = '';}
if ($Edit17 == '.'){	$Edit17 = '';}
if ($Edit18 == '.'){	$Edit18 = '';}
if ($Edit19 == '.'){	$Edit19 = '';}
if ($Edit20 == '.'){	$Edit20 = '';}

if(strlen($Edit0)<=0){
  $Edit0 = 0;
}
if($Edit0 == "."){
  $Edit0 = 0; 	
}

if(strlen($Edit12)<=0){
  $Edit12 = 0;
}
if($Edit12 == "."){
  $Edit12 = 0; 	
}


			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 

$log2 = "Alterado em ".date("H:i:s")." por ".$nome3." as ".date("H:i:s");

$nome3_list = strtolower(trim("lista_".$nome3));

// retorna uma pesquisa

$consulta = "UPDATE $nome3_list SET codigo        = '$Edit0',
								    codigo2       = '$Edit12',
								    data          = '$Edit13',
                                    proprietario  = '$nome3',
								    nome          = '$Edit1',
								    rua           = '$Edit2',
								    endereco      = '$Edit3',
                                    numero        = '$Edit4',
								    bairro        = '$Edit5',
								    cep           = '$Edit6',
								    uf            = '$Edit7',      
								    funcao        = '$Edit8',    
								    condominio    = '$Edit9',   
								    obs           = '$Edit10',  
								    log           = '$log2'  WHERE id = '$id'";


@mysql_query($consulta, $link) or


die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Alteração !!! ***</b>
     <table align=center>
     <form method='POST' action='cadastro.php?cod_5=$id'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagens."/".$Edit12;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);


// Abrir tabela Senha

$tabela_1 = strtoupper($nome3_list);

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

?>

<html>


<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style>

<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 495px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php?cod_5=<?=$id;?>">
          <td><input type=image name="Voltar" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>
	
 
<?
include("layout.php");
?>

</body>
</html>
<?

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac2($var){

$var = ereg_replace("[ÁÀÂÃ]",      "A",$var);
$var = ereg_replace("[áàâãª]",     "a",$var);
$var = ereg_replace("[ÉÈÊ]",       "E",$var);
$var = ereg_replace("[éèê]",       "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",      "O",$var);
$var = ereg_replace("[óòôõº]",     "o",$var);
$var = ereg_replace("[ÚÙÛ]",       "U",$var);
$var = ereg_replace("[úùû]",       "u",$var);
$var = ereg_replace("[?*#'´`!$%¨]"," ",$var);
$var = str_replace("Ç",            "C",$var);
$var = str_replace("ç",            "c",$var);

return($var);
}

?>