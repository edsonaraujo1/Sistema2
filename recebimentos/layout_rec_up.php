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
$Edit8	    = @$row0["memo1"];
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

$aco1       = @$row3["aco1"];
$aco2       = @$row3["aco2"];
$aco3       = @$row3["aco3"];

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
		
<div id="Edit0_outer" style="Z-INDEX: 6; LEFT: 305px; WIDTH: 103px; POSITION: absolute; TOP: 141px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:103px;" disabled   tabindex="0"    />
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
		
<div id="Edit1_outer" style="Z-INDEX: 8; LEFT: 305px; WIDTH: 127px; POSITION: absolute; TOP: 166px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:127px;" onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'"  onchange="Salva2(this.value)"   tabindex="0"    />
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
		
<div id="Edit2_outer" style="Z-INDEX: 10; LEFT: 305px; WIDTH: 495px; POSITION: absolute; TOP: 192px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:495px;" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'"  onchange="Salva3(this.value)"  tabindex="0"    />
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
		
<div id="Edit3_outer" style="Z-INDEX: 12; LEFT: 305px; WIDTH: 495px; POSITION: absolute; TOP: 217px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:495px;" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'"  onchange="Salva4(this.value)"  tabindex="0"    />
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
		
<div id="Edit4_outer" style="Z-INDEX: 14; LEFT: 305px; WIDTH: 167px; POSITION: absolute; TOP: 243px; HEIGHT: 26px">
<select type="text" id="Edit5" name="Edit5" value="<?=$Edit5;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:167px;" onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'"  onchange="Salva5(this.value)"  tabindex="0"    />

<?

if (!empty($Edit5))
{
?>	
	<option value="<?=$Edit2;?>"> <?=$Edit5;?> </option>
            <option value="DINHEIRO">     DINHEIRO  </option>
            <option value="CHEQUE">       CHEQUE </option>
            <option value="CHEQUE-PRE">   CHEQUE-PRE  </option>
            <option value="FATURADO">     FATURADO </option>
<?	

}else{
	
?>	
            <option value=" ">  </option>
            <option value="DINHEIRO">     DINHEIRO  </option>
            <option value="CHEQUE">       CHEQUE </option>
            <option value="CHEQUE-PRE">   CHEQUE-PRE  </option>
            <option value="FATURADO">     FATURADO </option>
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
		
<div id="Edit5_outer" style="Z-INDEX: 16; LEFT: 305px; WIDTH: 127px; POSITION: absolute; TOP: 269px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:127px;" onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'"  onkeypress="return txtBoxFormat(document.Form1, 'Edit6', '99/99/9999', event);" onchange="Salva6(this.value)"   tabindex="0"    />
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
		
<div id="Edit6_outer" style="Z-INDEX: 18; LEFT: 305px; WIDTH: 127px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:127px;" onfocus="this.className='anormal'; nextfield ='Edit8';" onblur="this.className='normal'"  onkeypress="return txtBoxFormat(document.Form1, 'Edit7', '99/99/9999', event);" onchange="Salva7(this.value)"  tabindex="0"    />
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
		
		
<div id="Edit7_outer" style="Z-INDEX: 20; LEFT: 305px; WIDTH: 495px; POSITION: absolute; TOP: 320px; HEIGHT: 64px">
<textarea  id="Edit8" name="Edit8"  style=" font-family: Verdana; font-size: 14px;  height:63px;width:495px;" onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"  onchange="Salva8(this.value)" onFocus="nextfield ='Edit8';"  tabindex="0"    /><?=$Edit8;?></textarea>
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
		
<div id="Edit8_outer" style="Z-INDEX: 22; LEFT: 305px; WIDTH: 74px; POSITION: absolute; TOP: 346px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?=$Edit9;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:74px;" onfocus="this.className='anormal'; nextfield ='Edit10';" onblur="this.className='normal'"  onchange="Salva9(this.value)"  style="text-transform: uppercase;"  tabindex="0"    />
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

<div id="Edit9_outer" style="Z-INDEX: 24; LEFT: 305px; WIDTH: 463px; POSITION: absolute; TOP: 372px; HEIGHT: 76px">
<textarea  id="Edit10" name="Edit10"  style=" font-family: Verdana; font-size: 14px;  height:75px;width:463px;  " onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"  onchange="Salva10(this.value)"  style="text-transform: uppercase;"  tabindex="0"  wrap="virtual"  ><?=$Edit10;?> </textarea>
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

