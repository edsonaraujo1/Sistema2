<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Pagina de Entrada Index
 Criado em Data.....: 19/12/2008
 Ultima Atualiza��o : 19/12/2008 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/


// Resgata a Sessao
@session_start();
$nome3 = $_SESSION["nome_log"];
$servletjs2 = $_SESSION["servletjs2"];

if ($servletjs2 == '20$$20'){

?>
<script>
 
var ns4 = (document.layers) ? true : false;
var ie4 = (document.all && !document.getElementById) ? true : false;
var w3c = (document.getElementById) ? true : false;
var ns6 = (document.getElementById && navigator.appName == 'Netscape') ? true : false;
var ie5 = (document.all && document.getElementById) ? true : false;
 
 
function addEvent(obj, evType, fn, useCapture)
{
	if (obj.addEventListener)
	{
		obj.addEventListener(evType, fn, useCapture);
		return true;
	}
	else if (obj.attachEvent)
	{
		var r = obj.attachEvent("on"+evType, fn);
		return r;
	} 
	else 
	{
		alert("Handler could not be attached");
	}
} 
 
var bClose = false;
 
function sair()
{
	bClose = true;
	window.close();
}
 
function confirma_fecho(e)
{
	// NS 6
	if (ns6)
	{
		var b = confirm("Deseja realmente sair 1- fecho?");
		if (b && e.preventDefault)
			e.preventDefault();	
		return b;
	}
}
 
function confirma_sair(e)
{
	// NS 6
	if (ns6)
	{
		var b = confirm("Deseja realmente sair? 2");
		if (b && e.preventDefault)
			e.preventDefault();	
		return b;
	}
	
	// NS4
	if (ns4)
	{
		var b = confirm("Deseja realmente sair? 3");
		return b;
	}
	
	// IE4
	if (ie4 || ie5)
	{
		if (!bClose)
			return "Deseja realmente sair? 4";
			
            //window.location = "apg.php";			
			
	}
}
 
function init()
{
	// NS6
	if (ns6)
	{
		//window.onunload = confirma_sair;
		window.onclose = confirma_fecho;
		
		window.onbeforeunload = function(){
			
			window.location = "apg.php";
		}
		
	}
	
	//MSIE
	if (ie4 || ie5)
	{
		window.onbeforeunload = confirma_sair;
		
		window.onbeforeunload = function(){
			
			window.location = "apg.php";
		}
		//window.onunload = confirma_sair;
		
        //window.location = "apg.php";
	}
	
	//NS4
	if (ns4)
	{
		window.onunload = confirma_sair;
		
		window.onbeforeunload = function(){
			
			window.location = "apg.php";
		}

	}
	
//	alert("IE4: " + ie4 + " IE5: " + ie5 + " NS4: " + ns4 + " NS6: " + ns6 + " W3C: " + w3c);
}		
 
// -->
</script>
 
<script language="javascript">

x=screen.width; 
y=screen.height;

if (x < 800)
{
	//window.location = "error2.php";
}
</script>

<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="favicon.ico"/>

<script language="javascript">

x=screen.width; 
y=screen.height;

if (x < 800)
{
	//window.location = "error2.php";
}
</script>

</head>
 
<style type=text/css>

body { background-image: url($logo_sis);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->

 iframe#footer{
  position:absolute;
  bottom:0px;
  left:auto;
  width:98%;
  height:<length>;
  
 }

</style> 

<?
if (!empty($nome3)){
?>

<frameset rows="*">
    <frame src="avaleht.php" name="PHP_ASP" frameborder=0 scrolling=auto>
    <frame src="" marginwidth=0 marginheight=0 scrolling=no>
</frameset>

<?
}else{
	
?>

<frameset rows="*">
    <frame src="avaleht.php" name="PHP_ASP" frameborder=0 scrolling=auto>
    <frame src="" frameborder=0 marginwidth=0 marginheight=0 scrolling=no>
</frameset>

<?

// rodape.php
	
}

?>

<body onload="javascript:init()" style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px;">
 
<!--
<div class="blocoDIVinfo" >
<iframe id="frame" src="avaleht.php" name="idPrincipal" width='100%' height='100%' scrolling="auto" frameborder="0" align="center" ></iframe>
</div>
<iframe id="footer" src="rodape.php"  height="17" scrolling="auto" frameborder="0" align="center" ></iframe>
-->

</body>
</html>
<?
}else{

header('Location:index.php');

	
}
?>