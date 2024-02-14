<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<?

include("../config.php");
// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

$nome3 = $_SESSION["nome_log"];

//include_once("../logar.php");

include("menu.php");

include("vaurls.php");


$deixar = acesso_url("FORM_JORN");

if ($deixar == "SIM"){


//include("funcoes2.php");

include("help.php");

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
        <b><font size="5" face="Verdana" color='#000000'><font color="<?=$color_bor;?>">* * Envio de Boletim por E-Mail * *</font></b>
        </td>
		</tr>
		<td align="center"><b>E-Mail.:</b><input name="id_conf" type="text"  value="" size="15" />
		<b>Categoria.:</b>
		<select type="text" name="id_categoria"  value="" />
		
		    <option value="TODOS">           TODOS           </option>
            <option value="WEB SITE">        WEB SITE        </option>
            <option value="DIRETORES">       DIRETORES       </option>
            <option value="SOCIOS">          SOCIOS          </option>
            <option value="SINDICOS">        SINDICOS        </option>
            <option value="ADMINISTRADORAS"> ADMINISTRADORAS </option>
            <option value="SINDICATOS">      SINDICATOS      </option>
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
<div align="center"></div>
<table width="677" border="15" align="center" bordercolor="<?=$color_bor;?>" bgcolor="#FFFFFF">
  <tr>
    <td width="7%"><div align="center"><b><font size="2" face="Verdana">N&ordm;</font></b></div></td>
    <td width="13%"><b><font size="2" face="Verdana">Selecionar</font></b></td>
    <td width="11%"><b><font size="2" face="Verdana">Data</font></b></td>
    <td width="69%"><b><font size="2" face="Verdana">Materia</font></b></td>
    </tr>
  <tr>
<?
       while ($linha = @mysql_fetch_array($resultado))
       {

	    $id       = $linha["id"]; 
	  	$coluna1  = $linha["codigo"];
		$coluna2  = substr($linha["nome"],0,55);
		$coluna3  = trim($linha["data"]);
?>    

    <td  align="center"><?=$id;?></td>
    <td>
	
	<div align="center">
	
	
      <input type="checkbox" name="chd<?=$id;?>"  value="<?=$id;?>" />
      </div></td>
    <td><b><font color="#FF6600" size="2" face="Verdana"><?=substr($coluna3,3,7);?></font></b></td>
    <td><b><font size="2" face="Verdana"><a href='../jornal/cadastro.php?cod_1=<?=$id;?>&entra_no_web1=at2' class="linkmenu2" ><font size="2" face="Arial" color="#000000"><?=$coluna2;?></font></td>
    </tr>
<?
}
?>      
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
