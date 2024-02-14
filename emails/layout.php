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

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<div align="center" style="Z-INDEX: 0; LEFT: 142px; POSITION: absolute;  TOP: 39px;"> 
  
  <img src="../imagens/px1.gif" width="10" height="20">
  <table width="697" border="16" bordercolor="<?php echo $color_bor ?>" bgcolor="#FFFFFF">
    <tr>
      <td><div align="center">        
        <table width="100%" border="0">
          <tr>
            <td width="64%" height="42"><div align="left"><b><font size="5" face="Verdana" color="<?php echo $color_bor ?>">Cadastro de E-Mails </font></b></div></td>
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
                <input name="codigo" type="text" disabled id="codigo" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;" value="<?php echo $Edit1 ?>">
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Nome .:</font></b></div></td>
              <td><div align="left">
                  <input name="nome" type="text" disabled id="nome" style=" font-family: Verdana; font-size: 14px;  height:23px;width:460px; background-color: #FFFFFF;" value="<?php echo $Edit2 ?>" >
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">E-Mail.:</font></b></div></td>
              <td><div align="left">
                  <input name="email" type="text" disabled id="email" style=" font-family: Verdana; font-size: 14px;  height:23px;width:460px; background-color: #FFFFFF;" value="<?php echo $Edit3 ?>" >
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Categoria.:</font></b></div></td>
              <td><div align="left">
                  <input name="categoria" type="text" disabled id="categoria" style=" font-family: Verdana; font-size: 14px;  height:23px;width:256px; background-color: #FFFFFF;" value="<?php echo $Edit4 ?>" >
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Enviado.:</font></b></div></td>
              <td><div align="left">
                  <input name="situacao" type="text" disabled id="situacao" style=" font-family: Verdana; font-size: 14px;  height:23px;width:156px; background-color: #FFFFFF;" value="<?php echo $Edit5 ?>" maxlength="10" >
                  <img src="../imagens/px1.gif" width="10" height="10" border="0"><b><font size="2" face="Verdana">em .:
                  <input name="data" type="text" disabled id="data" style=" font-family: Verdana; font-size: 14px;  height:23px;width:100px; background-color: #FFFFFF;" value="<?php echo $Edit6 ?>" maxlength="10" >
                  </font></b></div></td>
            </tr>
            <tr>
              <td valign="top" class="style3"><div align="right"><b><font size="2" face="Verdana">Historico.:</font></b></div></td>
              <td><div align="left">   
			  
				<?php
				$consulta5 = "SELECT * FROM log_email_boletim WHERE email = '$Edit3' ORDER BY str_to_date( data, '%d/%m/%Y') DESC, id DESC";
				
				$resultado5 = mysql_query($consulta5);
				
				?>
				
				<select name="listbox" size="4" style=" font-family: Verdana; font-size: 14px; width:460px; color: #696969;">
				
				<?php
				while ($linha5 = mysql_fetch_array($resultado5))
				{
				       $matric_1  = $linha5["id"];
				       $data_1    = $linha5["data"];
				       $hora_1    = substr($linha5["hora"],0,5);
				       $depend_1  = $linha5["estatus"];
				       $denti_1   = $linha5["informacao"];
				       $noticias_1  = $linha5["noticias"];
				       
				      
					   ?>
					   <option value=""><?php echo $data_1.'|'.$hora_1 ?>|&nbsp;<?php echo $depend_1 ?>|&nbsp;<?php echo $noticias_1 ?></option>
					   <?php
				}
				?>
				</select>
			  
<!--			                 
                <textarea name="obs" cols="55" rows="5" disabled id="obs" style=" font-family: Verdana; font-size: 14px;  width:460px; background-color: #FFFFFF;" ><?php echo $Edit7 ?>
                </textarea>
-->                
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
