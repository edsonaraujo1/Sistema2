<?
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

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

require("menu.php");

$data1 = date("d/m/Y");
$hora  = date("H:i:s");
$log_ssoc = $nome3." em ".$data1; 
?>

<html>
<head>
<title><?=$Titulo;?></title>
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
$menssagens = "*** Excluido ***";

// Abre Conexão com o MySql
include($path."conexao.php");
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

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
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

$consulta0  = "SELECT * FROM oposicao3 WHERE id = '$Cod_2'";

$resultado0 = @mysql_query($consulta0);

$row0 = mysql_fetch_array($resultado0);

$id     = trim(strtoupper(retirar_carac_2(@$row0["id"])));
$Edit1  = trim(strtoupper(retirar_carac_2(@$row0["COD"])));
$Edit2  = trim(strtoupper(retirar_carac_2(@$row0["DAT2"])));
$Edit3  = trim(strtoupper(retirar_carac_2(@$row0["DATINSC"])));
$Edit4  = trim(strtoupper(retirar_carac_2(@$row0["RGASSOC"])));
$Edit5  = trim(strtoupper(retirar_carac_2(@$row0["CPF"])));
$Edit6  = trim(strtoupper(retirar_carac_2(@$row0["CODP"])));
$Edit7  = trim(strtoupper(retirar_carac_2(@$row0["CATEGORIA"])));
$Edit8  = trim(strtoupper(retirar_carac_2(@$row0["NOMEASSOC"])));
$Edit9  = trim(strtoupper(retirar_carac_2(@$row0["ENDRESID"])));
$Edit10 = trim(strtoupper(retirar_carac_2(@$row0["CEPRES"])));
$Edit11 = trim(strtoupper(retirar_carac_2(@$row0["CODEDIF"])));
$Edit12 = trim(strtoupper(retirar_carac_2(@$row0["CNPJ"])));
$Edit13 = trim(strtoupper(retirar_carac_2(@$row0["ADMS"])));
$Edit14 = trim(strtoupper(retirar_carac_2(@$row0["CNPJ2"])));
$Edit15 = trim(strtoupper(retirar_carac_2(@$row0["OBS"])));

if(strlen($Edit11)<=0){
  $Edit11   = 0; 	
}
if(strlen($Edit13)<=0){
  $Edit13   = 0; 	
}

$Edi_zero = 0;

$date_1 = date("d/m/Y")."-".date("H:i:s");

// Salva Registro excluido em tabela temporaria

$consulta1 = "INSERT INTO oposicao_excluido    (COD,
                                     			DAT2,
								     			DATINSC,
											    RGASSOC,
											    CPF,
											    CODP,
											    CATEGORIA,
											    NOMEASSOC,
										 	  	ENDRESID,
										 		CEPRES,
												CODEDIF,
												CNPJ,
												ADMS,
												CNPJ2,
												OBS,
												MATRICULA,
												LOG_SSOC,
												HORA)
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
									'$Edi_zero',
									'$nome3',
									'$date_1')";
		
@mysql_query($consulta1, $link)

or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Falha na Inclusao !!! ***</b>
     <table align=center>
     <form method='POST' action='cadastro.php'>
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// Exclui Edificio
$consulta2 = "DELETE FROM oposicao3 WHERE id = '$Cod_2'";

@mysql_query($consulta2, $link);

$consulta4  = "SELECT * FROM oposicao3 ORDER BY id ASC LIMIT 0,50";

$resultado4 = @mysql_query($consulta4);

$row4 = mysql_fetch_array($resultado4);

$id      = @$row["id"];

// Abrir tabela Senha

$consulta5 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado5 = @mysql_query($consulta5);

$row5 = mysql_fetch_array($resultado5);

$opo1       = @$row5["opo1"];
$opo2       = @$row5["opo2"];
$opo3       = @$row5["opo3"];

// Abre Tabela Categoria

$consulta1  = "SELECT * FROM categ Where CODIGO = '$Edit7'";

$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$categ_1   = @$row1["DESCRICAO"];

// Abrir Table de Edificios

$consulta2  = "SELECT * FROM edificios Where COD = '$Edit11'";

$resultado2 = @mysql_query($consulta2);

$row2 = @mysql_fetch_array($resultado2);

$cod_edif   = @$row2["COD"];
$cond  = trim(@$row2["COND"].@$row2["NOME"]);
$edif  = trim(@$row2["Nome"]);

$nome_do_edif = $cond;

// Abrir tabela Administradora

$consulta3 = "SELECT * FROM adms WHERE cod = '$Edit13'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$nome1_adms  = @$row3["nome1"];
$nome2_adms  = @$row3["nomeadm"];

			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagens."/Oposicao/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);

?>

<html>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<?
require("layout.php");
?>


<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 475px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php">
          <td><input type=image name="Voltar" src="imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>
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

Function retirar_carac_2($var){

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