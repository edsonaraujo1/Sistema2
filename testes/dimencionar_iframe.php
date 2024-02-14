<script language="Javascript" type="text/javascript">
if (document.getElementById("tamanho").scrollHeight>420){
	parent.document.getElementById("dimensao").height = document.getElementById("tamanho").scrollHeight + 40;
} else {
	parent.document.getElementById("dimensao").height = 420;
}
</script>

<?

// basta colocar um ID no Iframe chamado Dimensao e na pagina que esta sendo carregada, colocar um <div id = "tamanho">// logo após o body e finaliza logo antes do </body>

?>