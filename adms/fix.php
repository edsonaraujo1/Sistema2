<style>

#popup{
position: relative; 			/*Define a posição absoluta da pop-up*/
top: 0%; 						/*Distancia da margem superior da página */
left: 0%; 						/*Distancia da margem esquerda da página */
width: 400px; 					/*Largura da pop-up*/
height: 100px; 					/*Altura da pop-up*/
padding: 20px 20px 20px 20px; 	/*Margem interna da pop-up*/
border-width: 17px; 			/*Largura da borda da pop-up*/
border-style: solid; 			/*Estilo da borda da pop-up*/
border-color: <?php echo $color_bor ?>;          /*Cor da Borda*/
background: #fff; 				/*Cor de fundo da pop-up*/
color: #000066; 				/*Cor do texto da pop-up*/
display: none; 					/* Estilo da pop-up*/
								/*fim pop-up*/
}


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


<div id="marca" style="position:absolute; visibility:show; left:0px; top:0px; z-index:5000">
<a href="javascript: abrir();"><img src="./imagens/qmark.gif" border='0'/></a>
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
obW=99+-40
obH=24+30
objectXY="marca" 

function local(){
eval(dS+objectXY+sD+h+"="+((eval(iW))-obW+(eval(osX))));
eval(dS+objectXY+sD+v+"="+((eval(iH))-obH+(eval(osY))));
setTimeout("local()",100)
}
checanav()
</script>
