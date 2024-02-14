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

include("../logar.php");

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

$consulta  = "SELECT * FROM socios WHERE id >= 1";
		
$resultado = @mysql_query($consulta);

$contr_0    = 0;
$emdia      = 0;
$desist     = 0;
$cat_fale   = 0;
$cat_apos   = 0;
$cat_dire   = 0;
$cat_remi   = 0;
$cat_isen   = 0;
$cat_opos   = 0;

		
		     while ($linha = @mysql_fetch_array($resultado))
		       {
		
				    $id_conf   = $linha["id"];
					$cod       = $linha["CODP"];
					$nome      = $linha["NOMEASSOC"];
					$rua       = trim(strtoupper($linha["RUA"]));
					$endereco  = trim(strtoupper($linha["ENDRESID"]));
					$numero    = trim(strtoupper($linha["NUMERO"]));
					$categoria = $linha["CATEGORIA"];
					$inscricao = $linha["DATINSC"];
					$mes_i     = $linha["MES"];
					$ano_i     = $linha["ANO"];

					$mes_x     = 0;
					$ano_x     = 0;
					$qtd_fim   = 0;
					$valor_3   = "0.00";
	
                    // Pesquiza quantidade de mensalidades devedora
                    $sql  = "SELECT * FROM aberto_soc WHERE CODP = '". anti_sql_injection($cod) ."' ORDER BY ANO DES, MES DES";	
	
	                $resultado2 = @mysql_query($sql);

                    $row2 = @mysql_fetch_array($resultado2);

                    $id          = @$row2["id"];
					$mes_aber    = @$row2["MES"];
					$ano_aber    = @$row2["ANO"];

					if ($categoria == "F")
					{
					    $cat_fale++;	
					}
					if ($categoria == "A")
					{
					    $cat_apos++;	
					}
					if ($categoria == "P")
					{
					    $cat_dire++;	
					}
					if ($categoria == "R")
					{
					    $cat_remi++;	
					}
					if ($categoria == "I")
					{
					    $cat_isen++;	
					}
					if ($categoria == "O")
					{
					    $cat_opos++;	
					}
					if ($categoria == "D")
					{
					    $cat_dest2++;	
					}
					if ($categoria == "C"){
					     $contr_0++;
						if (!empty($id)){
						   $mes_x = $mes_aber;
						   $ano_x = $ano_aber;
						}else{
						   $mes_x = $mes_i;
						   $ano_x = $ano_i;
						}	

						$qtd        = 0;
						$qtd_fim    = 0;
						$valor_3    = 0;
						$mes_inicio = $mes_x;
						$ano_inicio = $ano_x;
						$mes_hj     = intval(date("m"));
						$ano_hj     = intval(date("Y"));
						
						//echo "Mes e ano pagos = ".trim($mes_inicio)."/".trim($ano_inicio)."<br><br>";
						
						while ($ano_inicio < $ano_hj)
						{
							$qtd++;
							If($mes_inicio != 12)
							{
							    $mes_inicio++;
							}else{
								$mes_inicio = 1;
								$ano_inicio++;
							}
						}
						while($ano_inicio == $ano_hj)
						{
							if($ano_inicio == $ano_hj and $mes_inicio >= $mes_hj)
							{
							   $qtd = 0;
							   break;
							}
							$mes_inicio++;
							$qtd++;
							if($mes_inicio == $mes_hj)
							{
								break;
							}
						}
						if ($qtd > 0)
						{
						   $qtd_fim = $qtd - 1;
						   $valor_3 = $qtd_fim * 8.00;
						}

					}
if ($qtd_fim >= 12)
{
	$qtd_fim   = 0;
	$valor_3   = "0";
	$categoria = "D";
	$desist++;
}
if ($qtd_fim >= 2 and $ano_inicio == intval(date("Y")))
{
	$emdia++;
}
}
$total_1 = $contr_0+$desist+$cat_fale+$cat_apos+$cat_dire+$cat_remi+$cat_isen+$cat_opos;
//echo "Total de Contribuintes = ".$contr_0."<br>";
//echo "Comtribuintes em Dia   = ".$emdia."<br>";
//echo "Desistentes            = ".$desist."<br>";
//echo "Falecido               = ".$cat_fale."<br>";
//echo "Aposentado             = ".$cat_apos."<br>";
//echo "Diretor                = ".$cat_dire."<br>";
//echo "Remido                 = ".$cat_remi."<br>";
//echo "Isento                 = ".$cat_isen."<br>";
//echo "Oposicao               = ".$cat_opos."<br><br>";
//echo "Total                  = ".$total_1;

$Edit1  = $contr_0;
$Edit2  = $emdia;
$Edit3  = $desist;
$Edit4  = $cat_fale;
$Edit5  = $cat_apos;
$Edit6  = $cat_dire;
$Edit7  = $cat_remi;
$Edit8  = $cat_isen;
$Edit9  = $cat_opos;
$Edit10 = $total_1;

?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<div style="Z-INDEX: 0; LEFT: 0px; WIDTH: 412px; POSITION: absolute; TOP: 15; HEIGHT: 429px">
    <table  width="380" style="height:395px" bgcolor="#FFFFFF" border="15" bordercolor ='<?=$color_bor;?>' align="Center" >
	        <tr>
			<td valign="top">
			
				<div id="Label2_outer" style="Z-INDEX: 4; LEFT: 47px; WIDTH: 187px; POSITION: absolute; TOP: 35px; HEIGHT: 26px">
				<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:329px;"><STRONG>&nbsp;Pesquisa Socios</STRONG></div></div>

				<div id="Label2_outer" style="Z-INDEX: 4; LEFT: 45px; WIDTH: 187px; POSITION: absolute; TOP: 104px; HEIGHT: 26px">
				<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:187px;"   > <STRONG>Total de Contribuintes.:</STRONG> </div>
				</div>
				<div id="Edit1_outer" style="Z-INDEX: 5; LEFT: 239px; WIDTH: 113px; POSITION: absolute; TOP: 100px; HEIGHT: 26px">
				<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  border-width: 0px; border-style: none;height:25px;width:113px;" readonly  tabindex="1"    />
				</div>
				<div id="Label11_outer" style="Z-INDEX: 6; LEFT: 45px; WIDTH: 187px; POSITION: absolute; TOP: 130px; HEIGHT: 26px">
				<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:187px;"   > <STRONG>Contribuintes em Dia.:</STRONG> </div>
				</div>
				<div id="Label12_outer" style="Z-INDEX: 7; LEFT: 45px; WIDTH: 187px; POSITION: absolute; TOP: 154px; HEIGHT: 26px">
				<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:187px;"   ><STRONG>Desistentes.:</STRONG>&nbsp;</div>
				</div>
				<div id="Edit3_outer" style="Z-INDEX: 8; LEFT: 239px; WIDTH: 113px; POSITION: absolute; TOP: 149px; HEIGHT: 26px">
				<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  border-width: 0px; border-style: none;height:25px;width:113px;"  readonly  tabindex="6"    />
				</div>
				<div id="Label13_outer" style="Z-INDEX: 9; LEFT: 45px; WIDTH: 187px; POSITION: absolute; TOP: 178px; HEIGHT: 26px">
				<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:187px;"   ><STRONG>Falecidos.:</STRONG>&nbsp;</div>
				</div>
				<div id="Edit4_outer" style="Z-INDEX: 10; LEFT: 239px; WIDTH: 113px; POSITION: absolute; TOP: 173px; HEIGHT: 26px">
				<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  border-width: 0px; border-style: none;height:25px;width:113px;"  readonly  tabindex="8"    />
				</div>
				<div id="Label15_outer" style="Z-INDEX: 11; LEFT: 45px; WIDTH: 187px; POSITION: absolute; TOP: 202px; HEIGHT: 26px">
				<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:187px;"   ><STRONG>Aposentados.:</STRONG>&nbsp;</div>
				</div>
				<div id="Edit5_outer" style="Z-INDEX: 12; LEFT: 239px; WIDTH: 113px; POSITION: absolute; TOP: 197px; HEIGHT: 26px">
				<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  border-width: 0px; border-style: none;height:25px;width:113px;" readonly   tabindex="9"    />
				</div>
				<div id="Label16_outer" style="Z-INDEX: 13; LEFT: 45px; WIDTH: 70px; POSITION: absolute; TOP: 227px; HEIGHT: 21px">
				<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:70px;"   ><STRONG>Diretor.:</STRONG>&nbsp;</div>
				</div>
				<div id="Edit6_outer" style="Z-INDEX: 14; LEFT: 239px; WIDTH: 113px; POSITION: absolute; TOP: 222px; HEIGHT: 26px">
				<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  border-width: 0px; border-style: none;height:25px;width:113px;" readonly   tabindex="12"    />
				</div>
				<div id="Label22_outer" style="Z-INDEX: 15; LEFT: 45px; WIDTH: 107px; POSITION: absolute; TOP: 252px; HEIGHT: 26px">
				<div id="Label22" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:107px;"   ><STRONG>Remido.:</STRONG>&nbsp;</div>
				</div>
				<div id="Edit7_outer" style="Z-INDEX: 16; LEFT: 239px; WIDTH: 113px; POSITION: absolute; TOP: 247px; HEIGHT: 26px">
				<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  border-width: 0px; border-style: none;height:25px;width:113px;"  readonly  tabindex="15"    />
				</div>
				<div id="Label26_outer" style="Z-INDEX: 17; LEFT: 45px; WIDTH: 103px; POSITION: absolute; TOP: 301px; HEIGHT: 26px">
				<div id="Label26" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:103px;"   ><STRONG>Oposicao.:</STRONG>&nbsp;</div>
				</div>
				<div id="Edit2_outer" style="Z-INDEX: 18; LEFT: 239px; WIDTH: 113px; POSITION: absolute; TOP: 124px; HEIGHT: 26px">
				<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  border-width: 0px; border-style: none;height:25px;width:113px;" readonly  tabindex="4"    />
				</div>
				<div id="Label7_outer" style="Z-INDEX: 19; LEFT: 45px; WIDTH: 70px; POSITION: absolute; TOP: 277px; HEIGHT: 21px">
				<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:70px;"   ><STRONG>Isento.:</STRONG>&nbsp;</div>
				</div>
				<div id="Edit8_outer" style="Z-INDEX: 20; LEFT: 239px; WIDTH: 113px; POSITION: absolute; TOP: 272px; HEIGHT: 26px">
				<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  border-width: 0px; border-style: none;height:25px;width:113px;"  readonly  tabindex="12"    />
				</div>
				<div id="Edit9_outer" style="Z-INDEX: 21; LEFT: 239px; WIDTH: 113px; POSITION: absolute; TOP: 297px; HEIGHT: 26px">
				<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  border-width: 0px; border-style: none;height:25px;width:113px;"  readonly  tabindex="15"    />
				</div>
				<div id="Label3_outer" style="Z-INDEX: 22; LEFT: 45px; WIDTH: 103px; POSITION: absolute; TOP: 326px; HEIGHT: 26px">
				<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:103px;"   ><STRONG>Total.:</STRONG>&nbsp;</div>
				</div>
				<div id="Edit10_outer" style="Z-INDEX: 23; LEFT: 239px; WIDTH: 113px; POSITION: absolute; TOP: 322px; HEIGHT: 26px">
				<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  border-width: 0px; border-style: none;height:25px;width:113px;"  readonly  tabindex="15"    />
				</div>

            </td>
			</tr>
    </table>
</div>    
</html>
