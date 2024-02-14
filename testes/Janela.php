
<?
include('counter.php');
?>



<html>
<head>
<title>teste2</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>

#popUP {         /*começo nomeando a minha div*/
position:absolute;        /*posicionei ela em absoluto*/
width:300px;        /*defini a largura*/
height:80px;         /*defini a altura*/
background:#32gray;      /*aqui eu defini a cor do background*/   
text-align:justify;           /*alinhei o texto justificado*/
left:400px;             /*alinhei meu texto a esquerda e declarei um valor a ele*/
top:50px;             /*meu texto ficará a 50px do topo*/
border:1px solid #006699;    /*coloquei uma borda no meu pop up, borda com 1 pixel solida*/
font:14px/20px Tahoma, Arial, Verdana;     /*defini o tamanho e a fonte que ficará o texto da minha popup*/
color:#320021;                              /*defini aqui a cor do meu texto*/
padding:10px; /*defini a distância do texto para minha borda*/
}

#popUP a {    /*vou difinir agora a classe do link fechar*/
padding:-40px;         /*apenas defini a distância do link fechar para minha borda*/
}


</style>
</head>

<div id="popUP" class="popup">
<!--Abri uma div chamada popUP com a classe popup-->

<!--Abaixo eu descrevo o texto que irá aparecer no meu pop up, escrevo ele em html-->
<p><strong>ATENÇÃO</strong></p><br />
<p><strong>Caro usuário, obrigado pela sua visita!</strong></p>
<p>Estamos em fase de teste.</p>
<p>Caso haja algum problema em sua navegação pedimos que entre em contato conosco, através da página "<strong>Fale Conosco</strong>".</p>
<p>Obrigado pela compreenssão!</p><br />

<p align="right"><em>Equipe CPD Sindificios.</em></p><br />

<!--Coloco abaixo um script em JS que fecha o popup-->
<a href="javascript:void(0)" onclick="fechar('popUP')" >Fechar</a>

<!--Pronto meu html esta montado, agora eu fecho a ddiv que eu criei-->
</div>


</html>