<?php
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout Cadastro Socios Alterar Retorno
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

// include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include_once('../sql_injection.php');

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_ASOC");

if ($deixar_1 == "NAO"){
	
    echo "  <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			body { background-image: url('../$logo_sis');
                   background-attachment: fixed }
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			

			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** <font color = #FF0000> ERRO ACESSO NÃO PERMITIDO !!!</font> ***<br>
				                     
									 <font face=arial>Usuário sem Permissão</b>
			<table align=center>
			<form method='POST' action='../avaleht.php?servletjs2=20$$20'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>";
	        exit();
}	

$cami2 = '../imagens/fotos/Branco.bmp'; 

// Abre Conexão com o MySql
include("../conexao.php");
$link = @mysql_connect($host,$user,$pass);
@mysql_select_db($db);

$hostname_conn = $host;
$database_conn = $db;
$username_conn = $user;
$password_conn = $pass;

// Conectamos ao nosso servidor MySQL
if(!($conn = mysql_connect($hostname_conn,$username_conn,$password_conn))) 
{
   echo "Erro ao conectar ao MySQL.";
   exit;
}
// Selecionamos nossa base de dados MySQL
if(!($con = mysql_select_db($database_conn,$conn))) 
{
   echo "Erro ao selecionar ao MySQL.";
   exit;
}

$con = mysql_connect($hostname_conn,$username_conn,$password_conn);
$bd  = mysql_select_db($database_conn);


$query_Recordset1 = "SELECT descricao FROM sede_01";
$Recordset1 = @mysql_query($query_Recordset1, $conn); // or die(mysql_error());
$row_Recordset1 = @mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = @mysql_num_rows($Recordset1);



$nome3a = strtolower($nome3);
// Abre Tabela Tenporaria

$consulta0  = "SELECT * FROM $nome3a WHERE Nome1 = '$nome3a'";
	
$resultado0 = @mysql_query($consulta0);

$row0 = @mysql_fetch_array($resultado0);

$Edit1      = trim(strtoupper(retirar_caracx(@$row0["Edit1"])));
$Edit2		= trim(strtoupper(retirar_caracx(@$row0["Edit2"])));
$Edit3		= trim(strtoupper(retirar_caracx(@$row0["Edit3"])));
$Edit4		= trim(strtoupper(retirar_caracx(@$row0["Edit4"])));
$Edit5		= trim(strtoupper(retirar_caracx(@$row0["Edit5"])));
$Edit6		= trim(strtoupper(retirar_caracx(@$row0["Edit6"])));
$Edit7		= trim(strtoupper(retirar_caracx(@$row0["Edit7"])));
$Edit8		= trim(strtoupper(retirar_caracx(@$row0["Edit8"])));
$Edit9		= trim(strtoupper(retirar_caracx(@$row0["Edit9"])));
$Edit10	    = trim(strtoupper(retirar_caracx(@$row0["Edit10"])));
$Edit11	    = trim(strtoupper(retirar_caracx(@$row0["Edit11"])));
$Edit12	    = trim(strtoupper(retirar_caracx(@$row0["Edit12"])));
$Edit13	    = trim(strtoupper(retirar_caracx(@$row0["Edit13"])));
$Edit14	    = trim(strtoupper(retirar_caracx(@$row0["Edit14"])));
$Edit15	    = trim(strtoupper(retirar_caracx(@$row0["Edit15"])));
$Edit16	    = trim(strtoupper(retirar_caracx(@$row0["Edit16"])));
$Edit17	    = trim(strtoupper(retirar_caracx(@$row0["Edit17"])));
$Edit18	    = trim(strtoupper(retirar_caracx(@$row0["Edit18"])));
$Edit19	    = trim(strtoupper(retirar_caracx(@$row0["Edit19"])));
$Edit20	    = trim(strtoupper(retirar_caracx(@$row0["Edit20"])));
$Edit21	    = trim(strtoupper(retirar_caracx(@$row0["Edit21"])));
$Edit22	    = trim(strtoupper(retirar_caracx(@$row0["Edit22"])));
$Edit23	    = trim(strtoupper(retirar_caracx(@$row0["Edit23"])));
$Edit24	    = trim(strtoupper(retirar_caracx(@$row0["Edit24"])));
$Edit25	    = trim(strtoupper(retirar_caracx(@$row0["Edit25"])));
$Edit26	    = trim(strtoupper(retirar_caracx(@$row0["Edit26"])));
$Edit27	    = trim(strtoupper(retirar_caracx(@$row0["Edit27"])));
$Edit28	    = trim(strtoupper(retirar_caracx(@$row0["Edit28"])));
$Edit29	    = trim(strtoupper(retirar_caracx(@$row0["Edit29"])));
$Edit30	    = trim(strtoupper(retirar_caracx(@$row0["Edit30"])));
$Edit31     = trim(strtoupper(retirar_caracx(@$row0["Edit31"])));
$Edit32	    = trim(strtoupper(retirar_caracx(@$row0["Edit32"])));
$Edit33	    = trim(strtoupper(retirar_caracx(@$row0["Edit33"])));
$Edit34	    = trim(strtoupper(retirar_caracx(@$row0["Edit34"])));
$Edit35	    = trim(strtoupper(retirar_caracx(@$row0["Edit35"])));
$Edit36	    = trim(strtoupper(retirar_caracx(@$row0["Edit36"])));
$Edit37	    = trim(strtoupper(retirar_caracx(@$row0["Edit37"])));
$Edit38	    = trim(strtoupper(retirar_caracx(@$row0["Edit38"])));
$Edit39	    = trim(strtoupper(retirar_caracx(@$row0["Edit39"])));
$Edit40	    = trim(strtoupper(retirar_caracx(@$row0["Edit40"])));
$Edit41	    = trim(strtoupper(retirar_caracx(@$row0["Edit41"])));
$Edit42	    = trim(strtoupper(retirar_caracx(@$row0["Edit42"])));
$Edit43	    = trim(strtoupper(retirar_caracx(@$row0["Edit43"])));
$Edit44	    = trim(strtoupper(retirar_caracx(@$row0["Edit44"])));
$Edit45	    = trim(strtoupper(retirar_caracx(@$row0["Edit45"])));
$Edit46	    = trim(strtoupper(retirar_caracx(@$row0["Edit46"])));
$Edit47	    = trim(strtoupper(retirar_caracx(@$row0["Edit47"])));
$Edit48	    = trim(strtoupper(retirar_caracx(@$row0["Edit48"])));
$Edit49	    = trim(strtoupper(retirar_caracx(@$row0["Edit49"])));
$Edit50	    = trim(strtoupper(retirar_caracx(@$row0["Edit50"])));
$Edit51	    = trim(strtoupper(retirar_caracx(@$row0["Edit51"])));
$Edit52	    = trim(strtoupper(retirar_caracx(@$row0["Edit52"])));
$Edit53	    = trim(strtoupper(retirar_caracx(@$row0["Edit53"])));
$Edit54	    = trim(strtoupper(retirar_caracx(@$row0["Edit54"])));
$Edit55	    = trim(strtoupper(retirar_caracx(@$row0["Edit55"])));
$Edit56	    = trim(strtoupper(retirar_caracx(@$row0["Edit56"])));
$Edit57	    = trim(strtoupper(retirar_caracx(@$row0["Edit57"])));
$Edit58	    = trim(strtoupper(retirar_caracx(@$row0["Edit58"])));
$Edit59	    = trim(strtoupper(retirar_caracx(@$row0["Edit59"])));
$Edit60	    = trim(strtoupper(retirar_caracx(@$row0["Edit60"])));
$Edit61	    = trim(strtoupper(retirar_caracx(@$row0["Edit61"])));
$Edit62	    = trim(strtoupper(retirar_caracx(@$row0["Edit62"])));
$Edit63	    = trim(strtoupper(retirar_caracx(@$row0["Edit63"])));
$Edit64	    = trim(strtoupper(retirar_caracx(@$row0["Edit64"])));
$Edit65	    = trim(strtoupper(retirar_caracx(@$row0["Edit65"])));
$Edit66	    = trim(strtoupper(retirar_caracx(@$row0["Edit66"])));
$Edit67	    = trim(strtoupper(retirar_caracx(@$row0["Edit67"])));
$Edit68	    = trim(strtoupper(retirar_caracx(@$row0["Edit68"])));
$Edit69	    = trim(strtoupper(retirar_caracx(@$row0["Edit69"])));
$Edit70	    = trim(strtoupper(retirar_caracx(@$row0["memo1"])));
$Edit71	    = trim(strtoupper(retirar_caracx(@$row0["Edit71"])));
$Edit72	    = trim(strtoupper(retirar_caracx(@$row0["Edit72"])));
$alerta_1   = trim(strtoupper(retirar_caracx(@$row0["mensage1"])));
$categ_1    = trim(strtoupper(retirar_caracx(@$row0["mensage2"])));
$nome_do_edif = substr(trim(strtoupper(retirar_caracx(@$row0["mensage3"]))),0,47);
$nome_cad_si  = trim(strtoupper(retirar_caracx(@$row0["mensage4"])));
$id           = trim(strtoupper(retirar_caracx(@$row0["mensage6"])));

// Abrir tabela Senha

$tabela_1 = strtoupper('socios');

$consulta3 = "SELECT * FROM permissoes WHERE login = '". anti_sql_injection($nome3) ."' and tabela = '". anti_sql_injection($tabela_1) ."'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

$new_fot = Trim($Edit1).Trim($Edit2);

$consulta7 = "SELECT * FROM tb_segunda WHERE codp = '". anti_sql_injection($new_fot) ."'";
	
$resultado7 = @mysql_query($consulta7);

$row7 = @mysql_fetch_array($resultado7);

$id_9 	   = @$row7["cod_foto"];
$id_imagem = @$row7["id_imagem"];

if(!empty($id_imagem)){
$mostra_branco = "faz";	
}else{
$mostra_branco = "nao";	
	
}	


if (!empty($Edit1)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit2").focus();	
		}
		
		</script>
		
<div id="Edit1_outer" style="Z-INDEX: 6; LEFT: 225px; WIDTH: 56px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit1" name="Edit1" value="<?php echo $Edit1 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:56px;" onchange="Salva1(this.value)"  onFocus="nextfield ='Edit2';" tabindex="1" readonly="readonly"  maxlength="11"  />
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
		
<div id="Edit2_outer" style="Z-INDEX: 7; LEFT: 283px; WIDTH: 33px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit2" name="Edit2" value="<?php echo $Edit2 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:33px;" onchange="Salva2(this.value)"  onFocus="nextfield ='Edit3';" style="text-transform: uppercase;"   tabindex="2" maxlength="1"  />
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
		
<div id="Edit3_outer" style="Z-INDEX: 9; LEFT: 417px; WIDTH: 137px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit3" name="Edit3" value="<?php echo $Edit3 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px;" onfocus="this.className='anormal'; nextfield ='Edit4';" onblur="this.className='normal'" onchange="Salva3(this.value)"  tabindex="3" maxlength="14" />
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
		
<div id="Edit4_outer" style="Z-INDEX: 11; LEFT: 634px; WIDTH: 137px; POSITION: absolute; TOP: 151px; HEIGHT: 26px">
<input type="text" id="Edit4" name="Edit4" value="<?php echo $Edit4 ?>"  style=" font-family: Verdana; font-size: 14px;  height:25px;width:137px;" onfocus="this.className='anormal'; nextfield ='Edit5';" onblur="this.className='normal'"  onkeypress="return txtBoxFormat(document.Form1, 'Edit4', '999.999.999-99', event);"  onchange="Salva4(this.value)"    tabindex="4" maxlength="14"  />
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
		
<div id="Edit5_outer" style="Z-INDEX: 13; LEFT: 225px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit5" name="Edit5" value="<?php echo $Edit5 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onfocus="this.className='anormal'; nextfield ='Edit6';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit5', '99/99/9999', event);"  onchange="Salva5(this.value)"  tabindex="5"  maxlength="10" />
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
		
<div id="Edit6_outer" style="Z-INDEX: 15; LEFT: 417px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit6" name="Edit6" value="<?php echo $Edit6 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onfocus="this.className='anormal'; nextfield ='Edit7';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit6', '99/99/9999', event);" onchange="Salva6(this.value)"  style="text-transform: uppercase;"  tabindex="6"  maxlength="10"/>
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
		
<div id="Edit7_outer" style="Z-INDEX: 17; LEFT: 634px; WIDTH: 91px; POSITION: absolute; TOP: 175px; HEIGHT: 26px">
<input type="text" id="Edit7" name="Edit7" value="<?php echo $Edit7 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onfocus="this.className='anormal'; nextfield ='Edit8';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit7', '99/99/9999', event);" onchange="Salva7(this.value)"  style="text-transform: uppercase;"  tabindex="7"  maxlength="10" />
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
		
<div id="Edit8_outer" style="Z-INDEX: 20; LEFT: 225px; WIDTH: 159px; POSITION: absolute; TOP: 201px; HEIGHT: 26px">
<select id="Edit8" name="Edit8" value="<?php echo $Edit8 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:159px;" onfocus="this.className='anormal'; nextfield ='Edit9';" onblur="this.className='normal'" onchange="Salva8(this.value)" style="text-transform: uppercase;"  tabindex="8"  maxlength="20"/>

<?php

if (!empty($Edit8))
{
?>	
	<option value="<?php echo $Edit8 ?>"> <?php echo $Edit8 ?> </option>

<?php
Do {  
?>
      <option value="<?php echo $row_Recordset1['descricao']?>"><?php echo $row_Recordset1['descricao']?></option>
<?php
}
while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
      $rows = mysql_num_rows($Recordset1);
      if($rows > 0) {
         mysql_data_seek($Recordset1, 0);
	     $row_Recordset1 = mysql_fetch_assoc($Recordset1);
      }
?>
</select>

<?php	

}else{
	
?>	
            <option value=" ">  </option>

<?php
Do {  
?>
      <option value="<?php echo $row_Recordset1['descricao']?>"><?php echo $row_Recordset1['descricao']?></option>
<?php
}
while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
      $rows = mysql_num_rows($Recordset1);
      if($rows > 0) {
         mysql_data_seek($Recordset1, 0);
	     $row_Recordset1 = mysql_fetch_assoc($Recordset1);
      }
?>
</select>

<?php            
 }
?>

</select>

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
		
		
<div id="Edit9_outer" style="Z-INDEX: 22; LEFT: 225px; WIDTH: 28px; POSITION: absolute; TOP: 223px; HEIGHT: 26px">
<input type="text" id="Edit9" name="Edit9" value="<?php echo $Edit9 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:28px;"  onfocus="this.className='anormal'; nextfield ='Edit10';" onblur="this.className='normal'" onchange="Salva9(this.value)" style="text-transform: uppercase;"  tabindex="9"  maxlength="1"  />
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
		
<div id="Edit10_outer" style="Z-INDEX: 24; LEFT: 225px; WIDTH: 55px; POSITION: absolute; TOP: 247px; HEIGHT: 26px">
<input type="text" id="Edit10" name="Edit10" value="<?php echo $Edit10 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:55px;" onfocus="this.className='anormal'; nextfield ='Edit11';" onblur="this.className='normal'" onchange="Salva10(this.value)" onclick="Salva1x(this.value)" style="text-transform: uppercase;" tabindex="10" maxlength="11"    />
</div>
		
		<?php
}
if (!empty($Edit11)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit70").focus();	
		}
		
		</script>

<div id="Edit11_outer" style="Z-INDEX: 26; LEFT: 225px; WIDTH: 407px; POSITION: absolute; TOP: 271px; HEIGHT: 26px">
<input type="text" id="Edit11" name="Edit11" value="<?php echo $Edit11 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:407px;" onfocus="this.className='anormal'; nextfield ='Edit70';" onblur="this.className='normal'" onchange="Salva11(this.value)"  style="text-transform: uppercase;" tabindex="11"  maxlength="60"   />
</div>
		
		
		<?php
}
if (!empty($Edit71)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit12").focus();	
		}
		
		</script>
		
<div id="Edit70_outer" style="Z-INDEX: 152; LEFT: 696px; WIDTH: 41px; POSITION: absolute; TOP: 272px; HEIGHT: 26px">
<select type="text" id="Edit71" name="Edit71" value="<?php echo $Edit71 ?>" style=" font-family: Verdana; font-size: 14px;    height:25px;width:41px;"  onfocus="this.className='anormal'; nextfield ='Edit12';" onblur="this.className='normal'"onchange="Salva71(this.value)" style="text-transform: uppercase;" tabindex="12"    />

<?php

if (!empty($Edit71))
{
?>	
	<option value="<?php echo $Edit71 ?>"> <?php echo $Edit71 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
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
		
<div id="Edit12_outer" style="Z-INDEX: 28; LEFT: 225px; WIDTH: 127px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit12" name="Edit12" value="<?php echo $Edit12 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:127px;"  onfocus="this.className='anormal'; nextfield ='Edit13';" onblur="this.className='normal'" onchange="Salva12(this.value)"  style="text-transform: uppercase;" tabindex="13"  maxlength="20"   />
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
		
<div id="Edit13_outer" style="Z-INDEX: 29; LEFT: 352px; WIDTH: 385px; POSITION: absolute; TOP: 295px; HEIGHT: 26px">
<input type="text" id="Edit13" name="Edit13" value="<?php echo $Edit13 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:385px;" onfocus="this.className='anormal'; nextfield ='Edit14';" onblur="this.className='normal'" onchange="Salva13(this.value)" style="text-transform: uppercase;" tabindex="14"  maxlength="75"   />
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
		
<div id="Edit14_outer" style="Z-INDEX: 31; LEFT: 225px; WIDTH: 127px; POSITION: absolute; TOP: 319px; HEIGHT: 26px">
<input type="text" id="Edit14" name="Edit14" value="<?php echo $Edit14 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:127px;" onfocus="this.className='anormal'; nextfield ='Edit15';" onblur="this.className='normal'" onchange="Salva14(this.value)" style="text-transform: uppercase;"  tabindex="15"  maxlength="40"   />
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
		
<div id="Edit15_outer" style="Z-INDEX: 33; LEFT: 416px; WIDTH: 216px; POSITION: absolute; TOP: 319px; HEIGHT: 26px">
<input type="text" id="Edit15" name="Edit15" value="<?php echo $Edit15 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:216px;" onfocus="this.className='anormal'; nextfield ='Edit16';" onblur="this.className='normal'" onchange="Salva15(this.value)" style="text-transform: uppercase;" tabindex="16"  maxlength="35"   />
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
		
<div id="Edit16_outer" style="Z-INDEX: 35; LEFT: 225px; WIDTH: 83px; POSITION: absolute; TOP: 343px; HEIGHT: 26px">
<input type="text" id="Edit16" name="Edit16" value="<?php echo $Edit16 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:83px;" onfocus="this.className='anormal'; nextfield ='Edi17';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit16', '99999-999', event);" onchange="Salva16(this.value)"  style="text-transform: uppercase;" tabindex="17"  maxlength="9"   />
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
		
		
<div id="Edit17_outer" style="Z-INDEX: 37; LEFT: 416px; WIDTH: 216px; POSITION: absolute; TOP: 343px; HEIGHT: 26px">
<input type="text" id="Edit17" name="Edit17" value="<?php echo $Edit17 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:216px;" onfocus="this.className='anormal'; nextfield ='Edit18';" onblur="this.className='normal'"  onchange="Salva17(this.value)"   style="text-transform: uppercase;" tabindex="17"  maxlength="15"   />
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
		
<div id="Edit18_outer" style="Z-INDEX: 39; LEFT: 699px; WIDTH: 36px; POSITION: absolute; TOP: 345px; HEIGHT: 26px">
<select type="text" id="Edit18" name="Edit18" value="<?php echo $Edit18 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:46px;" onfocus="this.className='anormal'; nextfield ='Edit19';" onblur="this.className='normal'" onchange="Salva18(this.value)" style="text-transform: uppercase;" tabindex="18"  maxlength="2"   />

<?php

if (!empty($Edit18))
{
?>	
	<option value="<?php echo $Edit18 ?>"> <?php echo $Edit18 ?> </option>
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
if (!empty($Edit19)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit20").focus();	
		}
		
		</script>
		
<div id="Edit19_outer" style="Z-INDEX: 41; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 367px; HEIGHT: 26px">
<input type="text" id="Edit19" name="Edit19" value="<?php echo $Edit19 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;" onfocus="this.className='anormal'; nextfield ='Edit20';" onblur="this.className='normal'" onchange="Salva19(this.value)" style="text-transform: uppercase;" tabindex="19"  maxlength="25"   />
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
		
<div id="Edit20_outer" style="Z-INDEX: 43; LEFT: 416px; WIDTH: 116px; POSITION: absolute; TOP: 367px; HEIGHT: 26px">
<input type="text" id="Edit20" name="Edit20" value="<?php echo $Edit20 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:116px;" onfocus="this.className='anormal'; nextfield ='Edit21';" onblur="this.className='normal'" onchange="Salva20(this.value)" style="text-transform: uppercase;" tabindex="20"  maxlength="10"   />
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
		
<div id="Edit21_outer" style="Z-INDEX: 45; LEFT: 634px; WIDTH: 102px; POSITION: absolute; TOP: 367px; HEIGHT: 26px">
<input type="text" id="Edit21" name="Edit21" value="<?php echo $Edit21 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:102px;" onfocus="this.className='anormal'; nextfield ='Edit22';" onblur="this.className='normal'" onchange="Salva21(this.value)" style="text-transform: uppercase;" tabindex="21"  maxlength="5"   />
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
		
<div id="Edit22_outer" style="Z-INDEX: 47; LEFT: 815px; WIDTH: 42px; POSITION: absolute; TOP: 369px; HEIGHT: 26px">
<select type="text" id="Edit22" name="Edit22" value="<?php echo $Edit22 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:45px;" onfocus="this.className='anormal'; nextfield ='Edit23';" onblur="this.className='normal'" onchange="Salva22(this.value)" style="text-transform: uppercase;" tabindex="22"  maxlength="2"   />

<?php

if (!empty($Edit22))
{
?>	
	<option value="<?php echo $Edit22 ?>"> <?php echo $Edit22 ?> </option>
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
if (!empty($Edit23)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit24").focus();	
		}
		
		</script>
		
<div id="Edit23_outer" style="Z-INDEX: 49; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 391px; HEIGHT: 26px">
<input type="text" id="Edit23" name="Edit23" value="<?php echo $Edit23 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;" onfocus="this.className='anormal'; nextfield ='Edit24';" onblur="this.className='normal'" onchange="Salva23(this.value)" style="text-transform: uppercase;" tabindex="23"  maxlength="15"   />
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

<div id="Edit24_outer" style="Z-INDEX: 51; LEFT: 416px; WIDTH: 91px; POSITION: absolute; TOP: 391px; HEIGHT: 26px">
<input type="text" id="Edit24" name="Edit24" value="<?php echo $Edit24 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onfocus="this.className='anormal'; nextfield ='Edit24';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit24', '99/99/9999', event);" onchange="Salva24(this.value)"  style="text-transform: uppercase;" tabindex="24"  maxlength="10"   />
</div>
		
		<?php
}
if (!empty($Edit72)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit26").focus();	
		}
		
		</script>

<div id="Edit71_outer" style="Z-INDEX: 154; LEFT: 634px; WIDTH: 226px; POSITION: absolute; TOP: 394px; HEIGHT: 26px">
<select id="Edit72" name="Edit72" value="<?php echo $Edit72 ?>" style=" font-family: Verdana; font-size: 14px; height:25px;width:226px;" onfocus="this.className='anormal'; nextfield ='Edit25';" onblur="this.className='normal'" onchange="Salva72(this.value)" style="text-transform: uppercase;"  tabindex="25"    />

<?php

if (!empty($Edit72))
{
?>	
	<option value="<?php echo $Edit72 ?>"> <?php echo $Edit72 ?> </option>
            <option value=".">  </option>
            <option value="ENSINO FUNDAMENTAL"> ENSINO FUNDAMENTAL </option>
            <option value="FUNDAMENTAL INCOMPLETO"> FUNDAMENTAL INCOMPLETO</option>
            <option value="ENSINO MEDIO"> ENSINO MEDIO </option>
            <option value="MEDIO INCOMPLETO"> MEDIO INCOMPLETO </option>
            <option value="SUPERIOR"> SUPERIOR </option>
            <option value="SUPERIOR INCOMPLETO"> SUPERIOR INCOMPLETO </option>
            <option value="NAO ANALFABETIZADO"> NAO ANALFABETIZADO </option>

<?php	

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
<?php            
 }
?>

</select>
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
		
<div id="Edit25_outer" style="Z-INDEX: 52; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 416px; HEIGHT: 26px">
<input type="text" id="Edit25" name="Edit25" value="<?php echo $Edit25 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;" onfocus="this.className='anormal'; nextfield ='Edit26';" onblur="this.className='normal'" onchange="Salva25(this.value)" style="text-transform: uppercase;" tabindex="25"  maxlength="10"   />
</div>
		
		<?php
}
if (!empty($Edit26)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit29").focus();	
		}
		
		</script>
		
<div id="Edit26_outer" style="Z-INDEX: 54; LEFT: 416px; WIDTH: 34px; POSITION: absolute; TOP: 415px; HEIGHT: 26px">
<input type="text" id="Edit26" name="Edit26" value="<?php echo $Edit26 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px;" onfocus="this.className='anormal'; nextfield ='Edit29';" onblur="this.className='normal'" onchange="Salva26(this.value)" style="text-transform: uppercase;" tabindex="26"  maxlength="2"   />
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
		
<div id="Edit29_outer" style="Z-INDEX: 60; LEFT: 313px; WIDTH: 29px; POSITION: absolute; TOP: 441px; HEIGHT: 26px">
<input type="text" id="Edit29" name="Edit29" value="<?php echo $Edit29 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:29px;" onfocus="this.className='anormal'; nextfield ='Edit30';" onblur="this.className='normal'" onchange="Salva29(this.value)" style="text-transform: uppercase;" tabindex="29"  maxlength="1"   />
</div>
		
		<?php
}
if (!empty($Edit30)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit31").focus();	
		}
		
		</script>
		
<div id="Edit30_outer" style="Z-INDEX: 62; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 466px; HEIGHT: 26px">
<input type="text" id="Edit30" name="Edit30" value="<?php echo $Edit30 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;" onfocus="this.className='anormal'; nextfield ='Edit31';" onblur="this.className='normal'" onchange="Salva30(this.value)" style="text-transform: uppercase;" tabindex="30"  maxlength="14"   />
</div>
		
		<?php
}
if (!empty($Edit31)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit32").focus();	
		}
		
		</script>
		
<div id="Edit31_outer" style="Z-INDEX: 64; LEFT: 416px; WIDTH: 34px; POSITION: absolute; TOP: 466px; HEIGHT: 26px">
<input type="text" id="Edit31" name="Edit31" value="<?php echo $Edit31 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:34px;" onfocus="this.className='anormal'; nextfield ='Edit32';" onblur="this.className='normal'" onchange="Salva31(this.value)" style="text-transform: uppercase;" tabindex="31"  maxlength="4"   />
</div>
		
		<?php
}
if (!empty($Edit32)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit33").focus();	
		}
		
		</script>
		
<div id="Edit32_outer" style="Z-INDEX: 66; LEFT: 634px; WIDTH: 92px; POSITION: absolute; TOP: 463px; HEIGHT: 28px">
<input type="text" id="Edit32" name="Edit32" value="<?php echo $Edit32 ?>" style=" font-family: Verdana; font-size: 14px;  height:27px;width:92px;" onfocus="this.className='anormal'; nextfield ='Edit33';" onblur="this.className='normal'" onchange="Salva32(this.value)" style="text-transform: uppercase;" tabindex="32"  maxlength="14"   />
</div>
		
		<?php
}
if (!empty($Edit33)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit34").focus();	
		}
		
		</script>
		
<div id="Edit33_outer" style="Z-INDEX: 68; LEFT: 225px; WIDTH: 117px; POSITION: absolute; TOP: 491px; HEIGHT: 26px">
<input type="text" id="Edit33" name="Edit33" value="<?php echo $Edit33 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:117px;" onfocus="this.className='anormal'; nextfield ='Edit34';" onblur="this.className='normal'" onchange="Salva33(this.value)"  style="text-transform: uppercase;" tabindex="33"  maxlength="20"   />
</div>
		
		<?php
}
if (!empty($Edit34)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit35").focus();	
		}
		
		</script>
		
<div id="Edit34_outer" style="Z-INDEX: 70; LEFT: 416px; WIDTH: 91px; POSITION: absolute; TOP: 491px; HEIGHT: 26px">
<input type="text" id="Edit34" name="Edit34" value="<?php echo $Edit34 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onfocus="this.className='anormal'; nextfield ='Edit35';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit34', '99/99/9999', event);"  onchange="Salva34(this.value)"   style="text-transform: uppercase;" tabindex="34"  maxlength="10"   />
</div>
		
		<?php
}
if (!empty($Edit35)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit36").focus();	
		}
		
		</script>
		
<div id="Edit35_outer" style="Z-INDEX: 72; LEFT: 634px; WIDTH: 179px; POSITION: absolute; TOP: 490px; HEIGHT: 28px">
<input type="text" id="Edit35" name="Edit35" value="<?php echo $Edit35 ?>" style=" font-family: Verdana; font-size: 14px;  height:27px;width:179px;" onfocus="this.className='anormal'; nextfield ='Edit36';" onblur="this.className='normal'" onchange="Salva35(this.value)" style="text-transform: uppercase;" tabindex="35"  maxlength="10"   />
</div>
		
		<?php
}
if (!empty($Edit36)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit37").focus();	
		}
		
		</script>
		
<div id="Edit36_outer" style="Z-INDEX: 74; LEFT: 225px; WIDTH: 409px; POSITION: absolute; TOP: 516px; HEIGHT: 27px">
<input type="text" id="Edit36" name="Edit36" value="<?php echo $Edit36 ?>" style=" font-family: Verdana; font-size: 14px;  height:26px;width:409px;" onfocus="this.className='anormal'; nextfield ='Edit37';" onblur="this.className='normal'" onchange="Salva36(this.value)" style="text-transform: uppercase;" tabindex="36"  maxlength="45"   />
</div>
		
		<?php
}
if (!empty($Edit37)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit38").focus();	
		}
		
		</script>
		
<div id="Edit37_outer" style="Z-INDEX: 76; LEFT: 225px; WIDTH: 409px; POSITION: absolute; TOP: 541px; HEIGHT: 26px">
<input type="text" id="Edit37" name="Edit37" value="<?php echo $Edit37 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:409px;" onfocus="this.className='anormal'; nextfield ='Edit38';" onblur="this.className='normal'" onchange="Salva37(this.value)" style="text-transform: uppercase;" tabindex="37"  maxlength="45"   />
</div>
		
		<?php
}
if (!empty($Edit38)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit39").focus();	
		}
		
		</script>

<div id="Edit38_outer" style="Z-INDEX: 78; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 566px; HEIGHT: 26px">
<input type="text" id="Edit38" name="Edit38" value="<?php echo $Edit38 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onfocus="this.className='anormal'; nextfield ='Edit39';" onblur="this.className='normal'" onchange="Salva38(this.value)"  style="text-transform: uppercase;" tabindex="38"  maxlength="35"   />
</div>
		
		<?php
}
if (!empty($Edit39)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit40").focus();	
		}
		
		</script>
		
<div id="Edit39_outer" style="Z-INDEX: 80; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 566px; HEIGHT: 26px">
<input type="text" id="Edit39" name="Edit39" value="<?php echo $Edit39 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onfocus="this.className='anormal'; nextfield ='Edit40';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit39', '99/99/9999', event);" onchange="Salva39(this.value)"  style="text-transform: uppercase;" tabindex="39"  maxlength="10"   />
</div>
		
		<?php
}
if (!empty($Edit40)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit41").focus();	
		}
		
		</script>
		
<div id="Edit40_outer" style="Z-INDEX: 82; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 591px; HEIGHT: 26px">
<input type="text" id="Edit40" name="Edit40" value="<?php echo $Edit40 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onfocus="this.className='anormal'; nextfield ='Edit41';" onblur="this.className='normal'" onchange="Salva40(this.value)"  style="text-transform: uppercase;" tabindex="40"  maxlength="35"   />
</div>
		
		<?php
}
if (!empty($Edit41)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit42").focus();	
		}
		
		</script>
		
<div id="Edit41_outer" style="Z-INDEX: 84; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 591px; HEIGHT: 26px">
<input type="text" id="Edit41" name="Edit41" value="<?php echo $Edit41 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onfocus="this.className='anormal'; nextfield ='Edit42';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit41', '99/99/9999', event);"   onchange="Salva41(this.value)"  style="text-transform: uppercase;" tabindex="41"  maxlength="10"   />
</div>
		
		<?php
}
if (!empty($Edit42)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit43").focus();	
		}
		
		</script>
		
<div id="Edit42_outer" style="Z-INDEX: 86; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 594px; HEIGHT: 26px">
<select type="text" id="Edit42" name="Edit42" value="<?php echo $Edit42 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onfocus="this.className='anormal'; nextfield ='Edit43';" onblur="this.className='normal'" onchange="Salva42(this.value)" style="text-transform: uppercase;" tabindex="42"  maxlength="1"   />

<?php

if (!empty($Edit42))
{
?>	
	<option value="<?php echo $Edit42 ?>"> <?php echo $Edit42 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
		
		<?php
}
if (!empty($Edit43)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit44").focus();	
		}
		
		</script>
		
<div id="Edit43_outer" style="Z-INDEX: 88; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 616px; HEIGHT: 26px">
<input type="text" id="Edit43" name="Edit43" value="<?php echo $Edit43 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onfocus="this.className='anormal'; nextfield ='Edit44';" onblur="this.className='normal'" onchange="Salva43(this.value)" style="text-transform: uppercase;" tabindex="43"  maxlength="35"   />
</div>
		
		<?php
}
if (!empty($Edit44)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit45").focus();	
		}
		
		</script>
		
<div id="Edit44_outer" style="Z-INDEX: 90; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 616px; HEIGHT: 26px">
<input type="text" id="Edit44" name="Edit44" value="<?php echo $Edit44 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onfocus="this.className='anormal'; nextfield ='Edit45';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit44', '99/99/9999', event);"   onchange="Salva44(this.value)"   style="text-transform: uppercase;" tabindex="44"  maxlength="10"   />
</div>
		
		<?php
}
if (!empty($Edit45)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit46").focus();	
		}
		
		</script>
		
<div id="Edit45_outer" style="Z-INDEX: 92; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 619px; HEIGHT: 26px">
<select type="text" id="Edit45" name="Edit45" value="<?php echo $Edit45 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onfocus="this.className='anormal'; nextfield ='Edit46';" onblur="this.className='normal'" onchange="Salva45(this.value)"  style="text-transform: uppercase;" tabindex="45"  maxlength="1"   />

<?php

if (!empty($Edit45))
{
?>	
	<option value="<?php echo $Edit45 ?>"> <?php echo $Edit45 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
		
		<?php
}
if (!empty($Edit46)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit47").focus();	
		}
		
		</script>
		
<div id="Edit46_outer" style="Z-INDEX: 126; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 641px; HEIGHT: 26px">
<input type="text" id="Edit46" name="Edit46" value="<?php echo $Edit46 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onfocus="this.className='anormal'; nextfield ='Edit47';" onblur="this.className='normal'" onchange="Salva46(this.value)" style="text-transform: uppercase;" tabindex="46" maxlength="35"    />
</div>
		
		<?php
}
if (!empty($Edit47)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit48").focus();	
		}
		
		</script>
		
<div id="Edit47_outer" style="Z-INDEX: 127; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 641px; HEIGHT: 26px">
<input type="text" id="Edit47" name="Edit47" value="<?php echo $Edit47 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onfocus="this.className='anormal'; nextfield ='Edit48';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit47', '99/99/9999', event);"  onchange="Salva47(this.value)"  style="text-transform: uppercase;" tabindex="47"  maxlength="10"   />
</div>
		
		<?php
}
if (!empty($Edit48)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit49").focus();	
		}
		
		</script>
		
<div id="Edit48_outer" style="Z-INDEX: 128; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 644px; HEIGHT: 26px">
<select type="text" id="Edit48" name="Edit48" value="<?php echo $Edit48 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onfocus="this.className='anormal'; nextfield ='Edit49';" onblur="this.className='normal'" onchange="Salva48(this.value)" style="text-transform: uppercase;" tabindex="48"  maxlength="1"   />

<?php

if (!empty($Edit48))
{
?>	
	<option value="<?php echo $Edit48 ?>"> <?php echo $Edit48 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
		
		<?php
}
if (!empty($Edit49)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit50").focus();	
		}
		
		</script>
		
<div id="Edit49_outer" style="Z-INDEX: 129; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 666px; HEIGHT: 26px">
<input type="text" id="Edit49" name="Edit49" value="<?php echo $Edit49 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onfocus="this.className='anormal'; nextfield ='Edit50';" onblur="this.className='normal'" onchange="Salva49(this.value)" style="text-transform: uppercase;" tabindex="49"  maxlength="35"   />
</div>
		
		<?php
}
if (!empty($Edit50)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit51").focus();	
		}
		
		</script>
		
<div id="Edit50_outer" style="Z-INDEX: 130; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 666px; HEIGHT: 26px">
<input type="text" id="Edit50" name="Edit50" value="<?php echo $Edit50 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onfocus="this.className='anormal'; nextfield ='Edit51';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit50', '99/99/9999', event);"   onchange="Salva50(this.value)"   style="text-transform: uppercase;" tabindex="50"  maxlength="10"   />
</div>
		
		<?php
}
if (!empty($Edit51)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit52").focus();	
		}
		
		</script>
		
<div id="Edit51_outer" style="Z-INDEX: 131; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 669px; HEIGHT: 26px">
<select type="text" id="Edit51" name="Edit51" value="<?php echo $Edit51 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onfocus="this.className='anormal'; nextfield ='Edit52';" onblur="this.className='normal'" onchange="Salva51(this.value)"  style="text-transform: uppercase;" tabindex="51" maxlength="1"    />

<?php

if (!empty($Edit51))
{
?>	
	<option value="<?php echo $Edit51 ?>"> <?php echo $Edit51 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
		
		<?php
}
if (!empty($Edit52)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit53").focus();	
		}
		
		</script>
		
<div id="Edit52_outer" style="Z-INDEX: 132; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 691px; HEIGHT: 26px">
<input type="text" id="Edit52" name="Edit52" value="<?php echo $Edit52 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onfocus="this.className='anormal'; nextfield ='Edit53';" onblur="this.className='normal'" onchange="Salva52(this.value)"  style="text-transform: uppercase;" tabindex="52"  maxlength="35"   />
</div>
		
		<?php
}
if (!empty($Edit53)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit54").focus();	
		}
		
		</script>
		
<div id="Edit53_outer" style="Z-INDEX: 133; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 691px; HEIGHT: 26px">
<input type="text" id="Edit53" name="Edit53" value="<?php echo $Edit53 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onfocus="this.className='anormal'; nextfield ='Edit54';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit53', '99/99/9999', event);"   onchange="Salva53(this.value)"  style="text-transform: uppercase;" tabindex="53"  maxlength="10"   />
</div>
		
		<?php
}
if (!empty($Edit54)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit55").focus();	
		}
		
		</script>
		
<div id="Edit54_outer" style="Z-INDEX: 134; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 694px; HEIGHT: 26px">
<select type="text" id="Edit54" name="Edit54" value="<?php echo $Edit54 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onfocus="this.className='anormal'; nextfield ='Edit55';" onblur="this.className='normal'" onchange="Salva54(this.value)"  style="text-transform: uppercase;" tabindex="54"  maxlength="1"   />

<?php

if (!empty($Edit54))
{
?>	
	<option value="<?php echo $Edit54 ?>"> <?php echo $Edit54 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
		
		<?php
}
if (!empty($Edit55)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit56").focus();	
		}
		
		</script>

<div id="Edit55_outer" style="Z-INDEX: 135; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 716px; HEIGHT: 26px">
<input type="text" id="Edit55" name="Edit55" value="<?php echo $Edit55 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onfocus="this.className='anormal'; nextfield ='Edit56';" onblur="this.className='normal'" onchange="Salva55(this.value)" style="text-transform: uppercase;" tabindex="55"  maxlength="35"   />
</div>
		
		<?php
}
if (!empty($Edit56)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit57").focus();	
		}
		
		</script>
		
<div id="Edit56_outer" style="Z-INDEX: 136; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 716px; HEIGHT: 26px">
<input type="text" id="Edit56" name="Edit56" value="<?php echo $Edit56 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onfocus="this.className='anormal'; nextfield ='Edit57';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit56', '99/99/9999', event);"   onchange="Salva56(this.value)"   style="text-transform: uppercase;" tabindex="56"  maxlength="10"   />
</div>
		
		<?php
}
if (!empty($Edit57)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit58").focus();	
		}
		
		</script>
		
<div id="Edit57_outer" style="Z-INDEX: 137; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 719px; HEIGHT: 26px">
<select type="text" id="Edit57" name="Edit57" value="<?php echo $Edit57 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onfocus="this.className='anormal'; nextfield ='Edit58';" onblur="this.className='normal'" onchange="Salva57(this.value)"  style="text-transform: uppercase;" tabindex="57"  maxlength="1"   />

<?php

if (!empty($Edit57))
{
?>	
	<option value="<?php echo $Edit57 ?>"> <?php echo $Edit57 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
		
		<?php
}
if (!empty($Edit58)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit59").focus();	
		}
		
		</script>
		
<div id="Edit58_outer" style="Z-INDEX: 138; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 741px; HEIGHT: 26px">
<input type="text" id="Edit58" name="Edit58" value="<?php echo $Edit58 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onfocus="this.className='anormal'; nextfield ='Edit59';" onblur="this.className='normal'" onchange="Salva58(this.value)"  style="text-transform: uppercase;" tabindex="58"  maxlength="35"   />
</div>
		
		<?php
}
if (!empty($Edit59)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit60").focus();	
		}
		
		</script>
		
<div id="Edit59_outer" style="Z-INDEX: 139; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 741px; HEIGHT: 26px">
<input type="text" id="Edit59" name="Edit59" value="<?php echo $Edit59 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onfocus="this.className='anormal'; nextfield ='Edit60';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit59', '99/99/9999', event);"  onchange="Salva59(this.value)" style="text-transform: uppercase;" tabindex="59"  maxlength="10"   />
</div>
		
		<?php
}
if (!empty($Edit60)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit61").focus();	
		}
		
		</script>
		
<div id="Edit60_outer" style="Z-INDEX: 140; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 744px; HEIGHT: 26px">
<select type="text" id="Edit60" name="Edit60" value="<?php echo $Edit60 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onfocus="this.className='anormal'; nextfield ='Edit61';" onblur="this.className='normal'" onchange="Salva60(this.value)" style="text-transform: uppercase;" tabindex="60"  maxlength="1"   />

<?php

if (!empty($Edit60))
{
?>	
	<option value="<?php echo $Edit60 ?>"> <?php echo $Edit60 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
		
		<?php
}
if (!empty($Edit61)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit62").focus();	
		}
		
		</script>
		
<div id="Edit61_outer" style="Z-INDEX: 141; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 766px; HEIGHT: 26px">
<input type="text" id="Edit61" name="Edit61" value="<?php echo $Edit61 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onfocus="this.className='anormal'; nextfield ='Edit62';" onblur="this.className='normal'" onchange="Salva61(this.value)"  style="text-transform: uppercase;" tabindex="61"  maxlength="35"   />
</div>
		
		<?php
}
if (!empty($Edit62)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit63").focus();	
		}
		
		</script>
		
<div id="Edit62_outer" style="Z-INDEX: 142; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 766px; HEIGHT: 26px">
<input type="text" id="Edit62" name="Edit62" value="<?php echo $Edit62 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onfocus="this.className='anormal'; nextfield ='Edit63';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit62', '99/99/9999', event);"  onchange="Salva62(this.value)"   style="text-transform: uppercase;" tabindex="62"  maxlength="10"   />
</div>
		
		<?php
}
if (!empty($Edit63)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit64").focus();	
		}
		
		</script>
		
<div id="Edit63_outer" style="Z-INDEX: 143; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 769px; HEIGHT: 26px">
<select type="text" id="Edit63" name="Edit63" value="<?php echo $Edit63 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onfocus="this.className='anormal'; nextfield ='Edit64';" onblur="this.className='normal'" onchange="Salva63(this.value)"  style="text-transform: uppercase;" tabindex="63"  maxlength="1"   />

<?php

if (!empty($Edit63))
{
?>	
	<option value="<?php echo $Edit63 ?>"> <?php echo $Edit63 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
		
		<?php
}
if (!empty($Edit64)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit65").focus();	
		}
		
		</script>

<div id="Edit64_outer" style="Z-INDEX: 144; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 791px; HEIGHT: 26px">
<input type="text" id="Edit64" name="Edit64" value="<?php echo $Edit64 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onfocus="this.className='anormal'; nextfield ='Edit65';" onblur="this.className='normal'" onchange="Salva64(this.value)" style="text-transform: uppercase;" tabindex="64"  maxlength="35"   />
</div>
		
		<?php
}
if (!empty($Edit65)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit66").focus();	
		}
		
		</script>

<div id="Edit65_outer" style="Z-INDEX: 145; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 791px; HEIGHT: 26px">
<input type="text" id="Edit65" name="Edit65" value="<?php echo $Edit65 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onfocus="this.className='anormal'; nextfield ='Edit66';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit65', '99/99/9999', event);"   onchange="Salva65(this.value)"   style="text-transform: uppercase;" tabindex="65"  maxlength="10"   />
</div>
		
		<?php
}
if (!empty($Edit66)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit67").focus();	
		}
		
		</script>
		
<div id="Edit66_outer" style="Z-INDEX: 146; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 794px; HEIGHT: 26px">
<select type="text" id="Edit66" name="Edit66" value="<?php echo $Edit66 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onfocus="this.className='anormal'; nextfield ='Edit67';" onblur="this.className='normal'" onchange="Salva66(this.value)"  style="text-transform: uppercase;" tabindex="66"  maxlength="1"   />

<?php

if (!empty($Edit66))
{
?>	
	<option value="<?php echo $Edit66 ?>"> <?php echo $Edit66 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
		
		<?php
}
if (!empty($Edit67)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit68").focus();	
		}
		
		</script>

<div id="Edit67_outer" style="Z-INDEX: 147; LEFT: 225px; WIDTH: 329px; POSITION: absolute; TOP: 816px; HEIGHT: 26px">
<input type="text" id="Edit67" name="Edit67" value="<?php echo $Edit67 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:329px;" onfocus="this.className='anormal'; nextfield ='Edit68';" onblur="this.className='normal'" onchange="Salva67(this.value)" style="text-transform: uppercase;" tabindex="67"  maxlength="35"   />
</div>
		
		<?php
}
if (!empty($Edit68)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit69").focus();	
		}
		
		</script>
		
<div id="Edit68_outer" style="Z-INDEX: 148; LEFT: 633px; WIDTH: 91px; POSITION: absolute; TOP: 816px; HEIGHT: 26px">
<input type="text" id="Edit68" name="Edit68" value="<?php echo $Edit68 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:91px;" onfocus="this.className='anormal'; nextfield ='Edit69';" onblur="this.className='normal'" onkeypress="return txtBoxFormat(document.Form1, 'Edit68', '99/99/9999', event);"   onchange="Salva68(this.value)"   style="text-transform: uppercase;" tabindex="68"  maxlength="10"   />
</div>
		
		<?php
}
if (!empty($Edit69)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("Edit70").focus();	
		}
		
		</script>

<div id="Edit69_outer" style="Z-INDEX: 149; LEFT: 815px; WIDTH: 41px; POSITION: absolute; TOP: 819px; HEIGHT: 26px">
<select type="text" id="Edit69" name="Edit69" value="<?php echo $Edit69 ?>" style=" font-family: Verdana; font-size: 14px;  height:25px;width:41px;" onfocus="this.className='anormal'; nextfield ='Edit70';" onblur="this.className='normal'" onchange="Salva69(this.value)" style="text-transform: uppercase;" tabindex="69"  maxlength="1"   />

<?php

if (!empty($Edit69))
{
?>	
	<option value="<?php echo $Edit69 ?>"> <?php echo $Edit69 ?> </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>

<?php	

}else{
	
?>	
            <option value=" ">  </option>
            <option value=".">  </option>
            <option value="M"> M </option>
            <option value="F"> F </option>
<?php            
 }
?>

</select>

</div>
		
		<?php
}
if (!empty($Edit70)){
        ?>	
        <script language="JavaScript">
        function foco(){
		document.getElementById("guias").focus();	
		}
		
		</script>
		
<div id="Memo1_outer" style="Z-INDEX: 120; LEFT: 225px; WIDTH: 501px; POSITION: absolute; TOP: 842px; HEIGHT: 78px">
<textarea id="Edit70" name="Edit70" style=" font-family: Verdana; font-size: 14px;  height:77px;width:501px;" onfocus="this.className='anormal'; nextfield ='done';" onblur="this.className='normal'" onchange="Salva70(this.value)"  style="text-transform: uppercase;" tabindex="70"    wrap="virtual"><?php echo $Edit70 ?></textarea>
</div>
		
		<?php
}

?>

<div id="Label71_outer" style="Z-INDEX: 150; LEFT: 387px; WIDTH: 359px; POSITION: absolute; TOP: 203px; HEIGHT: 20px">
<div id="Label71" style=" font-family: Verdana; font-size: 14px; color: #0000FF;font-weight: normal; height:20px;width:359px;"   ><STRONG><FONT color=#ff0000><?php echo $alerta_1 ?></FONT></STRONG>&nbsp;</div>
</div>

<div id="Label73_outer" style="Z-INDEX: 124; LEFT: 257px; WIDTH: 462px; POSITION: absolute; TOP: 227px; HEIGHT: 20px">
<div id="Label73" style=" font-family: Verdana; font-size: 14px; color: #4682B4;font-weight: normal; height:20px;width:462px;"   ><STRONG><?php echo $categ_1 ?></STRONG>&nbsp;</div>
</div>

<div id="Label72_outer" style="Z-INDEX: 123; LEFT: 305px; WIDTH: 442px; POSITION: absolute; TOP: 249px; HEIGHT: 20px">
<div id="Label72" style=" font-family: Verdana; font-size: 14px; color: #0000FF;font-weight: normal; height:20px;width:442px;"   ><strong><?php echo $nome_do_edif ?></strong>&nbsp;</div>
</div>

<div id="Label74_outer" style="Z-INDEX: 125; LEFT: 345px; WIDTH: 511px; POSITION: absolute; TOP: 445px; HEIGHT: 20px">
<div id="Label74" style=" font-family: Verdana; font-size: 14px; color: #4682B4;font-weight: normal; height:20px;width:511px;"   ><STRONG><?php echo $nome_cad_si ?></STRONG>&nbsp;</div>
</div>


<?php
if ($mostra_branco == "sim"){
?>

<div id="Image1_outer" style="Z-INDEX: 18; LEFT: 749px; WIDTH: 112px; POSITION: absolute; TOP: 179px; HEIGHT: 146px">
<div id="Image1_container" style=" width: 112;  height: 146; overflow: hidden;" ><img id="Image1" src="ver.php?new_fot=<?php echo $new_fot ?>"  width="107"  height="137"  border="1"  style=" border-color: #000000 "   /></div>
</div>

<?php
}else{
?>

<div id="Image1_outer" style="Z-INDEX: 18; LEFT: 749px; WIDTH: 112px; POSITION: absolute; TOP: 179px; HEIGHT: 146px">
<div id="Image1_container" style=" width: 112;  height: 146; overflow: hidden;" ><img id="Image1" src="<?php echo $cami2 ?>"  width="107"  height="137"  border="1"  style=" border-color: #000000 "   /></div>
</div>


<?php
}

/*
 --------------------------------
 Funcao para Retirar os caracter
 estranhos e acentos na hora de
 atualizar Table 
---------------------------------
*/

Function retirar_caracx($var){

$var = ereg_replace("[ÁÀÂÃ]",        "A",$var);
$var = ereg_replace("[áàâãª]",       "a",$var);
$var = ereg_replace("[ÉÈÊ]",         "E",$var);
$var = ereg_replace("[éèê]",         "e",$var);
$var = ereg_replace("[ÓÒÔÕ]",        "O",$var);
$var = ereg_replace("[óòôõº]",       "o",$var);
$var = ereg_replace("[ÚÙÛ]",         "U",$var);
$var = ereg_replace("[úùû]",         "u",$var);
$var = ereg_replace("[?*#'´`!$%¨]",  " ",$var);
$var = str_replace("Ç",              "C",$var);
$var = str_replace("ç",              "c",$var);
$var = str_replace("\\",             " ",$var);
$var = str_replace(" or ",           " ",$var);
$var = str_replace("select ",        " ",$var);
$var = str_replace("delete ",        " ",$var);
$var = str_replace("create ",        " ",$var);
$var = str_replace("drop ",          " ",$var);
$var = str_replace("update ",        " ",$var);
$var = str_replace("drop table",     " ",$var);
$var = str_replace("show table",     " ",$var);
$var = str_replace("applet",         " ",$var);
$var = str_replace("objetc",         " ",$var);
$var = str_replace("where",          " ",$var);

return($var);
}


?>
