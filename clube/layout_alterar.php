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

// Abre Tabela Tenporaria

$nome3a = strtolower($nome3);

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
$Edit10		= @$row0["Edit10"];
$Edit11		= @$row0["Edit11"];
$Edit12		= @$row0["Edit12"];
$Edit13		= @$row0["Edit13"];
$Edit14		= @$row0["Edit14"];
$Edit15		= @$row0["Edit15"];
$Edit16		= @$row0["Edit16"];
$Edit17		= @$row0["Edit17"];
$Edit18		= @$row0["Edit18"];
$Edit19		= @$row0["Edit19"];
$Edit20		= @$row0["Edit20"];
$Edit21		= @$row0["Edit21"];
$Edit22     = @$row0["memo1"];
$alerta_1   = @$row0["mensage1"];
$categ_1    = @$row0["mensage2"];
$nome_do_edif = @$row0["mensage3"];
$nome_cad_si  = @$row0["mensage4"];

$alerta_1   = $alerta_1;
$nome2_adms = $nome_do_edif; 

$cami2 = '../imagens/fotos/Branco.bmp';  

// Abrir tabela Senha

$tabela_1 = strtoupper('clube_tiete');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

// Consulta Dependente
$consulta4 = "SELECT * FROM socios WHERE CODP = '$Edit2'";
	
$resultado4 = @mysql_query($consulta4);

$row4 = @mysql_fetch_array($resultado4);

$dep_[1]   = $row4["CONJUGE"];
$dep_[2]   = trim($row4["FILHO01"]);
$ani_[2]   = trim($row4["DAT01"]);
$dep_[3]   = trim($row4["FILHO02"]);
$ani_[3]   = trim($row4["DAT02"]);
$dep_[4]   = trim($row4["FILHO03"]);
$ani_[4]   = trim($row4["DAT03"]);
$dep_[5]   = trim($row4["FILHO04"]);
$ani_[5]   = trim($row4["DAT04"]);
$dep_[6]   = trim($row4["FILHO05"]);
$ani_[6]   = trim($row4["DAT05"]);
$dep_[7]   = trim($row4["FILHO06"]);
$ani_[7]   = trim($row4["DAT06"]);
$dep_[8]   = trim($row4["FILHO07"]);
$ani_[8]   = trim($row4["DAT07"]);
$dep_[9]   = trim($row4["FILHO08"]);
$ani_[9]   = trim($row4["DAT08"]);
$dep_[10]  = trim($row4["FILHO09"]);
$ani_[10]  = trim($row4["DAT009"]);
$dep_[11]  = trim($row4["FILHO10"]);
$ani_[11]  = trim($row4["DAT10"]);

$si = 0;

?>
<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
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
		
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 305px; WIDTH: 95px; POSITION: absolute; TOP: 141px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:95px;" onfocus="this.className='anormal'; nextfield ='Edit2';" onblur="this.className='normal'"  disabled  tabindex="0"    />
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
		
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 521px; WIDTH: 95px; POSITION: absolute; TOP: 141px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:95px;" onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'"  onchange="Salva2(this.value)" style="text-transform: uppercase;" disabled tabindex="0"    />
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
		
<div id="Edit3_outer" style="Z-INDEX: 9; LEFT: 697px; WIDTH: 111px; POSITION: absolute; TOP: 141px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:111px;" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'"  onchange="Salva3(this.value)" style="text-transform: uppercase;" disabled tabindex="0"    />
</div>

	
		<?
}
if (!empty($Edit4)){
	
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit5").focus();	
		}
		
		</script>
		
<div id="Edit4_outer" style="Z-INDEX: 12; LEFT: 305px; WIDTH: 391px; POSITION: absolute; TOP: 167px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:391px;" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'"  onchange="Salva4(this.value)" style="text-transform: uppercase;" tabindex="0"    />


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
		
<div id="Edit5_outer" style="Z-INDEX: 14; LEFT: 305px; WIDTH: 47px; POSITION: absolute; TOP: 193px; HEIGHT: 26px">
<select type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:47px;" onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'"  onchange="Salva5(this.value)" style="text-transform: uppercase;"  tabindex="0"    />

<?

if (!empty($Edit5))
{
?>	
	<option value="<?=$Edit5;?>"> <?=$Edit5;?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?            
 }
?>

</select>

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
		
<div id="Edit6_outer" style="Z-INDEX: 18; LEFT: 453px; WIDTH: 120px; POSITION: absolute; TOP: 193px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:120px;" onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'"  onchange="Salva6(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
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
		
<div id="Edit7_outer" style="Z-INDEX: 20; LEFT: 305px; WIDTH: 151px; POSITION: absolute; TOP: 218px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:151px;" onfocus="this.className='anormal'; nextfield ='Edit8';" onblur="this.className='normal'"  onchange="Salva7(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
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
		
		
<div id="Edit8_outer" style="Z-INDEX: 22; LEFT: 528px; WIDTH: 168px; POSITION: absolute; TOP: 217px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:168px;" onfocus="this.className='anormal'; nextfield ='Edit9';" onblur="this.className='normal'"  onchange="Salva8(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
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
		
<div id="Edit9_outer" style="Z-INDEX: 24; LEFT: 305px; WIDTH: 151px; POSITION: absolute; TOP: 245px; HEIGHT: 26px">
<select type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:151px;" onfocus="this.className='anormal'; nextfield ='Edit10';" onblur="this.className='normal'"  onchange="Salva9(this.value)" style="text-transform: uppercase;"  tabindex="0"    />


<?

if (!empty($Edit9))
{
?>	
	<option value="<?=$Edit9;?>"> <?=$Edit9;?> </option>
            <option value=".">  </option>
            <option value="ENSINO FUNDAMENTAL"> ENSINO FUNDAMENTAL </option>
            <option value="FUNDAMENTAL INCOMPLETO"> FUNDAMENTAL INCOMPLETO</option>
            <option value="ENSINO MEDIO"> ENSINO MEDIO </option>
            <option value="MEDIO INCOMPLETO"> MEDIO INCOMPLETO </option>
            <option value="SUPERIOR"> SUPERIOR </option>
            <option value="SUPERIOR INCOMPLETO"> SUPERIOR INCOMPLETO </option>
            <option value="NAO ANALFABETIZADO"> NAO ANALFABETIZADO </option>

<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="ENSINO FUNDAMENTAL"> ENSINO FUNDAMENTAL </option>
            <option value="FUNDAMENTAL INCOMPLETO"> FUNDAMENTAL INCOMPLETO</option>
            <option value="ENSINO MEDIO"> ENSINO MEDIO </option>
            <option value="MEDIO INCOMPLETO"> MEDIO INCOMPLETO </option>
            <option value="SUPERIOR"> SUPERIOR </option>
            <option value="SUPERIOR INCOMPLETO"> SUPERIOR INCOMPLETO </option>
            <option value="NAO ANALFABETIZADO"> NAO ANALFABETIZADO </option>
<?            
 }
?>

</select>

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

<div id="Edit10_outer" style="Z-INDEX: 26; LEFT: 576px; WIDTH: 120px; POSITION: absolute; TOP: 242px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?=$Edit10;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:120px;" onfocus="this.className='anormal'; nextfield ='Edit11';" onblur="this.className='normal'"  onchange="Salva10(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
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

<div id="Edit11_outer" style="Z-INDEX: 28; LEFT: 305px; WIDTH: 391px; POSITION: absolute; TOP: 269px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?=$Edit11;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:391px;" onfocus="this.className='anormal'; nextfield ='Edit12';" onblur="this.className='normal'"  onchange="Salva11(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
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

<div id="Edit12_outer" style="Z-INDEX: 30; LEFT: 305px; WIDTH: 151px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?=$Edit12;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:151px;" onfocus="this.className='anormal'; nextfield ='Edit13';" onblur="this.className='normal'"  onchange="Salva12(this.value)" style="text-transform: uppercase;" tabindex="0"    />
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

<div id="Edit13_outer" style="Z-INDEX: 32; LEFT: 529px; WIDTH: 167px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?=$Edit13;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:167px;" onfocus="this.className='anormal'; nextfield ='Edit14';" onblur="this.className='normal'"  onchange="Salva13(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
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

<div id="Edit14_outer" style="Z-INDEX: 34; LEFT: 305px; WIDTH: 151px; POSITION: absolute; TOP: 321px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?=$Edit14;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:151px;" onfocus="this.className='anormal'; nextfield ='Edit15';" onblur="this.className='normal'"  onchange="Salva14(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
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

<div id="Edit15_outer" style="Z-INDEX: 36; LEFT: 529px; WIDTH: 63px; POSITION: absolute; TOP: 323px; HEIGHT: 26px">
<select type="text" id="Edit15" name="Edit15" value="<?=$Edit15;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:63px;" onfocus="this.className='anormal'; nextfield ='Edit16';" onblur="this.className='normal'"  onchange="Salva15(this.value)" style="text-transform: uppercase;"  tabindex="0"    />

<?

if (!empty($Edit15))
{
?>	
	<option value="<?=$Edit15;?>"> <?=$Edit15;?> </option>
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

if (!empty($Edit16)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit17").focus();	
		}
		
		</script>

<div id="Edit16_outer" style="Z-INDEX: 38; LEFT: 656px; WIDTH: 152px; POSITION: absolute; TOP: 321px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?=$Edit16;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:152px;" onfocus="this.className='anormal'; nextfield ='Edit17';" onblur="this.className='normal'"  onchange="Salva16(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
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

<div id="Edit17_outer" style="Z-INDEX: 40; LEFT: 305px; WIDTH: 151px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?=$Edit17;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:151px;" onfocus="this.className='anormal'; nextfield ='Edit18';" onblur="this.className='normal'"  onchange="Salva17(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
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

<div id="Edit18_outer" style="Z-INDEX: 42; LEFT: 529px; WIDTH: 279px; POSITION: absolute; TOP: 347px; HEIGHT: 26px">
<input type="text" id="Edit18" name="Edit18" value="<?=$Edit18;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:279px;" onfocus="this.className='anormal'; nextfield ='Edit19';" onblur="this.className='normal'"  onchange="Salva18(this.value)" tabindex="0"    />
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

<div id="Edit19_outer" style="Z-INDEX: 44; LEFT: 305px; WIDTH: 175px; POSITION: absolute; TOP: 373px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?=$Edit19;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:175px;" onfocus="this.className='anormal'; nextfield ='Edit20';" onblur="this.className='normal'"    onkeypress="return txtBoxFormat(document.Form1, 'Edit19', '999.999.999-99', event);" onchange="Salva19(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
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

<div id="Edit20_outer" style="Z-INDEX: 46; LEFT: 529px; WIDTH: 167px; POSITION: absolute; TOP: 373px; HEIGHT: 26px">
<input type="text" id="Edit20" name="Edit20" value="<?=$Edit20;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:167px;" onfocus="this.className='anormal'; nextfield ='Edit21';" onblur="this.className='normal'"  onchange="Salva20(this.value)" style="text-transform: uppercase;"  tabindex="0"    />
</div>
		
		
		<?
}

if (!empty($Edit21)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit22").focus();	
		}
		
		</script>

<div id="Edit21_outer" style="Z-INDEX: 48; LEFT: 737px; WIDTH: 71px; POSITION: absolute; TOP: 373px; HEIGHT: 26px">
<input type="text" id="Edit21" name="Edit21" value="<?=$Edit21;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:71px;" onfocus="this.className='anormal'; nextfield ='Edit22';" onblur="this.className='normal'"  onchange="Salva21(this.value)" style="text-transform: uppercase;"   tabindex="0"    />
</div>
		
		
		<?
}

if (!empty($Edit22)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit22").focus();	
		}
		
		</script>

<div id="Edit22_outer" style="Z-INDEX: 50; LEFT: 305px; WIDTH: 503px; POSITION: absolute; TOP: 398px; HEIGHT: 58px">
<textarea id="Edit22" name="Edit22"  style=" font-family: Verdana; font-size: 14px;  height:57px;width:503px;" onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"  onchange="Salva22(this.value)" tabindex="0"    /><?=$Edit22;?></textarea>
</div>
		
		
		<?
}

?>

<div id="Label6_outer" style="Z-INDEX: 40; LEFT: 361px; WIDTH: 459px; POSITION: absolute; TOP: 341px; HEIGHT: 18px">
<div id="Label6" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:18px;width:459px;"   > <STRONG><FONT color=#0000ff><?=$nome2_adms;?></FONT></STRONG> </div>
</div>

<div id="Label71_outer" style="Z-INDEX: 35; LEFT: 390px; WIDTH: 544px; POSITION: absolute; TOP: 485px; HEIGHT: 80px">
<div id="Label71" style=" font-family: Verdana; font-size: 14px; color: #ff0000;font-weight: normal; height:24px;width:403px;"   ><b><?=$alerta_1;?></b></STRONG></div>
</div>

