<?
/*
 ----------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar etiquetas Socios
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/04/2009 

 DEUS SEJA LOUVADO
 ----------------------------------------------------
*/
include("conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$consulta  = "SELECT * FROM  atendimento_soc";
		
$resultado = @mysql_query($consulta);
		
		
$nome     = @$row["N1"];
$endereco = @$row["N2"].@$row["N3"].", ".@$row["N4"];
$cep      = @$row["N6"];
$bairro   = @$row["N5"];
	
		
while ($linha = mysql_fetch_array($resultado))
{

	$nome     = $linha["N1"];
	$rua      = $linha["N2"];
	$endereco = $linha["N3"];
	$numero   = $linha["N4"];
	$cep      = $linha["N6"];
	$bairro   = $linha["N5"];

        
        // Pesquiza quantidade de mensalidades devedora
        $sql  = "SELECT * FROM socios WHERE NOMEASSOC = '$nome' AND RUA = '$rua' AND ENDRESID = '$endereco' AND NUMERO = '$numero' AND CEPRES = '$cep' AND BAIRRORES = '$bairro'";	
	
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

$var = ereg_replace("[����]",       "A",$var);
$var = ereg_replace("[����]",      "a",$var);
$var = ereg_replace("[���]",        "E",$var);
$var = ereg_replace("[���]",        "e",$var);
$var = ereg_replace("[����]",       "O",$var);
$var = ereg_replace("[�����]",      "o",$var);
$var = ereg_replace("[���]",        "U",$var);
$var = ereg_replace("[���]",        "u",$var);
$var = ereg_replace("[?*#'�`!$%�/:&]","0000 ",$var);
$var = str_replace("�",             "C",$var);
$var = str_replace("�",             "c",$var);

return($var);
}

Function retirar_carac_link($var){

$var = ereg_replace("[����]",       "A",$var);
$var = ereg_replace("[����]",      "a",$var);
$var = ereg_replace("[���]",        "E",$var);
$var = ereg_replace("[���]",        "e",$var);
$var = ereg_replace("[����]",       "O",$var);
$var = ereg_replace("[�����]",      "o",$var);
$var = ereg_replace("[���]",        "U",$var);
$var = ereg_replace("[���]",        "u",$var);
$var = ereg_replace("[?*#'�`!$%�&]"," ",$var);
$var = str_replace("�",             "C",$var);
$var = str_replace("�",             "c",$var);

return($var);
}
?>
