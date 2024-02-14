<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Cadastro de Socios
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

unset ($_SESSION['Faz_uma']);

include("../logar.php");

//include("menu.php");

include("limpa_sessao.php");

$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_ASOC");

if ($deixar_1 == "NAO"){
	
    echo "  <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			body { background-image: url('../$logo_sis');
                   background-attachment: fixed }
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			

			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** <font color = #FF0000> ERRO ACESSO NÃO PERMITIDO !!!</font> ***<br>
				                     
									 <font face=arial>Usuário sem Permissão</b>
			<table align=center>
			<form method='POST' action='../avaleht.php?servletjs2=20$$20'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>";
	        exit();
}	

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

$contador_soc = 0;
	
$consulta  = "SELECT * FROM socios WHERE CATEGORIA = 'C' ORDER BY id ASC";

$resultado = @mysql_query($consulta);


while ($linha = @mysql_fetch_array($resultado))
{
		
	   $id_conf   = $linha["id"];
	   $cod       = $linha["CODP"];
	   $nome      = $linha["NOMEASSOC"];
	   $categoria = $linha["CATEGORIA"];
	   $inscricao = $linha["DATINSC"];
	   $mes_i     = $linha["MES"];
	   $ano_i     = $linha["ANO"];
	
	
       $anosoc = substr("$inscricao", 6, 4);

       $hoje   = date("Y");

       $v_FIM = $hoje - $anosoc;

//       echo $hoje."<br>";
//       echo $anosoc;
//       break;
       
       // Verifica se o Socio e Remido
       if ($v_FIM < 20)
       {

	
       // Pesquiza quantidade de mensalidades devedora
       $sql  = "SELECT * FROM aberto_soc WHERE CODP = '". anti_sql_injection($cod) ."' ORDER BY ANO ASC, MES ASC";	
	
	   $resultado2 = @mysql_query($sql);

       $row2 = @mysql_fetch_array($resultado2);

       $mes_ano_soc = @$row2["MESANO"];

		$valor_3 = "0.00";
		$som_qtd = 0;
					
		if ($categoria == "C"){
					
					if (!empty($mes_ano_soc)){
					   $mes_x = substr("$mes_ano_soc", 0, 2);
					   $ano_x = substr("$mes_ano_soc", 3, 4);
					}else{
					   $mes_x = $mes_i;
					   $ano_x = $ano_i;
					}	
					
					$ano_hj = date("Y");
					$mes_hj = date("m");
					
					if ($mes_x == 0 and $ano_x == 0){
						
						$mes_x = substr("$inscricao",3,2);
						$ano_x = substr("$inscricao",6,4);
					}
					
					$som_qtd = 0;	
					$valor_2 = 0;
						
					while($ano_x < $ano_hj){
						$mes_x++;
						if ($mes_x >= 13){
							$mes_x = 1;
							$ano_x++;
						}
						$som_qtd++;
						$valor_2 = $som_qtd * 8.00;
						if ($ano_x == $ano_hj){
							break;
						}
					}
					$valor_3 = $valor_2.",00"; 
		}
$contador_soc++;
echo $nome." ".$categoria." ".$inscricao." ".$mes_i."/".$ano_i."<br>";

if ($contador_soc > 500){
	break;
}


}          	
}

?>
