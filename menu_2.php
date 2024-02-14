<?php
/*
 -----------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Index do Sistema
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 -----------------------------------------
*/

// Resgata a Sessao
@session_start();

$website	= $_SESSION['website'];
$cpfwebsite = $_SESSION['cpfwebsite'];
$atuali_za  = $_SESSION['atuali_za'];
$criado_za  = $_SESSION['criado_za'];
$logo_sis   = $_SESSION['logo_sis'];
$Titulo     = $_SESSION['Titulo'];
$cnpj_sis   = $_SESSION['cnpj_sis'];
$logo1_sis  = $_SESSION['logo1_sis'];
$logo2_sis  = $_SESSION['logo2_sis'];
$color_bor  = $_SESSION['color_bor'];
$versao_1   = $_SESSION['versao_1'];
$color_menu = $_SESSION['color_menu'];

$_SESSION["servletjs2"] = '20$$20';

// Resgata a Sessao
@session_start();
unset ($_SESSION['Edit1']);
unset ($_SESSION['Edit2']);
unset ($_SESSION['Edit3']);
unset ($_SESSION['Edit4']);
unset ($_SESSION['Edit5']);
unset ($_SESSION['Edit6']);
unset ($_SESSION['Edit7']);
unset ($_SESSION['Edit8']);
unset ($_SESSION['Edit9']);
unset ($_SESSION['Edit10']);
unset ($_SESSION['Edit11']);
unset ($_SESSION['Edit12']);
unset ($_SESSION['Edit13']);
unset ($_SESSION['Edit14']);
unset ($_SESSION['Edit15']);
unset ($_SESSION['Edit16']);
unset ($_SESSION['nurecno']);
unset ($_SESSION['Codigo_ed']);
unset ($_SESSION['Nome_ed']);
unset ($_SESSION['cnpj']);
unset ($_SESSION['comp_nome']);
unset ($_SESSION['nome_1']);
unset ($_SESSION['comp_end']);
unset ($_SESSION['endereco_1']); 
unset ($_SESSION['numero_1']); 
unset ($_SESSION['cep_1']);
unset ($_SESSION['bairro_1']);
unset ($_SESSION['cidade_1']);
unset ($_SESSION['uf_1']);
unset ($_SESSION['Procura']);
unset ($_SESSION['Opcao']);

unset ($_SESSION['Edit1e']);
unset ($_SESSION['Edit2e']);
unset ($_SESSION['Edit3e']);
unset ($_SESSION['Edit4e']);
unset ($_SESSION['Edit5e']);
unset ($_SESSION['Edit6e']);
unset ($_SESSION['Edit7e']);
unset ($_SESSION['navega']);
unset ($_SESSION['empr']);
$_SESSION['empr'] = 0;
unset ($_SESSION['cod_incl']);
 
$path = strtoupper($_SESSION['Path1']);

$nome3 = addslashes($_SESSION["nome_log"]);

include ("funcoes2.php");

// $color_menu
?>

<script language="JavaScript">

function janelaSecundaria(){ 
   window.open("calc.php", "nome", "width=260,height=390,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

function janelaCronos(){ 
   window.open("tempo_x2.php", "nome", "width=388,height=205,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

function janelabatpapo(){ 
   window.open("batepapo/batepapo.php", "nome", "width=750,height=405,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

function Download()
{
	
	<?php
	$deixar_1 = acesso("RECEB_CAIXA");

       if ($deixar_1 != "SIM"){
       	   ?>
       	   
	         alert("Usuário não Permitido");
       	   
       	   <?php
            
	   }else{

           ?>

	       window.location = "modulo/caixa.exe";

           <?php		
		
	   }
	 ?>
	     
}

function Download1()
{
	
	<?php
	$deixar_1 = acesso("RECEITA_CAIX");

       if ($deixar_1 != "SIM"){
       	   ?>
       	   
	         alert("Usuário não Permitido");
       	   
       	   <?php
            
	   }else{

           ?>
	
	        window.location = "modulo/receita.exe";     
	
           <?php		
		
	   }
	 ?>
}

</script>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"></meta>
<link type="text/css" rel="stylesheet" href="menu.css"/>
<style type="text/css" media="screen"> 
</style>
</head>

<body style=" margin-left: 0px;  margin-top: 3px;  margin-right: 0px;  margin-bottom: 0px; ">
<!-- start menu HTML -->

<div align="center" >


<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50"><table width="125" border="0" cellspacing="0">
      <tr>
        <td width="50"><div align="center"><font color="#669999" size="2" face="Times New Roman, Times, serif">
        
		<iframe src="info/user.php" width="130" height="22" scrolling="no" frameborder="0" align="left"></iframe>
		
		</font></div></td>
      </tr>
      <tr>
        <td></div></td>
      </tr>
    </table></td>
    <td width="864"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><div align="center"><img src="<?php echo $sol_1 ?>" width="17" height="17"><img src="imagens/px1.gif" width="10" height="10"><font face="Arial"><i><b><?php echo $bomdia ?></b></i></font></div></td>
        <td><img src="imagens/px1.gif" width="80" height="10" border="0"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><div align="center">
	
	<iframe src="info/informes2.php" width="1" height="1" scrolling="no" frameborder="0" align="left"></iframe>

	</div></td>
    <td><div align="center">
	
	
	<table border="0" cellpadding="1" cellspacing="0" >

<tr>

<!-- Inicio menu -->
<td align="left"><div id="menu"><ul> 
<?php
include('cadastro.php');  
?>
</ul></div></td>
<!-- Fim menu -->

<!-- Inicio menu -->
<td align="left"><div id="menu"><ul> 
<?php
include('cobranca.php');  
?>
</ul></div></td>
<!-- Fim menu -->

<!-- Inicio menu -->
<td align="left"><div id="menu"><ul> 
<?php
include('relatorios.php');  
?>
</ul></div></td>
<!-- Fim menu -->

<!-- Inicio menu -->
<td align="left"><div id="menu"><ul> 
<?php
include('saude.php');  
?>
</ul></div></td>
<!-- Fim menu -->

<!-- Inicio menu -->
<td align="left"><div id="menu"><ul> 
<?php
include('caixa.php');  
?>
</ul></div></td>
<!-- Fim menu -->

<!-- Inicio menu -->
<td align="left"><div id="menu"><ul> 
<?php
include('juridico.php');  
?>
</ul></div></td>
<!-- Fim menu -->

<!-- Inicio menu -->
<td align="left"><div id="menu"><ul> 
<?php
include('website.php');  
?>
</ul></div></td>
<!-- Fim menu -->

<!-- Inicio menu -->
<td align="left"><div id="menu"><ul> 
<?php
include('operador.php');  
?>
</ul></div></td>
<!-- Fim menu -->

</td>

<td><img src="imagens/px1.gif" width="103" height="10"></td>

</tr>
</table>

	
	
	
	</div></td>
  </tr>
</table>


</div> 
</body>
</html>
