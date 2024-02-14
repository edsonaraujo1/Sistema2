<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout Cadastro Incluir Retorno
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include("../conexao.php");
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db("$db");

$nome3a = strtolower($nome3);
// Abre Tabela Tenporaria

$consulta0  = "SELECT * FROM $nome3a WHERE Nome1 = '$nome3a'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$Edit1        = @$row0["Edit1"];
$Edit2		  = @$row0["Edit2"];
$Edit3		  = @$row0["Edit3"];
$Edit4		  = @$row0["Edit4"];
$Edit5		  = @$row0["Edit5"];
$alerta_1     = @$row0["mensage1"];
$categ_1      = @$row0["mensage2"];
$nome_do_edif = @$row0["mensage3"];
$nome_cad_si  = @$row0["mensage4"];


//$alerta_1   = $alerta_1;
$nome2_adms = $nome_do_edif; 


// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$adm1       = @$row3["adm1"];
$adm2       = @$row3["adm2"];
$adm3       = @$row3["adm3"];

?>
<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
</html>

<?


if (!empty($Edit1)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("done").focus();	
		}
		
		</script>
		
<div id="Codigo_outer" style="Z-INDEX: 6; LEFT: 253px; WIDTH: 194px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:194px;" onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"  onkeypress="return txtBoxFormat(document.Form1, 'Edit1', '99.999.999/9999-99', event);" onchange="Salva1(this.value)" tabindex="0"    />
</div>
		
		<?
}
?>


<div id="label1_outer" style="Z-INDEX: 123; LEFT: 250px; WIDTH: 442px; POSITION: absolute; TOP: 171px; HEIGHT: 20px">
<input type="text" id="label1" name="label1" value="<?=$nome_do_edif;?>" style=" font-family: Verdana; font-size: 14px; color: #0000FF;font-weight: bold; border-width: 0px; border-style: none;height:20px;width:442px;"  readonly  tabindex="0"    />
</div>

