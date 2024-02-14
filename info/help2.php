<?PHP
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
	
//echo $browser; 

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

unset ($_SESSION['Faz_uma']);

$nome3 = strtoupper($_SESSION["nome_log"]);

?>

<html>
<head>
	<link rel="stylesheet" href="css/tooltip.css" media="screen">
	<script type="text/javascript" src="js/tooltip.js"></script>
</head>
</html>
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

<?PHP
if ($browser == " MS Internet Explorer"){
	
$tes_x1 = "Para Obter Ajuda quanto ao uso das <b>TECLAS e FUNÇÕES do Sistema</b>, clique aqui e obtenha Ajuda !!!";	
?>

	<div id="bubble_tooltip">
		<div class="bubble_top"><span></span></div>
		<div class="bubble_middle"><span id="bubble_tooltip_content"></span></div>
		<div class="bubble_bottom"></div>
	</div>
	
	<div id="marca" style="position:absolute; visibility:show; left:0px; top:0px; z-index:5000">
	<a href="javascript:janela_help_sys('../info/help_sys.php')" onmouseover="showToolTip(event,'<?=$tes_x1;?>');return false" onmouseout="hideToolTip()"><img alt="Para Obter Ajuda no uso das funcoes Clique Aqui !!!" id="topo" src="../imagens/qmark.gif" /></a>
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


<?PHP
}else{
?>	

	

		<div class="wrap" style="Z-INDEX: 5000;">
		            <a href="javascript:janela_help_sys('../info/help_sys.php?nome_hel=<?=$nome3;?>')"><img id="topo" src="../imagens/qmark.gif" /></a>
		</div>            
			
	
<?PHP	
}
?>
</body>

<script>
function janela_help_sys(URL){ 
   window.open(URL,"janela2","width=410,height=535,resizable=NO,status=NO,Scrollbars=YES,location=NO,menubar=NO,toolbar=NO,minimize=NO,close=NO"); 
} 
</script>

<!--Fim da Funcao PopUP 'Segunda Tela de Ajuda' com a classe popup-->

