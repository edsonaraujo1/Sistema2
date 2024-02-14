<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Consultar Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

//include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

// Resgata Sessao
session_name("Val_Etq_Edif");
session_start();

$Edit1  = $_SESSION['Edit1'];
$Edit2  = $_SESSION['Edit2'];

include("vaurls.php");

$deixar = acesso_url("CRACHA_1");

if ($deixar == "SIM"){

		session_start();
		unset ($_SESSION['Procura']);
		unset ($_SESSION['Procura_up']);
		unset ($_SESSION['tipo_acao']);
        unset ($_SESSION['Acao']);
        unset ($_SESSION['navega']);
        unset ($_SESSION['Edit1']);
        unset ($_SESSION['Edit2']);


// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

	
$consulta  = "SELECT * FROM cracha WHERE id = '" . $_GET['Cod_2'] . "' ORDER BY id ASC LIMIT 0,50";

$resultado = mysql_query($consulta);

$row = mysql_fetch_array($resultado);

$id             = @$row["id"];
$matricula 		= @$row["matricula"];
$guerra 	    = @$row["nome_guera"];
$nome   		= @$row["nome"];
$funcao 		= @$row["cargo"]; 
$rgfunc 		= @$row["rg"];
$cpffunc 		= @$row["cpf"];
$dpto   		= @$row["dpto"];
$data           = @$row["data"];
$obs            = @$row["obs"];
$empresa        = @$row["empresa"];
        
?>

<script language="JavaScript"><!--

//document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
}
//-->
</script>

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<style>

.normal {
	
	background-color: white;
}
.anormal {
		background-color: Lavender;
}

</style>

<body>
</html>

<?php
include("funcoes2.php");
?>

<html >
<div align="center" style="Z-INDEX: 0; LEFT: 242px; POSITION: absolute;  TOP: 41px;"> 
<form name="Form1" type='hidden' method='POST' action='barcode1.php' target="new">
  <br>
  <table width="549" border="16" bordercolor="<?php echo $color_bor ?>" bgcolor="#FFFFFF">
    <tr>
      <td><div align="center">        
        <table width="100%" border="0">
          <tr>
            <td width="86%" height="42"><div align="left"><b><font size="5" face="Verdana" color="<?php echo $color_bor ?>">Imprimir Gracha</font></b></div></td>
            <td width="14%"><div align="center"><span class="style8"></span></div></td>
          </tr>
        </table>
        </div></td>
    </tr>
    <tr>
      <td><div align="center">
        <table width="96%" border="0" cellpadding="1" cellspacing="0">
          <form name="form1" method="post"  action="barcode1.php" target="new">
            <div align="left"></div>
            <tr>
              <td width="34%" class="style3"><div align="right"><b><font size="2" face="Verdana">Codigo a Imprimir.: </font></b></div></td>
              <td width="66%"><div align="left">
                <input name="matricula2" type="text" value="<?php echo $matricula ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;">
                <input type="hidden" maxlength=30 size=30 name=id value="<?php echo $id ?>"> 
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Nome.:</font></b></div></td>
              <td><div align="left">
                  <input type="text" name="nome_gerra" value="<?php echo $nome ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:260px; background-color: #FFFFFF;">
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Cargo.:</font></b></div></td>
              <td><div align="left">
                <input type="text" name="nome_gerra2" value="<?php echo $funcao ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:200px; background-color: #FFFFFF;">
              </div></td>
            </tr>

        </table>
        <img src="../imagens/px1.gif" width="10" height="8">        <table width="471" border="0">
          <tr>
            <td width="15"><img src="../imagens/px1.gif" width="15" height="1"></td>
            <td width="437"><div align="center">
                <table width="194" border="0">
                  <tr>
                    <td width="288"><div align="center">
					
					         <input type=image name="Imprimir" src="../imagens/botaoazul23.PNG"></td>
         </form>

					
</div></td>
                    <td width="92"><div align="center">
					
<form method="POST" action="cadastro.php?Cod_xx=1">
         <td><input type=image name="vontar" src="../imagens/botaoazul9.PNG"></td>
         </form>					
					</div></td>
                    </tr>
                </table>
            </div></td>
            <td width="10" valign="bottom">&nbsp;</td>
          </tr>
        </table>
      <img src="../imagens/px1.gif" width="10" height="9"> </div></td>
    </tr>
  </table>
  <p></form>
</p>
</div>
</body>
</html>

<?php
}else{
	
include("enaaurlnp.php");
	
}
// Resgata Sessao
session_start();

unset ($_SESSION['Edit1']);
unset ($_SESSION['Edit2']);

?>
