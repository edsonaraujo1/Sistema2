<?
/*
 ----------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Gerar Link de Boletos Sindical
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/04/2009 

 DEUS SEJA LOUVADO
 ----------------------------------------------------
*/
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

<?
// Abre Conex�o com o MySql
include($path."conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Limpa tabela edificios_sindical

$consulta0  = "TRUNCATE TABLE `edificios_sindical`";

@mysql_query($consulta0, $link); 

// Abrir tabela Edificios
		
//$consulta  = "SELECT * FROM edificios WHERE T_MAIL = 'SIM' ORDER BY COD ASC";

$consulta  = "SELECT * FROM edificios WHERE id <=200 ORDER BY COD ASC";
		
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

		$data_log = retirar_carac(date("d/m/Y"));
		$hora_log = retirar_carac(date("H:i:s")); 

		$nu_doc    = $Edit1;
		$vencto    = "30/04/2009";
		$sacado    = Trim(retirar_carac_link($Edit4))." ".Trim(retirar_carac_link($Edit5));
		$cnpj      = $Edit12;
		$endereco  = Trim(retirar_carac_link($Edit6))." ".Trim(retirar_carac_link($Edit7)).",".Trim(retirar_carac_link($Edit8));
		$bairro    = retirar_carac_link($Edit10);
		$cidade    = retirar_carac_link($Edit13);
		$cep       = $Edit9;
		$estado    = $Edit11;
		$valor     = 0;
		$exec      = "2009";
//		$coded     = Trim($Edit1).trim($data_log).trim($hora_log).Trim(substr($Edit17,0,3));
        $coded     = Trim($Edit1).Trim(retirar_carac($Edit12)).trim(retirar_carac($Edit9));
		$e_mai_ed  = $Edit17;

		$consulta1 = "INSERT INTO edificios_sindical   (COD,
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
														EMAIL)
		                VALUES
					                                  ('$nu_doc',
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
													   '$e_mai_ed')";

	    
		@mysql_query($consulta1, $link)
		or die("
		
		<body bgcolor='#FFFFFF' align='top'>
		
		<style type=text/css>
		
		body { background-image: url($logo_sis);
		       background-attachment: fixed }
		
		<!--.cp {  font: bold 10px Arial; color: black}
		<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
		<!--.ld { font: bold 15px Arial; color: #000000}
		<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
		<!--.cn { FONT: 9px Arial; COLOR: black }
		<!--.bc { font: bold 22px Arial; color: #000000 }
		-->
		</style> 
		

	    <br><br><br>
		<div align=center>
		<table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
		<tr>
		<td align=center>
		<font face=arial><b>*** ERRO ao Gerar os Links !!! ***</b></font>              
        <form method='POST' action='$index_1'>
        <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
        </form> 
	    </td>
	    </tr>
	    </table>
	    </div>
		</body>");

}

echo "	    <br><br><br>
		<div align=center>
		<table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
		<tr>
		<td align=center>
		<font face=arial><b>*** ERRO ao Gerar os Links !!! ***</b></font>              
        <form method='POST' action='$index_1'>
        <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
        </form> 
	    </td>
	    </tr>
	    </table>
	    </div>
		</body>";

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_carac($var){

$var = ereg_replace("[����]",      "A",$var);
$var = ereg_replace("[����]",     "a",$var);
$var = ereg_replace("[���]",       "E",$var);
$var = ereg_replace("[���]",       "e",$var);
$var = ereg_replace("[����]",      "O",$var);
$var = ereg_replace("[�����]",     "o",$var);
$var = ereg_replace("[���]",       "U",$var);
$var = ereg_replace("[���]",       "u",$var);
$var = ereg_replace("[?*#'�`!$%�/:]","0000 ",$var);
$var = str_replace("�",            "C",$var);
$var = str_replace("�",            "c",$var);

return($var);
}

Function retirar_carac_link($var){

$var = ereg_replace("[����]",      "A",$var);
$var = ereg_replace("[����]",     "a",$var);
$var = ereg_replace("[���]",       "E",$var);
$var = ereg_replace("[���]",       "e",$var);
$var = ereg_replace("[����]",      "O",$var);
$var = ereg_replace("[�����]",     "o",$var);
$var = ereg_replace("[���]",       "U",$var);
$var = ereg_replace("[���]",       "u",$var);
$var = ereg_replace("[?*#'�`!$%�]"," ",$var);
$var = str_replace("�",            "C",$var);
$var = str_replace("�",            "c",$var);

return($var);
}
?>
