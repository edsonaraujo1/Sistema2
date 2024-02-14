<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Configuracoes do Sistema
 Criado em Data.....: 19/12/2008
 Ultima Atualização : 19/12/2008 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

$nome3 = $_SESSION["nome_log"];
include("../config.php");

?>

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

<html>
<head>
<title><?php echo $Titulo ?></title>
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->
</style> 


</body>
</html>

<?

include_once('java_js.php');

$dado13  = encode5t(addslashes($_POST['Edit2']));
$dado14  = encode5t(addslashes($_POST['Edit3']));
$dado15  = encode5t(addslashes($_POST['Edit4']));
$dado16  = encode5t(addslashes($_POST['Edit5']));
$dado17  = encode5t(addslashes($_POST['Edit6']));

//echo $dado1."<br>";
//echo $dado2."<br>";
//echo $dado3."<br>";
//echo $dado4."<br>";
//echo $dado5."<br>";
//echo $dado6."<br>";
//echo $dado7."<br>";
//echo $dado8."<br>";
//echo $dado9."<br>";
//echo $dado10."<br>";
//echo $dado11."<br>";

$arquivo = "../config.txt";
$linha  = file($arquivo);
$total  = count($linha);
$fp = fopen($arquivo,"w+");
for ($i = "0"; $i < $total; $i++){
list($dado1_txt,$dado2_txt,$dado3_txt,$dado4_txt,$dado5_txt,$dado6_txt,$dado7_txt,$dado8_txt,$dado9_txt,$dado10_txt,$dado11_txt,$dado12_txt,$dado13_txt,$dado14_txt,$dado15_txt,$dado16_txt,$dado17_txt,$dado18_txt,$dado19_txt,$dado20_txt,$dado21_txt,$dado22_txt,) = explode(";",$linha[$i]);
fwrite($fp,"$dado1;$dado2;$dado3;$dado4;$dado5;$dado6;$dado7;$dado8;$dado9;$dado10;$dado11;$dado12;$dado13;$dado14;$dado15;$dado16;$dado17;$dado18;$dado19;$dado20;$dado21;$dado22;\n");

}
fclose($fp);

            include('../menu_sub2.php');
			echo "<style type=text/css>

                  body { background-image: url('../$logo_sis');
                         background-attachment: fixed }
                  </style>       
                  <div align=center>
				  <table align=center border='15' bgcolor='#FFF8DC'  bordercolor ='$color_bor'>
				  <tr>
				  <td align=center>
				  <font face=arial><b>*** Configurações alteradas com SUCESSO !!! ***<br></b>
			                    
				  <table align=center>
				  <form method='POST' action='../menu_1.php?servletjs2=20$$20'>
				  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
				  </form>  
				  </table>
				  </td>
				  </tr>
				  </table>
				  </div>";


?>
