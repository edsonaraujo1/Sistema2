<?

$i_Matri = $_GET['Matricula'];
$i_Nu = $_GET['letra'];

?>

<script>
<!--
javascript:janelaSecundaria6('cap_foto.php?Cod_cap=<?=$i_Matri;?>&Cod_nu=<?=$i_Nu;?>')

function Download()
{
	window.location = "Capture.swf";     
}

function janelaSecundaria3 (URL){ 
   window.open(URL,"janela3","width=745,height=485,resizable=NO,status=NO,Scrollbars=yes,location=NO,menubar=NO,toolbar=NO"); 
} 

function janelaSecundaria5 (URL){ 
   window.open(URL,"janela5","width=410,height=420,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

function janelaSecundaria6 (URL){ 
   window.open(URL,"janela6","width=780,height=500,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

//-->
</script>
