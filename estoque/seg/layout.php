<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout Cadastro 
 Criado em Data.....: 28/02/2008
 Ultima Atualização : 21/01/2009

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/
// salva Secao
@session_start();
$_SESSION['Inic'] = $id;
$_SESSION['Ante'] = $id;
$_SESSION['Prox'] = $id;
$_SESSION['Fim']  = $id;
$_SESSION['tipo_acao'] = 'alterar_1';
// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");


// Resgata a Sessao
@session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);

include_once("funcoes2.php");

include('../config.php');
 
?>

<html >
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<script src="script.js"></script>
<script>


function janelaSecundaria (URL){ 
   window.open(URL,"janela1","width=120,height=30,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 


function Inicio()
{
url="navegacao_top.php";
ajax(url);
}
function Proximo()
{
url="navegacao_next.php";
ajax(url);
}
function Anterior()
{
url="navegacao_prev.php";
ajax(url);
}
function Fim()
{
url="navegacao_end.php";
ajax(url);
}

</script>

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 
<br/>
<img src="../imagens/px1.gif" width="15" height="23">
<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >

<div align="center">
  <table width="697" height="190" border="16" bordercolor="<?php echo $color_bor ?>" bgcolor="#FFFFFF">
    <tr>
      <td height="53"><table width="100%" border="0">
        <tr>
          <td width="64%" height="42"><div align="left"><b><font size="5" face="Verdana" color="<?php echo $color_bor ?>">Cadastro de Estoque</font></b></div></td>
          <td width="36%"><div align="center"><b><font size="2" face="Verdana">
              <?php echo $menssagens ?>
          </font></b></div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="688" border="0">
        <tr>
          <td width="569"><table width="100%" border="0" cellpadding="1" cellspacing="0">
            <form name="form1" method="post"  action="barcode1.php" target="new">
              <div align="left"></div>
              <tr>
                <td width="25%" class="style3"><div align="right"><b><font size="2" face="Verdana">Codigo.: </font></b></div></td>
                <td width="75%"><div align="left">
                    <input name="Edit1" type="text" disabled id="Edit1" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;" value="<?php echo $Edit1 ?>">
                    <img src="../imagens/px1.gif" width="10" height="10" border="0"><b><font size="2" face="Verdana">Data .:
                    <input name="Edit2" type="text" disabled id="Edit2" style=" font-family: Verdana; font-size: 14px;  height:23px;width:100px; background-color: #FFFFFF;" value="<?php echo $Edit2 ?>" maxlength="10" >
                </font></b> </div></td>
              </tr>
              <tr>
                <td class="style3"><div align="right"><b><font size="2" face="Verdana">Descri&ccedil;&atilde;o .:</font></b></div></td>
                <td><div align="left">
                    <input name="Edit3" type="text" disabled id="Edit3" style=" font-family: Verdana; font-size: 14px;  height:23px;width:460px; background-color: #FFFFFF;" value="<?php echo $Edit3 ?>" >
                </div></td>
              </tr>
              <tr>
                <td class="style3"><div align="right"><b><font size="2" face="Verdana">Unidade.:</font></b></div></td>
                <td><div align="left">
                    <input name="Edit4" type="text" disabled id="Edit4" style=" font-family: Verdana; font-size: 14px;  height:23px;width:100px; background-color: #FFFFFF;" value="<?php echo $Edit4 ?>" >
                    <img src="../imagens/px1.gif" width="10" height="10" border="0"><strong><font size="2" face="Verdana">Qtd.Estoq.:
                    <input name="Edit5" type="text" disabled id="Edit5" style=" font-family: Verdana; font-size: 14px;  height:23px;width:100px; background-color: #FFFFFF;" value="<?php echo $Edit5 ?>" >
                    <img src="../imagens/px1.gif" width="10" height="10" border="0">Qtd.Min. :
                    <input name="Edit6" type="text" disabled id="Edit6" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;" value="<?php echo $Edit6 ?>"> 
                    </font></strong></div></td>
              </tr>
              <tr>
                <td class="style3"><div align="right"><b><font size="2" face="Verdana">Classe.:</font></b></div></td>
                <td><div align="left">
                    <input name="Edit7" type="text" disabled id="Edit7" style=" font-family: Verdana; font-size: 14px;  height:23px;width:156px; background-color: #FFFFFF;" value="<?php echo $Edit7 ?>" >
                    <img src="../imagens/px1.gif" width="10" height="10" border="0"><strong><font size="2" face="Verdana">Vencimento.: 
                    <input name="Edit8" type="text" disabled id="Edit8" style=" font-family: Verdana; font-size: 14px;  height:23px;width:100px; background-color: #FFFFFF;" value="<?php echo $Edit8 ?>" >
                    </font></strong></div></td>
              </tr>
              <tr>
                <td class="style3"><div align="right"><b><font size="2" face="Verdana">Fornecedor.:</font></b></div></td>
                <td><div align="left">
                    <input name="Edit9" type="text" disabled id="Edit9" style=" font-family: Verdana; font-size: 14px;  height:23px;width:460px; background-color: #FFFFFF;" value="<?php echo $Edit9 ?>" maxlength="10" >
                    <b><font size="2" face="Verdana"> </font></b></div></td>
              </tr>
              <tr>
                <td class="style3"><div align="right"><b><font size="2" face="Verdana">Refer&ecirc;ncia.:</font></b></div></td>
                <td><div align="left">
                    <input name="Edit10" type="text" disabled id="Edit10" style=" font-family: Verdana; font-size: 14px;  height:23px;width:256px; background-color: #FFFFFF;" value="<?php echo $Edit10 ?>" >
                </div></td>
              </tr>
              <tr>
                <td class="style3"><div align="right"><b><font size="2" face="Verdana">Saldo.:</font></b></div></td>
                <td><div align="left">
                    <input name="Edit11" type="text" disabled id="Edit11" style=" font-family: Verdana; font-size: 14px;  height:23px;width:200px; background-color: #FFFFFF;" value="<?php echo $Edit11 ?>" >
                    <img src="../imagens/px1.gif" width="10" height="10" border="0"><strong><font size="2" face="Verdana">Valor.:
                    <input name="Edit12" type="text" disabled id="Edit12" style=" font-family: Verdana; font-size: 14px;  height:23px;width:156px; background-color: #FFFFFF;" value="<?php echo $Edit12 ?>" >
                    </font></strong></div></td>
              </tr>
              <tr>
                <td valign="top" class="style3"><div align="right"><b><font size="2" face="Verdana">Observa&ccedil;&otilde;es.:</font></b></div></td>
                <td><div align="left">
                			                 
                <textarea name="obs" cols="55" rows="5" disabled id="obs" style=" font-family: Verdana; font-size: 14px;  width:460px; background-color: #FFFFFF;" ><?php echo $Edit13 ?>
                </textarea>

                </div></td>
              </tr>
            </form>
          </table></td>
          <td valign="top"><div align="center"><img src="../imagens/fotos/Branco.bmp" width="102" height="102"><br>
            <br>
              <a href="captura.php">Incluir Foto</a>          </div></td>
        </tr>
      </table>        
        <table width="633" border="0" align="center">
        <tr>
          <td width="4"><img src="../imagens/px1.gif" width="15" height="1"></td>
          <td width="590"><div align="center">
              <?php
			include('botoes.php');
			?>
          </div></td>
          <td width="33" valign="bottom"><img src="../imagens/vacina.JPG" width="27" height="38"></td>
        </tr>
      </table>
      </td>
    </tr>
  </table>
</div>
</body>
</html>
