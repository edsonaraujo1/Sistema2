<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Insert Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

session_cache_expire(180); //5 minutos por exemplo...

//// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("CRACHA_1");

if ($deixar == "SIM"){

$log_ssoc = $nome3;
$hora = date("d/m/Y"); 

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
<body>

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

</body>
</html>

<?php

$menssagens = "* * * Incluido * * *";

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

include("funcoes2.php");

$nome3a = strtolower($nome3);

// Abre Tabela Tenporaria

$consulta0  = "SELECT * FROM $nome3a WHERE Nome1 = '$nome3a'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$Edit1      = trim(strtoupper(retirar_carac(@$row0["Edit1"])));
$Edit2		= trim(strtoupper(retirar_carac(@$row0["Edit2"])));
$Edit3		= trim(strtoupper(retirar_carac(@$row0["Edit3"])));
$Edit4		= trim(strtoupper(retirar_carac(@$row0["Edit4"])));
$Edit5		= trim(strtoupper(retirar_carac(@$row0["Edit5"])));
$Edit6		= trim(strtoupper(retirar_carac(@$row0["Edit6"])));
$Edit7		= trim(strtoupper(retirar_carac(@$row0["Edit7"])));
$Edit8		= trim(strtoupper(retirar_carac(@$row0["Edit8"])));
$Edit9		= trim(strtoupper(retirar_carac(@$row0["Edit9"])));
$Edit10		= trim(strtoupper(retirar_carac(@$row0["Edit10"])));
$Edit11		= trim(strtoupper(retirar_carac(@$row0["Edit11"])));
$Edit12		= trim(strtoupper(retirar_carac(@$row0["Edit12"])));
$Edit13	    = trim(retirar_carac(@$row0["memo1"]));
$alerta_1   = trim(strtoupper(retirar_carac(@$row0["mensage1"])));
$nome_adm   = trim(strtoupper(retirar_carac(@$row0["mensage3"])));

if(strlen($Edit14)<=0){
  $Edit14   = 0; 	
}
if(strlen($Edit19)<=0){
  $Edit19   = 0; 	
}

$cami2 = '../imagens/fotos/Branco.bmp';  

$consulta0  = "SELECT * FROM cracha WHERE id = '$Edit1'";

$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$id    = @$row0["id"];
//$cod_2 = @$row0["id"];

if (!empty($cod_2)){
	

	echo ("
			
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Matricula ja consta no Cadastro !!! ***</b>
		     <table align=center>
		     <form method='POST' action='cadsocios.php?Cod_xxx=$id'>
		     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
             exit;

}


// Abrir tabela edificios

$consulta_id  = "SELECT * FROM cracha ORDER BY id DESC LIMIT 0,1";

$resultado_id = @mysql_query($consulta_id);

// Incrementa novo codigo

$row_id = mysql_fetch_array($resultado_id);

$id_id       = @$row_id["id"];

$novo_1 = $id_id+1;
$dat_insc = date("d/m/Y");


	
		$consulta = "INSERT INTO cracha    (matricula,
											nome_guera,
											nome,
											cargo, 
											rg,
											cpf,
											dpto,
											data,
											empresa,
											obs)
		                VALUES
		                                  ('$Edit5',
										   '$Edit2',
										   '$Edit3',
										   '$Edit4',
										   '$Edit6',
										   '$Edit7',
										   '$Edit8',
										   '$Edit9',
										   '$Edit10',
										   '$Edit11')";
		
		@mysql_query($consulta, $link) or
		
		die("
		     <br>
		     <br>
		     
			 <div align=center>
		
		     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
		     <tr>
		     <td>
		     <font face=arial><b>*** Falha na Inclusão !!! ***</b>
		     <table align=center>
		     <form method='POST' action='cadastro.php'>
		     <td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
		     </form> 
		     </table>
		     </td>
		     </tr>
		     </table>
		     </div>");
		     
     
			// Atualiza arquivo Log
			$data_log = date("d/m/Y");
			$hora_log = date("H:i:s"); 
			$even_log = $menssagens."/".$Edit1;
			
			$consulta_log = "INSERT INTO log_user_event (IP, DATA, EVENTO, HORA, USUARIO, ARQUIVO)
			             VALUES
			             ('$REMOTE_ADDR', '$data_log', '$even_log','$hora_log','$nome3', '$PHP_SELF')";
			
			@mysql_query($consulta_log, $link);
     

// Elimina Tabela temp
$add0 = "DROP TABLE `$nome3a`";
@mysql_query($add0, $link);


// Salva Secao
session_start();
$_SESSION['navega'] = $Edit1;
     
?>

<script language="JavaScript"><!--

document.onkeydown = keyCatcher;

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
              <td width="25%" class="style3"><div align="right"><b><font size="2" face="Verdana">Codigo.: </font></b></div></td>
              <td width="75%"><div align="left">
                <input name="matricula2" type="text" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;" disabled>
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Nome de Guerra.:</font></b></div></td>
              <td><div align="left">
                  <input type="text" name="nome_gerra" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:200px; background-color: #FFFFFF;" disabled >
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Nome.:</font></b></div></td>
              <td><div align="left">
                  <input name="nome" type="text" value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:460px; background-color: #FFFFFF;" disabled >
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Cargo.:</font></b></div></td>
              <td><div align="left">
                  <input name="cargo" type="text" value="<?php echo $Edit4 ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:256px; background-color: #FFFFFF;" disabled >
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Matricula.:</font></b></div></td>
              <td><div align="left">
                  <input name="matricula" type="text" value="<?php echo $Edit5 ?>" maxlength="5" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;" disabled >
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Rg.:</font></b></div></td>
              <td><div align="left">
                  <input type="text" name="rg" value="<?php echo $Edit6 ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:156px; background-color: #FFFFFF;" disabled >
                  <img src="../imagens/px1.gif" width="10" height="10"> <b><font size="2" face="Verdana">CPF.:
                  <input type="text" name="cpf" value="<?php echo $Edit7 ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:156px; background-color: #FFFFFF;" disabled >
                  </font></b></div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Departamento.:</font></b></div></td>
              <td><div align="left">
                <input name="dpto" type="text" id="dpto2" value="<?php echo $Edit8 ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:256px; background-color: #FFFFFF;" disabled >
</div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Data Admi.:</font></b></div></td>
              <td><div align="left">
                <input type="text" name="data" value="<?php echo $Edit9 ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:95px; background-color: #FFFFFF;" disabled >
</div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Frente=<font color="#FF0000">1</font> e Verso=<font color="#FF0000">2</font></font></b></div></td>
              <td><div align="left">
                <input name="tipo" type="text" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;">
                <img src="../imagens/px1.gif" width="10" height="10"><b><font size="2" face="Verdana">Sind=<font color="#FF0000">1</font> ou Cond=<font color="#FF0000">2</font></font></b><img src="../imagens/px1.gif" width="10" height="10">
                <input name="tipo2" type="text" value="<?php echo $Edit10 ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px; background-color: #FFFFFF;" disabled >
              </div></td>
            </tr>
            <tr>
              <td valign="top" class="style3"><div align="right"><b><font size="2" face="Verdana">Observa&ccedil;&atilde;o.:</font> </b></div></td>
              <td><div align="left">
                <textarea name="tipo22" cols="55" rows="5" style=" font-family: Verdana; font-size: 14px;  width:460px; background-color: #FFFFFF;" disabled ><?php echo $Edit11 ?></textarea>
</div></td>
            </tr>
          </form>
        </table>
        <img src="../imagens/px1.gif" width="10" height="4">
		
		<table width="633" border="0" align="left">
          <tr>
            <td width="4"><img src="../imagens/px1.gif" width="15" height="1"></td>
            <td width="590"><div align="left">
            


<table width="194" border="0" align="left">
                  <tr>
                    <td width="288"><div align="left">
					
					          <form method="POST" action="cadastro.php?cod_6=<?php echo $Edit1 ?>">
          <td><input type=image name="Incluir" src="../imagens/botao_voltar.PNG"></td>
          </form>
          </div>
					</td>
                    <td width="92"><div align="center">
					
		          </div>
			
					</td>

                    <td width="92"><div align="center">
					
		          </div>
			
					</td>

                    </tr>
                </table>
               
                
            </div></td>
            <td width="33" valign="bottom"><img src="../imagens/vacina.JPG" width="27" height="38"></td>
          </tr>
        </table>
        
    </tr>
  </table>

</div>
</body>

<?php

}else{
	
include("enaaurlnp.php");
	
}
?>
