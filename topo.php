<html>
<style type="text/css">

* html {
overflow-y: hidden;
}

* html body {
overflow-y: auto;
height: 100%;
padding: 0;
}
* html img#topo {
width:50px;
height:40px;
border: 0px;
margin:0;
padding:0;
right:0px;
bottom:0px;

position: absolute;
}

								/* cria a div pop-up*/
#popup{
position: absolute; 			/*Define a posição absoluta da pop-up*/
top: 20%; 						/*Distancia da margem superior da página */
left: 30%; 						/*Distancia da margem esquerda da página */
width: 400px; 					/*Largura da pop-up*/
height: 100px; 					/*Altura da pop-up*/
padding: 20px 20px 20px 20px; 	/*Margem interna da pop-up*/
border-width: 17px; 			/*Largura da borda da pop-up*/
border-style: solid; 			/*Estilo da borda da pop-up*/
border-color: <?php echo $color_bor ?>;          /*Cor da Borda*/
background: #FFF8DC; 				/*Cor de fundo da pop-up*/
color: #000066; 				/*Cor do texto da pop-up*/
display: none; 					/* Estilo da pop-up*/
								/*fim pop-up*/
}





#navbar-iframe {   display: none !important;}
body {
background:#e4eff4;
margin:0;
color:#000000;
font:x-small Georgia Serif;
font-size/* */:/**/small;
font-size: /**/small;
text-align: center;
}
a:link {
color:#80ae14;
text-decoration:none;
}
a:visited {
color:#999999;
text-decoration:none;
}
a:hover {
color:#59a3c1;
text-decoration:underline;
}
a img {
border-width:0;
}
/* Header
-----------------------------------------------
*/
#footer-logo{
height:20px;
font-size:10px;
text-align:center;
padding:2px;
}
#header-wrapper {
margin:0 auto 0px;
background-color:#6495ed;
border:0px solid #6AA8EE;
height:100px;
background-image:url(titulo_dicadedica.png);
}
#header-inner {
margin-left: auto;
margin-right: auto;
}
#header {
margin: 5px;
color:#000000;
}
#header h1 {
margin:5px 5px 0;
padding:25px 20px .25em;
line-height:1.2em;
font: normal normal 200% Verdana, sans-serif;
}
#header a {
color:#000000;
text-decoration:none;
}
#header a:hover {
color:#000000;
}
#header .description {
margin:0 5px 5px;
padding:0 20px 15px;
max-width:700px;
line-height: 1.4em;
font: normal normal 82% Verdana, sans-serif;
color: #FFFFFF;
}
#header img {
margin-left: auto;
margin-right: auto;
}
/* Outer-Wrapper
----------------------------------------------- */
#outer-wrapper {
width: 953px;
background-color:#d3e6ef;
margin:0 auto;
padding:15px 15px 0px 15px;
text-align:left;
font: normal normal 100% Verdana, sans-serif;
}
#content-wrapper{
background-color:white;
padding:15px;
}
#main-wrapper {
width: 520px;
float: left;
word-wrap: break-word; /* fix for long text breaking sidebar float in IE */
overflow: hidden;     /* fix for long non-text content breaking IE sidebar float */
}
#sidebar-wrapper {
width: 390px;
float: right;
word-wrap: break-word; /* fix for long text breaking sidebar float in IE */
overflow: hidden;      /* fix for long non-text content breaking IE sidebar float */
}
#wrapper-left {
width:170px;
float: left;
overflow: hidden;
}
#wrapper-right {
padding-left:15px;
width:200px;
background-color:#ebffd7;
float: right;
overflow: hidden;
}
#menubar{
background-color:#6495ed;
height:20px;
padding:2px;
display:none;
}
/* Headings
----------------------------------------------- */
h2 {
margin:1.5em 0 .75em;
font:normal bold 105% Verdana, sans-serif;
line-height: 1.4em;
letter-spacing:.1em;
color:#59a3c1;
}
/* Posts
-----------------------------------------------
*/
div.date-header {
padding-bottom:2px;
border-bottom:1px dotted silver;
color:#80AE14;
font-size:82%;
margin-bottom:5px;
}
.post {
margin:.5em 0 1.5em;
border-bottom:1px dotted #b3b3b3;
padding-bottom:1.5em;
}
.post h3 {
margin:.25em 0 0;
padding:0 0 4px;
font-size:140%;
font-weight:normal;
line-height:1.4em;
color:#59a3c1;
}
.post h3 a, .post h3 a:visited, .post h3 strong {
display:block;
text-decoration:none;
color:#59a3c1;
font-weight:normal;
}
.post h3 strong, .post h3 a:hover {
color:#000000;
}
.post-body {
margin:0 0 .75em;
line-height:1.6em;
}
.post-body blockquote {
line-height:1.3em;
}
.post-footer {
margin: .75em 0;
color:#59a3c1;
letter-spacing:.1em;
font: normal normal 94% 'Trebuchet MS', Trebuchet, Arial, Verdana, Sans-serif;
line-height: 1.4em;
}
.post-footer abbr,a:link {
text-decoration:none;
}
.post-footer a:hover{
text-decoration:underline;
}
.comment-link {
margin-left:.6em;
}
.post img {
padding:4px;
border:1px solid #b3b3b3;
}
.post blockquote {
margin:1em 20px;
}
.post blockquote p {
margin:.75em 0;
}
/* Comments
----------------------------------------------- */
#comments h4 {
margin:1em 0;
font-weight: bold;
line-height: 1.4em;
letter-spacing:.2em;
color: #59a3c1;
}
#comments-block {
margin:1em 0 1.5em;
line-height:1.6em;
}
#comments-block .comment-author {
margin:.5em 0;
}
#comments-block .comment-body {
margin:.25em 0 0;
}
#comments-block .comment-footer {
margin:-.25em 0 2em;
line-height: 1.4em;
letter-spacing:.1em;
border-bottom:1px dotted silver;
}
#comments-block .comment-body p {
margin:0 0 .75em;
}
.deleted-comment {
font-style:italic;
color:gray;
}
#blog-pager-newer-link {
float: left;
}
#blog-pager-older-link {
float: right;
}
#blog-pager {
text-align: center;
}
.feed-links {
clear: both;
line-height: 2.5em;
}
/* Sidebar Content
----------------------------------------------- */
.sidebar {
color: #666666;
line-height: 1.5em;
}
.sidebar ul {
list-style:none;
margin:0 0 0;
padding:0 0 0;
}
.sidebar li {
margin:0;
padding-top:0;
padding-right:0;
padding-bottom:.25em;
padding-left:15px;
text-indent:-15px;
line-height:1.5em;
}
.sidebar .widget, .main .widget {
border-bottom:1px dotted #b3b3b3;
margin:0 0 1.5em;
padding:0 0 1.5em;
}
.main .Blog {
border-bottom-width: 0;
}
/* Profile
----------------------------------------------- */
.profile-img {
float: left;
margin-top: 0;
margin-right: 5px;
margin-bottom: 5px;
margin-left: 0;
padding: 4px;
border: 1px solid #b3b3b3;
}
.profile-data {
margin:0;
letter-spacing:.1em;
font: normal normal 94% 'Trebuchet MS', Trebuchet, Arial, Verdana, Sans-serif;
color: #59a3c1;
font-weight: bold;
line-height: 1.6em;
}
.profile-datablock {
margin:.5em 0 .5em;
}
.profile-textblock {
margin: 0.5em 0;
line-height: 1.6em;
}
.profile-link {
font: normal normal 94% 'Trebuchet MS', Trebuchet, Arial, Verdana, Sans-serif;
letter-spacing: .1em;
}
/* Footer
----------------------------------------------- */
#footer {
width:660px;
clear:both;
margin:0 auto;
padding-top:15px;
line-height: 1.6em;
letter-spacing:.1em;
text-align: center;
}

</style>

<script language='javascript'>
// Função que fecha o pop-up ao clicar no botao fechar
function fechar(){
document.getElementById('popup').style.display = 'none';
}
// Aqui definimos o tempo para fechar o pop-up automaticamente
function abrir(){
document.getElementById('popup').style.display = 'block';
setTimeout ('fechar()', 12000);
}
</script>

<body>

<div id='popup' class='popup' align="center">
<b><?php echo $bomdia ?></b>
  
A sua irritacao nao solucionara problema algum
As suas contrariedades nao alteram a natureza das coisas.
O Seu mau humor nao modifica a vida.
  
<div id="Image3_container" style=" width: 92;  height: 22; overflow: hidden;" ><a href="javascript: fechar();"  ><img id="Image3" src="imagens/botaoazul24.PNG"  width="92"  height="22"  border="0"       /></a></div>
</td></td></tr>

</div>


<a href="javascript: abrir();"><img id="topo" src="imagens/ajuda.PNG" /></a>


<a style="display:scroll;position:fixed;bottom:72px;right:50px;" href="#" title="VOLTAR AO TOPO"><img src="imagens/topo_flu.PNG"/></a> <a href="#"> <span >Voltar ao topo flutuante Dicadedica</span></a> </span> 


</body>
</html>