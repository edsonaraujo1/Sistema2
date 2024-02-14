<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Tela de Help
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Funcao Verifica Versao do Browse
$browser_cliet = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT']:"";

if(strpos($browser_cliet, 'Opera')!== false) { $browser = 'Opera';
}elseif(strpos($browser_cliet, 'Gecko')!== false) { $browser = 'Firefox';
}elseif(strpos($browser_cliet, 'MSIE')!== false) { $browser = 'MS Internet Explorer';
}elseif(strpos($browser_cliet, 'Lynx')!== false) { $browser = 'Lynx';
}elseif(strpos($browser_cliet, 'WebTV')!== false) { $browser = 'WebTV';
}elseif(strpos($browser_cliet, 'Konqueror')!== false) { $browser = 'Konqueror';
}elseif(strpos($browser_cliet, 'Google')!== false) { $browser = 'Robôs de Busca';
}else $browser = " Desconhecido"; 

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

unset ($_SESSION['Faz_uma']);

$nome3 = strtoupper($_SESSION["nome_log"]);


// Saldação ao usuario

$hora = date("H"); //Extrai apenas a hora
if ($hora >= 0 and $hora < 6) {
 $situa_1 = "Boa Madrugada";
 $sol_1   = "../imagens/noite.bmp";
 } elseif ($hora >=6 and $hora <12) {
 $situa_1 = "Bom Dia";
 $sol_1   = "../imagens/dia.bmp";
 } elseif ($hora >=12 and $hora <19) {
 $situa_1 = "Boa Tarde";
 $sol_1   = "../imagens/dia.bmp";
 }else {
 $situa_1 = "Boa Noite";
 $sol_1   = "../imagens/noite.bmp";
}
?>
 
<?
if ($browser == " MS Internet Explorer"){
?>

<style type=text/css>

								/* cria a div pop-up*/
#popup{
position: relative; 			/*Define a posição absoluta da pop-up*/
top: 0%; 						/*Distancia da margem superior da página */
left: 0%; 						/*Distancia da margem esquerda da página */
width: 400px; 					/*Largura da pop-up*/
height: 100px; 					/*Altura da pop-up*/
padding: 20px 20px 20px 20px; 	/*Margem interna da pop-up*/
border-width: 17px; 			/*Largura da borda da pop-up*/
border-style: solid; 			/*Estilo da borda da pop-up*/
border-color: <?=$color_bor;?>;          /*Cor da Borda*/
background: #FFF8DC; 				/*Cor de fundo da pop-up*/
color: #000066; 				/*Cor do texto da pop-up*/
display: none; 					/* Estilo da pop-up*/
								/*fim pop-up*/
}


#topo {
width:45px;
height:40px;
border: 0px;
margin:16px;
padding:0;
right:0px;
bottom:-6px;
position:fixed;
}

* html img#topo {
position: absolute;
}

	body { margin:30px;   }							
	.wrap { display:table; width:0px; margin:0 auto; color:#000; padding:2px; }
	.top {  width:41px; height:41px; margin:0; padding:0; right:10px; bottom:10px; position:fixed; }
	.top a { width:45px; height:45px; display:block; overflow:hidden; font-size:1px; text-indent:-200px; background:url("qmark.gif") no-repeat; }
	* HTML .top { display:none; }

#div1{z-index: 1;}
#div2{z-index: 45;}

</style>
<? 
}else{
?>

<style type=text/css>

								/* cria a div pop-up*/
#popup{
position: relative; 			/*Define a posição absoluta da pop-up*/
top: 0%; 						/*Distancia da margem superior da página */
left: 0%; 						/*Distancia da margem esquerda da página */
width: 320px; 					/*Largura da pop-up*/
height: 340px; 					/*Altura da pop-up*/
padding: 20px 20px 20px 20px; 	/*Margem interna da pop-up*/
border-width: 17px; 			/*Largura da borda da pop-up*/
border-style: solid; 			/*Estilo da borda da pop-up*/
border-color: <?=$color_bor;?>;          /*Cor da Borda*/
background: #FFF8DC; 				/*Cor de fundo da pop-up*/
color: #000066; 				/*Cor do texto da pop-up*/
display: none; 					/* Estilo da pop-up*/
								/*fim pop-up*/
}


#topo {
width:45px;
height:40px;
border: 0px;
margin:16px;
padding:0;
right:0px;
bottom:-6px;

}

* html img#topo {
position: absolute;
}

	body { margin:30px;   }							
	.wrap { display:table; width:0px; margin:0 auto; color:#000; padding:2px; }
	.top {  width:41px; height:41px; margin:0; padding:0; right:10px; bottom:10px; position:fixed; }
	.top a { width:45px; height:45px; display:block; overflow:hidden; font-size:1px; text-indent:-200px; background:url("qmark.gif") no-repeat; }
	* HTML .top { display:none; }

#div1{z-index: 1;}
#div2{z-index: 45;}

</style>
	
<?	
}
?>	

<!--Inicio da Funcao PopUP 'Segunda Tela de Ajuda' com a classe popup-->

<script language='javascript'>
// Função que fecha o pop-up ao clicar no botao fechar
function fechar(){
document.getElementById('popup').style.display = 'none';
}
// Aqui definimos o tempo para fechar o pop-up automaticamente
function abrir(){
document.getElementById('popup').style.display = 'block';
setTimeout ('fechar()', 80000);
}

</script>


<body>


<?
if ($browser == " MS Internet Explorer"){
?>

<div id='popup' class='popup' style="Z-INDEX: 900; LEFT: 25px; TOP: 40px;" align="center">
<table align="center" border="15" bgcolor="#FFF8DC" bordercolor ='<?=$color_bor;?>'></table>

<?
}else{
?>	

<div id='popup' class='popup' style="Z-INDEX: 900; LEFT: 25px; TOP: 40px;" align="center">
<table align="center" border="15" bgcolor="#FFF8DC" bordercolor ='<?=$color_bor;?>'></table>

<?	
}
?>


<td align="center">
<b><?=$situa_1;?>...<?=$nome3;?></b><br /><br />

Informes do Sistema para maior funcionalidade
e agilidade o usuario poderar estar usando as 
teclas de atalho como descrito no help
icone de interrogacao no canto inferior direto
da tela para consulta tecle C para incluir 
tecle INSERT para Sair de uma tela tecle ESC,
veja descritivo do uso das teclas no help do
sistema.<br /><br />
<b>Equipe de Desenvolvimento</b>


<br />
<br />
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="javascript: fechar();"  ><img id="Image3" src="../imagens/botaoazul25.PNG"  width="92"  height="22"  border="0"       /></a></div>

</div>

</td>



</body>


<?
if ($browser == " MS Internet Explorer"){
?>


<div style="Z-INDEX: 1; LEFT: -35px; WIDTH: 112px; POSITION: absolute; TOP: 50px; HEIGHT: 26px">
<a href="javascript: abrir();"><img id="topo" src="../imagens/carta.gif" width="150"  height="80"  border="0" /></a>
</div>

<?
}else{
?>	

<div style="Z-INDEX: 1; LEFT: 0px; WIDTH: 112px; POSITION: absolute; TOP: 10px; HEIGHT: 26px">
<a href="javascript: abrir();"><img id="topo" src="../imagens/carta.gif" width="150"  height="80"  border="0" /></a>
</div>
	
<?	
}	
?>
<script>

javascript: abrir();

</script>
<!--Fim da Funcao PopUP 'Segunda Tela de Ajuda' com a classe popup-->
