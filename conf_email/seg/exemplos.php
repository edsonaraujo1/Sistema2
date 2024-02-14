<?
/*
 ----------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Enviar Link de impressao Sindical
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/04/2009 

 DEUS SEJA LOUVADO
 ----------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");
$nome3 = $_SESSION["nome_log"];

require("menu.php");

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
      
$mail_des = "edsonaraujo1@hotmail.com";
    
// Chama Classe SMPT
require_once('smtpmail.class.php');

// Abre Conexão com o MySql
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// enquanto tiver dados no banco, atribui o valor do campo email à variával $mail, e envia o email 

$consulta  = "SELECT * FROM edificios_sindical WHERE COD = 20228";
		
$resultado = @mysql_query($consulta);
		
while ($linha = @mysql_fetch_array($resultado))
{
	   $id_conf   = $linha["EMAIL"];
	   $nome_edif = $linha["SACADO"];
	   $link_edif = $linha["CODIGO"];
	   $cnpj_link = $linha["CNPJ"];
	   $exec_link = $linha["EXEC"];
	   

       $smtp = new SMTPMAIL();
       $smtp->Servidor      ='smtp.sindificios.com.br';
       $smtp->Autenticado   = TRUE;
       $smtp->Usuario       = "edson@sindificios.com.br";
       $smtp->Senha         = "tty$%909";
       $smtp->Codificacao   = "UTF-8";
       $smtp->EmailDe       = 'sindificios@sindificios.com.br';
       $smtp->EmailDeVisual = 'Sindificios <sindificios@sindificios.com.br>';
       $smtp->Assunto       = 'Envio de Boletos SINDIFICIOS';
       $smtp->EmailPara     = $id_conf; // Destinatario
       $smtp->Corpo .= "   <img src='http://www.sindificios.com.br/sistemaXP/imagens/Logo1.JPG'><br><br>
                           Sindicato dos Empregados de Edificios e Condominios Residenciais e Comerciais<br>
                           de Sao Paulo, Zelador, Porteiros, Cabineiros, Vigias, Faxineiros, Serventes e Outros<br>
                           Sede - Rua Sete de Abril, 34 Centro - Sao Paulo - Cep 01044-901<br>
	                       <b>Ja esta disponivel no site do Sindificios a guia Referente contribuicao Sindical&nbsp;&nbsp;$exec_link</b><br><br>";
//for($a=0; $a<100; $a++){	                       
       $smtp->Corpo .= "   Nome da empresa:&nbsp;&nbsp;&nbsp;<b>$nome_edif</b>&nbsp;&nbsp;-&nbsp;&nbsp;CNPJ:&nbsp;&nbsp;<b>$cnpj_link</b><br>
						   Para Visualizar e Imprimir click aqui = <a href='http://www.sindificios.com.br/sistemaXP/sindic/sindical_email/sindical_link.php?cod_recue=$link_edif'>Clique aqui</a>&nbsp;&nbsp;<br>";
//}						   
       $smtp->Corpo .= "   Ou entre no <a href='http://www.sindificios.com.br/sindical/index.php'>www.sindificios.com.br</a> em Guia Sindical<br>
						   Qualquer Duvida sobre a autenticidade deste Link ligue para 11-3123-3211 Ramal 3260 ou 3273";

//     $smtp->anexarArquivo('contato.html');
    
    if($smtp->Enviar()) {
        echo 'ok';
    } else {
    	   	
//        echo 'Enviado para '.$nome_edif."<br>";
        
    }
}	   
		echo "<br><br><br>
			  <div align=center>
			  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='#4682B4'>
			  <tr>
			  <td align=center>
			  <font face=arial><b>*** links Enviados com SUCESSO !!! ***<br>
		      </b>              
			  <table align=center>
			  <form method='POST' action='javascript:history.back(1)'>
			  <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
			  </form></p>
			  </table>
			  </td>
			  </tr>
			  </table>
			  </div>";

?>