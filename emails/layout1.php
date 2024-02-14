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

// include("../logar.php");


// Resgata a Sessao
session_start();
$Procura = strtoupper($_SESSION['Procura']);
$Opcao   = strtoupper($_SESSION['Opcao']);

include ("funcoes2.php");
 
?>

<script language='javascript'> 

function janelaSecundaria (URL){ 
   window.open(URL,"janela1","width=120,height=30,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

</script> 

<div align="center">
  <br>
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
              <td width="25%" class="style3"><div align="right"><b><font size="2" face="Verdana">Codigo.: </font></b></div></td>
              <td width="75%"><div align="left">
                <input name="matricula2" type="text" value="<?php echo $matricula ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;">
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Nome de Guerra.:</font></b></div></td>
              <td><div align="left">
                  <input type="text" name="nome_gerra" value="<?php echo $guerra ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:200px; background-color: #FFFFFF;">
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Nome.:</font></b></div></td>
              <td><div align="left">
                  <input name="nome" type="text" value="<?php echo $nome ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:460px; background-color: #FFFFFF;">
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Cargo.:</font></b></div></td>
              <td><div align="left">
                  <input name="cargo" type="text" value="<?php echo $funcao ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:256px; background-color: #FFFFFF;">
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Codigo.:</font></b></div></td>
              <td><div align="left">
                  <input name="matricula" type="text" value="<?php echo $matricula ?>" maxlength="5" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;">
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Rg.:</font></b></div></td>
              <td><div align="left">
                  <input type="text" name="rg" value="<?php echo $rgfunc ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:156px; background-color: #FFFFFF;">
                  <img src="../imagens/px1.gif" width="10" height="10"> <b><font size="2" face="Verdana">CPF.:
                  <input type="text" name="cpf" value="<?php echo $cpffunc ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:156px; background-color: #FFFFFF;">
                  </font></b></div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Departamento.:</font></b></div></td>
              <td><div align="left">
                <input name="dpto" type="text" id="dpto2" value="<?php echo $dpto ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:256px; background-color: #FFFFFF;">
</div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Data Admi.:</font></b></div></td>
              <td><div align="left">
                <input type="text" name="data" value="<?php echo $data ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:95px; background-color: #FFFFFF;">
</div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Frente=<font color="#FF0000">1</font> e Verso=<font color="#FF0000">2</font></font></b></div></td>
              <td><div align="left">
                <input name="tipo" type="text" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;">
                <img src="../imagens/px1.gif" width="10" height="10"><b><font size="2" face="Verdana">Sind=<font color="#FF0000">1</font> ou Cond=<font color="#FF0000">2</font></font></b><img src="../imagens/px1.gif" width="10" height="10">
                <input name="tipo2" type="text" value="<?php echo $empresa ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;">
              </div></td>
            </tr>
            <tr>
              <td valign="top" class="style3"><div align="right"><b><font size="2" face="Verdana">Observa&ccedil;&atilde;o.:</font> </b></div></td>
              <td><div align="left">
                <textarea name="tipo22" cols="55" rows="5" style=" font-family: Verdana; font-size: 14px;  width:460px; background-color: #FFFFFF;"><?php echo $obs ?></textarea>
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
