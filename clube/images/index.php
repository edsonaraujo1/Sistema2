<?
/*
 ------------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Salvar Foto na Tabela
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 21/01/2009 

 DEUS SEJA LOUVADO
 ------------------------------------------------
*/


// Abre Conex�o com o MySql
include("../../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);

// Resgata a Sessao
session_start();
session_name("Foto_cs3");

$mat   = $_SESSION['ima_g_1'];
$id_9  = $_SESSION['ima_g_2'];

$consulta  = "SELECT * FROM clube_tiete WHERE id = '$mat'";
	
$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id      = @$row["id"];
$cod_1   = @$row["CODIGO"];    
$Edit2   = @$row["MATRICULA"]; 
$let_f   = @$row["LETRA"];

$mat2 = trim($cod_1.$let_f); 


$consulta = "SELECT * FROM tb_quarta WHERE codp = '$mat2'";
	
$resultado = @mysql_query($consulta);

$row = @mysql_fetch_array($resultado);

$id_9a 	   = @$row["cod_foto"];
$id_imagem = @$row["id_imagem"];

if(!empty($id_imagem)){

$consulta2 = "DELETE FROM tb_quarta WHERE id_imagem = '$id_imagem'";

@mysql_query($consulta2, $link);
	
}


//This project is done by vamapaull: http://blog.vamapaull.com/
//The php code is done with some help from Mihai Bojin: http://www.mihaibojin.com/

$DirPath="../images/";
$mydir_list="";
if (($handle=opendir($DirPath)))
{
$files = array();
$times = array();
 while ($node = readdir($handle))
 
 {
     $nodebase = basename($node);
     if ($nodebase!="." && $nodebase!="..")
     {
         if(!is_dir($DirPath.$node))
         {
$pos = strrpos($node,".jpg");
            if($pos===false){
   }
   
else{
	//export to xml
	$filestat = stat($DirPath.$node);
	$times[] = $filestat['mtime'];
	$files[] = $DirPath.$node;
	//$mydir_list.="<img src=\"".$DirPath.$node."\" />\n";
	array_multisort($times, SORT_NUMERIC, SORT_DESC, $files);
	

}
}
     }
 }
}

session_start();
$imagem = trim("../".$_SESSION['ima_g']);
//$imagem = trim($_SESSION['ima_g']);
//$imagem = trim("453.jpg");

$fp = fopen($imagem,"rb");
$imagem_temp = fread($fp,filesize($imagem));
fclose($fp);
$imagem_temp = addslashes($imagem_temp);

$imagem_size = 176;
$id_9        = $cod_1;
$imagem_name = $mat2.".jpg";
$imagem_type = "images/JPEG";

echo 'imagem   ='.$imagem."<br>";
echo 'mat      ='.$mat."<br>";
echo 'id_9     ='.$id_9."<br>";
echo 'img_nome ='.$imagem_name."<br>";
echo 'img_type ='.$imagem_type."<br>";
echo 'img_size ='.$imagem_size."<br>";
echo 'img_temp ='.$imagem_temp."<br>";


$sql = @mysql_query("INSERT INTO tb_quarta(codp,cod_foto,imagem,tipo_imagem,bytes_imagem,dados_imagem)
VALUES('$mat2','$id_9','$imagem_name','$imagem_type','$imagem_size','$imagem_temp')",$link);

/*
or die("<br><br><br>
	  <div align=center>
	  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
	  <tr>
	  <td align=center>
	  <font face=arial><b>*** Erro no: " . @mysql_error() . "!!! ***<br>
      </b>              
	  <table align=center>
	  <form method='POST' action='cadsocios.php?cod_1=$id1'>
	  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
	  </form>  
	  </table>
	  </td>
	  </tr>
	  </table>
	  </div>");


echo "<br><br><br>
	  <div align=center>
	  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
	  <tr>
	  <td align=center>
	  <font face=arial><b>*** Foto inserida com SUCESSO no cadastro !!! ***<br>
      </b>              
	  <table align=center>
	  <form method='POST' action='javascript:window.close()'>
	  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
	  </form>  
	  </table>
	  </td>
	  </tr>
	  </table>
	  </div>";


// Mostrar Imagens no diretorios
//foreach($files as $file) { $mydir_list.="<image src=\"".$file."\" />\n"; }
//echo $mydir_list;
*/


// Resgata a Sessao
session_start();
session_name("Foto_cs3");

unset ($_SESSION['ima_g_1']);
unset ($_SESSION['ima_g_2']);

?>
<script language="JavaScript">

function fechar(){
	if(document.all){
		window.opener=window;
		window.close("#");
	}else{
		self.close();
	}	
}

//window.opener = window;
//window.close("#");

//setTimeout("fechar()",100);

</script>

