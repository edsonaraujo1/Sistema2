<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Deletar Cadastro
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = $_SESSION["nome_log"];

// include("../logar.php");

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("NOTICIAS");

if ($deixar == "SIM"){

// Regata Secao
session_start();
$id_navega = $_SESSION['navega'];

?>

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

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("

     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

@mysql_select_db($db)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// Abrir tabela Senha

$tabela_1 = strtoupper('noticias');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];


if ($per3 == "NAO")
{
   include("cadastro.php");
}

else
{

// retorna uma pesquisa

if (!empty($Cod_2)){
	
   $consulta  = "SELECT * FROM noticias Where id = '$Cod_2'";
	
}

if (!empty($id_navega)){

   $consulta  = "SELECT * FROM noticias Where id = '$id_navega'";
	
}

//echo $Cod_2."<br>";
//echo $id_navega."<br>";

$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id      = @$row["id"];

if (empty($id)){
	
   $consulta  = "SELECT * FROM noticias Where id = '$id_navega'";
	
}

$resultado = @mysql_query($consulta);

$row = mysql_fetch_array($resultado);

$id         = @$row["id"];
$Edit1 		= @$row["codigo"];
$Edit2 	    = @$row["data"];
$Edit3   	= @$row["nome"];
$Edit4    	= @$row["texto"]; 
$Edit5    	= @$row["categoria"]; 

$menssagens = "* * * Excluir * * *";

include("funcoes2.php");
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

<html>

<style type=text/css>

body { background-image: url(<?php echo "../".$logo_sis ?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->


</style> 

<!-- TinyMCE -->
<script type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme_advanced_toolbar_location : "top",
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->


<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px; "  >
<div align="center" style="Z-INDEX: 0; LEFT: 142px; POSITION: absolute;  TOP: 39px;"> 
  
  <img src="../imagens/px1.gif" width="10" height="20">
  <table width="697" border="16" bordercolor="<?php echo $color_bor ?>" bgcolor="#FFFFFF">
    <tr>
      <td><div align="center">        
        <table width="100%" border="0">
          <tr>
            <td width="64%" height="42"><div align="left"><b><font size="5" face="Verdana" color="<?php echo $color_bor ?>">Cadastro Noticias (materias)</font></b></div></td>
            <td width="36%"><div align="center"><b><font size="2" face="Verdana"><?php echo $menssagens ?></font></b></div></td>
          </tr>
        </table>
        </div></td>
    </tr>
    <tr>
      <td><div align="center">
        <table width="100%" border="0" cellpadding="1" cellspacing="0">
            <div align="left"></div>
            <tr>
              <td width="25%" class="style3"><div align="right"><b><font size="2" face="Verdana">Codigo.: </font></b></div></td>
              <td width="75%"><div align="left">
                <input name="matricula2" type="text" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:56px;"  onfocus="this.className='anormal'; nextfield ='Edit2';" onblur="this.className='normal'"    style="text-transform: uppercase;" disabled tabindex="0"/>
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Data.:</font></b></div></td>
              <td><div align="left">
                  <input type="text" name="nome_gerra" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:200px;" onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'"   style="text-transform: uppercase;" disabled  tabindex="0"/>
<b><font size="2" face="Verdana">Categoria.:</font>
                  <input name="categ" type="text" id="categ" style=" font-family: Verdana; font-size: 14px;  height:23px;width:170px;"   disabled  tabindex="0" onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'" value="<?php echo $Edit5 ?>" />
                  
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Titulo.:</font></b></div></td>
              <td><div align="left">
                  <input name="nome" type="text" value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px;  height:23px;width:460px;" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'" disabled    tabindex="0"/>
              </div></td>
            </tr>
            <tr>
              <td class="style3"><div align="right"><b><font size="2" face="Verdana">Texto.:&nbsp;&nbsp;</font></b></div></td>
              <td><div align="left">
              
                  
              </div></td>
            </tr>
        </table>
        <table width="140" border="0" align="center">
          <tr>
            <td><textarea id="elm1" name="elm1" cols="73" rows="14" tabindex="0" disabled /><?php echo $Edit4 ?></textarea>
              <div align="center"></div></td>
          </tr>
        </table>               <img src="../imagens/px1.gif" width="10" height="4">
		
		<table width="633" border="0">
          <tr>
            <td width="4"><img src="../imagens/px1.gif" width="15" height="1"></td>
            <td width="590"><div align="center">
            



			<?php
			include('botoes_del.php');
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
<?php
}	
?>
<?php
}else{
	
include("enaaurlnp.php");
	
}
?>
