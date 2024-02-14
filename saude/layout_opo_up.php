<?
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

include("../logar.php");
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

$tabela_1 = strtoupper('saude_atendi');

$consulta3 = "SELECT * FROM permissoes WHERE login = '$nome3' and tabela = '$tabela_1'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];


// Consulta Dependente
$consulta4 = "SELECT * FROM socios WHERE CODP = '$Edit1'";
	
$resultado4 = @mysql_query($consulta4);

$row4 = @mysql_fetch_array($resultado4);

$dep_[1]   = $row4["CONJUGE"];
$dep_[2]   = $row4["FILHO01"];
$ani_[2]   = $row4["DAT01"];
$dep_[3]   = $row4["FILHO02"];
$ani_[3]   = $row4["DAT02"];
$dep_[4]   = $row4["FILHO03"];
$ani_[4]   = $row4["DAT03"];
$dep_[5]   = $row4["FILHO04"];
$ani_[5]   = $row4["DAT04"];
$dep_[6]   = $row4["FILHO05"];
$ani_[6]   = $row4["DAT05"];
$dep_[7]   = $row4["FILHO06"];
$ani_[7]   = $row4["DAT06"];
$dep_[8]   = $row4["FILHO07"];
$ani_[8]   = $row4["DAT07"];
$dep_[9]   = $row4["FILHO08"];
$ani_[9]   = $row4["DAT08"];
$dep_[10]  = $row4["FILHO09"];
$ani_[10]  = $row4["DAT009"];
$dep_[11]  = $row4["FILHO10"];
$ani_[11]  = $row4["DAT10"];


$consulta1 = "SELECT * FROM medico ORDER BY NOME";
	
$resultado1 = @mysql_query($consulta1);

// Procedimentos
$consulta2 = "SELECT * FROM procedi_medico ORDER BY id";
	
$resultado2 = @mysql_query($consulta2);

?>

<html>
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
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
		
<div id="Edit1_outer" style="Z-INDEX: 10; LEFT: 311px; WIDTH: 89px; POSITION: absolute; TOP: 140px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?=$Edit1;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:89px;"  onfocus="this.className='anormal'; nextfield ='Edit2';" onblur="this.className='normal'"   onchange="Salva1(this.value)" style="text-transform: uppercase;" tabindex="0"    />
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
		
<div id="Edit2_outer" style="Z-INDEX: 9; LEFT: 311px; WIDTH: 441px; POSITION: absolute; TOP: 165px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?=$Edit2;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:441px;"   onfocus="this.className='anormal'; nextfield ='Edit3';" onblur="this.className='normal'"   onchange="Salva2(this.value)" style="text-transform: uppercase;"  tabindex="3"    />
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
		
<div id="Edit3_outer" style="Z-INDEX: 8; LEFT: 311px; WIDTH: 49px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?=$Edit3;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:49px;"   onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'"   onchange="Salva3(this.value)" style="text-transform: uppercase;" disabled tabindex="5"    />
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
		
<div id="Edit4_outer" style="Z-INDEX: 12; LEFT: 374px; WIDTH: 81px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?=$Edit4;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:81px;"   onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'"   onchange="Salva4(this.value)" style="text-transform: uppercase;" disabled tabindex="5"    />
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
		
<div id="Edit5_outer" style="Z-INDEX: 19; LEFT: 311px; WIDTH: 441px; POSITION: absolute; TOP: 216px; HEIGHT: 26px">
<select type="text" id="Edit5" name="Edit5" value="" onfocus="this.className='anormal'" onblur="this.className='normal'" style=" font-family: Verdana; font-size: 14px; height:26px;width:441px;"  onchange="Salva5(this.value)"    tabindex="0"    />

<?

if (!empty($Edit5)){
	
	?>
	<option value="<?=$Edit5;?>"><?=$Edit5;?></option>
	<option value="<?=$dep_[1];?>"><?=$dep_[1];?></option>
	<?	
	
	for ($si = 2; $si < 11; $si++){
		
		$Edit5 = $dep_[$si];
		
		if (!empty($Edit5)){

           $soma1 = date('Y') - substr($ani_[$si],6,4);
           
           if ($soma1 >= 18){ 
           	
			   ?>
			   <option value="<?=$Edit5;?>"><?=$Edit5;?>|&nbsp;<b>18 anos |<?=$ani_[$si];?></b></option>
			   <?
			   
			   
		   }else{
		   	
			   ?>
			   <option value="<?=$Edit5;?>"><?=$Edit5;?></option>
			   <?
		   	  
		   }

		}
	}

}else{

	?>
	<option value="TITULAR">TITULAR</option>
	<?	
	
	for ($si = 1; $si < 11; $si++){
		
		$Edit5 = $dep_[$si];
		
		if (!empty($Edit5)){
	    ?>
	      <option value="<?=$Edit5;?>"><?=$Edit5;?></option>
	    <?
		}
	}
	
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
		
<div id="Edit6_outer" style="Z-INDEX: 17; LEFT: 311px; WIDTH: 441px; POSITION: absolute; TOP: 239px; HEIGHT: 26px">
<select type="text" id="Edit6" name="Edit6" value="<?=$Edit6;?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:441px;"   onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'"   onchange="Salva6(this.value)" style="text-transform: uppercase;"  tabindex="6"    />

<?

if (!empty($Edit6)){
	
	?>
	<option value="<?=$Edit6;?>"><?=$Edit6;?></option>
	<?

	while ($linha1 = mysql_fetch_array($resultado1))
	{
	       $nome_de_0  = $linha1["NOME"];
	       ?>
	       <option value="<?=$nome_de_0;?>"><?=$nome_de_0;?></option>
	       <?
	}
	
}else{
	?>
	<option value="Selecione">Selecione</option>
	<?
	while ($linha1 = mysql_fetch_array($resultado1))
	{
	       $nome_de_0  = $linha1["NOME"];
	       ?>
	       <option value="<?=$nome_de_0;?>"><?=$nome_de_0;?></option>
	       <?
	}
	
}
?>
</select>

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
		
<div id="Edit7_outer" style="Z-INDEX: 16; LEFT: 311px; WIDTH: 441px; POSITION: absolute; TOP: 263px; HEIGHT: 26px">
<select type="text" id="Edit7" name="Edit7" value="<?=$Edit7;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:441px;"   onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'"   onchange="Salva7(this.value)" style="text-transform: uppercase;" tabindex="7"    />

<?

if (!empty($Edit7)){
	
	?>
	<option value="<?=$Edit7;?>"><?=$Edit7;?></option>
	<?

	while ($linha2 = mysql_fetch_array($resultado2))
	{
	       $nome_de_2  = $linha2["procedimento"];
	       ?>
	       <option value="<?=$nome_de_2;?>"><?=$nome_de_2;?></option>
	       <?
	}
}else{
    ?>	
    <option value="Selecione">Selecione</option>
    <?
	while ($linha2 = mysql_fetch_array($resultado2))
	{
	       $nome_de_2  = $linha2["procedimento"];
	       ?>
	       <option value="<?=$nome_de_2;?>"><?=$nome_de_2;?></option>
	       <?
	}
}	
?>
</select>


</div>

<?
}
?>

<div id="Label71_outer" style="Z-INDEX: 35; LEFT: 390px; WIDTH: 544px; POSITION: absolute; TOP: 485px; HEIGHT: 80px">
<div id="Label71" style=" font-family: Verdana; font-size: 14px; color: #ff0000;font-weight: normal; height:24px;width:403px;"   ><b><?=$alerta_1;?></b></STRONG></div>
</div>

<div id="Label5_outer" style="Z-INDEX: 18; LEFT: 220px; WIDTH: 565px; POSITION: absolute; TOP: 320px; HEIGHT: 26px">

<?
$consulta5 = "SELECT * FROM saude WHERE matricula = '$Edit1' ORDER BY str_to_date( data, '%d/%m/%Y') DESC, id DESC";

$resultado5 = mysql_query($consulta5);

?>

<select name="listbox" size="5" style=" font-family: Verdana; font-size: 14px; width:565px; color: #696969;">

<?
while ($linha5 = mysql_fetch_array($resultado5))
{
       $matric_1  = $linha5["matricula"];
       $data_1    = $linha5["data"];
       $depend_1  = $linha5["dependente"];
       $denti_1   = $linha5["medico"];
       $proce_1   = $linha5["pecedimento"];
       $hora_1    = $linha5["hora"];
      
	   ?>
	   <option value=""><?=$data_1.'|'.$hora_1;?>|&nbsp;<?=$depend_1;?>|&nbsp;<?=$denti_1;?></option>
	   <?
}
?>
</select>

</div>

<div id="Label7_outer" style="Z-INDEX: 22; LEFT: 464px; WIDTH: 86px; POSITION: absolute; TOP: 194px; HEIGHT: 22px">
<div id="Label7" style=" font-family: Verdana; font-size: 14px; color: #000000;font-weight: normal; height:22px;width:86px;"   ><P><STRONG>Data Insc.</STRONG></P></div>
</div>
<div id="Edit8_outer" style="Z-INDEX: 23; LEFT: 550px; WIDTH: 100px; POSITION: absolute; TOP: 190px; HEIGHT: 26px">
<input type="text" id="Edit8" name="Edit8" value="<?=$Edit8;?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:100px; color: #696969;"  disabled  tabindex="8"    />
</div>
