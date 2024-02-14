<?php

/**
 * @author holodek
 * @copyright 2011
 */



?>

  <li id="menu2h"><h2 align="center"><b>Operador</b></h2>
    <ul id="menu3h"> <!-- Inicio Sub-menu -->
      <li><a href="info/info.php" title="" >Informações do Sistema</a>
      </li>
      <li><a href="javascript:window.print();" title="">Configurar Impressão</a>
      </li>
      <li><a href="config/server.php" title="">Configurar Servidor de Dados</a>
      </li>
      <li><a href="config/configuracoes.php" title="">Configurações do Sistemar</a>
      </li>
      <li><a href="senha/cadastro.php" title="">Cadastro de Senhas
	  <img src="imagens/arrows.gif" width="8" height="8" border="0"/></a>
        <ul>
          <li><a href="senha/cadastro.php" title="">Incluir</a></li>
          <li><a href="senha/cadastro.php" title="">Consultar</a></li>
        </ul>
      </li>
      <li><a href="send/send.php" title="">Enviar Mensagem(send)</a>
      </li>
      <li><a href="#" title="">Sistema Modelo</a>
      </li>
      <li><a href="javascript:janelaSecundaria();" title="">Calculadora</a>
      </li>
      <li><a href="reindex/organiza_id.php" title="">Reindex (Organizar)</a>
      </li>
      <li><a href="backup/backup.php" title="">Backup da Base de Dados</a>
      </li>
      <li><a href="estorno/mostra_grid.php" title="">Cancelamento Caixa</a>
      </li>
      <li><a href="receita/receita_grid.php" title="">Abrir Receita Caixa</a>
      </li>
      <li><a href="javascript:janelaCronos();" title="">Cronometro</a>
      </li>
      <li><a href="socios/salvafoto.php" title="">Alterar Foto do Socio</a>
      </li>
      <li><a href="clube/salvafoto.php" title="">Alterar Foto Clube</a>
      </li>
      <li><a href="info/desempenho.php" title="">Testar Desempenho da Rede</a>
      </li>
      <li><a href="javascript:janelabatpapo();" title="">Bate Papo (Chat)</a>
      </li>

    </ul> <!-- Fim Sub-menu -->
  </li>

<script language="JavaScript">

function janelaSecundaria(){ 
   window.open("calc.php", "nome", "width=260,height=390,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

function janelaCronos(){ 
   window.open("tempo_x2.php", "nome", "width=388,height=205,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 

function janelabatpapo(){ 
   window.open("batepapo/batepapo.php", "nome", "width=750,height=405,resizable=NO,status=NO,Scrollbars=NO,location=NO,menubar=NO,toolbar=NO"); 
} 
</script>