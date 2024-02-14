<?
// Resgata a Sessao
session_start();

//include("../config.php");
?>

<html>
<head>
<title>Bate-Papo</title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type=text/css>

</style>

</head>
<frameset rows="*" cols="*,150" framespacing="0" frameborder="NO" border="0">
  <frameset rows="*,110" frameborder="NO" border="0" framespacing="0">
    <frameset rows="80,*" frameborder="NO" border="1" framespacing="0">
      <frame src="cima.php" name="cima" scrolling="yes" noresize>
      <frame src="texto.php" name="texto" scrolling="NO">
    </frameset>
    <frame src="menu.php" name="menu" scrolling="NO" noresize>
  </frameset>
  <frame src="usuarios.php" name="usuarios" scrolling="yes" noresize>
</frameset>
<noframes><body>
</body></noframes>
</html>
