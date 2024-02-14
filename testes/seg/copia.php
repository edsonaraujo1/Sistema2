<form>
<script language="JavaScript">
var copytoclip=1
function HighlightAll(theField) {
var tempval=eval("document."+theField)
tempval.focus()
tempval.select()
 if (document.all&&copytoclip==1){
  therange=tempval.createTextRange()
  therange.execCommand("Copy")
  window.status="Conteúdo selecionado e copiado para a área de transferência!"
  setTimeout("window.status=''",2400);
  }
}

function highlight(field) {
       field.focus();
       field.select();
}

function goToURL() { window.location = "javascript:HighlightAll('forms[0].select')"; }
</script>
<textarea name="select"onClick='highlight(this);'>TEXTO</textarea><br>
<input type=button value="Selecionar e Copiar" onClick="goToURL()"></p>
</form>