<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Incluir Cadastro 
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/20097 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

$Faz_uma_vez = $_SESSION['Faz_uma'];

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Abrir tabela edificios

$consulta  = "SELECT * FROM edificios ORDER BY COD DESC LIMIT 0,1";

$resultado = @mysql_query($consulta);

// Incrementa novo codigo

$row = mysql_fetch_array($resultado);

$id       = @$row["id"];
$cod_2    = @$row["COD"];

$Edit1 = $cod_2+1;
$Edit3 = date("d/m/Y");
$Edit2 = " ";

// Abrir tabela Senha

$tabela_1 = strtoupper('edificios');

$consulta3 = "SELECT * FROM permissoes WHERE login = '". anti_sql_injection($nome3) ."' and tabela = '". anti_sql_injection($tabela_1) ."'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

if ($per1 == "NAO")
{
   include("cadastro.php");
}
else
{

include("menu.php");

$menssagens = "* * * Incluir * * *";

// Resgata Sessao
session_start();

$Edit12 = trim($_SESSION['cnpj']);
$Edit4  = trim($_SESSION['comp_nome']);
$Edit5  = trim($_SESSION['nome_1']);
$Edit6  = trim($_SESSION['comp_end']);
$Edit7  = trim($_SESSION['endereco_1']); 
$Edit8  = trim($_SESSION['numero_1']); 
$Edit9  = trim($_SESSION['cep_1']);
$Edit10 = trim($_SESSION['bairro_1']);
$Edit13 = trim($_SESSION['cidade_1']);
$Edit11 = trim($_SESSION['uf_1']);

unset ($_SESSION['cnpj']);
unset ($_SESSION['comp_nome']);
unset ($_SESSION['nome_1']);
unset ($_SESSION['comp_end']);
unset ($_SESSION['endereco_1']); 
unset ($_SESSION['numero_1']); 
unset ($_SESSION['cep_1']);
unset ($_SESSION['bairro_1']);
unset ($_SESSION['cidade_1']);
unset ($_SESSION['uf_1']);


/*
  Rotina trata complemento COND. EDIF. 
  e complemento Endereco RUA, AVENIDA 
*/

// Nome

$ser_nome = explode(' ',$Edit5);
$var_comp1 = '';
for ($v=0; $v < 100; $v++)
{
	
	if ($ser_nome[$v] == "CONDOMINIO" or $ser_nome[$v] == "EDIFICIO" or $ser_nome[$v] == "CONJUNTO")
	{
		if ($ser_nome[$v] == "CONDOMINIO"){
		   $com_nome1 = "COND.";	
		}
		if ($ser_nome[$v] == "EDIFICIO"){
		   $com_nome1 = "EDIF.";	
		}
		if ($ser_nome[$v] == "CONJUNTO"){
		   $com_nome1 = "CONJ.";	
		}
		$var_comp1 = $var_comp1." ".$com_nome1;
	}else{
		$var_comp2 = $var_comp2." ".$ser_nome[$v];
	}
	
}
// Endereco

$ser_end = explode(' ',$Edit7);
$var_comp3 = '';
for ($t=0; $t < 100; $t++)
{
	
	if ($ser_end[$t] == "R" or $ser_end[$t] == "AV")
	{
		if ($ser_end[$t] == "R"){
		   $com_end1 = "RUA";	
		}
		if ($ser_end[$t] == "AV"){
		   $com_end1 = "AVENIDA";	
		}
		$var_comp3 = $var_comp3." ".$com_end1;
	}else{
		$var_comp4 = $var_comp4." ".$ser_end[$t];
	}
	
}
// Caso o Complemento do nome for branco coloque COND. EDIF.
if (empty($var_comp1)){
	//$var_comp1 = "COND. EDIF.";
}

/*
echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";

echo $Edit12."<br><br>";

echo $var_comp1."<br>";
echo $var_comp2."<br><br>";

echo $var_comp3."<br>";
echo $var_comp4."<br><br>";

*/
// Salva Sessao
session_start();

$_SESSION['cnpj_1']     = $Edit12;
$_SESSION['comp_nome']  = $var_comp1;
$_SESSION['nome_1']     = $var_comp2;
$_SESSION['comp_end']   = $var_comp3; 
$_SESSION['endereco_1'] = $var_comp4; 
$_SESSION['numero_1']   = $Edit8; 
$_SESSION['cep_1']      = retirar_ponto($Edit9);
$_SESSION['bairro_1']   = $Edit10;
$_SESSION['cidade_1']   = $Edit13;
$_SESSION['uf_1']       = $Edit11;
$_SESSION['Edit1']      = $Edit1;
$_SESSION['Edit3']      = $Edit3;
?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<style type="text/css" media="print">
div.invisivel {
visibility: hidden; 
}
</style>
<script src="script.js"></script>
<script src="function_salva.js"></script>
</head>

<?
//include("botoes_ins.php");
include("funcoes2.php");
?>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<form style="margin-bottom: 0" id="Unit2" name="Unit2" method="POST" action="insert.php?Cond_1=<?=$Edit13;?>">
<table  width="10"   style="height:10px"  border="0" cellpadding="0" cellspacing="0"   align="Center" ><tr><td valign="top">
<div id="Shape1_outer" style="Z-INDEX: 0; LEFT: 141px; WIDTH: 724px; POSITION: absolute; TOP: 44px; HEIGHT: 357px">
<script type="text/javascript">
  var Shape1_Canvas = new jsGraphics("Shape1_outer");
  Shape1_Canvas.setColor("#FFFFFF");
  Shape1_Canvas.fillRect(16, 16, 692 - 16, 325 - 16);
  Shape1_Canvas.fillRect(16, 16, 692 - 16 + 1, 325 - 16 + 1);
  Shape1_Canvas.setStroke(16);
  Shape1_Canvas.setColor("<?=$color_bor;?>");
  Shape1_Canvas.drawRect(16, 16, 692 - 16 + 1, 325 - 16 + 1);
  Shape1_Canvas.paint();
</script>

</div>
<div id="Shape2_outer" style="Z-INDEX: 1; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 77px; HEIGHT: 55px">
<script type="text/javascript">
  var Shape2_Canvas = new jsGraphics("Shape2_outer");
  Shape2_Canvas.setColor("#FFFFFF");
  Shape2_Canvas.fillRect(1, 1, 656 - 1, 53 - 1);
  Shape2_Canvas.fillRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.setStroke(1);
  Shape2_Canvas.setColor("<?=$color_bor;?>");
  Shape2_Canvas.drawRect(1, 1, 656 - 1 + 1, 53 - 1 + 1);
  Shape2_Canvas.paint();
</script>

</div>
<div id="Label1_outer" style="Z-INDEX: 2; LEFT: 183px; WIDTH: 400px; POSITION: absolute; TOP: 90px; HEIGHT: 32px">
<div id="Label1" style=" font-family: Verdana; font-size: 26px; color: <?=$color_bor;?>; background-color: #FFFFFF;height:32px;width:400px;"   ><STRONG>Cadastro Empr./Contab.</STRONG></div>
</div>
<div id="Menssage_outer" style="Z-INDEX: 3; LEFT: 614px; WIDTH: 208px; POSITION: absolute; TOP: 95px; HEIGHT: 24px">
<div id="Menssage" style=" font-family: Verdana; font-size: 14px;  height:24px;width:208px;"  align="Center"   ><STRONG><?=$menssagens;?></STRONG></div>
</div>
<div id="Shape3_outer" style="Z-INDEX: 4; LEFT: 174px; WIDTH: 658px; POSITION: absolute; TOP: 133px; HEIGHT: 235px">
<script type="text/javascript">
  var Shape3_Canvas = new jsGraphics("Shape3_outer");
  Shape3_Canvas.setColor("#FFFFFF");
  Shape3_Canvas.fillRect(1, 1, 656 - 1, 233 - 1);
  Shape3_Canvas.fillRect(1, 1, 656 - 1 + 1, 233 - 1 + 1);
  Shape3_Canvas.setStroke(1);
  Shape3_Canvas.setColor("<?=$color_bor;?>");
  Shape3_Canvas.drawRect(1, 1, 656 - 1 + 1, 233 - 1 + 1);
  Shape3_Canvas.paint();
</script>

</div>
<div id="Label2_outer" style="Z-INDEX: 5; LEFT: 181px; WIDTH: 64px; POSITION: absolute; TOP: 144px; HEIGHT: 26px">
<div id="Label2" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:64px;"   ><STRONG>Codigo.:</STRONG></div>
</div>
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 56px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px; background-color: #FFFFFF;" disabled tabindex="1"    />
</div>
<div id="Label3_outer" style="Z-INDEX: 7; LEFT: 382px; WIDTH: 84px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label3" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:84px;"   > <STRONG>Atividade.:</STRONG> </div>
</div>
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 470px; WIDTH: 137px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="CONTRIBUINTE" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px; background-color: #FFFFFF;" disabled tabindex="2"    />
</div>
<div id="Label4_outer" style="Z-INDEX: 9; LEFT: 676px; WIDTH: 47px; POSITION: absolute; TOP: 144px; HEIGHT: 18px">
<div id="Label4" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:47px;"   ><STRONG>Data.:</STRONG></div>
</div>
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 729px; WIDTH: 93px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px; background-color: #FFFFFF;" disabled tabindex="3"    />
</div>
<div id="Label11_outer" style="Z-INDEX: 11; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 170px; HEIGHT: 26px">
<div id="Label11" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Nome.:</STRONG>&nbsp;</div>
</div>
<div id="Edit5_outer" style="Z-INDEX: 12; LEFT: 278px; WIDTH: 544px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit4." ".$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:544px;"  tabindex="5"    />
</div>
<div id="Label12_outer" style="Z-INDEX: 13; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 194px; HEIGHT: 26px">
<div id="Label12" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Endereco.:</STRONG></div>
</div>
<div id="Edit7_outer" style="Z-INDEX: 14; LEFT: 278px; WIDTH: 544px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit6." ".$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:544px;" tabindex="7"    />
</div>
<div id="Label13_outer" style="Z-INDEX: 15; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<div id="Label13" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Numero.:</STRONG>&nbsp;</div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 16; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 213px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px;"  tabindex="8"    />
</div>
<div id="Label14_outer" style="Z-INDEX: 17; LEFT: 468px; WIDTH: 62px; POSITION: absolute; TOP: 242px; HEIGHT: 26px">
<div id="Label14" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:62px;"   ><STRONG>Bairro.:</STRONG>&nbsp;</div>
</div>
<div id="Edit10_outer" style="Z-INDEX: 18; LEFT: 532px; WIDTH: 180px; POSITION: absolute; TOP: 237px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:180px;"  tabindex="10"    />
</div>
<div id="Label15_outer" style="Z-INDEX: 19; LEFT: 181px; WIDTH: 89px; POSITION: absolute; TOP: 242px; HEIGHT: 26px">
<div id="Label15" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:89px;"   ><STRONG>Cep.:</STRONG>&nbsp;</div>
</div>
<div id="Edit9_outer" style="Z-INDEX: 20; LEFT: 278px; WIDTH: 83px; POSITION: absolute; TOP: 237px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:83px;"  tabindex="9"    />
</div>
<div id="Label16_outer" style="Z-INDEX: 21; LEFT: 181px; WIDTH: 70px; POSITION: absolute; TOP: 267px; HEIGHT: 21px">
<div id="Label16" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:70px;"   ><STRONG>CNPJ.:</STRONG>&nbsp;</div>
</div>
<div id="Edit12_outer" style="Z-INDEX: 22; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 262px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;"  disabled  tabindex="12"    />
</div>
<div id="Label17_outer" style="Z-INDEX: 23; LEFT: 718px; WIDTH: 70px; POSITION: absolute; TOP: 243px; HEIGHT: 26px">
<div id="Label17" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:26px;width:70px;"   ><STRONG>Estado.:</STRONG>&nbsp;</div>
</div>
<div id="Edit11_outer" style="Z-INDEX: 24; LEFT: 783px; WIDTH: 39px; POSITION: absolute; TOP: 238px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px;"  tabindex="11"    />
</div>


<div id="Label18_outer" style="Z-INDEX: 21; LEFT: 181px; WIDTH: 270px; POSITION: absolute; TOP: 293px; HEIGHT: 21px">
<div id="Label18" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:21px;width:270px;"   ><STRONG>Local onde Cadastrar.:</STRONG>&nbsp;</div>
</div>
<div id="Edit13_outer" style="Z-INDEX: 23; LEFT: 370px; WIDTH: 275px; POSITION: absolute; TOP: 289px; HEIGHT: 26px">
<select type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:275px; background-color: #FFFFFF;"    tabindex="13"    />


    <option value="EDIFICIOS"> CADASTRO DE EMPRESAS   </option>
    <option value="ADMINISTRADORAS"> CADASTRO DE ADM/CONTABILIDADE </option>
            				
				
</select>

</div>


</td></tr></table>


<div style="Z-INDEX: 34; LEFT: 185px; WIDTH: 544px; POSITION: absolute; TOP: 323px; HEIGHT: 80px">
<table border="0">
          <td> </td>
          <td><input type=image name="Incluir" src="../imagens/botaoazul10.PNG"></td>
          </form>

          <form method="POST" action="cadastro.php?Edit2=''">
          <td><input type=image name="Descartar" src="../imagens/botaoazul33.PNG"></td>
          </form>

</table>
</div>

<tr><td><!-- AQUI SERÁ APRESENTADO O RESULTADO DA BUSCA DINÂMICA.. OU SEJA OS NOMES -->
<div id="pagina" class="invisivel"></div></td></tr>
</body>
</html><?
}

Function retirar_ponto($var){

$var = str_replace(".",             "",$var);

return($var);
}

?>
