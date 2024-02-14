<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout Cadastro Alteracao Retorno
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

// Abre Conexão com o MySql
include("../conexao.php");
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);

// Abre Tabela Tenporaria

$consulta0  = "SELECT * FROM $nome3 WHERE Nome1 = '$nome3'";
	
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
$Edit15	    = @$row0["Edit15"];
$Edit16	    = @$row0["Edit16"];
$Edit17	    = @$row0["Edit17"];
$Edit18	    = @$row0["Edit18"];
$Edit19	    = @$row0["Edit19"];
$Edit20	    = @$row0["Edit20"];
$Edit21	    = @$row0["memo1"];
$alerta_1   = @$row0["mensage1"];
$nome_do_edif = @$row0["mensage2"];
$nome_da_adms = @$row0["mensage3"];

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$cur1       = @$row3["cur1"];
$cur2       = @$row3["cur2"];
$cur3       = @$row3["cur3"];

?>
<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<?php


if (!empty($Edit1)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit2").focus();	
		}
		
		</script>
		
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 77px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:77px; " onfocus="this.className='anormal'; nextfield ='Edit2';" onblur="this.className='normal'"   onchange="Salva1(this.value)" style="text-transform: uppercase;" tabindex="1"  maxlength="11"  />
</div>
		
		<?php
}
if (!empty($Edit2)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit3").focus();	
		}
		
		</script>
		
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 470px; WIDTH: 93px; POSITION: absolute; TOP: 139px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px; " onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'"   onkeypress="return txtBoxFormat(document.Form1, 'Edit2', '99/99/9999', event);" onchange="Salva2(this.value)" style="text-transform: uppercase;"  tabindex="2"   maxlength="10" />
</div>
		
		<?php
}
if (!empty($Edit3)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit4").focus();	
		}
		
		</script>
		
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 729px; WIDTH: 93px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px; " onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'"   onkeypress="return txtBoxFormat(document.Form1, 'Edit3', '99/99/9999', event);" onchange="Salva3(this.value)"  style="text-transform: uppercase;"  tabindex="3"   maxlength="10" />
</div>

	
		<?php
}
if (!empty($Edit4)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit6").focus();	
		}
		
		</script>
		
<div id="Edit4_outer" style="Z-INDEX: 27; LEFT: 278px; WIDTH: 194px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<select type="text" id="Edit4" name="Edit4" value="<?php echo $Edit4 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:194px; " onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'"   onchange="Salva4(this.value)"  style="text-transform: uppercase;" tabindex="4"    />

<?php

if (!empty($Edit4))
{
?>	
	<option value="<?php echo $Edit4 ?>"> <?php echo $Edit4 ?> </option>
            <option value="ZELADORIA"> ZELADORIA </option>
            <option value="ASCENSORISTA"> ASCENSORISTA </option>
            <option value="CIPA"> CIPA </option>
            <option value="ESPANHOL"> ESPANHOL </option>
            <option value="INGLES"> INGLES </option>
            <option value="MICROINFORMATICA"> MICROINFORMATICA </option>
            <option value="SUPLETIVO"> SUPLETIVO </option>
<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="ZELADORIA"> ZELADORIA </option>
            <option value="ASCENSORISTA"> ASCENSORISTA </option>
            <option value="CIPA"> CIPA </option>
            <option value="ESPANHOL"> ESPANHOL </option>
            <option value="INGLES"> INGLES </option>
            <option value="MICROINFORMATICA"> MICROINFORMATICA </option>
            <option value="SUPLETIVO"> SUPLETIVO </option>
<?php            
 }
?>

</select>

</div>


		<?php
}
if (!empty($Edit5)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit6").focus();	
		}
		
		</script>
		
<div id="Edit5_outer" style="Z-INDEX: 53; LEFT: 592px; WIDTH: 230px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?php echo $Edit5 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:230px; " onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'"   onchange="Salva5(this.value)"  style="text-transform: uppercase;"   tabindex="5"  maxlength="15"  />
</div>
		
		<?php
}
if (!empty($Edit6)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit7").focus();	
		}
		
		</script>
		
<div id="Edit6_outer" style="Z-INDEX: 14; LEFT: 278px; WIDTH: 194px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<select type="text" id="Edit6" name="Edit6" value="<?php echo $Edit6 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:194px; " onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'"   onchange="Salva6(this.value)"  style="text-transform: uppercase;"   tabindex="6"    />

<?php

if (!empty($Edit6))
{
?>	
	<option value="<?php echo $Edit6 ?>"> <?php echo $Edit6 ?> </option>
            <option value="MANHA"> MANHA </option>
            <option value="TARDE"> TARDE </option>
            <option value="NOITE"> NOITE </option>
<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="MANHA"> MANHA </option>
            <option value="TARDE"> TARDE </option>
            <option value="NOITE"> NOITE </option>
<?php            
 }
?>

</select>

</div>
		
		<?php
}
if (!empty($Edit7)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit8").focus();	
		}
		
		</script>
		
<div id="Edit7_outer" style="Z-INDEX: 55; LEFT: 592px; WIDTH: 230px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?php echo $Edit7 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:230px; " onfocus="this.className='anormal'; nextfield ='Edit8';" onblur="this.className='normal'"   onkeypress="return txtBoxFormat(document.Form1, 'Edit7', '999.999.999-99', event);" onchange="Salva7(this.value)"  style="text-transform: uppercase;" tabindex="7"  maxlength="15"  />
</div>
		<?php
}
if (!empty($Edit8)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit9").focus();	
		}
		
		</script>
		
		
<div id="Edit8_outer" style="Z-INDEX: 16; LEFT: 278px; WIDTH: 314px; POSITION: absolute; TOP: 215px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?php echo $Edit8 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:314px; " onfocus="this.className='anormal'; nextfield ='Edit9';" onblur="this.className='normal'"   onchange="Salva8(this.value)" style="text-transform: uppercase;"  tabindex="8"  maxlength="85"  />
</div>
		
		<?php
}
if (!empty($Edit9)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit10").focus();	
		}
		
		</script>
		
<div id="Edit9_outer" style="Z-INDEX: 49; LEFT: 692px; WIDTH: 130px; POSITION: absolute; TOP: 215px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?php echo $Edit9 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:130px; " onfocus="this.className='anormal'; nextfield ='Edit10';" onblur="this.className='normal'"   onchange="Salva9(this.value)" style="text-transform: uppercase;"   tabindex="9"  maxlength="28"  />
</div>
		<?php
}
if (!empty($Edit10)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit11").focus();	
		}
		
		</script>

<div id="Edit10_outer" style="Z-INDEX: 47; LEFT: 278px; WIDTH: 93px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?php echo $Edit10 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px; " onfocus="this.className='anormal'; nextfield ='Edit11';" onblur="this.className='normal'"   onkeypress="return txtBoxFormat(document.Form1, 'Edit10', '99/99/9999', event);" onchange="Salva10(this.value)"  style="text-transform: uppercase;"   tabindex="10" maxlength="10"   />
</div>		
		<?php
}
if (!empty($Edit11)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit12").focus();	
		}
		
		</script>
		
<div id="Edit11_outer" style="Z-INDEX: 51; LEFT: 472px; WIDTH: 93px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?php echo $Edit11 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px; " onfocus="this.className='anormal'; nextfield ='Edit12';" onblur="this.className='normal'"   onchange="Salva11(this.value)" style="text-transform: uppercase;"  tabindex="11"  maxlength="8"  />
</div>
		
		<?php
}
if (!empty($Edit12)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit13").focus();	
		}
		
		</script>
		
<div id="Edit12_outer" style="Z-INDEX: 18; LEFT: 692px; WIDTH: 129px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?php echo $Edit12 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:129px; " onfocus="this.className='anormal'; nextfield ='Edit13';" onblur="this.className='normal'"   onchange="Salva12(this.value)"  style="text-transform: uppercase;"   tabindex="9"  maxlength="11"  />
</div>
		<?php
}
if (!empty($Edit13)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit14").focus();	
		}
		
		</script>
		
<div id="Edit13_outer" style="Z-INDEX: 20; LEFT: 278px; WIDTH: 146px; POSITION: absolute; TOP: 265px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?php echo $Edit13 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:146px; " onfocus="this.className='anormal'; nextfield ='Edit14';" onblur="this.className='normal'"   onchange="Salva13(this.value)"  style="text-transform: uppercase;"  tabindex="12"  maxlength="10"  />
</div>
		
		<?php
}
if (!empty($Edit14)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit15").focus();	
		}
		
		</script>
		
<div id="Edit14_outer" style="Z-INDEX: 12; LEFT: 692px; WIDTH: 94px; POSITION: absolute; TOP: 265px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?php echo $Edit14 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:94px; " onfocus="this.className='anormal'; nextfield ='Edit15';" onblur="this.className='normal'"   onchange="Salva14(this.value)"  style="text-transform: uppercase;"  tabindex="14"  maxlength="10"  />
</div>
		
		<?php
}
if (!empty($Edit15)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit16").focus();	
		}
		
		</script>
		
<div id="Edit15_outer" style="Z-INDEX: 22; LEFT: 278px; WIDTH: 394px; POSITION: absolute; TOP: 290px; HEIGHT: 26px">
<input type="text" id="Edit15" name="Edit15" value="<?php echo $Edit15 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:394px; " onfocus="this.className='anormal'; nextfield ='Edit16';" onblur="this.className='normal'"   onchange="Salva15(this.value)" style="text-transform: uppercase;"   tabindex="15"  maxlength="85"  />
</div>
		<?php
}
if (!empty($Edit16)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit17").focus();	
		}
		
		</script>
		
<div id="Edit16_outer" style="Z-INDEX: 30; LEFT: 278px; WIDTH: 106px; POSITION: absolute; TOP: 315px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?php echo $Edit16 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:106px; " onfocus="this.className='anormal'; nextfield ='Edit17';" onblur="this.className='normal'"   onkeypress="return txtBoxFormat(document.Form1, 'Edit16', '99999-999', event);" onchange="Salva16(this.value)"  style="text-transform: uppercase;" tabindex="16"   maxlength="9" />
</div>
		<?php
}
if (!empty($Edit17)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit18").focus();	
		}
		
		</script>
		
<div id="Edit17_outer" style="Z-INDEX: 57; LEFT: 495px; WIDTH: 106px; POSITION: absolute; TOP: 315px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?php echo $Edit17 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:106px; " onfocus="this.className='anormal'; nextfield ='Edit18';" onblur="this.className='normal'"   onchange="Salva17(this.value)" style="text-transform: uppercase;"  tabindex="17"  maxlength="35"  />
</div>
		<?php
}
if (!empty($Edit18)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit19").focus();	
		}
		
		</script>
		
<div id="Edit18_outer" style="Z-INDEX: 59; LEFT: 668px; WIDTH: 154px; POSITION: absolute; TOP: 315px; HEIGHT: 26px">
<input type="text" id="Edit18" name="Edit18" value="<?php echo $Edit18 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:154px; " onfocus="this.className='anormal'; nextfield ='Edit19';" onblur="this.className='normal'"   onchange="Salva18(this.value)" style="text-transform: uppercase;"   tabindex="18"  maxlength="20"  />
</div>
		<?php
}
if (!empty($Edit19)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit20").focus();	
		}
		
		</script>
		
<div id="Edit19_outer" style="Z-INDEX: 28; LEFT: 278px; WIDTH: 194px; POSITION: absolute; TOP: 340px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?php echo $Edit19 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:194px; " onfocus="this.className='anormal'; nextfield ='Edit20';" onblur="this.className='normal'"   onchange="Salva19(this.value)"  style="text-transform: uppercase;"  tabindex="19"  maxlength="20"  />
</div>
		<?php
}
if (!empty($Edit20)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit21").focus();	
		}
		
		</script>
		
<div id="Edit20_outer" style="Z-INDEX: 61; LEFT: 600px; WIDTH: 222px; POSITION: absolute; TOP: 340px; HEIGHT: 26px">
<input type="text" id="Edit20" name="Edit20" value="<?php echo $Edit20 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:222px; " onfocus="this.className='anormal'; nextfield ='Edit21';" onblur="this.className='normal'"   onchange="Salva20(this.value)"  style="text-transform: uppercase;"   tabindex="20" maxlength="35"   />
</div>
		<?php
}
if (!empty($Edit21)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit21").focus();	
		}
		
		</script>
		
<div id="Edit21_outer" style="Z-INDEX: 25; LEFT: 278px; WIDTH: 544px; POSITION: absolute; TOP: 365px; HEIGHT: 107px">
<textarea id="Edit21" name="Edit21" style=" font-family: Verdana; font-size: 14px;  height:106px;width:544px; " onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"   onchange="Salva21(this.value)"  style="text-transform: uppercase;"  tabindex="21"    wrap="virtual"><?php echo $Edit21 ?></textarea>
</div>
		<?php
}

?>

<div id="Label70_outer" style="Z-INDEX: 26; LEFT: 388px; WIDTH: 37px; POSITION: absolute; TOP: 321px; HEIGHT: 18px">
<div id="Label70" style=" font-family: Verdana; font-size: 13px; color: #0000FF; height:18px;width:37px;"   ><A HREF="http://correios.com.br/servicos/dnec/menuAction.do?Metodo=menuCep"  ><STRONG>Cep </STRONG></A></div>
</div>

<div id="Label71_outer" style="Z-INDEX: 35; LEFT: 390px; WIDTH: 544px; POSITION: absolute; TOP: 485px; HEIGHT: 80px">
<div id="Label71" style=" font-family: Verdana; font-size: 14px; color: #ff0000;font-weight: normal; height:24px;width:403px;"   ><b><?php echo $alerta_1 ?></b></STRONG></div>
</div>

