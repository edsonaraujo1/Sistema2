<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Cadastro de Etiquetas Fenatec
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

include("../logar.php");

$nome3 = $_SESSION["nome_log"];

include("menu.php");

include("vaurls.php");

$deixar = acesso_url("FORM_FENATEC");

if ($deixar == "SIM"){

// Abre Conexão com o MySql
include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass)
        or

die("
     <br>
     <br>
     
     <div align=center>

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
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

     <table align=center border='15' bgcolor='#FFFFFF' bordercolor ='$color_bor'>
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

// Abrir tabela Administradora

if ($Cod_xxx != 0)
{
$consulta2 = "SELECT * FROM fenatec WHERE Edit1 = '$Cod_xxx' ORDER BY Edit1";

}else{
	
$consulta2 = "SELECT * FROM  fenatec  ORDER BY Edit1 LIMIT 0,100";
              
}

// Função Navegar pelo registro Proximo e Anterior
If ($Cod_Anterior != 0){
	
	$id = $Cod_Anterior;

    if($Cod_Anterior != 0){
       $id = $id -1;
       }
       else{
           $id = $id +1;
           }

       if ($id) {
       $consulta2 = "SELECT * FROM fenatec ORDER BY id LIMIT $id,1";
	
}
}
If ($Cod_Proximo != 0){
	
	$id = $Cod_Proximo;

    if($Cod_Proximo != 0){
       $id = $id -0;
       }
       else{
           $id = $id -1;
           }

       if ($id) {
       $consulta2 = "SELECT * FROM fenatec ORDER BY id LIMIT $id,1";
	
}
}

If ($Cod_fim != 0){
	
       $consulta2 = "SELECT * FROM fenatec ORDER BY Edit1 DESC LIMIT 0,1";
	
}

If ($Cod_inicio != 0){
	
       $consulta2 = "SELECT * FROM fenatec ORDER BY Edit1 ASC LIMIT 0,1";
	
}
// Fim da Função Navegar pelo registro


$resultado2 = @mysql_query($consulta2);

$row2 = @mysql_fetch_array($resultado2);

$id     = @$row2["id"];
$Edit1  = @$row2["Edit1"];
$Edit2  = @$row2["Edit2"];
$Edit3  = @$row2["Edit3"];
$Edit4  = @$row2["Edit4"];
$Edit5  = @$row2["Edit5"];
$Edit6  = @$row2["Edit6"];
$Edit7  = @$row2["Edit7"];
$Edit8  = @$row2["Edit8"];
$Edit9  = @$row2["Edit9"];
$Edit10 = @$row2["Edit10"];
$Edit11 = @$row2["Edit11"]; 
$Edit12 = @$row2["Edit12"];
$Edit13 = @$row2["Edit13"];
$Edit14 = @$row2["Edit14"];
$Edit15 = @$row2["Edit15"];

$menssagens = "* * * Visualizar * * *";


include("fenalayout.php");
include("botoes.php");

include("../config.php");

?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>

<style type=text/css>

body { background-image: url(<?="../".$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->

</style>	

</html>



</body>
</html>
<?
}else{
	
include("enaaurlnp.php");
	
}
?>
