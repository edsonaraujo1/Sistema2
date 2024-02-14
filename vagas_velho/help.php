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
if((ereg("Nav", getenv("HTTP_USER_AGENT"))) || (ereg("Gold", getenv("HTTP_USER_AGENT"))) || (ereg("X11", getenv("HTTP_USER_AGENT"))) || (ereg("Mozilla", getenv("HTTP_USER_AGENT"))) || (ereg("Netscape", getenv("HTTP_USER_AGENT"))) AND (!ereg("MSIE", getenv("HTTP_USER_AGENT")) AND (!ereg("Konqueror", getenv("HTTP_USER_AGENT"))))) $browser = " Netscape"; 
elseif(ereg("MSIE", getenv("HTTP_USER_AGENT"))) $browser = " MS Internet Explorer"; 
elseif(ereg("Lynx", getenv("HTTP_USER_AGENT"))) $browser = " Lynx"; 
elseif(ereg("Opera", getenv("HTTP_USER_AGENT"))) $browser = " Opera"; 
elseif(ereg("WebTV", getenv("HTTP_USER_AGENT"))) $browser = " WebTV"; 
elseif(ereg("Konqueror", getenv("HTTP_USER_AGENT"))) $browser = " Konqueror"; 
elseif((eregi("bot", getenv("HTTP_USER_AGENT"))) || (ereg(" Google", getenv("HTTP_USER_AGENT"))) || (ereg("Slurp", getenv("HTTP_USER_AGENT"))) || (ereg("Scooter", getenv("HTTP_USER_AGENT"))) || (eregi("Spider", getenv("HTTP_USER_AGENT"))) || (eregi("Infoseek", getenv("HTTP_USER_AGENT")))) $browser = " Robôs de Busca"; 
else $browser = " Desconhecido"; 
//echo $browser; 

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

unset ($_SESSION['Faz_uma']);

$nome3 = strtoupper($_SESSION["nome_log"]);

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
border-color: #5A9CB1;          /*Cor da Borda*/
background: #fff; 				/*Cor de fundo da pop-up*/
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
	.wrap { display:table; width:776px; margin:0 auto; color:#000; padding:25px; }
	.top {  width:41px; height:41px; margin:0; padding:0; right:10px; bottom:10px; position:fixed; }
	.top a { width:45px; height:45px; display:block; overflow:hidden; font-size:1px; text-indent:-200px; background:url("qmark.gif") no-repeat; }
	* HTML .top { display:none; }

#div1{z-index: 1;}
#div2{z-index: 45;}

</style> 

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

<div id='popup' class='popup' style="Z-INDEX: 200; LEFT: 189px; WIDTH: 632px; POSITION: absolute; TOP: 112px; HEIGHT: 320px" align="center">
<table align="center" border="15" bgcolor="#FFFFFF" bordercolor ='<?=$color_bor;?>'></table>

<?
}else{
?>	

<div id='popup' class='popup' style="Z-INDEX: 200; LEFT: 189px; WIDTH: 632px; POSITION: absolute; TOP: 112px; HEIGHT: 560px" align="center">
<table align="center" border="15" bgcolor="#FFFFFF" bordercolor ='<?=$color_bor;?>'></table>

<?	
}
?>


<td align="center">
<b>Ola...<?=$nome3;?></b><br /><br />

<img src="../imagens/help_soc.PNG"  align="center">

<br />
<br />
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="javascript: fechar();"  ><img id="Image3" src="../imagens/botaoazul24.PNG"  width="92"  height="22"  border="0"       /></a></div>

</div>

</td>

</body>
<div class="wrap">
            <a href="javascript: abrir();"><img id="topo" src="../imagens/qmark.gif" /></a>
</div>            

<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br />
.
<!--Fim da Funcao PopUP 'Segunda Tela de Ajuda' com a classe popup-->
