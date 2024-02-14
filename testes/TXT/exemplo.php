<?php
$handle = fopen("config.txt", "r");
$contents = fread($handle, filesize("config.txt"));
fclose($handle);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Exemplo - Mudando BackGround(Plano de Fundo) do site pelo admin</title>
<style type="text/css">
<!--
body {
<?
print $contents;
?>
}
-->
</style>
</head>

<body>
</body>
</html>
