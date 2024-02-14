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

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

$Cod_2 = $_SESSION['id_delete'];

include("menu.php");

$data1 = date("d/m/Y");
$hora  = date("H:i:s");
$log_ssoc = $nome3." em ".$data1; 

$cami2 = '../imagens/fotos/Branco.bmp';  
?>

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

include("funcoes2.php");

$consulta0  = "SELECT * FROM clube_tiete WHERE id = '$Cod_2'";

$resultado0 = @mysql_query($consulta0);

$row0 = mysql_fetch_array($resultado0);

$id      = @$row0["id"];
$Edit1   = @$row0["CODIGO"];    
$Edit2   = trim(strtoupper(retirar_carac(@$row0["MATRICULA"]))); 
$Edit3   = trim(strtoupper(retirar_carac(@$row0["DATA"])));  
$Edit4   = trim(strtoupper(retirar_carac(@$row0["NOME"])));  
$Edit5   = trim(strtoupper(retirar_carac(@$row0["SEXO"])));  
$Edit6   = trim(strtoupper(retirar_carac(@$row0["DATNASC"])));  
$Edit7   = trim(strtoupper(retirar_carac(@$row0["NACION1"])));  
$Edit8   = trim(strtoupper(retirar_carac(@$row0["NATURA1"])));  
$Edit9   = trim(strtoupper(retirar_carac(@$row0["ESCOLA"])));  
$Edit10  = trim(strtoupper(retirar_carac(@$row0["CIVIL"])));  
$Edit11  = trim(strtoupper(retirar_carac(@$row0["ENDER"])));  
$Edit12  = trim(strtoupper(retirar_carac(@$row0["BAIRRO"])));  
$Edit13  = trim(strtoupper(retirar_carac(@$row0["CEP"])));  
$Edit14  = trim(strtoupper(retirar_carac(@$row0["CIDADE"])));  
$Edit15  = trim(strtoupper(retirar_carac(@$row0["UF"])));  
$Edit16  = trim(strtoupper(retirar_carac(@$row0["FONE"])));  
$Edit17  = trim(strtoupper(retirar_carac(@$row0["CEL"])));  
$Edit18  = trim(retirar_carac(@$row0["EMAIL"]));  
$Edit19  = trim(strtoupper(retirar_carac(@$row0["CPF"])));  
$Edit20  = trim(strtoupper(retirar_carac(@$row0["RG"])));  
$Edit21  = trim(strtoupper(retirar_carac(@$row0["ORG"])));  
$Edit22  = trim(retirar_carac(@$row0["OBS"]));  
$Edit23  = trim(strtoupper(retirar_carac(@$row0["LOG"]))); 
$Edit24  = trim(strtoupper(retirar_carac(@$row0["LETRA"]))); 
$Edit25  = trim(strtoupper(retirar_carac(@$row0["N_LETRA"]))); 

if(strlen($Edit14)<=0){
  $Edit14   = 0; 	
}
if(strlen($Edit19)<=0){
  $Edit19   = 0; 	
}

$date_1 = date("d/m/Y")."-".date("H:i:s")." POR ".$nome3;


// Salva Registro excluido em tabela temporaria
	   $consulta1 = "INSERT INTO clube_tiete_ex (CODIGO,
	                                             LETRA,
												 N_LETRA,    
												 MATRICULA,  
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
												OBS,
												LOG)
		                VALUES
		                                  ('$Edit1',
		                                   '$Edit24',
		                                   '$Edit25',
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
										   '$Edit19',
										   '$Edit20',
										   '$Edit21',
										   '$Edit22',
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
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


if (empty($Edit24)){
	

    if ($Faz_xxx == "sim"){
		
		// Exclui Edificio
		$consulta2 = "DELETE FROM clube_tiete WHERE CODIGO = '$Edit1'";
		
		@mysql_query($consulta2, $link);
		
		
	}else{
		
		
		
		echo ("
			
		     <br>
		     <br>
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Atenção todos os Dependetes do codigos $Edit1 serão apagados ? ***</b>
		     <table align=center>
		     <form method='POST' action='delete.php?Faz_xxx=sim'>
		     <td><input type=image name='sim' src='../imagens/botaosim.PNG'></td>
		     </form> 

		     <form method='POST' action='cadastro.php?cod_3=$id'>
		     <td><input type=image name='nao' src='../imagens/botaonao.PNG'></td>
		     </form> 

		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
             exit;

	}	

	//exit;
}else{
	
	// Exclui Edificio
	$consulta2 = "DELETE FROM clube_tiete WHERE id = '$id'";
	
	@mysql_query($consulta2, $link);
	
//	$consulta2f = "DELETE FROM tb_quarta  WHERE codp = '$id'";
		
//	@mysql_query($consulta2f, $link);
	
}



// Organiza Tabela apos a Exclusao
$sql0 = 'ALTER TABLE `clube_tiete` ORDER BY `CODIGO`';
$res0 = mysql_query($sql0);

$sql3 = 'ALTER TABLE `clube_tiete` DROP `id`';
$res3 = mysql_query($sql3);

$sql4 = 'ALTER TABLE `clube_tiete` ADD `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST';
$res4 = mysql_query($sql4);


$consulta4  = "SELECT * FROM clube_tiete ORDER BY id ASC LIMIT 0,50";

$resultado4 = @mysql_query($consulta4);

$row4 = mysql_fetch_array($resultado4);

$id      = @$row["id"];


$consulta10 = "SELECT * FROM tb_quarta WHERE codp = '$id'";
	
$resultado10 = @mysql_query($consulta10);

$row10 = @mysql_fetch_array($resultado10);

$id_9 	   = @$row10["cod_foto"];
$id_imagem = @$row10["id_imagem"];

if(!empty($id_imagem)){
	
   $mostra_branco = "faz";	
}else{
   $mostra_branco = "nao";	
	
}	

// Abrir tabela Senha

$tabela_1 = strtoupper('clube_tiete');

$consulta5 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado5 = @mysql_query($consulta5);

$row5 = @mysql_fetch_array($resultado5);

$per1       = @$row5["incluir"];
$per2       = @$row5["alterar"];
$per3       = @$row5["excluir"];
$per4       = @$row5["imprimir"];


session_start();
unset ($_SESSION['id_delete']);

			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagem."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);


include("layout.php");

?>

<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 495px; HEIGHT: 80px">
<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadastro.php">
          <td><input type=image name="Voltar" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>
