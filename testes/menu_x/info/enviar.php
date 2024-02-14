<?
include_once('../sql_injection.php');

include('../config.php');
@session_start();  // Start the session where the code will be stored.

  include("securimage.php");
  $img = new Securimage();
  $valid = $img->check($_POST['code']);

  if($valid == true) {
  	 // Senha Correta
  	
    //echo "<center>Senha correta<br />Click <a href=\"{$_SERVER['PHP_SELF']}\">here</a> to go back.</center>";
    
    
  } else {
  	// Senha Incorreta

		?>
<style type="text/css">
<!--

body { background-image: url(<?="../".$logo_sis;?>);}

.style19 {
	font-family: "Comic Sans MS";
	font-size: 20px;
	font-style: italic;
	color: #000000;
}

-->
</style>
		
		<?
        echo "<br><br><table  border='15' align='center' bordercolor ='$color_bor' bgcolor='#FFFFFF'>";
        echo "<td bgcolor='#FFF8DC'>";
		echo "<center>&nbsp;&nbsp;<b>Codigo Digitado esta Incorreto</b>&nbsp;&nbsp;<br></center>";
		echo "<center><b>Digite o codigo conforme</b><br></center>";
		echo "<center><b>a imagem mostrada !!!</b><br></center><br>";
        echo "<center><a href='ajuda.php'><img src='../imagens/botao_voltar.PNG' border='0' /></a></center>";
        echo "</td>";
        echo "</table>";
  	
//    echo "<center>Senha Invalida  <a href=\"javascript:history.go(-1)\">Go back</a> to try again.</center>";
    exit;
  }

include_once("../conexao.php");

?>
<html >
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>

<style type="text/css">
<!--

body { background-image: url(<?="../".$logo_sis;?>);}

.style19 {
	font-family: "Comic Sans MS";
	font-size: 20px;
	font-style: italic;
	color: #000000;
}
-->
</style>

</head>

<?


@session_start();

$smtp_host = trim($_SESSION['smtp_2']);
$e_mail_2  = trim($_SESSION['email_2']);
$sen_pas_2 = trim($_SESSION['sen_email2']);
$email_ret = trim($_SESSION['email_ret2']);


$email      = retirar_carac($_POST["mail_sec"]);
$palavra    = retirar_carac($_POST["palavra_sec"]);
$data      = date("d/m/Y  H:i:s");                             //função para pegar a data de envio do e-mail
$ip        = $_SERVER['REMOTE_ADDR'];                          //função para pegar o ip do usuário
$navegador = retirar_carac($browser);                          //função para pegar o navegador do visitante
$hora      = date("YmdHis");

include_once('java2_js.php');

// Abre Conexão com o MySql
include("../conexao.php");

// Chama o Banco de Dados
$link = @mysql_connect($host,$user,$pass)

    or die( require("../login.php"));

@mysql_select_db($db);

// Abrir tabela Dados
$consulta  = "SELECT * FROM tt_ser_01 WHERE `e_mail` = '". anti_sql_injection($email) ."'"; // AND frase = '$palavra'";

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id0       = @$row["id"];
$Edit1     = @$row["nome_l"];      // 45
$Edit7     = @$row["login"];       // 10
$Edit8     = decode5t_se(@$row["senha"]);
$Edit10    = @$row["e_mail"];  

if (!empty($id0)){


// Envia email de Recuperacao de Senha

$nome      = retirar_carac($_POST["nome"]);
$mail_des  = retirar_carac($_POST["mail_sec"]);
$assunto   = retirar_carac($_POST["assunto"]);
$mensagem  = retirar_carac($_POST["mensagem"]);
    
require_once('phpmailer/class.phpmailer.php');

$erros = "";

if(empty($HTTP_POST_VARS["mail_sec"]) ){
    $erros .= "O E-mail deve ser preenchido.<br />";
}else{
    $email = $HTTP_POST_VARS["mail_sec"];
    ereg("([\._0-9A-Za-z-]+)@([0-9A-Za-z-]+)(\.[0-9A-Za-z\.]+)",$email,$match);
    if(!isset($match)){
        $erros .= "O e-mail informado é inválido.<br />";
    }
}

if(empty($HTTP_POST_VARS["palavra_sec"])){
//    $erros .= "Palavra Secreta deve ser preenchido.<br />";
}

if( empty($erros) ){

    $phpmail = new PHPMailer();

	$phpmail->IsSMTP();                    // Envia por SMTP
	$phpmail->Mailer   = "smtp";
	$phpmail->Host     = $smtp_host;       // SMTP servers
	$phpmail->SMTPAuth = true;             // Caso o servidor SMTP precise de autenticação
	$phpmail->Port     = 25;
	$phpmail->Username = $e_mail_2;        // SMTP username
	$phpmail->Password = $sen_pas_2;       // SMTP password
	$phpmail->IsHTML(true);
	$phpmail->From     = $email_ret;       // Retorno CC
	$phpmail->FromName = $Titulo;
							
	$phpmail->AddAddress($_POST["mail_sec"]);           // Destino
	$phpmail->AddAddress("edson@sindificios.com.br"); // Trocar CCo
    

    $message = "<html>
	            <head>
				</head>
				<body>

<table width='376' border='0' align='center' cellpadding='0' cellspacing='0'>
				  <tr>
				    <td width='10'>&nbsp;</td>
				    <td width='356' align='center'>&nbsp;</td>
				    <td width='10'>&nbsp;</td>
				  </tr>
				  <tr>
				    <td>&nbsp;</td>
				    <td bgcolor='#CCCCCC'><div align='center'>
				      <p align='center'><br>
				        <strong>Conforme sua solicita&ccedil;&atilde;o estamos lhe enviando<br> 
				        os seus dados para efetuar login no Programa<br> 

				          <br>
				        Obrigado.: Administrador do Programa</strong></p>
				      <p><strong><br>
				          </strong></p>
				    </div></td>
				    <td>&nbsp;</td>
				  </tr>
				  <tr>
				    <td height='23'>&nbsp;</td>
				    <td bordercolor='#999999' bgcolor='#CCCCCC'><div align='left'>
				      <p><b>Seus dados</b><br>
					     Nome.:&nbsp;$Edit1&nbsp;$Edit2<br>
				         Email:&nbsp;$mail_des<br>
				         Mensagem.: Recupera&ccedil;ao de Senha.<br>
				         <br>
			             <strong>Seu Usuario</strong>:&nbsp;$Edit7<br>
			             <strong>Sua Senha</strong>:&nbsp;$Edit8<br>
    <br>
	                  </p>
				      </div></td>
				    <td>&nbsp;</td>
				  </tr>
				  <tr>
				    <td height='23'>&nbsp;</td>
				    <td><div align='center'><span><b><i>Todos os direitos reservados 2010</i></b></span></div></td>
				    <td>&nbsp;</td>
				  </tr>
				</table>				</body>
				</html>";
    
    $phpmail->Subject = "Administrador Programa";
    $phpmail->Body .= "Nome: ".$_POST["nome"]."<br />";
    $phpmail->Body .= "E-mail: ".$_POST["email"]."<br />";
    $phpmail->Body .= "<br />";
    $phpmail->Body .= "Recuperação de Senha Sistema ".$Titulo." ".$_POST["assunto"] ." <br />";
    $phpmail->Body .= "$message";
    $phpmail->Body .= "<br />";
    
    $send = $phpmail->Send();

    if($send){

        echo "<br><br><table  border='15' align='center' bordercolor ='$color_bor' bgcolor='#FFFFFF'>";
        echo "<td bgcolor='#FFF8DC'>";
		echo "<center><b>Sua mensagem foi enviada com sucesso!</b><br></center>";
		echo "<center>&nbsp;&nbsp;<b>Você recebera um e-mail com as informações</b>&nbsp;&nbsp;<br></center>";
		echo "<center><b>solicitadas. OBRIGADO !!!</b></center><br>";
        echo "<center><a href='../avaleht.php?servletjs2=20$$20'><img src='../imagens/botao_voltar.PNG' border='0' /></a></center>";
        echo "</td>";
        echo "</table>";

		$faz_x1 = 1;

    	
    }else{

    	
    	echo "<br><br><table  border='15' align='center' bordercolor ='$color_bor' bgcolor='#FFFFFF'>";
        echo "<td bgcolor='#FFF8DC'>";
		echo "<center><b>&nbsp;&nbsp;Sua mensagem não foi enviada !! POSSIVÉL causa!&nbsp;&nbsp;</b><br></center>";
		echo "<center><b>Você não esta conectado a Internet ou ocorreu</b><br></center>";
		echo "<center><b>um erro de Servidor SMTP, tente de novo mais tarde.</b></center><br><br>";
        echo "<center><a href='ajuda.php'><img src='../imagens/botao_voltar.PNG' border='0' /></a></center>";
        echo "</td>";
        echo "</table>";

    }

}else{
    echo $erros;
}

}else{

	
    	echo "<br><br><table  border='15' align='center' bordercolor ='$color_bor' bgcolor='#FFFFFF'>";
        echo "<td bgcolor='#FFF8DC'>";
		echo "<center><b>&nbsp;&nbsp;Dados Informados são Incorretos&nbsp;&nbsp;</b><br></center>";
		echo "<center><b>Digite seu e-Mail</b><br></center>";
		echo "<center><b>conforme cadastrado !!!</b><br></center><br>";
        echo "<center><a href='ajuda.php'><img src='../imagens/botao_voltar.PNG' border='0' /></a></center>";
        echo "</td>";
        echo "</table>";
	
}
//aqui envia o e-mail para você


/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac($var){

$var = ereg_replace("[ÁÀÂÃ]",        "A",$var);
$var = ereg_replace("[áàâãª]",       "a",$var);
$var = ereg_replace("[ÉÈÊ]",         "E",$var);
$var = ereg_replace("[éèê]",         "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",        "O",$var);
$var = ereg_replace("[óòôõº]",       "o",$var);
$var = ereg_replace("[ÚÙÛ]",         "U",$var);
$var = ereg_replace("[úùû]",         "u",$var);
$var = ereg_replace("[?*#'´`!$%¨;]", " ",$var);
$var = str_replace("Ç",              "C",$var);
$var = str_replace("ç",              "c",$var);
$var = str_replace("\\",             " ",$var);
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
