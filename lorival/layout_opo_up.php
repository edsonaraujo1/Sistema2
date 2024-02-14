<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout Cadastro Incluir Retorno
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include("../conexao.php");
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);

$nome3a = strtolower($nome3);

// Abre Tabela Tenporaria

$consulta0  = "SELECT * FROM $nome3a WHERE Nome1 = '$nome3a'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$Edit1      = @$row0["Edit1"];
$Edit2		= @$row0["Edit2"];
$Edit3		= @$row0["Edit3"];
$Edit4		= @$row0["Edit4"];
$Edit5		= @$row0["Edit5"];
$Edit6		= @$row0["Edit6"];
$Edit7		= @$row0["Edit7"];
$Edit8		= @$row0["Edit8"];
$Edit9		= @$row0["Edit9"];
$Edit10	    = @$row0["Edit10"];
$Edit11	    = @$row0["Edit11"];
$Edit12	    = @$row0["Edit12"];
$Edit13	    = @$row0["Edit13"];
$Edit14	    = @$row0["Edit14"];
$Edit15	    = @$row0["memo1"];
$alerta_1   = @$row0["mensage1"];
$nome_do_edif = @$row0["mensage2"];
$nome_da_adms = @$row0["mensage3"];

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$lor1       = @$row3["botao1"];
$lor2       = @$row3["botao2"];
$lor3       = @$row3["botao3"];

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
</html>

<?


if (!empty($Edit1)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit2").focus();	
		}
		
		</script>
		
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 63px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:63px;" disabled  tabindex="1"    />
</div>
		
		<?
}
if (!empty($Edit2)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit3").focus();	
		}
		
		</script>
		
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 470px; WIDTH: 93px; POSITION: absolute; TOP: 139px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px;" onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit2', '99/99/9999', event);" onchange="Salva2(this.value)"  style="text-transform: uppercase;"  tabindex="2"    />
</div>
		
		<?
}
if (!empty($Edit3)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit4").focus();	
		}
		
		</script>
		
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 729px; WIDTH: 93px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px;" disabled   tabindex="3"    />
</div>

	
		<?
}
if (!empty($Edit4)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit6").focus();	
		}
		
		</script>
		
<div id="Edit4_outer" style="Z-INDEX: 28; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px;" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'" onchange="Salva4(this.value)"  style="text-transform: uppercase;"  tabindex="4"    />
</div>


		<?
}
if (!empty($Edit5)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit6").focus();	
		}
		
		</script>
		
<div id="Edit5_outer" style="Z-INDEX: 12; LEFT: 568px; WIDTH: 254px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:254px;" onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit5', '999.999.999-99', event);" onchange="Salva5(this.value)" onchange="Salva5(this.value)"  style="text-transform: uppercase;"  tabindex="5"    />
</div>
		
		<?
}
if (!empty($Edit6)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit7").focus();	
		}
		
		</script>
		
<div id="Edit6_outer" style="Z-INDEX: 14; LEFT: 278px; WIDTH: 98px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:98px;" onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'" onchange="Salva6(this.value)"  style="text-transform: uppercase;"  tabindex="6"    />
</div>
		
		<?
}
if (!empty($Edit7)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit8").focus();	
		}
		
		</script>
		
<div id="Edit7_outer" style="Z-INDEX: 15; LEFT: 568px; WIDTH: 254px; POSITION: absolute; TOP: 192px; HEIGHT: 26px">
<select type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:254px;" onfocus="this.className='anormal'; nextfield ='Edit8';" onblur="this.className='normal'" onchange="Salva7(this.value)"  tabindex="7"    />

<?

if (!empty($Edit7))
{
?>	
	<option value="<?=$Edit7;?>"> <?=$Edit7;?> </option>
            <option value="OPOSICAO">     OPOSICAO     </option>
            <option value="CONTRIBUINTE"> CONTRIBUINTE </option>
            <option value="NAO CONTRIBUINTE">  NAO CONTRIBUINTE  </option>
<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="OPOSICAO">     OPOSICAO     </option>
            <option value="CONTRIBUINTE"> CONTRIBUINTE </option>
            <option value="NAO CONTRIBUINTE">  NAO CONTRIBUINTE  </option>
<?            
 }
?>

</select>

</div>
		<?
}
if (!empty($Edit8)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit9").focus();	
		}
		
		</script>
		
		
<div id="Edit8_outer" style="Z-INDEX: 17; LEFT: 278px; WIDTH: 434px; POSITION: absolute; TOP: 215px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:434px;" onfocus="this.className='anormal'; nextfield ='Edit9';" onblur="this.className='normal'" onchange="Salva8(this.value)"   tabindex="8"    />
</div>
		
		<?
}
if (!empty($Edit9)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit10").focus();	
		}
		
		</script>
		
<div id="Edit9_outer" style="Z-INDEX: 50; LEFT: 278px; WIDTH: 354px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:354px;" onfocus="this.className='anormal'; nextfield ='Edit10';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit9', '99/99/9999', event);" onchange="Salva9(this.value)"   tabindex="9"    />
</div>		
		<?
}
if (!empty($Edit10)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit11").focus();	
		}
		
		</script>

<div id="Edit10_outer" style="Z-INDEX: 19; LEFT: 692px; WIDTH: 90px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:90px;" onfocus="this.className='anormal'; nextfield ='Edit11';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit10', '99999-999', event);" onchange="Salva10(this.value)"  tabindex="10"    />
</div>		
		
		<?
}
if (!empty($Edit11)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit12").focus();	
		}
		
		</script>
		
<div id="Edit11_outer" style="Z-INDEX: 21; LEFT: 278px; WIDTH: 74px; POSITION: absolute; TOP: 265px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:74px;" onfocus="this.className='anormal'; nextfield ='Edit12';" onblur="this.className='normal'" onchange="Salva11(this.value)"  tabindex="11"    />
</div>
		
		<?
}
if (!empty($Edit12)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit13").focus();	
		}
		
		</script>
		
<div id="Edit12_outer" style="Z-INDEX: 23; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 290px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px;" onfocus="this.className='anormal'; nextfield ='Edit13';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit12', '99.999.999/9999-99', event);" onchange="Salva12(this.value)"  tabindex="12"    />
</div>
		<?
}
if (!empty($Edit13)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit14").focus();	
		}
		
		</script>
		
<div id="Edit13_outer" style="Z-INDEX: 32; LEFT: 278px; WIDTH: 74px; POSITION: absolute; TOP: 315px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:74px;" onfocus="this.className='anormal'; nextfield ='Edit14';" onblur="this.className='normal'" onchange="Salva13(this.value)"  tabindex="13"    />
</div>
		
		<?
}
if (!empty($Edit14)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit15").focus();	
		}
		
		</script>
		
<div id="Edit14_outer" style="Z-INDEX: 29; LEFT: 278px; WIDTH: 194px; POSITION: absolute; TOP: 340px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:194px;" onfocus="this.className='anormal'; nextfield ='Edit15';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit14', '99.999.999/9999-99', event);" onchange="Salva14(this.value)"   tabindex="14"    />
</div>
		
		<?
}
if (!empty($Edit15)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit16").focus();	
		}
		
		</script>
		
<div id="Edit15_outer" style="Z-INDEX: 26; LEFT: 278px; WIDTH: 544px; POSITION: absolute; TOP: 365px; HEIGHT: 107px">
<textarea id="Edit15" name="Edit15" style=" font-family: Verdana; font-size: 14px;  height:106px;width:544px;" onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'" onchange="Salva15(this.value)"  tabindex="15" wrap="virtual"><?=$Edit15;?></textarea>
</div>
		<?
}

?>

<div id="Edit16_outer" style="Z-INDEX: 54; LEFT: 352px; WIDTH: 464px; POSITION: absolute; TOP: 265px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?=$nome_do_edif;?>" style=" font-family: Verdana; font-size: 14px; color: #0000FF; font-weight: bold; border-style: none;height:25px;width:464px;" readonly tabindex="8"    />
</div>
<div id="Edit17_outer" style="Z-INDEX: 55; LEFT: 352px; WIDTH: 464px; POSITION: absolute; TOP: 315px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?=$nome_da_adms;?>" style=" font-family: Verdana; font-size: 14px; color: #0000FF; font-weight: bold; border-style: none;height:25px;width:464px;" readonly   tabindex="8"    />
</div>


<div id="Label70_outer" style="Z-INDEX: 27; LEFT: 788px; WIDTH: 37px; POSITION: absolute; TOP: 243px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:37px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep" target="new" ><u> Cep </u></A></div>
</div>

<div id="Label71_outer" style="Z-INDEX: 35; LEFT: 390px; WIDTH: 544px; POSITION: absolute; TOP: 485px; HEIGHT: 80px">
<div id="Label71" style=" font-family: Verdana; font-size: 14px; color: #ff0000;font-weight: normal; height:24px;width:403px;"   ><b><?=$alerta_1;?></b></STRONG></div>
</div>

