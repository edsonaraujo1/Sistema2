<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Cadastro de Oposicao
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

// Resgata a Sessao
session_start();
$path = strtoupper($_SESSION['Path1']);

require($path."logar.php");

require("menu.php");

$nome3 = $_SESSION["nome_log"];

//require("funcoes2.php");

session_start();

unset ($_SESSION['cod']);
unset ($_SESSION['rgassoc']);
unset ($_SESSION['datinsc']); 
unset ($_SESSION['sede']);
unset ($_SESSION['categoria']);
unset ($_SESSION['codedif']);
unset ($_SESSION['cnpj']);
unset ($_SESSION['adms']);
unset ($_SESSION['matricula']);
unset ($_SESSION['nu1']);
unset ($_SESSION['nomeassoc']);
unset ($_SESSION['endresid']);
unset ($_SESSION['cepres']);
unset ($_SESSION['estadores']);
unset ($_SESSION['telefone']);
unset ($_SESSION['obs']);
unset ($_SESSION['log_ssoc']);
unset ($_SESSION['hora']);

?>

<html>
<head>
<title><?=$Titulo;?></title>
</head>
<body>
</html>

<?

// Abre Conexão com o MySql
include($path."conexao.php");
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
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
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
     <td><input type=image name='consulta' src='imagens/botao_voltar.PNG'></td>
     </form> 
     </table>
     </td>
     </tr>
     </table>
     </div>");

// Abrir tabela Oposicao

if ($Cod_xx != 0)
{

$consulta  = "SELECT * FROM oposicao3 WHERE id = '$Cod_xx' ORDER BY id";

}else{

    if ($Cod_2 != 0)
    {

    $consulta  = "SELECT * FROM oposicao3 WHERE COD = '$Cod_2' ORDER BY COD";
	
    }else{


$consulta  = "SELECT * FROM oposicao3 ORDER BY id LIMIT 0,100";

}
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
       $consulta = "SELECT * FROM oposicao3 ORDER BY id LIMIT $id,1";
	
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
       $consulta = "SELECT * FROM oposicao3 ORDER BY id LIMIT $id,1";
	
}
}

If ($Cod_fim != 0){
	
       $consulta = "SELECT * FROM oposicao3 ORDER BY COD DESC LIMIT 0,1";
	
}

If ($Cod_inicio != 0){
	
       $consulta = "SELECT * FROM oposicao3 ORDER BY id ASC LIMIT 0,1";
	
}
// Fim da Função Navegar pelo registro


$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id     = @$row["id"];
$Edit1  = @$row["COD"];
$Edit2  = @$row["RGASSOC"];
$Edit3  = @$row["DATINSC"];
$Edit4  = @$row["DAT2"];
$Edit5  = @$row["CPF"];
$Edit6  = @$row["SEDE"];
$Edit7  = @$row["CATEGORIA"];
$Edit8  = @$row["CODEDIF"];
$Edit9  = @$row["CNPJ"];
$Edit10 = @$row["ADMS"];
$Edit11 = @$row["MATRICULA"];
$Edit12 = @$row["NU1"];
$Edit13 = @$row["NOMEASSOC"];
$Edit14 = @$row["ENDRESID"];
$Edit15 = @$row["OBS"];

$menssagens = "* * * Visualizar * * *";

// Abre Tabela Categoria

$consulta1  = "SELECT * FROM categ Where CODIGO = '$Edit7'";

$resultado1 = @mysql_query($consulta1);

$row1 = @mysql_fetch_array($resultado1);

$categ_1   = @$row1["DESCRICAO"];

// Abrir Table de Edificios

$consulta2  = "SELECT * FROM edificios Where cod = '$Edit8'";

$resultado2 = @mysql_query($consulta2);

$row2 = @mysql_fetch_array($resultado2);

$cod_edif   = @$row2["cod"];
$cond  = trim(@$row2["cond"].@$row2["Nome"]);
$edif  = trim(@$row2["Nome"]);

$nome_do_edif = $cond;

// Abrir tabela Administradora

$consulta3 = "SELECT * FROM adms WHERE cod = '$Edit10'";

$resultado3 = @mysql_query($consulta3);

$row3 = @mysql_fetch_array($resultado3);

$nome1_adms  = @$row3["nome1"];
$nome2_adms  = @$row3["nomeadm"];

// Abrir tabela Senha

$consulta3 = "SELECT * FROM tt_ser_01 Where login = '$nome3'";

$resultado3 = @mysql_query($consulta3);

$row3 = mysql_fetch_array($resultado3);

$edi1       = @$row3["edi1"];
$edi2       = @$row3["edi2"];
$edi3       = @$row3["edi3"];

?>

<html>
<style type=text/css>

body { background-image: url(<?=$logo_sis;?>);}

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
--></style> 

</HEAD>
<BODY text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0 leftmargin=0 bottommargin=0>

<?
require("oposlayoutx.php");
?>

</html>