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
@session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = strtolower($_SESSION["nome_log"]);

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

$odo1       = @$row3["odo1"];
$odo2       = @$row3["odo2"];
$odo3       = @$row3["odo3"];


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
		
<div id="Edit1_outer" style="Z-INDEX: 9; LEFT: 311px; WIDTH: 121px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:121px;" disabled   tabindex="0"    />
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
		
<div id="Edit2_outer" style="Z-INDEX: 8; LEFT: 311px; WIDTH: 233px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<select type="text" id="Edit2" name="Edit2" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:233px;"  onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'"   onchange="Salva2(this.value)" style="text-transform: uppercase;"   tabindex="3"    />

<?php

// iniciando a query que irá mostrar as tabelas desta base
$executa="SHOW TABLES";
	
$query=mysql_query($executa,$link) or die(mysql_error());

if (!empty($Edit2)){
	
	?>
	<option value="<?php echo $Edit2 ?>"><?php echo $Edit2 ?></option>
	<?php
	
	while ($dados=mysql_fetch_array($query))
	{
	    // imprimindo o nome das tabelas existentes no banco
		?>
		<option value="<?php echo $dados[0] ?>"><?php echo $dados[0] ?></option>
		<?php
	
	}
}else{

	?>
	<option value="Selecione Tabela">Selecione Tabela</option>
	<?php
	
	while ($dados=mysql_fetch_array($query))
	{
	    // imprimindo o nome das tabelas existentes no banco
		?>
		<option value="<?php echo $dados[0] ?>"><?php echo $dados[0] ?></option>
		<?php
	
	}
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
		
<div id="Edit3_outer" style="Z-INDEX: 7; LEFT: 311px; WIDTH: 73px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<select type="text" id="Edit3" name="Edit3" value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:73px;" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'"   onchange="Salva3(this.value)" style="text-transform: uppercase;"   tabindex="5"    />

	<option value="<?php echo $Edit3 ?>"> <?php echo $Edit3 ?> </option>
            <option value="SIM"> SIM </option>
            <option value="NAO"> NAO </option>

</select>

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
		
<div id="Edit4_outer" style="Z-INDEX: 16; LEFT: 311px; WIDTH: 73px; POSITION: absolute; TOP: 216px; HEIGHT: 26px">
<select type="text" id="Edit4" name="Edit4" value="<?php echo $Edit4 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:73px;" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'"   onchange="Salva4(this.value)" style="text-transform: uppercase;"    tabindex="5"    />

	<option value="<?php echo $Edit4 ?>"> <?php echo $Edit4 ?> </option>
            <option value="SIM"> SIM </option>
            <option value="NAO"> NAO </option>

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
		
<div id="Edit5_outer" style="Z-INDEX: 14; LEFT: 311px; WIDTH: 73px; POSITION: absolute; TOP: 242px; HEIGHT: 26px">
<select input type="text" id="Edit5" name="Edit5" value="<?php echo $Edit5 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:73px;"  onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'"   onchange="Salva5(this.value)" style="text-transform: uppercase;"   tabindex="5"    />

	<option value="<?php echo $Edit5 ?>"> <?php echo $Edit5 ?> </option>
            <option value="SIM"> SIM </option>
            <option value="NAO"> NAO </option>

</select>

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
		
<div id="Edit6_outer" style="Z-INDEX: 13; LEFT: 311px; WIDTH: 73px; POSITION: absolute; TOP: 268px; HEIGHT: 26px">
<select type="text" id="Edit6" name="Edit6" value="<?php echo $Edit6 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:73px;"  onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"   onchange="Salva6(this.value)" style="text-transform: uppercase;"   tabindex="5"    />

	<option value="<?php echo $Edit6 ?>"> <?php echo $Edit6 ?> </option>
            <option value="SIM"> SIM </option>
            <option value="NAO"> NAO </option>

</select>

</div>
		
		<?php
}
