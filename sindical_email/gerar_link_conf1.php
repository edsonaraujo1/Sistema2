<?
/*
 ----------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar Link de Boletos Conf/Assist.
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/04/2009 

 DEUS SEJA LOUVADO
 ----------------------------------------------------
*/
// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

$index_1 = "../index.php";

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Limpa tabela edificios_sindical

$consulta0  = "TRUNCATE TABLE `edificios_confederativa`";

@mysql_query($consulta0, $link); 

// Abrir tabela Edificios
		
//$consulta  = "SELECT * FROM edificios WHERE T_MAIL = 'SIM' ORDER BY COD ASC";

$nu_id     = 1;
$fi_id     = 30000;
$vencto    = "05/11/2009";

$soma_id = $nu_id;
$consulta  = "SELECT * FROM edificios WHERE id >= '$nu_id' AND id <= '$fi_id' ORDER BY COD ASC";
		
$resultado = @mysql_query($consulta);
		
while ($linha = mysql_fetch_array($resultado))
{

		$id      = $linha["id"];
		$Edit1   = $linha["COD"];
		$Edit4   = $linha["COND"];
		$Edit5   = $linha["NOME"];
		$Edit6   = $linha["RUA"];
		$Edit7   = $linha["ENDERECO"];
		$Edit8   = $linha["NUMERO"];
		$Edit9   = $linha["CEP"];
		$Edit10  = $linha["BAIRRO"];
		$Edit11  = $linha["UF"]; 
		$Edit12  = $linha["CGC"];
		$Edit13  = $linha["CIDADE"];
		$Edit17  = $linha["EMAIL"];
		$Edit18  = $linha["T_MAIL"];
		$Edit19  = $linha["ADM"];
		$Edit20  = $linha["ATIV"];
        
		$data_log = retirar_carac(date("d/m/Y"));
		$hora_log = retirar_carac(date("H:i:s")); 

		$nu_doc    = $Edit1;
		
		$sacado    = Trim(retirar_carac_link($Edit4))." ".Trim(retirar_carac_link($Edit5));
		$cnpj      = $Edit12;
		$endereco  = Trim(retirar_carac_link($Edit6))." ".Trim(retirar_carac_link($Edit7)).",".Trim(retirar_carac_link($Edit8));
		$bairro    = retirar_carac_link($Edit10);
		$cidade    = retirar_carac_link($Edit13);
		$cep       = $Edit9;
		$estado    = $Edit11;
		$valor     = 0;
		$exec      = Trim(date("Y"));
//		$coded     = Trim($Edit1).trim($data_log).trim($hora_log).Trim(substr($Edit17,0,3));
        $coded     = Trim($Edit1).Trim(retirar_carac($Edit12)).trim(retirar_carac($Edit9));
		$e_mai_ed  = $Edit17;
		$adms_ed   = $Edit19;
		$ativ_c    = $Edit20;

		$consulta1 = "INSERT INTO edificios_confederativa (id,
		                                                COD,
													    VENCTO,
					                                    SACADO,
														CNPJ,
														ENDERECO,
														BAIRRO,
														CIDADE,
														CEP,
														ESTADO,
														VALOR,
														EXEC,
														CODIGO,
														EMAIL,
														ADMS,
														ATIVIDADE)
		                VALUES
					                                  ('$soma_id',
													   '$nu_doc',
													   '$vencto',
													   '$sacado',
													   '$cnpj',
													   '$endereco',
													   '$bairro',
													   '$cidade',
													   '$cep',
													   '$estado',
													   '$valor',
													   '$exec',
													   '$coded',
													   '$e_mai_ed',
													   '$adms_ed',
													   '$ativ_c')";

	    $soma_id++;

		@mysql_query($consulta1, $link)
		
or die("	  <div align=center>
			  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
			  <tr>
			  <td align=center>
			  <font face=arial><b>*** ERRO ao gerar os links !!! ***<br>
		      </b>              
			  <table align=center>
			  <form method='POST' action='$index_1'>
			  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
			  </form>  
			  </table>
			  </td>
			  </tr>
			  </table>
			  </div>");

}

echo "		  <div align=center>
			  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
			  <tr>
			  <td align=center>
			  <font face=arial><b>*** links gerados com SUCESSO !!! ***<br>
		      </b>              
			  <table align=center>
			  <form method='POST' action='$index_1'>
			  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
			  </form>  
			  </table>
			  </td>
			  </tr>
			  </table>
			  </div>";
/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac($var){

$var = ereg_replace("[ÁÀÂÃ]",       "A",$var);
$var = ereg_replace("[áàâãª]",      "a",$var);
$var = ereg_replace("[ÉÈÊ]",        "E",$var);
$var = ereg_replace("[éèê]",        "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",       "O",$var);
$var = ereg_replace("[óòôõº]",      "o",$var);
$var = ereg_replace("[ÚÙÛ]",        "U",$var);
$var = ereg_replace("[úùû]",        "u",$var);
$var = ereg_replace("[?*#'´`!$%¨/:&]","0000 ",$var);
$var = str_replace("Ç",             "C",$var);
$var = str_replace("ç",             "c",$var);

return($var);
}

Function retirar_carac_link($var){

$var = ereg_replace("[ÁÀÂÃ]",       "A",$var);
$var = ereg_replace("[áàâãª]",      "a",$var);
$var = ereg_replace("[ÉÈÊ]",        "E",$var);
$var = ereg_replace("[éèê]",        "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",       "O",$var);
$var = ereg_replace("[óòôõº]",      "o",$var);
$var = ereg_replace("[ÚÙÛ]",        "U",$var);
$var = ereg_replace("[úùû]",        "u",$var);
$var = ereg_replace("[?*#'´`!$%¨&]"," ",$var);
$var = str_replace("Ç",             "C",$var);
$var = str_replace("ç",             "c",$var);

return($var);
}
?>
