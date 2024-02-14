<?
/*
 ----------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar etiquetas Socios
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/04/2009 

 DEUS SEJA LOUVADO
 ----------------------------------------------------
*/
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Limpa tabela 

$consulta0  = "TRUNCATE TABLE `etiquetas_socios`";

@mysql_query($consulta0, $link); 


$nu_id = 1;
$fi_id = 10000000;

$soma_id = $nu_id;
$consulta  = "SELECT * FROM  atendimento_soc WHERE id >= '$nu_id' AND id <= '$fi_id' ORDER BY COD ASC";
		
$resultado = @mysql_query($consulta);
		
while ($linha = mysql_fetch_array($resultado))
{

		$id      = $linha["id"];
		$Edit1   = $linha["CODP"];
        
        // Pesquiza quantidade de mensalidades devedora
        $sql  = "SELECT * FROM socios WHERE CODP = '$Edit1'";	
	
	    $resultado2 = @mysql_query($sql);

        $row2 = @mysql_fetch_array($resultado2);

		$id_2		= @$row2["id"];
		$new_fot    = @$row2["CODP"];
           
        if (!empty($id_2)){

		    $consulta1 = "INSERT INTO etiquetas_socios SELECT * FROM socios WHERE CODP = '$new_fot'";

	        $soma_id++;

		    @mysql_query($consulta1, $link);
}
        } 
echo "		  <div align=center>
			  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
			  <tr>
			  <td align=center>
			  <font face=arial><b>*** links gerados com SUCESSO !!! ***<br>
		      </b>              
			  <table align=center>
			  <form method='POST' action='$index_1'>
			  <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
			  </form></p>
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
