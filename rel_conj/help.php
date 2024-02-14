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

</style> 

<script language="JavaScript"><!--

document.onkeydown = keyCatcher;

function keyCatcher() 
{
   var e = event.srcElement.tagName;

   if (event.keyCode == 8 && e != "INPUT" && e != "TEXTAREA") 
   {
      event.cancelBubble = true;
      event.returnValue = false;
   }
}
//-->
</script>

<!--Inicio da Funcao PopUP 'Segunda Tela de Ajuda' com a classe popup-->

<body>

<?
if ($browser == " MS Internet Explorer"){
?>

	
	<div id="marca" style="position:absolute; visibility:show; left:0px; top:0px; z-index:5000">
	<a href="javascript:janela_help_sys('help_sys.php?nome_hel=<?=$nome3;?>')"><img id="topo" src="../imagens/qmark.gif" /></a>
	</div>            
		

		
		<script language='javaScript'>
		function checanav(){
		var x = navigator.appVersion;
		y = x.substring(0,4);
		if (y>=4) variaveis(),local();
		}
		function variaveis(){
		if (navigator.appName == "Netscape") {
		h=".left";
		v=".top";
		dS="document.";
		sD="";
		iW="window.innerWidth"
		iH="window.innerHeight"
		osX="window.pageXOffset"
		osY="window.pageYOffset"
		}else{
		h=".pixelLeft";
		v=".pixelTop";
		dS="";
		sD=".style";
		iW="document.body.clientWidth"
		iH="document.body.clientHeight"
		osX="document.body.scrollLeft"
		osY="document.body.scrollTop"
		}
		}
		obW=99+-110
		obH=24+-30
		objectXY="marca" 
		
		function local(){
		eval(dS+objectXY+sD+h+"="+((eval(iW))-obW+(eval(osX))));
		eval(dS+objectXY+sD+v+"="+((eval(iH))-obH+(eval(osY))));
		setTimeout("local()",100)
		}
		checanav()
		</script>


<?
}else{
?>	

	

		<div class="wrap" style="Z-INDEX: 5000;">
		            <a href="javascript:janela_help_sys('help_sys.php?nome_hel=<?=$nome3;?>')"><img id="topo" src="../imagens/qmark.gif" /></a>
		</div>            
			
	
<?	
}
?>
</body>

<script>
function janela_help_sys(URL){ 
   window.open(URL,"janela2","width=410,height=535,resizable=NO,status=NO,Scrollbars=YES,location=NO,menubar=NO,toolbar=NO,minimize=NO,close=NO"); 
} 
</script>

<!--Fim da Funcao PopUP 'Segunda Tela de Ajuda' com a classe popup-->

