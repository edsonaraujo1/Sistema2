<?
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Tela de Help
 Criado em Data.....: 07/12/2007
 Ultima Atualização : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/
?>

<html>
<head>
<script src="alert/jquery.js" type="text/javascript"></script>
<script src="alert/jquery-ui.js" type="text/javascript"></script>
<script src="alert/m2br.dialog.pack.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="alert/m2br.dialog.css" />
<link rel="stylesheet" type="text/css" href="alert/exemplo.css" />
</head>

<body>

<script>
var alertaPadrao = function(titulo, msg, tipo, altura, largura) {
		$('body').append('<a href="#" id="alerta-padrao"></a>');
		$('#alerta-padrao').m2brDialog({
				draggable: true,
				texto: msg,
				tipo: tipo,
				titulo: titulo,
				altura: altura,
				largura: largura,
				botoes: {
					1: {
						label: 'Fechar',
						tipo: 'fechar'
					}
				}									   
		});
		$('#alerta-padrao')
			.click()
			.remove();
};
</script>


<script type="text/javascript">
$(document).ready(function(){
	alertaPadrao('Informação:', 'Operação concluída com sucesso.', 'info', 110, 250);
});
</script>
  

</body>
</html>


