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
$Edit15	    = @$row0["Edit15"];
$Edit16	    = @$row0["Edit16"];
$Edit17	    = @$row0["Edit17"];
$Edit18	    = @$row0["Edit18"];
$Edit19	    = @$row0["Edit19"];
$Edit20	    = @$row0["Edit20"];
$Edit21	    = @$row0["Edit21"];
$Edit22	    = @$row0["Edit22"];
$Edit23	    = @$row0["Edit23"];
$Edit24	    = @$row0["Edit24"];
$Edit25	    = @$row0["Edit25"];
$Edit26	    = @$row0["Edit26"];
$Edit27	    = @$row0["Edit27"];
$Edit28	    = @$row0["Edit28"];
$Edit29	    = @$row0["Edit29"];
$Edit30	    = @$row0["Edit30"];
$alerta_1   = @$row0["mensage1"];
$categ_1    = @$row0["mensage2"];
$nome_do_edif = @$row0["mensage3"];
$nome_cad_si  = @$row0["mensage4"];

//$alerta_1   = $alerta_1;
$nome2_adms = $nome_do_edif; 


// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$vag1       = @$row3["vag1"];
$vag2       = @$row3["vag2"];
$vag3       = @$row3["vag3"];

?>
<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
		
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 77px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:77px;" onfocus="this.className='anormal'; nextfield ='Edit2';" onblur="this.className='normal'" onchange="Salva1(this.value)"  style="text-transform: uppercase;" tabindex="1"    />
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
		
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 400px; WIDTH: 163px; POSITION: absolute; TOP: 139px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:163px;" onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'" onchange="Salva2(this.value)"  style="text-transform: uppercase;"  tabindex="2"    />
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
		
<div id="Edit3_outer" style="Z-INDEX: 10; LEFT: 640px; WIDTH: 182px; POSITION: absolute; TOP: 139px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:182px;" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit3', '999.999.999-99', event);" onchange="Salva3(this.value)"   style="text-transform: uppercase;" tabindex="3"    />
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
		
<div id="Edit4_outer" style="Z-INDEX: 26; LEFT: 278px; WIDTH: 122px; POSITION: absolute; TOP: 166px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?php echo $Edit4 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:122px;" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'" onchange="Salva4(this.value)"  style="text-transform: uppercase;"  tabindex="1"    />
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
		
<div id="Edit5_outer" style="Z-INDEX: 28; LEFT: 462px; WIDTH: 360px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?php echo $Edit5 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:360px;" onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'" onchange="Salva5(this.value)"   style="text-transform: uppercase;"  tabindex="3"    />
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
		
<div id="Edit6_outer" style="Z-INDEX: 30; LEFT: 278px; WIDTH: 370px; POSITION: absolute; TOP: 192px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?php echo $Edit6 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:370px;" onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'" onchange="Salva6(this.value)"  style="text-transform: uppercase;" tabindex="3"    />
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
		
<div id="Edit7_outer" style="Z-INDEX: 32; LEFT: 706px; WIDTH: 117px; POSITION: absolute; TOP: 192px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?php echo $Edit7 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;" onfocus="this.className='anormal'; nextfield ='Edit8';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit7', '99999-999', event);" onchange="Salva7(this.value)"  style="text-transform: uppercase;" tabindex="1"    />
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
		
		
<div id="Edit8_outer" style="Z-INDEX: 34; LEFT: 278px; WIDTH: 182px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?php echo $Edit8 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:182px;" onfocus="this.className='anormal'; nextfield ='Edit9';" onblur="this.className='normal'" onchange="Salva8(this.value)"  style="text-transform: uppercase;" tabindex="3"    />
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
		
<div id="Edit9_outer" style="Z-INDEX: 36; LEFT: 520px; WIDTH: 303px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?php echo $Edit9 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:303px;" onfocus="this.className='anormal'; nextfield ='Edit10';" onblur="this.className='normal'" onchange="Salva9(this.value)"  style="text-transform: uppercase;" tabindex="3"    />
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

<div id="Edit10_outer" style="Z-INDEX: 38; LEFT: 278px; WIDTH: 77px; POSITION: absolute; TOP: 244px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?php echo $Edit10 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:77px;" onfocus="this.className='anormal'; nextfield ='Edit11';" onblur="this.className='normal'" onchange="Salva10(this.value)"  style="text-transform: uppercase;" tabindex="1"    />
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
		
<div id="Edit11_outer" style="Z-INDEX: 40; LEFT: 416px; WIDTH: 407px; POSITION: absolute; TOP: 244px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?php echo $Edit11 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:407px;" onfocus="this.className='anormal'; nextfield ='Edit12';" onblur="this.className='normal'" onchange="Salva11(this.value)"  style="text-transform: uppercase;" tabindex="2"    />
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
		
<div id="Edit12_outer" style="Z-INDEX: 42; LEFT: 278px; WIDTH: 370px; POSITION: absolute; TOP: 270px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?php echo $Edit12 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:370px;" onfocus="this.className='anormal'; nextfield ='Edit13';" onblur="this.className='normal'" onchange="Salva12(this.value)" style="text-transform: uppercase;" tabindex="3"    />
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
		
<div id="Edit13_outer" style="Z-INDEX: 44; LEFT: 706px; WIDTH: 117px; POSITION: absolute; TOP: 270px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?php echo $Edit13 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;" onfocus="this.className='anormal'; nextfield ='Edit14';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit13', '99999-999', event);" onchange="Salva13(this.value)"  style="text-transform: uppercase;" tabindex="1"    />
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
		
<div id="Edit14_outer" style="Z-INDEX: 46; LEFT: 278px; WIDTH: 186px; POSITION: absolute; TOP: 296px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?php echo $Edit14 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:186px;" onfocus="this.className='anormal'; nextfield ='Edit15';" onblur="this.className='normal'" onchange="Salva14(this.value)"  style="text-transform: uppercase;"  tabindex="3"    />
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
		
<div id="Edit15_outer" style="Z-INDEX: 48; LEFT: 672px; WIDTH: 152px; POSITION: absolute; TOP: 296px; HEIGHT: 26px">
<input type="text" id="Edit15" name="Edit15" value="<?php echo $Edit15 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:152px;" onfocus="this.className='anormal'; nextfield ='Edit16';" onblur="this.className='normal'" onchange="Salva15(this.value)"  style="text-transform: uppercase;" tabindex="3"    />
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
		
		
<div id="Edit16_outer" style="Z-INDEX: 49; LEFT: 184px; WIDTH: 88px; POSITION: absolute; TOP: 322px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?php echo $Edit16 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:88px;" onfocus="this.className='anormal'; nextfield ='Edit17';" onblur="this.className='normal'" onchange="Salva16(this.value)"  style="text-transform: uppercase;" tabindex="3"    />
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
		
<div id="Edit17_outer" style="Z-INDEX: 51; LEFT: 416px; WIDTH: 64px; POSITION: absolute; TOP: 322px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?php echo $Edit17 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:64px;" onfocus="this.className='anormal'; nextfield ='Edit18';" onblur="this.className='normal'" onchange="Salva17(this.value)"  style="text-transform: uppercase;" tabindex="3"    />
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
		
<div id="Edit18_outer" style="Z-INDEX: 53; LEFT: 496px; WIDTH: 64px; POSITION: absolute; TOP: 322px; HEIGHT: 26px">
<input type="text" id="Edit18" name="Edit18" value="<?php echo $Edit18 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:64px;" onfocus="this.className='anormal'; nextfield ='Edit19';" onblur="this.className='normal'" onchange="Salva18(this.value)"   style="text-transform: uppercase;"  tabindex="3"    />
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
		
<div id="Edit19_outer" style="Z-INDEX: 55; LEFT: 707px; WIDTH: 117px; POSITION: absolute; TOP: 322px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?php echo $Edit19 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;" onfocus="this.className='anormal'; nextfield ='Edit20';" onblur="this.className='normal'" onchange="Salva19(this.value)"   style="text-transform: uppercase;" tabindex="1"    />
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
		
<div id="Edit20_outer" style="Z-INDEX: 57; LEFT: 278px; WIDTH: 58px; POSITION: absolute; TOP: 346px; HEIGHT: 26px">
<input type="text" id="Edit20" name="Edit20" value="<?php echo $Edit20 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:58px;" onfocus="this.className='anormal'; nextfield ='Edit21';" onblur="this.className='normal'" onchange="Salva20(this.value)"  style="text-transform: uppercase;" tabindex="1"    />
</div>
		
		
		<?php
}

if (!empty($Edit21)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit22").focus();	
		}
		
		</script>
		
<div id="Edit21_outer" style="Z-INDEX: 59; LEFT: 375px; WIDTH: 102px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<input type="text" id="Edit21" name="Edit21" value="<?php echo $Edit21 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:102px;" onfocus="this.className='anormal'; nextfield ='Edit22';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit21', '99/99/9999', event);" onchange="Salva21(this.value)"   style="text-transform: uppercase;"  tabindex="3"    />
</div>
		
		
		<?php
}
if (!empty($Edit22)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit23").focus();	
		}
		
		</script>
		
<div id="Edit22_outer" style="Z-INDEX: 61; LEFT: 536px; WIDTH: 288px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<input type="text" id="Edit22" name="Edit22" value="<?php echo $Edit22 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:288px;" onfocus="this.className='anormal'; nextfield ='Edit23';" onblur="this.className='normal'" onchange="Salva22(this.value)"  style="text-transform: uppercase;"  tabindex="3"    />
</div>
		
		
		<?php
}
if (!empty($Edit23)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit24").focus();	
		}
		
		</script>
		
<div id="Edit23_outer" style="Z-INDEX: 63; LEFT: 278px; WIDTH: 58px; POSITION: absolute; TOP: 371px; HEIGHT: 26px">
<input type="text" id="Edit23" name="Edit23" value="<?php echo $Edit23 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:58px;" onfocus="this.className='anormal'; nextfield ='Edit24';" onblur="this.className='normal'" onchange="Salva23(this.value)"  style="text-transform: uppercase;" tabindex="1"    />
</div>
		
		
		<?php
}
if (!empty($Edit24)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit25").focus();	
		}
		
		</script>
		
<div id="Edit24_outer" style="Z-INDEX: 65; LEFT: 375px; WIDTH: 102px; POSITION: absolute; TOP: 372px; HEIGHT: 26px">
<input type="text" id="Edit24" name="Edit24" value="<?php echo $Edit24 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:102px;" onfocus="this.className='anormal'; nextfield ='Edit25';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit24', '99/99/9999', event);" onchange="Salva24(this.value)"   style="text-transform: uppercase;" tabindex="3"    />
</div>
		
		
		<?php
}
if (!empty($Edit25)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit26").focus();	
		}
		
		</script>
		
<div id="Edit25_outer" style="Z-INDEX: 67; LEFT: 536px; WIDTH: 80px; POSITION: absolute; TOP: 372px; HEIGHT: 26px">
<input type="text" id="Edit25" name="Edit25" value="<?php echo $Edit25 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:80px;" onfocus="this.className='anormal'; nextfield ='Edit26';" onblur="this.className='normal'" onchange="Salva25(this.value)"  style="text-transform: uppercase;" tabindex="3"    />
</div>
		
		
		<?php
}
if (!empty($Edit26)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit27").focus();	
		}
		
		</script>
		
<div id="Edit26_outer" style="Z-INDEX: 69; LEFT: 278px; WIDTH: 58px; POSITION: absolute; TOP: 396px; HEIGHT: 26px">
<input type="text" id="Edit26" name="Edit26" value="<?php echo $Edit26 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:58px;" onfocus="this.className='anormal'; nextfield ='Edit27';" onblur="this.className='normal'" onchange="Salva26(this.value)"  style="text-transform: uppercase;" tabindex="1"    />
</div>
		
		
		<?php
}
if (!empty($Edit27)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit28").focus();	
		}
		
		</script>
		
<div id="Edit27_outer" style="Z-INDEX: 71; LEFT: 375px; WIDTH: 102px; POSITION: absolute; TOP: 397px; HEIGHT: 26px">
<input type="text" id="Edit27" name="Edit27" value="<?php echo $Edit27 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:102px;" onfocus="this.className='anormal'; nextfield ='Edit28';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit27', '99/99/9999', event);" onchange="Salva27(this.value)"  style="text-transform: uppercase;" tabindex="3"    />
</div>
		
		
		<?php
}
if (!empty($Edit28)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit29").focus();	
		}
		
		</script>
		
<div id="Edit28_outer" style="Z-INDEX: 73; LEFT: 536px; WIDTH: 288px; POSITION: absolute; TOP: 397px; HEIGHT: 26px">
<input type="text" id="Edit28" name="Edit28" value="<?php echo $Edit28 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:288px;" onfocus="this.className='anormal'; nextfield ='Edit29';" onblur="this.className='normal'" onchange="Salva28(this.value)"  style="text-transform: uppercase;" tabindex="3"    />
</div>
		
		
		<?php
}
if (!empty($Edit29)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit30").focus();	
		}
		
		</script>
		
<div id="Edit29_outer" style="Z-INDEX: 75; LEFT: 278px; WIDTH: 546px; POSITION: absolute; TOP: 422px; HEIGHT: 42px">
<textarea  id="Edit29" name="Edit29" style=" font-family: Verdana; font-size: 14px;  height:41px;width:546px;" onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'" onchange="Salva29(this.value)" onFocus="nextfield ='Edit29';"  style="text-transform: uppercase;"  tabindex="1"  wrap="virtual" > <?php echo $Edit29 ?> </textarea>
</div>
		
		
		<?php
}

?>


<div id="Label71_outer" style="Z-INDEX: 335; LEFT: 400px; WIDTH: 544px; POSITION: absolute; TOP: 495px; HEIGHT: 80px">
<div id="Label71" style=" font-family: Verdana; font-size: 14px; color: #ff0000;font-weight: normal; height:24px;width:403px;"   ><b><?php echo $alerta_1 ?></b></STRONG></div>
</div>

