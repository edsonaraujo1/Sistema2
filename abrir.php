<?php
// Resgata a Sessao
@session_start();
$nome3 = $_SESSION["nome_log"];

include('logar.php');
?>
<script language='JavaScript'>
<!--
function abrir() {
var w = screen.width;
var h = screen.height;	
if(navigator.appName=="Netscape"){
top=window.open("login.php"); 
} 
else if(navigator.appName=="Microsoft Internet Explorer"){
semx=window.open("","","toolbar=no,location=no,status=no,resizable=no,scrollbars=no,menubar=no,fullscreen=2");
self.focus();
semx.resizeTo(410,250);
semx.moveTo(180,200);
semx.location="login.php";
}
} 
//-->
//abrir();

function tela(targeturl){
	
	window.open(targeturl,"","toolbar,location,status,resizable,scrollbars,menubar,fullscreen")
}

window.location=tela("info/help_sys.php");

</script>
