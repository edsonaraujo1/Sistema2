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

$nome3 = $_SESSION["nome_log"];

// Resgata Sessao
session_name("Val_Etq_Edif");
session_start();

$Edit1  = $_SESSION['Edit1'];
$Edit2  = $_SESSION['Edit2'];

include("vaurls.php");

$deixar = acesso_url("CRACHA_PRINTER");

if ($deixar == "SIM"){

    include("../menu_sub2.php");

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

$cod_2_prin = $_GET['Cod_2'];
	
$consulta  = "SELECT * FROM cracha WHERE id = " . $_GET['Cod_2'] . " ORDER BY id ASC LIMIT 0,50";

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


<?php
include("funcoes2.php");
?>

<html >
<div align="center">
  <table width="544" border="16" bordercolor="<?php echo $color_bor ?>" bgcolor="#FFFFFF" >
    <tr>
      <td><div align="center">
          <table width="118%" border="0">
            <tr>
              <td width="86%" height="42"><div align="left"><b><font size="5" face="Verdana" color="<?php echo $color_bor ?>">Imprimir Gracha</font></b></div></td>
              <td width="14%"><div align="center"><span class="style8"></span></div></td>
            </tr>
          </table>
      </div></td>
    </tr>
    <tr>
      <td height="194"><div align="center">
          <form name="form3" method="post" action='barcode1.php' target="new">
            <table width="482" height="164" border="0" cellspacing="8">
              <tr>
                <td><div align="center">
                    <table width="98%" border="0" cellpadding="1" cellspacing="0">
                      <div align="left"></div>
                      <tr>
                        <td width="34%" class="style3"><div align="right"><b><font size="2" face="Verdana">Codigo a Imprimir.: </font></b></div></td>
                        <td width="66%"><div align="left">
                            <input name="matricula22" type="text" value="<?php echo $matricula ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;">
                            <input type="hidden" maxlength=30 size=30 name="id2" value="<?php echo $id ?>">
                        </div></td>
                      </tr>
                      <tr>
                        <td class="style3"><div align="right"><b><font size="2" face="Verdana">Nome.:</font></b></div></td>
                        <td><div align="left">
                            <input type="text" name="nome_gerra3" value="<?php echo $nome ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:260px; background-color: #FFFFFF;">
                        </div></td>
                      </tr>
                      <tr>
                        <td class="style3"><div align="right"><b><font size="2" face="Verdana">Cargo.:</font></b></div></td>
                        <td><div align="left">
                            <input type="text" name="nome_gerra22" value="<?php echo $funcao ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:200px; background-color: #FFFFFF;">
                        </div></td>
                      </tr>
                      <tr>
                        <td class="style3">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                    <br>
                    <table width="383" border="0">
                      <tr>
                        <td><div align="center">
                            <table width="267" border="0" cellspacing="10">
                              <tr>
                                <td><div align="center">
                                    <input type=image name="Imprimir2" src="../imagens/botaoazul23.PNG">
                                </div></td>
                                <td><div align="center">
                                <a href="cadastro.php?Cod_xxx=<?php echo $id ?>"><img src="../imagens/botaoazul9.PNG" width="92" height="22" border="0" /></a>
                                </div></td>
                              </tr>
                            </table>
                        </div></td>
                      </tr>
                    </table>
                </div></td>
              </tr>
            </table>
          </form>
      </div></td>
    </tr>
  </table>
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
