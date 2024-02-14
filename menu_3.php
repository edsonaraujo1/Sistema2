<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/menu.js"></script>
<?php

include('config.php');

// Saldação ao usuario

$hora = date("H"); //Extrai apenas a hora
if ($hora >= 0 and $hora < 6) {
 $situa_1 = "Boa Madrugada";
 $sol_1   = "imagens/noite.bmp";
 } elseif ($hora >=6 and $hora <12) {
 $situa_1 = "Bom Dia";
 $sol_1   = "imagens/dia.bmp";
 } elseif ($hora >=12 and $hora <19) {
 $situa_1 = "Boa Tarde";
 $sol_1   = "imagens/dia.bmp";
 }else {
 $situa_1 = "Boa Noite";
 $sol_1   = "imagens/noite.bmp";
}


@session_start();
$nome3 = addslashes(strtoupper($_SESSION["nome_log"]));

setlocale(LC_TIME,"portuguese");

$dia_semana  = strftime("%A");
$dia_sem_mes = strftime("%B");

// Converte Dia da Semana Ingles Portugues
if (strftime("%A") == "Sunday")   { $dia_semana = "Domingo"; }
if (strftime("%A") == "Monday")   { $dia_semana = "Segunda-feira"; }
if (strftime("%A") == "Tuesday")  { $dia_semana = "Terça-feira"; }
if (strftime("%A") == "Wednesday"){ $dia_semana = "Quarta-feira"; }
if (strftime("%A") == "Thursday") { $dia_semana = "Quinta-feira"; }
if (strftime("%A") == "Friday")   { $dia_semana = "Sexta-feira"; }
if (strftime("%A") == "Saturday") { $dia_semana = "Sabado"; }

// Converte Meses do Ano Ingles Portugues
if (strftime("%B") == "January")   { $dia_sem_mes = "Janeiro"; }
if (strftime("%B") == "February")  { $dia_sem_mes = "Fevereiro"; }
if (strftime("%B") == "March")     { $dia_sem_mes = "Março"; }
if (strftime("%B") == "April")     { $dia_sem_mes = "Abril"; }
if (strftime("%B") == "May")       { $dia_sem_mes = "Maio"; }
if (strftime("%B") == "June")      { $dia_sem_mes = "Junho"; }
if (strftime("%B") == "July")      { $dia_sem_mes = "Julho"; }
if (strftime("%B") == "August")    { $dia_sem_mes = "Agosto"; }
if (strftime("%B") == "September") { $dia_sem_mes = "Setembro"; }
if (strftime("%B") == "October")   { $dia_sem_mes = "Outubro"; }
if (strftime("%B") == "November")  { $dia_sem_mes = "Novembro"; }
if (strftime("%B") == "December")  { $dia_sem_mes = "Dezembro"; }

$bomdia = $situa_1." Seja Bem vindo, ".$nome3." hoje e  ".$dia_semana. strftime(", %d de")." ".$dia_sem_mes.strftime("  de %Y"); 

?>
<style type=text/css>

body { background-image: url(<?php echo $logo_sis ?>);
       background-attachment: fixed }

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
    <td width="864"><table width="798" border="0" align="center" cellpadding="0" cellspacing="0">
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
</table>
    
 <body onload="menuDropDown(1);">
        	<div id="menu" align="left">

<table width="616" border="1" align="center" cellpadding="0" cellspacing="0">
<ul id="menu_dropdown" class="menubar">

<tr>
<td>

   <li class="submenu"><center><font face="arial" size="2"><b><a href="#">Cadastros</a></b></font></center>
      <ul class="menu">   
          <li class="item"><a href="edif/cadastro.php">Par&acirc;metros</a></li>
          <li class="item"><a href="#">Bancos</a></li>
          <li class="item"><a href="#">Plano de Contas</a></li>               
          <li class="item"><a href="#">Hist&oacute;ricos</a></li>                              
          <li class="item"><a href="#">Bens Patrimoniais</a></li>                                             
          <li class="item"><a href="#">Licita&ccedil;&otilde;es</a></li>                                                       
          <li class="item"><a href="#">Ve&iacute;culos</a></li>                                                       
      </ul>
  </li>
</td>
<td>
   <li class="submenu"><center><font face="arial" size="2"><b><a href="#">Cobrança</a></b></font></center>
      <ul class="menu">
        <li class="item"><a href="#">PPA</a></li>
        <li class="item"><a href="#">LDO</a></li>        
        <li class="item"><a href="#">LOA</a></li>
      </ul>
  </li>

</td>
<td>

   <li class="submenu"><center><font face="arial" size="2"><b><a href="#">Relatórios</a></b></font></center>
      <ul class="menu">
        <li class="item"><a href="#">Receita Or&ccedil;ament&aacute;ria</a></li>
        <li class="item"><a href="#">Receita Extra-Or&ccedil;ament&aacute;ria</a></li>        
        <li class="item"><a href="#">Lan&ccedil;amento da Receita</a></li>
        <li class="item"><a href="#">Receita Corrente L&iacute;quida</a></li>        
      </ul>
  </li>


</td>
<td>

   <li class="submenu"><center><font face="arial" size="2"><b><a href="#">Saúde</a></b></font></center>
      <ul class="menu">
        <li class="item"><a href="#">Despesa Orcament&aacute;ria</a></li>
        <li class="item"><a href="#">Dota&ccedil;&otilde;es Orçament&aacute;rias</a></li>        
        <li class="item"><a href="#">Despesa Extra-or&ccedil;ament&aacute;ria</a></li>        
        <li class="submenu"><a href="#">Empenhos</a>
           <ul class="menu">
               <li class="item"><a href="#">Ordinário</a></li>
               <li class="item"><a href="#">Global</a></li>
               <li class="item"><a href="#">Estimativa</a></li>               
               <li class="item"><a href="#">Refor&ccedil;o</a></li>                              
               <li class="item"><a href="#">Anula&ccedil;&atilde;o</a></li>                                             
           </ul>        
        </li>
        <li class="submenu"><center><font face="arial" size="2"><b><a href="#">Caixa</a></b></font></center>
           <ul class="menu">
               <li class="item"><a href="#">Suplementares</a></li>
               <li class="item"><a href="#">Especiais</a></li>
               <li class="item"><a href="#">Extraordin&aacute;rios</a></li>               
           </ul>                
        </li>        
      </ul>
  </li>

</td>

<td>

   <li class="submenu"><center><font face="arial" size="2"><b><a href="#">Caixa</a></b></font></center>
      <ul class="menu">
        <li class="item"><a href="#">Despesa Orcament&aacute;ria</a></li>
        <li class="item"><a href="#">Dota&ccedil;&otilde;es Orçament&aacute;rias</a></li>        
        <li class="item"><a href="#">Despesa Extra-or&ccedil;ament&aacute;ria</a></li>        
        <li class="submenu"><a href="#">Empenhos</a>
           <ul class="menu">
               <li class="item"><a href="#">Ordinário</a></li>
               <li class="item"><a href="#">Global</a></li>
               <li class="item"><a href="#">Estimativa</a></li>               
               <li class="item"><a href="#">Refor&ccedil;o</a></li>                              
               <li class="item"><a href="#">Anula&ccedil;&atilde;o</a></li>                                             
           </ul>        
        </li>
        <li class="submenu"><center><font face="arial" size="2"><b><a href="#">Caixa</a></b></font></center>
           <ul class="menu">
               <li class="item"><a href="#">Suplementares</a></li>
               <li class="item"><a href="#">Especiais</a></li>
               <li class="item"><a href="#">Extraordin&aacute;rios</a></li>               
           </ul>                
        </li>        
      </ul>
  </li>

</td>

<td>

   <li class="submenu"><center><font face="arial" size="2"><b><a href="#">Juridico</a></b></font></center></li>

</td>
<td>

  <li class="submenu"><center><font face="arial" size="2"><b><a href="#">Web Site</a></b></font></center>   
      <ul class="menu">
        <li class="item"><a href="Menu_JavaScript.zip">Menu Drop Down</a></li>
        <li class="item"><a href="Menu_JavaScript_Completo.zip">Página Menu Drop Down</a></li>
      </ul>
  </li>


</td>
<td>

  <li class="submenu"><center><font face="arial" size="2"><b><a href="#">Operador</a></b></font></center>
      <ul class="menu">
          <li class="item"><a href="menu_exemplo_01.html">Exemplo 01</a></li>
          <li class="item"><a href="menu_exemplo_02.html">Exemplo 02</a></li>
          <li class="item"><a href="menu_exemplo_03.html">Exemplo 03</a></li>
          <li class="item"><a href="index.html">Principal</a></li>
          <li class="item"><a href="menu.html">Menu Original</a></li>
      </ul>
  </li>


</td>
</tr>

</ul>
</table>
</div>
     
</body>

</html>
