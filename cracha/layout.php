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
session_start();
$_SESSION['Inic'] = $id;
$_SESSION['Ante'] = $id;
$_SESSION['Prox'] = $id;
$_SESSION['Fim']  = $id;
$_SESSION['tipo_acao'] = 'alterar_1';
// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

//// include("../logar.php");


// Resgata a Sessao
session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);

include_once("funcoes2.php");
 
?>

<script language='javascript'> 

function janelaSecundaria (URL){ 
   window.open(URL,"janela1","width=120,height=30,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

</script> 

<html >
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style1 {
	font-family: Verdana;
	font-size: 2;
}
-->
</style>
</head>

<script src="script.js"></script>
<script>
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

<?php
$ver_foto = trim($id.".jpg");
?>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<div align="center" style="Z-INDEX: 0; LEFT: 142px; POSITION: absolute;  TOP: 39px;"> 
  
  <img src="../imagens/px1.gif" width="10" height="20">
  <table width="697" border="16" bordercolor="<?php echo $color_bor ?>" bgcolor="#FFFFFF">
    <tr>
      <td><div align="center">        
        <table width="100%" border="0">
          <tr>
            <td width="64%" height="42"><div align="left"><b><font size="5" face="Verdana" color="<?php echo $color_bor ?>">Impress&atilde;o de Gracha</font></b></div></td>
            <td width="36%"><div align="center"><b><font size="2" face="Verdana"><?php echo $menssagens ?></font></b></div></td>
          </tr>
        </table>
        </div></td>
    </tr>
    <tr>
      <td><div align="center">
        <table width="100%" border="0" cellpadding="1" cellspacing="0">
          <form name="form1" method="post"  action="barcode1.php" target="new">
            <div align="left"></div>
            <tr>
              <td width="25%" class="style3"><div align="right">
                <table width="200" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="28"><div align="right"><b><font size="2" face="Verdana">Codigo.:</fon></b></div></td>
                  </tr>
                  <tr>
                    <td height="24"><div align="right"><b><font size="2" face="Verdana">Nome de Guerra.:</font></b></div></td>
                  </tr>
                  <tr>
                    <td height="23"><div align="right"><b><font size="2" face="Verdana">Nome.:</font></b></div></td>
                  </tr>
                  <tr>
                    <td height="23"><div align="right"><b><font size="2" face="Verdana">Cargo.:</font></b></div></td>
                  </tr>
                </table>
                <b><font size="2" face="Verdana"> </font></b></div></td>
              <td width="75%"><div align="left">
                
                <table width="445" height="52" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="380">
					
<table width="375" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="360"><input name="matricula2" type="text" value="<?php echo $id ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;" disabled></td>
                    <td width="15">&nbsp;</td>
                  </tr>
                  <tr>
                    <td><input type="text" name="nome_gerra" value="<?php echo $guerra ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:200px; background-color: #FFFFFF;" disabled ></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><input name="nome" type="text" value="<?php echo $nome ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:360px; background-color: #FFFFFF;" disabled ></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><input name="cargo" type="text" value="<?php echo $funcao ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:256px; background-color: #FFFFFF;" disabled ></td>
                    <td>&nbsp;</td>
                  </tr>
                </table>					
					
					
					</td>
                    <td width="65"><div align="center"><img src="fotos/<?php echo $ver_foto ?>" width="84" height="100" border="1"></div></td>
                    <td width="65"><img src="../imagens/px1.gif" width="35" height="1"></td>
                  </tr>
                </table>
                </div>
              </td>
            </tr>
             <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Matricula.:</font></b></div></td>
              <td><div align="left">
                  <input name="matricula" type="text" value="<?php echo $matricula ?>" maxlength="5" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;" disabled >
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Rg.:</font></b></div></td>
              <td><div align="left">
                  <input type="text" name="rg" value="<?php echo $rgfunc ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:156px; background-color: #FFFFFF;" disabled >
                  <img src="../imagens/px1.gif" width="10" height="10"> <b><font size="2" face="Verdana">CPF.:
                  <input type="text" name="cpf" value="<?php echo $cpffunc ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:156px; background-color: #FFFFFF;" disabled >
                  </font></b></div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Departamento.:</font></b></div></td>
              <td><div align="left">
                <input name="dpto" type="text" id="dpto2" value="<?php echo $dpto ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:256px; background-color: #FFFFFF;" disabled >
</div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Data Admi.:</font></b></div></td>
              <td><div align="left">
                <input type="text" name="data" value="<?php echo $data ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:95px; background-color: #FFFFFF;" disabled >
</div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Frente=<font color="#FF0000">1</font> e Verso=<font color="#FF0000">2</font></font></b></div></td>
              <td><div align="left">
                <input name="tipo" type="text" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;">
                <img src="../imagens/px1.gif" width="10" height="10"><b><font size="2" face="Verdana">Sind=<font color="#FF0000">1</font>, Cond=<font color="#FF0000">2</font> ou Fena=<font color="#FF0000">3</font></font></b><img src="../imagens/px1.gif" width="10" height="10">
                <input name="tipo2" type="text" value="<?php echo $empresa ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;" disabled >
              </div></td>
            </tr>
            <tr>
              <td valign="top" class="style3"><div align="right"><b><font size="2" face="Verdana">Observa&ccedil;&atilde;o.:</font> </b></div></td>
              <td><div align="left">
                <textarea name="tipo22" cols="55" rows="5" style=" font-family: Verdana; font-size: 14px;  width:460px; background-color: #FFFFFF;" disabled ><?php echo $obs ?></textarea>
</div></td>
            </tr>
          </form>
        </table>
        <img src="../imagens/px1.gif" width="10" height="4">
		
		<table width="633" border="0">
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
        
    </tr>
  </table>

</div>
</body>
</html>
