<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Insert Cadastro Senha
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("FORMSENHA");

if ($deixar == "SIM"){

   include_once('java2_js.php');
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


<?

$login     = addslashes(strtoupper($_POST['Edit1']));
$senha     = addslashes(strtoupper($_POST['Edit2']));
$data      = addslashes(strtoupper($_POST['Edit3']));
$nome      = addslashes(strtoupper($_POST['Edit4']));
$permissao = addslashes(strtoupper($_POST['Edit5']));
$permis2   = addslashes(strtoupper($_POST['Edit6']));
$programas = addslashes(strtoupper($_POST['Memo1']));
$maquina   = addslashes(strtoupper($_POST['Edit89']));

$hora1     = addslashes(strtoupper($_POST['Edit7']));
$hora2     = addslashes(strtoupper($_POST['Edit8']));
$semana    = addslashes(strtoupper($_POST['Edit37']));

$email     = addslashes(strtolower($_POST['Edit11']));
$tipo      = addslashes(strtoupper($_POST['Edit12']));

$acesso    = 0;

$menssagens = "* * * Incluido * * *";


$nov_senha = encode5t_se($senha);


if ($tipo == 'OP. CAIXA'){

    $cai_senha = $senha;	

}else{
	
    $cai_senha = ' ';	
	
}

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


// Procura na tabela Senha se o login ja existe

$consulta_x = "SELECT * FROM tt_ser_01 Where login = '$login'";

$resultado_x = @mysql_query($consulta_x);

$row_x = @mysql_fetch_array($resultado_x);

$id       = @$row_x["id"];

If (!empty($id)){


?>
	<SCRIPT LANGUAGE='JavaScript'>
	<!--
	alert("*** Login ja cadastrado !!! ***");
	//-->
	</script>
<?

     
}else{


    // retorna uma pesquisa

    $consulta = "INSERT INTO tt_ser_01 (  login,
                                      senha,
                                      senha2,
                                      data,
                                      nome_l,
									  permissao,
									  permis2,
									  programas,
									  maquina,
									  hora1,
									  hora2,
									  semana,
									  acesso,
									  e_mail,
									  tipo) 
                VALUES
                                   ('$login',
                                    '$nov_senha',
                                    '$cai_senha',
                                    '$data',
                                    '$nome',
                                    '$permissao',
                                    '$permis2',
                                    '$programas',
									'$maquina',
									'$hora1',
									'$hora2',
									'$semana',
									'$acesso',
									'$email',
									'$tipo')";

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
     <form method='POST' action='cadsenha.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


}

			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagem."/".$login;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);

include("senhalayout.php");
?>

<div style="Z-INDEX: 34; LEFT: 165px; WIDTH: 544px; POSITION: absolute; TOP: 470px; HEIGHT: 80px">

<table border='0' aling=center>
          <td> </td>

          <form method="POST" action="cadsenha.php?Cod_xxx=<?=$login;?>">
          <td><input type=image name="socios" src="../imagens/botao_voltar.PNG"></td>
          </form>

</table>
</div>

</body>
</html>
<?
}else{

include("enaaurlnp.php");
	
}
?>