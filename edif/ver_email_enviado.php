<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Pesquisa Arquivo Confederatica
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 04/07/2008 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/

// Resgata a Sessao
@session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");
$nome3 = $_SESSION["nome_log"];

include("menu.php");

include_once('../sql_injection.php');

include_once("funcoes2.php");

$deixar_1 = acesso("FORM_EDIF");

if ($deixar_1 == "NAO"){
	
    echo "              <html>
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
			<form method='POST' action='../avaleht.php>
			<td><input type=image name='voltar' src='../imagens/botao_voltar.PNG'></td>
			</form>
			</table>
			</td>
			</tr>
			</table>
			</div>
";
	        exit();
}	

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
<title><?=$Titulo;?></title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
</head>
<body>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);
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

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não foi possivel conectar !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


@mysql_select_db($db)
        or

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Não Foi possivel selecionar o banco de dados !!! ***</b>
     <table align=center>
     <form method='POST' action='login.php'>
     <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


// Abrir tabela Senha

$tabela_1 = strtoupper('edificios');

$consulta3 = "SELECT * FROM permissoes WHERE login = '". anti_sql_injection($nome3) ."' and tabela = '". anti_sql_injection($tabela_1) ."'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$per1       = @$row3["incluir"];
$per2       = @$row3["alterar"];
$per3       = @$row3["excluir"];
$per4       = @$row3["imprimir"];

// Resgata Secao
@session_start();

$volta_1 = $_SESSION['volta_conf'];

if (empty($Cod_Edif)){
   $Cod_Edif = $_SESSION['lista_soc'];
}else{
   $volta_1 = $Cod_Edif;  	
}

$Cod_2    = $_SESSION['navega'];

unset ($_SESSION['lista_soc']);
unset ($_SESSION['navega']);

if (!empty($volta_1)){
   	
	$Cod_Edif = $volta_1;
	 
}

if (empty($Cod_2)){
	
	$Cod_2 = $volta_1;
	
}

// retorna uma pesquisa

$consulta  = "SELECT * FROM registro ORDER BY id";

$resultado = @mysql_query($consulta)
        or 

die("
     <br>
     <br>
     
	 <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Registro Não Encontrado !!! ***</b>
     <table align=center>
     <form method='POST' action='edifguias.php?Cod_2=$Cod_xx'>
     <td><input type=image name='Consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");


// Resgata Secao
@session_start();
$_SESSION['navega'] = $Cod_xx;


$row = @mysql_fetch_array($resultado);

$id       = @$row["id"];

if (empty($id)){
	
	echo "
	
     <br>
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFF8DC' bordercolor ='$color_bor'>
     <tr>
     <td>
     <font face=arial><b>*** Nenhuma E-mail Encontrada !!! ***</b>
     <table align=center>
     <form method='POST' action='edifguias.php?Cod_2=$Cod_xx'>
     <td><input type=image name='Consulta' src='../imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>";
	
	
}else{


$consulta  = "SELECT * FROM registro ORDER BY id";

$resultado = @mysql_query($consulta);

$faz = 1;

echo "
          <br>
          <br>
          
          <table border=0  align=center>
          <tr align=center colspan=2> 


          <form method='POST' action='edifguias.php?Cod_2=$Cod_xx'>
          <td><input type=image name='incluir' src='../imagens/botao_voltar.PNG'></td>
          </form>";

echo "

<div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
     <tr>
     <td>
     <table border='1' align=center>";


       while ($linha = mysql_fetch_array($resultado))
       {

    $id_conf  = $linha["id"];
	$cod      = $linha["id_nu"];
	$vencto   = $linha["data"];
	$total    = $linha["hora"];
	$descri   = $linha["descricao"];
	$emissao  = $linha["email"];
	$dat_bai  = substr($linha["texto"],0,15)."...";
	
	
	$program    = $descri;
	$string     = $program;
	$array      = explode('-', $string);
	
	
	for ($si = 0; $si < strlen($program); $si++)
	{
	    $linha = $Campo.'$si';
	    //echo "$array[$si]<br>";
	}


//echo 'Envio email = '.$array[0]."<br>";
//echo 'email = '.$array[1]."<br>";
//echo 'Adm = '.$array[2]."<br>";
//echo 'Cod = '.$array[3]."<br>";
//echo 'Vencto = '.$array[4]."<br>";
//echo 'valor = '.$array[5]."<br>";
//echo $array[6]."<br>";

if (trim($array[2]) == "ADMINISTRADORA"){
	
	$array[2] = "ADMS";
}
if (trim($array[2]) == "EDIFICIOS"){
	
	$array[2] = "EDIF";
}

        if ($faz == 1){
           ?>
           
	   <td valign=top><b>Nº</b>
	   <th>           <b>DATA</b>
	   <th>           <b>HORA</b>
	   <th>           <b>DESCRICAO</b>
	   <th>           <b>EMAIL</b>
	   <th>           <b>TEXTO</b>
	   <th><th></th>
       </td>
           
           <?
           $faz = 0;
        }



        echo "
        <tr> 
	    <td valign=top align='center'><b>$cod</b><td>$vencto<td align='center'>$total<td align='left'>$array[2] - Cod: $array[3]<td align='left'>$emissao<td>$dat_bai<td>";


        echo "</td>";

	}

     echo "
      
     </table>
     </td>
     </tr>
     </table>
     </div>


          <table border=0  align=center>
          <tr align=center colspan=2> 


          <form method='POST' action='edifguias.php?Cod_2=$Cod_xx'>
          <td><input type=image name='incluir' src='../imagens/botao_voltar.PNG'></td>
          </form>";
          

// <A HREF='edifguias_adms.php?Cod_2=$cod'><img id='Image3' src='../imagens/acord.PNG' border='0'></A>
}
?>
