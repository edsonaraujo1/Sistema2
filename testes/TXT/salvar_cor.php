<?
$cor = $_POST['cori'];
if($cor == ''){
$nome = 'fundo.jpg';
$diretorio = "images/" . $nome;		
$arquivo = $_FILES['img'];	
move_uploaded_file($arquivo['tmp_name'], $diretorio);
$var = "background-image: url('../images/".$nome."');";
}else{
$var = "background-color: ".$_POST['cori'].";"; 
}

$abrir = fopen("config.txt","w+");
fwrite($abrir, $var);
fclose($abrir);      
if(fwrite == 0){
?>
  <span class="style1">Alterações Realizada com sucesso!!!</span>
  <?
}else{
echo "Erro ao alterar a cor de fundo, tente novamente!!!";
}
?>
