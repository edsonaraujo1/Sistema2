<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Layout Cadastro Socios Delete
 Criado em Data.....: 28/02/2008
 Ultima Atualização : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_ASOC");

if ($deixar_1 == "NAO"){
	
    echo "  <html>
			<head>
			<title>ERRO AO CONECTAR</title>
            <link rel='shortcut icon' href='../imagens/favicon.ico'/>
			</head>
			<body>
						
			<style type=text/css>
			
			body { background-image: url('../$logo_sis');
                   background-attachment: fixed }
			
			<!--.cp {  font: bold 10px Arial; color: black}
			<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
			<!--.ld { font: bold 15px Arial; color: #000000}
			<!--.ct { FONT: 9px 'Arial Narrow'; COLOR: #000033}
			<!--.cn { FONT: 9px Arial; COLOR: black }
			<!--.bc { font: bold 22px Arial; color: #000000 }
			--></style> 
			
			</HEAD>
			

			</html>
			
			<br><br><br><br>
				
			<div align=center>
			
			<table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
			<tr>
			<td align=center>
			     <font face=arial><b>*** <font color = #FF0000> ERRO ACESSO NÃO PERMITIDO !!!</font> ***<br>
				                     
									 <font face=arial>Usuário sem Permissão</b>
			<table align=center>
			<form method='POST' action='../avaleht.php?servletjs2=20$$20'>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>";
	        exit();
}	

// salva Secao
@session_start();
$_SESSION['tipo_acao'] = 'alterar_1';

$cami2 = '../imagens/fotos/Branco.bmp'; 	

categoria($Edit9);

?>

<html >
<head>
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>

<body  style=" margin-left: 0px;  margin-top: 54px;  margin-right: 0px;  margin-bottom: 0px; ">

<script>

if (!document.layers)

document.write('<div id="fixacam" style="position:absolute; background:#ffffff; bordercolordark:#4682B4; width:100px; height:50px; font:10pt Tahoma; color:#666666" align="Right">'  )

</script>

<layer id="fixacam"> 


	<a rel="home" class="home" href="socdelete.php?Cod_2=<?=$id;?>">
	<img alt="Proposta" src="../imagens/botaoazul4.PNG" border="0"></a>
	
	<a rel="home" class="home" href="cadsocios.php?Cod_xxx=<?=$id;?>">
	<img alt="Carteira" src="../imagens/botaoazul9.PNG" border="0"></a>
	

 
</layer>


<script type="text/javascript">
var posvertical="rodape"
if (!document.layers)
document.write('</div>')
function menufloat(){
var startX = 3,
startY = 80;
var ns = (navigator.appName.indexOf("Netscape") != -1);
var d = document;
function ml(id){
var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
if(d.layers)el.style=el;
el.sP=function(x,y){this.style.left=x;this.style.top=y;};
el.x = startX;
if (posvertical=="rodape")
el.y = startY;
else{
el.y = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
el.y -= startY;
}
return el;
}
window.stayTopLeft=function(){
if (posvertical=="topo"){
var pY = ns ? pageYOffset : document.body.scrollTop;
ftlObj.y += (pY + startY - ftlObj.y)/8;
}
else{
var pY = ns ? pageYOffset + innerHeight : document.body.scrollTop + document.body.clientHeight;
ftlObj.y += (pY - startY - ftlObj.y)/8;
}
ftlObj.sP(ftlObj.x, ftlObj.y);
setTimeout("stayTopLeft()", 10);
}
ftlObj = ml("fixacam");
stayTopLeft();
}
menufloat();
</script>

<?
include('soclayout.php');
?>
</body>
</html>
