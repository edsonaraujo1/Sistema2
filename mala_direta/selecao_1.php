<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<head>
<title>.:Holodek:.</title>
<link rel="shortcut icon" href="../images/holo.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<meta content="Holodek" name='description'/>
<meta content="holodek" name='keywords'/>
<meta content='PT-BR' name='language'/>
</head>
<?

include("../config.php");
// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = $_SESSION["nome_log"];

//include_once("../logar.php");

//include("menu.php");

include("vaurls.php");


$deixar = acesso_url("FORM_JORN");

$deixar = 'SIM';

if ($deixar == "SIM"){


//include("funcoes2.php");

//include("help.php");

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados
		
$link = @mysql_connect($host,$user,$pass);
		
@mysql_select_db($db);

$sql  = "SELECT * FROM noticias ORDER BY str_to_date( data, '%d/%m/%Y') DESC";

$faz = 1;

// Número de registros por página
$registros_pagina = "18";

$lista = (int)$_GET["lista"];

if(!$lista) {
	$pc = "1";
}
else {
	$pc = $lista;
}

$inicio = $pc - 1;
$inicio = $inicio * $registros_pagina;

$resultado = @mysql_query("$sql LIMIT $inicio, $registros_pagina");

$todos = @mysql_query("$sql");

$tr = @mysql_num_rows($todos);

$tp = $tr / $registros_pagina;


?>
<body>
<form name="Form1" action="cheque.php" method="POST">
<table width="100%" border="0">
  <tr>
    <td height="30"><table width="677" border="15" align="center" bordercolor="<?=$color_bor;?>" bgcolor="#FFFFFF">
      <tr><br /><br />
        <td align="center">
        <b><font size="5" face="Verdana" color='#000000'><font color="<?=$color_bor;?>">* * Envio de Palavra por E-Mail * *</font></b>
        </td>
		</tr>
		<td align="center"><b>E-Mail.:</b><input name="id_conf" type="text"  value="" size="15" />
		<b>Categoria.:</b>
		<select type="text" name="id_categoria"  value="" />
		
		    <option value="TODOS">           TODOS           </option>
            <option value="WEB SITE">        WEB SITE        </option>
            <option value="PASTORES">       PASTORES       </option>
            <option value="OBREIROS">          OBREIROS          </option>
            <option value="DIACONOS">        DIACONOS        </option>
            <option value="EVANGELIZAÇÃO"> EVANGELIZAÇÃO </option>
            <option value="OUTROS">          OUTROS          </option>

		</select>

        <b>Reenvio.:</b></font>
        <select type="text" name="id_reenvio"  value="" />
		
		    <option value="NAO ENVIADOS">    NAO ENVIADOS    </option>
            <option value="ENVIADOS">        ENVIADOS        </option>

		</select>
		
		</td>
    
    </table></td>

  </tr>
  <tr>
</table>
<div align="center">    <a href="incluir_receita.php"><img src="../imagens/cadastrar.gif" width="75" height="18" border="0"></a><img src="../imagens/px1.gif" width="10" height="10"><a href="alterar_receita.php"><img src="../imagens/atualizar.gif" width="70" height="18" border="0"></a><img src="../imagens/px1.gif" width="10" height="10"></div>
<div align="center"></div>
<table width="677" border="15" align="center" bordercolor="<?=$color_bor;?>" bgcolor="#FFFFFF">
  <tr>
    <td width="7%"><div align="left"><b><font size="2" face="Verdana">Digite ou Cole a Mensagem aqui. </font></b></div></td>

    </tr>
  <tr>
    <td>  <textarea id="Edit1" name="Edit1"  style=" font-family: Verdana; font-size: 14px;  height:215px;width:635px;"  onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"  tabindex="0"    /> <?=$Edit1;?></textarea>
</td>
  </tr>
</table>
<div align="center"></div>
<div align="center"><br>

<input type=image name="botao" src="../imagens/botaoazul_enviar.PNG" value="Enviar"/>&nbsp;
<a href="../avaleht.php?servletjs2=20$$20" ><img id="Image2" src="../imagens/botaoazul9.PNG"  width="92"  height="22"  border="0"       /></a>
</div>
</form>
</body>
</html>
<?
}else{
	
include("enaaurlnp.php");
	
}
?>
