<?php
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
$Edit18	    = @$row0["memo1"];
$alerta_1   = @$row0["mensage1"];
$categ_1    = @$row0["mensage2"];
$nome_do_edif = @$row0["mensage3"];
$nome_cad_si  = @$row0["mensage4"];

$alerta_1   = $alerta_1;
$nome2_adms = $nome_do_edif; 

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$adm1       = @$row3["adm1"];
$adm2       = @$row3["adm2"];
$adm3       = @$row3["adm3"];

?>
<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
</html>

<?php


if (!empty($Edit1)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit2").focus();	
		}
		
		</script>
		
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 56px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px; background-color: #FFFFFF;" readonly   tabindex="1"    />
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
		
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 470px; WIDTH: 137px; POSITION: absolute; TOP: 142px; HEIGHT: 26px">
<select id="Edit2" name="Edit2" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px; background-color: #FFFFFF;" onchange="Salva2(this.value)" onFocus="nextfield ='Edit3';" style="text-transform: uppercase;"   tabindex="2"    />

<?php

if (!empty($Edit2))
{
?>	
	<option value="<?php echo $Edit2 ?>"> <?php echo $Edit2 ?> </option>
            <option value="ATIVA">     ATIVA     </option>
            <option value="NAO ATIVA"> NAO ATIVA </option>
            <option value="OPOSICAO">  OPOSICAO  </option>
<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="ATIVA">     ATIVA     </option>
            <option value="NAO ATIVA"> NAO ATIVA </option>
            <option value="OPOSICAO">  OPOSICAO  </option>
<?php            
 }
?>

</select>
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
<input type="text" id="Edit3" name="Edit3" value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px; background-color: #FFFFFF;" onchange="Salva3(this.value)" onFocus="nextfield ='Edit4';" style="text-transform: uppercase;"   tabindex="3"    />
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
		
<div id="Edit4_outer" style="Z-INDEX: 33; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 164px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?php echo $Edit4 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;" onchange="Salva4(this.value)" onFocus="nextfield ='Edit5';" style="text-transform: uppercase;" tabindex="4"    />
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
		
<div id="Edit5_outer" style="Z-INDEX: 12; LEFT: 470px; WIDTH: 352px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?php echo $Edit5 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:352px; background-color: #FFFFFF;" onchange="Salva5(this.value)" onFocus="nextfield ='Edit6';" style="text-transform: uppercase;" tabindex="5"    />
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
		
<div id="Edit6_outer" style="Z-INDEX: 14; LEFT: 278px; WIDTH: 192px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?php echo $Edit6 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:192px; background-color: #FFFFFF;" onchange="Salva6(this.value)" onFocus="nextfield ='Edit7';" style="text-transform: uppercase;"  tabindex="6"    />
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
		
<div id="Edit7_outer" style="Z-INDEX: 15; LEFT: 470px; WIDTH: 352px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?php echo $Edit7 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:352px; background-color: #FFFFFF;" onchange="Salva7(this.value)" onFocus="nextfield ='Edit8';" style="text-transform: uppercase;"  tabindex="7"    />
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
		
		
<div id="Edit8_outer" style="Z-INDEX: 17; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 213px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?php echo $Edit8 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;" onchange="Salva8(this.value)" onFocus="nextfield ='Edit9';" style="text-transform: uppercase;"  tabindex="8"    />
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
		
<div id="Edit9_outer" style="Z-INDEX: 21; LEFT: 278px; WIDTH: 83px; POSITION: absolute; TOP: 237px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?php echo $Edit9 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:83px; background-color: #FFFFFF;" onkeypress="return txtBoxFormat(document.Form1, 'Edit9', '99999-999', event);" onchange="Salva9(this.value)" onFocus="nextfield ='Edit10';" style="text-transform: uppercase;"  tabindex="9"    />
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

<div id="Edit10_outer" style="Z-INDEX: 19; LEFT: 532px; WIDTH: 180px; POSITION: absolute; TOP: 237px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?php echo $Edit10 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:180px; background-color: #FFFFFF;" onchange="Salva10(this.value)" onFocus="nextfield ='Edit11';" style="text-transform: uppercase;"  tabindex="10"    />
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
		
<div id="Edit11_outer" style="Z-INDEX: 25; LEFT: 783px; WIDTH: 39px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<select id="Edit11" name="Edit11" value="<?php echo $Edit11 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px; background-color: #FFFFFF;" onchange="Salva11(this.value)" onFocus="nextfield ='Edit12';" style="text-transform: uppercase;"  tabindex="11"    />

<?php

if (!empty($Edit11))
{
?>	
	<option value="<?php echo $Edit11 ?>"> <?php echo $Edit11 ?> </option>
            <option value="SP"> SP </option>
            <option value="AC"> AC </option>
            <option value="AL"> AL </option>
            <option value="AM"> AM </option>
            <option value="AP"> AP </option>
            <option value="BA"> BA </option>
            <option value="CE"> CE </option>
            <option value="DF"> DF </option>
            <option value="ES"> ES </option>
            <option value="GO"> GO </option>
            <option value="MA"> MA </option>
            <option value="MG"> MG </option>
            <option value="MS"> MS </option>
            <option value="MT"> MT </option>
            <option value="PA"> PA </option>
            <option value="PB"> PB </option>
            <option value="PE"> PE </option>
            <option value="PI"> PI </option>
            <option value="PR"> PR </option>
            <option value="RN"> RN </option>
            <option value="RO"> RO </option>
            <option value="RR"> RR </option>
            <option value="RJ"> RJ </option>
            <option value="RS"> RS </option>
            <option value="SC"> SC </option>
            <option value="SE"> SE </option>
            <option value="TO"> TO </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="SP"> SP </option>
            <option value="AC"> AC </option>
            <option value="AL"> AL </option>
            <option value="AM"> AM </option>
            <option value="AP"> AP </option>
            <option value="BA"> BA </option>
            <option value="CE"> CE </option>
            <option value="DF"> DF </option>
            <option value="ES"> ES </option>
            <option value="GO"> GO </option>
            <option value="MA"> MA </option>
            <option value="MG"> MG </option>
            <option value="MS"> MS </option>
            <option value="MT"> MT </option>
            <option value="PA"> PA </option>
            <option value="PB"> PB </option>
            <option value="PE"> PE </option>
            <option value="PI"> PI </option>
            <option value="PR"> PR </option>
            <option value="RN"> RN </option>
            <option value="RO"> RO </option>
            <option value="RR"> RR </option>
            <option value="RJ"> RJ </option>
            <option value="RS"> RS </option>
            <option value="SC"> SC </option>
            <option value="SE"> SE </option>
            <option value="TO"> TO </option>
<?php            
 }
?>

</select>

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
		
<div id="Edit12_outer" style="Z-INDEX: 23; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 262px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?php echo $Edit12 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;" onkeypress="return txtBoxFormat(document.Form1, 'Edit12', '99.999.999/9999-99', event);" onchange="Salva12(this.value)" onFocus="nextfield ='Edit13';" style="text-transform: uppercase;"  tabindex="12"    />
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
		
<div id="Edit13_outer" style="Z-INDEX: 27; LEFT: 532px; WIDTH: 153px; POSITION: absolute; TOP: 262px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?php echo $Edit13 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:153px; background-color: #FFFFFF;" onchange="Salva13(this.value)" onFocus="nextfield ='Edit14';" style="text-transform: uppercase;" tabindex="13"    />
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
		
<div id="Edit4_outer" style="Z-INDEX: 33; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 164px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?php echo $Edit4 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;" onchange="Salva4(this.value)" onFocus="nextfield ='Edit5';" style="text-transform: uppercase;" tabindex="4"    />
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
		
<div id="Edit15_outer" style="Z-INDEX: 29; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 289px; HEIGHT: 26px">
<select id="Edit15" name="Edit15" value="<?php echo $Edit15 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; background-color: #FFFFFF;" onchange="Salva15(this.value)" onFocus="nextfield ='Edit16';" style="text-transform: uppercase;" tabindex="15"    />

<?php

if (!empty($Edit15))
{
?>	
	<option value="<?php echo $Edit15 ?>"> <?php echo $Edit15 ?> </option>
            <option value="CENTRO"> CENTRO </option>
            <option value="NORTE"> NORTE </option>
            <option value="SUL"> SUL </option>
            <option value="LESTE"> LESTE </option>
            <option value="OESTE"> OESTE </option>
<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="CENTRO"> CENTRO </option>
            <option value="NORTE"> NORTE </option>
            <option value="SUL"> SUL </option>
            <option value="LESTE"> LESTE </option>
            <option value="OESTE"> OESTE </option>
<?php            
 }
?>

</select>



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
		
		
<div id="Edit16_outer" style="Z-INDEX: 37; LEFT: 278px; WIDTH: 346px; POSITION: absolute; TOP: 312px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?php echo $Edit16 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:346px; background-color: #FFFFFF;" onchange="Salva16(this.value)" onFocus="nextfield ='Edit17';"  tabindex="16"    />
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
		
<div id="Edit17_outer" style="Z-INDEX: 39; LEFT: 783px; WIDTH: 39px; POSITION: absolute; TOP: 315px; HEIGHT: 26px">
<select id="Edit17" name="Edit17" value="<?php echo $Edit17 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px; background-color: #FFFFFF;" onchange="Salva17(this.value)" onFocus="nextfield ='Edit18';" style="text-transform: uppercase;"   tabindex="17"    />

<?php

if (!empty($Edit17))
{
?>	
	<option value="<?php echo $Edit17 ?>"> <?php echo $Edit17 ?> </option>
            <option value="SIM">  SIM </option>
            <option value="NAO">  NAO </option>
<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="SIM">  SIM </option>
            <option value="NAO">  NAO </option>
<?php            
 }
?>

</select>


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
		
<div id="Edit18_outer" style="Z-INDEX: 31; LEFT: 278px; WIDTH: 544px; POSITION: absolute; TOP: 338px; HEIGHT: 110px">
<textarea id="Edit18" name="Edit18" style=" font-family: Verdana; font-size: 14px;  height:109px;width:544px; background-color: #FFFFFF;"  onchange="Salva18(this.value)" onFocus="nextfield ='Edit18';" tabindex="18"    wrap="virtual"><?php echo $Edit18 ?></textarea>
</div>
		
		<?php
}

?>

<div id="Label71_outer" style="Z-INDEX: 35; LEFT: 390px; WIDTH: 544px; POSITION: absolute; TOP: 485px; HEIGHT: 80px">
<div id="Label71" style=" font-family: Verdana; font-size: 14px; color: #ff0000;font-weight: normal; height:24px;width:403px;"   ><b><?php echo $alerta_1 ?></b></STRONG></div>
</div>

