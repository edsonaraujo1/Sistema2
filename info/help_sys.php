<?PHP
/*
 ------------------------------------------
 Desenvolvido por...: Edson de Araujo
 Finalidade.........: Tela de Help
 Criado em Data.....: 07/12/2007
 Ultima Atualiza��o : 07/12/2007 

 DEUS SEJA LOUVADO
 ------------------------------------------
*/

include("../config.php");

// Resgata a Sessao
// Resgata a Sessao
@session_start();

$nome3 = strtoupper($_SESSION["nome_log"]);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<title>Ajuda Sistema</title>
<link rel="shortcut icon" href="../imagens/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
</head>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px">
<table width="383" border="0">
  <tr>
    <td><div align="center"><font size="4" face="Arial"><b>Ola...<?=$nome3;?></b></font></div></td>
  </tr>
  <tr>
    <td><div align="center"><font size="3" face="Arial"><b><font color="#0000FF">Ajuda - Sistema <?=$Titulo;?>&nbsp;-</font></b></font></div></td>
  </tr>
</table>
<table width="382" height="51" border="0">
  <tr>
    <td valign="top"><table width="374" height="49" border="0" cellpadding="0">
      <tr>
        <td width="142" align="center" valign="top"><img src="../imagens/setas.png" width="135" height="216"></td>
        <td width="232" valign="top"><table width="235" height="226" border="0" cellpadding="0">
          <tr>
            <td width="219" bgcolor="#FFFF00">Esta tecla tem a fun&ccedil;&atilde;o de incluir um novo registro no cadastro(Chama a tela de inclus&atilde;o) </td>
          </tr>
          <tr>
            <td bgcolor="#00FF00">Esta tecla pula para o Inicio do banco de dados(navega&ccedil;&atilde;o)</td>
          </tr>
          <tr>
            <td height="25" bgcolor="#FF00FF">Esta tecla pula para o Fim do banco de dados(navega&ccedil;&atilde;o)</td>
          </tr>
          <tr>
            <td bgcolor="#8080FF"><font color="#FFFFFF">Esta tecla volta um Registro atraz (navega&ccedil;&atilde;o) Anterior</font> </td>
          </tr>
          <tr>
            <td bgcolor="#FF8040">Esta tecla vai para o proximo Registro  (navega&ccedil;&atilde;o) Proximo</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" valign="top"><img src="../imagens/esc.PNG" width="52" height="49"></td>
        <td valign="top" bgcolor="#FFFFCC">Para retornar para a Tela anterior ou sair de uma tela para o menu principal tecle Esc. </td>
      </tr>
      <tr>
        <td align="center" valign="top"><img src="../imagens/tecla_c.PNG" width="51" height="49"></td>
        <td valign="top" bgcolor="#FFFFCC">Use a tecla C para ir para a tela de consulta. </td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="382" border="0">
  <tr>
    <td width="104"> <img src="../imagens/botaoazul6.PNG" width="92" height="22"></td>
    <td width="262" bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de incluir um novo registro no cadastro(chama a tela de inclus&atilde;o)</div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul5.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de alterar um registro j&aacute; existente no cadastro(chama a tela de altera&ccedil;&atilde;o) </div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul4.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de apagar um registro do cadastro(chama a tela de Exclus&atilde;o) obs com isso o registro e apagado permanentemente.</div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul7.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de consultar um registro ja cadastrdo(chama a tela de consulta sendo possiv&eacute;l consultar por diversos filtros) </div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul3.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de mostrar uma lista tipo grid na tela ap&oacute;s uma consulta permitindo selecionar o registro escolhido(chama alista na tela) </div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul23.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de imprimir seja lista ou resultados de consulta diretamente na impressora local ou de rede </div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul37.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de acessar o cadastro de hist&oacute;rico seja de clientes, socios ou demais registros. </div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul17.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de capturar uma imagem seja por camera ou scaner para inclus&atilde;o no cadastro </div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul34.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de chamar uma calculadora simples para uso junto com as planilhas. </div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul18.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de imprimir para impressora ou tela uma ficha pre cadastrada do Cadastro de socio.</div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul9.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de descartar algum pedido de inclus&atilde;o, exclus&atilde;o ou outra fun&ccedil;&atilde;o.</div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul10.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de salvar um conteudo seja no cadastro com em disco ou rede.(usado na captura de imagens) </div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botao_voltar.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de voltar uma tela atraz</div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul20.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de imprimir ou chamar a tela de gera&ccedil;&atilde;o de boletos bancarios pre definidos. </div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul22.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de imprimir relat&oacute;rios diver&ccedil;os em html ou pdf. </div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul40.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de chamar uma segunda tela se o cadastro tiver uma segunda folha de dados. </div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul42.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de chamar a tela de impress&atilde;o de etiquetas nos padr&otilde;es pre definido. </div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul44.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de enviar uma guia ou boleto por e-mail. </div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul25.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de fechar uma tela ou cadastro.</div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul33.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC"><div align="left">Este bot&atilde;o tem a fun&ccedil;&atilde;o de sair do sistema ou do programa em si. </div></td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul_copy.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC">Este bot&atilde;o tem a fun&ccedil;&atilde;o de copiar para a memoria de transferencia conteudos do Sistema para ser usado conforme a necessidade tipo ctrl + c </td>
  </tr>
  <tr>
    <td><img src="../imagens/botaoazul_enviar.PNG" width="92" height="22"></td>
    <td bgcolor="#FFFFCC">Este bot&atilde;o tem a fun&ccedil;&atilde;o de enviar informa&ccedil;&otilde;es para ser executada em outra tela </td>
  </tr>
  <tr>
    <td align="center"><img src="../imagens/vacina.JPG" width="54" height="55"></td>
    <td bgcolor="#FFFFCC">Este icone quando estiver presente no formul&aacute;rio, significa que os dados enviados s&atilde;o protegido por criptografia e SQL injection </td>
  </tr>
</table>
<table width="383" border="0">
  <tr>
    <td width="200"><table width="200" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="../imagens/inicio.PNG" width="39" height="32"></td>
        <td><img src="../imagens/anterior.PNG" width="39" height="32"></td>
        <td><img src="../imagens/proximo.PNG" width="40" height="32"></td>
        <td><img src="../imagens/fim.PNG" width="39" height="32"></td>
      </tr>
    </table></td>
    <td width="167" bgcolor="#CCFFFF">Estes bot&otilde;es tem a fun&ccedil;&atilde;o de Navega&ccedil;&atilde;o pelo registro do Cadastro.( Inicio,anterior,pr&oacute;ximo e fim) </td>
  </tr>
</table>
<table width="383" border="0">
  <tr>
    <td width="55"><img src="../imagens/lupa.PNG" width="40" height="41"></td>
    <td width="312" bgcolor="#FFCCCC">Este icone tem a fun&ccedil;&atilde;o de pesquisar determindas informa&ccedil;&otilde;es complementares de outros cadastros. </td>
  </tr>
  <tr>
    <td><img src="../imagens/carta.gif" width="50" height="42"></td>
    <td bgcolor="#FFCCCC">Este icone tem a fun&ccedil;&atilde;o de manter o usu&aacute;rio informado com atualiza&ccedil;&otilde;es e informa&ccedil;oes diversas. </td>
  </tr>
</table>
<table width="383" border="0">
  <tr>
    <td width="95"><img src="../imagens/menu_r2_c2.gif" width="95" height="26"></td>
    <td width="272" bgcolor="#CCCCFF">Este menu da acesso as telas de Cadastro de Adms, Socios, Edif, Vagas, Oposi&ccedil;ao e demais cadastros </td>
  </tr>
  <tr>
    <td><img src="../imagens/menu_r2_c4.gif" width="95" height="26"></td>
    <td bgcolor="#CCCCFF">Este menu da acesso as telas de Impress&atilde;o de Guias, Baixa de contribui&ccedil;&otilde;es e Retorno dos Bancos e emiss&atilde;o de Cobran&ccedil;a</td>
  </tr>
  <tr>
    <td><img src="../imagens/menu_r2_c6.gif" width="95" height="26"></td>
    <td bgcolor="#CCCCFF">Este menu da acesso as telas de Impress&atilde;o de Relat&oacute;rio, Etiquetas e Listagens diversas dos Cadastros. </td>
  </tr>
  <tr>
    <td><img src="../imagens/menu_r2_c8.gif" width="95" height="26"></td>
    <td bgcolor="#CCCCFF">Este menu da acesso as telas de Atendimentos dos diversos departamentos de Sa&uacute;de e Odontologico e Cadastros de Medicos e Dentistas.</td>
  </tr>
  <tr>
    <td><img src="../imagens/menu_r2_c10.gif" width="95" height="26"></td>
    <td bgcolor="#CCCCFF">Este menu da acesso as telas de Cadastros de Recebimentos diversos, planilas, receitas, cheques, impress&atilde;o de Planilhas de Caixa e Financeiro.</td>
  </tr>
  <tr>
    <td height="61"><img src="../imagens/menu_r2_c12.gif" width="95" height="26"></td>
    <td bgcolor="#CCCCFF">Este menu da acesso as telas de Cadastro de Advogados, procura&ccedil;&otilde;es, Acompanhamento e demais procedimentos Juridicos. </td>
  </tr>
  <tr>
    <td><img src="../imagens/menu_r2_c14.gif" width="95" height="26"></td>
    <td bgcolor="#CCCCFF">Este menu da acesso as telas de Atualiza&ccedil;&atilde;o das informa&ccedil;&otilde;es que s&atilde;o enviadas ao Web Site . </td>
  </tr>
  <tr>
    <td><img src="../imagens/menu_r2_c16.gif" width="95" height="26"></td>
    <td bgcolor="#CCCCFF">Este menu da acesso as telas de Configura&ccedil;&otilde;es, e Manuten&ccedil;&atilde;o e Seguran&ccedil;a do Sistema em geral. </td>
  </tr>
</table>
<table width="384" border="0">
  <tr>
    <td width="139"><img src="../imagens/limpa_campo.PNG" width="139" height="38"></td>
    <td width="227" bgcolor="#CCCC99">Para Apagar o conteudo de um campo digite. (ponto) para limpar um campo na altera&ccedil;&atilde;o. </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>

<script language="javascript">

function fechar(){
	
	if(document.all){
		window.opener=window;
		window.close("#");
	}else{
		self.close();
	}
}

</script>

<script language="javascript">
setTimeout("fechar()",300000);
</script>