<?php
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Configuracoes do Sistema
 Criado em Data.....: 19/12/2008
 Ultima Atualização : 19/12/2008 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/
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

body { background-image: url(<?php echo $logo_sis ?>);
       background-attachment: fixed }

<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 22px Arial; color: #000000 }
-->

div.fileinputs {
	position: relative;
}
div.fakefile {
	position: absolute;
	top: 0px;
	left: 0px;
	z-index: 1;
}
input.file {
	position: relative;
	text-align: right;
	-moz-opacity:0 ;
	filter:alpha(opacity: 0);
	opacity: 0;
	z-index: 2;
}

</style> 


</body>
</html>

<?php

$codigo   = $_POST['id'];    // id
$Foto1    = $_POST['Edit1']; // Foto
$Foto2    = $_POST['Edit2']; // Foto
$Foto3    = $_POST['Edit3']; // Foto
$Foto4    = $_POST['Edit4']; // Foto
$Foto5    = $_POST['Edit5']; // Foto
$Foto6    = $_POST['Edit6']; // Foto
$Foto7    = $_POST['Edit7']; // Foto
$Foto8    = $_POST['Edit8']; // Foto
$Foto9    = $_POST['Edit9']; // Foto


//echo "<br><br><br>".$Edit1."<br>";
//echo $Edit2."<br>";
//echo $codigo."<br>";
//echo $origem1."<br>";

include("../conexao.php");
// Chama o Banco de Dados

$link = @mysql_connect($host,$user,$pass);

@mysql_select_db($db);


    $id_user   = $HTTP_POST_VARS["id"];

    // Foto 1
    $num_foto1 = $HTTP_POST_VARS["Edit1"];
    $num_foto2 = $_POST["Edit2"];
    $num_foto3 = $_POST["Edit3"];
    $num_foto4 = $_POST["Edit4"];
    $num_foto5 = $_POST["Edit5"];
    $num_foto6 = $_POST["Edit6"];
    $num_foto7 = $_POST["Edit7"];
    $num_foto8 = $_POST["Edit8"];
    $num_foto9 = $_POST["Edit9"];

//echo '<br><br><br>'.$num_foto1;

$fp = fopen($num_foto1,"rb");
$imagem_temp = fread($fp,filesize($num_foto1));
fclose($fp);
$imagem_temp = addslashes($imagem_temp);


echo "<br><br>";
echo $fp."<br>";
echo $imagem_temp."<br>";
echo $imagem_final."<br>";

break;


// include("../logar.php");
$nome3 = strtoupper($_SESSION["nome_log"]);

include("menu.php");

$date1   = date('m/d/Y');
$origem1 = trim($_SERVER['REMOTE_ADDR']);


$sql = @mysql_query("INSERT INTO fotos_site(imagem1,
											tipo_imagem1,
											bytes_imagem1,
											dados_imagem1)
											
                                VALUES('$imagem_name',
									   '$imagem_type',
									   '$imagem_size',
									   '$imagem_temp')",$link)
or die("Erro no SQL: ".@mysql_error());
echo "<br><br>
	  <div align=center>
	  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
	  <tr>
	  <td align=center>
	  <font face=arial><b>*** Foto inserida com SUCESSO no cadastro !!! ***<br>
      </b>              
	  <table align=center>
	  <form method='POST' action='cadsocios.php?cod_1=$id1'>
	  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
	  </form>  
	  </table>
	  </td>
	  </tr>
	  </table>
	  </div>";



	list($width, $height) = getimagesize($_FILES['Edit1']['tmp_name']);
	if ($_FILES['Edit1']['size'] > 20000000){
     ?>
           <script language="javascript">
		   alert("Arquivo muito grande!\nTem que ter até 100k.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
	}else{
          $cripto = substr(md5(uniqid(time())), 0, 10);
          $imagem = $_FILES['Edit1']['name'];
          $imagem_final = $cripto.$imagem;
          move_uploaded_file($_FILES['Edit1']['tmp_name'],"../../site_2010/imagens/fotos/".$imagem_final);
          $caminho_foto1 = $imagem_final;
		  if (!empty($caminho_foto1)){
		     $alterar = @mysql_query("UPDATE fotos SET foto1 = 'imagens/fotos/$caminho_foto1' WHERE id = '$id_user'");
		  }
//	      @mysql_close($conexao);
}
// Foto 2

	list($width, $height) = getimagesize($_FILES['Edit2']['tmp_name']);
	if ($_FILES['Edit2']['size'] > 20000000){
     ?>
           <script language="javascript">
		   alert("Arquivo muito grande!\nTem que ter até 100k.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
	}else{
          $cripto = substr(md5(uniqid(time())), 0, 10);
          $imagem = $_FILES['Edit2']['name'];
          $imagem_final = $cripto.$imagem;
          move_uploaded_file($_FILES['Edit2']['tmp_name'],"../../site_2010/imagens/fotos/".$imagem_final);
          $caminho_foto2 = $imagem_final;
		  if (!empty($caminho_foto2)){
		     $alterar = @mysql_query("UPDATE fotos SET foto2 = 'imagens/fotos/$caminho_foto2' WHERE id = '$id_user'");
		  }
//	      @mysql_close($conexao);
}

// Foto 3

	list($width, $height) = getimagesize($_FILES['Edit3']['tmp_name']);
	if ($_FILES['Edit3']['size'] > 20000000){
     ?>
           <script language="javascript">
		   alert("Arquivo muito grande!\nTem que ter até 100k.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
	}else{
          $cripto = substr(md5(uniqid(time())), 0, 10);
          $imagem = $_FILES['Edit3']['name'];
          $imagem_final = $cripto.$imagem;
          move_uploaded_file($_FILES['Edit3']['tmp_name'],"../../site_2010/imagens/fotos/".$imagem_final);
          $caminho_foto = $imagem_final;
		  if (!empty($num_foto3)){
		     $alterar = @mysql_query("UPDATE fotos SET foto3 = 'imagens/fotos/$caminho_foto' WHERE id = '$id_user'");
		  }
//	      @mysql_close($conexao);
}

// Foto 4

	list($width, $height) = getimagesize($_FILES['Edit4']['tmp_name']);
	if ($_FILES['Edit4']['size'] > 20000000){
     ?>
           <script language="javascript">
		   alert("Arquivo muito grande!\nTem que ter até 100k.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
	}else{
          $cripto = substr(md5(uniqid(time())), 0, 10);
          $imagem = $_FILES['Edit4']['name'];
          $imagem_final = $cripto.$imagem;
          move_uploaded_file($_FILES['Edit4']['tmp_name'],"../../site_2010/imagens/fotos/".$imagem_final);
          $caminho_foto = $imagem_final;
		  if (!empty($num_foto4)){
		     $alterar = @mysql_query("UPDATE fotos SET foto4 = 'imagens/fotos/$caminho_foto' WHERE id = '$id_user'");
		  }
//	      @mysql_close($conexao);
}

// Foto 5

	list($width, $height) = getimagesize($_FILES['Edit5']['tmp_name']);
	if ($_FILES['Edit5']['size'] > 20000000){
     ?>
           <script language="javascript">
		   alert("Arquivo muito grande!\nTem que ter até 100k.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
	}else{
          $cripto = substr(md5(uniqid(time())), 0, 10);
          $imagem = $_FILES['Edit5']['name'];
          $imagem_final = $cripto.$imagem;
          move_uploaded_file($_FILES['Edit5']['tmp_name'],"../../site_2010/imagens/fotos/".$imagem_final);
          $caminho_foto = $imagem_final;
		  if (!empty($num_foto5)){
		     $alterar = @mysql_query("UPDATE fotos SET foto5 = 'imagens/fotos/$caminho_foto' WHERE id = '$id_user'");
		  }
//	      @mysql_close($conexao);
}

// Foto 6

	list($width, $height) = getimagesize($_FILES['Edit6']['tmp_name']);
	if ($_FILES['Edit6']['size'] > 20000000){
     ?>
           <script language="javascript">
		   alert("Arquivo muito grande!\nTem que ter até 100k.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
	}else{
          $cripto = substr(md5(uniqid(time())), 0, 10);
          $imagem = $_FILES['Edit6']['name'];
          $imagem_final = $cripto.$imagem;
          move_uploaded_file($_FILES['Edit6']['tmp_name'],"../../site_2010/imagens/fotos/".$imagem_final);
          $caminho_foto = $imagem_final;
		  if (!empty($num_foto6)){
		     $alterar = @mysql_query("UPDATE fotos SET foto6 = 'imagens/fotos/$caminho_foto' WHERE id = '$id_user'");
		  }
//	      @mysql_close($conexao);
}

// Foto 7

	list($width, $height) = getimagesize($_FILES['Edit7']['tmp_name']);
	if ($_FILES['Edit7']['size'] > 20000000){
     ?>
           <script language="javascript">
		   alert("Arquivo muito grande!\nTem que ter até 100k.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
	}else{
          $cripto = substr(md5(uniqid(time())), 0, 10);
          $imagem = $_FILES['Edit7']['name'];
          $imagem_final = $cripto.$imagem;
          move_uploaded_file($_FILES['Edit7']['tmp_name'],"../../site_2010/imagens/fotos/".$imagem_final);
          $caminho_foto = $imagem_final;
		  if (!empty($num_foto7)){
		     $alterar = @mysql_query("UPDATE fotos SET foto7 = 'imagens/fotos/$caminho_foto' WHERE id = '$id_user'");
		  }
//	      @mysql_close($conexao);
}

// Foto 8

	list($width, $height) = getimagesize($_FILES['Edit8']['tmp_name']);
	if ($_FILES['Edit8']['size'] > 20000000){
     ?>
           <script language="javascript">
		   alert("Arquivo muito grande!\nTem que ter até 100k.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
	}else{
          $cripto = substr(md5(uniqid(time())), 0, 10);
          $imagem = $_FILES['Edit8']['name'];
          $imagem_final = $cripto.$imagem;
          move_uploaded_file($_FILES['Edit8']['tmp_name'],"../../site_2010/imagens/fotos/".$imagem_final);
          $caminho_foto = $imagem_final;
		  if (!empty($num_foto8)){
		     $alterar = @mysql_query("UPDATE fotos SET foto2 = 'imagens/fotos/$caminho_foto' WHERE id = '$id_user'");
		  }
//	      @mysql_close($conexao);
}

// Foto 9

	list($width, $height) = getimagesize($_FILES['Edit9']['tmp_name']);
	if ($_FILES['Edit9']['size'] > 20000000){
     ?>
           <script language="javascript">
		   alert("Arquivo muito grande!\nTem que ter até 100k.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
	}else{
          $cripto = substr(md5(uniqid(time())), 0, 10);
          $imagem = $_FILES['Edit9']['name'];
          $imagem_final = $cripto.$imagem;
          move_uploaded_file($_FILES['Edit9']['tmp_name'],"../../site_2010/imagens/fotos/".$imagem_final);
          $caminho_foto = $imagem_final;
		  if (!empty($num_foto9)){
		     $alterar = @mysql_query("UPDATE fotos SET foto9 = 'imagens/fotos/$caminho_foto' WHERE id = '$id_user'");
		  }
//	      @mysql_close($conexao);
}

			echo "
			      <style type=text/css>

                  body { background-image: url('../$logo_sis');
                         background-attachment: fixed }
                  </style>       

			      <br><br><br>
				  <div align=center>
				  <table align=center border='15' bgcolor='#FFFFFF'  bordercolor ='$color_bor'>
				  <tr>
				  <td align=center>
				  <font face=arial><b>*** Mensagem Enviada para o site com SUCESSO !!! ***<br></b>
			                    
				  <table align=center>
				  <form method='POST' action='../avaleht.php?servletjs2=20$$20'>
				  <td><input type=image name='consulta' src='../imagens/botao_voltar.PNG'></td>
				  </form>  
				  </table>
				  </td>
				  </tr>
				  </table>
				  </div>";

?>
