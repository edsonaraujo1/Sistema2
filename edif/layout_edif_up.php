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
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

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
$Edit20	    = @$row0["memo1"];
$alerta_1   = @$row0["mensage1"];
$categ_1    = @$row0["mensage2"];
$nome_do_edif = @$row0["mensage3"];
$nome_cad_si  = @$row0["mensage4"];

$alerta_1   = $alerta_1;
$nome2_adms = $nome_do_edif; 


// Abrir tabela Senha

$tabela_1 = strtoupper('edificios');

$consulta3 = "SELECT * FROM permissoes WHERE login = '". anti_sql_injection($nome3) ."' and tabela = '". anti_sql_injection($tabela_1) ."'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

?>
<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<?


if (!empty($Edit1)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit2").focus();	
		}
		
		</script>
		
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 278px; WIDTH: 56px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px; " disabled tabindex="1"   />
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
		
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 470px; WIDTH: 137px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<select id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px;" onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'" onchange="Salva2(this.value)" style="text-transform: uppercase;"  tabindex="2"    />

<?

if (!empty($Edit2))
{
?>	
	<option value="<?=$Edit2;?>"> <?=$Edit2;?> </option>
            <option value="CONTRIBUINTE">     CONTRIBUINTE     </option>
            <option value="NAO CONTRIBUINTE"> NAO CONTRIBUINTE </option>
            <option value="TERCEIRIZADO">     TERCEIRIZADO     </option>
<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="CONTRIBUINTE">     CONTRIBUINTE     </option>
            <option value="NAO CONTRIBUINTE"> NAO CONTRIBUINTE </option>
            <option value="TERCEIRIZADO">     TERCEIRIZADO     </option>
<?            
 }
?>

</select>

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
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:93px;" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'" readonly="readonly"   tabindex="3"    />
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
		
<div id="Edit4_outer" style="Z-INDEX: 36; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 166px; HEIGHT: 26px">
<select id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px;" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'" onchange="Salva4(this.value)"  tabindex="4"    />

<?

if (!empty($Edit4))
{
?>	
	<option value="<?=$Edit4;?>"> <?=$Edit4;?> </option>
			<option value="EMPRESA"> EMPRESA </option>
			<option value="FILIADO"> FILIADO </option>
			<option value="ASSOCIAÇÃO"> ASSOCIAÇÃO </option>
			<option value="COND."> COND. </option>
			<option value="COND. COMERCIAL"> COND. COMERCIAL </option>
			<option value="COND. CONJ."> COND. CONJ. </option>
			<option value="COND. CONJ. HABIT."> COND. CONJ. HABIT. </option>
			<option value="COND. CONJ. RESID."> COND. CONJ. RESID. </option>
			<option value="COND. EDIF."> COND. EDIF. </option>
			<option value="COND. EDIF. CONJ."> COND. EDIF. CONJ. </option>
			<option value="COND. EDIF. CONJ. RESID."> COND. EDIF. CONJ. RESID. </option>
			<option value="COND. EDIF. RESID."> COND. EDIF. RESID. </option>
			<option value="COND. FLAT HOTEL"> COND. FLAT HOTEL </option>
			<option value="COND. PQ. RESID."> COND. PQ. RESID. </option>
			<option value="COND. RESID."> COND. RESID. </option>
			<option value="COND. RESID. EDIF."> COND. RESID. EDIF. </option>
			<option value="COND. RESID. FLAT"> COND. RESID. FLAT </option>
			<option value="CONJ."> CONJ. </option>
			<option value="CONJ. HABIT."> CONJ. HABIT. </option>
			<option value="CONJ. RESID."> CONJ. RESID. </option>
			<option value="COOPERATIVA"> COOPERATIVA </option>
			<option value="EDIF."> EDIF. </option>
			<option value="EDIF. COMERCIAL"> EDIF. COMERCIAL </option>
			<option value="EDIF. COND. RESID."> EDIF. COND. RESID. </option>
			<option value="EDIF. FLAT HOTEL"> EDIF. FLAT HOTEL </option>
			<option value="EDIF. RESID."> EDIF. RESID. </option>
			<option value="EDIF. RESID. FLAT"> EDIF. RESID. FLAT </option>
			<option value="EDIF. SHOPPING"> EDIF. SHOPPING </option>
			<option value="EMPRESA"> EMPRESA </option>
			<option value="FABRICA"> FABRICA </option>
			<option value="FLAT. HOTEL"> FLAT. HOTEL </option>
			<option value="GALERIA"> GALERIA </option>
			<option value="HOTEL"> HOTEL </option>
			<option value="HOTEL FLAT"> HOTEL FLAT </option>
			<option value="IGREJA"> IGREJA </option>
			<option value="PREDIO"> PREDIO </option>
			<option value="SHOPPING"> SHOPPING </option>
			<option value="SOC."> SOC. </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
			<option value="EMPRESA"> EMPRESA </option>
			<option value="FILIADO"> FILIADO </option>
			<option value="ASSOCIAÇÃO"> ASSOCIAÇÃO </option>
			<option value="COND."> COND. </option>
			<option value="COND. COMERCIAL"> COND. COMERCIAL </option>
			<option value="COND. CONJ."> COND. CONJ. </option>
			<option value="COND. CONJ. HABIT."> COND. CONJ. HABIT. </option>
			<option value="COND. CONJ. RESID."> COND. CONJ. RESID. </option>
			<option value="COND. EDIF."> COND. EDIF. </option>
			<option value="COND. EDIF. CONJ."> COND. EDIF. CONJ. </option>
			<option value="COND. EDIF. CONJ. RESID."> COND. EDIF. CONJ. RESID. </option>
			<option value="COND. EDIF. RESID."> COND. EDIF. RESID. </option>
			<option value="COND. FLAT HOTEL"> COND. FLAT HOTEL </option>
			<option value="COND. PQ. RESID."> COND. PQ. RESID. </option>
			<option value="COND. RESID."> COND. RESID. </option>
			<option value="COND. RESID. EDIF."> COND. RESID. EDIF. </option>
			<option value="COND. RESID. FLAT"> COND. RESID. FLAT </option>
			<option value="CONJ."> CONJ. </option>
			<option value="CONJ. HABIT."> CONJ. HABIT. </option>
			<option value="CONJ. RESID."> CONJ. RESID. </option>
			<option value="COOPERATIVA"> COOPERATIVA </option>
			<option value="EDIF."> EDIF. </option>
			<option value="EDIF. COMERCIAL"> EDIF. COMERCIAL </option>
			<option value="EDIF. COND. RESID."> EDIF. COND. RESID. </option>
			<option value="EDIF. FLAT HOTEL"> EDIF. FLAT HOTEL </option>
			<option value="EDIF. RESID."> EDIF. RESID. </option>
			<option value="EDIF. RESID. FLAT"> EDIF. RESID. FLAT </option>
			<option value="EDIF. SHOPPING"> EDIF. SHOPPING </option>
			<option value="EMPRESA"> EMPRESA </option>
			<option value="FABRICA"> FABRICA </option>
			<option value="FLAT. HOTEL"> FLAT. HOTEL </option>
			<option value="GALERIA"> GALERIA </option>
			<option value="HOTEL"> HOTEL </option>
			<option value="HOTEL FLAT"> HOTEL FLAT </option>
			<option value="IGREJA"> IGREJA </option>
			<option value="PREDIO"> PREDIO </option>
			<option value="SHOPPING"> SHOPPING </option>
			<option value="SOC."> SOC. </option>
<?            
 }
?>

</select>

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
		
<div id="Edit5_outer" style="Z-INDEX: 12; LEFT: 470px; WIDTH: 352px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:352px;" onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'" onchange="Salva5(this.value)" style="text-transform: uppercase;"    tabindex="5"    />
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
		
<div id="Edit6_outer" style="Z-INDEX: 14; LEFT: 278px; WIDTH: 192px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:192px; " onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'"  onchange="Salva6(this.value)" style="text-transform: uppercase;"  tabindex="6"    />
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
		
<div id="Edit7_outer" style="Z-INDEX: 15; LEFT: 470px; WIDTH: 352px; POSITION: absolute; TOP: 189px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:352px; " onfocus="this.className='anormal'; nextfield ='Edit8';" onblur="this.className='normal'"  onchange="Salva7(this.value)"  style="text-transform: uppercase;"  tabindex="7"    />
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
		
		
<div id="Edit8_outer" style="Z-INDEX: 17; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 213px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; " onfocus="this.className='anormal'; nextfield ='Edit9';" onblur="this.className='normal'"  onchange="Salva8(this.value)"  style="text-transform: uppercase;"    tabindex="8"    />
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
		
<div id="Edit9_outer" style="Z-INDEX: 21; LEFT: 278px; WIDTH: 83px; POSITION: absolute; TOP: 237px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:83px; " onfocus="this.className='anormal'; nextfield ='Edit10';" onblur="this.className='normal'"  onkeypress="return txtBoxFormat(document.Form1, 'Edit9', '99999-999', event);" onchange="Salva9(this.value)"   tabindex="9"    />
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

<div id="Edit10_outer" style="Z-INDEX: 19; LEFT: 532px; WIDTH: 180px; POSITION: absolute; TOP: 237px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:180px; " onfocus="this.className='anormal'; nextfield ='Edit11';" onblur="this.className='normal'"  onchange="Salva10(this.value)"   style="text-transform: uppercase;"  tabindex="10"    />
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
		
<div id="Edit11_outer" style="Z-INDEX: 25; LEFT: 783px; WIDTH: 39px; POSITION: absolute; TOP: 240px; HEIGHT: 26px">
<select id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px; " onfocus="this.className='anormal'; nextfield ='Edit12';" onblur="this.className='normal'"  onchange="Salva11(this.value)"  style="text-transform: uppercase;"  tabindex="11"    />


<?

if (!empty($Edit11))
{
?>	
	<option value="<?=$Edit11;?>"> <?=$Edit11;?> </option>
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

<?	

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
<?            
 }
?>

</select>

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
		
<div id="Edit12_outer" style="Z-INDEX: 23; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 262px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; " onfocus="this.className='anormal'; nextfield ='Edit13';" onblur="this.className='normal'"  onkeypress="return txtBoxFormat(document.Form1, 'Edit12', '99.999.999/9999-99', event);" onchange="Salva12(this.value)"   tabindex="12"    />
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
		
<div id="Edit13_outer" style="Z-INDEX: 27; LEFT: 532px; WIDTH: 153px; POSITION: absolute; TOP: 262px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:153px; " onfocus="this.className='anormal'; nextfield ='Edit14';" onblur="this.className='normal'"  onchange="Salva13(this.value)"  style="text-transform: uppercase;"  tabindex="13"    />
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
		
<div id="Edit14_outer" style="Z-INDEX: 38; LEFT: 783px; WIDTH: 39px; POSITION: absolute; TOP: 263px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px; " onfocus="this.className='anormal'; nextfield ='Edit15';" onblur="this.className='normal'"  onchange="Salva14(this.value)"   tabindex="14"    />
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
		
<div id="Edit15_outer" style="Z-INDEX: 29; LEFT: 278px; WIDTH: 193px; POSITION: absolute; TOP: 289px; HEIGHT: 26px">
<input id="Edit15" name="Edit15" value="<?=$Edit15;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:193px; " onfocus="this.className='anormal'; nextfield ='Edit16';" onblur="this.className='normal'"  onchange="Salva15(this.value)"  style="text-transform: uppercase;"  tabindex="15"    />
</div>
		
		<?
}
if (!empty($Edit16)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit17").focus();	
		}
		
		</script>
		
		
<div id="Edit16_outer" style="Z-INDEX: 31; LEFT: 532px; WIDTH: 153px; POSITION: absolute; TOP: 287px; HEIGHT: 26px">
<input id="Edit16" name="Edit16" value="<?=$Edit16;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:153px; " onfocus="this.className='anormal'; nextfield ='Edit17';" onblur="this.className='normal'"  onchange="Salva16(this.value)"  style="text-transform: uppercase;" tabindex="16"    />
</div>
		
		<?
}
if (!empty($Edit17)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit18").focus();	
		}
		
		</script>
		
<div id="Edit17_outer" style="Z-INDEX: 42; LEFT: 278px; WIDTH: 346px; POSITION: absolute; TOP: 312px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?=$Edit17;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:346px; " onfocus="this.className='anormal'; nextfield ='Edit18';" onblur="this.className='normal'"  onchange="Salva17(this.value)"  tabindex="17"    />
</div>

	
		<?
}
if (!empty($Edit18)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit19").focus();	
		}
		
		</script>
		
<div id="Edit18_outer" style="Z-INDEX: 44; LEFT: 783px; WIDTH: 39px; POSITION: absolute; TOP: 317px; HEIGHT: 26px">
<select id="Edit18" name="Edit18" value="<?=$Edit18;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:39px; " onfocus="this.className='anormal'; nextfield ='Edit19';" onblur="this.className='normal'"  onchange="Salva18(this.value)"  tabindex="18"    />

<?

if (!empty($Edit18))
{
?>	
	<option value="<?=$Edit18;?>"> <?=$Edit18;?> </option>
            <option value="SIM">  SIM </option>
            <option value="NAO">  NAO </option>
<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="SIM">  SIM </option>
            <option value="NAO">  NAO </option>
<?            
 }
?>

</select>

</div>
		
		<?
}
if (!empty($Edit19)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit20").focus();	
		}
		
		</script>
		
<div id="Edit19_outer" style="Z-INDEX: 39; LEFT: 278px; WIDTH: 81px; POSITION: absolute; TOP: 337px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?=$Edit19;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:81px; " onfocus="this.className='anormal'; nextfield ='Edit20';" onblur="this.className='normal'"  onchange="Salva19(this.value)"  tabindex="19"    />
</div>
		
		<?
}
if (!empty($Edit20)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit21").focus();	
		}
		
		</script>
		
<div id="obs_outer" style="Z-INDEX: 34; LEFT: 278px; WIDTH: 544px; POSITION: absolute; TOP: 362px; HEIGHT: 110px">
<textarea id="Edit20" name="Edit20" style=" font-family: Verdana; font-size: 14px;  height:109px;width:544px; " onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"  onchange="Salva20(this.value)"  style="text-transform: uppercase;" tabindex="17"    wrap="virtual"><?=$Edit20;?></textarea>
</div>
		
		
		<?
}

?>

<div id="Label6_outer" style="Z-INDEX: 40; LEFT: 361px; WIDTH: 459px; POSITION: absolute; TOP: 341px; HEIGHT: 18px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:459px;"   > <STRONG><FONT color=#0000ff><?=substr($nome2_adms,0,50);?></FONT></STRONG> </div>
</div>

<div id="Label71_outer" style="Z-INDEX: 35; LEFT: 390px; WIDTH: 544px; POSITION: absolute; TOP: 485px; HEIGHT: 80px">
<div id="Label71" style=" font-family: Verdana; font-size: 14px; color: #ff0000;font-weight: normal; height:24px;width:403px;"   ><b><?=$alerta_1;?></b></STRONG></div>
</div>

