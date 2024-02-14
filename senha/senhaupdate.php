<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Update Cadastro Senha
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("menu.php");

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

include("vaurls.php");

$deixar = acesso_url("FORMSENHA");

if ($deixar == "SIM"){

   include_once('java2_js.php');
?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
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

$acesso    = addslashes(strtoupper($_POST['Edit88']));
$hora1     = addslashes(strtoupper($_POST['Edit7']));
$hora2     = addslashes(strtoupper($_POST['Edit8']));
$semana    = addslashes(strtoupper($_POST['Edit37']));

$email     = addslashes(strtolower($_POST['Edit11']));
$tipo      = addslashes(strtoupper($_POST['Edit12']));

$menssagens = "* * * Alterado * * *";

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

// retorna uma pesquisa

$consulta = "UPDATE tt_ser_01 SET   login       = '$login',
                                    senha       = '$nov_senha',
                                    senha2      = '$cai_senha',
                                    data        = '$data',
                                    nome_l      = '$nome',
                                    permissao   = '$permissao',
                                    permis2     = '$permis2',
                                    programas   = '$programas',
									conta       = '$Edit88',
									maquina     = '$maquina',
									hora1       = '$hora1',
									hora2       = '$hora2',
									semana      = '$semana',
									e_mail      = '$email',
									tipo        = '$tipo'  WHERE login = '". anti_sql_injection($login) ."'";    

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
     <form method='POST' action='cadsenha.php'>
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